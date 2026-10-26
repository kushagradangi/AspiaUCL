<?php $__env->startSection('title', ' | ' . $client->name . ' - API Management Console'); ?>

<?php $__env->startSection('page-title', 'Client Console: ' . $client->name); ?>

<?php $__env->startSection('content'); ?>

<style>
    .client-console {
        width: 100%;
    }

    .console-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .client-meta-title h1 {
        margin: 0 0 6px;
        font-size: 26px;
        font-weight: 600;
        color: #ffffff;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .client-meta-title p {
        margin: 0;
        color: #8fa2be;
        font-size: 14px;
        max-width: 650px;
    }

    .header-btns {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    /* Secret Token Reveal Box */
    .token-secret-box {
        background: linear-gradient(135deg, rgba(22, 196, 244, 0.15) 0%, rgba(13, 23, 53, 0.9) 100%);
        border: 2px solid #16C4F4;
        border-radius: 14px;
        padding: 24px;
        margin-bottom: 28px;
        box-shadow: 0 8px 30px rgba(22, 196, 244, 0.2);
        animation: pulseBorder 3s infinite alternate;
    }

    @keyframes pulseBorder {
        0% { box-shadow: 0 4px 18px rgba(22, 196, 244, 0.2); }
        100% { box-shadow: 0 8px 32px rgba(22, 196, 244, 0.4); }
    }

    .secret-box-header {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #16C4F4;
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .secret-box-warning {
        font-size: 13.5px;
        color: #e2e8f0;
        margin-bottom: 16px;
        line-height: 1.5;
    }

    .token-display-row {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #0D1735;
        border: 1px solid #1c4266;
        border-radius: 10px;
        padding: 8px 12px;
    }

    .token-display-row code {
        flex: 1;
        font-family: var(--aspia-infotech-font-mono, monospace);
        font-size: 14px;
        color: #6ee7a0;
        word-break: break-all;
        user-select: all;
    }

    .copy-btn {
        background: #16C4F4;
        color: #0D1735;
        border: none;
        padding: 8px 16px;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        transition: all 0.2s;
    }

    .copy-btn:hover {
        background: #0ea8d3;
    }

    /* Detail Grid */
    .overview-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 22px;
        margin-bottom: 25px;
    }

    @media (max-width: 900px) {
        .overview-grid {
            grid-template-columns: 1fr;
        }
    }

    .panel {
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 25px;
    }

    .panel-header {
        padding: 18px 22px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .panel-header h2 {
        margin: 0;
        font-size: 17px;
        font-weight: 600;
        color: #ffffff;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .panel-body {
        padding: 22px;
    }

    .info-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        font-size: 13.5px;
    }

    .info-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .info-label {
        color: #8fa2be;
    }

    .info-value {
        color: #ffffff;
        font-weight: 500;
        text-align: right;
    }

    /* Tables */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13.5px;
        text-align: left;
    }

    .custom-table th {
        background: rgba(13, 23, 53, 0.6);
        padding: 11px 12px;
        color: #8fa2be;
        font-weight: 600;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        white-space: nowrap;
    }

    .custom-table td {
        padding: 10px 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        color: #cbd5e1;
        vertical-align: middle;
        font-size: 12.5px;
    }

    .custom-table tbody tr:hover {
        background: rgba(22, 196, 244, 0.03);
    }

    /* Badges */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 9px;
        border-radius: 6px;
        font-size: 11.5px;
        font-weight: 500;
        white-space: nowrap;
    }

    .badge-success {
        background: rgba(34, 197, 94, 0.14);
        color: #4ade80;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }

    .badge-danger {
        background: rgba(239, 68, 68, 0.14);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .badge-module {
        background: rgba(22, 196, 244, 0.1);
        color: #16C4F4;
        border: 1px solid rgba(22, 196, 244, 0.25);
        margin: 2px;
    }

    .badge-scope-global {
        background: rgba(99, 102, 241, 0.15);
        color: #a5b4fc;
        border: 1px solid rgba(99, 102, 241, 0.3);
    }

    .badge-scope-token {
        background: rgba(234, 179, 8, 0.15);
        color: #fde047;
        border: 1px solid rgba(234, 179, 8, 0.3);
    }

    .code-tag {
        font-family: var(--aspia-infotech-font-mono, monospace);
        background: #0D1735;
        border: 1px solid #1c4266;
        padding: 2px 7px;
        border-radius: 5px;
        color: #e2e8f0;
        font-size: 12.5px;
    }

    /* Buttons */
    .btn-secondary {
        background: transparent;
        color: #cbd5e1;
        border: 1px solid #1c4266;
        padding: 8px 15px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: #8fa2be;
        color: #ffffff;
    }

    .btn-sm-primary {
        background: #16C4F4;
        color: #0D1735;
        border: none;
        padding: 8px 15px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }

    .btn-sm-primary:hover {
        background: #0ea8d3;
    }

    .btn-icon-danger {
        background: rgba(239, 68, 68, 0.1);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.25);
        padding: 5px 9px;
        border-radius: 6px;
        font-size: 12px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.2s;
    }

    .btn-icon-danger:hover {
        background: rgba(239, 68, 68, 0.25);
    }

    .btn-icon-toggle {
        background: rgba(255, 255, 255, 0.06);
        color: #cbd5e1;
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 5px 9px;
        border-radius: 6px;
        font-size: 12px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.2s;
    }

    .btn-icon-toggle:hover {
        background: rgba(255, 255, 255, 0.12);
        color: #ffffff;
    }

    /* Modal Styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(13, 23, 53, 0.8);
        backdrop-filter: blur(4px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        padding: 20px;
    }

    .modal-overlay.show {
        display: flex;
    }

    .modal-card {
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 14px;
        width: 100%;
        max-width: 550px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        overflow: hidden;
    }

    .modal-header {
        padding: 18px 22px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h3 {
        margin: 0;
        font-size: 17px;
        font-weight: 600;
        color: #ffffff;
    }

    .modal-close {
        background: transparent;
        border: none;
        color: #8fa2be;
        font-size: 18px;
        cursor: pointer;
        padding: 2px 6px;
    }

    .modal-body {
        padding: 22px;
    }

    .modal-footer {
        padding: 16px 22px;
        background: rgba(13, 23, 53, 0.6);
        border-top: 1px solid rgba(255, 255, 255, 0.07);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-label {
        display: block;
        margin-bottom: 6px;
        font-size: 13px;
        font-weight: 500;
        color: #e2e8f0;
    }

    .form-input, .form-select {
        width: 100%;
        background: #0D1735;
        border: 1px solid #1c4266;
        border-radius: 8px;
        padding: 9px 12px;
        color: #ffffff;
        font-size: 13.5px;
        outline: none;
    }

    .form-input:focus, .form-select:focus {
        border-color: #16C4F4;
    }
</style>

<div class="client-console">

    <div style="margin-bottom: 18px;">
        <a href="<?php echo e(route('api-clients.index')); ?>" style="color:#16C4F4; text-decoration:none; font-size:13.5px; display:inline-flex; align-items:center; gap:6px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"/>
                <polyline points="12 19 5 12 12 5"/>
            </svg>
            Back to API Access Clients
        </a>
    </div>

    <!-- Flash Notifications -->
    <?php if(session('success')): ?>
        <div class="alert-success" style="background:rgba(34,197,94,.12); border:1px solid rgba(34,197,94,.3); color:#6ee7a0; padding:14px 18px; border-radius:10px; margin-bottom:22px; font-size:13.5px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert-error" style="background:rgba(239,68,68,.12); border:1px solid rgba(239,68,68,.3); color:#ff8585; padding:14px 18px; border-radius:10px; margin-bottom:22px; font-size:13.5px;">
            <strong style="display:block; margin-bottom:4px;">Error:</strong>
            <ul style="margin:0; padding-left:18px;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- REVEAL NEW TOKEN BOX (Displayed only once upon generation) -->
    <?php if(session('plainTextToken')): ?>
        <div class="token-secret-box" id="new-token-alert">
            <div class="secret-box-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
                Personal Access Token Generated: "<?php echo e(session('newTokenName')); ?>"
            </div>
            <div class="secret-box-warning">
                <strong>Important Security Notice:</strong> Please copy this bearer token now and store it in your client's secure credentials manager. For security reasons, <strong>this plaintext secret is only shown once and cannot be retrieved again</strong>.
            </div>
            <div class="token-display-row">
                <code id="new-token-string"><?php echo e(session('plainTextToken')); ?></code>
                <button type="button" class="copy-btn" onclick="copyTokenToClipboard()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="14" height="14" x="8" y="8" rx="2" ry="2"/>
                        <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/>
                    </svg>
                    <span id="copy-btn-text">Copy Token</span>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Console Header -->
    <div class="console-header">
        <div class="client-meta-title">
            <h1>
                <?php echo e($client->name); ?>

                <?php if($client->is_active): ?>
                    <span class="badge badge-success">Active</span>
                <?php else: ?>
                    <span class="badge badge-danger">Inactive</span>
                <?php endif; ?>
            </h1>
            <p><?php echo e($client->description ?: 'No description provided for this client.'); ?></p>
        </div>

        <div class="header-btns">
            <!-- Edit Button -->
            <a href="<?php echo e(route('api-clients.edit', $client)); ?>" class="btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                    <path d="m15 5 4 4"/>
                </svg>
                Edit Client
            </a>

            <!-- Toggle Status -->
            <form method="POST" action="<?php echo e(route('api-clients.toggle-status', $client)); ?>" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <button type="submit" class="btn-secondary">
                    <?php if($client->is_active): ?>
                        Deactivate Client
                    <?php else: ?>
                        Activate Client
                    <?php endif; ?>
                </button>
            </form>

            <!-- Generate Token Trigger -->
            <button type="button" class="btn-sm-primary" onclick="openModal('token-modal')" id="btn-open-token-modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Generate Token
            </button>
        </div>
    </div>

    <!-- Overview Grid -->
    <div class="overview-grid">
        <!-- Permitted Modules & Scope -->
        <div class="panel" style="margin-bottom:0;">
            <div class="panel-header">
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                        <polyline points="2 17 12 22 22 17"/>
                        <polyline points="2 12 12 17 22 12"/>
                    </svg>
                    Module Permissions
                </h2>
                <a href="<?php echo e(route('api-clients.edit', $client)); ?>" style="color:#16C4F4; font-size:12.5px; text-decoration:none;">Modify</a>
            </div>
            <div class="panel-body">
                <p style="margin:0 0 14px; font-size:13px; color:#8fa2be;">
                    Endpoints protected by <code>api.client.whitelist</code> strictly verify that the client has been granted the corresponding module permission:
                </p>

                <div style="display:flex; flex-wrap:wrap; gap:8px;">
                    <?php $perms = $client->permissions ?? []; ?>
                    <?php $__currentLoopData = $availableModules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modKey => $modLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(in_array($modKey, $perms)): ?>
                            <div style="background:#0D1735; border:1px solid #1c4266; border-radius:8px; padding:10px 14px; display:flex; align-items:center; gap:8px;">
                                <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#4ade80;"></span>
                                <strong style="color:#ffffff; font-size:13.5px;"><?php echo e($modLabel); ?></strong>
                                <span class="badge badge-module" style="font-size:11px;">/v1/<?php echo e($modKey); ?></span>
                            </div>
                        <?php else: ?>
                            <div style="background:#0D1735; border:1px solid rgba(255,255,255,0.05); border-radius:8px; padding:10px 14px; display:flex; align-items:center; gap:8px; opacity:0.5;">
                                <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#64748b;"></span>
                                <span style="color:#8fa2be; font-size:13.5px;"><?php echo e($modLabel); ?> (Disabled)</span>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- Audit & Meta Info -->
        <div class="panel" style="margin-bottom:0;">
            <div class="panel-header">
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="16" x2="12" y2="12"/>
                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                    </svg>
                    Metadata
                </h2>
            </div>
            <div class="panel-body">
                <div class="info-list">
                    <div class="info-item">
                        <span class="info-label">Client ID</span>
                        <span class="info-value">#<?php echo e($client->id); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Created By</span>
                        <span class="info-value"><?php echo e($client->creator ? $client->creator->name : 'System Admin'); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Created Date</span>
                        <span class="info-value"><?php echo e($client->created_at->format('M d, Y H:i')); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Last Modified</span>
                        <span class="info-value"><?php echo e($client->updated_at->diffForHumans()); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 1: PERSONAL ACCESS TOKENS -->
    <div class="panel" id="tokens-section">
        <div class="panel-header">
            <h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
                Personal Access Tokens
            </h2>
            <button type="button" class="btn-sm-primary" onclick="openModal('token-modal')">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Generate New Token
            </button>
        </div>

        <div style="overflow-x: auto;">
            <table class="custom-table" id="tokens-table">
                <thead>
                    <tr>
                        <th>Token Name</th>
                        <th>Token ID</th>
                        <th>Abilities</th>
                        <th>Last Used</th>
                        <th>Expires At</th>
                        <th>Created</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $client->tokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $token): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $isExpired = $token->expires_at && \Carbon\Carbon::parse($token->expires_at)->isPast();
                        ?>
                        <tr id="token-row-<?php echo e($token->id); ?>">
                            <td>
                                <strong style="color:#ffffff;"><?php echo e($token->name); ?></strong>
                                <?php if($isExpired): ?>
                                    <span class="badge badge-danger" style="margin-left:6px;">Expired</span>
                                <?php else: ?>
                                    <span class="badge badge-success" style="margin-left:6px;">Valid</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="code-tag">ID: #<?php echo e($token->id); ?></span>
                            </td>
                            <td>
                                <?php if(is_array($token->abilities)): ?>
                                    <?php $__currentLoopData = $token->abilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-module" style="font-size:11px;"><?php echo e($ability); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <span class="badge badge-module" style="font-size:11px;">*</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($token->last_used_at): ?>
                                    <?php echo e(\Carbon\Carbon::parse($token->last_used_at)->diffForHumans()); ?>

                                <?php else: ?>
                                    <span style="color:#64748b;">Never</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($token->expires_at): ?>
                                    <span style="<?php echo e($isExpired ? 'color:#f87171;' : 'color:#cbd5e1;'); ?>">
                                        <?php echo e(\Carbon\Carbon::parse($token->expires_at)->format('M d, Y H:i')); ?>

                                    </span>
                                <?php else: ?>
                                    <span style="color:#64748b;">No Expiration</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($token->created_at ? $token->created_at->format('M d, Y') : '-'); ?>

                            </td>
                            <td style="text-align: right;">
                                <form
                                    method="POST"
                                    action="<?php echo e(route('api-clients.tokens.revoke', [$client, $token->id])); ?>"
                                    style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to revoke token \'<?php echo e($token->name); ?>\'? Any requests using this token will be denied immediately.');"
                                >
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-icon-danger" title="Revoke this token">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                        </svg>
                                        Revoke
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 35px 20px; color:#8fa2be;">
                                No personal access tokens issued yet. Click <strong>Generate New Token</strong> above to issue a token.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SECTION 2: WHITELISTED IP ADDRESSES -->
    <div class="panel" id="ips-section">
        <div class="panel-header">
            <div>
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="8" x="2" y="2" rx="2" ry="2"/>
                        <rect width="20" height="8" x="2" y="14" rx="2" ry="2"/>
                        <line x1="6" y1="6" x2="6.01" y2="6"/>
                        <line x1="6" y1="18" x2="6.01" y2="18"/>
                    </svg>
                    Whitelisted IP Addresses (<?php echo e($client->ips->count()); ?>)
                </h2>
                <div style="font-size:12px; color:#8fa2be; margin-top:3px;">
                    Clients can have multiple whitelisted IP addresses. Only active IP addresses are allowed through.
                </div>
            </div>

            <button type="button" class="btn-sm-primary" onclick="openModal('ip-modal')" id="btn-open-ip-modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Add IP Address
            </button>
        </div>

        <div style="overflow-x: auto;">
            <table class="custom-table" id="ips-table">
                <thead>
                    <tr>
                        <th>IP Address</th>
                        <th>Label</th>
                        <th>Scope</th>
                        <th>Status</th>
                        <th>Added Date</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $client->ips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr id="ip-row-<?php echo e($ip->id); ?>">
                            <td>
                                <code class="code-tag" style="font-size:13.5px; color:#ffffff;"><?php echo e($ip->ip_address); ?></code>
                            </td>
                            <td>
                                <?php echo e($ip->label ?: '-'); ?>

                            </td>
                            <td>
                                <?php if($ip->personal_access_token_id && $ip->token): ?>
                                    <span class="badge badge-scope-token" title="Restricted to token: <?php echo e($ip->token->name); ?>">
                                        Token: <?php echo e($ip->token->name); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-scope-global">
                                        All Client Tokens (Global)
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($ip->is_active): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($ip->created_at->format('M d, Y')); ?>

                            </td>
                            <td style="text-align: right;">
                                <div style="display:inline-flex; align-items:center; gap:6px;">
                                    <!-- Toggle Active/Inactive -->
                                    <form method="POST" action="<?php echo e(route('api-clients.ips.toggle-status', [$client, $ip])); ?>" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit" class="btn-icon-toggle" title="Toggle active status">
                                            <?php echo e($ip->is_active ? 'Disable' : 'Enable'); ?>

                                        </button>
                                    </form>

                                    <!-- Delete IP -->
                                    <form
                                        method="POST"
                                        action="<?php echo e(route('api-clients.ips.destroy', [$client, $ip])); ?>"
                                        style="display:inline;"
                                        onsubmit="return confirm('Remove IP <?php echo e($ip->ip_address); ?> from the whitelist?');"
                                    >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn-icon-danger" title="Remove IP">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18"/>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 35px 20px; color:#8fa2be;">
                                No IP addresses whitelisted yet. <strong>All requests will be blocked</strong> until at least one authorized IP is added.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL: GENERATE TOKEN -->
<div class="modal-overlay" id="token-modal">
    <div class="modal-card">
        <form method="POST" action="<?php echo e(route('api-clients.tokens.generate', $client)); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h3>Generate Personal Access Token</h3>
                <button type="button" class="modal-close" onclick="closeModal('token-modal')">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="token_name">Token Name <span style="color:#f87171;">*</span></label>
                    <input
                        type="text"
                        name="token_name"
                        id="token_name"
                        class="form-input"
                        placeholder="e.g. production-api, staging-service, external-sync"
                        required
                    >
                    <span style="font-size:12px; color:#8fa2be; margin-top:4px; display:block;">
                        Descriptive identifier to recognize this token in audit logs.
                    </span>
                </div>

                <div class="form-group">
                    <label class="form-label" for="expires_at">Expiration Date (Optional)</label>
                    <input
                        type="datetime-local"
                        name="expires_at"
                        id="expires_at"
                        class="form-input"
                    >
                    <span style="font-size:12px; color:#8fa2be; margin-top:4px; display:block;">
                        Leave blank for non-expiring credentials.
                    </span>
                </div>

                <div class="form-group">
                    <label class="form-label">Module Abilities</label>
                    <div style="display:flex; flex-direction:column; gap:8px; margin-top:6px;">
                        <?php $__currentLoopData = $availableModules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modKey => $modLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $isPermitted = in_array($modKey, $client->permissions ?? []); ?>
                            <label style="display:flex; align-items:center; gap:8px; font-size:13px; color:<?php echo e($isPermitted ? '#ffffff' : '#64748b'); ?>;">
                                <input
                                    type="checkbox"
                                    name="abilities[]"
                                    value="<?php echo e($modKey); ?>:read"
                                    <?php echo e($isPermitted ? 'checked' : 'disabled'); ?>

                                    style="accent-color:#16C4F4;"
                                >
                                <?php echo e($modLabel); ?> Ability (<code><?php echo e($modKey); ?>:read</code>)
                                <?php if(! $isPermitted): ?>
                                    <span style="font-size:11px; color:#f87171;">(Client lacks module permission)</span>
                                <?php endif; ?>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModal('token-modal')">Cancel</button>
                <button type="submit" class="btn-sm-primary" id="btn-submit-token">Generate & Reveal Secret</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL: ADD IP ADDRESS -->
<div class="modal-overlay" id="ip-modal">
    <div class="modal-card">
        <form method="POST" action="<?php echo e(route('api-clients.ips.store', $client)); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
                <h3>Add Whitelisted IP Address</h3>
                <button type="button" class="modal-close" onclick="closeModal('ip-modal')">✕</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="ip_address">IP Address (IPv4 or IPv6) <span style="color:#f87171;">*</span></label>
                    <input
                        type="text"
                        name="ip_address"
                        id="ip_address"
                        class="form-input"
                        placeholder="e.g. 203.0.113.25 or 2001:db8::10"
                        required
                    >
                    <span style="font-size:12px; color:#8fa2be; margin-top:4px; display:block;">
                        Enter the public static IP address that will connect to the API.
                    </span>
                </div>

                <div class="form-group">
                    <label class="form-label" for="label">Label (Optional)</label>
                    <input
                        type="text"
                        name="label"
                        id="label"
                        class="form-input"
                        placeholder="e.g. Primary Data Center, Cloud NAT Gateway, Branch Office"
                    >
                </div>

                <div class="form-group">
                    <label class="form-label" for="personal_access_token_id">Token Scope</label>
                    <select name="personal_access_token_id" id="personal_access_token_id" class="form-select">
                        <option value="">All Client Tokens (Global)</option>
                        <?php $__currentLoopData = $client->tokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tok->id); ?>">Restricted to token: "<?php echo e($tok->name); ?>" (#<?php echo e($tok->id); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <span style="font-size:12px; color:#8fa2be; margin-top:4px; display:block;">
                        Select whether this IP is valid across all client tokens or restricted only to a specific token.
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModal('ip-modal')">Cancel</button>
                <button type="submit" class="btn-sm-primary" id="btn-submit-ip">Add IP to Whitelist</button>
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

    // Close modal on background click
    window.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal-overlay')) {
            e.target.classList.remove('show');
        }
    });

    function copyTokenToClipboard() {
        const tokenText = document.getElementById('new-token-string').innerText;
        navigator.clipboard.writeText(tokenText).then(() => {
            const btnText = document.getElementById('copy-btn-text');
            btnText.innerText = 'Copied!';
            setTimeout(() => {
                btnText.innerText = 'Copy Token';
            }, 3000);
        }).catch(err => {
            console.error('Failed to copy token:', err);
        });
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.aspiaUcl', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\AspiaUCL\resources\views/aspiaUcl/api_clients/show.blade.php ENDPATH**/ ?>