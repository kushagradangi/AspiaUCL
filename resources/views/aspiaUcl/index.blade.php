<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>aspiaUCL | Frameworks</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            background: #0e1836;

            color: #ffffff;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        .framework-page {

            min-height: 100vh;

            padding: 40px;
        }


        /* =========================================
           HEADER
        ========================================= */

        .page-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 30px;
        }


        .page-title h1 {

            margin: 0 0 8px;

            font-size: 30px;

            font-weight: 500;
        }


        .page-title p {

            margin: 0;

            color: #8f9db5;

            font-size: 14px;
        }


        .header-buttons {

            display: flex;

            gap: 10px;
        }


        /* =========================================
           BUTTONS
        ========================================= */

        .btn {

            border: none;

            padding: 11px 17px;

            border-radius: 8px;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition: .2s;
        }


        .btn-primary {

            background: #10bce8;

            color: #06152d;
        }


        .btn-primary:hover {

            background: #20c7f1;
        }


        .btn-secondary {

            background: #162544;

            border: 1px solid #1c4266;

            color: #ffffff;
        }


        .btn-secondary:hover {

            background: #1b2e50;
        }


        .btn-edit {

            background: rgba(16,188,232,.1);

            border: 1px solid rgba(16,188,232,.2);

            color: #10bce8;

            padding: 7px 11px;
        }


        .btn-delete {

            background: rgba(239,68,68,.08);

            border: 1px solid rgba(239,68,68,.2);

            color: #ff8585;

            padding: 7px 11px;
        }


        /* =========================================
           ALERTS
        ========================================= */

        .success-message {

            background: rgba(16,188,232,.1);

            border: 1px solid rgba(16,188,232,.2);

            color: #10bce8;

            padding: 13px 16px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 13px;
        }


        .error-message {

            background: rgba(239,68,68,.08);

            border: 1px solid rgba(239,68,68,.2);

            color: #ff8585;

            padding: 13px 16px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 13px;
        }


        /* =========================================
           SEARCH
        ========================================= */

        .search-card {

            background: #162544;

            border: 1px solid #1c4266;

            border-radius: 14px;

            padding: 15px;

            margin-bottom: 20px;
        }


        .search-form {

            display: flex;

            gap: 10px;
        }


        .search-input {

            flex: 1;

            background: #0e1836;

            border: 1px solid #29476b;

            color: #ffffff;

            padding: 11px 14px;

            border-radius: 8px;

            outline: none;

            font-size: 13px;
        }


        .search-input:focus {

            border-color: #10bce8;
        }


        /* =========================================
           TABLE
        ========================================= */

        .table-card {

            background: #162544;

            border: 1px solid #1c4266;

            border-radius: 15px;

            overflow: hidden;
        }


        table {

            width: 100%;

            border-collapse: collapse;
        }


        th {

            padding: 17px 20px;

            text-align: left;

            color: #71809a;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1px;

            border-bottom: 1px solid #1c4266;
        }


        td {

            padding: 18px 20px;

            color: #aebbd0;

            font-size: 14px;

            border-bottom: 1px solid rgba(255,255,255,.05);
        }


        td strong {

            color: #ffffff;

            font-weight: 500;
        }


        .actions {

            display: flex;

            align-items: center;

            gap: 7px;
        }


        .empty-row {

            text-align: center;

            padding: 40px;

            color: #63728c;
        }


        /* =========================================
           PAGINATION
        ========================================= */

        .pagination-area {

            padding: 20px;

            border-top: 1px solid rgba(255,255,255,.05);
        }


        /* =========================================
           ACTIVITY
        ========================================= */

        .activity-card {

            margin-top: 30px;

            background: #162544;

            border: 1px solid #1c4266;

            border-radius: 15px;

            padding: 25px;
        }


        .activity-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 15px;
        }


        .activity-header h2 {

            margin: 0;

            font-size: 17px;

            font-weight: 500;
        }


        .activity-badge {

            background: rgba(16,188,232,.1);

            color: #10bce8;

            border-radius: 20px;

            padding: 6px 10px;

            font-size: 10px;

            letter-spacing: 1px;
        }


        .activity-item {

            padding: 15px 0;

            border-bottom: 1px solid rgba(255,255,255,.05);

            color: #aebbd0;

            font-size: 13px;
        }


        .activity-item:last-child {

            border-bottom: none;
        }


        .activity-action {

            color: #10bce8;

            font-weight: 600;
        }


        .activity-time {

            float: right;

            color: #63728c;

            font-size: 11px;
        }


        /* =========================================
           MODAL
        ========================================= */

        .modal {

            position: fixed;

            inset: 0;

            display: none;

            align-items: center;

            justify-content: center;

            background: rgba(0,0,0,.72);

            z-index: 9999;

            padding: 20px;
        }


        .modal.show {

            display: flex;
        }


        .modal-box {

            width: 500px;

            max-width: 100%;

            background: #162544;

            border: 1px solid #1c4266;

            border-radius: 15px;

            padding: 25px;

            box-shadow: 0 20px 60px rgba(0,0,0,.4);
        }


        .modal-box h2 {

            margin: 0 0 22px;

            font-size: 20px;

            font-weight: 500;
        }


        .form-group {

            margin-bottom: 18px;
        }


        .form-group label {

            display: block;

            color: #c1ccdc;

            font-size: 13px;

            margin-bottom: 7px;
        }


        .form-control {

            width: 100%;

            background: #0e1836;

            border: 1px solid #29476b;

            border-radius: 8px;

            color: #ffffff;

            padding: 12px;

            outline: none;

            font-size: 13px;
        }


        .form-control:focus {

            border-color: #10bce8;
        }


        textarea.form-control {

            min-height: 110px;

            resize: vertical;
        }


        .modal-actions {

            display: flex;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 22px;
        }


        .import-help {

            color: #8f9db5;

            font-size: 12px;

            line-height: 1.6;

            margin-bottom: 20px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media(max-width: 800px) {

            .framework-page {

                padding: 25px 18px;
            }


            .page-header {

                flex-direction: column;

                align-items: flex-start;

                gap: 20px;
            }


            .header-buttons {

                width: 100%;
            }


            .header-buttons .btn {

                flex: 1;
            }


            .table-card {

                overflow-x: auto;
            }


            table {

                min-width: 700px;
            }
        }

    </style>

</head>


<body>


<div class="framework-page">


    <!-- =========================================
         PAGE HEADER
    ========================================== -->

    <div class="page-header">


        <div class="page-title">

            <h1>
                Frameworks
            </h1>

            <p>
                Manage governance and compliance frameworks.
            </p>

        </div>


        <div class="header-buttons">


            <button
                type="button"
                class="btn btn-primary"
                onclick="openModal('addModal')"
            >
                + Add Framework
            </button>


            <button
                type="button"
                class="btn btn-secondary"
                onclick="openModal('importModal')"
            >
                Import XLSX
            </button>


        </div>

    </div>


    <!-- =========================================
         SUCCESS MESSAGE
    ========================================== -->

    @if(session('success'))

        <div class="success-message">

            {{ session('success') }}

        </div>

    @endif


    <!-- =========================================
         ERRORS
    ========================================== -->

    @if($errors->any())

        <div class="error-message">

            {{ $errors->first() }}

        </div>

    @endif


    <!-- =========================================
         SEARCH
    ========================================== -->

    <div class="search-card">

        <form
            method="GET"
            action="{{ route('frameworks.index') }}"
            class="search-form"
        >

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="search-input"
                placeholder="Search frameworks..."
            >


            <button
                type="submit"
                class="btn btn-primary"
            >
                Search
            </button>


            @if(request('search'))

                <a
                    href="{{ route('frameworks.index') }}"
                    class="btn btn-secondary"
                    style="text-decoration:none;"
                >
                    Reset
                </a>

            @endif

        </form>

    </div>


    <!-- =========================================
         TABLE
    ========================================== -->

    <div class="table-card">

        <table>

            <thead>

                <tr>

                    <th>
                        Name
                    </th>

                    <th>
                        Description
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


                        <td>

                            <strong>
                                {{ $framework->name }}
                            </strong>

                        </td>


                        <td>

                            {{ $framework->description ?: '—' }}

                        </td>


                        <td>

                            {{ $framework->created_at->format('d M Y') }}

                        </td>


                        <td>


                            <div class="actions">


                                <button
                                    type="button"
                                    class="btn btn-edit"
                                    onclick="editFramework(
                                        {{ $framework->id }},
                                        @js($framework->name),
                                        @js($framework->description)
                                    )"
                                >
                                    Edit
                                </button>


                                <form
                                    method="POST"
                                    action="{{ route(
                                        'frameworks.destroy',
                                        $framework
                                    ) }}"
                                    onsubmit="
                                        return confirm(
                                            'Are you sure you want to delete this framework?'
                                        );
                                    "
                                >

                                    @csrf

                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="btn btn-delete"
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
                            colspan="4"
                            class="empty-row"
                        >
                            No frameworks found.
                        </td>

                    </tr>


                @endforelse


            </tbody>


        </table>


        <div class="pagination-area">

            {{ $frameworks->links() }}

        </div>


    </div>


    <!-- =========================================
         RECENT ACTIVITY
    ========================================== -->

    <div class="activity-card">


        <div class="activity-header">

            <h2>
                Recent Activity
            </h2>


            <span class="activity-badge">
                FRAMEWORKS
            </span>

        </div>


        @forelse($activities as $activity)


            <div class="activity-item">

                <span class="activity-action">
                    {{ $activity->action }}
                </span>

                —
                {{ $activity->description }}


                <span class="activity-time">

                    {{ $activity->created_at->diffForHumans() }}

                </span>

            </div>


        @empty


            <div class="activity-item">

                No recent activity.

            </div>


        @endforelse


    </div>


</div>


<!-- =========================================
     ADD FRAMEWORK MODAL
========================================== -->

<div
    class="modal"
    id="addModal"
>


    <div class="modal-box">


        <h2>
            Add Framework
        </h2>


        <form
            method="POST"
            action="{{ route('frameworks.store') }}"
        >

            @csrf


            <div class="form-group">

                <label>
                    Framework Name
                </label>


                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="e.g. ISO 27001"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Description
                </label>


                <textarea
                    name="description"
                    class="form-control"
                    placeholder="Enter framework description"
                ></textarea>

            </div>


            <div class="modal-actions">


                <button
                    type="button"
                    class="btn btn-secondary"
                    onclick="closeModal('addModal')"
                >
                    Cancel
                </button>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Add Framework
                </button>


            </div>


        </form>


    </div>


</div>


<!-- =========================================
     EDIT FRAMEWORK MODAL
========================================== -->

<div
    class="modal"
    id="editModal"
>


    <div class="modal-box">


        <h2>
            Edit Framework
        </h2>


        <form
            method="POST"
            id="editForm"
        >

            @csrf

            @method('PUT')


            <div class="form-group">

                <label>
                    Framework Name
                </label>


                <input
                    type="text"
                    name="name"
                    id="editName"
                    class="form-control"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Description
                </label>


                <textarea
                    name="description"
                    id="editDescription"
                    class="form-control"
                ></textarea>

            </div>


            <div class="modal-actions">


                <button
                    type="button"
                    class="btn btn-secondary"
                    onclick="closeModal('editModal')"
                >
                    Cancel
                </button>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Save Changes
                </button>


            </div>


        </form>


    </div>


</div>


<!-- =========================================
     IMPORT XLSX MODAL
========================================== -->

<div
    class="modal"
    id="importModal"
>


    <div class="modal-box">


        <h2>
            Import Frameworks
        </h2>


        <div class="import-help">

            Upload an <strong>XLSX</strong> file.

            <br>

            The first row must contain:

            <br><br>

            <strong>
                name
            </strong>
            &nbsp;&nbsp;
            <strong>
                description
            </strong>

        </div>


        <form
            method="POST"
            action="{{ route('frameworks.import') }}"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="form-group">

                <label>
                    Select XLSX file
                </label>


                <input
                    type="file"
                    name="file"
                    class="form-control"
                    accept=".xlsx"
                    required
                >

            </div>


            <div class="modal-actions">


                <button
                    type="button"
                    class="btn btn-secondary"
                    onclick="closeModal('importModal')"
                >
                    Cancel
                </button>


                <button
                    type="submit"
                    class="btn btn-primary"
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
            .classList
            .add('show');
    }


    function closeModal(id)
    {
        document
            .getElementById(id)
            .classList
            .remove('show');
    }


    function editFramework(
        id,
        name,
        description
    )
    {

        document
            .getElementById('editName')
            .value = name;


        document
            .getElementById('editDescription')
            .value = description || '';


        document
            .getElementById('editForm')
            .action = '/frameworks/' + id;


        openModal('editModal');
    }


    window.addEventListener(
        'click',
        function(event)
        {

            if (
                event.target.classList.contains('modal')
            ) {

                event.target.classList.remove('show');

            }

        }
    );

</script>


</body>

</html>