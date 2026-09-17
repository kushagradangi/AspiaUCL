<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <!-- ==========================================================================
         1. SEO META TAGS & STRUCTURED DATA
         ========================================================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Domains & Security Categories Guide: Meaning, Types, Mappings & Controls | ASPIA UCL</title>
    <meta name="description"
        content="Complete guide to control domains, security categories, policy governance, risk management, and audit crosswalks in ASPIA Unified Control Library.">
    <meta name="keywords"
        content="control domains, security categories, governance, risk management, access control, incident response, UCL, ASPIA">
    <meta name="author" content="ASPIA Unified Control Library">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://aspiainfotech.com/domains-guide/">

    <!-- Open Graph (Facebook / LinkedIn) -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="Control Domains & Security Categories Guide | ASPIA UCL">
    <meta property="og:description"
        content="Complete guide to control domains, security categories, policy governance, risk management, and audit crosswalks in ASPIA Unified Control Library.">
    <meta property="og:url" content="https://aspiainfotech.com/domains-guide/">
    <meta property="og:site_name" content="ASPIA Unified Control Library">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Control Domains & Security Categories Guide | ASPIA UCL">
    <meta name="twitter:description"
        content="Complete guide to control domains, security categories, policy governance, risk management, and audit crosswalks in ASPIA Unified Control Library.">

    <!-- Schema.org JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "DefinedTermSet",
        "name": "ASPIA UCL Control Domains",
        "description": "Standardized control domains and security governance categories mapped under ASPIA Unified Control Library.",
        "publisher": {
            "@@type": "Organization",
            "name": "ASPIA Infotech"
        },
        "inLanguage": "en"
    }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&family=JetBrains+Mono:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* ==========================================================================
           2. ADORABLE DESIGN SYSTEM & CSS VARIABLES
           ========================================================================== */
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
            line-height: 1.7;
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

        /* HERO STYLES */
        .hero-card {
            background: linear-gradient(135deg, #0D1735 0%, #172540 60%, #16C4F4 100%);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            margin-bottom: 2.5rem;
            color: white;
            box-shadow: 0 12px 40px rgba(13, 23, 53, 0.25);
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
            border-top: 3px solid #16C4F4;
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
            padding: 1.2rem 1.5rem;
            margin: 2rem 0 1rem 0;
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

        /* CLASSIC COMPACT LIST FORMAT */
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
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.68rem;
            font-weight: 800;
            padding: 0 0.2rem 0 0;
            background: transparent;
            color: #0D1735;
            border: none;
        }

        .card-left-column .badge-code {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 0.15rem 0.4rem;
            border-radius: 4px;
            background: rgba(22, 196, 244, 0.12);
            color: #16C4F4;
            border: 1px solid rgba(22, 196, 244, 0.25);
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

        .flow-step-purple,
        .flow-step-cyan {
            background: #16C4F4;
            color: #0D1735;
            padding: 0.4rem 1.2rem;
            border-radius: 40px;
            display: inline-block;
            margin: 0.3rem;
            font-weight: 700;
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

            .hero-card {
                padding: 2rem 1.5rem;
            }
    </style>
</head>

<body>
    @include('aspiaUcl.partials.header', ['activeTab' => 'domains'])

    <div class="page-wrapper">

        <!-- HERO BANNER -->
        <div class="hero-card">
            <h1 class="hero-title">Control Domains &amp; Security Categories: Meaning, Architecture &amp; Governance
            </h1>
            <p class="hero-subtitle">Complete guide to control domains, security governance categories, risk management
                baselines, policy structures, and compliance mappings in ASPIA Unified Control Library.</p>
            <div class="hero-tags">
                <span class="hero-tag-pill"><i class="fas fa-cubes"></i> Unified Library</span>
                <span><i class="far fa-clock"></i> 12 min read</span>
                <span style="opacity:0.8;"><i class="far fa-calendar-alt"></i> September 2026</span>
                <span><i class="fas fa-user-edit"></i> ASPIA Editorial</span>
            </div>
        </div>

        <!-- SHORT ANSWER BOX -->
        <div class="callout-box">
            <p class="callout-title">In Simple Terms:</p>
            <p class="callout-text">A control domain is a high-level category that groups related security policies,
                technical safeguards, and audit controls (such as Access Control, Asset Management, or Incident
                Response). ASPIA UCL organizes all security requirements under standardized control domains so
                organizations can manage compliance efficiently across multiple frameworks.</p>
        </div>

        <!-- WHAT ARE DOMAINS -->
        <h2 id="what-are" class="section-heading">What Are Control Domains?</h2>
        <p>A control domain is a functional classification in information security and regulatory governance that groups
            logically related controls, security practices, and risk mitigation safeguards. Control domains provide a
            structured taxonomy for organizing policies, assigning business owners, and assessing security maturity.</p>
        <p>Instead of managing hundreds of isolated security controls independently, organizations structure their GRC
            program into core domains such as Identity &amp; Access Management (IAM), Data Protection (DAT), Risk
            Management (RSK), and Vulnerability Management (VUL).</p>

        <!-- WHY STRUCTURE BY DOMAINS -->
        <h2 id="why-used" class="section-heading">Why Structure Security by Control Domains?</h2>

        <div class="feature-grid">
            <div class="feature-card" style="border-top-color: #02CCFF;">
                <strong>1. Clear Governance Ownership</strong>
                <p style="font-size:0.85rem;margin:0;">Assigns direct accountability to specific business owners and
                    teams for each security category.</p>
            </div>
            <div class="feature-card" style="border-top-color: #00B8E6;">
                <strong>2. Standardized Taxonomy</strong>
                <p style="font-size:0.85rem;margin:0;">Establishes a common language across technical teams, internal
                    auditors, and executive leadership.</p>
            </div>
            <div class="feature-card" style="border-top-color: #1AD4FF;">
                <strong>3. Audit Crosswalk Efficiency</strong>
                <p style="font-size:0.85rem;margin:0;">Maps controls from ISO 27001, NIST, SOC 2, and PCI DSS into a
                    single domain structure to avoid duplicate testing.</p>
            </div>
            <div class="feature-card" style="border-top-color: #33D6FF;">
                <strong>4. Comprehensive Coverage</strong>
                <p style="font-size:0.85rem;margin:0;">Ensures no critical area of cybersecurity or regulatory
                    compliance is overlooked during risk assessments.</p>
            </div>
        </div>

        <!-- CATALOG TOOLBAR & DYNAMIC DOMAIN CARDS -->
        <h2 id="domains-catalog" class="section-heading">Explore Integrated Control Domains</h2>
        <p>Browse all standardized control domains mapped within ASPIA UCL. Search by domain ID, code, title, business
            owner, or functional scope.</p>

        <div class="catalog-toolbar">
            <div class="search-input-group">
                <i class="fas fa-search"></i>
                <input type="text" id="domainSearchInput"
                    placeholder="Search domains by ID, code, title, owner, purpose..." onkeyup="filterDomains()">
            </div>
        </div>

        <!-- CLASSIC LIST TABLE HEADER STRIP -->
        <div class="list-table-header-bar" id="listTableHeaderBar">
            <div class="col-hdr col-hdr-id">Domain ID</div>
            <div class="col-hdr col-hdr-info">Domain Name &amp; Business Owner</div>
            <div class="col-hdr col-hdr-scope">Mapped Audit Scope</div>
            <div class="col-hdr col-hdr-action">Action</div>
        </div>

        <!-- CATALOG CARDS LIST -->
        <div class="catalog-list-wrapper">
            <div class="frameworks-cards-grid list-layout-view" id="domainsGrid">
                            <div class="framework-card" data-dom-id="DOM-001">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-001</span>
                    <span class="badge-code">GOV</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/governance">Governance</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Board / CISO</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the foundational structures, processes, and accountabilities for information security and privacy oversight, defining how security decisions are made and how the security program is directed, monitored, and continuously improved.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">8</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">96</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/governance" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-002">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-002</span>
                    <span class="badge-code">POL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/policy-document-management">Policy &amp; Document Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Compliance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the lifecycle management of security and compliance policies, standards, procedures, and related documentation across the enterprise, ensuring consistent development, approval, communication, and maintenance.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">4</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">30</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/policy-document-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-003">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-003</span>
                    <span class="badge-code">RSK</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/risk-management">Risk Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Chief Risk Officer</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for identifying, assessing, prioritizing, treating, and monitoring information security and privacy risks across the enterprise, ensuring risks are managed within defined appetite and tolerance levels.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">9</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">90</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/risk-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-004">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-004</span>
                    <span class="badge-code">CMP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/compliance-management">Compliance Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Compliance Officer</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for identifying, managing, and demonstrating compliance with legal, regulatory, and contractual obligations, ensuring the organization meets all applicable requirements.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">7</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">70</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/compliance-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-005">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-005</span>
                    <span class="badge-code">REG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/regulatory-change-management">Regulatory Change Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Compliance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for identifying, assessing, and responding to changes in legal, regulatory, and contractual requirements, ensuring ongoing compliance with evolving obligations.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">0</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">0</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/regulatory-change-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-006">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-006</span>
                    <span class="badge-code">IAM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/identity-access-management">Identity &amp; Access Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>IAM Team</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for managing digital identities, controlling access to organizational resources, and ensuring that the right individuals and entities have appropriate access to systems, applications, and data.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">8</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">82</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/identity-access-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-007">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-007</span>
                    <span class="badge-code">AST</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/asset-management">Asset Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>IT Operations</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for identifying, classifying, and managing organizational assets, ensuring visibility into what assets exist and their security requirements.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">8</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">80</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/asset-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-008">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-008</span>
                    <span class="badge-code">DAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/data-protection-privacy">Data Protection &amp; Privacy</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Data Protection Officer</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for protecting personal and sensitive data throughout its lifecycle, ensuring privacy compliance and data security across all processing activities.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">16</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">160</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/data-protection-privacy" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-009">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-009</span>
                    <span class="badge-code">CRY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/cryptography-key-management">Cryptography &amp; Key Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Security Team</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for managing cryptographic controls, encryption technologies, and cryptographic keys to protect data at rest, in transit, and in use.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">5</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">50</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/cryptography-key-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-010">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-010</span>
                    <span class="badge-code">NET</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/network-security">Network Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Network Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for securing network infrastructure, controlling network communications, and protecting against network-based threats.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">8</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">80</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/network-security" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-011">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-011</span>
                    <span class="badge-code">END</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/endpoint-security">Endpoint Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Endpoint Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for securing endpoint devices including desktops, laptops, servers, and mobile devices against security threats.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/endpoint-security" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-012">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-012</span>
                    <span class="badge-code">CLD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/cloud-security">Cloud Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Cloud Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for securing cloud environments, services, and data across public, private, and hybrid cloud deployments.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">10</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">100</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/cloud-security" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-013">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-013</span>
                    <span class="badge-code">CFG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/secure-configuration-management">Secure Configuration Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>IT Operations</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for defining, maintaining, and enforcing secure configurations across systems, applications, and infrastructure.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/secure-configuration-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-014">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-014</span>
                    <span class="badge-code">VUL</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/vulnerability-patch-management">Vulnerability &amp; Patch Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Vulnerability Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for identifying, assessing, prioritizing, and remediating vulnerabilities across organizational systems and applications.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">8</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">80</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/vulnerability-patch-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-015">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-015</span>
                    <span class="badge-code">APP</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/application-security">Application Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Application Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for securing applications throughout their lifecycle, from design through development, testing, and deployment.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">12</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">120</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/application-security" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-016">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-016</span>
                    <span class="badge-code">ARC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/security-architecture">Security Architecture</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Enterprise Architecture</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for designing, governing, and implementing security architectures and principles across the enterprise.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/security-architecture" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-017">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-017</span>
                    <span class="badge-code">OPS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/it-operations-service-management">IT Operations &amp; Service Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>IT Operations</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for managing IT operations, services, and infrastructure security, ensuring operational stability and security.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">7</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">70</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/it-operations-service-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-018">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-018</span>
                    <span class="badge-code">SOC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/security-operations-monitoring">Security Operations &amp; Monitoring</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>SOC</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for operating security operations centers, detecting threats, and automating security responses.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">4</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">40</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/security-operations-monitoring" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-019">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-019</span>
                    <span class="badge-code">THR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/threat-intelligence-threat-management">Threat Intelligence &amp; Threat Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Threat Intelligence Team</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for collecting, analyzing, and using threat intelligence to understand and manage security threats.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">4</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">40</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/threat-intelligence-threat-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-020">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-020</span>
                    <span class="badge-code">INC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/incident-management">Incident Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Incident Response Team</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for preparing for, detecting, responding to, and recovering from security incidents.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">7</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">70</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/incident-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-021">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-021</span>
                    <span class="badge-code">BCM</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/business-continuity-disaster-recovery">Business Continuity &amp; Disaster Recovery</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>BCM Team</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for ensuring business continuity and IT disaster recovery capabilities, enabling resilience to disruptions.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/business-continuity-disaster-recovery" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-022">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-022</span>
                    <span class="badge-code">OPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/operational-resilience">Operational Resilience</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Business Resilience</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for ensuring the organization can withstand, adapt to, and recover from operational disruptions across business services and dependencies.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/operational-resilience" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-023">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-023</span>
                    <span class="badge-code">PHY</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/physical-environmental-security">Physical &amp; Environmental Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Facilities Security</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for securing physical facilities, protecting personnel, and managing environmental threats to critical infrastructure.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/physical-environmental-security" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-024">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-024</span>
                    <span class="badge-code">TPR</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/third-party-supply-chain-security">Third-Party &amp; Supply Chain Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Vendor Risk Management</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for managing security and compliance risks associated with third-party vendors, suppliers, and the extended supply chain.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/third-party-supply-chain-security" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-025">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-025</span>
                    <span class="badge-code">HRS</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/human-resource-security">Human Resource Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Human Resources</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for securing the workforce through screening, obligations, lifecycle management, and ethical standards.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">4</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">40</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/human-resource-security" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-026">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-026</span>
                    <span class="badge-code">SAT</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/security-awareness-training">Security Awareness &amp; Training</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Security Awareness Team</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for developing, delivering, and measuring security awareness and training programs across the workforce.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">4</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">40</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/security-awareness-training" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-027">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-027</span>
                    <span class="badge-code">AIG</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/ai-governance-model-security">AI Governance &amp; Model Security</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>AI Governance Committee</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for governing, securing, and managing artificial intelligence systems and AI-related risks across the enterprise.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">6</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">60</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/ai-governance-model-security" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-028">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-028</span>
                    <span class="badge-code">AUD</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/audit-assurance">Audit &amp; Assurance</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Internal Audit</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for internal and external audit, control assurance, and compliance validation to provide confidence in security controls.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">7</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">70</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/audit-assurance" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>            <div class="framework-card" data-dom-id="DOM-029">
                <div class="card-left-column">
                    <span class="badge-fw-id">DOM-029</span>
                    <span class="badge-code">EXC</span>
                </div>
                <div class="card-center-column">
                    <div class="title-category-row">
                        <h3 class="framework-title"><a href="http://localhost:8000/domains/exception-management">Exception Management</a></h3>
                    </div>
                    <div class="publisher-line">
                        <i class="fas fa-user-shield"></i> <span>Risk &amp; Compliance</span>
                        <span style="opacity:0.4;">|</span>
                        <span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px;">Establishes the processes for managing exceptions to security policies, standards, and control requirements in a controlled and governed manner.</span>
                    </div>
                </div>
                <div class="card-scope-column">
                    <div class="scope-badges-strip">
                        <span class="scope-pill"><strong class="num">2</strong> Controls</span>
                        <span class="scope-pill">•</span>
                        <span class="scope-pill"><strong class="num">20</strong> Reqs</span>
                    </div>
                </div>
                <div class="card-action-column">
                    <a href="http://localhost:8000/domains/exception-management" class="btn-explore-framework">
                        <span>Explore Domain</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            </div>
        </div>

        <!-- PAGINATION BAR -->
        <div class="pagination-bar" id="domainsPaginationBar">
            <div class="pagination-info" id="paginationInfo">
                Showing <strong>1</strong> - <strong>10</strong> of <strong>29</strong> Control Domains
            </div>
            <div class="pagination-buttons" id="paginationButtons">
                <!-- Dynamically populated via JS -->
            </div>
        </div>

        <!-- KEY TERMS TABLE -->
        <h2 id="key-terms" class="section-heading">Key Terms Used in Domain Architecture</h2>

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
                    <td>A top-level functional category grouping related security controls and risk mitigation
                        practices.</td>
                </tr>
                <tr>
                    <td><strong>Domain Code</strong></td>
                    <td>A standardized short identifier (e.g., IAM, GOV, NET, DAT) used for crosswalk referencing and
                        tags.</td>
                </tr>
                <tr>
                    <td><strong>Business Owner</strong></td>
                    <td>The designated executive or department accountable for enforcing controls within a domain.</td>
                </tr>
                <tr>
                    <td><strong>Security Control</strong></td>
                    <td>A technical, administrative, or physical safeguard residing within a specific domain.</td>
                </tr>
                <tr>
                    <td><strong>Domain Scope</strong></td>
                    <td>The operational boundaries and applicable assets covered under a specific domain baseline.</td>
                </tr>
            </tbody>
        </table>

        <!-- DOMAIN CATEGORIES ARCHITECTURE -->
        <h2 id="domain-categories" class="section-heading">Domain Architecture &amp; Governance Classification</h2>

        <div class="feature-grid">
            <div class="feature-card" style="border-left: 4px solid #16C4F4; border-top: none;">
                <strong>Governance &amp; Oversight</strong>
                <p style="font-size:0.85rem;margin:0;">Foundational oversight domains defining security strategy,
                    policies, risk management, and compliance governance (GOV, POL, RSK, CMP).</p>
            </div>
            <div class="feature-card" style="border-left: 4px solid #16C4F4; border-top: none;">
                <strong>Technical Safeguards</strong>
                <p style="font-size:0.85rem;margin:0;">Core technical domains protecting infrastructure, endpoints,
                    applications, and networks (IAM, NET, END, CLD, APP, CRY).</p>
            </div>
            <div class="feature-card" style="border-left: 4px solid #22C55E; border-top: none;">
                <strong>Operations &amp; Resilience</strong>
                <p style="font-size:0.85rem;margin:0;">Operational domains ensuring continuous monitoring, incident
                    management, and business continuity (SOC, INC, BCM, OPR, VUL).</p>
            </div>
            <div class="feature-card" style="border-left: 4px solid #F59E0B; border-top: none;">
                <strong>Organization &amp; Third-Party</strong>
                <p style="font-size:0.85rem;margin:0;">Human resources, vendor risk, physical security, and emerging
                    tech governance (HRS, SAT, TPR, PHY, AIG, AUD).</p>
            </div>
        </div>

        <!-- CROSSWALK & MAPPING -->
        <h2 id="crosswalk-mapping" class="section-heading">Crosswalk &amp; Framework Mapping Architecture</h2>
        <p>Control domain crosswalk mapping correlates controls across global security frameworks (ISO 27001, NIST CSF,
            SOC 2, PCI DSS) to standardized ASPIA UCL domains. By organizing requirements into unified domains,
            organizations achieve seamless audit mapping and gap analysis.</p>

        <div class="feature-grid" style="margin-top: 1.5rem;">
            <div class="feature-card" style="border-top-color: #02CCFF;">
                <strong>Unified Domain Mapping</strong>
                <p style="font-size:0.85rem;margin:0;">Maps overlapping framework clauses directly to a central domain,
                    eliminating redundant controls.</p>
            </div>
            <div class="feature-card" style="border-top-color: #00B8E6;">
                <strong>Single Evidence Repository</strong>
                <p style="font-size:0.85rem;margin:0;">Collect audit evidence once per domain control to satisfy
                    multiple regulatory assessments simultaneously.</p>
            </div>
            <div class="feature-card" style="border-top-color: #1AD4FF;">
                <strong>Domain Gap Analysis</strong>
                <p style="font-size:0.85rem;margin:0;">Instantly identify domains with missing controls when adopting
                    new compliance standards.</p>
            </div>
            <div class="feature-card" style="border-top-color: #33D6FF;">
                <strong>Domain Owner Accountability</strong>
                <p style="font-size:0.85rem;margin:0;">Empowers domain business owners with complete visibility into
                    compliance status across frameworks.</p>
            </div>
        </div>

        <div class="callout-box" style="margin-top: 1.5rem;">
            <p class="callout-title">How ASPIA UCL Crosswalk Works:</p>
            <p class="callout-text">For example, controls in the <strong>Identity &amp; Access Management (IAM)</strong>
                domain map directly to <strong>ISO 27001:A.5.15</strong>, <strong>NIST CSF:PR.AA-01</strong>,
                <strong>SOC 2:CC6.1</strong>, and <strong>PCI DSS:7.1.1</strong>. Testing IAM controls once satisfies
                all four compliance baselines.
            </p>
        </div>

        <!-- WORKFLOW DIAGRAM -->
        <h2 id="implementation-workflow" class="section-heading">Domain Lifecycle &amp; Governance Workflow</h2>

        <div class="workflow-box">
            <div class="workflow-flow">
                <div class="flow-step-dark">1. Define Domain Taxonomies &amp; Scope</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-cyan">2. Assign Business Owners</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-dark">3. Map Security Controls to Domains</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-cyan">4. Crosswalk Regulatory Requirements</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-dark">5. Execute Domain Audit Testing</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-cyan">6. Remediate Control Deficiencies</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-dark">7. Continuous Domain Risk Monitoring</div>
            </div>
        </div>

        <!-- CHECKLIST -->
        <h2 id="checklist" class="section-heading">Domain Governance Readiness Checklist</h2>

        <div class="checklist-grid">
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Control domain
                taxonomies established</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Domain business
                owners designated</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Domain policy scope
                defined</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Security controls
                assigned to domains</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Regulatory frameworks
                crosswalked</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Domain risk
                assessments completed</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Audit evidence
                collection automated</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Key performance
                indicators (KPIs) set</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Exception tracking
                workflow active</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Executive reporting
                dashboards ready</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Continuous monitoring
                triggers set</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Annual domain reviews
                scheduled</div>
        </div>

        <!-- FAQ SECTION -->
        <h2 id="faq" class="section-heading">Frequently Asked Questions</h2>

        <div class="faq-item">
            <div class="faq-question">
                <span>What is a control domain in security governance?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                A control domain is a high-level category that groups related security policies, technical controls, and
                compliance safeguards (e.g., Access Control, Asset Management, Incident Management) to simplify GRC
                administration.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>How many control domains are in ASPIA UCL?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                ASPIA UCL features 29 standardized control domains covering Governance, Risk Management, Technical
                Safeguards, Operations, Privacy, and Emerging Technology governance.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>How do domain crosswalks reduce audit burden?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                Domain crosswalks link overlapping requirements from ISO 27001, NIST CSF, SOC 2, and PCI DSS to a single
                domain baseline, enabling "test once, comply with many" efficiency.
            </div>
        </div>

        <!-- CONCLUSION & CTA BANNER -->
        <h2 id="conclusion" class="section-heading">Final Takeaway</h2>
        <p>Structuring information security and GRC under standardized control domains provides clarity, ownership, and
            audit efficiency. ASPIA UCL unifies 29 control domains across global compliance frameworks so organizations
            can operate securely and pass audits with confidence.</p>

        <div class="cta-banner">
            <h3 class="cta-title">Ready to Streamline Your Control Domains &amp; Compliance Architecture?</h3>
            <p class="cta-desc">Connect control domains with regulatory frameworks, security controls, and auditable
                requirements in one centralized unified control library.</p>
            <div class="cta-buttons">
                <a href="https://aspiainfotech.com/" target="_blank" rel="noopener" class="btn-cta-primary">Explore
                    ASPIA →</a>
                <a href="https://aspiainfotech.com/request-a-demo/" target="_blank" rel="noopener"
                    class="btn-cta-secondary">Book a Demo</a>
            </div>
        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script>
        function playThemeSound(isDark) {
            try {
                const ctx = new (window.AudioContext || window.webkitAudioContext)();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.type = 'sine';
                osc.frequency.setValueAtTime(isDark ? 220 : 520, ctx.currentTime);
                osc.frequency.exponentialRampToValueAtTime(isDark ? 440 : 880, ctx.currentTime + 0.12);
                gain.gain.setValueAtTime(0.08, ctx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.12);
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

        // Initialize Theme on page load
        (function () {
            const savedTheme = localStorage.getItem('aspia_theme') ||
                (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            setTheme(savedTheme, false);
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
                    emptyMsg.style.cssText = 'padding: 40px; text-align: center; color: #94a3b8; font-size: 1rem;';
                    emptyMsg.innerHTML = '<i class="fas fa-search" style="font-size:2rem;margin-bottom:10px;display:block;"></i>No matching control domains found.';
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
                    matchingCards[i].style.display = 'flex';
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

        document.addEventListener('DOMContentLoaded', function () {
            renderPagination();
        });
        renderPagination();
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