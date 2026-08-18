@extends('layouts.aspiaUcl')

@section('title', ' | Controls')

@section('page-title', 'Controls')

@section('content')

<style>
    /* =========================================================
       PAGE
    ========================================================= */
    .module-page {
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

    .btn-primary {
        background: #10bce8;
        color: #07152e;
        border: 1px solid #10bce8;
    }

    .btn-primary:hover {
        background: #20c9f2;
        color: #07152e;
    }

    .btn-secondary {
        background: #162544;
        color: #ffffff;
        border: 1px solid #1c4266;
    }

    .btn-secondary:hover {
        background: #1c3155;
        border-color: #1c4266;
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

    .module-table {
        width: 100%;
        min-width: 1500px;
        border-collapse: collapse;
    }

    .module-table th {
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

    .module-table td {
        padding: 16px;
        border-top: 1px solid rgba(255,255,255,.06);
        color: #b9c5d8;
        font-size: 13px;
        vertical-align: middle;
        white-space: nowrap;
    }

    .module-table tr:hover td {
        background: rgba(16,188,232,.025);
    }

    .module-name {
        color: #ffffff;
        text-decoration: none;
        font-weight: 500;
    }

    .module-name:hover {
        color: #10bce8;
        text-decoration: none;
    }

    .badge {
        color: #10bce8;
        font-weight: 600;
        background: transparent;
        padding: 0;
        border-radius: 0;
        font-size: 13px;
    }

    .status-badge {
        padding: 5px 9px;
        border-radius: 6px;
        background: rgba(34,197,94,.10);
        color: #6ee7a0;
        font-size: 12px;
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

    .action-btn:hover {
        color: #ffffff;
        border-color: #10bce8;
    }

    .btn-danger {
        background: rgba(239,68,68,.12);
        color: #ff7070;
        border: 1px solid rgba(239,68,68,.2);
    }

    .btn-danger:hover {
        background: rgba(239,68,68,.20);
        border-color: rgba(239,68,68,.2);
    }

    .empty-state {
        text-align: center;
        padding: 50px 20px !important;
        color: #71829f !important;
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
       MODALS
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
        max-width: 1050px;
        max-height: 90vh;
        overflow-y: auto;
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 14px;
        box-shadow: 0 20px 60px rgba(0,0,0,.5);
    }

    .modal-box.template-modal {
        max-width: 1150px;
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
        box-sizing: border-box;
        background: #0e1836;
        border: 1px solid #27496b;
        border-radius: 8px;
        padding: 11px 13px;
        color: #ffffff;
        outline: none;
        font-size: 14px;
    }

    .form-control:focus {
        border-color: #10bce8;
        box-shadow: 0 0 0 2px rgba(16,188,232,.08);
    }

    .form-control::placeholder {
        color: #687993;
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

    /* =========================================================
       TEMPLATE EDITOR
    ========================================================= */
    .template-body {
        display: block;
        padding: 22px;
    }

    .template-label {
        display: block;
        color: #b9c5d8;
        font-size: 13px;
        margin-bottom: 8px;
    }

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

    .placeholder-title {
        margin-top: 20px;
        margin-bottom: 9px;
        color: #ffffff;
        font-size: 13px;
        font-weight: 600;
    }

    .placeholder-description {
        color: #8291aa;
        font-size: 12px;
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .placeholder-grid {
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

    .template-info,
    .import-info {
        margin-top: 12px;
        color: #71829f;
        font-size: 12px;
        line-height: 1.5;
    }

    /* =========================================================
       FILE INPUT
    ========================================================= */
    input[type="file"] {
        padding: 8px;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */
    @media(max-width: 900px) {
        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .modal-body {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
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


<div class="module-page">


    {{-- =========================================================
         SUCCESS MESSAGE
    ========================================================= --}}

    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- =========================================================
         ERROR MESSAGE
    ========================================================= --}}

    @if(session('error'))

        <div class="alert-error">
            {{ session('error') }}
        </div>

    @endif


    {{-- =========================================================
         VALIDATION ERRORS
    ========================================================= --}}

    @if($errors->any())

        <div class="alert-error">

            <strong>Please fix the following:</strong>

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =========================================================
         PAGE HEADER
    ========================================================= --}}

    <div class="page-header">

        <div>

            <h1>
                Controls
            </h1>

            <p>
                Manage governance controls under your domains.
            </p>

        </div>


        <div class="header-actions">

            {{-- ADD CONTROL TEMPLATE --}}
            <button
                type="button"
                class="btn-aspia btn-secondary"
                onclick="openModal('controlTemplateModal')"
            >
                + Add Control Template
            </button>


            {{-- IMPORT XLSX --}}
            <button
                type="button"
                class="btn-aspia btn-secondary"
                onclick="openModal('importModal')"
            >
                ↑ Import XLSX
            </button>


            {{-- ADD CONTROL --}}
            <button
                type="button"
                class="btn-aspia btn-primary"
                onclick="openModal('addModal')"
            >
                + Add Control
            </button>

        </div>

    </div>


    {{-- =========================================================
         CONTROL MANAGEMENT
    ========================================================= --}}

    <div class="panel">

        <div class="panel-header">

            <h2>
                Control Management
            </h2>


            <form
                action="{{ route('controls.index') }}"
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search controls..."
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

                        <th>Control ID</th>
                        <th>Domain Code</th>
                        <th>Control Name</th>
                        <th>Category</th>
                        <th>Criticality</th>
                        <th>Status</th>
                        <th>Version</th>
                        <th>Control Type</th>
                        <th>Created</th>
                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($controls as $control)

                        <tr>

                            {{-- CONTROL ID --}}

                            <td>

                                <span class="badge">
                                    {{ $control->control_id }}
                                </span>

                            </td>


                            {{-- DOMAIN CODE --}}

                            <td>

                                <span class="badge">
                                    {{ $control->domain_code ?: 'N/A' }}
                                </span>

                            </td>


                            {{-- CONTROL NAME --}}

                            <td>

                                <a
                                    href="{{ route('controls.show', $control->control_id) }}"
                                    class="module-name"
                                >
                                    {{ $control->name }}
                                </a>

                            </td>


                            {{-- CATEGORY --}}

                            <td>
                                {{ $control->control_category ?: 'N/A' }}
                            </td>


                            {{-- CRITICALITY --}}

                            <td>
                                {{ $control->criticality ?: 'N/A' }}
                            </td>


                            {{-- STATUS --}}

                            <td>

                                <span class="status-badge">
                                    {{ $control->status }}
                                </span>

                            </td>


                            {{-- VERSION --}}

                            <td>
                                {{ $control->version ?: 'N/A' }}
                            </td>


                            {{-- CONTROL TYPE --}}

                            <td>
                                {{ $control->control_type ?: 'N/A' }}
                            </td>


                            {{-- CREATED --}}

                            <td>
                                {{ $control->created_at?->format('d M Y') }}
                            </td>


                            {{-- ACTIONS --}}

                            <td>

                                <div class="actions">


                                    {{-- EDIT --}}

                                    <button
                                        type="button"
                                        class="action-btn"
                                        onclick="openEditModal(
                                            {{ $control->id }},
                                            @js($control->control_id),
                                            @js($control->domain_code),
                                            @js($control->name),
                                            @js($control->business_description),
                                            @js($control->business_objective),
                                            @js($control->business_owner),
                                            @js($control->control_category),
                                            @js($control->criticality),
                                            @js($control->applicable_industries),
                                            @js($control->applicable_technologies),
                                            @js($control->status),
                                            @js($control->version),
                                            @js($control->control_summary),
                                            @js($control->business_benefits),
                                            @js($control->business_risks_if_missing),
                                            @js($control->primary_stakeholders),
                                            @js($control->control_type)
                                        )"
                                    >
                                        Edit
                                    </button>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('controls.destroy', $control) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this control?')"
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
                                colspan="10"
                                class="empty-state"
                            >
                                No controls found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($controls->hasPages())

            <div class="pagination-area">

                <div class="custom-pagination">

                    {{-- Previous --}}
                    @if($controls->onFirstPage())
                        <span class="disabled-page">Previous</span>
                    @else
                        <a href="{{ $controls->previousPageUrl() }}">
                            Previous
                        </a>
                    @endif

                    {{-- Page numbers --}}
                    @foreach(range(1, $controls->lastPage()) as $page)

                        @if(
                            $page == 1 ||
                            $page == $controls->lastPage() ||
                            abs($page - $controls->currentPage()) <= 2
                        )

                            @if($page == $controls->currentPage())

                                <span class="active-page">
                                    {{ $page }}
                                </span>

                            @else

                                <a href="{{ $controls->url($page) }}">
                                    {{ $page }}
                                </a>

                            @endif

                        @elseif(
                            $page == 2 ||
                            $page == $controls->lastPage() - 1
                        )

                            <span class="pagination-info">...</span>

                        @endif

                    @endforeach

                    {{-- Next --}}
                    @if($controls->hasMorePages())
                        <a href="{{ $controls->nextPageUrl() }}">
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
     ADD CONTROL
========================================================= --}}

<div
    id="addModal"
    class="modal-overlay"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Add Control
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
            action="{{ route('controls.store') }}"
            method="POST"
        >

            @csrf


            <div class="modal-body">


                {{-- CONTROL ID --}}

                <div class="form-group">

                    <label class="form-label">
                        Control ID *
                    </label>

                    <input
                        type="text"
                        name="control_id"
                        class="form-control"
                        placeholder="Enter Control ID"
                        value="{{ old('control_id') }}"
                        required
                    >

                </div>


                {{-- DOMAIN CODE --}}

                <div class="form-group">

                    <label class="form-label">
                        Domain Code *
                    </label>

                    <input
                        type="text"
                        name="domain_code"
                        class="form-control"
                        placeholder="Enter Domain Code"
                        value="{{ old('domain_code') }}"
                        required
                    >

                </div>


                {{-- CONTROL NAME --}}

                <div class="form-group full">

                    <label class="form-label">
                        Control Name *
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter Control Name"
                        value="{{ old('name') }}"
                        required
                    >

                </div>


                {{-- BUSINESS DESCRIPTION --}}

                <div class="form-group full">

                    <label class="form-label">
                        Business Description
                    </label>

                    <textarea
                        name="business_description"
                        class="form-control"
                        placeholder="Enter Business Description"
                    >{{ old('business_description') }}</textarea>

                </div>


                {{-- BUSINESS OBJECTIVE --}}

                <div class="form-group full">

                    <label class="form-label">
                        Business Objective
                    </label>

                    <textarea
                        name="business_objective"
                        class="form-control"
                        placeholder="Enter Business Objective"
                    >{{ old('business_objective') }}</textarea>

                </div>


                {{-- BUSINESS OWNER --}}

                <div class="form-group">

                    <label class="form-label">
                        Business Owner
                    </label>

                    <input
                        type="text"
                        name="business_owner"
                        class="form-control"
                        placeholder="Enter Business Owner"
                        value="{{ old('business_owner') }}"
                    >

                </div>


                {{-- CONTROL CATEGORY --}}

                <div class="form-group">

                    <label class="form-label">
                        Control Category
                    </label>

                    <input
                        type="text"
                        name="control_category"
                        class="form-control"
                        placeholder="Enter Control Category"
                        value="{{ old('control_category') }}"
                    >

                </div>


                {{-- CRITICALITY --}}

                <div class="form-group">

                    <label class="form-label">
                        Criticality
                    </label>

                    <input
                        type="text"
                        name="criticality"
                        class="form-control"
                        placeholder="Enter Criticality"
                        value="{{ old('criticality') }}"
                    >

                </div>


                {{-- APPLICABLE INDUSTRIES --}}

                <div class="form-group">

                    <label class="form-label">
                        Applicable Industries
                    </label>

                    <textarea
                        name="applicable_industries"
                        class="form-control"
                        placeholder="Enter Applicable Industries"
                    >{{ old('applicable_industries') }}</textarea>

                </div>


                {{-- APPLICABLE TECHNOLOGIES --}}

                <div class="form-group">

                    <label class="form-label">
                        Applicable Technologies
                    </label>

                    <textarea
                        name="applicable_technologies"
                        class="form-control"
                        placeholder="Enter Applicable Technologies"
                    >{{ old('applicable_technologies') }}</textarea>

                </div>


                {{-- STATUS --}}

                <div class="form-group">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-control"
                    >

                        <option value="Active">
                            Active
                        </option>

                        <option value="Inactive">
                            Inactive
                        </option>

                        <option value="Draft">
                            Draft
                        </option>

                    </select>

                </div>


                {{-- VERSION --}}

                <div class="form-group">

                    <label class="form-label">
                        Version
                    </label>

                    <input
                        type="text"
                        name="version"
                        class="form-control"
                        placeholder="Enter Version"
                        value="{{ old('version') }}"
                    >

                </div>


                {{-- CONTROL SUMMARY --}}

                <div class="form-group full">

                    <label class="form-label">
                        Control Summary
                    </label>

                    <textarea
                        name="control_summary"
                        class="form-control"
                        placeholder="Enter Control Summary"
                    >{{ old('control_summary') }}</textarea>

                </div>


                {{-- BUSINESS BENEFITS --}}

                <div class="form-group full">

                    <label class="form-label">
                        Business Benefits
                    </label>

                    <textarea
                        name="business_benefits"
                        class="form-control"
                        placeholder="Enter Business Benefits"
                    >{{ old('business_benefits') }}</textarea>

                </div>


                {{-- BUSINESS RISKS IF MISSING --}}

                <div class="form-group full">

                    <label class="form-label">
                        Business Risks if Missing
                    </label>

                    <textarea
                        name="business_risks_if_missing"
                        class="form-control"
                        placeholder="Enter Business Risks if Missing"
                    >{{ old('business_risks_if_missing') }}</textarea>

                </div>


                {{-- PRIMARY STAKEHOLDERS --}}

                <div class="form-group full">

                    <label class="form-label">
                        Primary Stakeholders
                    </label>

                    <textarea
                        name="primary_stakeholders"
                        class="form-control"
                        placeholder="Enter Primary Stakeholders"
                    >{{ old('primary_stakeholders') }}</textarea>

                </div>


                {{-- CONTROL TYPE --}}

                <div class="form-group">

                    <label class="form-label">
                        Control Type
                    </label>

                    <input
                        type="text"
                        name="control_type"
                        class="form-control"
                        placeholder="Enter Control Type"
                        value="{{ old('control_type') }}"
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
                    Add Control
                </button>

            </div>

        </form>

    </div>

</div>



{{-- =========================================================
     EDIT CONTROL
========================================================= --}}

<div
    id="editModal"
    class="modal-overlay"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Edit Control
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


                <div class="form-group">

                    <label class="form-label">
                        Control ID *
                    </label>

                    <input
                        type="text"
                        id="editControlId"
                        name="control_id"
                        class="form-control"
                        required
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Domain Code *
                    </label>

                    <input
                        type="text"
                        id="editDomainCode"
                        name="domain_code"
                        class="form-control"
                        required
                    >

                </div>


                <div class="form-group full">

                    <label class="form-label">
                        Control Name *
                    </label>

                    <input
                        type="text"
                        id="editName"
                        name="name"
                        class="form-control"
                        required
                    >

                </div>


                <div class="form-group full">

                    <label class="form-label">
                        Business Description
                    </label>

                    <textarea
                        id="editBusinessDescription"
                        name="business_description"
                        class="form-control"
                    ></textarea>

                </div>


                <div class="form-group full">

                    <label class="form-label">
                        Business Objective
                    </label>

                    <textarea
                        id="editBusinessObjective"
                        name="business_objective"
                        class="form-control"
                    ></textarea>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Business Owner
                    </label>

                    <input
                        type="text"
                        id="editBusinessOwner"
                        name="business_owner"
                        class="form-control"
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Control Category
                    </label>

                    <input
                        type="text"
                        id="editControlCategory"
                        name="control_category"
                        class="form-control"
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Criticality
                    </label>

                    <input
                        type="text"
                        id="editCriticality"
                        name="criticality"
                        class="form-control"
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Applicable Industries
                    </label>

                    <textarea
                        id="editApplicableIndustries"
                        name="applicable_industries"
                        class="form-control"
                    ></textarea>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Applicable Technologies
                    </label>

                    <textarea
                        id="editApplicableTechnologies"
                        name="applicable_technologies"
                        class="form-control"
                    ></textarea>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        id="editStatus"
                        name="status"
                        class="form-control"
                    >

                        <option value="Active">
                            Active
                        </option>

                        <option value="Inactive">
                            Inactive
                        </option>

                        <option value="Draft">
                            Draft
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Version
                    </label>

                    <input
                        type="text"
                        id="editVersion"
                        name="version"
                        class="form-control"
                    >

                </div>


                <div class="form-group full">

                    <label class="form-label">
                        Control Summary
                    </label>

                    <textarea
                        id="editControlSummary"
                        name="control_summary"
                        class="form-control"
                    ></textarea>

                </div>


                <div class="form-group full">

                    <label class="form-label">
                        Business Benefits
                    </label>

                    <textarea
                        id="editBusinessBenefits"
                        name="business_benefits"
                        class="form-control"
                    ></textarea>

                </div>


                <div class="form-group full">

                    <label class="form-label">
                        Business Risks if Missing
                    </label>

                    <textarea
                        id="editBusinessRisksIfMissing"
                        name="business_risks_if_missing"
                        class="form-control"
                    ></textarea>

                </div>


                <div class="form-group full">

                    <label class="form-label">
                        Primary Stakeholders
                    </label>

                    <textarea
                        id="editPrimaryStakeholders"
                        name="primary_stakeholders"
                        class="form-control"
                    ></textarea>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Control Type
                    </label>

                    <input
                        type="text"
                        id="editControlType"
                        name="control_type"
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



{{-- =========================================================
     IMPORT CONTROL
========================================================= --}}

<div
    id="importModal"
    class="modal-overlay"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Import Controls
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
            action="{{ route('controls.import') }}"
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



{{-- =========================================================
     ADD CONTROL TEMPLATE
========================================================= --}}

<div
    id="controlTemplateModal"
    class="modal-overlay"
>

    <div class="modal-box template-modal">

        <div class="modal-header">

            <h2>
                Add Control Template
            </h2>

            <button
                type="button"
                class="close-modal"
                onclick="closeModal('controlTemplateModal')"
            >
                ×
            </button>

        </div>


        <form
            action="{{ route('controls.template.store') }}"
            method="POST"
        >

            @csrf


            <div class="template-body">

                <label
                    for="controlHtmlTemplate"
                    class="template-label"
                >
                    HTML Template
                </label>


                <textarea
                    id="controlHtmlTemplate"
                    name="html_content"
                    class="template-editor"
                    placeholder="Enter your HTML template here..."
                    required
                ></textarea>


                <div class="placeholder-title">
                    Available Control Placeholders
                </div>


                <div class="placeholder-description">
                    Click a placeholder to insert it into the HTML template.
                </div>


                <div class="placeholder-grid">


                    {{-- 1 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{control_id}}')"
>
                        @{{control_id}}
                    </button>


                    {{-- 2 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{domain_code}}')"
                    >
                        @{{domain_code}}
                    </button>


                    {{-- 3 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{control_name}}')"
                    >
                        @{{control_name}}
                    </button>


                    {{-- 4 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{business_description}}')"
                    >
                        @{{business_description}}
                    </button>


                    {{-- 5 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{business_objective}}')"
                    >
                        @{{business_objective}}
                    </button>


                    {{-- 6 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{business_owner}}')"
                    >
                        @{{business_owner}}
                    </button>


                    {{-- 7 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{control_category}}')"
                    >
                        @{{control_category}}
                    </button>


                    {{-- 8 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{criticality}}')"
                    >
                        @{{criticality}}
                    </button>


                    {{-- 9 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{applicable_industries}}')"
                    >
                        @{{applicable_industries}}
                    </button>


                    {{-- 10 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{applicable_technologies}}')"
                    >
                        @{{applicable_technologies}}
                    </button>


                    {{-- 11 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{status}}')"
                    >
                        @{{status}}
                    </button>


                    {{-- 12 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{version}}')"
                    >
                        @{{version}}
                    </button>


                    {{-- 13 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{control_summary}}')"
                    >
                        @{{control_summary}}
                    </button>


                    {{-- 14 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{business_benefits}}')"
                    >
                        @{{business_benefits}}
                    </button>


                    {{-- 15 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{business_risks_if_missing}}')"
                    >
                        @{{business_risks_if_missing}}
                    </button>


                    {{-- 16 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{primary_stakeholders}}')"
                    >
                        @{{primary_stakeholders}}
                    </button>


                    {{-- 17 --}}

                    <button
                        type="button"
                        class="placeholder-btn"
                        onclick="insertControlPlaceholder('@{{control_type}}')"
                    >
                        @{{control_type}}
                    </button>

                </div>


                <div class="template-info">
                    The template is shared by all Controls. Clicking a Control Name will render this template using that Control's data.
                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-aspia btn-secondary"
                    onclick="closeModal('controlTemplateModal')"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="btn-aspia btn-primary"
                >
                    Save Template
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
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.add('show');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Close Modal
    |--------------------------------------------------------------------------
    */

    function closeModal(id)
    {
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.remove('show');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Insert Control Placeholder
    |--------------------------------------------------------------------------
    */

    function insertControlPlaceholder(placeholder)
    {
        const editor =
            document.getElementById('controlHtmlTemplate');

        if (!editor) {
            return;
        }


        const start =
            editor.selectionStart;

        const end =
            editor.selectionEnd;

        const currentValue =
            editor.value;


        editor.value =
            currentValue.substring(0, start)
            +
            placeholder
            +
            currentValue.substring(end);


        const newPosition =
            start + placeholder.length;


        editor.focus();

        editor.setSelectionRange(
            newPosition,
            newPosition
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Control
    |--------------------------------------------------------------------------
    */

    function openEditModal(
        id,
        controlId,
        domainCode,
        name,
        businessDescription,
        businessObjective,
        businessOwner,
        controlCategory,
        criticality,
        applicableIndustries,
        applicableTechnologies,
        status,
        version,
        controlSummary,
        businessBenefits,
        businessRisksIfMissing,
        primaryStakeholders,
        controlType
    ) {


        document.getElementById('editForm').action =
            `/controls/${id}`;


        document.getElementById('editControlId').value =
            controlId ?? '';


        document.getElementById('editDomainCode').value =
            domainCode ?? '';


        document.getElementById('editName').value =
            name ?? '';


        document.getElementById('editBusinessDescription').value =
            businessDescription ?? '';


        document.getElementById('editBusinessObjective').value =
            businessObjective ?? '';


        document.getElementById('editBusinessOwner').value =
            businessOwner ?? '';


        document.getElementById('editControlCategory').value =
            controlCategory ?? '';


        document.getElementById('editCriticality').value =
            criticality ?? '';


        document.getElementById('editApplicableIndustries').value =
            applicableIndustries ?? '';


        document.getElementById('editApplicableTechnologies').value =
            applicableTechnologies ?? '';


        document.getElementById('editStatus').value =
            status ?? 'Active';


        document.getElementById('editVersion').value =
            version ?? '';


        document.getElementById('editControlSummary').value =
            controlSummary ?? '';


        document.getElementById('editBusinessBenefits').value =
            businessBenefits ?? '';


        document.getElementById('editBusinessRisksIfMissing').value =
            businessRisksIfMissing ?? '';


        document.getElementById('editPrimaryStakeholders').value =
            primaryStakeholders ?? '';


        document.getElementById('editControlType').value =
            controlType ?? '';


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