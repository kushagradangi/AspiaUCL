<?php

use App\Models\Control;
use App\Models\Domain;
use App\Models\Framework;
use App\Models\Requirement;
use App\Models\RequirementFrameworkMapping;

test('capitalizes first letter of first word without touching other words or raw attributes', function () {
    $control = new Control([
        'control_id' => 'GOV-001',
        'slug' => 'information-security-governance',
        'name' => 'information security governance',
        'applicable_technologies' => 'GRC platforms, policy/document management systems, workflow/approval systems, executive security dashboards',
        'business_benefits' => 'aligns security with business strategy; provides clear accountability; enables informed executive decisions; reduces regulatory exposure',
    ]);

    // 1. Technical identifiers remain untouched
    expect($control->control_id)->toBe('GOV-001')
        ->and($control->slug)->toBe('information-security-governance');

    // 2. First letter of first word is capitalized; second and other words remain untouched
    expect($control->name)->toBe('Information security governance');

    // 3. Comma-separated list field: first letter of each item is capitalized, other words untouched
    expect($control->applicable_technologies)->toBe(
        'GRC platforms, Policy/document management systems, Workflow/approval systems, Executive security dashboards'
    );

    // 4. Semicolon-separated field: first letter after semicolon is capitalized, other words untouched
    expect($control->business_benefits)->toBe(
        'Aligns security with business strategy; Provides clear accountability; Enables informed executive decisions; Reduces regulatory exposure'
    );

    // 5. Raw attributes in memory remain 100% untouched
    expect($control->getAttributes()['name'])->toBe('information security governance')
        ->and($control->getAttributes()['applicable_technologies'])->toBe(
            'GRC platforms, policy/document management systems, workflow/approval systems, executive security dashboards'
        );
});

test('domain tags and keywords capitalize first letter per item while preserving second words', function () {
    $domain = new Domain([
        'domain_id' => 'DOM-001',
        'domain_code' => 'GOV',
        'tags' => 'core, governance, leadership, strategic, enterprise, compliance',
        'keywords' => 'security governance, GRC, board oversight, executive reporting, security strategy',
    ]);

    // System fields untouched
    expect($domain->domain_id)->toBe('DOM-001')
        ->and($domain->domain_code)->toBe('GOV');

    // Tags should be capitalized per item
    expect($domain->tags)->toBe('Core, Governance, Leadership, Strategic, Enterprise, Compliance');

    // Keywords should capitalize first word only of each item
    expect($domain->keywords)->toBe(
        'Security governance, GRC, Board oversight, Executive reporting, Security strategy'
    );

    // Raw attributes untouched
    expect($domain->getAttributes()['tags'])->toBe('core, governance, leadership, strategic, enterprise, compliance');
});

test('comma-separated values across all fields capitalize first letter of each item while preserving subsequent words', function () {
    $req = new Requirement([
        'requirement_title' => 'governance framework',
        'implementation_guidance' => 'define the governance structure, roles, committees, decision rights, and processes; align the framework with enterprise governance and risk management; document supporting policies and procedures.',
    ]);

    // Title first word capitalized, second word untouched
    expect($req->requirement_title)->toBe('Governance framework');

    // Commas and semicolons both capitalize the first letter of each item while keeping other words untouched
    expect($req->implementation_guidance)->toBe(
        'Define the governance structure, Roles, Committees, Decision rights, And processes; Align the framework with enterprise governance and risk management; Document supporting policies and procedures.'
    );

    // Raw attributes untouched
    expect($req->getAttributes()['implementation_guidance'])->toBe(
        'define the governance structure, roles, committees, decision rights, and processes; align the framework with enterprise governance and risk management; document supporting policies and procedures.'
    );
});

test('framework official URL and system fields remain untouched', function () {
    $fw = new Framework([
        'framework_id' => 'FW-002',
        'framework_code' => 'ISO27002',
        'name' => 'ISO/IEC 27002',
        'official_source_url' => 'https://www.iso.org/standard/75652.html',
        'key_focus_areas' => 'organizational; people; physical; technological controls; attributes for control classification.',
    ]);

    expect($fw->official_source_url)->toBe('https://www.iso.org/standard/75652.html')
        ->and($fw->framework_id)->toBe('FW-002')
        ->and($fw->key_focus_areas)->toBe(
            'Organizational; People; Physical; Technological controls; Attributes for control classification.'
        );
});

test('comma without spaces is properly capitalized for every item', function () {
    $domain = new Domain([
        'tags' => 'tag1,tag2,tag3',
        'keywords' => 'keyword one,keyword two,keyword three',
    ]);

    expect($domain->tags)->toBe('Tag1,Tag2,Tag3')
        ->and($domain->keywords)->toBe('Keyword one,Keyword two,Keyword three');
});

test('toArray and json responses reflect formatted capitalization dynamically', function () {
    $control = new Control([
        'control_id' => 'GOV-001',
        'applicable_technologies' => 'GRC platforms, policy/document management systems',
        'business_benefits' => 'aligns security; provides clear accountability',
    ]);

    $arr = $control->toArray();

    expect($arr['applicable_technologies'])->toBe('GRC platforms, Policy/document management systems')
        ->and($arr['business_benefits'])->toBe('Aligns security; Provides clear accountability')
        ->and($arr['control_id'])->toBe('GOV-001');
});
