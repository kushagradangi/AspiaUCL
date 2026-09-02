<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\DomainTemplate;
use App\Models\Requirement;
use Illuminate\Http\Request;

class DomainTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Domain Template
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'html_content' => [
                'required',
                'string',
            ],
        ]);

        $template = DomainTemplate::first();

        if ($template) {
            $template->update([
                'name'         => 'Default Domain Template',
                'html_content' => $validated['html_content'],
            ]);
            DomainTemplate::where('id', '!=', $template->id)->delete();
        } else {
            DomainTemplate::create([
                'name'         => 'Default Domain Template',
                'html_content' => $validated['html_content'],
            ]);
        }

        return redirect()
            ->route('domains.index')
            ->with(
                'success',
                'Domain template saved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Show Domain
    |--------------------------------------------------------------------------
    */

    public function show(string $slug)
    {
        $domain = Domain::with(['framework', 'controls'])->where('slug', $slug)->first();

        if (!$domain) {
            $domain = Domain::with(['framework', 'controls'])
                ->where('domain_id', $slug)
                ->orWhere('id', $slug)
                ->firstOrFail();
        }

        $template = DomainTemplate::latest('updated_at')->first() ?? DomainTemplate::first();

        $html = ($template && !empty(trim($template->html_content)))
            ? $template->html_content
            : $this->getDefaultTemplateHtml();

        // Framework Info & Links
        $framework       = $domain->framework;
        $frameworkId     = $framework?->framework_id ?? '';
        $frameworkName   = $framework?->name ?? ($domain->related_frameworks ?: 'Universal Control Library');
        $frameworkCode   = $framework?->framework_code ?? ($domain->domain_code ?: 'UCL');
        $frameworkFamily = $framework?->framework_family ?? 'UCL';
        $frameworkUrl    = $framework ? route('frameworks.show', $framework->slug) : '#';

        $frameworkBadge = $framework ? <<<HTML
        <a href="{$frameworkUrl}" style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; background: rgba(16,188,232,0.15); border: 1px solid rgba(16,188,232,0.35); border-radius: 20px; color: #10bce8; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s; letter-spacing: 0.5px;">
            <span>Framework: {$frameworkId} ({$frameworkCode})</span>
            <span style="opacity: 0.7; font-size: 10px;">↗</span>
        </a>
HTML : "<span class=\"badge badge-cyan\">Framework: {$frameworkName}</span>";

        // Controls & Requirements
        $controls          = $domain->getControlsList();
        $controlsCount     = $controls->count();
        $controlIdChips    = $this->renderControlIdChips($controls);
        $controlsTable     = $this->renderControlsTable($controls);
        $controlsList      = $this->renderControlsList($controls);

        $controlIds = $controls->pluck('control_id')->filter();
        $requirements = $controlIds->isNotEmpty()
            ? Requirement::whereIn('control_id', $controlIds)
                ->orderBy('display_order', 'asc')
                ->orderBy('id', 'asc')
                ->get()
            : collect();
        $requirementsCount  = $requirements->count();
        $requirementIdChips = $this->renderRequirementIdChips($requirements, $controls);

        $frameworksCount = !empty($domain->related_frameworks)
            ? count(array_filter(array_map('trim', explode(',', $domain->related_frameworks))))
            : 0;

        $placeholders = [
            '{{domain_id}}'               => $domain->domain_id,
            '{{domain_code}}'             => $domain->domain_code,
            '{{domain_name}}'             => $domain->name,
            '{{slug}}'                    => $domain->slug,
            '{{purpose}}'                 => $domain->purpose,
            '{{scope}}'                   => $domain->scope,
            '{{business_owner}}'          => $domain->business_owner,
            '{{description}}'             => $domain->description,
            '{{display_order}}'           => $domain->display_order,
            '{{status}}'                  => $domain->status,
            '{{version}}'                 => $domain->version,
            '{{short_overview}}'          => $domain->short_overview,
            '{{business_objectives}}'     => $domain->business_objectives,
            '{{business_risks}}'          => $domain->business_risks,
            '{{key_capabilities}}'        => $domain->key_capabilities,
            '{{typical_stakeholders}}'    => $domain->typical_stakeholders,
            '{{applicable_industries}}'   => $domain->applicable_industries,
            '{{applicable_technologies}}' => $domain->applicable_technologies,
            '{{keywords}}'                => $domain->keywords,
            '{{tags}}'                    => $domain->tags,
            '{{why_domain_matters}}'        => $domain->why_domain_matters,
            '{{common_challenges}}'         => $domain->common_challenges,
            '{{related_domains}}'           => $this->renderPlainText($domain->related_domains),
            '{{related_domains_badges}}'    => $this->renderPlainText($domain->related_domains),
            '{{related_domains_chips}}'     => $this->renderPlainText($domain->related_domains),
            '{{related_domains_raw}}'       => $domain->related_domains,
            '{{related_frameworks}}'        => $this->renderPlainText($domain->related_frameworks),
            '{{related_frameworks_badges}}' => $this->renderPlainText($domain->related_frameworks),
            '{{related_frameworks_cards}}'  => $this->renderRelatedFrameworkBadges($domain->related_frameworks),
            '{{framework_badges}}'          => $this->renderPlainText($domain->related_frameworks),
            '{{frameworks_chips}}'          => $this->renderPlainText($domain->related_frameworks),
            '{{framework_id}}'            => $frameworkId,
            '{{framework_name}}'          => $frameworkName,
            '{{framework_code}}'          => $frameworkCode,
            '{{framework_family}}'        => $frameworkFamily,
            '{{framework_url}}'           => $frameworkUrl,
            '{{framework_badge}}'         => $frameworkBadge,
            '{{framework_id_badge}}'      => $frameworkBadge,
            '{{frameworks_count}}'        => $frameworksCount,
            '{{framework_count}}'         => $frameworksCount,
            '{{mapped_frameworks_count}}' => $frameworksCount,
            '{{controls_count}}'          => $controlsCount,
            '{{control_count}}'           => $controlsCount,
            '{{total_controls}}'          => $controlsCount,
            '{{controlsCount}}'           => $controlsCount,
            '{{count_controls}}'          => $controlsCount,
            '{{control_id_chips}}'        => $controlIdChips,
            '{{controls_chips}}'          => $controlIdChips,
            '{{controls_table}}'          => $controlsTable,
            '{{controls_list}}'           => $controlsList,
            '{{requirements_count}}'      => $requirementsCount,
            '{{requirement_count}}'       => $requirementsCount,
            '{{total_requirements}}'      => $requirementsCount,
            '{{requirementsCount}}'       => $requirementsCount,
            '{{count_requirements}}'      => $requirementsCount,
            '{{requirement_id_chips}}'    => $requirementIdChips,
            '{{requirements_chips}}'      => $requirementIdChips,
        ];

        foreach ($placeholders as $placeholder => $value) {
            $html = str_ireplace($placeholder, (string) ($value ?? ''), $html);
        }

        return response($html);
    }

    protected function renderControlIdChips($controls): string
    {
        if ($controls->isEmpty()) {
            return '<p style="color: #64748b; font-size: 13px;">No associated controls.</p>';
        }

        $chips = '';
        foreach ($controls as $control) {
            $controlUrl = route('controls.show', $control->control_id);
            $cid        = htmlspecialchars($control->control_id);
            $name       = htmlspecialchars($control->name);
            $chips .= <<<HTML
            <a href="{$controlUrl}" title="{$name}" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(16,188,232,0.1); border: 1px solid rgba(16,188,232,0.25); border-radius: 8px; color: #10bce8; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s;">
                <span>{$cid}</span>
                <span style="opacity: 0.6; font-size: 10px;">↗</span>
            </a>
HTML;
        }

        return "<div style=\"display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px;\">{$chips}</div>";
    }

    protected function renderRequirementIdChips($requirements, $controls = null): string
    {
        if ($requirements->isEmpty()) {
            return '<p style="color: var(--text-muted, #64748b); font-size: 14px; padding: 16px 0;">No requirements associated with this domain yet.</p>';
        }

        $grouped = $requirements->groupBy('control_id');
        $controlsMap = $controls ? $controls->keyBy('control_id') : collect();

        $html = '<div class="virtual-scroll-container requirements-virtual-scroll" style="display: flex; flex-direction: column; gap: 16px; margin-top: 10px; max-height: 540px; overflow-y: auto; padding-right: 6px; scroll-behavior: smooth;">';

        foreach ($grouped as $controlId => $reqs) {
            $control = $controlsMap->get($controlId);
            $controlUrl = route('controls.show', $controlId);
            $controlName = $control ? htmlspecialchars($control->name) : 'Control ' . $controlId;
            $cid = htmlspecialchars($controlId);
            $reqCount = $reqs->count();

            $cards = '';
            foreach ($reqs as $req) {
                $reqUrl = route('requirements.show', $req->requirement_id);
                $rid    = htmlspecialchars($req->requirement_id);
                $title  = htmlspecialchars($req->requirement_title ?: $req->requirement ?: $req->requirement_id);
                $text   = htmlspecialchars(\Illuminate\Support\Str::limit($req->requirement ?: $title, 130));
                $owner  = htmlspecialchars($req->typical_owner ?: 'Audit & Compliance');

                $cards .= <<<HTML
                <a href="{$reqUrl}" class="req-card-box" style="display: flex; flex-direction: column; justify-content: space-between; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; padding: 12px 14px; text-decoration: none; color: inherit; transition: all 0.2s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='var(--brand-purple, #7c3aed)'; this.style.boxShadow='0 4px 12px rgba(124, 58, 237, 0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--border-light, #e2e8f0)'; this.style.boxShadow='none';">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px; margin-bottom: 6px; flex-wrap: nowrap; overflow: hidden;">
                            <span class="req-id-badge" style="display: inline-block !important; white-space: nowrap !important; word-break: keep-all !important; hyphens: none !important; font-family: 'JetBrains Mono', monospace; font-size: 10.5px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">{$rid}</span>
                            <span style="font-size: 10px; font-weight: 600; color: var(--text-muted, #94a3b8); text-transform: uppercase; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 50%; text-align: right;" title="{$owner}">{$owner}</span>
                        </div>
                        <h4 style="font-size: 13px; font-weight: 700; color: var(--text-title, #0f172a); margin: 0 0 4px; line-height: 1.35;">{$title}</h4>
                        <p style="font-size: 11.5px; color: var(--text-body, #475569); line-height: 1.4; margin: 0 0 8px;">{$text}</p>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: flex-end; gap: 4px; font-size: 11px; font-weight: 700; color: var(--brand-purple, #7c3aed); padding-top: 6px; border-top: 1px solid var(--border-light, #f1f5f9);">
                        <span>View Requirement</span>
                        <span>↗</span>
                    </div>
                </a>
HTML;
            }

            $html .= <<<HTML
            <div style="background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); border-radius: 12px; padding: 14px;">
                <!-- Group Header -->
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; flex-wrap: wrap; gap: 8px; padding-bottom: 8px; border-bottom: 1px solid var(--border-light, #e2e8f0);">
                    <a href="{$controlUrl}" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none;" onmouseover="this.querySelector('.ctrl-link-title').style.color='var(--brand-primary, #0284c7)';" onmouseout="this.querySelector('.ctrl-link-title').style.color='var(--text-title, #0f172a)';">
                        <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 700;">
                            🛡️ {$cid} ↗
                        </span>
                        <span class="ctrl-link-title" style="color: var(--text-title, #0f172a); font-size: 13.5px; font-weight: 700; transition: color 0.2s;">{$controlName}</span>
                    </a>
                    <span style="font-size: 10.5px; color: var(--text-secondary, #64748b); font-weight: 700; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); padding: 3px 10px; border-radius: 14px; text-transform: uppercase; letter-spacing: 0.4px;">{$reqCount} Clauses</span>
                </div>
                <!-- Cards Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 10px;">
                    {$cards}
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
            return '<p style="color: var(--text-muted, #64748b); font-size: 13px; padding: 12px 0;">No controls associated with this domain yet.</p>';
        }

        $cards = '';
        foreach ($controls as $control) {
            $controlUrl = route('controls.show', $control->control_id);
            $criticalityColor = match (strtolower($control->criticality ?? '')) {
                'critical' => '#ef4444',
                'high'     => '#f97316',
                'medium'   => '#eab308',
                'low'      => '#3b82f6',
                default    => '#0284c7',
            };
            $criticalityBadge = $control->criticality
                ? "<span style=\"display: inline-block; padding: 2px 8px; border-radius: 10px; font-size: 10px; font-weight: 700; background: {$criticalityColor}18; color: {$criticalityColor}; border: 1px solid {$criticalityColor}40;\">" . htmlspecialchars($control->criticality) . "</span>"
                : '';

            $category = htmlspecialchars($control->control_category ?? 'Governance');
            $type     = htmlspecialchars($control->control_type ?? 'Preventative');
            $status   = htmlspecialchars($control->status ?? 'Active');
            $name     = htmlspecialchars($control->name);
            $cid      = htmlspecialchars($control->control_id);
            $summary  = htmlspecialchars(\Illuminate\Support\Str::limit($control->control_summary ?: $control->business_description ?: 'Governance baseline control.', 80));
            $reqCount = $control->requirements()->count();

            $cards .= <<<HTML
            <a href="{$controlUrl}" class="card-box control-card-box" style="display: flex; flex-direction: column; justify-content: space-between; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; padding: 14px 16px; text-decoration: none; color: inherit; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden; box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04));" onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='var(--brand-primary, #0284c7)'; this.style.boxShadow='0 6px 14px rgba(2,132,199,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--border-light, #e2e8f0)'; this.style.boxShadow='var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04))';">
                <div>
                    <!-- Header Badges -->
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 6px; margin-bottom: 10px; flex-wrap: wrap;">
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <span style="font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 2px 6px; border-radius: 5px;">{$cid}</span>
                            {$criticalityBadge}
                        </div>
                        <span style="display: inline-flex; align-items: center; gap: 4px; font-size: 10.5px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 2px 8px; border-radius: 10px;">
                            <span style="width: 5px; height: 5px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                            {$status}
                        </span>
                    </div>

                    <!-- Title -->
                    <h3 style="font-size: 14px; font-weight: 700; color: var(--text-title, #0f172a); margin: 0 0 8px; line-height: 1.35;">{$name}</h3>

                    <!-- Details Spec Strip -->
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 6px; background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); border-radius: 6px; padding: 6px 8px; margin-bottom: 8px; font-size: 11px;">
                        <div>
                            <span style="font-size: 9.5px; font-weight: 700; color: var(--text-muted, #94a3b8); text-transform: uppercase; display: block;">Category</span>
                            <span style="font-weight: 600; color: var(--text-title, #0f172a);">{$category}</span>
                        </div>
                        <div>
                            <span style="font-size: 9.5px; font-weight: 700; color: var(--text-muted, #94a3b8); text-transform: uppercase; display: block;">Type</span>
                            <span style="font-weight: 600; color: var(--text-title, #0f172a);">{$type}</span>
                        </div>
                    </div>

                    <!-- Description Preview -->
                    <p style="font-size: 12px; color: var(--text-body, #475569); line-height: 1.4; margin: 0 0 10px;">{$summary}</p>
                </div>

                <!-- Footer Action Button -->
                <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 8px; border-top: 1px solid var(--border-light, #e2e8f0);">
                    <span style="font-size: 11px; font-weight: 600; color: var(--text-secondary, #64748b);">📋 {$reqCount} Reqs</span>
                    <span style="display: inline-flex; align-items: center; gap: 4px; font-size: 11.5px; font-weight: 700; color: var(--brand-primary, #0284c7);">
                        <span>View Control</span>
                        <span>→</span>
                    </span>
                </div>
            </a>
HTML;
        }

        return <<<HTML
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 12px; margin-top: 10px;">
            {$cards}
        </div>
HTML;
    }

    protected function renderControlsList($controls): string
    {
        if ($controls->isEmpty()) {
            return '<p style="color: #64748b; font-size: 14px;">No controls found.</p>';
        }

        $items = '';
        foreach ($controls as $control) {
            $controlUrl = route('controls.show', $control->control_id);
            $cid = htmlspecialchars($control->control_id);
            $name = htmlspecialchars($control->name);
            $items .= <<<HTML
            <a href="{$controlUrl}" style="display: inline-flex; align-items: center; gap: 8px; padding: 6px 12px; background: rgba(16,188,232,0.08); border: 1px solid rgba(16,188,232,0.25); border-radius: 8px; color: #f8fafc; text-decoration: none; font-size: 13px; font-weight: 500;">
                <strong style="color: #10bce8;">{$cid}</strong>
                <span>{$name}</span>
            </a>
HTML;
        }

        return "<div style=\"display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px;\">{$items}</div>";
    }

    private function getDefaultTemplateHtml(): string
    {
        return <<<'HTML'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{domain_name}} ({{domain_code}}) - ASPIA Unified Control Library</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0b0f19;
            --card-bg: rgba(22, 27, 46, 0.7);
            --border-color: rgba(255, 255, 255, 0.08);
            --accent-cyan: #10bce8;
            --accent-purple: #8b5cf6;
            --accent-green: #10b981;
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-primary);
            line-height: 1.6;
            padding: 40px 20px;
            min-height: 100vh;
        }
        .container { max-width: 1200px; margin: 0 auto; }
        .header-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(15, 23, 42, 0.8) 100%);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 24px;
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        .badge-row { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 16px; align-items: center; }
        .badge {
            display: inline-flex; align-items: center; padding: 4px 12px;
            border-radius: 20px; font-size: 12px; font-weight: 700; letter-spacing: 0.5px;
        }
        .badge-cyan { background: rgba(16, 188, 232, 0.15); border: 1px solid rgba(16, 188, 232, 0.35); color: #10bce8; }
        .badge-purple { background: rgba(139, 92, 246, 0.15); border: 1px solid rgba(139, 92, 246, 0.35); color: #a78bfa; }
        .badge-green { background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.35); color: #34d399; }
        .title { font-size: 28px; font-weight: 800; color: #fff; margin-bottom: 12px; }
        .description { font-size: 15px; color: var(--text-secondary); max-width: 900px; }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 20px;
            backdrop-filter: blur(12px);
        }
        .stat-label { font-size: 12px; text-transform: uppercase; color: var(--text-muted); font-weight: 700; letter-spacing: 0.5px; }
        .stat-value { font-size: 32px; font-weight: 800; color: #fff; margin-top: 4px; }
        .section-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 28px;
            margin-bottom: 24px;
            backdrop-filter: blur(12px);
        }
        .section-title { font-size: 18px; font-weight: 700; color: #fff; margin-bottom: 16px; display: flex; align-items: center; justify-content: space-between; }
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            padding-top: 16px;
            margin-top: 16px;
            border-top: 1px solid var(--border-color);
        }
        .meta-item { display: flex; flex-direction: column; gap: 2px; }
        .meta-label { font-size: 11px; text-transform: uppercase; color: var(--text-muted); font-weight: 600; }
        .meta-val { font-size: 14px; color: var(--text-primary); font-weight: 500; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-card">
            <div class="badge-row">
                <span class="badge badge-purple">{{domain_code}}</span>
                <span class="badge badge-cyan">{{domain_id}}</span>
                <span class="badge badge-green">v{{version}}</span>
            </div>
            <h1 class="title">{{domain_name}}</h1>
            <p class="description">{{purpose}}</p>
            <div class="meta-grid">
                <div class="meta-item"><span class="meta-label">Business Owner</span><span class="meta-val">{{business_owner}}</span></div>
                <div class="meta-item"><span class="meta-label">Status</span><span class="meta-val">{{status}}</span></div>
                <div class="meta-item"><span class="meta-label">Scope</span><span class="meta-val">{{scope}}</span></div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Associated Controls</div>
                <div class="stat-value" style="color: #10bce8;">{{controls_count}}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Requirements</div>
                <div class="stat-value" style="color: #34d399;">{{requirements_count}}</div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-title">
                <span>Domain Controls</span>
                <span style="font-size: 13px; color: var(--text-muted); font-weight: 500;">{{controls_count}} controls</span>
            </div>
            {{controls_table}}
        </div>

        <div class="section-card">
            <div class="section-title">
                <span>Associated Requirements</span>
                <span style="font-size: 13px; color: var(--text-muted); font-weight: 500;">{{requirements_count}} requirements</span>
            </div>
            {{requirements_chips}}
        </div>

        <div class="section-card">
            <div class="section-title">
                <span>Mapped Compliance Frameworks</span>
            </div>
            {{related_frameworks_badges}}
        </div>
    </div>
</body>
</html>
HTML;
    }

    protected function renderPlainText(?string $val): string
    {
        $trimmed = trim((string)$val);
        return $trimmed !== '' ? htmlspecialchars($trimmed) : 'None';
    }

    protected function renderRelatedFrameworkBadges(?string $relatedFrameworks): string
    {
        if (empty($relatedFrameworks)) {
            return '<p style="color: var(--text-muted, #64748b); font-size: 13px; padding: 12px 0;">No mapped frameworks specified for this domain.</p>';
        }

        $items = array_filter(array_map('trim', explode(',', $relatedFrameworks)));
        if (empty($items)) {
            return '<p style="color: var(--text-muted, #64748b); font-size: 13px; padding: 12px 0;">No mapped frameworks specified for this domain.</p>';
        }

        $cards = '';
        foreach ($items as $name) {
            $cleanName = trim(preg_replace('/\s*\(.*?\)\s*/', ' ', $name));
            $slug      = \Illuminate\Support\Str::slug($name);
            $cleanSlug = \Illuminate\Support\Str::slug($cleanName);

            $fw = \App\Models\Framework::where('name', 'like', "%{$name}%")
                ->orWhere('name', 'like', "%{$cleanName}%")
                ->orWhere('framework_code', 'like', "%{$name}%")
                ->orWhere('framework_code', 'like', "%{$cleanSlug}%")
                ->orWhere('slug', 'like', "%{$slug}%")
                ->orWhere('slug', 'like', "%{$cleanSlug}%")
                ->first();

            $escapedName = htmlspecialchars($name);

            if ($fw) {
                $url        = route('frameworks.show', $fw->slug);
                $fwCode     = htmlspecialchars($fw->framework_code ?: $fw->framework_id ?: 'FW');
                $fwFamily   = htmlspecialchars($fw->framework_family ?: 'Standard');
                $fwVersion  = htmlspecialchars($fw->version ? "v{$fw->version}" : 'Latest');
                $fwType     = htmlspecialchars($fw->framework_type ?: $fw->category ?: 'Framework');
                $fwDesc     = htmlspecialchars(\Illuminate\Support\Str::limit($fw->description ?: "Harmonized framework mapped under ASPIA UCL.", 75));

                $cards .= <<<HTML
                <a href="{$url}" class="framework-card-box" style="display: flex; flex-direction: column; justify-content: space-between; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; padding: 14px 16px; text-decoration: none; color: inherit; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04));" onmouseover="this.style.transform='translateY(-2px)'; this.style.borderColor='var(--brand-emerald, #059669)'; this.style.boxShadow='0 6px 14px rgba(5, 150, 105, 0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--border-light, #e2e8f0)'; this.style.boxShadow='var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04))';">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px; margin-bottom: 8px; flex-wrap: wrap;">
                            <span style="font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 700; color: var(--brand-emerald, #059669); background: var(--brand-emerald-light, #ecfdf5); border: 1px solid rgba(5, 150, 105, 0.25); padding: 2px 6px; border-radius: 5px;">{$fwCode}</span>
                            <span style="font-size: 10px; font-weight: 700; color: var(--text-muted, #94a3b8); text-transform: uppercase;">{$fwVersion}</span>
                        </div>
                        <h3 style="font-size: 14px; font-weight: 700; color: var(--text-title, #0f172a); margin: 0 0 6px; line-height: 1.35;">{$escapedName}</h3>
                        
                        <div style="display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 8px;">
                            <span style="font-size: 10.5px; font-weight: 600; color: var(--text-secondary, #64748b); background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); padding: 2px 6px; border-radius: 5px;">🌐 {$fwFamily}</span>
                            <span style="font-size: 10.5px; font-weight: 600; color: var(--text-secondary, #64748b); background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); padding: 2px 6px; border-radius: 5px;">📋 {$fwType}</span>
                        </div>

                        <p style="font-size: 12px; color: var(--text-body, #475569); line-height: 1.4; margin: 0 0 10px;">{$fwDesc}</p>
                    </div>

                    <div style="display: flex; align-items: center; justify-content: flex-end; gap: 4px; font-size: 11.5px; font-weight: 700; color: var(--brand-emerald, #059669); padding-top: 8px; border-top: 1px solid var(--border-light, #e2e8f0);">
                        <span>Explore Framework</span>
                        <span>→</span>
                    </div>
                </a>
HTML;
            } else {
                $cards .= <<<HTML
                <div class="framework-card-box" style="display: flex; flex-direction: column; justify-content: space-between; background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; padding: 14px 16px; color: var(--text-secondary, #64748b); opacity: 0.85;">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                            <span style="font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 700; color: var(--text-muted, #94a3b8); background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); padding: 2px 6px; border-radius: 5px;">MAPPED</span>
                        </div>
                        <h3 style="font-size: 14px; font-weight: 700; color: var(--text-title, #0f172a); margin: 0 0 6px;">{$escapedName}</h3>
                        <p style="font-size: 12px; color: var(--text-muted, #94a3b8); margin: 0;">Crosswalk regulatory baseline mapped under ASPIA UCL.</p>
                    </div>
                </div>
HTML;
            }
        }

        return <<<HTML
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 12px; margin-top: 10px;">
            {$cards}
        </div>
HTML;
    }

    protected function renderRelatedDomainBadges(?string $relatedDomains): string
    {
        if (empty($relatedDomains)) {
            return '<span style="color: #64748b; font-size: 13px;">—</span>';
        }

        $items = array_filter(array_map('trim', explode(',', $relatedDomains)));
        if (empty($items)) {
            return '<span style="color: #64748b; font-size: 13px;">—</span>';
        }

        $html = '<div style="display: flex; flex-wrap: wrap; gap: 8px; align-items: center; margin-top: 4px;">';
        foreach ($items as $name) {
            $slug = \Illuminate\Support\Str::slug($name);
            $d = Domain::where('name', 'like', "%{$name}%")
                ->orWhere('domain_code', 'like', "%{$name}%")
                ->orWhere('slug', 'like', "%{$slug}%")
                ->first();

            $escapedName = htmlspecialchars($name);

            if ($d) {
                $url = route('domains.show', $d->slug);
                $html .= <<<HTML
                <a href="{$url}" title="View Domain: {$escapedName}" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; background: rgba(139,92,246,0.12); border: 1px solid rgba(139,92,246,0.3); border-radius: 20px; color: #a78bfa; text-decoration: none; font-size: 12.5px; font-weight: 700; transition: all 0.2s ease; cursor: pointer;" onmouseover="this.style.background='rgba(139,92,246,0.22)'; this.style.borderColor='rgba(139,92,246,0.55)';" onmouseout="this.style.background='rgba(139,92,246,0.12)'; this.style.borderColor='rgba(139,92,246,0.3)';">
                    <span>{$escapedName}</span>
                    <span style="opacity: 0.7; font-size: 10px;">↗</span>
                </a>
HTML;
            } else {
                $html .= <<<HTML
                <span title="Domain not yet available: {$escapedName}" style="display: inline-flex; align-items: center; padding: 6px 14px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; color: #94a3b8; font-size: 12.5px; font-weight: 600; cursor: default; user-select: none;">
                    <span>{$escapedName}</span>
                </span>
HTML;
            }
        }
        $html .= '</div>';

        return $html;
    }
}