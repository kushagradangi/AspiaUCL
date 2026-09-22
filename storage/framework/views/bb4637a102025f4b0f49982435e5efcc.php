<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Governance (GOV) - Universal Control Library | ASPIA GRC</title>
    <meta name="title" content="Governance (GOV) - Universal Control Library | ASPIA GRC">
    <meta name="description"
        content="Explore Governance (DOM-001), compliance frameworks, controls, and audit requirements in ASPIA UCL.">
    <meta name="keywords" content="security governance, GRC, board oversight, executive reporting, security strategy, governance framework, CISO accountability, security charter, governance committee, security program management, core, governance, leadership, strategic, enterprise, compliance, GOV, Governance, GRC domain">
    <meta name="author" content="ASPIA Unified Control Library">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://grc.aspia.io/domains/governance">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg-page: #f8fafc;
            --bg-surface: #ffffff;
            --bg-subtle: #f1f5f9;
            --bg-glass: rgba(255, 255, 255, 0.9);
            --border-light: #e2e8f0;
            --border-subtle: #cbd5e1;
            --border-hover: #94a3b8;
            --text-title: #0f172a;
            --text-body: #334155;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;
            --brand-primary: #0284c7;
            --brand-primary-light: #e0f2fe;
            --brand-sapphire: #1e40af;
            --brand-purple: #7c3aed;
            --brand-purple-light: #f5f3ff;
            --brand-emerald: #059669;
            --brand-emerald-light: #ecfdf5;
            --brand-amber: #d97706;
            --brand-amber-light: #fffbeb;
            --brand-rose: #e11d48;
            --brand-rose-light: #fff1f2;
            --shadow-sm: 0 1px 2px 0 rgba(15, 23, 42, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(15, 23, 42, 0.08), 0 2px 4px -2px rgba(15, 23, 42, 0.04);
            --shadow-lg: 0 10px 15px -3px rgba(15, 23, 42, 0.08);
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 16px;
            --radius-full: 9999px;
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        [data-theme="dark"] {
            --bg-page: #0b0f19;
            --bg-surface: #111827;
            --bg-subtle: #1f2937;
            --bg-glass: rgba(17, 24, 39, 0.9);
            --border-light: #374151;
            --border-subtle: #4b5563;
            --border-hover: #6b7280;
            --text-title: #f9fafb;
            --text-body: #e5e7eb;
            --text-secondary: #9ca3af;
            --text-muted: #6b7280;
            --brand-primary: #38bdf8;
            --brand-primary-light: rgba(56, 189, 248, 0.15);
            --brand-purple: #c084fc;
            --brand-purple-light: rgba(192, 132, 252, 0.15);
            --brand-emerald: #34d399;
            --brand-emerald-light: rgba(52, 211, 153, 0.15);
            --brand-amber: #fbbf24;
            --brand-amber-light: rgba(251, 191, 36, 0.15);
            --brand-rose: #fb7185;
            --brand-rose-light: rgba(251, 113, 133, 0.15);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.4);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.5);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-page);
            color: var(--text-body);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a {
            color: var(--brand-primary);
            text-decoration: none;
            transition: var(--transition);
        }

        a:hover {
            color: var(--brand-sapphire);
            text-decoration: underline;
        }

        .mono {
            font-family: 'JetBrains Mono', monospace;
        }

        .container {
            width: 100%;
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: var(--bg-glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-light);
            padding: 12px 0;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .brand-group {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .brand-logo-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            padding: 2px 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 26px;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -0.6px;
            user-select: none;
        }

        .logo-text-aspia {
            color: #031433;
            transition: color 0.3s ease;
        }

        [data-theme="dark"] .logo-text-aspia {
            color: #ffffff;
        }

        .logo-text-ucl {
            color: #00a8ff;
            font-weight: 900;
            margin-left: 2px;
        }

        .theme-switch-container {
            display: inline-flex;
            align-items: center;
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-full);
            padding: 3px;
            cursor: pointer;
            user-select: none;
        }

        .theme-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            border: none;
            background: transparent;
            color: var(--text-secondary);
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .theme-btn.active {
            background: var(--bg-surface);
            color: var(--text-title);
            box-shadow: var(--shadow-sm);
        }

        /* Nav Menu Styles */
        .main-nav-wrapper {
            display: flex;
            align-items: center;
            margin-left: auto;
            margin-right: 16px;
        }

        .nav-menu-list {
            display: flex;
            align-items: center;
            gap: 6px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-menu-item {
            position: relative;
        }

        .nav-menu-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 14px;
            border-radius: var(--radius-full);
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition);
        }

        .nav-menu-link:hover {
            color: var(--text-title);
            background: var(--bg-subtle);
            text-decoration: none;
        }

        .nav-menu-link.active {
            color: var(--brand-primary);
            font-weight: 700;
        }

        .nav-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.85;
        }

        .dropdown-arrow {
            font-size: 10px;
            opacity: 0.6;
            margin-left: 2px;
            transition: transform 0.2s ease;
        }

        .dropdown-parent:hover .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-popover {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            width: 315px;
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 12px;
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transform: translateY(8px);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1100;
        }

        .dropdown-parent:hover .dropdown-popover,
        .dropdown-parent:focus-within .dropdown-popover,
        .dropdown-parent.search-active .dropdown-popover {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
            pointer-events: auto !important;
        }

        .dropdown-parent.search-active .nav-menu-link {
            color: var(--brand-primary);
            font-weight: 700;
        }

        .dropdown-popover-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 10px;
            margin-bottom: 12px;
            border-bottom: 1px solid var(--border-light);
        }

        .popover-title {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: var(--brand-primary);
        }

        .popover-all-link {
            font-size: 12px;
            font-weight: 700;
            color: var(--brand-primary);
            text-decoration: none;
        }

        .popover-all-link:hover {
            text-decoration: underline;
        }

        .dropdown-popover-grid,
        .dropdown-popover-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
            max-height: 460px;
            overflow-y: auto;
            padding-right: 4px;
            scroll-behavior: smooth;
        }

        .dropdown-popover-list::-webkit-scrollbar {
            width: 5px;
        }

        .dropdown-popover-list::-webkit-scrollbar-track {
            background: var(--bg-subtle);
            border-radius: var(--radius-full);
        }

        .dropdown-popover-list::-webkit-scrollbar-thumb {
            background: var(--border-light);
            border-radius: var(--radius-full);
        }

        .dropdown-popover-list::-webkit-scrollbar-thumb:hover {
            background: var(--brand-primary);
        }

        .dropdown-card {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            text-decoration: none;
            transition: var(--transition);
        }

        .dropdown-card:hover {
            border-color: var(--brand-primary);
            transform: translateX(4px);
            background: var(--bg-surface);
            box-shadow: var(--shadow-sm);
            text-decoration: none;
        }

        .dropdown-card-body {
            flex: 1;
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

        .card-badge {
            display: inline-block;
            font-family: 'JetBrains Mono', monospace;
            font-size: 9.5px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 4px;
            width: fit-content;
            flex-shrink: 0;
        }

        .card-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-title);
            line-height: 1.3;
        }

        .card-sub {
            font-size: 11px;
            color: var(--text-secondary);
        }

        .nav-taxonomy-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: var(--radius-full);
            font-size: 12.5px;
            font-weight: 700;
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            color: var(--text-title);
            cursor: pointer;
            transition: var(--transition);
        }

        .nav-taxonomy-btn:hover {
            border-color: var(--brand-primary);
            color: var(--brand-primary);
            background: var(--bg-surface);
        }

        /* Taxonomy Drawer / Mega Modal */
        .taxonomy-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            z-index: 9999;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 80px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.25s ease;
        }

        .taxonomy-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .taxonomy-modal-card {
            width: 90%;
            max-width: 1100px;
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 28px;
            box-shadow: var(--shadow-lg);
            transform: translateY(-20px);
            transition: transform 0.25s ease;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }

        .taxonomy-modal-overlay.active .taxonomy-modal-card {
            transform: translateY(0);
        }

        .modal-top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border-light);
        }

        .modal-title-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-title-wrap h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-title);
        }

        .modal-close-btn {
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            color: var(--text-muted);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .modal-close-btn:hover {
            background: var(--brand-rose-light);
            color: var(--brand-rose);
            border-color: var(--brand-rose);
        }

        .mega-taxonomy-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .taxonomy-column {
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 18px;
            display: flex;
            flex-direction: column;
        }

        .column-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1.5px solid var(--border-light);
        }

        .column-title {
            font-size: 14px;
            font-weight: 800;
            color: var(--text-title);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .column-link-all {
            font-size: 11.5px;
            font-weight: 700;
            color: var(--brand-primary);
        }

        .column-items-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .column-item-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-sm);
            padding: 8px 12px;
            text-decoration: none;
            color: var(--text-title);
            transition: var(--transition);
        }

        .column-item-card:hover {
            border-color: var(--brand-primary);
            transform: translateX(2px);
            text-decoration: none;
        }

        .item-info {
            display: flex;
            flex-direction: column;
        }

        .item-name {
            font-size: 12.5px;
            font-weight: 700;
        }

        .item-code {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10.5px;
            color: var(--text-secondary);
        }

        @media (max-width: 992px) {
            .main-nav-wrapper {
                display: none;
            }

            .mega-taxonomy-grid {
                grid-template-columns: 1fr;
            }
        }

        .hero-section {
            padding: 32px 0 20px;
        }

        .hero-search-wrapper {
            margin: 0 auto 18px auto;
            width: 100%;
            max-width: 580px;
        }

        .hero-search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--bg-surface);
            border: 1.5px solid #38bdf8;
            border-radius: var(--radius-full);
            padding: 6px 16px;
            box-shadow: 0 0 12px rgba(56, 189, 248, 0.15), inset 0 1px 2px rgba(0, 0, 0, 0.02);
            transition: var(--transition);
        }

        .hero-search-bar:focus-within,
        .hero-search-bar:hover {
            border-color: var(--brand-primary);
            box-shadow: 0 0 18px rgba(2, 132, 199, 0.28), 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .search-icon-svg {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0284c7;
            font-size: 14px;
            flex-shrink: 0;
        }

        [data-theme="dark"] .hero-search-bar {
            border-color: #0284c7;
            box-shadow: 0 0 14px rgba(2, 132, 199, 0.25);
        }

        [data-theme="dark"] .search-icon-svg {
            color: #38bdf8;
        }

        .hero-search-input {
            flex: 1;
            border: none;
            background: transparent;
            font-size: 13.5px;
            font-weight: 500;
            font-family: inherit;
            color: var(--text-title);
            outline: none;
            padding: 2px 0;
        }

        .hero-search-input::placeholder {
            color: var(--text-secondary);
            opacity: 0.85;
        }

        .clear-search-btn {
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            color: var(--text-muted);
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .clear-search-btn:hover {
            background: var(--brand-rose-light);
            color: var(--brand-rose);
            border-color: var(--brand-rose);
        }

        .domain-hero-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 36px;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .domain-hero-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--brand-primary), var(--brand-purple), var(--brand-emerald));
        }

        .badge-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: var(--radius-full);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .badge-cyan {
            background: var(--brand-primary-light);
            color: var(--brand-primary);
            border: 1px solid rgba(2, 132, 199, 0.2);
        }

        .badge-purple {
            background: var(--brand-purple-light);
            color: var(--brand-purple);
            border: 1px solid rgba(124, 58, 237, 0.2);
        }

        .badge-status-glow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 5px 14px;
            border-radius: var(--radius-full);
            font-size: 12px;
            font-weight: 700;
            background: rgba(16, 185, 129, 0.12);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.4);
            box-shadow: 0 0 14px rgba(16, 185, 129, 0.3);
            animation: pulseGlow 2.5s infinite alternate ease-in-out;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background-color: #10b981;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 8px #10b981;
            animation: pulseDot 1.8s infinite ease-in-out;
        }

        @keyframes pulseGlow {
            0% {
                box-shadow: 0 0 8px rgba(16, 185, 129, 0.2);
            }

            100% {
                box-shadow: 0 0 20px rgba(16, 185, 129, 0.55);
            }
        }

        @keyframes pulseDot {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.35);
                opacity: 0.65;
            }
        }

        .domain-title-wrap {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 12px;
        }

        h1.domain-title {
            font-size: 32px;
            font-weight: 800;
            color: var(--text-title);
            line-height: 1.25;
            letter-spacing: -0.5px;
            max-width: 850px;
        }

        .domain-lead {
            font-size: 15.5px;
            color: var(--text-body);
            line-height: 1.7;
            max-width: 980px;
            margin-bottom: 24px;
        }

        .hero-details-container {
            border-top: 1px solid var(--border-light);
            padding-top: 20px;
            margin-top: 20px;
            max-height: 480px;
            overflow-y: auto;
            padding-right: 8px;
            scroll-behavior: smooth;
        }

        .hero-details-container::-webkit-scrollbar {
            width: 6px;
        }

        .hero-details-container::-webkit-scrollbar-track {
            background: var(--bg-subtle);
            border-radius: var(--radius-full);
        }

        .hero-details-container::-webkit-scrollbar-thumb {
            background: var(--border-subtle);
            border-radius: var(--radius-full);
        }

        .hero-details-container::-webkit-scrollbar-thumb:hover {
            background: var(--border-hover);
        }

        .details-group-header {
            font-size: 12.5px;
            font-weight: 800;
            color: var(--brand-primary);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin: 24px 0 12px 0;
            padding-bottom: 6px;
            border-bottom: 1.5px solid var(--border-light);
        }

        .details-group-header:first-child {
            margin-top: 0;
        }

        .excel-spec-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 14px;
            margin-bottom: 8px;
        }

        .excel-field-card {
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 14px 16px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            transition: var(--transition);
        }

        .excel-field-card.span-2 {
            grid-column: span 2;
        }

        .excel-field-card.full-width {
            grid-column: 1 / -1;
        }

        .excel-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .excel-val {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-title);
            line-height: 1.6;
            word-break: break-word;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 18px;
            margin-top: 24px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 20px 24px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            border-color: var(--border-subtle);
        }

        .stat-info {
            display: flex;
            flex-direction: column;
        }

        .stat-name {
            font-size: 11.5px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-title);
            line-height: 1;
        }

        .tabs-nav-wrapper {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 6px 12px;
            margin-bottom: 28px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .tabs-nav {
            display: flex;
            gap: 6px;
            list-style: none;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 10px 22px;
            border-radius: var(--radius-sm);
            font-size: 13.5px;
            font-weight: 700;
            color: var(--text-secondary);
            background: transparent;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .tab-btn:hover {
            color: var(--text-title);
            background: var(--bg-subtle);
        }

        .tab-btn.active {
            background: var(--brand-primary);
            color: #ffffff;
            box-shadow: var(--shadow-sm);
        }

        .tab-count {
            padding: 2px 8px;
            font-size: 11px;
            font-weight: 700;
            border-radius: var(--radius-full);
            background: rgba(255, 255, 255, 0.25);
            color: inherit;
        }

        .tab-btn:not(.active) .tab-count {
            background: var(--bg-subtle);
            color: var(--text-secondary);
            border: 1px solid var(--border-light);
        }

        .tab-panel {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .tab-panel.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-box {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 28px;
            margin-bottom: 28px;
            box-shadow: var(--shadow-sm);
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-light);
            flex-wrap: wrap;
            gap: 12px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-title);
        }

        .section-badge {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
        }

        .virtual-scroll-container {
            max-height: 520px;
            overflow-y: auto;
            padding-right: 6px;
            scroll-behavior: smooth;
        }

        .virtual-scroll-container::-webkit-scrollbar {
            width: 6px;
        }

        .virtual-scroll-container::-webkit-scrollbar-track {
            background: var(--bg-subtle);
            border-radius: var(--radius-full);
        }

        .virtual-scroll-container::-webkit-scrollbar-thumb {
            background: var(--border-subtle);
            border-radius: var(--radius-full);
        }

        .req-card-box {
            overflow: hidden;
        }

        .req-id-badge,
        .badge-chip,
        .mono {
            display: inline-block !important;
            white-space: nowrap !important;
            word-break: keep-all !important;
            hyphens: none !important;
        }

        .toast {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: var(--text-title);
            color: var(--bg-surface);
            padding: 12px 20px;
            border-radius: var(--radius-md);
            font-size: 13.5px;
            font-weight: 600;
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateY(100px);
            opacity: 0;
            transition: transform 0.3s ease;
            z-index: 9999;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .site-footer {
            margin-top: auto;
            border-top: 1px solid var(--border-light);
            background: var(--bg-surface);
            padding: 32px 0;
            font-size: 13px;
            color: var(--text-muted);
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 16px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 16px;
            }

            .domain-hero-card {
                padding: 24px;
            }

            h1.domain-title {
                font-size: 24px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .excel-field-card.span-2 {
                grid-column: 1 / -1;
            }
        }
    </style>
</head>

<body>
    <header class="site-header" role="banner">
        <div class="container header-content">
            <div class="brand-group">
                <a href="<?php echo e(route('home')); ?>" class="brand-logo-link" aria-label="ASPIA UCL Home">
                    <span class="logo-text-aspia">ASPIA</span><span class="logo-text-ucl">UCL</span>
                </a>
            </div>

            <!-- Site Navigation Menu -->
            <nav class="main-nav-wrapper" aria-label="Main Navigation">
                <ul class="nav-menu-list">
                    <!-- Frameworks Menu -->
                    <li class="nav-menu-item dropdown-parent">
                        <a href="<?php echo e(route('frameworks.public_index')); ?>" class="nav-menu-link" title="Compliance Frameworks">
                            <span>Frameworks</span>
                            <span class="dropdown-arrow">▾</span>
                        </a>
                        <div class="dropdown-popover">
                            <div class="dropdown-popover-list virtual-scroll-container" style="display: flex; flex-direction: column; gap: 0;">            <a href="http://localhost/frameworks/cert-in-directions" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">CERT-In Directions</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Cyber Regulation</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CERT-IN</span>
            </a>            <a href="http://localhost/frameworks/cis-controls" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">CIS Controls</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Best Practices</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CIS-V8</span>
            </a>            <a href="http://localhost/frameworks/cobit" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">COBIT</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">IT Governance</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">COBIT2019</span>
            </a>            <a href="http://localhost/frameworks/digital-operational-resilience-act" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Digital Operational Resilience Act</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Operational Resilience</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DORA</span>
            </a>            <a href="http://localhost/frameworks/digital-personal-data-protection-act" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Digital Personal Data Protection Act</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Privacy</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DPDP</span>
            </a>            <a href="http://localhost/frameworks/general-data-protection-regulation-gdpr" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">General Data Protection Regulation (GDPR)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Privacy</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GDPR</span>
            </a>            <a href="http://localhost/frameworks/health-insurance-portability-and-accountability-act" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Health Insurance Portability and Accountability Act</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Healthcare</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">HIPAA</span>
            </a>            <a href="http://localhost/frameworks/irdai-information-cyber-security-guidelines" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">IRDAI Information &amp; Cyber Security Guidelines</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Insurance</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IRDAI</span>
            </a>            <a href="http://localhost/frameworks/isoiec-22301" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">ISO/IEC 22301</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Business Continuity</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ISO22301</span>
            </a>            <a href="http://localhost/frameworks/isoiec-27001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">ISO/IEC 27001</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Information Security</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ISO27001</span>
            </a>            <a href="http://localhost/frameworks/isoiec-27002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">ISO/IEC 27002</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Controls</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ISO27002</span>
            </a>            <a href="http://localhost/frameworks/isoiec-27701" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">ISO/IEC 27701</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Privacy</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ISO27701</span>
            </a>            <a href="http://localhost/frameworks/nis2-directive" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">NIS2 Directive</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Cyber Regulation</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NIS2</span>
            </a>            <a href="http://localhost/frameworks/nist-cybersecurity-framework-csf" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">NIST Cybersecurity Framework (CSF)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Cybersecurity</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NIST-CSF</span>
            </a>            <a href="http://localhost/frameworks/nist-sp-800-53" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">NIST SP 800-53</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Controls</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NIST80053</span>
            </a>            <a href="http://localhost/frameworks/npci-information-security-requirements" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">NPCI Information Security Requirements</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Payment Systems</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NPCI-ISR</span>
            </a>            <a href="http://localhost/frameworks/pci-dss" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">PCI DSS</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Payment Security</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">PCI-DSS</span>
            </a>            <a href="http://localhost/frameworks/rbi-cyber-security-framework-master-directions" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">RBI Cyber Security Framework / Master Directions</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Indian Banking</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RBI-CSF</span>
            </a>            <a href="http://localhost/frameworks/sebi-cyber-security-cyber-resilience-framework" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">SEBI Cyber Security &amp; Cyber Resilience Framework</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Securities</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SEBI-CSCRF</span>
            </a>            <a href="http://localhost/frameworks/soc-2-trust-services-criteria" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">SOC 2 Trust Services Criteria</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Audit &amp; Assurance</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SOC2</span>
            </a></div>
                        </div>
                    </li>

                    <!-- Domains Menu -->
                    <li class="nav-menu-item dropdown-parent">
                        <a href="<?php echo e(route('domains.public_index')); ?>" class="nav-menu-link" title="Governance Domains">
                            <span>Domains</span>
                            <span class="dropdown-arrow">▾</span>
                        </a>
                        <div class="dropdown-popover">
                            <div class="dropdown-popover-list virtual-scroll-container" style="display: flex; flex-direction: column; gap: 0;">            <a href="http://localhost/domains/governance" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Governance</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the foundational structures, processes, and accountabilities for information security and privacy oversight, defining how security decisions are made and how the security program is directed, monitored, and continuously improved.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GOV</span>
            </a>            <a href="http://localhost/domains/policy-document-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Policy &amp; Document Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the lifecycle management of security and compliance policies, standards, procedures, and related documentation across the enterprise, ensuring consistent development, approval, communication, and maintenance.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">POL</span>
            </a>            <a href="http://localhost/domains/risk-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Risk Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for identifying, assessing, prioritizing, treating, and monitoring information security and privacy risks across the enterprise, ensuring risks are managed within defined appetite and tolerance levels.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK</span>
            </a>            <a href="http://localhost/domains/compliance-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Compliance Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for identifying, managing, and demonstrating compliance with legal, regulatory, and contractual obligations, ensuring the organization meets all applicable requirements.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CMP</span>
            </a>            <a href="http://localhost/domains/regulatory-change-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Regulatory Change Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for identifying, assessing, and responding to changes in legal, regulatory, and contractual requirements, ensuring ongoing compliance with evolving obligations.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">REG</span>
            </a>            <a href="http://localhost/domains/identity-access-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Identity &amp; Access Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for managing digital identities, controlling access to organizational resources, and ensuring that the right individuals and entities have appropriate access to systems, applications, and data.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IAM</span>
            </a>            <a href="http://localhost/domains/asset-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Asset Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for identifying, classifying, and managing organizational assets, ensuring visibility into what assets exist and their security requirements.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AST</span>
            </a>            <a href="http://localhost/domains/data-protection-privacy" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Protection &amp; Privacy</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for protecting personal and sensitive data throughout its lifecycle, ensuring privacy compliance and data security across all processing activities.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT</span>
            </a>            <a href="http://localhost/domains/cryptography-key-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cryptography &amp; Key Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for managing cryptographic controls, encryption technologies, and cryptographic keys to protect data at rest, in transit, and in use.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CRY</span>
            </a>            <a href="http://localhost/domains/network-security" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Network Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for securing network infrastructure, controlling network communications, and protecting against network-based threats.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NET</span>
            </a>            <a href="http://localhost/domains/endpoint-security" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Endpoint Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for securing endpoint devices including desktops, laptops, servers, and mobile devices against security threats.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">END</span>
            </a>            <a href="http://localhost/domains/cloud-security" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for securing cloud environments, services, and data across public, private, and hybrid cloud deployments.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD</span>
            </a>            <a href="http://localhost/domains/secure-configuration-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secure Configuration Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for defining, maintaining, and enforcing secure configurations across systems, applications, and infrastructure.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CFG</span>
            </a>            <a href="http://localhost/domains/vulnerability-patch-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Vulnerability &amp; Patch Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for identifying, assessing, prioritizing, and remediating vulnerabilities across organizational systems and applications.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">VUL</span>
            </a>            <a href="http://localhost/domains/application-security" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Application Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for securing applications throughout their lifecycle, from design through development, testing, and deployment.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP</span>
            </a>            <a href="http://localhost/domains/security-architecture" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Architecture</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for designing, governing, and implementing security architectures and principles across the enterprise.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ARC</span>
            </a>            <a href="http://localhost/domains/it-operations-service-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">IT Operations &amp; Service Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for managing IT operations, services, and infrastructure security, ensuring operational stability and security.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPS</span>
            </a>            <a href="http://localhost/domains/security-operations-monitoring" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Operations &amp; Monitoring</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for operating security operations centers, detecting threats, and automating security responses.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SOC</span>
            </a>            <a href="http://localhost/domains/threat-intelligence-threat-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Threat Intelligence &amp; Threat Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for collecting, analyzing, and using threat intelligence to understand and manage security threats.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">THR</span>
            </a>            <a href="http://localhost/domains/incident-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Incident Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for preparing for, detecting, responding to, and recovering from security incidents.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">INC</span>
            </a>            <a href="http://localhost/domains/business-continuity-disaster-recovery" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Business Continuity &amp; Disaster Recovery</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for ensuring business continuity and IT disaster recovery capabilities, enabling resilience to disruptions.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">BCM</span>
            </a>            <a href="http://localhost/domains/operational-resilience" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Operational Resilience</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for ensuring the organization can withstand, adapt to, and recover from operational disruptions across business services and dependencies.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPR</span>
            </a>            <a href="http://localhost/domains/physical-environmental-security" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Physical &amp; Environmental Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for securing physical facilities, protecting personnel, and managing environmental threats to critical infrastructure.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">PHY</span>
            </a>            <a href="http://localhost/domains/third-party-supply-chain-security" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Third-Party &amp; Supply Chain Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for managing security and compliance risks associated with third-party vendors, suppliers, and the extended supply chain.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">TPR</span>
            </a>            <a href="http://localhost/domains/human-resource-security" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Human Resource Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for securing the workforce through screening, obligations, lifecycle management, and ethical standards.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">HRS</span>
            </a>            <a href="http://localhost/domains/security-awareness-training" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Awareness &amp; Training</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for developing, delivering, and measuring security awareness and training programs across the workforce.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SAT</span>
            </a>            <a href="http://localhost/domains/ai-governance-model-security" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">AI Governance &amp; Model Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for governing, securing, and managing artificial intelligence systems and AI-related risks across the enterprise.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AIG</span>
            </a>            <a href="http://localhost/domains/audit-assurance" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Audit &amp; Assurance</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for internal and external audit, control assurance, and compliance validation to provide confidence in security controls.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AUD</span>
            </a>            <a href="http://localhost/domains/exception-management" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Exception Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Establishes the processes for managing exceptions to security policies, standards, and control requirements in a controlled and governed manner.</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">EXC</span>
            </a></div>
                        </div>
                    </li>

                    <!-- Controls Menu -->
                    <li class="nav-menu-item dropdown-parent">
                        <a href="<?php echo e(route('controls.public_index')); ?>" class="nav-menu-link" title="Unified Controls">
                            <span>Controls</span>
                            <span class="dropdown-arrow">▾</span>
                        </a>
                        <div class="dropdown-popover">
                            <div class="dropdown-popover-list virtual-scroll-container" style="display: flex; flex-direction: column; gap: 0;">            <a href="http://localhost/controls/view/AIG-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">AI Governance &amp; Oversight</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AIG-001</span>
            </a>            <a href="http://localhost/controls/view/AIG-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">AI Risk &amp; Impact Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AIG-002</span>
            </a>            <a href="http://localhost/controls/view/AIG-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">AI Asset &amp; Lifecycle Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AIG-003</span>
            </a>            <a href="http://localhost/controls/view/AIG-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Responsible AI Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AIG-004</span>
            </a>            <a href="http://localhost/controls/view/AIG-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">AI Security &amp; Operational Resilience</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AIG-005</span>
            </a>            <a href="http://localhost/controls/view/AIG-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">AI Performance Monitoring &amp; Continuous Improvement</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AIG-006</span>
            </a>            <a href="http://localhost/controls/view/APP-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Application Security Program</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-001</span>
            </a>            <a href="http://localhost/controls/view/APP-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Application Inventory</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-002</span>
            </a>            <a href="http://localhost/controls/view/APP-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secure Software Development Lifecycle (SSDLC)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-003</span>
            </a>            <a href="http://localhost/controls/view/APP-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secure Coding Practices</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-004</span>
            </a>            <a href="http://localhost/controls/view/APP-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Application Security Testing</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-005</span>
            </a>            <a href="http://localhost/controls/view/APP-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">DevSecOps</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-006</span>
            </a>            <a href="http://localhost/controls/view/APP-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Software Supply Chain Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-007</span>
            </a>            <a href="http://localhost/controls/view/APP-008" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">API Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-008</span>
            </a>            <a href="http://localhost/controls/view/APP-009" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secrets Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-009</span>
            </a>            <a href="http://localhost/controls/view/APP-010" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Software Release &amp; Deployment Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-010</span>
            </a>            <a href="http://localhost/controls/view/APP-011" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Application Security Incident Response</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-011</span>
            </a>            <a href="http://localhost/controls/view/APP-012" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Application Risk Assessment</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">APP-012</span>
            </a>            <a href="http://localhost/controls/view/ARC-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Architecture Framework</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ARC-001</span>
            </a>            <a href="http://localhost/controls/view/ARC-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Architecture Governance</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ARC-002</span>
            </a>            <a href="http://localhost/controls/view/ARC-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Threat Modeling</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ARC-003</span>
            </a>            <a href="http://localhost/controls/view/ARC-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Design &amp; Architecture Reviews</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ARC-004</span>
            </a>            <a href="http://localhost/controls/view/ARC-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secure Engineering Principles</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ARC-005</span>
            </a>            <a href="http://localhost/controls/view/ARC-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Zero Trust Architecture</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">ARC-006</span>
            </a>            <a href="http://localhost/controls/view/AST-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Asset Inventory Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AST-001</span>
            </a>            <a href="http://localhost/controls/view/AST-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Asset Classification &amp; Criticality</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AST-002</span>
            </a>            <a href="http://localhost/controls/view/AST-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Asset Ownership</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AST-003</span>
            </a>            <a href="http://localhost/controls/view/AST-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Asset Lifecycle Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AST-004</span>
            </a>            <a href="http://localhost/controls/view/AST-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secure Asset Disposal &amp; Reuse</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AST-005</span>
            </a>            <a href="http://localhost/controls/view/AST-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Authorized &amp; Approved Assets</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AST-006</span>
            </a>            <a href="http://localhost/controls/view/AST-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Automated Asset Discovery &amp; Unauthorized Asset Detection</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AST-007</span>
            </a>            <a href="http://localhost/controls/view/AST-008" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Software License Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AST-008</span>
            </a>            <a href="http://localhost/controls/view/AUD-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Audit &amp; Assurance Program</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AUD-001</span>
            </a>            <a href="http://localhost/controls/view/AUD-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Internal Audit Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AUD-002</span>
            </a>            <a href="http://localhost/controls/view/AUD-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Independent Assessment &amp; External Assurance</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AUD-003</span>
            </a>            <a href="http://localhost/controls/view/AUD-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Control Assurance &amp; Validation</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AUD-004</span>
            </a>            <a href="http://localhost/controls/view/AUD-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Control Self-Assessment (CSA)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AUD-005</span>
            </a>            <a href="http://localhost/controls/view/AUD-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Attestation &amp; Certification Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AUD-006</span>
            </a>            <a href="http://localhost/controls/view/AUD-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Audit Findings &amp; Remediation Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">AUD-007</span>
            </a>            <a href="http://localhost/controls/view/BCM-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Business Continuity &amp; Disaster Recovery (BCDR) Program</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">BCM-001</span>
            </a>            <a href="http://localhost/controls/view/BCM-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Business Continuity &amp; Disaster Recovery Planning</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">BCM-002</span>
            </a>            <a href="http://localhost/controls/view/BCM-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Business Impact Analysis (BIA)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">BCM-003</span>
            </a>            <a href="http://localhost/controls/view/BCM-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">BCDR Testing &amp; Exercising</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">BCM-004</span>
            </a>            <a href="http://localhost/controls/view/BCM-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Backup &amp; Recovery Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">BCM-005</span>
            </a>            <a href="http://localhost/controls/view/BCM-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Recovery Infrastructure Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">BCM-006</span>
            </a>            <a href="http://localhost/controls/view/CFG-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secure Configuration Baseline</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CFG-001</span>
            </a>            <a href="http://localhost/controls/view/CFG-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Configuration Compliance Monitoring</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CFG-002</span>
            </a>            <a href="http://localhost/controls/view/CFG-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Configuration Automation &amp; Deployment</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CFG-003</span>
            </a>            <a href="http://localhost/controls/view/CFG-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Configuration Hardening</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CFG-004</span>
            </a>            <a href="http://localhost/controls/view/CFG-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Configuration Change Control</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CFG-005</span>
            </a>            <a href="http://localhost/controls/view/CFG-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Configuration Exception Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CFG-006</span>
            </a>            <a href="http://localhost/controls/view/CLD-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Security Governance</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-001</span>
            </a>            <a href="http://localhost/controls/view/CLD-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Shared Responsibility Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-002</span>
            </a>            <a href="http://localhost/controls/view/CLD-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secure Cloud Configuration</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-003</span>
            </a>            <a href="http://localhost/controls/view/CLD-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Identity &amp; Access Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-004</span>
            </a>            <a href="http://localhost/controls/view/CLD-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Network Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-005</span>
            </a>            <a href="http://localhost/controls/view/CLD-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Data Protection</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-006</span>
            </a>            <a href="http://localhost/controls/view/CLD-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Workload &amp; Container Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-007</span>
            </a>            <a href="http://localhost/controls/view/CLD-008" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Security Monitoring</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-008</span>
            </a>            <a href="http://localhost/controls/view/CLD-009" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Incident Response</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-009</span>
            </a>            <a href="http://localhost/controls/view/CLD-010" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cloud Data Portability &amp; Interoperability</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CLD-010</span>
            </a>            <a href="http://localhost/controls/view/CMP-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Compliance Program Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CMP-001</span>
            </a>            <a href="http://localhost/controls/view/CMP-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Control Compliance Monitoring</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CMP-002</span>
            </a>            <a href="http://localhost/controls/view/CMP-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Compliance Evidence Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CMP-003</span>
            </a>            <a href="http://localhost/controls/view/CMP-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Non-Compliance Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CMP-004</span>
            </a>            <a href="http://localhost/controls/view/CMP-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Compliance Reporting</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CMP-005</span>
            </a>            <a href="http://localhost/controls/view/CMP-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Regulatory Change Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CMP-006</span>
            </a>            <a href="http://localhost/controls/view/CMP-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Compliance Obligation Mapping</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CMP-007</span>
            </a>            <a href="http://localhost/controls/view/CRY-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cryptographic Governance</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CRY-001</span>
            </a>            <a href="http://localhost/controls/view/CRY-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data-at-Rest Encryption</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CRY-002</span>
            </a>            <a href="http://localhost/controls/view/CRY-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data-in-Transit Encryption</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CRY-003</span>
            </a>            <a href="http://localhost/controls/view/CRY-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cryptographic Key Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CRY-004</span>
            </a>            <a href="http://localhost/controls/view/CRY-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Digital Certificate Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">CRY-005</span>
            </a>            <a href="http://localhost/controls/view/DAT-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Protection &amp; Privacy Strategy</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-001</span>
            </a>            <a href="http://localhost/controls/view/DAT-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Discovery</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-002</span>
            </a>            <a href="http://localhost/controls/view/DAT-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Classification &amp; Handling</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-003</span>
            </a>            <a href="http://localhost/controls/view/DAT-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Retention &amp; Disposal</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-004</span>
            </a>            <a href="http://localhost/controls/view/DAT-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Ownership &amp; Stewardship</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-005</span>
            </a>            <a href="http://localhost/controls/view/DAT-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Flow Mapping, Inventory &amp; Lineage</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-006</span>
            </a>            <a href="http://localhost/controls/view/DAT-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Subject Rights Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-007</span>
            </a>            <a href="http://localhost/controls/view/DAT-008" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Consent Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-008</span>
            </a>            <a href="http://localhost/controls/view/DAT-009" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Cross-Border Data Transfer</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-009</span>
            </a>            <a href="http://localhost/controls/view/DAT-010" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Privacy Notices</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-010</span>
            </a>            <a href="http://localhost/controls/view/DAT-011" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Privacy by Design</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-011</span>
            </a>            <a href="http://localhost/controls/view/DAT-012" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Protection Impact Assessment (DPIA)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-012</span>
            </a>            <a href="http://localhost/controls/view/DAT-013" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Record of Processing Activities (ROPA)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-013</span>
            </a>            <a href="http://localhost/controls/view/DAT-014" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Loss Prevention (DLP)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-014</span>
            </a>            <a href="http://localhost/controls/view/DAT-015" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Integrity</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-015</span>
            </a>            <a href="http://localhost/controls/view/DAT-016" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Masking &amp; Anonymization</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">DAT-016</span>
            </a>            <a href="http://localhost/controls/view/END-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Endpoint Protection</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">END-001</span>
            </a>            <a href="http://localhost/controls/view/END-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Endpoint Detection &amp; Response (EDR)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">END-002</span>
            </a>            <a href="http://localhost/controls/view/END-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Mobile Device &amp; Application Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">END-003</span>
            </a>            <a href="http://localhost/controls/view/END-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Endpoint Encryption</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">END-004</span>
            </a>            <a href="http://localhost/controls/view/END-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Endpoint Application Control</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">END-005</span>
            </a>            <a href="http://localhost/controls/view/END-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Removable Media &amp; Peripheral Control</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">END-006</span>
            </a>            <a href="http://localhost/controls/view/EXC-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Exception Management Program</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">EXC-001</span>
            </a>            <a href="http://localhost/controls/view/EXC-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Exception Lifecycle Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">EXC-002</span>
            </a>            <a href="http://localhost/controls/view/GOV-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Information Security Governance</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GOV-001</span>
            </a>            <a href="http://localhost/controls/view/GOV-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Charter</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GOV-002</span>
            </a>            <a href="http://localhost/controls/view/GOV-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Governance Committees</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GOV-003</span>
            </a>            <a href="http://localhost/controls/view/GOV-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Executive Oversight &amp; Reporting</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GOV-004</span>
            </a>            <a href="http://localhost/controls/view/GOV-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Information Security Program Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative + Operational</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GOV-005</span>
            </a>            <a href="http://localhost/controls/view/GOV-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Program Continuous Improvement</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Operational</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GOV-006</span>
            </a>            <a href="http://localhost/controls/view/GOV-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Integration into Business &amp; Technology Initiatives</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GOV-007</span>
            </a>            <a href="http://localhost/controls/view/GOV-008" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Enterprise Control Library Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative + Operational</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">GOV-008</span>
            </a>            <a href="http://localhost/controls/view/HRS-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Personnel Screening &amp; Verification</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">HRS-001</span>
            </a>            <a href="http://localhost/controls/view/HRS-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Confidentiality &amp; Employment Obligations</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">HRS-002</span>
            </a>            <a href="http://localhost/controls/view/HRS-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Personnel Lifecycle Security Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">HRS-003</span>
            </a>            <a href="http://localhost/controls/view/HRS-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Employee Code of Conduct &amp; Ethics</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">HRS-004</span>
            </a>            <a href="http://localhost/controls/view/IAM-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Identity &amp; Account Lifecycle Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative / Technical</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IAM-001</span>
            </a>            <a href="http://localhost/controls/view/IAM-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Authentication Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Technical</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IAM-002</span>
            </a>            <a href="http://localhost/controls/view/IAM-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Privileged Access Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Technical</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IAM-003</span>
            </a>            <a href="http://localhost/controls/view/IAM-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Authorization Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Technical</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IAM-004</span>
            </a>            <a href="http://localhost/controls/view/IAM-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Access Reviews (Certifications)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative / Technical</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IAM-005</span>
            </a>            <a href="http://localhost/controls/view/IAM-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Federation &amp; Single Sign-On (SSO)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Technical</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IAM-006</span>
            </a>            <a href="http://localhost/controls/view/IAM-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Access Control for APIs</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Technical</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IAM-007</span>
            </a>            <a href="http://localhost/controls/view/IAM-008" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Non-Human Identity Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Technical</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">IAM-008</span>
            </a>            <a href="http://localhost/controls/view/INC-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Incident Response Program</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">INC-001</span>
            </a>            <a href="http://localhost/controls/view/INC-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Incident Response Preparedness</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">INC-002</span>
            </a>            <a href="http://localhost/controls/view/INC-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Incident Detection, Analysis &amp; Reporting</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">INC-003</span>
            </a>            <a href="http://localhost/controls/view/INC-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Incident Containment, Eradication &amp; Recovery</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">INC-004</span>
            </a>            <a href="http://localhost/controls/view/INC-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Post-Incident Review &amp; Continuous Improvement</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">INC-005</span>
            </a>            <a href="http://localhost/controls/view/INC-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Crisis Communication Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">INC-006</span>
            </a>            <a href="http://localhost/controls/view/INC-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Regulatory &amp; External Incident Notification</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">INC-007</span>
            </a>            <a href="http://localhost/controls/view/NET-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secure Network Architecture</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NET-001</span>
            </a>            <a href="http://localhost/controls/view/NET-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Network Segmentation &amp; Traffic Control</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NET-002</span>
            </a>            <a href="http://localhost/controls/view/NET-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Intrusion Detection &amp; Prevention</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NET-003</span>
            </a>            <a href="http://localhost/controls/view/NET-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Network Access Control (NAC)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NET-004</span>
            </a>            <a href="http://localhost/controls/view/NET-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Secure Remote Access</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NET-005</span>
            </a>            <a href="http://localhost/controls/view/NET-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Wireless Network Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NET-006</span>
            </a>            <a href="http://localhost/controls/view/NET-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Network Monitoring &amp; Visibility</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NET-007</span>
            </a>            <a href="http://localhost/controls/view/NET-008" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Voice &amp; Video Communication Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">NET-008</span>
            </a>            <a href="http://localhost/controls/view/OPR-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Operational Resilience Program</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPR-001</span>
            </a>            <a href="http://localhost/controls/view/OPR-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Critical Business Service Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPR-002</span>
            </a>            <a href="http://localhost/controls/view/OPR-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Operational Dependency Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPR-003</span>
            </a>            <a href="http://localhost/controls/view/OPR-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Impact Tolerance &amp; Criticality Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPR-004</span>
            </a>            <a href="http://localhost/controls/view/OPR-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Operational Resilience Testing</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPR-005</span>
            </a>            <a href="http://localhost/controls/view/OPR-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Third-Party &amp; Supply Chain Resilience</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPR-006</span>
            </a>            <a href="http://localhost/controls/view/OPS-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Change &amp; Release Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPS-001</span>
            </a>            <a href="http://localhost/controls/view/OPS-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Operational Monitoring &amp; Service Health</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPS-002</span>
            </a>            <a href="http://localhost/controls/view/OPS-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Service Availability Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPS-003</span>
            </a>            <a href="http://localhost/controls/view/OPS-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Capacity &amp; Performance Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPS-004</span>
            </a>            <a href="http://localhost/controls/view/OPS-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">System Maintenance Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPS-005</span>
            </a>            <a href="http://localhost/controls/view/OPS-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">End-of-Life &amp; Technology Lifecycle Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPS-006</span>
            </a>            <a href="http://localhost/controls/view/OPS-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Batch Processing &amp; Job Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">OPS-007</span>
            </a>            <a href="http://localhost/controls/view/PHY-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Physical Security &amp; Facility Access Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">PHY-001</span>
            </a>            <a href="http://localhost/controls/view/PHY-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Environmental &amp; Infrastructure Protection</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">PHY-002</span>
            </a>            <a href="http://localhost/controls/view/PHY-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Data Center &amp; Critical Facility Security</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">PHY-003</span>
            </a>            <a href="http://localhost/controls/view/PHY-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Sensitive Asset &amp; Equipment Protection</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">PHY-004</span>
            </a>            <a href="http://localhost/controls/view/PHY-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Physical Media Handling &amp; Secure Disposal</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">PHY-005</span>
            </a>            <a href="http://localhost/controls/view/PHY-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Physical Emergency Preparedness &amp; Response</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">PHY-006</span>
            </a>            <a href="http://localhost/controls/view/POL-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Policy Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">POL-001</span>
            </a>            <a href="http://localhost/controls/view/POL-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Policy Communication &amp; Awareness</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">POL-002</span>
            </a>            <a href="http://localhost/controls/view/POL-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Policy Review &amp; Update</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">POL-003</span>
            </a>            <a href="http://localhost/controls/view/POL-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Acceptable Use Policy (AUP)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">POL-004</span>
            </a>            <a href="http://localhost/controls/view/RSK-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Risk Management Framework</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK-001</span>
            </a>            <a href="http://localhost/controls/view/RSK-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Risk Register</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK-002</span>
            </a>            <a href="http://localhost/controls/view/RSK-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Risk Assessment</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK-003</span>
            </a>            <a href="http://localhost/controls/view/RSK-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Risk Treatment &amp; Response</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative + Operational</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK-004</span>
            </a>            <a href="http://localhost/controls/view/RSK-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Risk Monitoring &amp; Reporting</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative + Operational</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK-005</span>
            </a>            <a href="http://localhost/controls/view/RSK-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Risk Appetite Definition</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK-006</span>
            </a>            <a href="http://localhost/controls/view/RSK-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Key Risk Indicators (KRIs)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK-007</span>
            </a>            <a href="http://localhost/controls/view/RSK-008" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Risk Acceptance &amp; Exception Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK-008</span>
            </a>            <a href="http://localhost/controls/view/RSK-009" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Scenario Analysis</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Administrative</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">RSK-009</span>
            </a>            <a href="http://localhost/controls/view/SAT-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Awareness Program</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SAT-001</span>
            </a>            <a href="http://localhost/controls/view/SAT-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Culture Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SAT-002</span>
            </a>            <a href="http://localhost/controls/view/SAT-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Role-Based Security &amp; Compliance Training</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SAT-003</span>
            </a>            <a href="http://localhost/controls/view/SAT-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Awareness Exercises &amp; Simulations</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SAT-004</span>
            </a>            <a href="http://localhost/controls/view/SOC-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Operations Center (SOC) Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SOC-001</span>
            </a>            <a href="http://localhost/controls/view/SOC-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Threat Detection</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SOC-002</span>
            </a>            <a href="http://localhost/controls/view/SOC-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Security Automation &amp; Orchestration (SOAR)</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SOC-003</span>
            </a>            <a href="http://localhost/controls/view/SOC-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Threat Hunting</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">SOC-004</span>
            </a>            <a href="http://localhost/controls/view/THR-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Threat Intelligence Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">THR-001</span>
            </a>            <a href="http://localhost/controls/view/THR-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Attack Surface Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">THR-002</span>
            </a>            <a href="http://localhost/controls/view/THR-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Insider Threat Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">THR-003</span>
            </a>            <a href="http://localhost/controls/view/THR-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Adversary Simulation &amp; Security Validation</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">THR-004</span>
            </a>            <a href="http://localhost/controls/view/TPR-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Third-Party Risk Management Program</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">TPR-001</span>
            </a>            <a href="http://localhost/controls/view/TPR-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Third-Party Risk Assessment &amp; Due Diligence</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">TPR-002</span>
            </a>            <a href="http://localhost/controls/view/TPR-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Third-Party Contract &amp; Compliance Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">TPR-003</span>
            </a>            <a href="http://localhost/controls/view/TPR-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Third-Party Continuous Monitoring &amp; Assurance</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">TPR-004</span>
            </a>            <a href="http://localhost/controls/view/TPR-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Third-Party Lifecycle &amp; Offboarding Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">TPR-005</span>
            </a>            <a href="http://localhost/controls/view/TPR-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Third-Party Concentration Risk Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">TPR-006</span>
            </a>            <a href="http://localhost/controls/view/VUL-001" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Vulnerability Management Strategy</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">VUL-001</span>
            </a>            <a href="http://localhost/controls/view/VUL-002" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Vulnerability Assessment &amp; Scanning</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">VUL-002</span>
            </a>            <a href="http://localhost/controls/view/VUL-003" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Vulnerability Prioritization</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">VUL-003</span>
            </a>            <a href="http://localhost/controls/view/VUL-004" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Vulnerability Intelligence</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">VUL-004</span>
            </a>            <a href="http://localhost/controls/view/VUL-005" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Patch Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">VUL-005</span>
            </a>            <a href="http://localhost/controls/view/VUL-006" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Vulnerability Reporting &amp; SLA Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">VUL-006</span>
            </a>            <a href="http://localhost/controls/view/VUL-007" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Vulnerability Exception Management</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">VUL-007</span>
            </a>            <a href="http://localhost/controls/view/VUL-008" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">Exposure Analytics</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">Security Control</div>
                </div>
                <span class="card-badge badge-navy" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">VUL-008</span>
            </a></div>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="header-actions">
                <div class="theme-switch-container" id="themeSwitch" role="group" aria-label="Color theme switcher">
                    <button type="button" class="theme-btn active" id="btnThemeLight" aria-pressed="true">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                        <span>Light</span>
                    </button>
                    <button type="button" class="theme-btn" id="btnThemeDark" aria-pressed="false">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                        <span>Dark</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="container" id="main-content" role="main">
        <article class="hero-section">
            <div class="hero-search-wrapper">
                <div class="hero-search-bar" id="heroSearchBar">
                    <span class="search-icon-svg">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </span>
                    <input type="text" id="globalHeroSearchInput" class="hero-search-input"
                        placeholder="Search controls, frameworks, requirements..."
                        aria-label="Search controls, frameworks, requirements">
                    <button type="button" id="clearHeroSearchBtn" class="clear-search-btn" style="display: none;"
                        aria-label="Clear search">✕</button>
                </div>
            </div>

            <div class="domain-hero-card">
                <div class="badge-bar">
                    <span class="badge badge-purple"><span class="mono">GOV</span></span>
                    <span class="badge badge-cyan"><span class="mono">DOM-001</span></span>
                    <span class="badge badge-status-glow">
                        <span class="status-dot"></span>
                        <span>Status: <strong>Active</strong></span>
                    </span>
                </div>
                <div class="domain-title-wrap">
                    <h1 class="domain-title">Governance</h1>
                </div>
                <p class="domain-lead">To establish, oversee, and continually improve the organization's security, privacy, and resilience program.</p>

                <!-- Professional Executive Domain Specifications in Hero -->
                <div class="hero-details-container">
                    <div class="details-group-header">Domain Identification & Governance</div>
                    <div class="excel-spec-grid">
                        <div class="excel-field-card">
                            <div class="excel-label">Domain ID</div>
                            <div class="excel-val mono" style="color: var(--brand-primary); font-weight: 700;">
                                DOM-001</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Domain Code</div>
                            <div class="excel-val mono" style="color: var(--brand-purple); font-weight: 700;">
                                GOV</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Domain Name</div>
                            <div class="excel-val" style="font-weight: 700;">Governance</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Slug</div>
                            <div class="excel-val mono" style="color: var(--text-secondary); font-size: 13.5px;">
                                governance</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Business Owner</div>
                            <div class="excel-val">Board / CISO</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Display Order</div>
                            <div class="excel-val mono">1</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Version</div>
                            <div class="excel-val mono">1</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Scope</div>
                            <div class="excel-val">Enterprise</div>
                        </div>
                        <div class="excel-field-card full-width">
                            <div class="excel-label">Short Overview</div>
                            <div class="excel-val">Establishes the foundational structures, processes, and accountabilities for information security and privacy oversight, defining how security decisions are made and how the security program is directed, monitored, and continuously improved.</div>
                        </div>
                        <div class="excel-field-card full-width">
                            <div class="excel-label">Description</div>
                            <div class="excel-val">Governs the overall program, including executive sponsorship, resource allocation, roles and responsibilities, and the integration of security into business strategy.</div>
                        </div>
                    </div>

                    <div class="details-group-header">Strategic Alignment & Risk Register</div>
                    <div class="excel-spec-grid">
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Business Objectives</div>
                            <div class="excel-val">Enhanced strategic alignment of security with business goals; improved executive visibility and decision-making; clear accountability for security outcomes; efficient governance structures; increased stakeholder confidence; reduced regulatory exposure; faster security decision-making.</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Business Risks</div>
                            <div class="excel-val">Weak governance leads to unclear accountability, poor decision-making, misaligned security investments, inadequate executive oversight, regulatory non-compliance, inefficient security operations, and increased exposure to cyber risks.</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Key Capabilities</div>
                            <div class="excel-val">Governance authority & accountability definition; Charter establishment & management; Committee governance; Executive oversight & reporting; Program management framework; Continuous improvement processes; Security integration into business initiatives; Control library management; Security Metrics & KPI Governance; Strategic Performance Monitoring</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Typical Stakeholders</div>
                            <div class="excel-val">Board of Directors, CEO, CISO, CIO, Risk Committee, Audit Committee, Executive Leadership, Compliance Officers</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Applicable Industries</div>
                            <div class="excel-val">Banking, Insurance, Healthcare, Government, Financial Services, Manufacturing, Telecommunications, Technology, Retail, Energy, Utilities</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Applicable Technologies</div>
                            <div class="excel-val">GRC Platforms, Enterprise Risk Management Systems, Policy Management Solutions, Board Portals, Analytics & Reporting Tools</div>
                        </div>
                    </div>

                    <div class="details-group-header">Implementation Insights & Cross-Taxonomy Mappings</div>
                    <div class="excel-spec-grid">
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Why This Domain Matters</div>
                            <div class="excel-val">Without strong governance, security becomes reactive, fragmented, and misaligned with business priorities, leading to wasted investments, regulatory penalties, and increased risk exposure.</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Common Challenges</div>
                            <div class="excel-val">Establishing clear accountability across siloed business units; securing board-level attention and funding; balancing security priorities with business agility; maintaining governance relevance amid organizational change.</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Keywords</div>
                            <div class="excel-val">security governance, GRC, board oversight, executive reporting, security strategy, governance framework, CISO accountability, security charter, governance committee, security program management</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Tags</div>
                            <div class="excel-val">core, governance, leadership, strategic, enterprise, compliance</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Related Domains</div>
                            <div class="excel-val">Risk Management, Compliance Management, Policy &amp; Document Management, Audit &amp; Assurance</div>
                        </div>
                        <div class="excel-field-card full-width">
                            <div class="excel-label">Related Frameworks</div>
                            <div class="excel-val">COBIT, ISO 37000, COSO, NIST CSF (Govern), ISACA Governance Framework, ISO 38500, ISO/IEC 27014 (Governance of Information Security)</div>
                        </div>
                    </div>
                </div>
            </div>

        </article>

        <nav class="tabs-nav-wrapper" aria-label="Domain Sections Navigation">
            <ul class="tabs-nav" role="tablist">
                <li role="presentation"><button type="button" class="tab-btn active" role="tab" aria-selected="true"
                        aria-controls="panel-controls" id="tab-controls" data-target="panel-controls">Associated
                        Controls <span class="tab-count">8</span></button></li>
                <li role="presentation"><button type="button" class="tab-btn" role="tab" aria-selected="false"
                        aria-controls="panel-requirements" id="tab-requirements"
                        data-target="panel-requirements">Requirements & Audit <span
                            class="tab-count">96</span></button></li>
                <li role="presentation"><button type="button" class="tab-btn" role="tab" aria-selected="false"
                        aria-controls="panel-frameworks" id="tab-frameworks" data-target="panel-frameworks">Mapped
                        Frameworks</button></li>
            </ul>

            <!-- Tab Sections Real-time Filter Search Bar -->
            <div class="tab-section-search-box" style="position: relative; width: 320px; max-width: 100%; margin-left: auto;">
                <svg style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 14px; height: 14px; fill: none; stroke: var(--brand-primary, #0284c7); stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; pointer-events: none;" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" id="tabSectionSearchInput" placeholder="Search controls, requirements, frameworks..." style="width: 100%; padding: 8px 32px 8px 34px; background: var(--bg-subtle, #f8fafc); border: 1.5px solid var(--border-light, #e2e8f0); border-radius: 8px; font-size: 12px; font-weight: 600; color: var(--text-title, #0f172a); outline: none; transition: all 0.2s ease;" onfocus="this.style.borderColor='var(--brand-primary, #0284c7)'; this.style.background='var(--bg-surface, #ffffff)'; this.style.boxShadow='0 0 0 3px rgba(2, 132, 199, 0.15)';" onblur="this.style.borderColor='var(--border-light, #e2e8f0)'; this.style.background='var(--bg-subtle, #f8fafc)'; this.style.boxShadow='none';">
                <button type="button" id="tabSectionSearchClear" style="display: none; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: var(--bg-subtle); border: 1px solid var(--border-light); width: 18px; height: 18px; border-radius: 50%; font-size: 10px; color: var(--text-muted); cursor: pointer; align-items: center; justify-content: center; line-height: 1;">✕</button>
            </div>
        </nav>

        <div class="tab-panel active" id="panel-controls" role="tabpanel" aria-labelledby="tab-controls">
            <div class="section-box">
                <div class="section-header">
                    <h2 class="section-title">Associated Controls Catalog</h2><span
                        class="section-badge">8 Active Controls in Domain</span>
                </div>
                        <div class="ucl-table-container" style="width: 100%; overflow-x: auto; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04)); margin-top: 8px;">
            <table class="ucl-data-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 12px;">
                <thead>
                    <tr style="background: var(--bg-subtle, #f8fafc); border-bottom: 1px solid var(--border-light, #e2e8f0);">
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Control ID</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Control Name</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Category & Type</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Criticality</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Status</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Requirements</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                                <tr class="control-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 1px 6px; border-radius: 4px;">GOV-001</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/controls/view/GOV-001" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Information Security Governance</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Establishes the foundational governance...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">Administrative</div>
                    <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Preventive</div>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-block; padding: 1px 7px; border-radius: 10px; font-size: 9.5px; font-weight: 700; background: #ef444418; color: #ef4444; border: 1px solid #ef444440;">Critical</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 10px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 7px; border-radius: 10px;">
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                        Active
                    </span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; font-weight: 600; color: var(--text-secondary, #64748b); font-size: 11px;">
                    📋 12 Reqs
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>→</span>
                    </a>
                </td>
            </tr>            <tr class="control-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 1px 6px; border-radius: 4px;">GOV-002</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/controls/view/GOV-002" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Security Charter</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Creates the foundational governing docum...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">Administrative</div>
                    <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Preventive</div>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-block; padding: 1px 7px; border-radius: 10px; font-size: 9.5px; font-weight: 700; background: #f9731618; color: #f97316; border: 1px solid #f9731640;">High</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 10px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 7px; border-radius: 10px;">
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                        Active
                    </span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; font-weight: 600; color: var(--text-secondary, #64748b); font-size: 11px;">
                    📋 12 Reqs
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>→</span>
                    </a>
                </td>
            </tr>            <tr class="control-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 1px 6px; border-radius: 4px;">GOV-003</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/controls/view/GOV-003" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Committees</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Establishes formal governance committees...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">Administrative</div>
                    <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Preventive</div>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-block; padding: 1px 7px; border-radius: 10px; font-size: 9.5px; font-weight: 700; background: #ef444418; color: #ef4444; border: 1px solid #ef444440;">Critical</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 10px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 7px; border-radius: 10px;">
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                        Active
                    </span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; font-weight: 600; color: var(--text-secondary, #64748b); font-size: 11px;">
                    📋 12 Reqs
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>→</span>
                    </a>
                </td>
            </tr>            <tr class="control-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 1px 6px; border-radius: 4px;">GOV-004</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/controls/view/GOV-004" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Executive Oversight &amp; Reporting</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Establishes processes and reporting fram...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">Administrative</div>
                    <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Detective</div>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-block; padding: 1px 7px; border-radius: 10px; font-size: 9.5px; font-weight: 700; background: #ef444418; color: #ef4444; border: 1px solid #ef444440;">Critical</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 10px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 7px; border-radius: 10px;">
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                        Active
                    </span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; font-weight: 600; color: var(--text-secondary, #64748b); font-size: 11px;">
                    📋 12 Reqs
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>→</span>
                    </a>
                </td>
            </tr>            <tr class="control-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 1px 6px; border-radius: 4px;">GOV-005</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/controls/view/GOV-005" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Information Security Program Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Establishes program management capabilit...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">Administrative + Operational</div>
                    <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Preventive</div>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-block; padding: 1px 7px; border-radius: 10px; font-size: 9.5px; font-weight: 700; background: #f9731618; color: #f97316; border: 1px solid #f9731640;">High</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 10px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 7px; border-radius: 10px;">
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                        Active
                    </span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; font-weight: 600; color: var(--text-secondary, #64748b); font-size: 11px;">
                    📋 12 Reqs
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>→</span>
                    </a>
                </td>
            </tr>            <tr class="control-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 1px 6px; border-radius: 4px;">GOV-006</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/controls/view/GOV-006" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Security Program Continuous Improvement</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Establishes a structured continuous impr...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">Operational</div>
                    <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Corrective</div>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-block; padding: 1px 7px; border-radius: 10px; font-size: 9.5px; font-weight: 700; background: #eab30818; color: #eab308; border: 1px solid #eab30840;">Medium</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 10px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 7px; border-radius: 10px;">
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                        Active
                    </span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; font-weight: 600; color: var(--text-secondary, #64748b); font-size: 11px;">
                    📋 12 Reqs
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>→</span>
                    </a>
                </td>
            </tr>            <tr class="control-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 1px 6px; border-radius: 4px;">GOV-007</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/controls/view/GOV-007" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Security Integration into Business &amp; Technology Initiatives</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Establishes processes to embed security,...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">Administrative</div>
                    <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Preventive</div>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-block; padding: 1px 7px; border-radius: 10px; font-size: 9.5px; font-weight: 700; background: #f9731618; color: #f97316; border: 1px solid #f9731640;">High</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 10px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 7px; border-radius: 10px;">
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                        Active
                    </span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; font-weight: 600; color: var(--text-secondary, #64748b); font-size: 11px;">
                    📋 12 Reqs
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>→</span>
                    </a>
                </td>
            </tr>            <tr class="control-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 1px 6px; border-radius: 4px;">GOV-008</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/controls/view/GOV-008" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Enterprise Control Library Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Establishes a centralized, governed libr...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">Administrative + Operational</div>
                    <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Preventive</div>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-block; padding: 1px 7px; border-radius: 10px; font-size: 9.5px; font-weight: 700; background: #f9731618; color: #f97316; border: 1px solid #f9731640;">High</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 10px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 7px; border-radius: 10px;">
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                        Active
                    </span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; font-weight: 600; color: var(--text-secondary, #64748b); font-size: 11px;">
                    📋 12 Reqs
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>→</span>
                    </a>
                </td>
            </tr>
                </tbody>
            </table>
        </div>
            </div>
        </div>

        <div class="tab-panel" id="panel-requirements" role="tabpanel" aria-labelledby="tab-requirements">
            <div class="section-box">
                <div class="section-header">
                    <h2 class="section-title">Compliance Requirements & Audit Crosswalk</h2><span
                        class="section-badge">96 Specific Audit Clauses</span>
                </div>
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 20px;">The following
                    requirements dictate specific audit evidence criteria and testing steps mapped directly under the
                    controls of this domain.</p>
                        <div class="ucl-table-container virtual-scroll-container" style="width: 100%; max-height: 480px; overflow-y: auto; overflow-x: auto; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04)); margin-top: 8px; scroll-behavior: smooth;">
            <table class="ucl-data-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 12px;">
                <thead style="position: sticky; top: 0; z-index: 10; background: var(--bg-subtle, #f8fafc); box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                    <tr style="border-bottom: 1px solid var(--border-light, #e2e8f0);">
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc); white-space: nowrap;">REQUIREMENT ID</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">REQUIREMENT TITLE & DETAILS</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc); white-space: nowrap;">MAPPED CONTROL</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">TYPICAL OWNER</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); text-align: right; background: var(--bg-subtle, #f8fafc); white-space: nowrap;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                                <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R001</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R001" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Framework</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish and mai...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Governance Committee, Board of Directors, Risk Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R001" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R002</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R002" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Charter</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish and mai...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, CEO, Governance Committee, Legal
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R002" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R003</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R003" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Principles</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall define and docume...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Governance Committee, Privacy Officer, Legal, Executive Leadership
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R003" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R004</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R004" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Scope</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall define and mainta...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Governance Committee, Enterprise Architecture, Asset Owners, Business Unit Leaders
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R004" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R005</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R005" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Authority</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish a forma...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, CEO, Legal
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R005" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R006</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R006" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Accountability</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall assign accountabi...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, CEO, Board of Directors, Compliance Committee, Risk Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R006" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R007</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R007" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Decision-Making</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain formal d...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Governance Committee, Risk Committee, Compliance, Legal
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R007" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R008</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R008" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Oversight</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall implement formal...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Board of Directors, Audit Committee, Risk Committee, CISO, Independent Advisors
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R008" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R009</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R009" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Performance</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall measure the effec...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Governance Committee, Board of Directors, Audit Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R009" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R010</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R010" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Review</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall periodically revi...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Internal Audit, Board of Directors, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R010" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R011</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R011" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Reporting</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall provide timely an...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Executive Leadership, Audit Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R011" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-001-R012</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-001-R012" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Continuous Improvement</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall drive ongoing enh...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-001" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-001</span>
                        <span>Information Security Governanc...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Governance Committee, Internal Audit, Risk Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-001-R012" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R001</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R001" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Establishment</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish a forma...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, CEO, Board of Directors, Legal, Compliance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R001" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R002</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R002" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Purpose</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The Information Security Charter shall c...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, CEO, Board of Directors, Communications
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R002" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R003</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R003" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Scope</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The Information Security Charter shall d...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, CEO, Legal, Business Unit Leaders
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R003" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R004</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R004" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Authority</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The Information Security Charter shall a...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, CEO, Legal
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R004" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R005</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R005" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Governance Mandate</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The Information Security Charter shall d...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Governance Committee, Risk Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R005" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R006</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R006" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Executive Sponsorship</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The Information Security Charter shall b...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CEO, CISO, Board of Directors
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R006" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R007</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R007" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Approval</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The Information Security Charter shall b...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Board of Directors, CEO, CISO
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R007" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R008</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R008" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Communication</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall communicate the I...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Communications, HR, Legal, Compliance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R008" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R009</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R009" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Accessibility</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall ensure the Inform...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, IT Operations, Legal, Compliance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R009" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R010</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R010" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Review</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall periodically revi...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Legal, Compliance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R010" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R011</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R011" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Maintenance</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain the Info...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Legal, Compliance, Board of Directors
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R011" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-002-R012</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-002-R012" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Charter Alignment</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall ensure the Inform...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-002" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-002</span>
                        <span>Security Charter</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Legal, Corporate Governance, Board of Directors
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-002-R012" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R001</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R001" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Establishment</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish formal...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Executive Leadership, Board of Directors, Business Unit Leaders
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R001" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R002</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R002" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Charter</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall develop and maint...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Committee Chair, CISO, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R002" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R003</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R003" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Scope</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The charter for each governance committe...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Committee Chair, CISO, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R003" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R004</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R004" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Membership</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall define and docume...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Governance Committee, Human Resources
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R004" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R005</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R005" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Roles and Authority</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall clearly define th...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Committee Chair, CISO, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R005" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R006</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R006" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Meeting Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish effecti...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Committee Chair, Committee Secretary, CISO
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R006" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R007</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R007" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Decision Making</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain formal d...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Committee Chair, Committee Secretary, CISO
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R007" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R008</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R008" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Reporting</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall ensure each gover...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Committee Secretary, Report Owners
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R008" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R009</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R009" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Escalation</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish escalat...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Committee Chair, CISO, Executive Leadership, Board of Directors
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R009" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R010</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R010" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Performance Review</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall conduct periodic...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Governance Committee, Internal Audit, CISO
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R010" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R011</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R011" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Records Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain records...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Committee Secretary, Records Management, Legal, CISO
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R011" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-003-R012</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-003-R012" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Committee Continuous Improvement</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall drive ongoing enh...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-003" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-003</span>
                        <span>Governance Committees</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Committee Chair, CISO, Internal Audit
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-003-R012" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R001</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R001" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Executive Oversight Framework</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish an exec...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Board of Directors, CEO, CISO, Audit Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R001" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R002</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R002" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Board Oversight Responsibilities</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall define and docume...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Board of Directors, CEO, CISO, Corporate Governance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R002" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R003</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R003" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Executive Management Oversight</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall define and docume...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CEO, CISO, Executive Leadership, Audit Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R003" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R004</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R004" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Review Meetings</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall conduct regular g...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    Board of Directors, CEO, CISO, Audit Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R004" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R005</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R005" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Executive Reporting Framework</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish an exec...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Executive Leadership, Audit Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R005" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R006</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R006" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Reporting Content and Information Quality</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall define content re...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Executive Leadership
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R006" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R007</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R007" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Reporting Frequency and Timeliness</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish reporti...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Executive Leadership
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R007" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R008</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R008" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Performance Reporting</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall provide executive...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Executive Leadership, Internal Audit
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R008" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R009</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R009" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Strategic Risk and Issue Reporting</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall provide executive...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Risk Committee, Executive Leadership
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R009" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R010</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R010" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Executive Decision Support</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall provide executive...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Executive Leadership, Internal Audit
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R010" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R011</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R011" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Oversight Records and Action Tracking</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain comprehe...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Governance Committee, Records Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R011" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-004-R012</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-004-R012" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Oversight and Reporting Continuous Improvement</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall drive ongoing enh...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-004" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-004</span>
                        <span>Executive Oversight &amp; Reportin...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Board of Directors, Executive Leadership
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-004-R012" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R001</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R001" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Management Framework</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish a progr...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Project Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R001" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R002</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R002" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Planning</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall conduct formal pl...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Project Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R002" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R003</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R003" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Execution</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall execute the infor...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Project Managers
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R003" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R004</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R004" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Resource Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall manage resources...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Human Resources
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R004" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R005</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R005" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Budget Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall manage the inform...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Finance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R005" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R006</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R006" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Staffing</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall ensure the inform...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Human Resources
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R006" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R007</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R007" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Prioritization</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain prioriti...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Risk Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R007" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R008</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R008" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Coordination</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain coordina...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Business Unit Leaders
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R008" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R009</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R009" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Dependency Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain dependen...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Project Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R009" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R010</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R010" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Performance Monitoring</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall monitor the perfo...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Performance Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R010" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R011</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R011" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Review</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall conduct periodic...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Internal Audit
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R011" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-005-R012</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-005-R012" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Program Continuous Improvement</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall drive ongoing enh...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-005" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-005</span>
                        <span>Information Security Program M...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Security Teams
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-005-R012" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R001</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R001" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Framework</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish a conti...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Quality Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R001" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R002</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R002" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Identification</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall systematically id...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Security Teams
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R002" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R003</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R003" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Prioritization</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall prioritize improv...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Risk Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R003" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R004</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R004" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Planning</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall develop formal pl...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Project Managers
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R004" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R005</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R005" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Approval</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish approva...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R005" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R006</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R006" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Implementation</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall implement approve...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Project Managers
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R006" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R007</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R007" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Monitoring</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall monitor improveme...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Project Managers
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R007" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R008</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R008" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Measurement</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall measure the effec...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Performance Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R008" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R009</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R009" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Lessons Learned Integration</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall capture and integ...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Incident Response, Audit
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R009" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R010</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R010" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Reporting</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall report on improve...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R010" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R011</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R011" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Review</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall conduct periodic...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Quality Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R011" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-006-R012</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-006-R012" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Improvement Effectiveness</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall evaluate the over...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-006" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-006</span>
                        <span>Security Program Continuous Im...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Program Manager, Internal Audit
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-006-R012" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R001</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R001" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Integration Framework</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish a frame...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, IT Leadership, Project Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R001" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R002</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R002" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Business Initiative Integration</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall ensure informatio...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Business Leaders, Security Architects, Project Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R002" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R003</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R003" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Technology Initiative Integration</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall ensure informatio...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, IT Leadership, Security Architects, Project Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R003" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R004</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R004" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Security Participation</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall ensure the inform...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, IT Leadership, Project Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R004" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R005</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R005" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Planning Integration</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall ensure informatio...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, IT Leadership, Project Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R005" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R006</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R006" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Governance Review</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall conduct governanc...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R006" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R007</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R007" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Security Acceptance Criteria</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall define and apply...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, IT Leadership, Quality Assurance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R007" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R008</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R008" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Integration Monitoring</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall monitor the integ...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, Project Management
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R008" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R009</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R009" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Executive Escalation</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish escalat...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R009" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R010</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R010" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Integration Reporting</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall report on the int...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R010" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R011</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R011" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Integration Review</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall conduct periodic...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, IT Leadership
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R011" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-007-R012</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-007-R012" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Integration Continuous Improvement</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall drive ongoing enh...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-007" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-007</span>
                        <span>Security Integration into Busi...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Security Architects, IT Leadership
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-007-R012" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R001</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R001" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Library Framework</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish a frame...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance, Security Architects
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R001" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R002</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R002" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Definition Standards</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish definit...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance, Security Architects
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R002" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R003</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R003" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Classification</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall establish classif...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance, Security Architects
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R003" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R004</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R004" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Ownership</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall assign explicit o...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R004" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R005</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R005" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Change Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain change g...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R005" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R006</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R006" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Lifecycle Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain lifecycl...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R006" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R007</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R007" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Relationships</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain relation...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R007" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R008</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R008" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Reuse</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall promote the reuse...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R008" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R009</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R009" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Quality Management</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall maintain quality...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance, Quality Assurance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R009" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R010</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R010" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Library Review</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall conduct periodic...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance, Internal Audit
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R010" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R011</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R011" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Library Reporting</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall report on the ent...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance, Governance Committee
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R011" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">GOV-008-R012</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="http://localhost/requirements/view/GOV-008-R012" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">Control Library Continuous Improvement</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">The organization shall drive ongoing enh...</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="http://localhost/controls/view/GOV-008" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">GOV-008</span>
                        <span>Enterprise Control Library Man...</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    CISO, Control Owners, Compliance
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="http://localhost/requirements/view/GOV-008-R012" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>
                </tbody>
            </table>
        </div>
            </div>
        </div>

        <div class="tab-panel" id="panel-frameworks" role="tabpanel" aria-labelledby="tab-frameworks">
            <div class="section-box">
                <div class="section-header">
                    <h2 class="section-title">Cross-Mapped Regulatory Frameworks</h2><span
                        class="section-badge">Harmonized Control Mappings</span>
                </div>
                <div>        <div class="ucl-table-container virtual-scroll-container" style="width: 100%; max-height: 480px; overflow-y: auto; overflow-x: auto; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04)); margin-top: 8px; scroll-behavior: smooth;">
            <table class="ucl-data-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 12px;">
                <thead style="position: sticky; top: 0; z-index: 10; background: var(--bg-subtle, #f8fafc); box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                    <tr style="border-bottom: 1px solid var(--border-light, #e2e8f0);">
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">Framework Code</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">Framework Name & Description</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">Family / Category</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">Version</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); text-align: right; background: var(--bg-subtle, #f8fafc);">Action</th>
                    </tr>
                </thead>
                <tbody>
                                    <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-emerald, #059669); background: var(--brand-emerald-light, #ecfdf5); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 6px; border-radius: 4px;">COBIT2019</span>
                    </td>
                    <td style="padding: 7px 12px;">
                        <a href="http://localhost/frameworks/cobit" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-emerald, #059669)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">COBIT</a>
                        <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Harmonized framework mapped under ASPIA...</span>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">COBIT</div>
                        <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Governance Framework</div>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="display: inline-block; padding: 1px 7px; border-radius: 8px; font-size: 10px; font-weight: 600; background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); color: var(--text-muted, #64748b);">v2019</span>
                    </td>
                    <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                        <a href="http://localhost/frameworks/cobit" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-emerald-light, #ecfdf5); border: 1px solid rgba(5, 150, 105, 0.3); border-radius: 5px; color: var(--brand-emerald, #059669); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                            <span>View</span>
                            <span>→</span>
                        </a>
                    </td>
                </tr>                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--text-muted, #94a3b8); background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); padding: 1px 6px; border-radius: 4px;">MAPPED</span>
                    </td>
                    <td style="padding: 7px 12px;">
                        <span style="font-weight: 700; color: var(--text-title, #0f172a); display: block; line-height: 1.25; font-size: 12px;">ISO 37000</span>
                        <span style="font-size: 10px; color: var(--text-muted, #94a3b8); display: block; margin-top: 1px;">Crosswalk regulatory baseline mapped under ASPIA UCL.</span>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Standard</td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Baseline</td>
                    <td style="padding: 7px 12px; text-align: right; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">—</td>
                </tr>                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--text-muted, #94a3b8); background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); padding: 1px 6px; border-radius: 4px;">MAPPED</span>
                    </td>
                    <td style="padding: 7px 12px;">
                        <span style="font-weight: 700; color: var(--text-title, #0f172a); display: block; line-height: 1.25; font-size: 12px;">COSO</span>
                        <span style="font-size: 10px; color: var(--text-muted, #94a3b8); display: block; margin-top: 1px;">Crosswalk regulatory baseline mapped under ASPIA UCL.</span>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Standard</td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Baseline</td>
                    <td style="padding: 7px 12px; text-align: right; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">—</td>
                </tr>                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-emerald, #059669); background: var(--brand-emerald-light, #ecfdf5); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 6px; border-radius: 4px;">NIST-CSF</span>
                    </td>
                    <td style="padding: 7px 12px;">
                        <a href="http://localhost/frameworks/nist-cybersecurity-framework-csf" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-emerald, #059669)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">NIST CSF (Govern)</a>
                        <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">Harmonized framework mapped under ASPIA...</span>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">NIST</div>
                        <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">Framework</div>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="display: inline-block; padding: 1px 7px; border-radius: 8px; font-size: 10px; font-weight: 600; background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); color: var(--text-muted, #64748b);">v2</span>
                    </td>
                    <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                        <a href="http://localhost/frameworks/nist-cybersecurity-framework-csf" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-emerald-light, #ecfdf5); border: 1px solid rgba(5, 150, 105, 0.3); border-radius: 5px; color: var(--brand-emerald, #059669); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                            <span>View</span>
                            <span>→</span>
                        </a>
                    </td>
                </tr>                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--text-muted, #94a3b8); background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); padding: 1px 6px; border-radius: 4px;">MAPPED</span>
                    </td>
                    <td style="padding: 7px 12px;">
                        <span style="font-weight: 700; color: var(--text-title, #0f172a); display: block; line-height: 1.25; font-size: 12px;">ISACA Governance Framework</span>
                        <span style="font-size: 10px; color: var(--text-muted, #94a3b8); display: block; margin-top: 1px;">Crosswalk regulatory baseline mapped under ASPIA UCL.</span>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Standard</td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Baseline</td>
                    <td style="padding: 7px 12px; text-align: right; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">—</td>
                </tr>                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--text-muted, #94a3b8); background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); padding: 1px 6px; border-radius: 4px;">MAPPED</span>
                    </td>
                    <td style="padding: 7px 12px;">
                        <span style="font-weight: 700; color: var(--text-title, #0f172a); display: block; line-height: 1.25; font-size: 12px;">ISO 38500</span>
                        <span style="font-size: 10px; color: var(--text-muted, #94a3b8); display: block; margin-top: 1px;">Crosswalk regulatory baseline mapped under ASPIA UCL.</span>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Standard</td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Baseline</td>
                    <td style="padding: 7px 12px; text-align: right; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">—</td>
                </tr>                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--text-muted, #94a3b8); background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); padding: 1px 6px; border-radius: 4px;">MAPPED</span>
                    </td>
                    <td style="padding: 7px 12px;">
                        <span style="font-weight: 700; color: var(--text-title, #0f172a); display: block; line-height: 1.25; font-size: 12px;">ISO/IEC 27014 (Governance of Information Security)</span>
                        <span style="font-size: 10px; color: var(--text-muted, #94a3b8); display: block; margin-top: 1px;">Crosswalk regulatory baseline mapped under ASPIA UCL.</span>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Standard</td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Baseline</td>
                    <td style="padding: 7px 12px; text-align: right; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">—</td>
                </tr>
                </tbody>
            </table>
        </div></div>
            </div>
        </div>
    </main>

    <div class="toast" id="toastMessage" role="status" aria-live="polite"><span>✓</span> <span id="toastText">Copied to
            clipboard</span></div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const htmlEl = document.documentElement;
            const btnThemeLight = document.getElementById('btnThemeLight');
            const btnThemeDark = document.getElementById('btnThemeDark');
            const savedTheme = localStorage.getItem('aspia_theme') || 'light';
            setTheme(savedTheme);
            btnThemeLight.addEventListener('click', () => setTheme('light'));
            btnThemeDark.addEventListener('click', () => setTheme('dark'));
            function setTheme(theme) {
                htmlEl.setAttribute('data-theme', theme);
                localStorage.setItem('aspia_theme', theme);
                if (theme === 'light') {
                    btnThemeLight.classList.add('active'); btnThemeLight.setAttribute('aria-pressed', 'true');
                    btnThemeDark.classList.remove('active'); btnThemeDark.setAttribute('aria-pressed', 'false');
                } else {
                    btnThemeDark.classList.add('active'); btnThemeDark.setAttribute('aria-pressed', 'true');
                    btnThemeLight.classList.remove('active'); btnThemeLight.setAttribute('aria-pressed', 'false');
                }
            }

            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabPanels = document.querySelectorAll('.tab-panel');
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    tabButtons.forEach(btn => { btn.classList.remove('active'); btn.setAttribute('aria-selected', 'false'); });
                    tabPanels.forEach(panel => panel.classList.remove('active'));
                    button.classList.add('active'); button.setAttribute('aria-selected', 'true');
                    const targetId = button.getAttribute('data-target');
                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) targetPanel.classList.add('active');
                });
            });

            const searchInput = document.getElementById('globalHeroSearchInput');
            const clearSearchBtn = document.getElementById('clearHeroSearchBtn');
            if (searchInput) {
                document.addEventListener('keydown', (e) => {
                    if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); searchInput.focus(); }
                    else if (e.key === '/' && document.activeElement !== searchInput) { e.preventDefault(); searchInput.focus(); }
                    else if (e.key === 'Escape' && document.activeElement === searchInput) { searchInput.value = ''; filterAllItems(''); searchInput.blur(); }
                });
                searchInput.addEventListener('input', (e) => filterAllItems(e.target.value.trim().toLowerCase()));
                if (clearSearchBtn) {
                    clearSearchBtn.addEventListener('click', () => { searchInput.value = ''; filterAllItems(''); searchInput.focus(); });
                }
            }

            // Tab Sections Real-time Filter Search
            const tabSearchInput = document.getElementById('tabSectionSearchInput');
            const tabSearchClear = document.getElementById('tabSectionSearchClear');

            if (tabSearchInput) {
                tabSearchInput.addEventListener('input', (e) => {
                    const query = e.target.value.trim().toLowerCase();
                    if (tabSearchClear) {
                        tabSearchClear.style.display = query.length > 0 ? 'block' : 'none';
                    }

                    ['panel-controls', 'panel-requirements', 'panel-frameworks'].forEach(panelId => {
                        const panel = document.getElementById(panelId);
                        if (!panel) return;
                        const rows = panel.querySelectorAll('table tbody tr');
                        let visibleCount = 0;

                        rows.forEach(row => {
                            if (row.classList.contains('no-search-results-row')) return;
                            const text = row.textContent.toLowerCase();
                            const words = text.split(/\s+/);
                            const isMatch = !query || words.some(w => w.startsWith(query)) || text.includes(query);
                            
                            if (isMatch) {
                                row.style.display = '';
                                visibleCount++;
                            } else {
                                row.style.display = 'none';
                            }
                        });

                        const tbody = panel.querySelector('table tbody');
                        let noMatchRow = panel.querySelector('.no-search-results-row');
                        if (tbody) {
                            if (visibleCount === 0 && rows.length > 0 && query.length > 0) {
                                if (!noMatchRow) {
                                    noMatchRow = document.createElement('tr');
                                    noMatchRow.className = 'no-search-results-row';
                                    const colCount = panel.querySelectorAll('table thead th').length || 5;
                                    noMatchRow.innerHTML = `<td colspan="${colCount}" style="padding: 24px; text-align: center; color: var(--text-muted, #64748b); font-size: 12px; font-weight: 500;">No matching items found for "${e.target.value}".</td>`;
                                    tbody.appendChild(noMatchRow);
                                }
                                noMatchRow.style.display = '';
                            } else if (noMatchRow) {
                                noMatchRow.style.display = 'none';
                            }
                        }
                    });
                });

                if (tabSearchClear) {
                    tabSearchClear.addEventListener('click', () => {
                        tabSearchInput.value = '';
                        tabSearchInput.dispatchEvent(new Event('input'));
                        tabSearchInput.focus();
                    });
                }
            }

            function filterAllItems(query) {
                if (clearSearchBtn) clearSearchBtn.style.display = query ? 'grid' : 'none';

                const dropdownParents = document.querySelectorAll('.main-nav-wrapper .dropdown-parent');
                dropdownParents.forEach(parent => {
                    const cards = parent.querySelectorAll('.dropdown-card');
                    let matchCount = 0;

                    cards.forEach(card => {
                        if (!query) {
                            card.style.display = 'flex';
                            return;
                        }

                        const title = (card.querySelector('.card-title')?.innerText || card.innerText).trim().toLowerCase();
                        const code = (card.querySelector('.card-badge')?.innerText || '').trim().toLowerCase();
                        const sub = (card.querySelector('.card-sub')?.innerText || '').trim().toLowerCase();

                        // Exact title/code match or prefix match from start of title/code
                        const isMatch = (title === query) || (code === query) || (sub === query) ||
                                        title.startsWith(query) || code.startsWith(query);

                        card.style.display = isMatch ? 'flex' : 'none';
                        if (isMatch) {
                            matchCount++;
                        }
                    });

                    if (query && matchCount > 0) {
                        parent.classList.add('search-active');
                    } else {
                        parent.classList.remove('search-active');
                    }
                });
            }
        });

        function copyText(text) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => showToast(`Copied "${text}" to clipboard`)).catch(() => fallbackCopy(text));
            } else { fallbackCopy(text); }
        }
        function fallbackCopy(text) {
            const temp = document.createElement('input'); temp.value = text; document.body.appendChild(temp);
            temp.select(); document.execCommand('copy'); document.body.removeChild(temp);
            showToast(`Copied "${text}"`);
        }
        function showToast(message) {
            const toast = document.getElementById('toastMessage');
            const toastText = document.getElementById('toastText');
            if (toast && toastText) {
                toastText.textContent = message; toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 2600);
            }
        }
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\AspiaUCL\storage\framework\views/ac409b1bc5115da772f8c524b4227a40.blade.php ENDPATH**/ ?>