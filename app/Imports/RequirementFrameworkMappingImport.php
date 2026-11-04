<?php

namespace App\Imports;

use App\Models\Framework;
use App\Models\Requirement;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use RuntimeException;

class RequirementFrameworkMappingImport implements ToCollection, WithHeadingRow
{
    public const FRAMEWORK_COLUMNS = [
        // ISO 27001
        'ISO 27001:2022 Section / Subsection & Title' => 'ISO27001',

        // ISO 27002
        'ISO/IEC 27002:2022 Section / Subsection Mapping' => 'ISO27002',

        // ISO 22301
        'ISO 22301:2019 Titles' => 'ISO22301',

        // ISO 27701
        'ISO27701 (2019)' => 'ISO27701',
        'ISO27701 Titles (2019)' => 'ISO27701',

        // ISO 27007
        'ISO/IEC 27007:2020 Section / Subsection (Title)' => 'ISO27007',

        // ISO 31000
        'ISO 31000:2018 Mapping' => 'ISO31000',

        // ISO 42001
        'ISO/IEC 42001:2023 Clause Mapping' => 'ISO42001',
        'ISO/IEC 42001:2023 Annex A Mapping' => 'ISO42001',

        // ISO 23894
        'ISO 23894:2023 Titles' => 'ISO23894',

        // PCI DSS
        'PCI DSS 4.0.1' => 'PCI-DSS',

        // SEBI CSCRF
        'SEBI CSCRF Section / Subsection' => 'SEBI-CSCRF',

        // NIST CSF
        'NIST CSF 2.0' => 'NIST-CSF',
        'NIST CSF 2.0 ' => 'NIST-CSF',

        // NIST SP 800-53
        'NIST SP 800-53 Rev.5 Section' => 'NIST80053',
        'NIST SP 800-53 Rev.5 Subsection / Control' => 'NIST80053',

        // NIST SP 800-63-4
        'NIST SP 800-63-4 Section / Subsection Mapping' => 'NIST80063',

        // NIST SP 800-37
        'NIST SP 800-37 Rev. 2 – Section / Task Mapping' => 'NIST80037',

        // NPCI / UPI (both updated and legacy headers)
        'UPI Consolidated Circular 2026 – Section/Subsection Mapping' => 'NPCI-ISR',
        'NPCI Comprehensive Mobile Application Security Framework for UPI (2025)' => 'NPCI-ISR',
        'UPI Framework Section(s)' => 'NPCI-ISR',
        'UPI Framework Subsection(s)' => 'NPCI-ISR',

        // RBI CSF & Directions (both updated and legacy headers)
        'RBI Cyber Security Framework 2016 Mapping' => 'RBI-CSF',
        'RBI (AIFIs – Cybersecurity, Technology: Risk, Resilience and Assurance Framework) Directions, 2026' => 'RBI-CSF',
        'RBI Authentication Mechanisms for Digital Payment Transactions Directions, 2025' => 'RBI-CSF',

        // CIS Controls
        'CIS Controls v8 Mapping' => 'CIS-V8',

        // DORA
        'DORA Subsection' => 'DORA',

        // IRDAI
        'IRDAI Cyber Security Guidelines 2023' => 'IRDAI',

        // HIPAA
        'HIPAA Security Rule 2025 NPRM Mapping' => 'HIPAA',

        // NIS2
        'NIS2 Titles' => 'NIS2',

        // COBIT
        'COBIT 2019' => 'COBIT2019',
        'COBIT 2019 ' => 'COBIT2019',

        // DPDPA
        'DPDPA Section(s) and Section Title(s)' => 'DPDP',

        // GDPR
        'GDPR Mapping' => 'GDPR',

        // CERT-In
        'CERT-In Directions 2022' => 'CERT-IN',

        // SOC 2
        'SOC 2 Section / Subsection & Title' => 'SOC2',
    ];

    public const KNOWN_FRAMEWORKS = [
        'ISO27007' => [
            'name' => 'ISO/IEC 27007',
            'framework_code' => 'ISO27007',
            'version' => '2020',
            'framework_family' => 'ISO',
            'category' => 'Information Security Audit',
            'publisher' => 'ISO',
            'region' => 'Global',
            'industry' => 'All',
            'framework_type' => 'Standard',
        ],
        'ISO31000' => [
            'name' => 'ISO 31000',
            'framework_code' => 'ISO31000',
            'version' => '2018',
            'framework_family' => 'ISO',
            'category' => 'Risk Management',
            'publisher' => 'ISO',
            'region' => 'Global',
            'industry' => 'All',
            'framework_type' => 'Standard',
        ],
        'ISO42001' => [
            'name' => 'ISO/IEC 42001',
            'framework_code' => 'ISO42001',
            'version' => '2023',
            'framework_family' => 'ISO',
            'category' => 'Artificial Intelligence',
            'publisher' => 'ISO',
            'region' => 'Global',
            'industry' => 'All',
            'framework_type' => 'Standard',
        ],
        'ISO23894' => [
            'name' => 'ISO/IEC 23894',
            'framework_code' => 'ISO23894',
            'version' => '2023',
            'framework_family' => 'ISO',
            'category' => 'AI Risk Management',
            'publisher' => 'ISO',
            'region' => 'Global',
            'industry' => 'All',
            'framework_type' => 'Standard',
        ],
        'NIST80063' => [
            'name' => 'NIST SP 800-63-4',
            'framework_code' => 'NIST80063',
            'version' => 'Rev. 4',
            'framework_family' => 'NIST',
            'category' => 'Digital Identity',
            'publisher' => 'NIST',
            'region' => 'United States',
            'industry' => 'All',
            'framework_type' => 'Standard',
        ],
        'NIST80037' => [
            'name' => 'NIST SP 800-37',
            'framework_code' => 'NIST80037',
            'version' => 'Rev. 2',
            'framework_family' => 'NIST',
            'category' => 'Risk Management',
            'publisher' => 'NIST',
            'region' => 'United States',
            'industry' => 'All',
            'framework_type' => 'Standard',
        ],
    ];

    public const IGNORED_COLUMNS = [
        'requirementid',
        'requirementtitle',
        'mappingjustification',
        'clausebyclausevalidationjustification',
        'justification',
        'validation',
        'notes',
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
        $allowedHeaders = array_fill_keys(self::IGNORED_COLUMNS, true);

        foreach (self::FRAMEWORK_COLUMNS as $label => $frameworkCode) {
            $key = $this->normalizeHeader($label);
            $allowedHeaders[$key] = true;
            if (isset($headers[$key])) {
                $columnsByFramework[$frameworkCode] ??= [];
                if (!in_array($key, $columnsByFramework[$frameworkCode], true)) {
                    $columnsByFramework[$frameworkCode][] = $key;
                }
            }
        }

        if ($columnsByFramework === []) {
            throw new RuntimeException('The mapping workbook must contain at least one valid framework column.');
        }

        // Validate that no unrecognized populated columns exist in the rows
        foreach ($rows as $row) {
            foreach ($row as $header => $value) {
                $headerStr = trim((string) $header);
                // Ignore numeric headers from blank trailing columns in spreadsheet (e.g. column 36)
                if (is_numeric($headerStr)) {
                    continue;
                }
                $key = $this->normalizeHeader($headerStr);
                if (!isset($allowedHeaders[$key]) && trim((string) $value) !== '') {
                    throw new RuntimeException(
                        "The mapping workbook has an unrecognized populated column: \"{$header}\"."
                    );
                }
            }
        }

        $frameworkCodes = array_keys($columnsByFramework);
        $allFrameworks = Framework::all();
        $frameworksByCode = [];

        foreach ($frameworkCodes as $code) {
            $frameworksByCode[$code] = $this->findOrCreateFramework($code, $allFrameworks);
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
            $searchIds = array_values(array_unique(array_merge(
                $idChunk,
                array_map('strtoupper', $idChunk),
                array_map('strtolower', $idChunk)
            )));
            Requirement::query()
                ->whereIn('requirement_id', $searchIds)
                ->get(['requirement_id', 'requirement_title'])
                ->each(fn (Requirement $requirement) => $requirements->put(
                    strtoupper(trim($requirement->requirement_id)),
                    $requirement
                ));
        }

        // Validate that all requirements in the mapping strictly exist in requirements
        $validationErrors = [];
        foreach ($rows as $index => $row) {
            $values = $this->normalizeRow($row);
            $requirementId = trim((string) ($values['requirementid'] ?? ''));
            if ($requirementId === '') {
                continue;
            }

            $requirementKey = strtoupper($requirementId);
            if (!$requirements->has($requirementKey)) {
                $excelRow = $index + 2;
                $sourceTitle = trim((string) ($values['requirementtitle'] ?? ''));
                if ($sourceTitle !== '') {
                    $validationErrors[] = "Row {$excelRow}: Requirement \"{$sourceTitle}\" ({$requirementId}) does not exist in requirements.";
                } else {
                    $validationErrors[] = "Row {$excelRow}: Requirement \"{$requirementId}\" does not exist in requirements.";
                }
            }
        }

        if (!empty($validationErrors)) {
            throw ValidationException::withMessages([
                'import' => $validationErrors,
            ]);
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
        $frameworkCodes = array_map(fn (Framework $framework) => $framework->framework_code, $frameworksByCode);
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

    private function findOrCreateFramework(string $code, Collection &$allFrameworks): Framework
    {
        $normCode = $this->normalizeCode($code);

        // 1. Check existing in-memory frameworks by code or name
        foreach ($allFrameworks as $existing) {
            if ($this->normalizeCode((string) $existing->framework_code) === $normCode
                || $this->normalizeCode((string) $existing->name) === $normCode) {
                return $existing;
            }
        }

        // 2. Query DB directly if not found in in-memory collection
        $dbMatch = Framework::query()
            ->where('framework_code', $code)
            ->orWhereRaw('REPLACE(REPLACE(UPPER(framework_code), "-", ""), " ", "") = ?', [$normCode])
            ->first();

        if ($dbMatch) {
            $allFrameworks->push($dbMatch);
            return $dbMatch;
        }

        // 3. Known framework fallback: auto-create
        $known = self::KNOWN_FRAMEWORKS[$code] ?? null;
        $name = $known['name'] ?? $code;
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;
        while (Framework::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        // Determine next framework_id (FW-xxx)
        $maxNum = 0;
        foreach (Framework::pluck('framework_id') as $fwId) {
            if (preg_match('/FW-(\d+)/i', (string) $fwId, $m)) {
                $num = (int) $m[1];
                if ($num > $maxNum) {
                    $maxNum = $num;
                }
            }
        }
        $nextFrameworkId = 'FW-' . str_pad((string) ($maxNum + 1), 3, '0', STR_PAD_LEFT);
        $nextDisplayOrder = (Framework::max('display_order') ?? 0) + 1;

        $created = Framework::create([
            'framework_id' => $nextFrameworkId,
            'framework_code' => $code,
            'name' => $name,
            'slug' => $slug,
            'version' => $known['version'] ?? null,
            'framework_family' => $known['framework_family'] ?? null,
            'category' => $known['category'] ?? null,
            'publisher' => $known['publisher'] ?? null,
            'region' => $known['region'] ?? null,
            'industry' => $known['industry'] ?? null,
            'framework_type' => $known['framework_type'] ?? 'Standard',
            'display_order' => $nextDisplayOrder,
        ]);

        $allFrameworks->push($created);
        return $created;
    }

    private function normalizeCode(string $code): string
    {
        return strtoupper((string) preg_replace('/[^a-z0-9]+/i', '', $code));
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
