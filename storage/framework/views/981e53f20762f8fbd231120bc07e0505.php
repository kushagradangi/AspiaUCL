<?php
    $headerFrameworks = $headerFrameworks ?? \App\Models\Framework::orderBy('name', 'asc')->get();
    $headerDomains    = $headerDomains    ?? \App\Models\Domain::orderBy('display_order', 'asc')->get();
    $headerControls   = $headerControls   ?? \App\Models\Control::orderBy('control_id', 'asc')->take(50)->get();
    $badgeClasses     = ['badge-cyan', 'badge-purple', 'badge-emerald', 'badge-amber', 'badge-rose'];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<style>
    :root {
        --aspia-infotech-font-primary: "Inter", sans-serif;
        --aspia-infotech-font-mono: "JetBrains Mono", "SFMono-Regular", Consolas, monospace;
    }
    /* HOMEPAGE HEADER STYLES (#0D1735 PRIMARY NAVY) */
    .site-header {
        font-family: var(--aspia-infotech-font-primary);
        background: #0D1735;
        border-bottom: none;
        position: relative;
        top: 0;
        z-index: 999;
        transition: background 0.3s, border-color 0.3s;
        width: 100%;
    }
    .site-header .container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
        width: 100%;
        box-sizing: border-box;
    }
    .site-header .nav {
        display: grid;
        grid-template-columns: auto 1fr auto;
        align-items: center;
        padding: 20px 0;
        min-height: 76px;
        gap: 16px;
        border-bottom: none;
    }
    .site-header .nav-logo {
        font-size: 1.55rem;
        font-weight: 800;
        color: #ffffff;
        letter-spacing: -0.02em;
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        flex-shrink: 0;
    }
    .site-header .nav-logo .accent {
        color: #16C4F4;
    }
    .site-header .nav-logo .badge {
        font-size: 0.58rem;
        font-weight: 600;
        background: rgba(22, 196, 244, 0.15);
        color: #16C4F4;
        padding: 3px 12px;
        border-radius: 12px;
        letter-spacing: 0.04em;
        margin-left: 6px;
    }
    .site-header .nav-links {
        display: flex;
        justify-content: center;
        gap: 26px;
        list-style: none;
        font-size: 0.85rem;
        font-weight: 500;
        align-items: center;
        margin: 0 auto;
    }
    .site-header .nav-links a {
        color: #cbd5e1;
        text-decoration: none;
        transition: 0.15s;
    }
    .site-header .nav-links a:hover,
    .site-header .nav-links a.active {
        color: #16C4F4;
        font-weight: 700;
    }

    /* DROPDOWN MENU STYLES */
    .dropdown-parent {
        position: relative;
        padding: 6px 0;
    }
    .dropdown-parent > a {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .dropdown-arrow {
        font-size: 0.65rem;
        transition: transform 0.25s ease;
        opacity: 0.7;
    }
    .dropdown-parent:hover .dropdown-arrow {
        transform: rotate(180deg);
        color: #16C4F4;
    }
    .dropdown-popover {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        width: 320px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 14px;
        box-shadow: 0 12px 30px -5px rgba(15, 23, 42, 0.15), 0 4px 10px -2px rgba(15, 23, 42, 0.05);
        opacity: 0;
        visibility: hidden;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 10000;
        margin-top: 4px;
    }
    .dropdown-popover::before {
        content: '';
        position: absolute;
        top: -12px;
        left: 0;
        right: 0;
        height: 12px;
    }
    .dropdown-parent:hover .dropdown-popover,
    .dropdown-parent:focus-within .dropdown-popover {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }
    .dropdown-popover-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 8px;
        margin-bottom: 8px;
        border-bottom: 1px solid #f0f2f6;
    }
    .popover-title {
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #16C4F4;
    }
    .popover-all-link {
        font-size: 0.75rem;
        font-weight: 700;
        color: #16C4F4 !important;
        text-decoration: none;
        transition: opacity 0.2s;
    }
    .popover-all-link:hover {
        text-decoration: underline;
        opacity: 0.85;
    }
    .dropdown-popover-list {
        display: flex;
        flex-direction: column;
        gap: 4px;
        max-height: 380px;
        overflow-y: auto;
        padding-right: 4px;
        scroll-behavior: smooth;
    }
    .dropdown-popover-list::-webkit-scrollbar {
        width: 5px;
    }
    .dropdown-popover-list::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 4px;
    }
    .dropdown-popover-list::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }
    .dropdown-popover-list::-webkit-scrollbar-thumb:hover {
        background: #16C4F4;
    }
    .dropdown-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 8px 10px;
        background: #f8fafc;
        border: 1px solid #f0f2f6;
        border-radius: 8px;
        text-decoration: none !important;
        transition: all 0.2s ease;
    }
    .dropdown-card:hover {
        border-color: #16C4F4;
        background: #ffffff;
        transform: translateX(3px);
        box-shadow: 0 2px 8px rgba(22, 196, 244, 0.12);
    }
    .dropdown-card-body {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .dropdown-card-title-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }
    .dropdown-card-title {
        font-size: 0.8rem;
        font-weight: 600;
        color: #0D1735;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.3;
    }
    .dropdown-card:hover .dropdown-card-title {
        color: #16C4F4;
    }
    .dropdown-card-sub {
        font-size: 0.68rem;
        color: #64748b;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card-badge {
        font-family: var(--aspia-infotech-font-mono);
        font-size: 0.62rem;
        font-weight: 700;
        padding: 2px 6px;
        border-radius: 4px;
        flex-shrink: 0;
        white-space: nowrap;
    }
    .badge-emerald { background: #ecfdf5; color: #059669; border: 1px solid rgba(5, 150, 105, 0.25); }
    .badge-cyan    { background: #e0f2fe; color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.25); }
    .badge-amber   { background: #fffbeb; color: #d97706; border: 1px solid rgba(217, 119, 6, 0.25); }
    .badge-purple  { background: #f5f3ff; color: #7c3aed; border: 1px solid rgba(124, 58, 237, 0.25); }
    .badge-rose    { background: #fff1f2; color: #e11d48; border: 1px solid rgba(225, 29, 72, 0.25); }

    /* Dark Mode Dropdown Overrides */
    [data-theme="dark"] .dropdown-popover,
    body.dark-mode .dropdown-popover {
        background: #111827 !important;
        border-color: #1e293b !important;
        box-shadow: 0 12px 30px -5px rgba(0, 0, 0, 0.5) !important;
    }
    [data-theme="dark"] .dropdown-popover-header,
    body.dark-mode .dropdown-popover-header {
        border-bottom-color: #1e293b !important;
    }
    [data-theme="dark"] .popover-title,
    [data-theme="dark"] .popover-all-link,
    body.dark-mode .popover-title,
    body.dark-mode .popover-all-link {
        color: #16C4F4 !important;
    }
    [data-theme="dark"] .dropdown-card,
    body.dark-mode .dropdown-card {
        background: #1f2937 !important;
        border-color: #374151 !important;
    }
    [data-theme="dark"] .dropdown-card:hover,
    body.dark-mode .dropdown-card:hover {
        background: #111827 !important;
        border-color: #16C4F4 !important;
    }
    [data-theme="dark"] .dropdown-card-title,
    body.dark-mode .dropdown-card-title {
        color: #f3f4f6 !important;
    }
    [data-theme="dark"] .dropdown-card:hover .dropdown-card-title,
    body.dark-mode .dropdown-card:hover .dropdown-card-title {
        color: #16C4F4 !important;
    }
    [data-theme="dark"] .dropdown-card-sub,
    body.dark-mode .dropdown-card-sub {
        color: #9ca3af !important;
    }

    .site-header .nav-actions {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: flex-end;
        flex-shrink: 0;
    }
    .site-header .mobile-menu-toggle {
        display: none;
        background: transparent;
        border: 1.5px solid rgba(255, 255, 255, 0.25);
        color: #ffffff;
        font-size: 1.1rem;
        padding: 6px 12px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .site-header .mobile-menu-toggle:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: #16C4F4;
        color: #16C4F4;
    }
    .site-header .btn-outline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 7px 18px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 700;
        font-family: inherit;
        background: #02CCFF !important;
        color: #ffffff !important;
        border: none !important;
        text-decoration: none !important;
        transition: all 0.2s ease;
        white-space: nowrap;
        box-shadow: 0 2px 10px rgba(2, 204, 255, 0.3);
    }
    .site-header .btn-outline:hover {
        background: #00b8e6 !important;
        color: #ffffff !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(2, 204, 255, 0.45);
    }

    /* Dark Mode Header Overrides */
    [data-theme="dark"] .site-header,
    body.dark-mode .site-header {
        background: #0D1735 !important;
        border-color: #1e293b !important;
    }
    [data-theme="dark"] .site-header .nav-logo,
    body.dark-mode .site-header .nav-logo {
        color: #f8fafc !important;
    }

    /* ============================================================
       STICKY LIGHT THEME NAVBAR (SLIDES DOWN ON SCROLL PAST HERO)
       ============================================================ */
    .sticky-light-navbar {
        font-family: var(--aspia-infotech-font-primary);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        z-index: 10000;
        background: #ffffff;
        box-shadow: 0 4px 20px -2px rgba(13, 23, 53, 0.08);
        border-bottom: 1px solid #e2e8f0;
        padding: 1px 0;
        transform: translateY(-100%);
        opacity: 0;
        visibility: hidden;
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease, visibility 0.35s;
    }

    .sticky-light-navbar.is-visible {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }

    .sticky-light-navbar .container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
        width: 100%;
        box-sizing: border-box;
    }

    .sticky-light-navbar .sticky-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1px 0;
        min-height: 40px;
        gap: 16px;
    }

    .sticky-light-navbar .sticky-logo {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        font-size: 1.35rem;
        font-weight: 800;
        color: #0D1735;
        letter-spacing: -0.02em;
        flex-shrink: 0;
    }

    .sticky-light-navbar .sticky-logo .accent {
        color: #16C4F4;
    }

    .sticky-light-navbar .sticky-logo .badge-light {
        font-size: 0.58rem;
        font-weight: 600;
        background: rgba(22, 196, 244, 0.12);
        color: #0284c7;
        padding: 3px 10px;
        border-radius: 12px;
        letter-spacing: 0.04em;
    }

    .sticky-light-navbar .sticky-nav-links {
        display: flex;
        align-items: center;
        gap: 26px;
        list-style: none;
        margin: 0 auto;
        padding: 0;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .sticky-light-navbar .sticky-nav-links a {
        color: #1e293b;
        text-decoration: none;
        transition: color 0.15s ease;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .sticky-light-navbar .sticky-nav-links a:hover,
    .sticky-light-navbar .sticky-nav-links a.active {
        color: #16C4F4;
    }

    .sticky-light-navbar .sticky-nav-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    .sticky-light-navbar .sticky-search-btn {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #334155;
        width: 38px;
        height: 38px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.2s ease;
    }

    .sticky-light-navbar .sticky-search-btn:hover {
        background: #e2e8f0;
        color: #16C4F4;
        border-color: #16C4F4;
    }

    .sticky-light-navbar .btn-accent-demo {
        background: #16C4F4;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 0.85rem;
        padding: 8px 18px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        white-space: nowrap;
        box-shadow: 0 2px 8px rgba(22, 196, 244, 0.25);
    }

    .sticky-light-navbar .btn-accent-demo:hover {
        background: #00a0d1;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(22, 196, 244, 0.35);
    }

    .sticky-light-navbar .sticky-btn-signin {
        background: #02CCFF !important;
        color: #ffffff !important;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none !important;
        padding: 7px 18px;
        border: none !important;
        border-radius: 8px;
        transition: all 0.2s ease;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 2px 10px rgba(2, 204, 255, 0.3);
    }

    .sticky-light-navbar .sticky-btn-signin:hover {
        background: #00b8e6 !important;
        color: #ffffff !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(2, 204, 255, 0.45);
    }

    .sticky-light-navbar .sticky-mobile-toggle {
        display: none;
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        color: #0D1735;
        font-size: 1.1rem;
        padding: 6px 12px;
        border-radius: 8px;
        cursor: pointer;
    }

    /* Dark Theme Overrides for Sticky Navbar */
    [data-theme="dark"] .sticky-light-navbar,
    body.dark-mode .sticky-light-navbar {
        background: #0f172a !important;
        border-bottom-color: #1e293b !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
    }

    [data-theme="dark"] .sticky-light-navbar .sticky-logo,
    body.dark-mode .sticky-light-navbar .sticky-logo {
        color: #ffffff !important;
    }

    [data-theme="dark"] .sticky-light-navbar .sticky-nav-links a,
    body.dark-mode .sticky-light-navbar .sticky-nav-links a {
        color: #cbd5e1 !important;
    }

    [data-theme="dark"] .sticky-light-navbar .sticky-nav-links a:hover,
    [data-theme="dark"] .sticky-light-navbar .sticky-nav-links a.active,
    body.dark-mode .sticky-light-navbar .sticky-nav-links a:hover,
    body.dark-mode .sticky-light-navbar .sticky-nav-links a.active {
        color: #16C4F4 !important;
    }

    [data-theme="dark"] .sticky-light-navbar .sticky-search-btn,
    body.dark-mode .sticky-light-navbar .sticky-search-btn {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    [data-theme="dark"] .sticky-light-navbar .sticky-btn-signin,
    body.dark-mode .sticky-light-navbar .sticky-btn-signin {
        background: #02CCFF !important;
        color: #ffffff !important;
        border: none !important;
    }

    /* ============================================================
       MODALS (SEARCH & DEMO REQUEST)
       ============================================================ */
    .ucl-modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(13, 23, 53, 0.65);
        backdrop-filter: blur(6px);
        z-index: 20000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.25s ease, visibility 0.25s;
    }

    .ucl-modal-backdrop.is-open {
        opacity: 1;
        visibility: visible;
    }

    .ucl-modal-container {
        background: #ffffff;
        border-radius: 16px;
        width: 100%;
        max-width: 580px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.25);
        overflow: hidden;
        transform: translateY(20px) scale(0.96);
        transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .ucl-modal-backdrop.is-open .ucl-modal-container {
        transform: translateY(0) scale(1);
    }

    .ucl-modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
        gap: 12px;
    }

    .ucl-modal-header h3 {
        font-size: 1.15rem;
        font-weight: 700;
        color: #0D1735;
        margin: 0;
    }

    .ucl-modal-close {
        background: transparent;
        border: none;
        font-size: 1.4rem;
        color: #64748b;
        cursor: pointer;
        line-height: 1;
        padding: 4px 8px;
        border-radius: 6px;
        transition: color 0.2s, background 0.2s;
    }

    .ucl-modal-close:hover {
        color: #ef4444;
        background: #fef2f2;
    }

    .ucl-modal-body {
        padding: 20px;
        max-height: 75vh;
        overflow-y: auto;
    }

    .ucl-search-input-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8fafc;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        padding: 10px 14px;
        width: 100%;
        transition: border-color 0.2s;
    }

    .ucl-search-input-wrap:focus-within {
        border-color: #16C4F4;
        box-shadow: 0 0 0 3px rgba(22, 196, 244, 0.15);
    }

    .ucl-search-input-wrap .search-icon {
        color: #64748b;
        font-size: 1rem;
    }

    .ucl-search-input-wrap input {
        border: none;
        background: transparent;
        outline: none;
        font-size: 0.95rem;
        color: #0D1735;
        width: 100%;
        font-family: inherit;
    }

    .ucl-search-clear {
        background: transparent;
        border: none;
        font-size: 1.1rem;
        color: #94a3b8;
        cursor: pointer;
    }

    .ucl-search-hint {
        font-size: 0.85rem;
        color: #64748b;
        text-align: center;
        padding: 20px 0;
    }

    .ucl-search-results-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 10px;
    }

    .ucl-search-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 14px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .ucl-search-item:hover {
        border-color: #16C4F4;
        background: #ffffff;
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(22, 196, 244, 0.12);
    }

    .ucl-search-item .item-title {
        font-weight: 600;
        font-size: 0.88rem;
        color: #0D1735;
    }

    .ucl-search-item .item-badge {
        font-size: 0.68rem;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 6px;
        text-transform: uppercase;
    }

    .badge-type-framework { background: #e0f2fe; color: #0284c7; }
    .badge-type-domain    { background: #f5f3ff; color: #7c3aed; }
    .badge-type-control   { background: #ecfdf5; color: #059669; }

    /* Demo Form Styles */
    .demo-modal-desc {
        font-size: 0.88rem;
        color: #475569;
        margin-bottom: 16px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 14px;
    }

    .form-group label {
        font-size: 0.82rem;
        font-weight: 600;
        color: #0D1735;
    }

    .form-input {
        padding: 10px 14px;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        font-size: 0.88rem;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        width: 100%;
        box-sizing: border-box;
    }

    .form-input:focus {
        border-color: #16C4F4;
        box-shadow: 0 0 0 3px rgba(22, 196, 244, 0.15);
    }

    .btn-demo-submit {
        width: 100%;
        padding: 12px;
        background: #16C4F4;
        color: #ffffff;
        font-weight: 700;
        font-size: 0.9rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 8px;
    }

    .btn-demo-submit:hover {
        background: #00a0d1;
    }

    .demo-success-msg {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        border-radius: 10px;
        padding: 16px;
        color: #065f46;
    }

    .demo-success-msg i {
        font-size: 1.5rem;
        color: #10b981;
    }

    @media (max-width: 768px) {
        .site-header .container,
        .sticky-light-navbar .container {
            padding: 0 16px;
        }
        .site-header .mobile-menu-toggle {
            display: inline-flex;
        }
        .site-header .nav-links {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #ffffff;
            flex-direction: column;
            padding: 16px 20px;
            gap: 12px;
            border-bottom: 1px solid #f0f2f6;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .site-header .nav-links.active {
            display: flex;
        }

        .sticky-light-navbar .sticky-nav-links {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #ffffff;
            flex-direction: column;
            padding: 16px 20px;
            gap: 12px;
            border-bottom: 1px solid #f0f2f6;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }
        .sticky-light-navbar .sticky-nav-links.active {
            display: flex;
        }
        .sticky-light-navbar .sticky-mobile-toggle {
            display: inline-flex;
        }
        .sticky-light-navbar .sticky-btn-signin,
        .sticky-light-navbar .btn-accent-demo {
            padding: 6px 12px;
            font-size: 0.78rem;
        }
        .dropdown-popover {
            position: static;
            transform: none !important;
            width: 100%;
            box-shadow: none;
            display: none;
            margin-top: 6px;
        }
        .dropdown-parent:hover .dropdown-popover {
            display: flex;
        }
        [data-theme="dark"] .site-header .nav-links,
        body.dark-mode .site-header .nav-links {
            background: #0b1329 !important;
            border-color: #1e293b !important;
        }
    }
</style>

<!-- MAIN TOP HEADER (Scrolled with hero section) -->
<header class="site-header homepage-header">
    <div class="container">
        <nav class="nav" aria-label="Homepage Navigation">
            <a href="<?php echo e(route('home')); ?>" class="nav-logo" title="ASPIA UCL Homepage">
                ASPIA <span class="accent">UCL</span>
                <span class="badge">Free Directory</span>
            </a>
            <ul class="nav-links">
                <li class="dropdown-parent">
                    <a href="<?php echo e(route('frameworks.public_index')); ?>" class="<?php echo e(($activeTab ?? '') === 'frameworks' ? 'active' : ''); ?>" title="Compliance Frameworks">
                        <span>Frameworks</span>
                        <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-popover">
                        <div class="dropdown-popover-header">
                            <span class="popover-title">Compliance Frameworks</span>
                            <a href="<?php echo e(route('frameworks.public_index')); ?>" class="popover-all-link">View All →</a>
                        </div>
                        <div class="dropdown-popover-list">
                            <?php $__currentLoopData = $headerFrameworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeClass = $badgeClasses[$loop->index % count($badgeClasses)];
                                    $url  = route('frameworks.show', $fw->slug);
                                    $code = $fw->framework_code ?: ($fw->framework_family ?: 'FW');
                                    $name = $fw->name;
                                    $cat  = $fw->category ?: 'Regulatory Framework';
                                ?>
                                <a href="<?php echo e($url); ?>" class="dropdown-card">
                                    <div class="dropdown-card-body">
                                        <div class="dropdown-card-title-row">
                                            <span class="dropdown-card-title"><?php echo e($name); ?></span>
                                            <span class="card-badge <?php echo e($badgeClass); ?>"><?php echo e($code); ?></span>
                                        </div>
                                        <span class="dropdown-card-sub"><?php echo e($cat); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>

                <li class="dropdown-parent">
                    <a href="<?php echo e(route('domains.public_index')); ?>" class="<?php echo e(($activeTab ?? '') === 'domains' ? 'active' : ''); ?>" title="Governance Domains">
                        <span>Domains</span>
                        <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-popover">
                        <div class="dropdown-popover-header">
                            <span class="popover-title">Governance Domains</span>
                            <a href="<?php echo e(route('domains.public_index')); ?>" class="popover-all-link">View All →</a>
                        </div>
                        <div class="dropdown-popover-list">
                            <?php $__currentLoopData = $headerDomains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeClass = $badgeClasses[$loop->index % count($badgeClasses)];
                                    $url  = route('domains.show', $d->slug);
                                    $code = $d->domain_code ?: ($d->domain_id ?: 'DOM');
                                    $name = $d->name;
                                    $sub  = $d->short_overview ?: ($d->purpose ?: 'Control Domain');
                                ?>
                                <a href="<?php echo e($url); ?>" class="dropdown-card">
                                    <div class="dropdown-card-body">
                                        <div class="dropdown-card-title-row">
                                            <span class="dropdown-card-title"><?php echo e($name); ?></span>
                                            <span class="card-badge <?php echo e($badgeClass); ?>"><?php echo e($code); ?></span>
                                        </div>
                                        <span class="dropdown-card-sub"><?php echo e($sub); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>

                <li class="dropdown-parent">
                    <a href="<?php echo e(route('controls.public_index')); ?>" class="<?php echo e(($activeTab ?? '') === 'controls' ? 'active' : ''); ?>" title="Unified Controls">
                        <span>Controls</span>
                        <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-popover">
                        <div class="dropdown-popover-header">
                            <span class="popover-title">Unified Controls</span>
                            <a href="<?php echo e(route('controls.public_index')); ?>" class="popover-all-link">View All →</a>
                        </div>
                        <div class="dropdown-popover-list">
                            <?php $__currentLoopData = $headerControls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeClass = $badgeClasses[$loop->index % count($badgeClasses)];
                                    $url  = route('controls.show', $c->control_id);
                                    $code = $c->control_id;
                                    $name = $c->name;
                                    $sub  = $c->control_category ?: ($c->description ?: 'Security Control');
                                ?>
                                <a href="<?php echo e($url); ?>" class="dropdown-card">
                                    <div class="dropdown-card-body">
                                        <div class="dropdown-card-title-row">
                                            <span class="dropdown-card-title"><?php echo e($name); ?></span>
                                            <span class="card-badge <?php echo e($badgeClass); ?>"><?php echo e($code); ?></span>
                                        </div>
                                        <span class="dropdown-card-sub"><?php echo e($sub); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>

                <li><a href="<?php echo e(url('/#about-ucl')); ?>" title="About Unified Control Layer">About UCL</a></li>
                <li><a href="<?php echo e(url('/#blog')); ?>" title="Resources & Articles">Blog</a></li>
            </ul>
            <div class="nav-actions">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="btn-outline" title="Go to Dashboard"><i class="fas fa-chart-line" aria-hidden="true"></i> Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn-outline" title="Sign In">Sign In</a>
                <?php endif; ?>
                <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle Navigation Menu">
                    <i class="fas fa-bars" aria-hidden="true"></i>
                </button>
            </div>
        </nav>
    </div>
</header>

<!-- STICKY SMALL LIGHT THEME NAVBAR (Slides down when hero section disappears) -->
<header id="stickyLightNavbar" class="sticky-light-navbar" aria-label="Sticky Navigation Bar">
    <div class="container">
        <nav class="sticky-nav">
            <!-- Brand Logo -->
            <a href="<?php echo e(route('home')); ?>" class="sticky-logo" title="ASPIA UCL Homepage">
                <span>ASPIA <span class="accent">UCL</span></span>
                <span class="badge-light">Free Directory</span>
            </a>

            <!-- Links -->
            <ul class="sticky-nav-links" id="stickyNavLinks">
                <li class="dropdown-parent">
                    <a href="<?php echo e(route('frameworks.public_index')); ?>" class="<?php echo e(($activeTab ?? '') === 'frameworks' ? 'active' : ''); ?>" title="Compliance Frameworks">
                        <span>Frameworks</span>
                        <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-popover">
                        <div class="dropdown-popover-header">
                            <span class="popover-title">Compliance Frameworks</span>
                            <a href="<?php echo e(route('frameworks.public_index')); ?>" class="popover-all-link">View All →</a>
                        </div>
                        <div class="dropdown-popover-list">
                            <?php $__currentLoopData = $headerFrameworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeClass = $badgeClasses[$loop->index % count($badgeClasses)];
                                    $url  = route('frameworks.show', $fw->slug);
                                    $code = $fw->framework_code ?: ($fw->framework_family ?: 'FW');
                                    $name = $fw->name;
                                    $cat  = $fw->category ?: 'Regulatory Framework';
                                ?>
                                <a href="<?php echo e($url); ?>" class="dropdown-card">
                                    <div class="dropdown-card-body">
                                        <div class="dropdown-card-title-row">
                                            <span class="dropdown-card-title"><?php echo e($name); ?></span>
                                            <span class="card-badge <?php echo e($badgeClass); ?>"><?php echo e($code); ?></span>
                                        </div>
                                        <span class="dropdown-card-sub"><?php echo e($cat); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>

                <li class="dropdown-parent">
                    <a href="<?php echo e(route('domains.public_index')); ?>" class="<?php echo e(($activeTab ?? '') === 'domains' ? 'active' : ''); ?>" title="Governance Domains">
                        <span>Domains</span>
                        <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-popover">
                        <div class="dropdown-popover-header">
                            <span class="popover-title">Governance Domains</span>
                            <a href="<?php echo e(route('domains.public_index')); ?>" class="popover-all-link">View All →</a>
                        </div>
                        <div class="dropdown-popover-list">
                            <?php $__currentLoopData = $headerDomains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeClass = $badgeClasses[$loop->index % count($badgeClasses)];
                                    $url  = route('domains.show', $d->slug);
                                    $code = $d->domain_code ?: ($d->domain_id ?: 'DOM');
                                    $name = $d->name;
                                    $sub  = $d->short_overview ?: ($d->purpose ?: 'Control Domain');
                                ?>
                                <a href="<?php echo e($url); ?>" class="dropdown-card">
                                    <div class="dropdown-card-body">
                                        <div class="dropdown-card-title-row">
                                            <span class="dropdown-card-title"><?php echo e($name); ?></span>
                                            <span class="card-badge <?php echo e($badgeClass); ?>"><?php echo e($code); ?></span>
                                        </div>
                                        <span class="dropdown-card-sub"><?php echo e($sub); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>

                <li class="dropdown-parent">
                    <a href="<?php echo e(route('controls.public_index')); ?>" class="<?php echo e(($activeTab ?? '') === 'controls' ? 'active' : ''); ?>" title="Unified Controls">
                        <span>Controls</span>
                        <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-popover">
                        <div class="dropdown-popover-header">
                            <span class="popover-title">Unified Controls</span>
                            <a href="<?php echo e(route('controls.public_index')); ?>" class="popover-all-link">View All →</a>
                        </div>
                        <div class="dropdown-popover-list">
                            <?php $__currentLoopData = $headerControls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeClass = $badgeClasses[$loop->index % count($badgeClasses)];
                                    $url  = route('controls.show', $c->control_id);
                                    $code = $c->control_id;
                                    $name = $c->name;
                                    $sub  = $c->control_category ?: ($c->description ?: 'Security Control');
                                ?>
                                <a href="<?php echo e($url); ?>" class="dropdown-card">
                                    <div class="dropdown-card-body">
                                        <div class="dropdown-card-title-row">
                                            <span class="dropdown-card-title"><?php echo e($name); ?></span>
                                            <span class="card-badge <?php echo e($badgeClass); ?>"><?php echo e($code); ?></span>
                                        </div>
                                        <span class="dropdown-card-sub"><?php echo e($sub); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>

                <li><a href="<?php echo e(url('/#about-ucl')); ?>" title="About Unified Control Layer">About UCL</a></li>
                <li><a href="<?php echo e(url('/#blog')); ?>" title="Resources & Articles">Blog</a></li>
            </ul>

            <!-- Actions -->
            <div class="sticky-nav-actions">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="sticky-btn-signin" title="Go to Dashboard">
                        <i class="fas fa-chart-line" aria-hidden="true"></i> Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="sticky-btn-signin" title="Sign In">Sign In</a>
                <?php endif; ?>
                <button class="sticky-mobile-toggle" id="stickyMobileToggle" aria-label="Toggle Menu">
                    <i class="fas fa-bars" aria-hidden="true"></i>
                </button>
            </div>
        </nav>
    </div>
</header>

<!-- QUICK SEARCH MODAL -->
<div id="uclSearchModal" class="ucl-modal-backdrop" aria-hidden="true">
    <div class="ucl-modal-container">
        <div class="ucl-modal-header">
            <div class="ucl-search-input-wrap">
                <i class="fas fa-search search-icon" aria-hidden="true"></i>
                <input type="text" id="uclSearchInput" placeholder="Search frameworks, domains, controls..." autocomplete="off" />
                <button type="button" class="ucl-search-clear" id="uclSearchClear" aria-label="Clear Search">&times;</button>
            </div>
            <button class="ucl-modal-close" id="uclSearchModalClose" aria-label="Close modal">&times;</button>
        </div>
        <div class="ucl-modal-body" id="uclSearchResults">
            <div class="ucl-search-hint">Type to search frameworks (e.g. ISO 27001, NIST), domains, or controls...</div>
        </div>
    </div>
</div>

<!-- REQUEST DEMO MODAL -->
<div id="uclDemoModal" class="ucl-modal-backdrop" aria-hidden="true">
    <div class="ucl-modal-container">
        <div class="ucl-modal-header">
            <h3><i class="fas fa-rocket" style="color:#16C4F4;" aria-hidden="true"></i> Request a Demo</h3>
            <button class="ucl-modal-close" id="uclDemoModalClose" aria-label="Close modal">&times;</button>
        </div>
        <div class="ucl-modal-body">
            <p class="demo-modal-desc">See how ASPIA Unified Control Layer streamlines your compliance workflows across 20+ frameworks.</p>
            <form id="uclDemoForm" onsubmit="handleDemoSubmit(event)">
                <div class="form-group">
                    <label for="demoName">Full Name *</label>
                    <input type="text" id="demoName" required placeholder="John Doe" class="form-input" />
                </div>
                <div class="form-group">
                    <label for="demoEmail">Work Email *</label>
                    <input type="email" id="demoEmail" required placeholder="john@company.com" class="form-input" />
                </div>
                <div class="form-group">
                    <label for="demoCompany">Company / Organization *</label>
                    <input type="text" id="demoCompany" required placeholder="Enterprise Inc." class="form-input" />
                </div>
                <div class="form-group">
                    <label for="demoMessage">Message / Specific Requirements</label>
                    <textarea id="demoMessage" rows="3" placeholder="Tell us about your compliance framework needs..." class="form-input"></textarea>
                </div>
                <button type="submit" class="btn-demo-submit">Submit Request <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
            </form>
            <div id="demoSuccessMsg" class="demo-success-msg" style="display:none;">
                <i class="fas fa-check-circle" aria-hidden="true"></i>
                <div>
                    <h4 style="margin:0 0 4px 0;font-size:0.95rem;">Demo Request Received!</h4>
                    <p style="margin:0;font-size:0.82rem;">Thank you. Our compliance team will get in touch with you shortly.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. STICKY LIGHT NAVBAR SCROLL OBSERVER
    const heroSection = document.querySelector('.hero-section');
    const stickyNavbar = document.getElementById('stickyLightNavbar');

    function checkStickyNav() {
        if (!stickyNavbar) return;
        if (heroSection) {
            const heroRect = heroSection.getBoundingClientRect();
            // When hero section bottom is within 120px of top of viewport or scrolled past it
            if (heroRect.bottom <= 120) {
                stickyNavbar.classList.add('is-visible');
            } else {
                stickyNavbar.classList.remove('is-visible');
            }
        } else {
            if (window.scrollY > 300) {
                stickyNavbar.classList.add('is-visible');
            } else {
                stickyNavbar.classList.remove('is-visible');
            }
        }
    }

    window.addEventListener('scroll', checkStickyNav, { passive: true });
    checkStickyNav();

    // 2. MOBILE MENU TOGGLES
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mainNavLinks = document.querySelector('.site-header .nav-links');
    if (mobileMenuToggle && mainNavLinks) {
        mobileMenuToggle.addEventListener('click', function () {
            mainNavLinks.classList.toggle('active');
        });
    }

    const stickyMobileToggle = document.getElementById('stickyMobileToggle');
    const stickyNavLinks = document.getElementById('stickyNavLinks');
    if (stickyMobileToggle && stickyNavLinks) {
        stickyMobileToggle.addEventListener('click', function () {
            stickyNavLinks.classList.toggle('active');
        });
    }

    // 3. MODAL UTILITIES
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }
    }

    document.querySelectorAll('.ucl-modal-backdrop').forEach(function (backdrop) {
        backdrop.addEventListener('click', function (e) {
            if (e.target === backdrop) {
                closeModal(backdrop.id);
            }
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal('uclSearchModal');
            closeModal('uclDemoModal');
        }
    });

    // 4. DEMO MODAL TRIGGERS
    const stickyDemoTrigger = document.getElementById('stickyDemoTrigger');
    const demoCloseBtn = document.getElementById('uclDemoModalClose');

    if (stickyDemoTrigger) {
        stickyDemoTrigger.addEventListener('click', function () {
            openModal('uclDemoModal');
        });
    }

    if (demoCloseBtn) {
        demoCloseBtn.addEventListener('click', function () {
            closeModal('uclDemoModal');
        });
    }

    window.handleDemoSubmit = function (e) {
        e.preventDefault();
        const form = document.getElementById('uclDemoForm');
        const successMsg = document.getElementById('demoSuccessMsg');
        if (form && successMsg) {
            form.style.display = 'none';
            successMsg.style.display = 'flex';
            setTimeout(function () {
                closeModal('uclDemoModal');
                setTimeout(function () {
                    form.reset();
                    form.style.display = 'block';
                    successMsg.style.display = 'none';
                }, 400);
            }, 2500);
        }
    };

    // 5. LIVE SEARCH MODAL
    const searchTrigger = document.getElementById('stickySearchTrigger');
    const searchModalClose = document.getElementById('uclSearchModalClose');
    const searchInput = document.getElementById('uclSearchInput');
    const searchResults = document.getElementById('uclSearchResults');
    const searchClear = document.getElementById('uclSearchClear');

    const searchIndex = [
        <?php $__currentLoopData = $headerFrameworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            { name: "<?php echo e(addslashes($fw->name)); ?>", code: "<?php echo e(addslashes($fw->framework_code)); ?>", type: "Framework", url: "<?php echo e(route('frameworks.show', $fw->slug)); ?>" },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $headerDomains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            { name: "<?php echo e(addslashes($d->name)); ?>", code: "<?php echo e(addslashes($d->domain_code ?: $d->domain_id)); ?>", type: "Domain", url: "<?php echo e(route('domains.show', $d->slug)); ?>" },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $headerControls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            { name: "<?php echo e(addslashes($c->name)); ?>", code: "<?php echo e(addslashes($c->control_id)); ?>", type: "Control", url: "<?php echo e(route('controls.show', $c->control_id)); ?>" },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ];

    if (searchTrigger) {
        searchTrigger.addEventListener('click', function () {
            openModal('uclSearchModal');
            if (searchInput) {
                setTimeout(function() { searchInput.focus(); }, 100);
            }
        });
    }

    if (searchModalClose) {
        searchModalClose.addEventListener('click', function () {
            closeModal('uclSearchModal');
        });
    }

    if (searchClear && searchInput) {
        searchClear.addEventListener('click', function () {
            searchInput.value = '';
            renderSearchResults('');
            searchInput.focus();
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            renderSearchResults(this.value.trim().toLowerCase());
        });
    }

    function renderSearchResults(query) {
        if (!searchResults) return;
        if (!query) {
            searchResults.innerHTML = '<div class="ucl-search-hint">Type to search frameworks (e.g. ISO 27001, NIST), domains, or controls...</div>';
            return;
        }

        const matches = searchIndex.filter(function(item) {
            return item.name.toLowerCase().indexOf(query) !== -1 || item.code.toLowerCase().indexOf(query) !== -1;
        }).slice(0, 10);

        if (matches.length === 0) {
            searchResults.innerHTML = '<div class="ucl-search-hint">No matching frameworks, domains, or controls found for "<strong>' + query + '</strong>"</div>';
            return;
        }

        let html = '<div class="ucl-search-results-list">';
        matches.forEach(function(item) {
            let badgeClass = 'badge-type-framework';
            if (item.type === 'Domain') badgeClass = 'badge-type-domain';
            if (item.type === 'Control') badgeClass = 'badge-type-control';

            html += '<a href="' + item.url + '" class="ucl-search-item">' +
                    '<div>' +
                        '<div class="item-title">' + item.name + '</div>' +
                        '<div style="font-size:0.75rem;color:#64748b;">Code: ' + item.code + '</div>' +
                    '</div>' +
                    '<span class="item-badge ' + badgeClass + '">' + item.type + '</span>' +
                '</a>';
        });
        html += '</div>';
        searchResults.innerHTML = html;
    }
});
</script>
<?php /**PATH C:\xampp\htdocs\AspiaUCL\resources\views/aspiaUcl/partials/homepage_header.blade.php ENDPATH**/ ?>