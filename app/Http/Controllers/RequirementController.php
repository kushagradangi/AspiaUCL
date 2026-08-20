<?php

namespace App\Http\Controllers;

use App\Imports\RequirementImport;
use App\Models\Activity;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RequirementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display Requirements
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->search;

        $requirements = Requirement::query()

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'requirement_id',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'control_id',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'requirement_title',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'requirement',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'typical_owner',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'implementation_guidance',
                        'like',
                        "%{$search}%"
                    );

                });

            })

            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Recent Activity
        |--------------------------------------------------------------------------
        */

        $activities = Activity::where(
            'module',
            'requirement'
        )
            ->latest()
            ->take(10)
            ->get();


        $requirementTemplate = \App\Models\RequirementTemplate::first();

        return view(
            'aspiaUcl.requirements.index',
            compact(
                'requirements',
                'activities',
                'requirementTemplate'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Requirement
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        if ($request->filled('requirement_id') && Requirement::where('requirement_id', $request->requirement_id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: A requirement with Requirement ID '{$request->requirement_id}' already exists in the system.");
        }

        if ($request->filled('requirement_title') && Requirement::where('requirement_title', $request->requirement_title)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: A requirement with Title '{$request->requirement_title}' already exists in the system.");
        }

        $validated = $request->validate([
            'requirement_id' => 'required|string|max:255',
            'control_id' => 'required|string|max:255',
            'requirement_title' => 'required|string|max:255',
            'requirement' => 'required|string',
            'why_requirement_exists' => 'nullable|string',
            'implementation_guidance' => 'nullable|string',
            'common_audit_findings' => 'nullable|string',
            'common_mistakes' => 'nullable|string',
            'best_practices' => 'nullable|string',
            'business_examples' => 'nullable|string',
            'typical_owner' => 'nullable|string|max:255',
        ]);

        try {
            $requirement = Requirement::create($validated);

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'requirement',
                'action' => 'Created',
                'description' => 'Created requirement: ' . $requirement->requirement_title,
            ]);

            return redirect()
                ->route('requirements.index')
                ->with('success', 'Requirement created successfully.');

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Duplicate Data Alert: A requirement with duplicate details already exists in the database.');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Update Requirement
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Requirement $requirement
    ) {
        if ($request->filled('requirement_id') && Requirement::where('requirement_id', $request->requirement_id)->where('id', '!=', $requirement->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another requirement with Requirement ID '{$request->requirement_id}' already exists.");
        }

        if ($request->filled('requirement_title') && Requirement::where('requirement_title', $request->requirement_title)->where('id', '!=', $requirement->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another requirement with Title '{$request->requirement_title}' already exists.");
        }

        $validated = $request->validate([
            'requirement_id' => 'required|string|max:255',
            'control_id' => 'required|string|max:255',
            'requirement_title' => 'required|string|max:255',
            'requirement' => 'required|string',
            'why_requirement_exists' => 'nullable|string',
            'implementation_guidance' => 'nullable|string',
            'common_audit_findings' => 'nullable|string',
            'common_mistakes' => 'nullable|string',
            'best_practices' => 'nullable|string',
            'business_examples' => 'nullable|string',
            'typical_owner' => 'nullable|string|max:255',
        ]);

        try {
            $requirement->update($validated);

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'requirement',
                'action' => 'Updated',
                'description' => 'Updated requirement: ' . $requirement->requirement_title,
            ]);

            return redirect()
                ->route('requirements.index')
                ->with('success', 'Requirement updated successfully.');

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Duplicate Data Alert: Cannot update requirement because duplicate information already exists.');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Requirement
    |--------------------------------------------------------------------------
    */

    public function destroy(
        Requirement $requirement
    ) {
        $name = $requirement->requirement_title;

        $requirement->delete();

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'requirement',
            'action' => 'Deleted',
            'description' => 'Deleted requirement: ' . $name,
        ]);

        return redirect()
            ->route('requirements.index')
            ->with('success', 'Requirement deleted successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Import Requirements
    |--------------------------------------------------------------------------
    */

    public function import(
        Request $request
    ) {
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
                new RequirementImport(),
                $request->file('file')
            );

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'requirement',
                'action' => 'Imported',
                'description' => 'Imported requirements from XLSX file.',
            ]);

            $dupCount = session('import_duplicates_count', 0);
            if ($dupCount > 0) {
                return redirect()
                    ->route('requirements.index')
                    ->with('error', "Duplicate Data Alert: {$dupCount} duplicate requirement record(s) were found in the uploaded file and skipped to prevent duplicate errors.");
            }

            return redirect()
                ->route('requirements.index')
                ->with('success', 'Requirements imported successfully.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('requirements.index')
                ->with('error', 'Duplicate Data Alert: Import stopped because the file contained duplicate requirement records.');
        }
    }
}