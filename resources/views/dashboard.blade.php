<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>aspiaUCL | Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            background: #0e1836 !important;
            color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
        }


        /* =========================================
           MAIN APPLICATION
        ========================================= */

        .aspia-dashboard {
            min-height: 100vh;
            background: #0e1836;
            color: #ffffff;
        }


        /* =========================================
           TOP BAR
        ========================================= */

        .aspia-topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;

            height: 72px;

            background: #101d3b;

            border-bottom: 1px solid rgba(255,255,255,.07);

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 30px;

            z-index: 1000;
        }


        .topbar-logo {
            display: flex;
            align-items: center;
        }


        .topbar-logo img {
            width: 150px;
            height: auto;
            display: block;
        }


        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }


        .admin-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }


        .admin-avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: rgba(16,188,232,.12);

            border: 1px solid rgba(16,188,232,.4);

            color: #10bce8;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
            font-weight: bold;
        }


        .admin-details {
            display: flex;
            flex-direction: column;
        }


        .admin-name {
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
        }


        .admin-role {
            color: #7f8da6;
            font-size: 11px;
            margin-top: 2px;
        }


        .logout-button {
            border: 1px solid #29476b;

            background: transparent;

            color: #aebbd0;

            padding: 9px 15px;

            border-radius: 8px;

            cursor: pointer;

            font-size: 13px;

            transition: .2s;
        }


        .logout-button:hover {
            background: rgba(239,68,68,.1);

            border-color: rgba(239,68,68,.4);

            color: #ff8585;
        }


        /* =========================================
           SIDEBAR
        ========================================= */

        .aspia-sidebar {

            position: fixed;

            top: 72px;
            left: 0;

            width: 260px;

            height: calc(100vh - 72px);

            background: #101d3b;

            border-right: 1px solid #1c4266;

            padding: 25px 18px;

            overflow-y: auto;

            z-index: 900;
        }


        /* =========================================
           SIDEBAR BRAND
        ========================================= */

        .aspia-brand {

            display: flex;

            flex-direction: column;

            align-items: flex-start;

            gap: 8px;

            padding: 5px 10px 25px;

            border-bottom: 1px solid rgba(255,255,255,.07);
        }


        .aspia-logo-image {

            width: 190px;

            height: auto;

            display: block;
        }


        /* =========================================
           SIDEBAR MENU
        ========================================= */

        .menu-title {

            color: #63728c;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1.5px;

            margin: 30px 12px 12px;
        }


        .aspia-menu {

            display: flex;

            flex-direction: column;

            gap: 6px;
        }


        .aspia-menu a {

            display: flex;

            align-items: center;

            gap: 13px;

            padding: 14px 15px;

            color: #aebbd0;

            text-decoration: none;

            border-radius: 10px;

            font-size: 14px;

            border: 1px solid transparent;

            transition: all .2s ease;
        }


        .aspia-menu a:hover {

            background: #17294a;

            color: #ffffff;

            border-color: rgba(16,188,232,.08);
        }


        .aspia-menu a.active {

            color: #10bce8;

            background: rgba(16,188,232,.12);

            border-color: rgba(16,188,232,.18);
        }


        .menu-icon {

            width: 20px;

            text-align: center;

            font-size: 17px;

            color: inherit;
        }


        /* =========================================
           MAIN CONTENT
        ========================================= */

        .aspia-main {

            margin-left: 260px;

            padding-top: 72px;

            min-height: 100vh;

            background: #0e1836;
        }


        .aspia-content {

            padding: 45px;
        }


        /* =========================================
           WELCOME
        ========================================= */

        .welcome {

            margin-bottom: 35px;
        }


        .welcome-badge {

            display: inline-block;

            background: rgba(16,188,232,.12);

            border: 1px solid rgba(16,188,232,.18);

            color: #10bce8;

            padding: 7px 15px;

            border-radius: 30px;

            font-size: 11px;

            font-weight: 600;

            letter-spacing: 1.3px;

            margin-bottom: 18px;
        }


        .welcome h1 {

            font-size: 32px;

            line-height: 1.2;

            font-weight: 500;

            margin: 0 0 10px;
        }


        .welcome p {

            color: #8f9db5;

            font-size: 14px;

            line-height: 1.6;

            margin: 0;
        }


        /* =========================================
           STATISTICS
        ========================================= */

        .stats {

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 30px;
        }


        .stat-card {

            background: #162544;

            border: 1px solid #1c4266;

            border-radius: 15px;

            padding: 25px;

            min-height: 145px;

            transition: all .2s ease;
        }


        .stat-card:hover {

            border-color: rgba(16,188,232,.45);

            transform: translateY(-2px);

            box-shadow: 0 12px 30px rgba(0,0,0,.15);
        }


        .stat-top {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 20px;
        }


        .stat-title {

            color: #8f9db5;

            font-size: 13px;
        }


        .stat-icon {

            width: 38px;

            height: 38px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 10px;

            background: rgba(16,188,232,.1);

            color: #10bce8;

            font-size: 18px;
        }


        .stat-number {

            font-size: 32px;

            font-weight: 500;

            color: #ffffff;
        }


        /* =========================================
           ACTIVITY CARD
        ========================================= */

        .activity-card {

            background: #162544;

            border: 1px solid #1c4266;

            border-radius: 15px;

            padding: 25px;
        }


        .activity-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 15px;
        }


        .activity-card h2 {

            font-size: 17px;

            font-weight: 500;

            margin: 0;
        }


        .activity-status {

            color: #10bce8;

            font-size: 11px;

            padding: 6px 10px;

            background: rgba(16,188,232,.1);

            border-radius: 20px;
        }


        .activity {

            display: flex;

            align-items: center;

            gap: 13px;

            padding: 16px 0;

            border-bottom: 1px solid rgba(255,255,255,.06);

            color: #aebbd0;

            font-size: 14px;
        }


        .activity:last-child {

            border-bottom: none;

            padding-bottom: 0;
        }


        .activity-dot {

            width: 7px;

            height: 7px;

            background: #10bce8;

            border-radius: 50%;

            flex-shrink: 0;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media(max-width: 1200px) {

            .stats {

                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media(max-width: 900px) {

            .aspia-sidebar {

                width: 220px;
            }


            .aspia-main {

                margin-left: 220px;
            }


            .stats {

                grid-template-columns: 1fr;
            }


            .aspia-content {

                padding: 30px;
            }

        }


        @media(max-width: 650px) {

            .aspia-topbar {

                padding: 0 15px;
            }


            .topbar-logo img {

                width: 125px;
            }


            .admin-details {

                display: none;
            }


            .logout-button {

                padding: 8px 10px;
            }


            .aspia-sidebar {

                position: relative;

                top: 72px;

                width: 100%;

                height: auto;

                border-right: none;

                border-bottom: 1px solid #1c4266;
            }


            .aspia-main {

                margin-left: 0;

                padding-top: 72px;
            }


            .aspia-content {

                padding: 25px 18px;
            }


            .welcome h1 {

                font-size: 26px;
            }

        }

    </style>


    <div class="aspia-dashboard">


        <!-- =====================================================
             TOP BAR
        ====================================================== -->

        <header class="aspia-topbar">


            <!-- LOGO -->

            <div class="topbar-logo">

                <img
                    src="{{ asset('images/aspia.png') }}"
                    alt="ASPIA"
                >

            </div>


            <!-- ADMIN -->

            <div class="topbar-right">


                <div class="admin-info">

                    <div class="admin-avatar">

                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                    </div>


                    <div class="admin-details">

                        <div class="admin-name">

                            {{ Auth::user()->name }}

                        </div>

                        <div class="admin-role">

                            Super Admin

                        </div>

                    </div>

                </div>


                <!-- LOGOUT -->

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-button"
                    >
                        Logout
                    </button>

                </form>


            </div>

        </header>


        <!-- =====================================================
             SIDEBAR
        ====================================================== -->

        <aside class="aspia-sidebar">


            <!-- BRAND -->

            <div class="aspia-brand">

                <img
                    src="{{ asset('images/aspiaucl.png') }}"
                    alt="ASPIA"
                    class="aspia-logo-image"
                >
            </div>


            <!-- MENU TITLE -->

            <div class="menu-title">
                Management
            </div>


            <!-- MENU -->

            <nav class="aspia-menu">


                <!-- DASHBOARD -->

                <a
                    href="{{ route('dashboard') }}"
                    class="active"
                >

                    <span class="menu-icon">
                        ▣
                    </span>

                    Dashboard

                </a>


                <!-- FRAMEWORKS -->

                <a href="{{ route('frameworks.index') }}">

                    <span class="menu-icon">
        ◇
                    </span>

                    Frameworks

                </a>


                <!-- DOMAINS -->

                <a href="{{ route('domains.index') }}">

                    <span class="menu-icon">
                        ◈
                    </span>

                    Domains

                </a>


                <!-- CONTROLS -->

                <a href="{{ route('controls.index') }}">

                    <span class="menu-icon">
                        ◉
                    </span>

                    Controls

                </a>


                <!-- REQUIREMENTS -->

                <a href="{{ route('requirements.index') }}">

                    <span class="menu-icon">
                        ◆
                    </span>

                    Requirements

                </a>


            </nav>


        </aside>


        <!-- =====================================================
             MAIN CONTENT
        ====================================================== -->

        <main class="aspia-main">


            <div class="aspia-content">


                <!-- WELCOME -->

                <section class="welcome">


                    <div class="welcome-badge">
                        ASPIA UCL
                    </div>


                    <h1>
                        Welcome back, {{ Auth::user()->name }}
                    </h1>


                    <p>
                        Manage your governance and compliance
                        structure through aspiaUCL.
                    </p>


                </section>


                <!-- =================================================
                     STATISTICS
                ================================================== -->

                <section class="stats">


                    <!-- FRAMEWORKS -->

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-title">
                                Frameworks
                            </div>

                            <div class="stat-icon">
                                ◇
                            </div>

                        </div>


                        <div class="stat-number">
                            {{ $frameworksCount ?? \App\Models\Framework::count() }}
                        </div>

                    </div>


                    <!-- DOMAINS -->

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-title">
                                Domains
                            </div>

                            <div class="stat-icon">
                                ◈
                            </div>

                        </div>


                        <div class="stat-number">
                            {{ $domainsCount ?? \App\Models\Domain::count() }}
                        </div>

                    </div>


                    <!-- CONTROLS -->

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-title">
                                Controls
                            </div>

                            <div class="stat-icon">
                                ◉
                            </div>

                        </div>


                        <div class="stat-number">
                            {{ $controlsCount ?? \App\Models\Control::count() }}
                        </div>

                    </div>


                    <!-- REQUIREMENTS -->

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-title">
                                Requirements
                            </div>

                            <div class="stat-icon">
                                ◆
                            </div>

                        </div>


                        <div class="stat-number">
                            {{ $requirementsCount ?? \App\Models\Requirement::count() }}
                        </div>

                    </div>


                </section>


                <!-- =================================================
                     RECENT ACTIVITY
                ================================================== -->

                <section class="activity-card">


                    <div class="activity-header">

                        <h2>
                            Recent Activity
                        </h2>

                        <span class="activity-status">
                            LIVE
                        </span>

                    </div>


                    @forelse($activities as $activity)

                        <div class="activity">

                            <span class="activity-dot"></span>

                            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">

                                <div>
                                    <strong style="color: #10bce8; text-transform: uppercase; font-size: 11px; margin-right: 6px; letter-spacing: 0.5px;">[{{ $activity->module }}]</strong>
                                    <span>{{ $activity->description }}</span>
                                </div>

                                <span style="font-size: 12px; color: #63728c; white-space: nowrap; margin-left: 12px;">
                                    {{ $activity->created_at->diffForHumans() }}
                                </span>

                            </div>

                        </div>

                    @empty

                        <div class="activity" style="color: #63728c;">

                            <span class="activity-dot" style="background: #63728c;"></span>

                            No recent activity recorded yet.

                        </div>

                    @endforelse


                </section>


            </div>


        </main>


    </div>

</html>