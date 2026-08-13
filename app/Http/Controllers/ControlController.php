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
    public function index(Request $request)
    {
        $search = $request->search;

        $controls = Control::with('domain')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
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


    public function store(Request $request)
    {
        $validated = $request->validate([
            'domain_id' => 'required|exists:domains,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $control = Control::create($validated);

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'control',
            'action' => 'Created',
            'description' => 'Created control: ' . $control->name,
        ]);

        return back()->with(
            'success',
            'Control created successfully.'
        );
    }


    public function update(Request $request, Control $control)
    {
        $validated = $request->validate([
            'domain_id' => 'required|exists:domains,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $control->update($validated);

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'control',
            'action' => 'Updated',
            'description' => 'Updated control: ' . $control->name,
        ]);

        return back()->with(
            'success',
            'Control updated successfully.'
        );
    }


    public function destroy(Control $control)
    {
        $name = $control->name;

        $control->delete();

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'control',
            'action' => 'Deleted',
            'description' => 'Deleted control: ' . $name,
        ]);

        return back()->with(
            'success',
            'Control deleted successfully.'
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
            new ControlImport,
            $request->file('file')
        );

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'control',
            'action' => 'Imported',
            'description' => 'Imported controls from XLSX file.',
        ]);

        return back()->with(
            'success',
            'Controls imported successfully.'
        );
    }
}