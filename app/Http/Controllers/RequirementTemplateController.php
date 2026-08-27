<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\RequirementTemplate;
use Illuminate\Http\Request;

class RequirementTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store / Replace Requirement Template
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

        RequirementTemplate::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'name' => 'Default Requirement Template',
                'html_content' => $validated['html_content'],
            ]
        );

        return redirect()
            ->route('requirements.index')
            ->with(
                'success',
                'Requirement template saved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Show Requirement
    |--------------------------------------------------------------------------
    */

    public function show($requirement_id)
    {
        $requirement = Requirement::with('control.domain.framework')
            ->where('requirement_id', $requirement_id)
            ->first();

        if (!$requirement) {
            $requirement = Requirement::with('control.domain.framework')
                ->where('id', $requirement_id)
                ->firstOrFail();
        }

        $template = RequirementTemplate::latest('updated_at')->first();

        if (!$template) {
            return redirect()
                ->route('requirements.index')
                ->with(
                    'error',
                    'Requirement template has not been created yet.'
                );
        }

        $html = $template->html_content;

        // Control Info & Links
        $control         = $requirement->control;
        $controlId       = $requirement->control_id;
        $controlName     = $control?->name ?? '';
        $controlCategory = $control?->control_category ?? '';
        $controlSummary  = $control?->control_summary ?? '';
        $controlType     = $control?->control_type ?? '';
        $controlUrl      = $control ? route('controls.show', $control->control_id) : '#';

        $controlBadge = $control ? <<<HTML
        <a href="{$controlUrl}" style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; background: rgba(139,92,246,0.15); border: 1px solid rgba(139,92,246,0.35); border-radius: 20px; color: #a78bfa; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s; letter-spacing: 0.5px;">
            <span>Control: {$controlId}</span>
            <span style="opacity: 0.7; font-size: 10px;">↗</span>
        </a>
HTML : "<span class=\"badge badge-purple\">Control: {$controlId}</span>";

        // Domain Info & Links
        $domain     = $requirement->domain;
        $domainId   = $domain?->domain_id ?? '';
        $domainName = $domain?->name ?? '';
        $domainCode = $domain?->domain_code ?? ($control?->domain_code ?? '');
        $domainUrl  = $domain ? route('domains.show', $domain->slug) : '#';

        $domainBadge = $domain ? <<<HTML
        <a href="{$domainUrl}" style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; background: rgba(16,188,232,0.15); border: 1px solid rgba(16,188,232,0.35); border-radius: 20px; color: #10bce8; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s; letter-spacing: 0.5px;">
            <span>Domain: {$domainCode} ({$domainId})</span>
            <span style="opacity: 0.7; font-size: 10px;">↗</span>
        </a>
HTML : ($domainName ? "<span class=\"badge badge-cyan\">Domain: {$domainName}</span>" : '');

        // Framework Info & Links
        $framework       = $requirement->framework;
        $frameworkId     = $framework?->framework_id ?? '';
        $frameworkName   = $framework?->name ?? ($domain?->related_frameworks ?: 'Universal Control Library');
        $frameworkCode   = $framework?->framework_code ?? 'UCL';
        $frameworkUrl    = $framework ? route('frameworks.show', $framework->slug) : '#';

        $frameworkBadge = $framework ? <<<HTML
        <a href="{$frameworkUrl}" style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; background: rgba(139,92,246,0.15); border: 1px solid rgba(139,92,246,0.35); border-radius: 20px; color: #a78bfa; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s; letter-spacing: 0.5px;">
            <span>Framework: {$frameworkId} ({$frameworkCode})</span>
            <span style="opacity: 0.7; font-size: 10px;">↗</span>
        </a>
HTML : "<span class=\"badge badge-purple\">Framework: {$frameworkName}</span>";

        $placeholders = [
            '{{requirement_id}}'          => $requirement->requirement_id,
            '{{control_id}}'              => $controlId,
            '{{requirement_title}}'       => $requirement->requirement_title,
            '{{requirement}}'             => $requirement->requirement,
            '{{why_requirement_exists}}'  => $requirement->why_requirement_exists,
            '{{implementation_guidance}}' => $requirement->implementation_guidance,
            '{{common_audit_findings}}'   => $requirement->common_audit_findings,
            '{{common_mistakes}}'         => $requirement->common_mistakes,
            '{{best_practices}}'          => $requirement->best_practices,
            '{{business_examples}}'       => $requirement->business_examples,
            '{{typical_owner}}'           => $requirement->typical_owner,
            '{{control_name}}'            => $controlName,
            '{{control_category}}'        => $controlCategory,
            '{{control_summary}}'         => $controlSummary,
            '{{control_type}}'            => $controlType,
            '{{control_url}}'             => $controlUrl,
            '{{control_badge}}'           => $controlBadge,
            '{{control_id_badge}}'        => $controlBadge,
            '{{domain_id}}'               => $domainId,
            '{{domain_name}}'             => $domainName,
            '{{domain_code}}'             => $domainCode,
            '{{domain_url}}'              => $domainUrl,
            '{{domain_badge}}'            => $domainBadge,
            '{{domain_id_badge}}'         => $domainBadge,
            '{{framework_id}}'            => $frameworkId,
            '{{framework_name}}'          => $frameworkName,
            '{{framework_code}}'          => $frameworkCode,
            '{{framework_url}}'           => $frameworkUrl,
            '{{framework_badge}}'         => $frameworkBadge,
            '{{framework_id_badge}}'      => $frameworkBadge,
        ];

        foreach ($placeholders as $placeholder => $value) {
            $html = str_ireplace($placeholder, (string) ($value ?? ''), $html);
        }

        return response($html);
    }
}