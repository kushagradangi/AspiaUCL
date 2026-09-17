<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <!-- ==========================================================================
         1. SEO META TAGS & STRUCTURED DATA
         ========================================================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Controls & Safeguards Guide: Meaning, Types, Mappings & Controls | ASPIA UCL</title>
    <meta name="description"
        content="Complete guide to security controls, baseline safeguards, risk management baselines, policy structures, and compliance mappings in ASPIA Unified Control Library.">
    <meta name="keywords"
        content="security controls, safeguards, governance, risk management, access control, incident response, UCL, ASPIA">
    <meta name="author" content="ASPIA Unified Control Library">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://aspiainfotech.com/controls-guide/">

    <!-- Open Graph (Facebook / LinkedIn) -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="Security Controls & Safeguards Guide | ASPIA UCL">
    <meta property="og:description"
        content="Complete guide to security controls, baseline safeguards, risk management baselines, policy structures, and compliance mappings in ASPIA Unified Control Library.">
    <meta property="og:url" content="https://aspiainfotech.com/controls-guide/">
    <meta property="og:site_name" content="ASPIA Unified Control Library">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Security Controls & Safeguards Guide | ASPIA UCL">
    <meta name="twitter:description"
        content="Complete guide to security controls, baseline safeguards, risk management baselines, policy structures, and compliance mappings in ASPIA Unified Control Library.">

    <!-- Schema.org JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "DefinedTermSet",
        "name": "ASPIA UCL Security Controls",
        "description": "Standardized security controls and compliance categories mapped under ASPIA Unified Control Library.",
        "publisher": {
            "@type": "Organization",
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

            .list-table-header-bar {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <?php echo $__env->make('aspiaUcl.partials.header', ['activeTab' => 'controls'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="page-wrapper">

        <!-- HERO BANNER -->
        <div class="hero-card">
            <h1 class="hero-title">Security Controls &amp; Safeguards: Meaning, Architecture &amp; Governance</h1>
            <p class="hero-subtitle">Complete guide to security controls, baseline safeguards, risk management
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
            <p class="callout-text">A security control is a high-level technical, administrative, or physical safeguard
                (such as Multi-Factor Authentication, Access Control, Encryption, or Incident Response) designed to
                protect assets and manage risk. ASPIA UCL organizes all controls into standardized baselines so
                organizations can manage compliance efficiently across multiple frameworks.</p>
        </div>

        <!-- WHAT ARE CONTROLS -->
        <h2 id="what-are" class="section-heading">What Are Security Controls?</h2>
        <p>A security control is a functional safeguard or countermeasure in information security and regulatory
            governance that mitigates specific security risks, protects organizational assets, and satisfies compliance
            mandates. Security controls provide a structured baseline for operationalizing policies and preventing
            security incidents.</p>
        <p>Instead of managing disparate compliance tasks independently, organizations structure their GRC and
            cybersecurity programs around core security controls such as Multi-Factor Authentication (IAM-001), Secure
            Configuration Baseline (CFG-001), Vulnerability Scanning (VUL-001), and Incident Response (INC-001).</p>

        <!-- WHY STRUCTURE BY CONTROLS -->
        <h2 id="why-used" class="section-heading">Why Structure Compliance by Security Controls?</h2>

        <div class="feature-grid">
            <div class="feature-card" style="border-top-color: #02CCFF;">
                <strong>1. Clear Safeguard Accountability</strong>
                <p style="font-size:0.85rem;margin:0;">Assigns direct operational responsibility to specific technical
                    owners and teams for each control implementation.</p>
            </div>
            <div class="feature-card" style="border-top-color: #00B8E6;">
                <strong>2. Standardized Safeguard Taxonomy</strong>
                <p style="font-size:0.85rem;margin:0;">Establishes a common security language across engineering teams,
                    internal auditors, and executive leadership.</p>
            </div>
            <div class="feature-card" style="border-top-color: #1AD4FF;">
                <strong>3. Audit Crosswalk Efficiency</strong>
                <p style="font-size:0.85rem;margin:0;">Maps controls from ISO 27001, NIST, SOC 2, and PCI DSS into
                    unified safeguards to eliminate duplicate testing.</p>
            </div>
            <div class="feature-card" style="border-top-color: #33D6FF;">
                <strong>4. Comprehensive Risk Defense</strong>
                <p style="font-size:0.85rem;margin:0;">Ensures complete coverage across physical, administrative, and
                    technical threat vectors during risk assessments.</p>
            </div>
        </div>

        <!-- CATALOG TOOLBAR & DYNAMIC CONTROL CARDS -->
        <h2 id="controls-catalog" class="section-heading">Explore Integrated Security Controls</h2>
        <p>Browse all standardized security controls mapped within ASPIA UCL. Search by control ID, code, title, domain,
            or functional scope.</p>

        <div class="catalog-toolbar">
            <div class="search-input-group">
                <i class="fas fa-search"></i>
                <input type="text" id="controlSearchInput"
                    placeholder="Search controls by ID, code, title, domain, purpose..." onkeyup="filterControls()">
            </div>
        </div>

        <!-- CLASSIC LIST TABLE HEADER STRIP -->
        <div class="list-table-header-bar" id="listTableHeaderBar">
            <div class="col-hdr col-hdr-id">Control ID</div>
            <div class="col-hdr col-hdr-info">Control Name &amp; Category Overview</div>
            <div class="col-hdr col-hdr-scope">Mapped Domain Scope</div>
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
                Showing <strong>1</strong> - <strong>10</strong> of <strong>190</strong> Security
                Controls
            </div>
            <div class="pagination-buttons" id="paginationButtons">
                <!-- Dynamically populated via JS -->
            </div>
        </div>

        <!-- KEY TERMS TABLE -->
        <h2 id="key-terms" class="section-heading">Key Terms Used in Control Architecture</h2>

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
                    <td>A technical, administrative, or physical safeguard designed to prevent, detect, or correct
                        security risks.</td>
                </tr>
                <tr>
                    <td><strong>Control ID</strong></td>
                    <td>A standardized unique identifier (e.g., IAM-001, NET-002, CRY-001) used for crosswalk
                        referencing and tags.</td>
                </tr>
                <tr>
                    <td><strong>Control Category</strong></td>
                    <td>The functional classification of a safeguard (Preventative, Detective, Corrective, Governance).
                    </td>
                </tr>
                <tr>
                    <td><strong>Requirement Specification</strong></td>
                    <td>The detailed technical or procedural implementation task required to satisfy the control.</td>
                </tr>
                <tr>
                    <td><strong>Audit Evidence</strong></td>
                    <td>The documentation, log files, or configurations collected to demonstrate control effectiveness.
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- CONTROL CATEGORIES ARCHITECTURE -->
        <h2 id="control-categories" class="section-heading">Control Architecture &amp; Safeguard Classification</h2>

        <div class="feature-grid">
            <div class="feature-card" style="border-left: 4px solid #16C4F4; border-top: none;">
                <strong>Governance &amp; Administrative</strong>
                <p style="font-size:0.85rem;margin:0;">Policies, standards, awareness training, and risk management
                    oversight defining operational boundaries (GOV, POL, RSK, CMP).</p>
            </div>
            <div class="feature-card" style="border-left: 4px solid #16C4F4; border-top: none;">
                <strong>Technical Safeguards</strong>
                <p style="font-size:0.85rem;margin:0;">Core technical mechanisms protecting infrastructure, endpoints,
                    cloud, and data (IAM, NET, END, CLD, APP, CRY).</p>
            </div>
            <div class="feature-card" style="border-left: 4px solid #22C55E; border-top: none;">
                <strong>Operations &amp; Detection</strong>
                <p style="font-size:0.85rem;margin:0;">Operational controls ensuring threat detection, SIEM monitoring,
                    vulnerability management, and incident response (SOC, INC, VUL, BCM).</p>
            </div>
            <div class="feature-card" style="border-left: 4px solid #F59E0B; border-top: none;">
                <strong>Physical &amp; Emerging Tech</strong>
                <p style="font-size:0.85rem;margin:0;">Environmental safeguards, physical access, vendor security, and
                    artificial intelligence governance (PHY, TPR, AIG, AUD).</p>
            </div>
        </div>

        <!-- CROSSWALK & MAPPING -->
        <h2 id="crosswalk-mapping" class="section-heading">Crosswalk &amp; Framework Mapping Architecture</h2>
        <p>Control crosswalk mapping correlates security safeguards across global standards (ISO 27001, NIST CSF, SOC 2,
            PCI DSS) to standardized ASPIA UCL controls. By organizing requirements into unified controls, organizations
            achieve seamless audit mapping and gap analysis.</p>

        <div class="feature-grid" style="margin-top: 1.5rem;">
            <div class="feature-card" style="border-top-color: #02CCFF;">
                <strong>Unified Control Mapping</strong>
                <p style="font-size:0.85rem;margin:0;">Maps overlapping framework clauses directly to a central security
                    control, eliminating redundant testing.</p>
            </div>
            <div class="feature-card" style="border-top-color: #00B8E6;">
                <strong>Single Evidence Repository</strong>
                <p style="font-size:0.85rem;margin:0;">Collect audit evidence once per control to satisfy multiple
                    regulatory assessments simultaneously.</p>
            </div>
            <div class="feature-card" style="border-top-color: #1AD4FF;">
                <strong>Control Gap Analysis</strong>
                <p style="font-size:0.85rem;margin:0;">Instantly identify missing safeguards when adopting new
                    regulatory frameworks or security benchmarks.</p>
            </div>
            <div class="feature-card" style="border-top-color: #33D6FF;">
                <strong>Control Owner Accountability</strong>
                <p style="font-size:0.85rem;margin:0;">Empowers control owners with complete visibility into compliance
                    status across frameworks.</p>
            </div>
        </div>

        <div class="callout-box" style="margin-top: 1.5rem;">
            <p class="callout-title">How ASPIA UCL Crosswalk Works:</p>
            <p class="callout-text">For example, the control <strong>Multi-Factor Authentication (IAM-001)</strong> maps
                directly to <strong>ISO 27001:A.5.15</strong>, <strong>NIST CSF:PR.AA-01</strong>, <strong>SOC
                    2:CC6.1</strong>, and <strong>PCI DSS:8.3.1</strong>. Testing IAM-001 once satisfies all four
                compliance baselines.</p>
        </div>

        <!-- WORKFLOW DIAGRAM -->
        <h2 id="implementation-workflow" class="section-heading">Control Lifecycle &amp; Governance Workflow</h2>

        <div class="workflow-box">
            <div class="workflow-flow">
                <div class="flow-step-dark">1. Define Control Taxonomies &amp; Objectives</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-cyan">2. Assign Control Owners</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-dark">3. Map Security Controls to Frameworks</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-cyan">4. Define Technical Requirements &amp; Tests</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-dark">5. Execute Control Audit Testing</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-cyan">6. Remediate Control Deficiencies</div>
                <div class="flow-arrow">↓</div>
                <div class="flow-step-dark">7. Continuous Control Risk Monitoring</div>
            </div>
        </div>

        <!-- CHECKLIST -->
        <h2 id="checklist" class="section-heading">Control Governance Readiness Checklist</h2>

        <div class="checklist-grid">
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Security control
                catalog established</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Control business
                owners designated</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Control baseline
                scope defined</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Security controls
                assigned to domains</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Regulatory frameworks
                crosswalked</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Control risk
                assessments completed</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Audit evidence
                collection automated</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Key performance
                indicators (KPIs) set</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Deficiency tracking
                workflow active</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Executive reporting
                dashboards ready</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Continuous monitoring
                triggers set</div>
            <div class="checklist-item"><i class="far fa-check-square" style="color:#16C4F4;"></i> Annual control
                reviews scheduled</div>
        </div>

        <!-- FAQ SECTION -->
        <h2 id="faq" class="section-heading">Frequently Asked Questions</h2>

        <div class="faq-item">
            <div class="faq-question">
                <span>What is a security control in governance?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                A security control is a discrete safeguard, countermeasure, or policy requirement (e.g., Access Control,
                Asset Management, Incident Management) designed to protect confidentiality, integrity, and availability.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>How many security controls are in ASPIA UCL?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                ASPIA UCL features baseline controls spanning 29 standardized domains covering Governance, Risk
                Management, Technical Safeguards, Operations, Privacy, and Emerging Technology governance.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>How do control crosswalks reduce audit burden?</span>
                <span>−</span>
            </div>
            <div class="faq-answer">
                Control crosswalks link overlapping requirements from ISO 27001, NIST CSF, SOC 2, and PCI DSS to a
                single baseline control, enabling "test once, comply with many" efficiency.
            </div>
        </div>

        <!-- CONCLUSION & CTA BANNER -->
        <h2 id="conclusion" class="section-heading">Final Takeaway</h2>
        <p>Structuring information security and GRC under standardized security controls provides operational clarity,
            ownership, and audit efficiency. ASPIA UCL unifies controls across global compliance frameworks so
            organizations can operate securely and pass audits with confidence.</p>

        <div class="cta-banner">
            <h3 class="cta-title">Ready to Streamline Your Security Controls &amp; Compliance Architecture?</h3>
            <p class="cta-desc">Connect security controls with regulatory frameworks, control domains, and auditable
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
            const query = (document.getElementById('controlSearchInput')?.value || '').toLowerCase().trim();
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

            let emptyMsg = document.getElementById('noControlsFoundMsg');
            if (totalMatching === 0) {
                if (!emptyMsg) {
                    emptyMsg = document.createElement('div');
                    emptyMsg.id = 'noControlsFoundMsg';
                    emptyMsg.style.cssText = 'padding: 40px; text-align: center; color: #94a3b8; font-size: 1rem;';
                    emptyMsg.innerHTML = '<i class="fas fa-search" style="font-size:2rem;margin-bottom:10px;display:block;"></i>No matching security controls found.';
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
                    matchingCards[i].style.display = 'flex';
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

            const header = document.getElementById('listTableHeaderBar') || document.getElementById('controlSearchInput');
            if (header) {
                header.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }

        function filterControls() {
            currentPage = 1;
            renderPagination();
        }

        document.addEventListener('DOMContentLoaded', function () {
            renderPagination();
        });
        renderPagination();
    </script>

    <?php echo $__env->make('aspiaUcl.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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

</html><?php /**PATH C:\xampp\htdocs\AspiaUCL\storage\framework\views/5951b6f1217172dcf741a6f511eeb51b.blade.php ENDPATH**/ ?>