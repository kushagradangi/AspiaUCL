<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Control;
use App\Models\Domain;
use App\Models\Framework;
use App\Models\Requirement;

Route::get('/v1/controls', function (Request $request) {
    if (! $request->user()->tokenCan('ucl:read')) {
        return response()->json([
            'message' => 'Unauthorized to read controls.',
        ], 403);
    }

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
})->middleware('auth:sanctum');

Route::get('/v1/frameworks', function (Request $request) {
    if (! $request->user()->tokenCan('ucl:read')) {
        return response()->json([
            'message' => 'Unauthorized to read frameworks.',
        ], 403);
    }

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
})->middleware('auth:sanctum');

Route::get('/v1/domains', function (Request $request) {
    if (! $request->user()->tokenCan('ucl:read')) {
        return response()->json([
            'message' => 'Unauthorized to read domains.',
        ], 403);
    }

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
})->middleware('auth:sanctum');

Route::get('/v1/requirements', function (Request $request) {
    if (! $request->user()->tokenCan('ucl:read')) {
        return response()->json([
            'message' => 'Unauthorized to read requirements.',
        ], 403);
    }

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
})->middleware('auth:sanctum');