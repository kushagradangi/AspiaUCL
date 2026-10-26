<?php

namespace App\Http\Middleware;

use App\Models\ApiClient;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureApiClientIpIsWhitelisted
{
    /**
     * Handle an incoming request.
     *
     * Validates:
     * 1. Request contains a valid Sanctum bearer token.
     * 2. Authenticated token is associated with an active API client.
     * 3. Client is active and token has not expired or been revoked.
     * 4. Actual client IP address is present in the applicable whitelist.
     * 5. Token and client have the required permission for the requested module.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  $module  Optional module name (e.g. 'frameworks', 'domains', 'controls', 'requirements')
     */
    public function handle(Request $request, Closure $next, ?string $module = null): Response
    {
        $user = $request->user();

        // 1. Validate Sanctum Bearer Token
        if (! $user) {
            return response()->json([
                'message' => 'Unauthenticated: A valid Sanctum bearer token is required.',
            ], 401);
        }

        $token = $user->currentAccessToken();
        if (! $token) {
            return response()->json([
                'message' => 'Unauthenticated: Bearer token could not be verified.',
            ], 401);
        }

        // 2. Validate Token Expiration
        if ($token->expires_at && $token->expires_at->isPast()) {
            Log::warning('API access denied: Token has expired', [
                'token_id' => $token->id,
                'ip' => $request->ip(),
                'path' => $request->path(),
            ]);

            return response()->json([
                'message' => 'Forbidden: API token has expired.',
            ], 403);
        }

        // 3. Resolve and Validate Associated API Client
        $client = null;
        if ($user instanceof ApiClient) {
            $client = $user;
        } elseif (method_exists($token, 'tokenable') && $token->tokenable instanceof ApiClient) {
            $client = $token->tokenable;
        }

        if (! $client) {
            Log::warning('API access denied: Token not associated with an API client', [
                'token_id' => $token->id,
                'user_type' => get_class($user),
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'message' => 'Forbidden: Authenticated token is not associated with an API client.',
            ], 403);
        }

        if (! $client->is_active) {
            Log::warning('API access denied: Inactive API client', [
                'client_id' => $client->id,
                'client_name' => $client->name,
                'ip' => $request->ip(),
                'path' => $request->path(),
            ]);

            return response()->json([
                'message' => 'Forbidden: API client account is inactive.',
            ], 403);
        }

        // 4. Validate IP Address Whitelist
        $clientIp = $request->ip();
        if (! $client->isIpWhitelisted($clientIp, $token->id)) {
            Log::warning('API access denied: IP address not whitelisted', [
                'client_id' => $client->id,
                'client_name' => $client->name,
                'token_id' => $token->id,
                'client_ip' => $clientIp,
                'path' => $request->path(),
            ]);

            return response()->json([
                'message' => 'Forbidden: Your IP address is not whitelisted for this API client.',
                'client_ip' => $clientIp,
            ], 403);
        }

        // 5. Validate Module Permission (if module parameter provided)
        if ($module !== null && $module !== '') {
            $moduleLower = strtolower($module);

            // Client-level module permission check
            if (! $client->hasPermission($moduleLower)) {
                Log::warning('API access denied: Client lacks module permission', [
                    'client_id' => $client->id,
                    'client_name' => $client->name,
                    'module' => $moduleLower,
                    'path' => $request->path(),
                ]);

                return response()->json([
                    'message' => "Forbidden: Client is not authorized to access the '{$moduleLower}' module.",
                ], 403);
            }

            // Token-level ability check
            $hasAbility = $token->can($moduleLower . ':read')
                || $token->can('*')
                || $token->can('ucl:read');

            if (! $hasAbility) {
                Log::warning('API access denied: Token lacks module ability', [
                    'client_id' => $client->id,
                    'token_id' => $token->id,
                    'module' => $moduleLower,
                    'path' => $request->path(),
                ]);

                return response()->json([
                    'message' => "Forbidden: Token does not possess the '{$moduleLower}:read' ability.",
                ], 403);
            }
        }

        return $next($request);
    }
}
