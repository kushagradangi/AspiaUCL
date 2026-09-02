@extends('layouts.aspiaUcl')

@section('title', ' | Controls')

@section('page-title', 'Controls')

@section('content')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .control-page {
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

    .control-panel {
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


    .control-table {
        width: 100%;

        min-width: 1500px;

        border-collapse: collapse;
    }


    .control-table th {
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


    .control-table td {
        padding: 16px;

        border-top: 1px solid rgba(255,255,255,.06);

        color: #b9c5d8;

        font-size: 13px;

        vertical-align: middle;

        white-space: nowrap;
    }


    .control-table tr:hover td {
        background: rgba(16,188,232,.025);
    }


    .control-id {
        color: #ffffff;

        font-weight: 500;
    }


    .domain-code {
        color: #ffffff;

        font-weight: 500;
    }


    .control-name-link {
        color: #10bce8;
        text-decoration: underline;
        text-underline-offset: 3px;
        font-weight: 500;
        transition: color 0.2s ease, text-decoration-color 0.2s ease;
    }

    .control-name-link:hover {
        color: #38bdf8;
        text-decoration: underline;
    }


    .table-muted {
        color: #63728c;
    }


    /* =========================================================
       STATUS BADGES
    ========================================================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 5px 13px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        line-height: 1.2;
        letter-spacing: 0.3px;
        transition: all 0.3s ease;
    }

    /* Active - Glowing Green */
    .status-badge.status-active {
        background: rgba(34, 197, 94, 0.14);
        color: #4ade80;
        border: 1px solid rgba(34, 197, 94, 0.4);
        box-shadow: 0 0 12px rgba(34, 197, 94, 0.35), inset 0 0 8px rgba(34, 197, 94, 0.12);
        text-shadow: 0 0 8px rgba(74, 222, 128, 0.7);
    }

    /* Inactive - Glowing Red */
    .status-badge.status-inactive {
        background: rgba(239, 68, 68, 0.14);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.4);
        box-shadow: 0 0 12px rgba(239, 68, 68, 0.35), inset 0 0 8px rgba(239, 68, 68, 0.12);
        text-shadow: 0 0 8px rgba(248, 113, 113, 0.7);
    }

    /* Draft - Glowing Amber / Orange */
    .status-badge.status-draft {
        background: rgba(245, 158, 11, 0.14);
        color: #fbbf24;
        border: 1px solid rgba(245, 158, 11, 0.4);
        box-shadow: 0 0 12px rgba(245, 158, 11, 0.35), inset 0 0 8px rgba(245, 158, 11, 0.12);
        text-shadow: 0 0 8px rgba(251, 191, 36, 0.7);
    }

    /* Default / Fallback */
    .status-badge.status-default {
        background: rgba(148, 163, 184, 0.12);
        color: #94a3b8;
        border: 1px solid rgba(148, 163, 184, 0.2);
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
       CONTROL TEMPLATE
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


<div class="control-page">


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
                Controls
            </h1>

            <p>
                Manage governance controls under your domains.
            </p>

        </div>


        <div class="header-actions">


            {{-- =================================================
                 ADD CONTROL TEMPLATE
            ================================================== --}}

            <button
                type="button"
                class="btn-aspia btn-secondary-aspia"
                onclick="openModal('controlTemplateModal')"
            >

                + Add Control Template

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
                 ADD CONTROL
            ================================================== --}}

            <button
                type="button"
                class="btn-aspia btn-primary-aspia"
                onclick="openModal('addModal')"
            >

                + Add Control

            </button>


        </div>

    </div>


    {{-- =====================================================
         CONTROL MANAGEMENT PANEL
    ====================================================== --}}

    <div class="control-panel">


        <div class="panel-header">

            <h2>
                Control Management
            </h2>


            {{-- SEARCH --}}

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

            <table class="control-table">


                <thead>

                    <tr>

                        <th>
                            Control ID
                        </th>

                        <th>
                            Domain Code
                        </th>

                        <th>
                            Control Name
                        </th>

                        <th>
                            Version
                        </th>

                        <th>
                            Business Owner
                        </th>

                        <th>
                            Category
                        </th>

                        <th>
                            Criticality
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Control Type
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


                    @forelse($controls as $control)


                        <tr>


                            {{-- Control ID --}}

                            <td>

                                <span class="control-id">

                                    {{ $control->control_id }}

                                </span>

                            </td>


                            {{-- Domain Code --}}

                            <td>

                                <span class="domain-code">

                                    {{ $control->domain_code ?: '—' }}

                                </span>

                            </td>


                            {{-- Control Name --}}

                            <td>

                                <a
                                    href="{{ route(
                                        'controls.show',
                                        ['control_id' => $control->control_id]
                                    ) }}"
                                    class="control-name-link"
                                >

                                    {{ $control->name }}

                                </a>

                            </td>


                            {{-- Version --}}

                            <td>

                                {{ $control->version ?: '—' }}

                            </td>


                            {{-- Business Owner --}}

                            <td>

                                {{ $control->business_owner ?: '—' }}

                            </td>


                            {{-- Category --}}

                            <td>

                                {{ $control->control_category ?: '—' }}

                            </td>


                            {{-- Criticality --}}

                            <td>

                                {{ $control->criticality ?: '—' }}

                            </td>


                            {{-- Status --}}

                            <td>

                                @php
                                    $statusLower = strtolower(trim($control->status ?? ''));
                                @endphp

                                @if($statusLower === 'active')
                                    <span class="status-badge status-active">
                                        Active
                                    </span>
                                @elseif($statusLower === 'inactive')
                                    <span class="status-badge status-inactive">
                                        Inactive
                                    </span>
                                @elseif($statusLower === 'draft')
                                    <span class="status-badge status-draft">
                                        Draft
                                    </span>
                                @elseif($control->status)
                                    <span class="status-badge status-default">
                                        {{ $control->status }}
                                    </span>
                                @else
                                    —
                                @endif

                            </td>


                            {{-- Control Type --}}

                            <td>

                                {{ $control->control_type ?: '—' }}

                            </td>


                            {{-- Created --}}

                            <td>

                                {{ $control->created_at?->format('d M Y') }}

                            </td>


                            {{-- Actions --}}

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

                                        onsubmit="return confirm(
                                            'Are you sure you want to delete this control?'
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
                                colspan="11"
                                class="empty-state"
                            >

                                <div class="empty-state-icon">
                                    ◇
                                </div>

                                No controls found.

                            </td>

                        </tr>


                    @endforelse


                </tbody>

            </table>

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

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
     ADD CONTROL TEMPLATE MODAL
========================================================= --}}

<div
    id="controlTemplateModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'controlTemplateModal')"
>


    <div class="modal-box">


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
                        id="controlTemplate"
                        class="template-editor"
                        placeholder="Write your HTML template here..."
                        required
                    ></textarea>


                    <div class="template-help">


                        <div class="template-help-title">

                            Available Control Placeholders

                        </div>


                        <div class="template-help-text">

                            Use these placeholders inside your HTML.
                            When a Control record is opened,
                            the placeholders will be replaced with
                            the actual Control values.

                        </div>


                        <div class="placeholder-list">


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_id&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_id&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_code&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_code&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_name&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_name&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;business_description&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;business_description&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;business_objective&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;business_objective&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;business_owner&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;business_owner&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_category&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_category&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;criticality&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;criticality&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;applicable_industries&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;applicable_industries&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;applicable_technologies&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;applicable_technologies&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;status&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;status&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;version&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;version&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_summary&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_summary&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;business_benefits&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;business_benefits&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;business_risks_if_missing&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;business_risks_if_missing&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;primary_stakeholders&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;primary_stakeholders&#125;&#125;
                            </button>


                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;control_type&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;control_type&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_name&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_name&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_purpose&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_purpose&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_scope&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_scope&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;framework_name&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;framework_name&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;framework_code&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;framework_code&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;framework_family&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;framework_family&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;requirements_count&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;requirements_count&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;requirements_table&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;requirements_table&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_badge&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_badge&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;framework_badge&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;framework_badge&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;requirement_id_chips&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;requirement_id_chips&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;domain_id&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
                            >
                                &#123;&#123;domain_id&#125;&#125;
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="&#123;&#123;framework_id&#125;&#125;"
                                onclick="insertControlPlaceholder(this.dataset.placeholder)"
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
                    onclick="closeModal('controlTemplateModal')"
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
     IMPORT CONTROLS MODAL
========================================================= --}}

<div
    id="importModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'importModal')"
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
     ADD CONTROL MODAL
========================================================= --}}

<div
    id="addModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'addModal')"
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


                <div class="form-grid">


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


                    {{-- DOMAIN CODE --}}

                    <div class="form-group">

                        <label class="form-label">
                            Domain Code
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            name="domain_code"
                            class="form-control-aspia"
                            placeholder="e.g. DOM-001"
                            value="{{ old('domain_code') }}"
                            required
                        >

                    </div>


                    {{-- CONTROL NAME --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Control Name
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control-aspia"
                            placeholder="Enter Control Name"
                            value="{{ old('name') }}"
                            required
                        >

                    </div>


                    {{-- BUSINESS DESCRIPTION --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Description
                        </label>

                        <textarea
                            name="business_description"
                            class="form-control-aspia"
                            placeholder="Enter Business Description"
                        >{{ old('business_description') }}</textarea>

                    </div>


                    {{-- BUSINESS OBJECTIVE --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Objective
                        </label>

                        <textarea
                            name="business_objective"
                            class="form-control-aspia"
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
                            class="form-control-aspia"
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
                            class="form-control-aspia"
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
                            class="form-control-aspia"
                            placeholder="Enter Criticality"
                            value="{{ old('criticality') }}"
                        >

                    </div>


                    {{-- STATUS --}}

                    <div class="form-group">

                        <label class="form-label">
                            Status
                            <span class="required-star">*</span>
                        </label>

                        <select
                            name="status"
                            class="form-control-aspia"
                            required
                        >

                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                            <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>
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
                            class="form-control-aspia"
                            placeholder="e.g. 1.0"
                            value="{{ old('version') }}"
                        >

                    </div>


                    {{-- CONTROL TYPE --}}

                    <div class="form-group">

                        <label class="form-label">
                            Control Type
                        </label>

                        <input
                            type="text"
                            name="control_type"
                            class="form-control-aspia"
                            placeholder="Enter Control Type"
                            value="{{ old('control_type') }}"
                        >

                    </div>


                    {{-- APPLICABLE INDUSTRIES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Applicable Industries
                        </label>

                        <textarea
                            name="applicable_industries"
                            class="form-control-aspia"
                            placeholder="Enter Applicable Industries"
                        >{{ old('applicable_industries') }}</textarea>

                    </div>


                    {{-- APPLICABLE TECHNOLOGIES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Applicable Technologies
                        </label>

                        <textarea
                            name="applicable_technologies"
                            class="form-control-aspia"
                            placeholder="Enter Applicable Technologies"
                        >{{ old('applicable_technologies') }}</textarea>

                    </div>


                    {{-- CONTROL SUMMARY --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Control Summary
                        </label>

                        <textarea
                            name="control_summary"
                            class="form-control-aspia"
                            placeholder="Enter Control Summary"
                        >{{ old('control_summary') }}</textarea>

                    </div>


                    {{-- BUSINESS BENEFITS --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Benefits
                        </label>

                        <textarea
                            name="business_benefits"
                            class="form-control-aspia"
                            placeholder="Enter Business Benefits"
                        >{{ old('business_benefits') }}</textarea>

                    </div>


                    {{-- BUSINESS RISKS IF MISSING --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Risks if Missing
                        </label>

                        <textarea
                            name="business_risks_if_missing"
                            class="form-control-aspia"
                            placeholder="Enter Business Risks if Missing"
                        >{{ old('business_risks_if_missing') }}</textarea>

                    </div>


                    {{-- PRIMARY STAKEHOLDERS --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Primary Stakeholders
                        </label>

                        <textarea
                            name="primary_stakeholders"
                            class="form-control-aspia"
                            placeholder="Enter Primary Stakeholders"
                        >{{ old('primary_stakeholders') }}</textarea>

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
                    Add Control
                </button>

            </div>


        </form>


    </div>


</div>



{{-- =========================================================
     EDIT CONTROL MODAL
========================================================= --}}

<div
    id="editModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'editModal')"
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
            id="editControlForm"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="modal-body">


                <div class="form-grid">


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


                    {{-- DOMAIN CODE --}}

                    <div class="form-group">

                        <label class="form-label">
                            Domain Code
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            id="editDomainCode"
                            name="domain_code"
                            class="form-control-aspia"
                            required
                        >

                    </div>


                    {{-- CONTROL NAME --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Control Name
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            id="editName"
                            name="name"
                            class="form-control-aspia"
                            required
                        >

                    </div>


                    {{-- BUSINESS DESCRIPTION --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Description
                        </label>

                        <textarea
                            id="editBusinessDescription"
                            name="business_description"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- BUSINESS OBJECTIVE --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Objective
                        </label>

                        <textarea
                            id="editBusinessObjective"
                            name="business_objective"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- BUSINESS OWNER --}}

                    <div class="form-group">

                        <label class="form-label">
                            Business Owner
                        </label>

                        <input
                            type="text"
                            id="editBusinessOwner"
                            name="business_owner"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- CONTROL CATEGORY --}}

                    <div class="form-group">

                        <label class="form-label">
                            Control Category
                        </label>

                        <input
                            type="text"
                            id="editControlCategory"
                            name="control_category"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- CRITICALITY --}}

                    <div class="form-group">

                        <label class="form-label">
                            Criticality
                        </label>

                        <input
                            type="text"
                            id="editCriticality"
                            name="criticality"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- STATUS --}}

                    <div class="form-group">

                        <label class="form-label">
                            Status
                            <span class="required-star">*</span>
                        </label>

                        <select
                            id="editStatus"
                            name="status"
                            class="form-control-aspia"
                            required
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
                            id="editVersion"
                            name="version"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- CONTROL TYPE --}}

                    <div class="form-group">

                        <label class="form-label">
                            Control Type
                        </label>

                        <input
                            type="text"
                            id="editControlType"
                            name="control_type"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- APPLICABLE INDUSTRIES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Applicable Industries
                        </label>

                        <textarea
                            id="editApplicableIndustries"
                            name="applicable_industries"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- APPLICABLE TECHNOLOGIES --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Applicable Technologies
                        </label>

                        <textarea
                            id="editApplicableTechnologies"
                            name="applicable_technologies"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- CONTROL SUMMARY --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Control Summary
                        </label>

                        <textarea
                            id="editControlSummary"
                            name="control_summary"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- BUSINESS BENEFITS --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Benefits
                        </label>

                        <textarea
                            id="editBusinessBenefits"
                            name="business_benefits"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- BUSINESS RISKS IF MISSING --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Business Risks if Missing
                        </label>

                        <textarea
                            id="editBusinessRisksIfMissing"
                            name="business_risks_if_missing"
                            class="form-control-aspia"
                        ></textarea>

                    </div>


                    {{-- PRIMARY STAKEHOLDERS --}}

                    <div class="form-group full-width">

                        <label class="form-label">
                            Primary Stakeholders
                        </label>

                        <textarea
                            id="editPrimaryStakeholders"
                            name="primary_stakeholders"
                            class="form-control-aspia"
                        ></textarea>

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

            if (id === 'controlTemplateModal') {
                const textarea = document.getElementById('controlTemplate');
                if (textarea) {
                    textarea.value = '';
                }
            }

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
       INSERT CONTROL PLACEHOLDER
    ====================================================== */

    function insertControlPlaceholder(placeholder)
    {
        const textarea =
            document.getElementById(
                'controlTemplate'
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


        /* FORM ACTION */

        document
            .getElementById(
                'editControlForm'
            )
            .action =
                `/controls/${id}`;


        /* CONTROL ID */

        document
            .getElementById(
                'editControlId'
            )
            .value =
                controlId || '';


        /* DOMAIN CODE */

        document
            .getElementById(
                'editDomainCode'
            )
            .value =
                domainCode || '';


        /* CONTROL NAME */

        document
            .getElementById(
                'editName'
            )
            .value =
                name || '';


        /* BUSINESS DESCRIPTION */

        document
            .getElementById(
                'editBusinessDescription'
            )
            .value =
                businessDescription || '';


        /* BUSINESS OBJECTIVE */

        document
            .getElementById(
                'editBusinessObjective'
            )
            .value =
                businessObjective || '';


        /* BUSINESS OWNER */

        document
            .getElementById(
                'editBusinessOwner'
            )
            .value =
                businessOwner || '';


        /* CONTROL CATEGORY */

        document
            .getElementById(
                'editControlCategory'
            )
            .value =
                controlCategory || '';


        /* CRITICALITY */

        document
            .getElementById(
                'editCriticality'
            )
            .value =
                criticality || '';


        /* APPLICABLE INDUSTRIES */

        document
            .getElementById(
                'editApplicableIndustries'
            )
            .value =
                applicableIndustries || '';


        /* APPLICABLE TECHNOLOGIES */

        document
            .getElementById(
                'editApplicableTechnologies'
            )
            .value =
                applicableTechnologies || '';


        /* STATUS */

        document
            .getElementById(
                'editStatus'
            )
            .value =
                status || 'Active';


        /* VERSION */

        document
            .getElementById(
                'editVersion'
            )
            .value =
                version || '';


        /* CONTROL SUMMARY */

        document
            .getElementById(
                'editControlSummary'
            )
            .value =
                controlSummary || '';


        /* BUSINESS BENEFITS */

        document
            .getElementById(
                'editBusinessBenefits'
            )
            .value =
                businessBenefits || '';


        /* BUSINESS RISKS IF MISSING */

        document
            .getElementById(
                'editBusinessRisksIfMissing'
            )
            .value =
                businessRisksIfMissing || '';


        /* PRIMARY STAKEHOLDERS */

        document
            .getElementById(
                'editPrimaryStakeholders'
            )
            .value =
                primaryStakeholders || '';


        /* CONTROL TYPE */

        document
            .getElementById(
                'editControlType'
            )
            .value =
                controlType || '';


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