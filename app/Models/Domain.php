<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    protected $fillable = [

        // Relationship
        'framework_id',

        // 1. Domain ID
        'domain_id',

        // 2. Domain Code
        'domain_code',

        // 3. Domain Name
        'name',

        // 4. Slug
        'slug',

        // 5. Purpose
        'purpose',

        // 6. Scope
        'scope',

        // 7. Business Owner
        'business_owner',

        // 8. Description
        'description',

        // 9. Display Order
        'display_order',

        // 10. Status
        'status',

        // 11. Version
        'version',

        // 12. Short Overview
        'short_overview',

        // 13. Business Objectives
        'business_objectives',

        // 14. Business Risks
        'business_risks',

        // 15. Key Capabilities
        'key_capabilities',

        // 16. Typical Stakeholders
        'typical_stakeholders',

        // 17. Applicable Industries
        'applicable_industries',

        // 18. Applicable Technologies
        'applicable_technologies',

        // 19. Keywords
        'keywords',

        // 20. Tags
        'tags',

        // 21. Why This Domain Matters
        'why_domain_matters',

        // 22. Common Challenges
        'common_challenges',

        // 23. Related Domains
        'related_domains',

        // 24. Related Frameworks
        'related_frameworks',
    ];

    /**
     * Domain belongs to Framework.
     */
    public function framework(): BelongsTo
    {
        return $this->belongsTo(Framework::class, 'framework_id');
    }

    /**
     * Domain has many Controls.
     */
    public function controls(): HasMany
    {
        return $this->hasMany(Control::class, 'domain_id');
    }
}