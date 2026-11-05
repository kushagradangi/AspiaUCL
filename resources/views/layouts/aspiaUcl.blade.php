<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta name="csrf-token" content="{{ csrf_token() }}">

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


        :root {
            --aspia-infotech-font-primary: "Inter", sans-serif;
            --aspia-infotech-font-mono: "JetBrains Mono", "SFMono-Regular", Consolas, monospace;
        }

        body {
            font-family: var(--aspia-infotech-font-primary);
            background: #0D1735;
            color: #ffffff;
        }


        /* ================= SIDEBAR ================= */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;

            width: 260px;
            height: 100vh;

            background: #172540;

            border-right: 1px solid #1c4266;

            padding: 0;

            display: flex;
            flex-direction: column;

            z-index: 900;
        }


        /* ================= BRAND ================= */

        .brand {

            height: 75px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0 18px;

            border-bottom: 1px solid rgba(255,255,255,0.06);

            flex-shrink: 0;

            box-sizing: border-box;
        }

        .brand a {

            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            text-decoration: none;
        }


        .brand-logo {

            display: block;

            width: 140px;
            max-height: 42px;
            max-width: 100%;
            height: auto;

            object-fit: contain;
        }


        /* ================= MENU ================= */

        .menu {

            margin-top: 0;

            padding: 24px 18px 12px;

            flex: 1;

            overflow-y: auto;
        }

        .menu::-webkit-scrollbar {
            width: 4px;
        }

        .menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
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

            background: #172540;

            color: #ffffff;
        }


        .menu-link.active {

            background: rgba(22,196,244,0.12);

            color: #16C4F4;

            border: 1px solid rgba(22,196,244,0.15);
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

            padding: 15px 18px 22px;

            flex-shrink: 0;
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

            padding: 0 32px;
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

            background: #172540;

            border: 1px solid #16C4F4;

            color: #16C4F4;

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

            padding: 24px 32px;
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

            color: #16C4F4;

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
            background: rgba(22,196,244,.12);
            border: 1px solid rgba(22,196,244,.3);
            color: #16C4F4;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13.5px;
        }

        /* ================= NOTIFICATIONS ================= */
        .topbar-right-actions {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .notif-wrapper {
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .notif-bell-btn {
            background: #172540;
            border: 1px solid rgba(22, 196, 244, 0.3);
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #16C4F4;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
            padding: 0;
            outline: none;
        }

        .notif-bell-btn:hover {
            background: #1c355e;
            border-color: #16C4F4;
            color: #ffffff;
            box-shadow: 0 0 12px rgba(22, 196, 244, 0.35);
        }

        .notif-bell-icon {
            width: 19px;
            height: 19px;
        }

        .notif-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: #ef4444;
            color: #ffffff;
            font-size: 10px;
            font-weight: 700;
            min-width: 18px;
            height: 18px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 4px;
            box-shadow: 0 0 8px rgba(239, 68, 68, 0.7);
            border: 2px solid #0f1c34;
            line-height: 1;
        }

        .notif-dropdown {
            position: absolute;
            top: 48px;
            right: 0;
            width: 380px;
            max-width: 90vw;
            background: #13223f;
            border: 1px solid #1c4266;
            border-radius: 14px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.65);
            z-index: 10000;
            display: none;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .notif-dropdown.show {
            display: block;
            animation: notifDropIn 0.2s ease-out forwards;
        }

        @keyframes notifDropIn {
            from {
                opacity: 0;
                transform: translateY(-8px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .notif-header {
            padding: 13px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: #16284a;
        }

        .notif-header-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13.5px;
            font-weight: 600;
            color: #ffffff;
        }

        .notif-header-count {
            font-size: 11px;
            padding: 2px 7px;
            background: rgba(22, 196, 244, 0.15);
            color: #16C4F4;
            border-radius: 10px;
            font-weight: 600;
        }

        .notif-mark-all-btn {
            background: transparent;
            border: none;
            color: #16C4F4;
            font-size: 12px;
            cursor: pointer;
            padding: 2px 6px;
            border-radius: 4px;
            transition: color 0.15s ease;
        }

        .notif-mark-all-btn:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .notif-list {
            max-height: 380px;
            overflow-y: auto;
        }

        .notif-list::-webkit-scrollbar {
            width: 4px;
        }

        .notif-list::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.12);
            border-radius: 4px;
        }

        .notif-empty {
            padding: 32px 20px;
            text-align: center;
            color: #71809a;
            font-size: 13px;
        }

        .notif-item {
            padding: 12px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            gap: 12px;
            align-items: flex-start;
            text-decoration: none;
            color: inherit;
            transition: background 0.15s ease;
            position: relative;
        }

        .notif-item:hover {
            background: rgba(255, 255, 255, 0.04);
        }

        .notif-item.unread {
            background: rgba(22, 196, 244, 0.05);
            border-left: 3px solid #16C4F4;
        }

        .notif-item-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 14px;
        }

        .notif-item-icon.success {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .notif-item-icon.error {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .notif-item-body {
            flex: 1;
            min-width: 0;
        }

        .notif-item-title {
            font-size: 12.5px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 3px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notif-item-msg {
            font-size: 12px;
            color: #8f9db5;
            line-height: 1.4;
            word-break: break-word;
        }

        .notif-item-time {
            font-size: 10.5px;
            color: #64738d;
            margin-top: 5px;
        }

        .notif-item-check-btn {
            background: none;
            border: none;
            color: #64738d;
            cursor: pointer;
            padding: 2px 4px;
            border-radius: 4px;
            font-size: 11px;
            transition: color 0.15s ease;
        }

        .notif-item-check-btn:hover {
            color: #16C4F4;
        }

        /* ================= TOAST CONTAINER & CARDS ================= */
        .toast-container {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 999999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-width: 400px;
            width: calc(100% - 48px);
            pointer-events: none;
        }

        .toast-card {
            pointer-events: auto;
            background: #13223f;
            border: 1px solid #1c4266;
            border-radius: 12px;
            padding: 14px 16px;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.65);
            display: flex;
            gap: 12px;
            align-items: flex-start;
            animation: toastSlideIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            transition: all 0.25s ease;
            position: relative;
        }

        .toast-card.success {
            border-left: 4px solid #22c55e;
        }

        .toast-card.error {
            border-left: 4px solid #ef4444;
        }

        @keyframes toastSlideIn {
            from {
                opacity: 0;
                transform: translateX(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }

        .toast-card.fade-out {
            opacity: 0;
            transform: translateX(60px);
        }

        .toast-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .toast-icon.success {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .toast-icon.error {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .toast-content {
            flex: 1;
            min-width: 0;
        }

        .toast-title {
            font-size: 13px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 3px;
        }

        .toast-desc {
            font-size: 12px;
            color: #aebbd0;
            line-height: 1.4;
            word-break: break-word;
        }

        .toast-close-btn {
            background: none;
            border: none;
            color: #71809a;
            cursor: pointer;
            padding: 2px;
            font-size: 14px;
            line-height: 1;
            transition: color 0.15s ease;
        }

        .toast-close-btn:hover {
            color: #ffffff;
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
            style="display:flex;align-items:center;justify-content:center;width:100%;height:100%;"
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

        <!-- REQUIREMENT EVIDENCE MAPPING -->
        <a
            href="{{ route('requirement-evidence-mappings.index') }}"
            class="menu-link {{ request()->routeIs('requirement-evidence-mappings.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <path d="m9 15 2 2 4-4"/>
                </svg>
            </span>
            Requirement Evidence Mapping
        </a>

        <!-- API ACCESS MANAGEMENT -->
        <a
            href="{{ route('api-clients.index') }}"
            class="menu-link {{ request()->routeIs('api-clients.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </span>
            API Access Management
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


        <!-- TOPBAR RIGHT ACTIONS -->
        <div class="topbar-right-actions">

            <!-- NOTIFICATION BELL & DROPDOWN -->
            <div class="notif-wrapper" id="notifWrapper">
                <button type="button" class="notif-bell-btn" id="notifBellBtn" aria-label="Notifications" title="Notifications">
                    <svg class="notif-bell-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                    </svg>
                    <span class="notif-badge" id="notifBadge" style="display:none;">0</span>
                </button>

                <!-- DROPDOWN MENU -->
                <div class="notif-dropdown" id="notifDropdown">
                    <div class="notif-header">
                        <div class="notif-header-title">
                            <span>Notifications</span>
                            <span class="notif-header-count" id="notifHeaderCount">0 unread</span>
                        </div>
                        <button type="button" class="notif-mark-all-btn" id="notifMarkAllBtn">Mark all read</button>
                    </div>
                    <div class="notif-list" id="notifList">
                        <div class="notif-empty">No notifications yet</div>
                    </div>
                </div>
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

        </div>

    </header>


    <main class="content">

        @yield('content')

    </main>


</div>

<!-- TOAST NOTIFICATION CONTAINER -->
<div id="toastContainer" class="toast-container" aria-live="polite"></div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('appSidebar');
        const backdrop = document.getElementById('sidebarBackdrop');
        if (sidebar && backdrop) {
            sidebar.classList.toggle('show');
            backdrop.classList.toggle('show');
        }
    }

    // ================= NOTIFICATION & TOAST POLLER =================
    (function() {
        const bellBtn = document.getElementById('notifBellBtn');
        const notifDropdown = document.getElementById('notifDropdown');
        const notifBadge = document.getElementById('notifBadge');
        const notifList = document.getElementById('notifList');
        const notifHeaderCount = document.getElementById('notifHeaderCount');
        const markAllBtn = document.getElementById('notifMarkAllBtn');
        const toastContainer = document.getElementById('toastContainer');
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        // Store IDs of notifications we have toasted to avoid repeating popups on every poll
        const toastedIds = new Set(JSON.parse(sessionStorage.getItem('aspia_toasted_notifs') || '[]'));

        function saveToastedIds() {
            sessionStorage.setItem('aspia_toasted_notifs', JSON.stringify(Array.from(toastedIds)));
        }

        // Toggle dropdown
        if (bellBtn && notifDropdown) {
            bellBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                notifDropdown.classList.toggle('show');
            });

            document.addEventListener('click', function(e) {
                if (!notifDropdown.contains(e.target) && e.target !== bellBtn) {
                    notifDropdown.classList.remove('show');
                }
            });
        }

        // Mark all as read
        if (markAllBtn) {
            markAllBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                fetch("{{ route('notifications.mark-all-read') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                }).then(() => fetchNotifications(false));
            });
        }

        function markSingleAsRead(id, e) {
            if (e) e.stopPropagation();
            fetch(`/notifications/${id}/read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then(() => fetchNotifications(false));
        }

        function showToast(notif) {
            if (!toastContainer) return;

            const isSuccess = notif.status === 'success';
            const card = document.createElement('div');
            card.className = `toast-card ${isSuccess ? 'success' : 'error'}`;

            const iconHtml = isSuccess
                ? `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>`
                : `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>`;

            card.innerHTML = `
                <div class="toast-icon ${isSuccess ? 'success' : 'error'}">
                    ${iconHtml}
                </div>
                <div class="toast-content" style="${notif.url ? 'cursor:pointer;' : ''}">
                    <div class="toast-title">${escapeHtml(notif.title)}</div>
                    <div class="toast-desc">${escapeHtml(notif.message)}</div>
                </div>
                <button type="button" class="toast-close-btn" aria-label="Close">&times;</button>
            `;

            if (notif.url) {
                card.querySelector('.toast-content').addEventListener('click', function() {
                    markSingleAsRead(notif.id);
                    window.location.href = notif.url;
                });
            }

            card.querySelector('.toast-close-btn').addEventListener('click', function(e) {
                e.stopPropagation();
                dismissToast(card);
            });

            toastContainer.appendChild(card);

            setTimeout(() => {
                dismissToast(card);
            }, 8000);
        }

        function dismissToast(card) {
            if (!card) return;
            card.classList.add('fade-out');
            setTimeout(() => {
                if (card && card.parentNode) {
                    card.parentNode.removeChild(card);
                }
            }, 300);
        }

        function escapeHtml(str) {
            if (!str) return '';
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        let isInitialLoad = true;

        function fetchNotifications(triggerToast = true) {
            fetch("{{ route('notifications.index') }}", {
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                const unreadCount = data.unread_count || 0;
                const notifs = data.notifications || [];

                // Update bell badge
                if (notifBadge) {
                    if (unreadCount > 0) {
                        notifBadge.textContent = unreadCount > 99 ? '99+' : unreadCount;
                        notifBadge.style.display = 'inline-flex';
                    } else {
                        notifBadge.style.display = 'none';
                    }
                }

                if (notifHeaderCount) {
                    notifHeaderCount.textContent = `${unreadCount} unread`;
                }

                // Render notifications list
                if (notifList) {
                    if (notifs.length === 0) {
                        notifList.innerHTML = `<div class="notif-empty">No notifications yet</div>`;
                    } else {
                        notifList.innerHTML = notifs.map(n => {
                            const isSuccess = n.status === 'success';
                            const icon = isSuccess
                                ? `<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>`
                                : `<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>`;

                            return `
                                <div class="notif-item ${!n.read ? 'unread' : ''}" data-id="${n.id}" data-url="${n.url || ''}">
                                    <div class="notif-item-icon ${isSuccess ? 'success' : 'error'}">
                                        ${icon}
                                    </div>
                                    <div class="notif-item-body">
                                        <div class="notif-item-title">
                                            <span>${escapeHtml(n.title)}</span>
                                            ${!n.read ? `<button type="button" class="notif-item-check-btn" title="Mark as read" data-read-id="${n.id}">✓</button>` : ''}
                                        </div>
                                        <div class="notif-item-msg">${escapeHtml(n.message)}</div>
                                        <div class="notif-item-time">${escapeHtml(n.created_at)}</div>
                                    </div>
                                </div>
                            `;
                        }).join('');

                        notifList.querySelectorAll('.notif-item').forEach(el => {
                            el.addEventListener('click', function(e) {
                                if (e.target.closest('.notif-item-check-btn')) return;
                                const id = this.getAttribute('data-id');
                                const url = this.getAttribute('data-url');
                                markSingleAsRead(id);
                                if (url && url !== '#' && url !== '') {
                                    window.location.href = url;
                                }
                            });
                        });

                        notifList.querySelectorAll('.notif-item-check-btn').forEach(btn => {
                            btn.addEventListener('click', function(e) {
                                e.stopPropagation();
                                const id = this.getAttribute('data-read-id');
                                markSingleAsRead(id, e);
                            });
                        });
                    }
                }

                // If new unread notification arrived
                if (triggerToast) {
                    notifs.forEach(n => {
                        if (!n.read && !toastedIds.has(n.id)) {
                            toastedIds.add(n.id);
                            saveToastedIds();
                            showToast(n);
                        }
                    });
                }

                isInitialLoad = false;
            })
            .catch(() => {});
        }

        // Run on page load
        fetchNotifications(true);

        // Poll every 15 seconds when tab is active/visible
        setInterval(() => {
            if (document.visibilityState === 'visible') {
                fetchNotifications(true);
            }
        }, 15000);
    })();
</script>

</body>

</html>