<?php

namespace App\Http\Controllers;

use App\Models\Framework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrameworkTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Template File
    |--------------------------------------------------------------------------
    */

    private function templatePath(): string
    {
        return storage_path(
            'app/framework-template.html'
        );
    }


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


        /*
        |--------------------------------------------------------------------------
        | Make sure storage/app exists
        |--------------------------------------------------------------------------
        */

        $directory = storage_path('app');

        if (!File::exists($directory)) {

            File::makeDirectory(
                $directory,
                0755,
                true
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Save HTML Template
        |--------------------------------------------------------------------------
        */

        File::put(
            $this->templatePath(),
            $validated['html_content']
        );


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

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
        /*
        |--------------------------------------------------------------------------
        | Find Framework using slug
        |--------------------------------------------------------------------------
        */

        $framework = Framework::where(
            'slug',
            $slug
        )->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Check Template
        |--------------------------------------------------------------------------
        */

        if (!File::exists($this->templatePath())) {

            return redirect()
                ->route('frameworks.index')
                ->with(
                    'error',
                    'Framework template has not been created yet.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Get HTML Template
        |--------------------------------------------------------------------------
        */

        $html = File::get(
            $this->templatePath()
        );


        /*
        |--------------------------------------------------------------------------
        | Replace Framework Placeholders
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
        | Replace Null Values with Empty String
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