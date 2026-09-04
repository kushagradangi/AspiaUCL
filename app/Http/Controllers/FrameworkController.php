<?php

namespace App\Http\Controllers;

use App\Imports\FrameworkImport;
use App\Models\Activity;
use App\Models\Framework;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class FrameworkController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display Frameworks
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $frameworks = Framework::with(['domains.controls'])

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'framework_id',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'framework_code',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'name',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'framework_family',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'category',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'publisher',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'region',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'industry',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'framework_type',
                        'like',
                        "%{$search}%"
                    );

                });

            })

            ->orderBy('display_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        $canonicalTypes = [
            'Standard',
            'Framework',
            'Control Catalog',
            'Best Practice',
            'Governance Framework',
            'Audit Framework',
            'Privacy Standard',
            'Regulation',
            'Law',
            'Directive',
            'Direction',
            'Guideline',
        ];

        $typesFromFrameworks = Framework::whereNotNull('framework_type')
            ->where('framework_type', '!=', '')
            ->distinct()
            ->pluck('framework_type')
            ->toArray();

        $typesFromTemplates = \App\Models\FrameworkTemplate::whereNotNull('framework_type')
            ->where('framework_type', '!=', '')
            ->distinct()
            ->pluck('framework_type')
            ->toArray();

        $frameworkTypes = collect(array_merge($canonicalTypes, $typesFromFrameworks, $typesFromTemplates))
            ->unique()
            ->filter()
            ->values();

        $frameworkTemplates = \App\Models\FrameworkTemplate::all()->pluck('html_content', 'framework_type');

        return view(
            'aspiaUcl.frameworks.index',
            compact('frameworks', 'frameworkTypes', 'frameworkTemplates')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Framework
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'framework_id' => [
                'required',
                'string',
                'max:255',
            ],
            'framework_code' => [
                'required',
                'string',
                'max:255',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'version' => [
                'nullable',
                'string',
                'max:255',
            ],
            'framework_family' => [
                'nullable',
                'string',
                'max:255',
            ],
            'category' => [
                'nullable',
                'string',
                'max:255',
            ],
            'publisher' => [
                'nullable',
                'string',
                'max:255',
            ],
            'region' => [
                'nullable',
                'string',
                'max:255',
            ],
            'industry' => [
                'nullable',
                'string',
                'max:255',
            ],
            'framework_type' => [
                'nullable',
                'string',
                'max:255',
            ],
            'related_domains' => [
                'nullable',
                'string',
            ],
        ]);

        // Check if matching framework already exists
        $existing = Framework::where('framework_id', $validated['framework_id'])
            ->when(!empty($validated['framework_code']), function ($q) use ($validated) {
                return $q->orWhere('framework_code', $validated['framework_code']);
            })
            ->first();

        try {
            if ($existing) {
                $validated['slug'] = $this->generateUniqueSlug($validated['name'], $existing->id);
                $existing->update($validated);

                Activity::create([
                    'user_id' => auth()->id(),
                    'module' => 'framework',
                    'action' => 'Updated',
                    'description' => 'Updated existing framework (replaced data): ' . $existing->name,
                ]);

                return redirect()
                    ->route('frameworks.index')
                    ->with('success', "Existing framework '{$existing->name}' was found and successfully updated with new data.");
            }

            $validated['slug'] = $this->generateUniqueSlug($validated['name']);
            $validated['display_order'] = (Framework::max('display_order') ?? 0) + 1;
            $framework = Framework::create($validated);

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'framework',
                'action' => 'Created',
                'description' => 'Created framework: ' . $framework->name,
            ]);

            return redirect()
                ->route('frameworks.index')
                ->with('success', 'Framework created successfully.');

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Database Error: Could not save framework data.');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Update Framework
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Framework $framework
    ) {
        // Check for duplicate framework fields on other records
        if ($request->filled('framework_id') && Framework::where('framework_id', $request->framework_id)->where('id', '!=', $framework->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another framework with Framework ID '{$request->framework_id}' already exists.");
        }

        if ($request->filled('framework_code') && Framework::where('framework_code', $request->framework_code)->where('id', '!=', $framework->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another framework with Framework Code '{$request->framework_code}' already exists.");
        }

        if ($request->filled('name') && Framework::where('name', $request->name)->where('id', '!=', $framework->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another framework with Name '{$request->name}' already exists.");
        }

        $validated = $request->validate([
            'framework_id' => [
                'required',
                'string',
                'max:255',
            ],
            'framework_code' => [
                'required',
                'string',
                'max:255',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'version' => [
                'nullable',
                'string',
                'max:255',
            ],
            'framework_family' => [
                'nullable',
                'string',
                'max:255',
            ],
            'category' => [
                'nullable',
                'string',
                'max:255',
            ],
            'publisher' => [
                'nullable',
                'string',
                'max:255',
            ],
            'region' => [
                'nullable',
                'string',
                'max:255',
            ],
            'industry' => [
                'nullable',
                'string',
                'max:255',
            ],
            'framework_type' => [
                'nullable',
                'string',
                'max:255',
            ],
            'related_domains' => [
                'nullable',
                'string',
            ],
        ]);

        try {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['name'],
                $framework->id
            );

            $framework->update($validated);

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'framework',
                'action' => 'Updated',
                'description' => 'Updated framework: ' . $framework->name,
            ]);

            return redirect()
                ->route('frameworks.index')
                ->with('success', 'Framework updated successfully.');

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Duplicate Data Alert: Cannot update framework because duplicate information already exists.');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Framework
    |--------------------------------------------------------------------------
    */

    public function destroy(Framework $framework)
    {
        $frameworkName = $framework->name;
        $framework->delete();

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'framework',
            'action' => 'Deleted',
            'description' => 'Deleted framework: ' . $frameworkName,
        ]);

        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                'Framework deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Import Frameworks
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
            $import = new FrameworkImport();

            Excel::import(
                $import,
                $request->file('file')
            );

            $created = $import->getCreatedCount();
            $updated = $import->getUpdatedCount();

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'framework',
                'action' => 'Imported',
                'description' => "Imported frameworks: {$created} created, {$updated} updated.",
            ]);

            $message = "Frameworks imported successfully ({$created} new added, {$updated} existing updated).";

            return redirect()
                ->route('frameworks.index')
                ->with('success', $message);

        } catch (\Throwable $e) {
            return redirect()
                ->route('frameworks.index')
                ->with('error', 'Error occurred during framework import: ' . $e->getMessage());
        }
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
            Framework::where('slug', $slug)
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
}