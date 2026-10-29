<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ApiClient;
use App\Models\ApiClientIp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ApiClientController extends Controller
{
    /**
     * Available modules in the UCL application.
     */
    public const AVAILABLE_MODULES = [
        'frameworks'                     => 'Frameworks',
        'domains'                        => 'Domains',
        'controls'                       => 'Controls',
        'requirements'                   => 'Requirements',
        'requirement-evidence-mappings'  => 'Requirement Evidence Mappings',
    ];

    /**
     * Display a listing of API clients and summary dashboard metrics.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $query = ApiClient::query()
            ->with(['ips', 'tokens'])
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->latest('id');

        $clients = $query->paginate(10)->withQueryString();

        // Calculate dashboard statistics
        $totalClients = ApiClient::count();
        $activeClients = ApiClient::where('is_active', true)->count();
        $inactiveClients = ApiClient::where('is_active', false)->count();
        $totalWhitelistedIps = ApiClientIp::count();

        // Count tokens associated with ApiClient
        $allTokens = DB::table('personal_access_tokens')
            ->where('tokenable_type', ApiClient::class)
            ->get();

        $activeTokens = $allTokens->filter(function ($token) {
            return is_null($token->expires_at) || Carbon::parse($token->expires_at)->isFuture();
        })->count();

        $revokedOrExpiredTokens = $allTokens->filter(function ($token) {
            return ! is_null($token->expires_at) && Carbon::parse($token->expires_at)->isPast();
        })->count();

        return view('aspiaUcl.api_clients.index', [
            'clients' => $clients,
            'search' => $search,
            'totalClients' => $totalClients,
            'activeClients' => $activeClients,
            'inactiveClients' => $inactiveClients,
            'totalWhitelistedIps' => $totalWhitelistedIps,
            'activeTokens' => $activeTokens,
            'revokedOrExpiredTokens' => $revokedOrExpiredTokens,
            'availableModules' => self::AVAILABLE_MODULES,
        ]);
    }

    /**
     * Show the form for creating a new API client.
     */
    public function create()
    {
        return view('aspiaUcl.api_clients.create', [
            'availableModules' => self::AVAILABLE_MODULES,
        ]);
    }

    /**
     * Store a newly created API client in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'is_active' => ['nullable', 'boolean'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string', Rule::in(array_keys(self::AVAILABLE_MODULES))],
            'ips' => ['nullable', 'array'],
            'ips.*.ip' => ['nullable', 'ip'],
            'ips.*.label' => ['nullable', 'string', 'max:100'],
        ]);

        // Process IP entries to remove empty strings and duplicates
        $rawIps = $request->input('ips', []);
        $cleanIps = [];
        $seenIps = [];

        foreach ($rawIps as $entry) {
            $ip = isset($entry['ip']) ? trim($entry['ip']) : '';
            if ($ip === '') {
                continue;
            }

            if (! filter_var($ip, FILTER_VALIDATE_IP)) {
                return back()->withInput()->withErrors([
                    'ips' => "Malformed IP address provided: '{$ip}'. Must be a valid IPv4 or IPv6 address.",
                ]);
            }

            $normalized = ApiClient::normalizeIp($ip);
            if (isset($seenIps[$normalized])) {
                return back()->withInput()->withErrors([
                    'ips' => "Duplicate IP address entered: '{$ip}'. Each IP address must be unique.",
                ]);
            }

            $seenIps[$normalized] = true;
            $cleanIps[] = [
                'ip_address' => $ip,
                'label' => isset($entry['label']) && trim($entry['label']) !== '' ? trim($entry['label']) : null,
                'is_active' => true,
            ];
        }

        $client = DB::transaction(function () use ($validated, $cleanIps) {
            $client = ApiClient::create([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'is_active' => isset($validated['is_active']) ? (bool) $validated['is_active'] : true,
                'permissions' => $validated['permissions'] ?? [],
                'created_by' => auth()->id(),
            ]);

            foreach ($cleanIps as $ipData) {
                $client->ips()->create($ipData);
            }

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'api_access',
                'action' => 'Created',
                'description' => "Created API client: {$client->name} with " . count($cleanIps) . ' whitelisted IP(s).',
            ]);

            return $client;
        });

        return redirect()
            ->route('api-clients.show', $client)
            ->with('success', "API client '{$client->name}' created successfully. You can now generate tokens and manage IP whitelists.");
    }

    /**
     * Display the specified API client details, tokens, and IP whitelist.
     */
    public function show(ApiClient $apiClient)
    {
        $apiClient->load([
            'ips.token',
            'tokens' => function ($q) {
                $q->latest();
            },
            'creator',
        ]);

        return view('aspiaUcl.api_clients.show', [
            'client' => $apiClient,
            'availableModules' => self::AVAILABLE_MODULES,
        ]);
    }

    /**
     * Show the form for editing the specified API client.
     */
    public function edit(ApiClient $apiClient)
    {
        return view('aspiaUcl.api_clients.edit', [
            'client' => $apiClient,
            'availableModules' => self::AVAILABLE_MODULES,
        ]);
    }

    /**
     * Update the specified API client in storage.
     */
    public function update(Request $request, ApiClient $apiClient)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'is_active' => ['nullable', 'boolean'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string', Rule::in(array_keys(self::AVAILABLE_MODULES))],
        ]);

        $apiClient->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'is_active' => isset($validated['is_active']) ? (bool) $validated['is_active'] : false,
            'permissions' => $validated['permissions'] ?? [],
        ]);

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'api_access',
            'action' => 'Updated',
            'description' => "Updated API client details and permissions for: {$apiClient->name}",
        ]);

        return redirect()
            ->route('api-clients.show', $apiClient)
            ->with('success', "API client '{$apiClient->name}' updated successfully.");
    }

    /**
     * Remove the specified API client from storage.
     */
    public function destroy(ApiClient $apiClient)
    {
        $clientName = $apiClient->name;

        DB::transaction(function () use ($apiClient, $clientName) {
            $apiClient->delete();

            Activity::create([
                'user_id' => auth()->id(),
                'module' => 'api_access',
                'action' => 'Deleted',
                'description' => "Deleted API client '{$clientName}' and revoked all associated access tokens.",
            ]);
        });

        return redirect()
            ->route('api-clients.index')
            ->with('success', "API client '{$clientName}' and all associated tokens and IP records were permanently deleted.");
    }

    /**
     * Toggle the active status of an API client.
     */
    public function toggleStatus(ApiClient $apiClient)
    {
        $apiClient->is_active = ! $apiClient->is_active;
        $apiClient->save();

        $statusText = $apiClient->is_active ? 'activated' : 'deactivated';

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'api_access',
            'action' => ucfirst($statusText),
            'description' => "API client '{$apiClient->name}' was {$statusText}.",
        ]);

        return back()->with('success', "API client '{$apiClient->name}' has been {$statusText}.");
    }

    /**
     * Generate a new Sanctum Personal Access Token for the client.
     */
    public function generateToken(Request $request, ApiClient $apiClient)
    {
        $validated = $request->validate([
            'token_name' => ['required', 'string', 'max:100'],
            'abilities' => ['nullable', 'array'],
            'abilities.*' => ['string'],
            'expires_at' => ['nullable', 'date', 'after:now'],
        ]);

        // If specific abilities were chosen, validate they match allowed module abilities
        $allowedAbilities = [];
        foreach (array_keys(self::AVAILABLE_MODULES) as $mod) {
            $allowedAbilities[] = "{$mod}:read";
        }
        $allowedAbilities[] = 'ucl:read';

        $selectedAbilities = $validated['abilities'] ?? [];
        if (! empty($selectedAbilities)) {
            $selectedAbilities = array_intersect($selectedAbilities, $allowedAbilities);
        }

        // If no abilities selected, default to the client's configured module permissions
        if (empty($selectedAbilities)) {
            $clientPerms = $apiClient->permissions ?? [];
            foreach ($clientPerms as $perm) {
                $selectedAbilities[] = strtolower($perm) . ':read';
            }
            if (empty($selectedAbilities)) {
                $selectedAbilities = ['ucl:read'];
            }
        }

        $expiresAt = ! empty($validated['expires_at'])
            ? Carbon::parse($validated['expires_at'])
            : null;

        // Create Sanctum Token
        $tokenResult = $apiClient->createToken(
            $validated['token_name'],
            $selectedAbilities,
            $expiresAt
        );

        $plainTextToken = $tokenResult->plainTextToken;

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'api_access',
            'action' => 'Token Generated',
            'description' => "Generated token '{$validated['token_name']}' for client '{$apiClient->name}'.",
        ]);

        return back()
            ->with('success', "Personal access token '{$validated['token_name']}' generated successfully!")
            ->with('plainTextToken', $plainTextToken)
            ->with('newTokenName', $validated['token_name']);
    }

    /**
     * Revoke a specific Personal Access Token.
     */
    public function revokeToken(ApiClient $apiClient, $tokenId)
    {
        $token = $apiClient->tokens()->where('id', $tokenId)->firstOrFail();
        $tokenName = $token->name;

        $token->delete();

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'api_access',
            'action' => 'Token Revoked',
            'description' => "Revoked token '{$tokenName}' (ID: {$tokenId}) for client '{$apiClient->name}'.",
        ]);

        return back()->with('success', "Token '{$tokenName}' has been successfully revoked and can no longer access the API.");
    }

    /**
     * Add a whitelisted IP address to the client.
     */
    public function storeIp(Request $request, ApiClient $apiClient)
    {
        $validated = $request->validate([
            'ip_address' => ['required', 'ip'],
            'label' => ['nullable', 'string', 'max:100'],
            'personal_access_token_id' => ['nullable', 'integer'],
        ]);

        $ip = trim($validated['ip_address']);
        $tokenId = ! empty($validated['personal_access_token_id']) ? (int) $validated['personal_access_token_id'] : null;

        // Verify token belongs to client if provided
        if ($tokenId) {
            $tokenExists = $apiClient->tokens()->where('id', $tokenId)->exists();
            if (! $tokenExists) {
                return back()->withErrors(['personal_access_token_id' => 'The selected token does not belong to this client.']);
            }
        }

        // Check for duplicate IP in same scope
        $existing = $apiClient->ips()
            ->where('ip_address', $ip)
            ->where('personal_access_token_id', $tokenId)
            ->first();

        if ($existing) {
            return back()->withErrors([
                'ip_address' => "IP address '{$ip}' is already registered for this client " . ($tokenId ? 'under this token.' : 'globally.'),
            ]);
        }

        $ipRecord = $apiClient->ips()->create([
            'ip_address' => $ip,
            'label' => ! empty($validated['label']) ? trim($validated['label']) : null,
            'personal_access_token_id' => $tokenId,
            'is_active' => true,
        ]);

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'api_access',
            'action' => 'IP Added',
            'description' => "Whitelisted IP '{$ip}' for client '{$apiClient->name}'" . ($tokenId ? " (scoped to token #{$tokenId})" : ''),
        ]);

        return back()->with('success', "IP address '{$ip}' added to whitelist successfully.");
    }

    /**
     * Delete an IP address from the whitelist.
     */
    public function destroyIp(ApiClient $apiClient, ApiClientIp $ip)
    {
        if ($ip->api_client_id !== $apiClient->id) {
            abort(404);
        }

        $ipAddress = $ip->ip_address;
        $ip->delete();

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'api_access',
            'action' => 'IP Removed',
            'description' => "Removed IP '{$ipAddress}' from whitelist for client '{$apiClient->name}'.",
        ]);

        return back()->with('success', "IP address '{$ipAddress}' removed from whitelist.");
    }

    /**
     * Toggle the active status of a whitelisted IP address.
     */
    public function toggleIpStatus(ApiClient $apiClient, ApiClientIp $ip)
    {
        if ($ip->api_client_id !== $apiClient->id) {
            abort(404);
        }

        $ip->is_active = ! $ip->is_active;
        $ip->save();

        $statusText = $ip->is_active ? 'activated' : 'deactivated';

        Activity::create([
            'user_id' => auth()->id(),
            'module' => 'api_access',
            'action' => 'IP ' . ucfirst($statusText),
            'description' => "Whitelisted IP '{$ip->ip_address}' for client '{$apiClient->name}' was {$statusText}.",
        ]);

        return back()->with('success', "IP address '{$ip->ip_address}' has been {$statusText}.");
    }
}
