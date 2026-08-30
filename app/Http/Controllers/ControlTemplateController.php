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
            '{{requirement_count}}'         => $requirementsCount,
            '{{total_requirements}}'        => $requirementsCount,
            '{{requirementsCount}}'         => $requirementsCount,
            '{{count_requirements}}'        => $requirementsCount,
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
                <td style="padding: 12px 14px; font-weight: 700; color: #10bce8; white-space: nowrap !important; word-break: keep-all !important; hyphens: none !important; min-width: 160px;">
                    <a href="{$reqUrl}" style="color: #10bce8; text-decoration: none; font-family: 'JetBrains Mono', monospace; white-space: nowrap !important;">{$rid}</a>
                </td>
                <td style="padding: 12px 14px; color: #f8fafc; font-weight: 600;">{$title}</td>
                <td style="padding: 12px 14px; color: #94a3b8; font-size: 12px;">{$statement}</td>
                <td style="padding: 12px 14px; color: #cbd5e1;">{$owner}</td>
                <td style="padding: 12px 14px; text-align: right; white-space: nowrap !important; min-width: 110px;">
                    <a href="{$reqUrl}" style="display: inline-flex; align-items: center; justify-content: center; gap: 6px; padding: 5px 12px; background: rgba(16,188,232,0.12); border: 1px solid rgba(16,188,232,0.3); border-radius: 6px; color: #10bce8; font-size: 12px; font-weight: 700; text-decoration: none; white-space: nowrap !important; word-break: keep-all !important;">View →</a>
                </td>
            </tr>
HTML;
        }

        return <<<HTML
        <div style="overflow-x: auto; margin-top: 8px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.08); color: #64748b; text-transform: uppercase; font-size: 11px; letter-spacing: 0.5px;">
                        <th style="padding: 10px 14px; white-space: nowrap !important; min-width: 160px;">Requirement ID</th>
                        <th style="padding: 10px 14px;">Title</th>
                        <th style="padding: 10px 14px;">Statement</th>
                        <th style="padding: 10px 14px;">Typical Owner</th>
                        <th style="padding: 10px 14px; text-align: right; white-space: nowrap !important; min-width: 110px;">Action</th>
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

    private function getDefaultTemplateHtml(): string
    {
        return <<<'HTML'
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{control_name}} ({{control_id}}) | ASPIA Unified Control Library</title>
    <meta name="description" content="Detailed compliance specifications, summary, objectives, risks, benefits, associated frameworks, domains, and enforcement requirements for {{control_name}} ({{control_id}}).">
    <meta name="keywords" content="{{control_id}}, {{control_name}}, {{control_category}}, {{control_type}}, {{criticality}}, cybersecurity controls, compliance frameworks, {{domain_name}}, {{domain_code}}, {{framework_name}}, UCL, ASPIA, regulatory audit">
    <meta name="author" content="ASPIA Unified Control Library">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{canonical_url}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{control_id}}: {{control_name}} | ASPIA UCL">
    <meta property="og:description" content="Complete governance, business summary, objectives, risk mitigations, and compliance requirements for {{control_name}} ({{control_id}}).">
    <meta property="og:url" content="{{canonical_url}}">
    <meta property="og:site_name" content="ASPIA Unified Control Library">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{control_id}}: {{control_name}} | ASPIA UCL">
    <meta name="twitter:description" content="Cybersecurity control specifications, summary, associated frameworks, and auditable requirements for {{control_id}}.">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "DefinedTerm",
                "name": "{{control_name}}",
                "termCode": "{{control_id}}",
                "description": "{{business_description}}",
                "inDefinedTermSet": {
                    "@type": "DefinedTermSet",
                    "name": "{{framework_name}}",
                    "url": "{{framework_url}}"
                },
                "alternateName": "{{control_category}}",
                "url": "{{canonical_url}}"
            }
        ]
    }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --bg-card: #ffffff;
            --bg-card-hover: #f1f5f9;
            --border-color: #e2e8f0;
            --border-subtle: #f1f5f9;
            --accent-cyan: #0284c7;
            --accent-cyan-glow: rgba(2, 132, 199, 0.08);
            --accent-cyan-border: rgba(2, 132, 199, 0.22);
            --accent-purple: #6366f1;
            --accent-purple-glow: rgba(99, 102, 241, 0.08);
            --accent-purple-border: rgba(99, 102, 241, 0.22);
            --accent-emerald: #0d9488;
            --accent-emerald-glow: rgba(13, 148, 136, 0.08);
            --accent-emerald-border: rgba(13, 148, 136, 0.25);
            --accent-amber: #d97706;
            --accent-amber-glow: rgba(217, 119, 6, 0.08);
            --accent-amber-border: rgba(217, 119, 6, 0.25);
            --accent-rose: #e11d48;
            --accent-rose-glow: rgba(225, 29, 72, 0.08);
            --accent-rose-border: rgba(225, 29, 72, 0.25);
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
            --bg-primary: #090e1a;
            --bg-secondary: #111a2e;
            --bg-card: #15223c;
            --bg-card-hover: #1b2d50;
            --border-color: #1e355b;
            --border-subtle: rgba(255, 255, 255, 0.06);
            --accent-cyan: #22d3ee;
            --accent-cyan-glow: rgba(34, 211, 238, 0.18);
            --accent-cyan-border: rgba(34, 211, 238, 0.35);
            --accent-purple: #c084fc;
            --accent-purple-glow: rgba(192, 132, 252, 0.18);
            --accent-purple-border: rgba(192, 132, 252, 0.35);
            --accent-emerald: #34d399;
            --accent-emerald-glow: rgba(52, 211, 153, 0.18);
            --accent-emerald-border: rgba(52, 211, 153, 0.35);
            --accent-amber: #fbbf24;
            --accent-amber-glow: rgba(251, 191, 36, 0.18);
            --accent-amber-border: rgba(251, 191, 36, 0.35);
            --accent-rose: #fb7185;
            --accent-rose-glow: rgba(251, 113, 133, 0.18);
            --accent-rose-border: rgba(251, 113, 133, 0.35);
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --text-muted: #94a3b8;
            --shadow-card: 0 12px 35px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.06);
            --shadow-float: 0 20px 45px rgba(0, 0, 0, 0.6);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            padding: 24px 36px 60px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
            white-space: nowrap !important;
            word-break: keep-all !important;
            hyphens: none !important;
        }

        .top-toolbar {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 22px;
            gap: 16px;
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
            user-select: none;
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
        }

        .theme-toggle-switch input { opacity: 0; width: 0; height: 0; position: absolute; }
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
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
        }

        .theme-toggle-switch input:checked + .slider-track { background-color: var(--accent-cyan); }
        .theme-toggle-switch input:checked + .slider-track .slider-thumb { transform: translateX(20px); }

        .hero-card {
            position: relative;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-xl);
            padding: 34px 38px 28px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-card);
            overflow: hidden;
            transition: var(--transition);
        }

        .hero-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-cyan), var(--accent-purple), var(--accent-emerald), var(--accent-amber));
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        .tags-row { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-bottom: 16px; }
        .badge-chip {
            display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px;
            border-radius: var(--radius-full); font-size: 12px; font-weight: 700;
            letter-spacing: 0.3px; transition: var(--transition); text-decoration: none;
            white-space: nowrap !important; word-break: keep-all !important; flex-shrink: 0;
        }

        .chip-cyan { background: var(--accent-cyan-glow); color: var(--accent-cyan); border: 1px solid var(--accent-cyan-border); }
        .chip-purple { background: var(--accent-purple-glow); color: var(--accent-purple); border: 1px solid var(--accent-purple-border); }
        .chip-emerald { background: var(--accent-emerald-glow); color: var(--accent-emerald); border: 1px solid var(--accent-emerald-border); }
        .chip-amber { background: var(--accent-amber-glow); color: var(--accent-amber); border: 1px solid var(--accent-amber-border); }
        .chip-rose { background: var(--accent-rose-glow); color: var(--accent-rose); border: 1px solid var(--accent-rose-border); }

        .pulse-beacon {
            width: 8px; height: 8px; border-radius: 50%; background: var(--accent-emerald);
            box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.7); animation: pulseGlow 2s infinite;
        }

        @keyframes pulseGlow {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.7); }
            70% { transform: scale(1.1); box-shadow: 0 0 0 7px rgba(13, 148, 136, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(13, 148, 136, 0); }
        }

        .control-h1 { font-size: 32px; font-weight: 800; color: var(--text-primary); letter-spacing: -0.6px; line-height: 1.2; margin-bottom: 12px; }
        .control-summary-text { font-size: 15.5px; color: var(--text-secondary); max-width: 1050px; line-height: 1.7; margin-bottom: 22px; }

        .meta-cards-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
            gap: 12px; padding-top: 22px; border-top: 1px solid var(--border-subtle);
        }

        .meta-card {
            display: flex; align-items: center; gap: 12px; background: var(--bg-primary);
            border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 12px 16px; transition: var(--transition);
        }

        .meta-icon-box {
            width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center;
            font-size: 16px; background: var(--bg-secondary); border: 1px solid var(--border-color); flex-shrink: 0;
        }

        .meta-info-col { display: flex; flex-direction: column; gap: 2px; min-width: 0; }
        .meta-caption { font-size: 10.5px; text-transform: uppercase; letter-spacing: 0.7px; color: var(--text-muted); font-weight: 800; }
        .meta-val { font-size: 13.5px; font-weight: 700; color: var(--text-primary); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px; margin-bottom: 24px; }
        .stat-card {
            background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg);
            padding: 22px 24px; display: flex; align-items: center; justify-content: space-between;
            transition: var(--transition); cursor: pointer; box-shadow: var(--shadow-card);
        }

        .stat-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-float); }
        .stat-label { font-size: 11px; color: var(--text-muted); text-transform: uppercase; font-weight: 800; letter-spacing: 0.6px; }
        .stat-value { font-size: 32px; font-weight: 800; color: var(--text-primary); font-family: 'JetBrains Mono', monospace; line-height: 1; white-space: nowrap; }
        .stat-icon-bubble { width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 22px; flex-shrink: 0; }

        .content-panel { background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-card); }
        .tabs-header {
            display: flex; align-items: center; justify-content: space-between; background: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color); padding: 12px 24px; flex-wrap: wrap; gap: 16px;
        }

        .tabs-nav { display: flex; background: var(--bg-primary); padding: 4px; border-radius: var(--radius-full); border: 1px solid var(--border-color); gap: 4px; flex-wrap: wrap; }
        .tab-btn {
            background: transparent; border: none; outline: none; padding: 9px 18px; border-radius: var(--radius-full);
            color: var(--text-muted); font-size: 13px; font-weight: 700; cursor: pointer; transition: var(--transition);
            display: flex; align-items: center; gap: 8px; white-space: nowrap;
        }

        .tab-btn.active { background: var(--bg-card); color: var(--accent-cyan); box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); border: 1px solid var(--border-color); }
        .tab-counter { font-size: 11px; font-family: 'JetBrains Mono', monospace; padding: 2px 8px; border-radius: var(--radius-full); background: var(--accent-cyan-glow); color: var(--accent-cyan); font-weight: 800; white-space: nowrap; }

        .tab-search-wrapper { position: relative; display: flex; align-items: center; }
        .tab-search-icon { position: absolute; left: 14px; font-size: 13px; color: var(--text-muted); pointer-events: none; }
        .tab-search-input {
            padding: 9px 16px 9px 36px; background: var(--bg-primary); border: 1px solid var(--border-color);
            border-radius: var(--radius-full); font-size: 13px; color: var(--text-primary); outline: none; width: 240px; transition: var(--transition);
        }

        .tab-content { display: none; padding: 32px; animation: fadeInTab 0.3s ease; }
        .tab-content.active { display: block; }
        @keyframes fadeInTab { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: translateY(0); } }

        .section-box { margin-bottom: 28px; }
        .section-header-title { font-size: 18px; font-weight: 800; color: var(--text-primary); display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }

        .callout-block { background: var(--bg-primary); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 22px 24px; margin-bottom: 24px; }
        .callout-block.accent-cyan { border-left: 4px solid var(--accent-cyan); }
        .callout-block.accent-purple { border-left: 4px solid var(--accent-purple); }
        .callout-title { font-size: 14px; text-transform: uppercase; letter-spacing: 0.6px; font-weight: 800; margin-bottom: 8px; display: flex; align-items: center; gap: 8px; }
        .callout-text { font-size: 14.5px; color: var(--text-secondary); line-height: 1.7; }

        .details-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px; margin-top: 16px; }
        .narrative-card { background: var(--bg-primary); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 24px; position: relative; transition: var(--transition); }
        .narrative-card.objective-border { border-left: 4px solid var(--accent-cyan); }
        .narrative-card.benefits-border { border-left: 4px solid var(--accent-emerald); }
        .narrative-card.risks-border { border-left: 4px solid var(--accent-rose); }
        .narrative-card.domain-border { border-left: 4px solid var(--accent-purple); }
        .narrative-card.framework-border { border-left: 4px solid var(--accent-cyan); }
        .narrative-title { font-size: 15px; font-weight: 700; margin-bottom: 10px; display: flex; align-items: center; gap: 8px; }
        .narrative-text { font-size: 14px; color: var(--text-secondary); line-height: 1.7; }

        .table-responsive, div[style*="overflow-x: auto"] { overflow-x: auto !important; border-radius: var(--radius-md); border: 1px solid var(--border-color); margin-top: 14px; }
        table { width: 100% !important; border-collapse: collapse !important; font-size: 13.5px !important; text-align: left !important; }
        table th { background: var(--bg-secondary) !important; padding: 14px 18px !important; color: var(--text-muted) !important; text-transform: uppercase !important; font-size: 11px !important; letter-spacing: 0.6px !important; font-weight: 800 !important; border-bottom: 1px solid var(--border-color) !important; white-space: nowrap !important; }
        table td { padding: 14px 18px !important; border-bottom: 1px solid var(--border-color) !important; color: var(--text-secondary) !important; vertical-align: middle !important; }
        table tr:last-child td { border-bottom: none !important; }
        table tr:hover td { background: var(--bg-card-hover) !important; }
        table th:first-child, table td:first-child, table td:first-child a { white-space: nowrap !important; word-break: keep-all !important; hyphens: none !important; min-width: 160px !important; font-family: 'JetBrains Mono', monospace; font-weight: 700; }
        table th:last-child, table td:last-child { white-space: nowrap !important; min-width: 110px !important; text-align: right !important; }
        table td:last-child a, table a[style*="inline-flex"], table a[style*="display: inline-flex"], .btn-action { white-space: nowrap !important; word-break: keep-all !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; gap: 6px !important; flex-shrink: 0 !important; }
        .footer-note { text-align: center; margin-top: 40px; font-size: 12.5px; color: var(--text-muted); }

        @media (max-width: 900px) {
            body { padding: 18px 20px 40px; }
            .hero-card { padding: 24px; }
            .control-h1 { font-size: 26px; }
            .tabs-header { flex-direction: column; align-items: stretch; }
            .tab-search-input { width: 100%; }
        }
    </style>
</head>
<body>
    <header class="top-toolbar">
        <div class="theme-switch-container" title="Toggle Light / Dark mode">
            <span class="theme-switch-label" id="themeSwitchText">Light</span>
            <label class="theme-toggle-switch" for="themeSliderCheckbox">
                <input type="checkbox" id="themeSliderCheckbox" onchange="toggleTheme(this.checked)" aria-label="Toggle Theme Mode">
                <span class="slider-track"><span class="slider-thumb">☀️</span></span>
            </label>
        </div>
    </header>

    <article class="hero-card">
        <div class="tags-row">
            <span class="badge-chip chip-cyan font-mono" id="controlIdBadge">◉ {{control_id}}</span>
            <span class="badge-chip chip-purple">Category: {{control_category}}</span>
            <span class="badge-chip chip-emerald">Type: {{control_type}}</span>
            <span class="badge-chip chip-amber">Criticality: {{criticality}}</span>
            <span class="badge-chip chip-cyan font-mono">v{{version}}</span>
            <span class="badge-chip chip-emerald" style="margin-left: auto;">
                <span class="pulse-beacon"></span>
                <span>{{status}}</span>
            </span>
        </div>

        <h1 class="control-h1">{{control_name}}</h1>
        <p class="control-summary-text">{{business_description}}</p>

        <div class="meta-cards-grid">
            <div class="meta-card">
                <div class="meta-icon-box" style="color: var(--accent-purple);">◈</div>
                <div class="meta-info-col">
                    <span class="meta-caption">Associated Domain</span>
                    <span class="meta-val">
                        <a href="{{domain_url}}" style="color: var(--accent-purple); text-decoration: none; white-space: nowrap;">{{domain_name}} ({{domain_code}})</a>
                    </span>
                </div>
            </div>
            <div class="meta-card">
                <div class="meta-icon-box" style="color: var(--accent-emerald);">👤</div>
                <div class="meta-info-col">
                    <span class="meta-caption">Business Owner</span>
                    <span class="meta-val">{{business_owner}}</span>
                </div>
            </div>
            <div class="meta-card">
                <div class="meta-icon-box" style="color: var(--accent-amber);">👥</div>
                <div class="meta-info-col">
                    <span class="meta-caption">Stakeholders</span>
                    <span class="meta-val">{{primary_stakeholders}}</span>
                </div>
            </div>
            <div class="meta-card">
                <div class="meta-icon-box" style="color: var(--accent-rose);">🏢</div>
                <div class="meta-info-col">
                    <span class="meta-caption">Applicable Industries</span>
                    <span class="meta-val">{{applicable_industries}}</span>
                </div>
            </div>
        </div>
    </article>

    <section class="stats-grid" aria-label="Key Control Statistics">
        <div class="stat-card stat-card-emerald" onclick="switchTab('requirements-tab')">
            <div class="stat-content">
                <span class="stat-label">Total Requirements</span>
                <span class="stat-value" style="color: var(--accent-emerald);">{{requirements_count}}</span>
            </div>
            <div class="stat-icon-bubble chip-emerald">◆</div>
        </div>
        <div class="stat-card stat-card-amber">
            <div class="stat-content">
                <span class="stat-label">Criticality Level</span>
                <span class="stat-value" style="color: var(--accent-amber); font-size: 24px;">{{criticality}}</span>
            </div>
            <div class="stat-icon-bubble chip-amber">⚡</div>
        </div>
        <div class="stat-card stat-card-cyan">
            <div class="stat-content">
                <span class="stat-label">Control Type</span>
                <span class="stat-value" style="color: var(--accent-cyan); font-size: 24px;">{{control_type}}</span>
            </div>
            <div class="stat-icon-bubble chip-cyan">🛡️</div>
        </div>
        <div class="stat-card stat-card-purple" onclick="switchTab('domain-tab')">
            <div class="stat-content">
                <span class="stat-label">Domain Code</span>
                <span class="stat-value" style="color: var(--accent-purple); font-size: 24px;">{{domain_code}}</span>
            </div>
            <div class="stat-icon-bubble chip-purple">◈</div>
        </div>
    </section>

    <main class="content-panel">
        <div class="tabs-header">
            <nav class="tabs-nav" role="tablist">
                <button class="tab-btn active" id="btn-requirements-tab" onclick="switchTab('requirements-tab')" role="tab" aria-selected="true">
                    <span>◆ Associated Requirements</span>
                    <span class="tab-counter">{{requirements_count}}</span>
                </button>
                <button class="tab-btn" id="btn-details-tab" onclick="switchTab('details-tab')" role="tab" aria-selected="false">
                    <span>📋 Control Details</span>
                </button>
                <button class="tab-btn" id="btn-domain-tab" onclick="switchTab('domain-tab')" role="tab" aria-selected="false">
                    <span>◈ Associated Domain</span>
                </button>
                <button class="tab-btn" id="btn-framework-tab" onclick="switchTab('framework-tab')" role="tab" aria-selected="false">
                    <span>◇ Associated Frameworks</span>
                </button>
            </nav>

            <div class="tab-search-wrapper">
                <span class="tab-search-icon">🔍</span>
                <input type="text" id="liveSearchInput" class="tab-search-input" placeholder="Quick filter contents..." oninput="handleLiveSearch(this.value)" aria-label="Search within active tab">
            </div>
        </div>

        <section class="tab-content active" id="requirements-tab" role="tabpanel">
            <div class="section-box">
                <h2 class="section-header-title">
                    <span style="color: var(--accent-emerald);">◆</span> Associated Enforcement Requirements ({{requirements_count}})
                </h2>
                <p style="color: var(--text-muted); font-size: 13.5px; margin-bottom: 16px;">
                    Auditable requirements mapped directly to this control. Click any requirement ID in the table to view its full statement and implementation guidance.
                </p>
                {{requirements_table}}
            </div>
        </section>

        <section class="tab-content" id="details-tab" role="tabpanel">
            <div class="section-box">
                <h2 class="section-header-title">
                    <span style="color: var(--accent-cyan);">📑</span> Control Executive Summary & Description
                </h2>
                <div class="callout-block accent-cyan">
                    <h3 class="callout-title" style="color: var(--accent-cyan);"><span>📌</span> Control Summary</h3>
                    <p class="callout-text">{{control_summary}}</p>
                </div>
                <div class="callout-block accent-purple">
                    <h3 class="callout-title" style="color: var(--accent-purple);"><span>📝</span> Business Description</h3>
                    <p class="callout-text">{{business_description}}</p>
                </div>
            </div>

            <div class="section-box" style="margin-top: 36px;">
                <h2 class="section-header-title">
                    <span style="color: var(--accent-emerald);">🎯</span> Business Objectives & Risk Analysis
                </h2>
                <div class="details-grid">
                    <div class="narrative-card objective-border">
                        <h3 class="narrative-title" style="color: var(--accent-cyan);"><span>🎯</span> Business Objective</h3>
                        <p class="narrative-text">{{business_objective}}</p>
                    </div>
                    <div class="narrative-card benefits-border">
                        <h3 class="narrative-title" style="color: var(--accent-emerald);"><span>🛡️</span> Business Benefits</h3>
                        <p class="narrative-text">{{business_benefits}}</p>
                    </div>
                    <div class="narrative-card risks-border">
                        <h3 class="narrative-title" style="color: var(--accent-rose);"><span>⚠️</span> Business Risks if Missing</h3>
                        <p class="narrative-text">{{business_risks_if_missing}}</p>
                    </div>
                </div>
            </div>

            <div class="section-box" style="margin-top: 36px;">
                <h2 class="section-header-title">
                    <span style="color: var(--accent-purple);">📊</span> Full Control Record Specifications (Excel Master)
                </h2>
                <div class="table-responsive">
                    <table>
                        <tbody>
                            <tr><th style="width: 260px;">1. Control ID</th><td><strong class="font-mono" style="color: var(--accent-cyan); font-size: 14px;">{{control_id}}</strong></td></tr>
                            <tr><th>2. Domain Code</th><td><strong class="font-mono" style="color: var(--accent-purple);">{{domain_code}}</strong></td></tr>
                            <tr><th>3. Control Name</th><td><strong>{{control_name}}</strong></td></tr>
                            <tr><th>4. Control Category</th><td><span class="badge-chip chip-purple">{{control_category}}</span></td></tr>
                            <tr><th>5. Control Type</th><td><span class="badge-chip chip-emerald">{{control_type}}</span></td></tr>
                            <tr><th>6. Criticality</th><td><span class="badge-chip chip-amber">{{criticality}}</span></td></tr>
                            <tr><th>7. Status</th><td><span class="badge-chip chip-emerald">{{status}}</span></td></tr>
                            <tr><th>8. Version</th><td class="font-mono">{{version}}</td></tr>
                            <tr><th>9. Business Owner</th><td>{{business_owner}}</td></tr>
                            <tr><th>10. Primary Stakeholders</th><td>{{primary_stakeholders}}</td></tr>
                            <tr><th>11. Applicable Industries</th><td>{{applicable_industries}}</td></tr>
                            <tr><th>12. Applicable Technologies</th><td>{{applicable_technologies}}</td></tr>
                            <tr><th>13. Parent Domain</th><td><a href="{{domain_url}}" style="color: var(--accent-purple); font-weight: 700; text-decoration: none;">{{domain_name}} ({{domain_code}}) ↗</a></td></tr>
                            <tr><th>14. Parent Framework</th><td><a href="{{framework_url}}" style="color: var(--accent-cyan); font-weight: 700; text-decoration: none;">{{framework_name}} ({{framework_family}}) ↗</a></td></tr>
                            <tr><th>15. Total Mapped Requirements</th><td><strong style="color: var(--accent-emerald);">{{requirements_count}} auditable requirements</strong></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="tab-content" id="domain-tab" role="tabpanel">
            <div class="section-box">
                <h2 class="section-header-title">
                    <span style="color: var(--accent-purple);">◈</span> Parent Domain Specifications
                </h2>
                <div class="details-grid" style="margin-bottom: 24px;">
                    <div class="narrative-card domain-border">
                        <h3 class="narrative-title" style="color: var(--accent-purple);"><span>🎯</span> Domain Purpose</h3>
                        <p class="narrative-text">{{domain_purpose}}</p>
                    </div>
                    <div class="narrative-card domain-border">
                        <h3 class="narrative-title" style="color: var(--accent-purple);"><span>📐</span> Domain Scope</h3>
                        <p class="narrative-text">{{domain_scope}}</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table>
                        <tbody>
                            <tr><th style="width: 240px;">Domain Name</th><td><strong style="color: var(--accent-purple); font-size: 15px;">{{domain_name}}</strong></td></tr>
                            <tr><th>Domain Code</th><td><span class="badge-chip chip-purple font-mono">{{domain_code}}</span></td></tr>
                            <tr><th>Domain ID</th><td class="font-mono">{{domain_id}}</td></tr>
                            <tr>
                                <th>Domain Profile</th>
                                <td>
                                    <a href="{{domain_url}}" style="display: inline-flex; align-items: center; gap: 6px; padding: 7px 16px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--radius-full); color: var(--accent-purple); font-size: 13px; font-weight: 700; text-decoration: none;">
                                        <span>View Full Domain ({{domain_code}})</span>
                                        <span>↗</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="tab-content" id="framework-tab" role="tabpanel">
            <div class="section-box">
                <h2 class="section-header-title">
                    <span style="color: var(--accent-cyan);">◇</span> Parent Framework Information
                </h2>
                <div class="table-responsive" style="margin-bottom: 28px;">
                    <table>
                        <tbody>
                            <tr><th style="width: 240px;">Framework Name</th><td><strong style="color: var(--accent-cyan); font-size: 15px;">{{framework_name}}</strong></td></tr>
                            <tr><th>Framework Code</th><td><span class="badge-chip chip-cyan font-mono">{{framework_code}}</span></td></tr>
                            <tr><th>Framework Family</th><td>{{framework_family}}</td></tr>
                            <tr><th>Framework ID</th><td class="font-mono">{{framework_id}}</td></tr>
                            <tr>
                                <th>Framework Profile</th>
                                <td>
                                    <a href="{{framework_url}}" style="display: inline-flex; align-items: center; gap: 6px; padding: 7px 16px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--radius-full); color: var(--accent-cyan); font-size: 13px; font-weight: 700; text-decoration: none;">
                                        <span>View Full Framework ({{framework_name}})</span>
                                        <span>↗</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="section-header-title" style="font-size: 16px; margin-top: 24px;">
                    <span>🔗</span> Cross-Framework Compliance Mappings
                </h3>
                <p style="color: var(--text-muted); font-size: 13px; margin-bottom: 12px;">
                    Global regulatory and compliance frameworks directly mapped to this control:
                </p>
                <div style="margin-top: 10px;">
                    {{framework_badge}}
                </div>
            </div>
        </section>
    </main>

    <footer class="footer-note">
        <p>Unified Control Library &copy; 2026 ASPIA. All rights reserved.</p>
    </footer>

    <script>
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
            const thumb = document.querySelector('.slider-thumb');
            if (label) label.textContent = theme === 'dark' ? 'Dark' : 'Light';
            if (thumb) thumb.textContent = theme === 'dark' ? '🌙' : '☀️';
        }

        function toggleTheme(isChecked) {
            applyTheme(isChecked ? 'dark' : 'light');
        }

        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(el => {
                el.classList.remove('active');
                el.setAttribute('aria-hidden', 'true');
            });
            document.querySelectorAll('.tab-btn').forEach(el => {
                el.classList.remove('active');
                el.setAttribute('aria-selected', 'false');
            });

            const targetTab = document.getElementById(tabId);
            const targetBtn = document.getElementById('btn-' + tabId);
            if (targetTab) { targetTab.classList.add('active'); targetTab.setAttribute('aria-hidden', 'false'); }
            if (targetBtn) { targetBtn.classList.add('active'); targetBtn.setAttribute('aria-selected', 'true'); }
        }

        function handleLiveSearch(query) {
            const term = (query || '').toLowerCase().trim();
            const activeTab = document.querySelector('.tab-content.active');
            if (!activeTab) return;

            activeTab.querySelectorAll('tbody tr').forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(term) ? '' : 'none';
            });
            activeTab.querySelectorAll('.narrative-card, .callout-block').forEach(card => {
                card.style.display = card.innerText.toLowerCase().includes(term) ? '' : 'none';
            });
        }

        document.addEventListener('DOMContentLoaded', initTheme);
    </script>
</body>
</html>
HTML;
    }
}