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
            'html_content' => [
                'required',
                'string',
            ],
        ]);

        FrameworkTemplate::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'name' => 'Default Framework Template',
                'html_content' => $validated['html_content'],
            ]
        );

        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                'Framework template saved successfully.'
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
        | Get Template From DATABASE
        |--------------------------------------------------------------------------
        */

        $template = FrameworkTemplate::first();


        if (!$template) {

            return redirect()
                ->route('frameworks.index')
                ->with(
                    'error',
                    'Framework template has not been created yet.'
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