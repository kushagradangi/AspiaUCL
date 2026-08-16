<?php

namespace App\Imports;

use App\Models\Control;
use App\Models\Domain;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ControlImport implements ToModel, WithStartRow
{
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


        /*
        |--------------------------------------------------------------------------
        | Get Domain Code
        |--------------------------------------------------------------------------
        */

        $domainCode = $this->value($row, 1);

        if (!$domainCode) {
            return null;
        }


        /*
        |--------------------------------------------------------------------------
        | Find Domain using Domain Code
        |--------------------------------------------------------------------------
        */

        $domain = Domain::where(
            'domain_code',
            $domainCode
        )->first();


        /*
        |--------------------------------------------------------------------------
        | Skip if Domain doesn't exist
        |--------------------------------------------------------------------------
        */

        if (!$domain) {
            return null;
        }


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
                $this->value($row, 0),

            // 2. Domain Code
            'domain_code' =>
                $this->value($row, 1),

            // 3. Control Name
            'name' =>
                $this->value($row, 2),

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