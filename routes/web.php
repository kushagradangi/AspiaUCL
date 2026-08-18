<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\FrameworkTemplateController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\DomainTemplateController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\RequirementController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Website root → Login page
Route::get('/', function () {

    return redirect()->route('login');

});


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    return view('dashboard');

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


    // Framework list

    Route::get(
        '/frameworks',
        [FrameworkController::class, 'index']
    )->name('frameworks.index');


    // Add Framework

    Route::post(
        '/frameworks',
        [FrameworkController::class, 'store']
    )->name('frameworks.store');


    // Update Framework

    Route::put(
        '/frameworks/{framework}',
        [FrameworkController::class, 'update']
    )->name('frameworks.update');


    // Delete Framework

    Route::delete(
        '/frameworks/{framework}',
        [FrameworkController::class, 'destroy']
    )->name('frameworks.destroy');


    // Import Frameworks

    Route::post(
        '/frameworks/import',
        [FrameworkController::class, 'import']
    )->name('frameworks.import');



    /*
    |--------------------------------------------------------------------------
    | Framework Template
    |--------------------------------------------------------------------------
    */


    // Save Framework HTML Template

    Route::post(
        '/frameworks/template',
        [FrameworkTemplateController::class, 'store']
    )->name('frameworks.template.store');


    /*
    |--------------------------------------------------------------------------
    | Framework Detail Page
    |--------------------------------------------------------------------------
    |
    | Example:
    |
    | /frameworks/iso-27001
    |
    */

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


    // Domain list

    Route::get(
        '/domains',
        [DomainController::class, 'index']
    )->name('domains.index');


    // Add Domain

    Route::post(
        '/domains',
        [DomainController::class, 'store']
    )->name('domains.store');


    // Update Domain

    Route::put(
        '/domains/{domain}',
        [DomainController::class, 'update']
    )->name('domains.update');


    // Delete Domain

    Route::delete(
        '/domains/{domain}',
        [DomainController::class, 'destroy']
    )->name('domains.destroy');


    // Import Domains

    Route::post(
        '/domains/import',
        [DomainController::class, 'import']
    )->name('domains.import');



    /*
    |--------------------------------------------------------------------------
    | Domain Template
    |--------------------------------------------------------------------------
    */


    // Save Domain HTML Template

    Route::post(
        '/domains/template',
        [DomainTemplateController::class, 'store']
    )->name('domains.template.store');


    /*
    |--------------------------------------------------------------------------
    | Domain Detail Page
    |--------------------------------------------------------------------------
    |
    | Example:
    |
    | /domains/access-control
    |
    */

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


    // Control list

    Route::get(
        '/controls',
        [ControlController::class, 'index']
    )->name('controls.index');


    // Add Control

    Route::post(
        '/controls',
        [ControlController::class, 'store']
    )->name('controls.store');


    // Update Control

    Route::put(
        '/controls/{control}',
        [ControlController::class, 'update']
    )->name('controls.update');


    // Delete Control

    Route::delete(
        '/controls/{control}',
        [ControlController::class, 'destroy']
    )->name('controls.destroy');


    // Import Controls

    Route::post(
        '/controls/import',
        [ControlController::class, 'import']
    )->name('controls.import');



    /*
    |--------------------------------------------------------------------------
    | Requirements
    |--------------------------------------------------------------------------
    */


    // Requirement list

    Route::get(
        '/requirements',
        [RequirementController::class, 'index']
    )->name('requirements.index');


    // Add Requirement

    Route::post(
        '/requirements',
        [RequirementController::class, 'store']
    )->name('requirements.store');


    // Update Requirement

    Route::put(
        '/requirements/{requirement}',
        [RequirementController::class, 'update']
    )->name('requirements.update');


    // Delete Requirement

    Route::delete(
        '/requirements/{requirement}',
        [RequirementController::class, 'destroy']
    )->name('requirements.destroy');


    // Import Requirements

    Route::post(
        '/requirements/import',
        [RequirementController::class, 'import']
    )->name('requirements.import');

});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';