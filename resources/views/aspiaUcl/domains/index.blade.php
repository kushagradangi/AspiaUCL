@extends('layouts.aspiaUcl')

@section('title', ' | Domains')

@section('page-title', 'Domains')

@section('content')

<style>

.domain-page {
    width: 100%;
}

.domain-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    gap: 20px;
}

.domain-header h1 {
    margin: 0 0 8px;
    font-size: 30px;
    font-weight: 500;
}

.domain-header p {
    margin: 0;
    color: #8f9db5;
    font-size: 14px;
}

.domain-actions {
    display: flex;
    gap: 10px;
}

.aspia-btn {
    border: none;
    border-radius: 8px;
    padding: 11px 17px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
}

.btn-primary {
    background: #10bce8;
    color: #07152e;
}

.btn-secondary {
    background: #162544;
    border: 1px solid #1c4266;
    color: white;
}

.domain-panel {
    background: #162544;
    border: 1px solid #1c4266;
    border-radius: 15px;
    overflow: hidden;
    margin-bottom: 25px;
}

.panel-header {
    padding: 20px;
    border-bottom: 1px solid rgba(255,255,255,.06);

    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.panel-header h2 {
    margin: 0;
    font-size: 17px;
    font-weight: 500;
}

.search-form {
    display: flex;
    gap: 8px;
}

.search-input {
    width: 280px;
    background: #0e1836;
    border: 1px solid #27496b;
    border-radius: 8px;
    color: white;
    padding: 10px 13px;
    outline: none;
}

.table-wrapper {
    overflow-x: auto;
}

.domain-table {
    width: 100%;
    min-width: 1500px;
    border-collapse: collapse;
}

.domain-table th {
    padding: 14px;
    text-align: left;
    color: #71829f;
    font-size: 11px;
    text-transform: uppercase;
    white-space: nowrap;
}

.domain-table td {
    padding: 15px;
    border-top: 1px solid rgba(255,255,255,.05);
    color: #b9c5d8;
    font-size: 13px;
    white-space: nowrap;
}

.domain-id {
    color: #10bce8;
    font-weight: 600;
}

.domain-name {
    color: white;
    font-weight: 500;
}

.actions {
    display: flex;
    gap: 7px;
}

.action-btn {
    border: 1px solid #27496b;
    background: #101d3b;
    color: #aebbd0;
    border-radius: 7px;
    padding: 7px 11px;
    cursor: pointer;
}

.delete-btn {
    color: #ff7777;
}

.empty {
    text-align: center;
    padding: 40px !important;
    color: #71829f !important;
}

.modal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.75);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    padding: 25px;
}

.modal.show {
    display: flex;
}

.modal-box {
    width: 100%;
    max-width: 950px;
    max-height: 90vh;
    overflow-y: auto;
    background: #162544;
    border: 1px solid #1c4266;
    border-radius: 15px;
}

.modal-header {
    position: sticky;
    top: 0;
    z-index: 2;

    background: #162544;

    padding: 20px;

    border-bottom: 1px solid rgba(255,255,255,.06);

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h2 {
    margin: 0;
    font-size: 19px;
    font-weight: 500;
}

.close {
    background: none;
    border: none;
    color: #8291aa;
    font-size: 28px;
    cursor: pointer;
}

.modal-body {
    padding: 22px;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-label {
    display: block;
    color: #b9c5d8;
    font-size: 13px;
    margin-bottom: 7px;
}

.form-control {
    width: 100%;
    box-sizing: border-box;

    background: #0e1836;
    border: 1px solid #27496b;
    border-radius: 8px;

    color: white;
    padding: 11px 13px;
    outline: none;
}

.form-control:focus {
    border-color: #10bce8;
}

textarea.form-control {
    min-height: 100px;
    resize: vertical;
}

.modal-footer {
    position: sticky;
    bottom: 0;

    background: #162544;

    padding: 16px 22px;

    border-top: 1px solid rgba(255,255,255,.06);

    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.success {
    background: rgba(34,197,94,.1);
    border: 1px solid rgba(34,197,94,.2);
    color: #6ee7a0;
    padding: 13px;
    border-radius: 9px;
    margin-bottom: 20px;
}

@media(max-width:800px) {

    .domain-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .panel-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .form-group.full {
        grid-column: auto;
    }
}

</style>


@if(session('success'))

    <div class="success">
        {{ session('success') }}
    </div>

@endif


<div class="domain-page">

    {{-- HEADER --}}

    <div class="domain-header">

        <div>

            <h1>Domains</h1>

            <p>
                Manage governance and compliance domains.
            </p>

        </div>


        <div class="domain-actions">

            <button
                class="aspia-btn btn-secondary"
                onclick="openModal('importModal')"
            >
                ↑ Import XLSX
            </button>

            <button
                class="aspia-btn btn-primary"
                onclick="openModal('addModal')"
            >
                + Add Domain
            </button>

        </div>

    </div>


    {{-- TABLE --}}

    <div class="domain-panel">

        <div class="panel-header">

            <h2>
                Domain Management
            </h2>


            <form
                method="GET"
                action="{{ route('domains.index') }}"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="search-input"
                    placeholder="Search domains..."
                >

                <button
                    type="submit"
                    class="aspia-btn btn-secondary"
                >
                    Search
                </button>

            </form>

        </div>


        <div class="table-wrapper">

            <table class="domain-table">

                <thead>

                    <tr>

                        <th>Domain ID</th>
                        <th>Domain Code</th>
                        <th>Domain Name</th>
                        <th>Status</th>
                        <th>Version</th>
                        <th>Business Owner</th>
                        <th>Industry</th>
                        <th>Technology</th>
                        <th>Display Order</th>
                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($domains as $domain)

                        <tr>

                            <td class="domain-id">
                                {{ $domain->domain_id }}
                            </td>

                            <td>
                                {{ $domain->domain_code ?: '—' }}
                            </td>

                            <td class="domain-name">
                                {{ $domain->name }}
                            </td>

                            <td>
                                {{ $domain->status }}
                            </td>

                            <td>
                                {{ $domain->version ?: '—' }}
                            </td>

                            <td>
                                {{ $domain->business_owner ?: '—' }}
                            </td>

                            <td>
                                {{ $domain->applicable_industries ?: '—' }}
                            </td>

                            <td>
                                {{ $domain->applicable_technologies ?: '—' }}
                            </td>

                            <td>
                                {{ $domain->display_order }}
                            </td>

                            <td>

                                <div class="actions">

                                    <button
                                        class="action-btn"
                                        onclick="editDomain(
                                            {{ $domain->id }},
                                            @js($domain)
                                        )"
                                    >
                                        Edit
                                    </button>


                                    <form
                                        method="POST"
                                        action="{{ route('domains.destroy', $domain) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this domain?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="action-btn delete-btn"
                                            type="submit"
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
                                class="empty"
                            >
                                No domains found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <div style="padding:20px;">

            {{ $domains->links() }}

        </div>

    </div>

</div>


{{-- =====================================================
     ADD MODAL
===================================================== --}}

<div
    id="addModal"
    class="modal"
    onclick="outsideClose(event, 'addModal')"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>Add Domain</h2>

            <button
                class="close"
                onclick="closeModal('addModal')"
                type="button"
            >
                ×
            </button>

        </div>


        <form
            method="POST"
            action="{{ route('domains.store') }}"
        >

            @csrf

            <div class="modal-body">

                <div class="form-grid">

                    @include('aspiaUcl.domains.form')

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="aspia-btn btn-secondary"
                    onclick="closeModal('addModal')"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="aspia-btn btn-primary"
                >
                    Add Domain
                </button>

            </div>

        </form>

    </div>

</div>


{{-- =====================================================
     EDIT MODAL
===================================================== --}}

<div
    id="editModal"
    class="modal"
    onclick="outsideClose(event, 'editModal')"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>Edit Domain</h2>

            <button
                class="close"
                onclick="closeModal('editModal')"
                type="button"
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

                <div class="form-grid">

                    @include(
                        'aspiaUcl.domains.form',
                        ['edit' => true]
                    )

                </div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="aspia-btn btn-secondary"
                    onclick="closeModal('editModal')"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="aspia-btn btn-primary"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>


{{-- =====================================================
     IMPORT MODAL
===================================================== --}}

<div
    id="importModal"
    class="modal"
    onclick="outsideClose(event, 'importModal')"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>Import Domains</h2>

            <button
                class="close"
                onclick="closeModal('importModal')"
                type="button"
            >
                ×
            </button>

        </div>


        <form
            method="POST"
            action="{{ route('domains.import') }}"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="modal-body">

                <label class="form-label">
                    XLSX File
                </label>

                <input
                    type="file"
                    name="file"
                    accept=".xlsx"
                    class="form-control"
                    required
                >

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="aspia-btn btn-secondary"
                    onclick="closeModal('importModal')"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="aspia-btn btn-primary"
                >
                    Import XLSX
                </button>

            </div>

        </form>

    </div>

</div>


<script>

function openModal(id)
{
    document
        .getElementById(id)
        .classList.add('show');

    document.body.style.overflow = 'hidden';
}


function closeModal(id)
{
    document
        .getElementById(id)
        .classList.remove('show');

    document.body.style.overflow = '';
}


function outsideClose(event, id)
{
    if (event.target.id === id) {
        closeModal(id);
    }
}


function editDomain(id, domain)
{
    const form = document.getElementById('editForm');

    form.action = `/domains/${id}`;

    const fields = [
        'domain_id',
        'domain_code',
        'name',
        'slug',
        'purpose',
        'scope',
        'business_owner',
        'applicable_industries',
        'applicable_technologies',
        'description',
        'display_order',
        'status',
        'version',
        'short_overview',
        'business_objectives',
        'business_risks',
        'key_capabilities',
        'typical_stakeholders',
        'keywords',
        'tags',
        'why_domain_matters',
        'common_challenges',
        'related_domains',
        'related_frameworks'
    ];

    fields.forEach(function(field) {

        const input = document.getElementById(
            'edit_' + field
        );

        if (input) {
            input.value = domain[field] ?? '';
        }

    });

    openModal('editModal');
}

</script>

@endsection