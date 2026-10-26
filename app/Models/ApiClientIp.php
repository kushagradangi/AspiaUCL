<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\Sanctum;

class ApiClientIp extends Model
{
    use HasFactory;

    protected $table = 'api_client_ips';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'api_client_id',
        'ip_address',
        'label',
        'personal_access_token_id',
        'is_active',
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
        ];
    }

    /**
     * Scope a query to only include active IP addresses.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Parent API Client.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(ApiClient::class, 'api_client_id');
    }

    /**
     * Associated Sanctum Personal Access Token (if token-specific).
     */
    public function token(): BelongsTo
    {
        return $this->belongsTo(Sanctum::$personalAccessTokenModel, 'personal_access_token_id');
    }
}
