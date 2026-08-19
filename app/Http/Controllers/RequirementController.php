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

            ->latest()
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
        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | Requirement ID
            |--------------------------------------------------------------------------
            */

            'requirement_id' =>
                'required|string|max:255|unique:requirements,requirement_id',


            /*
            |--------------------------------------------------------------------------
            | Control ID
            |--------------------------------------------------------------------------
            */

            'control_id' =>
                'required|string|max:255',


            /*
            |--------------------------------------------------------------------------
            | Requirement Title
            |--------------------------------------------------------------------------
            */

            'requirement_title' =>
                'required|string|max:255',


            /*
            |--------------------------------------------------------------------------
            | Requirement
            |--------------------------------------------------------------------------
            */

            'requirement' =>
                'required|string',


            /*
            |--------------------------------------------------------------------------
            | Why this Requirement Exists
            |--------------------------------------------------------------------------
            */

            'why_requirement_exists' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Implementation Guidance
            |--------------------------------------------------------------------------
            */

            'implementation_guidance' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Common Audit Findings
            |--------------------------------------------------------------------------
            */

            'common_audit_findings' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Common Mistakes
            |--------------------------------------------------------------------------
            */

            'common_mistakes' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Best Practices
            |--------------------------------------------------------------------------
            */

            'best_practices' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Business Examples
            |--------------------------------------------------------------------------
            */

            'business_examples' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Typical Owner
            |--------------------------------------------------------------------------
            */

            'typical_owner' =>
                'nullable|string|max:255',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Create Requirement
        |--------------------------------------------------------------------------
        */

        $requirement = Requirement::create(
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
                'requirement',

            'action' =>
                'Created',

            'description' =>
                'Created requirement: ' .
                $requirement->requirement_title,

        ]);


        return redirect()
            ->route('requirements.index')
            ->with(
                'success',
                'Requirement created successfully.'
            );
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

        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | Requirement ID
            |--------------------------------------------------------------------------
            */

            'requirement_id' =>
                'required|string|max:255|unique:requirements,requirement_id,' .
                $requirement->id,


            /*
            |--------------------------------------------------------------------------
            | Control ID
            |--------------------------------------------------------------------------
            */

            'control_id' =>
                'required|string|max:255',


            /*
            |--------------------------------------------------------------------------
            | Requirement Title
            |--------------------------------------------------------------------------
            */

            'requirement_title' =>
                'required|string|max:255',


            /*
            |--------------------------------------------------------------------------
            | Requirement
            |--------------------------------------------------------------------------
            */

            'requirement' =>
                'required|string',


            /*
            |--------------------------------------------------------------------------
            | Why this Requirement Exists
            |--------------------------------------------------------------------------
            */

            'why_requirement_exists' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Implementation Guidance
            |--------------------------------------------------------------------------
            */

            'implementation_guidance' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Common Audit Findings
            |--------------------------------------------------------------------------
            */

            'common_audit_findings' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Common Mistakes
            |--------------------------------------------------------------------------
            */

            'common_mistakes' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Best Practices
            |--------------------------------------------------------------------------
            */

            'best_practices' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Business Examples
            |--------------------------------------------------------------------------
            */

            'business_examples' =>
                'nullable|string',


            /*
            |--------------------------------------------------------------------------
            | Typical Owner
            |--------------------------------------------------------------------------
            */

            'typical_owner' =>
                'nullable|string|max:255',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Update Requirement
        |--------------------------------------------------------------------------
        */

        $requirement->update(
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
                'requirement',

            'action' =>
                'Updated',

            'description' =>
                'Updated requirement: ' .
                $requirement->requirement_title,

        ]);


        return redirect()
            ->route('requirements.index')
            ->with(
                'success',
                'Requirement updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Requirement
    |--------------------------------------------------------------------------
    */

    public function destroy(
        Requirement $requirement
    ) {

        $name =
            $requirement->requirement_title;


        $requirement->delete();


        /*
        |--------------------------------------------------------------------------
        | Activity
        |--------------------------------------------------------------------------
        */

        Activity::create([

            'user_id' =>
                auth()->id(),

            'module' =>
                'requirement',

            'action' =>
                'Deleted',

            'description' =>
                'Deleted requirement: ' .
                $name,

        ]);


        return redirect()
            ->route('requirements.index')
            ->with(
                'success',
                'Requirement deleted successfully.'
            );
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


        Excel::import(
            new RequirementImport(),
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
                'requirement',

            'action' =>
                'Imported',

            'description' =>
                'Imported requirements from XLSX file.',

        ]);


        return redirect()
            ->route('requirements.index')
            ->with(
                'success',
                'Requirements imported successfully.'
            );
    }
}