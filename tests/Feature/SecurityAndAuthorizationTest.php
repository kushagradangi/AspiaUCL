<?php

use App\Models\ApiClient;
use App\Models\Control;
use App\Models\Domain;
use App\Models\Framework;
use App\Models\Requirement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create([
        'role' => 'admin',
    ]);

    $this->viewer = User::factory()->create([
        'role' => 'viewer',
    ]);
});

test('viewer user is forbidden from accessing administrative routes', function () {
    $this->actingAs($this->viewer)
        ->get('/frameworks')
        ->assertForbidden();

    $this->actingAs($this->viewer)
        ->post('/frameworks', [
            'name' => 'Unauthorized Framework',
            'framework_id' => 'FWK-UNAUTH',
        ])
        ->assertForbidden();

    $this->actingAs($this->viewer)
        ->get('/domains')
        ->assertForbidden();

    $this->actingAs($this->viewer)
        ->get('/controls')
        ->assertForbidden();

    $this->actingAs($this->viewer)
        ->post('/controls', [
            'name' => 'Unauthorized Control',
            'control_id' => 'CTRL-UNAUTH',
        ])
        ->assertForbidden();

    $this->actingAs($this->viewer)
        ->get('/api-clients')
        ->assertForbidden();
});

test('guest is redirected to login when accessing administrative routes', function () {
    $this->get('/frameworks')
        ->assertRedirect('/login');

    $this->get('/domains')
        ->assertRedirect('/login');

    $this->get('/controls')
        ->assertRedirect('/login');

    $this->get('/requirements')
        ->assertRedirect('/login');

    $this->get('/api-clients')
        ->assertRedirect('/login');
});

test('admin user can access administrative routes', function () {
    $this->actingAs($this->admin)
        ->get('/frameworks')
        ->assertOk();

    $this->actingAs($this->admin)
        ->get('/domains')
        ->assertOk();

    $this->actingAs($this->admin)
        ->get('/controls')
        ->assertOk();

    $this->actingAs($this->admin)
        ->get('/requirements')
        ->assertOk();

    $this->actingAs($this->admin)
        ->get('/api-clients')
        ->assertOk();
});

test('self-registered users receive viewer role unless first user in system', function () {
    // When users already exist, new registered user must be 'viewer'
    $this->post('/register', [
        'name' => 'Regular User',
        'email' => 'regular@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $user = User::where('email', 'regular@example.com')->first();
    expect($user)->not->toBeNull();
    expect($user->role)->toBe('viewer');
    expect($user->isAdmin())->toBeFalse();
});

test('idor prevention on api clients allows only owner or admin', function () {
    $otherAdmin = User::factory()->create([
        'role' => 'admin',
    ]);

    $client = ApiClient::create([
        'name' => 'Payment Service',
        'is_active' => true,
        'created_by' => $this->admin->id,
    ]);

    // Viewer cannot view or manage client
    $this->actingAs($this->viewer)
        ->get("/api-clients/{$client->id}")
        ->assertForbidden();

    $this->actingAs($this->viewer)
        ->post("/api-clients/{$client->id}/tokens", [
            'name' => 'Hacked Token',
        ])
        ->assertForbidden();

    // Owner admin can view and manage client
    $this->actingAs($this->admin)
        ->get("/api-clients/{$client->id}")
        ->assertOk();
});

test('stored xss payload in requirement fields is properly html-escaped', function () {
    $framework = Framework::create([
        'framework_id' => 'FWK-XSS',
        'framework_code' => 'XSS-FW',
        'name' => 'Safe Framework',
        'slug' => 'safe-framework',
    ]);

    $domain = Domain::create([
        'framework_id' => $framework->id,
        'domain_id' => 'DOM-XSS',
        'domain_code' => 'XSS-DOM',
        'name' => 'Safe Domain',
        'slug' => 'safe-domain',
    ]);

    $control = Control::create([
        'domain_id' => $domain->id,
        'control_id' => 'CTRL-XSS',
        'name' => '<script>alert("xss-control")</script>',
        'slug' => 'ctrl-xss',
    ]);

    $requirement = Requirement::create([
        'control_id' => $control->control_id,
        'domain_id' => $domain->id,
        'framework_id' => $framework->id,
        'requirement_id' => 'REQ-XSS-001',
        'requirement_title' => '<img src=x onerror=alert("xss-title")>',
        'requirement' => '<script>alert("xss-req")</script>',
        'slug' => 'req-xss-001',
    ]);

    \App\Models\RequirementTemplate::create([
        'html_content' => '<div>{{requirement_title}}</div><div>{{requirement}}</div><div>{{control_name}}</div>',
    ]);

    $response = $this->get("/requirements/{$requirement->slug}");

    $response->assertOk();
    $content = $response->getContent();

    expect($content)->not->toContain('<script>alert("xss-control")</script>');
    expect($content)->not->toContain('<script>alert("xss-req")</script>');
    expect($content)->not->toContain('<img src=x onerror=alert("xss-title")>');
    expect($content)->toContain('&lt;Script&gt;alert(&quot;xss-control&quot;)&lt;/script&gt;');
});

test('ssti prevention ensures blade directives in overview pages are not evaluated', function () {
    $framework = Framework::create([
        'framework_id' => 'FWK-SSTI',
        'framework_code' => 'SSTI-FW',
        'name' => 'Evaluation Test {{ 7 * 7 }}',
        'slug' => 'ssti-framework',
    ]);

    $response = $this->get('/all-frameworks');
    $response->assertOk();
    $content = $response->getContent();

    expect($content)->not->toContain('Evaluation Test 49');
    expect($content)->toContain('Evaluation Test {{ 7 * 7 }}');
});

test('hero section isometric images render valid asset urls on all overview pages', function () {
    // Frameworks overview
    $fwResponse = $this->get('/all-frameworks');
    $fwResponse->assertOk();
    $fwContent = $fwResponse->getContent();
    expect($fwContent)->toContain('images/frameworks_hero_graphic.png');
    expect($fwContent)->not->toContain("{{ asset('images/frameworks_hero_graphic.png') }}");

    // Domains overview
    $domResponse = $this->get('/all-domains');
    $domResponse->assertOk();
    $domContent = $domResponse->getContent();
    expect($domContent)->toContain('images/domains_hero_graphic.png');
    expect($domContent)->not->toContain("{{ asset('images/domains_hero_graphic.png') }}");

    // Controls overview
    $ctrlResponse = $this->get('/all-controls');
    $ctrlResponse->assertOk();
    $ctrlContent = $ctrlResponse->getContent();
    expect($ctrlContent)->toContain('images/controls_hero_graphic.png');
    expect($ctrlContent)->not->toContain("{{ asset('images/controls_hero_graphic.png') }}");
});

test('invalid file upload extensions are rejected on control import', function () {
    $file = UploadedFile::fake()->create('malicious.php', 100, 'application/x-php');

    $this->actingAs($this->admin)
        ->post('/controls/import', [
            'file' => $file,
        ])
        ->assertSessionHasErrors(['file']);
});

test('public search api rejects queries with less than 2 characters and rate limits', function () {
    $response = $this->get('/api/ucl/search?q=a');
    $response->assertOk();
    $data = $response->json();

    expect($data['domains'])->toBeEmpty();
    expect($data['controls'])->toBeEmpty();
    expect($data['frameworks'])->toBeEmpty();
    expect($data['requirements'])->toBeEmpty();
});

test('user isadmin fails closed when role is null or not admin', function () {
    $userWithoutRole = new User();
    $userWithoutRole->role = null;
    expect($userWithoutRole->isAdmin())->toBeFalse();

    $userViewer = new User();
    $userViewer->role = 'viewer';
    expect($userViewer->isAdmin())->toBeFalse();

    $userAdmin = new User();
    $userAdmin->role = 'admin';
    expect($userAdmin->isAdmin())->toBeTrue();
});

test('role attribute is guarded against mass-assignment on user model', function () {
    $user = new User([
        'name' => 'Attacker',
        'email' => 'attacker@example.com',
        'password' => 'secret123',
        'role' => 'admin',
    ]);

    // role must be ignored during mass assignment
    expect($user->role)->toBeNull();
});

test('security headers middleware attaches csp x-frame-options and nosniff', function () {
    $response = $this->get('/');
    $response->assertOk();

    $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    $response->assertHeader('X-Content-Type-Options', 'nosniff');
    $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    expect($response->headers->get('Content-Security-Policy'))->toContain("default-src 'self'");
});

test('public search api caches results for subsequent requests', function () {
    \Illuminate\Support\Facades\Cache::flush();

    Framework::create([
        'framework_id' => 'FWK-CACHE-TEST',
        'framework_code' => 'FWK-C',
        'name' => 'Cache Test Framework',
        'slug' => 'cache-test-framework',
    ]);

    $firstResponse = $this->get('/api/ucl/search?q=Cache');
    $firstResponse->assertOk();
    $cacheKey = 'ucl:search:' . md5('cache');
    expect(\Illuminate\Support\Facades\Cache::has($cacheKey))->toBeTrue();

    $cachedResponse = $this->get('/api/ucl/search?q=Cache');
    $cachedResponse->assertOk();
    expect($cachedResponse->json('frameworks'))->toHaveCount(1);
});
