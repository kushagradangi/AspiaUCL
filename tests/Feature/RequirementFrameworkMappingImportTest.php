<?php

use App\Imports\RequirementFrameworkMappingImport;
use App\Models\Framework;
use App\Models\Requirement;
use App\Models\RequirementFrameworkMapping;
use Illuminate\Support\Collection;

function requirementFrameworkMappingHeaders(): array
{
    return [
        'requirement_id',
        'requirement_title',
        'iso_27001_2022_section_subsection_title',
        'irdai_cyber_security_guidelines_2023',
        'rbi_cyber_security_framework_2016_mapping',
        'sebi_cscrf_section_subsection',
        'dora_subsection',
        'hipaa_security_rule_2025_nprm_mapping',
        'iso_iec_27002_2022_section_subsection_mapping',
        'nis2_titles',
        'pci_dss_4_0_1',
        'cobit_2019',
        'iso_22301_2019_titles',
        'nist_csf_2_0',
        'nist_sp_800_53_rev_5_section',
        'nist_sp_800_53_rev_5_subsection_control',
        'dpdpa_section_s_and_section_title_s',
        'gdpr_mapping',
        'cis_controls_v8_mapping',
        'cert_in_directions_2022',
        'upi_framework_section_s',
        'upi_framework_subsection_s',
        'soc_2_section_subsection_title',
        'iso27701_2019',
        'iso27701_titles_2019',
    ];
}

function requirementFrameworkMappingRow(array $values = []): array
{
    return array_replace(array_fill_keys(requirementFrameworkMappingHeaders(), ''), $values);
}

function seedRequirementMappingFrameworks(): array
{
    $codes = [
        'ISO27001', 'IRDAI', 'RBI-CSF', 'SEBI-CSCRF', 'DORA', 'HIPAA',
        'ISO27002', 'NIS2', 'PCI-DSS', 'COBIT2019', 'ISO22301', 'NIST-CSF',
        'NIST80053', 'DPDP', 'GDPR', 'CIS-V8', 'CERT-IN', 'NPCI-ISR',
        'SOC2', 'ISO27701',
    ];

    $frameworks = [];
    foreach ($codes as $index => $code) {
        $frameworks[$code] = Framework::create([
            'framework_id' => 'FW-' . str_pad((string) ($index + 1), 3, '0', STR_PAD_LEFT),
            'framework_code' => $code,
            'name' => 'Framework ' . $code,
            'slug' => 'framework-' . strtolower($code),
        ]);
    }

    return $frameworks;
}

it('imports clause mappings by requirement id and combines columns for one framework', function () {
    $frameworks = seedRequirementMappingFrameworks();
    $extraFramework = Framework::create([
        'framework_id' => 'FW-EXTRA',
        'framework_code' => 'CUSTOM',
        'name' => 'Custom Framework',
        'slug' => 'custom-framework',
    ]);

    Requirement::create([
        'requirement_id' => 'REQ-001-R001',
        'control_id' => 'REQ-001',
        'requirement_title' => 'Governance',
        'requirement' => 'A requirement statement.',
    ]);
    Requirement::create([
        'requirement_id' => 'REQ-001-R002',
        'control_id' => 'REQ-001',
        'requirement_title' => 'Access Management',
        'requirement' => 'Another requirement statement.',
    ]);

    RequirementFrameworkMapping::create([
        'requirement_id' => 'REQ-001-R002',
        'framework_name' => $frameworks['PCI-DSS']->name,
        'framework_code' => 'PCI-DSS',
        'framework_id' => $frameworks['PCI-DSS']->id,
        'clause_reference' => 'Old clause',
    ]);
    RequirementFrameworkMapping::create([
        'requirement_id' => 'REQ-001-R002',
        'framework_name' => $extraFramework->name,
        'framework_code' => 'CUSTOM',
        'framework_id' => $extraFramework->id,
        'clause_reference' => 'Preserve this mapping',
    ]);
    RequirementFrameworkMapping::create([
        'requirement_id' => 'REQ-001-R002',
        'framework_name' => '10',
        'framework_code' => '10',
        'framework_id' => null,
        'clause_reference' => 'Invalid numeric heading',
    ]);

    $import = new RequirementFrameworkMappingImport();
    $import->collection(new Collection([
        requirementFrameworkMappingRow([
            'requirement_id' => 'REQ-001-R001',
            'requirement_title' => 'Governance',
            'nist_sp_800_53_rev_5_section' => '3.13',
            'nist_sp_800_53_rev_5_subsection_control' => 'PM-1',
        ]),
        requirementFrameworkMappingRow([
            'requirement_id' => 'REQ-001-R002',
            'requirement_title' => 'A different title',
        ]),
        requirementFrameworkMappingRow([
            'requirement_id' => 'MISSING-R001',
            'gdpr_mapping' => 'Article 5',
        ]),
    ]));

    $nistMapping = RequirementFrameworkMapping::where('requirement_id', 'REQ-001-R001')->first();

    expect($nistMapping)->not->toBeNull()
        ->and($nistMapping->framework_id)->toBe($frameworks['NIST80053']->id)
        ->and($nistMapping->clause_reference)->toBe('3.13; PM-1')
        ->and(RequirementFrameworkMapping::where('requirement_id', 'REQ-001-R002')
            ->where('framework_id', $frameworks['PCI-DSS']->id)
            ->exists())->toBeFalse()
        ->and(RequirementFrameworkMapping::where('requirement_id', 'REQ-001-R002')
            ->where('framework_id', $extraFramework->id)
            ->value('clause_reference'))->toBe('Preserve this mapping')
        ->and(RequirementFrameworkMapping::where('requirement_id', 'REQ-001-R002')
            ->where('framework_name', '10')
            ->exists())->toBeFalse()
        ->and($import->getMappedRows())->toBe(1)
        ->and($import->getMappedPairs())->toBe(1)
        ->and($import->getMissingRequirementCount())->toBe(1)
        ->and($import->getMissingRequirementIds())->toBe(['MISSING-R001'])
        ->and($import->getTitleMismatchCount())->toBe(1)
        ->and($import->getTitleMismatchIds())->toBe(['REQ-001-R002']);
});

it('rejects populated columns it cannot map before changing mappings', function () {
    seedRequirementMappingFrameworks();
    Requirement::create([
        'requirement_id' => 'REQ-001-R001',
        'control_id' => 'REQ-001',
        'requirement_title' => 'Governance',
        'requirement' => 'A requirement statement.',
    ]);

    $row = requirementFrameworkMappingRow([
        'requirement_id' => 'REQ-001-R001',
        'unknown_framework_column' => 'Clause 1',
    ]);

    expect(fn () => (new RequirementFrameworkMappingImport())
        ->collection(new Collection([$row])))
        ->toThrow(RuntimeException::class, 'unrecognized populated column');

    expect(RequirementFrameworkMapping::count())->toBe(0);
});
