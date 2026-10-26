<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class ApiClient extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'api_clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'is_active',
        'permissions',
        'created_by',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'permissions' => 'array',
        ];
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleting(function (ApiClient $client) {
            // Revoke all personal access tokens when the client is deleted
            $client->tokens()->delete();
        });
    }

    /**
     * Relationship to whitelisted IP records.
     */
    public function ips(): HasMany
    {
        return $this->hasMany(ApiClientIp::class, 'api_client_id');
    }

    /**
     * Relationship to active whitelisted IP records.
     */
    public function activeIps(): HasMany
    {
        return $this->ips()->where('is_active', true);
    }

    /**
     * User who created this API client.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Check if the client has permission to access a specific module.
     */
    public function hasPermission(string $module): bool
    {
        $perms = $this->permissions ?? [];
        if (! is_array($perms)) {
            return false;
        }

        $normalized = array_map('strtolower', $perms);

        return in_array(strtolower($module), $normalized, true);
    }

    /**
     * Determine if a given IP address is whitelisted for this client.
     *
     * Policy:
     * - If token-specific active IPs exist for $tokenId, $ip must match one of them.
     * - Otherwise, $ip must match any active client-wide IP (where personal_access_token_id is null).
     */
    public function isIpWhitelisted(string $ip, ?int $tokenId = null): bool
    {
        $normalizedInput = self::normalizeIp($ip);
        if (! $normalizedInput) {
            return false;
        }

        // Check if token-specific whitelists exist
        if ($tokenId) {
            $tokenSpecificIps = $this->ips()
                ->where('is_active', true)
                ->where('personal_access_token_id', $tokenId)
                ->pluck('ip_address')
                ->all();

            if (! empty($tokenSpecificIps)) {
                return $this->matchesAnyIp($normalizedInput, $tokenSpecificIps);
            }
        }

        // Fall back to client-wide active IPs
        $clientWideIps = $this->ips()
            ->where('is_active', true)
            ->whereNull('personal_access_token_id')
            ->pluck('ip_address')
            ->all();

        return $this->matchesAnyIp($normalizedInput, $clientWideIps);
    }

    /**
     * Compare a normalized IP against an array of whitelisted IPs.
     */
    protected function matchesAnyIp(string $normalizedInput, array $whitelist): bool
    {
        foreach ($whitelist as $whitelistedIp) {
            $normalizedWhitelisted = self::normalizeIp($whitelistedIp);
            if ($normalizedWhitelisted !== null && hash_equals($normalizedWhitelisted, $normalizedInput)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Normalize an IPv4 or IPv6 address to binary representation for exact comparison.
     */
    public static function normalizeIp(?string $ip): ?string
    {
        if (! $ip) {
            return null;
        }

        $trimmed = trim($ip);
        if (! filter_var($trimmed, FILTER_VALIDATE_IP)) {
            return null;
        }

        $packed = @inet_pton($trimmed);

        return $packed !== false ? $packed : null;
    }
}
