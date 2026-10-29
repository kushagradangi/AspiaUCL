<?php

namespace App\Models;

use App\Models\Traits\CapitalizesFirstLetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requirement extends Model
{
    use CapitalizesFirstLetter;

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

        // Slug
        'slug',
    ];

    /**
     * Boot model events to auto-generate unique slug.
     */
    protected static function booted(): void
    {
        static::saving(function (Requirement $requirement) {
            if (empty($requirement->slug) || ($requirement->isDirty('requirement_title') && !$requirement->isDirty('slug'))) {
                $requirement->slug = static::generateUniqueSlug(
                    $requirement->requirement_title ?? '',
                    $requirement->id,
                    $requirement->requirement_id ?? null
                );
            }
        });
    }

    /**
     * Generate a unique URL slug for the Requirement.
     */
    public static function generateUniqueSlug(?string $title, ?int $ignoreId = null, ?string $reqId = null): string
    {
        $baseSlug = \Illuminate\Support\Str::slug($title ?? '');
        if (empty($baseSlug)) {
            $baseSlug = \Illuminate\Support\Str::slug($reqId ?: 'requirement');
        }

        $slug = $baseSlug;
        $counter = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

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
     * Requirement has many Framework Mappings.
     */
    public function frameworkMappings()
    {
        return $this->hasMany(
            RequirementFrameworkMapping::class,
            'requirement_id',
            'requirement_id'
        );
    }

    /**
     * Requirement has many Evidence Mappings.
     */
    public function evidenceMappings(): HasMany
    {
        return $this->hasMany(
            RequirementEvidenceMapping::class,
            'requirement_id',
            'requirement_id'
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