<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\ControlTemplate;
use Illuminate\Http\Request;

class ControlTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Control Template
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
        | Store Single Control Template
        |--------------------------------------------------------------------------
        |
        | We keep one active Control Template.
        | The user does not need to enter a template name.
        |
        */

        ControlTemplate::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'name' => 'Default Control Template',
                'html_content' => $validated['html_content'],
            ]
        );

        return redirect()
            ->route('controls.index')
            ->with(
                'success',
                'Control template saved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Show Control
    |--------------------------------------------------------------------------
    */

    public function show(string $control_id)
    {
        /*
        |--------------------------------------------------------------------------
        | Find Control
        |--------------------------------------------------------------------------
        */

        $control = Control::where(
            'control_id',
            $control_id
        )->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Get Template
        |--------------------------------------------------------------------------
        */

        $template = ControlTemplate::first();


        if (!$template) {

            return redirect()
                ->route('controls.index')
                ->with(
                    'error',
                    'Control template has not been created yet.'
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
        | Control Placeholders
        |--------------------------------------------------------------------------
        |
        | ONLY the 17 fields from your Control Excel sheet are used.
        |
        */

        $placeholders = [

            '{{control_id}}'
                => $control->control_id,

            '{{domain_code}}'
                => $control->domain_code,

            '{{control_name}}'
                => $control->name,

            '{{business_description}}'
                => $control->business_description,

            '{{business_objective}}'
                => $control->business_objective,

            '{{business_owner}}'
                => $control->business_owner,

            '{{control_category}}'
                => $control->control_category,

            '{{criticality}}'
                => $control->criticality,

            '{{applicable_industries}}'
                => $control->applicable_industries,

            '{{applicable_technologies}}'
                => $control->applicable_technologies,

            '{{status}}'
                => $control->status,

            '{{version}}'
                => $control->version,

            '{{control_summary}}'
                => $control->control_summary,

            '{{business_benefits}}'
                => $control->business_benefits,

            '{{business_risks_if_missing}}'
                => $control->business_risks_if_missing,

            '{{primary_stakeholders}}'
                => $control->primary_stakeholders,

            '{{control_type}}'
                => $control->control_type,
        ];


        /*
        |--------------------------------------------------------------------------
        | Replace Null Values
        |--------------------------------------------------------------------------
        */

        $placeholders = array_map(
            function ($value) {

                return $value ?? '';

            },
            $placeholders
        );


        /*
        |--------------------------------------------------------------------------
        | Replace Placeholders
        |--------------------------------------------------------------------------
        */

        $html = str_replace(
            array_keys($placeholders),
            array_values($placeholders),
            $html
        );


        /*
        |--------------------------------------------------------------------------
        | Return Rendered HTML
        |--------------------------------------------------------------------------
        */

        return response($html);
    }
}