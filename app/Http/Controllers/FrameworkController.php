<?php

namespace App\Http\Controllers;

use App\Imports\FrameworkImport;
use App\Models\Framework;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FrameworkController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $frameworks = Framework::query()
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('framework_id', 'like', "%{$search}%")
                        ->orWhere('framework_code', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('framework_family', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('publisher', 'like', "%{$search}%")
                        ->orWhere('region', 'like', "%{$search}%")
                        ->orWhere('industry', 'like', "%{$search}%")
                        ->orWhere('framework_type', 'like', "%{$search}%");

                });

            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'aspiaUcl.frameworks.index',
            compact('frameworks')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            'framework_id' => [
                'required',
                'string',
                'max:255',
                'unique:frameworks,framework_id',
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

        $framework = Framework::create($validated);

        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                'Framework created successfully.'
            );
    }


    public function update(
        Request $request,
        Framework $framework
    ) {
        $validated = $request->validate([

            'framework_id' => [
                'required',
                'string',
                'max:255',
                'unique:frameworks,framework_id,' . $framework->id,
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

        $framework->update($validated);

        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                'Framework updated successfully.'
            );
    }


    public function destroy(Framework $framework)
    {
        $name = $framework->name;

        $framework->delete();

        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                'Framework deleted successfully.'
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
            new FrameworkImport(),
            $request->file('file')
        );

        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                'Frameworks imported successfully.'
            );
    }
}