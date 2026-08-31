@extends('layouts.aspiaUcl')

@section('title', ' | Dashboard')

@section('page-title', 'Dashboard')

@section('content')

<div class="welcome">

    <h1>
        Welcome back, {{ auth()->user()->name }}
    </h1>

    <p>
        Manage your governance and compliance structure from aspiaUCL.
    </p>

</div>


<div class="cards">

    <div class="card">
        <span class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/>
                <path d="m22 12.5-8.58 3.91a2 2 0 0 1-1.66 0L2 12.5"/>
                <path d="m22 17.5-8.58 3.91a2 2 0 0 1-1.66 0L2 17.5"/>
            </svg>
        </span>
        <div class="card-label">
            Frameworks
        </div>
        <div class="card-number">
            {{ $frameworksCount ?? \App\Models\Framework::count() }}
        </div>
    </div>

    <div class="card">
        <span class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
                <path d="M2 12h20"/>
            </svg>
        </span>
        <div class="card-label">
            Domains
        </div>
        <div class="card-number">
            {{ $domainsCount ?? \App\Models\Domain::count() }}
        </div>
    </div>

    <div class="card">
        <span class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                <path d="m9 12 2 2 4-4"/>
            </svg>
        </span>
        <div class="card-label">
            Controls
        </div>
        <div class="card-number">
            {{ $controlsCount ?? \App\Models\Control::count() }}
        </div>
    </div>

    <div class="card">
        <span class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/>
                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                <path d="M9 12h6"/>
                <path d="M9 16h6"/>
                <path d="M9 8h6"/>
            </svg>
        </span>
        <div class="card-label">
            Requirements
        </div>
        <div class="card-number">
            {{ $requirementsCount ?? \App\Models\Requirement::count() }}
        </div>
    </div>

</div>


<div class="panel">

    <h2>
        Recent Activity
    </h2>


    <div class="activity">
        Framework information updated
    </div>

    <div class="activity">
        New control added
    </div>

    <div class="activity">
        Requirement modified
    </div>

</div>

@endsection