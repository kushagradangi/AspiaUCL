<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Requirement extends Model
{
    protected $fillable = [

        // Requirement ID
        'requirement_id',

        // Control ID
        'control_id',

        // Requirement Title
        'requirement_title',

        // Requirement
        'requirement',

        // Why this Requirement Exists
        'why_requirement_exists',

        // Implementation Guidance
        'implementation_guidance',

        // Common Audit Findings
        'common_audit_findings',

        // Common Mistakes
        'common_mistakes',

        // Best Practices
        'best_practices',

        // Business Examples
        'business_examples',

        // Typical Owner
        'typical_owner',

        // Display Order
        'display_order',

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Requirement belongs to Control.
     */
    public function control(): BelongsTo
    {
        return $this->belongsTo(
            Control::class,
            'control_id',
            'control_id'
        );
    }

    /**
     * Get parent Domain through Control.
     */
    public function getDomainAttribute(): ?Domain
    {
        return $this->control?->domain;
    }

    /**
     * Get grandparent Framework through Control -> Domain.
     */
    public function getFrameworkAttribute(): ?Framework
    {
        return $this->control?->domain?->framework;
    }
}