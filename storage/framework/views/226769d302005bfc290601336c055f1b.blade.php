<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <!-- ========== META SECTION FOR SEO ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Controls & Baseline Safeguards: Meaning, Types, Mappings & Standards Guide | ASPIA UCL</title>
    <meta name="description"
        content="Complete guide to security controls, baseline safeguards, risk management baselines, policy structures, and compliance crosswalks in ASPIA Unified Control Library.">
    <link rel="canonical" href="https://aspiainfotech.com/controls-guide/">
    <meta property="og:title" content="Security Controls & Baseline Safeguards: Meaning, Types, Mappings & Standards Guide">
    <meta property="og:description"
        content="Complete guide to security controls, baseline safeguards, risk management baselines, policy structures, and compliance crosswalks in ASPIA Unified Control Library.">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://aspiainfotech.com/controls-guide/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Security Controls & Baseline Safeguards: Meaning, Types, Mappings & Standards Guide">
    <meta name="twitter:description"
        content="Complete guide to security controls, baseline safeguards, risk management baselines, policy structures, and compliance crosswalks in ASPIA Unified Control Library.">
    <meta name="robots" content="index, follow">

    <!-- Article Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "TechArticle",
        "headline": "Security Controls & Baseline Safeguards: Meaning, Types, Mappings & Standards Guide",
        "description": "Complete guide to security controls, baseline safeguards, risk management baselines, policy structures, and compliance crosswalks in ASPIA Unified Control Library.",
        "author": {"@@type": "Organization", "name": "ASPIA Infotech"},
        "publisher": {"@@type": "Organization", "name": "ASPIA Infotech Pvt. Ltd."},
        "datePublished": "2026-09-08",
        "dateModified": "2026-09-08"
    }
    </script>

    <!-- FAQ Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "FAQPage",
        "mainEntity": [
            {"@@type":"Question","name":"What is a security control in ASPIA UCL?","acceptedAnswer":{"@@type":"Answer","text":"A security control is a standardized safeguard or policy requirement (such as Access Control or Cryptographic Protection) that protects organizational data and satisfies compliance requirements across multiple frameworks."}},
            {"@@type":"Question","name":"How do unified controls reduce audit burden?","acceptedAnswer":{"@@type":"Answer","text":"Unified controls map to overlapping requirements across ISO 27001, NIST CSF, PCI DSS, SOC 2, and GDPR. By testing a single control once, organizations validate compliance for multiple regulations simultaneously."}},
            {"@@type":"Question","name":"What is the difference between preventive and detective controls?","acceptedAnswer":{"@@type":"Answer","text":"Preventive controls block unauthorized actions before they occur (e.g., MFA or firewalls), while detective controls monitor and alert on unauthorized activity that has taken place (e.g., SIEM logging or IDS)."}},
            {"@@type":"Question","name":"How are controls categorized in ASPIA UCL?","acceptedAnswer":{"@@type":"Answer","text":"Controls in ASPIA UCL are categorized by Control Domain (e.g., Access Control, Asset Management) and Control Type (Preventive, Detective, Corrective, Administrative, Technical)."}},
            {"@@type":"Question","name":"Can I add custom controls to ASPIA UCL?","acceptedAnswer":{"@@type":"Answer","text":"Yes, ASPIA UCL supports custom internal controls and policies while allowing seamless crosswalk mapping to standard regulatory frameworks."}}
        ]
    }
    </script>

    <!-- Google Fonts & Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&family=JetBrains+Mono:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --aspia-infotech-font-primary: "Inter", sans-serif;
            --aspia-infotech-font-mono: "JetBrains Mono", "SFMono-Regular", Consolas, monospace;

            /* Light Theme Color Tokens */
            --bg-body: #f8fafd;
            --bg-card: #ffffff;
            --text-main: #334155;
            --text-heading: #0D1735;
            --border-color: #e2e8f0;
            --brand-cyan: #16C4F4;
            --brand-navy: #0D1735;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 18px;
            --radius-xl: 24px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--aspia-infotech-font-primary);
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Header & Footer styles managed by shared Blade partials */

        /* SMOOTH GLOBAL COLOR TRANSITIONS */
        body,
        .page-wrapper,
        .section-light,
        .section-alt,
        .toc-card,
        .feature-card,
        .catalog-toolbar,
        .framework-card,
        .custom-table,
        .workflow-box,
        .checklist-item,
        .faq-item,
        .footer-strip {
            transition: background-color 0.35s ease, color 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
        }

        /* FULL WIDTH SECTION BANDS (HOMEPAGE MATCHING ALTERNATING SCHEME) */
        .section-light {
            background-color: #ffffff;
            padding: 5rem 0;
            border-bottom: 1px solid rgba(226, 232, 240, 0.7);
        }

        .section-alt {
            background-color: #f4f7fb;
            padding: 5rem 0;
            border-bottom: 1px solid rgba(226, 232, 240, 0.7);
        }

        .section-container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
            box-sizing: border-box;
        }

        /* MAIN CONTAINER (Legacy Fallback) */
        .page-wrapper {
            max-width: 1240px;
            margin: 0 auto;
            padding: 2.5rem 24px;
            width: 100%;
            box-sizing: border-box;
        }

        /* HERO STYLES (FULL VH SCREEN - ISOMETRIC PNG DESIGN) */
        .hero-section {
            background: #0D1735;
            color: #ffffff;
            width: 100%;
            min-height: calc(100vh - 76px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3.5rem 0;
            margin-bottom: 0;
            box-sizing: border-box;
            position: relative;
        }

        .hero-container {
            max-width: 1240px;
            width: 100%;
            margin: 0 auto;
            padding: 0 24px;
            box-sizing: border-box;
            display: grid;
            grid-template-columns: 1.12fr 0.88fr;
            gap: 2.5rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .hero-eyebrow {
            font-size: 0.82rem;
            font-weight: 700;
            color: #16C4F4;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .hero-title {
            font-size: clamp(2.4rem, 4.2vw, 3.8rem);
            font-weight: 800;
            line-height: 1.12;
            color: #ffffff;
            margin: 0;
            letter-spacing: -0.02em;
        }

        .hero-title .highlight {
            color: #16C4F4;
            display: block;
        }

        .hero-subtitle {
            font-size: 1.05rem;
            color: #9ab0cc;
            line-height: 1.65;
            max-width: 560px;
            margin: 0;
        }

        /* Feature Cards Grid (4 Inline Cards) */
        .hero-features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.75rem;
            margin-top: 0.25rem;
            margin-bottom: 0.25rem;
        }

        .hero-feature-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(22, 196, 244, 0.22);
            border-radius: 12px;
            padding: 0.7rem 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            backdrop-filter: blur(10px);
        }

        .hero-feature-icon {
            width: 36px;
            height: 36px;
            background: rgba(22, 196, 244, 0.12);
            border: 1px solid rgba(22, 196, 244, 0.28);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #16C4F4;
            font-size: 0.95rem;
            flex-shrink: 0;
        }

        .hero-feature-text {
            display: flex;
            flex-direction: column;
            line-height: 1.25;
        }

        .hero-feature-title {
            font-size: 0.78rem;
            font-weight: 700;
            color: #ffffff;
            white-space: nowrap;
        }

        .hero-feature-sub {
            font-size: 0.7rem;
            color: #9ab0cc;
            white-space: nowrap;
        }

        /* Meta Bar */
        .hero-meta-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1.25rem;
            font-size: 0.9rem;
            color: #cbd5e1;
            margin-top: 0.25rem;
        }

        .hero-tag-pill {
            background: #16C4F4;
            color: #0D1735;
            padding: 0.35rem 1.25rem;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            box-shadow: 0 4px 16px rgba(22, 196, 244, 0.35);
        }

        /* Right Column: Isometric Graphic Container */
        .hero-visual-wrapper {
            position: relative;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-isometric-img {
            width: 100%;
            max-width: 560px;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 16px 36px rgba(0, 0, 0, 0.3));
        }

        @media (max-width: 1100px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .hero-features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .hero-features-grid {
                grid-template-columns: 1fr;
            }
        }

        /* TOC STYLES */
        .toc-card {
            background: #f8fafd;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(22, 196, 244, 0.15);
        }

        .toc-title {
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 0.75rem;
            color: var(--text-heading);
        }

        .toc-grid {
            margin-bottom: 0;
            columns: 2;
            column-gap: 2rem;
            font-size: 0.9rem;
            list-style: decimal;
            padding-left: 1.4rem;
        }

        .toc-grid li a {
            color: var(--brand-cyan);
            text-decoration: none;
        }

        .toc-grid li a:hover {
            text-decoration: underline;
        }

        /* UN-BORDERED CALLOUT BLOCK */
        .callout-box {
            background: transparent;
            border: none;
            border-radius: 0;
            padding: 0;
            margin: 3rem 0 5rem 0;
            box-shadow: none;
        }

        .callout-title {
            margin: 0 0 0.4rem 0;
            font-weight: 800;
            font-size: 1.05rem;
            color: #16C4F4;
        }

        .callout-text {
            margin: 0;
            font-size: 1rem;
            line-height: 1.7;
            color: var(--text-main);
        }

        /* SECTION HEADINGS (CENTERED BADGE & TITLE UI) */
        .section-header-block {
            text-align: center;
            margin: 3.5rem 0 2.25rem 0;
        }

        .section-badge {
            display: inline-block;
            background: #e8f0fe;
            color: #16C4F4;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 5px 18px;
            border-radius: 20px;
            margin-bottom: 0.6rem;
        }

        .section-heading {
            font-size: clamp(1.8rem, 3.5vw, 2.4rem);
            font-weight: 800;
            color: var(--text-heading);
            margin: 0 0 0.5rem 0;
            line-height: 1.25;
            text-align: center;
            border-left: none;
            padding-left: 0;
        }

        .section-subtitle {
            font-size: 1rem;
            color: var(--text-main);
            opacity: 0.85;
            max-width: 720px;
            margin: 0 auto 1.5rem auto;
            text-align: center;
            line-height: 1.6;
        }

        body.dark-mode .section-badge,
        [data-theme="dark"] .section-badge {
            background: rgba(22, 196, 244, 0.15) !important;
            color: #16C4F4 !important;
        }

        /* GRID CARDS */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
            margin: 2.25rem 0;
        }

        .feature-card {
            background: #ffffff;
            padding: 1.25rem;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            border-top: 3px solid #02CCFF;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.03);
        }

        .feature-card strong {
            color: var(--text-heading);
            font-size: 1.05rem;
            display: block;
            margin-bottom: 0.4rem;
        }

        /* SEARCH & CATALOG TOOLBAR */
        .catalog-toolbar {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.03);
        }

        .search-input-group {
            position: relative;
            flex: 1;
            min-width: 280px;
        }

        .search-input-group i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .search-input-group input {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 2.8rem;
            border-radius: 30px;
            border: 1px solid var(--border-color);
            background: var(--bg-body);
            color: var(--text-main);
            font-size: 0.95rem;
            outline: none;
        }

        .filter-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid var(--border-color);
            background: var(--bg-body);
            color: var(--text-main);
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: #16C4F4;
            border-color: #16C4F4;
            color: #0D1735;
        }

        /* DYNAMIC CONTROLS CATALOG LAYOUT */
        .frameworks-cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 1.25rem;
            margin: 1.5rem 0 3rem 0;
            transition: all 0.3s ease;
        }

        /* CATALOG LIST WRAPPER & PAGINATION STYLES */
        .catalog-list-wrapper {
            margin-bottom: 1rem;
        }

        .pagination-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 0.8rem 1.25rem;
            margin-bottom: 2rem;
            font-size: 0.88rem;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.02);
        }

        .pagination-info strong {
            color: var(--text-heading);
            font-weight: 700;
        }

        .pagination-buttons {
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .page-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            padding: 0 0.6rem;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-main);
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
        }

        .page-btn:hover:not(:disabled):not(.active) {
            border-color: #16C4F4;
            color: #16C4F4;
            background: rgba(22, 196, 244, 0.08);
        }

        .page-btn.active {
            background: #16C4F4;
            color: #0D1735;
            border-color: #16C4F4;
            font-weight: 800;
        }

        .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        /* CLASSIC & PROFESSIONAL COMPACT LIST FORMAT */
        .list-table-header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.45rem 1rem;
            background: rgba(13, 23, 53, 0.04);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            margin: 1.2rem 0 0.4rem 0;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
        }

        .col-hdr-id {
            min-width: 125px;
        }

        .col-hdr-info {
            flex: 1;
            margin-left: 0.5rem;
        }

        .col-hdr-scope {
            min-width: 220px;
            text-align: center;
        }

        .col-hdr-action {
            min-width: 130px;
            text-align: right;
        }

        .frameworks-cards-grid.list-layout-view {
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
            margin-top: 0.3rem;
        }

        .frameworks-cards-grid.list-layout-view .framework-card {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-left: 3px solid transparent;
            gap: 0.8rem;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.02);
            transition: all 0.2s ease;
        }

        .frameworks-cards-grid.list-layout-view .framework-card:hover {
            transform: translateX(3px);
            border-left-color: #16C4F4;
            border-color: #16C4F4;
            box-shadow: 0 4px 15px rgba(22, 196, 244, 0.1);
        }

        .card-left-column {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 0.35rem;
            min-width: 125px;
            flex-shrink: 0;
        }

        .card-left-column .badge-fw-id {
            font-size: 0.68rem;
            padding: 0 0.2rem 0 0;
            background: transparent;
            border: none;
        }

        .card-left-column .badge-code {
            font-size: 0.65rem;
            padding: 0.15rem 0.4rem;
            border-radius: 4px;
        }

        .card-center-column {
            flex: 1;
            min-width: 0;
            margin-left: 0.5rem;
        }

        .title-category-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.1rem;
            flex-wrap: wrap;
        }

        .title-category-row .framework-title {
            font-size: 0.92rem;
            font-weight: 700;
            margin: 0;
            color: var(--text-heading);
            line-height: 1.25;
        }

        .title-category-row .framework-title a {
            color: var(--text-heading);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .title-category-row .framework-title a:hover {
            color: #16C4F4;
        }

        .publisher-line {
            font-size: 0.74rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        .card-scope-column {
            flex-shrink: 0;
            min-width: 220px;
        }

        .scope-badges-strip {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            background: var(--bg-body);
            padding: 0.25rem 0.65rem;
            border-radius: 6px;
            border: 1px solid var(--border-color);
        }

        .scope-pill {
            font-size: 0.7rem;
            color: #64748b;
            font-weight: 600;
        }

        .scope-pill strong.num {
            color: var(--text-heading);
            font-size: 0.78rem;
            font-weight: 800;
        }

        .card-action-column {
            flex-shrink: 0;
            min-width: 130px;
            text-align: right;
        }

        .btn-explore-framework {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            background: rgba(22, 196, 244, 0.12);
            color: #16C4F4;
            border: 1px solid rgba(22, 196, 244, 0.3);
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-explore-framework:hover {
            background: #16C4F4;
            color: #0D1735;
            box-shadow: 0 3px 10px rgba(22, 196, 244, 0.25);
            text-decoration: none;
        }

        @media (max-width: 992px) {
            .list-table-header-bar {
                display: none !important;
            }

            .frameworks-cards-grid.list-layout-view .framework-card {
                flex-direction: column;
                align-items: stretch;
                gap: 0.6rem;
                padding: 0.8rem;
            }

            .card-left-column {
                flex-direction: row;
                min-width: auto;
            }

            .card-center-column {
                margin-left: 0;
            }

            .card-scope-column {
                min-width: auto;
            }

            .scope-badges-strip {
                justify-content: space-around;
            }

            .card-action-column {
                min-width: auto;
                text-align: stretch;
            }

            .btn-explore-framework {
                width: 100%;
                justify-content: center;
            }
        }

        .framework-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 1.8rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s, border-color 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.04);
        }

        .framework-card:hover {
            transform: translateY(-4px);
            border-color: #16C4F4;
            box-shadow: 0 12px 30px -4px rgba(22, 196, 244, 0.15);
        }

        /* TABLES */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin: 2.5rem 0;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .custom-table th {
            background: #0D1735;
            color: white;
            padding: 0.8rem 1rem;
            text-align: left;
            font-size: 0.9rem;
        }

        .custom-table td {
            padding: 0.8rem 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
        }

        .custom-table tr:nth-child(even) {
            background: rgba(22, 196, 244, 0.03);
        }

        /* WORKFLOW FLOWCHART */
        .workflow-box {
            background: #ffffff;
            border-radius: 16px;
            padding: 2.25rem 1.75rem;
            margin: 2.75rem 0;
            border: 1px solid rgba(22, 196, 244, 0.2);
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
        }

        .workflow-flow {
            max-width: 500px;
            margin: 0 auto;
            text-align: center;
            font-size: 0.9rem;
        }

        .flow-step-dark {
            background: #0D1735;
            color: #fff;
            padding: 0.4rem 1.2rem;
            border-radius: 40px;
            display: inline-block;
            margin: 0.3rem;
            font-weight: 600;
        }

        .flow-step-cyan {
            background: #16C4F4;
            color: #0D1735;
            padding: 0.4rem 1.2rem;
            border-radius: 40px;
            display: inline-block;
            margin: 0.3rem;
            font-weight: 600;
        }

        .flow-arrow {
            color: #94a3b8;
            font-weight: 700;
        }

        /* CHECKLIST GRID */
        .checklist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
            margin: 2.25rem 0;
        }

        .checklist-item {
            background: #ffffff;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            box-shadow: 0 2px 6px rgba(15, 23, 42, 0.02);
        }

        /* ============================================================
           FAQ - CARD ACCORDION THEME (Homepage Matching UI)
           ============================================================ */
        .faq-card-container {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04), 0 2px 6px rgba(15, 23, 42, 0.02);
            width: 100%;
            max-width: 100%;
            margin: 2.5rem 0 1rem 0;
            padding: 36px 48px;
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .faq-list {
            max-width: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }

        .faq-item {
            border-bottom: 1px solid #eef2f6;
            padding: 0;
            margin-bottom: 0;
            border-radius: 0;
            overflow: visible;
            background: transparent;
            border-top: none;
            border-left: none;
            border-right: none;
            transition: background-color 0.2s ease;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-item .q {
            font-weight: 700;
            font-size: 1.05rem;
            color: #0d1735;
            display: flex;
            align-items: center;
            gap: 16px;
            justify-content: space-between;
            padding: 22px 0;
            cursor: pointer;
            user-select: none;
            transition: color 0.2s ease;
        }

        .faq-item .q:hover .q-text {
            color: #00a8e8;
        }

        .faq-item .q .q-text {
            line-height: 1.45;
            flex: 1;
        }

        .faq-item .q .faq-toggle-icon {
            color: #00c2ff;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .faq-item .q .faq-toggle-icon svg {
            stroke: #00c2ff;
            transition: stroke 0.2s ease;
        }

        .faq-item.active .q .faq-toggle-icon {
            transform: rotate(45deg);
        }

        /* Smooth Height Transition with CSS Grid */
        .faq-item .a-wrapper {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .faq-item.active .a-wrapper {
            grid-template-rows: 1fr;
        }

        .faq-item .a-inner {
            overflow: hidden;
        }

        .faq-item .a {
            font-size: 0.95rem;
            color: #475569;
            line-height: 1.65;
            padding-bottom: 22px;
            padding-top: 2px;
            margin-top: 0;
            padding-left: 0;
            display: block;
            opacity: 0;
            transform: translateY(-6px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .faq-item.active .a {
            opacity: 1;
            transform: translateY(0);
        }

        .faq-item .a strong {
            color: #0d1735;
            font-weight: 700;
        }

        /* FAQ Accordion Dark Mode */
        body.dark-mode .faq-card-container {
            background: #1e293b !important;
            border-color: #334155 !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3) !important;
        }

        body.dark-mode .faq-item {
            border-bottom-color: #334155 !important;
        }

        body.dark-mode .faq-item .q .q-text {
            color: #ffffff !important;
        }

        body.dark-mode .faq-item .q:hover .q-text {
            color: #38bdf8 !important;
        }

        body.dark-mode .faq-item .q .faq-toggle-icon svg {
            stroke: #38bdf8 !important;
        }

        body.dark-mode .faq-item .a {
            color: #cbd5e1 !important;
        }

        body.dark-mode .faq-item .a strong {
            color: #38bdf8 !important;
        }

        /* Section Bands Dark Mode */
        body.dark-mode .section-light {
            background-color: #0b1329 !important;
            border-bottom-color: rgba(255, 255, 255, 0.05) !important;
        }

        body.dark-mode .section-alt {
            background-color: #0f172a !important;
            border-bottom-color: rgba(255, 255, 255, 0.05) !important;
        }

        @media (max-width: 768px) {
            .faq-card-container {
                padding: 24px 20px;
                border-radius: 18px;
            }

            .faq-item .q {
                font-size: 0.95rem;
                padding: 18px 0;
            }

            .faq-item .a {
                font-size: 0.88rem;
                padding-bottom: 18px;
            }
        }

        /* CTA BANNER */
        .cta-banner {
            background: linear-gradient(105deg, #0D1735 0%, #172540 100%);
            border-radius: 32px;
            padding: 3rem 2rem;
            margin: 3rem 0;
            color: white;
            text-align: center;
            border: 1px solid rgba(22, 196, 244, 0.25);
            box-shadow: 0 12px 40px rgba(13, 23, 53, 0.3);
        }

        .cta-title {
            font-size: 2rem;
            color: #ffffff;
            margin-top: 0;
            font-weight: 700;
            margin-bottom: 0.8rem;
        }

        .cta-desc {
            margin-bottom: 1.8rem;
            color: #D1D5DB;
            max-width: 720px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .btn-cta-primary {
            display: inline-block;
            background: #16C4F4;
            color: #0D1735;
            padding: 0.8rem 2.2rem;
            border-radius: 60px;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.2s;
        }

        .btn-cta-primary:hover {
            transform: scale(1.03);
        }

        .btn-cta-secondary {
            display: inline-block;
            background: transparent;
            color: white;
            padding: 0.8rem 2.2rem;
            border-radius: 60px;
            font-weight: 700;
            text-decoration: none;
            border: 2px solid #16C4F4;
            transition: transform 0.2s;
        }

        .btn-cta-secondary:hover {
            transform: scale(1.03);
        }

        .footer-strip {
            background: #f8fafd;
            border-radius: 20px;
            padding: 1.5rem;
            text-align: center;
            border: 1px solid rgba(22, 196, 244, 0.12);
            font-size: 0.9rem;
            margin-top: 2rem;
        }

        .footer-strip a {
            color: #16C4F4;
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 1024px) {
            .site-nav-header {
                padding: 0.8rem 24px;
            }

            .page-wrapper {
                padding: 2rem 24px;
            }
        }

        @media (max-width: 768px) {
            .site-nav-header {
                padding: 0.8rem 16px;
            }

            .page-wrapper {
                padding: 1.5rem 16px;
            }

            .hero-container {
                padding: 0 16px;
            }

            .toc-grid {
                columns: 1;
            }

            .hero-section {
                padding: 2rem 0;
                min-height: auto;
            }
        }
    </style>
</head>

<body>
    @include('aspiaUcl.partials.header', ['activeTab' => 'controls'])

    <!-- HERO BANNER (ISOMETRIC LOGO DESIGN - FULL VH SCREEN) -->
    <div class="hero-section">
        <div class="hero-container">
            <!-- Left Column: Content -->
            <div class="hero-content">
                <div class="hero-eyebrow">EXPLORE &bull; LEARN &bull; APPLY</div>
                <h1 class="hero-title">
                    Security Controls &amp;
                    <span class="highlight">Baseline Safeguards</span>
                </h1>
                <p class="hero-subtitle">
                    Complete guide to unified security controls, baseline safeguards, risk management baselines, policy structures, and compliance crosswalks in the ASPIA Unified Control Library.
                </p>

                <!-- 4 Feature Cards -->
                <div class="hero-features-grid">
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon">
                            <i class="fas fa-shield-halved"></i>
                        </div>
                        <div class="hero-feature-text">
                            <span class="hero-feature-title">Unified Controls</span>
                            <span class="hero-feature-sub">Baseline Safeguards</span>
                        </div>
                    </div>
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <div class="hero-feature-text">
                            <span class="hero-feature-title">Multi-Framework</span>
                            <span class="hero-feature-sub">Crosswalk Mapping</span>
                        </div>
                    </div>
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon">
                            <i class="fas fa-list-check"></i>
                        </div>
                        <div class="hero-feature-text">
                            <span class="hero-feature-title">Auditable Scope</span>
                            <span class="hero-feature-sub">Evidence Testing</span>
                        </div>
                    </div>
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon">
                            <i class="fas fa-sliders"></i>
                        </div>
                        <div class="hero-feature-text">
                            <span class="hero-feature-title">Risk Mitigation</span>
                            <span class="hero-feature-sub">Governance</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: 3D Isometric PNG Graphic -->
            <div class="hero-visual-wrapper">
                <img src="{{ asset('images/frameworks_hero_graphic.png') }}" alt="Security Controls Isometric Graphic" class="hero-isometric-img">
            </div>
        </div>
    </div>

    <!-- SECTION 1: OVERVIEW & BUSINESS VALUE (LIGHT BAND) -->
    <div class="section-light">
        <div class="section-container">
            <!-- SHORT ANSWER BOX -->
            <div class="callout-box" style="margin-top: 1.25rem;">
                <p class="callout-title">In Simple Terms:</p>
                <p class="callout-text">A security control is a specific policy, technical safeguard, or administrative procedure designed to protect data and mitigate risk. ASPIA UCL consolidates hundreds of overlapping framework requirements into a single unified control baseline—enforcing security controls once across all regulations.</p>
            </div>

            <!-- WHAT ARE CONTROLS -->
            <div class="section-header-block" id="what-are" style="margin-top: 6.5rem;">
                <span class="section-badge">OVERVIEW</span>
                <h2 class="section-heading">What Are Security Controls?</h2>
            </div>
            <p style="line-height: 1.7; margin-bottom: 1.75rem;">Security controls are targeted technical, administrative, and physical safeguards implemented to maintain confidentiality, integrity, and availability (CIA triad) across organizational assets. In modern GRC architecture, controls serve as the actionable link between high-level regulatory mandates (like ISO 27001 or NIST CSF) and day-to-day security operations.</p>
            <p style="line-height: 1.7; margin-bottom: 3.5rem;">Rather than implementing separate procedures for every compliance mandate, unified controls allow organizations to deploy standardized safeguards that fulfill multiple framework requirements simultaneously.</p>

            <!-- WHY USED -->
            <div class="section-header-block" id="why-used" style="margin-top: 6.5rem;">
                <span class="section-badge">BUSINESS VALUE</span>
                <h2 class="section-heading">Why Are Unified Controls Essential in GRC?</h2>
            </div>

            <div class="feature-grid">
                <div class="feature-card" style="border-top-color: #02CCFF;">
                    <strong>1. Eliminates Redundant Effort</strong>
                    <p style="font-size:0.85rem;margin:0;">Consolidates overlapping requirement clauses into single unified controls.</p>
                </div>
                <div class="feature-card" style="border-top-color: #00B8E6;">
                    <strong>2. Standardizes Safeguards</strong>
                    <p style="font-size:0.85rem;margin:0;">Enforces consistent security practices across enterprise infrastructure.</p>
                </div>
                <div class="feature-card" style="border-top-color: #1AD4FF;">
                    <strong>3. Streamlines Audit Testing</strong>
                    <p style="font-size:0.85rem;margin:0;">Evaluates a control once to fulfill multiple compliance audits simultaneously.</p>
                </div>
                <div class="feature-card" style="border-top-color: #33D6FF;">
                    <strong>4. Reduces Operational Risk</strong>
                    <p style="font-size:0.85rem;margin:0;">Maps controls directly to identified threat vectors and regulatory obligations.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2: CONTROLS DIRECTORY CATALOG (ALT BAND) -->
    <div class="section-alt">
        <div class="section-container">
            <!-- CATALOG TOOLBAR & DYNAMIC CARDS -->
            <div class="section-header-block" id="controls-catalog" style="margin-top: 0;">
                <span class="section-badge">CONTROLS DIRECTORY</span>
                <h2 class="section-heading">Explore Integrated Security Controls</h2>
                <p class="section-subtitle" style="color: #64748b; font-size: 0.95rem; margin-top: 0.4rem;">Browse all standardized security controls and safeguards in ASPIA UCL. Filter by search or browse control IDs, domain categories, and mapped requirements.</p>
            </div>

            <div class="catalog-toolbar">
                <div class="search-input-group">
                    <i class="fas fa-search"></i>
                    <input type="text" id="controlSearchInput"
                        placeholder="Search controls by ID, title, domain, category..." onkeyup="filterControls()">
                </div>
            </div>

            <!-- CLASSIC LIST TABLE HEADER STRIP -->
            <div class="list-table-header-bar" id="listTableHeaderBar">
                <div class="col-hdr col-hdr-id">Control ID</div>
                <div class="col-hdr col-hdr-info">Control Title &amp; Governance Scope</div>
                <div class="col-hdr col-hdr-scope">Mapped Requirements &amp; Category</div>
                <div class="col-hdr col-hdr-action">Action</div>
            </div>

            <!-- CATALOG CARDS LIST -->
            <div class="catalog-list-wrapper">
                <div class="frameworks-cards-grid list-layout-view" id="controlsGrid">
                                <div class="framework-card" data-ctrl-id="AIG-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">AIG-001</span>
                    <span class="badge-code">AIG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AIG-001">AI Governance &amp; Oversight</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>AI Governance &amp; Model Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AIG-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-001</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-001">Application Security Program</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="ARC-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">ARC-001</span>
                    <span class="badge-code">ARC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/ARC-001">Security Architecture Framework</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Architecture</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/ARC-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AST-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">AST-001</span>
                    <span class="badge-code">AST</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AST-001">Asset Inventory Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Asset Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AST-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AUD-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">AUD-001</span>
                    <span class="badge-code">AUD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AUD-001">Audit &amp; Assurance Program</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Audit &amp; Assurance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AUD-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="BCM-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">BCM-001</span>
                    <span class="badge-code">BCM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/BCM-001">Business Continuity &amp; Disaster Recovery (BCDR) Program</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Business Continuity &amp; Disaster Recovery</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/BCM-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CFG-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">CFG-001</span>
                    <span class="badge-code">CFG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CFG-001">Secure Configuration Baseline</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Secure Configuration Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CFG-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-001</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-001">Cloud Security Governance</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CMP-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">CMP-001</span>
                    <span class="badge-code">CMP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CMP-001">Compliance Program Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Compliance Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CMP-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CRY-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">CRY-001</span>
                    <span class="badge-code">CRY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CRY-001">Cryptographic Governance</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cryptography &amp; Key Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CRY-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-001</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-001">Data Protection &amp; Privacy Strategy</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="END-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">END-001</span>
                    <span class="badge-code">END</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/END-001">Endpoint Protection</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Endpoint Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/END-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="EXC-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">EXC-001</span>
                    <span class="badge-code">EXC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/EXC-001">Exception Management Program</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Exception Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/EXC-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="GOV-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">GOV-001</span>
                    <span class="badge-code">GOV</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/GOV-001">Information Security Governance</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Governance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/GOV-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="HRS-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">HRS-001</span>
                    <span class="badge-code">HRS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/HRS-001">Personnel Screening &amp; Verification</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Human Resource Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/HRS-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="IAM-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">IAM-001</span>
                    <span class="badge-code">IAM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/IAM-001">Identity &amp; Account Lifecycle Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Identity &amp; Access Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative / Technical</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/IAM-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="INC-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">INC-001</span>
                    <span class="badge-code">INC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/INC-001">Incident Response Program</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Incident Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/INC-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="NET-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">NET-001</span>
                    <span class="badge-code">NET</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/NET-001">Secure Network Architecture</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Network Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/NET-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPR-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPR-001</span>
                    <span class="badge-code">OPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPR-001">Operational Resilience Program</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Operational Resilience</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPR-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPS-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPS-001</span>
                    <span class="badge-code">OPS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPS-001">Change &amp; Release Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>IT Operations &amp; Service Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPS-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="PHY-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">PHY-001</span>
                    <span class="badge-code">PHY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/PHY-001">Physical Security &amp; Facility Access Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Physical &amp; Environmental Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/PHY-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="POL-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">POL-001</span>
                    <span class="badge-code">POL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/POL-001">Policy Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Policy &amp; Document Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">8</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/POL-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="RSK-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">RSK-001</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/RSK-001">Risk Management Framework</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/RSK-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="SAT-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">SAT-001</span>
                    <span class="badge-code">SAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/SAT-001">Security Awareness Program</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Awareness &amp; Training</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/SAT-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="SOC-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">SOC-001</span>
                    <span class="badge-code">SOC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/SOC-001">Security Operations Center (SOC) Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Operations &amp; Monitoring</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/SOC-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="THR-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">THR-001</span>
                    <span class="badge-code">THR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/THR-001">Threat Intelligence Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Threat Intelligence &amp; Threat Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/THR-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="TPR-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">TPR-001</span>
                    <span class="badge-code">TPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/TPR-001">Third-Party Risk Management Program</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Third-Party &amp; Supply Chain Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/TPR-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="VUL-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">VUL-001</span>
                    <span class="badge-code">VUL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/VUL-001">Vulnerability Management Strategy</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Vulnerability &amp; Patch Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/VUL-001" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AIG-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">AIG-002</span>
                    <span class="badge-code">AIG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AIG-002">AI Risk &amp; Impact Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>AI Governance &amp; Model Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AIG-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-002</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-002">Application Inventory</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="ARC-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">ARC-002</span>
                    <span class="badge-code">ARC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/ARC-002">Architecture Governance</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Architecture</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/ARC-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AST-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">AST-002</span>
                    <span class="badge-code">AST</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AST-002">Asset Classification &amp; Criticality</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Asset Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AST-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AUD-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">AUD-002</span>
                    <span class="badge-code">AUD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AUD-002">Internal Audit Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Audit &amp; Assurance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AUD-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="BCM-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">BCM-002</span>
                    <span class="badge-code">BCM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/BCM-002">Business Continuity &amp; Disaster Recovery Planning</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Business Continuity &amp; Disaster Recovery</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/BCM-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CFG-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">CFG-002</span>
                    <span class="badge-code">CFG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CFG-002">Configuration Compliance Monitoring</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Secure Configuration Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CFG-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-002</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-002">Cloud Shared Responsibility Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CMP-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">CMP-002</span>
                    <span class="badge-code">CMP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CMP-002">Control Compliance Monitoring</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Compliance Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CMP-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CRY-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">CRY-002</span>
                    <span class="badge-code">CRY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CRY-002">Data-at-Rest Encryption</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cryptography &amp; Key Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CRY-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-002</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-002">Data Discovery</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="END-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">END-002</span>
                    <span class="badge-code">END</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/END-002">Endpoint Detection &amp; Response (EDR)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Endpoint Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/END-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="EXC-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">EXC-002</span>
                    <span class="badge-code">EXC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/EXC-002">Exception Lifecycle Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Exception Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/EXC-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="GOV-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">GOV-002</span>
                    <span class="badge-code">GOV</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/GOV-002">Security Charter</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Governance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/GOV-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="HRS-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">HRS-002</span>
                    <span class="badge-code">HRS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/HRS-002">Confidentiality &amp; Employment Obligations</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Human Resource Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/HRS-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="IAM-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">IAM-002</span>
                    <span class="badge-code">IAM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/IAM-002">Authentication Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Identity &amp; Access Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Technical</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/IAM-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="INC-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">INC-002</span>
                    <span class="badge-code">INC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/INC-002">Incident Response Preparedness</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Incident Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/INC-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="NET-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">NET-002</span>
                    <span class="badge-code">NET</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/NET-002">Network Segmentation &amp; Traffic Control</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Network Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/NET-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPR-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPR-002</span>
                    <span class="badge-code">OPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPR-002">Critical Business Service Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Operational Resilience</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPR-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPS-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPS-002</span>
                    <span class="badge-code">OPS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPS-002">Operational Monitoring &amp; Service Health</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>IT Operations &amp; Service Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPS-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="PHY-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">PHY-002</span>
                    <span class="badge-code">PHY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/PHY-002">Environmental &amp; Infrastructure Protection</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Physical &amp; Environmental Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/PHY-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="POL-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">POL-002</span>
                    <span class="badge-code">POL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/POL-002">Policy Communication &amp; Awareness</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Policy &amp; Document Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">7</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/POL-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="RSK-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">RSK-002</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/RSK-002">Risk Register</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/RSK-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="SAT-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">SAT-002</span>
                    <span class="badge-code">SAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/SAT-002">Security Culture Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Awareness &amp; Training</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/SAT-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="SOC-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">SOC-002</span>
                    <span class="badge-code">SOC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/SOC-002">Security Threat Detection</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Operations &amp; Monitoring</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/SOC-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="THR-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">THR-002</span>
                    <span class="badge-code">THR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/THR-002">Attack Surface Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Threat Intelligence &amp; Threat Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/THR-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="TPR-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">TPR-002</span>
                    <span class="badge-code">TPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/TPR-002">Third-Party Risk Assessment &amp; Due Diligence</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Third-Party &amp; Supply Chain Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/TPR-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="VUL-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">VUL-002</span>
                    <span class="badge-code">VUL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/VUL-002">Vulnerability Assessment &amp; Scanning</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Vulnerability &amp; Patch Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/VUL-002" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AIG-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">AIG-003</span>
                    <span class="badge-code">AIG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AIG-003">AI Asset &amp; Lifecycle Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>AI Governance &amp; Model Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AIG-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-003</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-003">Secure Software Development Lifecycle (SSDLC)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="ARC-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">ARC-003</span>
                    <span class="badge-code">ARC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/ARC-003">Threat Modeling</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Architecture</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/ARC-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AST-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">AST-003</span>
                    <span class="badge-code">AST</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AST-003">Asset Ownership</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Asset Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AST-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AUD-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">AUD-003</span>
                    <span class="badge-code">AUD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AUD-003">Independent Assessment &amp; External Assurance</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Audit &amp; Assurance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AUD-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="BCM-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">BCM-003</span>
                    <span class="badge-code">BCM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/BCM-003">Business Impact Analysis (BIA)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Business Continuity &amp; Disaster Recovery</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/BCM-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CFG-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">CFG-003</span>
                    <span class="badge-code">CFG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CFG-003">Configuration Automation &amp; Deployment</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Secure Configuration Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CFG-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-003</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-003">Secure Cloud Configuration</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CMP-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">CMP-003</span>
                    <span class="badge-code">CMP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CMP-003">Compliance Evidence Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Compliance Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CMP-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CRY-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">CRY-003</span>
                    <span class="badge-code">CRY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CRY-003">Data-in-Transit Encryption</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cryptography &amp; Key Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CRY-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-003</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-003">Data Classification &amp; Handling</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="END-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">END-003</span>
                    <span class="badge-code">END</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/END-003">Mobile Device &amp; Application Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Endpoint Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/END-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="GOV-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">GOV-003</span>
                    <span class="badge-code">GOV</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/GOV-003">Governance Committees</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Governance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/GOV-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="HRS-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">HRS-003</span>
                    <span class="badge-code">HRS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/HRS-003">Personnel Lifecycle Security Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Human Resource Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/HRS-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="IAM-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">IAM-003</span>
                    <span class="badge-code">IAM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/IAM-003">Privileged Access Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Identity &amp; Access Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Technical</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/IAM-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="INC-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">INC-003</span>
                    <span class="badge-code">INC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/INC-003">Incident Detection, Analysis &amp; Reporting</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Incident Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/INC-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="NET-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">NET-003</span>
                    <span class="badge-code">NET</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/NET-003">Intrusion Detection &amp; Prevention</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Network Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/NET-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPR-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPR-003</span>
                    <span class="badge-code">OPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPR-003">Operational Dependency Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Operational Resilience</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPR-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPS-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPS-003</span>
                    <span class="badge-code">OPS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPS-003">Service Availability Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>IT Operations &amp; Service Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPS-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="PHY-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">PHY-003</span>
                    <span class="badge-code">PHY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/PHY-003">Data Center &amp; Critical Facility Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Physical &amp; Environmental Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/PHY-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="POL-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">POL-003</span>
                    <span class="badge-code">POL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/POL-003">Policy Review &amp; Update</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Policy &amp; Document Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">7</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/POL-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="RSK-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">RSK-003</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/RSK-003">Risk Assessment</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/RSK-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="SAT-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">SAT-003</span>
                    <span class="badge-code">SAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/SAT-003">Role-Based Security &amp; Compliance Training</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Awareness &amp; Training</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/SAT-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="SOC-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">SOC-003</span>
                    <span class="badge-code">SOC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/SOC-003">Security Automation &amp; Orchestration (SOAR)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Operations &amp; Monitoring</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/SOC-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="THR-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">THR-003</span>
                    <span class="badge-code">THR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/THR-003">Insider Threat Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Threat Intelligence &amp; Threat Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/THR-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="TPR-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">TPR-003</span>
                    <span class="badge-code">TPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/TPR-003">Third-Party Contract &amp; Compliance Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Third-Party &amp; Supply Chain Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/TPR-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="VUL-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">VUL-003</span>
                    <span class="badge-code">VUL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/VUL-003">Vulnerability Prioritization</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Vulnerability &amp; Patch Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/VUL-003" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AIG-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">AIG-004</span>
                    <span class="badge-code">AIG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AIG-004">Responsible AI Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>AI Governance &amp; Model Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AIG-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-004</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-004">Secure Coding Practices</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="ARC-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">ARC-004</span>
                    <span class="badge-code">ARC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/ARC-004">Security Design &amp; Architecture Reviews</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Architecture</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/ARC-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AST-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">AST-004</span>
                    <span class="badge-code">AST</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AST-004">Asset Lifecycle Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Asset Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AST-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AUD-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">AUD-004</span>
                    <span class="badge-code">AUD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AUD-004">Control Assurance &amp; Validation</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Audit &amp; Assurance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AUD-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="BCM-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">BCM-004</span>
                    <span class="badge-code">BCM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/BCM-004">BCDR Testing &amp; Exercising</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Business Continuity &amp; Disaster Recovery</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/BCM-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CFG-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">CFG-004</span>
                    <span class="badge-code">CFG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CFG-004">Configuration Hardening</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Secure Configuration Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CFG-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-004</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-004">Cloud Identity &amp; Access Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CMP-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">CMP-004</span>
                    <span class="badge-code">CMP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CMP-004">Non-Compliance Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Compliance Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CMP-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CRY-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">CRY-004</span>
                    <span class="badge-code">CRY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CRY-004">Cryptographic Key Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cryptography &amp; Key Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CRY-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-004</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-004">Data Retention &amp; Disposal</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="END-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">END-004</span>
                    <span class="badge-code">END</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/END-004">Endpoint Encryption</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Endpoint Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/END-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="GOV-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">GOV-004</span>
                    <span class="badge-code">GOV</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/GOV-004">Executive Oversight &amp; Reporting</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Governance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/GOV-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="HRS-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">HRS-004</span>
                    <span class="badge-code">HRS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/HRS-004">Employee Code of Conduct &amp; Ethics</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Human Resource Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/HRS-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="IAM-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">IAM-004</span>
                    <span class="badge-code">IAM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/IAM-004">Authorization Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Identity &amp; Access Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Technical</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/IAM-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="INC-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">INC-004</span>
                    <span class="badge-code">INC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/INC-004">Incident Containment, Eradication &amp; Recovery</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Incident Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/INC-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="NET-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">NET-004</span>
                    <span class="badge-code">NET</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/NET-004">Network Access Control (NAC)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Network Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/NET-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPR-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPR-004</span>
                    <span class="badge-code">OPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPR-004">Impact Tolerance &amp; Criticality Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Operational Resilience</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPR-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPS-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPS-004</span>
                    <span class="badge-code">OPS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPS-004">Capacity &amp; Performance Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>IT Operations &amp; Service Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPS-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="PHY-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">PHY-004</span>
                    <span class="badge-code">PHY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/PHY-004">Sensitive Asset &amp; Equipment Protection</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Physical &amp; Environmental Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/PHY-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="POL-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">POL-004</span>
                    <span class="badge-code">POL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/POL-004">Acceptable Use Policy (AUP)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Policy &amp; Document Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">8</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/POL-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="RSK-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">RSK-004</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/RSK-004">Risk Treatment &amp; Response</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative + Operational</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/RSK-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="SAT-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">SAT-004</span>
                    <span class="badge-code">SAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/SAT-004">Security Awareness Exercises &amp; Simulations</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Awareness &amp; Training</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/SAT-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="SOC-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">SOC-004</span>
                    <span class="badge-code">SOC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/SOC-004">Threat Hunting</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Operations &amp; Monitoring</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/SOC-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="THR-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">THR-004</span>
                    <span class="badge-code">THR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/THR-004">Adversary Simulation &amp; Security Validation</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Threat Intelligence &amp; Threat Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/THR-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="TPR-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">TPR-004</span>
                    <span class="badge-code">TPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/TPR-004">Third-Party Continuous Monitoring &amp; Assurance</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Third-Party &amp; Supply Chain Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/TPR-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="VUL-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">VUL-004</span>
                    <span class="badge-code">VUL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/VUL-004">Vulnerability Intelligence</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Vulnerability &amp; Patch Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/VUL-004" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AIG-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">AIG-005</span>
                    <span class="badge-code">AIG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AIG-005">AI Security &amp; Operational Resilience</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>AI Governance &amp; Model Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AIG-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-005</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-005">Application Security Testing</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="ARC-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">ARC-005</span>
                    <span class="badge-code">ARC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/ARC-005">Secure Engineering Principles</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Architecture</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/ARC-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AST-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">AST-005</span>
                    <span class="badge-code">AST</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AST-005">Secure Asset Disposal &amp; Reuse</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Asset Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AST-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AUD-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">AUD-005</span>
                    <span class="badge-code">AUD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AUD-005">Control Self-Assessment (CSA)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Audit &amp; Assurance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AUD-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="BCM-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">BCM-005</span>
                    <span class="badge-code">BCM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/BCM-005">Backup &amp; Recovery Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Business Continuity &amp; Disaster Recovery</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/BCM-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CFG-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">CFG-005</span>
                    <span class="badge-code">CFG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CFG-005">Configuration Change Control</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Secure Configuration Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CFG-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-005</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-005">Cloud Network Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CMP-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">CMP-005</span>
                    <span class="badge-code">CMP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CMP-005">Compliance Reporting</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Compliance Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CMP-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CRY-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">CRY-005</span>
                    <span class="badge-code">CRY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CRY-005">Digital Certificate Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cryptography &amp; Key Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CRY-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-005</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-005">Data Ownership &amp; Stewardship</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="END-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">END-005</span>
                    <span class="badge-code">END</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/END-005">Endpoint Application Control</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Endpoint Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/END-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="GOV-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">GOV-005</span>
                    <span class="badge-code">GOV</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/GOV-005">Information Security Program Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Governance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative + Operational</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/GOV-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="IAM-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">IAM-005</span>
                    <span class="badge-code">IAM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/IAM-005">Access Reviews (Certifications)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Identity &amp; Access Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative / Technical</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/IAM-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="INC-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">INC-005</span>
                    <span class="badge-code">INC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/INC-005">Post-Incident Review &amp; Continuous Improvement</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Incident Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/INC-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="NET-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">NET-005</span>
                    <span class="badge-code">NET</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/NET-005">Secure Remote Access</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Network Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/NET-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPR-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPR-005</span>
                    <span class="badge-code">OPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPR-005">Operational Resilience Testing</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Operational Resilience</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPR-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPS-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPS-005</span>
                    <span class="badge-code">OPS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPS-005">System Maintenance Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>IT Operations &amp; Service Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPS-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="PHY-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">PHY-005</span>
                    <span class="badge-code">PHY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/PHY-005">Physical Media Handling &amp; Secure Disposal</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Physical &amp; Environmental Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/PHY-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="RSK-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">RSK-005</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/RSK-005">Risk Monitoring &amp; Reporting</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative + Operational</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/RSK-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="TPR-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">TPR-005</span>
                    <span class="badge-code">TPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/TPR-005">Third-Party Lifecycle &amp; Offboarding Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Third-Party &amp; Supply Chain Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/TPR-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="VUL-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">VUL-005</span>
                    <span class="badge-code">VUL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/VUL-005">Patch Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Vulnerability &amp; Patch Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/VUL-005" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AIG-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">AIG-006</span>
                    <span class="badge-code">AIG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AIG-006">AI Performance Monitoring &amp; Continuous Improvement</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>AI Governance &amp; Model Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AIG-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-006</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-006">DevSecOps</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="ARC-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">ARC-006</span>
                    <span class="badge-code">ARC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/ARC-006">Zero Trust Architecture</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Security Architecture</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/ARC-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AST-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">AST-006</span>
                    <span class="badge-code">AST</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AST-006">Authorized &amp; Approved Assets</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Asset Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AST-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AUD-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">AUD-006</span>
                    <span class="badge-code">AUD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AUD-006">Attestation &amp; Certification Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Audit &amp; Assurance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AUD-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="BCM-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">BCM-006</span>
                    <span class="badge-code">BCM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/BCM-006">Recovery Infrastructure Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Business Continuity &amp; Disaster Recovery</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/BCM-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CFG-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">CFG-006</span>
                    <span class="badge-code">CFG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CFG-006">Configuration Exception Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Secure Configuration Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CFG-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-006</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-006">Cloud Data Protection</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CMP-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">CMP-006</span>
                    <span class="badge-code">CMP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CMP-006">Regulatory Change Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Compliance Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CMP-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-006</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-006">Data Flow Mapping, Inventory &amp; Lineage</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="END-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">END-006</span>
                    <span class="badge-code">END</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/END-006">Removable Media &amp; Peripheral Control</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Endpoint Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/END-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="GOV-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">GOV-006</span>
                    <span class="badge-code">GOV</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/GOV-006">Security Program Continuous Improvement</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Governance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Operational</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/GOV-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="IAM-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">IAM-006</span>
                    <span class="badge-code">IAM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/IAM-006">Federation &amp; Single Sign-On (SSO)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Identity &amp; Access Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Technical</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/IAM-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="INC-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">INC-006</span>
                    <span class="badge-code">INC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/INC-006">Crisis Communication Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Incident Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/INC-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="NET-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">NET-006</span>
                    <span class="badge-code">NET</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/NET-006">Wireless Network Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Network Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/NET-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPR-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPR-006</span>
                    <span class="badge-code">OPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPR-006">Third-Party &amp; Supply Chain Resilience</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Operational Resilience</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPR-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPS-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPS-006</span>
                    <span class="badge-code">OPS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPS-006">End-of-Life &amp; Technology Lifecycle Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>IT Operations &amp; Service Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPS-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="PHY-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">PHY-006</span>
                    <span class="badge-code">PHY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/PHY-006">Physical Emergency Preparedness &amp; Response</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Physical &amp; Environmental Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/PHY-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="RSK-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">RSK-006</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/RSK-006">Risk Appetite Definition</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/RSK-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="TPR-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">TPR-006</span>
                    <span class="badge-code">TPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/TPR-006">Third-Party Concentration Risk Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Third-Party &amp; Supply Chain Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/TPR-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="VUL-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">VUL-006</span>
                    <span class="badge-code">VUL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/VUL-006">Vulnerability Reporting &amp; SLA Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Vulnerability &amp; Patch Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/VUL-006" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-007</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-007">Software Supply Chain Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AST-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">AST-007</span>
                    <span class="badge-code">AST</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AST-007">Automated Asset Discovery &amp; Unauthorized Asset Detection</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Asset Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AST-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AUD-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">AUD-007</span>
                    <span class="badge-code">AUD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AUD-007">Audit Findings &amp; Remediation Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Audit &amp; Assurance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AUD-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-007</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-007">Cloud Workload &amp; Container Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CMP-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">CMP-007</span>
                    <span class="badge-code">CMP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CMP-007">Compliance Obligation Mapping</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Compliance Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CMP-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-007</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-007">Data Subject Rights Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="GOV-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">GOV-007</span>
                    <span class="badge-code">GOV</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/GOV-007">Security Integration into Business &amp; Technology Initiatives</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Governance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/GOV-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="IAM-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">IAM-007</span>
                    <span class="badge-code">IAM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/IAM-007">Access Control for APIs</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Identity &amp; Access Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Technical</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/IAM-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="INC-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">INC-007</span>
                    <span class="badge-code">INC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/INC-007">Regulatory &amp; External Incident Notification</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Incident Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/INC-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="NET-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">NET-007</span>
                    <span class="badge-code">NET</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/NET-007">Network Monitoring &amp; Visibility</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Network Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/NET-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="OPS-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">OPS-007</span>
                    <span class="badge-code">OPS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/OPS-007">Batch Processing &amp; Job Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>IT Operations &amp; Service Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/OPS-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="RSK-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">RSK-007</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/RSK-007">Key Risk Indicators (KRIs)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/RSK-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="VUL-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">VUL-007</span>
                    <span class="badge-code">VUL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/VUL-007">Vulnerability Exception Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Vulnerability &amp; Patch Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/VUL-007" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-008</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-008">API Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-008" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="AST-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">AST-008</span>
                    <span class="badge-code">AST</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/AST-008">Software License Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Asset Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/AST-008" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-008</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-008">Cloud Security Monitoring</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-008" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-008</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-008">Consent Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-008" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="GOV-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">GOV-008</span>
                    <span class="badge-code">GOV</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/GOV-008">Enterprise Control Library Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Governance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative + Operational</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/GOV-008" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="IAM-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">IAM-008</span>
                    <span class="badge-code">IAM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/IAM-008">Non-Human Identity Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Identity &amp; Access Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Technical</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/IAM-008" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="NET-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">NET-008</span>
                    <span class="badge-code">NET</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/NET-008">Voice &amp; Video Communication Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Network Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/NET-008" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="RSK-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">RSK-008</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/RSK-008">Risk Acceptance &amp; Exception Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/RSK-008" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="VUL-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">VUL-008</span>
                    <span class="badge-code">VUL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/VUL-008">Exposure Analytics</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Vulnerability &amp; Patch Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/VUL-008" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-009">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-009</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-009">Secrets Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-009" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-009">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-009</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-009">Cloud Incident Response</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-009" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-009">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-009</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-009">Cross-Border Data Transfer</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-009" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="RSK-009">
                <div class="card-left-column">
                    <span class="badge-fw-id">RSK-009</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/RSK-009">Scenario Analysis</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Administrative</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/RSK-009" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-010">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-010</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-010">Software Release &amp; Deployment Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-010" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="CLD-010">
                <div class="card-left-column">
                    <span class="badge-fw-id">CLD-010</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/CLD-010">Cloud Data Portability &amp; Interoperability</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/CLD-010" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-010">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-010</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-010">Privacy Notices</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-010" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-011">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-011</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-011">Application Security Incident Response</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-011" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-011">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-011</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-011">Privacy by Design</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-011" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="APP-012">
                <div class="card-left-column">
                    <span class="badge-fw-id">APP-012</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/APP-012">Application Risk Assessment</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/APP-012" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-012">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-012</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-012">Data Protection Impact Assessment (DPIA)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-012" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-013">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-013</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-013">Record of Processing Activities (ROPA)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-013" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-014">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-014</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-014">Data Loss Prevention (DLP)</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-014" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-015">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-015</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-015">Data Integrity</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-015" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-ctrl-id="DAT-016">
                <div class="card-left-column">
                    <span class="badge-fw-id">DAT-016</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/controls/view/DAT-016">Data Masking &amp; Anonymization</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-layer-group"></i> <span>Data Protection &amp; Privacy</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Security Control Specification</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Reqs</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill">Security Safeguard</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/controls/view/DAT-016" class="btn-explore-framework">
                        <span>Explore Control</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
                </div>
            </div>

            <!-- PAGINATION BAR -->
            <div class="pagination-bar" id="controlsPaginationBar">
                <div class="pagination-info" id="paginationInfo">
                    Showing <strong>1</strong> - <strong>10</strong> of <strong>190</strong> Security Controls
                </div>
                <div class="pagination-buttons" id="paginationButtons">
                    <!-- Dynamically populated via JS -->
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 3: ARCHITECTURE & TYPES (LIGHT BAND) -->
    <div class="section-light">
        <div class="section-container">
            <!-- KEY TERMS TABLE -->
            <div class="section-header-block" id="key-terms" style="margin-top: 0;">
                <span class="section-badge">GLOSSARY &amp; ARCHITECTURE</span>
                <h2 class="section-heading">Key Terms in Control Architecture</h2>
            </div>

            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Term</th>
                        <th>Meaning</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Security Control</strong></td>
                        <td>A specific policy, technical safeguard, or administrative procedure that mitigates risk.</td>
                    </tr>
                    <tr>
                        <td><strong>Control ID</strong></td>
                        <td>Unique identifier (e.g., UCL-001, AC-01) assigned to each unified control.</td>
                    </tr>
                    <tr>
                        <td><strong>Control Category</strong></td>
                        <td>Classification of control type (e.g., Preventive, Detective, Corrective, Administrative, Technical).</td>
                    </tr>
                    <tr>
                        <td><strong>Control Domain</strong></td>
                        <td>Parent category grouping related controls (e.g., Access Control, Cryptography).</td>
                    </tr>
                    <tr>
                        <td><strong>Auditable Requirement</strong></td>
                        <td>Specific testable criteria or framework clause mapped to the control.</td>
                    </tr>
                </tbody>
            </table>

            <!-- TYPES OF CONTROLS -->
            <div class="section-header-block" id="control-types" style="margin-top: 6.5rem; margin-bottom: 2.25rem;">
                <span class="section-badge">CONTROL CATEGORIES</span>
                <h2 class="section-heading">Types of Security Controls &amp; Safeguards</h2>
            </div>

            <div class="feature-grid">
                <div class="feature-card" style="border-top: 3px solid #02CCFF;">
                    <strong>Preventive Controls</strong>
                    <p style="font-size:0.85rem;margin:0;">Safeguards designed to deter or prevent security incidents before they occur (e.g., Multi-Factor Authentication, Firewalls, Access Restrictions).</p>
                </div>
                <div class="feature-card" style="border-top: 3px solid #00B8E6;">
                    <strong>Detective Controls</strong>
                    <p style="font-size:0.85rem;margin:0;">Mechanisms that identify and alert on security violations or anomalous events in real time (e.g., SIEM Logging, Intrusion Detection, File Integrity Monitoring).</p>
                </div>
                <div class="feature-card" style="border-top: 3px solid #1AD4FF;">
                    <strong>Corrective Controls</strong>
                    <p style="font-size:0.85rem;margin:0;">Procedures and automation designed to remediate threats and restore operations post-incident (e.g., Patch Management, Data Restores, Incident Playbooks).</p>
                </div>
                <div class="feature-card" style="border-top: 3px solid #33D6FF;">
                    <strong>Directive &amp; Administrative</strong>
                    <p style="font-size:0.85rem;margin:0;">Organizational policies, employee training, vendor risk reviews, and governance guidelines directing compliant behavior.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 4: UNIFIED CONTROL MAPPING & WORKFLOW (ALT BAND) -->
    <div class="section-alt">
        <div class="section-container">
            <!-- CROSSWALK & CONTROL MAPPING -->
            <div class="section-header-block" id="crosswalk-mapping" style="margin-top: 0;">
                <span class="section-badge">UNIFIED CONTROL MAPPING</span>
                <h2 class="section-heading">Control Crosswalk &amp; Mapping Architecture</h2>
                <p class="section-subtitle" style="color: #64748b; font-size: 0.95rem; margin-top: 0.4rem;">Unified control mapping links individual security safeguards directly to requirement clauses in ISO 27001, NIST CSF 2.0, PCI DSS v4.0, SOC 2, and GDPR.</p>
            </div>

            <div class="feature-grid" style="margin-top: 1.5rem;">
                <div class="feature-card" style="border-top-color: #02CCFF;">
                    <strong>1:Many Requirement Mapping</strong>
                    <p style="font-size:0.85rem;margin:0;">Maps a single UCL control to multiple regulatory requirement clauses.</p>
                </div>
                <div class="feature-card" style="border-top-color: #00B8E6;">
                    <strong>Single Audit Evidence</strong>
                    <p style="font-size:0.85rem;margin:0;">Attach evidence once to validate compliance across all mapped framework standards.</p>
                </div>
                <div class="feature-card" style="border-top-color: #1AD4FF;">
                    <strong>Automated Gap Analysis</strong>
                    <p style="font-size:0.85rem;margin:0;">Identifies missing safeguards and unassigned controls across your compliance scope.</p>
                </div>
                <div class="feature-card" style="border-top-color: #33D6FF;">
                    <strong>Continuous Synchronization</strong>
                    <p style="font-size:0.85rem;margin:0;">Updates to control specifications automatically sync across all mapped frameworks.</p>
                </div>
            </div>

            <div class="callout-box" style="margin-top: 2.75rem; margin-bottom: 2.75rem;">
                <p class="callout-title">How ASPIA UCL Control Mapping Works:</p>
                <p class="callout-text">For example, Unified Control UCL-001 (Multi-Factor Authentication) maps directly to <strong>ISO 27001:A.5.17</strong>, <strong>NIST CSF:PR.AA-03</strong>, <strong>SOC 2:CC6.1</strong>, and <strong>PCI DSS Requirement 8.3</strong>. Implementing MFA once satisfies all four standards.</p>
            </div>

            <!-- WORKFLOW DIAGRAM -->
            <div class="section-header-block" id="implementation-workflow" style="margin-top: 6.5rem; margin-bottom: 2.25rem;">
                <span class="section-badge">IMPLEMENTATION WORKFLOW</span>
                <h2 class="section-heading">Control Implementation &amp; Audit Workflow</h2>
            </div>

            <div class="workflow-box">
                <div class="workflow-flow">
                    <div class="flow-step-dark">1. Select Unified Controls</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-cyan">2. Map Framework Requirements</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-dark">3. Configure Safeguards</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-cyan">4. Collect Test Evidence</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-dark">5. Validate Audit Sampling</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-cyan">6. Remediate Control Gaps</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-dark">7. Continuous Control Monitoring</div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 5: AUDIT READINESS CHECKLIST (LIGHT BAND) -->
    <div class="section-light">
        <div class="section-container">
            <div class="section-header-block" id="checklist" style="margin-top: 0;">
                <span class="section-badge">AUDIT READINESS</span>
                <h2 class="section-heading">Security Control Readiness Checklist</h2>
            </div>

            <div class="checklist-grid">
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Control baseline defined &amp; scoped</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Control ownership assigned</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Technical policies published</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Safeguards deployed &amp; verified</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Multi-framework mappings linked</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Audit sampling evidence collected</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Automated logging enabled</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Access review schedules set</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Incident playbooks tested</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Policy exceptions logged</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Vendor controls evaluated</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Continuous monitoring active</div>
            </div>
        </div>
    </div>

    <!-- SECTION 6: FAQ SECTION (ALT BAND) -->
    <div class="section-alt">
        <div class="section-container">
            <div class="section-header-block" id="faq" style="margin-top: 0;">
                <span class="section-badge">FAQ &amp; SUPPORT</span>
                <h2 class="section-heading">Frequently Asked Questions</h2>
                <p class="section-subtitle" style="color: #64748b; font-size: 0.95rem; margin-top: 0.4rem;">Quick answers to common questions about security controls, baseline safeguards, and crosswalk mapping.</p>
            </div>

            <div class="faq-card-container" style="margin-bottom: 0;">
                <div class="faq-list">
                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">What is a security control in ASPIA UCL?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">A security control is a standardized safeguard or policy requirement (such as Access Control or Cryptographic Protection) that protects organizational data and satisfies compliance requirements across multiple frameworks.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">How do unified controls reduce audit burden?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">Unified controls map to overlapping requirements across ISO 27001, NIST CSF, PCI DSS, SOC 2, and GDPR. By testing a single control once, organizations validate compliance for multiple regulations simultaneously.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">What is the difference between preventive and detective controls?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">Preventive controls block unauthorized actions before they occur (e.g., MFA or firewalls), while detective controls monitor and alert on unauthorized activity that has taken place (e.g., SIEM logging or IDS).</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">How are controls categorized in ASPIA UCL?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">Controls in ASPIA UCL are categorized by Control Domain (e.g., Access Control, Asset Management) and Control Type (Preventive, Detective, Corrective, Administrative, Technical).</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">Can I add custom controls to ASPIA UCL?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">Yes, ASPIA UCL supports custom internal controls and policies while allowing seamless crosswalk mapping to standard regulatory frameworks.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 7: SUMMARY (LIGHT BAND) -->
    <div class="section-light">
        <div class="section-container">
            <div class="section-header-block" id="conclusion" style="margin-top: 0;">
                <span class="section-badge">SUMMARY</span>
                <h2 class="section-heading">Final Takeaway</h2>
            </div>
            <p style="line-height: 1.7; margin: 0;">Implementing a unified security control framework streamlines governance, eliminates duplicate testing efforts, and provides verifiable evidence of security posture across all global compliance mandates.</p>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
        function playThemeSound(isDark) {
            try {
                const AudioCtx = window.AudioContext || window.webkitAudioContext;
                if (!AudioCtx) return;
                const ctx = new AudioCtx();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();

                if (isDark) {
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(523.25, ctx.currentTime);
                    osc.frequency.exponentialRampToValueAtTime(392.00, ctx.currentTime + 0.12);
                    gain.gain.setValueAtTime(0.06, ctx.currentTime);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.12);
                } else {
                    osc.type = 'triangle';
                    osc.frequency.setValueAtTime(440.00, ctx.currentTime);
                    osc.frequency.exponentialRampToValueAtTime(880.00, ctx.currentTime + 0.10);
                    gain.gain.setValueAtTime(0.05, ctx.currentTime);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.10);
                }

                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.start();
                osc.stop(ctx.currentTime + 0.12);
            } catch (e) { }
        }

        function createThemeRipple(e) {
            try {
                const ripple = document.createElement('div');
                ripple.className = 'theme-ripple-wave';

                let x = window.innerWidth / 2;
                let y = 40;
                if (e && e.clientX && e.clientY) {
                    x = e.clientX;
                    y = e.clientY;
                } else {
                    const btn = document.getElementById('themeSegmentedSwitch');
                    if (btn) {
                        const rect = btn.getBoundingClientRect();
                        x = rect.left + rect.width / 2;
                        y = rect.top + rect.height / 2;
                    }
                }

                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                document.body.appendChild(ripple);

                requestAnimationFrame(() => {
                    ripple.classList.add('animate-expand');
                });

                setTimeout(() => {
                    if (ripple.parentNode) ripple.remove();
                }, 650);
            } catch (err) { }
        }

        function setTheme(theme, playSound = true, evt = null) {
            const isDark = (theme === 'dark');
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('aspia_theme', theme);

            const btnLight = document.getElementById('segBtnLight');
            const btnDark = document.getElementById('segBtnDark');

            if (theme === 'light') {
                if (btnLight) btnLight.classList.add('active');
                if (btnDark) btnDark.classList.remove('active');
            } else {
                if (btnDark) btnDark.classList.add('active');
                if (btnLight) btnLight.classList.remove('active');
            }

            if (playSound) {
                playThemeSound(isDark);
                createThemeRipple(evt);
            }
        }

        function toggleTheme(evt = null) {
            const current = document.documentElement.getAttribute('data-theme') || 'light';
            setTheme(current === 'light' ? 'dark' : 'light', true, evt);
        }

        // Keyboard Shortcut Listener (Shift + T)
        document.addEventListener('keydown', function (e) {
            if (e.shiftKey && e.key.toLowerCase() === 't' && !['INPUT', 'TEXTAREA'].includes(document.activeElement.tagName)) {
                e.preventDefault();
                toggleTheme();
            }
        });

        // Sync theme changes across browser tabs
        window.addEventListener('storage', function (e) {
            if (e.key === 'aspia_theme' && e.newValue) {
                setTheme(e.newValue, false);
            }
        });

        // View Layout Switcher (List vs Grid)
        function setCatalogLayout(mode) {
            const grid = document.getElementById('controlsGrid');
            const hdr = document.getElementById('listTableHeaderBar');
            const btnList = document.getElementById('viewBtnList');
            const btnGrid = document.getElementById('viewBtnGrid');
            if (!grid) return;

            if (mode === 'list') {
                grid.classList.add('list-layout-view');
                if (hdr) hdr.style.display = 'flex';
                if (btnList) {
                    btnList.style.background = '#16C4F4';
                    btnList.style.color = '#0D1735';
                }
                if (btnGrid) {
                    btnGrid.style.background = 'transparent';
                    btnGrid.style.color = '#64748b';
                }
                localStorage.setItem('aspia_catalog_view', 'list');
            } else {
                grid.classList.remove('list-layout-view');
                if (hdr) hdr.style.display = 'none';
                if (btnGrid) {
                    btnGrid.style.background = '#16C4F4';
                    btnGrid.style.color = '#0D1735';
                }
                if (btnList) {
                    btnList.style.background = 'transparent';
                    btnList.style.color = '#64748b';
                }
                localStorage.setItem('aspia_catalog_view', 'grid');
            }
        }

        // Initialize Theme & View Layout on page load
        (function () {
            const savedTheme = localStorage.getItem('aspia_theme') ||
                (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            setTheme(savedTheme, false);

            const savedView = localStorage.getItem('aspia_catalog_view') || 'list';
            setCatalogLayout(savedView);
        })();

        // PAGINATION & FILTER LOGIC
        const PAGE_SIZE = 10;
        let currentPage = 1;

        function getMatchingCards() {
            const query = (document.getElementById('controlSearchInput')?.value || '').toLowerCase().trim();
            const cards = Array.from(document.querySelectorAll('#controlsGrid .framework-card'));

            return cards.filter(card => {
                const text = card.textContent.toLowerCase();
                return !query || text.includes(query);
            });
        }

        function renderPagination() {
            const allCards = Array.from(document.querySelectorAll('#controlsGrid .framework-card'));
            const matchingCards = getMatchingCards();
            const totalMatching = matchingCards.length;

            allCards.forEach(card => card.style.display = 'none');

            let emptyMsg = document.getElementById('noControlsFoundMsg');
            if (totalMatching === 0) {
                if (!emptyMsg) {
                    emptyMsg = document.createElement('div');
                    emptyMsg.id = 'noControlsFoundMsg';
                    emptyMsg.style.cssText = 'grid-column: 1 / -1; padding: 40px; text-align: center; color: #94a3b8; font-size: 1rem;';
                    emptyMsg.innerHTML = '<i class="fas fa-search" style="font-size:2rem;margin-bottom:10px;display:block;"></i>No matching controls found.';
                    const grid = document.getElementById('controlsGrid');
                    if (grid) grid.appendChild(emptyMsg);
                }
                emptyMsg.style.display = 'block';

                const pagBar = document.getElementById('controlsPaginationBar');
                if (pagBar) pagBar.style.display = 'none';
                return;
            }

            if (emptyMsg) emptyMsg.style.display = 'none';
            const pagBar = document.getElementById('controlsPaginationBar');
            if (pagBar) pagBar.style.display = 'flex';

            const totalPages = Math.ceil(totalMatching / PAGE_SIZE);
            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const startIndex = (currentPage - 1) * PAGE_SIZE;
            const endIndex = Math.min(startIndex + PAGE_SIZE, totalMatching);

            for (let i = startIndex; i < endIndex; i++) {
                if (matchingCards[i]) {
                    matchingCards[i].style.display = '';
                }
            }

            const infoEl = document.getElementById('paginationInfo');
            if (infoEl) {
                infoEl.innerHTML = `Showing <strong>${startIndex + 1}</strong> - <strong>${endIndex}</strong> of <strong>${totalMatching}</strong> Security Controls`;
            }

            const buttonsEl = document.getElementById('paginationButtons');
            if (buttonsEl) {
                let btnsHtml = '';

                btnsHtml += `<button type="button" class="page-btn" ${currentPage === 1 ? 'disabled' : ''} onclick="goToPage(${currentPage - 1})" aria-label="Previous Page"><i class="fas fa-chevron-left"></i></button>`;

                if (totalPages <= 7) {
                    for (let p = 1; p <= totalPages; p++) {
                        const activeClass = p === currentPage ? ' active' : '';
                        btnsHtml += `<button type="button" class="page-btn${activeClass}" onclick="goToPage(${p})">${p}</button>`;
                    }
                } else {
                    let pagesToDisplay = [];
                    if (currentPage <= 4) {
                        pagesToDisplay = [1, 2, 3, 4, 5, '...', totalPages];
                    } else if (currentPage >= totalPages - 3) {
                        pagesToDisplay = [1, '...', totalPages - 4, totalPages - 3, totalPages - 2, totalPages - 1, totalPages];
                    } else {
                        pagesToDisplay = [1, '...', currentPage - 1, currentPage, currentPage + 1, '...', totalPages];
                    }

                    pagesToDisplay.forEach(item => {
                        if (item === '...') {
                            btnsHtml += `<span class="page-btn disabled" style="cursor:default;border:none;background:transparent;opacity:0.6;">...</span>`;
                        } else {
                            const activeClass = item === currentPage ? ' active' : '';
                            btnsHtml += `<button type="button" class="page-btn${activeClass}" onclick="goToPage(${item})">${item}</button>`;
                        }
                    });
                }

                btnsHtml += `<button type="button" class="page-btn" ${currentPage === totalPages ? 'disabled' : ''} onclick="goToPage(${currentPage + 1})" aria-label="Next Page"><i class="fas fa-chevron-right"></i></button>`;

                buttonsEl.innerHTML = btnsHtml;
            }
        }

        function goToPage(page) {
            currentPage = page;
            renderPagination();

            const header = document.getElementById('listTableHeaderBar') || document.getElementById('controlSearchInput');
            if (header) {
                header.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }

        function filterControls() {
            currentPage = 1;
            renderPagination();
        }

        // Initialize pagination on page load
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', renderPagination);
        } else {
            renderPagination();
        }
    </script>

    <!-- UNIFIED DARK NAVY CTA & FOOTER SECTION -->
    <div class="footer-cta-wrapper" style="background: #0B132B; color: #ffffff; padding-top: 4rem; transition: background 0.35s ease;">
        <div class="section-container" style="text-align: center; padding-bottom: 2rem;">
            <h3 style="font-size: 2.15rem; font-weight: 800; color: #ffffff; margin: 0 0 0.8rem 0; letter-spacing: -0.02em;">Ready to Unify Your Security Controls &amp; Audit Evidence?</h3>
            <p style="color: #94a3b8; font-size: 1.05rem; margin: 0 auto 2rem auto; line-height: 1.65;">Connect security controls with regulatory frameworks, auditable requirements, and evidence sampling in one centralized library.</p>
            <div class="cta-buttons" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;">
                <a href="https://aspiainfotech.com/" target="_blank" rel="noopener" class="btn-cta-primary">Explore ASPIA &rarr;</a>
                <a href="https://aspiainfotech.com/request-a-demo/" target="_blank" rel="noopener" class="btn-cta-secondary">Book a Demo</a>
            </div>
        </div>
        @include('aspiaUcl.partials.footer')
    </div>

    <script>
        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const navLinks = document.querySelector('.nav-links');
        if (mobileMenuToggle && navLinks) {
            mobileMenuToggle.addEventListener('click', function () {
                navLinks.classList.toggle('active');
            });
        }

        // Theme Switch
        const themeSwitch = document.getElementById('themeToggleSwitch');
        function applySiteTheme(theme) {
            if (theme === 'dark') {
                document.body.classList.add('dark-mode');
                document.documentElement.setAttribute('data-theme', 'dark');
                if (themeSwitch) themeSwitch.checked = true;
            } else {
                document.body.classList.remove('dark-mode');
                document.documentElement.setAttribute('data-theme', 'light');
                if (themeSwitch) themeSwitch.checked = false;
            }
        }
        const savedTheme = localStorage.getItem('ucl-theme') || 'light';
        applySiteTheme(savedTheme);

        if (themeSwitch) {
            themeSwitch.addEventListener('change', function () {
                const newTheme = this.checked ? 'dark' : 'light';
                localStorage.setItem('ucl-theme', newTheme);
                applySiteTheme(newTheme);
            });
        }

        // FAQ Accordion Interaction
        const faqSectionItems = document.querySelectorAll('.faq-item');
        faqSectionItems.forEach(item => {
            const q = item.querySelector('.q');
            if (q) {
                const toggleItem = () => {
                    const isActive = item.classList.contains('active');

                    // Close other active items for clean single accordion mode
                    faqSectionItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            otherItem.classList.remove('active');
                            const otherQ = otherItem.querySelector('.q');
                            if (otherQ) otherQ.setAttribute('aria-expanded', 'false');
                        }
                    });

                    if (isActive) {
                        item.classList.remove('active');
                        q.setAttribute('aria-expanded', 'false');
                    } else {
                        item.classList.add('active');
                        q.setAttribute('aria-expanded', 'true');
                    }
                };

                q.addEventListener('click', toggleItem);
                q.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        toggleItem();
                    }
                });
            }
        });
    </script>
</body>

</html>