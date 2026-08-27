<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Control extends Model
{
    protected $fillable = [

        // Relationship
        'domain_id',

        // 1. Control ID
        'control_id',

        // 2. Domain Code
        'domain_code',

        // 3. Control Name
        'name',

        // 4. Business Description
        'business_description',

        // 5. Business Objective
        'business_objective',

        // 6. Business Owner
        'business_owner',

        // 7. Control Category
        'control_category',

        // 8. Criticality
        'criticality',

        // 9. Applicable Industries
        'applicable_industries',

        // 10. Applicable Technologies
        'applicable_technologies',

        // 11. Status
        'status',

        // 12. Version
        'version',

        // 13. Control Summary
        'control_summary',

        // 14. Business Benefits
        'business_benefits',

        // 15. Business Risks if Missing
        'business_risks_if_missing',

        // 16. Primary Stakeholders
        'primary_stakeholders',

        // 17. Control Type
        'control_type',

        // 18. Display Order
        'display_order',
    ];


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Control belongs to Domain.
     */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(
            Domain::class,
            'domain_id'
        );
    }

    /**
     * Control has many Requirements.
     */
    public function requirements(): HasMany
    {
        return $this->hasMany(
            Requirement::class,
            'control_id',
            'control_id'
        );
    }

    /**
     * Get grandparent Framework through Domain.
     */
    public function getFrameworkAttribute(): ?Framework
    {
        return $this->domain?->framework;
    }
}