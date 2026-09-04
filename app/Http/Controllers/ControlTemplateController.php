<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\ControlTemplate;
use Illuminate\Http\Request;

class ControlTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Control Template
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

        $template = ControlTemplate::first();

        if ($template) {
            $template->update([
                'name'         => 'Default Control Template',
                'html_content' => $validated['html_content'],
            ]);
            ControlTemplate::where('id', '!=', $template->id)->delete();
        } else {
            ControlTemplate::create([
                'name'         => 'Default Control Template',
                'html_content' => $validated['html_content'],
            ]);
        }

        return redirect()
            ->route('controls.index')
            ->with(
                'success',
                'Control template saved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Show Control
    |--------------------------------------------------------------------------
    */

    public function show(string $control_id)
    {
        $control = Control::with(['domain.framework', 'requirements'])
            ->where('control_id', $control_id)
            ->first();

        if (!$control) {
            $control = Control::with(['domain.framework', 'requirements'])
                ->where('id', $control_id)
                ->firstOrFail();
        }

        $template = ControlTemplate::latest('updated_at')->first() ?? ControlTemplate::first();

        $html = ($template && !empty(trim($template->html_content)))
            ? $template->html_content
            : $this->getDefaultTemplateHtml();

        // Domain Info & Links
        $domainId      = $control->domain?->domain_id ?? '';
        $domainName    = $control->domain?->name ?? '';
        $domainCode    = $control->domain_code ?? ($control->domain?->domain_code ?? '');
        $domainPurpose = $control->domain?->purpose ?? '';
        $domainScope   = $control->domain?->scope ?? '';
        $domainUrl     = $control->domain ? route('domains.show', $control->domain->slug) : '#';

        $domainBadge = $control->domain ? <<<HTML
        <a href="{$domainUrl}" class="domain-pill-badge" title="Navigate to Parent Domain: {$domainName}" style="display: inline-flex; align-items: center; gap: 7px; padding: 6px 16px; background: linear-gradient(135deg, rgba(124, 58, 237, 0.12) 0%, rgba(168, 85, 247, 0.2) 100%); border: 1.5px solid rgba(124, 58, 237, 0.35); border-radius: 9999px; color: var(--brand-purple, #7c3aed); text-decoration: none; font-size: 12.5px; font-weight: 700; transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 2px 6px rgba(124, 58, 237, 0.1); cursor: pointer;" onmouseover="this.style.transform='translateY(-2px) scale(1.03)'; this.style.boxShadow='0 6px 16px rgba(124, 58, 237, 0.25)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 2px 6px rgba(124, 58, 237, 0.1)';">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
            <span>View Domain: {$domainCode} ({$domainId})</span>
            <span style="font-size: 11px; opacity: 0.85;">↗</span>
        </a>
HTML : ($domainCode ? "<span class=\"badge badge-purple\">View Domain: {$domainCode}</span>" : '');

        // Framework Info & Links
        $framework       = $control->framework;
        $frameworkId     = $framework?->framework_id ?? '';
        $frameworkCode   = $framework?->framework_code ?? ($control->domain?->domain_code ?: 'UCL');
        $frameworkName   = $framework?->name ?? ($control->domain?->related_frameworks ?: 'Universal Control Library');
        $frameworkFamily = $framework?->framework_family ?? 'UCL';
        $frameworkUrl    = $framework ? route('frameworks.show', $framework->slug) : '#';

        $mappedFws = $control->getMappedFrameworks()->unique('framework_name');
        if ($mappedFws->isNotEmpty()) {
            $fwChips = '';
            foreach ($mappedFws as $m) {
                $fwModel = $this->resolveFrameworkModel($m->framework_name, $m->framework_code, $m->framework_id);
                $url = $fwModel ? route('frameworks.show', $fwModel->slug) : '#';
                $fwChips .= <<<HTML
                <a href="{$url}" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; background: rgba(16,188,232,0.12); border: 1px solid rgba(16,188,232,0.3); border-radius: 20px; color: #10bce8; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s; white-space: nowrap !important; word-break: keep-all !important; flex-shrink: 0;" title="View {$m->framework_name}">
                    <span>{$m->framework_name}</span>
                    <span style="opacity: 0.7; font-size: 10px;">↗</span>
                </a>
HTML;
            }
            $frameworkBadge = "<div style=\"display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px;\">{$fwChips}</div>";
        } elseif ($framework) {
            $frameworkBadge = <<<HTML
            <a href="{$frameworkUrl}" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; background: rgba(16,188,232,0.12); border: 1px solid rgba(16,188,232,0.3); border-radius: 20px; color: #10bce8; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s; letter-spacing: 0.5px; white-space: nowrap !important; word-break: keep-all !important; flex-shrink: 0;">
                <span>Framework: {$frameworkId} ({$frameworkCode})</span>
                <span style="opacity: 0.7; font-size: 10px;">↗</span>
            </a>
HTML;
        } else {
            $frameworkBadge = "<span class=\"badge badge-cyan\" style=\"white-space: nowrap !important;\">Framework: {$frameworkName}</span>";
        }

        // Requirements Info & Chips
        $requirements        = $control->requirements()->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
        $requirementsCount   = $requirements->count();
        $requirementIdChips  = $this->renderRequirementIdChips($requirements);
        $requirementsTable   = $this->renderRequirementsTable($requirements, $control);
        $requirementsList    = $this->renderRequirementsList($requirements);

        $relatedFrameworksStr = $mappedFws->isNotEmpty()
            ? implode(', ', array_filter($mappedFws->pluck('framework_name')->toArray()))
            : $control->domain?->related_frameworks;

        $frameworksCount = !empty($relatedFrameworksStr)
            ? count(array_filter(array_map('trim', explode(',', $relatedFrameworksStr))))
            : 0;

        $frameworksTable = $this->renderRelatedFrameworkBadges($relatedFrameworksStr);

        $placeholders = [
            '{{control_id}}'                => $control->control_id,
            '{{control_name}}'              => $control->name,
            '{{domain_id}}'                 => $domainId,
            '{{domain_code}}'               => $domainCode,
            '{{domain_name}}'               => $domainName,
            '{{domain_purpose}}'            => $domainPurpose,
            '{{domain_scope}}'              => $domainScope,
            '{{domain_url}}'                => $domainUrl,
            '{{domain_badge}}'              => $domainBadge,
            '{{domain_id_badge}}'           => $domainBadge,
            '{{framework_id}}'              => $frameworkId,
            '{{framework_name}}'            => $frameworkName,
            '{{framework_code}}'            => $frameworkCode,
            '{{framework_family}}'          => $frameworkFamily,
            '{{framework_url}}'             => $frameworkUrl,
            '{{framework_badge}}'           => $frameworkBadge,
            '{{framework_id_badge}}'        => $frameworkBadge,
            '{{business_description}}'      => $control->business_description,
            '{{business_objective}}'        => $control->business_objective,
            '{{business_owner}}'            => $control->business_owner,
            '{{control_category}}'          => $control->control_category,
            '{{criticality}}'               => $control->criticality,
            '{{applicable_industries}}'     => $control->applicable_industries,
            '{{applicable_technologies}}'   => $control->applicable_technologies,
            '{{status}}'                    => $control->status,
            '{{version}}'                   => $control->version,
            '{{control_summary}}'           => $control->control_summary,
            '{{business_benefits}}'         => $control->business_benefits,
            '{{business_risks_if_missing}}' => $control->business_risks_if_missing,
            '{{primary_stakeholders}}'      => $control->primary_stakeholders,
            '{{control_type}}'              => $control->control_type,
            '{{requirements_count}}'        => $requirementsCount,
            '{{requirement_count}}'         => $requirementsCount,
            '{{total_requirements}}'        => $requirementsCount,
            '{{requirementsCount}}'         => $requirementsCount,
            '{{count_requirements}}'        => $requirementsCount,
            '{{requirement_id_chips}}'      => $requirementIdChips,
            '{{requirements_chips}}'        => $requirementIdChips,
            '{{requirements_table}}'        => $requirementsTable,
            '{{requirements_list}}'         => $requirementsList,
            '{{related_frameworks_cards}}'  => $frameworksTable,
            '{{frameworks_table}}'          => $frameworksTable,
            '{{frameworks_count}}'          => $frameworksCount,
            '{{framework_count}}'           => $frameworksCount,
            '{{mapped_frameworks_count}}'   => $frameworksCount,
            '{{all_frameworks_dropdown_list}}' => $this->renderAllFrameworksDropdownList(),
            '{{all_domains_dropdown_list}}'    => $this->renderAllDomainsDropdownList(),
            '{{all_controls_dropdown_list}}'   => $this->renderAllControlsDropdownList(),
        ];

        foreach ($placeholders as $placeholder => $value) {
            $html = str_ireplace($placeholder, (string) ($value ?? ''), $html);
        }

        return response($html);
    }

    protected function renderRequirementIdChips($requirements): string
    {
        if ($requirements->isEmpty()) {
            return '<p style="color: #64748b; font-size: 13px;">No associated requirements.</p>';
        }

        $chips = '';
        foreach ($requirements as $req) {
            $reqUrl = route('requirements.show', $req->requirement_id);
            $rid    = htmlspecialchars($req->requirement_id);
            $title  = htmlspecialchars($req->requirement_title);
            $chips .= <<<HTML
            <a href="{$reqUrl}" title="{$title}" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(16,188,232,0.1); border: 1px solid rgba(16,188,232,0.25); border-radius: 8px; color: #10bce8; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s;">
                <span>{$rid}</span>
                <span style="opacity: 0.6; font-size: 10px;">↗</span>
            </a>
HTML;
        }

        return "<div style=\"display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px;\">{$chips}</div>";
    }

    protected function renderRequirementsTable($requirements, $control = null): string
    {
        if ($requirements->isEmpty()) {
            return '<p style="color: var(--text-muted, #64748b); font-size: 13px; padding: 12px 0;">No requirements associated with this control yet.</p>';
        }

        $rows = '';
        foreach ($requirements as $req) {
            $reqUrl    = route('requirements.show', $req->requirement_id);
            $rid       = htmlspecialchars($req->requirement_id);
            $title     = htmlspecialchars($req->requirement_title ?: $req->requirement ?: $req->requirement_id);
            $shortText = htmlspecialchars(\Illuminate\Support\Str::limit($req->requirement ?: $title, 40));
            $owner     = htmlspecialchars($req->typical_owner ?: 'Audit & Compliance');

            $controlId   = $req->control_id ?: ($control?->control_id ?? '');
            $controlUrl  = $controlId ? route('controls.show', $controlId) : '#';
            $controlName = $control ? htmlspecialchars(\Illuminate\Support\Str::limit($control->name, 30)) : ($controlId ? 'Control ' . htmlspecialchars($controlId) : '—');
            $cid         = htmlspecialchars($controlId);

            $mappedControlCol = $controlId ? <<<HTML
                <a href="{$controlUrl}" style="display: inline-flex; align-items: center; gap: 6px; text-decoration: none; font-weight: 600; color: var(--text-title, #0f172a); font-size: 12px;" onmouseover="this.style.color='var(--brand-primary, #0284c7)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">
                    <span style="font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 700; color: var(--brand-primary, #0284c7); background: var(--brand-primary-light, #e0f2fe); border: 1px solid rgba(2,132,199,0.25); padding: 1px 5px; border-radius: 4px; flex-shrink: 0;">{$cid}</span>
                    <span style="max-width: 180px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: inline-block;">{$controlName}</span>
                </a>
HTML : '<span style="color: var(--text-muted, #64748b);">—</span>';

            $rows .= <<<HTML
            <tr class="req-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 10px 14px; white-space: nowrap; vertical-align: middle;">
                    <span class="req-id-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10.5px; font-weight: 700; color: var(--brand-purple, #7c3aed); background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.25); padding: 3px 8px; border-radius: 6px; display: inline-block;">{$rid}</span>
                </td>
                <td style="padding: 10px 14px; vertical-align: middle;">
                    <a href="{$reqUrl}" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.3; font-size: 13px;" onmouseover="this.style.color='var(--brand-purple, #7c3aed)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">{$title}</a>
                    <span style="font-size: 11px; color: var(--text-secondary, #64748b); display: block; margin-top: 2px; line-height: 1.35;">{$shortText}</span>
                </td>
                <td style="padding: 10px 14px; white-space: nowrap; vertical-align: middle;">
                    {$mappedControlCol}
                </td>
                <td style="padding: 10px 14px; color: var(--text-body, #475569); font-size: 12px; font-weight: 500; vertical-align: middle;">
                    {$owner}
                </td>
                <td style="padding: 10px 14px; text-align: right; white-space: nowrap; vertical-align: middle;">
                    <a href="{$reqUrl}" style="display: inline-flex; align-items: center; gap: 4px; padding: 5px 12px; background: var(--brand-purple-light, #f5f3ff); border: 1px solid rgba(124, 58, 237, 0.3); border-radius: 6px; color: var(--brand-purple, #7c3aed); font-size: 11.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;" onmouseover="this.style.background='var(--brand-purple, #7c3aed)'; this.style.color='#ffffff';" onmouseout="this.style.background='var(--brand-purple-light, #f5f3ff)'; this.style.color='var(--brand-purple, #7c3aed)';">
                        <span>View</span>
                        <span style="font-size: 11px;">↗</span>
                    </a>
                </td>
            </tr>
HTML;
        }

        return <<<HTML
        <div class="ucl-table-container virtual-scroll-container" style="width: 100%; max-height: 520px; overflow-y: auto; overflow-x: auto; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04)); margin-top: 8px; scroll-behavior: smooth;">
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

    protected function renderRequirementsList($requirements): string
    {
        if ($requirements->isEmpty()) {
            return '<p style="color: #64748b; font-size: 14px;">No requirements found.</p>';
        }

        $items = '';
        foreach ($requirements as $req) {
            $reqUrl = route('requirements.show', $req->requirement_id);
            $rid    = htmlspecialchars($req->requirement_id);
            $title  = htmlspecialchars($req->requirement_title);
            $items .= <<<HTML
            <a href="{$reqUrl}" style="display: inline-flex; align-items: center; gap: 8px; padding: 6px 12px; background: rgba(16,188,232,0.08); border: 1px solid rgba(16,188,232,0.25); border-radius: 8px; color: #f8fafc; text-decoration: none; font-size: 13px; font-weight: 500;">
                <strong style="color: #10bce8;">{$rid}</strong>
                <span>{$title}</span>
            </a>
HTML;
        }

        return "<div style=\"display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px;\">{$items}</div>";
    }

    protected function renderRelatedFrameworkBadges(?string $relatedFrameworks): string
    {
        if (empty($relatedFrameworks)) {
            return '<p style="color: var(--text-muted, #64748b); font-size: 13px; padding: 12px 0;">No mapped frameworks specified for this section.</p>';
        }

        $items = array_filter(array_map('trim', explode(',', $relatedFrameworks)));
        if (empty($items)) {
            return '<p style="color: var(--text-muted, #64748b); font-size: 13px; padding: 12px 0;">No mapped frameworks specified for this section.</p>';
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
                $fwDesc     = htmlspecialchars(\Illuminate\Support\Str::limit($fw->description ?: "Harmonized framework mapped under ASPIA UCL.", 50));

                $rows .= <<<HTML
                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 10px 14px; white-space: nowrap; vertical-align: middle;">
                        <span class="fw-code-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10.5px; font-weight: 700; color: var(--brand-emerald, #059669); background: var(--brand-emerald-light, #ecfdf5); border: 1px solid rgba(5, 150, 105, 0.25); padding: 3px 8px; border-radius: 6px; display: inline-block;">{$fwCode}</span>
                    </td>
                    <td style="padding: 10px 14px; vertical-align: middle;">
                        <a href="{$url}" style="font-weight: 700; color: var(--text-title, #0f172a); text-decoration: none; display: block; line-height: 1.3; font-size: 13px;" onmouseover="this.style.color='var(--brand-emerald, #059669)'" onmouseout="this.style.color='var(--text-title, #0f172a)'">{$escapedName}</a>
                        <span style="font-size: 11px; color: var(--text-secondary, #64748b); display: block; margin-top: 2px; line-height: 1.35;">{$fwDesc}</span>
                    </td>
                    <td style="padding: 10px 14px; white-space: nowrap; vertical-align: middle;">
                        <div style="font-weight: 700; color: var(--text-title, #0f172a); font-size: 12px;">{$fwFamily}</div>
                        <div style="font-size: 10.5px; color: var(--text-secondary, #64748b); margin-top: 2px;">{$fwType}</div>
                    </td>
                    <td style="padding: 10px 14px; white-space: nowrap; vertical-align: middle;">
                        <span style="display: inline-block; padding: 2px 9px; border-radius: 12px; font-size: 10.5px; font-weight: 600; background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); color: var(--text-muted, #64748b);">{$fwVersion}</span>
                    </td>
                    <td style="padding: 10px 14px; text-align: right; white-space: nowrap; vertical-align: middle;">
                        <a href="{$url}" style="display: inline-flex; align-items: center; gap: 4px; padding: 5px 12px; background: var(--brand-emerald-light, #ecfdf5); border: 1px solid rgba(5, 150, 105, 0.3); border-radius: 6px; color: var(--brand-emerald, #059669); font-size: 11.5px; font-weight: 700; text-decoration: none; transition: all 0.2s ease;" onmouseover="this.style.background='var(--brand-emerald, #059669)'; this.style.color='#ffffff';" onmouseout="this.style.background='var(--brand-emerald-light, #ecfdf5)'; this.style.color='var(--brand-emerald, #059669)';">
                            <span>View</span>
                            <span style="font-size: 11px;">→</span>
                        </a>
                    </td>
                </tr>
HTML;
            } else {
                $rows .= <<<HTML
                <tr class="framework-card-box" style="border-bottom: 1px solid var(--border-light, #e2e8f0); transition: background 0.15s ease;" onmouseover="this.style.background='var(--bg-subtle, #f8fafc)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 10px 14px; white-space: nowrap; vertical-align: middle;">
                        <span class="fw-code-badge" style="font-family: 'JetBrains Mono', monospace; font-size: 10.5px; font-weight: 700; color: var(--text-muted, #94a3b8); background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); padding: 3px 8px; border-radius: 6px; display: inline-block;">MAPPED</span>
                    </td>
                    <td style="padding: 10px 14px; vertical-align: middle;">
                        <span style="font-weight: 700; color: var(--text-title, #0f172a); display: block; line-height: 1.3; font-size: 13px;">{$escapedName}</span>
                        <span style="font-size: 11px; color: var(--text-secondary, #64748b); display: block; margin-top: 2px; line-height: 1.35;">Crosswalk regulatory baseline mapped under ASPIA UCL.</span>
                    </td>
                    <td style="padding: 10px 14px; white-space: nowrap; vertical-align: middle;">
                        <div style="font-weight: 700; color: var(--text-title, #0f172a); font-size: 12px;">Standard</div>
                        <div style="font-size: 10.5px; color: var(--text-secondary, #64748b); margin-top: 2px;">Governance Framework</div>
                    </td>
                    <td style="padding: 10px 14px; white-space: nowrap; vertical-align: middle;">
                        <span style="display: inline-block; padding: 2px 9px; border-radius: 12px; font-size: 10.5px; font-weight: 600; background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); color: var(--text-muted, #64748b);">Baseline</span>
                    </td>
                    <td style="padding: 10px 14px; text-align: right; white-space: nowrap; vertical-align: middle; color: var(--text-muted, #64748b); font-size: 13px;">
                        —
                    </td>
                </tr>
HTML;
            }
        }

        return <<<HTML
        <div class="ucl-table-container virtual-scroll-container" style="width: 100%; max-height: 520px; overflow-y: auto; overflow-x: auto; background: var(--bg-surface, #ffffff); border: 1px solid var(--border-light, #e2e8f0); border-radius: 10px; box-shadow: var(--shadow-sm, 0 1px 2px rgba(0,0,0,0.04)); margin-top: 8px; scroll-behavior: smooth;">
            <table class="ucl-data-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 12px;">
                <thead style="position: sticky; top: 0; z-index: 10; background: var(--bg-subtle, #f8fafc); box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                    <tr style="border-bottom: 1px solid var(--border-light, #e2e8f0);">
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc); white-space: nowrap;">FRAMEWORK CODE</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc);">FRAMEWORK NAME & DESCRIPTION</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc); white-space: nowrap;">FAMILY / CATEGORY</th>
                        <th style="padding: 10px 14px; font-size: 10.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted, #64748b); background: var(--bg-subtle, #f8fafc); white-space: nowrap;">VERSION</th>
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

    /**
     * Resolve a mapped framework name or code to the corresponding Framework database model.
     */
    protected function resolveFrameworkModel(?string $frameworkName, ?string $frameworkCode = null, $frameworkId = null): ?\App\Models\Framework
    {
        if ($frameworkId) {
            $fw = \App\Models\Framework::find($frameworkId);
            if ($fw) return $fw;
        }

        if (!$frameworkName && !$frameworkCode) {
            return null;
        }

        // 1. Direct match by Name or Code
        if ($frameworkName) {
            $fw = \App\Models\Framework::where('name', $frameworkName)
                ->orWhere('framework_code', $frameworkName)
                ->first();
            if ($fw) return $fw;
        }

        if ($frameworkCode) {
            $fw = \App\Models\Framework::where('framework_code', $frameworkCode)
                ->orWhere('name', $frameworkCode)
                ->first();
            if ($fw) return $fw;
        }

        // 2. Intelligent Keyword & Acronym Matching
        $nameLower = strtolower(trim((string)$frameworkName));
        $codeLower = strtolower(trim((string)$frameworkCode));
        $allFrameworks = \App\Models\Framework::all();

        return $allFrameworks->first(function ($item) use ($nameLower, $codeLower) {
            $fwName = strtolower($item->name);
            $fwCode = strtolower($item->framework_code ?? '');
            $fwSlug = strtolower($item->slug ?? '');

            // Specific regulatory bodies (India & Global)
            if (str_contains($nameLower, 'rbi') || str_contains($codeLower, 'rbi')) {
                return str_contains($fwName, 'rbi') || str_contains($fwSlug, 'rbi');
            }
            if (str_contains($nameLower, 'sebi') || str_contains($codeLower, 'sebi')) {
                return str_contains($fwName, 'sebi') || str_contains($fwSlug, 'sebi');
            }
            if (str_contains($nameLower, 'irdai') || str_contains($codeLower, 'irdai')) {
                return str_contains($fwName, 'irdai') || str_contains($fwSlug, 'irdai');
            }
            if (str_contains($nameLower, 'npci') || str_contains($codeLower, 'npci')) {
                return str_contains($fwName, 'npci') || str_contains($fwSlug, 'npci');
            }
            if (str_contains($nameLower, 'cert-in') || str_contains($codeLower, 'cert-in')) {
                return str_contains($fwName, 'cert-in') || str_contains($fwSlug, 'cert-in');
            }

            // ISO Standards
            if (str_contains($nameLower, '27001')) return str_contains($fwName, '27001') || str_contains($fwSlug, '27001');
            if (str_contains($nameLower, '27002')) return str_contains($fwName, '27002') || str_contains($fwSlug, '27002');
            if (str_contains($nameLower, '27701')) return str_contains($fwName, '27701') || str_contains($fwSlug, '27701');
            if (str_contains($nameLower, '22301')) return str_contains($fwName, '22301') || str_contains($fwSlug, '22301');

            // Privacy & Digital Resilience Regulations
            if (str_contains($nameLower, 'gdpr') || str_contains($codeLower, 'gdpr')) {
                return str_contains($fwName, 'gdpr') || str_contains($fwSlug, 'gdpr') || str_contains($fwName, 'general data protection');
            }
            if (str_contains($nameLower, 'dora') || str_contains($codeLower, 'dora')) {
                return str_contains($fwName, 'dora') || str_contains($fwSlug, 'dora') || str_contains($fwName, 'digital operational resilience');
            }
            if (str_contains($nameLower, 'dpdpa') || str_contains($codeLower, 'dpdpa')) {
                return str_contains($fwName, 'dpdpa') || str_contains($fwSlug, 'dpdpa') || str_contains($fwName, 'digital personal data');
            }
            if (str_contains($nameLower, 'hipaa') || str_contains($codeLower, 'hipaa')) {
                return str_contains($fwName, 'hipaa') || str_contains($fwSlug, 'hipaa') || str_contains($fwName, 'health insurance portability');
            }
            if (str_contains($nameLower, 'nis2') || str_contains($codeLower, 'nis2')) {
                return str_contains($fwName, 'nis2') || str_contains($fwSlug, 'nis2');
            }

            // Cybersecurity & Industry Benchmarks
            if (str_contains($nameLower, '800-53') || str_contains($codeLower, '800-53')) return str_contains($fwName, '800-53') || str_contains($fwSlug, '800-53');
            if (str_contains($nameLower, 'pci') || str_contains($codeLower, 'pci')) return str_contains($fwName, 'pci') || str_contains($fwSlug, 'pci');
            if (str_contains($nameLower, 'soc 2') || str_contains($codeLower, 'soc 2')) return str_contains($fwName, 'soc 2') || str_contains($fwSlug, 'soc-2');
            if (str_contains($nameLower, 'cis') || str_contains($codeLower, 'cis')) return str_contains($fwName, 'cis') || str_contains($fwSlug, 'cis');
            if (str_contains($nameLower, 'cobit') || str_contains($codeLower, 'cobit')) return str_contains($fwName, 'cobit') || str_contains($fwSlug, 'cobit');
            if (str_contains($nameLower, 'csf') || str_contains($codeLower, 'csf')) return str_contains($fwName, 'csf') || str_contains($fwName, 'cybersecurity framework');

            return str_contains($fwName, $nameLower) || str_contains($nameLower, $fwName);
        });
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

    private function getDefaultTemplateHtml(): string
    {
        $filePath = resource_path('views/aspiaUcl/controls/control_template.html');
        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        }

        return <<<'HTML'
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{control_name}} ({{control_id}}) - Universal Control Library | ASPIA GRC</title>
    <meta name="title" content="{{control_name}} ({{control_id}}) - Universal Control Library | ASPIA GRC">
    <meta name="description"
        content="Explore {{control_name}} ({{control_id}}), compliance requirements, business objectives, and framework mappings in ASPIA UCL.">
    <meta name="keywords" content="{{control_id}}, {{control_name}}, {{control_category}}, {{control_type}}, {{criticality}}, GRC control, ASPIA UCL">
    <meta name="author" content="ASPIA Unified Control Library">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://grc.aspia.io/controls/{{control_id}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg-page: #f8fafc;
            --bg-surface: #ffffff;
            --bg-subtle: #f1f5f9;
            --bg-glass: rgba(255, 255, 255, 0.9);
            --border-light: #e2e8f0;
            --border-subtle: #cbd5e1;
            --border-hover: #94a3b8;
            --text-title: #0f172a;
            --text-body: #334155;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;
            --brand-primary: #0284c7;
            --brand-primary-light: #e0f2fe;
            --brand-sapphire: #1e40af;
            --brand-purple: #7c3aed;
            --brand-purple-light: #f5f3ff;
            --brand-emerald: #059669;
            --brand-emerald-light: #ecfdf5;
            --brand-amber: #d97706;
            --brand-amber-light: #fffbeb;
            --brand-rose: #e11d48;
            --brand-rose-light: #fff1f2;
            --shadow-sm: 0 1px 2px 0 rgba(15, 23, 42, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(15, 23, 42, 0.08), 0 2px 4px -2px rgba(15, 23, 42, 0.04);
            --shadow-lg: 0 10px 15px -3px rgba(15, 23, 42, 0.08);
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 16px;
            --radius-full: 9999px;
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        [data-theme="dark"] {
            --bg-page: #0b0f19;
            --bg-surface: #111827;
            --bg-subtle: #1f2937;
            --bg-glass: rgba(17, 24, 39, 0.9);
            --border-light: #374151;
            --border-subtle: #4b5563;
            --border-hover: #6b7280;
            --text-title: #f9fafb;
            --text-body: #e5e7eb;
            --text-secondary: #9ca3af;
            --text-muted: #6b7280;
            --brand-primary: #38bdf8;
            --brand-primary-light: rgba(56, 189, 248, 0.15);
            --brand-purple: #c084fc;
            --brand-purple-light: rgba(192, 132, 252, 0.15);
            --brand-emerald: #34d399;
            --brand-emerald-light: rgba(52, 211, 153, 0.15);
            --brand-amber: #fbbf24;
            --brand-amber-light: rgba(251, 191, 36, 0.15);
            --brand-rose: #fb7185;
            --brand-rose-light: rgba(251, 113, 133, 0.15);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.4);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.5);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-page);
            color: var(--text-body);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a {
            color: var(--brand-primary);
            text-decoration: none;
            transition: var(--transition);
        }

        a:hover {
            color: var(--brand-sapphire);
            text-decoration: underline;
        }

        .mono {
            font-family: 'JetBrains Mono', monospace;
        }

        .container {
            width: 100%;
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: var(--bg-glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-light);
            padding: 12px 0;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .brand-group {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .brand-logo-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            padding: 2px 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 26px;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -0.6px;
            user-select: none;
        }

        .logo-text-aspia {
            color: #031433;
            transition: color 0.3s ease;
        }

        [data-theme="dark"] .logo-text-aspia {
            color: #ffffff;
        }

        .logo-text-ucl {
            color: #00a8ff;
            font-weight: 900;
            margin-left: 2px;
        }

        .theme-switch-container {
            display: inline-flex;
            align-items: center;
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-full);
            padding: 3px;
            cursor: pointer;
            user-select: none;
        }

        .theme-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            border: none;
            background: transparent;
            color: var(--text-secondary);
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .theme-btn.active {
            background: var(--bg-surface);
            color: var(--text-title);
            box-shadow: var(--shadow-sm);
        }

        /* Nav Menu Styles */
        .main-nav-wrapper {
            display: flex;
            align-items: center;
            margin-left: auto;
            margin-right: 16px;
        }

        .nav-menu-list {
            display: flex;
            align-items: center;
            gap: 6px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-menu-item {
            position: relative;
        }

        .nav-menu-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 14px;
            border-radius: var(--radius-full);
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition);
        }

        .nav-menu-link:hover {
            color: var(--text-title);
            background: var(--bg-subtle);
            text-decoration: none;
        }

        .nav-menu-link.active {
            color: var(--brand-primary);
            font-weight: 700;
        }

        .nav-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.85;
        }

        .dropdown-arrow {
            font-size: 10px;
            opacity: 0.6;
            margin-left: 2px;
            transition: transform 0.2s ease;
        }

        .dropdown-parent:hover .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-popover {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            width: 315px;
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 12px;
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transform: translateY(8px);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1100;
        }

        .dropdown-parent:hover .dropdown-popover,
        .dropdown-parent:focus-within .dropdown-popover,
        .dropdown-parent.search-active .dropdown-popover {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
            pointer-events: auto !important;
        }

        .dropdown-parent.search-active .nav-menu-link {
            color: var(--brand-primary);
            font-weight: 700;
        }

        .dropdown-popover-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 10px;
            margin-bottom: 12px;
            border-bottom: 1px solid var(--border-light);
        }

        .popover-title {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: var(--brand-primary);
        }

        .popover-all-link {
            font-size: 12px;
            font-weight: 700;
            color: var(--brand-primary);
            text-decoration: none;
        }

        .popover-all-link:hover {
            text-decoration: underline;
        }

        .dropdown-popover-grid,
        .dropdown-popover-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
            max-height: 460px;
            overflow-y: auto;
            padding-right: 4px;
            scroll-behavior: smooth;
        }

        .dropdown-popover-list::-webkit-scrollbar {
            width: 5px;
        }

        .dropdown-popover-list::-webkit-scrollbar-track {
            background: var(--bg-subtle);
            border-radius: var(--radius-full);
        }

        .dropdown-popover-list::-webkit-scrollbar-thumb {
            background: var(--border-light);
            border-radius: var(--radius-full);
        }

        .dropdown-popover-list::-webkit-scrollbar-thumb:hover {
            background: var(--brand-primary);
        }

        .dropdown-card {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            text-decoration: none;
            transition: var(--transition);
        }

        .dropdown-card:hover {
            border-color: var(--brand-primary);
            transform: translateX(4px);
            background: var(--bg-surface);
            box-shadow: var(--shadow-sm);
            text-decoration: none;
        }

        .dropdown-card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .dropdown-card-title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .card-badge {
            display: inline-block;
            font-family: 'JetBrains Mono', monospace;
            font-size: 9.5px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 4px;
            width: fit-content;
            flex-shrink: 0;
        }

        .card-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-title);
            line-height: 1.3;
        }

        .card-sub {
            font-size: 11px;
            color: var(--text-secondary);
        }

        @media (max-width: 992px) {
            .main-nav-wrapper {
                display: none;
            }
        }

        .hero-section {
            padding: 32px 0 20px;
        }

        .hero-search-wrapper {
            margin: 0 auto 18px auto;
            width: 100%;
            max-width: 580px;
        }

        .hero-search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--bg-surface);
            border: 1.5px solid #38bdf8;
            border-radius: var(--radius-full);
            padding: 6px 16px;
            box-shadow: 0 0 12px rgba(56, 189, 248, 0.15), inset 0 1px 2px rgba(0, 0, 0, 0.02);
            transition: var(--transition);
        }

        .hero-search-bar:focus-within,
        .hero-search-bar:hover {
            border-color: var(--brand-primary);
            box-shadow: 0 0 18px rgba(2, 132, 199, 0.28), 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .search-icon-svg {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0284c7;
            font-size: 14px;
            flex-shrink: 0;
        }

        [data-theme="dark"] .hero-search-bar {
            border-color: #0284c7;
            box-shadow: 0 0 14px rgba(2, 132, 199, 0.25);
        }

        [data-theme="dark"] .search-icon-svg {
            color: #38bdf8;
        }

        .hero-search-input {
            flex: 1;
            border: none;
            background: transparent;
            font-size: 13.5px;
            font-weight: 500;
            font-family: inherit;
            color: var(--text-title);
            outline: none;
            padding: 2px 0;
        }

        .hero-search-input::placeholder {
            color: var(--text-secondary);
            opacity: 0.85;
        }

        .clear-search-btn {
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            color: var(--text-muted);
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .clear-search-btn:hover {
            background: var(--brand-rose-light);
            color: var(--brand-rose);
            border-color: var(--brand-rose);
        }

        .control-hero-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 36px;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .control-hero-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--brand-primary), var(--brand-purple), var(--brand-emerald));
        }

        .badge-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: var(--radius-full);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .badge-cyan {
            background: var(--brand-primary-light);
            color: var(--brand-primary);
            border: 1px solid rgba(2, 132, 199, 0.2);
        }

        .badge-purple {
            background: var(--brand-purple-light);
            color: var(--brand-purple);
            border: 1px solid rgba(124, 58, 237, 0.2);
        }

        .badge-amber {
            background: var(--brand-amber-light);
            color: var(--brand-amber);
            border: 1px solid rgba(217, 119, 6, 0.2);
        }

        .badge-status-glow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 5px 14px;
            border-radius: var(--radius-full);
            font-size: 12px;
            font-weight: 700;
            background: rgba(16, 185, 129, 0.12);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.4);
            box-shadow: 0 0 14px rgba(16, 185, 129, 0.3);
            animation: pulseGlow 2.5s infinite alternate ease-in-out;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background-color: #10b981;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 8px #10b981;
            animation: pulseDot 1.8s infinite ease-in-out;
        }

        @keyframes pulseGlow {
            0% {
                box-shadow: 0 0 8px rgba(16, 185, 129, 0.2);
            }

            100% {
                box-shadow: 0 0 20px rgba(16, 185, 129, 0.55);
            }
        }

        @keyframes pulseDot {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.35);
                opacity: 0.65;
            }
        }

        .control-title-wrap {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 12px;
        }

        h1.control-title {
            font-size: 32px;
            font-weight: 800;
            color: var(--text-title);
            line-height: 1.25;
            letter-spacing: -0.5px;
            max-width: 850px;
        }

        .control-lead {
            font-size: 15.5px;
            color: var(--text-body);
            line-height: 1.7;
            max-width: 980px;
            margin-bottom: 24px;
        }

        .hero-details-container {
            border-top: 1px solid var(--border-light);
            padding-top: 20px;
            margin-top: 20px;
            max-height: 480px;
            overflow-y: auto;
            padding-right: 8px;
            scroll-behavior: smooth;
        }

        .hero-details-container::-webkit-scrollbar {
            width: 6px;
        }

        .hero-details-container::-webkit-scrollbar-track {
            background: var(--bg-subtle);
            border-radius: var(--radius-full);
        }

        .hero-details-container::-webkit-scrollbar-thumb {
            background: var(--border-subtle);
            border-radius: var(--radius-full);
        }

        .hero-details-container::-webkit-scrollbar-thumb:hover {
            background: var(--border-hover);
        }

        .details-group-header {
            font-size: 12.5px;
            font-weight: 800;
            color: var(--brand-primary);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin: 24px 0 12px 0;
            padding-bottom: 6px;
            border-bottom: 1.5px solid var(--border-light);
        }

        .details-group-header:first-child {
            margin-top: 0;
        }

        .excel-spec-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 14px;
            margin-bottom: 8px;
        }

        .excel-field-card {
            background: var(--bg-subtle);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 14px 16px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            transition: var(--transition);
        }

        .excel-field-card.span-2 {
            grid-column: span 2;
        }

        .excel-field-card.full-width {
            grid-column: 1 / -1;
        }

        .excel-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .excel-val {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-title);
            line-height: 1.6;
            word-break: break-word;
        }

        .tabs-nav-wrapper {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 6px 12px;
            margin-bottom: 28px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .tabs-nav {
            display: flex;
            gap: 6px;
            list-style: none;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 10px 22px;
            border-radius: var(--radius-sm);
            font-size: 13.5px;
            font-weight: 700;
            color: var(--text-secondary);
            background: transparent;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .tab-btn:hover {
            color: var(--text-title);
            background: var(--bg-subtle);
        }

        .tab-btn.active {
            background: var(--brand-primary);
            color: #ffffff;
            box-shadow: var(--shadow-sm);
        }

        .tab-count {
            padding: 2px 8px;
            font-size: 11px;
            font-weight: 700;
            border-radius: var(--radius-full);
            background: rgba(255, 255, 255, 0.25);
            color: inherit;
        }

        .tab-btn:not(.active) .tab-count {
            background: var(--bg-subtle);
            color: var(--text-secondary);
            border: 1px solid var(--border-light);
        }

        .tab-panel {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .tab-panel.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-box {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 28px;
            margin-bottom: 28px;
            box-shadow: var(--shadow-sm);
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-light);
            flex-wrap: wrap;
            gap: 12px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-title);
        }

        .section-badge {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
        }

        .virtual-scroll-container {
            max-height: 520px;
            overflow-y: auto;
            padding-right: 6px;
            scroll-behavior: smooth;
        }

        .virtual-scroll-container::-webkit-scrollbar {
            width: 6px;
        }

        .virtual-scroll-container::-webkit-scrollbar-track {
            background: var(--bg-subtle);
            border-radius: var(--radius-full);
        }

        .virtual-scroll-container::-webkit-scrollbar-thumb {
            background: var(--border-subtle);
            border-radius: var(--radius-full);
        }

        .mono {
            display: inline-block !important;
            white-space: nowrap !important;
            word-break: keep-all !important;
            hyphens: none !important;
        }

        .toast {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: var(--text-title);
            color: var(--bg-surface);
            padding: 12px 20px;
            border-radius: var(--radius-md);
            font-size: 13.5px;
            font-weight: 600;
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateY(100px);
            opacity: 0;
            transition: transform 0.3s ease;
            z-index: 9999;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .site-footer {
            margin-top: auto;
            border-top: 1px solid var(--border-light);
            background: var(--bg-surface);
            padding: 32px 0;
            font-size: 13px;
            color: var(--text-muted);
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 16px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 16px;
            }

            .control-hero-card {
                padding: 24px;
            }

            h1.control-title {
                font-size: 24px;
            }

            .excel-field-card.span-2 {
                grid-column: 1 / -1;
            }
        }
    </style>
</head>

<body>
    <header class="site-header" role="banner">
        <div class="container header-content">
            <div class="brand-group">
                <a href="/controls" class="brand-logo-link" aria-label="ASPIA UCL Home">
                    <span class="logo-text-aspia">ASPIA</span><span class="logo-text-ucl">UCL</span>
                </a>
            </div>

            <!-- Site Navigation Menu -->
            <nav class="main-nav-wrapper" aria-label="Main Navigation">
                <ul class="nav-menu-list">
                    <!-- Frameworks Menu -->
                    <li class="nav-menu-item dropdown-parent">
                        <a href="javascript:void(0)" class="nav-menu-link" onclick="event.preventDefault();">
                            <span>Frameworks</span>
                            <span class="dropdown-arrow">▾</span>
                        </a>
                        <div class="dropdown-popover">
                            {{all_frameworks_dropdown_list}}
                        </div>
                    </li>

                    <!-- Domains Menu -->
                    <li class="nav-menu-item dropdown-parent">
                        <a href="javascript:void(0)" class="nav-menu-link" onclick="event.preventDefault();">
                            <span>Domains</span>
                            <span class="dropdown-arrow">▾</span>
                        </a>
                        <div class="dropdown-popover">
                            {{all_domains_dropdown_list}}
                        </div>
                    </li>

                    <!-- Controls Menu -->
                    <li class="nav-menu-item dropdown-parent">
                        <a href="javascript:void(0)" class="nav-menu-link" onclick="event.preventDefault();">
                            <span>Controls</span>
                            <span class="dropdown-arrow">▾</span>
                        </a>
                        <div class="dropdown-popover">
                            {{all_controls_dropdown_list}}
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="header-actions">
                <div class="theme-switch-container" id="themeSwitch" role="group" aria-label="Color theme switcher">
                    <button type="button" class="theme-btn active" id="btnThemeLight" aria-pressed="true">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                        <span>Light</span>
                    </button>
                    <button type="button" class="theme-btn" id="btnThemeDark" aria-pressed="false">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                        <span>Dark</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="container" id="main-content" role="main">
        <article class="hero-section">
            <div class="hero-search-wrapper">
                <div class="hero-search-bar" id="heroSearchBar">
                    <span class="search-icon-svg">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </span>
                    <input type="text" id="globalHeroSearchInput" class="hero-search-input"
                        placeholder="Search requirements, controls, specifications..."
                        aria-label="Search requirements, controls, specifications">
                    <button type="button" id="clearHeroSearchBtn" class="clear-search-btn" style="display: none;"
                        aria-label="Clear search">✕</button>
                </div>
            </div>

            <div class="control-hero-card">
                <div class="badge-bar">
                    <span class="badge badge-purple"><span class="mono">{{control_id}}</span></span>
                    <span class="badge badge-cyan"><span class="mono">{{domain_code}}</span></span>
                    <span class="badge badge-amber"><span>{{criticality}}</span></span>
                    <span class="badge badge-status-glow">
                        <span class="status-dot"></span>
                        <span>Status: <strong>{{status}}</strong></span>
                    </span>
                </div>
                <div class="control-title-wrap">
                    <h1 class="control-title">{{control_name}}</h1>
                </div>

                <!-- Professional Executive Control Specifications in Hero -->
                <div class="hero-details-container">
                    <div class="details-group-header">Control Identification & Governance</div>
                    <div class="excel-spec-grid">
                        <div class="excel-field-card">
                            <div class="excel-label">Control ID</div>
                            <div class="excel-val mono" style="color: var(--brand-primary); font-weight: 700;">
                                {{control_id}}</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Domain Code</div>
                            <div class="excel-val mono" style="color: var(--brand-purple); font-weight: 700;">
                                {{domain_code}}</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Control Name</div>
                            <div class="excel-val" style="font-weight: 700;">{{control_name}}</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Control Category</div>
                            <div class="excel-val">{{control_category}}</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Control Type</div>
                            <div class="excel-val">{{control_type}}</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Criticality</div>
                            <div class="excel-val mono">{{criticality}}</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Business Owner</div>
                            <div class="excel-val">{{business_owner}}</div>
                        </div>
                        <div class="excel-field-card">
                            <div class="excel-label">Version</div>
                            <div class="excel-val mono">{{version}}</div>
                        </div>
                        <div class="excel-field-card full-width">
                            <div class="excel-label">Control Summary</div>
                            <div class="excel-val">{{control_summary}}</div>
                        </div>
                        <div class="excel-field-card full-width">
                            <div class="excel-label">Business Description</div>
                            <div class="excel-val">{{business_description}}</div>
                        </div>
                    </div>

                    <div class="details-group-header">Business Objectives & Risk Register</div>
                    <div class="excel-spec-grid">
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Business Objective</div>
                            <div class="excel-val">{{business_objective}}</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Business Benefits</div>
                            <div class="excel-val">{{business_benefits}}</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Business Risks if Missing</div>
                            <div class="excel-val">{{business_risks_if_missing}}</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Primary Stakeholders</div>
                            <div class="excel-val">{{primary_stakeholders}}</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Applicable Industries</div>
                            <div class="excel-val">{{applicable_industries}}</div>
                        </div>
                        <div class="excel-field-card span-2">
                            <div class="excel-label">Applicable Technologies</div>
                            <div class="excel-val">{{applicable_technologies}}</div>
                        </div>
                    </div>
                </div>
            </div>

        </article>

        <nav class="tabs-nav-wrapper" aria-label="Control Sections Navigation">
            <ul class="tabs-nav" role="tablist">
                <li role="presentation"><button type="button" class="tab-btn active" role="tab" aria-selected="true"
                        aria-controls="panel-requirements" id="tab-requirements" data-target="panel-requirements">Associated
                        Requirements <span class="tab-count">{{requirements_count}}</span></button></li>
                <li role="presentation"><button type="button" class="tab-btn" role="tab" aria-selected="false"
                        aria-controls="panel-domain" id="tab-domain" data-target="panel-domain">Associated
                        Domain</button></li>
                <li role="presentation"><button type="button" class="tab-btn" role="tab" aria-selected="false"
                        aria-controls="panel-frameworks" id="tab-frameworks" data-target="panel-frameworks">Mapped
                        Frameworks</button></li>
            </ul>

            <!-- Tab Sections Real-time Filter Search Bar -->
            <div class="tab-section-search-box" style="position: relative; width: 320px; max-width: 100%; margin-left: auto;">
                <svg style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 14px; height: 14px; fill: none; stroke: var(--brand-primary, #0284c7); stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; pointer-events: none;" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" id="tabSectionSearchInput" placeholder="Search requirements, domain, frameworks..." style="width: 100%; padding: 8px 32px 8px 34px; background: var(--bg-subtle, #f8fafc); border: 1.5px solid var(--border-light, #e2e8f0); border-radius: 8px; font-size: 12px; font-weight: 600; color: var(--text-title, #0f172a); outline: none; transition: all 0.2s ease;" onfocus="this.style.borderColor='var(--brand-primary, #0284c7)'; this.style.background='var(--bg-surface, #ffffff)'; this.style.boxShadow='0 0 0 3px rgba(2, 132, 199, 0.15)';" onblur="this.style.borderColor='var(--border-light, #e2e8f0)'; this.style.background='var(--bg-subtle, #f8fafc)'; this.style.boxShadow='none';">
                <button type="button" id="tabSectionSearchClear" style="display: none; position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: var(--bg-subtle); border: 1px solid var(--border-light); width: 18px; height: 18px; border-radius: 50%; font-size: 10px; color: var(--text-muted); cursor: pointer; align-items: center; justify-content: center; line-height: 1;">✕</button>
            </div>
        </nav>

        <div class="tab-panel active" id="panel-requirements" role="tabpanel" aria-labelledby="tab-requirements">
            <div class="section-box">
                <div class="section-header">
                    <h2 class="section-title">Compliance Requirements & Audit Crosswalk</h2><span
                        class="section-badge">{{requirements_count}} Specific Audit Clauses</span>
                </div>
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 20px;">The following requirements dictate specific audit evidence criteria and testing steps mapped directly under the controls of this domain.</p>
                {{requirements_table}}
            </div>
        </div>

        <div class="tab-panel" id="panel-domain" role="tabpanel" aria-labelledby="tab-domain">
            <div class="section-box">
                <div class="section-header">
                    <h2 class="section-title">Parent Domain Context</h2><span
                        class="section-badge">Governance Domain Baseline</span>
                </div>
                <div style="margin-top: 12px; font-size: 14.5px;">
                    <p style="margin-bottom: 12px;"><strong>Domain Name:</strong> {{domain_name}} ({{domain_code}})</p>
                    <p style="margin-bottom: 12px;"><strong>Purpose:</strong> {{domain_purpose}}</p>
                    <p style="margin-bottom: 16px;"><strong>Scope:</strong> {{domain_scope}}</p>
                    <div style="margin-top: 16px;">{{domain_badge}}</div>
                </div>
            </div>
        </div>

        <div class="tab-panel" id="panel-frameworks" role="tabpanel" aria-labelledby="tab-frameworks">
            <div class="section-box">
                <div class="section-header">
                    <h2 class="section-title">Cross-Mapped Regulatory Frameworks</h2><span
                        class="section-badge">Harmonized Framework Mappings</span>
                </div>
                <div style="margin-top: 12px;">{{framework_badge}}</div>
            </div>
        </div>
    </main>

    <div class="toast" id="toastMessage" role="status" aria-live="polite"><span>✓</span> <span id="toastText">Copied to
            clipboard</span></div>

    <footer class="site-footer" role="contentinfo">
        <div class="container footer-content">
            <div>&copy; 2026 <strong>ASPIA Universal Control Library (UCL)</strong>. All rights reserved. &bull; Unified
                Governance, Risk, and Compliance Engine</div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const htmlEl = document.documentElement;
            const btnThemeLight = document.getElementById('btnThemeLight');
            const btnThemeDark = document.getElementById('btnThemeDark');
            const savedTheme = localStorage.getItem('aspia_theme') || 'light';
            setTheme(savedTheme);
            btnThemeLight.addEventListener('click', () => setTheme('light'));
            btnThemeDark.addEventListener('click', () => setTheme('dark'));
            function setTheme(theme) {
                htmlEl.setAttribute('data-theme', theme);
                localStorage.setItem('aspia_theme', theme);
                if (theme === 'light') {
                    btnThemeLight.classList.add('active'); btnThemeLight.setAttribute('aria-pressed', 'true');
                    btnThemeDark.classList.remove('active'); btnThemeDark.setAttribute('aria-pressed', 'false');
                } else {
                    btnThemeDark.classList.add('active'); btnThemeDark.setAttribute('aria-pressed', 'true');
                    btnThemeLight.classList.remove('active'); btnThemeLight.setAttribute('aria-pressed', 'false');
                }
            }

            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabPanels = document.querySelectorAll('.tab-panel');
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    tabButtons.forEach(btn => { btn.classList.remove('active'); btn.setAttribute('aria-selected', 'false'); });
                    tabPanels.forEach(panel => panel.classList.remove('active'));
                    button.classList.add('active'); button.setAttribute('aria-selected', 'true');
                    const targetId = button.getAttribute('data-target');
                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) targetPanel.classList.add('active');
                });
            });

            const searchInput = document.getElementById('globalHeroSearchInput');
            const clearSearchBtn = document.getElementById('clearHeroSearchBtn');
            if (searchInput) {
                document.addEventListener('keydown', (e) => {
                    if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); searchInput.focus(); }
                    else if (e.key === '/' && document.activeElement !== searchInput) { e.preventDefault(); searchInput.focus(); }
                    else if (e.key === 'Escape' && document.activeElement === searchInput) { searchInput.value = ''; filterAllItems(''); searchInput.blur(); }
                });
                searchInput.addEventListener('input', (e) => filterAllItems(e.target.value.trim().toLowerCase()));
                if (clearSearchBtn) {
                    clearSearchBtn.addEventListener('click', () => { searchInput.value = ''; filterAllItems(''); searchInput.focus(); });
                }
            }

            // Tab Sections Real-time Filter Search
            const tabSearchInput = document.getElementById('tabSectionSearchInput');
            const tabSearchClear = document.getElementById('tabSectionSearchClear');

            if (tabSearchInput) {
                tabSearchInput.addEventListener('input', (e) => {
                    const query = e.target.value.trim().toLowerCase();
                    if (tabSearchClear) {
                        tabSearchClear.style.display = query.length > 0 ? 'block' : 'none';
                    }

                    ['panel-requirements', 'panel-domain', 'panel-frameworks'].forEach(panelId => {
                        const panel = document.getElementById(panelId);
                        if (!panel) return;
                        const rows = panel.querySelectorAll('table tbody tr, .excel-field-card, .req-card-box');
                        let visibleCount = 0;

                        rows.forEach(row => {
                            if (row.classList.contains('no-search-results-row')) return;
                            const text = row.textContent.toLowerCase();
                            const words = text.split(/\s+/);
                            const isMatch = !query || words.some(w => w.startsWith(query)) || text.includes(query);
                            
                            if (isMatch) {
                                row.style.display = '';
                                visibleCount++;
                            } else {
                                row.style.display = 'none';
                            }
                        });

                        const tbody = panel.querySelector('table tbody');
                        let noMatchRow = panel.querySelector('.no-search-results-row');
                        if (tbody) {
                            if (visibleCount === 0 && rows.length > 0 && query.length > 0) {
                                if (!noMatchRow) {
                                    noMatchRow = document.createElement('tr');
                                    noMatchRow.className = 'no-search-results-row';
                                    const colCount = panel.querySelectorAll('table thead th').length || 5;
                                    noMatchRow.innerHTML = `<td colspan="${colCount}" style="padding: 24px; text-align: center; color: var(--text-muted, #64748b); font-size: 12px; font-weight: 500;">No matching items found for "${e.target.value}".</td>`;
                                    tbody.appendChild(noMatchRow);
                                }
                                noMatchRow.style.display = '';
                            } else if (noMatchRow) {
                                noMatchRow.style.display = 'none';
                            }
                        }
                    });
                });

                if (tabSearchClear) {
                    tabSearchClear.addEventListener('click', () => {
                        tabSearchInput.value = '';
                        tabSearchInput.dispatchEvent(new Event('input'));
                        tabSearchInput.focus();
                    });
                }
            }

            function filterAllItems(query) {
                if (clearSearchBtn) clearSearchBtn.style.display = query ? 'grid' : 'none';

                const dropdownParents = document.querySelectorAll('.main-nav-wrapper .dropdown-parent');
                dropdownParents.forEach(parent => {
                    const cards = parent.querySelectorAll('.dropdown-card');
                    let matchCount = 0;

                    cards.forEach(card => {
                        if (!query) {
                            card.style.display = 'flex';
                            return;
                        }

                        const title = (card.querySelector('.card-title')?.innerText || card.innerText).trim().toLowerCase();
                        const code = (card.querySelector('.card-badge')?.innerText || '').trim().toLowerCase();
                        const sub = (card.querySelector('.card-sub')?.innerText || '').trim().toLowerCase();

                        // Exact title/code match or prefix match from start of title/code
                        const isMatch = (title === query) || (code === query) || (sub === query) ||
                                        title.startsWith(query) || code.startsWith(query);

                        card.style.display = isMatch ? 'flex' : 'none';
                        if (isMatch) {
                            matchCount++;
                        }
                    });

                    if (query && matchCount > 0) {
                        parent.classList.add('search-active');
                    } else {
                        parent.classList.remove('search-active');
                    }
                });

                document.querySelectorAll('#panel-requirements tbody tr, #panel-requirements .req-card-box').forEach(card => {
                    card.style.display = (!query || card.innerText.toLowerCase().includes(query)) ? '' : 'none';
                });
                document.querySelectorAll('.excel-field-card').forEach(card => {
                    card.style.display = (!query || card.innerText.toLowerCase().includes(query)) ? 'flex' : 'none';
                });
            }
        });

        function copyText(text) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => showToast(`Copied "${text}" to clipboard`)).catch(() => fallbackCopy(text));
            } else { fallbackCopy(text); }
        }
        function fallbackCopy(text) {
            const temp = document.createElement('input'); temp.value = text; document.body.appendChild(temp);
            temp.select(); document.execCommand('copy'); document.body.removeChild(temp);
            showToast(`Copied "${text}"`);
        }
        function showToast(message) {
            const toast = document.getElementById('toastMessage');
            const toastText = document.getElementById('toastText');
            if (toast && toastText) {
                toastText.textContent = message; toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 2600);
            }
        }
    </script>
</body>

</html>
HTML;
    }
}