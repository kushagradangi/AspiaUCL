<?php

namespace App\Imports;

use App\Models\Framework;
use App\Models\Requirement;
use App\Models\RequirementFrameworkMapping;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithColumnLimit;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithReadFilter;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class RequirementColumnFilter implements IReadFilter
{
    private int $maxColIndex;

    public function __construct(int $maxColIndex = 40)
    {
        $this->maxColIndex = $maxColIndex;
    }

    public function readCell(string $columnAddress, int $row, string $worksheetName = ''): bool
    {
        return Coordinate::columnIndexFromString($columnAddress) <= $this->maxColIndex;
    }
}

class RequirementImport implements ToCollection, WithHeadingRow, WithColumnLimit, WithReadFilter
{
    private int $createdCount = 0;
    private int $updatedCount = 0;

    public function getCreatedCount(): int
    {
        return $this->createdCount;
    }

    public function getUpdatedCount(): int
    {
        return $this->updatedCount;
    }

    /**
     * Limit the maximum column read by Maatwebsite to prevent reading
     * hundreds of phantom/empty columns (e.g. columns out to SF).
     */
    public function endColumn(): string
    {
        return 'AN'; // Column 40 (covers all requirement fields + up to 28 framework columns)
    }

    /**
     * Only allocate cell objects up to column 40 in PhpSpreadsheet, saving hundreds of megabytes of RAM.
     */
    public function readFilter(): IReadFilter
    {
        return new RequirementColumnFilter(40);
    }

    public function collection(Collection $rows): void
    {
        if ($rows->isEmpty()) {
            return;
        }

        // Increase limits for processing large spreadsheets
        if (function_exists('set_time_limit')) {
            @set_time_limit(600);
        }
        @ini_set('memory_limit', '512M');

        // 1. Preload existing requirements by uppercase requirement_id
        $existing = Requirement::all()->keyBy(fn ($r) => strtoupper(trim((string)$r->requirement_id)));

        // 2. Preload existing slugs for fast O(1) in-memory uniqueness checking
        $usedSlugs = DB::table('requirements')->whereNotNull('slug')->pluck('slug')->flip()->toArray();

        // 3. Preload all frameworks into memory
        $frameworks = Framework::all();
        $fwByName = [];
        $fwByCode = [];
        foreach ($frameworks as $fw) {
            $fwByName[strtolower(trim((string)$fw->name))] = $fw;
            if ($fw->framework_code) {
                $fwByCode[strtolower(trim((string)$fw->framework_code))] = $fw;
            }
        }

        $standardKeys = [
            'requirement_id', 'req_id', 'id',
            'control_id', 'control',
            'requirement_title', 'title', 'requirement_name', 'name',
            'requirement', 'requirement_statement', 'statement', 'description',
            'why_this_requirement_exists', 'why_requirement_exists',
            'implementation_guidance',
            'common_audit_findings',
            'common_mistakes',
            'best_practices',
            'business_examples',
            'typical_owner',
            'display_order',
            'created_at', 'updated_at',
        ];

        $knownFrameworks = [
            'iso_iec_27001_2022' => ['name' => 'ISO/IEC 27001:2022', 'code' => 'ISO-27001'],
            'isoiec_27001_2022'  => ['name' => 'ISO/IEC 27001:2022', 'code' => 'ISO-27001'],
            'iso_27001'          => ['name' => 'ISO/IEC 27001:2022', 'code' => 'ISO-27001'],
            'gdpr'               => ['name' => 'GDPR', 'code' => 'GDPR'],
            'irdai_cs_guidelines_2023' => ['name' => 'IRDAI CS Guidelines 2023', 'code' => 'IRDAI-2023'],
            'rbi_csf_2016'       => ['name' => 'RBI CSF 2016', 'code' => 'RBI-CSF'],
            'sebi_cscrf'         => ['name' => 'SEBI CSCRF', 'code' => 'SEBI-CSCRF'],
            'dora'               => ['name' => 'DORA', 'code' => 'DORA'],
            'dpdpa_2023'         => ['name' => 'DPDPA 2023', 'code' => 'DPDPA-2023'],
            'hipaa_security_rule_2025_proposed' => ['name' => 'HIPAA Security Rule 2025 Proposed', 'code' => 'HIPAA-2025'],
            'hipaa'              => ['name' => 'HIPAA Security Rule 2025 Proposed', 'code' => 'HIPAA-2025'],
            'iso_iec_27002_2022' => ['name' => 'ISO/IEC 27002:2022', 'code' => 'ISO-27002'],
            'isoiec_27002_2022'  => ['name' => 'ISO/IEC 27002:2022', 'code' => 'ISO-27002'],
            'iso_27002'          => ['name' => 'ISO/IEC 27002:2022', 'code' => 'ISO-27002'],
            'nis2'               => ['name' => 'NIS2', 'code' => 'NIS2'],
        ];

        $now = now();
        $mappingsToInsert = [];
        $currentRow = 0;

        DB::transaction(function () use (
            $rows,
            $existing,
            &$usedSlugs,
            $fwByName,
            $fwByCode,
            $standardKeys,
            $knownFrameworks,
            $now,
            &$mappingsToInsert,
            &$currentRow
        ) {
            foreach ($rows as $row) {
                $rowArray = $row instanceof Collection ? $row->toArray() : (array) $row;
                $rowNormalized = [];
                foreach ($rowArray as $k => $v) {
                    $normK = strtolower(trim((string)$k));
                    $rowNormalized[$normK] = $v;
                }

                $reqId = $rowNormalized['requirement_id'] ?? $rowNormalized['req_id'] ?? $rowNormalized['id'] ?? null;
                $reqId = $reqId ? trim((string)$reqId) : null;

                $title = $rowNormalized['requirement_title'] ?? $rowNormalized['title'] ?? $rowNormalized['requirement_name'] ?? null;
                $title = $title ? trim((string)$title) : null;

                $statement = $rowNormalized['requirement'] ?? $rowNormalized['requirement_statement'] ?? $rowNormalized['statement'] ?? $rowNormalized['description'] ?? null;
                $statement = $statement ? trim((string)$statement) : null;

                if (empty($reqId) || empty($title) || empty($statement)) {
                    continue;
                }

                $currentRow++;

                // Determine or clean control ID
                $controlId = $rowNormalized['control_id'] ?? $rowNormalized['control'] ?? null;
                $controlId = $controlId ? trim((string)$controlId) : null;
                if (empty($controlId) || str_starts_with($controlId, '=') || str_contains($controlId, 'LEFT(') || str_contains($controlId, 'FIND(')) {
                    $controlId = preg_replace('/-R\d+$/i', '', $reqId);
                }

                $why = $rowNormalized['why_this_requirement_exists'] ?? $rowNormalized['why_requirement_exists'] ?? null;
                $guidance = $rowNormalized['implementation_guidance'] ?? null;
                $findings = $rowNormalized['common_audit_findings'] ?? null;
                $mistakes = $rowNormalized['common_mistakes'] ?? null;
                $bestPractices = $rowNormalized['best_practices'] ?? null;
                $businessExamples = $rowNormalized['business_examples'] ?? null;
                $typicalOwner = $rowNormalized['typical_owner'] ?? null;

                $existingModel = $existing->get(strtoupper($reqId));

                if ($existingModel) {
                    $slug = $existingModel->slug;
                    if (empty($slug)) {
                        $baseSlug = Str::slug($title) ?: Str::slug($reqId);
                        $slug = $baseSlug;
                        $c = 1;
                        while (isset($usedSlugs[$slug])) {
                            $slug = $baseSlug . '-' . $c++;
                        }
                        $usedSlugs[$slug] = true;
                    }

                    $existingModel->update([
                        'control_id' => $controlId ?: $existingModel->control_id,
                        'requirement_title' => $title,
                        'requirement' => $statement,
                        'display_order' => $currentRow,
                        'slug' => $slug,
                        'why_requirement_exists' => $why !== null ? trim((string)$why) : $existingModel->why_requirement_exists,
                        'implementation_guidance' => $guidance !== null ? trim((string)$guidance) : $existingModel->implementation_guidance,
                        'common_audit_findings' => $findings !== null ? trim((string)$findings) : $existingModel->common_audit_findings,
                        'common_mistakes' => $mistakes !== null ? trim((string)$mistakes) : $existingModel->common_mistakes,
                        'best_practices' => $bestPractices !== null ? trim((string)$bestPractices) : $existingModel->best_practices,
                        'business_examples' => $businessExamples !== null ? trim((string)$businessExamples) : $existingModel->business_examples,
                        'typical_owner' => $typicalOwner !== null ? trim((string)$typicalOwner) : $existingModel->typical_owner,
                    ]);

                    $this->updatedCount++;
                } else {
                    $baseSlug = Str::slug($title) ?: Str::slug($reqId);
                    $slug = $baseSlug;
                    $c = 1;
                    while (isset($usedSlugs[$slug])) {
                        $slug = $baseSlug . '-' . $c++;
                    }
                    $usedSlugs[$slug] = true;

                    $newReq = Requirement::create([
                        'requirement_id' => $reqId,
                        'control_id' => $controlId ?? '',
                        'requirement_title' => $title,
                        'requirement' => $statement,
                        'display_order' => $currentRow,
                        'slug' => $slug,
                        'why_requirement_exists' => $why !== null ? trim((string)$why) : null,
                        'implementation_guidance' => $guidance !== null ? trim((string)$guidance) : null,
                        'common_audit_findings' => $findings !== null ? trim((string)$findings) : null,
                        'common_mistakes' => $mistakes !== null ? trim((string)$mistakes) : null,
                        'best_practices' => $bestPractices !== null ? trim((string)$bestPractices) : null,
                        'business_examples' => $businessExamples !== null ? trim((string)$businessExamples) : null,
                        'typical_owner' => $typicalOwner !== null ? trim((string)$typicalOwner) : null,
                    ]);

                    $existing->put(strtoupper($reqId), $newReq);
                    $this->createdCount++;
                }

                // Collect framework mappings if present in row
                foreach ($rowNormalized as $key => $val) {
                    $val = trim((string) $val);
                    if (
                        $val === '' || $val === '—' || $val === '-'
                        || is_numeric($key)
                        || str_starts_with($key, '__empty')
                        || in_array($key, $standardKeys, true)
                    ) {
                        continue;
                    }

                    $fwInfo = $knownFrameworks[$key] ?? null;
                    $fwName = $fwInfo['name'] ?? ucwords(str_replace('_', ' ', $key));
                    $fwCode = $fwInfo['code'] ?? strtoupper($key);

                    $fwObj = $fwByName[strtolower($fwName)] ?? $fwByCode[strtolower($fwCode)] ?? null;

                    $mappingsToInsert[] = [
                        'requirement_id' => $reqId,
                        'framework_name' => $fwName,
                        'framework_code' => $fwCode,
                        'framework_id'   => $fwObj?->id,
                        'clause_reference' => $val,
                        'created_at'     => $now,
                        'updated_at'     => $now,
                    ];
                }
            }

            // Bulk upsert framework mappings in chunks of 500
            if (!empty($mappingsToInsert)) {
                foreach (array_chunk($mappingsToInsert, 500) as $chunk) {
                    RequirementFrameworkMapping::upsert(
                        $chunk,
                        ['requirement_id', 'framework_name'],
                        ['framework_code', 'framework_id', 'clause_reference', 'updated_at']
                    );
                }
            }
        });
    }
}