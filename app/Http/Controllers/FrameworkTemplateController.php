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

        if (!$template) {
            if (auth()->check()) {
                return redirect()
                    ->route('frameworks.index')
                    ->with('error', 'Framework template has not been created yet.');
            }

            abort(404, 'Framework template has not been created yet.');
        }

        $html = $template->html_content;

        // Domains
        $domains       = $framework->domains()->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
        $domainsCount  = $domains->count();
        $domainIdChips = $this->renderDomainIdChips($domains);
        $domainsTable  = $this->renderDomainsTable($domains);
        $domainsList   = $this->renderDomainsList($domains);

        // Controls
        $controls       = $framework->controls()->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
        $controlsCount  = $controls->count();
        $controlIdChips = $this->renderControlIdChips($controls);

        // Requirements
        $controlIds = $controls->pluck('control_id')->filter();
        $requirements = $controlIds->isNotEmpty()
            ? Requirement::whereIn('control_id', $controlIds)->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get()
            : collect();
        $requirementsCount  = $requirements->count();
        $requirementIdChips = $this->renderRequirementIdChips($requirements);

        $placeholders = [
            '{{framework_id}}'          => $framework->framework_id,
            '{{framework_code}}'        => $framework->framework_code,
            '{{framework_name}}'        => $framework->name,
            '{{slug}}'                  => $framework->slug,
            '{{version}}'               => $framework->version,
            '{{framework_family}}'      => $framework->framework_family,
            '{{category}}'              => $framework->category,
            '{{publisher}}'             => $framework->publisher,
            '{{region}}'                => $framework->region,
            '{{industry}}'              => $framework->industry,
            '{{framework_type}}'        => $framework->framework_type,
            '{{description}}'           => $framework->description,
            '{{domains_count}}'         => $domainsCount,
            '{{domain_id_chips}}'       => $domainIdChips,
            '{{domains_chips}}'         => $domainIdChips,
            '{{domains_table}}'         => $domainsTable,
            '{{domains_list}}'          => $domainsList,
            '{{controls_count}}'        => $controlsCount,
            '{{control_id_chips}}'      => $controlIdChips,
            '{{controls_chips}}'        => $controlIdChips,
            '{{requirements_count}}'    => $requirementsCount,
            '{{requirement_id_chips}}'  => $requirementIdChips,
            '{{requirements_chips}}'    => $requirementIdChips,
        ];

        foreach ($placeholders as $placeholder => $value) {
            $html = str_ireplace($placeholder, (string) ($value ?? ''), $html);
        }

        return response($html);
    }

    protected function renderDomainIdChips($domains): string
    {
        if ($domains->isEmpty()) {
            return '<p style="color: #64748b; font-size: 13px;">No associated domains.</p>';
        }

        $chips = '';
        foreach ($domains as $domain) {
            $domainUrl = route('domains.show', $domain->slug);
            $did       = htmlspecialchars($domain->domain_id);
            $code      = htmlspecialchars($domain->domain_code ?? '');
            $name      = htmlspecialchars($domain->name);
            $label     = $code ? "{$code} ({$did})" : $did;
            $chips .= <<<HTML
            <a href="{$domainUrl}" title="{$name}" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(139,92,246,0.1); border: 1px solid rgba(139,92,246,0.25); border-radius: 8px; color: #a78bfa; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s;">
                <span>{$label}</span>
                <span style="opacity: 0.6; font-size: 10px;">↗</span>
            </a>
HTML;
        }

        return "<div style=\"display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px;\">{$chips}</div>";
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
            <a href="{$reqUrl}" title="{$title}" style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.25); border-radius: 8px; color: #34d399; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s;">
                <span>{$rid}</span>
                <span style="opacity: 0.6; font-size: 10px;">↗</span>
            </a>
HTML;
        }

        return "<div style=\"display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px;\">{$chips}</div>";
    }

    protected function renderDomainsTable($domains): string
    {
        if ($domains->isEmpty()) {
            return '<p style="color: #64748b; font-size: 14px; padding: 12px 0;">No domains associated with this framework yet.</p>';
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
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.04); transition: background 0.2s;">
                <td style="padding: 12px 14px; font-weight: 700; color: #10bce8;">
                    <a href="{$domainUrl}" style="color: #10bce8; text-decoration: none;">{$did}</a>
                </td>
                <td style="padding: 12px 14px; color: #a78bfa; font-weight: 600;">{$code}</td>
                <td style="padding: 12px 14px; color: #f8fafc; font-weight: 600;">{$name}</td>
                <td style="padding: 12px 14px; color: #94a3b8;">{$owner}</td>
                <td style="padding: 12px 14px; color: #10bce8; font-weight: 600;">{$controlsCount}</td>
                <td style="padding: 12px 14px;">
                    <span style="display: inline-block; padding: 2px 8px; border-radius: 12px; font-size: 11px; font-weight: 700; background: rgba(16,185,129,0.15); color: #34d399; border: 1px solid rgba(16,185,129,0.3);">{$status}</span>
                </td>
                <td style="padding: 12px 14px; text-align: right;">
                    <a href="{$domainUrl}" style="display: inline-flex; align-items: center; padding: 4px 10px; background: rgba(16,188,232,0.1); border: 1px solid rgba(16,188,232,0.3); border-radius: 6px; color: #10bce8; font-size: 12px; font-weight: 600; text-decoration: none;">View →</a>
                </td>
            </tr>
HTML;
        }

        return <<<HTML
        <div style="overflow-x: auto; margin-top: 8px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.08); color: #64748b; text-transform: uppercase; font-size: 11px; letter-spacing: 0.5px;">
                        <th style="padding: 10px 14px;">Domain ID</th>
                        <th style="padding: 10px 14px;">Code</th>
                        <th style="padding: 10px 14px;">Domain Name</th>
                        <th style="padding: 10px 14px;">Business Owner</th>
                        <th style="padding: 10px 14px;">Controls</th>
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

    protected function renderDomainsList($domains): string
    {
        if ($domains->isEmpty()) {
            return '<p style="color: #64748b; font-size: 14px;">No domains found.</p>';
        }

        $items = '';
        foreach ($domains as $domain) {
            $domainUrl = route('domains.show', $domain->slug);
            $did = htmlspecialchars($domain->domain_id);
            $name = htmlspecialchars($domain->name);
            $items .= <<<HTML
            <a href="{$domainUrl}" style="display: inline-flex; align-items: center; gap: 8px; padding: 6px 12px; background: rgba(16,188,232,0.08); border: 1px solid rgba(16,188,232,0.25); border-radius: 8px; color: #f8fafc; text-decoration: none; font-size: 13px; font-weight: 500;">
                <strong style="color: #10bce8;">{$did}</strong>
                <span>{$name}</span>
            </a>
HTML;
        }

        return "<div style=\"display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px;\">{$items}</div>";
    }
}