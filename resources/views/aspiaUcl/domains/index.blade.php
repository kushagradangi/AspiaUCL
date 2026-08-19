@extends('layouts.aspiaUcl')

@section('title', ' | Domains')

@section('page-title', 'Domains')

@section('content')

<style>

/* =========================================================
   PAGE
========================================================= */

.domain-page {
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
   DOMAIN PANEL
========================================================= */

.domain-panel {
    background: #162544;
    border: 1px solid #1c4266;
    border-radius: 14px;
    overflow: hidden;
    margin-bottom: 25px;
}


/* =========================================================
   PANEL HEADER
========================================================= */

.panel-header {
    padding: 20px 28px;

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

.domain-table {
    width: 100%;

    min-width: 1500px;

    border-collapse: collapse;
}

.domain-table th {
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

.domain-table td {
    padding: 16px;

    border-top: 1px solid rgba(255,255,255,.06);

    color: #b9c5d8;

    font-size: 13px;

    vertical-align: middle;

    white-space: nowrap;
}

.domain-table tr:hover td {
    background: rgba(16,188,232,.025);
}


/* =========================================================
   DOMAIN ID
========================================================= */

.domain-id {
    color: #10bce8;
    font-weight: 600;
}


/* =========================================================
   DOMAIN CODE
========================================================= */

.domain-code {
    color: #ffffff;
    font-weight: 500;
}


/* =========================================================
   DOMAIN NAME
========================================================= */

.domain-name-link {
    color: #ffffff;
    font-weight: 500;
    text-decoration: none;
}

.domain-name-link:hover {
    color: #20c9f2;
}


/* =========================================================
   MUTED
========================================================= */

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

    max-width: 1050px;

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
    padding: 28px;
}


/* =========================================================
   FORM
========================================================= */

.form-grid {
    display: grid;

    grid-template-columns: repeat(2, minmax(0, 1fr));

    gap: 22px 24px;

    width: 100%;
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

    line-height: 1.5;
}

.full-width {
    grid-column: 1 / -1;
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
   DOMAIN TEMPLATE EDITOR
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

.template-editor::placeholder {
    color: #687993;
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
   IMPORT INFO
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
        max-width: 1050px;
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


<div class="domain-page">


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
                Domains
            </h1>

            <p>
                Manage governance and compliance domains.
            </p>

        </div>


        <div class="header-actions">


            {{-- ADD DOMAIN TEMPLATE --}}

            <button
                type="button"
                class="btn-aspia btn-secondary-aspia"
                onclick="openModal('domainTemplateModal')"
            >

                + Add Domain Template

            </button>


            {{-- IMPORT XLSX --}}

            <button
                type="button"
                class="btn-aspia btn-secondary-aspia"
                onclick="openModal('importModal')"
            >

                ↑ Import XLSX

            </button>


            {{-- ADD DOMAIN --}}

            <button
                type="button"
                class="btn-aspia btn-primary-aspia"
                onclick="openModal('addModal')"
            >

                + Add Domain

            </button>


        </div>

    </div>


    {{-- =====================================================
         DOMAIN MANAGEMENT
    ====================================================== --}}

    <div class="domain-panel">


        {{-- PANEL HEADER --}}

        <div class="panel-header">

            <h2>
                Domain Management
            </h2>


            {{-- SEARCH --}}

            <form
                action="{{ route('domains.index') }}"
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search domains..."
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

            <table class="domain-table">

                <thead>

                    <tr>

                        <th>
                            Domain ID
                        </th>

                        <th>
                            Domain Code
                        </th>

                        <th>
                            Domain Name
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Version
                        </th>

                        <th>
                            Business Owner
                        </th>

                        <th>
                            Industry
                        </th>

                        <th>
                            Technology
                        </th>

                        <th>
                            Display Order
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

                    @forelse($domains as $domain)

                        <tr>


                            {{-- DOMAIN ID --}}

                            <td>

                                <span class="domain-id">

                                    {{ $domain->domain_id }}

                                </span>

                            </td>


                            {{-- DOMAIN CODE --}}

                            <td>

                                <span class="domain-code">

                                    {{ $domain->domain_code ?: '—' }}

                                </span>

                            </td>


                            {{-- DOMAIN NAME --}}

                            <td>

                                <a
                                    href="{{ route('domains.show', $domain->slug) }}"
                                    class="domain-name-link"
                                >

                                    {{ $domain->name }}

                                </a>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @php
                                    $statusLower = strtolower(trim($domain->status ?? ''));
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
                                @elseif($domain->status)
                                    <span class="status-badge status-default">
                                        {{ $domain->status }}
                                    </span>
                                @else
                                    —
                                @endif

                            </td>


                            {{-- VERSION --}}

                            <td>

                                {{ $domain->version ?: '—' }}

                            </td>


                            {{-- BUSINESS OWNER --}}

                            <td>

                                {{ $domain->business_owner ?: '—' }}

                            </td>


                            {{-- INDUSTRY --}}

                            <td>

                                {{ $domain->applicable_industries ?: '—' }}

                            </td>


                            {{-- TECHNOLOGY --}}

                            <td>

                                {{ $domain->applicable_technologies ?: '—' }}

                            </td>


                            {{-- DISPLAY ORDER --}}

                            <td>

                                {{ $domain->display_order }}

                            </td>


                            {{-- CREATED --}}

                            <td>

                                {{ $domain->created_at?->format('d M Y') }}

                            </td>


                            {{-- ACTIONS --}}

                            <td>

                                <div class="actions">


                                    {{-- EDIT --}}

                                    <button
                                        type="button"
                                        class="action-btn"

                                        onclick="openEditDomainModal(

                                            {{ $domain->id }},

                                            @js($domain->domain_id),

                                            @js($domain->domain_code),

                                            @js($domain->name),

                                            @js($domain->slug),

                                            @js($domain->purpose),

                                            @js($domain->scope),

                                            @js($domain->business_owner),

                                            @js($domain->applicable_industries),

                                            @js($domain->applicable_technologies),

                                            @js($domain->description),

                                            @js($domain->display_order),

                                            @js($domain->status),

                                            @js($domain->version),

                                            @js($domain->domain_name_2),

                                            @js($domain->short_overview),

                                            @js($domain->business_objectives),

                                            @js($domain->business_objectives_2),

                                            @js($domain->business_risks),

                                            @js($domain->key_capabilities),

                                            @js($domain->typical_stakeholders),

                                            @js($domain->applicable_industries_2),

                                            @js($domain->applicable_technologies_2),

                                            @js($domain->keywords),

                                            @js($domain->tags),

                                            @js($domain->why_domain_matters),

                                            @js($domain->common_challenges),

                                            @js($domain->related_domains),

                                            @js($domain->related_frameworks)

                                        )"
                                    >

                                        Edit

                                    </button>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('domains.destroy', $domain) }}"
                                        method="POST"

                                        onsubmit="return confirm(
                                            'Are you sure you want to delete this domain?'
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

                                No domains found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if($domains->hasPages())

            <div class="pagination-area">

                <div class="custom-pagination">


                    {{-- PREVIOUS --}}

                    @if($domains->onFirstPage())

                        <span class="disabled-page">
                            Previous
                        </span>

                    @else

                        <a href="{{ $domains->previousPageUrl() }}">
                            Previous
                        </a>

                    @endif


                    {{-- PAGE NUMBERS --}}

                    @foreach(range(1, $domains->lastPage()) as $page)

                        @if(
                            $page == 1 ||
                            $page == $domains->lastPage() ||
                            abs($page - $domains->currentPage()) <= 2
                        )

                            @if($page == $domains->currentPage())

                                <span class="active-page">
                                    {{ $page }}
                                </span>

                            @else

                                <a href="{{ $domains->url($page) }}">
                                    {{ $page }}
                                </a>

                            @endif

                        @elseif(
                            $page == 2 ||
                            $page == $domains->lastPage() - 1
                        )

                            <span class="pagination-info">
                                ...
                            </span>

                        @endif

                    @endforeach


                    {{-- NEXT --}}

                    @if($domains->hasMorePages())

                        <a href="{{ $domains->nextPageUrl() }}">
                            Next
                        </a>

                    @else

                        <span class="disabled-page">
                            Next
                        </span>

                    @endif


                </div>

            </div>

        @endif


    </div>


</div>


{{-- =========================================================
     ADD DOMAIN TEMPLATE MODAL
========================================================= --}}

<div
    id="domainTemplateModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'domainTemplateModal')"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Add Domain Template
            </h2>

            <button
                type="button"
                class="close-modal"
                onclick="closeModal('domainTemplateModal')"
            >
                ×
            </button>

        </div>

        <form
            action="{{ route('domains.template.store') }}"
            method="POST"
        >

            @csrf

            <div class="modal-body">

                <div class="form-group">

                    <label class="form-label">
                        HTML Template
                    </label>

                    <textarea
                        id="domainTemplateHtml"
                        name="html_content"
                        class="template-editor"
                        placeholder="Enter your HTML template here..."
                        required
                    ></textarea>

                    <div class="template-help">

                        <div class="template-help-title">
                            Available Domain Placeholders
                        </div>

                        <div class="template-help-text">
                            Click a placeholder to insert it into the HTML template.
                        </div>

                        <div class="placeholder-list">

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{domain_id}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{domain_id}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{domain_code}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{domain_code}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{domain_name}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{domain_name}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{slug}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{slug}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{purpose}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{purpose}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{scope}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{scope}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{business_owner}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{business_owner}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{applicable_industries}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{applicable_industries}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{applicable_technologies}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{applicable_technologies}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{description}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{description}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{display_order}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{display_order}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{status}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{status}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{version}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{version}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{domain_name_2}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{domain_name_2}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{short_overview}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{short_overview}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{business_objectives}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{business_objectives}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{business_objectives_2}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{business_objectives_2}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{business_risks}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{business_risks}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{key_capabilities}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{key_capabilities}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{typical_stakeholders}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{typical_stakeholders}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{applicable_industries_2}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{applicable_industries_2}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{applicable_technologies_2}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{applicable_technologies_2}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{keywords}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{keywords}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{tags}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{tags}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{why_domain_matters}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{why_domain_matters}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{common_challenges}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{common_challenges}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{related_domains}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{related_domains}}
                            </button>

                            <button
                                type="button"
                                class="placeholder-btn"
                                data-placeholder="@{{related_frameworks}}"
                                onclick="insertDomainPlaceholder(this.dataset.placeholder)"
                            >
                                @{{related_frameworks}}
                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-aspia btn-secondary-aspia"
                    onclick="closeModal('domainTemplateModal')"
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
     ADD DOMAIN MODAL
========================================================= --}}

<div
    id="addModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'addModal')"
>


    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Add Domain
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
            action="{{ route('domains.store') }}"
            method="POST"
        >

            @csrf


            <div class="modal-body">

                <div class="form-grid">

    @include(
        'aspiaUcl.domains.form',
        [
            'domain' => null,
            'edit' => false
        ]
    )

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

                    Add Domain

                </button>

            </div>


        </form>


    </div>

</div>


{{-- =========================================================
     EDIT DOMAIN MODAL
========================================================= --}}

<div
    id="editModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'editModal')"
>


    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Edit Domain
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
            id="editDomainForm"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="modal-body">

                <div class="form-grid">

                    @include(
                        'aspiaUcl.domains.form',
                        [
                            'domain' => null,
                            'edit' => true
                        ]
                    )

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


{{-- =========================================================
     IMPORT XLSX MODAL
========================================================= --}}

<div
    id="importModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'importModal')"
>


    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Import Domains
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
            action="{{ route('domains.import') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="modal-body">


                <div class="form-group">

                    <label class="form-label">

                        Select XLSX File

                    </label>


                    <input
                        type="file"
                        name="file"
                        class="form-control-aspia"
                        accept=".xlsx"
                        required
                    >


                    <div class="import-info">

                        Only <strong>.xlsx</strong> files are supported.

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


<script>


/* =========================================================
   OPEN MODAL
========================================================= */

/* =========================================================
   INSERT DOMAIN PLACEHOLDER
========================================================= */

function insertDomainPlaceholder(placeholder)
{
    const textarea =
        document.getElementById('domainTemplateHtml');

    if (!textarea) {
        return;
    }

    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const currentValue = textarea.value;

    textarea.value =
        currentValue.substring(0, start)
        + placeholder
        + currentValue.substring(end);

    textarea.focus();

    const cursorPosition =
        start + placeholder.length;

    textarea.setSelectionRange(
        cursorPosition,
        cursorPosition
    );
}


function openModal(id)
{
    const modal =
        document.getElementById(id);

    if (modal) {

        modal.classList.add('show');

        document.body.style.overflow = 'hidden';

    }
}


/* =========================================================
   CLOSE MODAL
========================================================= */

function closeModal(id)
{
    const modal =
        document.getElementById(id);

    if (modal) {

        modal.classList.remove('show');

        document.body.style.overflow = '';

    }
}


/* =========================================================
   CLOSE WHEN CLICKING OUTSIDE
========================================================= */

function closeModalOutside(event, id)
{
    if (event.target.id === id) {

        closeModal(id);

    }
}


/* =========================================================
   OPEN EDIT DOMAIN MODAL
========================================================= */

function openEditDomainModal(

    id,

    domainId,
    domainCode,
    name,
    slug,
    purpose,
    scope,
    businessOwner,
    applicableIndustries,
    applicableTechnologies,
    description,
    displayOrder,
    status,
    version,
    domainName2,
    shortOverview,
    businessObjectives,
    businessObjectives2,
    businessRisks,
    keyCapabilities,
    typicalStakeholders,
    applicableIndustries2,
    applicableTechnologies2,
    keywords,
    tags,
    whyDomainMatters,
    commonChallenges,
    relatedDomains,
    relatedFrameworks

) {


    /* =====================================================
       FORM ACTION
    ====================================================== */

    document
        .getElementById('editDomainForm')
        .action =
            `/domains/${id}`;


    /* =====================================================
       FIELD VALUES
    ====================================================== */

    const values = {

        domain_id:
            domainId,

        domain_code:
            domainCode,

        name:
            name,

        slug:
            slug,

        purpose:
            purpose,

        scope:
            scope,

        business_owner:
            businessOwner,

        applicable_industries:
            applicableIndustries,

        applicable_technologies:
            applicableTechnologies,

        description:
            description,

        display_order:
            displayOrder,

        status:
            status,

        version:
            version,

        domain_name_2:
            domainName2,

        short_overview:
            shortOverview,

        business_objectives:
            businessObjectives,

        business_objectives_2:
            businessObjectives2,

        business_risks:
            businessRisks,

        key_capabilities:
            keyCapabilities,

        typical_stakeholders:
            typicalStakeholders,

        applicable_industries_2:
            applicableIndustries2,

        applicable_technologies_2:
            applicableTechnologies2,

        keywords:
            keywords,

        tags:
            tags,

        why_domain_matters:
            whyDomainMatters,

        common_challenges:
            commonChallenges,

        related_domains:
            relatedDomains,

        related_frameworks:
            relatedFrameworks

    };


    /* =====================================================
       PUT VALUES INTO EDIT FORM
    ====================================================== */

    Object.keys(values).forEach(function(field) {

        const input =
            document.getElementById(
                'edit_' + field
            );

        if (input) {

            input.value =
                values[field] ?? '';

        }

    });


    /* =====================================================
       SHOW MODAL
    ====================================================== */

    openModal('editModal');

}


/* =========================================================
   ESCAPE KEY
========================================================= */

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