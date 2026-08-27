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

        DomainTemplate::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'name' => 'Default Domain Template',
                'html_content' => $validated['html_content'],
            ]
        );

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

        $template = DomainTemplate::first();

        if (!$template) {
            if (auth()->check()) {
                return redirect()
                    ->route('domains.index')
                    ->with('error', 'Domain template has not been created yet.');
            }

            abort(404, 'Domain template has not been created yet.');
        }

        $html = $template->html_content;

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
        $controls       = $domain->controls()->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
        $controlsCount  = $controls->count();
        $controlIdChips = $this->renderControlIdChips($controls);
        $controlsTable  = $this->renderControlsTable($controls);
        $controlsList   = $this->renderControlsList($controls);

        $controlIds = $controls->pluck('control_id')->filter();
        $requirements = $controlIds->isNotEmpty()
            ? Requirement::whereIn('control_id', $controlIds)
                ->orderBy('display_order', 'asc')
                ->orderBy('id', 'asc')
                ->get()
            : collect();
        $requirementsCount  = $requirements->count();
        $requirementIdChips = $this->renderRequirementIdChips($requirements, $controls);

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
            '{{why_domain_matters}}'      => $domain->why_domain_matters,
            '{{common_challenges}}'       => $domain->common_challenges,
            '{{related_domains}}'         => $domain->related_domains,
            '{{related_frameworks}}'      => $domain->related_frameworks,
            '{{framework_id}}'            => $frameworkId,
            '{{framework_name}}'          => $frameworkName,
            '{{framework_code}}'          => $frameworkCode,
            '{{framework_family}}'        => $frameworkFamily,
            '{{framework_url}}'           => $frameworkUrl,
            '{{framework_badge}}'         => $frameworkBadge,
            '{{framework_id_badge}}'      => $frameworkBadge,
            '{{controls_count}}'          => $controlsCount,
            '{{control_id_chips}}'        => $controlIdChips,
            '{{controls_chips}}'          => $controlIdChips,
            '{{controls_table}}'          => $controlsTable,
            '{{controls_list}}'           => $controlsList,
            '{{requirements_count}}'      => $requirementsCount,
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
                $title  = htmlspecialchars($req->requirement_title);
                $chips .= <<<HTML
                <a href="{$reqUrl}" title="{$title}" style="display: inline-flex; align-items: center; gap: 5px; padding: 5px 10px; background: rgba(139,92,246,0.12); border: 1px solid rgba(139,92,246,0.28); border-radius: 6px; color: #a78bfa; text-decoration: none; font-size: 11.5px; font-weight: 700; transition: all 0.2s;">
                    <span>{$rid}</span>
                    <span style="opacity: 0.6; font-size: 9px;">↗</span>
                </a>
HTML;
            }

            $html .= <<<HTML
            <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.06); border-radius: 10px; padding: 12px 14px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; flex-wrap: wrap; gap: 8px;">
                    <a href="{$controlUrl}" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
                        <span style="display: inline-flex; align-items: center; gap: 4px; padding: 2px 8px; background: rgba(16,188,232,0.15); border: 1px solid rgba(16,188,232,0.3); border-radius: 6px; color: #10bce8; font-size: 12px; font-weight: 700;">
                            {$cid} ↗
                        </span>
                        <span style="color: #f8fafc; font-size: 13px; font-weight: 600;">{$controlName}</span>
                    </a>
                    <span style="font-size: 11px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">{$reqCount} Requirements</span>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 6px;">
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
                <td style="padding: 12px 14px; color: #f8fafc; font-weight: 600;">{$name}</td>
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
}