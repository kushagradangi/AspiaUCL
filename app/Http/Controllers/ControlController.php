<?php

namespace App\Http\Controllers;

use App\Imports\ControlImport;
use App\Jobs\ProcessExcelImportJob;
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

        $controls = Control::with(['domain.framework', 'requirements'])
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
                        'control_nature',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'compensating_control',
                        'like',
                        "%{$search}%"
                    );

                });

            })
            ->orderBy('display_order', 'asc')
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

        $controlTemplate = \App\Models\ControlTemplate::latest('updated_at')->first() ?? \App\Models\ControlTemplate::first();

        return view(
            'aspiaUcl.controls.index',
            compact(
                'controls',
                'activities',
                'controlTemplate'
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
                'required|string|max:255',

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

            'control_nature' =>
                'nullable|string|max:255',

            'compensating_control' =>
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
        // Check if matching control already exists
        $existing = null;
        if ($request->filled('control_id')) {
            $existing = Control::where('control_id', $request->control_id)->first();
        }

        $validated = $request->validate(
            $this->validationRules($existing ? $existing->id : null)
        );

        $domainIdentifier = trim((string)($validated['domain_code'] ?? ''));
        $normDomain = strtoupper($domainIdentifier);

        $domain = Domain::whereRaw('UPPER(TRIM(domain_code)) = ?', [$normDomain])
            ->orWhereRaw('UPPER(TRIM(domain_id)) = ?', [$normDomain])
            ->first();

        if (is_numeric($domainIdentifier) && !$domain) {
            $domain = Domain::find((int)$domainIdentifier);
        }

        if (!$domain) {
            $controlName = $validated['name'] ?? '';
            $controlId = $validated['control_id'] ?? '';
            $errorMessage = "Cannot save Control \"{$controlName}\" ({$controlId}): Parent Domain \"{$domainIdentifier}\" does not exist.";

            return back()
                ->withErrors([
                    'domain_code' => $errorMessage,
                ])
                ->with('error', $errorMessage)
                ->withInput();
        }

        $validated['domain_id'] = $domain->id;
        $validated['domain_code'] = $domain->domain_code ?? $domainIdentifier;

        try {
            if ($existing) {
                $existing->update($validated);

                Activity::create([
                    'user_id' => auth()->id(),
                    'module' => 'control',
                    'action' => 'Updated',
                    'description' => 'Updated existing control (replaced data): ' . $existing->name,
                ]);

                return redirect()
                    ->route('controls.index')
                    ->with('success', "Existing control '{$existing->name}' was found and successfully updated with new data.");
            }

            $validated['display_order'] = (Control::max('display_order') ?? 0) + 1;
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
                ->with('error', 'Database Error: Could not save control data.');
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

        $domainIdentifier = trim((string)($validated['domain_code'] ?? ''));
        $normDomain = strtoupper($domainIdentifier);

        $domain = Domain::whereRaw('UPPER(TRIM(domain_code)) = ?', [$normDomain])
            ->orWhereRaw('UPPER(TRIM(domain_id)) = ?', [$normDomain])
            ->first();

        if (is_numeric($domainIdentifier) && !$domain) {
            $domain = Domain::find((int)$domainIdentifier);
        }

        if (!$domain) {
            $controlName = $validated['name'] ?? $control->name;
            $controlId = $validated['control_id'] ?? $control->control_id;
            $errorMessage = "Cannot save Control \"{$controlName}\" ({$controlId}): Parent Domain \"{$domainIdentifier}\" does not exist.";

            return back()
                ->withErrors([
                    'domain_code' => $errorMessage,
                ])
                ->with('error', $errorMessage)
                ->withInput();
        }

        $validated['domain_id'] = $domain->id;
        $validated['domain_code'] = $domain->domain_code ?? $domainIdentifier;

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
        if (function_exists('set_time_limit')) {
            @set_time_limit(600);
        }
        @ini_set('memory_limit', '512M');

        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:xlsx,xls,csv',
                'max:51200', // 50MB
            ],
        ], [
            'file.required' => 'Please select an Excel (.xlsx, .xls) or CSV file to import.',
            'file.file' => 'The uploaded item must be a valid file.',
            'file.mimes' => 'The uploaded file must be a valid Excel spreadsheet (.xlsx, .xls) or CSV file.',
            'file.max' => 'The uploaded file exceeds the 50MB size limit.',
        ]);

        try {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $ext = strtolower($file->getClientOriginalExtension());
            $readerType = null;
            if ($ext === 'xlsx') {
                $readerType = \Maatwebsite\Excel\Excel::XLSX;
            } elseif ($ext === 'xls') {
                $readerType = \Maatwebsite\Excel\Excel::XLS;
            } elseif ($ext === 'csv') {
                $readerType = \Maatwebsite\Excel\Excel::CSV;
            }

            // Store file temporarily in private storage for the queue worker
            $storedPath = $file->store('imports', 'local');

            // Dispatch background import job
            ProcessExcelImportJob::dispatch(
                'control',
                $storedPath,
                $originalName,
                auth()->id(),
                $readerType
            );

            return redirect()
                ->route('controls.index')
                ->with('info', "File \"{$originalName}\" has been uploaded and is processing in the background. You will receive an in-app notification when it is complete.");

        } catch (\Illuminate\Validation\ValidationException $e) {
            $allErrors = \Illuminate\Support\Arr::flatten($e->errors());
            return redirect()
                ->route('controls.index')
                ->withErrors($e->errors())
                ->with('error', 'Import rejected: ' . implode(' | ', $allErrors));
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Control import error: ' . $e->getMessage(), [
                'exception' => $e,
            ]);

            return redirect()
                ->route('controls.index')
                ->with('error', 'Error scheduling control import: ' . $e->getMessage());
        }
    }
}