<?php

use App\Models\Control;
use App\Models\Domain;
use App\Models\Framework;
use App\Models\Requirement;
use App\Models\RequirementEvidenceMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Protected UCL API Endpoints (Sanctum + IP Whitelist + Module Permissions)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'throttle:api'])->group(function () {

    Route::get('/v1/controls', function (Request $request) {
        $perPage = min(
            max((int) $request->query('per_page', 100), 1),
            500
        );

        return Control::query()
            ->select([
                'id',
                'domain_id',
                'control_id',
                'domain_code',
                'name',
                'slug',
                'business_description',
                'business_objective',
                'business_owner',
                'control_category',
                'criticality',
                'applicable_industries',
                'applicable_technologies',
                'status',
                'version',
                'control_summary',
                'business_benefits',
                'business_risks_if_missing',
                'primary_stakeholders',
                'control_nature',
                'compensating_control',
                'display_order',
                'created_at',
                'updated_at',
            ])
            ->orderBy('id')
            ->paginate($perPage);
    })->middleware('api.client.whitelist:controls');

    Route::get('/v1/frameworks', function (Request $request) {
        $perPage = min(
            max((int) $request->query('per_page', 100), 1),
            500
        );

        return Framework::query()
            ->select([
                'id',
                'framework_id',
                'framework_code',
                'name',
                'slug',
                'version',
                'framework_family',
                'category',
                'publisher',
                'region',
                'industry',
                'framework_type',
                'related_domains',
                'purpose_objective',
                'description',
                'scope',
                'key_focus_areas',
                'structure_domains',
                'certification_assessment',
                'related_frameworks',
                'official_source_url',
                'display_order',
                'created_at',
                'updated_at',
            ])
            ->orderBy('id')
            ->paginate($perPage);
    })->middleware('api.client.whitelist:frameworks');

    Route::get('/v1/domains', function (Request $request) {
        $perPage = min(
            max((int) $request->query('per_page', 100), 1),
            500
        );

        return Domain::query()
            ->select([
                'id',
                'framework_id',
                'domain_id',
                'domain_code',
                'name',
                'slug',
                'purpose',
                'scope',
                'business_owner',
                'description',
                'display_order',
                'status',
                'version',
                'short_overview',
                'business_objectives',
                'business_risks',
                'key_capabilities',
                'typical_stakeholders',
                'applicable_industries',
                'applicable_technologies',
                'keywords',
                'tags',
                'why_domain_matters',
                'common_challenges',
                'related_domains',
                'related_frameworks',
                'created_at',
                'updated_at',
            ])
            ->orderBy('id')
            ->paginate($perPage);
    })->middleware('api.client.whitelist:domains');

    Route::get('/v1/requirements', function (Request $request) {
        $perPage = min(
            max((int) $request->query('per_page', 100), 1),
            500
        );

        return Requirement::query()
            ->select([
                'id',
                'requirement_id',
                'control_id',
                'requirement_title',
                'slug',
                'requirement',
                'why_requirement_exists',
                'implementation_guidance',
                'common_audit_findings',
                'common_mistakes',
                'best_practices',
                'business_examples',
                'typical_owner',
                'display_order',
                'created_at',
                'updated_at',
            ])
            ->orderBy('id')
            ->paginate($perPage);
    })->middleware('api.client.whitelist:requirements');

    Route::get('/v1/requirement-evidence-mappings', function (Request $request) {
        $perPage = min(
            max((int) $request->query('per_page', 100), 1),
            500
        );

        return RequirementEvidenceMapping::query()
            ->select([
                'id',
                'requirement_id',
                'control_id',
                'requirement_title',
                'requirement',
                'evidence_type',
                'evidence_owner',
                'evidence_reference_link',
                'evidence_description',
                'source_system',
                'frequency',
                'freshness',
                'auditor_validation_method',
                'test_procedure',
                'evidence_checklist',
                'expected_result',
                'pass_criteria',
                'fail_criteria',
                'test_frequency',
                'test_method',
                'display_order',
                'created_at',
                'updated_at',
            ])
            ->orderBy('id')
            ->paginate($perPage);
    })->middleware('api.client.whitelist:requirement-evidence-mappings');

});