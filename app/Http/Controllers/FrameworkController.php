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

        $frameworks = Framework::query()

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

            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();


        return view(
            'aspiaUcl.frameworks.index',
            compact('frameworks')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Framework
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        // Check for duplicate framework fields before creating
        if ($request->filled('framework_id') && Framework::where('framework_id', $request->framework_id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: A framework with Framework ID '{$request->framework_id}' already exists in the system.");
        }

        if ($request->filled('framework_code') && Framework::where('framework_code', $request->framework_code)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: A framework with Framework Code '{$request->framework_code}' already exists in the system.");
        }

        if ($request->filled('name') && Framework::where('name', $request->name)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: A framework with Name '{$request->name}' already exists in the system.");
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
        ]);

        try {
            $validated['slug'] = $this->generateUniqueSlug($validated['name']);

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
                ->with('error', 'Duplicate Data Alert: A framework with duplicate details already exists in the database.');
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
            session()->forget('import_duplicates_count');

            Excel::import(
                new FrameworkImport(),
                $request->file('file')
            );

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'framework',
                'action' => 'Imported',
                'description' => 'Imported frameworks from XLSX file.',
            ]);

            $dupCount = session('import_duplicates_count', 0);
            if ($dupCount > 0) {
                return redirect()
                    ->route('frameworks.index')
                    ->with('error', "Duplicate Data Alert: {$dupCount} duplicate framework record(s) were found in the uploaded file and skipped to prevent duplicate errors.");
            }

            return redirect()
                ->route('frameworks.index')
                ->with('success', 'Frameworks imported successfully.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('frameworks.index')
                ->with('error', 'Duplicate Data Alert: Import stopped because the file contained duplicate framework records.');
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