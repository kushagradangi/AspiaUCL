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

        <span class="card-icon">◇</span>

        <div class="card-label">
            Frameworks
        </div>

        <div class="card-number">
            {{ $frameworksCount ?? \App\Models\Framework::count() }}
        </div>

    </div>


    <div class="card">

        <span class="card-icon">◈</span>

        <div class="card-label">
            Domains
        </div>

        <div class="card-number">
            {{ $domainsCount ?? \App\Models\Domain::count() }}
        </div>

    </div>


    <div class="card">

        <span class="card-icon">◉</span>

        <div class="card-label">
            Controls
        </div>

        <div class="card-number">
            {{ $controlsCount ?? \App\Models\Control::count() }}
        </div>

    </div>


    <div class="card">

        <span class="card-icon">◆</span>

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