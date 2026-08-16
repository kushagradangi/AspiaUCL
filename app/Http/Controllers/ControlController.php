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
            ->latest()
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
        $validated = $request->validate(
            $this->validationRules()
        );


        /*
        |--------------------------------------------------------------------------
        | Find Domain using Domain Code
        |--------------------------------------------------------------------------
        */

        $domain = Domain::where(
            'domain_code',
            $validated['domain_code']
        )->first();


        if (!$domain) {

            return back()
                ->withErrors([
                    'domain_code' =>
                        'The entered Domain Code does not exist.'
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Automatically assign domain_id
        |--------------------------------------------------------------------------
        */

        $validated['domain_id'] = $domain->id;


        /*
        |--------------------------------------------------------------------------
        | Create Control
        |--------------------------------------------------------------------------
        */

        $control = Control::create(
            $validated
        );


        /*
        |--------------------------------------------------------------------------
        | Activity
        |--------------------------------------------------------------------------
        */

        Activity::create([
            'user_id' =>
                auth()->id(),

            'module' =>
                'control',

            'action' =>
                'Created',

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
            $this->validationRules(
                $control->id
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Find Domain using Domain Code
        |--------------------------------------------------------------------------
        */

        $domain = Domain::where(
            'domain_code',
            $validated['domain_code']
        )->first();


        if (!$domain) {

            return back()
                ->withErrors([
                    'domain_code' =>
                        'The entered Domain Code does not exist.'
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Automatically assign domain_id
        |--------------------------------------------------------------------------
        */

        $validated['domain_id'] = $domain->id;


        /*
        |--------------------------------------------------------------------------
        | Update Control
        |--------------------------------------------------------------------------
        */

        $control->update(
            $validated
        );


        /*
        |--------------------------------------------------------------------------
        | Activity
        |--------------------------------------------------------------------------
        */

        Activity::create([
            'user_id' =>
                auth()->id(),

            'module' =>
                'control',

            'action' =>
                'Updated',

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

    public function destroy(
        Control $control
    ) {

        $name = $control->name;


        $control->delete();


        /*
        |--------------------------------------------------------------------------
        | Activity
        |--------------------------------------------------------------------------
        */

        Activity::create([
            'user_id' =>
                auth()->id(),

            'module' =>
                'control',

            'action' =>
                'Deleted',

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


        /*
        |--------------------------------------------------------------------------
        | Import Excel
        |--------------------------------------------------------------------------
        */

        Excel::import(
            new ControlImport(),
            $request->file('file')
        );


        /*
        |--------------------------------------------------------------------------
        | Activity
        |--------------------------------------------------------------------------
        */

        Activity::create([
            'user_id' =>
                auth()->id(),

            'module' =>
                'control',

            'action' =>
                'Imported',

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