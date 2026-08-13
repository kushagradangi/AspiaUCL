@extends('layouts.aspiaUcl')

@section('title', ' | Domains')

@section('page-title', 'Domains')

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
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: #10bce8;
        color: #07152e;
    }

    .btn-primary:hover {
        background: #20c9f2;
    }

    .btn-secondary {
        background: #162544;
        color: #fff;
        border: 1px solid #1c4266;
    }

    .btn-secondary:hover {
        background: #1c3155;
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

    .search-input {
        width: 260px;
        background: #0e1836;
        border: 1px solid #27496b;
        color: #fff;
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

    .table-wrapper {
        overflow-x: auto;
    }

    .module-table {
        width: 100%;
        border-collapse: collapse;
    }

    .module-table th {
        text-align: left;
        padding: 14px 20px;
        color: #71829f;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: rgba(14,24,54,.35);
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

    .description {
        color: #8291aa;
        max-width: 400px;
    }

    .badge {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 6px;
        background: rgba(16,188,232,.10);
        color: #10bce8;
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
        color: #fff;
        border-color: #10bce8;
    }

    .empty-state {
        text-align: center;
        padding: 50px 20px !important;
        color: #71829f !important;
    }

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

    .alert-success,
    .alert-error {
        padding: 13px 16px;
        border-radius: 9px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .alert-success {
        background: rgba(34,197,94,.10);
        border: 1px solid rgba(34,197,94,.2);
        color: #6ee7a0;
    }

    .alert-error {
        background: rgba(239,68,68,.10);
        border: 1px solid rgba(239,68,68,.2);
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
        max-width: 520px;
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
    }

    .modal-header h2 {
        margin: 0;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
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

    .form-control {
        width: 100%;
        box-sizing: border-box;
        background: #0e1836;
        border: 1px solid #27496b;
        border-radius: 8px;
        padding: 11px 13px;
        color: #fff;
        outline: none;
    }

    .form-control:focus {
        border-color: #10bce8;
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
    }

    .import-info {
        color: #8291aa;
        font-size: 12px;
        margin-top: 10px;
    }
</style>


<div class="module-page">

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            <strong>Please fix the following:</strong>

            <ul style="margin:8px 0 0 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="page-header">

        <div>
            <h1>Domains</h1>

            <p>
                Manage governance domains under your frameworks.
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
                + Add Domain
            </button>

        </div>

    </div>


    <div class="panel">

        <div class="panel-header">

            <h2>Domain Management</h2>

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
                        <th>Name</th>
                        <th>Framework</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($domains as $domain)

                        <tr>

                            <td>
                                <span class="module-name">
                                    {{ $domain->name }}
                                </span>
                            </td>

                            <td>
                                <span class="badge">
                                    {{ $domain->framework?->name ?? 'N/A' }}
                                </span>
                            </td>

                            <td>
                                <span class="description">
                                    {{ $domain->description ?: 'No description' }}
                                </span>
                            </td>

                            <td>
                                {{ $domain->created_at?->format('d M Y') }}
                            </td>

                            <td>

                                <div class="actions">

                                    <button
                                        type="button"
                                        class="action-btn"
                                        onclick="openEditModal(
                                            {{ $domain->id }},
                                            {{ $domain->framework_id }},
                                            @js($domain->name),
                                            @js($domain->description)
                                        )"
                                    >
                                        Edit
                                    </button>

                                    <form
                                        action="{{ route('domains.destroy', $domain) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this domain?')"
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
                            <td colspan="5" class="empty-state">
                                No domains found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($domains->hasPages())
            <div style="padding:18px 20px;">
                {{ $domains->links() }}
            </div>
        @endif

    </div>


    <div class="panel">

        <div class="panel-header">
            <h2>Recent Activity</h2>
        </div>

        <div class="activity-list">

            @forelse($activities as $activity)

                <div class="activity-item">

                    <div class="activity-icon">✓</div>

                    <div>

                        <div class="activity-text">
                            {{ $activity->description }}
                        </div>

                        <div class="activity-time">
                            {{ $activity->created_at?->diffForHumans() }}
                        </div>

                    </div>

                </div>

            @empty

                <div class="activity-item">
                    <div class="activity-icon">—</div>
                    <div class="activity-text">
                        No recent activity.
                    </div>
                </div>

            @endforelse

        </div>

    </div>

</div>


{{-- ADD MODAL --}}

<div id="addModal" class="modal-overlay">

    <div class="modal-box">

        <div class="modal-header">

            <h2>Add Domain</h2>

            <button
                type="button"
                class="close-modal"
                onclick="closeModal('addModal')"
            >
                ×
            </button>

        </div>


        <form action="{{ route('domains.store') }}" method="POST">

            @csrf

            <div class="modal-body">

                <div class="form-group">

                    <label class="form-label">
                        Framework
                    </label>

                    <select
                        name="framework_id"
                        class="form-control"
                        required
                    >

                        <option value="">
                            Select Framework
                        </option>

                        @foreach($frameworks as $framework)

                            <option value="{{ $framework->id }}">
                                {{ $framework->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Domain Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter domain name"
                        required
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        placeholder="Enter description"
                    ></textarea>

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
                    Add Domain
                </button>

            </div>

        </form>

    </div>

</div>


{{-- EDIT MODAL --}}

<div id="editModal" class="modal-overlay">

    <div class="modal-box">

        <div class="modal-header">

            <h2>Edit Domain</h2>

            <button
                type="button"
                class="close-modal"
                onclick="closeModal('editModal')"
            >
                ×
            </button>

        </div>


        <form id="editForm" method="POST">

            @csrf
            @method('PUT')

            <div class="modal-body">

                <div class="form-group">

                    <label class="form-label">
                        Framework
                    </label>

                    <select
                        id="editFramework"
                        name="framework_id"
                        class="form-control"
                        required
                    >

                        @foreach($frameworks as $framework)

                            <option value="{{ $framework->id }}">
                                {{ $framework->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Domain Name
                    </label>

                    <input
                        type="text"
                        id="editName"
                        name="name"
                        class="form-control"
                        required
                    >

                </div>


                <div class="form-group">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        id="editDescription"
                        name="description"
                        class="form-control"
                    ></textarea>

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


{{-- IMPORT MODAL --}}

<div id="importModal" class="modal-overlay">

    <div class="modal-box">

        <div class="modal-header">

            <h2>Import Domains</h2>

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

function openModal(id) {
    document.getElementById(id).classList.add('show');
}

function closeModal(id) {
    document.getElementById(id).classList.remove('show');
}

function openEditModal(id, frameworkId, name, description) {

    document.getElementById('editForm').action =
        `/domains/${id}`;

    document.getElementById('editFramework').value =
        frameworkId;

    document.getElementById('editName').value =
        name || '';

    document.getElementById('editDescription').value =
        description || '';

    openModal('editModal');
}

document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {

        document
            .querySelectorAll('.modal-overlay')
            .forEach(function(modal) {
                modal.classList.remove('show');
            });

    }

});

</script>

@endsection