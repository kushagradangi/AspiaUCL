<?php

namespace App\Models;

use App\Models\Traits\CapitalizesFirstLetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequirementEvidenceMapping extends Model
{
    use HasFactory, CapitalizesFirstLetter;

    protected $table = 'requirement_evidence_mappings';

    protected $fillable = [
        // Requirement Information (Columns A - D)
        'requirement_id',
        'control_id',
        'requirement_title',
        'requirement',

        // Evidence Specifications (Columns E - K)
        'evidence_type',
        'evidence_owner',
        'evidence_reference_link',
        'evidence_description',
        'source_system',
        'frequency',
        'freshness',

        // Audit & Testing Procedures (Columns L - S)
        'auditor_validation_method',
        'test_procedure',
        'evidence_checklist',
        'expected_result',
        'pass_criteria',
        'fail_criteria',
        'test_frequency',
        'test_method',

        // Display & Meta
        'display_order',
    ];

    /**
     * Relationship: Linked Requirement (by requirement_id)
     */
    public function requirement(): BelongsTo
    {
        return $this->belongsTo(Requirement::class, 'requirement_id', 'requirement_id');
    }

    /**
     * Relationship: Linked Control (by control_id)
     */
    public function control(): BelongsTo
    {
        return $this->belongsTo(Control::class, 'control_id', 'control_id');
    }
}

