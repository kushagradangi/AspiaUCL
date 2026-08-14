@extends('layouts.aspiaUcl')

@section('title', ' | Requirements')

@section('page-title', 'Requirements')

@section('content')

<style>

    .module-page {
        width: 100%;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 25px;
    }

    .page-header h1 {
        margin: 0 0 8px;
        font-size: 32px;
        font-weight: 500;
        color: #fff;
    }

    .page-header p {
        margin: 0;
        color: #8f9db5;
        font-size: 14px;
    }

    .header-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-aspia {
        border: none;
        border-radius: 8px;
        padding: 11px 18px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-primary {
        background: #10bce8;
        color: #07152e;
    }

    .btn-secondary {
        background: #162544;
        color: #fff;
        border: 1px solid #1c4266;
    }

    .btn-danger {
        background: rgba(239,68,68,.12);
        color: #ff7070;
        border: 1px solid rgba(239,68,68,.2);
    }

    .panel {
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 25px;
    }

    .panel-header {
        padding: 20px 22px;
        border-bottom: 1px solid rgba(255,255,255,.07);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .panel-header h2 {
        margin: 0;
        color: #fff;
        font-size: 17px;
        font-weight: 500;
    }

    .search-form {
        display: flex;
        gap: 8px;
    }

    .search-input,
    .form-control {
        background: #0e1836;
        border: 1px solid #27496b;
        color: #fff;
        border-radius: 8px;
        padding: 10px 13px;
        outline: none;
        box-sizing: border-box;
    }

    .search-input {
        width: 280px;
    }

    .search-input:focus,
    .form-control:focus {
        border-color: #10bce8;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .module-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1200px;
    }

    .module-table th {
        text-align: left;
        padding: 14px 20px;
        color: #71829f;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: rgba(14,24,54,.35);
        white-space: nowrap;
    }

    .module-table td {
        padding: 17px 20px;
        border-top: 1px solid rgba(255,255,255,.06);
        color: #b9c5d8;
        font-size: 14px;
        vertical-align: middle;
    }

    .module-name {
        color: #fff;
        font-weight: 500;
    }

    .badge {
        padding: 5px 9px;
        border-radius: 6px;
        background: rgba(16,188,232,.10);
        color: #10bce8;
        font-size: 12px;
        white-space: nowrap;
    }

    .description {
        color: #8291aa;
        max-width: 320px;
    }

    .actions {
        display: flex;
        gap: 7px;
        white-space: nowrap;
    }

    .action-btn {
        border-radius: 7px;
        padding: 7px 11px;
        font-size: 12px;
        cursor: pointer;
        border: 1px solid #27496b;
        background: #101d3b;
        color: #aebbd0;
    }

    .empty-state {
        text-align: center;
        padding: 50px 20px !important;
        color: #71829f !important;
    }

    .alert-success,
    .alert-error {
        padding: 13px 16px;
        border-radius: 9px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .alert-success {
        background: rgba(34,197,94,.10);
        color: #6ee7a0;
    }

    .alert-error {
        background: rgba(239,68,68,.10);
        color: #ff8585;
    }

    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.65);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 20px;
    }

    .modal-overlay.show {
        display: flex;
    }

    .modal-box {
        width: 100%;
        max-width: 850px;
        max-height: 90vh;
        overflow-y: auto;
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 14px;
    }

    .modal-header {
        padding: 20px 22px;
        border-bottom: 1px solid rgba(255,255,255,.07);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        background: #162544;
        z-index: 2;
    }

    .modal-header h2 {
        margin: 0;
        color: #fff;
        font-size: 18px;
    }

    .close-modal {
        background: none;
        border: none;
        color: #8291aa;
        font-size: 24px;
        cursor: pointer;
    }

    .modal-body {
        padding: 22px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        margin-bottom: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        color: #b9c5d8;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
    }

    textarea.form-control {
        min-height: 110px;
        resize: vertical;
    }

    .modal-footer {
        padding: 16px 22px;
        border-top: 1px solid rgba(255,255,255,.07);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        position: sticky;
        bottom: 0;
        background: #162544;
    }

    .import-info {
        color: #8291aa;
        font-size: 12px;
        margin-top: 10px;
    }

    @media (max-width: 700px) {

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .search-form {
            width: 100%;
        }

        .search-input {
            width: 100%;
        }

        .modal-body {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

    }

</style>


<div class="module-page">


    {{-- SUCCESS MESSAGE --}}

    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- VALIDATION ERRORS --}}

    @if($errors->any())

        <div class="alert-error">

            <strong>Please fix the following:</strong>

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- PAGE HEADER --}}

    <div class="page-header">

        <div>

            <h1>
                Requirements
            </h1>

            <p>
                Manage governance requirements under your controls.
            </p>

        </div>


        <div class="header-actions">

            <button
                type="button"
                class="btn-aspia btn-secondary"
                onclick="openModal('importModal')"
            >
                ↑ Import XLSX
            </button>


            <button
                type="button"
                class="btn-aspia btn-primary"
                onclick="openModal('addModal')"
            >
                + Add Requirement
            </button>

        </div>

    </div>


    {{-- REQUIREMENT MANAGEMENT --}}

    <div class="panel">

        <div class="panel-header">

            <h2>
                Requirement Management
            </h2>


            <form
                action="{{ route('requirements.index') }}"
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search requirements..."
                    value="{{ request('search') }}"
                >


                <button
                    type="submit"
                    class="btn-aspia btn-secondary"
                >
                    Search
                </button>

            </form>

        </div>


        <div class="table-wrapper">

            <table class="module-table">

                <thead>

                    <tr>

                        <th>Requirement ID</th>

                        <th>Control</th>

                        <th>Requirement Title</th>

                        <th>Requirement</th>

                        <th>Typical Owner</th>

                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($requirements as $requirement)

                        <tr>

                            {{-- Requirement ID --}}

                            <td>

                                <span class="badge">
                                    {{ $requirement->requirement_id }}
                                </span>

                            </td>


                            {{-- Control --}}

                            <td>

                                <span class="badge">

                                    {{ $requirement->control?->control_id ?? 'N/A' }}

                                </span>

                            </td>


                            {{-- Requirement Title --}}

                            <td>

                                <span class="module-name">
                                    {{ $requirement->requirement_title }}
                                </span>

                            </td>


                            {{-- Requirement --}}

                            <td>

                                <span class="description">

                                    {{ \Illuminate\Support\Str::limit(
                                        $requirement->requirement,
                                        120
                                    ) }}

                                </span>

                            </td>


                            {{-- Typical Owner --}}

                            <td>
                                {{ $requirement->typical_owner ?: 'N/A' }}
                            </td>


                            {{-- Actions --}}

                            <td>

                                <div class="actions">

                                    <button
                                        type="button"
                                        class="action-btn"
                                        onclick="openEditModal(
                                            {{ $requirement->id }},
                                            {{ $requirement->control_id }},
                                            @js($requirement->requirement_id),
                                            @js($requirement->requirement_title),
                                            @js($requirement->requirement),
                                            @js($requirement->why_requirement_exists),
                                            @js($requirement->implementation_guidance),
                                            @js($requirement->common_audit_findings),
                                            @js($requirement->common_mistakes),
                                            @js($requirement->best_practices),
                                            @js($requirement->business_examples),
                                            @js($requirement->typical_owner)
                                        )"
                                    >
                                        Edit
                                    </button>


                                    <form
                                        action="{{ route('requirements.destroy', $requirement) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this requirement?')"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="action-btn btn-danger"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="empty-state"
                            >
                                No requirements found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($requirements->hasPages())

            <div style="padding:18px 20px;">

                {{ $requirements->links() }}

            </div>

        @endif

    </div>

</div>



{{-- ========================================================= --}}
{{-- ADD REQUIREMENT --}}
{{-- ========================================================= --}}

<div id="addModal" class="modal-overlay">

    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Add Requirement
            </h2>


            <button
                type="button"
                class="close-modal"
                onclick="closeModal('addModal')"
            >
                ×
            </button>

        </div>


        <form
            action="{{ route('requirements.store') }}"
            method="POST"
        >

            @csrf


            <div class="modal-body">


                {{-- Control --}}

                <div class="form-group full">

                    <label class="form-label">
                        Control *
                    </label>


                    <select
                        name="control_id"
                        class="form-control"
                        required
                    >

                        <option value="">
                            Select Control
                        </option>


                        @foreach($controls as $control)

                            <option
                                value="{{ $control->id }}"
                                {{ old('control_id') == $control->id ? 'selected' : '' }}
                            >

                                {{ $control->control_id }}
                                -
                                {{ $control->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Requirement ID --}}

                <div class="form-group">

                    <label class="form-label">
                        Requirement ID *
                    </label>


                    <input
                        type="text"
                        name="requirement_id"
                        class="form-control"
                        placeholder="Enter Requirement ID"
                        value="{{ old('requirement_id') }}"
                        required
                    >

                </div>


                {{-- Requirement Title --}}

                <div class="form-group">

                    <label class="form-label">
                        Requirement Title *
                    </label>


                    <input
                        type="text"
                        name="requirement_title"
                        class="form-control"
                        placeholder="Enter Requirement Title"
                        value="{{ old('requirement_title') }}"
                        required
                    >

                </div>


                {{-- Requirement --}}

                <div class="form-group full">

                    <label class="form-label">
                        Requirement *
                    </label>


                    <textarea
                        name="requirement"
                        class="form-control"
                        placeholder="Enter Requirement"
                        required
                    >{{ old('requirement') }}</textarea>

                </div>


                {{-- Why this Requirement Exists --}}

                <div class="form-group full">

                    <label class="form-label">
                        Why this Requirement Exists
                    </label>


                    <textarea
                        name="why_requirement_exists"
                        class="form-control"
                        placeholder="Enter why this requirement exists"
                    >{{ old('why_requirement_exists') }}</textarea>

                </div>


                {{-- Implementation Guidance --}}

                <div class="form-group full">

                    <label class="form-label">
                        Implementation Guidance
                    </label>


                    <textarea
                        name="implementation_guidance"
                        class="form-control"
                        placeholder="Enter Implementation Guidance"
                    >{{ old('implementation_guidance') }}</textarea>

                </div>


                {{-- Common Audit Findings --}}

                <div class="form-group full">

                    <label class="form-label">
                        Common Audit Findings
                    </label>


                    <textarea
                        name="common_audit_findings"
                        class="form-control"
                        placeholder="Enter Common Audit Findings"
                    >{{ old('common_audit_findings') }}</textarea>

                </div>


                {{-- Common Mistakes --}}

                <div class="form-group full">

                    <label class="form-label">
                        Common Mistakes
                    </label>


                    <textarea
                        name="common_mistakes"
                        class="form-control"
                        placeholder="Enter Common Mistakes"
                    >{{ old('common_mistakes') }}</textarea>

                </div>


                {{-- Best Practices --}}

                <div class="form-group full">

                    <label class="form-label">
                        Best Practices
                    </label>


                    <textarea
                        name="best_practices"
                        class="form-control"
                        placeholder="Enter Best Practices"
                    >{{ old('best_practices') }}</textarea>

                </div>


                {{-- Business Examples --}}

                <div class="form-group full">

                    <label class="form-label">
                        Business Examples
                    </label>


                    <textarea
                        name="business_examples"
                        class="form-control"
                        placeholder="Enter Business Examples"
                    >{{ old('business_examples') }}</textarea>

                </div>


                {{-- Typical Owner --}}

                <div class="form-group">

                    <label class="form-label">
                        Typical Owner
                    </label>


                    <input
                        type="text"
                        name="typical_owner"
                        class="form-control"
                        placeholder="Enter Typical Owner"
                        value="{{ old('typical_owner') }}"
                    >

                </div>


            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-aspia btn-secondary"
                    onclick="closeModal('addModal')"
                >
                    Cancel
                </button>


                <button
                    type="submit"
                    class="btn-aspia btn-primary"
                >
                    Add Requirement
                </button>

            </div>

        </form>

    </div>

</div>



{{-- ========================================================= --}}
{{-- EDIT REQUIREMENT --}}
{{-- ========================================================= --}}

<div id="editModal" class="modal-overlay">

    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Edit Requirement
            </h2>


            <button
                type="button"
                class="close-modal"
                onclick="closeModal('editModal')"
            >
                ×
            </button>

        </div>


        <form
            id="editForm"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="modal-body">


                {{-- Control --}}

                <div class="form-group full">

                    <label class="form-label">
                        Control *
                    </label>


                    <select
                        id="editControl"
                        name="control_id"
                        class="form-control"
                        required
                    >

                        @foreach($controls as $control)

                            <option value="{{ $control->id }}">

                                {{ $control->control_id }}
                                -
                                {{ $control->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Requirement ID --}}

                <div class="form-group">

                    <label class="form-label">
                        Requirement ID *
                    </label>


                    <input
                        type="text"
                        id="editRequirementId"
                        name="requirement_id"
                        class="form-control"
                        required
                    >

                </div>


                {{-- Requirement Title --}}

                <div class="form-group">

                    <label class="form-label">
                        Requirement Title *
                    </label>


                    <input
                        type="text"
                        id="editRequirementTitle"
                        name="requirement_title"
                        class="form-control"
                        required
                    >

                </div>


                {{-- Requirement --}}

                <div class="form-group full">

                    <label class="form-label">
                        Requirement *
                    </label>


                    <textarea
                        id="editRequirement"
                        name="requirement"
                        class="form-control"
                        required
                    ></textarea>

                </div>


                {{-- Why this Requirement Exists --}}

                <div class="form-group full">

                    <label class="form-label">
                        Why this Requirement Exists
                    </label>


                    <textarea
                        id="editWhyRequirementExists"
                        name="why_requirement_exists"
                        class="form-control"
                    ></textarea>

                </div>


                {{-- Implementation Guidance --}}

                <div class="form-group full">

                    <label class="form-label">
                        Implementation Guidance
                    </label>


                    <textarea
                        id="editImplementationGuidance"
                        name="implementation_guidance"
                        class="form-control"
                    ></textarea>

                </div>


                {{-- Common Audit Findings --}}

                <div class="form-group full">

                    <label class="form-label">
                        Common Audit Findings
                    </label>


                    <textarea
                        id="editCommonAuditFindings"
                        name="common_audit_findings"
                        class="form-control"
                    ></textarea>

                </div>


                {{-- Common Mistakes --}}

                <div class="form-group full">

                    <label class="form-label">
                        Common Mistakes
                    </label>


                    <textarea
                        id="editCommonMistakes"
                        name="common_mistakes"
                        class="form-control"
                    ></textarea>

                </div>


                {{-- Best Practices --}}

                <div class="form-group full">

                    <label class="form-label">
                        Best Practices
                    </label>


                    <textarea
                        id="editBestPractices"
                        name="best_practices"
                        class="form-control"
                    ></textarea>

                </div>


                {{-- Business Examples --}}

                <div class="form-group full">

                    <label class="form-label">
                        Business Examples
                    </label>


                    <textarea
                        id="editBusinessExamples"
                        name="business_examples"
                        class="form-control"
                    ></textarea>

                </div>


                {{-- Typical Owner --}}

                <div class="form-group">

                    <label class="form-label">
                        Typical Owner
                    </label>


                    <input
                        type="text"
                        id="editTypicalOwner"
                        name="typical_owner"
                        class="form-control"
                    >

                </div>


            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-aspia btn-secondary"
                    onclick="closeModal('editModal')"
                >
                    Cancel
                </button>


                <button
                    type="submit"
                    class="btn-aspia btn-primary"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>



{{-- ========================================================= --}}
{{-- IMPORT REQUIREMENTS --}}
{{-- ========================================================= --}}

<div id="importModal" class="modal-overlay">

    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Import Requirements
            </h2>


            <button
                type="button"
                class="close-modal"
                onclick="closeModal('importModal')"
            >
                ×
            </button>

        </div>


        <form
            action="{{ route('requirements.import') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="modal-body">

                <div class="form-group full">

                    <label class="form-label">
                        Select XLSX File
                    </label>


                    <input
                        type="file"
                        name="file"
                        class="form-control"
                        accept=".xlsx"
                        required
                    >


                    <div class="import-info">
                        Only .xlsx files are supported.
                    </div>

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-aspia btn-secondary"
                    onclick="closeModal('importModal')"
                >
                    Cancel
                </button>


                <button
                    type="submit"
                    class="btn-aspia btn-primary"
                >
                    Import XLSX
                </button>

            </div>

        </form>

    </div>

</div>



<script>

    /*
    |--------------------------------------------------------------------------
    | Open Modal
    |--------------------------------------------------------------------------
    */

    function openModal(id)
    {
        document
            .getElementById(id)
            .classList
            .add('show');
    }


    /*
    |--------------------------------------------------------------------------
    | Close Modal
    |--------------------------------------------------------------------------
    */

    function closeModal(id)
    {
        document
            .getElementById(id)
            .classList
            .remove('show');
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Requirement
    |--------------------------------------------------------------------------
    */

    function openEditModal(
        id,
        controlId,
        requirementId,
        requirementTitle,
        requirement,
        whyRequirementExists,
        implementationGuidance,
        commonAuditFindings,
        commonMistakes,
        bestPractices,
        businessExamples,
        typicalOwner
    ) {

        /*
        |--------------------------------------------------------------------------
        | Form Action
        |--------------------------------------------------------------------------
        */

        document.getElementById('editForm').action =
            `/requirements/${id}`;


        /*
        |--------------------------------------------------------------------------
        | Control
        |--------------------------------------------------------------------------
        */

        document.getElementById('editControl').value =
            controlId ?? '';


        /*
        |--------------------------------------------------------------------------
        | Requirement ID
        |--------------------------------------------------------------------------
        */

        document.getElementById('editRequirementId').value =
            requirementId ?? '';


        /*
        |--------------------------------------------------------------------------
        | Requirement Title
        |--------------------------------------------------------------------------
        */

        document.getElementById('editRequirementTitle').value =
            requirementTitle ?? '';


        /*
        |--------------------------------------------------------------------------
        | Requirement
        |--------------------------------------------------------------------------
        */

        document.getElementById('editRequirement').value =
            requirement ?? '';


        /*
        |--------------------------------------------------------------------------
        | Why Requirement Exists
        |--------------------------------------------------------------------------
        */

        document.getElementById('editWhyRequirementExists').value =
            whyRequirementExists ?? '';


        /*
        |--------------------------------------------------------------------------
        | Implementation Guidance
        |--------------------------------------------------------------------------
        */

        document.getElementById('editImplementationGuidance').value =
            implementationGuidance ?? '';


        /*
        |--------------------------------------------------------------------------
        | Common Audit Findings
        |--------------------------------------------------------------------------
        */

        document.getElementById('editCommonAuditFindings').value =
            commonAuditFindings ?? '';


        /*
        |--------------------------------------------------------------------------
        | Common Mistakes
        |--------------------------------------------------------------------------
        */

        document.getElementById('editCommonMistakes').value =
            commonMistakes ?? '';


        /*
        |--------------------------------------------------------------------------
        | Best Practices
        |--------------------------------------------------------------------------
        */

        document.getElementById('editBestPractices').value =
            bestPractices ?? '';


        /*
        |--------------------------------------------------------------------------
        | Business Examples
        |--------------------------------------------------------------------------
        */

        document.getElementById('editBusinessExamples').value =
            businessExamples ?? '';


        /*
        |--------------------------------------------------------------------------
        | Typical Owner
        |--------------------------------------------------------------------------
        */

        document.getElementById('editTypicalOwner').value =
            typicalOwner ?? '';


        /*
        |--------------------------------------------------------------------------
        | Show Modal
        |--------------------------------------------------------------------------
        */

        openModal('editModal');
    }


    /*
    |--------------------------------------------------------------------------
    | Escape Key
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'keydown',
        function(event)
        {

            if (event.key === 'Escape') {

                document
                    .querySelectorAll('.modal-overlay')
                    .forEach(function(modal) {

                        modal.classList.remove('show');

                    });

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Click Outside Modal
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'click',
        function(event)
        {

            if (
                event.target.classList.contains(
                    'modal-overlay'
                )
            ) {

                event.target.classList.remove('show');

            }

        }
    );

</script>


@endsection