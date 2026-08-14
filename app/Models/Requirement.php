<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Requirement extends Model
{
    protected $fillable = [

        'control_id',

        'requirement_id',

        'requirement_title',

        'requirement',

        'why_requirement_exists',

        'implementation_guidance',

        'common_audit_findings',

        'common_mistakes',

        'best_practices',

        'business_examples',

        'typical_owner',

    ];


    /**
     * Requirement belongs to a Control.
     */
    public function control(): BelongsTo
    {
        return $this->belongsTo(
            Control::class
        );
    }
}