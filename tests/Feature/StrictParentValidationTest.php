<?php

use App\Imports\ControlImport;
use App\Imports\DomainImport;
use App\Imports\RequirementFrameworkMappingImport;
use App\Imports\RequirementImport;
use App\Models\Control;
use App\Models\Domain;
use App\Models\Framework;
use App\Models\Requirement;
use App\Models\RequirementFrameworkMapping;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

uses(RefreshDatabase::class);

/*
|--------------------------------------------------------------------------
| Domains Module: Mapped Frameworks Validation
|--------------------------------------------------------------------------
*/

it('allows domain creation when mapped framework exists via framework_id', function () {
    $user = User::factory()->create();
    $fw = Framework::create([
        'framework_id'   => 'FW-ISO-01',
        'framework_code' => 'ISO27001',
        'name'           => 'ISO/IEC 27001',
        'slug'           => 'iso-iec-27001',
    ]);

    $response = $this->actingAs($user)->post(route('domains.store'), [
        'framework_id' => $fw->id,
        'domain_id'    => 'DOM-SEC-01',
        'domain_code'  => 'SEC01',
        'name'         => 'Security Domain',
        'status'       => 'Active',
    ]);

    $response->assertRedirect(route('domains.index'));
    $response->assertSessionHas('success');

    $domain = Domain::where('domain_id', 'DOM-SEC-01')->first();
    expect($domain)->not->toBeNull();
    expect($domain->framework_id)->toBe($fw->id);
    expect($domain->frameworks->contains($fw->id))->toBeTrue();
});

it('allows domain creation when mapped framework exists via related_frameworks', function () {
    $user = User::factory()->create();
    $fw = Framework::create([
        'framework_id'   => 'FW-NIST-01',
        'framework_code' => 'NIST-CSF',
        'name'           => 'NIST Cybersecurity Framework',
        'slug'           => 'nist-csf',
    ]);

    $response = $this->actingAs($user)->post(route('domains.store'), [
        'domain_id'          => 'DOM-NIST-01',
        'domain_code'        => 'NIST01',
        'name'               => 'NIST Domain',
        'status'             => 'Active',
        'related_frameworks' => 'NIST-CSF',
    ]);

    $response->assertRedirect(route('domains.index'));
    $response->assertSessionHas('success');

    $domain = Domain::where('domain_id', 'DOM-NIST-01')->first();
    expect($domain)->not->toBeNull();
    expect($domain->framework_id)->toBe($fw->id);
    expect($domain->frameworks->contains($fw->id))->toBeTrue();
});

it('allows domain creation when at least 1 mapped framework exists among multiple in related_frameworks', function () {
    $user = User::factory()->create();
    $fw = Framework::create([
        'framework_id'   => 'FW-PCI-01',
        'framework_code' => 'PCI-DSS',
        'name'           => 'PCI Data Security Standard',
        'slug'           => 'pci-dss',
    ]);

    $response = $this->actingAs($user)->post(route('domains.store'), [
        'domain_id'          => 'DOM-MULTI-01',
        'domain_code'        => 'MULTI01',
        'name'               => 'Multi Framework Domain',
        'status'             => 'Active',
        'related_frameworks' => 'NON-EXISTENT-FW, PCI-DSS, ANOTHER-MISSING-FW',
    ]);

    $response->assertRedirect(route('domains.index'));
    $response->assertSessionHas('success');

    $domain = Domain::where('domain_id', 'DOM-MULTI-01')->first();
    expect($domain)->not->toBeNull();
    expect($domain->framework_id)->toBe($fw->id);
    expect($domain->frameworks->contains($fw->id))->toBeTrue();
});

it('blocks domain creation when no mapped framework is provided', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('domains.store'), [
        'domain_id'   => 'DOM-ERR-01',
        'domain_code' => 'ERR01',
        'name'        => 'No Framework Domain',
        'status'      => 'Active',
    ]);

    $response->assertSessionHasErrors(['framework_id']);
    expect(Domain::where('domain_id', 'DOM-ERR-01')->exists())->toBeFalse();
});

it('blocks domain creation when referenced frameworks do not exist', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('domains.store'), [
        'framework_id'       => 99999,
        'domain_id'          => 'DOM-ERR-02',
        'domain_code'        => 'ERR02',
        'name'               => 'Invalid Framework Domain',
        'status'             => 'Active',
        'related_frameworks' => 'NON-EXISTENT-FW-1, NON-EXISTENT-FW-2',
    ]);

    $response->assertSessionHasErrors(['framework_id']);
    expect(Domain::where('domain_id', 'DOM-ERR-02')->exists())->toBeFalse();
});

it('allows domain update when mapped framework exists', function () {
    $user = User::factory()->create();
    $fw = Framework::create([
        'framework_id'   => 'FW-CIS-01',
        'framework_code' => 'CIS-V8',
        'name'           => 'CIS Controls v8',
        'slug'           => 'cis-controls-v8',
    ]);

    $domain = Domain::create([
        'framework_id' => $fw->id,
        'domain_id'    => 'DOM-UPD-01',
        'domain_code'  => 'UPD01',
        'name'         => 'Original Domain',
        'status'       => 'Active',
    ]);

    $response = $this->actingAs($user)->put(route('domains.update', $domain), [
        'framework_id' => $fw->id,
        'domain_id'    => 'DOM-UPD-01',
        'domain_code'  => 'UPD01',
        'name'         => 'Updated Domain',
        'status'       => 'Active',
    ]);

    $response->assertRedirect(route('domains.index'));
    $response->assertSessionHas('success');
    expect($domain->fresh()->name)->toBe('Updated Domain');
});

it('blocks domain update when no mapped framework exists in update payload', function () {
    $user = User::factory()->create();
    $fw = Framework::create([
        'framework_id'   => 'FW-DORA-01',
        'framework_code' => 'DORA',
        'name'           => 'DORA Framework',
        'slug'           => 'dora',
    ]);

    $domain = Domain::create([
        'framework_id' => $fw->id,
        'domain_id'    => 'DOM-UPD-02',
        'domain_code'  => 'UPD02',
        'name'         => 'DORA Domain',
        'status'       => 'Active',
    ]);

    $response = $this->actingAs($user)->put(route('domains.update', $domain), [
        'framework_id'       => null,
        'domain_id'          => 'DOM-UPD-02',
        'domain_code'        => 'UPD02',
        'name'               => 'Attempted Blank Framework',
        'status'             => 'Active',
        'related_frameworks' => 'UNKNOWN-FW',
    ]);

    $response->assertSessionHasErrors(['framework_id']);
    expect($domain->fresh()->name)->toBe('DORA Domain');
});

/*
|--------------------------------------------------------------------------
| Controls Module: Strict Domain Existence Validation
|--------------------------------------------------------------------------
*/

it('allows control creation when parent domain exists', function () {
    $user = User::factory()->create();
    Domain::create([
        'domain_id'   => 'DOM-SEC-01',
        'domain_code' => 'SEC',
        'name'        => 'Security Domain',
        'status'      => 'Active',
    ]);

    $response = $this->actingAs($user)->post(route('controls.store'), [
        'control_id'  => 'CTRL-SEC-001',
        'domain_code' => 'SEC',
        'name'        => 'Access Management',
        'status'      => 'Active',
    ]);

    $response->assertRedirect(route('controls.index'));
    $response->assertSessionHas('success');
    expect(Control::where('control_id', 'CTRL-SEC-001')->exists())->toBeTrue();
});

it('allows control creation matching domain by domain_id with whitespace/case normalization', function () {
    $user = User::factory()->create();
    Domain::create([
        'domain_id'   => 'DOM-NET-01',
        'domain_code' => 'NET',
        'name'        => 'Network Security',
        'status'      => 'Active',
    ]);

    $response = $this->actingAs($user)->post(route('controls.store'), [
        'control_id'  => 'CTRL-NET-001',
        'domain_code' => '  dom-net-01  ', // lower case with spaces
        'name'        => 'Firewall Config',
        'status'      => 'Active',
    ]);

    $response->assertRedirect(route('controls.index'));
    $response->assertSessionHas('success');
    expect(Control::where('control_id', 'CTRL-NET-001')->exists())->toBeTrue();
});

it('blocks control creation when parent domain does not exist', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('controls.store'), [
        'control_id'  => 'CTRL-ERR-001',
        'domain_code' => 'DOM-999',
        'name'        => 'Access Management',
        'status'      => 'Active',
    ]);

    $expectedError = 'Cannot save Control "Access Management" (CTRL-ERR-001): Parent Domain "DOM-999" does not exist.';

    $response->assertSessionHasErrors([
        'domain_code' => $expectedError,
    ]);
    expect(Control::where('control_id', 'CTRL-ERR-001')->exists())->toBeFalse();
    // Verify no dummy domains were created
    expect(Domain::where('domain_code', 'DOM-999')->exists())->toBeFalse();
});

it('blocks control update when specified parent domain does not exist', function () {
    $user = User::factory()->create();
    $domain = Domain::create([
        'domain_id'   => 'DOM-SEC-02',
        'domain_code' => 'SEC2',
        'name'        => 'Security 2',
        'status'      => 'Active',
    ]);
    $control = Control::create([
        'domain_id'   => $domain->id,
        'control_id'  => 'CTRL-SEC-002',
        'domain_code' => 'SEC2',
        'name'        => 'Original Name',
        'status'      => 'Active',
    ]);

    $response = $this->actingAs($user)->put(route('controls.update', $control), [
        'control_id'  => 'CTRL-SEC-002',
        'domain_code' => 'NON-EXISTENT-DOM',
        'name'        => 'Updated Name',
        'status'      => 'Active',
    ]);

    $expectedError = 'Cannot save Control "Updated Name" (CTRL-SEC-002): Parent Domain "NON-EXISTENT-DOM" does not exist.';
    $response->assertSessionHasErrors([
        'domain_code' => $expectedError,
    ]);
    expect($control->fresh()->name)->toBe('Original Name');
});

/*
|--------------------------------------------------------------------------
| Requirements Module: Strict Control Existence Validation
|--------------------------------------------------------------------------
*/

it('allows requirement creation when parent control exists', function () {
    $user = User::factory()->create();
    $domain = Domain::create([
        'domain_id'   => 'DOM-GOV-01',
        'domain_code' => 'GOV',
        'name'        => 'Governance',
        'status'      => 'Active',
    ]);
    Control::create([
        'domain_id'   => $domain->id,
        'control_id'  => 'CTRL-GOV-001',
        'domain_code' => 'GOV',
        'name'        => 'Policy Framework',
        'status'      => 'Active',
    ]);

    $response = $this->actingAs($user)->post(route('requirements.store'), [
        'requirement_id'    => 'REQ-GOV-001',
        'control_id'        => 'CTRL-GOV-001',
        'requirement_title' => 'Password Policy',
        'requirement'       => 'All passwords must meet complexity rules.',
    ]);

    $response->assertRedirect(route('requirements.index'));
    $response->assertSessionHas('success');
    expect(Requirement::where('requirement_id', 'REQ-GOV-001')->exists())->toBeTrue();
});

it('allows requirement creation with whitespace/case normalization on control_id', function () {
    $user = User::factory()->create();
    $domain = Domain::create([
        'domain_id'   => 'DOM-GOV-02',
        'domain_code' => 'GOV2',
        'name'        => 'Governance 2',
        'status'      => 'Active',
    ]);
    Control::create([
        'domain_id'   => $domain->id,
        'control_id'  => 'CTRL-GOV-002',
        'domain_code' => 'GOV2',
        'name'        => 'Audit Policy',
        'status'      => 'Active',
    ]);

    $response = $this->actingAs($user)->post(route('requirements.store'), [
        'requirement_id'    => 'REQ-GOV-002',
        'control_id'        => '  ctrl-gov-002  ', // lower case with spaces
        'requirement_title' => 'Audit Trails',
        'requirement'       => 'Audit trails must be maintained.',
    ]);

    $response->assertRedirect(route('requirements.index'));
    $response->assertSessionHas('success');
    expect(Requirement::where('requirement_id', 'REQ-GOV-002')->exists())->toBeTrue();
});

it('blocks requirement creation when parent control does not exist', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('requirements.store'), [
        'requirement_id'    => 'REQ-ERR-001',
        'control_id'        => 'CTRL-999',
        'requirement_title' => 'Password Protection',
        'requirement'       => 'Passwords must be hashed.',
    ]);

    $expectedError = 'Cannot save Requirement "Password Protection" (REQ-ERR-001): Parent Control "CTRL-999" does not exist.';
    $response->assertSessionHasErrors([
        'control_id' => $expectedError,
    ]);
    expect(Requirement::where('requirement_id', 'REQ-ERR-001')->exists())->toBeFalse();
});

it('blocks requirement update when specified parent control does not exist', function () {
    $user = User::factory()->create();
    $domain = Domain::create([
        'domain_id'   => 'DOM-GOV-03',
        'domain_code' => 'GOV3',
        'name'        => 'Governance 3',
        'status'      => 'Active',
    ]);
    $control = Control::create([
        'domain_id'   => $domain->id,
        'control_id'  => 'CTRL-GOV-003',
        'domain_code' => 'GOV3',
        'name'        => 'Review Policy',
        'status'      => 'Active',
    ]);
    $req = Requirement::create([
        'requirement_id'    => 'REQ-GOV-003',
        'control_id'        => $control->control_id,
        'requirement_title' => 'Original Title',
        'requirement'       => 'Original Statement',
    ]);

    $response = $this->actingAs($user)->put(route('requirements.update', $req), [
        'requirement_id'    => 'REQ-GOV-003',
        'control_id'        => 'CTRL-NONEXISTENT',
        'requirement_title' => 'Updated Title',
        'requirement'       => 'Updated Statement',
    ]);

    $expectedError = 'Cannot save Requirement "Updated Title" (REQ-GOV-003): Parent Control "CTRL-NONEXISTENT" does not exist.';
    $response->assertSessionHasErrors([
        'control_id' => $expectedError,
    ]);
    expect($req->fresh()->requirement_title)->toBe('Original Title');
});

/*
|--------------------------------------------------------------------------
| ControlImport: Excel/CSV Import Validation & Transaction Safety
|--------------------------------------------------------------------------
*/

it('imports controls successfully when parent domains exist', function () {
    $domain = Domain::create([
        'domain_id'   => 'DOM-VALID-1',
        'domain_code' => 'VAL1',
        'name'        => 'Valid Domain 1',
        'status'      => 'Active',
    ]);

    $rows = new Collection([
        // Header
        ['Control ID', 'Domain Code', 'Control Name', 'Status'],
        // Data row
        ['CTRL-VAL-001', 'VAL1', 'Access Control Safeguard', 'Active'],
    ]);

    $import = new ControlImport();
    $import->collection($rows);

    expect($import->getCreatedCount())->toBe(1);
    expect(Control::where('control_id', 'CTRL-VAL-001')->exists())->toBeTrue();
});

it('rejects control import and rolls back when parent domain does not exist', function () {
    Domain::create([
        'domain_id'   => 'DOM-VALID-2',
        'domain_code' => 'VAL2',
        'name'        => 'Valid Domain 2',
        'status'      => 'Active',
    ]);

    $rows = new Collection([
        // Row 1: Header
        ['Control ID', 'Domain Code', 'Control Name', 'Status'],
        // Row 2: Valid
        ['CTRL-VAL-002', 'VAL2', 'Valid Control', 'Active'],
        // Row 3: Invalid missing domain
        ['CTRL-001', 'DOM-999', 'Access Management', 'Active'],
    ]);

    $import = new ControlImport();

    try {
        $import->collection($rows);
        $this->fail('Expected ValidationException was not thrown.');
    } catch (ValidationException $e) {
        $errors = $e->errors()['import'] ?? [];
        expect($errors)->toContain('Row 3: Control "Access Management" (CTRL-001) references non-existent Domain "DOM-999".');
    }

    // Ensure transaction was rolled back: Row 2 was NOT saved!
    expect(Control::where('control_id', 'CTRL-VAL-002')->exists())->toBeFalse();
    expect(Control::where('control_id', 'CTRL-001')->exists())->toBeFalse();

    // Ensure no dummy/placeholder domains were created
    expect(Domain::where('domain_code', 'DOM-999')->orWhere('domain_code', 'GEN')->exists())->toBeFalse();
});

it('collects all invalid domain errors together in control import', function () {
    $rows = new Collection([
        // Row 1: Header
        ['Control ID', 'Domain Code', 'Control Name', 'Status'],
        // Row 2: Invalid 1
        ['CTRL-A', 'MISSING-DOM-1', 'Control A', 'Active'],
        // Row 3: Invalid 2
        ['CTRL-B', 'MISSING-DOM-2', 'Control B', 'Active'],
    ]);

    $import = new ControlImport();

    try {
        $import->collection($rows);
        $this->fail('Expected ValidationException was not thrown.');
    } catch (ValidationException $e) {
        $errors = $e->errors()['import'] ?? [];
        expect(count($errors))->toBe(2);
        expect($errors[0])->toContain('Row 2: Control "Control A" (CTRL-A) references non-existent Domain "MISSING-DOM-1".');
        expect($errors[1])->toContain('Row 3: Control "Control B" (CTRL-B) references non-existent Domain "MISSING-DOM-2".');
    }

    expect(Control::count())->toBe(0);
});

/*
|--------------------------------------------------------------------------
| RequirementImport: Excel/CSV Import Validation & Transaction Safety
|--------------------------------------------------------------------------
*/

it('imports requirements successfully when parent controls exist', function () {
    $domain = Domain::create([
        'domain_id'   => 'DOM-REQ-01',
        'domain_code' => 'REQDOM',
        'name'        => 'Req Domain',
        'status'      => 'Active',
    ]);
    Control::create([
        'domain_id'   => $domain->id,
        'control_id'  => 'CTRL-REQ-001',
        'domain_code' => 'REQDOM',
        'name'        => 'Req Control',
        'status'      => 'Active',
    ]);

    $rows = new Collection([
        // WithHeadingRow has already extracted row 1, so index 0 represents Excel row 2
        [
            'requirement_id'    => 'REQ-TEST-001',
            'control_id'        => 'CTRL-REQ-001',
            'requirement_title' => 'Password Length',
            'requirement'       => 'Passwords must be at least 12 characters.',
        ],
    ]);

    $import = new RequirementImport();
    $import->collection($rows);

    expect($import->getCreatedCount())->toBe(1);
    expect(Requirement::where('requirement_id', 'REQ-TEST-001')->exists())->toBeTrue();
});

it('rejects requirement import and rolls back when parent control does not exist', function () {
    $domain = Domain::create([
        'domain_id'   => 'DOM-REQ-02',
        'domain_code' => 'REQDOM2',
        'name'        => 'Req Domain 2',
        'status'      => 'Active',
    ]);
    Control::create([
        'domain_id'   => $domain->id,
        'control_id'  => 'CTRL-EXISTING',
        'domain_code' => 'REQDOM2',
        'name'        => 'Existing Control',
        'status'      => 'Active',
    ]);

    // Construct 19 rows so row 20 has index 18 (index 18 + 2 = row 20)
    $rowList = [
        // index 0 -> Excel row 2 (valid)
        [
            'requirement_id'    => 'REQ-VAL-001',
            'control_id'        => 'CTRL-EXISTING',
            'requirement_title' => 'Valid Req',
            'requirement'       => 'Valid Statement',
        ],
    ];

    // Pad empty or valid items up to index 18
    for ($i = 1; $i < 18; $i++) {
        $rowList[] = []; // empty rows are skipped
    }

    // index 18 -> Excel row 20
    $rowList[] = [
        'requirement_id'    => 'REQ-001',
        'control_id'        => 'CTRL-999',
        'requirement_title' => 'Password Protection',
        'requirement'       => 'Must use strong passwords.',
    ];

    $rows = new Collection($rowList);
    $import = new RequirementImport();

    try {
        $import->collection($rows);
        $this->fail('Expected ValidationException was not thrown.');
    } catch (ValidationException $e) {
        $errors = $e->errors()['import'] ?? [];
        expect($errors)->toContain('Row 20: Requirement "Password Protection" (REQ-001) references non-existent Control "CTRL-999".');
    }

    // Ensure rollback: REQ-VAL-001 was rolled back and NOT saved
    expect(Requirement::where('requirement_id', 'REQ-VAL-001')->exists())->toBeFalse();
    expect(Requirement::where('requirement_id', 'REQ-001')->exists())->toBeFalse();
});

it('collects all invalid control errors together in requirement import', function () {
    $rows = new Collection([
        // index 0 -> row 2
        [
            'requirement_id'    => 'REQ-A',
            'control_id'        => 'CTRL-MISSING-1',
            'requirement_title' => 'Requirement A',
            'requirement'       => 'Statement A',
        ],
        // index 1 -> row 3
        [
            'requirement_id'    => 'REQ-B',
            'control_id'        => 'CTRL-MISSING-2',
            'requirement_title' => 'Requirement B',
            'requirement'       => 'Statement B',
        ],
    ]);

    $import = new RequirementImport();

    try {
        $import->collection($rows);
        $this->fail('Expected ValidationException was not thrown.');
    } catch (ValidationException $e) {
        $errors = $e->errors()['import'] ?? [];
        expect(count($errors))->toBe(2);
        expect($errors[0])->toContain('Row 2: Requirement "Requirement A" (REQ-A) references non-existent Control "CTRL-MISSING-1".');
        expect($errors[1])->toContain('Row 3: Requirement "Requirement B" (REQ-B) references non-existent Control "CTRL-MISSING-2".');
    }

    expect(Requirement::count())->toBe(0);
});

/*
|--------------------------------------------------------------------------
| DomainImport: Excel/CSV Import Validation & Transaction Safety
|--------------------------------------------------------------------------
*/

it('imports domains successfully when mapped frameworks exist', function () {
    $fw = Framework::create([
        'framework_id'   => 'FW-IMP-01',
        'framework_code' => 'IMP01',
        'name'           => 'Import Test Framework',
        'slug'           => 'import-test-framework',
    ]);

    $rows = new Collection([
        // Header
        ['Domain ID', 'Domain Code', 'Domain Name', 'Slug', 'Purpose', 'Scope', 'Business Owner', 'Description', 'Display Order', 'Status', 'Version', 'Short Overview', 'Business Objectives', 'Business Risks', 'Key Capabilities', 'Typical Stakeholders', 'Applicable Industries', 'Applicable Technologies', 'Keywords', 'Tags', 'Why Domain Matters', 'Common Challenges', 'Related Domains', 'Related Frameworks'],
        // Data row
        ['DOM-EXCEL-01', 'EXCEL01', 'Excel Imported Domain', '', '', '', '', '', '1', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', 'IMP01'],
    ]);

    $import = new DomainImport();
    $import->collection($rows);

    expect($import->getCreatedCount())->toBe(1);
    $domain = Domain::where('domain_id', 'DOM-EXCEL-01')->first();
    expect($domain)->not->toBeNull();
    expect($domain->framework_id)->toBe($fw->id);
    expect($domain->frameworks->contains($fw->id))->toBeTrue();
});

it('allows domain import when at least 1 mapped framework exists among multiple in related_frameworks', function () {
    $fw = Framework::create([
        'framework_id'   => 'FW-IMP-02',
        'framework_code' => 'MULTI-FW',
        'name'           => 'Multi Framework Test',
        'slug'           => 'multi-framework-test',
    ]);

    $rows = new Collection([
        ['Domain ID', 'Domain Code', 'Domain Name', 'Slug', 'Purpose', 'Scope', 'Business Owner', 'Description', 'Display Order', 'Status', 'Version', 'Short Overview', 'Business Objectives', 'Business Risks', 'Key Capabilities', 'Typical Stakeholders', 'Applicable Industries', 'Applicable Technologies', 'Keywords', 'Tags', 'Why Domain Matters', 'Common Challenges', 'Related Domains', 'Related Frameworks'],
        ['DOM-EXCEL-02', 'EXCEL02', 'Multi Framework Excel Domain', '', '', '', '', '', '2', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NON-EXISTENT, MULTI-FW, ANOTHER-MISSING'],
    ]);

    $import = new DomainImport();
    $import->collection($rows);

    expect($import->getCreatedCount())->toBe(1);
    $domain = Domain::where('domain_id', 'DOM-EXCEL-02')->first();
    expect($domain)->not->toBeNull();
    expect($domain->framework_id)->toBe($fw->id);
    expect($domain->frameworks->contains($fw->id))->toBeTrue();
});

it('rejects domain import and rolls back when mapped framework does not exist', function () {
    $fw = Framework::create([
        'framework_id'   => 'FW-IMP-03',
        'framework_code' => 'VALID-FW',
        'name'           => 'Valid Framework',
        'slug'           => 'valid-framework',
    ]);

    $rows = new Collection([
        // Header
        ['Domain ID', 'Domain Code', 'Domain Name', 'Slug', 'Purpose', 'Scope', 'Business Owner', 'Description', 'Display Order', 'Status', 'Version', 'Short Overview', 'Business Objectives', 'Business Risks', 'Key Capabilities', 'Typical Stakeholders', 'Applicable Industries', 'Applicable Technologies', 'Keywords', 'Tags', 'Why Domain Matters', 'Common Challenges', 'Related Domains', 'Related Frameworks'],
        // Row 2: Valid
        ['DOM-VALID-01', 'VAL01', 'Valid Domain', '', '', '', '', '', '1', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VALID-FW'],
        // Row 3: Invalid
        ['DOM-INVALID-01', 'INV01', 'Invalid Domain', '', '', '', '', '', '2', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NON-EXISTENT-FRAMEWORK'],
    ]);

    $import = new DomainImport();

    try {
        $import->collection($rows);
        $this->fail('Expected ValidationException was not thrown.');
    } catch (ValidationException $e) {
        $errors = $e->errors()['import'] ?? [];
        expect($errors)->toContain('Row 3: Domain "Invalid Domain" (DOM-INVALID-01) references non-existent Framework(s) "NON-EXISTENT-FRAMEWORK". At least 1 existing Framework is required.');
    }

    // Ensure rollback: Row 2 was rolled back and NOT saved
    expect(Domain::where('domain_id', 'DOM-VALID-01')->exists())->toBeFalse();
    expect(Domain::where('domain_id', 'DOM-INVALID-01')->exists())->toBeFalse();
});

it('collects all invalid framework errors together in domain import', function () {
    $rows = new Collection([
        ['Domain ID', 'Domain Code', 'Domain Name', 'Slug', 'Purpose', 'Scope', 'Business Owner', 'Description', 'Display Order', 'Status', 'Version', 'Short Overview', 'Business Objectives', 'Business Risks', 'Key Capabilities', 'Typical Stakeholders', 'Applicable Industries', 'Applicable Technologies', 'Keywords', 'Tags', 'Why Domain Matters', 'Common Challenges', 'Related Domains', 'Related Frameworks'],
        ['DOM-ERR-A', 'ERRA', 'Domain A', '', '', '', '', '', '1', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MISSING-FW-1'],
        ['DOM-ERR-B', 'ERRB', 'Domain B', '', '', '', '', '', '2', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
    ]);

    $import = new DomainImport();

    try {
        $import->collection($rows);
        $this->fail('Expected ValidationException was not thrown.');
    } catch (ValidationException $e) {
        $errors = $e->errors()['import'] ?? [];
        expect(count($errors))->toBe(2);
        expect($errors[0])->toContain('Row 2: Domain "Domain A" (DOM-ERR-A) references non-existent Framework(s) "MISSING-FW-1".');
        expect($errors[1])->toContain('Row 3: Domain "Domain B" (DOM-ERR-B) references non-existent Framework(s) None provided.');
    }

    expect(Domain::count())->toBe(0);
});

/*
|--------------------------------------------------------------------------
| RequirementFrameworkMappingImport: Requirement Existence Validation & Safety
|--------------------------------------------------------------------------
*/

it('imports framework mappings when requirements exist in requirements', function () {
    $fw = Framework::create([
        'framework_id'   => 'FW-ISO-01',
        'framework_code' => 'ISO27001',
        'name'           => 'ISO/IEC 27001:2022',
        'slug'           => 'iso-27001',
    ]);

    Requirement::create([
        'requirement_id'    => 'REQ-STRICT-001',
        'control_id'        => 'CTRL-001',
        'requirement_title' => 'Access Control Policy',
        'requirement'       => 'Establish policy.',
    ]);

    $rows = new Collection([
        [
            'requirement_id' => 'REQ-STRICT-001',
            'requirement_title' => 'Access Control Policy',
            'iso_27001_2022_section_subsection_title' => 'A.5.15',
        ],
    ]);

    $import = new RequirementFrameworkMappingImport();
    $import->collection($rows);

    expect(RequirementFrameworkMapping::where('requirement_id', 'REQ-STRICT-001')->exists())->toBeTrue();
});

it('rejects framework mapping import and prevents insertion when requirement does not exist in requirements', function () {
    Framework::create([
        'framework_id'   => 'FW-ISO-02',
        'framework_code' => 'ISO27001',
        'name'           => 'ISO/IEC 27001:2022',
        'slug'           => 'iso-27001-2',
    ]);

    Requirement::create([
        'requirement_id'    => 'REQ-VALID-EXISTS',
        'control_id'        => 'CTRL-001',
        'requirement_title' => 'Existing Requirement',
        'requirement'       => 'Valid requirement.',
    ]);

    $rows = new Collection([
        [
            'requirement_id' => 'REQ-VALID-EXISTS',
            'iso_27001_2022_section_subsection_title' => 'A.5.1',
        ],
        [
            'requirement_id' => 'REQ-NONEXISTENT-999',
            'requirement_title' => 'Non Existent Req',
            'iso_27001_2022_section_subsection_title' => 'A.5.2',
        ],
    ]);

    $import = new RequirementFrameworkMappingImport();

    try {
        $import->collection($rows);
        $this->fail('Expected ValidationException was not thrown.');
    } catch (ValidationException $e) {
        $errors = $e->errors()['import'] ?? [];
        expect($errors)->toContain('Row 3: Requirement "Non Existent Req" (REQ-NONEXISTENT-999) does not exist in requirements.');
    }

    // Verify complete rollback / zero insertion: REQ-VALID-EXISTS was NOT inserted
    expect(RequirementFrameworkMapping::where('requirement_id', 'REQ-VALID-EXISTS')->exists())->toBeFalse();
    expect(RequirementFrameworkMapping::count())->toBe(0);
});


