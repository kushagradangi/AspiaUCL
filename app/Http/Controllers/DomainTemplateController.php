<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\DomainTemplate;
use Illuminate\Http\Request;

class DomainTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Domain Template
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
        | Store / Update Single Domain Template
        |--------------------------------------------------------------------------
        |
        | We are keeping one active Domain Template.
        | The user does not need to enter a template name.
        |
        */

        DomainTemplate::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'name' => 'Default Domain Template',
                'html_content' => $validated['html_content'],
            ]
        );


        return redirect()
            ->route('domains.index')
            ->with(
                'success',
                'Domain template saved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Show Domain
    |--------------------------------------------------------------------------
    */

    public function show(string $slug)
    {
        /*
        |--------------------------------------------------------------------------
        | Find Selected Domain
        |--------------------------------------------------------------------------
        */

        $domain = Domain::where(
            'slug',
            $slug
        )->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Get Template From Database
        |--------------------------------------------------------------------------
        */

        $template = DomainTemplate::first();


        if (!$template) {

            return redirect()
                ->route('domains.index')
                ->with(
                    'error',
                    'Domain template has not been created yet.'
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
        | Domain Placeholders
        |--------------------------------------------------------------------------
        */

        $placeholders = [

            '{{domain_id}}'
                => $domain->domain_id,

            '{{domain_code}}'
                => $domain->domain_code,

            '{{domain_name}}'
                => $domain->name,

            '{{slug}}'
                => $domain->slug,

            '{{purpose}}'
                => $domain->purpose,

            '{{scope}}'
                => $domain->scope,

            '{{business_owner}}'
                => $domain->business_owner,

            '{{description}}'
                => $domain->description,

            '{{display_order}}'
                => $domain->display_order,

            '{{status}}'
                => $domain->status,

            '{{version}}'
                => $domain->version,

            '{{short_overview}}'
                => $domain->short_overview,

            '{{business_objectives}}'
                => $domain->business_objectives,

            '{{business_risks}}'
                => $domain->business_risks,

            '{{key_capabilities}}'
                => $domain->key_capabilities,

            '{{typical_stakeholders}}'
                => $domain->typical_stakeholders,

            '{{applicable_industries}}'
                => $domain->applicable_industries,

            '{{applicable_technologies}}'
                => $domain->applicable_technologies,

            '{{keywords}}'
                => $domain->keywords,

            '{{tags}}'
                => $domain->tags,

            '{{why_domain_matters}}'
                => $domain->why_domain_matters,

            '{{common_challenges}}'
                => $domain->common_challenges,

            '{{related_domains}}'
                => $domain->related_domains,

            '{{related_frameworks}}'
                => $domain->related_frameworks,
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