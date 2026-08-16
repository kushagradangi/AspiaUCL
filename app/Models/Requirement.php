<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    ];
}