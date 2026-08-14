<?php

namespace App\Http\Controllers;

use App\Imports\ControlImport;
use App\Models\Activity;
use App\Models\Control;
use App\Models\Domain;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ControlController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display Controls
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->search;

        $controls = Control::with('domain')

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('control_id', 'like', "%{$search}%")
                        ->orWhere('domain_code', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('business_owner', 'like', "%{$search}%")
                        ->orWhere('control_category', 'like', "%{$search}%")
                        ->orWhere('criticality', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%")
                        ->orWhere('version', 'like', "%{$search}%")
                        ->orWhere('control_type', 'like', "%{$search}%");

                });

            })

            ->latest()
            ->paginate(10)
            ->withQueryString();


        $domains = Domain::orderBy('name')->get();


        $activities = Activity::where('module', 'control')
            ->latest()
            ->take(10)
            ->get();


        return view(
            'aspiaUcl.controls.index',
            compact(
                'controls',
                'domains',
                'activities'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    */

    private function validationRules($controlId = null): array
    {
        return [

            // Relationship
            'domain_id' =>
                'required|exists:domains,id',

            // 1. Control ID
            'control_id' =>
                'required|string|max:255|unique:controls,control_id'
                . ($controlId ? ',' . $controlId : ''),

            // 2. Domain Code
            'domain_code' =>
                'nullable|string|max:255',

            // 3. Control Name
            'name' =>
                'required|string|max:255',

            // 4. Business Description
            'business_description' =>
                'nullable|string',

            // 5. Business Objective
            'business_objective' =>
                'nullable|string',

            // 6. Business Owner
            'business_owner' =>
                'nullable|string|max:255',

            // 7. Control Category
            'control_category' =>
                'nullable|string|max:255',

            // 8. Criticality
            'criticality' =>
                'nullable|string|max:255',

            // 9. Applicable Industries
            'applicable_industries' =>
                'nullable|string',

            // 10. Applicable Technologies
            'applicable_technologies' =>
                'nullable|string',

            // 11. Status
            'status' =>
                'required|string|max:50',

            // 12. Version
            'version' =>
                'nullable|string|max:255',

            // 13. Control Summary
            'control_summary' =>
                'nullable|string',

            // 14. Business Benefits
            'business_benefits' =>
                'nullable|string',

            // 15. Business Risks if Missing
            'business_risks_if_missing' =>
                'nullable|string',

            // 16. Primary Stakeholders
            'primary_stakeholders' =>
                'nullable|string',

            // 17. Control Type
            'control_type' =>
                'nullable|string|max:255',
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Store Control
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate(
            $this->validationRules()
        );


        $control = Control::create($validated);


        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'control',
            'action' => 'Created',
            'description' =>
                'Created control: ' .
                $control->name,
        ]);


        return redirect()
            ->route('controls.index')
            ->with(
                'success',
                'Control created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Control
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Control $control
    ) {

        $validated = $request->validate(
            $this->validationRules($control->id)
        );


        $control->update($validated);


        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'control',
            'action' => 'Updated',
            'description' =>
                'Updated control: ' .
                $control->name,
        ]);


        return redirect()
            ->route('controls.index')
            ->with(
                'success',
                'Control updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Control
    |--------------------------------------------------------------------------
    */

    public function destroy(Control $control)
    {
        $name = $control->name;


        $control->delete();


        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'control',
            'action' => 'Deleted',
            'description' =>
                'Deleted control: ' .
                $name,
        ]);


        return redirect()
            ->route('controls.index')
            ->with(
                'success',
                'Control deleted successfully.'
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
            new ControlImport(),
            $request->file('file')
        );


        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'control',
            'action' => 'Imported',
            'description' =>
                'Imported controls from XLSX file.',
        ]);


        return redirect()
            ->route('controls.index')
            ->with(
                'success',
                'Controls imported successfully.'
            );
    }
}