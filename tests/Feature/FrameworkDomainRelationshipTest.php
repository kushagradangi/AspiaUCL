<?php

use App\Models\Domain;
use App\Models\Framework;
use App\Services\RelationshipResolver;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('maps multiple related domains by id, code, and name', function () {
    $framework = Framework::create([
        'framework_id' => 'FW-001',
        'framework_code' => 'FW',
        'name' => 'Example Framework',
        'slug' => 'example-framework',
        'related_domains' => 'DOM-001; ACCESS, Data Protection',
    ]);

    Domain::create([
        'domain_id' => 'DOM-001',
        'domain_code' => 'GOV',
        'name' => 'Governance',
        'slug' => 'governance',
    ]);
    Domain::create([
        'domain_id' => 'DOM-002',
        'domain_code' => 'ACCESS',
        'name' => 'Access Control',
        'slug' => 'access-control',
    ]);
    Domain::create([
        'domain_id' => 'DOM-003',
        'domain_code' => 'DATA',
        'name' => 'Data Protection',
        'slug' => 'data-protection',
    ]);

    app(RelationshipResolver::class)->syncFrameworkDomains($framework);

    expect($framework->domains()->pluck('domains.domain_id')->all())
        ->toEqual(['DOM-001', 'DOM-002', 'DOM-003']);
});

it('does not create mappings for blank related domains', function () {
    $framework = Framework::create([
        'framework_id' => 'FW-002',
        'framework_code' => 'FW2',
        'name' => 'Blank Framework',
        'slug' => 'blank-framework',
        'related_domains' => null,
    ]);

    Domain::create([
        'domain_id' => 'DOM-004',
        'name' => 'Unmapped Domain',
        'slug' => 'unmapped-domain',
    ]);

    app(RelationshipResolver::class)->syncFrameworkDomains($framework);

    expect($framework->domains()->count())->toBe(0);
});
