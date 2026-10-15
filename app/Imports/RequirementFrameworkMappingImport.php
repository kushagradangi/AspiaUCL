<?php

namespace App\Imports;

use App\Models\Framework;
use App\Models\Requirement;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use RuntimeException;

class RequirementFrameworkMappingImport implements ToCollection, WithHeadingRow
{
    private const FRAMEWORK_COLUMNS = [
        'ISO 27001:2022 Section / Subsection & Title' => 'ISO27001',
        'IRDAI Cyber Security Guidelines 2023' => 'IRDAI',
        'RBI Cyber Security Framework 2016 Mapping' => 'RBI-CSF',
        'SEBI CSCRF Section / Subsection' => 'SEBI-CSCRF',
        'DORA Subsection' => 'DORA',
        'HIPAA Security Rule 2025 NPRM Mapping' => 'HIPAA',
        'ISO/IEC 27002:2022 Section / Subsection Mapping' => 'ISO27002',
        'NIS2 Titles' => 'NIS2',
        'PCI DSS 4.0.1' => 'PCI-DSS',
        'COBIT 2019' => 'COBIT2019',
        'ISO 22301:2019 Titles' => 'ISO22301',
        'NIST CSF 2.0' => 'NIST-CSF',
        'NIST SP 800-53 Rev.5 Section' => 'NIST80053',
        'NIST SP 800-53 Rev.5 Subsection / Control' => 'NIST80053',
        'DPDPA Section(s) and Section Title(s)' => 'DPDP',
        'GDPR Mapping' => 'GDPR',
        'CIS Controls v8 Mapping' => 'CIS-V8',
        'CERT-In Directions 2022' => 'CERT-IN',
        'UPI Framework Section(s)' => 'NPCI-ISR',
        'UPI Framework Subsection(s)' => 'NPCI-ISR',
        'SOC 2 Section / Subsection & Title' => 'SOC2',
        'ISO27701 (2019)' => 'ISO27701',
        'ISO27701 Titles (2019)' => 'ISO27701',
    ];

    private int $mappedRows = 0;
    private int $mappedPairs = 0;
    private int $missingRequirementCount = 0;
    private array $missingRequirementIds = [];
    private int $titleMismatchCount = 0;
    private array $titleMismatchIds = [];

    public function collection(Collection $rows): void
    {
        if ($rows->isEmpty()) {
            throw new RuntimeException('The mapping workbook contains no data rows.');
        }

        $firstRow = $rows->first();
        $firstRowValues = $firstRow instanceof Collection ? $firstRow->all() : $firstRow;
        $headers = [];
        foreach (array_keys($firstRowValues) as $header) {
            $headers[$this->normalizeHeader((string) $header)] = (string) $header;
        }

        if (!isset($headers['requirementid'])) {
            throw new RuntimeException('The workbook must contain a "Requirement ID" column.');
        }

        $columnsByFramework = [];
        $expectedHeaders = [];
        foreach (self::FRAMEWORK_COLUMNS as $label => $frameworkCode) {
            $key = $this->normalizeHeader($label);
            $expectedHeaders[$key] = $label;
            $columnsByFramework[$frameworkCode] ??= [];
            if (isset($headers[$key])) {
                $columnsByFramework[$frameworkCode][] = $key;
            }
        }

        $missingHeaders = array_diff_key($expectedHeaders, $headers);
        if ($missingHeaders !== []) {
            throw new RuntimeException(
                'The mapping workbook is missing expected columns: '
                . implode(', ', array_values($missingHeaders))
            );
        }

        $allowedHeaders = array_fill_keys(
            array_merge(array_keys($expectedHeaders), ['requirementid', 'requirementtitle']),
            true
        );
        foreach ($rows as $row) {
            foreach ($row as $header => $value) {
                $key = $this->normalizeHeader((string) $header);
                if (!isset($allowedHeaders[$key]) && trim((string) $value) !== '') {
                    throw new RuntimeException(
                        "The mapping workbook has an unrecognized populated column: \"{$header}\"."
                    );
                }
            }
        }

        $frameworkCodes = array_keys($columnsByFramework);
        $frameworks = Framework::query()
            ->whereIn('framework_code', $frameworkCodes)
            ->get()
            ->groupBy(fn (Framework $framework) => strtoupper(trim((string) $framework->framework_code)));

        $frameworksByCode = [];
        foreach ($frameworkCodes as $code) {
            $matches = $frameworks->get(strtoupper($code), collect());
            if ($matches->count() !== 1) {
                throw new RuntimeException(
                    "Expected exactly one project framework with code \"{$code}\"; found {$matches->count()}."
                );
            }
            $frameworksByCode[$code] = $matches->first();
        }

        $requirementIds = [];
        $seenIds = [];
        foreach ($rows as $row) {
            $values = $this->normalizeRow($row);
            $requirementId = trim((string) ($values['requirementid'] ?? ''));
            if ($requirementId === '') {
                continue;
            }

            $key = strtoupper($requirementId);
            if (isset($seenIds[$key])) {
                throw new RuntimeException("The mapping workbook contains duplicate Requirement ID \"{$requirementId}\".");
            }
            $seenIds[$key] = true;
            $requirementIds[$key] = $requirementId;
        }

        if ($requirementIds === []) {
            throw new RuntimeException('The mapping workbook has no populated Requirement IDs.');
        }

        $requirements = collect();
        foreach (array_chunk(array_values($requirementIds), 500) as $idChunk) {
            Requirement::query()
                ->whereIn('requirement_id', $idChunk)
                ->get(['requirement_id', 'requirement_title'])
                ->each(fn (Requirement $requirement) => $requirements->put(
                    strtoupper(trim($requirement->requirement_id)),
                    $requirement
                ));
        }

        $records = [];
        $now = now();
        $this->mappedRows = 0;
        $this->mappedPairs = 0;
        $this->missingRequirementCount = 0;
        $this->missingRequirementIds = [];
        $this->titleMismatchCount = 0;
        $this->titleMismatchIds = [];

        foreach ($rows as $row) {
            $values = $this->normalizeRow($row);
            $requirementId = trim((string) ($values['requirementid'] ?? ''));
            if ($requirementId === '') {
                continue;
            }

            $requirementKey = strtoupper($requirementId);
            $requirement = $requirements->get($requirementKey);
            if (!$requirement) {
                $this->missingRequirementCount++;
                if (count($this->missingRequirementIds) < 20) {
                    $this->missingRequirementIds[] = $requirementId;
                }
                continue;
            }

            $sourceTitle = trim((string) ($values['requirementtitle'] ?? ''));
            if ($sourceTitle !== '' && $sourceTitle !== trim($requirement->requirement_title)) {
                $this->titleMismatchCount++;
                if (count($this->titleMismatchIds) < 20) {
                    $this->titleMismatchIds[] = $requirementId;
                }
            }

            $rowHasMapping = false;
            foreach ($columnsByFramework as $code => $columnKeys) {
                $references = [];
                foreach ($columnKeys as $columnKey) {
                    $reference = trim((string) ($values[$columnKey] ?? ''));
                    if (
                        $reference !== ''
                        && $reference !== '-'
                        && $reference !== '—'
                        && !in_array($reference, $references, true)
                    ) {
                        $references[] = $reference;
                    }
                }

                if ($references === []) {
                    continue;
                }

                $rowHasMapping = true;
                $framework = $frameworksByCode[$code];
                $records[] = [
                    'requirement_id' => $requirement->requirement_id,
                    'framework_name' => $framework->name,
                    'framework_code' => $framework->framework_code,
                    'framework_id' => $framework->id,
                    'clause_reference' => implode('; ', $references),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                $this->mappedPairs++;
            }

            if ($rowHasMapping) {
                $this->mappedRows++;
            }
        }

        $frameworkIds = array_map(fn (Framework $framework) => $framework->id, $frameworksByCode);
        $frameworkNames = array_map(fn (Framework $framework) => $framework->name, $frameworksByCode);
        $frameworkNames = array_values(array_unique(array_merge(
            $frameworkNames,
            array_map('trim', array_keys(self::FRAMEWORK_COLUMNS))
        )));

        DB::transaction(function () use ($requirements, $frameworkIds, $frameworkCodes, $frameworkNames, $records) {
            foreach ($requirements->chunk(500) as $requirementChunk) {
                $ids = $requirementChunk->pluck('requirement_id')->all();

                DB::table('requirement_framework_mappings')
                    ->whereIn('requirement_id', $ids)
                    ->where(function ($query) use ($frameworkIds, $frameworkCodes, $frameworkNames) {
                        $query->whereIn('framework_id', $frameworkIds)
                            ->orWhereIn('framework_code', $frameworkCodes)
                            ->orWhereIn('framework_name', $frameworkNames);
                    })
                    ->delete();

                $legacyNumericIds = DB::table('requirement_framework_mappings')
                    ->whereIn('requirement_id', $ids)
                    ->whereNull('framework_id')
                    ->get(['id', 'framework_name', 'framework_code'])
                    ->filter(fn ($mapping) => ctype_digit((string) $mapping->framework_name)
                        && (string) $mapping->framework_name === (string) $mapping->framework_code)
                    ->pluck('id');

                foreach ($legacyNumericIds->chunk(500) as $legacyIdChunk) {
                    DB::table('requirement_framework_mappings')
                        ->whereIn('id', $legacyIdChunk->all())
                        ->delete();
                }
            }

            foreach (array_chunk($records, 200) as $recordChunk) {
                DB::table('requirement_framework_mappings')->insert($recordChunk);
            }
        });
    }

    public function getMappedRows(): int
    {
        return $this->mappedRows;
    }

    public function getMappedPairs(): int
    {
        return $this->mappedPairs;
    }

    public function getMissingRequirementCount(): int
    {
        return $this->missingRequirementCount;
    }

    public function getMissingRequirementIds(): array
    {
        return $this->missingRequirementIds;
    }

    public function getTitleMismatchCount(): int
    {
        return $this->titleMismatchCount;
    }

    public function getTitleMismatchIds(): array
    {
        return $this->titleMismatchIds;
    }

    private function normalizeRow(array|Collection $row): array
    {
        if ($row instanceof Collection) {
            $row = $row->all();
        }

        $normalized = [];
        foreach ($row as $header => $value) {
            $normalized[$this->normalizeHeader((string) $header)] = $value;
        }

        return $normalized;
    }

    private function normalizeHeader(string $header): string
    {
        return strtolower((string) preg_replace('/[^a-z0-9]+/i', '', $header));
    }
}
