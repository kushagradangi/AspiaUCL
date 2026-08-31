<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        aspiaUCL
        @yield('title')
    </title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0e1836;
            color: #ffffff;
        }


        /* ================= SIDEBAR ================= */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;

            width: 260px;
            height: 100vh;

            background: #101d3b;

            border-right: 1px solid #1c4266;

            padding: 25px 18px;

            display: flex;
            flex-direction: column;

            z-index: 900;
        }


        /* ================= BRAND ================= */

        .brand {

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 5px 10px 30px;

            border-bottom: 1px solid rgba(255,255,255,0.06);
        }


        .brand-logo {

            display: block;

            width: 150px;
            max-width: 100%;
            height: auto;

            object-fit: contain;
        }


        /* ================= MENU ================= */

        .menu {

            margin-top: 35px;
        }


        .menu-title {

            color: #64738d;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1.5px;

            margin: 0 12px 12px;
        }


        .menu-link {

            display: flex;

            align-items: center;

            gap: 14px;

            padding: 14px 15px;

            margin-bottom: 7px;

            color: #aebbd0;

            text-decoration: none;

            border-radius: 10px;

            font-size: 14px;

            transition: 0.2s;
        }


        .menu-link:hover {

            background: #17294a;

            color: #ffffff;
        }


        .menu-link.active {

            background: rgba(16,188,232,0.12);

            color: #10bce8;

            border: 1px solid rgba(16,188,232,0.15);
        }


        .menu-icon {
            width: 20px;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: inherit;
            flex-shrink: 0;
        }

        .menu-icon svg {
            width: 18px;
            height: 18px;
            display: block;
        }


        /* ================= BOTTOM ================= */

        .sidebar-bottom {

            margin-top: auto;
        }


        .logout-button {

            width: 100%;

            border: none;

            background: transparent;

            color: #aebbd0;

            display: flex;

            align-items: center;

            gap: 14px;

            padding: 14px 15px;

            border-radius: 10px;

            cursor: pointer;

            font-size: 14px;

            text-align: left;
        }


        .logout-button:hover {

            background: rgba(239,68,68,0.1);

            color: #ff8b8b;
        }


        /* ================= MAIN ================= */

        .main-content {

            margin-left: 260px;

            min-height: 100vh;
        }


        /* ================= TOPBAR ================= */

        .topbar {

            height: 75px;

            border-bottom: 1px solid rgba(255,255,255,0.06);

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 40px;
        }


        /* ================= TOP MODULE TITLE ================= */

        .topbar-module-title {

            font-size: 24px;

            font-weight: 500;

            color: #ffffff;
        }


        /* ================= ADMIN ================= */

        .admin {

            display: flex;

            align-items: center;

            gap: 12px;
        }


        .admin-avatar {

            width: 38px;
            height: 38px;

            background: #173b5a;

            border: 1px solid #10bce8;

            color: #10bce8;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: bold;
        }


        .admin-info strong {

            display: block;

            font-size: 13px;
        }


        .admin-info span {

            color: #71809a;

            font-size: 11px;
        }


        /* ================= CONTENT ================= */

        .content {

            padding: 40px;
        }


        .welcome {

            margin-bottom: 30px;
        }


        .welcome h1 {

            font-size: 30px;

            font-weight: 500;

            margin-bottom: 8px;
        }


        .welcome p {

            color: #8f9db5;

            font-size: 14px;
        }


        /* ================= CARDS ================= */

        .cards {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 30px;
        }


        .card {

            background: #162544;

            border: 1px solid #1c4266;

            border-radius: 15px;

            padding: 25px;
        }


        .card-label {

            color: #8f9db5;

            font-size: 13px;

            margin-bottom: 15px;
        }


        .card-number {

            font-size: 32px;

            font-weight: 500;

            color: #ffffff;
        }


        .card-icon {

            float: right;

            color: #10bce8;

            font-size: 22px;
        }


        /* ================= PANEL ================= */

        .panel {

            background: #162544;

            border: 1px solid #1c4266;

            border-radius: 15px;

            padding: 25px;
        }


        .panel h2 {

            font-size: 17px;

            font-weight: 500;

            margin-bottom: 20px;
        }


        .activity {

            padding: 15px 0;

            border-bottom: 1px solid rgba(255,255,255,0.05);

            color: #aebbd0;

            font-size: 14px;
        }


        .activity:last-child {

            border-bottom: none;
        }


        /* ================= RESPONSIVE ================= */

        @media(max-width: 1200px) {

            .cards {

                grid-template-columns: repeat(2, 1fr);

            }

        }


        @media(max-width: 900px) {

            .sidebar {

                width: 220px;
            }


            .main-content {

                margin-left: 220px;
            }


            .cards {

                grid-template-columns: 1fr;
            }


            .topbar-module-title {

                font-size: 22px;
            }

        }


        @media(max-width: 700px) {

            .sidebar {

                position: relative;

                width: 100%;

                height: auto;
            }


            .main-content {

                margin-left: 0;
            }


            .sidebar-bottom {

                margin-top: 20px;
            }


            .topbar {

                padding: 0 20px;
            }


            .topbar-module-title {

                font-size: 20px;
            }


            .content {

                padding: 20px;
            }

        }

        /* ================= ALERTS ================= */
        .alert-success {
            background: rgba(34,197,94,.12);
            border: 1px solid rgba(34,197,94,.3);
            color: #6ee7a0;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13.5px;
        }

        .alert-error {
            background: rgba(239,68,68,.12);
            border: 1px solid rgba(239,68,68,.3);
            color: #ff8585;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13.5px;
        }

        .alert-info {
            background: rgba(16,188,232,.12);
            border: 1px solid rgba(16,188,232,.3);
            color: #10bce8;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13.5px;
        }

    </style>

</head>


<body>


<!-- ================= SIDEBAR ================= -->

<aside class="sidebar">


    <!-- ASPIA UCL LOGO -->

    <div class="brand">

        <a
            href="{{ route('dashboard') }}"
            style="display:flex;align-items:center;justify-content:center;width:100%;"
        >

            <img
                src="{{ asset('images/aspia.png') }}"
                alt="ASPIA"
                class="brand-logo"
            >

        </a>

    </div>


    <nav class="menu">

        <div class="menu-title">
            Management
        </div>


        <!-- DASHBOARD -->
        <a
            href="{{ route('dashboard') }}"
            class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
        >
            <span class="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="9" x="3" y="3" rx="1"/>
                    <rect width="7" height="5" x="14" y="3" rx="1"/>
                    <rect width="7" height="9" x="14" y="12" rx="1"/>
                    <rect width="7" height="5" x="3" y="16" rx="1"/>
                </svg>
            </span>
            Dashboard
        </a>

        <!-- FRAMEWORKS -->
        <a
            href="{{ route('frameworks.index') }}"
            class="menu-link {{ request()->routeIs('frameworks.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/>
                    <path d="m22 12.5-8.58 3.91a2 2 0 0 1-1.66 0L2 12.5"/>
                    <path d="m22 17.5-8.58 3.91a2 2 0 0 1-1.66 0L2 17.5"/>
                </svg>
            </span>
            Frameworks
        </a>

        <!-- DOMAINS -->
        <a
            href="{{ route('domains.index') }}"
            class="menu-link {{ request()->routeIs('domains.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
                    <path d="M2 12h20"/>
                </svg>
            </span>
            Domains
        </a>

        <!-- CONTROLS -->
        <a
            href="{{ route('controls.index') }}"
            class="menu-link {{ request()->routeIs('controls.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                    <path d="m9 12 2 2 4-4"/>
                </svg>
            </span>
            Controls
        </a>

        <!-- REQUIREMENTS -->
        <a
            href="{{ route('requirements.index') }}"
            class="menu-link {{ request()->routeIs('requirements.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/>
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                    <path d="M9 12h6"/>
                    <path d="M9 16h6"/>
                    <path d="M9 8h6"/>
                </svg>
            </span>
            Requirements
        </a>

    </nav>

    <div class="sidebar-bottom">
        <form
            method="POST"
            action="{{ route('logout') }}"
        >
            @csrf
            <button
                type="submit"
                class="logout-button"
            >
                <span style="display:inline-flex;align-items:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" x2="9" y1="12" y2="12"/>
                    </svg>
                </span>
                Logout
            </button>
        </form>
    </div>


</aside>



<!-- ================= MAIN ================= -->

<div class="main-content">


    <header class="topbar">


        <!-- MODULE TITLE -->

        <div class="topbar-module-title">

            @yield(
                'page-title',
                'Dashboard'
            )

        </div>


        <!-- ADMIN -->

        <div class="admin">

            <div class="admin-avatar">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </div>


            <div class="admin-info">

                <strong>

                    {{ auth()->user()->name }}

                </strong>

                <span>

                    Super Admin

                </span>

            </div>

        </div>

    </header>


    <main class="content">

        @yield('content')

    </main>


</div>


</body>

</html>