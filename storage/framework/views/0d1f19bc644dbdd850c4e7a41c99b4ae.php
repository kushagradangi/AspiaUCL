<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Primary Meta Tags -->
    <title>Unified Control Layer (UCL) — Free Compliance Framework Directory | ASPIA</title>
    <meta name="title" content="Unified Control Layer (UCL) — Free Compliance Framework Directory | ASPIA" />
    <meta name="description" content="ASPIA UCL is a free, open directory of compliance frameworks — ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP, RBI, and more. View requirements, controls, mappings, and domains — all in one place." />
    <meta name="keywords" content="compliance frameworks, ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP Act, RBI CSF, unified control layer, GRC, cybersecurity compliance, framework mapping, governance domains, security controls" />
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:title" content="Unified Control Layer (UCL) — Free Compliance Framework Directory | ASPIA" />
    <meta property="og:description" content="Explore compliance frameworks, governance domains, and unified controls — ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP, RBI, and more. Free, open, and always updated." />
    <meta property="og:site_name" content="ASPIA UCL" />
    <meta property="og:locale" content="en_US" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?php echo e(url()->current()); ?>" />
    <meta name="twitter:title" content="Unified Control Layer (UCL) — Free Compliance Framework Directory | ASPIA" />
    <meta name="twitter:description" content="Explore compliance frameworks, governance domains, and unified controls — ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP, RBI, and more." />
    <meta name="twitter:site" content="@infotechaspia" />

    <!-- Schema.org JSON-LD: WebPage & WebSite -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Unified Control Layer (UCL) — Free Compliance Framework Directory",
        "url": "<?php echo e(url()->current()); ?>",
        "description": "ASPIA UCL is a free, open directory of compliance frameworks — ISO 27001, NIST CSF, PCI DSS, GDPR, DPDP, RBI, and more.",
        "inLanguage": "en",
        "isPartOf": {
            "@type": "WebSite",
            "name": "ASPIA UCL",
            "url": "<?php echo e(route('home')); ?>"
        }
    }
    </script>

    <!-- Schema.org JSON-LD: Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
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
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?php echo e(route('home')); ?>"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Unified Control Layer (UCL)",
                "item": "<?php echo e(url()->current()); ?>"
            }
        ]
    }
    </script>

    <!-- Schema.org JSON-LD: FAQPage -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "What is the Unified Control Layer (UCL)?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "UCL is a free knowledge base that shows how different compliance frameworks (ISO 27001, NIST, PCI DSS, GDPR, DPDP, etc.) connect through common unified controls."
                }
            },
            {
                "@type": "Question",
                "name": "Which compliance frameworks are supported in UCL?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "UCL supports 20+ frameworks including ISO 27001, ISO 27002, NIST CSF, NIST 800-53, CIS Controls, PCI DSS, COBIT, SOC 2, ISO 27701, GDPR, ISO 22301, DORA, NIS2, HIPAA, DPDP Act, RBI CSF, CERT-In, SEBI CSF, IRDAI, and NPCI ISR."
                }
            },
            {
                "@type": "Question",
                "name": "What are the major governance domains in UCL?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "UCL covers major governance domains: Information Security, Data Privacy, Cybersecurity, Governance & Compliance, Risk Management, and Business Continuity."
                }
            },
            {
                "@type": "Question",
                "name": "What is a unified control?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "A unified control is a single control that can satisfy requirements from multiple frameworks. For example, UCL-001 (Access Control) maps to ISO 27001 A.5.15, NIST CSF PR.AA, CIS Control 6, and PCI DSS Requirement 7."
                }
            },
            {
                "@type": "Question",
                "name": "How are frameworks mapped to UCL controls?",
                "acceptedAnswer": {
                    "@type": "Answer",
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

        :root {
            --aspia-infotech-font-primary: "Inter", sans-serif;
            --aspia-infotech-font-mono: "JetBrains Mono", "SFMono-Regular", Consolas, monospace;
        }

        body {
            font-family: var(--aspia-infotech-font-primary);
            background: #ffffff;
            color: #0D1735;
            line-height: 1.6;
            padding: 0;
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
            box-sizing: border-box;
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
            color: #16C4F4;
            text-decoration: none;
        }
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        .breadcrumb .sep {
            color: #bcc8d8;
        }

        /* Header styles managed by shared Blade partial */

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
            color: #0D1735;
            border: 1.5px solid #d0d8e4;
        }
        .btn-outline:hover {
            background: #f0f4fa;
            border-color: #0D1735;
        }
        .btn-accent {
            background: #16C4F4;
            color: #fff;
        }
        .btn-accent:hover {
            background: #0052a8;
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(0, 102, 204, 0.25);
        }
        .btn-light {
            background: #e8f0fe;
            color: #16C4F4;
        }
        .btn-light:hover {
            background: #d0e0f8;
        }

        /* ============================================================
           FREE BADGE & HERO SECTION (#0D1735 PRIMARY NAVY)
           ============================================================ */
        .hero-section {
            background: #0D1735;
            color: #ffffff;
            padding: 0;
            margin-top: 0;
            min-height: calc(100vh - 76px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .free-badge {
            text-align: center;
            padding: 12px 0 8px 0;
            font-size: 0.8rem;
            color: #9ab0cc;
            border-bottom: none;
            background: #0D1735;
            flex-shrink: 0;
        }
        .free-badge strong {
            color: #16C4F4;
        }

        .hero-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 24px;
            padding-bottom: 24px;
        }

        .hero {
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 32px;
            width: 100%;
        }

        .hero-content {
            flex: 1;
            min-width: 280px;
        }
        .hero-content .tag {
            display: inline-block;
            background: rgba(22, 196, 244, 0.12);
            color: #16C4F4;
            border: 1px solid rgba(22, 196, 244, 0.25);
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
            color: #ffffff;
            letter-spacing: -0.03em;
            line-height: 1.15;
            margin-bottom: 14px;
        }
        .hero-content h1 .highlight {
            color: #16C4F4;
            position: relative;
        }
        .hero-content h1 .highlight::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 0;
            right: 0;
            height: 6px;
            background: rgba(22, 196, 244, 0.25);
            border-radius: 4px;
        }
        .hero-content p {
            font-size: 1.05rem;
            color: #9ab0cc;
            max-width: 520px;
            margin-bottom: 24px;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        .hero-buttons .btn-outline {
            background: transparent;
            color: #ffffff;
            border: 1.5px solid rgba(255, 255, 255, 0.25);
        }
        .hero-buttons .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ffffff;
            color: #ffffff;
        }

        .hero-stats {
            display: flex;
            gap: clamp(16px, 3vw, 32px);
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            flex-wrap: wrap;
        }
        .hero-stats .stat .num {
            font-size: 1.3rem;
            font-weight: 800;
            color: #ffffff;
        }
        .hero-stats .stat .lbl {
            font-size: 0.75rem;
            color: #9ab0cc;
        }

        .hero-visual {
            flex: 1;
            min-width: 260px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 20px;
            padding: 24px 20px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(8px);
        }

        .hero-visual .flow-title {
            font-size: 0.7rem;
            font-weight: 600;
            color: #9ab0cc;
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
            background: #172852;
            padding: 4px 12px;
            border-radius: 8px;
            border: 1px solid #233b74;
            font-size: 0.7rem;
            font-weight: 500;
            color: #ffffff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
        }
        .flow-box .sub {
            color: #8b9ebf;
            font-weight: 400;
            font-size: 0.6rem;
        }
        .flow-box.ucl {
            background: #16C4F4;
            color: #ffffff;
            border-color: #16C4F4;
            font-weight: 700;
            padding: 8px 20px;
            font-size: 0.8rem;
            box-shadow: 0 4px 16px rgba(22, 196, 244, 0.3);
        }
        .flow-arrow {
            color: #4f6894;
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
            background: rgba(22, 196, 244, 0.12);
            padding: 2px 12px;
            border-radius: 6px;
            font-size: 0.65rem;
            color: #16C4F4;
            font-weight: 500;
            border: 1px solid rgba(22, 196, 244, 0.25);
        }

        /* ============================================================
           SECTION
           ============================================================ */
        .section {
            padding: 36px 0;
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
            margin: 0 auto 24px auto;
        }
        .section-head .tag {
            display: inline-block;
            background: #e8f0fe;
            color: #16C4F4;
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
            color: #0D1735;
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
            color: #0D1735;
            margin-top: 2px;
        }
        .ucl-step .sub {
            font-size: 0.6rem;
            color: #6a7a92;
        }
        .ucl-step.highlight {
            background: #0D1735;
            border-radius: 16px;
            padding: 12px 18px;
            border: 2px solid #16C4F4;
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
            grid-template-columns: repeat(6, 1fr);
            gap: 14px;
        }

        /* ============================================================
           DOMAINS PAGINATION STYLES
           ============================================================ */
        .domains-pagination {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 24px;
        }

        .domains-page-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: inherit;
            border: 1px solid #d0d8e4;
            background: #ffffff;
            color: #0D1735;
            cursor: pointer;
            transition: all 0.2s;
        }
        .domains-page-btn:hover:not(:disabled) {
            background: #f0f4fa;
            border-color: #16C4F4;
            color: #16C4F4;
        }
        .domains-page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .domains-page-numbers {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .domains-page-number {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: inherit;
            border: 1px solid #d0d8e4;
            background: #ffffff;
            color: #4a5a72;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .domains-page-number:hover:not(.active) {
            border-color: #16C4F4;
            color: #16C4F4;
            background: #f0f4fa;
        }
        .domains-page-number.active {
            background: #16C4F4;
            color: #ffffff;
            border-color: #16C4F4;
        }

        .domains-page-info {
            font-size: 0.75rem;
            color: #6a7a92;
            font-weight: 500;
        }

        .domain-card {
            background: #f0f6ff;
            border-radius: 12px;
            padding: 18px 16px;
            border: 1px solid #d4e3f7;
            text-align: center;
            transition: 0.2s;
            text-decoration: none;
            color: #0D1735;
        }
        .domain-card:hover {
            border-color: #16C4F4;
            box-shadow: 0 4px 16px rgba(0, 102, 204, 0.12);
            transform: translateY(-2px);
        }
        .domain-card .icon {
            font-size: 1.6rem;
            color: #16C4F4;
            margin-bottom: 6px;
        }
        .domain-card .name {
            font-weight: 700;
            font-size: 0.85rem;
            color: #0D1735;
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
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        /* ============================================================
           CONTROLS PAGINATION STYLES
           ============================================================ */
        .controls-pagination {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 24px;
        }

        .controls-page-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: inherit;
            border: 1px solid #d0d8e4;
            background: #ffffff;
            color: #0D1735;
            cursor: pointer;
            transition: all 0.2s;
        }
        .controls-page-btn:hover:not(:disabled) {
            background: #f0f4fa;
            border-color: #16C4F4;
            color: #16C4F4;
        }
        .controls-page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .controls-page-numbers {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .controls-page-number {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: inherit;
            border: 1px solid #d0d8e4;
            background: #ffffff;
            color: #4a5a72;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .controls-page-number:hover:not(.active) {
            border-color: #16C4F4;
            color: #16C4F4;
            background: #f0f4fa;
        }
        .controls-page-number.active {
            background: #16C4F4;
            color: #ffffff;
            border-color: #16C4F4;
        }

        .controls-page-info {
            font-size: 0.75rem;
            color: #6a7a92;
            font-weight: 500;
        }

        .controls-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        @media (max-width: 1200px) {
            .controls-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 900px) {
            .controls-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 600px) {
            .controls-grid {
                grid-template-columns: 1fr;
            }
        }

        .control-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
            color: #0D1735;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
            position: relative;
        }

        .control-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.03);
            transform: translateY(-3px);
        }

        .control-card-header {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
        }

        .control-icon-box {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
        }

        .control-header-info {
            flex: 1;
            min-width: 0;
        }

        .control-top-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 3px;
        }

        .control-id {
            font-size: 0.82rem;
            font-weight: 700;
            color: #1e293b;
            letter-spacing: -0.01em;
        }

        .control-req-badge {
            font-size: 0.72rem;
            font-weight: 600;
            color: #0284c7;
            background: #e0f2fe;
            padding: 2px 10px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .control-name {
            font-size: 0.95rem;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.35;
            margin: 0;
        }

        .control-desc {
            font-size: 0.8rem;
            color: #475569;
            line-height: 1.5;
            margin: 0 0 16px 0;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .control-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: auto;
            padding-top: 4px;
        }

        .control-tags {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .control-tag {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 3px 9px;
            border-radius: 6px;
            white-space: nowrap;
        }

        .tag-blue { background: #eff6ff; color: #1d4ed8; }
        .tag-cyan { background: #ecfeff; color: #0284c7; }
        .tag-teal { background: #e6f7f2; color: #0f766e; }
        .tag-emerald { background: #f0fdf4; color: #15803d; }
        .tag-purple { background: #f5f3ff; color: #6d28d9; }
        .tag-neutral { background: #f1f5f9; color: #475569; }

        .control-arrow {
            color: #94a3b8;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .control-card:hover .control-arrow {
            color: #16C4F4;
            transform: translateX(4px);
        }

        /* ============================================================
           FRAMEWORK GRID
           ============================================================ */
        .framework-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px;
        }

        /* ============================================================
           FRAMEWORKS PAGINATION STYLES
           ============================================================ */
        .frameworks-pagination {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 24px;
        }

        .frameworks-page-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: inherit;
            border: 1px solid #d0d8e4;
            background: #ffffff;
            color: #0D1735;
            cursor: pointer;
            transition: all 0.2s;
        }
        .frameworks-page-btn:hover:not(:disabled) {
            background: #f0f4fa;
            border-color: #16C4F4;
            color: #16C4F4;
        }
        .frameworks-page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .frameworks-page-numbers {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .frameworks-page-number {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: inherit;
            border: 1px solid #d0d8e4;
            background: #ffffff;
            color: #4a5a72;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .frameworks-page-number:hover:not(.active) {
            border-color: #16C4F4;
            color: #16C4F4;
            background: #f0f4fa;
        }
        .frameworks-page-number.active {
            background: #16C4F4;
            color: #ffffff;
            border-color: #16C4F4;
        }

        .frameworks-page-info {
            font-size: 0.75rem;
            color: #6a7a92;
            font-weight: 500;
        }

        /* ============================================================
           FW DOMAINS MAPPING PAGINATION STYLES
           ============================================================ */
        .fwdomains-pagination {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .fwdomains-page-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: inherit;
            border: 1px solid #d0d8e4;
            background: #ffffff;
            color: #0D1735;
            cursor: pointer;
            transition: all 0.2s;
        }
        .fwdomains-page-btn:hover:not(:disabled) {
            background: #f0f4fa;
            border-color: #16C4F4;
            color: #16C4F4;
        }
        .fwdomains-page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .fwdomains-page-numbers {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .fwdomains-page-number {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            font-family: inherit;
            border: 1px solid #d0d8e4;
            background: #ffffff;
            color: #4a5a72;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .fwdomains-page-number:hover:not(.active) {
            border-color: #16C4F4;
            color: #16C4F4;
            background: #f0f4fa;
        }
        .fwdomains-page-number.active {
            background: #16C4F4;
            color: #ffffff;
            border-color: #16C4F4;
        }

        .fwdomains-page-info {
            font-size: 0.75rem;
            color: #6a7a92;
            font-weight: 500;
        }

        /* ============================================================
           DOMAINS & ASSOCIATED CONTROLS TABLE STYLES (.dct-)
           ============================================================ */
        .dct-wrapper {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            overflow-x: auto;
        }
        .dct-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }
        .dct-thead-tr {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }
        .dct-th {
            padding: 14px 20px;
            font-weight: 700;
            color: #475569;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-align: left;
        }
        .dct-th-domain { width: 28%; white-space: nowrap; }
        .dct-th-scope { width: 30%; }
        .dct-th-controls { width: 32%; }
        .dct-th-action { width: 10%; text-align: center; white-space: nowrap; }

        .dct-row {
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.15s ease;
        }
        .dct-row:last-child {
            border-bottom: none;
        }
        .dct-row:hover {
            background: #f8fafc;
        }
        .dct-td {
            padding: 14px 20px;
        }
        .dct-td-domain { white-space: nowrap; }
        .dct-domain-meta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }
        .dct-code {
            color: #0f172a;
            font-weight: 700;
        }
        .dct-title {
            color: #334155;
            font-weight: 500;
        }
        .dct-desc {
            color: #475569;
            font-weight: 400;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .dct-td-controls {
            color: #334155;
        }
        .dct-controls-list {
            display: flex;
            flex-direction: column;
            gap: 4px;
            line-height: 1.4;
        }
        .dct-control-item {
            display: flex;
            align-items: flex-start;
            gap: 6px;
            font-size: 0.83rem;
        }
        .dct-ctrl-id {
            color: #0f172a;
            font-weight: 700;
            flex-shrink: 0;
        }
        .dct-ctrl-name {
            color: #334155;
            flex: 1;
        }
        .dct-more {
            color: #64748b;
            font-size: 0.78rem;
            font-weight: 500;
            margin-top: 1px;
        }
        .dct-empty {
            color: #94a3b8;
            font-style: italic;
        }
        .dct-td-action {
            text-align: center;
            white-space: nowrap;
        }
        .view-domain-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            white-space: nowrap;
            padding: 6px 14px;
            background: #f0f6ff;
            color: #16C4F4;
            border: 1px solid #cce0ff;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.78rem;
            cursor: pointer;
            transition: all 0.15s ease;
        }
        .view-domain-btn:hover {
            background: #16C4F4;
            color: #ffffff;
            border-color: #16C4F4;
        }
        .dct-note {
            font-size: 0.78rem;
            color: #64748b;
            text-align: center;
            margin-top: 14px;
        }
        .dct-note i {
            color: #64748b;
            margin-right: 4px;
        }

        .btn-view-compact {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #16C4F4;
            background: #eef6ff;
            border: 1px solid #cce3ff;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.15s ease;
            white-space: nowrap;
        }
        .btn-view-compact:hover {
            background: #16C4F4;
            color: #ffffff;
            border-color: #16C4F4;
            box-shadow: 0 2px 6px rgba(0, 102, 204, 0.2);
        }

        .ucl-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }
        .ucl-modal-card {
            background: #ffffff;
            border-radius: 12px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.18);
            border: 1px solid #e2e8f0;
            overflow: hidden;
            animation: modalFadeIn 0.15s ease-out;
        }
        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .ucl-modal-header {
            padding: 12px 18px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .ucl-modal-close {
            background: none;
            border: none;
            font-size: 1.4rem;
            color: #64748b;
            cursor: pointer;
            line-height: 1;
            padding: 0 4px;
        }
        .ucl-modal-close:hover {
            color: #0f172a;
        }
        .ucl-modal-body {
            padding: 16px 18px;
        }
        .ucl-modal-footer {
            padding: 10px 18px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-domain-code {
            font-size: 0.7rem;
            background: #e8f0fe;
            color: #16C4F4;
            padding: 2px 10px;
            border-radius: 12px;
            font-weight: 700;
        }
        .modal-domain-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: #0D1735;
            margin-top: 4px;
        }
        .modal-body-sub {
            font-size: 0.8rem;
            color: #6a7a92;
            margin-bottom: 12px;
            font-weight: 600;
        }
        .modal-controls-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
            max-height: 320px;
            overflow-y: auto;
            padding-right: 4px;
        }
        .modal-control-item {
            padding: 8px 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 0.82rem;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .modal-ctrl-id {
            color: #0f172a;
            font-weight: 700;
            min-width: 70px;
        }
        .modal-ctrl-name {
            color: #334155;
        }
        .modal-controls-empty {
            color: #94a3b8;
            font-style: italic;
            font-size: 0.82rem;
            padding: 8px;
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
            border-color: #16C4F4;
            box-shadow: 0 4px 16px rgba(0, 102, 204, 0.12);
            transform: translateY(-2px);
        }
        .framework-item .name {
            font-weight: 700;
            font-size: 0.85rem;
            color: #0D1735;
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
            color: #0D1735;
        }
        .framework-item .detail-link {
            font-size: 0.65rem;
            color: #16C4F4;
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
            background: #0D1735;
            color: #fff;
            border-color: #0D1735;
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
            color: #0D1735;
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
           FAQ - CARD ACCORDION THEME
           ============================================================ */
        .faq-section-wrapper {
            background: #f4f7fb;
            padding: 56px 0;
        }
        .faq-card-container {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04), 0 2px 6px rgba(15, 23, 42, 0.02);
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
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

        @media (max-width: 768px) {
            .faq-section-wrapper {
                padding: 36px 0;
            }
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
            border-color: #16C4F4;
            box-shadow: 0 4px 16px rgba(0, 102, 204, 0.12);
        }
        .blog-card .tag {
            font-size: 0.6rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #16C4F4;
            background: #e8f0fe;
            padding: 2px 10px;
            border-radius: 12px;
            display: inline-block;
        }
        .blog-card h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: #0D1735;
            margin: 8px 0 4px 0;
        }
        .blog-card p {
            font-size: 0.8rem;
            color: #5a6a82;
        }
        .blog-card a {
            color: #16C4F4;
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
            background: #0D1735;
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
            outline: 1px solid #16C4F4;
        }
        .subscribe-box .sub-form .btn-white {
            background: #fff;
            color: #0D1735;
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
            background: #0D1735;
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
            color: #0D1735;
        }
        .cta-simple p {
            color: #5a6a82;
            font-size: 0.9rem;
            margin: 4px 0 14px 0;
        }

        /* ============================================================
           FOOTER
           ============================================================ */
        /* Footer styles handled by footer.blade.php partial */

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media(max-width: 992px) {
            .hero {
                gap: 32px;
            }
            .hero-content h1 {
                font-size: 2.3rem;
            }
            .domains-grid {
                grid-template-columns: repeat(4, 1fr);
            }
            .framework-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media(max-width: 768px) {
            .container {
                padding: 0 16px;
            }
            .mobile-menu-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            .nav {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
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
                grid-template-columns: repeat(2, 1fr);
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

        @media(max-width: 576px) {
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

        @media(max-width: 480px) {
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

        @media(max-width: 380px) {
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
            background: #0D1735 !important;
            border-bottom: none !important;
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
            color: #0D1735 !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25) !important;
        }
        body.dark-mode .domain-card:hover {
            border-color: #16C4F4 !important;
            box-shadow: 0 8px 24px rgba(0, 102, 204, 0.25) !important;
            transform: translateY(-2px);
        }
        body.dark-mode .domain-card .icon {
            color: #16C4F4 !important;
        }
        body.dark-mode .domain-card .name {
            color: #0D1735 !important;
        }
        body.dark-mode .domain-card .count {
            color: #6a7a92 !important;
        }

        /* Dark mode overrides for Domains Pagination */
        body.dark-mode .fwdomains-page-btn,
        [data-theme="dark"] .fwdomains-page-btn,
        body.dark-mode .domains-page-btn,
        [data-theme="dark"] .domains-page-btn {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #f1f5f9 !important;
        }
        body.dark-mode .fwdomains-page-btn:hover:not(:disabled),
        [data-theme="dark"] .fwdomains-page-btn:hover:not(:disabled),
        body.dark-mode .domains-page-btn:hover:not(:disabled),
        [data-theme="dark"] .domains-page-btn:hover:not(:disabled) {
            background: #334155 !important;
            border-color: #38bdf8 !important;
            color: #38bdf8 !important;
        }
        body.dark-mode .fwdomains-page-number,
        [data-theme="dark"] .fwdomains-page-number,
        body.dark-mode .domains-page-number,
        [data-theme="dark"] .domains-page-number {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #cbd5e1 !important;
        }
        body.dark-mode .fwdomains-page-number:hover:not(.active),
        [data-theme="dark"] .fwdomains-page-number:hover:not(.active),
        body.dark-mode .domains-page-number:hover:not(.active),
        [data-theme="dark"] .domains-page-number:hover:not(.active) {
            background: #334155 !important;
            border-color: #38bdf8 !important;
            color: #38bdf8 !important;
        }
        body.dark-mode .fwdomains-page-number.active,
        [data-theme="dark"] .fwdomains-page-number.active,
        body.dark-mode .domains-page-number.active,
        [data-theme="dark"] .domains-page-number.active {
            background: #0284c7 !important;
            border-color: #0284c7 !important;
            color: #ffffff !important;
        }
        body.dark-mode .fwdomains-page-info,
        [data-theme="dark"] .fwdomains-page-info,
        body.dark-mode .domains-page-info,
        [data-theme="dark"] .domains-page-info {
            color: #94a3b8 !important;
        }

        /* Control Cards Dark Theme Overrides */
        body.dark-mode .control-card {
            background: #0f172a !important;
            border-color: #1e293b !important;
            color: #f8fafc !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4) !important;
        }

        body.dark-mode .control-card:hover {
            border-color: #334155 !important;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5) !important;
        }

        body.dark-mode .control-id {
            color: #cbd5e1 !important;
        }

        body.dark-mode .control-req-badge {
            background: rgba(56, 189, 248, 0.15) !important;
            color: #38bdf8 !important;
        }

        body.dark-mode .control-name {
            color: #ffffff !important;
        }

        body.dark-mode .control-desc {
            color: #94a3b8 !important;
        }

        body.dark-mode .control-arrow {
            color: #64748b !important;
        }

        body.dark-mode .control-card:hover .control-arrow {
            color: #38bdf8 !important;
        }

        body.dark-mode .tag-blue { background: rgba(37, 99, 235, 0.2) !important; color: #93c5fd !important; border: 1px solid rgba(59, 130, 246, 0.3); }
        body.dark-mode .tag-cyan { background: rgba(14, 165, 233, 0.2) !important; color: #7dd3fc !important; border: 1px solid rgba(14, 165, 233, 0.3); }
        body.dark-mode .tag-teal { background: rgba(16, 185, 129, 0.2) !important; color: #6ee7b7 !important; border: 1px solid rgba(16, 185, 129, 0.3); }
        body.dark-mode .tag-emerald { background: rgba(34, 197, 94, 0.2) !important; color: #86efac !important; border: 1px solid rgba(34, 197, 94, 0.3); }
        body.dark-mode .tag-purple { background: rgba(168, 85, 247, 0.2) !important; color: #d8b4fe !important; border: 1px solid rgba(168, 85, 247, 0.3); }
        body.dark-mode .tag-neutral { background: rgba(148, 163, 184, 0.2) !important; color: #cbd5e1 !important; border: 1px solid rgba(148, 163, 184, 0.3); }

        /* Dark mode overrides for Controls Pagination */
        body.dark-mode .controls-page-btn {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #f1f5f9 !important;
        }
        body.dark-mode .controls-page-btn:hover:not(:disabled) {
            background: #334155 !important;
            border-color: #38bdf8 !important;
            color: #38bdf8 !important;
        }
        body.dark-mode .controls-page-number {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #cbd5e1 !important;
        }
        body.dark-mode .controls-page-number:hover:not(.active) {
            background: #334155 !important;
            border-color: #38bdf8 !important;
            color: #38bdf8 !important;
        }
        body.dark-mode .controls-page-number.active {
            background: #0284c7 !important;
            border-color: #0284c7 !important;
            color: #ffffff !important;
        }
        body.dark-mode .controls-page-info {
            color: #94a3b8 !important;
        }

        /* Framework Items (Light Cream in Dark Theme) */
        body.dark-mode .framework-item {
            background: #faf8f5 !important;
            border: 1px solid #ede7db !important;
            color: #0D1735 !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25) !important;
        }
        body.dark-mode .framework-item:hover {
            border-color: #16C4F4 !important;
            box-shadow: 0 8px 24px rgba(0, 102, 204, 0.25) !important;
            transform: translateY(-2px);
        }
        body.dark-mode .framework-item .name {
            color: #0D1735 !important;
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
            color: #0D1735 !important;
        }
        body.dark-mode .framework-item .detail-link {
            color: #16C4F4 !important;
        }

        /* Dark mode overrides for Frameworks Pagination */
        body.dark-mode .frameworks-page-btn {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #f1f5f9 !important;
        }
        body.dark-mode .frameworks-page-btn:hover:not(:disabled) {
            background: #334155 !important;
            border-color: #38bdf8 !important;
            color: #38bdf8 !important;
        }
        body.dark-mode .frameworks-page-number {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #cbd5e1 !important;
        }
        body.dark-mode .frameworks-page-number:hover:not(.active) {
            background: #334155 !important;
            border-color: #38bdf8 !important;
            color: #38bdf8 !important;
        }
        body.dark-mode .frameworks-page-number.active {
            background: #0284c7 !important;
            border-color: #0284c7 !important;
            color: #ffffff !important;
        }
        body.dark-mode .frameworks-page-info {
            color: #94a3b8 !important;
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

        /* Comparison Table & Governance Domains Table */
        body.dark-mode .compare-table-wrap,
        [data-theme="dark"] .compare-table-wrap,
        body.dark-mode .dct-wrapper,
        [data-theme="dark"] .dct-wrapper {
            background: #0f172a !important;
            border-color: #1e293b !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
        }
        body.dark-mode .compare-table-wrap table,
        [data-theme="dark"] .compare-table-wrap table,
        body.dark-mode .dct-table,
        [data-theme="dark"] .dct-table {
            color: #f1f5f9 !important;
        }
        body.dark-mode .compare-table-wrap th,
        [data-theme="dark"] .compare-table-wrap th,
        body.dark-mode .dct-thead-tr,
        [data-theme="dark"] .dct-thead-tr,
        body.dark-mode .dct-th,
        [data-theme="dark"] .dct-th {
            background: #1e293b !important;
            color: #94a3b8 !important;
            border-bottom-color: #334155 !important;
        }
        body.dark-mode .compare-table-wrap td,
        [data-theme="dark"] .compare-table-wrap td,
        body.dark-mode .dct-row,
        [data-theme="dark"] .dct-row {
            border-bottom-color: #1e293b !important;
            color: #e2e8f0 !important;
        }
        body.dark-mode .dct-row:hover,
        [data-theme="dark"] .dct-row:hover,
        body.dark-mode .compare-table-wrap tr:hover td,
        [data-theme="dark"] .compare-table-wrap tr:hover td {
            background: rgba(30, 41, 59, 0.7) !important;
        }
        body.dark-mode .dct-code,
        [data-theme="dark"] .dct-code,
        body.dark-mode .compare-table-wrap td strong,
        [data-theme="dark"] .compare-table-wrap td strong {
            color: #ffffff !important;
        }
        body.dark-mode .dct-title,
        [data-theme="dark"] .dct-title,
        body.dark-mode .dct-ctrl-name,
        [data-theme="dark"] .dct-ctrl-name {
            color: #cbd5e1 !important;
        }
        body.dark-mode .dct-desc,
        [data-theme="dark"] .dct-desc,
        body.dark-mode .dct-more,
        [data-theme="dark"] .dct-more {
            color: #94a3b8 !important;
        }
        body.dark-mode .dct-td-controls,
        [data-theme="dark"] .dct-td-controls {
            color: #cbd5e1 !important;
        }
        body.dark-mode .dct-ctrl-id,
        [data-theme="dark"] .dct-ctrl-id {
            color: #38bdf8 !important;
        }
        body.dark-mode .dct-empty,
        [data-theme="dark"] .dct-empty {
            color: #64748b !important;
        }
        body.dark-mode .view-domain-btn,
        [data-theme="dark"] .view-domain-btn {
            background: #1e293b !important;
            color: #38bdf8 !important;
            border-color: #334155 !important;
        }
        body.dark-mode .view-domain-btn:hover,
        [data-theme="dark"] .view-domain-btn:hover {
            background: #0284c7 !important;
            color: #ffffff !important;
            border-color: #0284c7 !important;
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.4) !important;
        }
        body.dark-mode .dct-note,
        [data-theme="dark"] .dct-note,
        body.dark-mode .dct-note i,
        [data-theme="dark"] .dct-note i {
            color: #94a3b8 !important;
        }
        body.dark-mode .compare-table-wrap .highlight-cell,
        [data-theme="dark"] .compare-table-wrap .highlight-cell {
            background: #1e293b !important;
            color: #38bdf8 !important;
            font-weight: 700 !important;
        }

        /* Dark mode modal card */
        body.dark-mode .ucl-modal-card,
        [data-theme="dark"] .ucl-modal-card {
            background: #0f172a !important;
            border-color: #1e293b !important;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5) !important;
        }
        body.dark-mode .ucl-modal-header,
        [data-theme="dark"] .ucl-modal-header,
        body.dark-mode .ucl-modal-footer,
        [data-theme="dark"] .ucl-modal-footer {
            background: #1e293b !important;
            border-color: #334155 !important;
        }
        body.dark-mode .modal-domain-code,
        [data-theme="dark"] .modal-domain-code {
            background: #0369a1 !important;
            color: #ffffff !important;
        }
        body.dark-mode .modal-domain-title,
        [data-theme="dark"] .modal-domain-title {
            color: #ffffff !important;
        }
        body.dark-mode .modal-body-sub,
        [data-theme="dark"] .modal-body-sub {
            color: #cbd5e1 !important;
        }
        body.dark-mode .modal-control-item,
        [data-theme="dark"] .modal-control-item {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #e2e8f0 !important;
        }
        body.dark-mode .modal-ctrl-id,
        [data-theme="dark"] .modal-ctrl-id {
            color: #38bdf8 !important;
        }
        body.dark-mode .modal-ctrl-name,
        [data-theme="dark"] .modal-ctrl-name {
            color: #f1f5f9 !important;
        }
        body.dark-mode .ucl-modal-close,
        [data-theme="dark"] .ucl-modal-close {
            color: #94a3b8 !important;
        }
        body.dark-mode .ucl-modal-close:hover,
        [data-theme="dark"] .ucl-modal-close:hover {
            color: #ffffff !important;
        }
        body.dark-mode .modal-close-btn,
        [data-theme="dark"] .modal-close-btn {
            border-color: #334155 !important;
            color: #cbd5e1 !important;
        }
        body.dark-mode .modal-close-btn:hover,
        [data-theme="dark"] .modal-close-btn:hover {
            background: #334155 !important;
            color: #ffffff !important;
        }

        /* FAQ Accordion Dark Mode */
        body.dark-mode .faq-section-wrapper {
            background: #0b1329 !important;
        }
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

        /* Blog Cards (Light Cream in Dark Theme) */
        body.dark-mode .blog-card {
            background: #faf8f5 !important;
            border: 1px solid #ede7db !important;
            color: #0D1735 !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25) !important;
        }
        body.dark-mode .blog-card:hover {
            border-color: #16C4F4 !important;
            box-shadow: 0 8px 24px rgba(0, 102, 204, 0.25) !important;
            transform: translateY(-2px);
        }
        body.dark-mode .blog-card .tag {
            background: #e8f0fe !important;
            color: #16C4F4 !important;
            border: none !important;
        }
        body.dark-mode .blog-card h4 {
            color: #0D1735 !important;
        }
        body.dark-mode .blog-card p {
            color: #5a6a82 !important;
        }
        body.dark-mode .blog-card a {
            color: #16C4F4 !important;
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
    <?php echo $__env->make('aspiaUcl.partials.header', ['activeTab' => 'home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- ============================================================
    MAIN CONTENT WRAPPER
    ============================================================ -->
    <main id="main-content" role="main">

        <!-- ============================================================
        HERO SECTION (#0D1735)
        ============================================================ -->
        <div class="hero-section">
            <!-- FREE BADGE -->
            <div class="free-badge">
                <div class="container">
                    <i class="fas fa-check-circle" style="color:#22c55e;" aria-hidden="true"></i>
                    <strong>Free &amp; Open</strong> — Explore <?php echo e($frameworksCount); ?>+ frameworks · <?php echo e($domainsCount); ?> domains · <?php echo e($controlsCount); ?> unified controls
                    <span style="margin-left:12px;font-size:0.7rem;color:#7a8fae;">✓ No sign-up required</span>
                    <span style="margin-left:12px;font-size:0.7rem;color:#7a8fae;">✓ Always updated</span>
                </div>
            </div>

            <!-- HERO -->
            <div class="container hero-container">
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
                            <a href="<?php echo e(route('frameworks.public_index')); ?>" class="btn btn-accent"><i class="fas fa-sitemap"></i> Browse Frameworks</a>
                            <a href="#about-ucl" class="btn btn-outline"><i class="fas fa-info-circle"></i> What is UCL?</a>
                        </div>
                        <div class="hero-stats">
                            <div class="stat"><span class="num"><?php echo e($frameworksCount); ?>+</span> <span class="lbl">Frameworks</span></div>
                            <div class="stat"><span class="num"><?php echo e($domainsCount); ?></span> <span class="lbl">Domains</span></div>
                            <div class="stat"><span class="num"><?php echo e($controlsCount); ?></span> <span class="lbl">Unified Controls</span></div>
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
        </div>

    <!-- ============================================================
    WHAT IS UCL — VISUAL FLOW
    ============================================================ -->
    <div id="about-ucl" class="section section-light" style="padding:32px 0 40px 0;">
        <div class="container">
            <div class="section-head" style="margin-bottom:24px;">
                <span class="tag">What is UCL?</span>
                <h2 style="font-size:1.8rem;">Frameworks → Unified Controls → <span style="color:#16C4F4;">One View</span></h2>
                <p style="font-size:0.95rem;color:#4a5a72;max-width:600px;margin:4px auto 0 auto;">
                    UCL is a free knowledge base that shows how different compliance frameworks connect through common controls.
                </p>
            </div>

            <div class="ucl-flow-wrapper">
                <div class="ucl-step">
                    <div class="icon" style="color:#16C4F4;"><i class="fas fa-shield-alt"></i></div>
                    <div class="label">Frameworks</div>
                    <div class="sub">ISO, NIST, PCI...</div>
                </div>

                <div class="ucl-arrow"><i class="fas fa-arrow-right"></i></div>

                <div class="ucl-step">
                    <div class="icon" style="color:#16C4F4;"><i class="fas fa-code-branch"></i></div>
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
                    <div style="font-size:1.2rem;color:#16C4F4;"><i class="fas fa-globe"></i></div>
                    <div><div class="info-title" style="font-weight:600;font-size:0.8rem;color:#0D1735;"><?php echo e($frameworksCount); ?>+ Frameworks</div><div class="info-sub" style="font-size:0.65rem;color:#6a7a92;">Global, India, Industry</div></div>
                </div>
                <div class="info-summary-card" style="display:flex;align-items:center;gap:10px;background:#f0f6ff;border-radius:10px;padding:10px 14px;border:1px solid #d4e3f7;">
                    <div style="font-size:1.2rem;color:#16C4F4;"><i class="fas fa-link"></i></div>
                    <div><div class="info-title" style="font-weight:600;font-size:0.8rem;color:#0D1735;">Control Mappings</div><div class="info-sub" style="font-size:0.65rem;color:#6a7a92;">Requirements → Unified Controls</div></div>
                </div>
                <div class="info-summary-card" style="display:flex;align-items:center;gap:10px;background:#f0f6ff;border-radius:10px;padding:10px 14px;border:1px solid #d4e3f7;">
                    <div style="font-size:1.2rem;color:#22c55e;"><i class="fas fa-unlock"></i></div>
                    <div><div class="info-title" style="font-weight:600;font-size:0.8rem;color:#0D1735;">Free &amp; Open</div><div class="info-sub" style="font-size:0.65rem;color:#6a7a92;">No sign-up required</div></div>
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

            <div class="domains-grid" id="domainsGrid">
                <?php $__empty_1 = true; $__currentLoopData = $domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(route('domains.show', $domain->slug ?? strtolower(str_replace(' ', '-', $domain->name)))); ?>" class="domain-card">
                        <div class="icon">
                            <?php if(str_contains(strtolower($domain->name), 'privacy')): ?>
                                <i class="fas fa-lock"></i>
                            <?php elseif(str_contains(strtolower($domain->name), 'cyber') || str_contains(strtolower($domain->name), 'cloud')): ?>
                                <i class="fas fa-cloud"></i>
                            <?php elseif(str_contains(strtolower($domain->name), 'risk')): ?>
                                <i class="fas fa-chart-pie"></i>
                            <?php elseif(str_contains(strtolower($domain->name), 'continuity') || str_contains(strtolower($domain->name), 'business')): ?>
                                <i class="fas fa-sync-alt"></i>
                            <?php elseif(str_contains(strtolower($domain->name), 'governance') || str_contains(strtolower($domain->name), 'compliance')): ?>
                                <i class="fas fa-gavel"></i>
                            <?php else: ?>
                                <i class="fas fa-shield-alt"></i>
                            <?php endif; ?>
                        </div>
                        <div class="name"><?php echo e($domain->name); ?></div>
                        <div class="count"><?php echo e($domain->controls_count ?? 0); ?> controls</div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <a href="<?php echo e(route('domains.public_index')); ?>" class="domain-card">
                        <div class="icon"><i class="fas fa-shield-alt"></i></div>
                        <div class="name">Information Security</div>
                        <div class="count">142 controls</div>
                    </a>
                    <a href="<?php echo e(route('domains.public_index')); ?>" class="domain-card">
                        <div class="icon"><i class="fas fa-lock"></i></div>
                        <div class="name">Data Privacy</div>
                        <div class="count">89 controls</div>
                    </a>
                <?php endif; ?>
            </div>

            <!-- DOMAINS PAGINATION -->
            <div class="domains-pagination" id="domainsPagination">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <button type="button" class="domains-page-btn" id="domainsPrevBtn" aria-label="Previous Page">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i> Prev
                    </button>
                    <div class="domains-page-numbers" id="domainsPageNumbers"></div>
                    <button type="button" class="domains-page-btn" id="domainsNextBtn" aria-label="Next Page">
                        Next <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
                <span class="domains-page-info" id="domainsPageInfo"></span>
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

            <?php
                $getControlThemeData = function($controlId, $controlName) {
                    $id = strtoupper($controlId ?? '');
                    $name = strtolower($controlName ?? '');

                    if (str_contains($id, 'GOV') || str_contains($name, 'governance')) {
                        return [
                            'icon' => 'fas fa-shield-alt',
                            'bg' => 'rgba(37, 99, 235, 0.08)',
                            'color' => '#2563eb',
                            'tags' => ['ISO 27001', 'NIST CSF', 'RBI CSF', '+2']
                        ];
                    } elseif (str_contains($id, 'POL') || str_contains($name, 'policy')) {
                        return [
                            'icon' => 'fas fa-file-alt',
                            'bg' => 'rgba(124, 58, 237, 0.08)',
                            'color' => '#7c3aed',
                            'tags' => ['ISO 27001', 'NIST CSF', 'PCI DSS', '+1']
                        ];
                    } elseif (str_contains($id, 'RSK') || str_contains($name, 'risk')) {
                        return [
                            'icon' => 'fas fa-exclamation-triangle',
                            'bg' => 'rgba(249, 115, 22, 0.08)',
                            'color' => '#ea580c',
                            'tags' => ['ISO 31000', 'NIST CSF', 'RBI CSF', '+2']
                        ];
                    } elseif (str_contains($id, 'CMP') || str_contains($name, 'compliance')) {
                        return [
                            'icon' => 'fas fa-clipboard-check',
                            'bg' => 'rgba(16, 185, 129, 0.08)',
                            'color' => '#059669',
                            'tags' => ['RBI CSF', 'PCI DSS', 'DORA', '+3']
                        ];
                    } elseif (str_contains($id, 'IAM') || str_contains($name, 'identity') || str_contains($name, 'access')) {
                        return [
                            'icon' => 'fas fa-user-shield',
                            'bg' => 'rgba(79, 70, 229, 0.08)',
                            'color' => '#4f46e5',
                            'tags' => ['ISO 27001', 'NIST CSF', 'CIS Controls', '+1']
                        ];
                    } elseif (str_contains($id, 'AST') || str_contains($name, 'asset')) {
                        return [
                            'icon' => 'fas fa-server',
                            'bg' => 'rgba(6, 182, 212, 0.08)',
                            'color' => '#0891b2',
                            'tags' => ['ISO 27001', 'CIS Controls', 'NIST CSF']
                        ];
                    } elseif (str_contains($id, 'DAT') || str_contains($name, 'data') || str_contains($name, 'privacy')) {
                        return [
                            'icon' => 'fas fa-lock',
                            'bg' => 'rgba(225, 29, 72, 0.08)',
                            'color' => '#e11d48',
                            'tags' => ['ISO 27701', 'GDPR', 'DPDP', '+2']
                        ];
                    } elseif (str_contains($id, 'CRY') || str_contains($name, 'crypto')) {
                        return [
                            'icon' => 'fas fa-key',
                            'bg' => 'rgba(147, 51, 234, 0.08)',
                            'color' => '#9333ea',
                            'tags' => ['NIST CSF', 'FIPS 140-2', 'CIS Controls']
                        ];
                    } elseif (str_contains($id, 'NET') || str_contains($name, 'network')) {
                        return [
                            'icon' => 'fas fa-network-wired',
                            'bg' => 'rgba(2, 132, 199, 0.08)',
                            'color' => '#0284c7',
                            'tags' => ['NIST CSF', 'CIS Controls', 'ISO 27001']
                        ];
                    } elseif (str_contains($id, 'END') || str_contains($name, 'endpoint')) {
                        return [
                            'icon' => 'fas fa-laptop',
                            'bg' => 'rgba(13, 148, 136, 0.08)',
                            'color' => '#0d9488',
                            'tags' => ['CIS Controls', 'NIST CSF', 'ISO 27001']
                        ];
                    } elseif (str_contains($id, 'CLD') || str_contains($name, 'cloud')) {
                        return [
                            'icon' => 'fas fa-cloud',
                            'bg' => 'rgba(3, 105, 161, 0.08)',
                            'color' => '#0369a1',
                            'tags' => ['NIST CSF', 'CIS Controls', 'ISO 27017', '+1']
                        ];
                    } elseif (str_contains($id, 'CFG') || str_contains($name, 'config')) {
                        return [
                            'icon' => 'fas fa-cog',
                            'bg' => 'rgba(71, 85, 105, 0.08)',
                            'color' => '#475569',
                            'tags' => ['CIS Controls', 'NIST CSF', 'ISO 27001']
                        ];
                    } elseif (str_contains($id, 'VUL') || str_contains($name, 'vulnerab')) {
                        return [
                            'icon' => 'fas fa-bug',
                            'bg' => 'rgba(220, 38, 38, 0.08)',
                            'color' => '#dc2626',
                            'tags' => ['NIST CSF', 'PCI DSS', 'ISO 27001']
                        ];
                    } elseif (str_contains($id, 'APP') || str_contains($name, 'application')) {
                        return [
                            'icon' => 'fas fa-code',
                            'bg' => 'rgba(5, 150, 105, 0.08)',
                            'color' => '#059669',
                            'tags' => ['OWASP Top 10', 'PCI DSS', 'NIST CSF']
                        ];
                    } elseif (str_contains($id, 'INC') || str_contains($name, 'incident')) {
                        return [
                            'icon' => 'fas fa-bell',
                            'bg' => 'rgba(217, 119, 6, 0.08)',
                            'color' => '#d97706',
                            'tags' => ['ISO 27001', 'NIST CSF', 'GDPR', '+1']
                        ];
                    } elseif (str_contains($id, 'BCM') || str_contains($name, 'continuity')) {
                        return [
                            'icon' => 'fas fa-sync-alt',
                            'bg' => 'rgba(13, 148, 136, 0.08)',
                            'color' => '#0d9488',
                            'tags' => ['ISO 22301', 'NIST CSF', 'RBI CSF']
                        ];
                    } elseif (str_contains($id, 'TPR') || str_contains($name, 'third-party') || str_contains($name, 'vendor')) {
                        return [
                            'icon' => 'fas fa-truck-loading',
                            'bg' => 'rgba(109, 40, 217, 0.08)',
                            'color' => '#6d28d9',
                            'tags' => ['ISO 27001', 'NIST CSF', 'DORA', '+2']
                        ];
                    } else {
                        return [
                            'icon' => 'fas fa-shield-alt',
                            'bg' => 'rgba(37, 99, 235, 0.08)',
                            'color' => '#2563eb',
                            'tags' => ['ISO 27001', 'NIST CSF', 'PCI DSS', '+1']
                        ];
                    }
                };

                $getControlTagClass = function($tagName) {
                    $tag = strtoupper(trim($tagName));
                    if (str_starts_with($tag, '+')) {
                        return 'tag-neutral';
                    } elseif (str_contains($tag, 'ISO')) {
                        return 'tag-blue';
                    } elseif (str_contains($tag, 'NIST')) {
                        return 'tag-teal';
                    } elseif (str_contains($tag, 'RBI') || str_contains($tag, 'FIPS')) {
                        return 'tag-emerald';
                    } elseif (str_contains($tag, 'PCI') || str_contains($tag, 'CIS')) {
                        return 'tag-cyan';
                    } elseif (str_contains($tag, 'GDPR') || str_contains($tag, 'DPDP') || str_contains($tag, 'DORA') || str_contains($tag, 'HIPAA') || str_contains($tag, 'COBIT')) {
                        return 'tag-purple';
                    } else {
                        return 'tag-blue';
                    }
                };

                $getDynamicTagsForControl = function($control, $defaultTags) {
                    if (!$control) return $defaultTags;

                    $rawTags = collect();

                    // 1. Dynamic Domain Frameworks (pivot relationship)
                    if ($control->domain && $control->domain->frameworks && $control->domain->frameworks->count() > 0) {
                        foreach ($control->domain->frameworks as $fw) {
                            $rawTags->push($fw->short_name ?: $fw->name ?: $fw->code);
                        }
                    }

                    // 2. Requirement mappings (if populated)
                    if ($control->requirements) {
                        $reqIds = $control->requirements->pluck('requirement_id')->filter();
                        if ($reqIds->isNotEmpty()) {
                            $mappings = \App\Models\RequirementFrameworkMapping::whereIn('requirement_id', $reqIds)->get();
                            foreach ($mappings as $m) {
                                $rawTags->push($m->framework_code ?: $m->framework_name);
                            }
                        }
                    }

                    $aliasMap = [
                        'General Data Protection Regulation (GDPR)' => 'GDPR',
                        'General Data Protection Regulation' => 'GDPR',
                        'Health Insurance Portability and Accountability Act' => 'HIPAA',
                        'Health Insurance Portability and Accountability Act (HIPAA)' => 'HIPAA',
                        'Digital Operational Resilience Act' => 'DORA',
                        'Digital Operational Resilience Act (DORA)' => 'DORA',
                        'Payment Card Industry Data Security Standard' => 'PCI DSS',
                        'PCI DSS' => 'PCI DSS',
                        'ISO/IEC 27001' => 'ISO 27001',
                        'NIST Cybersecurity Framework' => 'NIST CSF',
                        'Control Objectives for Information and Related Technologies' => 'COBIT',
                    ];

                    $formatted = $rawTags->filter()->map(function($t) use ($aliasMap) {
                        return $aliasMap[$t] ?? $t;
                    })->unique()->values();

                    if ($formatted->count() > 0) {
                        $display = $formatted->take(3)->all();
                        $remaining = $formatted->count() - 3;
                        if ($remaining > 0) {
                            $display[] = '+' . $remaining;
                        }
                        return $display;
                    }

                    return $defaultTags;
                };
            ?>

            <div class="controls-grid" id="controlsGrid">
                <?php $__empty_1 = true; $__currentLoopData = $controls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $control): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $theme = $getControlThemeData($control->control_id ?? '', $control->name ?? '');
                        $reqCount = $control->requirements_count ?? ($control->requirements ? $control->requirements->count() : 10);
                        $description = $control->business_description ?? $control->control_summary ?? $control->business_objective ?? 'Establish, govern, operate, monitor, and continually improve enterprise security.';
                        $cardTags = $getDynamicTagsForControl($control, $theme['tags']);
                    ?>
                    <a href="<?php echo e(route('controls.show', $control->control_id ?? $control->id)); ?>" class="control-card">
                        <div class="control-card-header">
                            <div class="control-icon-box" style="background: <?php echo e($theme['bg']); ?>; color: <?php echo e($theme['color']); ?>;">
                                <i class="<?php echo e($theme['icon']); ?>"></i>
                            </div>
                            <div class="control-header-info">
                                <div class="control-top-row">
                                    <span class="control-id"><?php echo e($control->control_id); ?></span>
                                    <span class="control-req-badge"><?php echo e($reqCount); ?> Requirements</span>
                                </div>
                                <h3 class="control-name"><?php echo e($control->name); ?></h3>
                            </div>
                        </div>
                        <p class="control-desc"><?php echo e(\Illuminate\Support\Str::limit($description, 115)); ?></p>
                        <div class="control-card-footer">
                            <div class="control-tags">
                                <?php $__currentLoopData = $cardTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="control-tag <?php echo e($getControlTagClass($tag)); ?>"><?php echo e($tag); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <span class="control-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php
                        $fallbackControls = [
                            ['id' => 'GOV-001', 'name' => 'Information Security Governance', 'req' => '12 Requirements', 'desc' => 'Establish, govern, operate, monitor, and continually improve an enterprise information security program.', 'tags' => ['ISO 27001', 'NIST CSF', 'RBI CSF', '+2']],
                            ['id' => 'POL-001', 'name' => 'Policy Management', 'req' => '8 Requirements', 'desc' => 'Define, maintain, and manage the lifecycle of security, privacy, and compliance policies.', 'tags' => ['ISO 27001', 'NIST CSF', 'PCI DSS', '+1']],
                            ['id' => 'RSK-001', 'name' => 'Risk Management Framework', 'req' => '10 Requirements', 'desc' => 'Establish and maintain a framework for identifying, assessing, treating, and monitoring risks.', 'tags' => ['ISO 31000', 'NIST CSF', 'RBI CSF', '+2']],
                            ['id' => 'CMP-001', 'name' => 'Compliance Program Management', 'req' => '10 Requirements', 'desc' => 'Establish and maintain a program to identify, manage, and monitor adherence to all applicable regulatory requirements.', 'tags' => ['RBI CSF', 'PCI DSS', 'DORA', '+3']],
                            ['id' => 'IAM-001', 'name' => 'Identity & Account Lifecycle Management', 'req' => '12 Requirements', 'desc' => 'Manage the entire lifecycle of digital identities, including creation, modification, and deprovisioning.', 'tags' => ['ISO 27001', 'NIST CSF', 'CIS Controls', '+1']],
                            ['id' => 'AST-001', 'name' => 'Asset Inventory Management', 'req' => '10 Requirements', 'desc' => 'Establish, maintain, and govern a comprehensive inventory of all technology assets, including hardware, software, and cloud assets.', 'tags' => ['ISO 27001', 'CIS Controls', 'NIST CSF']],
                            ['id' => 'DAT-001', 'name' => 'Data Protection & Privacy Strategy', 'req' => '10 Requirements', 'desc' => 'Establish, implement, and maintain an enterprise data protection and privacy strategy.', 'tags' => ['ISO 27701', 'GDPR', 'DPDP', '+2']],
                            ['id' => 'CRY-001', 'name' => 'Cryptographic Governance', 'req' => '10 Requirements', 'desc' => 'Establish and maintain an enterprise cryptographic governance framework defining the use, management, and lifecycle of cryptographic controls.', 'tags' => ['NIST CSF', 'FIPS 140-2', 'CIS Controls']],
                            ['id' => 'NET-001', 'name' => 'Secure Network Architecture', 'req' => '10 Requirements', 'desc' => 'Establish and maintain a secure network architecture incorporating defense-in-depth, Zero Trust principles, and network monitoring.', 'tags' => ['NIST CSF', 'CIS Controls', 'ISO 27001']],
                            ['id' => 'END-001', 'name' => 'Endpoint Protection', 'req' => '10 Requirements', 'desc' => 'Establish and maintain endpoint protection capabilities to prevent, detect, and mitigate malware and other threats.', 'tags' => ['CIS Controls', 'NIST CSF', 'ISO 27001']],
                            ['id' => 'CLD-001', 'name' => 'Cloud Security Governance', 'req' => '10 Requirements', 'desc' => 'Establish and maintain an enterprise cloud security governance framework, strategy, and policies.', 'tags' => ['NIST CSF', 'CIS Controls', 'ISO 27017', '+1']],
                            ['id' => 'CFG-001', 'name' => 'Secure Configuration Baseline', 'req' => '10 Requirements', 'desc' => 'Establish, maintain, and govern secure configuration baselines for systems, applications, and infrastructure.', 'tags' => ['CIS Controls', 'NIST CSF', 'ISO 27001']],
                        ];
                    ?>
                    <?php $__currentLoopData = $fallbackControls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $theme = $getControlThemeData($fb['id'], $fb['name']);
                        ?>
                        <a href="<?php echo e(route('controls.public_index')); ?>" class="control-card">
                            <div class="control-card-header">
                                <div class="control-icon-box" style="background: <?php echo e($theme['bg']); ?>; color: <?php echo e($theme['color']); ?>;">
                                    <i class="<?php echo e($theme['icon']); ?>"></i>
                                </div>
                                <div class="control-header-info">
                                    <div class="control-top-row">
                                        <span class="control-id"><?php echo e($fb['id']); ?></span>
                                        <span class="control-req-badge"><?php echo e($fb['req']); ?></span>
                                    </div>
                                    <h3 class="control-name"><?php echo e($fb['name']); ?></h3>
                                </div>
                            </div>
                            <p class="control-desc"><?php echo e($fb['desc']); ?></p>
                            <div class="control-card-footer">
                                <div class="control-tags">
                                    <?php $__currentLoopData = $fb['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="control-tag <?php echo e($getControlTagClass($tag)); ?>"><?php echo e($tag); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <span class="control-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <!-- CONTROLS PAGINATION -->
            <div class="controls-pagination" id="controlsPagination">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <button type="button" class="controls-page-btn" id="controlsPrevBtn" aria-label="Previous Page">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i> Prev
                    </button>
                    <div class="controls-page-numbers" id="controlsPageNumbers"></div>
                    <button type="button" class="controls-page-btn" id="controlsNextBtn" aria-label="Next Page">
                        Next <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
                <span class="controls-page-info" id="controlsPageInfo"></span>
            </div>

            <div style="text-align:center;margin-top:18px;">
                <a href="<?php echo e(route('controls.public_index')); ?>" class="btn btn-outline"><i class="fas fa-list"></i> View All <?php echo e($controlsCount); ?> Controls</a>
            </div>
        </div>
    </div>

    <!-- ============================================================
    STATS BANNER (DYNAMIC METRICS)
    ============================================================ -->
    <div class="section section-alt" style="padding:20px 0;">
        <div class="container">
            <div class="stats-banner">
                <div class="stat"><span class="num"><?php echo e($frameworksCount); ?></span><div class="lbl">Supported Frameworks</div></div>
                <div class="stat"><span class="num"><?php echo e($domainsCount); ?></span><div class="lbl">Governance Domains</div></div>
                <div class="stat"><span class="num"><?php echo e($controlsCount); ?></span><div class="lbl">Unified Controls</div></div>
                <div class="stat"><span class="num"><?php echo e(number_format($requirementsCount)); ?></span><div class="lbl">Framework Requirements</div></div>
                <div class="stat"><span class="num"><?php echo e(number_format($mappedRequirementsCount)); ?></span><div class="lbl">Mapped Requirements</div></div>
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

            <div class="framework-grid" id="frameworksGrid">
                <?php $__empty_1 = true; $__currentLoopData = $frameworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="framework-item" data-cat="<?php echo e(strtolower(($fw->region ?? '') . ' ' . ($fw->category ?? '') . ' ' . ($fw->framework_type ?? ''))); ?>">
                        <div><span class="name"><?php echo e($fw->name); ?></span> <span class="ver"><?php echo e($fw->version); ?></span></div>
                        <div class="cat"><?php echo e($fw->category ?? $fw->publisher ?? 'Governance'); ?> · <?php echo e($fw->region ?? 'Global'); ?></div>
                        <div class="meta">
                            <span><?php echo e($fw->display_order ?? 50); ?> controls</span>
                            <span class="controls"><?php echo e($fw->mappings_count ?? 0); ?> mapped</span>
                        </div>
                        <a href="<?php echo e(route('frameworks.show', $fw->slug ?? $fw->framework_id ?? 'view')); ?>" class="detail-link">View Details →</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <!-- Global & International Fallbacks -->
                    <div class="framework-item" data-cat="global security">
                        <div><span class="name">ISO/IEC 27001</span><span class="ver">2022</span></div>
                        <div class="cat">Information Security · Global</div>
                        <div class="meta"><span>93 controls</span><span>81 mapped</span></div>
                        <a href="<?php echo e(route('frameworks.show', 'iso-27001')); ?>" class="detail-link">View Details →</a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- FRAMEWORKS PAGINATION -->
            <div class="frameworks-pagination" id="frameworksPagination">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <button type="button" class="frameworks-page-btn" id="frameworksPrevBtn" aria-label="Previous Page">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i> Prev
                    </button>
                    <div class="frameworks-page-numbers" id="frameworksPageNumbers"></div>
                    <button type="button" class="frameworks-page-btn" id="frameworksNextBtn" aria-label="Next Page">
                        Next <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
                <span class="frameworks-page-info" id="frameworksPageInfo"></span>
            </div>
        </div>
    </div>

    <!-- ============================================================
    DOMAINS AND ASSOCIATED CONTROLS (MATCHING REFERENCE DESIGN)
    ============================================================ -->
    <div class="section section-alt" id="domainControlsSection">
        <div class="container">
            <div class="section-head">
                <span class="tag">Governance Domains</span>
                <h2>Domains and Associated Controls</h2>
                <p>Browse UCL governance domains and their associated unified controls.</p>
            </div>

            <div class="compare-table-wrap dct-wrapper">
                <table id="domainControlsTable" class="dct-table">
                    <thead>
                        <tr class="dct-thead-tr">
                            <th class="dct-th dct-th-domain">GOVERNANCE DOMAIN</th>
                            <th class="dct-th dct-th-scope">SCOPE &amp; OVERVIEW</th>
                            <th class="dct-th dct-th-controls">ASSOCIATED UNIFIED CONTROLS</th>
                            <th class="dct-th dct-th-action">ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="domainControlsTableBody">
                        <?php $__currentLoopData = $domainsWithControls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $dom = $item['domain'];
                                $ctrls = $item['controls'];
                                $code = $dom->domain_code ?: $dom->domain_id ?: 'DOM';
                                $overview = $dom->short_overview ?: ($dom->scope ?: ($dom->purpose ?: 'Defines security governance and control requirements for ' . $dom->name . '.'));
                                $controlsList = $ctrls->map(fn($c) => ['id' => $c->control_id, 'name' => $c->name])->values()->all();
                                $controlsJson = e(json_encode($controlsList));
                                $detailUrl = route('domains.show', $dom->slug ?: $dom->id);
                            ?>
                            <tr class="domain-control-row dct-row">
                                <td class="dct-td dct-td-domain">
                                    <div class="dct-domain-meta">
                                        <strong class="dct-code"><?php echo e($code); ?></strong>
                                        <span class="dct-title"><?php echo e($dom->name); ?></span>
                                    </div>
                                </td>
                                <td class="dct-td dct-td-scope">
                                    <span class="dct-desc" title="<?php echo e($overview); ?>">
                                        <?php echo e($overview); ?>

                                    </span>
                                </td>
                                <td class="dct-td dct-td-controls">
                                    <?php if($ctrls->count() > 0): ?>
                                        <div class="dct-controls-list">
                                            <?php $__currentLoopData = $ctrls->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctrl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="dct-control-item">
                                                    <strong class="dct-ctrl-id"><?php echo e($ctrl->control_id); ?></strong>
                                                    <span class="dct-ctrl-name"><?php echo e($ctrl->name); ?></span>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ctrls->count() > 1): ?>
                                                <div class="dct-more">
                                                    (+<?php echo e($ctrls->count() - 1); ?> more)
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <span class="dct-empty">No controls mapped</span>
                                    <?php endif; ?>
                                </td>
                                <td class="dct-td dct-td-action">
                                    <button type="button" 
                                            class="view-domain-btn"
                                            data-code="<?php echo e($code); ?>"
                                            data-name="<?php echo e($dom->name); ?>"
                                            data-url="<?php echo e($detailUrl); ?>"
                                            data-controls="<?php echo e(json_encode($controlsList)); ?>">
                                        <span>View</span> <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- DOMAIN CONTROLS PAGINATION (5 ROWS PER PAGE) -->
            <div class="fwdomains-pagination" id="domainControlsPagination" style="margin-top: 20px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <button type="button" class="fwdomains-page-btn" id="domainControlsPrevBtn" aria-label="Previous Page">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i> Prev
                    </button>
                    <div class="fwdomains-page-numbers" id="domainControlsPageNumbers"></div>
                    <button type="button" class="fwdomains-page-btn" id="domainControlsNextBtn" aria-label="Next Page">
                        Next <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
                <span class="fwdomains-page-info" id="domainControlsPageInfo"></span>
            </div>

            <p class="dct-note">
                <i class="fas fa-info-circle"></i> Each governance domain categorizes unified security controls to streamline framework implementation and audit readiness.
            </p>
        </div>
    </div>

    <!-- DOMAIN CONTROLS MODAL -->
    <div id="domainControlsModal" class="ucl-modal-overlay" style="display: none;">
        <div class="ucl-modal-card">
            <div class="ucl-modal-header">
                <div>
                    <span class="badge-count modal-domain-code" id="modalDomainCode"></span>
                    <h3 id="modalDomainTitle" class="modal-domain-title"></h3>
                </div>
                <button type="button" class="ucl-modal-close" onclick="closeDomainModal()">&times;</button>
            </div>
            <div class="ucl-modal-body">
                <p class="modal-body-sub">Complete List of Associated Unified Controls:</p>
                <div id="modalControlsList" class="modal-controls-list"></div>
            </div>
            <div class="ucl-modal-footer">
                <a href="#" id="modalDomainLink" class="btn btn-accent" style="font-size: 0.8rem; padding: 8px 16px; border-radius: 8px; text-decoration: none;">View Full Domain Page →</a>
                <button type="button" class="btn btn-outline modal-close-btn" onclick="closeDomainModal()" style="font-size: 0.8rem; padding: 8px 16px; border-radius: 8px; cursor: pointer;">Close</button>
            </div>
        </div>
    </div>

    <!-- ============================================================
    FAQ
    ============================================================ -->
    <div class="section faq-section-wrapper" id="faq">
        <div class="container">
            <div class="section-head">
                <span class="tag">FAQ</span>
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers to common questions about UCL and framework mappings.</p>
            </div>

            <div class="faq-card-container">
                <div class="faq-list">
                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">What is the Unified Control Layer (UCL)?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">UCL is a free knowledge base that shows how different compliance frameworks (ISO 27001, NIST, PCI DSS, GDPR, DPDP, etc.) <strong>connect through common unified controls</strong>.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">Which compliance frameworks are supported in UCL?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">UCL supports <strong>20+ frameworks</strong> including ISO 27001, ISO 27002, NIST CSF, NIST 800-53, CIS Controls, PCI DSS, COBIT, SOC 2, ISO 27701, GDPR, ISO 22301, DORA, NIS2, HIPAA, DPDP Act, RBI CSF, CERT-In, SEBI CSF, IRDAI, and NPCI ISR.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">What are the major governance domains in UCL?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">UCL covers <strong><?php echo e($domainsCount); ?> major domains</strong> including Information Security, Data Privacy, Cybersecurity, Governance &amp; Compliance, Risk Management, and Business Continuity.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">What is a unified control?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">A unified control is a single control that can <strong>satisfy requirements from multiple frameworks</strong>. For example, UCL-001 (Access Control) maps to ISO 27001 A.5.15, NIST CSF PR.AA, CIS Control 6, and PCI DSS Requirement 7.</div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="q" role="button" aria-expanded="false" tabindex="0">
                            <span class="q-text">How are frameworks mapped to UCL controls?</span>
                            <span class="faq-toggle-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="a-wrapper">
                            <div class="a-inner">
                                <div class="a">Each framework requirement is analyzed and mapped to the most relevant unified control. The mapping shows which controls cover which requirements, helping organizations <strong>reduce duplicate compliance efforts</strong>.</div>
                            </div>
                        </div>
                    </div>
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
                    <span class="tag">RBI Audit</span>
                    <h4>RBI Guidelines For Concurrent Audit Of Banks (2026)</h4>
                    <p>Complete guide to RBI concurrent audit guidelines for banks covering scope, empanelment, compliance, ITGC, continuous monitoring, and audit readiness.</p>
                    <a href="https://aspiainfotech.com/2026/06/05/rbi-guidelines-for-concurrent-audit-of-banks/" target="_blank" rel="noopener noreferrer">Read More →</a>
                </div>
                <div class="blog-card">
                    <span class="tag">Banking Audit</span>
                    <h4>RBI Audit For Banks: Complete Cybersecurity, ITGC &amp; Compliance Guide</h4>
                    <p>Learn how RBI audits work for banks, including cybersecurity audits, audit checklists, evidence requirements, observations, and operational audit readiness.</p>
                    <a href="https://aspiainfotech.com/2026/05/30/rbi-audit-for-banks-guide/" target="_blank" rel="noopener noreferrer">Read More →</a>
                </div>
                <div class="blog-card">
                    <span class="tag">RBI Cybersecurity</span>
                    <h4>RBI Cyber Security Framework For Banks: Complete Compliance &amp; Audit Guide</h4>
                    <p>Learn RBI Cyber Security Framework requirements, security controls, audit expectations, compliance checklists, and how banks automate compliance.</p>
                    <a href="https://aspiainfotech.com/2026/05/16/rbi-cyber-security-framework-for-banks-guide/" target="_blank" rel="noopener noreferrer">Read More →</a>
                </div>
            </div>
        </div>
    </div>


    <!-- ============================================================
    CTA (DARK SECONDARY NAVY)
    ============================================================ -->
    <section class="section section-cta-navy" style="background:#0B132B;padding:44px 0 48px 0;color:#ffffff;text-align:center;" aria-label="Explore Call to Action">
        <div class="container">
            <div class="cta-simple">
                <h3 style="font-size:1.75rem;font-weight:800;color:#ffffff;margin-bottom:8px;letter-spacing:-0.02em;">Explore UCL — Free &amp; Open</h3>
                <p style="font-size:1rem;color:#94a3b8;max-width:560px;margin:0 auto 20px auto;line-height:1.5;">No sign-up. No paywall. Just a clean reference for compliance professionals.</p>
                <a href="<?php echo e(route('frameworks.public_index')); ?>" class="btn btn-accent" title="Browse All Compliance Frameworks" style="background:#16C4F4;color:#ffffff;font-weight:700;padding:10px 24px;border-radius:8px;box-shadow:0 4px 16px rgba(22, 196, 244, 0.25);"><i class="fas fa-sitemap" aria-hidden="true"></i> Browse All Frameworks</a>
                <span style="display:block;margin-top:14px;font-size:0.75rem;color:#64748b;font-weight:500;"><?php echo e($frameworksCount); ?>+ frameworks · <?php echo e($domainsCount); ?> domains · <?php echo e($controlsCount); ?> unified controls · <?php echo e(number_format($requirementsCount)); ?> requirements</span>
            </div>
        </div>
    </section>

    </main><!-- END MAIN CONTENT WRAPPER -->

    <!-- ============================================================
    FOOTER
    ============================================================ -->
    <?php echo $__env->make('aspiaUcl.partials.homepage_footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- ============================================================
    JAVASCRIPT
    ============================================================ -->
    <script>
        (function() {
            // Domains Section Pagination (Set to 3 rows)
            const grid = document.getElementById('domainsGrid');
            if (grid) {
                const cards = Array.from(grid.querySelectorAll('.domain-card'));
                if (cards.length > 0) {
                    const prevBtn = document.getElementById('domainsPrevBtn');
                    const nextBtn = document.getElementById('domainsNextBtn');
                    const numbersContainer = document.getElementById('domainsPageNumbers');
                    const infoSpan = document.getElementById('domainsPageInfo');
                    const paginationWrap = document.getElementById('domainsPagination');

                    let currentPage = 1;

                    function getCols() {
                        const w = window.innerWidth;
                        if (w > 992) return 6;
                        if (w > 768) return 4;
                        if (w > 480) return 3;
                        if (w > 380) return 2;
                        return 1;
                    }

                    function render() {
                        const cols = getCols();
                        const itemsPerPage = cols * 3; // Set only 3 rows
                        const totalPages = Math.ceil(cards.length / itemsPerPage);

                        if (totalPages <= 1) {
                            cards.forEach(card => card.style.display = '');
                            if (paginationWrap) paginationWrap.style.display = 'none';
                            return;
                        } else {
                            if (paginationWrap) paginationWrap.style.display = 'flex';
                        }

                        if (currentPage > totalPages) currentPage = totalPages;
                        if (currentPage < 1) currentPage = 1;

                        const startIdx = (currentPage - 1) * itemsPerPage;
                        const endIdx = startIdx + itemsPerPage;

                        cards.forEach((card, idx) => {
                            if (idx >= startIdx && idx < endIdx) {
                                card.style.display = '';
                            } else {
                                card.style.display = 'none';
                            }
                        });

                        if (prevBtn) prevBtn.disabled = (currentPage === 1);
                        if (nextBtn) nextBtn.disabled = (currentPage === totalPages);

                        if (infoSpan) {
                            const visibleCountEnd = Math.min(endIdx, cards.length);
                            infoSpan.textContent = `Showing ${startIdx + 1}–${visibleCountEnd} of ${cards.length} domains`;
                        }

                        if (numbersContainer) {
                            numbersContainer.innerHTML = '';
                            for (let i = 1; i <= totalPages; i++) {
                                const btn = document.createElement('button');
                                btn.type = 'button';
                                btn.className = 'domains-page-number' + (i === currentPage ? ' active' : '');
                                btn.textContent = i;
                                btn.setAttribute('aria-label', `Page ${i}`);
                                btn.addEventListener('click', function() {
                                    currentPage = i;
                                    render();
                                    grid.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                                });
                                numbersContainer.appendChild(btn);
                            }
                        }
                    }

                    if (prevBtn) {
                        prevBtn.addEventListener('click', function() {
                            if (currentPage > 1) {
                                currentPage--;
                                render();
                                grid.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }
                        });
                    }

                    if (nextBtn) {
                        nextBtn.addEventListener('click', function() {
                            const cols = getCols();
                            const itemsPerPage = cols * 3;
                            const totalPages = Math.ceil(cards.length / itemsPerPage);
                            if (currentPage < totalPages) {
                                currentPage++;
                                render();
                                grid.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }
                        });
                    }

                    let resizeTimer;
                    window.addEventListener('resize', function() {
                        clearTimeout(resizeTimer);
                        resizeTimer = setTimeout(render, 100);
                    });

                    render();
                }
            }

            // Controls Section Pagination (Set to 3 rows)
            const controlsGrid = document.getElementById('controlsGrid');
            if (controlsGrid) {
                const controlCards = Array.from(controlsGrid.querySelectorAll('.control-card'));
                if (controlCards.length > 0) {
                    const prevBtn = document.getElementById('controlsPrevBtn');
                    const nextBtn = document.getElementById('controlsNextBtn');
                    const numbersContainer = document.getElementById('controlsPageNumbers');
                    const infoSpan = document.getElementById('controlsPageInfo');
                    const paginationWrap = document.getElementById('controlsPagination');

                    let currentPage = 1;

                    function getCtrlCols() {
                        const w = window.innerWidth;
                        if (w > 992) return 4;
                        if (w > 768) return 3;
                        if (w > 480) return 2;
                        return 1;
                    }

                    function renderControls() {
                        const cols = getCtrlCols();
                        const itemsPerPage = cols * 3;
                        const totalPages = Math.ceil(controlCards.length / itemsPerPage);

                        if (totalPages <= 1) {
                            controlCards.forEach(card => card.style.display = 'flex');
                            if (paginationWrap) paginationWrap.style.display = 'none';
                            return;
                        } else {
                            if (paginationWrap) paginationWrap.style.display = 'flex';
                        }

                        if (currentPage > totalPages) currentPage = totalPages;
                        if (currentPage < 1) currentPage = 1;

                        const startIdx = (currentPage - 1) * itemsPerPage;
                        const endIdx = startIdx + itemsPerPage;

                        controlCards.forEach((card, idx) => {
                            if (idx >= startIdx && idx < endIdx) {
                                card.style.display = 'flex';
                            } else {
                                card.style.display = 'none';
                            }
                        });

                        if (prevBtn) prevBtn.disabled = (currentPage === 1);
                        if (nextBtn) nextBtn.disabled = (currentPage === totalPages);

                        if (infoSpan) {
                            const visibleCountEnd = Math.min(endIdx, controlCards.length);
                            infoSpan.textContent = `Showing ${startIdx + 1}–${visibleCountEnd} of ${controlCards.length} controls`;
                        }

                        if (numbersContainer) {
                            numbersContainer.innerHTML = '';
                            for (let i = 1; i <= totalPages; i++) {
                                const btn = document.createElement('button');
                                btn.type = 'button';
                                btn.className = 'controls-page-number' + (i === currentPage ? ' active' : '');
                                btn.textContent = i;
                                btn.setAttribute('aria-label', `Page ${i}`);
                                btn.addEventListener('click', function() {
                                    currentPage = i;
                                    renderControls();
                                    controlsGrid.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                                });
                                numbersContainer.appendChild(btn);
                            }
                        }
                    }

                    if (prevBtn) {
                        prevBtn.addEventListener('click', function() {
                            if (currentPage > 1) {
                                currentPage--;
                                renderControls();
                                controlsGrid.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }
                        });
                    }

                    if (nextBtn) {
                        nextBtn.addEventListener('click', function() {
                            const cols = getCtrlCols();
                            const itemsPerPage = cols * 3;
                            const totalPages = Math.ceil(controlCards.length / itemsPerPage);
                            if (currentPage < totalPages) {
                                currentPage++;
                                renderControls();
                                controlsGrid.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }
                        });
                    }

                    let ctrlResizeTimer;
                    window.addEventListener('resize', function() {
                        clearTimeout(ctrlResizeTimer);
                        ctrlResizeTimer = setTimeout(renderControls, 100);
                    });

                    renderControls();
                }
            }

            // Frameworks Section Pagination + Filter Chips (Set to 3 rows)
            const frameworkGrid = document.getElementById('frameworksGrid');
            if (frameworkGrid) {
                const allFwItems = Array.from(frameworkGrid.querySelectorAll('.framework-item'));
                const chips = document.querySelectorAll('.filter-chips .chip');
                const prevBtn = document.getElementById('frameworksPrevBtn');
                const nextBtn = document.getElementById('frameworksNextBtn');
                const numbersContainer = document.getElementById('frameworksPageNumbers');
                const infoSpan = document.getElementById('frameworksPageInfo');
                const paginationWrap = document.getElementById('frameworksPagination');

                let activeCategory = 'all';
                let currentPage = 1;

                function getFwCols() {
                    const w = window.innerWidth;
                    if (w > 992) return 5;
                    if (w > 768) return 4;
                    if (w > 480) return 3;
                    if (w > 380) return 2;
                    return 1;
                }

                function getMatchingItems() {
                    if (activeCategory === 'all') {
                        return allFwItems;
                    }
                    return allFwItems.filter(item => {
                        const cats = item.getAttribute('data-cat') || '';
                        return cats.includes(activeCategory);
                    });
                }

                function renderFrameworks() {
                    const matchingItems = getMatchingItems();
                    const cols = getFwCols();
                    const itemsPerPage = cols * 3; // Set only 3 rows
                    const totalPages = Math.ceil(matchingItems.length / itemsPerPage);

                    allFwItems.forEach(item => item.style.display = 'none');

                    if (matchingItems.length === 0) {
                        if (paginationWrap) paginationWrap.style.display = 'none';
                        if (infoSpan) infoSpan.textContent = 'No frameworks found in this category';
                        return;
                    }

                    if (totalPages <= 1) {
                        if (paginationWrap) paginationWrap.style.display = 'none';
                    } else {
                        if (paginationWrap) paginationWrap.style.display = 'flex';
                    }

                    if (currentPage > totalPages) currentPage = totalPages || 1;
                    if (currentPage < 1) currentPage = 1;

                    const startIdx = (currentPage - 1) * itemsPerPage;
                    const endIdx = startIdx + itemsPerPage;

                    matchingItems.forEach((item, idx) => {
                        if (idx >= startIdx && idx < endIdx) {
                            item.style.display = 'flex';
                        }
                    });

                    if (prevBtn) prevBtn.disabled = (currentPage === 1);
                    if (nextBtn) nextBtn.disabled = (currentPage === totalPages || totalPages === 0);

                    if (infoSpan) {
                        const visibleCountEnd = Math.min(endIdx, matchingItems.length);
                        infoSpan.textContent = `Showing ${startIdx + 1}–${visibleCountEnd} of ${matchingItems.length} frameworks`;
                    }

                    if (numbersContainer) {
                        numbersContainer.innerHTML = '';
                        for (let i = 1; i <= totalPages; i++) {
                            const btn = document.createElement('button');
                            btn.type = 'button';
                            btn.className = 'frameworks-page-number' + (i === currentPage ? ' active' : '');
                            btn.textContent = i;
                            btn.setAttribute('aria-label', `Page ${i}`);
                            btn.addEventListener('click', function() {
                                currentPage = i;
                                renderFrameworks();
                                frameworkGrid.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            });
                            numbersContainer.appendChild(btn);
                        }
                    }
                }

                chips.forEach(chip => {
                    chip.addEventListener('click', function() {
                        chips.forEach(c => c.classList.remove('active'));
                        this.classList.add('active');
                        activeCategory = this.getAttribute('data-category');
                        currentPage = 1;
                        renderFrameworks();
                    });
                });

                if (prevBtn) {
                    prevBtn.addEventListener('click', function() {
                        if (currentPage > 1) {
                            currentPage--;
                            renderFrameworks();
                            frameworkGrid.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }
                    });
                }

                if (nextBtn) {
                    nextBtn.addEventListener('click', function() {
                        const matchingItems = getMatchingItems();
                        const cols = getFwCols();
                        const itemsPerPage = cols * 3;
                        const totalPages = Math.ceil(matchingItems.length / itemsPerPage);
                        if (currentPage < totalPages) {
                            currentPage++;
                            renderFrameworks();
                            frameworkGrid.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }
                    });
                }

                let fwResizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(fwResizeTimer);
                    fwResizeTimer = setTimeout(renderFrameworks, 100);
                });

                renderFrameworks();
            }

            // Domain Controls Modal Functions
            window.openDomainControlsModal = function(code, name, linkUrl, controls) {
                const modal = document.getElementById('domainControlsModal');
                const codeSpan = document.getElementById('modalDomainCode');
                const titleHeading = document.getElementById('modalDomainTitle');
                const listContainer = document.getElementById('modalControlsList');
                const domainLink = document.getElementById('modalDomainLink');

                if (!modal) return;

                if (codeSpan) codeSpan.textContent = code;
                if (titleHeading) titleHeading.textContent = name;
                if (domainLink) domainLink.href = linkUrl;

                if (listContainer) {
                    listContainer.innerHTML = '';
                    if (controls && controls.length > 0) {
                        controls.forEach(function(c) {
                            const item = document.createElement('div');
                            item.className = 'modal-control-item';
                            item.innerHTML = `<strong class="modal-ctrl-id">${c.id || ''}</strong><span class="modal-ctrl-name">${c.name || ''}</span>`;
                            listContainer.appendChild(item);
                        });
                    } else {
                        listContainer.innerHTML = '<div class="modal-controls-empty">No controls mapped for this domain.</div>';
                    }
                }

                modal.style.display = 'flex';
            };

            window.closeDomainModal = function() {
                const modal = document.getElementById('domainControlsModal');
                if (modal) modal.style.display = 'none';
            };

            // Event delegation click handler for view-domain-btn elements
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.view-domain-btn');
                if (btn) {
                    e.preventDefault();
                    const code = btn.getAttribute('data-code') || '';
                    const name = btn.getAttribute('data-name') || '';
                    const linkUrl = btn.getAttribute('data-url') || '#';
                    let controls = [];
                    try {
                        const rawControls = btn.getAttribute('data-controls');
                        if (rawControls) {
                            controls = JSON.parse(rawControls);
                        }
                    } catch(err) {
                        console.error('Error parsing domain controls:', err);
                    }
                    openDomainControlsModal(code, name, linkUrl, controls);
                }
            });

            // Close modal when clicking on overlay backdrop
            const modalOverlay = document.getElementById('domainControlsModal');
            if (modalOverlay) {
                modalOverlay.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeDomainModal();
                    }
                });
            }

            // Domains & Associated Controls Table Pagination (5 rows per page)
            const domainControlsTableBody = document.getElementById('domainControlsTableBody');
            if (domainControlsTableBody) {
                const rows = Array.from(domainControlsTableBody.querySelectorAll('.domain-control-row'));
                const prevBtn = document.getElementById('domainControlsPrevBtn');
                const nextBtn = document.getElementById('domainControlsNextBtn');
                const numbersContainer = document.getElementById('domainControlsPageNumbers');
                const infoSpan = document.getElementById('domainControlsPageInfo');
                const paginationWrap = document.getElementById('domainControlsPagination');

                const rowsPerPage = 5;
                const totalPages = Math.ceil(rows.length / rowsPerPage);
                let currentPage = 1;

                function renderDomainControlsPage() {
                    if (rows.length === 0) {
                        if (paginationWrap) paginationWrap.style.display = 'none';
                        return;
                    }

                    if (totalPages <= 1) {
                        if (paginationWrap) paginationWrap.style.display = 'none';
                    } else {
                        if (paginationWrap) paginationWrap.style.display = 'flex';
                    }

                    if (currentPage > totalPages) currentPage = totalPages;
                    if (currentPage < 1) currentPage = 1;

                    const startIdx = (currentPage - 1) * rowsPerPage;
                    const endIdx = startIdx + rowsPerPage;

                    rows.forEach((row, idx) => {
                        if (idx >= startIdx && idx < endIdx) {
                            row.style.display = 'table-row';
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    if (prevBtn) prevBtn.disabled = (currentPage === 1);
                    if (nextBtn) nextBtn.disabled = (currentPage === totalPages || totalPages === 0);

                    if (infoSpan) {
                        const visibleCountEnd = Math.min(endIdx, rows.length);
                        infoSpan.textContent = `Showing ${startIdx + 1}–${visibleCountEnd} of ${rows.length} domains`;
                    }

                    if (numbersContainer) {
                        numbersContainer.innerHTML = '';
                        for (let i = 1; i <= totalPages; i++) {
                            const btn = document.createElement('button');
                            btn.type = 'button';
                            btn.className = 'fwdomains-page-number' + (i === currentPage ? ' active' : '');
                            btn.textContent = i;
                            btn.setAttribute('aria-label', `Page ${i}`);
                            btn.addEventListener('click', function() {
                                currentPage = i;
                                renderDomainControlsPage();
                                const section = document.getElementById('domainControlsSection');
                                if (section) section.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            });
                            numbersContainer.appendChild(btn);
                        }
                    }
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', function() {
                        if (currentPage > 1) {
                            currentPage--;
                            renderDomainControlsPage();
                            const section = document.getElementById('domainControlsSection');
                            if (section) section.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }
                    });
                }

                if (nextBtn) {
                    nextBtn.addEventListener('click', function() {
                        if (currentPage < totalPages) {
                            currentPage++;
                            renderDomainControlsPage();
                            const section = document.getElementById('domainControlsSection');
                            if (section) section.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }
                    });
                }

                renderDomainControlsPage();
            }

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
                    document.documentElement.setAttribute('data-theme', 'dark');
                    document.body.setAttribute('data-theme', 'dark');
                    if (themeSwitch) themeSwitch.checked = true;
                } else {
                    document.body.classList.remove('dark-mode');
                    document.documentElement.setAttribute('data-theme', 'light');
                    document.body.setAttribute('data-theme', 'light');
                    if (themeSwitch) themeSwitch.checked = false;
                }
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

            // Homepage defaults to light theme
            applyTheme('light');

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
<?php /**PATH C:\xampp\htdocs\AspiaUCL\resources\views/aspiaUcl/ucl_homepage.blade.php ENDPATH**/ ?>