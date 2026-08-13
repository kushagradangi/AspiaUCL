<?php

namespace App\Http\Controllers;

use App\Imports\DomainImport;
use App\Models\Activity;
use App\Models\Domain;
use App\Models\Framework;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $domains = Domain::with('framework')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $frameworks = Framework::orderBy('name')->get();

        $activities = Activity::where('module', 'domain')
            ->latest()
            ->take(10)
            ->get();

        return view(
            'aspiaUcl.domains.index',
            compact(
                'domains',
                'frameworks',
                'activities'
            )
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'framework_id' => 'required|exists:frameworks,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $domain = Domain::create($validated);

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'domain',
            'action' => 'Created',
            'description' => 'Created domain: ' . $domain->name,
        ]);

        return back()->with(
            'success',
            'Domain created successfully.'
        );
    }


    public function update(Request $request, Domain $domain)
    {
        $validated = $request->validate([
            'framework_id' => 'required|exists:frameworks,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $domain->update($validated);

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'domain',
            'action' => 'Updated',
            'description' => 'Updated domain: ' . $domain->name,
        ]);

        return back()->with(
            'success',
            'Domain updated successfully.'
        );
    }


    public function destroy(Domain $domain)
    {
        $name = $domain->name;

        $domain->delete();

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'domain',
            'action' => 'Deleted',
            'description' => 'Deleted domain: ' . $name,
        ]);

        return back()->with(
            'success',
            'Domain deleted successfully.'
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
            new DomainImport,
            $request->file('file')
        );

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'domain',
            'action' => 'Imported',
            'description' => 'Imported domains from XLSX file.',
        ]);

        return back()->with(
            'success',
            'Domains imported successfully.'
        );
    }
}