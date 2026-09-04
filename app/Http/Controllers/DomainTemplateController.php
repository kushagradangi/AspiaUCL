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
            '{{requirements_table}}'      => $requirementIdChips,
            '{{all_frameworks_dropdown_list}}' => $this->renderAllFrameworksDropdownList(),
            '{{all_domains_dropdown_list}}'    => $this->renderAllDomainsDropdownList(),
            '{{all_controls_dropdown_list}}'   => $this->renderAllControlsDropdownList(),
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
            return '<p style="color: var(--text-muted, #64748b); font-size: 13px; padding: 12px 0;">No requirements associated with this domain yet.</p>';
        }

        $controlsMap = $controls ? $controls->keyBy('control_id') : collect();

        $rows = '';
        foreach ($requirements as $req) {
            $reqUrl    = route('requirements.show', $req->requirement_id);
            $rid       = htmlspecialchars($req->requirement_id);
            $title     = htmlspecialchars($req->requirement_title ?: $req->requirement ?: $req->requirement_id);
            $shortText = htmlspecialchars(\Illuminate\Support\Str::limit($req->requirement ?: $title, 40));
            $owner     = htmlspecialchars($req->typical_owner ?: 'Audit & Compliance');

            $controlId   = $req->control_id;
            $control     = $controlsMap->get($controlId);
            $controlUrl  = route('controls.show', $controlId);
            $controlName = $control ? htmlspecialchars(\Illuminate\Support\Str::limit($control->name, 30)) : 'Control ' . $controlId;
            $cid         = htmlspecialchars($controlId);

            $rows .= <<<HTML
            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.2); padding: 1px 6px; border-radius: 4px;">{$rid}</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="{$reqUrl}" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">{$title}</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">{$shortText}</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <a href="{$controlUrl}" style="display: inline-flex; align-items: center; gap: 5px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px;">{$cid}</span>
                        <span>{$controlName}</span>
                    </a>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-body, #475569); font-size: 11.5px; font-weight: 500;">
                    {$owner}
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="{$reqUrl}" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 5px; color: var(--brand-purple, #7c3aed); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>↗</span>
                    </a>
                </td>
            </tr>
HTML;
        }

        return <<<HTML
        <div class="ucl-table-container virtual-scroll-container" style="width: 100%; max-height: 480px; overflow-y: auto; overflow-x: auto; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04)); margin-top: 8px; scroll-behavior: smooth;">
            <table class="ucl-data-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 12px;">
                <thead style="position: sticky; top: 0; z-index: 10; background: var(--bg-subtle, #f8fafc); box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                    <tr style="border-bottom: 1px solid var(--border-light, #e2e8f0);">
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc); white-space: nowrap;">REQUIREMENT ID</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">REQUIREMENT TITLE & DETAILS</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc); white-space: nowrap;">MAPPED CONTROL</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">TYPICAL OWNER</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); text-align: right; background: var(--bg-subtle, #f8fafc); white-space: nowrap;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    {$rows}
                </tbody>
            </table>
        </div>
HTML;
    }

    protected function renderControlsTable($controls): string
    {
        if ($controls->isEmpty()) {
            return '<p style="color: var(--text-muted, #64748b); font-size: 13px; padding: 12px 0;">No controls associated with this domain yet.</p>';
        }

        $rows = '';
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
                ? "<span style=\"display: inline-block; padding: 1px 7px; border-radius: 10px; font-size: 9.5px; font-weight: 700; background: {$criticalityColor}18; color: {$criticalityColor}; border: 1px solid {$criticalityColor}40;\">" . htmlspecialchars($control->criticality) . "</span>"
                : '<span style="color: var(--text-muted, #94a3b8);">—</span>';

            $category = htmlspecialchars($control->control_category ?? 'Governance');
            $type     = htmlspecialchars($control->control_type ?? 'Preventative');
            $status   = htmlspecialchars($control->status ?? 'Active');
            $name     = htmlspecialchars($control->name);
            $cid      = htmlspecialchars($control->control_id);
            $summary  = htmlspecialchars(\Illuminate\Support\Str::limit($control->control_summary ?: $control->business_description ?: 'Governance baseline control.', 40));
            $reqCount = $control->requirements()->count();

            $rows .= <<<HTML
            <tr class="control-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.25); padding: 1px 6px; border-radius: 4px;">{$cid}</span>
                </td>
                <td style="padding: 7px 12px;">
                    <a href="{$controlUrl}" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">{$name}</a>
                    <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">{$summary}</span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">{$category}</div>
                    <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">{$type}</div>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    {$criticalityBadge}
                </td>
                <td style="padding: 7px 12px; white-space: nowrap;">
                    <span style="display: inline-flex; align-items: center; gap: 3px; font-size: 10px; font-weight: 700; color: #059669; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 7px; border-radius: 10px;">
                        <span style="width: 4px; height: 4px; border-radius: 50%; background: #059669; display: inline-block;"></span>
                        {$status}
                    </span>
                </td>
                <td style="padding: 7px 12px; white-space: nowrap; font-weight: 600; color: var(--text-secondary, #64748b); font-size: 11px;">
                    📋 {$reqCount} Reqs
                </td>
                <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                    <a href="{$controlUrl}" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2, 132, 199, 0.3); border-radius: 5px; color: var(--brand-primary, #0284c7); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                        <span>View</span>
                        <span>→</span>
                    </a>
                </td>
            </tr>
HTML;
        }

        return <<<HTML
        <div class="ucl-table-container" style="width: 100%; overflow-x: auto; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04)); margin-top: 8px;">
            <table class="ucl-data-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 12px;">
                <thead>
                    <tr style="background: var(--bg-subtle, #f8fafc); border-bottom: 1px solid var(--border-light, #e2e8f0);">
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Control ID</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Control Name</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Category & Type</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Criticality</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Status</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b);">Requirements</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); text-align: right;">Action</th>
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
        $filePath = resource_path('views/aspiaUcl/domains/domain_template.html');
        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        }

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

        $rows = '';
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
                $fwDesc     = htmlspecialchars(\Illuminate\Support\Str::limit($fw->description ?: "Harmonized framework mapped under ASPIA UCL.", 40));

                $rows .= <<<HTML
                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--brand-emerald, #059669); background: var(--brand-emerald-light, #ecfdf5); border: 1px solid rgba(5, 150, 105, 0.25); padding: 1px 6px; border-radius: 4px;">{$fwCode}</span>
                    </td>
                    <td style="padding: 7px 12px;">
                        <a href="{$url}" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.25; font-size: 12px;" onmouseover="this.style.color='var(--brand-emerald, #059669)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">{$escapedName}</a>
                        <span style="font-size: 10px; color: var(--text-secondary, #64748b); display: block; margin-top: 1px;">{$fwDesc}</span>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <div style="font-weight: 600; color: var(--text-title, #0f172a); font-size: 11.5px;">{$fwFamily}</div>
                        <div style="font-size: 9.5px; color: var(--text-muted, #94a3b8); margin-top: 1px;">{$fwType}</div>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="display: inline-block; padding: 1px 7px; border-radius: 8px; font-size: 10px; font-weight: 600; background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); color: var(--text-muted, #64748b);">{$fwVersion}</span>
                    </td>
                    <td style="padding: 7px 12px; text-align: right; white-space: nowrap;">
                        <a href="{$url}" style="display: inline-flex; align-items: center; gap: 3px; padding: 3px 8px; background: var(--brand-emerald-light, #ecfdf5); border: 1px solid rgba(5, 150, 105, 0.3); border-radius: 5px; color: var(--brand-emerald, #059669); font-size: 10.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;">
                            <span>View</span>
                            <span>→</span>
                        </a>
                    </td>
                </tr>
HTML;
            } else {
                $rows .= <<<HTML
                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 7px 12px; white-space: nowrap;">
                        <span style="font-family: 'JetBrains Mono', monospace; font-size: 10px; font-weight: 700; color: var(--text-muted, #94a3b8); background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); padding: 1px 6px; border-radius: 4px;">MAPPED</span>
                    </td>
                    <td style="padding: 7px 12px;">
                        <span style="font-weight: 700; color: var(--text-title, #0f172a); display: block; line-height: 1.25; font-size: 12px;">{$escapedName}</span>
                        <span style="font-size: 10px; color: var(--text-muted, #94a3b8); display: block; margin-top: 1px;">Crosswalk regulatory baseline mapped under ASPIA UCL.</span>
                    </td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Standard</td>
                    <td style="padding: 7px 12px; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">Baseline</td>
                    <td style="padding: 7px 12px; text-align: right; white-space: nowrap; color: var(--text-muted, #94a3b8); font-size: 11px;">—</td>
                </tr>
HTML;
            }
        }

        return <<<HTML
        <div class="ucl-table-container virtual-scroll-container" style="width: 100%; max-height: 480px; overflow-y: auto; overflow-x: auto; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04)); margin-top: 8px; scroll-behavior: smooth;">
            <table class="ucl-data-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 12px;">
                <thead style="position: sticky; top: 0; z-index: 10; background: var(--bg-subtle, #f8fafc); box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                    <tr style="border-bottom: 1px solid var(--border-light, #e2e8f0);">
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">Framework Code</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">Framework Name & Description</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">Family / Category</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">Version</th>
                        <th style="padding: 8px 12px; font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); text-align: right; background: var(--bg-subtle, #f8fafc);">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {$rows}
                </tbody>
            </table>
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

    protected function renderAllFrameworksDropdownList(): string
    {
        $frameworks = \App\Models\Framework::orderBy('name', 'asc')->get();
        if ($frameworks->isEmpty()) {
            return '';
        }

        $html = '<div class="dropdown-popover-list virtual-scroll-container" style="display: flex; flex-direction: column; gap: 0;">';
        $badges = ['badge-emerald', 'badge-cyan', 'badge-amber', 'badge-purple', 'badge-rose'];
        $i = 0;
        foreach ($frameworks as $fw) {
            $badgeClass = $badges[$i % count($badges)];
            $i++;
            $url = route('frameworks.show', $fw->slug);
            $code = e($fw->framework_code ?: $fw->framework_family ?: 'FW');
            $name = e($fw->name);
            $cat  = e($fw->category ?: 'Regulatory Framework');

            $html .= <<<HTML
            <a href="{$url}" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">{$name}</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">{$cat}</div>
                </div>
                <span class="card-badge {$badgeClass}" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">{$code}</span>
            </a>
HTML;
        }
        $html .= '</div>';
        return $html;
    }

    protected function renderAllDomainsDropdownList(): string
    {
        $domains = \App\Models\Domain::orderBy('display_order', 'asc')->get();
        if ($domains->isEmpty()) {
            return '';
        }

        $html = '<div class="dropdown-popover-list virtual-scroll-container" style="display: flex; flex-direction: column; gap: 0;">';
        $badges = ['badge-purple', 'badge-cyan', 'badge-emerald', 'badge-amber', 'badge-rose'];
        $i = 0;
        foreach ($domains as $d) {
            $badgeClass = $badges[$i % count($badges)];
            $i++;
            $url = route('domains.show', $d->slug);
            $code = e($d->domain_code ?: $d->domain_id ?: 'DOM');
            $name = e($d->name);
            $sub  = e($d->short_overview ?: $d->purpose ?: 'Control Domain');

            $html .= <<<HTML
            <a href="{$url}" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">{$name}</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">{$sub}</div>
                </div>
                <span class="card-badge {$badgeClass}" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">{$code}</span>
            </a>
HTML;
        }
        $html .= '</div>';
        return $html;
    }

    protected function renderAllControlsDropdownList(): string
    {
        $controls = \App\Models\Control::orderBy('control_id', 'asc')->get();
        if ($controls->isEmpty()) {
            return '';
        }

        $html = '<div class="dropdown-popover-list virtual-scroll-container" style="display: flex; flex-direction: column; gap: 0;">';
        $badges = ['badge-cyan', 'badge-purple', 'badge-amber', 'badge-emerald', 'badge-rose'];
        $i = 0;
        foreach ($controls as $c) {
            $badgeClass = $badges[$i % count($badges)];
            $i++;
            $url = route('controls.show', $c->control_id);
            $code = e($c->control_id);
            $name = e($c->name);
            $sub  = e($c->control_category ?: $c->description ?: 'Security Control');

            $html .= <<<HTML
            <a href="{$url}" class="dropdown-card" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 8px 10px; border-bottom: 1px solid var(--border-light, #e2e8f0); background: transparent; border-radius: 4px; text-decoration: none; transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)';" onmouseout="this.style.background='transparent';">
                <div style="flex: 1; min-width: 0;">
                    <div style="font-size: 12.5px; font-weight: 600; color: var(--text-title, #0f172a); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">{$name}</div>
                    <div style="font-size: 10.5px; color: var(--text-muted, #64748b); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px;">{$sub}</div>
                </div>
                <span class="card-badge {$badgeClass}" style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; padding: 2px 6px; border-radius: 4px; flex-shrink: 0;">{$code}</span>
            </a>
HTML;
        }
        $html .= '</div>';
        return $html;
    }
}