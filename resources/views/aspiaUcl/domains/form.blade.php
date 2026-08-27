{{-- =========================================================
     DOMAIN FORM - 24 FIELDS
     Exact Excel Order

     IMPORTANT:
     This partial uses $edit to decide whether it should load an
     existing domain. Add Domain must pass edit=false;
     Edit Domain must pass edit=true.
========================================================= --}}

@php
    $domain = $domain ?? null;
    $edit = $edit ?? false;
    $prefix = $prefix ?? ($edit ? 'edit_' : '');
@endphp


{{-- =========================================================
     FRAMEWORK SELECTION (RELATIONSHIP)
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Associated Framework
    </label>

    <select
        id="{{ $prefix }}framework_id"
        name="framework_id"
        class="form-control-aspia"
    >
        <option value="">-- None (Standalone Domain) --</option>
        @if(isset($frameworks) && $frameworks->isNotEmpty())
            @foreach($frameworks as $fw)
                <option
                    value="{{ $fw->id }}"
                    {{ old('framework_id', ($edit && $domain) ? $domain->framework_id : '') == $fw->id ? 'selected' : '' }}
                >
                    {{ $fw->name }} ({{ $fw->framework_code ?: $fw->framework_id }})
                </option>
            @endforeach
        @endif
    </select>

</div>


{{-- =========================================================
     1. DOMAIN ID
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Domain ID
        <span class="required-star">*</span>
    </label>

    <input
        type="text"
        id="{{ $prefix }}domain_id"
        name="domain_id"
        class="form-control-aspia"
        value="{{ old('domain_id', ($edit && $domain) ? $domain->domain_id : '') }}"
        placeholder="Example: DOM-001"
        required
    >

</div>


{{-- =========================================================
     2. DOMAIN CODE
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Domain Code
    </label>

    <input
        type="text"
        id="{{ $prefix }}domain_code"
        name="domain_code"
        class="form-control-aspia"
        value="{{ old('domain_code', ($edit && $domain) ? $domain->domain_code : '') }}"
        placeholder="Example: GOV"
    >

</div>


{{-- =========================================================
     3. DOMAIN NAME
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Domain Name
        <span class="required-star">*</span>
    </label>

    <input
        type="text"
        id="{{ $prefix }}name"
        name="name"
        class="form-control-aspia"
        value="{{ old('name', ($edit && $domain) ? $domain->name : '') }}"
        placeholder="Example: Governance"
        required
    >

</div>


{{-- =========================================================
     4. SLUG
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Slug
    </label>

    <input
        type="text"
        id="{{ $prefix }}slug"
        name="slug"
        class="form-control-aspia"
        value="{{ old('slug', ($edit && $domain) ? $domain->slug : '') }}"
        placeholder="Example: governance"
    >

</div>


{{-- =========================================================
     5. PURPOSE
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Purpose
    </label>

    <textarea
        id="{{ $prefix }}purpose"
        name="purpose"
        class="form-control-aspia"
        placeholder="Enter the domain purpose"
    >{{ old('purpose', ($edit && $domain) ? $domain->purpose : '') }}</textarea>

</div>


{{-- =========================================================
     6. SCOPE
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Scope
    </label>

    <textarea
        id="{{ $prefix }}scope"
        name="scope"
        class="form-control-aspia"
        placeholder="Enter the domain scope"
    >{{ old('scope', ($edit && $domain) ? $domain->scope : '') }}</textarea>

</div>


{{-- =========================================================
     7. BUSINESS OWNER
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Business Owner
    </label>

    <input
        type="text"
        id="{{ $prefix }}business_owner"
        name="business_owner"
        class="form-control-aspia"
        value="{{ old('business_owner', ($edit && $domain) ? $domain->business_owner : '') }}"
        placeholder="Example: Board / CISO"
    >

</div>


{{-- =========================================================
     8. DESCRIPTION
========================================================= --}}

<div class="form-group full-width">

    <label class="form-label">
        Description
    </label>

    <textarea
        id="{{ $prefix }}description"
        name="description"
        class="form-control-aspia"
        placeholder="Enter domain description"
    >{{ old('description', ($edit && $domain) ? $domain->description : '') }}</textarea>

</div>


{{-- =========================================================
     9. DISPLAY ORDER
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Display Order
    </label>

    <input
        type="number"
        id="{{ $prefix }}display_order"
        name="display_order"
        class="form-control-aspia"
        value="{{ old('display_order', ($edit && $domain) ? $domain->display_order : '') }}"
        placeholder="Example: 1"
        min="0"
    >

</div>


{{-- =========================================================
     10. STATUS
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Status
        <span class="required-star">*</span>
    </label>

    <select
        id="{{ $prefix }}status"
        name="status"
        class="form-control-aspia"
        required
    >

        <option
            value=""
            disabled
            {{ old('status', ($edit && $domain) ? $domain->status : '') == '' ? 'selected' : '' }}
        >
            Select Status
        </option>

        <option
            value="Active"
            {{ old('status', ($edit && $domain) ? $domain->status : '') == 'Active' ? 'selected' : '' }}
        >
            Active
        </option>

        <option
            value="Inactive"
            {{ old('status', ($edit && $domain) ? $domain->status : '') == 'Inactive' ? 'selected' : '' }}
        >
            Inactive
        </option>

        <option
            value="Draft"
            {{ old('status', ($edit && $domain) ? $domain->status : '') == 'Draft' ? 'selected' : '' }}
        >
            Draft
        </option>

    </select>

</div>


{{-- =========================================================
     11. VERSION
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Version
    </label>

    <input
        type="text"
        id="{{ $prefix }}version"
        name="version"
        class="form-control-aspia"
        value="{{ old('version', ($edit && $domain) ? $domain->version : '') }}"
        placeholder="Example: 1"
    >

</div>


{{-- =========================================================
     12. SHORT OVERVIEW
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Short Overview
    </label>

    <textarea
        id="{{ $prefix }}short_overview"
        name="short_overview"
        class="form-control-aspia"
        placeholder="Enter a short overview"
    >{{ old('short_overview', ($edit && $domain) ? $domain->short_overview : '') }}</textarea>

</div>


{{-- =========================================================
     13. BUSINESS OBJECTIVES
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Business Objectives
    </label>

    <textarea
        id="{{ $prefix }}business_objectives"
        name="business_objectives"
        class="form-control-aspia"
        placeholder="Enter business objectives"
    >{{ old('business_objectives', ($edit && $domain) ? $domain->business_objectives : '') }}</textarea>

</div>


{{-- =========================================================
     14. BUSINESS RISKS
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Business Risks
    </label>

    <textarea
        id="{{ $prefix }}business_risks"
        name="business_risks"
        class="form-control-aspia"
        placeholder="Enter business risks"
    >{{ old('business_risks', ($edit && $domain) ? $domain->business_risks : '') }}</textarea>

</div>


{{-- =========================================================
     15. KEY CAPABILITIES
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Key Capabilities
    </label>

    <textarea
        id="{{ $prefix }}key_capabilities"
        name="key_capabilities"
        class="form-control-aspia"
        placeholder="Enter key capabilities"
    >{{ old('key_capabilities', ($edit && $domain) ? $domain->key_capabilities : '') }}</textarea>

</div>


{{-- =========================================================
     16. TYPICAL STAKEHOLDERS
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Typical Stakeholders
    </label>

    <textarea
        id="{{ $prefix }}typical_stakeholders"
        name="typical_stakeholders"
        class="form-control-aspia"
        placeholder="Example: Board, CISO, Compliance Officer"
    >{{ old('typical_stakeholders', ($edit && $domain) ? $domain->typical_stakeholders : '') }}</textarea>

</div>


{{-- =========================================================
     17. APPLICABLE INDUSTRIES
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Applicable Industries
    </label>

    <textarea
        id="{{ $prefix }}applicable_industries"
        name="applicable_industries"
        class="form-control-aspia"
        placeholder="Enter applicable industries"
    >{{ old('applicable_industries', ($edit && $domain) ? $domain->applicable_industries : '') }}</textarea>

</div>


{{-- =========================================================
     18. APPLICABLE TECHNOLOGIES
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Applicable Technologies
    </label>

    <textarea
        id="{{ $prefix }}applicable_technologies"
        name="applicable_technologies"
        class="form-control-aspia"
        placeholder="Enter applicable technologies"
    >{{ old('applicable_technologies', ($edit && $domain) ? $domain->applicable_technologies : '') }}</textarea>

</div>


{{-- =========================================================
     19. KEYWORDS
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Keywords
    </label>

    <textarea
        id="{{ $prefix }}keywords"
        name="keywords"
        class="form-control-aspia"
        placeholder="Example: governance, compliance, risk"
    >{{ old('keywords', ($edit && $domain) ? $domain->keywords : '') }}</textarea>

</div>


{{-- =========================================================
     20. TAGS
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Tags
    </label>

    <textarea
        id="{{ $prefix }}tags"
        name="tags"
        class="form-control-aspia"
        placeholder="Example: governance, GRC"
    >{{ old('tags', ($edit && $domain) ? $domain->tags : '') }}</textarea>

</div>


{{-- =========================================================
     21. WHY THIS DOMAIN MATTERS
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Why This Domain Matters
    </label>

    <textarea
        id="{{ $prefix }}why_domain_matters"
        name="why_domain_matters"
        class="form-control-aspia"
        placeholder="Explain why this domain matters"
    >{{ old('why_domain_matters', ($edit && $domain) ? $domain->why_domain_matters : '') }}</textarea>

</div>


{{-- =========================================================
     22. COMMON CHALLENGES
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Common Challenges
    </label>

    <textarea
        id="{{ $prefix }}common_challenges"
        name="common_challenges"
        class="form-control-aspia"
        placeholder="Enter common challenges"
    >{{ old('common_challenges', ($edit && $domain) ? $domain->common_challenges : '') }}</textarea>

</div>


{{-- =========================================================
     23. RELATED DOMAINS
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Related Domains
    </label>

    <textarea
        id="{{ $prefix }}related_domains"
        name="related_domains"
        class="form-control-aspia"
        placeholder="Enter related domains"
    >{{ old('related_domains', ($edit && $domain) ? $domain->related_domains : '') }}</textarea>

</div>


{{-- =========================================================
     24. RELATED FRAMEWORKS
========================================================= --}}

<div class="form-group">

    <label class="form-label">
        Related Frameworks
    </label>

    <textarea
        id="{{ $prefix }}related_frameworks"
        name="related_frameworks"
        class="form-control-aspia"
        placeholder="Enter related frameworks"
    >{{ old('related_frameworks', ($edit && $domain) ? $domain->related_frameworks : '') }}</textarea>

</div>