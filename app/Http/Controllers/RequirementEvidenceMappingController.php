<?php

namespace App\Http\Controllers;

use App\Imports\RequirementEvidenceMappingImport;
use App\Models\Activity;
use App\Models\Control;
use App\Models\Requirement;
use App\Models\RequirementEvidenceMapping;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RequirementEvidenceMappingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display Requirement Evidence Mappings
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $search = trim((string) $request->get('search', ''));

        $mappings = RequirementEvidenceMapping::with(['requirement', 'control'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('requirement_id', 'like', "%{$search}%")
                      ->orWhere('control_id', 'like', "%{$search}%")
                      ->orWhere('requirement_title', 'like', "%{$search}%")
                      ->orWhere('requirement', 'like', "%{$search}%")
                      ->orWhere('evidence_type', 'like', "%{$search}%")
                      ->orWhere('evidence_owner', 'like', "%{$search}%")
                      ->orWhere('source_system', 'like', "%{$search}%")
                      ->orWhere('evidence_reference_link', 'like', "%{$search}%")
                      ->orWhere('test_method', 'like', "%{$search}%");
                });
            })
            ->orderBy('display_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        // Statistics for header summary cards
        $totalMappings = RequirementEvidenceMapping::count();
        $coveredControlsCount = RequirementEvidenceMapping::whereNotNull('control_id')->distinct('control_id')->count('control_id');
        $coveredRequirementsCount = RequirementEvidenceMapping::distinct('requirement_id')->count('requirement_id');
        $uniqueOwnersCount = RequirementEvidenceMapping::whereNotNull('evidence_owner')->distinct('evidence_owner')->count('evidence_owner');

        // Recent Activity
        $activities = Activity::where('module', 'requirement_evidence_mapping')
            ->latest()
            ->take(10)
            ->get();

        return view('aspiaUcl.requirement_evidence_mappings.index', compact(
            'mappings',
            'search',
            'totalMappings',
            'coveredControlsCount',
            'coveredRequirementsCount',
            'uniqueOwnersCount',
            'activities'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Store a newly created Mapping
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'requirement_id'             => 'required|string|max:255',
            'control_id'                 => 'nullable|string|max:255',
            'requirement_title'          => 'required|string|max:255',
            'requirement'                => 'nullable|string',
            'evidence_type'              => 'nullable|string',
            'evidence_owner'             => 'nullable|string|max:255',
            'evidence_reference_link'    => 'nullable|string',
            'evidence_description'       => 'nullable|string',
            'source_system'              => 'nullable|string|max:255',
            'frequency'                  => 'nullable|string|max:255',
            'freshness'                  => 'nullable|string|max:255',
            'auditor_validation_method'  => 'nullable|string',
            'test_procedure'             => 'nullable|string',
            'evidence_checklist'         => 'nullable|string',
            'expected_result'            => 'nullable|string',
            'pass_criteria'              => 'nullable|string',
            'fail_criteria'              => 'nullable|string',
            'test_frequency'             => 'nullable|string|max:255',
            'test_method'                => 'nullable|string|max:255',
        ]);

        // Auto-resolve control_id from Requirement if not provided
        if (empty($validated['control_id'])) {
            $req = Requirement::where('requirement_id', $validated['requirement_id'])->first();
            $validated['control_id'] = $req?->control_id ?: preg_replace('/-R\d+$/i', '', $validated['requirement_id']);
        }

        try {
            $validated['display_order'] = (RequirementEvidenceMapping::max('display_order') ?? 0) + 1;
            $mapping = RequirementEvidenceMapping::create($validated);

            Activity::create([
                'user_id'     => auth()->id(),
                'module'      => 'requirement_evidence_mapping',
                'action'      => 'Created',
                'description' => 'Created evidence mapping for requirement: ' . ($mapping->requirement_id . ' - ' . $mapping->requirement_title),
            ]);

            return redirect()
                ->route('requirement-evidence-mappings.index')
                ->with('success', "Requirement Evidence Mapping for '{$mapping->requirement_id}' was created successfully.");
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating mapping: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update an existing Mapping
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, RequirementEvidenceMapping $requirementEvidenceMapping)
    {
        $validated = $request->validate([
            'requirement_id'             => 'required|string|max:255',
            'control_id'                 => 'nullable|string|max:255',
            'requirement_title'          => 'required|string|max:255',
            'requirement'                => 'nullable|string',
            'evidence_type'              => 'nullable|string',
            'evidence_owner'             => 'nullable|string|max:255',
            'evidence_reference_link'    => 'nullable|string',
            'evidence_description'       => 'nullable|string',
            'source_system'              => 'nullable|string|max:255',
            'frequency'                  => 'nullable|string|max:255',
            'freshness'                  => 'nullable|string|max:255',
            'auditor_validation_method'  => 'nullable|string',
            'test_procedure'             => 'nullable|string',
            'evidence_checklist'         => 'nullable|string',
            'expected_result'            => 'nullable|string',
            'pass_criteria'              => 'nullable|string',
            'fail_criteria'              => 'nullable|string',
            'test_frequency'             => 'nullable|string|max:255',
            'test_method'                => 'nullable|string|max:255',
        ]);

        if (empty($validated['control_id'])) {
            $req = Requirement::where('requirement_id', $validated['requirement_id'])->first();
            $validated['control_id'] = $req?->control_id ?: preg_replace('/-R\d+$/i', '', $validated['requirement_id']);
        }

        try {
            $requirementEvidenceMapping->update($validated);

            Activity::create([
                'user_id'     => auth()->id(),
                'module'      => 'requirement_evidence_mapping',
                'action'      => 'Updated',
                'description' => 'Updated evidence mapping for requirement: ' . ($requirementEvidenceMapping->requirement_id . ' - ' . $requirementEvidenceMapping->requirement_title),
            ]);

            return redirect()
                ->route('requirement-evidence-mappings.index')
                ->with('success', "Requirement Evidence Mapping for '{$requirementEvidenceMapping->requirement_id}' was updated successfully.");
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error updating mapping: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Delete a Mapping
    |--------------------------------------------------------------------------
    */
    public function destroy(RequirementEvidenceMapping $requirementEvidenceMapping)
    {
        $id = $requirementEvidenceMapping->requirement_id;
        $title = $requirementEvidenceMapping->requirement_title;

        $requirementEvidenceMapping->delete();

        Activity::create([
            'user_id'     => auth()->id(),
            'module'      => 'requirement_evidence_mapping',
            'action'      => 'Deleted',
            'description' => "Deleted evidence mapping: {$id} - {$title}",
        ]);

        return redirect()
            ->route('requirement-evidence-mappings.index')
            ->with('success', "Requirement Evidence Mapping for '{$id}' was deleted successfully.");
    }

    /*
    |--------------------------------------------------------------------------
    | Import Mappings from Excel / CSV
    |--------------------------------------------------------------------------
    */
    public function import(Request $request)
    {
        if (function_exists('set_time_limit')) {
            @set_time_limit(600);
        }
        @ini_set('memory_limit', '512M');

        $request->validate([
            'file' => [
                'required',
                'file',
                'max:51200', // 50MB
                function ($attribute, $value, $fail) {
                    $ext = strtolower($value->getClientOriginalExtension());
                    $validExts = ['xlsx', 'xls', 'csv'];
                    if (!in_array($ext, $validExts)) {
                        $fail('The uploaded file must be a valid Excel spreadsheet (.xlsx, .xls) or CSV file.');
                    }
                },
            ],
        ], [
            'file.required' => 'Please select an Excel or CSV file to import.',
            'file.file'     => 'The uploaded item must be a valid file.',
            'file.max'      => 'The uploaded file exceeds the 50MB size limit.',
        ]);

        try {
            $import = new RequirementEvidenceMappingImport();

            Excel::import($import, $request->file('file'));

            $created = $import->getCreatedCount();
            $updated = $import->getUpdatedCount();
            $skipped = $import->getSkippedCount();

            Activity::create([
                'user_id'     => auth()->id(),
                'module'      => 'requirement_evidence_mapping',
                'action'      => 'Imported',
                'description' => "Imported Evidence Mappings ({$created} created, {$updated} updated, {$skipped} skipped)",
            ]);

            $message = "Import completed successfully! {$created} new mappings created, {$updated} updated.";
            if ($skipped > 0) {
                $message .= " ({$skipped} empty rows skipped).";
            }

            return redirect()
                ->route('requirement-evidence-mappings.index')
                ->with('success', $message);
        } catch (\Throwable $e) {
            return redirect()
                ->route('requirement-evidence-mappings.index')
                ->with('error', 'Import Failed: ' . $e->getMessage());
        }
    }
}

