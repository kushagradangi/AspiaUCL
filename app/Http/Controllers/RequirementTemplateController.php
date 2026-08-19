<?php

namespace App\Http\Controllers;

use App\Models\RequirementTemplate;
use Illuminate\Http\Request;

class RequirementTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store / Replace Requirement Template
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'html_content' => [
                'required',
                'string',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Replace Single Requirement Template
        |--------------------------------------------------------------------------
        |
        | We keep exactly one active Requirement Template.
        | Overwrites and replaces any existing template in place.
        |
        */

        RequirementTemplate::query()->delete();

        RequirementTemplate::create([
            'id' => 1,
            'html_content' => $validated['html_content'],
        ]);

        return redirect()
            ->route('requirements.index')
            ->with(
                'success',
                'Requirement template saved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Show Requirement
    |--------------------------------------------------------------------------
    */

    public function show($requirement_id)
    {
        /*
        |--------------------------------------------------------------------------
        | Find Requirement
        |--------------------------------------------------------------------------
        */

        $requirement = \App\Models\Requirement::where(
            'requirement_id',
            $requirement_id
        )->first();


        if (!$requirement) {

            return redirect()
                ->route('requirements.index')
                ->with(
                    'error',
                    "Requirement '{$requirement_id}' was not found."
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Get Latest Saved Template
        |--------------------------------------------------------------------------
        */

        $template = RequirementTemplate::latest('updated_at')->first();


        if (!$template) {

            return redirect()
                ->route('requirements.index')
                ->with(
                    'error',
                    'Requirement template has not been created yet.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Get HTML
        |--------------------------------------------------------------------------
        */

        $html = $template->html_content;


        /*
        |--------------------------------------------------------------------------
        | Replace Placeholders
        |--------------------------------------------------------------------------
        */

        $placeholders = [

            '{{requirement_id}}'
                => $requirement->requirement_id,

            '{{control_id}}'
                => $requirement->control_id,

            '{{requirement_title}}'
                => $requirement->requirement_title,

            '{{requirement}}'
                => $requirement->requirement,

            '{{why_requirement_exists}}'
                => $requirement->why_requirement_exists,

            '{{implementation_guidance}}'
                => $requirement->implementation_guidance,

            '{{common_audit_findings}}'
                => $requirement->common_audit_findings,

            '{{common_mistakes}}'
                => $requirement->common_mistakes,

            '{{best_practices}}'
                => $requirement->best_practices,

            '{{business_examples}}'
                => $requirement->business_examples,

            '{{typical_owner}}'
                => $requirement->typical_owner,

        ];


        /*
        |--------------------------------------------------------------------------
        | Replace Values
        |--------------------------------------------------------------------------
        */

        foreach ($placeholders as $placeholder => $value) {

            $html = str_replace(
                $placeholder,
                $value ?? '',
                $html
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Return New Template
        |--------------------------------------------------------------------------
        */

        return response($html);
    }
}