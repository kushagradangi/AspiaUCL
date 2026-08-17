<?php

namespace App\Http\Controllers;

use App\Imports\FrameworkImport;
use App\Models\Framework;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class FrameworkController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display Frameworks
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $frameworks = Framework::query()

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'framework_id',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'framework_code',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'name',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'framework_family',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'category',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'publisher',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'region',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'industry',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'framework_type',
                        'like',
                        "%{$search}%"
                    );

                });

            })

            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();


        return view(
            'aspiaUcl.frameworks.index',
            compact('frameworks')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Framework
    |--------------------------------------------------------------------------
    */

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


        /*
        |--------------------------------------------------------------------------
        | Generate Unique Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['name']
        );


        /*
        |--------------------------------------------------------------------------
        | Create Framework
        |--------------------------------------------------------------------------
        */

        Framework::create($validated);


        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                'Framework created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Framework
    |--------------------------------------------------------------------------
    */

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


        /*
        |--------------------------------------------------------------------------
        | Regenerate Slug
        |--------------------------------------------------------------------------
        |
        | If the Framework name changes, the slug changes too.
        |
        */

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['name'],
            $framework->id
        );


        /*
        |--------------------------------------------------------------------------
        | Update Framework
        |--------------------------------------------------------------------------
        */

        $framework->update($validated);


        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                'Framework updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Framework
    |--------------------------------------------------------------------------
    */

    public function destroy(Framework $framework)
    {
        $framework->delete();

        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                'Framework deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Import Frameworks
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


    /*
    |--------------------------------------------------------------------------
    | Generate Unique Slug
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $name,
        ?int $ignoreId = null
    ): string {

        $baseSlug = Str::slug($name);

        $slug = $baseSlug;

        $counter = 1;


        while (
            Framework::where('slug', $slug)
                ->when(
                    $ignoreId,
                    function ($query) use ($ignoreId) {
                        $query->where(
                            'id',
                            '!=',
                            $ignoreId
                        );
                    }
                )
                ->exists()
        ) {

            $slug =
                $baseSlug .
                '-' .
                $counter;

            $counter++;
        }


        return $slug;
    }
}