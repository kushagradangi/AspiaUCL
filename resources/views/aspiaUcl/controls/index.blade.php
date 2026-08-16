@extends('layouts.aspiaUcl')

@section('title', ' | Controls')

@section('page-title', 'Controls')

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
        text-decoration: none;
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
        width: 260px;
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
        min-width: 1100px;
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

    .status-badge {
        padding: 5px 9px;
        border-radius: 6px;
        background: rgba(34,197,94,.10);
        color: #6ee7a0;
        font-size: 12px;
    }

    .description {
        color: #8291aa;
        max-width: 280px;
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
        max-width: 750px;
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
                Controls
            </h1>

            <p>
                Manage governance controls under your domains.
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
                + Add Control
            </button>

        </div>

    </div>


    {{-- CONTROL MANAGEMENT --}}
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

                            {{-- Control ID --}}
                            <td>

                                <span class="badge">
                                    {{ $control->control_id }}
                                </span>

                            </td>


                            {{-- Domain Code --}}
                            <td>

                                <span class="badge">
                                    {{ $control->domain_code ?: 'N/A' }}
                                </span>

                            </td>


                            {{-- Control Name --}}
                            <td>

                                <span class="module-name">
                                    {{ $control->name }}
                                </span>

                            </td>


                            {{-- Category --}}
                            <td>
                                {{ $control->control_category ?: 'N/A' }}
                            </td>


                            {{-- Criticality --}}
                            <td>
                                {{ $control->criticality ?: 'N/A' }}
                            </td>


                            {{-- Status --}}
                            <td>

                                <span class="status-badge">
                                    {{ $control->status }}
                                </span>

                            </td>


                            {{-- Version --}}
                            <td>
                                {{ $control->version ?: 'N/A' }}
                            </td>


                            {{-- Control Type --}}
                            <td>
                                {{ $control->control_type ?: 'N/A' }}
                            </td>


                            {{-- Created --}}
                            <td>
                                {{ $control->created_at?->format('d M Y') }}
                            </td>


                            {{-- Actions --}}
                            <td>

                                <div class="actions">

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

            <div style="padding:18px 20px;">
                {{ $controls->links() }}
            </div>

        @endif

    </div>

</div>



{{-- ========================================================= --}}
{{-- ADD CONTROL --}}
{{-- ========================================================= --}}

<div id="addModal" class="modal-overlay">

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


                {{-- 1. Control ID --}}
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


                {{-- 2. Domain Code --}}
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


                {{-- 3. Control Name --}}
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


                {{-- 4. Business Description --}}
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


                {{-- 5. Business Objective --}}
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


                {{-- 6. Business Owner --}}
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


                {{-- 7. Control Category --}}
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


                {{-- 8. Criticality --}}
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


                {{-- 9. Applicable Industries --}}
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


                {{-- 10. Applicable Technologies --}}
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


                {{-- 11. Status --}}
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


                {{-- 12. Version --}}
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


                {{-- 13. Control Summary --}}
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


                {{-- 14. Business Benefits --}}
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


                {{-- 15. Business Risks if Missing --}}
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


                {{-- 16. Primary Stakeholders --}}
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


                {{-- 17. Control Type --}}
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



{{-- ========================================================= --}}
{{-- EDIT CONTROL --}}
{{-- ========================================================= --}}

<div id="editModal" class="modal-overlay">

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


                {{-- 1. Control ID --}}
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


                {{-- 2. Domain Code --}}
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


                {{-- 3. Control Name --}}
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


                {{-- 4. Business Description --}}
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


                {{-- 5. Business Objective --}}
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


                {{-- 6. Business Owner --}}
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


                {{-- 7. Control Category --}}
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


                {{-- 8. Criticality --}}
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


                {{-- 9. Applicable Industries --}}
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


                {{-- 10. Applicable Technologies --}}
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


                {{-- 11. Status --}}
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


                {{-- 12. Version --}}
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


                {{-- 13. Control Summary --}}
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


                {{-- 14. Business Benefits --}}
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


                {{-- 15. Business Risks if Missing --}}
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


                {{-- 16. Primary Stakeholders --}}
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


                {{-- 17. Control Type --}}
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



{{-- ========================================================= --}}
{{-- IMPORT CONTROL --}}
{{-- ========================================================= --}}

<div id="importModal" class="modal-overlay">

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

        /*
        |--------------------------------------------------------------------------
        | Form Action
        |--------------------------------------------------------------------------
        */

        document.getElementById('editForm').action =
            `/controls/${id}`;


        /*
        |--------------------------------------------------------------------------
        | Control ID
        |--------------------------------------------------------------------------
        */

        document.getElementById('editControlId').value =
            controlId ?? '';


        /*
        |--------------------------------------------------------------------------
        | Domain Code
        |--------------------------------------------------------------------------
        */

        document.getElementById('editDomainCode').value =
            domainCode ?? '';


        /*
        |--------------------------------------------------------------------------
        | Control Name
        |--------------------------------------------------------------------------
        */

        document.getElementById('editName').value =
            name ?? '';


        /*
        |--------------------------------------------------------------------------
        | Business Description
        |--------------------------------------------------------------------------
        */

        document.getElementById('editBusinessDescription').value =
            businessDescription ?? '';


        /*
        |--------------------------------------------------------------------------
        | Business Objective
        |--------------------------------------------------------------------------
        */

        document.getElementById('editBusinessObjective').value =
            businessObjective ?? '';


        /*
        |--------------------------------------------------------------------------
        | Business Owner
        |--------------------------------------------------------------------------
        */

        document.getElementById('editBusinessOwner').value =
            businessOwner ?? '';


        /*
        |--------------------------------------------------------------------------
        | Control Category
        |--------------------------------------------------------------------------
        */

        document.getElementById('editControlCategory').value =
            controlCategory ?? '';


        /*
        |--------------------------------------------------------------------------
        | Criticality
        |--------------------------------------------------------------------------
        */

        document.getElementById('editCriticality').value =
            criticality ?? '';


        /*
        |--------------------------------------------------------------------------
        | Applicable Industries
        |--------------------------------------------------------------------------
        */

        document.getElementById('editApplicableIndustries').value =
            applicableIndustries ?? '';


        /*
        |--------------------------------------------------------------------------
        | Applicable Technologies
        |--------------------------------------------------------------------------
        */

        document.getElementById('editApplicableTechnologies').value =
            applicableTechnologies ?? '';


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        document.getElementById('editStatus').value =
            status ?? 'Active';


        /*
        |--------------------------------------------------------------------------
        | Version
        |--------------------------------------------------------------------------
        */

        document.getElementById('editVersion').value =
            version ?? '';


        /*
        |--------------------------------------------------------------------------
        | Control Summary
        |--------------------------------------------------------------------------
        */

        document.getElementById('editControlSummary').value =
            controlSummary ?? '';


        /*
        |--------------------------------------------------------------------------
        | Business Benefits
        |--------------------------------------------------------------------------
        */

        document.getElementById('editBusinessBenefits').value =
            businessBenefits ?? '';


        /*
        |--------------------------------------------------------------------------
        | Business Risks if Missing
        |--------------------------------------------------------------------------
        */

        document.getElementById('editBusinessRisksIfMissing').value =
            businessRisksIfMissing ?? '';


        /*
        |--------------------------------------------------------------------------
        | Primary Stakeholders
        |--------------------------------------------------------------------------
        */

        document.getElementById('editPrimaryStakeholders').value =
            primaryStakeholders ?? '';


        /*
        |--------------------------------------------------------------------------
        | Control Type
        |--------------------------------------------------------------------------
        */

        document.getElementById('editControlType').value =
            controlType ?? '';


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