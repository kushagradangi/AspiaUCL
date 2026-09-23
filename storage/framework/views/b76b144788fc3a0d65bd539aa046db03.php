<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <!-- ========== META SECTION FOR SEO ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Domains & Security Categories: Meaning, Types, Mappings & Standards Guide | ASPIA UCL</title>
    <meta name="description"
        content="Complete guide to control domains, security categories, policy governance, risk management, and audit crosswalks in ASPIA Unified Control Library.">
    <link rel="canonical" href="https://aspiainfotech.com/domains-guide/">
    <meta property="og:title" content="Control Domains & Security Categories: Meaning, Types, Mappings & Standards Guide">
    <meta property="og:description"
        content="Complete guide to control domains, security categories, policy governance, risk management, and audit crosswalks in ASPIA Unified Control Library.">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://aspiainfotech.com/domains-guide/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Control Domains & Security Categories: Meaning, Types, Mappings & Standards Guide">
    <meta name="twitter:description"
        content="Complete guide to control domains, security categories, policy governance, risk management, and audit crosswalks in ASPIA Unified Control Library.">
    <meta name="robots" content="index, follow">

    <!-- Article Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "TechArticle",
        "headline": "Control Domains & Security Categories: Meaning, Types, Mappings & Standards Guide",
        "description": "Complete guide to control domains, security categories, policy governance, risk management, and audit crosswalks in ASPIA Unified Control Library.",
        "author": {"@type": "Organization", "name": "ASPIA Infotech"},
        "publisher": {"@type": "Organization", "name": "ASPIA Infotech Pvt. Ltd."},
        "datePublished": "2026-09-08",
        "dateModified": "2026-09-08"
    }
    </script>

    <!-- FAQ Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {"@type":"Question","name":"What is a control domain in cybersecurity?","acceptedAnswer":{"@type":"Answer","text":"A control domain is a high-level grouping of related security controls, policies, and procedures (such as Access Control, Data Security, or Incident Management) designed to organize information security governance."}},
            {"@type":"Question","name":"How do control domains differ from compliance frameworks?","acceptedAnswer":{"@type":"Answer","text":"A compliance framework (like ISO 27001 or NIST CSF) is an external regulatory standard. A control domain is an internal organizational category that groups controls across multiple frameworks into logical operational focus areas."}},
            {"@type":"Question","name":"Why are control domains useful in ASPIA UCL?","acceptedAnswer":{"@type":"Answer","text":"ASPIA UCL uses control domains to organize unified controls, making it easy to navigate, assign business ownership, and evaluate compliance posture by security area."}},
            {"@type":"Question","name":"How many control domains are included in ASPIA UCL?","acceptedAnswer":{"@type":"Answer","text":"ASPIA UCL includes standardized control domains covering all core cybersecurity disciplines, including Governance, Access Control, Cryptography, Network Security, Incident Response, and Physical Security."}},
            {"@type":"Question","name":"Can a single control domain map to multiple frameworks?","acceptedAnswer":{"@type":"Answer","text":"Yes! A single domain (e.g., Access Control) contains controls that simultaneously map to requirement clauses in ISO 27001, NIST CSF, PCI DSS, SOC 2, GDPR, and other regulatory standards."}}
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

        /* DYNAMIC DOMAINS CATALOG LAYOUT */
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
    <?php echo $__env->make('aspiaUcl.partials.header', ['activeTab' => 'domains'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- HERO BANNER (ISOMETRIC LOGO DESIGN - FULL VH SCREEN) -->
    <div class="hero-section">
        <div class="hero-container">
            <!-- Left Column: Content -->
            <div class="hero-content">
                <div class="hero-eyebrow">EXPLORE &bull; LEARN &bull; APPLY</div>
                <h1 class="hero-title">
                    Control Domains &amp;
                    <span class="highlight">Security Categories</span>
                </h1>
                <p class="hero-subtitle">
                    Complete guide to control domains, security categories, policy governance, risk management, and audit crosswalks in the ASPIA Unified Control Library.
                </p>

                <!-- 4 Feature Cards -->
                <div class="hero-features-grid">
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="hero-feature-text">
                            <span class="hero-feature-title">Comprehensive</span>
                            <span class="hero-feature-sub">Domain Scope</span>
                        </div>
                    </div>
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="hero-feature-text">
                            <span class="hero-feature-title">Governance</span>
                            <span class="hero-feature-sub">&amp; Policy</span>
                        </div>
                    </div>
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <div class="hero-feature-text">
                            <span class="hero-feature-title">Mappings</span>
                            <span class="hero-feature-sub">&amp; Relationships</span>
                        </div>
                    </div>
                    <div class="hero-feature-card">
                        <div class="hero-feature-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="hero-feature-text">
                            <span class="hero-feature-title">Auditable</span>
                            <span class="hero-feature-sub">Scope</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: 3D Isometric PNG Graphic -->
            <div class="hero-visual-wrapper">
                <img src="<?php echo e(asset('images/frameworks_hero_graphic.png')); ?>" alt="Control Domains Isometric Graphic" class="hero-isometric-img">
            </div>
        </div>
    </div>

    <!-- SECTION 1: OVERVIEW & BUSINESS VALUE (LIGHT BAND) -->
    <div class="section-light">
        <div class="section-container">
            <!-- SHORT ANSWER BOX -->
            <div class="callout-box" style="margin-top: 1.25rem;">
                <p class="callout-title">In Simple Terms:</p>
                <p class="callout-text">A control domain is a high-level security category (such as Access Control, Incident Management, or Asset Protection) that groups related security controls. ASPIA UCL organizes controls into standardized domains so you can structure governance policies, assign business ownership, and streamline compliance audits.</p>
            </div>

            <!-- WHAT ARE DOMAINS -->
            <div class="section-header-block" id="what-are" style="margin-top: 6.5rem;">
                <span class="section-badge">OVERVIEW</span>
                <h2 class="section-heading">What Are Control Domains?</h2>
            </div>
            <p style="line-height: 1.7; margin-bottom: 1.75rem;">Control domains are structural categories that organize information security requirements, policies, and technical safeguards into manageable operational focus areas. Published by international standards bodies and GRC frameworks (such as ISO/IEC 27001, NIST CSF, and CIS Controls), domains allow organizations to establish clear security boundaries, assign domain owners, and maintain systematic oversight across all cybersecurity operations.</p>
            <p style="line-height: 1.7; margin-bottom: 3.5rem;">By categorizing individual controls under standardized domains, enterprise security teams can simplify policy management, assess risk systematically, and map controls across multiple regulatory standards seamlessly.</p>

            <!-- WHY USED -->
            <div class="section-header-block" id="why-used" style="margin-top: 6.5rem;">
                <span class="section-badge">BUSINESS VALUE</span>
                <h2 class="section-heading">Why Are Control Domains Essential in GRC?</h2>
            </div>

            <div class="feature-grid">
                <div class="feature-card" style="border-top-color: #02CCFF;">
                    <strong>1. Organizes Security Governance</strong>
                    <p style="font-size:0.85rem;margin:0;">Categorizes security controls by operational discipline and policy focus area.</p>
                </div>
                <div class="feature-card" style="border-top-color: #00B8E6;">
                    <strong>2. Establishes Clear Ownership</strong>
                    <p style="font-size:0.85rem;margin:0;">Assigns domain responsibilities to specific business owners, CISOs, and security leads.</p>
                </div>
                <div class="feature-card" style="border-top-color: #1AD4FF;">
                    <strong>3. Simplifies Policy Structuring</strong>
                    <p style="font-size:0.85rem;margin:0;">Aligns corporate security policies directly with standardized control categories.</p>
                </div>
                <div class="feature-card" style="border-top-color: #33D6FF;">
                    <strong>4. Accelerates Audit Scoping</strong>
                    <p style="font-size:0.85rem;margin:0;">Evaluates compliance posture domain-by-domain rather than managing unorganized control lists.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2: DOMAIN DIRECTORY CATALOG (ALT BAND) -->
    <div class="section-alt">
        <div class="section-container">
            <!-- CATALOG TOOLBAR & DYNAMIC CARDS -->
            <div class="section-header-block" id="domains-catalog" style="margin-top: 0;">
                <span class="section-badge">DOMAIN DIRECTORY</span>
                <h2 class="section-heading">Explore Integrated Control Domains</h2>
                <p class="section-subtitle" style="color: #64748b; font-size: 0.95rem; margin-top: 0.4rem;">Browse all standardized security domains and governance categories in ASPIA UCL. Filter by search or browse domain codes, business owners, and mapped control counts.</p>
            </div>

            <div class="catalog-toolbar">
                <div class="search-input-group">
                    <i class="fas fa-search"></i>
                    <input type="text" id="domainSearchInput"
                        placeholder="Search domains by code, title, owner, overview..." onkeyup="filterDomains()">
                </div>
            </div>

            <!-- CLASSIC LIST TABLE HEADER STRIP -->
            <div class="list-table-header-bar" id="listTableHeaderBar">
                <div class="col-hdr col-hdr-id">Domain ID</div>
                <div class="col-hdr col-hdr-info">Domain Title &amp; Governance Scope</div>
                <div class="col-hdr col-hdr-scope">Mapped Controls &amp; Reqs</div>
                <div class="col-hdr col-hdr-action">Action</div>
            </div>

            <!-- CATALOG CARDS LIST -->
            <div class="catalog-list-wrapper">
                <div class="frameworks-cards-grid list-layout-view" id="domainsGrid">
                    <?php echo e(all_domains_grid); ?>

                </div>
            </div>

            <!-- PAGINATION BAR -->
            <div class="pagination-bar" id="domainsPaginationBar">
                <div class="pagination-info" id="paginationInfo">
                    Showing <strong>1</strong> - <strong>10</strong> of <strong><?php echo e(total_domains_count); ?></strong> Control Domains
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
                <h2 class="section-heading">Key Terms in Domain Architecture</h2>
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
                        <td><strong>Control Domain</strong></td>
                        <td>A top-level category grouping related security controls (e.g., Access Control, Data Protection, Incident Response).</td>
                    </tr>
                    <tr>
                        <td><strong>Domain Code / ID</strong></td>
                        <td>Standardized unique identifier (e.g., DOM-001, AC, IAM) assigned to each control domain.</td>
                    </tr>
                    <tr>
                        <td><strong>Business Owner</strong></td>
                        <td>Executive or department head responsible for domain policy enforcement and risk management.</td>
                    </tr>
                    <tr>
                        <td><strong>Security Control</strong></td>
                        <td>Specific policy safeguard, administrative procedure, or technical control mapped under the domain.</td>
                    </tr>
                    <tr>
                        <td><strong>Auditable Requirement</strong></td>
                        <td>Testable criteria and evidence requirement fulfilling framework compliance.</td>
                    </tr>
                </tbody>
            </table>

            <!-- TYPES OF DOMAINS -->
            <div class="section-header-block" id="domain-types" style="margin-top: 6.5rem; margin-bottom: 2.25rem;">
                <span class="section-badge">DOMAIN CATEGORIES</span>
                <h2 class="section-heading">Types of Control Domains in Information Security</h2>
            </div>

            <div class="feature-grid">
                <div class="feature-card" style="border-top: 3px solid #02CCFF;">
                    <strong>Administrative &amp; Governance</strong>
                    <p style="font-size:0.85rem;margin:0;">Policy management, risk assessment, organizational security, third-party vendor risk, and compliance oversight.</p>
                </div>
                <div class="feature-card" style="border-top: 3px solid #00B8E6;">
                    <strong>Technical &amp; Operational</strong>
                    <p style="font-size:0.85rem;margin:0;">Access control, identity management, cryptography, network security, and vulnerability management.</p>
                </div>
                <div class="feature-card" style="border-top: 3px solid #1AD4FF;">
                    <strong>Physical &amp; Environmental</strong>
                    <p style="font-size:0.85rem;margin:0;">Physical perimeter security, equipment protection, facility access, and environmental hazard prevention.</p>
                </div>
                <div class="feature-card" style="border-top: 3px solid #33D6FF;">
                    <strong>Resilience &amp; Incident Response</strong>
                    <p style="font-size:0.85rem;margin:0;">Business continuity, disaster recovery planning, incident management, logging, and security monitoring.</p>
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
                <h2 class="section-heading">Domain-to-Control Mapping Architecture</h2>
                <p class="section-subtitle" style="color: #64748b; font-size: 0.95rem; margin-top: 0.4rem;">Control domain mapping correlates high-level security categories with granular controls and regulatory clauses across ISO 27001, NIST CSF, PCI DSS, SOC 2, and GDPR.</p>
            </div>

            <div class="feature-grid" style="margin-top: 1.5rem;">
                <div class="feature-card" style="border-top-color: #02CCFF;">
                    <strong>Structured Domain Hierarchy</strong>
                    <p style="font-size:0.85rem;margin:0;">Groups granular controls logically under domain categories for intuitive navigation and governance.</p>
                </div>
                <div class="feature-card" style="border-top-color: #00B8E6;">
                    <strong>Multi-Framework Crosswalk</strong>
                    <p style="font-size:0.85rem;margin:0;">Each domain aggregates mapped requirement clauses from multiple global regulations.</p>
                </div>
                <div class="feature-card" style="border-top-color: #1AD4FF;">
                    <strong>Centralized Ownership Tracking</strong>
                    <p style="font-size:0.85rem;margin:0;">Enables domain leads to monitor compliance posture across all mapped frameworks simultaneously.</p>
                </div>
                <div class="feature-card" style="border-top-color: #33D6FF;">
                    <strong>Coverage &amp; Gap Analysis</strong>
                    <p style="font-size:0.85rem;margin:0;">Highlights unassigned controls or missing security safeguards within specific operational domains.</p>
                </div>
            </div>

            <div class="callout-box" style="margin-top: 2.75rem; margin-bottom: 2.75rem;">
                <p class="callout-title">How ASPIA UCL Domain Mapping Works:</p>
                <p class="callout-text">For example, the Access Control domain (DOM-001) aggregates controls for Identity &amp; Access Management, Multi-Factor Authentication, and Privileged Access. These controls map directly to <strong>ISO 27001:A.5.15-A.5.18</strong>, <strong>NIST CSF:PR.AA</strong>, <strong>SOC 2:CC6.1</strong>, and <strong>PCI DSS Requirement 7 &amp; 8</strong>.</p>
            </div>

            <!-- WORKFLOW DIAGRAM -->
            <div class="section-header-block" id="implementation-workflow" style="margin-top: 6.5rem; margin-bottom: 2.25rem;">
                <span class="section-badge">IMPLEMENTATION WORKFLOW</span>
                <h2 class="section-heading">Domain Implementation &amp; Governance Workflow</h2>
            </div>

            <div class="workflow-box">
                <div class="workflow-flow">
                    <div class="flow-step-dark">1. Define Control Domains</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-cyan">2. Assign Business Owners</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-dark">3. Map Unified Controls</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-cyan">4. Link Framework Clauses</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-dark">5. Test Control Samples</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-cyan">6. Remediate Domain Gaps</div>
                    <div class="flow-arrow">&darr;</div>
                    <div class="flow-step-dark">7. Continuous Domain Governance</div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 5: AUDIT READINESS CHECKLIST (LIGHT BAND) -->
    <div class="section-light">
        <div class="section-container">
            <div class="section-header-block" id="checklist" style="margin-top: 0;">
                <span class="section-badge">AUDIT READINESS</span>
                <h2 class="section-heading">Domain Compliance Readiness Checklist</h2>
            </div>

            <div class="checklist-grid">
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Domain scope &amp; boundaries defined</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Business owners &amp; leads assigned</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Domain policies drafted &amp; approved</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Sub-controls mapped to frameworks</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Technical safeguards deployed</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Domain risk assessment documented</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> User access reviews conducted</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Incident procedures validated</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Third-party domain risks logged</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Audit sampling evidence collected</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Exception register maintained</div>
                <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Continuous monitoring enabled</div>
            </div>
        </div>
    </div>

    <!-- SECTION 6: FAQ SECTION (ALT BAND) -->
    <div class="section-alt">
        <div class="section-container">
            <div class="section-header-block" id="faq" style="margin-top: 0;">
                <span class="section-badge">FAQ &amp; SUPPORT</span>
                <h2 class="section-heading">Frequently Asked Questions</h2>
                <p class="section-subtitle" style="color: #64748b; font-size: 0.95rem; margin-top: 0.4rem;">Quick answers to common questions about control domains, security categories, and governance mapping.</p>
            </div>

            <div class="faq-card-container" style="margin-bottom: 0;">
                <div class="faq-list">
                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">What is a control domain in cybersecurity?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">A control domain is a high-level grouping of related security controls, policies, and procedures (such as Access Control, Data Security, or Incident Management) designed to organize information security governance.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">How do control domains differ from compliance frameworks?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">A compliance framework (like ISO 27001 or NIST CSF) is an external regulatory standard. A control domain is an internal organizational category that groups controls across multiple frameworks into logical operational focus areas.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">Why are control domains useful in ASPIA UCL?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">ASPIA UCL uses control domains to organize unified controls, making it easy to navigate, assign business ownership, and evaluate compliance posture by security area.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">How many control domains are included in ASPIA UCL?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">ASPIA UCL includes standardized control domains covering all core cybersecurity disciplines, including Governance, Access Control, Cryptography, Network Security, Incident Response, and Physical Security.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">Can a single control domain map to multiple frameworks?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">Yes! A single domain (e.g., Access Control) contains controls that simultaneously map to requirement clauses in ISO 27001, NIST CSF, PCI DSS, SOC 2, GDPR, and other regulatory standards.</div>
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
            <p style="line-height: 1.7; margin: 0;">Organizing compliance around standardized control domains simplifies GRC management, establishes clear accountability, and ensures comprehensive security coverage across all operational and regulatory requirements.</p>
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
            const grid = document.getElementById('domainsGrid');
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
            const query = (document.getElementById('domainSearchInput')?.value || '').toLowerCase().trim();
            const cards = Array.from(document.querySelectorAll('.framework-card'));

            return cards.filter(card => {
                const text = card.textContent.toLowerCase();
                return !query || text.includes(query);
            });
        }

        function renderPagination() {
            const allCards = Array.from(document.querySelectorAll('.framework-card'));
            const matchingCards = getMatchingCards();
            const totalMatching = matchingCards.length;

            allCards.forEach(card => card.style.display = 'none');

            let emptyMsg = document.getElementById('noDomainsFoundMsg');
            if (totalMatching === 0) {
                if (!emptyMsg) {
                    emptyMsg = document.createElement('div');
                    emptyMsg.id = 'noDomainsFoundMsg';
                    emptyMsg.style.cssText = 'grid-column: 1 / -1; padding: 40px; text-align: center; color: #94a3b8; font-size: 1rem;';
                    emptyMsg.innerHTML = '<i class="fas fa-search" style="font-size:2rem;margin-bottom:10px;display:block;"></i>No matching domains found.';
                    const grid = document.getElementById('domainsGrid');
                    if (grid) grid.appendChild(emptyMsg);
                }
                emptyMsg.style.display = 'block';

                const pagBar = document.getElementById('domainsPaginationBar');
                if (pagBar) pagBar.style.display = 'none';
                return;
            }

            if (emptyMsg) emptyMsg.style.display = 'none';
            const pagBar = document.getElementById('domainsPaginationBar');
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
                infoEl.innerHTML = `Showing <strong>${startIndex + 1}</strong> - <strong>${endIndex}</strong> of <strong>${totalMatching}</strong> Control Domains`;
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

            const header = document.getElementById('listTableHeaderBar') || document.getElementById('domainSearchInput');
            if (header) {
                header.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }

        function filterDomains() {
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
            <h3 style="font-size: 2.15rem; font-weight: 800; color: #ffffff; margin: 0 0 0.8rem 0; letter-spacing: -0.02em;">Ready to Streamline Your Control Domains &amp; Governance Mapping?</h3>
            <p style="color: #94a3b8; font-size: 1.05rem; margin: 0 auto 2rem auto; line-height: 1.65;">Connect control domains with unified controls, auditable requirements, and sampling evidence in one centralized library.</p>
            <div class="cta-buttons" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;">
                <a href="https://aspiainfotech.com/" target="_blank" rel="noopener" class="btn-cta-primary">Explore ASPIA &rarr;</a>
                <a href="https://aspiainfotech.com/request-a-demo/" target="_blank" rel="noopener" class="btn-cta-secondary">Book a Demo</a>
            </div>
        </div>
        <?php echo $__env->make('aspiaUcl.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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

</html><?php /**PATH C:\xampp\htdocs\AspiaUCL\resources\views\aspiaUcl\domains\domains_overview.blade.php ENDPATH**/ ?>