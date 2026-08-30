<?php

namespace App\Http\Controllers;

use App\Models\Framework;
use App\Models\FrameworkTemplate;
use App\Models\Requirement;
use Illuminate\Http\Request;

class FrameworkTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Framework Template
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'framework_type' => [
                'required',
                'string',
                'max:255',
            ],
            'html_content' => [
                'required',
                'string',
            ],
        ]);

        $frameworkType = trim($validated['framework_type']);

        FrameworkTemplate::updateOrCreate(
            [
                'framework_type' => $frameworkType,
            ],
            [
                'name' => $frameworkType . ' Framework Template',
                'framework_type' => $frameworkType,
                'html_content' => $validated['html_content'],
            ]
        );

        return redirect()
            ->route('frameworks.index')
            ->with(
                'success',
                "Framework template for type '{$frameworkType}' saved successfully."
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Show Framework
    |--------------------------------------------------------------------------
    */

    public function show(string $slug)
    {
        $framework = Framework::with(['domains.controls', 'controls'])->where('slug', $slug)->first();

        if (!$framework) {
            $framework = Framework::with(['domains.controls', 'controls'])
                ->where('framework_id', $slug)
                ->orWhere('id', $slug)
                ->firstOrFail();
        }

        $template = null;

        if ($framework->framework_type) {
            $template = FrameworkTemplate::where(
                'framework_type',
                $framework->framework_type
            )->first();

            if (!$template) {
                $template = FrameworkTemplate::whereRaw(
                    'LOWER(framework_type) = ?',
                    [strtolower(trim($framework->framework_type))]
                )->first();
            }
        } else {
            $template = FrameworkTemplate::whereNull('framework_type')->first();
        }

        if (!$template) {
            $template = FrameworkTemplate::first();
        }

        $html = ($template && !empty(trim($template->html_content)))
            ? $template->html_content
            : $this->getDefaultTemplateHtml();

        // Domains
        $domains       = $framework->getMappedDomains();
        $domainsCount  = $domains->count();
        $domainIdChips = $this->renderDomainIdChips($domains);
        $domainsTable  = $this->renderDomainsTable($domains);
        $domainsList   = $this->renderDomainsList($domains);

        // Controls
        $controls          = $framework->getMappedControls();
        $controlsCount     = $controls->count();
        $controlIdChips    = $this->renderControlIdChips($controls);
        $controlsHierarchy = $this->renderControlHierarchyCards($controls);
        $controlsTable     = $this->renderControlsTable($controls);

        // Requirements
        $requirements       = $framework->getMappedRequirements();
        $requirementsCount  = $requirements->count();
        $requirementIdChips = $this->renderRequirementIdChips($requirements);

        $nameVersion = "{$framework->name}:{$framework->version}";
        $canonicalUrl = route('frameworks.show', $framework->slug);

        $placeholders = [
            '{{framework_id}}'             => $framework->framework_id,
            '{{framework_code}}'           => $framework->framework_code,
            '{{framework_name}}'           => $framework->name,
            '{{name}}'                     => $framework->name,
            '{{version}}'                  => $framework->version,
            '{{framework_name_version}}'   => $nameVersion,
            '{{name_version}}'             => $nameVersion,
            '{{slug}}'                     => $framework->slug,
            '{{canonical_url}}'            => $canonicalUrl,
            '{{framework_family}}'         => $framework->framework_family,
            '{{category}}'                 => $framework->category,
            '{{publisher}}'                => $framework->publisher,
            '{{region}}'                   => $framework->region,
            '{{industry}}'                 => $framework->industry,
            '{{framework_type}}'           => $framework->framework_type,
            '{{description}}'              => $framework->description,
            '{{aspia_logo_url}}'          => asset('images/aspia.png'),
            '{{dashboard_url}}'           => route('dashboard'),

            // Domains
            '{{domains_count}}'            => $domainsCount,
            '{{domain_count}}'             => $domainsCount,
            '{{associated_domains}}'       => $domainsCount,
            '{{associated_domains_count}}' => $domainsCount,
            '{{total_domains}}'            => $domainsCount,
            '{{domainsCount}}'             => $domainsCount,
            '{{totalDomains}}'             => $domainsCount,
            '{{count_domains}}'            => $domainsCount,
            '{{domain_id_chips}}'          => $domainIdChips,
            '{{domains_chips}}'            => $domainIdChips,
            '{{domains_table}}'            => $domainsTable,
            '{{domains_list}}'             => $domainsList,

            // Controls
            '{{controls_count}}'           => $controlsCount,
            '{{control_count}}'            => $controlsCount,
            '{{linked_controls}}'          => $controlsCount,
            '{{linked_controls_count}}'    => $controlsCount,
            '{{total_controls}}'           => $controlsCount,
            '{{controlsCount}}'            => $controlsCount,
            '{{totalControls}}'            => $controlsCount,
            '{{count_controls}}'           => $controlsCount,
            '{{control_id_chips}}'         => $controlIdChips,
            '{{controls_chips}}'           => $controlIdChips,
            '{{controls_hierarchy}}'       => $controlsHierarchy,
            '{{controls_cards}}'           => $controlsHierarchy,
            '{{controls_table}}'           => $controlsTable,

            // Requirements
            '{{requirements_count}}'       => $requirementsCount,
            '{{requirement_count}}'        => $requirementsCount,
            '{{total_requirements}}'       => $requirementsCount,
            '{{total_requirements_count}}' => $requirementsCount,
            '{{requirementsCount}}'        => $requirementsCount,
            '{{totalRequirements}}'        => $requirementsCount,
            '{{count_requirements}}'       => $requirementsCount,
            '{{requirement_id_chips}}'     => $requirementIdChips,
            '{{requirements_chips}}'       => $requirementIdChips,
        ];

        foreach ($placeholders as $placeholder => $value) {
            $html = str_ireplace($placeholder, (string) ($value ?? ''), $html);
        }

        return response($html);
    }

    protected function renderDomainIdChips($domains): string
    {
        if ($domains->isEmpty()) {
            return '<p style="color: var(--text-muted); font-size: 13px;">No associated domains found.</p>';
        }

        $chips = '';
        foreach ($domains as $domain) {
            $domainUrl = route('domains.show', $domain->slug);
            $name      = htmlspecialchars($domain->name);
            $chips .= <<<HTML
            <a href="{$domainUrl}" title="Domain: {$name}" class="module-chip chip-purple">
                <span class="chip-name">{$name}</span>
                <span class="chip-arrow">↗</span>
            </a>
HTML;
        }

        return "<div class=\"chips-grid\">{$chips}</div>";
    }

    protected function renderControlIdChips($controls): string
    {
        if ($controls->isEmpty()) {
            return '<p style="color: var(--text-muted); font-size: 13px;">No associated controls found.</p>';
        }

        $chips = '';
        foreach ($controls as $control) {
            $controlUrl = route('controls.show', $control->control_id);
            $name       = htmlspecialchars($control->name);
            $chips .= <<<HTML
            <a href="{$controlUrl}" title="Control: {$name}" class="module-chip chip-cyan">
                <span class="chip-name">{$name}</span>
                <span class="chip-arrow">↗</span>
            </a>
HTML;
        }

        return "<div class=\"chips-grid\">{$chips}</div>";
    }

    protected function renderControlHierarchyCards($controls): string
    {
        if ($controls->isEmpty()) {
            return '<p style="color: var(--text-muted); font-size: 14px; padding: 16px 0;">No controls associated with this framework yet.</p>';
        }

        $html = '<div class="controls-hierarchy-stack">';
        foreach ($controls as $control) {
            $controlUrl  = route('controls.show', $control->control_id);
            $name        = htmlspecialchars($control->name);
            $reqs        = $control->requirements()->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
            $reqCount    = $reqs->count();
            $reqCountStr = $reqCount . ($reqCount === 1 ? ' REQUIREMENT' : ' REQUIREMENTS');

            $pills = '';
            foreach ($reqs as $req) {
                $reqUrl   = route('requirements.show', $req->requirement_id);
                $reqTitle = htmlspecialchars($req->requirement_title ?: $req->requirement ?: $req->requirement_id);
                $pills .= <<<HTML
                <a href="{$reqUrl}" class="req-grid-card" title="Requirement: {$reqTitle}">
                    <div class="req-card-body">
                        <span class="req-icon" style="color: var(--accent-purple); margin-right: 6px; font-size: 11px;">◆</span>
                        <span class="req-card-title">{$reqTitle}</span>
                    </div>
                    <div class="req-card-right">
                        <span class="req-card-arrow">↗</span>
                    </div>
                </a>
HTML;
            }

            if ($pills === '') {
                $pills = '<div class="req-empty-note">No requirements defined for this control.</div>';
            }

            $html .= <<<HTML
            <div class="control-group-card">
                <div class="control-header-grid">
                    <div class="ctrl-col-name">
                        <a href="{$controlUrl}" class="ctrl-name-link" title="{$name}">
                            <span class="ctrl-icon">🛡️</span>
                            <span class="ctrl-name-title">{$name}</span>
                        </a>
                    </div>
                    <div class="ctrl-col-stat">
                        <span class="ctrl-stat-badge font-mono">
                            <span class="stat-dot"></span>
                            {$reqCountStr}
                        </span>
                    </div>
                    <div class="ctrl-col-action">
                        <a href="{$controlUrl}" class="ctrl-action-btn">
                            <span>View</span>
                            <span class="btn-arrow">→</span>
                        </a>
                    </div>
                </div>
                <div class="ctrl-reqs-container">
                    <div class="ctrl-reqs-header">
                        <span class="reqs-label font-mono">MAPPED REQUIREMENTS</span>
                        <span class="reqs-divider"></span>
                        <span class="reqs-count font-mono">{$reqCount} TOTAL</span>
                    </div>
                    <div class="ctrl-reqs-grid">
                        {$pills}
                    </div>
                </div>
            </div>
HTML;
        }
        $html .= '</div>';

        return $html;
    }

    protected function renderControlsTable($controls): string
    {
        if ($controls->isEmpty()) {
            return '<p style="color: var(--text-muted); font-size: 14px; padding: 16px 0;">No controls associated with this framework yet.</p>';
        }

        $rows = '';
        foreach ($controls as $control) {
            $controlUrl = route('controls.show', $control->control_id);
            $cid        = htmlspecialchars($control->control_id);
            $name       = htmlspecialchars($control->name);
            $reqCount   = $control->requirements()->count();
            $status     = htmlspecialchars($control->status ?? 'Active');

            $rows .= <<<HTML
            <tr class="table-row">
                <td class="td-id">
                    <a href="{$controlUrl}" class="table-link font-mono">{$cid}</a>
                </td>
                <td class="td-name">
                    <a href="{$controlUrl}" class="table-link">{$name}</a>
                </td>
                <td class="td-stat font-mono">{$reqCount}</td>
                <td class="td-status">
                    <span class="status-pill status-active">{$status}</span>
                </td>
                <td class="td-action">
                    <a href="{$controlUrl}" class="btn-action">View Control →</a>
                </td>
            </tr>
HTML;
        }

        return <<<HTML
        <div class="table-wrapper">
            <table class="classic-table">
                <thead>
                    <tr>
                        <th style="width: 140px;">Control ID</th>
                        <th>Control Name</th>
                        <th style="width: 150px;">Requirements</th>
                        <th style="width: 120px;">Status</th>
                        <th style="width: 140px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {$rows}
                </tbody>
            </table>
        </div>
HTML;
    }

    protected function renderRequirementIdChips($requirements): string
    {
        if ($requirements->isEmpty()) {
            return '<p style="color: var(--text-muted); font-size: 13px;">No associated requirements found.</p>';
        }

        $chips = '';
        foreach ($requirements as $req) {
            $reqUrl = route('requirements.show', $req->requirement_id);
            $title  = htmlspecialchars($req->requirement_title ?: $req->requirement ?: $req->requirement_id);
            $chips .= <<<HTML
            <a href="{$reqUrl}" title="Requirement: {$title}" class="module-chip chip-green">
                <span class="chip-name">{$title}</span>
                <span class="chip-arrow">↗</span>
            </a>
HTML;
        }

        return "<div class=\"chips-grid\">{$chips}</div>";
    }

    protected function renderDomainsTable($domains): string
    {
        if ($domains->isEmpty()) {
            return '<p style="color: var(--text-muted); font-size: 14px; padding: 16px 0;">No domains associated with this framework yet.</p>';
        }

        $rows = '';
        foreach ($domains as $domain) {
            $domainUrl = route('domains.show', $domain->slug);
            $status    = htmlspecialchars($domain->status ?? 'Active');
            $name      = htmlspecialchars($domain->name);
            $did       = htmlspecialchars($domain->domain_id);
            $code      = htmlspecialchars($domain->domain_code ?? '-');
            $owner     = htmlspecialchars($domain->business_owner ?? '-');
            $controlsCount = $domain->controls()->count();

            $rows .= <<<HTML
            <tr class="table-row">
                <td class="td-id">
                    <a href="{$domainUrl}" class="table-link font-mono">{$did}</a>
                </td>
                <td class="td-code font-mono">{$code}</td>
                <td class="td-name">
                    <a href="{$domainUrl}" class="table-link">{$name}</a>
                </td>
                <td class="td-muted">{$owner}</td>
                <td class="td-stat font-mono">{$controlsCount}</td>
                <td class="td-status">
                    <span class="status-pill status-active">{$status}</span>
                </td>
                <td class="td-action">
                    <a href="{$domainUrl}" class="btn-action">View Domain →</a>
                </td>
            </tr>
HTML;
        }

        return <<<HTML
        <div class="table-wrapper">
            <table class="classic-table">
                <thead>
                    <tr>
                        <th>Domain ID</th>
                        <th>Code</th>
                        <th>Domain Name</th>
                        <th>Business Owner</th>
                        <th>Controls</th>
                        <th>Status</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {$rows}
                </tbody>
            </table>
        </div>
HTML;
    }

    protected function renderDomainsList($domains): string
    {
        if ($domains->isEmpty()) {
            return '<p style="color: var(--text-muted); font-size: 14px;">No domains found.</p>';
        }

        $items = '';
        foreach ($domains as $domain) {
            $domainUrl = route('domains.show', $domain->slug);
            $name = htmlspecialchars($domain->name);
            $items .= <<<HTML
            <a href="{$domainUrl}" class="module-chip chip-cyan">
                <span class="chip-name">{$name}</span>
            </a>
HTML;
        }

        return "<div class=\"chips-grid\">{$items}</div>";
    }

    public function getDefaultTemplateHtml(): string
    {
        return <<<'HTML'
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <!-- ==========================================================================
         1. SEO META TAGS & STRUCTURED DATA
         ========================================================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{framework_id}} - {{framework_name}}:{{version}} | Aspia UCL</title>
    <meta name="description" content="{{description}}">
    <meta name="keywords" content="{{framework_name}}, {{framework_code}}, {{framework_id}}, {{category}}, {{framework_type}}, cybersecurity compliance, regulatory controls, UCL, ASPIA">
    <meta name="author" content="ASPIA Unified Control Library">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{canonical_url}}">

    <!-- Open Graph (Facebook / LinkedIn) -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{framework_id}} - {{framework_name}}:{{version}}">
    <meta property="og:description" content="{{description}}">
    <meta property="og:url" content="{{canonical_url}}">
    <meta property="og:site_name" content="ASPIA Unified Control Library">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{framework_id}} - {{framework_name}}:{{version}}">
    <meta name="twitter:description" content="{{description}}">

    <!-- Schema.org JSON-LD Structured Data for Search Engines -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "DefinedTermSet",
        "name": "{{framework_name}}:{{version}}",
        "identifier": "{{framework_id}}",
        "description": "{{description}}",
        "creator": {
            "@type": "Organization",
            "name": "{{publisher}}"
        },
        "inLanguage": "en",
        "url": "{{canonical_url}}"
    }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ==========================================================================
           2. ADORABLE DESIGN SYSTEM & CSS VARIABLES
           ========================================================================== */
        :root {
            /* Calm & Elegant Light Mode Palette */
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --bg-card: #ffffff;
            --bg-card-hover: #f1f5f9;
            --border-color: #e2e8f0;
            --border-subtle: #f1f5f9;

            /* Calm Cerulean / Slate Cyan */
            --accent-cyan: #0284c7;
            --accent-cyan-hover: #0369a1;
            --accent-cyan-glow: rgba(2, 132, 199, 0.08);
            --accent-cyan-border: rgba(2, 132, 199, 0.22);

            /* Soothing Soft Indigo / Periwinkle */
            --accent-purple: #6366f1;
            --accent-purple-hover: #4f46e5;
            --accent-purple-glow: rgba(99, 102, 241, 0.08);
            --accent-purple-border: rgba(99, 102, 241, 0.22);

            /* Restful Teal-Sage Emerald */
            --accent-emerald: #0d9488;
            --accent-emerald-glow: rgba(13, 148, 136, 0.08);

            /* Warm Honey Amber */
            --accent-amber: #d97706;
            --accent-amber-glow: rgba(217, 119, 6, 0.08);

            /* Dusty Rose */
            --accent-rose: #e11d48;
            --accent-rose-glow: rgba(225, 29, 72, 0.08);

            /* Softer, Calm Typography (Slate 800/600/500) */
            --text-primary: #1e293b;
            --text-secondary: #475569;
            --text-muted: #64748b;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 18px;
            --radius-xl: 24px;
            --radius-full: 9999px;

            --shadow-card: 0 4px 20px -2px rgba(15, 23, 42, 0.04), 0 0 0 1px rgba(226, 232, 240, 0.7);
            --shadow-float: 0 10px 25px -4px rgba(2, 132, 199, 0.08);
            --transition: all 0.22s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        [data-theme="dark"] {
            /* Dark Mode Palette */
            --bg-primary: #090e1a;
            --bg-secondary: #111a2e;
            --bg-card: #15223c;
            --bg-card-hover: #1b2d50;
            --border-color: #1e355b;
            --border-subtle: rgba(255, 255, 255, 0.06);

            --accent-cyan: #22d3ee;
            --accent-cyan-hover: #67e8f9;
            --accent-cyan-glow: rgba(34, 211, 238, 0.18);
            --accent-cyan-border: rgba(34, 211, 238, 0.35);

            --accent-purple: #c084fc;
            --accent-purple-hover: #d8b4fe;
            --accent-purple-glow: rgba(192, 132, 252, 0.18);
            --accent-purple-border: rgba(192, 132, 252, 0.35);

            --accent-emerald: #34d399;
            --accent-emerald-glow: rgba(52, 211, 153, 0.18);
            --accent-amber: #fbbf24;
            --accent-amber-glow: rgba(251, 191, 36, 0.18);
            --accent-rose: #fb7185;
            --accent-rose-glow: rgba(251, 113, 133, 0.18);

            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --text-muted: #94a3b8;

            --shadow-card: 0 12px 35px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.06);
            --shadow-float: 0 20px 45px rgba(0, 0, 0, 0.6);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-primary);
            background-image: 
                radial-gradient(circle at 10% 10%, rgba(2, 132, 199, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 90% 20%, rgba(99, 102, 241, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 50% 90%, rgba(13, 148, 136, 0.02) 0%, transparent 50%);
            color: var(--text-primary);
            line-height: 1.5;
            min-height: 100vh;
            padding: 24px 36px 60px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .font-mono { font-family: 'JetBrains Mono', monospace; }

        /* ==========================================================================
           3. ADORABLE TOP TOOLBAR (OFFICIAL ASPIA LOGO & THEME SWITCH)
           ========================================================================== */
        .top-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            gap: 16px;
            flex-wrap: wrap;
        }

        .brand-logo-link {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            transition: var(--transition);
        }

        .brand-logo-link:hover {
            transform: translateY(-2px);
            opacity: 0.92;
        }

        .brand-logo-img {
            height: 38px;
            max-width: 170px;
            width: auto;
            object-fit: contain;
            display: block;
        }

        [data-theme="dark"] .brand-logo-img {
            filter: brightness(1.15);
        }

        .theme-switch-container {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--bg-secondary);
            padding: 6px 14px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .theme-switch-label {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-secondary);
            min-width: 38px;
        }

        .theme-toggle-switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
            cursor: pointer;
            user-select: none;
        }

        .theme-toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute;
        }

        .slider-track {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #cbd5e1;
            border-radius: 24px;
            transition: var(--transition);
        }

        .slider-thumb {
            position: absolute;
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: #ffffff;
            border-radius: 50%;
            transition: var(--transition);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .theme-toggle-switch input:checked + .slider-track {
            background-color: var(--accent-cyan);
        }

        .theme-toggle-switch input:checked + .slider-track .slider-thumb {
            transform: translateX(20px);
        }

        /* ==========================================================================
           4. ADORABLE & VIBRANT HERO SECTION (CLEAN FULL-WIDTH)
           ========================================================================== */
        .hero-banner {
            position: relative;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-xl);
            padding: 32px 36px 28px;
            margin-bottom: 26px;
            box-shadow: var(--shadow-card);
            overflow: hidden;
            transition: var(--transition);
        }

        /* Top decorative gradient hairline */
        .hero-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-cyan), var(--accent-purple), var(--accent-emerald), var(--accent-amber));
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        .hero-tags-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }

        .cute-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            transition: var(--transition);
        }

        .cute-tag:hover {
            transform: translateY(-2px) scale(1.02);
        }

        .tag-cyan { background: var(--accent-cyan-glow); color: var(--accent-cyan); border: 1px solid var(--accent-cyan-border); }
        .tag-purple { background: var(--accent-purple-glow); color: var(--accent-purple); border: 1px solid var(--accent-purple-border); }
        .tag-emerald { background: var(--accent-emerald-glow); color: var(--accent-emerald); border: 1px solid rgba(5, 150, 105, 0.35); }
        .tag-amber { background: var(--accent-amber-glow); color: var(--accent-amber); border: 1px solid rgba(217, 119, 6, 0.35); }

        .pulse-beacon {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent-emerald);
            box-shadow: 0 0 0 0 rgba(5, 150, 105, 0.7);
            animation: cutePulse 2s infinite;
        }

        @keyframes cutePulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(5, 150, 105, 0.7); }
            70% { transform: scale(1.1); box-shadow: 0 0 0 7px rgba(5, 150, 105, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(5, 150, 105, 0); }
        }

        .framework-title-row {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .framework-title {
            font-size: 34px;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.8px;
            line-height: 1.15;
        }

        .version-pill {
            font-family: 'JetBrains Mono', monospace;
            font-size: 13px;
            font-weight: 700;
            padding: 5px 14px;
            border-radius: var(--radius-full);
            background: var(--accent-amber-glow);
            color: var(--accent-amber);
            border: 1px solid rgba(217, 119, 6, 0.35);
        }

        /* Adorable Meta Cards Strip - 5 Symmetrical Full-Width Columns */
        .meta-strip {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 14px;
            padding-top: 20px;
            border-top: 1px solid var(--border-subtle);
        }

        .meta-card {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 12px 16px;
            transition: var(--transition);
        }

        .meta-card:hover {
            border-color: var(--accent-cyan);
            background: var(--bg-secondary);
            transform: translateY(-3px) scale(1.01);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .meta-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            flex-shrink: 0;
        }

        .meta-content {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .meta-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-muted);
            font-weight: 800;
        }

        .meta-value {
            font-size: 13.5px;
            font-weight: 700;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ==========================================================================
           5. ADORABLE STATS METRICS GRID
           ========================================================================== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-bottom: 26px;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 22px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: var(--transition);
            cursor: pointer;
            box-shadow: var(--shadow-card);
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: var(--shadow-float);
        }

        .stat-card-cyan:hover { border-color: var(--accent-cyan); }
        .stat-card-purple:hover { border-color: var(--accent-purple); }
        .stat-card-emerald:hover { border-color: var(--accent-emerald); }

        .stat-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .stat-label {
            font-size: 11.5px;
            color: var(--text-muted);
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 0.6px;
        }

        .stat-number {
            font-size: 34px;
            font-weight: 800;
            color: var(--text-primary);
            font-family: 'JetBrains Mono', monospace;
            line-height: 1;
        }

        .stat-icon-bubble {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            transition: var(--transition);
        }

        .stat-card:hover .stat-icon-bubble {
            transform: scale(1.1) rotate(5deg);
        }

        .icon-bubble-purple { background: var(--accent-purple-glow); color: var(--accent-purple); border: 1px solid var(--accent-purple-border); }
        .icon-bubble-cyan { background: var(--accent-cyan-glow); color: var(--accent-cyan); border: 1px solid var(--accent-cyan-border); }
        .icon-bubble-emerald { background: var(--accent-emerald-glow); color: var(--accent-emerald); border: 1px solid rgba(5, 150, 105, 0.35); }

        /* ==========================================================================
           6. CONTENT PANEL WITH SEGMENTED TABS
           ========================================================================== */
        .content-panel {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-card);
        }

        .tabs-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
            padding: 12px 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .tabs-nav {
            display: flex;
            background: var(--bg-primary);
            padding: 4px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-color);
            gap: 4px;
            flex-wrap: wrap;
        }

        .tab-btn {
            background: transparent;
            border: none;
            outline: none;
            padding: 9px 18px;
            border-radius: var(--radius-full);
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tab-btn:hover {
            color: var(--text-primary);
        }

        .tab-btn.active {
            background: var(--bg-secondary);
            color: var(--accent-cyan);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }

        .tab-pill {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            font-size: 11px;
            padding: 2px 8px;
            border-radius: var(--radius-full);
            font-weight: 800;
        }

        .tab-btn.active .tab-pill {
            background: var(--accent-cyan-glow);
            color: var(--accent-cyan);
            border-color: var(--accent-cyan-border);
        }

        .tab-search-wrapper {
            position: relative;
        }

        .tab-search-input {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            padding: 8px 14px 8px 36px;
            color: var(--text-primary);
            font-size: 12.5px;
            font-weight: 600;
            width: 250px;
            outline: none;
            transition: var(--transition);
        }

        .tab-search-input:focus {
            border-color: var(--accent-cyan);
            width: 300px;
            box-shadow: 0 0 0 3px var(--accent-cyan-glow);
        }

        .tab-search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 13px;
            pointer-events: none;
        }

        .tab-content {
            padding: 28px;
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.25s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-box {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 22px;
        }

        .section-box:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 15.5px;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ==========================================================================
           7. PRECISION SYMMETRICAL CONTROL HIERARCHY CARDS
           ========================================================================== */
        .controls-hierarchy-stack {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 12px;
        }

        .control-group-card {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-left: 4px solid var(--accent-cyan);
            border-radius: var(--radius-lg);
            padding: 20px 24px;
            transition: var(--transition);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        .control-group-card:hover {
            border-color: var(--accent-cyan);
            border-left-color: var(--accent-cyan-hover);
            box-shadow: 0 10px 28px rgba(2, 132, 199, 0.12);
            transform: translateY(-2px);
        }

        /* 3-Column Fixed Symmetrical Header Grid */
        .control-header-grid {
            display: grid;
            grid-template-columns: 1fr 170px 100px;
            align-items: center;
            gap: 16px;
            padding-bottom: 16px;
            margin-bottom: 16px;
            border-bottom: 1px solid var(--border-subtle);
        }

        .ctrl-col-name {
            display: flex;
            align-items: center;
            min-width: 0;
        }

        .ctrl-name-link {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--text-primary);
            font-size: 16px;
            font-weight: 700;
            line-height: 1.35;
            transition: color 0.2s ease;
            min-width: 0;
        }

        .ctrl-name-link:hover {
            color: var(--accent-cyan);
        }

        .ctrl-icon {
            font-size: 16px;
            flex-shrink: 0;
        }

        .ctrl-name-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ctrl-col-stat {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ctrl-stat-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            width: 100%;
            justify-content: center;
            height: 32px;
            padding: 0 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: var(--text-secondary);
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            text-transform: uppercase;
        }

        .stat-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent-purple);
        }

        .ctrl-col-action {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .ctrl-action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            height: 34px;
            padding: 0 12px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            background: var(--accent-cyan-glow);
            color: var(--accent-cyan);
            border: 1px solid var(--accent-cyan-border);
            transition: var(--transition);
        }

        .ctrl-action-btn:hover {
            background: var(--accent-cyan);
            color: #ffffff;
            transform: translateX(2px);
        }

        .btn-arrow {
            transition: transform 0.2s ease;
        }

        .ctrl-action-btn:hover .btn-arrow {
            transform: translateX(3px);
        }

        /* Requirements Container & Grid */
        .ctrl-reqs-container {
            background: var(--bg-primary);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 14px 16px;
        }

        .ctrl-reqs-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .reqs-label {
            font-size: 10.5px;
            font-weight: 800;
            letter-spacing: 0.8px;
            color: var(--text-muted);
            text-transform: uppercase;
        }

        .reqs-divider {
            flex: 1;
            height: 1px;
            background: var(--border-color);
        }

        .reqs-count {
            font-size: 10.5px;
            font-weight: 700;
            color: var(--accent-purple);
            letter-spacing: 0.5px;
        }

        .ctrl-reqs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 10px;
        }

        .req-grid-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 14px;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            text-decoration: none;
            transition: var(--transition);
            min-height: 44px;
        }

        .req-grid-card:hover {
            border-color: var(--accent-purple);
            background: var(--accent-purple-glow);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.14);
        }

        .req-card-body {
            display: flex;
            align-items: center;
            min-width: 0;
            flex-grow: 1;
        }

        .req-card-title {
            font-size: 12.5px;
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }

        .req-grid-card:hover .req-card-title {
            color: var(--accent-purple);
        }

        .req-card-right {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .req-card-arrow {
            font-size: 11px;
            color: var(--text-muted);
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .req-grid-card:hover .req-card-arrow {
            color: var(--accent-purple);
            transform: translate(2px, -2px);
        }

        .req-empty-note {
            font-size: 12.5px;
            color: var(--text-muted);
            font-style: italic;
            padding: 6px 0;
        }

        /* Chips Grid - Symmetrical Columns */
        .chips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 12px;
            margin-top: 8px;
        }

        .module-chip {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 10px 14px;
            border-radius: var(--radius-md);
            text-decoration: none;
            transition: var(--transition);
            border: 1px solid var(--border-color);
            background: var(--bg-secondary);
            min-height: 44px;
        }

        .module-chip:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
            border-color: var(--accent-cyan);
        }

        .chip-name {
            font-size: 12.5px;
            font-weight: 600;
            color: var(--text-primary);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            flex-grow: 1;
        }

        .chip-arrow {
            font-size: 11px;
            color: var(--text-muted);
            transition: transform 0.2s ease, color 0.2s ease;
            flex-shrink: 0;
        }

        .module-chip:hover .chip-arrow {
            transform: translate(2px, -2px);
            color: var(--accent-cyan);
        }

        .chip-cyan:hover { border-color: var(--accent-cyan); }
        .chip-purple:hover { border-color: var(--accent-purple); }
        .chip-green:hover { border-color: var(--accent-emerald); }

        /* Classic Data Tables */
        .table-wrapper {
            overflow-x: auto;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-top: 8px;
        }

        .classic-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            text-align: left;
        }

        .classic-table thead tr {
            background: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
        }

        .classic-table th {
            padding: 12px 16px;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: var(--text-muted);
        }

        .classic-table tbody tr {
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.15s ease;
        }

        .classic-table tbody tr:hover {
            background-color: var(--bg-card-hover);
        }

        .classic-table td {
            padding: 13px 16px;
            color: var(--text-primary);
        }

        .table-link {
            color: var(--accent-cyan);
            text-decoration: none;
            font-weight: 700;
        }

        .table-link:hover {
            text-decoration: underline;
        }

        .td-muted { color: var(--text-secondary); font-size: 12.5px; }

        .status-pill {
            display: inline-block;
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 700;
        }

        .status-active {
            background: var(--accent-emerald-glow);
            color: var(--accent-emerald);
            border: 1px solid rgba(5, 150, 105, 0.35);
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 6px 14px;
            border-radius: var(--radius-sm);
            font-size: 11.5px;
            font-weight: 700;
            text-decoration: none;
            background: var(--accent-cyan-glow);
            color: var(--accent-cyan);
            border: 1px solid var(--accent-cyan-border);
            transition: var(--transition);
        }

        .btn-action:hover {
            background: var(--accent-cyan);
            color: #ffffff;
        }

        .footer-note {
            text-align: center;
            margin-top: 40px;
            font-size: 12.5px;
            color: var(--text-muted);
        }

        @media (max-width: 900px) {
            .control-header-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .ctrl-col-stat, .ctrl-col-action {
                grid-column: span 1;
            }
            .ctrl-name-title {
                white-space: normal;
            }
        }

        @media (max-width: 768px) {
            body { padding: 16px; }
            .framework-title { font-size: 24px; }
            .stats-grid { grid-template-columns: 1fr; }
            .tabs-header { padding: 12px 16px; }
            .tab-search-input { width: 100%; }
        }
    </style>
</head>
<body>

    <!-- 1. ADORABLE TOP TOOLBAR (OFFICIAL ASPIA LOGO) -->
    <div class="top-toolbar" aria-label="Page Toolbar">
        <a href="{{dashboard_url}}" class="brand-logo-link" title="ASPIA Unified Control Library">
            <img src="{{aspia_logo_url}}" alt="ASPIA Logo" class="brand-logo-img">
        </a>
        <div class="theme-switch-container">
            <span class="theme-switch-label" id="themeSwitchText">Light</span>
            <label class="theme-toggle-switch" title="Toggle Light / Dark Mode" aria-label="Toggle Light or Dark Mode">
                <input type="checkbox" id="themeSliderCheckbox" onchange="toggleTheme(this.checked)">
                <span class="slider-track">
                    <span class="slider-thumb"></span>
                </span>
            </label>
        </div>
    </div>

    <!-- 2. ADORABLE & VIBRANT HERO BANNER (CLEAN FULL-WIDTH) -->
    <header class="hero-banner">

        <!-- Top Cluster: ID, Code, Type, Family -->
        <div class="hero-tags-row">
            <span class="cute-tag tag-cyan font-mono" style="font-size: 13px; font-weight: 800; padding: 6px 14px;">🛡️ {{framework_id}}</span>
            <span class="cute-tag tag-purple font-mono">🔑 {{framework_code}}</span>
            <span class="cute-tag tag-cyan">✨ {{framework_type}} Framework</span>
            <span class="cute-tag tag-purple">🏷️ {{framework_family}}</span>
        </div>

        <!-- Clean, Unified Title: Name:Version -->
        <div class="framework-title-row">
            <h1 class="framework-title">
                {{framework_name}}:{{version}}
            </h1>
        </div>

        <!-- Adorable Metadata Cards Grid - 5 Symmetrical Columns -->
        <div class="meta-strip">
            <div class="meta-card">
                <div class="meta-icon">🏢</div>
                <div class="meta-content">
                    <span class="meta-label">Publisher</span>
                    <span class="meta-value">{{publisher}}</span>
                </div>
            </div>
            <div class="meta-card">
                <div class="meta-icon">📁</div>
                <div class="meta-content">
                    <span class="meta-label">Category</span>
                    <span class="meta-value">{{category}}</span>
                </div>
            </div>
            <div class="meta-card">
                <div class="meta-icon">🌐</div>
                <div class="meta-content">
                    <span class="meta-label">Region</span>
                    <span class="meta-value">{{region}}</span>
                </div>
            </div>
            <div class="meta-card">
                <div class="meta-icon">🏭</div>
                <div class="meta-content">
                    <span class="meta-label">Industry</span>
                    <span class="meta-value">{{industry}}</span>
                </div>
            </div>
            <div class="meta-card">
                <div class="meta-icon">🔖</div>
                <div class="meta-content">
                    <span class="meta-label">Version</span>
                    <span class="meta-value font-mono" style="color: var(--accent-amber);">{{version}}</span>
                </div>
            </div>
        </div>
    </header>

    <!-- 3. ADORABLE STATS METRICS GRID -->
    <section class="stats-grid" aria-label="Framework Summary Statistics">
        <div class="stat-card stat-card-purple" onclick="switchTab('domains-tab')">
            <div class="stat-info">
                <span class="stat-label">Associated Domains</span>
                <span class="stat-number">{{domains_count}}</span>
            </div>
            <div class="stat-icon-bubble icon-bubble-purple">◈</div>
        </div>

        <div class="stat-card stat-card-cyan" onclick="switchTab('controls-tab')">
            <div class="stat-info">
                <span class="stat-label">Linked Controls</span>
                <span class="stat-number">{{controls_count}}</span>
            </div>
            <div class="stat-icon-bubble icon-bubble-cyan">◉</div>
        </div>

        <div class="stat-card stat-card-emerald" onclick="switchTab('requirements-tab')">
            <div class="stat-info">
                <span class="stat-label">Mapped Requirements</span>
                <span class="stat-number">{{requirements_count}}</span>
            </div>
            <div class="stat-icon-bubble icon-bubble-emerald">◆</div>
        </div>
    </section>

    <!-- 4. CONTENT PANEL WITH SEGMENTED TABS -->
    <main class="content-panel">
        <div class="tabs-header">
            <div class="tabs-nav">
                <button class="tab-btn active" id="btn-domains-tab" onclick="switchTab('domains-tab')">
                    <span>◈ Domains</span>
                    <span class="tab-pill">{{domains_count}}</span>
                </button>
                <button class="tab-btn" id="btn-controls-tab" onclick="switchTab('controls-tab')">
                    <span>◉ Controls Hierarchy</span>
                    <span class="tab-pill">{{controls_count}}</span>
                </button>
                <button class="tab-btn" id="btn-requirements-tab" onclick="switchTab('requirements-tab')">
                    <span>◆ Requirements Matrix</span>
                    <span class="tab-pill">{{requirements_count}}</span>
                </button>
                <button class="tab-btn" id="btn-spec-tab" onclick="switchTab('spec-tab')">
                    <span>ℹ Specifications</span>
                </button>
            </div>

            <!-- Real-time Live Filter -->
            <div class="tab-search-wrapper">
                <span class="tab-search-icon">🔍</span>
                <input type="text" id="liveSearchInput" class="tab-search-input" placeholder="Quick filter contents..." oninput="handleLiveSearch(this.value)" aria-label="Quick search inside active tab">
            </div>
        </div>

        <!-- TAB 1: DOMAINS -->
        <div class="tab-content active" id="domains-tab">
            <div class="section-box">
                <div class="section-title">
                    <span style="color: var(--accent-purple);">◈</span> Associated Compliance Domains ({{domains_count}})
                </div>
                <p style="color: var(--text-muted); font-size: 13px; margin-bottom: 14px;">
                    Click any domain badge to view its mapped controls and detailed guidelines.
                </p>
                <div class="chip-container">
                    {{domain_id_chips}}
                </div>
            </div>
        </div>

        <!-- TAB 2: CONTROLS & REQUIREMENTS (PRECISION SYMMETRICAL HIERARCHY) -->
        <div class="tab-content" id="controls-tab">
            <div class="section-box">
                <div class="section-title">
                    <span style="color: var(--accent-cyan);">◉</span> Associated Controls & Enforcement Requirements ({{controls_count}})
                </div>
                <p style="color: var(--text-muted); font-size: 13px; margin-bottom: 14px;">
                    Click any control or requirement name to view detailed compliance specifications and implementation guidance.
                </p>
                {{controls_hierarchy}}
            </div>
        </div>

        <!-- TAB 3: REQUIREMENTS (QUICK CHIPS MATRIX) -->
        <div class="tab-content" id="requirements-tab">
            <div class="section-box">
                <div class="section-title">
                    <span style="color: var(--accent-emerald);">◆</span> Compliance Requirements Matrix ({{requirements_count}})
                </div>
                <p style="color: var(--text-muted); font-size: 13px; margin-bottom: 14px;">
                    All individual auditable requirements mapped directly under this standard framework.
                </p>
                <div class="chip-container">
                    {{requirement_id_chips}}
                </div>
            </div>
        </div>

        <!-- TAB 4: SPECIFICATIONS & RECORD DETAILS -->
        <div class="tab-content" id="spec-tab">
            <div class="section-box">
                <div class="section-title">
                    <span style="color: var(--accent-purple);">📑</span> Framework Specification Details
                </div>
                <table style="width: 100%; border-collapse: collapse; font-size: 13.5px; color: var(--text-secondary);">
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); width: 220px; font-weight: 700;">Framework ID</td>
                        <td style="padding: 12px 0;">
                            <span style="color: var(--accent-cyan); font-family: 'JetBrains Mono', monospace; font-weight: 800; font-size: 14px; background: var(--accent-cyan-glow); border: 1px solid var(--accent-cyan-border); padding: 4px 12px; border-radius: 6px;">{{framework_id}}</span>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 700;">Framework Code</td>
                        <td style="padding: 12px 0; color: var(--accent-purple); font-family: 'JetBrains Mono', monospace; font-weight: 700;">{{framework_code}}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 700;">Framework Name</td>
                        <td style="padding: 12px 0; color: var(--text-primary); font-weight: 700;">{{framework_name}}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 700;">Version</td>
                        <td style="padding: 12px 0; color: var(--accent-amber); font-weight: 700; font-family: 'JetBrains Mono', monospace;">{{version}}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 700;">Framework Family</td>
                        <td style="padding: 12px 0; color: var(--text-primary);">{{framework_family}}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 700;">Category</td>
                        <td style="padding: 12px 0; color: var(--text-primary); font-weight: 600;">{{category}}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 700;">Publisher</td>
                        <td style="padding: 12px 0; color: var(--text-primary);">{{publisher}}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 700;">Region</td>
                        <td style="padding: 12px 0; color: var(--text-primary);">{{region}}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 700;">Industry</td>
                        <td style="padding: 12px 0; color: var(--text-primary);">{{industry}}</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 0; color: var(--text-muted); font-weight: 700;">Framework Type</td>
                        <td style="padding: 12px 0;">
                            <span class="status-pill status-active">{{framework_type}}</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>

    <footer class="footer-note">
        <p>Unified Control Library &copy; 2026 ASPIA. All rights reserved.</p>
    </footer>

    <!-- ==========================================================================
         8. JAVASCRIPT LOGIC
         ========================================================================== -->
    <script>
        // 1. Light / Dark Theme Management (Default: Light, with Slide Switch)
        function initTheme() {
            const savedTheme = localStorage.getItem('aspia_theme') || 'light';
            const isDark = savedTheme === 'dark';
            const checkbox = document.getElementById('themeSliderCheckbox');
            if (checkbox) checkbox.checked = isDark;
            applyTheme(savedTheme);
        }

        function applyTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('aspia_theme', theme);
            const label = document.getElementById('themeSwitchText');
            if (label) {
                label.textContent = theme === 'dark' ? 'Dark' : 'Light';
            }
        }

        function toggleTheme(isChecked) {
            const newTheme = isChecked ? 'dark' : 'light';
            applyTheme(newTheme);
        }

        // 2. Interactive Tab Switching
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));

            const targetTab = document.getElementById(tabId);
            const targetBtn = document.getElementById('btn-' + tabId);

            if (targetTab) targetTab.classList.add('active');
            if (targetBtn) targetBtn.classList.add('active');
        }

        // 3. Real-time Live Search Filter Across Controls, Tables & Chips
        function handleLiveSearch(query) {
            const term = (query || '').toLowerCase().trim();
            const activeTab = document.querySelector('.tab-content.active');
            if (!activeTab) return;

            // Filter Control Group Cards (Matches control title & child requirement pills)
            const controlCards = activeTab.querySelectorAll('.control-group-card');
            controlCards.forEach(card => {
                const text = card.innerText.toLowerCase();
                card.style.display = text.includes(term) ? '' : 'none';
            });

            // Filter Table Rows
            const tableRows = activeTab.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(term) ? '' : 'none';
            });

            // Filter Chips
            const chips = activeTab.querySelectorAll('.chip-container a, .chips-grid a');
            chips.forEach(chip => {
                const text = chip.innerText.toLowerCase();
                chip.style.display = text.includes(term) ? 'inline-flex' : 'none';
            });
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', initTheme);
    </script>
</body>
</html>
HTML;
    }
}