<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\FrameworkTemplateController;

use App\Http\Controllers\DomainController;
use App\Http\Controllers\DomainTemplateController;

use App\Http\Controllers\ControlController;
use App\Http\Controllers\ControlTemplateController;

use App\Http\Controllers\RequirementController;
use App\Http\Controllers\RequirementTemplateController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes (No Authentication Required)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Public Template Views
|--------------------------------------------------------------------------
|
| Unauthenticated users can access the rendered templates for Frameworks,
| Domains, Controls, and Requirements.
|
*/

// Framework Template View (e.g. /frameworks/isoiec-27001)
Route::get(
    '/frameworks/{slug}',
    [FrameworkTemplateController::class, 'show']
)
    ->where('slug', '[a-z0-9]+(?:-[a-z0-9]+)*')
    ->name('frameworks.show');


// Domain Template View (e.g. /domains/access-control)
Route::get(
    '/domains/{slug}',
    [DomainTemplateController::class, 'show']
)
    ->where('slug', '[a-z0-9]+(?:-[a-z0-9]+)*')
    ->name('domains.show');


// Control Template View (e.g. /controls/view/GOV-001 or /controls/GOV-001)
Route::get(
    '/controls/view/{control_id}',
    [ControlTemplateController::class, 'show']
)
    ->where('control_id', '[A-Za-z0-9_-]+')
    ->name('controls.show');

Route::get(
    '/controls/{control_id}',
    [ControlTemplateController::class, 'show']
)
    ->where('control_id', '[A-Za-z0-9_-]+');


// Requirement Template View (e.g. /requirements/view/REQ-001 or /requirements/REQ-001)
Route::get(
    '/requirements/view/{requirement_id}',
    [RequirementTemplateController::class, 'show']
)
    ->where('requirement_id', '[A-Za-z0-9_-]+')
    ->name('requirements.show');

Route::get(
    '/requirements/{requirement_id}',
    [RequirementTemplateController::class, 'show']
)
    ->where('requirement_id', '[A-Za-z0-9_-]+');



/*
|--------------------------------------------------------------------------
| Authenticated Routes (Super Admin & Management Modules)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        $activities = \App\Models\Activity::latest()->take(10)->get();

        return view('dashboard', [
            'frameworksCount'   => \App\Models\Framework::count(),
            'domainsCount'      => \App\Models\Domain::count(),
            'controlsCount'     => \App\Models\Control::count(),
            'requirementsCount' => \App\Models\Requirement::count(),
            'activities'        => $activities,
        ]);
    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | Frameworks Management
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/frameworks',
        [FrameworkController::class, 'index']
    )->name('frameworks.index');

    Route::post(
        '/frameworks',
        [FrameworkController::class, 'store']
    )->name('frameworks.store');

    Route::put(
        '/frameworks/{framework}',
        [FrameworkController::class, 'update']
    )->name('frameworks.update');

    Route::delete(
        '/frameworks/{framework}',
        [FrameworkController::class, 'destroy']
    )->name('frameworks.destroy');

    Route::post(
        '/frameworks/import',
        [FrameworkController::class, 'import']
    )->name('frameworks.import');

    Route::post(
        '/frameworks/template',
        [FrameworkTemplateController::class, 'store']
    )->name('frameworks.template.store');


    /*
    |--------------------------------------------------------------------------
    | Domains Management
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/domains',
        [DomainController::class, 'index']
    )->name('domains.index');

    Route::post(
        '/domains',
        [DomainController::class, 'store']
    )->name('domains.store');

    Route::put(
        '/domains/{domain}',
        [DomainController::class, 'update']
    )->name('domains.update');

    Route::delete(
        '/domains/{domain}',
        [DomainController::class, 'destroy']
    )->name('domains.destroy');

    Route::post(
        '/domains/import',
        [DomainController::class, 'import']
    )->name('domains.import');

    Route::post(
        '/domains/template',
        [DomainTemplateController::class, 'store']
    )->name('domains.template.store');


    /*
    |--------------------------------------------------------------------------
    | Controls Management
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/controls',
        [ControlController::class, 'index']
    )->name('controls.index');

    Route::post(
        '/controls',
        [ControlController::class, 'store']
    )->name('controls.store');

    Route::put(
        '/controls/{control}',
        [ControlController::class, 'update']
    )->name('controls.update');

    Route::delete(
        '/controls/{control}',
        [ControlController::class, 'destroy']
    )->name('controls.destroy');

    Route::post(
        '/controls/import',
        [ControlController::class, 'import']
    )->name('controls.import');

    Route::post(
        '/controls/template',
        [ControlTemplateController::class, 'store']
    )->name('controls.template.store');


    /*
    |--------------------------------------------------------------------------
    | Requirements Management
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/requirements',
        [RequirementController::class, 'index']
    )->name('requirements.index');

    Route::post(
        '/requirements',
        [RequirementController::class, 'store']
    )->name('requirements.store');

    Route::put(
        '/requirements/{requirement}',
        [RequirementController::class, 'update']
    )->name('requirements.update');

    Route::delete(
        '/requirements/{requirement}',
        [RequirementController::class, 'destroy']
    )->name('requirements.destroy');

    Route::post(
        '/requirements/import',
        [RequirementController::class, 'import']
    )->name('requirements.import');

    Route::post(
        '/requirements/template',
        [RequirementTemplateController::class, 'store']
    )->name('requirements.template.store');

});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';