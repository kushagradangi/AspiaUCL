<?php

namespace App\Http\Controllers;

use App\Imports\DomainImport;
use App\Models\Activity;
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
            | 8. Description
            |------------------------------------------------------------------
            */

            'description' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 9. Display Order
            |------------------------------------------------------------------
            */

            'display_order' =>
                'nullable|integer|min:0',


            /*
            |------------------------------------------------------------------
            | 10. Status
            |------------------------------------------------------------------
            */

            'status' =>
                'required|string|max:50',


            /*
            |------------------------------------------------------------------
            | 11. Version
            |------------------------------------------------------------------
            */

            'version' =>
                'nullable|string|max:255',


            /*
            |------------------------------------------------------------------
            | 12. Short Overview
            |------------------------------------------------------------------
            */

            'short_overview' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 13. Business Objectives
            |------------------------------------------------------------------
            */

            'business_objectives' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 14. Business Risks
            |------------------------------------------------------------------
            */

            'business_risks' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 15. Key Capabilities
            |------------------------------------------------------------------
            */

            'key_capabilities' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 16. Typical Stakeholders
            |------------------------------------------------------------------
            */

            'typical_stakeholders' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 17. Applicable Industries
            |------------------------------------------------------------------
            */

            'applicable_industries' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 18. Applicable Technologies
            |------------------------------------------------------------------
            */

            'applicable_technologies' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 19. Keywords
            |------------------------------------------------------------------
            */

            'keywords' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 20. Tags
            |------------------------------------------------------------------
            */

            'tags' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 21. Why This Domain Matters
            |------------------------------------------------------------------
            */

            'why_domain_matters' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 22. Common Challenges
            |------------------------------------------------------------------
            */

            'common_challenges' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 23. Related Domains
            |------------------------------------------------------------------
            */

            'related_domains' =>
                'nullable|string',


            /*
            |------------------------------------------------------------------
            | 24. Related Frameworks
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
    if ($request->filled('domain_id') && Domain::where('domain_id', $request->domain_id)->exists()) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', "Duplicate Data Alert: A domain with Domain ID '{$request->domain_id}' already exists in the system.");
    }

    if ($request->filled('domain_code') && Domain::where('domain_code', $request->domain_code)->exists()) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', "Duplicate Data Alert: A domain with Domain Code '{$request->domain_code}' already exists in the system.");
    }

    if ($request->filled('name') && Domain::where('name', $request->name)->exists()) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', "Duplicate Data Alert: A domain with Name '{$request->name}' already exists in the system.");
    }

    $validated = $request->validate(
        $this->validationRules()
    );

    try {
        $validated['slug'] = $this->generateUniqueSlug($validated['name']);
        $validated['display_order'] = (Domain::max('display_order') ?? 0) + 1;

        $domain = Domain::create($validated);

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'domain',
            'action' => 'Created',
            'description' => 'Created domain: ' . $domain->name,
        ]);

        return redirect()
            ->route('domains.index')
            ->with('success', 'Domain created successfully.');

    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Duplicate Data Alert: A domain with duplicate details already exists in the database.');
    }
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
        if ($request->filled('domain_id') && Domain::where('domain_id', $request->domain_id)->where('id', '!=', $domain->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another domain with Domain ID '{$request->domain_id}' already exists.");
        }

        if ($request->filled('domain_code') && Domain::where('domain_code', $request->domain_code)->where('id', '!=', $domain->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another domain with Domain Code '{$request->domain_code}' already exists.");
        }

        if ($request->filled('name') && Domain::where('name', $request->name)->where('id', '!=', $domain->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another domain with Name '{$request->name}' already exists.");
        }

        $validated = $request->validate(
            $this->validationRules($domain->id)
        );

        try {
            $validated['slug'] = $this->generateUniqueSlug($validated['name'], $domain->id);

            $domain->update($validated);

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'domain',
                'action' => 'Updated',
                'description' => 'Updated domain: ' . $domain->name,
            ]);

            return redirect()
                ->route('domains.index')
                ->with('success', 'Domain updated successfully.');

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Duplicate Data Alert: Cannot update domain because duplicate information already exists.');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Domain
    |--------------------------------------------------------------------------
    */

    public function destroy(Domain $domain)
    {
        $domainName = $domain->name;
        $domain->delete();

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'domain',
            'action' => 'Deleted',
            'description' => 'Deleted domain: ' . $domainName,
        ]);

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

        try {
            session()->forget('import_duplicates_count');

            Excel::import(
                new DomainImport(),
                $request->file('file')
            );

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'domain',
                'action' => 'Imported',
                'description' => 'Imported domains from XLSX file.',
            ]);

            $dupCount = session('import_duplicates_count', 0);
            if ($dupCount > 0) {
                return redirect()
                    ->route('domains.index')
                    ->with('error', "Duplicate Data Alert: {$dupCount} duplicate domain record(s) were found in the uploaded file and skipped to prevent duplicate errors.");
            }

            return redirect()
                ->route('domains.index')
                ->with('success', 'Domains imported successfully.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('domains.index')
                ->with('error', 'Duplicate Data Alert: Import stopped because the file contained duplicate domain records.');
        }
    }
}