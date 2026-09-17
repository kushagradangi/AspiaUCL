<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <!-- ========== META SECTION FOR SEO ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulatory & Security Frameworks: Meaning, Types, Mappings & Standards Guide | ASPIA UCL</title>
    <meta name="description"
        content="Complete guide to cybersecurity frameworks, regulatory standards, compliance mappings, control domains, audit requirements, and best practices in ASPIA Unified Control Library.">
    <link rel="canonical" href="https://aspiainfotech.com/frameworks-guide/">
    <meta property="og:title" content="Regulatory & Security Frameworks: Meaning, Types, Mappings & Standards Guide">
    <meta property="og:description"
        content="Complete guide to cybersecurity frameworks, regulatory standards, compliance mappings, control domains, audit requirements, and best practices in ASPIA Unified Control Library.">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://aspiainfotech.com/frameworks-guide/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Regulatory & Security Frameworks: Meaning, Types, Mappings & Standards Guide">
    <meta name="twitter:description"
        content="Complete guide to cybersecurity frameworks, regulatory standards, compliance mappings, control domains, audit requirements, and best practices in ASPIA Unified Control Library.">
    <meta name="robots" content="index, follow">

    <!-- Article Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "TechArticle",
        "headline": "Regulatory & Security Frameworks: Meaning, Types, Mappings & Standards Guide",
        "description": "Complete guide to cybersecurity frameworks, regulatory standards, compliance mappings, control domains, audit requirements, and best practices in ASPIA Unified Control Library.",
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
            {"@@type":"Question","name":"What is a cybersecurity compliance framework?","acceptedAnswer":{"@@type":"Answer","text":"A cybersecurity compliance framework is a structured set of guidelines, security controls, and best practices designed to help organizations manage risk and meet regulatory requirements."}},
            {"@@type":"Question","name":"What are the main types of compliance frameworks?","acceptedAnswer":{"@@type":"Answer","text":"Frameworks generally fall into three categories: Regulatory Mandates (GDPR, HIPAA, PCI DSS), Industry Standards (ISO/IEC 27001, SOC 2), and Security Benchmarks (NIST CSF, CIS Controls)."}},
            {"@@type":"Question","name":"What is framework crosswalk mapping?","acceptedAnswer":{"@@type":"Answer","text":"Crosswalk mapping links controls and requirements from multiple frameworks to a unified baseline, enabling 'test once, comply with many' efficiency."}},
            {"@@type":"Question","name":"How does ASPIA UCL organize frameworks?","acceptedAnswer":{"@@type":"Answer","text":"ASPIA UCL maps frameworks into standardized Control Domains, Security Controls, and Auditable Requirements for streamlined governance."}},
            {"@@type":"Question","name":"What is the difference between ISO 27001 and NIST CSF?","acceptedAnswer":{"@@type":"Answer","text":"ISO 27001 is an certifiable Information Security Management System (ISMS) standard, while NIST CSF is a voluntary risk-management framework structured around Identify, Protect, Detect, Respond, and Recover functions."}}
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
        .toc-card,
        .feature-card,
        .catalog-toolbar,
        .framework-card,
        .custom-table,
        .workflow-box,
        .checklist-item,
        .faq-item,
        .faq-question,
        .footer-strip {
            transition: background-color 0.35s ease, color 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
        }

        /* MAIN CONTAINER */
        .page-wrapper {
            max-width: 1260px;
            margin: 0 auto;
            padding: 2.5rem 2.6rem;
        }

        /* HERO STYLES (FULL VH SCREEN) */
        .hero-section {
            background: #0D1735;
            color: #ffffff;
            width: 100%;
            min-height: calc(100vh - 76px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2.5rem;
            margin-bottom: 0;
            box-sizing: border-box;
            box-shadow: 0 12px 40px rgba(13, 23, 53, 0.25);
        }

        .hero-container {
            max-width: 1260px;
            width: 100%;
            margin: 0 auto;
        }

        .hero-meta {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 1.5rem;
        }

        .hero-meta a {
            color: #fff;
            text-decoration: none;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 700;
            margin: 0 0 0.5rem 0;
            line-height: 1.2;
            color: #ffffff;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 840px;
            margin-bottom: 1.5rem;
        }

        .hero-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            align-items: center;
            font-size: 0.95rem;
        }

        .hero-tag-pill {
            background: #16C4F4;
            padding: 0.2rem 1.2rem;
            border-radius: 40px;
            font-weight: 600;
            color: #0D1735;
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

        /* SIMPLE & PROFESSIONAL CALLOUT BLOCK */
        .callout-box {
            background: rgba(13, 23, 53, 0.03);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1rem 1.25rem;
            margin-bottom: 2rem;
        }

        .callout-title {
            margin: 0 0 0.3rem 0;
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--text-heading);
        }

        .callout-text {
            margin: 0;
            font-size: 0.92rem;
            line-height: 1.6;
            color: var(--text-main);
        }

        /* SECTION HEADINGS */
        .section-heading {
            font-size: 1.9rem;
            font-weight: 700;
            border-left: 5px solid #16C4F4;
            padding-left: 1rem;
            margin: 2.5rem 0 1rem 0;
            color: var(--text-heading);
        }

        /* GRID CARDS */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .feature-card {
            background: #f8fafd;
            padding: 1.2rem;
            border-radius: 12px;
            border: 1px solid #e6edf4;
            border-top: 3px solid #02CCFF;
        }

        .feature-card strong {
            color: var(--text-heading);
            font-size: 1.05rem;
            display: block;
            margin-bottom: 0.4rem;
        }

        /* SEARCH & CATALOG TOOLBAR */
        .catalog-toolbar {
            background: #f8fafd;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 1.5rem;
            margin: 2rem 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
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

        /* DYNAMIC FRAMEWORKS CATALOG LAYOUT */
        .frameworks-cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 1.25rem;
            margin: 1.5rem 0 3rem 0;
            transition: all 0.3s ease;
        }

        /* VIRTUAL SCROLL CONTAINER STYLES */
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
            background: #f8fafd;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 0.8rem 1.25rem;
            margin-bottom: 2rem;
            font-size: 0.88rem;
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

        .card-top {
            margin-bottom: 1rem;
        }

        .card-badges {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.8rem;
        }

        .badge-fw-id {
            font-family: var(--aspia-infotech-font-primary), sans-serif;
            font-size: 0.75rem;
            font-weight: 800;
            padding: 0;
            background: transparent;
            color: #0D1735;
            border: none;
            letter-spacing: 0.3px;
        }

        .badge-cat {
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.25rem 0.6rem;
            border-radius: 20px;
            background: var(--bg-body);
            color: #64748b;
            border: 1px solid var(--border-color);
            text-transform: uppercase;
        }

        .framework-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-heading);
            margin-bottom: 0.4rem;
        }

        .framework-publisher {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .framework-desc {
            font-size: 0.9rem;
            color: var(--text-main);
            line-height: 1.6;
            margin-bottom: 1.2rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-stats-strip {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.5rem;
            background: var(--bg-body);
            border-radius: 10px;
            padding: 0.8rem;
            margin-bottom: 1.2rem;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        .stat-val {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--text-heading);
        }

        .stat-lbl {
            font-size: 0.65rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
        }

        .btn-view-framework {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.7rem 1rem;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 700;
            background: rgba(22, 196, 244, 0.1);
            color: #16C4F4;
            border: 1px solid rgba(22, 196, 244, 0.25);
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-view-framework:hover {
            background: #16C4F4;
            color: #0D1735;
        }

        /* TABLES */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
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
            background: #f8fafd;
            border-radius: 16px;
            padding: 2rem 1.5rem;
            margin: 2rem 0;
            border: 1px solid rgba(22, 196, 244, 0.15);
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
            gap: 0.8rem;
            margin: 1.5rem 0;
        }

        .checklist-item {
            background: #f8fafd;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        /* FAQ ACCORDION */
        .faq-item {
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            background: var(--bg-card);
        }

        .faq-question {
            padding: 1rem 1.5rem;
            background: #f8fafd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            color: var(--text-heading);
        }

        .faq-answer {
            padding: 1rem 1.5rem 1.5rem 1.5rem;
            font-size: 0.95rem;
            line-height: 1.7;
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
                padding: 0.8rem 2rem;
            }

            .page-wrapper {
                padding: 2rem 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .site-nav-header {
                padding: 0.8rem 1.2rem;
            }

            .page-wrapper {
                padding: 1.5rem 1rem;
            }

            .toc-grid {
                columns: 1;
            }

            .hero-section {
                padding: 2rem 1.5rem;
                min-height: auto;
            }
        }
    </style>
</head>

<body>
    @include('aspiaUcl.partials.header', ['activeTab' => 'frameworks'])

    <!-- HERO BANNER (FULL VH SCREEN) -->
    <div class="hero-section">
        <div class="hero-container">
            <h1 class="hero-title">Regulatory &amp; Security Frameworks: Meaning, Types, Mappings &amp; Standards</h1>
            <p class="hero-subtitle">Complete guide to cybersecurity frameworks, regulatory standards, compliance
                mappings, control domains, audit requirements, and best practices in ASPIA Unified Control Library.</p>
            <div class="hero-tags">
                <span class="hero-tag-pill"><i class="fas fa-shield-alt"></i> Unified Library</span>
                <span><i class="far fa-clock"></i> 14 min read</span>
                <span style="opacity:0.8;"><i class="far fa-calendar-alt"></i> September 2026</span>
                <span><i class="fas fa-user-edit"></i> ASPIA Editorial</span>
            </div>
        </div>
    </div>

    <div class="page-wrapper">

        <!-- SHORT ANSWER BOX -->
        <div class="callout-box">
            <p class="callout-title">In Simple Terms:</p>
            <p class="callout-text">A compliance framework is a set of security rules and guidelines that help
                organizations protect data. ASPIA UCL connects global standards (like ISO 27001, NIST, SOC 2, and PCI
                DSS) into one unified system—so you can test your security controls once and satisfy multiple
                regulations automatically.</p>
        </div>

        <!-- WHAT ARE FRAMEWORKS -->
        <h2 id="what-are" class="section-heading">What Are Compliance Frameworks?</h2>
        <p>A cybersecurity or regulatory compliance framework is a system of standards, guidelines, and controls created
            by recognized international bodies or regulatory authorities (such as ISO, NIST, AICPA, PCI SSC, EU).
            Frameworks assist organizations in establishing information security governance, protecting sensitive data,
            mitigating operational risks, and achieving legal compliance.</p>
        <p>Rather than designing custom security procedures from scratch, organizations adopt established frameworks to
            demonstrate compliance, satisfy client requirements, and pass third-party audits.</p>

        <!-- WHY USED -->
        <h2 id="why-used" class="section-heading">Why Are Frameworks Used in GRC?</h2>

        <div class="feature-grid">
            <div class="feature-card" style="border-top-color: #02CCFF;">
                <strong>1. Standardizes Security Posture</strong>
                <p style="font-size:0.85rem;margin:0;">Provides a recognized benchmark that clients, auditors, and
                    regulators understand and trust.</p>
            </div>
            <div class="feature-card" style="border-top-color: #00B8E6;">
                <strong>2. Reduces Audit Fatigue</strong>
                <p style="font-size:0.85rem;margin:0;">Mapping overlapping frameworks allows testing a single control to
                    fulfill multiple compliance standards.</p>
            </div>
            <div class="feature-card" style="border-top-color: #1AD4FF;">
                <strong>3. Drives Risk-Based Governance</strong>
                <p style="font-size:0.85rem;margin:0;">Aligns security investments directly with identified business
                    risks and compliance liabilities.</p>
            </div>
            <div class="feature-card" style="border-top-color: #33D6FF;">
                <strong>4. Demonstrates Due Diligence</strong>
                <p style="font-size:0.85rem;margin:0;">Provides auditable proof of security controls during vendor
                    assessments and legal reviews.</p>
            </div>
        </div>

        <!-- CATALOG TOOLBAR & DYNAMIC CARDS -->
        <h2 id="frameworks-catalog" class="section-heading">Explore Integrated Regulatory Frameworks</h2>
        <p>Browse all regulatory baselines, cybersecurity frameworks, and industry standards mapped within ASPIA UCL.
            Filter by category or search by framework code, title, publisher, or family.</p>

        <div class="catalog-toolbar">
            <div class="search-input-group">
                <i class="fas fa-search"></i>
                <input type="text" id="frameworkSearchInput"
                    placeholder="Search frameworks by code, title, publisher, category..." onkeyup="filterFrameworks()">
            </div>
        </div>

        <!-- CLASSIC LIST TABLE HEADER STRIP -->
        <div class="list-table-header-bar" id="listTableHeaderBar">
            <div class="col-hdr col-hdr-id">Framework ID</div>
            <div class="col-hdr col-hdr-info">Framework Name &amp; Publisher</div>
            <div class="col-hdr col-hdr-scope">Mapped Audit Scope</div>
            <div class="col-hdr col-hdr-action">Action</div>
        </div>

        <!-- CATALOG CARDS LIST -->
        <div class="catalog-list-wrapper">
            <div class="frameworks-cards-grid list-layout-view" id="frameworksGrid">
                            <div class="framework-card" data-category="Information Security" data-fw-id="FW-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-001</span>
                    <span class="badge-code">ISO27001</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/isoiec-27001">ISO/IEC 27001:2022</a></h3>
                        <span class="badge-cat">Information Security</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>ISO</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">8</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">96</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/isoiec-27001" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Security Controls" data-fw-id="FW-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-002</span>
                    <span class="badge-code">ISO27002</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/isoiec-27002">ISO/IEC 27002:2022</a></h3>
                        <span class="badge-cat">Security Controls</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>ISO</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">4</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">30</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/isoiec-27002" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Cybersecurity" data-fw-id="FW-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-003</span>
                    <span class="badge-code">NIST-CSF</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/nist-cybersecurity-framework-csf">NIST Cybersecurity Framework (CSF):2</a></h3>
                        <span class="badge-cat">Cybersecurity</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>NIST</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">9</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">90</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/nist-cybersecurity-framework-csf" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Security Controls" data-fw-id="FW-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-004</span>
                    <span class="badge-code">NIST80053</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/nist-sp-800-53">NIST SP 800-53:Rev. 5</a></h3>
                        <span class="badge-cat">Security Controls</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>NIST</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">2</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">13</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">130</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/nist-sp-800-53" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Best Practices" data-fw-id="FW-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-005</span>
                    <span class="badge-code">CIS-V8</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/cis-controls">CIS Controls:v8</a></h3>
                        <span class="badge-cat">Best Practices</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>CIS</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">0</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">0</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">0</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/cis-controls" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Payment Security" data-fw-id="FW-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-006</span>
                    <span class="badge-code">PCI-DSS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/pci-dss">PCI DSS:4</a></h3>
                        <span class="badge-cat">Payment Security</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>PCI SSC</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">71</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">712</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/pci-dss" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="IT Governance" data-fw-id="FW-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-007</span>
                    <span class="badge-code">COBIT2019</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/cobit">COBIT:2019</a></h3>
                        <span class="badge-cat">IT Governance</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>ISACA</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">8</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">96</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/cobit" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Audit &amp; Assurance" data-fw-id="FW-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-008</span>
                    <span class="badge-code">SOC2</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/soc-2-trust-services-criteria">SOC 2 Trust Services Criteria:Latest</a></h3>
                        <span class="badge-cat">Audit &amp; Assurance</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>AICPA</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">16</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">160</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/soc-2-trust-services-criteria" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Privacy" data-fw-id="FW-009">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-009</span>
                    <span class="badge-code">ISO27701</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/isoiec-27701">ISO/IEC 27701:2019</a></h3>
                        <span class="badge-cat">Privacy</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>ISO</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">5</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">50</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/isoiec-27701" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Privacy" data-fw-id="FW-010">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-010</span>
                    <span class="badge-code">GDPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/general-data-protection-regulation-gdpr">General Data Protection Regulation (GDPR):Current</a></h3>
                        <span class="badge-cat">Privacy</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>European Union</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">6</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">44</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">440</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/general-data-protection-regulation-gdpr" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Privacy" data-fw-id="FW-011">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-011</span>
                    <span class="badge-code">DPDP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/digital-personal-data-protection-act">Digital Personal Data Protection Act:2023</a></h3>
                        <span class="badge-cat">Privacy</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>Government of India</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/digital-personal-data-protection-act" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Business Continuity" data-fw-id="FW-012">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-012</span>
                    <span class="badge-code">ISO22301</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/isoiec-22301">ISO/IEC 22301:2019</a></h3>
                        <span class="badge-cat">Business Continuity</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>ISO</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">10</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">100</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/isoiec-22301" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Operational Resilience" data-fw-id="FW-013">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-013</span>
                    <span class="badge-code">DORA</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/digital-operational-resilience-act">Digital Operational Resilience Act:Current</a></h3>
                        <span class="badge-cat">Operational Resilience</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>European Union</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">4</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">18</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">180</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/digital-operational-resilience-act" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Cyber Regulation" data-fw-id="FW-014">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-014</span>
                    <span class="badge-code">NIS2</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/nis2-directive">NIS2 Directive:Current</a></h3>
                        <span class="badge-cat">Cyber Regulation</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>European Union</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">0</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">0</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/nis2-directive" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Indian Banking" data-fw-id="FW-015">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-015</span>
                    <span class="badge-code">RBI-CSF</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/rbi-cyber-security-framework-master-directions">RBI Cyber Security Framework / Master Directions:Latest</a></h3>
                        <span class="badge-cat">Indian Banking</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>Reserve Bank of India</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">12</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">120</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/rbi-cyber-security-framework-master-directions" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Cyber Regulation" data-fw-id="FW-016">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-016</span>
                    <span class="badge-code">CERT-IN</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/cert-in-directions">CERT-In Directions:2022</a></h3>
                        <span class="badge-cat">Cyber Regulation</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>CERT-In</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/cert-in-directions" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Securities" data-fw-id="FW-017">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-017</span>
                    <span class="badge-code">SEBI-CSCRF</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/sebi-cyber-security-cyber-resilience-framework">SEBI Cyber Security &amp; Cyber Resilience Framework:Latest</a></h3>
                        <span class="badge-cat">Securities</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>SEBI</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">7</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">70</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/sebi-cyber-security-cyber-resilience-framework" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Insurance" data-fw-id="FW-018">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-018</span>
                    <span class="badge-code">IRDAI</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/irdai-information-cyber-security-guidelines">IRDAI Information &amp; Cyber Security Guidelines:Latest</a></h3>
                        <span class="badge-cat">Insurance</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>IRDAI</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">4</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">40</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/irdai-information-cyber-security-guidelines" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Payment Systems" data-fw-id="FW-019">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-019</span>
                    <span class="badge-code">NPCI-ISR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/npci-information-security-requirements">NPCI Information Security Requirements:Latest</a></h3>
                        <span class="badge-cat">Payment Systems</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>NPCI</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">1</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">4</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">40</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/npci-information-security-requirements" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-category="Healthcare" data-fw-id="FW-020">
                <div class="card-left-column">
                    <span class="badge-fw-id">FW-020</span>
                    <span class="badge-code">HIPAA</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/frameworks/health-insurance-portability-and-accountability-act">Health Insurance Portability and Accountability Act:Current</a></h3>
                        <span class="badge-cat">Healthcare</span>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-landmark"></i> <span>U.S. Department of Health &amp; Human Services</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">5</strong> Domains</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">37</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">372</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/frameworks/health-insurance-portability-and-accountability-act" class="btn-explore-framework">
                        <span>Explore Framework</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            </div>
        </div>

        <!-- PAGINATION BAR -->
        <div class="pagination-bar" id="frameworksPaginationBar">
            <div class="pagination-info" id="paginationInfo">
                Showing <strong>1</strong> - <strong>10</strong> of <strong>25</strong> Regulatory Frameworks
            </div>
            <div class="pagination-buttons" id="paginationButtons">
                <!-- Dynamically populated via JS -->
            </div>
        </div>

        <!-- KEY TERMS TABLE -->
        <h2 id="key-terms" class="section-heading">Key Terms Used in Framework Architecture</h2>

        <table class="custom-table">
            <thead>
                <tr>
                    <th>Term</th>
                    <th>Meaning</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Framework</strong></td>
                    <td>A comprehensive set of security, privacy, or governance requirements published by an authority.
                    </td>
                </tr>
                <tr>
                    <td><strong>Control Domain</strong></td>
                    <td>A top-level category grouping related controls (e.g., Access Control, Data Protection, Incident
                        Response).</td>
                </tr>
                <tr>
                    <td><strong>Security Control</strong></td>
                    <td>A specific policy, procedure, or technical safeguard designed to mitigate identified risks.</td>
                </tr>
                <tr>
                    <td><strong>Requirement Clause</strong></td>
                    <td>An auditable statement or sub-control specifying mandatory testing and evidence criteria.</td>
                </tr>
                <tr>
                    <td><strong>Crosswalk / Mapping</strong></td>
                    <td>The mathematical and conceptual correlation between controls across different frameworks.</td>
                </tr>
            </tbody>
        </table>

        <!-- TYPES OF FRAMEWORKS -->
        <h2 id="framework-types" class="section-heading">Types of Security &amp; Regulatory Frameworks</h2>

        <div class="feature-grid">
            <div class="feature-card" style="border-top: 3px solid #02CCFF;">
                <strong>Regulatory Mandates</strong>
                <p style="font-size:0.85rem;margin:0;">Legally binding laws passed by governments (e.g., GDPR, HIPAA,
                    SOX, NIS2). Failure to comply results in severe financial penalties and legal liability.</p>
            </div>
            <div class="feature-card" style="border-top: 3px solid #00B8E6;">
                <strong>Industry Standards</strong>
                <p style="font-size:0.85rem;margin:0;">Consensus standards established by international standardization
                    bodies (e.g., ISO/IEC 27001, ISO 27701, PCI DSS) often required for commercial operations.</p>
            </div>
            <div class="feature-card" style="border-top: 3px solid #1AD4FF;">
                <strong>Security Benchmarks</strong>
                <p style="font-size:0.85rem;margin:0;">Voluntary risk management frameworks and technical hardening
                    guidelines (e.g., NIST CSF, CIS Controls, SOC 2 Trust Services Criteria).</p>
            </div>
            <div class="feature-card" style="border-top: 3px solid #33D6FF;">
                <strong>Internal Corporate Baselines</strong>
                <p style="font-size:0.85rem;margin:0;">Custom internal policy frameworks designed to enforce corporate
                    risk appetite, internal controls, and operational governance.</p>
            </div>
        </div>

        <!-- CROSSWALK & CONTROL MAPPING -->
        <h2 id="crosswalk-mapping" class="section-heading">Crosswalk &amp; Control Mapping Architecture</h2>
        <p>Framework crosswalk mapping is the process of correlating security controls, policy requirements, and audit
            tests across multiple regulatory standards (e.g., mapping NIST CSF 2.0 to ISO/IEC 27001:2022, SOC 2 TSC, and
            PCI DSS v4.0). By establishing a single source of truth in ASPIA UCL, organizations eliminate redundant
            testing and achieve "test once, comply with many" audit efficiency.</p>

        <div class="feature-grid" style="margin-top: 1.5rem;">
            <div class="feature-card" style="border-top-color: #02CCFF;">
                <strong>1:1 &amp; Many:1 Mapping Engine</strong>
                <p style="font-size:0.85rem;margin:0;">Links multiple framework requirement clauses to a central UCL
                    Control Domain, reducing control duplication by up to 70%.</p>
            </div>
            <div class="feature-card" style="border-top-color: #00B8E6;">
                <strong>Unified Audit Evidence</strong>
                <p style="font-size:0.85rem;margin:0;">Attach sample evidence and test execution records once to
                    automatically satisfy multiple compliance audits.</p>
            </div>
            <div class="feature-card" style="border-top-color: #1AD4FF;">
                <strong>Gap Analysis &amp; Coverage</strong>
                <p style="font-size:0.85rem;margin:0;">Instantly identify unmapped requirements and regulatory gaps when
                    adopting new compliance frameworks.</p>
            </div>
            <div class="feature-card" style="border-top-color: #33D6FF;">
                <strong>Continuous Compliance Sync</strong>
                <p style="font-size:0.85rem;margin:0;">Updates to regulatory baselines or internal policies propagate
                    automatically across all mapped framework controls.</p>
            </div>
        </div>

        <div class="callout-box" style="margin-top: 1.5rem;">
            <p class="callout-title">How ASPIA UCL Crosswalk Works:</p>
            <p class="callout-text">For example, an Access Control policy requirement in ASPIA UCL maps simultaneously
                to <strong>ISO 27001:A.5.15</strong>, <strong>NIST CSF:PR.AA-01</strong>, <strong>SOC 2:CC6.1</strong>,
                and <strong>PCI DSS:7.1.1</strong>. Testing this control once validates compliance for all four
                standards automatically.</p>
        </div>

        <!-- WORKFLOW DIAGRAM -->
        <h2 id="implementation-workflow" class="section-heading">Framework Implementation &amp; Mapping Workflow</h2>

        <div class="workflow-box">
            <div class="workflow-flow">
                <div class="flow-step-dark">1. Identify Regulatory Scope</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-cyan">2. Select Target Frameworks</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-dark">3. Map Control Domains (ASPIA UCL)</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-cyan">4. Define Auditable Requirements</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-dark">5. Execute Audit Testing &amp; Sampling</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-cyan">6. Track Remediations &amp; Evidence</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-dark">7. Continuous Compliance Monitoring</div>
            </div>
        </div>

        <!-- CHECKLIST -->
        <h2 id="checklist" class="section-heading">Framework Compliance Readiness Checklist</h2>

        <div class="checklist-grid">
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Regulatory
                applicability scoped</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Executive sponsor
                assigned</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Control domains
                mapped</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Asset inventory
                validated</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Policy exceptions
                logged</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Risk assessment
                documented</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Evidence collection
                automated</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Vendor risk reviews
                complete</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Access control
                reviews run</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Audit sampling
                performed</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Corrective action
                plan ready</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Audit trail preserved
            </div>
        </div>

        <!-- FAQ SECTION -->
        <h2 id="faq" class="section-heading">Frequently Asked Questions</h2>

        <div class="faq-item">
            <div class="faq-question">
                <span>What is a cybersecurity compliance framework?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                A cybersecurity compliance framework is a structured set of guidelines, security controls, and best
                practices designed to help organizations manage risk, protect data assets, and satisfy regulatory
                obligations.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>What are the main types of compliance frameworks?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                Frameworks generally fall into three categories: Regulatory Mandates (GDPR, HIPAA, PCI DSS, SOX),
                Industry Standards (ISO/IEC 27001, ISO 27701), and Security Benchmarks (NIST CSF, CIS Controls, SOC 2).
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>What is framework crosswalk mapping?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                Crosswalk mapping links controls and requirements from multiple frameworks to a single unified baseline,
                enabling "test once, comply with many" audit efficiency.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>What is the difference between ISO 27001 and NIST CSF?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                ISO 27001 is a certifiable Information Security Management System (ISMS) standard with mandatory
                clauses, whereas NIST CSF is a flexible risk management framework organized into Identify, Protect,
                Detect, Respond, and Recover functions.
            </div>
        </div>

        <!-- CONCLUSION & CTA BANNER -->
        <h2 id="conclusion" class="section-heading">Final Takeaway</h2>
        <p>Effective GRC management relies on unifying disparate compliance mandates under a central framework
            structure. By standardizing control domains and leveraging crosswalk mappings, organizations drastically
            reduce audit burden while strengthening their operational security posture.</p>

        <div class="cta-banner">
            <h3 class="cta-title">Ready to Streamline Your Framework Compliance &amp; Control Mapping?</h3>
            <p class="cta-desc">Connect regulatory frameworks with control domains, auditable requirements, and sampling
                evidence in one centralized unified control library.</p>
            <div class="cta-buttons">
                <a href="https://aspiainfotech.com/" target="_blank" rel="noopener" class="btn-cta-primary">Explore
                    ASPIA →</a>
                <a href="https://aspiainfotech.com/request-a-demo/" target="_blank" rel="noopener"
                    class="btn-cta-secondary">Book a Demo</a>
            </div>
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
                    // Deep nocturnal synth chime (523.25Hz -> 392.00Hz)
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(523.25, ctx.currentTime);
                    osc.frequency.exponentialRampToValueAtTime(392.00, ctx.currentTime + 0.12);
                    gain.gain.setValueAtTime(0.06, ctx.currentTime);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.12);
                } else {
                    // Bright sunny chime (440.00Hz -> 880.00Hz)
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
            const grid = document.getElementById('frameworksGrid');
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

        let currentCategory = 'all';

        function setCategoryFilter(category, btn) {
            currentCategory = category.toLowerCase();
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            filterFrameworks();
        }

        // PAGINATION & FILTER LOGIC
        const PAGE_SIZE = 10;
        let currentPage = 1;

        function getMatchingCards() {
            const query = (document.getElementById('frameworkSearchInput')?.value || '').toLowerCase().trim();
            const cards = Array.from(document.querySelectorAll('.framework-card'));

            return cards.filter(card => {
                const text = card.textContent.toLowerCase();
                const cat = (card.getAttribute('data-category') || '').toLowerCase();
                const matchesQuery = !query || text.includes(query);
                const matchesCategory = currentCategory === 'all' || cat.includes(currentCategory);
                return matchesQuery && matchesCategory;
            });
        }

        function renderPagination() {
            const allCards = Array.from(document.querySelectorAll('.framework-card'));
            const matchingCards = getMatchingCards();
            const totalMatching = matchingCards.length;

            allCards.forEach(card => card.style.display = 'none');

            let emptyMsg = document.getElementById('noFrameworksFoundMsg');
            if (totalMatching === 0) {
                if (!emptyMsg) {
                    emptyMsg = document.createElement('div');
                    emptyMsg.id = 'noFrameworksFoundMsg';
                    emptyMsg.style.cssText = 'grid-column: 1 / -1; padding: 40px; text-align: center; color: #94a3b8; font-size: 1rem;';
                    emptyMsg.innerHTML = '<i class="fas fa-search" style="font-size:2rem;margin-bottom:10px;display:block;"></i>No matching frameworks found.';
                    const grid = document.getElementById('frameworksGrid');
                    if (grid) grid.appendChild(emptyMsg);
                }
                emptyMsg.style.display = 'block';

                const pagBar = document.getElementById('frameworksPaginationBar');
                if (pagBar) pagBar.style.display = 'none';
                return;
            }

            if (emptyMsg) emptyMsg.style.display = 'none';
            const pagBar = document.getElementById('frameworksPaginationBar');
            if (pagBar) pagBar.style.display = 'flex';

            const totalPages = Math.ceil(totalMatching / PAGE_SIZE);
            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const startIndex = (currentPage - 1) * PAGE_SIZE;
            const endIndex = Math.min(startIndex + PAGE_SIZE, totalMatching);

            for (let i = startIndex; i < endIndex; i++) {
                if (matchingCards[i]) {
                    matchingCards[i].style.display = 'flex';
                }
            }

            const infoEl = document.getElementById('paginationInfo');
            if (infoEl) {
                infoEl.innerHTML = `Showing <strong>${startIndex + 1}</strong> - <strong>${endIndex}</strong> of <strong>${totalMatching}</strong> Regulatory Frameworks`;
            }

            const buttonsEl = document.getElementById('paginationButtons');
            if (buttonsEl) {
                let btnsHtml = '';

                btnsHtml += `<button type="button" class="page-btn" ${currentPage === 1 ? 'disabled' : ''} onclick="goToPage(${currentPage - 1})" aria-label="Previous Page"><i class="fas fa-chevron-left"></i></button>`;

                for (let p = 1; p <= totalPages; p++) {
                    const activeClass = p === currentPage ? ' active' : '';
                    btnsHtml += `<button type="button" class="page-btn${activeClass}" onclick="goToPage(${p})">${p}</button>`;
                }

                btnsHtml += `<button type="button" class="page-btn" ${currentPage === totalPages ? 'disabled' : ''} onclick="goToPage(${currentPage + 1})" aria-label="Next Page"><i class="fas fa-chevron-right"></i></button>`;

                buttonsEl.innerHTML = btnsHtml;
            }
        }

        function goToPage(page) {
            currentPage = page;
            renderPagination();

            const header = document.getElementById('listTableHeaderBar') || document.getElementById('frameworkSearchInput');
            if (header) {
                header.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }

        function filterFrameworks() {
            currentPage = 1;
            renderPagination();
        }
    </script>

    @include('aspiaUcl.partials.footer')

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
    </script>
</body>

</html>