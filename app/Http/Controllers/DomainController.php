<?php

namespace App\Http\Controllers;

use App\Imports\DomainImport;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DomainController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display Domains
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $domains = Domain::query()

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'domain_id',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'domain_code',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'name',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'domain_name_2',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'slug',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'business_owner',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'status',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'version',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'description',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'keywords',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'tags',
                        'like',
                        "%{$search}%"
                    );

                });

            })

            ->orderBy('display_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view(
            'aspiaUcl.domains.index',
            compact('domains')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    */

    private function validationRules($domainId = null): array
    {
        return [

            /*
            |------------------------------------------------------------------
            | 1. Domain ID
            |------------------------------------------------------------------
            */

            'domain_id' =>
                'required|string|max:255|unique:domains,domain_id'
                . ($domainId ? ',' . $domainId : ''),


            /*
            |------------------------------------------------------------------
            | 2. Domain Code
            |------------------------------------------------------------------
            */

            'domain_code' =>
                'nullable|string|max:255',


            /*
            |------------------------------------------------------------------
            | 3. Domain Name
            |------------------------------------------------------------------
            */

            'name' =>
                'required|string|max:255',


            /*
            |------------------------------------------------------------------
            | 4. Slug
            |------------------------------------------------------------------
            */

            'slug' =>
                'nullable|string|max:255',


            /*
            |------------------------------------------------------------------
            | 5. Purpose
            |------------------------------------------------------------------
            */

            'purpose' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 6. Scope
            |------------------------------------------------------------------
            */

            'scope' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 7. Business Owner
            |------------------------------------------------------------------
            */

            'business_owner' =>
                'nullable|string|max:255',


            /*
            |------------------------------------------------------------------
            | 8. Applicable Industries
            |------------------------------------------------------------------
            */

            'applicable_industries' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 9. Applicable Technologies
            |------------------------------------------------------------------
            */

            'applicable_technologies' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 10. Description
            |------------------------------------------------------------------
            */

            'description' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 11. Display Order
            |------------------------------------------------------------------
            */

            'display_order' =>
                'nullable|integer|min:0',


            /*
            |------------------------------------------------------------------
            | 12. Status
            |------------------------------------------------------------------
            */

            'status' =>
                'required|string|max:50',


            /*
            |------------------------------------------------------------------
            | 13. Version
            |------------------------------------------------------------------
            */

            'version' =>
                'nullable|string|max:255',


            /*
            |------------------------------------------------------------------
            | 14. Domain Name #2
            |------------------------------------------------------------------
            */

            'domain_name_2' =>
                'nullable|string|max:255',


            /*
            |------------------------------------------------------------------
            | 15. Short Overview
            |------------------------------------------------------------------
            */

            'short_overview' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 16. Business Objectives
            |------------------------------------------------------------------
            */

            'business_objectives' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 17. Business Objectives #2
            |------------------------------------------------------------------
            */

            'business_objectives_2' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 18. Business Risks
            |------------------------------------------------------------------
            */

            'business_risks' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 19. Key Capabilities
            |------------------------------------------------------------------
            */

            'key_capabilities' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 20. Typical Stakeholders
            |------------------------------------------------------------------
            */

            'typical_stakeholders' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 21. Applicable Industries #2
            |------------------------------------------------------------------
            */

            'applicable_industries_2' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 22. Applicable Technologies #2
            |------------------------------------------------------------------
            */

            'applicable_technologies_2' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 23. Keywords
            |------------------------------------------------------------------
            */

            'keywords' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 24. Tags
            |------------------------------------------------------------------
            */

            'tags' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 25. Why This Domain Matters
            |------------------------------------------------------------------
            */

            'why_domain_matters' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 26. Common Challenges
            |------------------------------------------------------------------
            */

            'common_challenges' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 27. Related Domains
            |------------------------------------------------------------------
            */

            'related_domains' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 28. Related Frameworks
            |------------------------------------------------------------------
            */

            'related_frameworks' =>
                'nullable|string',
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Generate Unique Slug
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $name,
        ?int $ignoreId = null
    ): string {

        $baseSlug = Str::slug($name);

        $slug = $baseSlug;

        $counter = 1;

        while (
            Domain::where('slug', $slug)

                ->when(
                    $ignoreId,
                    function ($query) use ($ignoreId) {

                        $query->where(
                            'id',
                            '!=',
                            $ignoreId
                        );

                    }
                )

                ->exists()
        ) {

            $slug =
                $baseSlug .
                '-' .
                $counter;

            $counter++;
        }

        return $slug;
    }


    /*
|--------------------------------------------------------------------------
| Store Domain
|--------------------------------------------------------------------------
*/

public function store(Request $request)
{
    $validated = $request->validate(
        $this->validationRules()
    );


    /*
    |--------------------------------------------------------------------------
    | Generate Slug Automatically
    |--------------------------------------------------------------------------
    */

    $validated['slug'] =
        $this->generateUniqueSlug(
            $validated['name']
        );


    /*
    |--------------------------------------------------------------------------
    | Generate Display Order Automatically
    |--------------------------------------------------------------------------
    |
    | Always place a newly created domain after the existing domains.
    |
    */

    $validated['display_order'] =
        (Domain::max('display_order') ?? 0) + 1;


    /*
    |--------------------------------------------------------------------------
    | Create Domain
    |--------------------------------------------------------------------------
    */

    Domain::create($validated);


    return redirect()
        ->route('domains.index')
        ->with(
            'success',
            'Domain created successfully.'
        );
}


    /*
    |--------------------------------------------------------------------------
    | Update Domain
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Domain $domain
    ) {

        $validated = $request->validate(
            $this->validationRules($domain->id)
        );


        /*
        |----------------------------------------------------------------------
        | Regenerate Slug
        |----------------------------------------------------------------------
        */

        $validated['slug'] =
            $this->generateUniqueSlug(
                $validated['name'],
                $domain->id
            );


        /*
        |----------------------------------------------------------------------
        | Update Domain
        |----------------------------------------------------------------------
        */

        $domain->update($validated);


        return redirect()
            ->route('domains.index')
            ->with(
                'success',
                'Domain updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Domain
    |--------------------------------------------------------------------------
    */

    public function destroy(Domain $domain)
    {
        $domain->delete();

        return redirect()
            ->route('domains.index')
            ->with(
                'success',
                'Domain deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Import XLSX
    |--------------------------------------------------------------------------
    */

    public function import(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:xlsx',
            ],
        ]);


        Excel::import(
            new DomainImport(),
            $request->file('file')
        );


        return redirect()
            ->route('domains.index')
            ->with(
                'success',
                'Domains imported successfully.'
            );
    }
}