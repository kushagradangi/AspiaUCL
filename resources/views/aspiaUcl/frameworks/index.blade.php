@extends('layouts.aspiaUcl')

@section('title', ' | Frameworks')

@section('page-title', 'Frameworks')

@section('content')

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .framework-page {
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

    .framework-panel {
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


    .framework-table {
        width: 100%;

        min-width: 1500px;

        border-collapse: collapse;
    }


    .framework-table th {
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


    .framework-table td {
        padding: 16px;

        border-top: 1px solid rgba(255,255,255,.06);

        color: #b9c5d8;

        font-size: 13px;

        vertical-align: middle;

        white-space: nowrap;
    }


    .framework-table tr:hover td {
        background: rgba(16,188,232,.025);
    }


    .framework-id {
        color: #10bce8;

        font-weight: 600;
    }


    .framework-code {
        color: #ffffff;

        font-weight: 500;
    }


    .framework-name {
        color: #ffffff;

        font-weight: 500;
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
    }


    /* =========================================================
       ACTIVITY
    ========================================================= */

    .activity-list {
        padding: 5px 20px;
    }


    .activity-item {
        display: flex;

        align-items: center;

        gap: 13px;

        padding: 15px 0;

        border-bottom: 1px solid rgba(255,255,255,.06);
    }


    .activity-item:last-child {
        border-bottom: none;
    }


    .activity-icon {
        width: 34px;

        height: 34px;

        border-radius: 50%;

        background: rgba(16,188,232,.12);

        color: #10bce8;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;
    }


    .activity-text {
        color: #b9c5d8;

        font-size: 13px;
    }


    .activity-time {
        color: #63728c;

        font-size: 11px;

        margin-top: 3px;
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


<div class="framework-page">


    {{-- =====================================================
         SUCCESS MESSAGE
    ====================================================== --}}

    @if(session('success'))

        <div class="alert-success">

            {{ session('success') }}

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
                Frameworks
            </h1>

            <p>
                Manage governance and compliance frameworks.
            </p>

        </div>


        <div class="header-actions">


            {{-- IMPORT XLSX --}}

            <button
                type="button"
                class="btn-aspia btn-secondary-aspia"
                onclick="openModal('importModal')"
            >

                ↑ Import XLSX

            </button>


            {{-- ADD FRAMEWORK --}}

            <button
                type="button"
                class="btn-aspia btn-primary-aspia"
                onclick="openModal('addModal')"
            >

                + Add Framework

            </button>


        </div>

    </div>


    {{-- =====================================================
         FRAMEWORK MANAGEMENT
    ====================================================== --}}

    <div class="framework-panel">


        <div class="panel-header">

            <h2>
                Framework Management
            </h2>


            {{-- SEARCH --}}

            <form
                action="{{ route('frameworks.index') }}"
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search frameworks..."
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

            <table class="framework-table">


                <thead>

                    <tr>

                        <th>
                            Framework ID
                        </th>

                        <th>
                            Framework Code
                        </th>

                        <th>
                            Framework Name
                        </th>

                        <th>
                            Version
                        </th>

                        <th>
                            Framework Family
                        </th>

                        <th>
                            Category
                        </th>

                        <th>
                            Publisher
                        </th>

                        <th>
                            Region
                        </th>

                        <th>
                            Industry
                        </th>

                        <th>
                            Framework Type
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


                    @forelse($frameworks as $framework)


                        <tr>


                            {{-- Framework ID --}}

                            <td>

                                <span class="framework-id">

                                    {{ $framework->framework_id }}

                                </span>

                            </td>


                            {{-- Framework Code --}}

                            <td>

                                <span class="framework-code">

                                    {{ $framework->framework_code }}

                                </span>

                            </td>


                            {{-- Framework Name --}}

                            <td>

                                <span class="framework-name">

                                    {{ $framework->name }}

                                </span>

                            </td>


                            {{-- Version --}}

                            <td>

                                {{ $framework->version ?: '—' }}

                            </td>


                            {{-- Family --}}

                            <td>

                                {{ $framework->framework_family ?: '—' }}

                            </td>


                            {{-- Category --}}

                            <td>

                                {{ $framework->category ?: '—' }}

                            </td>


                            {{-- Publisher --}}

                            <td>

                                {{ $framework->publisher ?: '—' }}

                            </td>


                            {{-- Region --}}

                            <td>

                                {{ $framework->region ?: '—' }}

                            </td>


                            {{-- Industry --}}

                            <td>

                                {{ $framework->industry ?: '—' }}

                            </td>


                            {{-- Type --}}

                            <td>

                                {{ $framework->framework_type ?: '—' }}

                            </td>


                            {{-- Created --}}

                            <td>

                                {{ $framework->created_at?->format('d M Y') }}

                            </td>


                            {{-- Actions --}}

                            <td>

                                <div class="actions">


                                    {{-- EDIT --}}

                                    <button
                                        type="button"
                                        class="action-btn"

                                        onclick="openEditModal(

                                            {{ $framework->id }},

                                            @js($framework->framework_id),

                                            @js($framework->framework_code),

                                            @js($framework->name),

                                            @js($framework->version),

                                            @js($framework->framework_family),

                                            @js($framework->category),

                                            @js($framework->publisher),

                                            @js($framework->region),

                                            @js($framework->industry),

                                            @js($framework->framework_type),

                                                @js($framework->framework_type)

                                        )"
                                    >

                                        Edit

                                    </button>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('frameworks.destroy', $framework) }}"
                                        method="POST"

                                        onsubmit="return confirm(
                                            'Are you sure you want to delete this framework?'
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
                                colspan="12"
                                class="empty-state"
                            >

                                <div class="empty-state-icon">
                                    ◇
                                </div>

                                No frameworks found.

                            </td>

                        </tr>


                    @endforelse


                </tbody>

            </table>

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if($frameworks->hasPages())

                <div class="pagination-area">

                    {{ $frameworks->links() }}

                </div>

            @endif


        </div>



{{-- =========================================================
     ADD FRAMEWORK MODAL
========================================================= --}}

<div
    id="addModal"
    class="modal-overlay"

    onclick="closeModalOutside(event, 'addModal')"
>


    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Add Framework
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
            action="{{ route('frameworks.store') }}"
            method="POST"
        >

            @csrf


            <div class="modal-body">


                <div class="form-grid">


                    {{-- FRAMEWORK ID --}}

                    <div class="form-group">

                        <label class="form-label">

                            Framework ID
                            <span class="required-star">*</span>

                        </label>

                        <input
                            type="text"
                            name="framework_id"
                            class="form-control-aspia"
                            placeholder="Example: FW-001"
                            required
                        >

                    </div>


                    {{-- FRAMEWORK CODE --}}

                    <div class="form-group">

                        <label class="form-label">

                            Framework Code
                            <span class="required-star">*</span>

                        </label>

                        <input
                            type="text"
                            name="framework_code"
                            class="form-control-aspia"
                            placeholder="Example: ISO27001"
                            required
                        >

                    </div>


                    {{-- FRAMEWORK NAME --}}

                    <div class="form-group">

                        <label class="form-label">

                            Framework Name
                            <span class="required-star">*</span>

                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control-aspia"
                            placeholder="Example: ISO/IEC 27001"
                            required
                        >

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
                            placeholder="Example: 2022"
                        >

                    </div>


                    {{-- FRAMEWORK FAMILY --}}

                    <div class="form-group">

                        <label class="form-label">
                            Framework Family
                        </label>

                        <input
                            type="text"
                            name="framework_family"
                            class="form-control-aspia"
                            placeholder="Example: ISO"
                        >

                    </div>


                    {{-- CATEGORY --}}

                    <div class="form-group">

                        <label class="form-label">
                            Category
                        </label>

                        <input
                            type="text"
                            name="category"
                            class="form-control-aspia"
                            placeholder="Example: Information Security"
                        >

                    </div>


                    {{-- PUBLISHER --}}

                    <div class="form-group">

                        <label class="form-label">
                            Publisher
                        </label>

                        <input
                            type="text"
                            name="publisher"
                            class="form-control-aspia"
                            placeholder="Example: ISO"
                        >

                    </div>


                    {{-- REGION --}}

                    <div class="form-group">

                        <label class="form-label">
                            Region
                        </label>

                        <input
                            type="text"
                            name="region"
                            class="form-control-aspia"
                            placeholder="Example: Global"
                        >

                    </div>


                    {{-- INDUSTRY --}}

                    <div class="form-group">

                        <label class="form-label">
                            Industry
                        </label>

                        <input
                            type="text"
                            name="industry"
                            class="form-control-aspia"
                            placeholder="Example: All"
                        >

                    </div>


                    {{-- FRAMEWORK TYPE --}}

                    <div class="form-group">

                        <label class="form-label">
                            Framework Type
                        </label>

                        <input
                            type="text"
                            name="framework_type"
                            class="form-control-aspia"
                            placeholder="Example: Standard"
                        >

                    </div>


                    {{-- DESCRIPTION --}}



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

                    Add Framework

                </button>


            </div>


        </form>


    </div>

</div>



{{-- =========================================================
     EDIT FRAMEWORK MODAL
========================================================= --}}

<div
    id="editModal"
    class="modal-overlay"

    onclick="closeModalOutside(event, 'editModal')"
>


    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Edit Framework
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
            id="editFrameworkForm"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="modal-body">


                <div class="form-grid">


                    {{-- FRAMEWORK ID --}}

                    <div class="form-group">

                        <label class="form-label">

                            Framework ID
                            <span class="required-star">*</span>

                        </label>

                        <input
                            type="text"
                            id="editFrameworkId"
                            name="framework_id"
                            class="form-control-aspia"
                            required
                        >

                    </div>


                    {{-- FRAMEWORK CODE --}}

                    <div class="form-group">

                        <label class="form-label">

                            Framework Code
                            <span class="required-star">*</span>

                        </label>

                        <input
                            type="text"
                            id="editFrameworkCode"
                            name="framework_code"
                            class="form-control-aspia"
                            required
                        >

                    </div>


                    {{-- FRAMEWORK NAME --}}

                    <div class="form-group">

                        <label class="form-label">

                            Framework Name
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


                    {{-- FRAMEWORK FAMILY --}}

                    <div class="form-group">

                        <label class="form-label">
                            Framework Family
                        </label>

                        <input
                            type="text"
                            id="editFrameworkFamily"
                            name="framework_family"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- CATEGORY --}}

                    <div class="form-group">

                        <label class="form-label">
                            Category
                        </label>

                        <input
                            type="text"
                            id="editCategory"
                            name="category"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- PUBLISHER --}}

                    <div class="form-group">

                        <label class="form-label">
                            Publisher
                        </label>

                        <input
                            type="text"
                            id="editPublisher"
                            name="publisher"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- REGION --}}

                    <div class="form-group">

                        <label class="form-label">
                            Region
                        </label>

                        <input
                            type="text"
                            id="editRegion"
                            name="region"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- INDUSTRY --}}

                    <div class="form-group">

                        <label class="form-label">
                            Industry
                        </label>

                        <input
                            type="text"
                            id="editIndustry"
                            name="industry"
                            class="form-control-aspia"
                        >

                    </div>


                    {{-- FRAMEWORK TYPE --}}

                    <div class="form-group">

                        <label class="form-label">
                            Framework Type
                        </label>

                        <input
                            type="text"
                            id="editFrameworkType"
                            name="framework_type"
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
                Import Frameworks
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
            action="{{ route('frameworks.import') }}"
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

                        <br><br>

                        Your Excel file should contain:

                        <br>

                        <strong>
                            Framework ID, Framework Code, Framework Name,
                            Version, Framework Family, Category, Publisher,
                            Region, Industry, Framework Type
                        </strong>

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
     JAVASCRIPT
========================================================= --}}

<script>


    /* =====================================================
       OPEN MODAL
    ====================================================== */

    function openModal(id)
    {
        const modal = document.getElementById(id);

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
        const modal = document.getElementById(id);

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
       OPEN EDIT MODAL
    ====================================================== */

    function openEditModal(

        id,

        frameworkId,

        frameworkCode,

        name,

        version,

        frameworkFamily,

        category,

        publisher,

        region,

        industry,

        frameworkType

    ) {


        /* FORM ACTION */

        document
            .getElementById('editFrameworkForm')
            .action = `/frameworks/${id}`;


        /* FRAMEWORK ID */

        document
            .getElementById('editFrameworkId')
            .value = frameworkId || '';


        /* FRAMEWORK CODE */

        document
            .getElementById('editFrameworkCode')
            .value = frameworkCode || '';


        /* FRAMEWORK NAME */

        document
            .getElementById('editName')
            .value = name || '';


        /* VERSION */

        document
            .getElementById('editVersion')
            .value = version || '';


        /* FRAMEWORK FAMILY */

        document
            .getElementById('editFrameworkFamily')
            .value = frameworkFamily || '';


        /* CATEGORY */

        document
            .getElementById('editCategory')
            .value = category || '';


        /* PUBLISHER */

        document
            .getElementById('editPublisher')
            .value = publisher || '';


        /* REGION */

        document
            .getElementById('editRegion')
            .value = region || '';


        /* INDUSTRY */

        document
            .getElementById('editIndustry')
            .value = industry || '';


        /* FRAMEWORK TYPE */

        document
            .getElementById('editFrameworkType')
            .value = frameworkType || '';


        
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
                    .querySelectorAll('.modal-overlay')
                    .forEach(function(modal)
                    {

                        modal.classList.remove('show');

                    });


                document.body.style.overflow = '';

            }

        }
    );


</script>


@endsection