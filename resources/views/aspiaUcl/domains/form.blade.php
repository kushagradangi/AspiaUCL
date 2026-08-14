@php
    $edit = $edit ?? false;
    $prefix = $edit ? 'edit_' : '';
@endphp


{{-- 1. Domain ID --}}
<div class="form-group">

    <label class="form-label">
        Domain ID *
    </label>

    <input
        id="{{ $prefix }}domain_id"
        name="domain_id"
        class="form-control"
        required
        value="{{ $edit ? '' : old('domain_id') }}"
        placeholder="Enter Domain ID"
    >

</div>


{{-- 2. Domain Code --}}
<div class="form-group">

    <label class="form-label">
        Domain Code
    </label>

    <input
        id="{{ $prefix }}domain_code"
        name="domain_code"
        class="form-control"
        value="{{ $edit ? '' : old('domain_code') }}"
        placeholder="Enter Domain Code"
    >

</div>


{{-- 3. Domain Name --}}
<div class="form-group">

    <label class="form-label">
        Domain Name *
    </label>

    <input
        id="{{ $prefix }}name"
        name="name"
        class="form-control"
        required
        value="{{ $edit ? '' : old('name') }}"
        placeholder="Enter Domain Name"
    >

</div>


{{-- 4. Slug --}}
<div class="form-group">

    <label class="form-label">
        Slug
    </label>

    <input
        id="{{ $prefix }}slug"
        name="slug"
        class="form-control"
        value="{{ $edit ? '' : old('slug') }}"
        placeholder="Enter Slug"
    >

</div>


{{-- 5. Purpose --}}
<div class="form-group full">

    <label class="form-label">
        Purpose
    </label>

    <textarea
        id="{{ $prefix }}purpose"
        name="purpose"
        class="form-control"
        placeholder="Enter Purpose"
    >{{ $edit ? '' : old('purpose') }}</textarea>

</div>


{{-- 6. Scope --}}
<div class="form-group full">

    <label class="form-label">
        Scope
    </label>

    <textarea
        id="{{ $prefix }}scope"
        name="scope"
        class="form-control"
        placeholder="Enter Scope"
    >{{ $edit ? '' : old('scope') }}</textarea>

</div>


{{-- 7. Business Owner --}}
<div class="form-group">

    <label class="form-label">
        Business Owner
    </label>

    <input
        id="{{ $prefix }}business_owner"
        name="business_owner"
        class="form-control"
        value="{{ $edit ? '' : old('business_owner') }}"
        placeholder="Enter Business Owner"
    >

</div>


{{-- 8. Applicable Industries #1 --}}
<div class="form-group">

    <label class="form-label">
        Applicable Industries
    </label>

    <input
        id="{{ $prefix }}applicable_industries"
        name="applicable_industries"
        class="form-control"
        value="{{ $edit ? '' : old('applicable_industries') }}"
        placeholder="Enter Applicable Industries"
    >

</div>


{{-- 9. Applicable Technologies #1 --}}
<div class="form-group">

    <label class="form-label">
        Applicable Technologies
    </label>

    <input
        id="{{ $prefix }}applicable_technologies"
        name="applicable_technologies"
        class="form-control"
        value="{{ $edit ? '' : old('applicable_technologies') }}"
        placeholder="Enter Applicable Technologies"
    >

</div>


{{-- 10. Description --}}
<div class="form-group full">

    <label class="form-label">
        Description
    </label>

    <textarea
        id="{{ $prefix }}description"
        name="description"
        class="form-control"
        placeholder="Enter Description"
    >{{ $edit ? '' : old('description') }}</textarea>

</div>


{{-- 11. Display Order --}}
<div class="form-group">

    <label class="form-label">
        Display Order
    </label>

    <input
        id="{{ $prefix }}display_order"
        type="number"
        name="display_order"
        class="form-control"
        min="0"
        value="{{ $edit ? 0 : old('display_order', 0) }}"
    >

</div>


{{-- 12. Status --}}
<div class="form-group">

    <label class="form-label">
        Status
    </label>

    <select
        id="{{ $prefix }}status"
        name="status"
        class="form-control"
    >

        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
        <option value="Draft">Draft</option>

    </select>

</div>


{{-- 13. Version --}}
<div class="form-group">

    <label class="form-label">
        Version
    </label>

    <input
        id="{{ $prefix }}version"
        name="version"
        class="form-control"
        value="{{ $edit ? '' : old('version') }}"
        placeholder="Enter Version"
    >

</div>


{{-- 14. Domain Name #2 --}}
<div class="form-group">

    <label class="form-label">
        Domain Name (Additional)
    </label>

    <input
        id="{{ $prefix }}domain_name"
        name="domain_name"
        class="form-control"
        value="{{ $edit ? '' : old('domain_name') }}"
        placeholder="Enter Domain Name"
    >

</div>


{{-- 15. Short Overview --}}
<div class="form-group full">

    <label class="form-label">
        Short Overview
    </label>

    <textarea
        id="{{ $prefix }}short_overview"
        name="short_overview"
        class="form-control"
        placeholder="Enter Short Overview"
    >{{ $edit ? '' : old('short_overview') }}</textarea>

</div>


{{-- 16. Business Objectives #1 --}}
<div class="form-group full">

    <label class="form-label">
        Business Objectives
    </label>

    <textarea
        id="{{ $prefix }}business_objectives"
        name="business_objectives"
        class="form-control"
        placeholder="Enter Business Objectives"
    >{{ $edit ? '' : old('business_objectives') }}</textarea>

</div>


{{-- 17. Business Objectives #2 --}}
<div class="form-group full">

    <label class="form-label">
        Business Objectives (Additional)
    </label>

    <textarea
        id="{{ $prefix }}business_objectives_2"
        name="business_objectives_2"
        class="form-control"
        placeholder="Enter Additional Business Objectives"
    >{{ $edit ? '' : old('business_objectives_2') }}</textarea>

</div>


{{-- 18. Business Risks --}}
<div class="form-group full">

    <label class="form-label">
        Business Risks
    </label>

    <textarea
        id="{{ $prefix }}business_risks"
        name="business_risks"
        class="form-control"
        placeholder="Enter Business Risks"
    >{{ $edit ? '' : old('business_risks') }}</textarea>

</div>


{{-- 19. Key Capabilities --}}
<div class="form-group full">

    <label class="form-label">
        Key Capabilities
    </label>

    <textarea
        id="{{ $prefix }}key_capabilities"
        name="key_capabilities"
        class="form-control"
        placeholder="Enter Key Capabilities"
    >{{ $edit ? '' : old('key_capabilities') }}</textarea>

</div>


{{-- 20. Typical Stakeholders --}}
<div class="form-group full">

    <label class="form-label">
        Typical Stakeholders
    </label>

    <textarea
        id="{{ $prefix }}typical_stakeholders"
        name="typical_stakeholders"
        class="form-control"
        placeholder="Enter Typical Stakeholders"
    >{{ $edit ? '' : old('typical_stakeholders') }}</textarea>

</div>


{{-- 21. Applicable Industries #2 --}}
<div class="form-group">

    <label class="form-label">
        Applicable Industries (Additional)
    </label>

    <input
        id="{{ $prefix }}applicable_industries_2"
        name="applicable_industries_2"
        class="form-control"
        value="{{ $edit ? '' : old('applicable_industries_2') }}"
        placeholder="Enter Additional Industries"
    >

</div>


{{-- 22. Applicable Technologies #2 --}}
<div class="form-group">

    <label class="form-label">
        Applicable Technologies (Additional)
    </label>

    <input
        id="{{ $prefix }}applicable_technologies_2"
        name="applicable_technologies_2"
        class="form-control"
        value="{{ $edit ? '' : old('applicable_technologies_2') }}"
        placeholder="Enter Additional Technologies"
    >

</div>


{{-- 23. Keywords --}}
<div class="form-group">

    <label class="form-label">
        Keywords
    </label>

    <input
        id="{{ $prefix }}keywords"
        name="keywords"
        class="form-control"
        value="{{ $edit ? '' : old('keywords') }}"
        placeholder="Enter Keywords"
    >

</div>


{{-- 24. Tags --}}
<div class="form-group">

    <label class="form-label">
        Tags
    </label>

    <input
        id="{{ $prefix }}tags"
        name="tags"
        class="form-control"
        value="{{ $edit ? '' : old('tags') }}"
        placeholder="Enter Tags"
    >

</div>


{{-- 25. Why This Domain Matters --}}
<div class="form-group full">

    <label class="form-label">
        Why This Domain Matters
    </label>

    <textarea
        id="{{ $prefix }}why_domain_matters"
        name="why_domain_matters"
        class="form-control"
        placeholder="Explain why this domain matters"
    >{{ $edit ? '' : old('why_domain_matters') }}</textarea>

</div>


{{-- 26. Common Challenges --}}
<div class="form-group full">

    <label class="form-label">
        Common Challenges
    </label>

    <textarea
        id="{{ $prefix }}common_challenges"
        name="common_challenges"
        class="form-control"
        placeholder="Enter Common Challenges"
    >{{ $edit ? '' : old('common_challenges') }}</textarea>

</div>


{{-- 27. Related Domains --}}
<div class="form-group full">

    <label class="form-label">
        Related Domains
    </label>

    <textarea
        id="{{ $prefix }}related_domains"
        name="related_domains"
        class="form-control"
        placeholder="Enter Related Domains"
    >{{ $edit ? '' : old('related_domains') }}</textarea>

</div>


{{-- 28. Related Frameworks --}}
<div class="form-group full">

    <label class="form-label">
        Related Frameworks
    </label>

    <textarea
        id="{{ $prefix }}related_frameworks"
        name="related_frameworks"
        class="form-control"
        placeholder="Enter Related Frameworks"
    >{{ $edit ? '' : old('related_frameworks') }}</textarea>

</div>