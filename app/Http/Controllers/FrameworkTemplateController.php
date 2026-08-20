<?php

namespace App\Http\Controllers;

use App\Models\Framework;
use App\Models\FrameworkTemplate;
use Illuminate\Http\Request;

class FrameworkTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Framework Template
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'framework_type' => [
                'required',
                'string',
                'max:255',
            ],
            'html_content' => [
                'required',
                'string',
            ],
        ]);

        $frameworkType = trim($validated['framework_type']);

        FrameworkTemplate::updateOrCreate(
            [
                'framework_type' => $frameworkType,
            ],
            [
                'name' => $frameworkType . ' Framework Template',
                'framework_type' => $frameworkType,
                'html_content' => $validated['html_content'],
            ]
        );

        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                "Framework template for type '{$frameworkType}' saved successfully."
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Show Framework
    |--------------------------------------------------------------------------
    */

    public function show(string $slug)
    {
        $framework = Framework::where(
            'slug',
            $slug
        )->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Get Template From DATABASE According to Framework Type
        |--------------------------------------------------------------------------
        */

        $template = null;

        if ($framework->framework_type) {
            $template = FrameworkTemplate::where(
                'framework_type',
                $framework->framework_type
            )->first();

            if (!$template) {
                $template = FrameworkTemplate::whereRaw(
                    'LOWER(framework_type) = ?',
                    [strtolower(trim($framework->framework_type))]
                )->first();
            }
        } else {
            $template = FrameworkTemplate::whereNull('framework_type')->first();
        }

        if (!$template) {
            $errorMessage = 'Framework template has not been created yet.';

            return redirect()
                ->route('frameworks.index')
                ->with(
                    'error',
                    $errorMessage
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
        | Framework Placeholders
        |--------------------------------------------------------------------------
        */

        $placeholders = [

            '{{framework_id}}'
                => $framework->framework_id,

            '{{framework_code}}'
                => $framework->framework_code,

            '{{framework_name}}'
                => $framework->name,

            '{{version}}'
                => $framework->version,

            '{{framework_family}}'
                => $framework->framework_family,

            '{{category}}'
                => $framework->category,

            '{{publisher}}'
                => $framework->publisher,

            '{{region}}'
                => $framework->region,

            '{{industry}}'
                => $framework->industry,

            '{{framework_type}}'
                => $framework->framework_type,

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
        | Return HTML
        |--------------------------------------------------------------------------
        */

        return response($html);
    }
}