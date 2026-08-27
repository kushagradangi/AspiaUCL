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

        ControlTemplate::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'name' => 'Default Control Template',
                'html_content' => $validated['html_content'],
            ]
        );

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

        $template = ControlTemplate::first();

        if (!$template) {
            return redirect()
                ->route('controls.index')
                ->with(
                    'error',
                    'Control template has not been created yet.'
                );
        }

        $html = $template->html_content;

        // Domain Info & Links
        $domainId      = $control->domain?->domain_id ?? '';
        $domainName    = $control->domain?->name ?? '';
        $domainCode    = $control->domain_code ?? ($control->domain?->domain_code ?? '');
        $domainPurpose = $control->domain?->purpose ?? '';
        $domainScope   = $control->domain?->scope ?? '';
        $domainUrl     = $control->domain ? route('domains.show', $control->domain->slug) : '#';

        $domainBadge = $control->domain ? <<<HTML
        <a href="{$domainUrl}" style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; background: rgba(139,92,246,0.15); border: 1px solid rgba(139,92,246,0.35); border-radius: 20px; color: #a78bfa; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s; letter-spacing: 0.5px;">
            <span>Domain: {$domainCode} ({$domainId})</span>
            <span style="opacity: 0.7; font-size: 10px;">↗</span>
        </a>
HTML : ($domainCode ? "<span class=\"badge badge-purple\">Domain: {$domainCode}</span>" : '');

        // Framework Info & Links
        $framework       = $control->framework;
        $frameworkId     = $framework?->framework_id ?? '';
        $frameworkCode   = $framework?->framework_code ?? ($control->domain?->domain_code ?: 'UCL');
        $frameworkName   = $framework?->name ?? ($control->domain?->related_frameworks ?: 'Universal Control Library');
        $frameworkFamily = $framework?->framework_family ?? 'UCL';
        $frameworkUrl    = $framework ? route('frameworks.show', $framework->slug) : '#';

        $frameworkBadge = $framework ? <<<HTML
        <a href="{$frameworkUrl}" style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; background: rgba(16,188,232,0.15); border: 1px solid rgba(16,188,232,0.35); border-radius: 20px; color: #10bce8; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s; letter-spacing: 0.5px;">
            <span>Framework: {$frameworkId} ({$frameworkCode})</span>
            <span style="opacity: 0.7; font-size: 10px;">↗</span>
        </a>
HTML : "<span class=\"badge badge-cyan\">Framework: {$frameworkName}</span>";

        // Requirements Info & Chips
        $requirements        = $control->requirements()->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
        $requirementsCount   = $requirements->count();
        $requirementIdChips  = $this->renderRequirementIdChips($requirements);
        $requirementsTable   = $this->renderRequirementsTable($requirements);
        $requirementsList    = $this->renderRequirementsList($requirements);

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
            '{{requirement_id_chips}}'      => $requirementIdChips,
            '{{requirements_chips}}'        => $requirementIdChips,
            '{{requirements_table}}'        => $requirementsTable,
            '{{requirements_list}}'         => $requirementsList,
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

    protected function renderRequirementsTable($requirements): string
    {
        if ($requirements->isEmpty()) {
            return '<p style="color: #64748b; font-size: 14px; padding: 12px 0;">No requirements associated with this control yet.</p>';
        }

        $rows = '';
        foreach ($requirements as $req) {
            $reqUrl    = route('requirements.show', $req->requirement_id);
            $rid       = htmlspecialchars($req->requirement_id);
            $title     = htmlspecialchars($req->requirement_title);
            $statement = htmlspecialchars(\Illuminate\Support\Str::limit($req->requirement, 120));
            $owner     = htmlspecialchars($req->typical_owner ?? '-');

            $rows .= <<<HTML
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.04); transition: background 0.2s;">
                <td style="padding: 12px 14px; font-weight: 700; color: #10bce8;">
                    <a href="{$reqUrl}" style="color: #10bce8; text-decoration: none;">{$rid}</a>
                </td>
                <td style="padding: 12px 14px; color: #f8fafc; font-weight: 600;">{$title}</td>
                <td style="padding: 12px 14px; color: #94a3b8; font-size: 12px;">{$statement}</td>
                <td style="padding: 12px 14px; color: #cbd5e1;">{$owner}</td>
                <td style="padding: 12px 14px; text-align: right;">
                    <a href="{$reqUrl}" style="display: inline-flex; align-items: center; padding: 4px 10px; background: rgba(16,188,232,0.1); border: 1px solid rgba(16,188,232,0.3); border-radius: 6px; color: #10bce8; font-size: 12px; font-weight: 600; text-decoration: none;">View →</a>
                </td>
            </tr>
HTML;
        }

        return <<<HTML
        <div style="overflow-x: auto; margin-top: 8px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.08); color: #64748b; text-transform: uppercase; font-size: 11px; letter-spacing: 0.5px;">
                        <th style="padding: 10px 14px;">Requirement ID</th>
                        <th style="padding: 10px 14px;">Title</th>
                        <th style="padding: 10px 14px;">Statement</th>
                        <th style="padding: 10px 14px;">Typical Owner</th>
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
}