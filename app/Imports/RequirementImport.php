<?php

namespace App\Imports;

use App\Models\Requirement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RequirementImport implements ToModel, WithHeadingRow
{
    private int $createdCount = 0;
    private int $updatedCount = 0;
    private int $currentRow = 0;

    public function getCreatedCount(): int
    {
        return $this->createdCount;
    }

    public function getUpdatedCount(): int
    {
        return $this->updatedCount;
    }

    public function model(array $row)
    {
        /*
        |--------------------------------------------------------------------------
        | Required fields
        |--------------------------------------------------------------------------
        */

        $reqId = isset($row['requirement_id']) ? trim((string)$row['requirement_id']) : null;
        $title = isset($row['requirement_title']) ? trim((string)$row['requirement_title']) : null;
        $reqStatement = isset($row['requirement']) ? trim((string)$row['requirement']) : null;

        if (
            empty($reqId) ||
            empty($title) ||
            empty($reqStatement)
        ) {
            return null;
        }

        $this->currentRow++;

        $controlId = isset($row['control_id']) ? trim((string)$row['control_id']) : null;

        if (empty($controlId) || str_starts_with($controlId, '=') || str_contains($controlId, 'LEFT(') || str_contains($controlId, 'FIND(')) {
            if ($reqId) {
                $controlId = preg_replace('/-R\d+$/i', '', $reqId);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Check for existing requirement to replace / update
        |--------------------------------------------------------------------------
        */

        $existing = Requirement::where('requirement_id', $reqId)->first();

        if ($existing) {
            $existing->update([
                'requirement_id' => $reqId,
                'control_id' => $controlId ?? $existing->control_id,
                'requirement_title' => $title,
                'requirement' => $reqStatement,
                'display_order' => $this->currentRow,
                'why_requirement_exists' => isset($row['why_this_requirement_exists'])
                    ? trim((string)$row['why_this_requirement_exists'])
                    : (isset($row['why_requirement_exists']) ? trim((string)$row['why_requirement_exists']) : $existing->why_requirement_exists),
                'implementation_guidance' => isset($row['implementation_guidance'])
                    ? trim((string)$row['implementation_guidance'])
                    : $existing->implementation_guidance,
                'common_audit_findings' => isset($row['common_audit_findings'])
                    ? trim((string)$row['common_audit_findings'])
                    : $existing->common_audit_findings,
                'common_mistakes' => isset($row['common_mistakes'])
                    ? trim((string)$row['common_mistakes'])
                    : $existing->common_mistakes,
                'best_practices' => isset($row['best_practices'])
                    ? trim((string)$row['best_practices'])
                    : $existing->best_practices,
                'business_examples' => isset($row['business_examples'])
                    ? trim((string)$row['business_examples'])
                    : $existing->business_examples,
                'typical_owner' => isset($row['typical_owner'])
                    ? trim((string)$row['typical_owner'])
                    : $existing->typical_owner,
            ]);

            $this->syncFrameworkMappings($reqId, $row);

            $this->updatedCount++;
            return null;
        }

        $this->createdCount++;

        $this->syncFrameworkMappings($reqId, $row);

        /*
        |--------------------------------------------------------------------------
        | Create New Requirement
        |--------------------------------------------------------------------------
        */

        return new Requirement([

            /*
            |--------------------------------------------------------------------------
            | Requirement ID
            |--------------------------------------------------------------------------
            */

            'requirement_id' =>
                $reqId,


            /*
            |--------------------------------------------------------------------------
            | Control ID
            |--------------------------------------------------------------------------
            */

            'control_id' =>
                $controlId ?? '',


            /*
            |--------------------------------------------------------------------------
            | Requirement Title
            |--------------------------------------------------------------------------
            */

            'requirement_title' =>
                $title,


            /*
            |--------------------------------------------------------------------------
            | Requirement
            |--------------------------------------------------------------------------
            */

            'requirement' =>
                $reqStatement,


            /*
            |--------------------------------------------------------------------------
            | Display Order (Excel Row Order)
            |--------------------------------------------------------------------------
            */

            'display_order' =>
                $this->currentRow,


            /*
            |--------------------------------------------------------------------------
            | Why this Requirement Exists
            |--------------------------------------------------------------------------
            */

            'why_requirement_exists' =>
                isset($row['why_this_requirement_exists'])
                    ? trim((string)$row['why_this_requirement_exists'])
                    : (isset($row['why_requirement_exists']) ? trim((string)$row['why_requirement_exists']) : null),


            /*
            |--------------------------------------------------------------------------
            | Implementation Guidance
            |--------------------------------------------------------------------------
            */

            'implementation_guidance' =>
                isset($row['implementation_guidance'])
                    ? trim((string)$row['implementation_guidance'])
                    : null,


            /*
            |--------------------------------------------------------------------------
            | Common Audit Findings
            |--------------------------------------------------------------------------
            */

            'common_audit_findings' =>
                isset($row['common_audit_findings'])
                    ? trim((string)$row['common_audit_findings'])
                    : null,


            /*
            |--------------------------------------------------------------------------
            | Common Mistakes
            |--------------------------------------------------------------------------
            */

            'common_mistakes' =>
                isset($row['common_mistakes'])
                    ? trim((string)$row['common_mistakes'])
                    : null,


            /*
            |--------------------------------------------------------------------------
            | Best Practices
            |--------------------------------------------------------------------------
            */

            'best_practices' =>
                isset($row['best_practices'])
                    ? trim((string)$row['best_practices'])
                    : null,


            /*
            |--------------------------------------------------------------------------
            | Business Examples
            |--------------------------------------------------------------------------
            */

            'business_examples' =>
                isset($row['business_examples'])
                    ? trim((string)$row['business_examples'])
                    : null,


            /*
            |--------------------------------------------------------------------------
            | Typical Owner
            |--------------------------------------------------------------------------
            */

            'typical_owner' =>
                isset($row['typical_owner'])
                    ? trim((string)$row['typical_owner'])
                    : null,

        ]);
    }

    /**
     * Extract and synchronize framework mappings from row columns.
     */
    private function syncFrameworkMappings(string $reqId, array $row): void
    {
        $standardKeys = [
            'requirement_id',
            'control_id',
            'requirement_title',
            'requirement',
            'why_this_requirement_exists',
            'why_requirement_exists',
            'implementation_guidance',
            'common_audit_findings',
            'common_mistakes',
            'best_practices',
            'business_examples',
            'typical_owner',
            'display_order',
            'id',
            'created_at',
            'updated_at',
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

        foreach ($row as $key => $val) {
            $val = trim((string) $val);
            if (empty($val) || $val === '—' || $val === '-' || in_array(strtolower($key), $standardKeys)) {
                continue;
            }

            $keyLower = strtolower($key);
            $fwName = $knownFrameworks[$keyLower]['name'] ?? ucwords(str_replace('_', ' ', $key));
            $fwCode = $knownFrameworks[$keyLower]['code'] ?? strtoupper($key);

            $framework = \App\Models\Framework::where('name', 'like', "%{$fwName}%")
                ->orWhere('framework_code', 'like', "%{$fwCode}%")
                ->first();

            \App\Models\RequirementFrameworkMapping::updateOrCreate(
                [
                    'requirement_id' => $reqId,
                    'framework_name' => $fwName,
                ],
                [
                    'framework_code' => $fwCode,
                    'framework_id' => $framework?->id,
                    'clause_reference' => $val,
                ]
            );
        }
    }
}