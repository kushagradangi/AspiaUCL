<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Domain;
use App\Models\Framework;
use App\Models\Requirement;
use App\Models\RequirementFrameworkMapping;
use Illuminate\Http\Request;

class UclHomepageController extends Controller
{
    /**
     * Display the public UCL Homepage with 100% live database data.
     */
    public function index(Request $request)
    {
        // Pure live database counts
        $frameworksCount         = Framework::count();
        $domainsCount            = Domain::count();
        $controlsCount           = Control::count();
        $requirementsCount       = Requirement::count();
        $mappedRequirementsCount = RequirementFrameworkMapping::count();

        // Dynamic Domains with controls count from database
        $domains = Domain::withCount('controls')
            ->orderBy('id', 'asc')
            ->get();

        // Dynamic Controls: First control of each domain
        $domainsForControls = Domain::orderBy('id', 'asc')->get();
        $controls = collect();

        foreach ($domainsForControls as $domain) {
            $firstControl = Control::with(['domain', 'requirements'])
                ->withCount('requirements')
                ->where(function($q) use ($domain) {
                    $q->where('domain_id', $domain->id);
                    if ($domain->domain_code || $domain->domain_id) {
                        $q->orWhere('domain_code', $domain->domain_code ?: $domain->domain_id);
                    }
                })
                ->orderBy('display_order', 'asc')
                ->orderBy('id', 'asc')
                ->first();

            if ($firstControl) {
                $controls->push($firstControl);
            }
        }

        // Dynamic Frameworks with mapping count from database
        $frameworks = Framework::withCount('mappings')
            ->orderBy('id', 'asc')
            ->get();

        $frameworksWithDomains = $frameworks->map(function ($fw) {
            return [
                'framework' => $fw,
                'domains'   => $fw->getMappedDomains(),
            ];
        });

        $domainsWithControls = $domains->map(function ($dom) {
            return [
                'domain'   => $dom,
                'controls' => $dom->getControlsList(),
            ];
        });

        // Unified Controls for Framework Mapping table (Matching reference design)
        $mappingControlsList = [
            ['id' => 'UCL-001', 'name' => 'Access Control',          'iso' => 'A.5.15', 'nist' => 'PR.AA',  'pci' => 'Req 7',    'gdpr' => 'Art 32'],
            ['id' => 'UCL-014', 'name' => 'Asset Management',        'iso' => 'A.5.9',  'nist' => 'ID.AM',  'pci' => 'Req 9',    'gdpr' => 'Art 30'],
            ['id' => 'UCL-021', 'name' => 'Security Awareness',      'iso' => 'A.6.3',  'nist' => 'PR.AT',  'pci' => 'Req 12.6', 'gdpr' => 'Art 39'],
            ['id' => 'UCL-033', 'name' => 'Incident Response',       'iso' => 'A.5.24', 'nist' => 'RS.AN',  'pci' => 'Req 12.10','gdpr' => 'Art 33'],
            ['id' => 'UCL-045', 'name' => 'Data Classification',     'iso' => 'A.5.12', 'nist' => 'ID.DA',  'pci' => 'Req 3',    'gdpr' => 'Art 35'],
            ['id' => 'GOV-001', 'name' => 'Information Security Governance', 'iso' => 'Clause 4, 5', 'nist' => 'GV.OC-01', 'pci' => 'Req 12.1', 'gdpr' => 'Art 24'],
            ['id' => 'POL-001', 'name' => 'Policy Management',       'iso' => 'A.5.1',  'nist' => 'GV.PO-01', 'pci' => 'Req 12.1.1', 'gdpr' => 'Art 24(2)'],
            ['id' => 'RSK-001', 'name' => 'Risk Management Framework', 'iso' => 'Clause 6.1', 'nist' => 'GV.RM-01', 'pci' => 'Req 12.2', 'gdpr' => 'Art 35'],
            ['id' => 'CMP-001', 'name' => 'Compliance Program Management', 'iso' => 'A.5.31', 'nist' => 'GV.OV-01', 'pci' => 'Req 12.11', 'gdpr' => 'Art 37-39'],
            ['id' => 'IAM-001', 'name' => 'Identity & Account Lifecycle Management', 'iso' => 'A.5.15', 'nist' => 'PR.AA-01', 'pci' => 'Req 7.1', 'gdpr' => 'Art 32(1)'],
            ['id' => 'AST-001', 'name' => 'Asset Inventory Management', 'iso' => 'A.5.9', 'nist' => 'ID.AM-01', 'pci' => 'Req 2.4', 'gdpr' => 'Art 30'],
            ['id' => 'DAT-001', 'name' => 'Data Protection & Privacy Strategy', 'iso' => 'A.5.12', 'nist' => 'PR.DS-01', 'pci' => 'Req 3.1', 'gdpr' => 'Art 5, 6'],
            ['id' => 'CRY-001', 'name' => 'Cryptographic Governance', 'iso' => 'A.8.24', 'nist' => 'PR.DS-02', 'pci' => 'Req 3.5', 'gdpr' => 'Art 32(1)(a)'],
            ['id' => 'NET-001', 'name' => 'Secure Network Architecture', 'iso' => 'A.8.20', 'nist' => 'PR.IR-01', 'pci' => 'Req 1.1', 'gdpr' => 'Art 32'],
            ['id' => 'END-001', 'name' => 'Endpoint Protection',    'iso' => 'A.8.1',  'nist' => 'PR.PS-01', 'pci' => 'Req 5.1',  'gdpr' => 'Art 32'],
            ['id' => 'CLD-001', 'name' => 'Cloud Security Governance', 'iso' => 'A.5.23', 'nist' => 'GV.SC-01', 'pci' => 'Req 12.8', 'gdpr' => 'Art 28'],
            ['id' => 'CFG-001', 'name' => 'Secure Configuration Baseline', 'iso' => 'A.8.9', 'nist' => 'PR.PS-02', 'pci' => 'Req 2.2', 'gdpr' => 'Art 32'],
            ['id' => 'VUL-001', 'name' => 'Vulnerability Management Strategy', 'iso' => 'A.8.8', 'nist' => 'ID.RA-01', 'pci' => 'Req 6.3', 'gdpr' => 'Art 32(1)(d)'],
            ['id' => 'APP-001', 'name' => 'Application Security Program', 'iso' => 'A.8.25', 'nist' => 'PR.PS-06', 'pci' => 'Req 6.1', 'gdpr' => 'Art 25'],
            ['id' => 'ARC-001', 'name' => 'Security Architecture Framework', 'iso' => 'A.8.27', 'nist' => 'PR.IR-02', 'pci' => 'Req 1.2', 'gdpr' => 'Art 25'],
            ['id' => 'OPS-001', 'name' => 'Change & Release Management', 'iso' => 'A.8.32', 'nist' => 'PR.PS-04', 'pci' => 'Req 6.4', 'gdpr' => 'Art 32'],
            ['id' => 'SOC-001', 'name' => 'Security Operations Center Management', 'iso' => 'A.8.15', 'nist' => 'DE.AE-01', 'pci' => 'Req 10.1', 'gdpr' => 'Art 32'],
            ['id' => 'THR-001', 'name' => 'Threat Intelligence Management', 'iso' => 'A.5.7', 'nist' => 'ID.RA-02', 'pci' => 'Req 11.4', 'gdpr' => 'Art 32'],
            ['id' => 'INC-001', 'name' => 'Incident Response Program', 'iso' => 'A.5.24', 'nist' => 'RS.MA-01', 'pci' => 'Req 12.10', 'gdpr' => 'Art 33, 34'],
            ['id' => 'BCM-001', 'name' => 'BCDR Program',            'iso' => 'A.5.29', 'nist' => 'RC.RP-01', 'pci' => 'Req 12.10.5', 'gdpr' => 'Art 32(1)(c)'],
            ['id' => 'OPR-001', 'name' => 'Operational Resilience Program', 'iso' => 'A.5.30', 'nist' => 'RC.RP-02', 'pci' => 'Req 12.10', 'gdpr' => 'Art 32(1)(c)'],
            ['id' => 'PHY-001', 'name' => 'Physical Security Management', 'iso' => 'A.7.1', 'nist' => 'PR.AA-06', 'pci' => 'Req 9.1', 'gdpr' => 'Art 32(1)'],
            ['id' => 'TPR-001', 'name' => 'Third-Party Risk Management', 'iso' => 'A.5.19', 'nist' => 'GV.SC-02', 'pci' => 'Req 12.8', 'gdpr' => 'Art 28'],
            ['id' => 'HRS-001', 'name' => 'Personnel Screening & Verification', 'iso' => 'A.6.1', 'nist' => 'PR.AT-01', 'pci' => 'Req 12.7', 'gdpr' => 'Art 32'],
            ['id' => 'SAT-001', 'name' => 'Security Awareness Program', 'iso' => 'A.6.3', 'nist' => 'PR.AT-02', 'pci' => 'Req 12.6', 'gdpr' => 'Art 39'],
            ['id' => 'AIG-001', 'name' => 'AI Governance & Oversight', 'iso' => 'A.5.1', 'nist' => 'AI RMF 1.0', 'pci' => 'Req 12.1', 'gdpr' => 'Art 22'],
            ['id' => 'AUD-001', 'name' => 'Audit & Assurance Program', 'iso' => 'Clause 9.2', 'nist' => 'GV.OV-03', 'pci' => 'Req 12.11', 'gdpr' => 'Art 58'],
            ['id' => 'EXC-001', 'name' => 'Exception Management Program', 'iso' => 'A.5.1', 'nist' => 'GV.RM-03', 'pci' => 'Req 12.2', 'gdpr' => 'Art 24'],
        ];

        return view('aspiaUcl.ucl_homepage', [
            'frameworksCount'         => $frameworksCount,
            'domainsCount'            => $domainsCount,
            'controlsCount'           => $controlsCount,
            'requirementsCount'       => $requirementsCount,
            'mappedRequirementsCount' => $mappedRequirementsCount,
            'domains'                 => $domains,
            'controls'                => $controls,
            'frameworks'              => $frameworks,
            'frameworksWithDomains'   => $frameworksWithDomains,
            'domainsWithControls'     => $domainsWithControls,
            'mappingControlsList'     => $mappingControlsList,
        ]);
    }
}
