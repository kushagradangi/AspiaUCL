<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = [

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

        // 8. Applicable Industries
        'applicable_industries',

        // 9. Applicable Technologies
        'applicable_technologies',

        // 10. Description
        'description',

        // 11. Display Order
        'display_order',

        // 12. Status
        'status',

        // 13. Version
        'version',

        // 14. Domain Name #2
        'domain_name_2',

        // 15. Short Overview
        'short_overview',

        // 16. Business Objectives
        'business_objectives',

        // 17. Business Objectives #2
        'business_objectives_2',

        // 18. Business Risks
        'business_risks',

        // 19. Key Capabilities
        'key_capabilities',

        // 20. Typical Stakeholders
        'typical_stakeholders',

        // 21. Applicable Industries #2
        'applicable_industries_2',

        // 22. Applicable Technologies #2
        'applicable_technologies_2',

        // 23. Keywords
        'keywords',

        // 24. Tags
        'tags',

        // 25. Why This Domain Matters
        'why_domain_matters',

        // 26. Common Challenges
        'common_challenges',

        // 27. Related Domains
        'related_domains',

        // 28. Related Frameworks
        'related_frameworks',
    ];
}