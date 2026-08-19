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
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect()->route('login');

});


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    return view('dashboard', [
        'frameworksCount' => \App\Models\Framework::count(),
        'domainsCount' => \App\Models\Domain::count(),
        'controlsCount' => \App\Models\Control::count(),
        'requirementsCount' => \App\Models\Requirement::count(),
    ]);

})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


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
    | Frameworks
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



    /*
    |--------------------------------------------------------------------------
    | Framework Template
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/frameworks/template',
        [FrameworkTemplateController::class, 'store']
    )->name('frameworks.template.store');


    Route::get(
        '/frameworks/{slug}',
        [FrameworkTemplateController::class, 'show']
    )
        ->where(
            'slug',
            '[a-z0-9]+(?:-[a-z0-9]+)*'
        )
        ->name('frameworks.show');



    /*
    |--------------------------------------------------------------------------
    | Domains
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



    /*
    |--------------------------------------------------------------------------
    | Domain Template
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/domains/template',
        [DomainTemplateController::class, 'store']
    )->name('domains.template.store');


    Route::get(
        '/domains/{slug}',
        [DomainTemplateController::class, 'show']
    )
        ->where(
            'slug',
            '[a-z0-9]+(?:-[a-z0-9]+)*'
        )
        ->name('domains.show');



    /*
    |--------------------------------------------------------------------------
    | Controls
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



    /*
    |--------------------------------------------------------------------------
    | Control Template
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/controls/template',
        [ControlTemplateController::class, 'store']
    )->name('controls.template.store');


    /*
    |--------------------------------------------------------------------------
    | Control Detail / Rendered Template
    |--------------------------------------------------------------------------
    |
    | Example:
    |
    | /controls/GOV-001
    |
    */

    Route::get(
        '/controls/view/{control_id}',
        [ControlTemplateController::class, 'show']
    )
        ->where(
            'control_id',
            '[A-Za-z0-9_-]+'
        )
        ->name('controls.show');



    /*
    |--------------------------------------------------------------------------
    | Requirements
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



    /*
    |--------------------------------------------------------------------------
    | Requirement Template
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/requirements/template',
        [RequirementTemplateController::class, 'store']
    )->name('requirements.template.store');


    /*
    |--------------------------------------------------------------------------
    | Requirement Detail / Rendered Template
    |--------------------------------------------------------------------------
    |
    | Example:
    |
    | /requirements/REQ-001
    |
    */

    Route::get(
        '/requirements/view/{requirement_id}',
        [RequirementTemplateController::class, 'show']
    )
        ->where(
            'requirement_id',
            '[A-Za-z0-9_-]+'
        )
        ->name('requirements.show');

});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';