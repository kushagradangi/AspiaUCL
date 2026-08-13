<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\RequirementController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})
->middleware(['auth', 'verified'])
->name('dashboard');


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

});


require __DIR__.'/auth.php';