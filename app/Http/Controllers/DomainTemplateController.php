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
            '{{related_domains}}'           => $this->renderRelatedDomainBadges($domain->related_domains),
            '{{related_domains_badges}}'    => $this->renderRelatedDomainBadges($domain->related_domains),
            '{{related_domains_chips}}'     => $this->renderRelatedDomainBadges($domain->related_domains),
            '{{related_domains_raw}}'       => $domain->related_domains,
            '{{related_frameworks}}'        => $this->renderRelatedFrameworkBadges($domain->related_frameworks),
            '{{related_frameworks_badges}}' => $this->renderRelatedFrameworkBadges($domain->related_frameworks),
            '{{framework_badges}}'          => $this->renderRelatedFrameworkBadges($domain->related_frameworks),
            '{{frameworks_chips}}'          => $this->renderRelatedFrameworkBadges($domain->related_frameworks),
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
            return '<p style="color: #64748b; font-size: 13px;">No associated requirements.</p>';
        }

        // Group requirements by control_id
        $grouped = $requirements->groupBy('control_id');
        $controlsMap = $controls ? $controls->keyBy('control_id') : collect();

        $html = '<div style="display: flex; flex-direction: column; gap: 14px; margin-top: 10px;">';

        foreach ($grouped as $controlId => $reqs) {
            $control = $controlsMap->get($controlId);
            $controlUrl = route('controls.show', $controlId);
            $controlName = $control ? htmlspecialchars($control->name) : '';
            $cid = htmlspecialchars($controlId);
            $reqCount = $reqs->count();

            $chips = '';
            foreach ($reqs as $req) {
                $reqUrl = route('requirements.show', $req->requirement_id);
                $rid    = htmlspecialchars($req->requirement_id);
                $title  = htmlspecialchars($req->requirement_title ?: $req->requirement ?: $req->requirement_id);
                $chips .= <<<HTML
                <a href="{$reqUrl}" title="{$rid}: {$title}" style="display: flex; align-items: center; justify-content: space-between; gap: 8px; padding: 10px 14px; background: rgba(139,92,246,0.08); border: 1px solid rgba(139,92,246,0.22); border-radius: 8px; color: #a78bfa; text-decoration: none; font-size: 12.5px; font-weight: 600; transition: all 0.2s ease; line-height: 1.4; box-sizing: border-box;" onmouseover="this.style.background='rgba(139,92,246,0.18)'; this.style.borderColor='rgba(139,92,246,0.45)';" onmouseout="this.style.background='rgba(139,92,246,0.08)'; this.style.borderColor='rgba(139,92,246,0.22)';">
                    <span style="flex: 1; word-break: break-word;">{$title}</span>
                    <span style="opacity: 0.6; font-size: 10px; flex-shrink: 0; margin-left: 6px;">↗</span>
                </a>
HTML;
            }

            $html .= <<<HTML
            <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.06); border-radius: 12px; padding: 16px 18px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; flex-wrap: wrap; gap: 8px; padding-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                    <a href="{$controlUrl}" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
                        <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 10px; background: rgba(16,188,232,0.15); border: 1px solid rgba(16,188,232,0.3); border-radius: 6px; color: #10bce8; font-size: 12px; font-weight: 700;">
                            {$cid} ↗
                        </span>
                        <span style="color: #f8fafc; font-size: 13.5px; font-weight: 600;">{$controlName}</span>
                    </a>
                    <span style="font-size: 11px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">{$reqCount} Requirements</span>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 10px;">
                    {$chips}
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
            return '<p style="color: #64748b; font-size: 14px; padding: 12px 0;">No controls associated with this domain yet.</p>';
        }

        $rows = '';
        foreach ($controls as $control) {
            $controlUrl = route('controls.show', $control->control_id);
            $criticalityColor = match (strtolower($control->criticality ?? '')) {
                'critical' => '#ef4444',
                'high'     => '#f97316',
                'medium'   => '#eab308',
                'low'      => '#3b82f6',
                default    => '#10bce8',
            };
            $criticalityBadge = $control->criticality
                ? "<span style=\"display: inline-block; padding: 2px 8px; border-radius: 12px; font-size: 11px; font-weight: 700; background: {$criticalityColor}20; color: {$criticalityColor}; border: 1px solid {$criticalityColor}40;\">" . htmlspecialchars($control->criticality) . "</span>"
                : '-';

            $category = htmlspecialchars($control->control_category ?? '-');
            $type     = htmlspecialchars($control->control_type ?? '-');
            $status   = htmlspecialchars($control->status ?? 'Active');
            $name     = htmlspecialchars($control->name);
            $cid      = htmlspecialchars($control->control_id);

            $rows .= <<<HTML
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.04); transition: background 0.2s;">
                <td style="padding: 12px 14px; font-weight: 700; color: #10bce8;">
                    <a href="{$controlUrl}" style="color: #10bce8; text-decoration: none;">{$cid}</a>
                </td>
                <td style="padding: 12px 14px; font-weight: 600;">
                    <a href="{$controlUrl}" style="color: #f8fafc; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#10bce8'; this.style.textDecoration='underline';" onmouseout="this.style.color='#f8fafc'; this.style.textDecoration='none';">{$name}</a>
                </td>
                <td style="padding: 12px 14px; color: #94a3b8;">{$category}</td>
                <td style="padding: 12px 14px;">{$criticalityBadge}</td>
                <td style="padding: 12px 14px; color: #94a3b8;">{$type}</td>
                <td style="padding: 12px 14px;">
                    <span style="display: inline-block; padding: 2px 8px; border-radius: 12px; font-size: 11px; font-weight: 700; background: rgba(16,185,129,0.15); color: #34d399; border: 1px solid rgba(16,185,129,0.3);">{$status}</span>
                </td>
                <td style="padding: 12px 14px; text-align: right;">
                    <a href="{$controlUrl}" style="display: inline-flex; align-items: center; padding: 4px 10px; background: rgba(16,188,232,0.1); border: 1px solid rgba(16,188,232,0.3); border-radius: 6px; color: #10bce8; font-size: 12px; font-weight: 600; text-decoration: none;">View →</a>
                </td>
            </tr>
HTML;
        }

        return <<<HTML
        <div style="overflow-x: auto; margin-top: 8px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.08); color: #64748b; text-transform: uppercase; font-size: 11px; letter-spacing: 0.5px;">
                        <th style="padding: 10px 14px;">Control ID</th>
                        <th style="padding: 10px 14px;">Control Name</th>
                        <th style="padding: 10px 14px;">Category</th>
                        <th style="padding: 10px 14px;">Criticality</th>
                        <th style="padding: 10px 14px;">Type</th>
                        <th style="padding: 10px 14px;">Status</th>
                        <th style="padding: 10px 14px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {$rows}
                </tbody>
            </table>
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

    protected function renderRelatedFrameworkBadges(?string $relatedFrameworks): string
    {
        if (empty($relatedFrameworks)) {
            return '<span style="color: #64748b; font-size: 13px;">Universal Control Library</span>';
        }

        $items = array_filter(array_map('trim', explode(',', $relatedFrameworks)));
        if (empty($items)) {
            return '<span style="color: #64748b; font-size: 13px;">Universal Control Library</span>';
        }

        $html = '<div style="display: flex; flex-wrap: wrap; gap: 8px; align-items: center; margin-top: 4px;">';
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
                ->orWhere(function ($q) use ($cleanName) {
                    $terms = preg_split('/[\s\-\/]+/', $cleanName);
                    $terms = array_filter($terms, fn($t) => strlen($t) > 2);
                    if (!empty($terms)) {
                        $q->where(function ($sub) use ($terms) {
                            foreach ($terms as $term) {
                                $sub->where(function ($inner) use ($term) {
                                    $inner->where('name', 'like', "%{$term}%")
                                          ->orWhere('framework_code', 'like', "%{$term}%");
                                });
                            }
                        });
                    }
                })
                ->first();

            $escapedName = htmlspecialchars($name);

            if ($fw) {
                $url = route('frameworks.show', $fw->slug);
                $html .= <<<HTML
                <a href="{$url}" title="View Framework: {$escapedName}" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; background: rgba(16,188,232,0.12); border: 1px solid rgba(16,188,232,0.3); border-radius: 20px; color: #10bce8; text-decoration: none; font-size: 12.5px; font-weight: 700; transition: all 0.2s ease; cursor: pointer;" onmouseover="this.style.background='rgba(16,188,232,0.22)'; this.style.borderColor='rgba(16,188,232,0.55)';" onmouseout="this.style.background='rgba(16,188,232,0.12)'; this.style.borderColor='rgba(16,188,232,0.3)';">
                    <span>{$escapedName}</span>
                    <span style="opacity: 0.7; font-size: 10px;">↗</span>
                </a>
HTML;
            } else {
                // Not available in database: do nothing (unclickable badge)
                $html .= <<<HTML
                <span title="Framework specification not yet available: {$escapedName}" style="display: inline-flex; align-items: center; padding: 6px 14px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; color: #94a3b8; font-size: 12.5px; font-weight: 600; cursor: default; user-select: none;">
                    <span>{$escapedName}</span>
                </span>
HTML;
            }
        }
        $html .= '</div>';

        return $html;
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