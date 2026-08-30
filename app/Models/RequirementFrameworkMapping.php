<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequirementFrameworkMapping extends Model
{
    protected $table = 'requirement_framework_mappings';

    protected $fillable = [
        'requirement_id',
        'framework_name',
        'framework_code',
        'framework_id',
        'clause_reference',
    ];

    /**
     * Mapping belongs to Requirement.
     */
    public function requirement(): BelongsTo
    {
        return $this->belongsTo(Requirement::class, 'requirement_id', 'requirement_id');
    }

    /**
     * Mapping belongs to Framework (if linked).
     */
    public function framework(): BelongsTo
    {
        return $this->belongsTo(Framework::class, 'framework_id');
    }
}
