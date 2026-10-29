<?php $__env->startSection('title', ' | Requirement Evidence Mapping'); ?>

<?php $__env->startSection('page-title', 'Requirement Evidence Mapping'); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* =========================================================
       PAGE LAYOUT & HEADERS
    ========================================================= */
    .mapping-page {
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
       STATS CARDS ROW
    ========================================================= */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card-ucl {
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-card-ucl .stat-info h3 {
        margin: 0 0 6px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: #8f9db5;
    }

    .stat-card-ucl .stat-info .stat-val {
        font-size: 26px;
        font-weight: 600;
        color: #ffffff;
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
       PANEL & TABLE
    ========================================================= */
    .mapping-panel {
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

    .search-form {
        display: flex;
        gap: 8px;
    }

    .search-input {
        width: 320px;
        background: #0D1735;
        border: 1px solid #27496b;
        color: #ffffff;
        border-radius: 8px;
        padding: 10px 13px;
        outline: none;
        font-size: 13px;
    }

    .search-input:focus {
        border-color: #16C4F4;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .mapping-table {
        width: 100%;
        min-width: 1100px;
        border-collapse: collapse;
    }

    .mapping-table th {
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

    .mapping-table td {
        padding: 15px 16px;
        border-top: 1px solid rgba(255,255,255,.06);
        color: #b9c5d8;
        font-size: 13px;
        vertical-align: middle;
    }

    .mapping-table tr:hover td {
        background: rgba(22,196,244,.025);
    }

    .code-pill {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 11.5px;
        font-weight: 600;
        font-family: var(--aspia-infotech-font-mono, monospace);
    }

    .code-pill-req {
        background: rgba(22, 196, 244, 0.12);
        color: #16C4F4;
        border: 1px solid rgba(22, 196, 244, 0.25);
    }

    .code-pill-ctrl {
        background: rgba(255, 255, 255, 0.06);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.12);
    }

    .badge-tag {
        display: inline-block;
        background: rgba(22, 196, 244, 0.08);
        color: #b3e7f8;
        border: 1px solid rgba(22, 196, 244, 0.18);
        border-radius: 4px;
        padding: 3px 7px;
        font-size: 11px;
        margin: 2px;
        line-height: 1.3;
    }

    .actions {
        display: flex;
        gap: 6px;
        white-space: nowrap;
    }

    .action-btn {
        border-radius: 6px;
        padding: 6px 10px;
        font-size: 12px;
        cursor: pointer;
        border: 1px solid #27496b;
        background: #172540;
        color: #aebbd0;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: .2s;
    }

    .action-btn:hover {
        color: #ffffff;
        border-color: #16C4F4;
    }

    .action-btn-danger:hover {
        border-color: #ef4444;
        color: #ff8585;
    }

    /* =========================================================
       MODALS
    ========================================================= */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.75);
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
        max-width: 900px;
        max-height: 90vh;
        overflow-y: auto;
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 14px;
        box-shadow: 0 20px 60px rgba(0,0,0,.6);
    }

    .modal-header {
        padding: 18px 24px;
        border-bottom: 1px solid rgba(255,255,255,.08);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        background: #162544;
        z-index: 5;
    }

    .modal-header h2 {
        margin: 0;
        color: #ffffff;
        font-size: 18px;
        font-weight: 500;
    }

    .close-modal {
        background: none;
        border: none;
        color: #8291aa;
        font-size: 26px;
        cursor: pointer;
        line-height: 1;
    }

    .close-modal:hover {
        color: #ffffff;
    }

    .modal-body {
        padding: 24px;
    }

    .modal-footer {
        padding: 16px 24px;
        border-top: 1px solid rgba(255,255,255,.08);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        position: sticky;
        bottom: 0;
        background: #162544;
        z-index: 5;
    }

    /* Modal Form Sections */
    .form-section-title {
        color: #16C4F4;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin: 22px 0 14px;
        padding-bottom: 6px;
        border-bottom: 1px solid rgba(22, 196, 244, 0.2);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-section-title:first-child {
        margin-top: 0;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-label {
        display: block;
        color: #b9c5d8;
        font-size: 12.5px;
        font-weight: 500;
        margin-bottom: 6px;
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
        padding: 10px 13px;
        color: #ffffff;
        outline: none;
        font-size: 13.5px;
    }

    .form-control-aspia:focus {
        border-color: #16C4F4;
        box-shadow: 0 0 0 2px rgba(22,196,244,.1);
    }

    textarea.form-control-aspia {
        min-height: 90px;
        resize: vertical;
        font-family: inherit;
        line-height: 1.5;
    }

    .full-width {
        grid-column: 1 / -1;
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
        padding-left: 10px;
        background: rgba(34, 197, 94, 0.05);
        padding: 8px 10px;
        border-radius: 4px;
    }

    .detail-criteria-fail {
        border-left: 3px solid #ef4444;
        padding-left: 10px;
        background: rgba(239, 68, 68, 0.05);
        padding: 8px 10px;
        border-radius: 4px;
    }

    /* Custom pagination */
    .pagination-area {
        padding: 18px 20px;
        border-top: 1px solid rgba(255,255,255,.06);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
    }

    .pagination-summary {
        color: #71829f;
        font-size: 13px;
    }

    @keyframes aspiaSpin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="mapping-page">

    
    <?php if(session('success')): ?>
        <div class="alert-success">
            ✓ <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert-error">
            ⚠ <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert-error">
            <strong>Please resolve the following:</strong>
            <ul style="margin: 8px 0 0 18px;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($err); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <div class="page-header">
        <div>
            <h1>Requirement Evidence Mapping</h1>
            <p>Define and manage verification evidence, test procedures, and auditor validation methods for compliance requirements.</p>
        </div>

        <div class="header-actions">
            
            <button
                type="button"
                class="btn-aspia btn-secondary-aspia"
                onclick="openModal('importModal')"
            >
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="17 8 12 3 7 8"/>
                    <line x1="12" y1="3" x2="12" y2="15"/>
                </svg>
                Import Excel
            </button>

            
            <button
                type="button"
                class="btn-aspia btn-primary-aspia"
                onclick="openModal('addModal')"
            >
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Add Mapping
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
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
        </div>
    </div>

    
    <div class="mapping-panel">
        <div class="panel-header">
            <h2>Evidence Mapping Records (<?php echo e($mappings->total()); ?>)</h2>

            
            <form action="<?php echo e(route('requirement-evidence-mappings.index')); ?>" method="GET" class="search-form">
                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search ID, title, owner, system..."
                    value="<?php echo e($search); ?>"
                >
                <button type="submit" class="btn-aspia btn-secondary-aspia">
                    Search
                </button>
                <?php if($search !== ''): ?>
                    <a href="<?php echo e(route('requirement-evidence-mappings.index')); ?>" class="btn-aspia btn-secondary-aspia" style="padding: 10px 14px;" title="Clear Search">
                        ✕
                    </a>
                <?php endif; ?>
            </form>
        </div>

        <div class="table-wrapper">
            <table class="mapping-table">
                <thead>
                    <tr>
                        <th style="width: 130px;">Req ID</th>
                        <th style="width: 100px;">Control ID</th>
                        <th>Requirement Title</th>
                        <th>Evidence Type</th>
                        <th>Evidence Owner</th>
                        <th>Source / System</th>
                        <th>Frequency</th>
                        <th style="text-align: right; width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $mappings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <span class="code-pill code-pill-req"><?php echo e($item->requirement_id); ?></span>
                            </td>
                            <td>
                                <span class="code-pill code-pill-ctrl"><?php echo e($item->control_id ?: '—'); ?></span>
                            </td>
                            <td>
                                <a
                                    href="javascript:void(0)"
                                    onclick="viewMappingDetails(<?php echo e(json_encode($item)); ?>)"
                                    style="color: #16C4F4; text-decoration: none; font-weight: 500;"
                                    title="Click to view full details"
                                >
                                    <?php echo e($item->requirement_title ?: 'Untitled'); ?>

                                </a>
                            </td>
                            <td>
                                <?php if($item->evidence_type): ?>
                                    <?php
                                        $types = explode(',', $item->evidence_type);
                                    ?>
                                    <?php $__currentLoopData = array_slice($types, 0, 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge-tag"><?php echo e(trim($t)); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(count($types) > 2): ?>
                                        <span class="badge-tag">+<?php echo e(count($types) - 2); ?></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span style="color: #63728c;">—</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span style="color: #ffffff;"><?php echo e($item->evidence_owner ?: '—'); ?></span>
                            </td>
                            <td>
                                <span style="color: #8f9db5;"><?php echo e($item->source_system ?: '—'); ?></span>
                            </td>
                            <td>
                                <span style="font-size: 12px; color: #aebbd0;"><?php echo e($item->frequency ?: '—'); ?></span>
                            </td>
                            <td style="text-align: right;">
                                <div class="actions" style="justify-content: flex-end;">
                                    <button
                                        type="button"
                                        class="action-btn"
                                        onclick="viewMappingDetails(<?php echo e(json_encode($item)); ?>)"
                                        title="View Details"
                                    >
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                        View
                                    </button>
                                    <button
                                        type="button"
                                        class="action-btn"
                                        onclick="openEditModal(<?php echo e(json_encode($item)); ?>)"
                                        title="Edit Record"
                                    >
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                        </svg>
                                        Edit
                                    </button>
                                    <button
                                        type="button"
                                        class="action-btn action-btn-danger"
                                        onclick="openDeleteModal(<?php echo e($item->id); ?>, '<?php echo e(addslashes($item->requirement_id)); ?>')"
                                        title="Delete Record"
                                    >
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 6h18"/>
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 45px 20px; color: #71829f;">
                                <div style="font-size: 32px; color: #16C4F4; margin-bottom: 8px;">📋</div>
                                <div style="font-size: 15px; color: #ffffff; margin-bottom: 4px;">No Evidence Mappings Found</div>
                                <div style="font-size: 13px;">
                                    <?php if($search !== ''): ?>
                                        No records match "<?php echo e($search); ?>". <a href="<?php echo e(route('requirement-evidence-mappings.index')); ?>" style="color: #16C4F4;">Clear search filter</a>.
                                    <?php else: ?>
                                        Import an Excel file using the <strong>Import Excel</strong> button or click <strong>Add Mapping</strong> to get started.
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($mappings->hasPages()): ?>
            <div class="pagination-area">
                <div class="pagination-summary">
                    Showing <?php echo e($mappings->firstItem()); ?> to <?php echo e($mappings->lastItem()); ?> of <?php echo e($mappings->total()); ?> records
                </div>
                <div>
                    <?php echo e($mappings->links()); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>

    
    <?php if(isset($activities) && count($activities) > 0): ?>
        <div class="mapping-panel" style="padding: 20px 22px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h3 style="margin: 0; font-size: 15px; font-weight: 500; color: #ffffff;">Recent Activity</h3>
                <span style="font-size: 11px; background: rgba(22,196,244,.1); color: #16C4F4; padding: 4px 8px; border-radius: 20px;">LIVE</span>
            </div>
            <div>
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.05); font-size: 13px;">
                        <div>
                            <span style="color: #16C4F4; font-weight: 600; margin-right: 6px;">[<?php echo e($act->action); ?>]</span>
                            <span style="color: #b9c5d8;"><?php echo e($act->description); ?></span>
                        </div>
                        <span style="color: #63728c; font-size: 12px; white-space: nowrap; margin-left: 12px;">
                            <?php echo e($act->created_at->diffForHumans()); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

</div>


<div class="modal-overlay" id="viewModal">
    <div class="modal-box" style="max-width: 960px;">
        <div class="modal-header">
            <div>
                <h2 id="viewModalTitle">Evidence Mapping Details</h2>
                <div style="font-size: 12px; color: #8f9db5; margin-top: 2px;" id="viewModalSubtitle"></div>
            </div>
            <button type="button" class="close-modal" onclick="closeModal('viewModal')">&times;</button>
        </div>

        <div class="modal-body">
            
            <div class="detail-section">
                <div class="detail-section-title">1. Requirement Information (Cols A – D)</div>
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
                    <div class="detail-value" id="viewReqTitle" style="font-weight: 600; color: #16C4F4;"></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Requirement Statement:</div>
                    <div class="detail-value" id="viewReqStatement" style="line-height: 1.6;"></div>
                </div>
            </div>

            
            <div class="detail-section">
                <div class="detail-section-title">2. Evidence Specifications (Cols E – K)</div>
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
                <div class="detail-section-title">3. Audit & Testing Procedures (Cols L – S)</div>
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
            <button type="button" class="btn-aspia btn-secondary-aspia" onclick="closeModal('viewModal')">
                Close
            </button>
        </div>
    </div>
</div>


<div class="modal-overlay" id="addModal">
    <div class="modal-box">
        <div class="modal-header">
            <h2>Add Requirement Evidence Mapping</h2>
            <button type="button" class="close-modal" onclick="closeModal('addModal')">&times;</button>
        </div>

        <form action="<?php echo e(route('requirement-evidence-mappings.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="modal-body">
                
                <div class="form-section-title">1. Requirement Context (Columns A – D)</div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Requirement ID <span class="required-star">*</span></label>
                        <input type="text" name="requirement_id" class="form-control-aspia" placeholder="e.g. GOV-001-R001" required value="<?php echo e(old('requirement_id')); ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Control ID</label>
                        <input type="text" name="control_id" class="form-control-aspia" placeholder="e.g. GOV-001 (auto-resolves if blank)" value="<?php echo e(old('control_id')); ?>">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Requirement Title <span class="required-star">*</span></label>
                        <input type="text" name="requirement_title" class="form-control-aspia" placeholder="e.g. Governance Framework" required value="<?php echo e(old('requirement_title')); ?>">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Requirement Statement</label>
                        <textarea name="requirement" class="form-control-aspia" placeholder="Detailed requirement statement..."><?php echo e(old('requirement')); ?></textarea>
                    </div>
                </div>

                
                <div class="form-section-title">2. Evidence Specifications (Columns E – K)</div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Evidence Type</label>
                        <input type="text" name="evidence_type" class="form-control-aspia" placeholder="e.g. Design / Documentation, Operating Evidence" value="<?php echo e(old('evidence_type')); ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Evidence Owner</label>
                        <input type="text" name="evidence_owner" class="form-control-aspia" placeholder="e.g. CISO / Information Security Governance" value="<?php echo e(old('evidence_owner')); ?>">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Reference / Link</label>
                        <input type="text" name="evidence_reference_link" class="form-control-aspia" placeholder="Repository path + document/version or record ID" value="<?php echo e(old('evidence_reference_link')); ?>">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Description</label>
                        <textarea name="evidence_description" class="form-control-aspia" placeholder="Demonstrate implementation and operation..."><?php echo e(old('evidence_description')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Source / System</label>
                        <input type="text" name="source_system" class="form-control-aspia" placeholder="e.g. GRC platform / policy repository" value="<?php echo e(old('source_system')); ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Frequency</label>
                        <input type="text" name="frequency" class="form-control-aspia" placeholder="e.g. At least annually and upon material change" value="<?php echo e(old('frequency')); ?>">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Freshness</label>
                        <input type="text" name="freshness" class="form-control-aspia" placeholder="e.g. Current approved version; review evidence normally <= 12 months old" value="<?php echo e(old('freshness')); ?>">
                    </div>
                </div>

                
                <div class="form-section-title">3. Audit & Testing Procedures (Columns L – S)</div>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label class="form-label">Auditor Validation Method</label>
                        <textarea name="auditor_validation_method" class="form-control-aspia" placeholder="Verify source authenticity and owner, confirm approved version..."><?php echo e(old('auditor_validation_method')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Test Procedure</label>
                        <textarea name="test_procedure" class="form-control-aspia" style="min-height: 120px;" placeholder="Step-by-step audit testing procedures..."><?php echo e(old('test_procedure')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Checklist</label>
                        <textarea name="evidence_checklist" class="form-control-aspia" style="min-height: 120px;" placeholder="• Approved governance framework...&#10;• Dated minutes or decision logs..."><?php echo e(old('evidence_checklist')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Expected Result</label>
                        <textarea name="expected_result" class="form-control-aspia" placeholder="The control is implemented as documented, operates at required frequency..."><?php echo e(old('expected_result')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Pass Criteria</label>
                        <textarea name="pass_criteria" class="form-control-aspia" placeholder="Pass when the required control is documented and approved..."><?php echo e(old('pass_criteria')); ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Fail Criteria</label>
                        <textarea name="fail_criteria" class="form-control-aspia" placeholder="Fail when required evidence is missing, unapproved, outdated..."><?php echo e(old('fail_criteria')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Test Frequency</label>
                        <input type="text" name="test_frequency" class="form-control-aspia" placeholder="e.g. At least annually and upon material change" value="<?php echo e(old('test_frequency')); ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Test Method</label>
                        <input type="text" name="test_method" class="form-control-aspia" placeholder="e.g. Document inspection + sample operating evidence" value="<?php echo e(old('test_method')); ?>">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-aspia btn-secondary-aspia" onclick="closeModal('addModal')">Cancel</button>
                <button type="submit" class="btn-aspia btn-primary-aspia">Create Mapping</button>
            </div>
        </form>
    </div>
</div>


<div class="modal-overlay" id="editModal">
    <div class="modal-box">
        <div class="modal-header">
            <h2>Edit Requirement Evidence Mapping</h2>
            <button type="button" class="close-modal" onclick="closeModal('editModal')">&times;</button>
        </div>

        <form id="editMappingForm" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="modal-body">
                
                <div class="form-section-title">1. Requirement Context (Columns A – D)</div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Requirement ID <span class="required-star">*</span></label>
                        <input type="text" id="edit_requirement_id" name="requirement_id" class="form-control-aspia" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Control ID</label>
                        <input type="text" id="edit_control_id" name="control_id" class="form-control-aspia">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Requirement Title <span class="required-star">*</span></label>
                        <input type="text" id="edit_requirement_title" name="requirement_title" class="form-control-aspia" required>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Requirement Statement</label>
                        <textarea id="edit_requirement" name="requirement" class="form-control-aspia"></textarea>
                    </div>
                </div>

                
                <div class="form-section-title">2. Evidence Specifications (Columns E – K)</div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Evidence Type</label>
                        <input type="text" id="edit_evidence_type" name="evidence_type" class="form-control-aspia">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Evidence Owner</label>
                        <input type="text" id="edit_evidence_owner" name="evidence_owner" class="form-control-aspia">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Reference / Link</label>
                        <input type="text" id="edit_evidence_reference_link" name="evidence_reference_link" class="form-control-aspia">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Description</label>
                        <textarea id="edit_evidence_description" name="evidence_description" class="form-control-aspia"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Source / System</label>
                        <input type="text" id="edit_source_system" name="source_system" class="form-control-aspia">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Frequency</label>
                        <input type="text" id="edit_frequency" name="frequency" class="form-control-aspia">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Freshness</label>
                        <input type="text" id="edit_freshness" name="freshness" class="form-control-aspia">
                    </div>
                </div>

                
                <div class="form-section-title">3. Audit & Testing Procedures (Columns L – S)</div>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label class="form-label">Auditor Validation Method</label>
                        <textarea id="edit_auditor_validation_method" name="auditor_validation_method" class="form-control-aspia"></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Test Procedure</label>
                        <textarea id="edit_test_procedure" name="test_procedure" class="form-control-aspia" style="min-height: 120px;"></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Evidence Checklist</label>
                        <textarea id="edit_evidence_checklist" name="evidence_checklist" class="form-control-aspia" style="min-height: 120px;"></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Expected Result</label>
                        <textarea id="edit_expected_result" name="expected_result" class="form-control-aspia"></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Pass Criteria</label>
                        <textarea id="edit_pass_criteria" name="pass_criteria" class="form-control-aspia"></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Fail Criteria</label>
                        <textarea id="edit_fail_criteria" name="fail_criteria" class="form-control-aspia"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Test Frequency</label>
                        <input type="text" id="edit_test_frequency" name="test_frequency" class="form-control-aspia">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Test Method</label>
                        <input type="text" id="edit_test_method" name="test_method" class="form-control-aspia">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-aspia btn-secondary-aspia" onclick="closeModal('editModal')">Cancel</button>
                <button type="submit" class="btn-aspia btn-primary-aspia">Update Mapping</button>
            </div>
        </form>
    </div>
</div>


<div class="modal-overlay" id="importModal">
    <div class="modal-box" style="max-width: 650px;">
        <div class="modal-header">
            <h2>Import Requirement Evidence Mappings</h2>
            <button type="button" class="close-modal" onclick="closeModal('importModal')">&times;</button>
        </div>

        <form action="<?php echo e(route('requirement-evidence-mappings.import')); ?>" method="POST" enctype="multipart/form-data" onsubmit="return handleImportSubmit()">
            <?php echo csrf_field(); ?>

            <div class="modal-body">
                <p style="color: #8f9db5; font-size: 13.5px; margin-top: 0; line-height: 1.5;">
                    Upload an Excel spreadsheet (<code style="color: #16C4F4;">.xlsx</code>, <code style="color: #16C4F4;">.xls</code>) or <code style="color: #16C4F4;">.csv</code> file containing requirement evidence mapping records.
                </p>

                <div style="background: #0D1735; border: 2px dashed #27496b; border-radius: 10px; padding: 25px 20px; text-align: center; margin: 18px 0;">
                    <div style="font-size: 34px; color: #16C4F4; margin-bottom: 8px;">📊</div>
                    <label style="display: block; font-size: 13px; color: #ffffff; margin-bottom: 10px; font-weight: 500;">
                        Choose Spreadsheet File
                    </label>
                    <input
                        type="file"
                        name="file"
                        accept=".xlsx,.xls,.csv"
                        required
                        style="color: #8f9db5; font-size: 13px;"
                    >
                </div>

                <div style="background: rgba(22, 196, 244, 0.05); border: 1px solid rgba(22, 196, 244, 0.2); border-radius: 8px; padding: 14px 16px; font-size: 12px; color: #aebbd0; line-height: 1.6;">
                    <strong style="color: #16C4F4; display: block; margin-bottom: 6px;">Supported Columns (Columns A – S):</strong>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4px 12px; font-family: monospace; font-size: 11.5px;">
                        <span>• Requirement ID (Col A)</span>
                        <span>• Freshness (Col K)</span>
                        <span>• Control ID (Col B)</span>
                        <span>• Auditor Validation Method (Col L)</span>
                        <span>• Requirement Title (Col C)</span>
                        <span>• Test Procedure (Col M)</span>
                        <span>• Requirement Statement (Col D)</span>
                        <span>• Evidence Checklist (Col N)</span>
                        <span>• Evidence Type (Col E)</span>
                        <span>• Expected Result (Col O)</span>
                        <span>• Evidence Owner (Col F)</span>
                        <span>• Pass Criteria (Col P)</span>
                        <span>• Evidence Reference / Link (Col G)</span>
                        <span>• Fail Criteria (Col Q)</span>
                        <span>• Evidence Description (Col H)</span>
                        <span>• Test Frequency (Col R)</span>
                        <span>• Source/System (Col I)</span>
                        <span>• Test Method (Col S)</span>
                        <span>• Frequency (Col J)</span>
                    </div>
                </div>

                <div id="importLoadingState" style="display: none; margin-top: 18px; text-align: center; color: #16C4F4; font-size: 13px;">
                    <svg style="animation: aspiaSpin 1s linear infinite; width: 18px; height: 18px; display: inline-block; vertical-align: middle; margin-right: 8px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                        <path d="M12 2a10 10 0 0 1 10 10"></path>
                    </svg>
                    Processing spreadsheet import, please wait...
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="importCancelBtn" class="btn-aspia btn-secondary-aspia" onclick="closeModal('importModal')">Cancel</button>
                <button type="submit" id="importSubmitBtn" class="btn-aspia btn-primary-aspia">Import Spreadsheet</button>
            </div>
        </form>
    </div>
</div>


<div class="modal-overlay" id="deleteModal">
    <div class="modal-box" style="max-width: 480px;">
        <div class="modal-header">
            <h2>Confirm Deletion</h2>
            <button type="button" class="close-modal" onclick="closeModal('deleteModal')">&times;</button>
        </div>

        <form id="deleteMappingForm" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>

            <div class="modal-body" style="text-align: center; padding: 28px 20px;">
                <div style="width: 52px; height: 52px; border-radius: 50%; background: rgba(239, 68, 68, 0.12); color: #ef4444; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; font-size: 24px;">
                    ⚠
                </div>
                <h3 style="margin: 0 0 8px; color: #ffffff; font-size: 17px; font-weight: 500;">Delete this evidence mapping?</h3>
                <p style="margin: 0; color: #8f9db5; font-size: 13.5px; line-height: 1.5;">
                    Are you sure you want to delete the mapping for <strong id="deleteReqId" style="color: #ffffff;"></strong>? This action cannot be undone.
                </p>
            </div>

            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn-aspia btn-secondary-aspia" onclick="closeModal('deleteModal')">Cancel</button>
                <button type="submit" class="btn-aspia btn-danger-aspia">Delete Mapping</button>
            </div>
        </form>
    </div>
</div>

<script>
    /* =========================================================
       MODAL CONTROLLERS
    ========================================================= */
    function openModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.remove('show');
            document.body.style.overflow = '';
        }
    }

    /* Escape Key Handler */
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.show').forEach(m => m.classList.remove('show'));
            document.body.style.overflow = '';
        }
    });

    /* Click outside modal box to close */
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    });

    /* =========================================================
       VIEW DETAILS MODAL POPULATION
    ========================================================= */
    function viewMappingDetails(data) {
        document.getElementById('viewModalTitle').textContent = data.requirement_id + ' — ' + (data.requirement_title || 'Evidence Mapping');
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
    function openEditModal(data) {
        document.getElementById('editMappingForm').action = `/requirement-evidence-mappings/${data.id}`;

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
       DELETE MODAL
    ========================================================= */
    function openDeleteModal(id, reqId) {
        document.getElementById('deleteMappingForm').action = `/requirement-evidence-mappings/${id}`;
        document.getElementById('deleteReqId').textContent = reqId;
        openModal('deleteModal');
    }

    /* =========================================================
       IMPORT LOADING STATE
    ========================================================= */
    function handleImportSubmit() {
        const submitBtn = document.getElementById('importSubmitBtn');
        const cancelBtn = document.getElementById('importCancelBtn');
        const loading = document.getElementById('importLoadingState');

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';
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
        if (loading) {
            loading.style.display = 'block';
        }
        return true;
    }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.aspiaUcl', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\AspiaUCL\resources\views/aspiaUcl/requirement_evidence_mappings/index.blade.php ENDPATH**/ ?>