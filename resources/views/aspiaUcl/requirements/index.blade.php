@extends('layouts.aspiaUcl')

@section('title', ' | Requirements')

@section('page-title', 'Requirements')

@section('content')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .requirement-page {
        width: 100%;
    }


    /* =========================================================
       PAGE HEADER
    ========================================================= */

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
        color: #ffffff;
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


    /* =========================================================
       BUTTONS
    ========================================================= */

    .btn-aspia {
        border: none;
        border-radius: 8px;
        padding: 11px 18px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        transition: .2s;
    }

    .btn-primary-aspia {
        background: #10bce8;
        color: #07152e;
    }

    .btn-primary-aspia:hover {
        background: #20c9f2;
        color: #07152e;
    }

    .btn-secondary-aspia {
        background: #162544;
        color: #ffffff;
        border: 1px solid #1c4266;
    }

    .btn-secondary-aspia:hover {
        background: #1c3155;
    }

    .btn-danger-aspia {
        background: rgba(239, 68, 68, .12);
        color: #ff7070;
        border: 1px solid rgba(239, 68, 68, .2);
    }

    .btn-danger-aspia:hover {
        background: rgba(239, 68, 68, .2);
    }


    /* =========================================================
       ALERTS
    ========================================================= */

    .alert-success {
        background: rgba(34,197,94,.10);
        border: 1px solid rgba(34,197,94,.2);
        color: #6ee7a0;

        padding: 13px 16px;
        border-radius: 9px;

        margin-bottom: 20px;

        font-size: 13px;
    }

    .alert-error {
        background: rgba(239,68,68,.10);
        border: 1px solid rgba(239,68,68,.2);
        color: #ff8585;

        padding: 13px 16px;
        border-radius: 9px;

        margin-bottom: 20px;

        font-size: 13px;
    }


    /* =========================================================
       PANEL
    ========================================================= */

    .requirement-panel {
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

        color: #ffffff;

        font-size: 17px;

        font-weight: 500;
    }


    /* =========================================================
       SEARCH
    ========================================================= */

    .search-form {
        display: flex;
        gap: 8px;
    }


    .search-input {
        width: 280px;

        background: #0e1836;

        border: 1px solid #27496b;

        color: #ffffff;

        border-radius: 8px;

        padding: 10px 13px;

        outline: none;
    }


    .search-input:focus {
        border-color: #10bce8;
    }


    .search-input::placeholder {
        color: #687993;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .table-wrapper {
        overflow-x: auto;
    }


    .requirement-table {
        width: 100%;

        min-width: 1200px;

        border-collapse: collapse;
    }


    .requirement-table th {
        text-align: left;

        padding: 14px 16px;

        color: #71829f;

        font-size: 11px;

        text-transform: uppercase;

        letter-spacing: 1px;

        font-weight: 600;

        background: rgba(14,24,54,.35);

        white-space: nowrap;
    }


    .requirement-table td {
        padding: 16px;

        border-top: 1px solid rgba(255,255,255,.06);

        color: #b9c5d8;

        font-size: 13px;

        vertical-align: middle;

        white-space: nowrap;
    }


    .requirement-table tr:hover td {
        background: rgba(16,188,232,.025);
    }


    .requirement-id {
        color: #10bce8;

        font-weight: 600;
    }


    .control-id {
        color: #ffffff;

        font-weight: 500;
    }


    .requirement-title-link {
        color: #ffffff;
        text-decoration: none;
        font-weight: 500;
    }

    .requirement-title-link:hover {
        color: #10bce8;
    }


    .requirement-text {
        max-width: 250px;
        display: inline-block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        vertical-align: middle;
    }


    .table-muted {
        color: #63728c;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

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


    .action-btn:hover {
        color: #ffffff;

        border-color: #10bce8;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        text-align: center;

        padding: 50px 20px !important;

        color: #71829f !important;
    }


    .empty-state-icon {
        font-size: 35px;

        color: #10bce8;

        margin-bottom: 10px;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-area {
        padding: 18px 20px;
        border-top: 1px solid rgba(255,255,255,.06);
        display: flex;
        justify-content: flex-end;
    }

    /* =========================================================
       CUSTOM PAGINATION
    ========================================================= */

    .custom-pagination {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    .custom-pagination a,
    .custom-pagination span {
        min-width: 36px;
        height: 36px;
        padding: 0 11px;
        box-sizing: border-box;
        border-radius: 7px;
        border: 1px solid #27496b;
        background: #101d3b;
        color: #aebbd0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
    }

    .custom-pagination a:hover {
        color: #ffffff;
        border-color: #10bce8;
        background: #162544;
    }

    .custom-pagination .active-page {
        background: #10bce8;
        border-color: #10bce8;
        color: #07152e;
    }

    .custom-pagination .disabled-page {
        opacity: .45;
        cursor: not-allowed;
    }

    .custom-pagination .pagination-info {
        min-width: auto;
        border: none;
        background: transparent;
        padding: 0 8px;
        color: #71829f;
        font-weight: 400;
    }


    /* =========================================================
       MODAL
    ========================================================= */

    .modal-overlay {
        position: fixed;

        inset: 0;

        background: rgba(0,0,0,.70);

        display: none;

        align-items: center;

        justify-content: center;

        z-index: 9999;

        padding: 25px;
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

        box-shadow: 0 20px 60px rgba(0,0,0,.5);
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

        color: #ffffff;

        font-size: 19px;

        font-weight: 500;
    }


    .close-modal {
        background: none;

        border: none;

        color: #8291aa;

        font-size: 27px;

        cursor: pointer;

        line-height: 1;
    }


    .close-modal:hover {
        color: #ffffff;
    }


    .modal-body {
        padding: 22px;
    }


    /* =========================================================
       FORM
    ========================================================= */

    .form-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 18px;
    }


    .form-group {
        margin-bottom: 18px;
    }


    .form-label {
        display: block;

        color: #b9c5d8;

        font-size: 13px;

        margin-bottom: 8px;
    }


    .required-star {
        color: #10bce8;
    }


    .form-control-aspia {
        width: 100%;

        box-sizing: border-box;

        background: #0e1836;

        border: 1px solid #27496b;

        border-radius: 8px;

        padding: 11px 13px;

        color: #ffffff;

        outline: none;

        font-size: 14px;
    }


    .form-control-aspia:focus {
        border-color: #10bce8;

        box-shadow: 0 0 0 2px rgba(16,188,232,.08);
    }


    .form-control-aspia::placeholder {
        color: #687993;
    }


    textarea.form-control-aspia {
        min-height: 110px;

        resize: vertical;
    }


    .full-width {
        grid-column: 1 / -1;
    }


    /* =========================================================
       REQUIREMENT TEMPLATE
    ========================================================= */

    .template-editor {
        width: 100%;
        min-height: 430px;
        box-sizing: border-box;

        background: #0e1836;

        border: 1px solid #27496b;

        border-radius: 8px;

        padding: 13px;

        color: #ffffff;

        outline: none;

        resize: vertical;

        font-family: Consolas, Monaco, 'Courier New', monospace;

        font-size: 13px;

        line-height: 1.6;

        tab-size: 4;
    }


    .template-editor:focus {
        border-color: #10bce8;

        box-shadow: 0 0 0 2px rgba(16,188,232,.08);
    }


    .template-help {
        margin-top: 12px;

        padding: 14px;

        background: #0e1836;

        border: 1px solid #27496b;

        border-radius: 8px;
    }


    .template-help-title {
        color: #ffffff;

        font-size: 13px;

        font-weight: 600;

        margin-bottom: 9px;
    }


    .template-help-text {
        color: #8291aa;

        font-size: 12px;

        line-height: 1.6;

        margin-bottom: 10px;
    }


    .placeholder-list {
        display: flex;

        flex-wrap: wrap;

        gap: 7px;
    }


    .placeholder-btn {
        border: 1px solid rgba(16,188,232,.25);

        background: rgba(16,188,232,.08);

        color: #10bce8;

        border-radius: 6px;

        padding: 6px 9px;

        font-family: Consolas, Monaco, 'Courier New', monospace;

        font-size: 11px;

        cursor: pointer;
    }


    .placeholder-btn:hover {
        background: rgba(16,188,232,.16);

        border-color: #10bce8;
    }


    /* =========================================================
       MODAL FOOTER
    ========================================================= */

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


    /* =========================================================
       IMPORT
    ========================================================= */

    .import-info {
        color: #8291aa;

        font-size: 12px;

        margin-top: 10px;

        line-height: 1.5;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 900px) {

        .page-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: auto;
        }

        .modal-box {
            max-width: 650px;
        }

    }


    @media(max-width: 600px) {

        .search-form {
            width: 100%;
        }


        .search-input {
            width: 100%;
        }


        .header-actions {
            width: 100%;
        }


        .header-actions .btn-aspia {
            flex: 1;
        }


        .actions {
            flex-direction: column;
        }

    }

</style>


<div class="requirement-page">


    {{-- =====================================================
         SUCCESS MESSAGE
    ====================================================== --}}

    @if(session('success'))

        <div class="alert-success">

            {{ session('success') }}

        </div>

    @endif

    {{-- =====================================================
         ERROR MESSAGE
    ====================================================== --}}

    @if(session('error'))

        <div class="alert-error">

            {{ session('error') }}

        </div>

    @endif


    {{-- =====================================================
         VALIDATION ERRORS
    ====================================================== --}}

    @if($errors->any())

        <div class="alert-error">

            <strong>Please fix the following:</strong>

            <ul style="margin:8px 0 0 18px;">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="page-header">

        <div>

            <h1>
                Requirements
            </h1>

            <p>
                Manage compliance requirements under your controls.
            </p>

        </div>


        <div class="header-actions">


            {{-- =================================================
                 ADD REQUIREMENT TEMPLATE
            ================================================== --}}

            <button
                type="button"
                class="btn-aspia btn-secondary-aspia"
                onclick="openModal('requirementTemplateModal')"
            >

                + Add Requirement Template

            </button>


            {{-- =================================================
                 IMPORT XLSX
            ================================================== --}}

            <button
                type="button"
                class="btn-aspia btn-secondary-aspia"
                onclick="openModal('importModal')"
            >

                ↑ Import XLSX

            </button>


            {{-- =================================================
                 ADD REQUIREMENT
            ================================================== --}}

            <button
                type="button"
                class="btn-aspia btn-primary-aspia"
                onclick="openModal('addModal')"
            >

                + Add Requirement

            </button>


        </div>

    </div>


    {{-- =====================================================
         REQUIREMENT MANAGEMENT PANEL
    ====================================================== --}}

    <div class="requirement-panel">


        <div class="panel-header">

            <h2>
                Requirement Management
            </h2>


            {{-- SEARCH --}}

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
                    class="btn-aspia btn-secondary-aspia"
                >

                    Search

                </button>

            </form>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="table-wrapper">

            <table class="requirement-table">


                <thead>

                    <tr>

                        <th>
                            Requirement ID
                        </th>

                        <th>
                            Control ID
                        </th>

                        <th>
                            Requirement Title
                        </th>

                        <th>
                            Requirement
                        </th>

                        <th>
                            Typical Owner
                        </th>

                        <th>
                            Created
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($requirements as $requirement)


                        <tr>


                            {{-- Requirement ID --}}

                            <td>

                                <span class="requirement-id">

                                    {{ $requirement->requirement_id }}

                                </span>

                            </td>


                            {{-- Control ID --}}

                            <td>

                                <span class="control-id">

                                    {{ $requirement->control_id ?: '—' }}

                                </span>

                            </td>


                            {{-- Requirement Title --}}

                            <td>

                                <a
                                    href="{{ route(
                                        'requirements.show',
                                        ['requirement_id' => $requirement->requirement_id]
                                    ) }}"
                                    class="requirement-title-link"
                                >

                                    {{ $requirement->requirement_title }}

                                </a>

                            </td>


                            {{-- Requirement Summary --}}

                            <td>

                                <span class="requirement-text" title="{{ $requirement->requirement }}">
                                    {{ \Illuminate\Support\Str::limit(
                                        $requirement->requirement,
                                        55
                                    ) }}
                                </span>

                            </td>


                            {{-- Typical Owner --}}

                            <td>

                                {{ $requirement->typical_owner ?: '—' }}

                            </td>


                            {{-- Created --}}

                            <td>

                                {{ $requirement->created_at?->format('d M Y') }}

                            </td>


                            {{-- Actions --}}

                            <td>

                                <div class="actions">


                                    {{-- EDIT --}}

                                    <button
                                        type="button"
                                        class="action-btn"

                                        onclick="openEditModal(
                                            {{ $requirement->id }},

                                            @js($requirement->requirement_id),

                                            @js($requirement->control_id),

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


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('requirements.destroy', $requirement) }}"
                                        method="POST"

                                        onsubmit="return confirm(
                                            'Are you sure you want to delete this requirement?'
                                        )"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="action-btn btn-danger-aspia"
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
                                colspan="7"
                                class="empty-state"
                            >

                                <div class="empty-state-icon">
                                    ◇
                                </div>

                                No requirements found.

                            </td>

                        </tr>


                    @endforelse


                </tbody>

            </table>

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if($requirements->hasPages())

            <div class="pagination-area">

                <div class="custom-pagination">

                    {{-- Previous --}}
                    @if($requirements->onFirstPage())
                        <span class="disabled-page">Previous</span>
                    @else
                        <a href="{{ $requirements->previousPageUrl() }}">
                            Previous
                        </a>
                    @endif

                    {{-- Page numbers --}}
                    @foreach(range(1, $requirements->lastPage()) as $page)

                        @if(
                            $page == 1 ||
                            $page == $requirements->lastPage() ||
                            abs($page - $requirements->currentPage()) <= 2
                        )

                            @if($page == $requirements->currentPage())

                                <span class="active-page">
                                    {{ $page }}
                                </span>

                            @else

                                <a href="{{ $requirements->url($page) }}">
                                    {{ $page }}
                                </a>

                            @endif

                        @elseif(
                            $page == 2 ||
                            $page == $requirements->lastPage() - 1
                        )

                            <span class="pagination-info">...</span>

                        @endif

                    @endforeach

                    {{-- Next --}}
                    @if($requirements->hasMorePages())
                        <a href="{{ $requirements->nextPageUrl() }}">
                            Next
                        </a>
                    @else
                        <span class="disabled-page">Next</span>
                    @endif

                </div>

            </div>

        @endif


    </div>


</div>



{{-- =========================================================
     ADD REQUIREMENT TEMPLATE MODAL
========================================================= --}}

<div
    id="requirementTemplateModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'requirementTemplateModal')"
>


    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Add Requirement Template
            </h2>


            <button
                type="button"
                class="close-modal"
                onclick="closeModal('requirementTemplateModal')"
            >

                ×

            </button>

        </div>


        <form
            action="{{ route('requirements.template.store') }}"
            method="POST"
        >

            @csrf


            <div class="modal-body">


                <div class="form-group">


                    <label class="form-label">

                        HTML Template

                        <span class="required-star">
                            *
                        </span>

                    </label>


                    <textarea
                        name="html_content"
                        id="requirementTemplate"
                        class="template-editor"
                        placeholder="Write your HTML template here..."
                        required
                    >{{ old('html_content', $requirementTemplate?->html_content ?? '') }}</textarea>


                    <div class="template-help">


                        <div class="template-help-title">

                            Available Requirement Placeholders

                        </div>


                        <div class="template-help-text">

                            Use these placeholders inside your HTML.
                            When a Requirement record is opened,
                            the placeholders will be replaced with
                            the actual Requirement values.

                        </div>


                        <div class="placeholder-list">


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;requirement_id&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;requirement_id&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_id&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_id&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;requirement_title&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;requirement_title&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;requirement&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;requirement&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;why_requirement_exists&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;why_requirement_exists&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;implementation_guidance&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;implementation_guidance&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;common_audit_findings&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;common_audit_findings&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;common_mistakes&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;common_mistakes&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;best_practices&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;best_practices&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;business_examples&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;business_examples&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;typical_owner&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;typical_owner&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_name&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_name&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_category&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_category&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_summary&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_summary&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_name&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_name&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_code&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_code&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;framework_name&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;framework_name&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_badge&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_badge&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_badge&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_badge&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;framework_badge&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;framework_badge&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_id&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_id&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;framework_id&#125;&#125;"
                                onclick="insertRequirementPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;framework_id&#125;&#125;
                            </button>

                        </div>


                    </div>


                </div>


            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-aspia btn-secondary-aspia"
                    onclick="closeModal('requirementTemplateModal')"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="btn-aspia btn-primary-aspia"
                >
                    Save Template
                </button>

            </div>


        </form>


    </div>


</div>



{{-- =========================================================
     IMPORT REQUIREMENTS MODAL
========================================================= --}}

<div
    id="importModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'importModal')"
>


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


                <div class="form-group full-width">

                    <label class="form-label">
                        Select XLSX File
                        <span class="required-star">
                            *
                        </span>
                    </label>

                    <input
                        type="file"
                        name="file"
                        class="form-control-aspia"
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
                    class="btn-aspia btn-secondary-aspia"
                    onclick="closeModal('importModal')"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="btn-aspia btn-primary-aspia"
                >
                    Import XLSX
                </button>

            </div>


        </form>


    </div>


</div>



{{-- =========================================================
     ADD REQUIREMENT MODAL
========================================================= --}}

<div
    id="addModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'addModal')"
>


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


                <div class="form-grid">


                    {{-- REQUIREMENT ID --}}

                    <div class="form-group">

                        <label class="form-label">
                            Requirement ID
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            name="requirement_id"
                            class="form-control-aspia"
                            placeholder="e.g. REQ-001"
                            value="{{ old('requirement_id') }}"
                            required
                        >

                    </div>


                    {{-- CONTROL ID --}}

                    <div class="form-group">

                        <label class="form-label">
                            Control ID
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            name="control_id"
                            class="form-control-aspia"
                            placeholder="e.g. CTRL-001"
                            value="{{ old('control_id') }}"
                            required
                        >

                    </div>


                    {{-- REQUIREMENT TITLE --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Requirement Title
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            name="requirement_title"
                            class="form-control-aspia"
                            placeholder="Enter Requirement Title"
                            value="{{ old('requirement_title') }}"
                            required
                        >

                    </div>


                    {{-- REQUIREMENT --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Requirement
                            <span class="required-star">*</span>
                        </label>

                        <textarea
                            name="requirement"
                            class="form-control-aspia"
                            placeholder="Enter Requirement text"
                            required
                        >{{ old('requirement') }}</textarea>

                    </div>


                    {{-- WHY REQUIREMENT EXISTS --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Why this Requirement Exists
                        </label>

                        <textarea
                            name="why_requirement_exists"
                            class="form-control-aspia"
                            placeholder="Enter why this requirement exists"
                        >{{ old('why_requirement_exists') }}</textarea>

                    </div>


                    {{-- IMPLEMENTATION GUIDANCE --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Implementation Guidance
                        </label>

                        <textarea
                            name="implementation_guidance"
                            class="form-control-aspia"
                            placeholder="Enter Implementation Guidance"
                        >{{ old('implementation_guidance') }}</textarea>

                    </div>


                    {{-- COMMON AUDIT FINDINGS --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Common Audit Findings
                        </label>

                        <textarea
                            name="common_audit_findings"
                            class="form-control-aspia"
                            placeholder="Enter Common Audit Findings"
                        >{{ old('common_audit_findings') }}</textarea>

                    </div>


                    {{-- COMMON MISTAKES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Common Mistakes
                        </label>

                        <textarea
                            name="common_mistakes"
                            class="form-control-aspia"
                            placeholder="Enter Common Mistakes"
                        >{{ old('common_mistakes') }}</textarea>

                    </div>


                    {{-- BEST PRACTICES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Best Practices
                        </label>

                        <textarea
                            name="best_practices"
                            class="form-control-aspia"
                            placeholder="Enter Best Practices"
                        >{{ old('best_practices') }}</textarea>

                    </div>


                    {{-- BUSINESS EXAMPLES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Examples
                        </label>

                        <textarea
                            name="business_examples"
                            class="form-control-aspia"
                            placeholder="Enter Business Examples"
                        >{{ old('business_examples') }}</textarea>

                    </div>


                    {{-- TYPICAL OWNER --}}

                    <div class="form-group">

                        <label class="form-label">
                            Typical Owner
                        </label>

                        <input
                            type="text"
                            name="typical_owner"
                            class="form-control-aspia"
                            placeholder="Enter Typical Owner"
                            value="{{ old('typical_owner') }}"
                        >

                    </div>


                </div>


            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-aspia btn-secondary-aspia"
                    onclick="closeModal('addModal')"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="btn-aspia btn-primary-aspia"
                >
                    Add Requirement
                </button>

            </div>


        </form>


    </div>


</div>



{{-- =========================================================
     EDIT REQUIREMENT MODAL
========================================================= --}}

<div
    id="editModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'editModal')"
>


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
            id="editRequirementForm"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="modal-body">


                <div class="form-grid">


                    {{-- REQUIREMENT ID --}}

                    <div class="form-group">

                        <label class="form-label">
                            Requirement ID
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            id="editRequirementId"
                            name="requirement_id"
                            class="form-control-aspia"
                            required
                        >

                    </div>


                    {{-- CONTROL ID --}}

                    <div class="form-group">

                        <label class="form-label">
                            Control ID
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            id="editControlId"
                            name="control_id"
                            class="form-control-aspia"
                            required
                        >

                    </div>


                    {{-- REQUIREMENT TITLE --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Requirement Title
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            id="editRequirementTitle"
                            name="requirement_title"
                            class="form-control-aspia"
                            required
                        >

                    </div>


                    {{-- REQUIREMENT --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Requirement
                            <span class="required-star">*</span>
                        </label>

                        <textarea
                            id="editRequirement"
                            name="requirement"
                            class="form-control-aspia"
                            required
                        ></textarea>

                    </div>


                    {{-- WHY REQUIREMENT EXISTS --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Why this Requirement Exists
                        </label>

                        <textarea
                            id="editWhyRequirementExists"
                            name="why_requirement_exists"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- IMPLEMENTATION GUIDANCE --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Implementation Guidance
                        </label>

                        <textarea
                            id="editImplementationGuidance"
                            name="implementation_guidance"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- COMMON AUDIT FINDINGS --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Common Audit Findings
                        </label>

                        <textarea
                            id="editCommonAuditFindings"
                            name="common_audit_findings"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- COMMON MISTAKES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Common Mistakes
                        </label>

                        <textarea
                            id="editCommonMistakes"
                            name="common_mistakes"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- BEST PRACTICES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Best Practices
                        </label>

                        <textarea
                            id="editBestPractices"
                            name="best_practices"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- BUSINESS EXAMPLES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Examples
                        </label>

                        <textarea
                            id="editBusinessExamples"
                            name="business_examples"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- TYPICAL OWNER --}}

                    <div class="form-group">

                        <label class="form-label">
                            Typical Owner
                        </label>

                        <input
                            type="text"
                            id="editTypicalOwner"
                            name="typical_owner"
                            class="form-control-aspia"
                        >

                    </div>


                </div>


            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-aspia btn-secondary-aspia"
                    onclick="closeModal('editModal')"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="btn-aspia btn-primary-aspia"
                >
                    Save Changes
                </button>

            </div>


        </form>


    </div>


</div>



<script>

    /* =====================================================
       OPEN MODAL
    ====================================================== */

    function openModal(id)
    {
        const modal =
            document.getElementById(id);

        if (modal) {

            modal.classList.add('show');

            document.body.style.overflow = 'hidden';

        }
    }


    /* =====================================================
       CLOSE MODAL
    ====================================================== */

    function closeModal(id)
    {
        const modal =
            document.getElementById(id);

        if (modal) {

            modal.classList.remove('show');

            document.body.style.overflow = '';

        }
    }


    /* =====================================================
       CLOSE WHEN CLICKING OUTSIDE
    ====================================================== */

    function closeModalOutside(event, id)
    {

        if (event.target.id === id) {

            closeModal(id);

        }

    }


    /* =====================================================
       INSERT REQUIREMENT PLACEHOLDER
    ====================================================== */

    function insertRequirementPlaceholder(placeholder)
    {
        const textarea =
            document.getElementById(
                'requirementTemplate'
            );

        if (!textarea) {
            return;
        }


        const start =
            textarea.selectionStart;

        const end =
            textarea.selectionEnd;

        const currentValue =
            textarea.value;


        textarea.value =
            currentValue.substring(
                0,
                start
            )
            +
            placeholder
            +
            currentValue.substring(
                end
            );


        textarea.focus();


        const newCursorPosition =
            start + placeholder.length;


        textarea.selectionStart =
            newCursorPosition;

        textarea.selectionEnd =
            newCursorPosition;
    }


    /* =====================================================
       OPEN EDIT MODAL
    ====================================================== */

    function openEditModal(

        id,

        requirementId,

        controlId,

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


        /* FORM ACTION */

        document
            .getElementById(
                'editRequirementForm'
            )
            .action =
                `/requirements/${id}`;


        /* REQUIREMENT ID */

        document
            .getElementById(
                'editRequirementId'
            )
            .value =
                requirementId || '';


        /* CONTROL ID */

        document
            .getElementById(
                'editControlId'
            )
            .value =
                controlId || '';


        /* REQUIREMENT TITLE */

        document
            .getElementById(
                'editRequirementTitle'
            )
            .value =
                requirementTitle || '';


        /* REQUIREMENT */

        document
            .getElementById(
                'editRequirement'
            )
            .value =
                requirement || '';


        /* WHY REQUIREMENT EXISTS */

        document
            .getElementById(
                'editWhyRequirementExists'
            )
            .value =
                whyRequirementExists || '';


        /* IMPLEMENTATION GUIDANCE */

        document
            .getElementById(
                'editImplementationGuidance'
            )
            .value =
                implementationGuidance || '';


        /* COMMON AUDIT FINDINGS */

        document
            .getElementById(
                'editCommonAuditFindings'
            )
            .value =
                commonAuditFindings || '';


        /* COMMON MISTAKES */

        document
            .getElementById(
                'editCommonMistakes'
            )
            .value =
                commonMistakes || '';


        /* BEST PRACTICES */

        document
            .getElementById(
                'editBestPractices'
            )
            .value =
                bestPractices || '';


        /* BUSINESS EXAMPLES */

        document
            .getElementById(
                'editBusinessExamples'
            )
            .value =
                businessExamples || '';


        /* TYPICAL OWNER */

        document
            .getElementById(
                'editTypicalOwner'
            )
            .value =
                typicalOwner || '';


        /* SHOW MODAL */

        openModal('editModal');

    }


    /* =====================================================
       ESCAPE KEY
    ====================================================== */

    document.addEventListener(
        'keydown',
        function(event)
        {

            if (event.key === 'Escape') {

                document
                    .querySelectorAll(
                        '.modal-overlay'
                    )
                    .forEach(
                        function(modal)
                        {

                            modal
                                .classList
                                .remove('show');

                        }
                    );


                document.body.style.overflow = '';

            }

        }
    );

</script>


@endsection