<?php

namespace App\Imports;

use App\Models\Control;
use App\Models\Domain;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ControlImport implements ToModel, WithStartRow
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

    /**
     * Row 1 contains the Excel headings.
     */
    public function startRow(): int
    {
        return 2;
    }


    /**
     * Import one Control row.
     */
    public function model(array $row)
    {
        /*
        |--------------------------------------------------------------------------
        | Skip completely empty rows
        |--------------------------------------------------------------------------
        */

        if (
            empty($row[0]) &&
            empty($row[1]) &&
            empty($row[2])
        ) {
            return null;
        }

        $controlId = $this->value($row, 0);
        $domainCode = $this->value($row, 1);
        $name = $this->value($row, 2);

        if (empty($controlId) || empty($name)) {
            return null;
        }

        $this->currentRow++;

        /*
        |--------------------------------------------------------------------------
        | Find Domain using Domain Code
        |--------------------------------------------------------------------------
        */

        $domain = $domainCode ? Domain::where('domain_code', $domainCode)->first() : null;

        /*
        |--------------------------------------------------------------------------
        | Check for existing control to replace / update
        |--------------------------------------------------------------------------
        */

        $existing = Control::where('control_id', $controlId)->first();

        if ($existing) {
            $existing->update([
                'domain_id' => $domain ? $domain->id : $existing->domain_id,
                'control_id' => $controlId,
                'domain_code' => $domainCode ?? $existing->domain_code,
                'name' => $name,
                'display_order' => $this->currentRow,
                'business_description' => $this->value($row, 3) ?? $existing->business_description,
                'business_objective' => $this->value($row, 4) ?? $existing->business_objective,
                'business_owner' => $this->value($row, 5) ?? $existing->business_owner,
                'control_category' => $this->value($row, 6) ?? $existing->control_category,
                'criticality' => $this->value($row, 7) ?? $existing->criticality,
                'applicable_industries' => $this->value($row, 8) ?? $existing->applicable_industries,
                'applicable_technologies' => $this->value($row, 9) ?? $existing->applicable_technologies,
                'status' => $this->value($row, 10) ?: ($existing->status ?: 'Active'),
                'version' => $this->value($row, 11) ?? $existing->version,
                'control_summary' => $this->value($row, 12) ?? $existing->control_summary,
                'business_benefits' => $this->value($row, 13) ?? $existing->business_benefits,
                'business_risks_if_missing' => $this->value($row, 14) ?? $existing->business_risks_if_missing,
                'primary_stakeholders' => $this->value($row, 15) ?? $existing->primary_stakeholders,
                'control_type' => $this->value($row, 16) ?? $existing->control_type,
            ]);

            $this->updatedCount++;
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Skip new control if Domain doesn't exist
        |--------------------------------------------------------------------------
        */

        if (!$domain) {
            return null;
        }

        $this->createdCount++;

        /*
        |--------------------------------------------------------------------------
        | Create Control
        |--------------------------------------------------------------------------
        */

        return new Control([

            // Relationship
            'domain_id' =>
                $domain->id,

            // 1. Control ID
            'control_id' =>
                $controlId,

            // 2. Domain Code
            'domain_code' =>
                $domainCode,

            // 3. Control Name
            'name' =>
                $name,

            // Display Order (Excel row sequence)
            'display_order' =>
                $this->currentRow,

            // 4. Business Description
            'business_description' =>
                $this->value($row, 3),

            // 5. Business Objective
            'business_objective' =>
                $this->value($row, 4),

            // 6. Business Owner
            'business_owner' =>
                $this->value($row, 5),

            // 7. Control Category
            'control_category' =>
                $this->value($row, 6),

            // 8. Criticality
            'criticality' =>
                $this->value($row, 7),

            // 9. Applicable Industries
            'applicable_industries' =>
                $this->value($row, 8),

            // 10. Applicable Technologies
            'applicable_technologies' =>
                $this->value($row, 9),

            // 11. Status
            'status' =>
                $this->value($row, 10) ?: 'Active',

            // 12. Version
            'version' =>
                $this->value($row, 11),

            // 13. Control Summary
            'control_summary' =>
                $this->value($row, 12),

            // 14. Business Benefits
            'business_benefits' =>
                $this->value($row, 13),

            // 15. Business Risks if Missing
            'business_risks_if_missing' =>
                $this->value($row, 14),

            // 16. Primary Stakeholders
            'primary_stakeholders' =>
                $this->value($row, 15),

            // 17. Control Type
            'control_type' =>
                $this->value($row, 16),
        ]);
    }


    /**
     * Safely retrieve an Excel column.
     */
    private function value(
        array $row,
        int $index
    ): ?string {

        if (!isset($row[$index])) {
            return null;
        }

        $value = trim(
            (string) $row[$index]
        );

        return $value === ''
            ? null
            : $value;
    }
}