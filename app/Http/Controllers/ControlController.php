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

                    $q->where(
                        'control_id',
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
                        'business_owner',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'control_category',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'criticality',
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
                        'control_type',
                        'like',
                        "%{$search}%"
                    );

                });

            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        $activities = Activity::where(
            'module',
            'control'
        )
            ->latest()
            ->take(10)
            ->get();

        return view(
            'aspiaUcl.controls.index',
            compact(
                'controls',
                'activities'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    */

    private function validationRules(
        $controlId = null
    ): array {

        return [

            'control_id' =>
                'required|string|max:255|unique:controls,control_id'
                . (
                    $controlId
                        ? ',' . $controlId
                        : ''
                ),

            'domain_code' =>
                'required|string|max:255|exists:domains,domain_code',

            'name' =>
                'required|string|max:255',

            'business_description' =>
                'nullable|string',

            'business_objective' =>
                'nullable|string',

            'business_owner' =>
                'nullable|string|max:255',

            'control_category' =>
                'nullable|string|max:255',

            'criticality' =>
                'nullable|string|max:255',

            'applicable_industries' =>
                'nullable|string',

            'applicable_technologies' =>
                'nullable|string',

            'status' =>
                'required|string|max:50',

            'version' =>
                'nullable|string|max:255',

            'control_summary' =>
                'nullable|string',

            'business_benefits' =>
                'nullable|string',

            'business_risks_if_missing' =>
                'nullable|string',

            'primary_stakeholders' =>
                'nullable|string',

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
        if ($request->filled('control_id') && Control::where('control_id', $request->control_id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: A control with Control ID '{$request->control_id}' already exists in the system.");
        }

        if ($request->filled('name') && Control::where('name', $request->name)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: A control with Name '{$request->name}' already exists in the system.");
        }

        $validated = $request->validate(
            $this->validationRules()
        );

        $domain = Domain::where(
            'domain_code',
            $validated['domain_code']
        )->first();

        if (!$domain) {
            return back()
                ->withErrors([
                    'domain_code' => 'The entered Domain Code does not exist.'
                ])
                ->withInput();
        }

        $validated['domain_id'] = $domain->id;

        try {
            $control = Control::create($validated);

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'control',
                'action' => 'Created',
                'description' => 'Created control: ' . $control->name,
            ]);

            return redirect()
                ->route('controls.index')
                ->with('success', 'Control created successfully.');

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Duplicate Data Alert: A control with duplicate details already exists in the database.');
        }
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
        if ($request->filled('control_id') && Control::where('control_id', $request->control_id)->where('id', '!=', $control->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another control with Control ID '{$request->control_id}' already exists.");
        }

        if ($request->filled('name') && Control::where('name', $request->name)->where('id', '!=', $control->id)->exists()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Duplicate Data Alert: Another control with Name '{$request->name}' already exists.");
        }

        $validated = $request->validate(
            $this->validationRules($control->id)
        );

        $domain = Domain::where(
            'domain_code',
            $validated['domain_code']
        )->first();

        if (!$domain) {
            return back()
                ->withErrors([
                    'domain_code' => 'The entered Domain Code does not exist.'
                ])
                ->withInput();
        }

        $validated['domain_id'] = $domain->id;

        try {
            $control->update($validated);

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'control',
                'action' => 'Updated',
                'description' => 'Updated control: ' . $control->name,
            ]);

            return redirect()
                ->route('controls.index')
                ->with('success', 'Control updated successfully.');

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Duplicate Data Alert: Cannot update control because duplicate information already exists.');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Control
    |--------------------------------------------------------------------------
    */

    public function destroy(
        Control $control
    ) {
        $name = $control->name;

        $control->delete();

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'control',
            'action' => 'Deleted',
            'description' => 'Deleted control: ' . $name,
        ]);

        return redirect()
            ->route('controls.index')
            ->with('success', 'Control deleted successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Import Controls from XLSX
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
                new ControlImport(),
                $request->file('file')
            );

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'control',
                'action' => 'Imported',
                'description' => 'Imported controls from XLSX file.',
            ]);

            $dupCount = session('import_duplicates_count', 0);
            if ($dupCount > 0) {
                return redirect()
                    ->route('controls.index')
                    ->with('error', "Duplicate Data Alert: {$dupCount} duplicate control record(s) were found in the uploaded file and skipped to prevent duplicate errors.");
            }

            return redirect()
                ->route('controls.index')
                ->with('success', 'Controls imported successfully.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('controls.index')
                ->with('error', 'Duplicate Data Alert: Import stopped because the file contained duplicate control records.');
        }
    }
}