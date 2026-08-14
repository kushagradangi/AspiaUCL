<?php

namespace App\Imports;

use App\Models\Control;
use App\Models\Requirement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RequirementImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        /*
        |--------------------------------------------------------------------------
        | Required fields
        |--------------------------------------------------------------------------
        */

        if (
            empty($row['requirement_id']) ||
            empty($row['control_id']) ||
            empty($row['requirement_title']) ||
            empty($row['requirement'])
        ) {
            return null;
        }


        /*
        |--------------------------------------------------------------------------
        | Find Control
        |--------------------------------------------------------------------------
        |
        | Excel contains the Control ID, for example:
        |
        | GOV-001
        |
        | But requirements.control_id stores the actual
        | database ID of the Control.
        |
        */

        $control = Control::where(
            'control_id',
            $row['control_id']
        )->first();


        /*
        |--------------------------------------------------------------------------
        | If Control does not exist, skip this row
        |--------------------------------------------------------------------------
        */

        if (!$control) {
            return null;
        }


        /*
        |--------------------------------------------------------------------------
        | Create Requirement
        |--------------------------------------------------------------------------
        */

        return new Requirement([

            /*
            | Database relationship
            */

            'control_id' => $control->id,


            /*
            | Requirement ID
            */

            'requirement_id' =>
                $row['requirement_id'] ?? null,


            /*
            | Requirement Title
            */

            'requirement_title' =>
                $row['requirement_title'] ?? null,


            /*
            | Requirement
            */

            'requirement' =>
                $row['requirement'] ?? null,


            /*
            | Why this Requirement Exists
            */

            'why_requirement_exists' =>
                $row['why_this_requirement_exists'] ?? null,


            /*
            | Implementation Guidance
            */

            'implementation_guidance' =>
                $row['implementation_guidance'] ?? null,


            /*
            | Common Audit Findings
            */

            'common_audit_findings' =>
                $row['common_audit_findings'] ?? null,


            /*
            | Common Mistakes
            */

            'common_mistakes' =>
                $row['common_mistakes'] ?? null,


            /*
            | Best Practices
            */

            'best_practices' =>
                $row['best_practices'] ?? null,


            /*
            | Business Examples
            */

            'business_examples' =>
                $row['business_examples'] ?? null,


            /*
            | Typical Owner
            */

            'typical_owner' =>
                $row['typical_owner'] ?? null,

        ]);
    }
}