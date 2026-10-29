<?php $__env->startSection('title', ' | Requirement Evidence Mapping'); ?>

<?php $__env->startSection('page-title', 'Requirement Evidence Mapping'); ?>

<?php $__env->startSection('content'); ?>

<style>

    /* =========================================================
       PAGE
    ========================================================= */

    .control-page,
    .mapping-page {
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
        background: #16C4F4;
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
       STATS CARDS ROW (DYNAMIC BOXES)
    ========================================================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 25px;
    }

    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 640px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

    .stat-card-ucl {
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 12px;
        padding: 20px 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: transform 0.2s, border-color 0.2s;
    }

    .stat-card-ucl:hover {
        border-color: rgba(22, 196, 244, 0.4);
    }

    .stat-card-ucl .stat-info h3 {
        margin: 0 0 8px;
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.9px;
        color: #8f9db5;
    }

    .stat-card-ucl .stat-info .stat-val {
        font-size: 28px;
        font-weight: 700;
        color: #ffffff;
        line-height: 1;
        letter-spacing: -0.5px;
    }

    .stat-card-ucl .stat-icon-wrap {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: rgba(22, 196, 244, 0.1);
        color: #16C4F4;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
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

        background: #0D1735;

        border: 1px solid #27496b;

        color: #ffffff;

        border-radius: 8px;

        padding: 10px 13px;

        outline: none;
    }


    .search-input:focus {
        border-color: #16C4F4;
    }


    .search-input::placeholder {
        color: #687993;
    }


    /* =========================================================
       TABLE (FIT TO SCREEN - NO HORIZONTAL SCROLL)
    ========================================================= */

    .table-wrapper {
        width: 100%;
        overflow-x: hidden;
    }

    .control-table {
        width: 100%;
        min-width: 0;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .control-table th {
        text-align: left;
        padding: 14px 16px;
        color: #71829f;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-weight: 600;
        background: rgba(14,24,54,.35);
        white-space: nowrap;
    }

    .control-table td {
        padding: 14px 16px;
        border-top: 1px solid rgba(255,255,255,.06);
        color: #b9c5d8;
        font-size: 13px;
        vertical-align: middle;
        overflow: hidden;
    }

    .control-table tr:hover td {
        background: rgba(22,196,244,.025);
    }

    .control-id {
        color: #ffffff;
        font-weight: 500;
        white-space: nowrap;
    }

    .domain-code {
        color: #ffffff;
        font-weight: 500;
        white-space: nowrap;
    }

    .control-name-link {
        color: #16C4F4;
        text-decoration: underline;
        text-underline-offset: 3px;
        font-weight: 500;
        transition: color 0.2s ease, text-decoration-color 0.2s ease;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.45;
        word-break: break-word;
    }

    .control-name-link:hover {
        color: #38bdf8;
        text-decoration: underline;
    }

    .table-cell-ellipsis {
        display: block;
        max-width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.4;
    }

    .nowrap-cell {
        white-space: nowrap;
    }


    /* =========================================================
       ACTIONS (MANIPULATION BUTTONS)
    ========================================================= */

    .actions {
        display: flex;
        gap: 6px;
        align-items: center;
        justify-content: flex-end;
        white-space: nowrap;
    }

    .action-btn {
        border-radius: 7px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        border: 1px solid #27496b;
        background: #172540;
        color: #aebbd0;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
    }

    .action-btn:hover {
        color: #ffffff;
        border-color: #16C4F4;
        background: #1c3155;
    }

    .action-btn.btn-danger-aspia {
        background: rgba(239, 68, 68, .12);
        color: #ff7070;
        border: 1px solid rgba(239, 68, 68, .25);
    }

    .action-btn.btn-danger-aspia:hover {
        background: rgba(239, 68, 68, .25);
        color: #ffffff;
        border-color: #ef4444;
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
        color: #16C4F4;
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
        background: #172540;
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
        border-color: #16C4F4;
        background: #162544;
    }

    .custom-pagination .active-page {
        background: #16C4F4;
        border-color: #16C4F4;
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

    .modal-footer {
        padding: 18px 22px;
        border-top: 1px solid rgba(255,255,255,.07);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        position: sticky;
        bottom: 0;
        background: #162544;
        z-index: 2;
    }


    /* =========================================================
       FORM
    ========================================================= */

    .form-section-title {
        color: #16C4F4;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin: 22px 0 14px;
        padding-bottom: 6px;
        border-bottom: 1px solid rgba(22, 196, 244, 0.2);
    }

    .form-section-title:first-child {
        margin-top: 0;
    }

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
        color: #16C4F4;
    }

    .form-control-aspia {
        width: 100%;
        box-sizing: border-box;
        background: #0D1735;
        border: 1px solid #27496b;
        border-radius: 8px;
        padding: 11px 13px;
        color: #ffffff;
        outline: none;
        font-size: 14px;
    }

    .form-control-aspia:focus {
        border-color: #16C4F4;
        box-shadow: 0 0 0 2px rgba(22,196,244,.08);
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

    .import-info {
        font-size: 12px;
        color: #8f9db5;
        margin-top: 6px;
    }

    @keyframes aspiaSpin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Detail View Box */
    .detail-section {
        margin-bottom: 20px;
        background: #0D1735;
        border: 1px solid #1c4266;
        border-radius: 10px;
        padding: 16px 18px;
    }

    .detail-section-title {
        color: #16C4F4;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 12px;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 12px;
        padding: 8px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        font-size: 13px;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        color: #71829f;
        font-weight: 500;
    }

    .detail-value {
        color: #ffffff;
        word-break: break-word;
        white-space: pre-wrap;
    }

    .detail-criteria-pass {
        border-left: 3px solid #22c55e;
        padding: 8px 10px;
        background: rgba(34, 197, 94, 0.08);
        border-radius: 4px;
    }

    .detail-criteria-fail {
        border-left: 3px solid #ef4444;
        padding: 8px 10px;
        background: rgba(239, 68, 68, 0.08);
        border-radius: 4px;
    }

</style>

<div class="control-page">

    

    <?php if(session('success')): ?>
        <div class="alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    

    <?php if(session('error')): ?>
        <div class="alert-error">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>


    

    <?php if($errors->any()): ?>
        <div class="alert-error">
            <strong>Please fix the following:</strong>
            <ul style="margin:8px 0 0 18px;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>


    

    <div class="page-header">

        <div>
            <h1>
                Requirement Evidence Mapping
            </h1>
            <p>
                Manage compliance requirement evidence mappings and audit verification specifications.
            </p>
        </div>


        <div class="header-actions">

            
            <button
                type="button"
                class="btn-aspia btn-secondary-aspia"
                onclick="openModal('importModal')"
            >
                ↑ Import XLSX
            </button>


            
            <button
                type="button"
                class="btn-aspia btn-primary-aspia"
                onclick="openModal('addModal')"
            >
                + Add Mapping
            </button>

        </div>

    </div>


    

    <div class="stats-grid">

        
        <div class="stat-card-ucl">
            <div class="stat-info">
                <h3>Total Mappings</h3>
                <div class="stat-val"><?php echo e(number_format($totalMappings)); ?></div>
            </div>
            <div class="stat-icon-wrap">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <path d="m9 15 2 2 4-4"/>
                </svg>
            </div>
        </div>

        
        <div class="stat-card-ucl">
            <div class="stat-info">
                <h3>Covered Requirements</h3>
                <div class="stat-val"><?php echo e(number_format($coveredRequirementsCount)); ?></div>
            </div>
            <div class="stat-icon-wrap">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/>
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                </svg>
            </div>
        </div>

        
        <div class="stat-card-ucl">
            <div class="stat-info">
                <h3>Covered Controls</h3>
                <div class="stat-val"><?php echo e(number_format($coveredControlsCount)); ?></div>
            </div>
            <div class="stat-icon-wrap">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                </svg>
            </div>
        </div>

        
        <div class="stat-card-ucl">
            <div class="stat-info">
                <h3>Evidence Owners</h3>
                <div class="stat-val"><?php echo e(number_format($uniqueOwnersCount)); ?></div>
            </div>
            <div class="stat-icon-wrap">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
        </div>

    </div>


    

    <div class="control-panel">

        <div class="panel-header">

            <h2>
                Requirement Evidence Mapping Management
            </h2>


            
            <form
                action="<?php echo e(route('requirement-evidence-mappings.index')); ?>"
                method="GET"
                class="search-form"
            >
                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search mappings..."
                    value="<?php echo e(request('search')); ?>"
                >

                <button
                    type="submit"
                    class="btn-aspia btn-secondary-aspia"
                >
                    Search
                </button>

                <?php if(request('search')): ?>
                    <a
                        href="<?php echo e(route('requirement-evidence-mappings.index')); ?>"
                        class="btn-aspia btn-secondary-aspia"
                        style="padding: 10px 14px;"
                        title="Clear search"
                    >
                        Clear
                    </a>
                <?php endif; ?>
            </form>

        </div>


        

        <div class="table-wrapper">

            <table class="control-table">

                <thead>

                    <tr>

                        <th style="width: 150px;">
                            Requirement ID
                        </th>

                        <th style="width: 120px;">
                            Control ID
                        </th>

                        <th>
                            Requirement Title
                        </th>

                        <th style="width: 200px;">
                            Evidence Type
                        </th>

                        <th style="width: 200px;">
                            Evidence Owner
                        </th>

                        <th style="width: 210px; text-align: right;">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $mappings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            
                            <td class="nowrap-cell">
                                <span class="control-id">
                                    <?php echo e($item->requirement_id); ?>

                                </span>
                            </td>


                            
                            <td class="nowrap-cell">
                                <span class="domain-code">
                                    <?php echo e($item->control_id ?: '—'); ?>

                                </span>
                            </td>


                            
                            <td>
                                <a
                                    href="javascript:void(0)"
                                    onclick="viewMappingDetails(<?php echo e($item->id); ?>)"
                                    class="control-name-link"
                                    title="<?php echo e($item->requirement_title); ?>"
                                >
                                    <?php echo e($item->requirement_title ?: 'Untitled'); ?>

                                </a>
                            </td>


                            
                            <td>
                                <div class="table-cell-ellipsis" title="<?php echo e($item->evidence_type); ?>">
                                    <?php echo e($item->evidence_type ?: '—'); ?>

                                </div>
                            </td>


                            
                            <td>
                                <div class="table-cell-ellipsis" title="<?php echo e($item->evidence_owner); ?>">
                                    <?php echo e($item->evidence_owner ?: '—'); ?>

                                </div>
                            </td>


                            
                            <td class="nowrap-cell" style="text-align: right;">

                                <div class="actions">

                                    
                                    <button
                                        type="button"
                                        class="action-btn"
                                        onclick="viewMappingDetails(<?php echo e($item->id); ?>)"
                                        title="View full details"
                                    >
                                        View
                                    </button>


                                    
                                    <button
                                        type="button"
                                        class="action-btn"
                                        onclick="openEditModal(<?php echo e($item->id); ?>)"
                                        title="Edit this record"
                                    >
                                        Edit
                                    </button>


                                    
                                    <form
                                        action="<?php echo e(route('requirement-evidence-mappings.destroy', $item)); ?>"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete requirement evidence mapping for <?php echo e(addslashes($item->requirement_id)); ?>?')"
                                        style="margin: 0; display: inline;"
                                    >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button
                                            type="submit"
                                            class="action-btn btn-danger-aspia"
                                            title="Delete this record"
                                        >
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>
                            <td
                                colspan="6"
                                class="empty-state"
                            >
                                <div class="empty-state-icon">
                                    ◇
                                </div>
                                No requirement evidence mappings found.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>


        

        <?php if($mappings->hasPages()): ?>

            <div class="pagination-area">

                <div class="custom-pagination">

                    
                    <?php if($mappings->onFirstPage()): ?>
                        <span class="disabled-page">Previous</span>
                    <?php else: ?>
                        <a href="<?php echo e($mappings->previousPageUrl()); ?>">
                            Previous
                        </a>
                    <?php endif; ?>

                    
                    <?php $__currentLoopData = range(1, $mappings->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(
                            $page == 1 ||
                            $page == $mappings->lastPage() ||
                            abs($page - $mappings->currentPage()) <= 2
                        ): ?>

                            <?php if($page == $mappings->currentPage()): ?>
                                <span class="active-page">
                                    <?php echo e($page); ?>

                                </span>
                            <?php else: ?>
                                <a href="<?php echo e($mappings->url($page)); ?>">
                                    <?php echo e($page); ?>

                                </a>
                            <?php endif; ?>

                        <?php elseif(
                            $page == 2 ||
                            $page == $mappings->lastPage() - 1
                        ): ?>
                            <span class="pagination-info">...</span>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if($mappings->hasMorePages()): ?>
                        <a href="<?php echo e($mappings->nextPageUrl()); ?>">
                            Next
                        </a>
                    <?php else: ?>
                        <span class="disabled-page">Next</span>
                    <?php endif; ?>

                </div>

            </div>

        <?php endif; ?>

    </div>

</div>




<div
    id="viewModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'viewModal')"
>

    <div class="modal-box" style="max-width: 900px;">

        <div class="modal-header">

            <div>
                <h2 id="viewModalTitle">
                    Evidence Mapping Details
                </h2>
                <div style="font-size: 12px; color: #8f9db5; margin-top: 3px;" id="viewModalSubtitle"></div>
            </div>

            <button
                type="button"
                class="close-modal"
                onclick="closeModal('viewModal')"
            >
                ×
            </button>

        </div>

        <div class="modal-body">

            
            <div class="detail-section">
                <div class="detail-section-title">1. Requirement Context (Columns A – D)</div>
                <div class="detail-row">
                    <div class="detail-label">Requirement ID:</div>
                    <div class="detail-value" id="viewReqId"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Control ID:</div>
                    <div class="detail-value" id="viewCtrlId"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Requirement Title:</div>
                    <div class="detail-value" id="viewReqTitle" style="font-weight: 500; color: #16C4F4;"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Requirement Statement:</div>
                    <div class="detail-value" id="viewReqStatement" style="line-height: 1.6;"></div>
                </div>
            </div>

            
            <div class="detail-section">
                <div class="detail-section-title">2. Evidence Specifications (Columns E – K)</div>
                <div class="detail-row">
                    <div class="detail-label">Evidence Type:</div>
                    <div class="detail-value" id="viewEvidenceType"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Evidence Owner:</div>
                    <div class="detail-value" id="viewEvidenceOwner"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Reference / Link:</div>
                    <div class="detail-value" id="viewEvidenceLink" style="color: #38bdf8;"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Evidence Description:</div>
                    <div class="detail-value" id="viewEvidenceDesc" style="line-height: 1.6;"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Source / System:</div>
                    <div class="detail-value" id="viewSourceSystem"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Frequency:</div>
                    <div class="detail-value" id="viewFrequency"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Freshness Criteria:</div>
                    <div class="detail-value" id="viewFreshness"></div>
                </div>
            </div>

            
            <div class="detail-section">
                <div class="detail-section-title">3. Audit & Testing Procedures (Columns L – S)</div>
                <div class="detail-row">
                    <div class="detail-label">Auditor Validation Method:</div>
                    <div class="detail-value" id="viewValidationMethod" style="line-height: 1.6;"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Test Procedure:</div>
                    <div class="detail-value" id="viewTestProcedure" style="line-height: 1.6;"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Evidence Checklist:</div>
                    <div class="detail-value" id="viewChecklist" style="line-height: 1.6;"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Expected Result:</div>
                    <div class="detail-value" id="viewExpectedResult" style="line-height: 1.6;"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Pass Criteria:</div>
                    <div class="detail-value detail-criteria-pass" id="viewPassCriteria"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Fail Criteria:</div>
                    <div class="detail-value detail-criteria-fail" id="viewFailCriteria"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Test Frequency:</div>
                    <div class="detail-value" id="viewTestFrequency"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Test Method:</div>
                    <div class="detail-value" id="viewTestMethod"></div>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button
                type="button"
                class="btn-aspia btn-secondary-aspia"
                onclick="closeModal('viewModal')"
            >
                Close
            </button>
        </div>

    </div>

</div>




<div
    id="addModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'addModal')"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Add Requirement Evidence Mapping
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
            action="<?php echo e(route('requirement-evidence-mappings.store')); ?>"
            method="POST"
        >
            <?php echo csrf_field(); ?>

            <div class="modal-body">

                
                <div class="form-section-title">1. Requirement Context (Columns A – D)</div>

                <div class="form-grid">

                    <div class="form-group">
                        <label class="form-label">
                            Requirement ID <span class="required-star">*</span>
                        </label>
                        <input
                            type="text"
                            name="requirement_id"
                            class="form-control-aspia"
                            placeholder="e.g. GOV-001-R001"
                            value="<?php echo e(old('requirement_id')); ?>"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Control ID</label>
                        <input
                            type="text"
                            name="control_id"
                            class="form-control-aspia"
                            placeholder="e.g. GOV-001 (auto-resolves if blank)"
                            value="<?php echo e(old('control_id')); ?>"
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">
                            Requirement Title <span class="required-star">*</span>
                        </label>
                        <input
                            type="text"
                            name="requirement_title"
                            class="form-control-aspia"
                            placeholder="e.g. Governance Framework"
                            value="<?php echo e(old('requirement_title')); ?>"
                            required
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Requirement Statement</label>
                        <textarea
                            name="requirement"
                            class="form-control-aspia"
                            placeholder="Detailed requirement statement..."
                        ><?php echo e(old('requirement')); ?></textarea>
                    </div>

                </div>

                
                <div class="form-section-title">2. Evidence Specifications (Columns E – K)</div>

                <div class="form-grid">

                    <div class="form-group">
                        <label class="form-label">Evidence Type</label>
                        <input
                            type="text"
                            name="evidence_type"
                            class="form-control-aspia"
                            placeholder="e.g. Design / Documentation, Operating Evidence"
                            value="<?php echo e(old('evidence_type')); ?>"
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Evidence Owner</label>
                        <input
                            type="text"
                            name="evidence_owner"
                            class="form-control-aspia"
                            placeholder="e.g. CISO / Information Security Governance"
                            value="<?php echo e(old('evidence_owner')); ?>"
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Reference / Link</label>
                        <input
                            type="text"
                            name="evidence_reference_link"
                            class="form-control-aspia"
                            placeholder="Repository path, document link, or record ID"
                            value="<?php echo e(old('evidence_reference_link')); ?>"
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Description</label>
                        <textarea
                            name="evidence_description"
                            class="form-control-aspia"
                            placeholder="Demonstrate implementation and operation..."
                        ><?php echo e(old('evidence_description')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Source / System</label>
                        <input
                            type="text"
                            name="source_system"
                            class="form-control-aspia"
                            placeholder="e.g. GRC platform / policy repository"
                            value="<?php echo e(old('source_system')); ?>"
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Frequency</label>
                        <input
                            type="text"
                            name="frequency"
                            class="form-control-aspia"
                            placeholder="e.g. At least annually and upon material change"
                            value="<?php echo e(old('frequency')); ?>"
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Freshness Criteria</label>
                        <input
                            type="text"
                            name="freshness"
                            class="form-control-aspia"
                            placeholder="e.g. Current approved version; review evidence <= 12 months old"
                            value="<?php echo e(old('freshness')); ?>"
                        >
                    </div>

                </div>

                
                <div class="form-section-title">3. Audit & Testing Procedures (Columns L – S)</div>

                <div class="form-grid">

                    <div class="form-group full-width">
                        <label class="form-label">Auditor Validation Method</label>
                        <textarea
                            name="auditor_validation_method"
                            class="form-control-aspia"
                            placeholder="Verify source authenticity and owner, confirm approved version..."
                        ><?php echo e(old('auditor_validation_method')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Test Procedure</label>
                        <textarea
                            name="test_procedure"
                            class="form-control-aspia"
                            style="min-height: 120px;"
                            placeholder="Step-by-step audit testing procedures..."
                        ><?php echo e(old('test_procedure')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Checklist</label>
                        <textarea
                            name="evidence_checklist"
                            class="form-control-aspia"
                            style="min-height: 120px;"
                            placeholder="• Approved policy document...&#10;• Dated meeting minutes..."
                        ><?php echo e(old('evidence_checklist')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Expected Result</label>
                        <textarea
                            name="expected_result"
                            class="form-control-aspia"
                            placeholder="The control is implemented as documented, operates at required frequency..."
                        ><?php echo e(old('expected_result')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Pass Criteria</label>
                        <textarea
                            name="pass_criteria"
                            class="form-control-aspia"
                            placeholder="Pass when the required control is documented and approved..."
                        ><?php echo e(old('pass_criteria')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Fail Criteria</label>
                        <textarea
                            name="fail_criteria"
                            class="form-control-aspia"
                            placeholder="Fail when required evidence is missing, unapproved, outdated..."
                        ><?php echo e(old('fail_criteria')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Test Frequency</label>
                        <input
                            type="text"
                            name="test_frequency"
                            class="form-control-aspia"
                            placeholder="e.g. At least annually and upon material change"
                            value="<?php echo e(old('test_frequency')); ?>"
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Test Method</label>
                        <input
                            type="text"
                            name="test_method"
                            class="form-control-aspia"
                            placeholder="e.g. Document inspection + sample testing"
                            value="<?php echo e(old('test_method')); ?>"
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
                    Create Mapping
                </button>

            </div>

        </form>

    </div>

</div>




<div
    id="editModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'editModal')"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Edit Requirement Evidence Mapping
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
            id="editMappingForm"
            method="POST"
        >
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="modal-body">

                
                <div class="form-section-title">1. Requirement Context (Columns A – D)</div>

                <div class="form-grid">

                    <div class="form-group">
                        <label class="form-label">
                            Requirement ID <span class="required-star">*</span>
                        </label>
                        <input
                            type="text"
                            id="edit_requirement_id"
                            name="requirement_id"
                            class="form-control-aspia"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Control ID</label>
                        <input
                            type="text"
                            id="edit_control_id"
                            name="control_id"
                            class="form-control-aspia"
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">
                            Requirement Title <span class="required-star">*</span>
                        </label>
                        <input
                            type="text"
                            id="edit_requirement_title"
                            name="requirement_title"
                            class="form-control-aspia"
                            required
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Requirement Statement</label>
                        <textarea
                            id="edit_requirement"
                            name="requirement"
                            class="form-control-aspia"
                        ></textarea>
                    </div>

                </div>

                
                <div class="form-section-title">2. Evidence Specifications (Columns E – K)</div>

                <div class="form-grid">

                    <div class="form-group">
                        <label class="form-label">Evidence Type</label>
                        <input
                            type="text"
                            id="edit_evidence_type"
                            name="evidence_type"
                            class="form-control-aspia"
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Evidence Owner</label>
                        <input
                            type="text"
                            id="edit_evidence_owner"
                            name="evidence_owner"
                            class="form-control-aspia"
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Reference / Link</label>
                        <input
                            type="text"
                            id="edit_evidence_reference_link"
                            name="evidence_reference_link"
                            class="form-control-aspia"
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Description</label>
                        <textarea
                            id="edit_evidence_description"
                            name="evidence_description"
                            class="form-control-aspia"
                        ></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Source / System</label>
                        <input
                            type="text"
                            id="edit_source_system"
                            name="source_system"
                            class="form-control-aspia"
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Frequency</label>
                        <input
                            type="text"
                            id="edit_frequency"
                            name="frequency"
                            class="form-control-aspia"
                        >
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Freshness Criteria</label>
                        <input
                            type="text"
                            id="edit_freshness"
                            name="freshness"
                            class="form-control-aspia"
                        >
                    </div>

                </div>

                
                <div class="form-section-title">3. Audit & Testing Procedures (Columns L – S)</div>

                <div class="form-grid">

                    <div class="form-group full-width">
                        <label class="form-label">Auditor Validation Method</label>
                        <textarea
                            id="edit_auditor_validation_method"
                            name="auditor_validation_method"
                            class="form-control-aspia"
                        ></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Test Procedure</label>
                        <textarea
                            id="edit_test_procedure"
                            name="test_procedure"
                            class="form-control-aspia"
                            style="min-height: 120px;"
                        ></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Checklist</label>
                        <textarea
                            id="edit_evidence_checklist"
                            name="evidence_checklist"
                            class="form-control-aspia"
                            style="min-height: 120px;"
                        ></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Expected Result</label>
                        <textarea
                            id="edit_expected_result"
                            name="expected_result"
                            class="form-control-aspia"
                        ></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Pass Criteria</label>
                        <textarea
                            id="edit_pass_criteria"
                            name="pass_criteria"
                            class="form-control-aspia"
                        ></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Fail Criteria</label>
                        <textarea
                            id="edit_fail_criteria"
                            name="fail_criteria"
                            class="form-control-aspia"
                        ></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Test Frequency</label>
                        <input
                            type="text"
                            id="edit_test_frequency"
                            name="test_frequency"
                            class="form-control-aspia"
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Test Method</label>
                        <input
                            type="text"
                            id="edit_test_method"
                            name="test_method"
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
                    Update Mapping
                </button>

            </div>

        </form>

    </div>

</div>




<div
    id="importModal"
    class="modal-overlay"
    onclick="closeModalOutside(event, 'importModal')"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Import Requirement Evidence Mappings
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
            action="<?php echo e(route('requirement-evidence-mappings.import')); ?>"
            method="POST"
            enctype="multipart/form-data"
            id="importMappingsForm"
            onsubmit="handleImportSubmit(event)"
        >
            <?php echo csrf_field(); ?>

            <div class="modal-body">

                <div class="form-group full-width">

                    <label class="form-label">
                        Select XLSX File
                        <span class="required-star">*</span>
                    </label>

                    <input
                        type="file"
                        name="file"
                        class="form-control-aspia"
                        accept=".xlsx,.xls,.csv"
                        required
                    >

                    <div class="import-info">
                        Only .xlsx, .xls, .csv files are supported.
                    </div>

                </div>

                
                <div id="importLoadingState" style="display: none; margin-top: 15px; padding: 12px 14px; background: rgba(22, 196, 244, 0.08); border: 1px solid rgba(22, 196, 244, 0.25); border-radius: 8px; color: #16C4F4; font-size: 13px;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <svg style="animation: aspiaSpin 1s linear infinite; width: 18px; height: 18px; flex-shrink: 0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                            <path d="M12 2a10 10 0 0 1 10 10"></path>
                        </svg>
                        <span>Importing mappings... Please wait a moment, processing file. Do not refresh.</span>
                    </div>
                </div>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-aspia btn-secondary-aspia"
                    onclick="closeModal('importModal')"
                    id="importCancelBtn"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="btn-aspia btn-primary-aspia"
                    id="importSubmitBtn"
                >
                    Import XLSX
                </button>

            </div>

        </form>

    </div>

</div>


<script>

    /* Store mappings for safe client-side lookup */
    const mappingsData = <?php echo json_encode($mappings->keyBy('id'), 15, 512) ?>;

    /* =========================================================
       MODAL CONTROLLERS
    ========================================================= */

    function openModal(id)
    {
        const modal = document.getElementById(id);

        if (modal) {

            if (id === 'importModal') {
                const submitBtn = document.getElementById('importSubmitBtn');
                const cancelBtn = document.getElementById('importCancelBtn');
                const loadingState = document.getElementById('importLoadingState');
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = '';
                    submitBtn.style.cursor = '';
                    submitBtn.innerHTML = 'Import XLSX';
                }
                if (cancelBtn) {
                    cancelBtn.style.pointerEvents = '';
                    cancelBtn.style.opacity = '';
                }
                if (loadingState) {
                    loadingState.style.display = 'none';
                }
            }

            modal.classList.add('show');
            document.body.style.overflow = 'hidden';

        }
    }

    function closeModal(id)
    {
        const modal = document.getElementById(id);

        if (modal) {

            modal.classList.remove('show');
            document.body.style.overflow = '';

        }
    }

    function closeModalOutside(event, id)
    {
        if (event.target.id === id) {
            closeModal(id);
        }
    }

    /* Escape Key Handler */
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.modal-overlay').forEach(function(modal) {
                modal.classList.remove('show');
            });
            document.body.style.overflow = '';
        }
    });

    /* =========================================================
       VIEW DETAILS MODAL POPULATION
    ========================================================= */

    function viewMappingDetails(target)
    {
        const data = typeof target === 'object' ? target : (mappingsData[target] || null);
        if (!data) return;

        document.getElementById('viewModalTitle').textContent = (data.requirement_id || 'Mapping') + ' — ' + (data.requirement_title || 'Evidence Mapping');
        document.getElementById('viewModalSubtitle').textContent = 'Control: ' + (data.control_id || 'Not assigned') + ' • Owner: ' + (data.evidence_owner || 'Unassigned');

        document.getElementById('viewReqId').textContent = data.requirement_id || '—';
        document.getElementById('viewCtrlId').textContent = data.control_id || '—';
        document.getElementById('viewReqTitle').textContent = data.requirement_title || '—';
        document.getElementById('viewReqStatement').textContent = data.requirement || '—';

        document.getElementById('viewEvidenceType').textContent = data.evidence_type || '—';
        document.getElementById('viewEvidenceOwner').textContent = data.evidence_owner || '—';
        document.getElementById('viewEvidenceLink').textContent = data.evidence_reference_link || '—';
        document.getElementById('viewEvidenceDesc').textContent = data.evidence_description || '—';
        document.getElementById('viewSourceSystem').textContent = data.source_system || '—';
        document.getElementById('viewFrequency').textContent = data.frequency || '—';
        document.getElementById('viewFreshness').textContent = data.freshness || '—';

        document.getElementById('viewValidationMethod').textContent = data.auditor_validation_method || '—';
        document.getElementById('viewTestProcedure').textContent = data.test_procedure || '—';
        document.getElementById('viewChecklist').textContent = data.evidence_checklist || '—';
        document.getElementById('viewExpectedResult').textContent = data.expected_result || '—';
        document.getElementById('viewPassCriteria').textContent = data.pass_criteria || '—';
        document.getElementById('viewFailCriteria').textContent = data.fail_criteria || '—';
        document.getElementById('viewTestFrequency').textContent = data.test_frequency || '—';
        document.getElementById('viewTestMethod').textContent = data.test_method || '—';

        openModal('viewModal');
    }

    /* =========================================================
       EDIT MODAL POPULATION
    ========================================================= */

    function openEditModal(target)
    {
        const data = typeof target === 'object' ? target : (mappingsData[target] || null);
        if (!data) return;

        document.getElementById('editMappingForm').action = '/requirement-evidence-mappings/' + data.id;

        document.getElementById('edit_requirement_id').value = data.requirement_id || '';
        document.getElementById('edit_control_id').value = data.control_id || '';
        document.getElementById('edit_requirement_title').value = data.requirement_title || '';
        document.getElementById('edit_requirement').value = data.requirement || '';

        document.getElementById('edit_evidence_type').value = data.evidence_type || '';
        document.getElementById('edit_evidence_owner').value = data.evidence_owner || '';
        document.getElementById('edit_evidence_reference_link').value = data.evidence_reference_link || '';
        document.getElementById('edit_evidence_description').value = data.evidence_description || '';
        document.getElementById('edit_source_system').value = data.source_system || '';
        document.getElementById('edit_frequency').value = data.frequency || '';
        document.getElementById('edit_freshness').value = data.freshness || '';

        document.getElementById('edit_auditor_validation_method').value = data.auditor_validation_method || '';
        document.getElementById('edit_test_procedure').value = data.test_procedure || '';
        document.getElementById('edit_evidence_checklist').value = data.evidence_checklist || '';
        document.getElementById('edit_expected_result').value = data.expected_result || '';
        document.getElementById('edit_pass_criteria').value = data.pass_criteria || '';
        document.getElementById('edit_fail_criteria').value = data.fail_criteria || '';
        document.getElementById('edit_test_frequency').value = data.test_frequency || '';
        document.getElementById('edit_test_method').value = data.test_method || '';

        openModal('editModal');
    }

    /* =========================================================
       HANDLE IMPORT SUBMIT
    ========================================================= */

    function handleImportSubmit(event)
    {
        const submitBtn = document.getElementById('importSubmitBtn');
        const cancelBtn = document.getElementById('importCancelBtn');
        const loadingState = document.getElementById('importLoadingState');

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.75';
            submitBtn.style.cursor = 'not-allowed';
            submitBtn.innerHTML = `
                <svg style="animation: aspiaSpin 1s linear infinite; width: 14px; height: 14px; display: inline-block; vertical-align: middle; margin-right: 6px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                    <path d="M12 2a10 10 0 0 1 10 10"></path>
                </svg>
                Importing...
            `;
        }

        if (cancelBtn) {
            cancelBtn.style.pointerEvents = 'none';
            cancelBtn.style.opacity = '0.5';
        }

        if (loadingState) {
            loadingState.style.display = 'block';
        }

        return true;
    }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.aspiaUcl', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\AspiaUCL\resources\views/aspiaUcl/requirement_evidence_mappings/index.blade.php ENDPATH**/ ?>