<?php

namespace App\Imports;

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

        $reqId = $row['requirement_id'];
        $title = $row['requirement_title'];

        $exists = Requirement::where('requirement_id', $reqId)
            ->orWhere('requirement_title', $title)
            ->exists();

        if ($exists) {
            $curr = session('import_duplicates_count', 0);
            session(['import_duplicates_count' => $curr + 1]);
            return null;
        }


        /*
        |--------------------------------------------------------------------------
        | Create Requirement
        |--------------------------------------------------------------------------
        |
        | Control ID is stored directly as a string.
        |
        | Example:
        |
        | GOV-001
        |
        */

        $reqId = $row['requirement_id'] ?? null;
        $controlId = $row['control_id'] ?? null;

        if (empty($controlId) || str_starts_with(trim($controlId), '=') || str_contains($controlId, 'LEFT(') || str_contains($controlId, 'FIND(')) {
            if ($reqId) {
                $controlId = preg_replace('/-R\d+$/i', '', $reqId);
            }
        }

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
                $controlId,


            /*
            |--------------------------------------------------------------------------
            | Requirement Title
            |--------------------------------------------------------------------------
            */

            'requirement_title' =>
                $row['requirement_title'] ?? null,


            /*
            |--------------------------------------------------------------------------
            | Requirement
            |--------------------------------------------------------------------------
            */

            'requirement' =>
                $row['requirement'] ?? null,


            /*
            |--------------------------------------------------------------------------
            | Why this Requirement Exists
            |--------------------------------------------------------------------------
            */

            'why_requirement_exists' =>
                $row['why_this_requirement_exists']
                ?? $row['why_requirement_exists']
                ?? null,


            /*
            |--------------------------------------------------------------------------
            | Implementation Guidance
            |--------------------------------------------------------------------------
            */

            'implementation_guidance' =>
                $row['implementation_guidance']
                ?? null,


            /*
            |--------------------------------------------------------------------------
            | Common Audit Findings
            |--------------------------------------------------------------------------
            */

            'common_audit_findings' =>
                $row['common_audit_findings']
                ?? null,


            /*
            |--------------------------------------------------------------------------
            | Common Mistakes
            |--------------------------------------------------------------------------
            */

            'common_mistakes' =>
                $row['common_mistakes']
                ?? null,


            /*
            |--------------------------------------------------------------------------
            | Best Practices
            |--------------------------------------------------------------------------
            */

            'best_practices' =>
                $row['best_practices']
                ?? null,


            /*
            |--------------------------------------------------------------------------
            | Business Examples
            |--------------------------------------------------------------------------
            */

            'business_examples' =>
                $row['business_examples']
                ?? null,


            /*
            |--------------------------------------------------------------------------
            | Typical Owner
            |--------------------------------------------------------------------------
            */

            'typical_owner' =>
                $row['typical_owner']
                ?? null,

        ]);
    }
}