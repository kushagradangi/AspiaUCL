<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Control;
use App\Models\Domain;
use App\Models\Requirement;
use App\Models\RequirementFrameworkMapping;

$domainsForControls = Domain::orderBy('id', 'asc')->get();

foreach ($domainsForControls as $domain) {
    $c = Control::with(['domain.frameworks'])
        ->where(function($q) use ($domain) {
            $q->where('domain_id', $domain->id);
            if ($domain->domain_code || $domain->domain_id) {
                $q->orWhere('domain_code', $domain->domain_code ?: $domain->domain_id);
            }
        })
        ->orderBy('display_order', 'asc')
        ->first();

    if ($c) {
        $tags = collect();
        if ($c->domain && $c->domain->frameworks->count() > 0) {
            foreach ($c->domain->frameworks as $fw) {
                $tags->push($fw->short_name ?: $fw->name);
            }
        }
        
        $shortNameMap = [
            'General Data Protection Regulation (GDPR)' => 'GDPR',
            'Health Insurance Portability and Accountability Act' => 'HIPAA',
            'Digital Operational Resilience Act' => 'DORA',
            'Payment Card Industry Data Security Standard' => 'PCI DSS',
            'ISO/IEC 27001' => 'ISO 27001',
            'NIST Cybersecurity Framework' => 'NIST CSF',
            'Control Objectives for Information and Related Technologies' => 'COBIT',
        ];
        
        $formatted = $tags->map(fn($t) => $shortNameMap[$t] ?? $t)->unique()->values();
        
        echo "Control: {$c->control_id} ({$c->name})\n";
        echo "  DB Frameworks: " . ($formatted->implode(', ') ?: 'None (Will use ISO 27001, NIST CSF fallback)') . "\n";
    }
}
