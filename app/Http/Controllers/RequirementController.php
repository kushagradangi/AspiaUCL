<?php

namespace App\Http\Controllers;

use App\Imports\RequirementImport;
use App\Models\Activity;
use App\Models\Control;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RequirementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $requirements = Requirement::with('control')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $controls = Control::orderBy('name')->get();

        $activities = Activity::where('module', 'requirement')
            ->latest()
            ->take(10)
            ->get();

        return view(
            'aspiaUcl.requirements.index',
            compact(
                'requirements',
                'controls',
                'activities'
            )
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'control_id' => 'required|exists:controls,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $requirement = Requirement::create($validated);

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'requirement',
            'action' => 'Created',
            'description' => 'Created requirement: ' . $requirement->name,
        ]);

        return back()->with(
            'success',
            'Requirement created successfully.'
        );
    }


    public function update(
        Request $request,
        Requirement $requirement
    ) {
        $validated = $request->validate([
            'control_id' => 'required|exists:controls,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $requirement->update($validated);

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'requirement',
            'action' => 'Updated',
            'description' => 'Updated requirement: ' . $requirement->name,
        ]);

        return back()->with(
            'success',
            'Requirement updated successfully.'
        );
    }


    public function destroy(Requirement $requirement)
    {
        $name = $requirement->name;

        $requirement->delete();

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'requirement',
            'action' => 'Deleted',
            'description' => 'Deleted requirement: ' . $name,
        ]);

        return back()->with(
            'success',
            'Requirement deleted successfully.'
        );
    }


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
            new RequirementImport,
            $request->file('file')
        );

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'requirement',
            'action' => 'Imported',
            'description' => 'Imported requirements from XLSX file.',
        ]);

        return back()->with(
            'success',
            'Requirements imported successfully.'
        );
    }
}