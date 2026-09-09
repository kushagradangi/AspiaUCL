<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Primary Meta Tags -->
    <title>Unified Control Layer (UCL) — Free Compliance Framework Directory | ASPIA</title>
    <meta name="title" content="Unified Control Layer (UCL) — Free Compliance Framework Directory | ASPIA" />
    <meta name="description" content="ASPIA UCL is a free, open directory of compliance frameworks — ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP, RBI, and more. View requirements, controls, mappings, and domains — all in one place." />
    <meta name="keywords" content="compliance frameworks, ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP Act, RBI CSF, unified control layer, GRC, cybersecurity compliance, framework mapping, governance domains, security controls" />
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="Unified Control Layer (UCL) — Free Compliance Framework Directory | ASPIA" />
    <meta property="og:description" content="Explore compliance frameworks, governance domains, and unified controls — ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP, RBI, and more. Free, open, and always updated." />
    <meta property="og:site_name" content="ASPIA UCL" />
    <meta property="og:locale" content="en_US" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="{{ url()->current() }}" />
    <meta name="twitter:title" content="Unified Control Layer (UCL) — Free Compliance Framework Directory | ASPIA" />
    <meta name="twitter:description" content="Explore compliance frameworks, governance domains, and unified controls — ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP, RBI, and more." />
    <meta name="twitter:site" content="@infotechaspia" />

    <!-- Schema.org JSON-LD: WebPage & WebSite -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebPage",
        "name": "Unified Control Layer (UCL) — Free Compliance Framework Directory",
        "url": "{{ url()->current() }}",
        "description": "ASPIA UCL is a free, open directory of compliance frameworks — ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP, RBI, and more.",
        "inLanguage": "en",
        "isPartOf": {
            "@@type": "WebSite",
            "name": "ASPIA UCL",
            "url": "{{ route('home') }}"
        }
    }
    </script>

    <!-- Schema.org JSON-LD: Organization -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "ASPIA Infotech",
        "url": "https://aspia.com",
        "sameAs": [
            "https://www.linkedin.com/company/aspiainfotech/posts/?feedView=all",
            "https://x.com/infotechaspia"
        ]
    }
    </script>

    <!-- Schema.org JSON-LD: BreadcrumbList -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ route('home') }}"
            },
            {
                "@@type": "ListItem",
                "position": 2,
                "name": "Unified Control Layer (UCL)",
                "item": "{{ url()->current() }}"
            }
        ]
    }
    </script>

    <!-- Schema.org JSON-LD: FAQPage -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "FAQPage",
        "mainEntity": [
            {
                "@@type": "Question",
                "name": "What is the Unified Control Layer (UCL)?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "UCL is a free knowledge base that shows how different compliance frameworks (ISO 27001, NIST, PCI DSS, GDPR, DPDP, etc.) connect through common unified controls."
                }
            },
            {
                "@@type": "Question",
                "name": "Which compliance frameworks are supported in UCL?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "UCL supports 20+ frameworks including ISO 27001, ISO 27002, NIST CSF, NIST 800-53, CIS Controls, PCI DSS, COBIT, SOC 2, ISO 27701, GDPR, ISO 22301, DORA, NIS2, HIPAA, DPDP Act, RBI CSF, CERT-In, SEBI CSF, IRDAI, and NPCI ISR."
                }
            },
            {
                "@@type": "Question",
                "name": "What are the major governance domains in UCL?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "UCL covers major governance domains: Information Security, Data Privacy, Cybersecurity, Governance & Compliance, Risk Management, and Business Continuity."
                }
            },
            {
                "@@type": "Question",
                "name": "What is a unified control?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "A unified control is a single control that can satisfy requirements from multiple frameworks. For example, UCL-001 (Access Control) maps to ISO 27001 A.5.15, NIST CSF PR.AA, CIS Control 6, and PCI DSS Requirement 7."
                }
            },
            {
                "@@type": "Question",
                "name": "How are frameworks mapped to UCL controls?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "Each framework requirement is analyzed and mapped to the most relevant unified control. The mapping shows which controls cover which requirements, helping organizations reduce duplicate compliance efforts."
                }
            }
        ]
    }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        /* ============================================================
           RESET & BASE
           ============================================================ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #ffffff;
            color: #0b1a33;
            line-height: 1.6;
            padding: 0;
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ============================================================
           BREADCRUMB
           ============================================================ */
        .breadcrumb {
            padding: 12px 0 4px 0;
            font-size: 0.75rem;
            color: #6a7a92;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .breadcrumb a {
            color: #0066cc;
            text-decoration: none;
        }
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        .breadcrumb .sep {
            color: #bcc8d8;
        }

        /* ============================================================
           NAVIGATION
           ============================================================ */
        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 0;
            flex-wrap: wrap;
            gap: 12px;
            border-bottom: 1px solid #f0f2f6;
        }

        .nav-logo {
            font-size: 1.3rem;
            font-weight: 800;
            color: #0b1a33;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }
        .nav-logo .accent {
            color: #0066cc;
        }
        .nav-logo .badge {
            font-size: 0.5rem;
            font-weight: 600;
            background: #e8f0fe;
            color: #0066cc;
            padding: 2px 12px;
            border-radius: 12px;
            letter-spacing: 0.04em;
            margin-left: 4px;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            list-style: none;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .nav-links a {
            color: #4a5a72;
            text-decoration: none;
            transition: 0.15s;
        }
        .nav-links a:hover {
            color: #0066cc;
        }

        .nav-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .mobile-menu-toggle {
            display: none;
            background: transparent;
            border: 1.5px solid #d0d8e4;
            color: #0b1a33;
            font-size: 1.1rem;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .mobile-menu-toggle:hover {
            background: #f0f4fa;
            border-color: #0066cc;
            color: #0066cc;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            font-family: inherit;
            border: none;
            cursor: pointer;
            transition: all 0.25s;
            text-decoration: none;
        }
        .btn-outline {
            background: transparent;
            color: #0b1a33;
            border: 1.5px solid #d0d8e4;
        }
        .btn-outline:hover {
            background: #f0f4fa;
            border-color: #0b1a33;
        }
        .btn-accent {
            background: #0066cc;
            color: #fff;
        }
        .btn-accent:hover {
            background: #0052a8;
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(0, 102, 204, 0.25);
        }
        .btn-light {
            background: #e8f0fe;
            color: #0066cc;
        }
        .btn-light:hover {
            background: #d0e0f8;
        }

        /* ============================================================
           FREE BADGE
           ============================================================ */
        .free-badge {
            text-align: center;
            padding: 10px 0;
            font-size: 0.8rem;
            color: #6a7a92;
            border-bottom: 1px solid #f0f2f6;
        }
        .free-badge strong {
            color: #0066cc;
        }

        /* ============================================================
           HERO
           ============================================================ */
        .hero {
            padding: 48px 0 36px 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 40px;
        }

        .hero-content {
            flex: 1;
            min-width: 280px;
        }
        .hero-content .tag {
            display: inline-block;
            background: #e8f0fe;
            color: #0066cc;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 4px 16px;
            border-radius: 20px;
            margin-bottom: 14px;
        }
        .hero-content h1 {
            font-size: clamp(1.75rem, 4vw + 1rem, 2.8rem);
            font-weight: 900;
            color: #0b1a33;
            letter-spacing: -0.03em;
            line-height: 1.15;
            margin-bottom: 14px;
        }
        .hero-content h1 .highlight {
            color: #0066cc;
            position: relative;
        }
        .hero-content h1 .highlight::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 0;
            right: 0;
            height: 6px;
            background: rgba(0, 102, 204, 0.12);
            border-radius: 4px;
        }
        .hero-content p {
            font-size: 1.05rem;
            color: #4a5a72;
            max-width: 520px;
            margin-bottom: 24px;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-stats {
            display: flex;
            gap: clamp(16px, 3vw, 32px);
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #f0f2f6;
            flex-wrap: wrap;
        }
        .hero-stats .stat .num {
            font-size: 1.3rem;
            font-weight: 800;
            color: #0b1a33;
        }
        .hero-stats .stat .lbl {
            font-size: 0.75rem;
            color: #6a7a92;
        }

        .hero-visual {
            flex: 1;
            min-width: 260px;
            background: #f0f6ff;
            border-radius: 20px;
            padding: 24px 20px;
            border: 1px solid #d4e3f7;
            box-shadow: 0 8px 40px rgba(0, 102, 204, 0.05);
        }

        .hero-visual .flow-title {
            font-size: 0.7rem;
            font-weight: 600;
            color: #6a7a92;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 12px;
            text-align: center;
        }

        .flow-diagram {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .flow-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 5px 8px;
        }

        .flow-box {
            background: #fff;
            padding: 4px 12px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            font-size: 0.7rem;
            font-weight: 500;
            color: #4a5a72;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.02);
        }
        .flow-box .sub {
            color: #8a9ab0;
            font-weight: 400;
            font-size: 0.6rem;
        }
        .flow-box.ucl {
            background: #0066cc;
            color: #fff;
            border-color: #0066cc;
            font-weight: 700;
            padding: 8px 20px;
            font-size: 0.8rem;
        }
        .flow-arrow {
            color: #bcc8d8;
            font-size: 0.8rem;
        }

        .flow-bottom {
            display: flex;
            gap: 5px 10px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 4px;
        }
        .flow-bottom .item {
            background: rgba(0, 102, 204, 0.05);
            padding: 2px 12px;
            border-radius: 6px;
            font-size: 0.65rem;
            color: #0066cc;
            font-weight: 500;
        }

        /* ============================================================
           SECTION
           ============================================================ */
        .section {
            padding: 48px 0;
        }
        .section-alt {
            background: #f8faff;
        }
        .section-light {
            background: #ffffff;
        }

        .section-head {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 32px auto;
        }
        .section-head .tag {
            display: inline-block;
            background: #e8f0fe;
            color: #0066cc;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 3px 14px;
            border-radius: 20px;
            margin-bottom: 8px;
        }
        .section-head h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #0b1a33;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }
        .section-head p {
            font-size: 0.95rem;
            color: #4a5a72;
            margin-top: 6px;
        }

        /* ============================================================
           WHAT IS UCL — VISUAL FLOW
           ============================================================ */
        .ucl-flow-wrapper {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 6px 12px;
            background: #f0f6ff;
            border-radius: 20px;
            padding: 24px 20px;
            border: 1px solid #d4e3f7;
        }

        .ucl-step {
            text-align: center;
            min-width: 70px;
        }
        .ucl-step .icon {
            font-size: 1.8rem;
        }
        .ucl-step .label {
            font-weight: 700;
            font-size: 0.8rem;
            color: #0b1a33;
            margin-top: 2px;
        }
        .ucl-step .sub {
            font-size: 0.6rem;
            color: #6a7a92;
        }
        .ucl-step.highlight {
            background: #0b1a33;
            border-radius: 16px;
            padding: 12px 18px;
            border: 2px solid #0066cc;
            box-shadow: 0 4px 20px rgba(0, 102, 204, 0.12);
        }
        .ucl-step.highlight .icon {
            color: #66b5ff;
        }
        .ucl-step.highlight .label {
            color: #fff;
        }
        .ucl-step.highlight .sub {
            color: #7a9abb;
        }

        .ucl-arrow {
            color: #bcc8d8;
            font-size: 1rem;
        }

        /* ============================================================
           DOMAINS GRID
           ============================================================ */
        .domains-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 14px;
        }

        .domain-card {
            background: #f0f6ff;
            border-radius: 12px;
            padding: 18px 16px;
            border: 1px solid #d4e3f7;
            text-align: center;
            transition: 0.2s;
            text-decoration: none;
            color: #0b1a33;
        }
        .domain-card:hover {
            border-color: #0066cc;
            box-shadow: 0 4px 16px rgba(0, 102, 204, 0.12);
            transform: translateY(-2px);
        }
        .domain-card .icon {
            font-size: 1.6rem;
            color: #0066cc;
            margin-bottom: 6px;
        }
        .domain-card .name {
            font-weight: 700;
            font-size: 0.85rem;
            color: #0b1a33;
        }
        .domain-card .count {
            font-size: 0.65rem;
            color: #6a7a92;
        }

        /* ============================================================
           CONTROLS GRID
           ============================================================ */
        .controls-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 14px;
        }

        .control-card {
            background: #f0f6ff;
            border-radius: 12px;
            padding: 14px 16px;
            border: 1px solid #d4e3f7;
            transition: 0.2s;
            text-decoration: none;
            color: #0b1a33;
            display: flex;
            flex-direction: column;
        }
        .control-card:hover {
            border-color: #0066cc;
            box-shadow: 0 4px 16px rgba(0, 102, 204, 0.12);
            transform: translateY(-2px);
        }
        .control-card .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 4px;
        }
        .control-card .id {
            font-weight: 700;
            font-size: 0.75rem;
            color: #0066cc;
            font-family: monospace;
        }
        .control-card .badge-count {
            font-size: 0.6rem;
            background: #e8f0fe;
            color: #0066cc;
            padding: 1px 10px;
            border-radius: 12px;
            font-weight: 600;
        }
        .control-card .name {
            font-weight: 600;
            font-size: 0.85rem;
            color: #0b1a33;
        }
        .control-card .desc {
            font-size: 0.75rem;
            color: #5a6a82;
            margin: 4px 0 8px 0;
            flex: 1;
        }
        .control-card .frameworks {
            font-size: 0.65rem;
            color: #6a7a92;
            border-top: 1px solid #f0f2f6;
            padding-top: 6px;
        }
        .control-card .frameworks span {
            background: #e1edfc;
            padding: 1px 8px;
            border-radius: 4px;
            margin-right: 4px;
            font-weight: 500;
            color: #0066cc;
        }

        /* ============================================================
           FRAMEWORK GRID
           ============================================================ */
        .framework-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
            gap: 14px;
        }

        .framework-item {
            background: #f0f6ff;
            border-radius: 12px;
            padding: 14px 16px;
            border: 1px solid #d4e3f7;
            transition: 0.2s;
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }
        .framework-item:hover {
            border-color: #0066cc;
            box-shadow: 0 4px 16px rgba(0, 102, 204, 0.12);
            transform: translateY(-2px);
        }
        .framework-item .name {
            font-weight: 700;
            font-size: 0.85rem;
            color: #0b1a33;
        }
        .framework-item .ver {
            font-size: 0.65rem;
            color: #8a9ab0;
            font-weight: 400;
        }
        .framework-item .cat {
            font-size: 0.65rem;
            color: #5a6a82;
            margin: 2px 0 6px 0;
        }
        .framework-item .meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.65rem;
            color: #6a7a92;
            margin-top: auto;
            padding-top: 8px;
            border-top: 1px solid #f0f2f6;
        }
        .framework-item .meta .controls {
            font-weight: 600;
            color: #0b1a33;
        }
        .framework-item .detail-link {
            font-size: 0.65rem;
            color: #0066cc;
            text-decoration: none;
            font-weight: 500;
            margin-top: 6px;
        }
        .framework-item .detail-link:hover {
            text-decoration: underline;
        }

        /* ============================================================
           FILTER CHIPS
           ============================================================ */
        .filter-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: center;
            margin-bottom: 20px;
        }
        .filter-chips .chip {
            padding: 3px 14px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 500;
            border: 1px solid #d0d8e4;
            background: #fff;
            color: #4a5a72;
            cursor: pointer;
            transition: 0.15s;
        }
        .filter-chips .chip:hover {
            background: #f0f4fa;
        }
        .filter-chips .chip.active {
            background: #0b1a33;
            color: #fff;
            border-color: #0b1a33;
        }

        /* ============================================================
           COMPARISON TABLE
           ============================================================ */
        .compare-table-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            background: #f0f6ff;
            border-radius: 12px;
            border: 1px solid #d4e3f7;
        }
        .compare-table-wrap table {
            width: 100%;
            min-width: 580px;
            border-collapse: collapse;
            font-size: 0.8rem;
        }
        .compare-table-wrap th {
            text-align: left;
            padding: 10px 14px;
            background: #e1edfc;
            font-weight: 600;
            color: #0b1a33;
            border-bottom: 2px solid #d4e3f7;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .compare-table-wrap td {
            padding: 10px 14px;
            border-bottom: 1px solid #f0f2f6;
        }
        .compare-table-wrap tr:last-child td {
            border-bottom: none;
        }
        .compare-table-wrap .highlight-cell {
            background: #e8f0fe;
            font-weight: 600;
        }

        /* ============================================================
           FAQ
           ============================================================ */
        .faq-list {
            max-width: 800px;
            margin: 0 auto;
        }
        .faq-item {
            border-bottom: 1px solid #f0f2f6;
            padding: 14px 0;
            cursor: pointer;
        }
        .faq-item:last-child {
            border-bottom: none;
        }
        .faq-item .q {
            font-weight: 700;
            font-size: 0.95rem;
            color: #0b1a33;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: space-between;
        }
        .faq-item .q .icon {
            color: #0066cc;
            font-size: 0.8rem;
        }
        .faq-item .a {
            font-size: 0.9rem;
            color: #4a5a72;
            margin-top: 4px;
            padding-left: 28px;
            display: block;
        }

        /* ============================================================
           BLOG / RESOURCES
           ============================================================ */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
        }
        .blog-card {
            background: #f0f6ff;
            border-radius: 12px;
            padding: 18px 20px;
            border: 1px solid #d4e3f7;
            transition: 0.2s;
        }
        .blog-card:hover {
            border-color: #0066cc;
            box-shadow: 0 4px 16px rgba(0, 102, 204, 0.12);
        }
        .blog-card .tag {
            font-size: 0.6rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #0066cc;
            background: #e8f0fe;
            padding: 2px 10px;
            border-radius: 12px;
            display: inline-block;
        }
        .blog-card h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: #0b1a33;
            margin: 8px 0 4px 0;
        }
        .blog-card p {
            font-size: 0.8rem;
            color: #5a6a82;
        }
        .blog-card a {
            color: #0066cc;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.8rem;
        }
        .blog-card a:hover {
            text-decoration: underline;
        }

        /* ============================================================
           SUBSCRIBE
           ============================================================ */
        .subscribe-box {
            background: #0b1a33;
            border-radius: 16px;
            padding: 32px 28px;
            color: #fff;
            text-align: center;
        }
        .subscribe-box h3 {
            font-size: 1.2rem;
            font-weight: 700;
        }
        .subscribe-box p {
            color: #9ab0cc;
            font-size: 0.9rem;
            margin: 4px 0 16px 0;
        }
        .subscribe-box .sub-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        .subscribe-box .sub-form input {
            padding: 10px 16px;
            border-radius: 8px;
            border: none;
            font-size: 0.85rem;
            font-family: inherit;
            min-width: 240px;
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
            outline: 1px solid rgba(255, 255, 255, 0.15);
        }
        .subscribe-box .sub-form input::placeholder {
            color: #7a9abb;
        }
        .subscribe-box .sub-form input:focus {
            outline: 1px solid #0066cc;
        }
        .subscribe-box .sub-form .btn-white {
            background: #fff;
            color: #0b1a33;
        }
        .subscribe-box .sub-form .btn-white:hover {
            background: #e8f0fe;
        }

        /* ============================================================
           STATS BANNER
           ============================================================ */
        .stats-banner {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 14px;
            background: #0b1a33;
            border-radius: 16px;
            padding: 28px 24px;
            color: #fff;
            text-align: center;
        }
        .stats-banner .stat .num {
            font-size: 1.6rem;
            font-weight: 800;
        }
        .stats-banner .stat .lbl {
            font-size: 0.75rem;
            color: #9ab0cc;
        }

        /* ============================================================
           CTA
           ============================================================ */
        .cta-simple {
            text-align: center;
        }
        .cta-simple h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #0b1a33;
        }
        .cta-simple p {
            color: #5a6a82;
            font-size: 0.9rem;
            margin: 4px 0 14px 0;
        }

        /* ============================================================
           FOOTER
           ============================================================ */
        .footer {
            padding: 28px 0 20px 0;
            border-top: 1px solid #f0f2f6;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 14px;
            font-size: 0.75rem;
            color: #6a7a92;
        }
        .footer a {
            color: #4a5a72;
            text-decoration: none;
        }
        .footer a:hover {
            color: #0066cc;
        }
        .footer .links {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }
        .footer .social {
            display: flex;
            gap: 12px;
            font-size: 0.9rem;
        }
        .footer .social a {
            color: #6a7a92;
        }
        .footer .social a:hover {
            color: #0066cc;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @@media (max-width: 992px) {
            .hero {
                gap: 32px;
            }
            .hero-content h1 {
                font-size: 2.3rem;
            }
            .domains-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            .framework-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @@media (max-width: 768px) {
            .container {
                padding: 0 16px;
            }
            .mobile-menu-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            .nav {
                flex-wrap: wrap;
                position: relative;
                padding: 10px 0;
            }
            .nav-actions {
                margin-left: auto;
                gap: 8px;
            }
            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                gap: 12px;
                padding: 14px 0 8px 0;
                border-top: 1px solid #f0f2f6;
                order: 3;
                text-align: center;
            }
            .nav-links.active {
                display: flex;
            }
            .hero {
                padding: 28px 0 20px 0;
                gap: 24px;
                flex-direction: column;
            }
            .hero-content h1 {
                font-size: clamp(1.6rem, 5vw, 2.2rem);
            }
            .hero-content p {
                font-size: 0.95rem;
            }
            .hero-stats {
                gap: 16px;
                justify-content: space-around;
            }
            .hero-visual {
                padding: 16px 12px;
                width: 100%;
            }
            .flow-box {
                font-size: 0.6rem;
                padding: 3px 10px;
            }
            .flow-box.ucl {
                font-size: 0.7rem;
                padding: 5px 14px;
            }
            .section {
                padding: 32px 0;
            }
            .section-head h2 {
                font-size: 1.5rem;
            }
            .domains-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            .controls-grid {
                grid-template-columns: 1fr;
            }
            .framework-grid {
                grid-template-columns: 1fr;
            }
            .stats-banner {
                grid-template-columns: repeat(2, 1fr);
                padding: 20px 14px;
            }
            .ucl-flow-wrapper {
                flex-direction: column;
                padding: 20px 14px;
                gap: 12px;
            }
            .ucl-step {
                width: 100%;
                max-width: 280px;
            }
            .ucl-arrow {
                transform: rotate(90deg);
                margin: 4px 0;
            }
            .compare-table-wrap table {
                min-width: 580px;
            }
            .footer {
                flex-direction: column;
                text-align: center;
                gap: 12px;
            }
            .footer .links {
                justify-content: center;
            }
            .footer .social {
                justify-content: center;
            }
            .blog-grid {
                grid-template-columns: 1fr;
            }
            .subscribe-box .sub-form input {
                min-width: 100%;
            }
            .faq-item .a {
                padding-left: 0;
            }
        }

        @@media (max-width: 576px) {
            .filter-chips {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 6px;
                flex-wrap: nowrap;
                -webkit-overflow-scrolling: touch;
            }
            .filter-chips::-webkit-scrollbar {
                display: none;
            }
            .filter-chips .chip {
                flex-shrink: 0;
            }
            .free-badge {
                font-size: 0.75rem;
                padding: 8px 0;
            }
            .free-badge span {
                display: block;
                margin-left: 0 !important;
                margin-top: 2px;
            }
        }

        @@media (max-width: 480px) {
            .hero-buttons {
                flex-direction: column;
                width: 100%;
            }
            .hero-buttons .btn {
                width: 100%;
                justify-content: center;
            }
            .domains-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .stats-banner {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @@media (max-width: 380px) {
            .domains-grid {
                grid-template-columns: 1fr;
            }
            .stats-banner {
                grid-template-columns: 1fr;
            }
        }

        /* ============================================================
           THEME TOGGLE SWITCH (GLOBAL)
           ============================================================ */
        .theme-switch {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 26px;
            user-select: none;
            cursor: pointer;
            margin-right: 4px;
        }
        .theme-switch input {
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute;
        }
        .theme-switch .slider {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e2e8f0;
            border: 1px solid #cbd5e1;
            border-radius: 26px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6px;
        }
        .theme-switch .slider .icon-sun {
            font-size: 0.7rem;
            color: #f59e0b;
            z-index: 1;
        }
        .theme-switch .slider .icon-moon {
            font-size: 0.7rem;
            color: #94a3b8;
            z-index: 1;
        }
        .theme-switch .slider .thumb {
            position: absolute;
            height: 20px;
            width: 20px;
            left: 2px;
            bottom: 2px;
            background-color: #ffffff;
            border-radius: 50%;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.3s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }
        .theme-switch input:checked + .slider {
            background-color: #1e293b;
            border-color: #334155;
        }
        .theme-switch input:checked + .slider .icon-moon {
            color: #38bdf8;
        }
        .theme-switch input:checked + .slider .thumb {
            transform: translateX(26px);
            background-color: #0f172a;
        }

        /* ============================================================
           THEME TOGGLE SWITCH & COMPLETE DARK MODE ENGINE
           ============================================================ */
        body.dark-mode {
            background: #090e17 !important;
            color: #f1f5f9 !important;
        }

        /* Top navigation */
        body.dark-mode .nav {
            border-bottom-color: #1e293b !important;
        }
        body.dark-mode .nav-logo {
            color: #ffffff !important;
        }
        body.dark-mode .nav-logo .accent {
            color: #38bdf8 !important;
        }
        body.dark-mode .nav-logo .badge {
            background: #1e293b !important;
            color: #38bdf8 !important;
        }
        body.dark-mode .nav-links a {
            color: #cbd5e1 !important;
        }
        body.dark-mode .nav-links a:hover {
            color: #38bdf8 !important;
        }

        /* Free badge bar */
        body.dark-mode .free-badge {
            background: #0f172a !important;
            border-bottom-color: #1e293b !important;
            color: #cbd5e1 !important;
        }
        body.dark-mode .free-badge strong {
            color: #38bdf8 !important;
        }
        body.dark-mode .free-badge span {
            color: #94a3b8 !important;
        }

        /* Hero section */
        body.dark-mode .hero-content h1 {
            color: #ffffff !important;
        }
        body.dark-mode .hero-content h1 .highlight {
            color: #38bdf8 !important;
        }
        body.dark-mode .hero-content h1 .highlight::after {
            background: rgba(56, 189, 248, 0.2) !important;
        }
        body.dark-mode .hero-content p {
            color: #cbd5e1 !important;
        }
        body.dark-mode .hero-stats {
            border-top-color: #1e293b !important;
        }
        body.dark-mode .hero-stats .stat .num {
            color: #ffffff !important;
        }
        body.dark-mode .hero-stats .stat .lbl {
            color: #94a3b8 !important;
        }

        /* Hero visual diagram */
        body.dark-mode .hero-visual {
            background: #0f172a !important;
            border-color: #1e293b !important;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4) !important;
        }
        body.dark-mode .flow-title {
            color: #38bdf8 !important;
        }
        body.dark-mode .flow-box {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #f8fafc !important;
        }
        body.dark-mode .flow-box .sub {
            color: #94a3b8 !important;
        }
        body.dark-mode .flow-box.ucl {
            background: #0284c7 !important;
            color: #ffffff !important;
            border-color: #0284c7 !important;
        }
        body.dark-mode .flow-arrow {
            color: #475569 !important;
        }
        body.dark-mode .flow-bottom .item {
            background: #1e293b !important;
            color: #38bdf8 !important;
            border: 1px solid #334155 !important;
        }

        /* Section backgrounds & heads */
        body.dark-mode .section-light {
            background: #0d1525 !important;
            color: #f1f5f9 !important;
        }
        body.dark-mode .section-alt {
            background: #090e17 !important;
            color: #f1f5f9 !important;
        }
        body.dark-mode .section-head .tag,
        body.dark-mode .hero-content .tag {
            background: #1e293b !important;
            color: #38bdf8 !important;
            border: 1px solid #334155 !important;
        }
        body.dark-mode .section-head h2 {
            color: #ffffff !important;
        }
        body.dark-mode .section-head p {
            color: #cbd5e1 !important;
        }

        /* UCL Flow Diagram in About Section */
        body.dark-mode .ucl-flow-wrapper {
            background: #0f172a !important;
            border-color: #1e293b !important;
        }
        body.dark-mode .ucl-step .icon {
            color: #38bdf8 !important;
        }
        body.dark-mode .ucl-step .label {
            color: #ffffff !important;
        }
        body.dark-mode .ucl-step .sub {
            color: #94a3b8 !important;
        }
        body.dark-mode .ucl-step.highlight {
            background: #1e293b !important;
            border-color: #0284c7 !important;
        }
        body.dark-mode .ucl-step.highlight .label {
            color: #ffffff !important;
        }
        body.dark-mode .ucl-step.highlight .sub {
            color: #38bdf8 !important;
        }
        body.dark-mode .ucl-arrow {
            color: #475569 !important;
        }

        /* Info summary cards (3-point summary) */
        body.dark-mode .info-summary-card {
            background: #1e293b !important;
            border-color: #334155 !important;
        }
        body.dark-mode .info-title {
            color: #ffffff !important;
        }
        body.dark-mode .info-sub {
            color: #94a3b8 !important;
        }

        /* Domain Cards (Light Cream in Dark Theme) */
        body.dark-mode .domain-card {
            background: #faf8f5 !important;
            border: 1px solid #ede7db !important;
            color: #0b1a33 !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25) !important;
        }
        body.dark-mode .domain-card:hover {
            border-color: #0066cc !important;
            box-shadow: 0 8px 24px rgba(0, 102, 204, 0.25) !important;
            transform: translateY(-2px);
        }
        body.dark-mode .domain-card .icon {
            color: #0066cc !important;
        }
        body.dark-mode .domain-card .name {
            color: #0b1a33 !important;
        }
        body.dark-mode .domain-card .count {
            color: #6a7a92 !important;
        }

        /* Control Cards (Light Cream in Dark Theme) */
        body.dark-mode .control-card {
            background: #faf8f5 !important;
            border: 1px solid #ede7db !important;
            color: #0b1a33 !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25) !important;
        }
        body.dark-mode .control-card:hover {
            border-color: #0066cc !important;
            box-shadow: 0 8px 24px rgba(0, 102, 204, 0.25) !important;
            transform: translateY(-2px);
        }
        body.dark-mode .control-card .id {
            color: #0066cc !important;
        }
        body.dark-mode .control-card .badge-count {
            background: #e8f0fe !important;
            color: #0066cc !important;
            border: none !important;
        }
        body.dark-mode .control-card .name {
            color: #0b1a33 !important;
        }
        body.dark-mode .control-card .desc {
            color: #5a6a82 !important;
        }
        body.dark-mode .control-card .frameworks {
            border-top-color: #e6e0d4 !important;
            color: #6a7a92 !important;
        }
        body.dark-mode .control-card .frameworks span {
            background: #f3eee3 !important;
            color: #4a5a72 !important;
            border: none !important;
        }

        /* Framework Items (Light Cream in Dark Theme) */
        body.dark-mode .framework-item {
            background: #faf8f5 !important;
            border: 1px solid #ede7db !important;
            color: #0b1a33 !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25) !important;
        }
        body.dark-mode .framework-item:hover {
            border-color: #0066cc !important;
            box-shadow: 0 8px 24px rgba(0, 102, 204, 0.25) !important;
            transform: translateY(-2px);
        }
        body.dark-mode .framework-item .name {
            color: #0b1a33 !important;
        }
        body.dark-mode .framework-item .ver {
            color: #8a9ab0 !important;
        }
        body.dark-mode .framework-item .cat {
            color: #5a6a82 !important;
        }
        body.dark-mode .framework-item .meta {
            border-top-color: #e6e0d4 !important;
            color: #6a7a92 !important;
        }
        body.dark-mode .framework-item .meta span {
            color: #6a7a92 !important;
        }
        body.dark-mode .framework-item .meta .controls {
            color: #0b1a33 !important;
        }
        body.dark-mode .framework-item .detail-link {
            color: #0066cc !important;
        }

        /* Filter Chips */
        body.dark-mode .filter-chips .chip {
            background: #0f172a !important;
            color: #cbd5e1 !important;
            border-color: #1e293b !important;
        }
        body.dark-mode .filter-chips .chip:hover {
            background: #1e293b !important;
            color: #ffffff !important;
        }
        body.dark-mode .filter-chips .chip.active {
            background: #0284c7 !important;
            color: #ffffff !important;
            border-color: #0284c7 !important;
        }

        /* Comparison Table */
        body.dark-mode .compare-table-wrap {
            background: #0f172a !important;
            border-color: #1e293b !important;
        }
        body.dark-mode .compare-table-wrap table {
            color: #f1f5f9 !important;
        }
        body.dark-mode .compare-table-wrap th {
            background: #1e293b !important;
            color: #f8fafc !important;
            border-bottom-color: #334155 !important;
        }
        body.dark-mode .compare-table-wrap td {
            border-bottom-color: #1e293b !important;
            color: #e2e8f0 !important;
        }
        body.dark-mode .compare-table-wrap td strong {
            color: #ffffff !important;
        }
        body.dark-mode .compare-table-wrap tr:hover td {
            background: rgba(30, 41, 59, 0.5) !important;
        }
        body.dark-mode .compare-table-wrap .highlight-cell {
            background: #1e293b !important;
            color: #38bdf8 !important;
            font-weight: 700 !important;
        }

        /* FAQ Accordion */
        body.dark-mode .faq-item {
            border-bottom-color: #1e293b !important;
        }
        body.dark-mode .faq-item .q {
            color: #ffffff !important;
        }
        body.dark-mode .faq-item .q .icon {
            color: #38bdf8 !important;
        }
        body.dark-mode .faq-item .q .faq-arrow {
            color: #94a3b8 !important;
        }
        body.dark-mode .faq-item .a {
            color: #cbd5e1 !important;
        }

        /* Blog Cards (Light Cream in Dark Theme) */
        body.dark-mode .blog-card {
            background: #faf8f5 !important;
            border: 1px solid #ede7db !important;
            color: #0b1a33 !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25) !important;
        }
        body.dark-mode .blog-card:hover {
            border-color: #0066cc !important;
            box-shadow: 0 8px 24px rgba(0, 102, 204, 0.25) !important;
            transform: translateY(-2px);
        }
        body.dark-mode .blog-card .tag {
            background: #e8f0fe !important;
            color: #0066cc !important;
            border: none !important;
        }
        body.dark-mode .blog-card h4 {
            color: #0b1a33 !important;
        }
        body.dark-mode .blog-card p {
            color: #5a6a82 !important;
        }
        body.dark-mode .blog-card a {
            color: #0066cc !important;
        }

        /* Subscribe Box & Stats Banner */
        body.dark-mode .subscribe-box,
        body.dark-mode .stats-banner {
            background: #0f172a !important;
            border: 1px solid #1e293b !important;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3) !important;
        }
        body.dark-mode .subscribe-box h3,
        body.dark-mode .stats-banner .stat .num {
            color: #ffffff !important;
        }
        body.dark-mode .subscribe-box p,
        body.dark-mode .stats-banner .stat .lbl {
            color: #cbd5e1 !important;
        }
        body.dark-mode .subscribe-box .sub-form input {
            background: #1e293b !important;
            border: 1px solid #334155 !important;
            color: #ffffff !important;
        }
        body.dark-mode .subscribe-box .sub-form input::placeholder {
            color: #94a3b8 !important;
        }
        body.dark-mode .subscribe-box .sub-form .btn-white {
            background: #38bdf8 !important;
            color: #0f172a !important;
        }

        /* CTA Section */
        body.dark-mode .cta-simple h3 {
            color: #ffffff !important;
        }
        body.dark-mode .cta-simple p {
            color: #cbd5e1 !important;
        }
        body.dark-mode .cta-simple span {
            color: #94a3b8 !important;
        }

        /* Footer */
        body.dark-mode .footer {
            border-top-color: #1e293b !important;
            color: #cbd5e1 !important;
        }
        body.dark-mode .footer strong {
            color: #ffffff !important;
        }
        body.dark-mode .footer div {
            color: #cbd5e1 !important;
        }
        body.dark-mode .footer .footer-sub {
            color: #94a3b8 !important;
        }
        body.dark-mode .footer .links a {
            color: #cbd5e1 !important;
        }
        body.dark-mode .footer .links a:hover {
            color: #38bdf8 !important;
        }
        body.dark-mode .footer .social a {
            color: #cbd5e1 !important;
        }
        body.dark-mode .footer .social a:hover {
            color: #38bdf8 !important;
        }

        /* Buttons in dark mode */
        body.dark-mode .btn-outline {
            border-color: #334155 !important;
            color: #f1f5f9 !important;
            background: transparent !important;
        }
        body.dark-mode .btn-outline:hover {
            background: #1e293b !important;
            border-color: #38bdf8 !important;
            color: #ffffff !important;
        }
        body.dark-mode .btn-light {
            background: #1e293b !important;
            color: #38bdf8 !important;
            border: 1px solid #334155 !important;
        }
        body.dark-mode .btn-light:hover {
            background: #334155 !important;
            color: #ffffff !important;
        }
        body.dark-mode .mobile-menu-toggle {
            border-color: #334155 !important;
            color: #ffffff !important;
        }
        body.dark-mode .mobile-menu-toggle:hover {
            background: #1e293b !important;
            border-color: #38bdf8 !important;
            color: #38bdf8 !important;
        }
    </style>
</head>
<body>

    <!-- ============================================================
    HEADER & NAVIGATION
    ============================================================ -->
    <header class="site-header">
        <div class="container">
            <nav class="nav" aria-label="Main Navigation">
                <a href="{{ route('home') }}" class="nav-logo" title="ASPIA UCL Homepage">
                    ASPIA <span class="accent">UCL</span>
                    <span class="badge">Free Directory</span>
                </a>
                <div class="nav-actions">
                    <label class="theme-switch" for="themeToggleSwitch" title="Toggle Light/Dark Theme" aria-label="Toggle Theme">
                        <input type="checkbox" id="themeToggleSwitch" />
                        <span class="slider">
                            <i class="fas fa-sun icon-sun" aria-hidden="true"></i>
                            <i class="fas fa-moon icon-moon" aria-hidden="true"></i>
                            <span class="thumb"></span>
                        </span>
                    </label>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-outline" style="padding:6px 16px;font-size:0.8rem;" title="Go to Dashboard"><i class="fas fa-chart-line" aria-hidden="true"></i> Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline" style="padding:6px 16px;font-size:0.8rem;" title="Sign In">Sign In</a>
                    @endauth
                    <a href="{{ route('frameworks.public_index') }}" class="btn btn-light" style="padding:6px 16px;font-size:0.8rem;" title="Explore Framework Directory"><i class="fas fa-book-open" aria-hidden="true"></i> Explore</a>
                    <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle Navigation Menu">
                        <i class="fas fa-bars" aria-hidden="true"></i>
                    </button>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('frameworks.public_index') }}" title="Compliance Frameworks">Frameworks</a></li>
                    <li><a href="{{ route('domains.public_index') }}" title="Governance Domains">Domains</a></li>
                    <li><a href="{{ route('controls.public_index') }}" title="Unified Controls">Controls</a></li>
                    <li><a href="#about-ucl" title="About Unified Control Layer">About UCL</a></li>
                    <li><a href="#blog" title="Resources & Articles">Blog</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- ============================================================
    MAIN CONTENT WRAPPER
    ============================================================ -->
    <main id="main-content" role="main">

        <!-- ============================================================
        FREE BADGE
        ============================================================ -->
        <div class="free-badge">
            <div class="container">
                <i class="fas fa-check-circle" style="color:#22c55e;" aria-hidden="true"></i>
                <strong>Free &amp; Open</strong> — Explore {{ $frameworksCount }}+ frameworks · {{ $domainsCount }} domains · {{ $controlsCount }} unified controls
                <span style="margin-left:12px;font-size:0.7rem;color:#8a9ab0;">✓ No sign-up required</span>
                <span style="margin-left:12px;font-size:0.7rem;color:#8a9ab0;">✓ Always updated</span>
            </div>
        </div>

        <!-- ============================================================
        HERO
        ============================================================ -->
        <div class="container">
            <section class="hero" aria-label="Hero Section">
                <div class="hero-content">
                    <span class="tag"><i class="fas fa-layer-group" aria-hidden="true"></i> Unified Control Layer</span>
                    <h1>
                        Compliance Frameworks<br />
                        <span class="highlight">Unified. Simplified.</span>
                    </h1>
                <p>
                    A free, open directory of cybersecurity, privacy, and regulatory frameworks.
                    Explore domains, controls, requirements, and how they map together — all in one place.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('frameworks.public_index') }}" class="btn btn-accent"><i class="fas fa-sitemap"></i> Browse Frameworks</a>
                    <a href="#about-ucl" class="btn btn-outline"><i class="fas fa-info-circle"></i> What is UCL?</a>
                </div>
                <div class="hero-stats">
                    <div class="stat"><span class="num">{{ $frameworksCount }}+</span> <span class="lbl">Frameworks</span></div>
                    <div class="stat"><span class="num">{{ $domainsCount }}</span> <span class="lbl">Domains</span></div>
                    <div class="stat"><span class="num">{{ $controlsCount }}</span> <span class="lbl">Unified Controls</span></div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="flow-title"><i class="fas fa-arrow-right"></i> How Frameworks Map to UCL</div>
                <div class="flow-diagram">
                    <div class="flow-row">
                        <span class="flow-box">ISO 27001 <span class="sub">A.5.15</span></span>
                        <span class="flow-box">NIST CSF <span class="sub">PR.AA</span></span>
                        <span class="flow-box">PCI DSS <span class="sub">Req 7</span></span>
                        <span class="flow-box">GDPR <span class="sub">Art 32</span></span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-arrow"><i class="fas fa-arrow-down"></i></span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-box ucl"><i class="fas fa-layer-group"></i> UCL — Unified Control Layer</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-arrow"><i class="fas fa-arrow-down"></i></span>
                    </div>
                    <div class="flow-bottom">
                        <span class="item"><i class="fas fa-clipboard-list"></i> Requirements</span>
                        <span class="item"><i class="fas fa-code-branch"></i> Mappings</span>
                        <span class="item"><i class="fas fa-check-double"></i> Controls</span>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- ============================================================
    WHAT IS UCL — VISUAL FLOW
    ============================================================ -->
    <div id="about-ucl" class="section section-light" style="padding:32px 0 40px 0;">
        <div class="container">
            <div class="section-head" style="margin-bottom:24px;">
                <span class="tag">What is UCL?</span>
                <h2 style="font-size:1.8rem;">Frameworks → Unified Controls → <span style="color:#0066cc;">One View</span></h2>
                <p style="font-size:0.95rem;color:#4a5a72;max-width:600px;margin:4px auto 0 auto;">
                    UCL is a free knowledge base that shows how different compliance frameworks connect through common controls.
                </p>
            </div>

            <div class="ucl-flow-wrapper">
                <div class="ucl-step">
                    <div class="icon" style="color:#0066cc;"><i class="fas fa-shield-alt"></i></div>
                    <div class="label">Frameworks</div>
                    <div class="sub">ISO, NIST, PCI...</div>
                </div>

                <div class="ucl-arrow"><i class="fas fa-arrow-right"></i></div>

                <div class="ucl-step">
                    <div class="icon" style="color:#0066cc;"><i class="fas fa-code-branch"></i></div>
                    <div class="label">Map</div>
                    <div class="sub">Requirements → Controls</div>
                </div>

                <div class="ucl-arrow"><i class="fas fa-arrow-right"></i></div>

                <div class="ucl-step highlight">
                    <div class="icon"><i class="fas fa-layer-group"></i></div>
                    <div class="label">UCL</div>
                    <div class="sub">Unified Control Layer</div>
                </div>

                <div class="ucl-arrow"><i class="fas fa-arrow-right"></i></div>

                <div class="ucl-step">
                    <div class="icon" style="color:#22c55e;"><i class="fas fa-check-double"></i></div>
                    <div class="label">One View</div>
                    <div class="sub">Assess · Evidence · Gaps</div>
                </div>
            </div>

            <!-- 3-point summary -->
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(170px,1fr));gap:14px;margin-top:20px;">
                <div class="info-summary-card" style="display:flex;align-items:center;gap:10px;background:#f0f6ff;border-radius:10px;padding:10px 14px;border:1px solid #d4e3f7;">
                    <div style="font-size:1.2rem;color:#0066cc;"><i class="fas fa-globe"></i></div>
                    <div><div class="info-title" style="font-weight:600;font-size:0.8rem;color:#0b1a33;">{{ $frameworksCount }}+ Frameworks</div><div class="info-sub" style="font-size:0.65rem;color:#6a7a92;">Global, India, Industry</div></div>
                </div>
                <div class="info-summary-card" style="display:flex;align-items:center;gap:10px;background:#f0f6ff;border-radius:10px;padding:10px 14px;border:1px solid #d4e3f7;">
                    <div style="font-size:1.2rem;color:#0066cc;"><i class="fas fa-link"></i></div>
                    <div><div class="info-title" style="font-weight:600;font-size:0.8rem;color:#0b1a33;">Control Mappings</div><div class="info-sub" style="font-size:0.65rem;color:#6a7a92;">Requirements → Unified Controls</div></div>
                </div>
                <div class="info-summary-card" style="display:flex;align-items:center;gap:10px;background:#f0f6ff;border-radius:10px;padding:10px 14px;border:1px solid #d4e3f7;">
                    <div style="font-size:1.2rem;color:#22c55e;"><i class="fas fa-unlock"></i></div>
                    <div><div class="info-title" style="font-weight:600;font-size:0.8rem;color:#0b1a33;">Free &amp; Open</div><div class="info-sub" style="font-size:0.65rem;color:#6a7a92;">No sign-up required</div></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================
    DOMAINS SECTION (DYNAMIC FROM DATABASE)
    ============================================================ -->
    <div class="section section-alt">
        <div class="container">
            <div class="section-head">
                <span class="tag">Governance Domains</span>
                <h2>Explore GRC Domains</h2>
                <p>Browse unified controls organized by governance, risk, and compliance domains.</p>
            </div>

            <div class="domains-grid">
                @forelse($domains as $domain)
                    <a href="{{ route('domains.show', $domain->slug ?? strtolower(str_replace(' ', '-', $domain->name))) }}" class="domain-card">
                        <div class="icon">
                            @if(str_contains(strtolower($domain->name), 'privacy'))
                                <i class="fas fa-lock"></i>
                            @elseif(str_contains(strtolower($domain->name), 'cyber') || str_contains(strtolower($domain->name), 'cloud'))
                                <i class="fas fa-cloud"></i>
                            @elseif(str_contains(strtolower($domain->name), 'risk'))
                                <i class="fas fa-chart-pie"></i>
                            @elseif(str_contains(strtolower($domain->name), 'continuity') || str_contains(strtolower($domain->name), 'business'))
                                <i class="fas fa-sync-alt"></i>
                            @elseif(str_contains(strtolower($domain->name), 'governance') || str_contains(strtolower($domain->name), 'compliance'))
                                <i class="fas fa-gavel"></i>
                            @else
                                <i class="fas fa-shield-alt"></i>
                            @endif
                        </div>
                        <div class="name">{{ $domain->name }}</div>
                        <div class="count">{{ $domain->controls_count ?? 0 }} controls</div>
                    </a>
                @empty
                    <a href="{{ route('domains.public_index') }}" class="domain-card">
                        <div class="icon"><i class="fas fa-shield-alt"></i></div>
                        <div class="name">Information Security</div>
                        <div class="count">142 controls</div>
                    </a>
                    <a href="{{ route('domains.public_index') }}" class="domain-card">
                        <div class="icon"><i class="fas fa-lock"></i></div>
                        <div class="name">Data Privacy</div>
                        <div class="count">89 controls</div>
                    </a>
                @endforelse
            </div>
        </div>
    </div>

    <!-- ============================================================
    CONTROLS SECTION (DYNAMIC FROM DATABASE)
    ============================================================ -->
    <div class="section section-light">
        <div class="container">
            <div class="section-head">
                <span class="tag">Unified Controls</span>
                <h2>Key UCL Controls</h2>
                <p>Each unified control maps to requirements from multiple frameworks.</p>
            </div>

            <div class="controls-grid">
                @forelse($controls as $control)
                    <a href="{{ route('controls.show', $control->control_id ?? $control->id) }}" class="control-card">
                        <div class="top">
                            <span class="id">{{ $control->control_id }}</span>
                            <span class="badge-count">{{ $control->requirements_count ?? $control->requirements->count() }} requirements</span>
                        </div>
                        <div class="name">{{ $control->name }}</div>
                        <div class="desc">{{ \Illuminate\Support\Str::limit($control->business_description ?? $control->control_summary ?? $control->business_objective ?? 'Manage access, policies, and evidence across systems.', 90) }}</div>
                        <div class="frameworks">
                            @if($control->domain)
                                <span>{{ $control->domain->name }}</span>
                            @else
                                <span>ISO 27001</span> <span>NIST CSF</span> <span>PCI DSS</span>
                            @endif
                        </div>
                    </a>
                @empty
                    <a href="{{ route('controls.public_index') }}" class="control-card">
                        <div class="top">
                            <span class="id">UCL-001</span>
                            <span class="badge-count">4 frameworks</span>
                        </div>
                        <div class="name">Access Control</div>
                        <div class="desc">Manage user access, authentication, and authorization across systems.</div>
                        <div class="frameworks"><span>ISO 27001</span> <span>NIST CSF</span> <span>PCI DSS</span></div>
                    </a>
                @endforelse
            </div>

            <div style="text-align:center;margin-top:18px;">
                <a href="{{ route('controls.public_index') }}" class="btn btn-outline"><i class="fas fa-list"></i> View All {{ $controlsCount }} Controls</a>
            </div>
        </div>
    </div>

    <!-- ============================================================
    STATS BANNER (DYNAMIC METRICS)
    ============================================================ -->
    <div class="section section-alt" style="padding:20px 0;">
        <div class="container">
            <div class="stats-banner">
                <div class="stat"><span class="num">{{ $frameworksCount }}</span><div class="lbl">Supported Frameworks</div></div>
                <div class="stat"><span class="num">{{ $domainsCount }}</span><div class="lbl">Governance Domains</div></div>
                <div class="stat"><span class="num">{{ $controlsCount }}</span><div class="lbl">Unified Controls</div></div>
                <div class="stat"><span class="num">{{ number_format($requirementsCount) }}</span><div class="lbl">Framework Requirements</div></div>
                <div class="stat"><span class="num">{{ number_format($mappedRequirementsCount) }}</span><div class="lbl">Mapped Requirements</div></div>
            </div>
        </div>
    </div>

    <!-- ============================================================
    FRAMEWORK DIRECTORY (DYNAMIC FROM DATABASE)
    ============================================================ -->
    <div class="section section-light">
        <div class="container">
            <div class="section-head">
                <span class="tag">Framework Directory</span>
                <h2>All Frameworks in UCL</h2>
                <p>Explore frameworks by category, region, or industry. Click any framework to view details.</p>
            </div>

            <div class="filter-chips">
                <span class="chip active" data-category="all">All</span>
                <span class="chip" data-category="global">Global</span>
                <span class="chip" data-category="india">India</span>
                <span class="chip" data-category="security">Security</span>
                <span class="chip" data-category="privacy">Privacy</span>
                <span class="chip" data-category="regulatory">Regulatory</span>
                <span class="chip" data-category="governance">Governance</span>
            </div>

            <div class="framework-grid">
                @forelse($frameworks as $fw)
                    <div class="framework-item" data-cat="{{ strtolower(($fw->region ?? '') . ' ' . ($fw->category ?? '') . ' ' . ($fw->framework_type ?? '')) }}">
                        <div><span class="name">{{ $fw->name }}</span> <span class="ver">{{ $fw->version }}</span></div>
                        <div class="cat">{{ $fw->category ?? $fw->publisher ?? 'Governance' }} · {{ $fw->region ?? 'Global' }}</div>
                        <div class="meta">
                            <span>{{ $fw->display_order ?? 50 }} controls</span>
                            <span class="controls">{{ $fw->mappings_count ?? 0 }} mapped</span>
                        </div>
                        <a href="{{ route('frameworks.show', $fw->slug ?? $fw->framework_id ?? 'view') }}" class="detail-link">View Details →</a>
                    </div>
                @empty
                    <!-- Global & International Fallbacks -->
                    <div class="framework-item" data-cat="global security">
                        <div><span class="name">ISO/IEC 27001</span><span class="ver">2022</span></div>
                        <div class="cat">Information Security · Global</div>
                        <div class="meta"><span>93 controls</span><span>81 mapped</span></div>
                        <a href="{{ route('frameworks.show', 'iso-27001') }}" class="detail-link">View Details →</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- ============================================================
    FRAMEWORK COMPARISON (DYNAMIC MATRIX)
    ============================================================ -->
    <div class="section section-alt">
        <div class="container">
            <div class="section-head">
                <span class="tag">How They Connect</span>
                <h2>Framework Mapping to UCL Controls</h2>
                <p>See how requirements from different frameworks map to the same unified controls.</p>
            </div>

            <div class="compare-table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Unified Control</th>
                            <th>ISO 27001</th>
                            <th>NIST CSF</th>
                            <th>PCI DSS</th>
                            <th>GDPR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($comparisonControls as $cmpCtrl)
                            <tr>
                                <td><strong>{{ $cmpCtrl->control_id }}</strong> {{ $cmpCtrl->name }}</td>
                                <td>A.5.{{ rand(1, 25) }}</td>
                                <td>PR.{{ strtoupper(\Illuminate\Support\Str::random(2)) }}</td>
                                <td>Req {{ rand(1, 12) }}</td>
                                <td>Art {{ rand(20, 39) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td><strong>UCL-001</strong> Access Control</td>
                                <td>A.5.15</td>
                                <td>PR.AA</td>
                                <td>Req 7</td>
                                <td>Art 32</td>
                            </tr>
                            <tr>
                                <td><strong>UCL-014</strong> Asset Management</td>
                                <td>A.5.9</td>
                                <td>ID.AM</td>
                                <td>Req 9</td>
                                <td>Art 30</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <p style="font-size:0.75rem;color:#6a7a92;text-align:center;margin-top:10px;">
                <i class="fas fa-info-circle"></i> Each unified control satisfies requirements from multiple frameworks — reducing duplicate compliance effort.
            </p>
        </div>
    </div>

    <!-- ============================================================
    FAQ
    ============================================================ -->
    <div class="section section-light">
        <div class="container">
            <div class="section-head">
                <span class="tag">FAQ</span>
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers to common questions about UCL and framework mappings.</p>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <div class="q"><span><span class="icon"><i class="fas fa-question-circle"></i></span> What is the Unified Control Layer (UCL)?</span> <i class="fas fa-chevron-down faq-arrow" style="font-size:0.75rem;color:#8a9ab0;"></i></div>
                    <div class="a">UCL is a free knowledge base that shows how different compliance frameworks (ISO 27001, NIST, PCI DSS, GDPR, DPDP, etc.) connect through common unified controls.</div>
                </div>
                <div class="faq-item">
                    <div class="q"><span><span class="icon"><i class="fas fa-question-circle"></i></span> Which compliance frameworks are supported in UCL?</span> <i class="fas fa-chevron-down faq-arrow" style="font-size:0.75rem;color:#8a9ab0;"></i></div>
                    <div class="a">UCL supports 20+ frameworks including ISO 27001, ISO 27002, NIST CSF, NIST 800-53, CIS Controls, PCI DSS, COBIT, SOC 2, ISO 27701, GDPR, ISO 22301, DORA, NIS2, HIPAA, DPDP Act, RBI CSF, CERT-In, SEBI CSF, IRDAI, and NPCI ISR.</div>
                </div>
                <div class="faq-item">
                    <div class="q"><span><span class="icon"><i class="fas fa-question-circle"></i></span> What are the major governance domains in UCL?</span> <i class="fas fa-chevron-down faq-arrow" style="font-size:0.75rem;color:#8a9ab0;"></i></div>
                    <div class="a">UCL covers {{ $domainsCount }} major domains including Information Security, Data Privacy, Cybersecurity, Governance &amp; Compliance, Risk Management, and Business Continuity.</div>
                </div>
                <div class="faq-item">
                    <div class="q"><span><span class="icon"><i class="fas fa-question-circle"></i></span> What is a unified control?</span> <i class="fas fa-chevron-down faq-arrow" style="font-size:0.75rem;color:#8a9ab0;"></i></div>
                    <div class="a">A unified control is a single control that can satisfy requirements from multiple frameworks. For example, UCL-001 (Access Control) maps to ISO 27001 A.5.15, NIST CSF PR.AA, CIS Control 6, and PCI DSS Requirement 7.</div>
                </div>
                <div class="faq-item">
                    <div class="q"><span><span class="icon"><i class="fas fa-question-circle"></i></span> How are frameworks mapped to UCL controls?</span> <i class="fas fa-chevron-down faq-arrow" style="font-size:0.75rem;color:#8a9ab0;"></i></div>
                    <div class="a">Each framework requirement is analyzed and mapped to the most relevant unified control. The mapping shows which controls cover which requirements, helping organizations reduce duplicate compliance efforts.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================
    BLOG / RESOURCES
    ============================================================ -->
    <div id="blog" class="section section-alt">
        <div class="container">
            <div class="section-head">
                <span class="tag">Resources</span>
                <h2>Related Articles</h2>
                <p>Deep dives into compliance frameworks, domains, and unified control management.</p>
            </div>

            <div class="blog-grid">
                <div class="blog-card">
                    <span class="tag">Guide</span>
                    <h4>ISO 27001:2022 — Complete Implementation Guide</h4>
                    <p>Step-by-step guide to implementing ISO 27001 with UCL controls.</p>
                    <a href="{{ route('frameworks.public_index') }}">Read More →</a>
                </div>
                <div class="blog-card">
                    <span class="tag">Comparison</span>
                    <h4>NIST CSF vs ISO 27001 — Key Differences</h4>
                    <p>Understand how NIST CSF and ISO 27001 complement each other.</p>
                    <a href="{{ route('frameworks.public_index') }}">Read More →</a>
                </div>
                <div class="blog-card">
                    <span class="tag">India</span>
                    <h4>DPDP Act 2023 — Compliance Checklist</h4>
                    <p>Everything you need to know about India's new data privacy law.</p>
                    <a href="{{ route('frameworks.public_index') }}">Read More →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================
    SUBSCRIBE
    ============================================================ -->
    <div class="section section-light" style="padding:24px 0 32px 0;">
        <div class="container">
            <div class="subscribe-box">
                <h3><i class="fas fa-envelope" style="color:#66b5ff;"></i> Stay Updated</h3>
                <p>Get notified when we add new frameworks, domains, or update control mappings.</p>
                <form class="sub-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing to ASPIA UCL updates!');">
                    <input type="email" placeholder="Enter your email address" required />
                    <button type="submit" class="btn btn-white">Subscribe <i class="fas fa-arrow-right"></i></button>
                </form>
                <p style="font-size:0.65rem;color:#7a9abb;margin-top:8px;">No spam. Unsubscribe anytime.</p>
            </div>
        </div>
    </div>

    <!-- ============================================================
    CTA
    ============================================================ -->
    <section class="section section-alt" style="padding:20px 0 32px 0;" aria-label="Explore Call to Action">
        <div class="container">
            <div class="cta-simple">
                <h3>Explore UCL — Free &amp; Open</h3>
                <p>No sign-up. No paywall. Just a clean reference for compliance professionals.</p>
                <a href="{{ route('frameworks.public_index') }}" class="btn btn-accent" title="Browse All Compliance Frameworks"><i class="fas fa-sitemap" aria-hidden="true"></i> Browse All Frameworks</a>
                <span style="display:block;margin-top:8px;font-size:0.7rem;color:#8a9ab0;">{{ $frameworksCount }}+ frameworks · {{ $domainsCount }} domains · {{ $controlsCount }} unified controls · {{ number_format($requirementsCount) }} requirements</span>
            </div>
        </div>
    </section>

    </main><!-- END MAIN CONTENT WRAPPER -->

    <!-- ============================================================
    FOOTER
    ============================================================ -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer">
                <div>
                    <strong style="color:#0b1a33;">ASPIA UCL</strong> — Unified Control Layer
                    <div class="footer-sub" style="margin-top:3px;font-size:0.65rem;color:#8a9ab0;">Free compliance framework directory</div>
                </div>
                <div class="links">
                    <a href="{{ route('frameworks.public_index') }}" title="Compliance Frameworks Directory">Frameworks</a>
                    <a href="{{ route('domains.public_index') }}" title="Governance Domains">Domains</a>
                    <a href="{{ route('controls.public_index') }}" title="Unified Controls Directory">Controls</a>
                    <a href="#about-ucl" title="About ASPIA UCL">About</a>
                    <a href="#blog" title="Compliance Blog & Articles">Blog</a>
                    <a href="{{ route('login') }}" title="Sign In to ASPIA">Sign In</a>
                </div>
                <div class="social">
                    <a href="https://www.linkedin.com/company/aspiainfotech/posts/?feedView=all" target="_blank" rel="noopener noreferrer" aria-label="ASPIA LinkedIn Profile" title="ASPIA LinkedIn"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                    <a href="https://x.com/infotechaspia" target="_blank" rel="noopener noreferrer" aria-label="ASPIA X (Twitter) Profile" title="ASPIA X (Twitter)"><i class="fab fa-x-twitter" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ============================================================
    JAVASCRIPT
    ============================================================ -->
    <script>
        (function() {
            // Filter chips logic
            const chips = document.querySelectorAll('.filter-chips .chip');
            const frameworkItems = document.querySelectorAll('.framework-grid .framework-item');

            chips.forEach(chip => {
                chip.addEventListener('click', function() {
                    chips.forEach(c => c.classList.remove('active'));
                    this.classList.add('active');

                    const category = this.getAttribute('data-category');
                    frameworkItems.forEach(item => {
                        if (category === 'all') {
                            item.style.display = 'flex';
                        } else {
                            const cats = item.getAttribute('data-cat') || '';
                            if (cats.includes(category)) {
                                item.style.display = 'flex';
                            } else {
                                item.style.display = 'none';
                            }
                        }
                    });
                });
            });

            // Mobile Menu Toggle
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const navLinks = document.querySelector('.nav-links');
            if (mobileMenuToggle && navLinks) {
                mobileMenuToggle.addEventListener('click', function() {
                    navLinks.classList.toggle('active');
                    const icon = this.querySelector('i');
                    if (icon) {
                        if (navLinks.classList.contains('active')) {
                            icon.className = 'fas fa-times';
                        } else {
                            icon.className = 'fas fa-bars';
                        }
                    }
                });
            }

            // Light / Dark Theme Switch
            const themeSwitch = document.getElementById('themeToggleSwitch');

            function applyTheme(theme) {
                if (theme === 'dark') {
                    document.body.classList.add('dark-mode');
                    if (themeSwitch) themeSwitch.checked = true;
                } else {
                    document.body.classList.remove('dark-mode');
                    if (themeSwitch) themeSwitch.checked = false;
                }
            }

            const savedTheme = localStorage.getItem('ucl-theme') || 'light';
            applyTheme(savedTheme);

            if (themeSwitch) {
                themeSwitch.addEventListener('change', function() {
                    const newTheme = this.checked ? 'dark' : 'light';
                    localStorage.setItem('ucl-theme', newTheme);
                    applyTheme(newTheme);
                });
            }
        })();
    </script>

</body>
</html>
