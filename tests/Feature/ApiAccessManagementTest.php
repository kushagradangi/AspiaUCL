<?php

use App\Models\ApiClient;
use App\Models\ApiClientIp;
use App\Models\Control;
use App\Models\Domain;
use App\Models\Framework;
use App\Models\Requirement;
use App\Models\RequirementEvidenceMapping;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Seed sample UCL records for API response tests
    $this->framework = Framework::create([
        'framework_id' => 'FWK-ISO-27001',
        'framework_code' => 'ISO27001',
        'name' => 'ISO/IEC 27001',
        'slug' => 'isoiec-27001',
        'version' => '2022',
    ]);

    $this->domain = Domain::create([
        'framework_id' => $this->framework->id,
        'domain_id' => 'DOM-ACCESS',
        'domain_code' => 'AC',
        'name' => 'Access Control',
        'slug' => 'access-control',
    ]);

    $this->control = Control::create([
        'domain_id' => $this->domain->id,
        'control_id' => 'CTRL-AC-01',
        'domain_code' => 'AC',
        'name' => 'User Registration and Deregistration',
        'slug' => 'user-registration-and-deregistration',
    ]);

    $this->requirement = Requirement::create([
        'requirement_id' => 'REQ-AC-01-A',
        'control_id' => 'CTRL-AC-01',
        'requirement_title' => 'Formal User Registration Process',
        'slug' => 'formal-user-registration-process',
        'requirement' => 'A formal user registration and deregistration process shall be implemented.',
    ]);

    $this->mapping = RequirementEvidenceMapping::create([
        'requirement_id' => 'REQ-AC-01-A',
        'control_id' => 'CTRL-AC-01',
        'requirement_title' => 'Formal User Registration Process',
        'requirement' => 'A formal user registration and deregistration process shall be implemented.',
        'evidence_type' => 'Process Documentation',
        'evidence_owner' => 'IT Security Lead',
        'evidence_reference_link' => 'https://docs.example.com/access-process',
        'evidence_description' => 'User onboarding and offboarding approval tickets.',
        'source_system' => 'Jira Service Desk',
        'frequency' => 'Monthly',
        'freshness' => '30 Days',
        'auditor_validation_method' => 'Sample Testing',
        'test_procedure' => 'Review 25 random user account creations.',
        'evidence_checklist' => 'Manager approval ticket attached.',
        'expected_result' => 'All sampled accounts have valid tickets.',
        'pass_criteria' => '100% compliance',
        'fail_criteria' => 'Any unapproved access account',
        'test_frequency' => 'Quarterly',
        'test_method' => 'Manual Audit',
        'display_order' => 1,
    ]);
});

// Helper function to create an active client with whitelisted IP and Sanctum token
function createClientWithToken(
    array $permissions = ['frameworks', 'domains', 'controls', 'requirements', 'requirement-evidence-mappings'],
    array $ips = ['203.0.113.10'],
    bool $isActive = true,
    ?Carbon $expiresAt = null,
    array $abilities = ['*']
) {
    $client = ApiClient::create([
        'name' => 'Test Partner Client',
        'description' => 'Test client description',
        'is_active' => $isActive,
        'permissions' => $permissions,
    ]);

    foreach ($ips as $ip) {
        $client->ips()->create([
            'ip_address' => $ip,
            'label' => 'Authorized Node',
            'is_active' => true,
        ]);
    }

    $tokenResult = $client->createToken('test-token', $abilities, $expiresAt);

    return [
        'client' => $client,
        'token' => $tokenResult->plainTextToken,
        'accessToken' => $tokenResult->accessToken,
    ];
}

// 1. Valid token + whitelisted IP + authorized module: request succeeds.
test('case 1: valid token + whitelisted IP + authorized module succeeds with 200', function () {
    $data = createClientWithToken(
        permissions: ['controls'],
        ips: ['203.0.113.10'],
        abilities: ['controls:read']
    );

    $response = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/controls');

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => ['id', 'control_id', 'name', 'slug']
        ]
    ]);
});

// 2. Valid token + non-whitelisted IP: request is rejected.
test('case 2: valid token + non-whitelisted IP is rejected with 403', function () {
    $data = createClientWithToken(
        permissions: ['controls'],
        ips: ['203.0.113.10'],
        abilities: ['controls:read']
    );

    // Request from non-whitelisted IP
    $response = $this->withServerVariables(['REMOTE_ADDR' => '198.51.100.99'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/controls');

    $response->assertStatus(403);
    $response->assertJsonFragment([
        'message' => 'Forbidden: Your IP address is not whitelisted for this API client.',
        'client_ip' => '198.51.100.99',
    ]);
});

// 3. Missing token: request is rejected.
test('case 3: missing token is rejected with 401', function () {
    $response = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->getJson('/api/v1/controls');

    $response->assertStatus(401);
});

// 4. Invalid token: request is rejected.
test('case 4: invalid token is rejected with 401', function () {
    $response = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer invalid-token-secret-string-12345')
        ->getJson('/api/v1/controls');

    $response->assertStatus(401);
});

// 5. Revoked token: request is rejected.
test('case 5: revoked token is rejected', function () {
    $data = createClientWithToken(
        permissions: ['controls'],
        ips: ['203.0.113.10'],
        abilities: ['controls:read']
    );

    // Revoke the token
    $data['accessToken']->delete();

    $response = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/controls');

    $response->assertStatus(401);
});

// 6. Inactive API client: request is rejected.
test('case 6: inactive API client is rejected with 403', function () {
    $data = createClientWithToken(
        permissions: ['controls'],
        ips: ['203.0.113.10'],
        isActive: false, // inactive client
        abilities: ['controls:read']
    );

    $response = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/controls');

    $response->assertStatus(403);
    $response->assertJsonFragment([
        'message' => 'Forbidden: API client account is inactive.',
    ]);
});

// 7. Expired token: request is rejected.
test('case 7: expired token is rejected with 403', function () {
    $data = createClientWithToken(
        permissions: ['controls'],
        ips: ['203.0.113.10'],
        expiresAt: Carbon::now()->subMinutes(10), // expired 10 minutes ago
        abilities: ['controls:read']
    );

    $response = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/controls');

    // Denied by Sanctum authentication or middleware check
    expect(in_array($response->status(), [401, 403]))->toBeTrue();
});

// 8. Valid token + unauthorized module: request is rejected.
test('case 8: valid token + unauthorized module is rejected with 403', function () {
    // Client only has permission for 'frameworks', not 'controls'
    $data = createClientWithToken(
        permissions: ['frameworks'],
        ips: ['203.0.113.10'],
        abilities: ['frameworks:read']
    );

    $response = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/controls');

    $response->assertStatus(403);
    $response->assertJsonFragment([
        'message' => "Forbidden: Client is not authorized to access the 'controls' module.",
    ]);
});

// 9. Multiple whitelisted IPs: each authorized IP can access the permitted API.
test('case 9: multiple whitelisted IPs can each access the permitted API', function () {
    $ips = ['203.0.113.10', '203.0.113.11', '198.51.100.20'];

    $data = createClientWithToken(
        permissions: ['frameworks', 'domains', 'controls', 'requirements'],
        ips: $ips,
        abilities: ['*']
    );

    foreach ($ips as $ip) {
        $response = $this->withServerVariables(['REMOTE_ADDR' => $ip])
            ->withHeader('Authorization', 'Bearer ' . $data['token'])
            ->getJson('/api/v1/frameworks');

        $response->assertStatus(200);
    }
});

// 10. An IP not present in the whitelist cannot access the API.
test('case 10: an IP not present in the whitelist cannot access the API', function () {
    $data = createClientWithToken(
        permissions: ['frameworks'],
        ips: ['203.0.113.10', '203.0.113.11'],
        abilities: ['frameworks:read']
    );

    // IP not in whitelist
    $response = $this->withServerVariables(['REMOTE_ADDR' => '192.0.2.55'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/frameworks');

    $response->assertStatus(403);
});

// 10b. Token-specific IP restriction policy
test('token-specific IP restrictions enforce token-scoped whitelist', function () {
    $client = ApiClient::create([
        'name' => 'Scoped IP Client',
        'is_active' => true,
        'permissions' => ['controls'],
    ]);

    // Global IP
    $client->ips()->create([
        'ip_address' => '203.0.113.10',
        'is_active' => true,
        'personal_access_token_id' => null,
    ]);

    $token1 = $client->createToken('token-1', ['controls:read']);
    $token2 = $client->createToken('token-2', ['controls:read']);

    // Restrict token2 to only 198.51.100.50
    $client->ips()->create([
        'ip_address' => '198.51.100.50',
        'is_active' => true,
        'personal_access_token_id' => $token2->accessToken->id,
    ]);

    // Token 1 has no token-specific IP, so it uses global IP 203.0.113.10
    $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $token1->plainTextToken)
        ->getJson('/api/v1/controls')
        ->assertStatus(200);

    // Reset auth guard between requests to test token 2 independently
    $this->app['auth']->forgetGuards();

    // Token 2 has token-specific IP 198.51.100.50, so it succeeds from that IP
    $this->withServerVariables(['REMOTE_ADDR' => '198.51.100.50'])
        ->withHeader('Authorization', 'Bearer ' . $token2->plainTextToken)
        ->getJson('/api/v1/controls')
        ->assertStatus(200);

    $this->app['auth']->forgetGuards();

    // Token 2 cannot access from global IP 203.0.113.10 because it is token-restricted to 198.51.100.50
    $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $token2->plainTextToken)
        ->getJson('/api/v1/controls')
        ->assertStatus(403);
});

// 11. Unauthorized users cannot access API management dashboard routes.
test('case 11: unauthorized guest users cannot access API management dashboard routes', function () {
    // Unauthenticated GET to index
    $this->get('/api-clients')->assertRedirect('/login');

    // Unauthenticated GET to create
    $this->get('/api-clients/create')->assertRedirect('/login');

    // Unauthenticated POST to store
    $this->post('/api-clients', ['name' => 'Hacker Client'])->assertRedirect('/login');
});

test('case 11b: authenticated user can access API management dashboard routes', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/api-clients')
        ->assertStatus(200)
        ->assertSee('API Access Management');
});

// 12. Duplicate and malformed IP addresses are rejected.
test('case 12: malformed and duplicate IP addresses are rejected during client creation', function () {
    $user = User::factory()->create();

    // Malformed IP
    $responseMalformed = $this->actingAs($user)->post('/api-clients', [
        'name' => 'Bad IP Client',
        'permissions' => ['controls'],
        'ips' => [
            ['ip' => '999.999.999.999', 'label' => 'Invalid IP'],
        ],
    ]);
    $responseMalformed->assertSessionHasErrors(['ips.0.ip']);

    // Duplicate IP within creation request
    $responseDuplicate = $this->actingAs($user)->post('/api-clients', [
        'name' => 'Duplicate IP Client',
        'permissions' => ['controls'],
        'ips' => [
            ['ip' => '203.0.113.10', 'label' => 'First'],
            ['ip' => '203.0.113.10', 'label' => 'Second duplicate'],
        ],
    ]);
    $responseDuplicate->assertSessionHasErrors('ips');
});

test('case 12b: duplicate IP is rejected when added via storeIp endpoint', function () {
    $user = User::factory()->create();
    $client = ApiClient::create([
        'name' => 'Existing Client',
        'is_active' => true,
        'permissions' => ['controls'],
    ]);

    $client->ips()->create([
        'ip_address' => '203.0.113.10',
        'is_active' => true,
    ]);

    // Attempt to add duplicate global IP
    $response = $this->actingAs($user)->post("/api-clients/{$client->id}/ips", [
        'ip_address' => '203.0.113.10',
    ]);

    $response->assertSessionHasErrors('ip_address');
});

// 13. Existing Frameworks, Domains, Controls, Requirements, and Requirement Evidence Mappings API response structures remain compatible.
test('case 13: all five API modules return compatible JSON structures', function () {
    $this->withoutMiddleware(\Illuminate\Routing\Middleware\ThrottleRequests::class);

    $data = createClientWithToken(
        permissions: ['frameworks', 'domains', 'controls', 'requirements', 'requirement-evidence-mappings'],
        ips: ['203.0.113.10'],
        abilities: ['*']
    );

    // 1. Controls
    $controlsResp = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/controls');
    $controlsResp->assertStatus(200);
    $controlsResp->assertJsonPath('data.0.control_id', 'CTRL-AC-01');
    $controlsResp->assertJsonPath('data.0.name', 'User Registration and Deregistration');

    // 2. Frameworks
    $frameworksResp = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/frameworks');
    $frameworksResp->assertStatus(200);
    $frameworksResp->assertJsonPath('data.0.framework_id', 'FWK-ISO-27001');
    $frameworksResp->assertJsonPath('data.0.name', 'ISO/IEC 27001');

    // 3. Domains
    $domainsResp = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/domains');
    $domainsResp->assertStatus(200);
    $domainsResp->assertJsonPath('data.0.domain_id', 'DOM-ACCESS');
    $domainsResp->assertJsonPath('data.0.name', 'Access Control');

    // 4. Requirements
    $requirementsResp = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/requirements');
    $requirementsResp->assertStatus(200);
    $requirementsResp->assertJsonPath('data.0.requirement_id', 'REQ-AC-01-A');
    $requirementsResp->assertJsonPath('data.0.requirement_title', 'Formal User Registration Process');

    // 5. Requirement Evidence Mappings
    $mappingsResp = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/requirement-evidence-mappings');
    $mappingsResp->assertStatus(200);
    $mappingsResp->assertJsonPath('data.0.requirement_id', 'REQ-AC-01-A');
    $mappingsResp->assertJsonPath('data.0.control_id', 'CTRL-AC-01');
    $mappingsResp->assertJsonPath('data.0.evidence_type', 'Process Documentation');
    $mappingsResp->assertJsonPath('data.0.evidence_owner', 'IT Security Lead');
    $mappingsResp->assertJsonPath('data.0.source_system', 'Jira Service Desk');
});

test('requirement-evidence-mappings endpoint requires specific module permission and ability', function () {
    $this->withoutMiddleware(\Illuminate\Routing\Middleware\ThrottleRequests::class);

    // Client without requirement-evidence-mappings permission
    $dataUnauthorized = createClientWithToken(
        permissions: ['controls'],
        ips: ['203.0.113.10'],
        abilities: ['controls:read']
    );

    $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $dataUnauthorized['token'])
        ->getJson('/api/v1/requirement-evidence-mappings')
        ->assertStatus(403);

    // Reset auth guard between requests in the same test
    $this->app['auth']->forgetGuards();

    // Client with requirement-evidence-mappings permission and ability
    $dataAuthorized = createClientWithToken(
        permissions: ['requirement-evidence-mappings'],
        ips: ['203.0.113.10'],
        abilities: ['requirement-evidence-mappings:read']
    );

    $resp = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $dataAuthorized['token'])
        ->getJson('/api/v1/requirement-evidence-mappings');

    $resp->assertStatus(200);
    $resp->assertJsonPath('data.0.requirement_id', 'REQ-AC-01-A');
});

// Additional test: token generation and revocation via controller
test('admin can generate and revoke tokens with proper audit logging', function () {
    $user = User::factory()->create();
    $client = ApiClient::create([
        'name' => 'Token Lifecycle Client',
        'is_active' => true,
        'permissions' => ['frameworks', 'domains'],
    ]);

    // Generate Token
    $genResp = $this->actingAs($user)->post("/api-clients/{$client->id}/tokens", [
        'token_name' => 'production-sync',
        'abilities' => ['frameworks:read'],
    ]);

    $genResp->assertRedirect();
    $genResp->assertSessionHas('plainTextToken');
    $genResp->assertSessionHas('newTokenName', 'production-sync');

    $token = $client->tokens()->where('name', 'production-sync')->first();
    expect($token)->not->toBeNull();
    expect($token->can('frameworks:read'))->toBeTrue();
    expect($token->can('controls:read'))->toBeFalse();

    // Revoke Token
    $revokeResp = $this->actingAs($user)->delete("/api-clients/{$client->id}/tokens/{$token->id}");
    $revokeResp->assertRedirect();

    expect($client->tokens()->where('name', 'production-sync')->exists())->toBeFalse();
});

test('api rate limit of 3 hits per minute is enforced with 429 response', function () {
    $data = createClientWithToken(
        permissions: ['controls'],
        ips: ['203.0.113.10'],
        abilities: ['*']
    );

    // Hits 1 to 3 should succeed (HTTP 200)
    for ($i = 0; $i < 3; $i++) {
        $resp = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
            ->withHeader('Authorization', 'Bearer ' . $data['token'])
            ->getJson('/api/v1/controls');
        $resp->assertStatus(200);
    }

    // 4th hit within 1 minute must return HTTP 429
    $fourthResp = $this->withServerVariables(['REMOTE_ADDR' => '203.0.113.10'])
        ->withHeader('Authorization', 'Bearer ' . $data['token'])
        ->getJson('/api/v1/controls');
    $fourthResp->assertStatus(429);
    $fourthResp->assertJson([
        'status' => 'error',
        'message' => 'Too many requests. You are allowed 3 requests per minute.',
    ]);
});

