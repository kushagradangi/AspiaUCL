<?php
    $headerFrameworks = $headerFrameworks ?? \App\Models\Framework::orderBy('name', 'asc')->get();
    $headerDomains    = $headerDomains    ?? \App\Models\Domain::orderBy('display_order', 'asc')->get();
    $headerControls   = $headerControls   ?? \App\Models\Control::orderBy('control_id', 'asc')->take(50)->get();
    $badgeClasses     = ['badge-cyan', 'badge-purple', 'badge-emerald', 'badge-amber', 'badge-rose'];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<style>
    :root {
        --aspia-infotech-font-primary: "Inter", sans-serif;
        --aspia-infotech-font-mono: "JetBrains Mono", "SFMono-Regular", Consolas, monospace;
    }
    /* SHARED HEADER STYLES (#0D1735 PRIMARY NAVY) */
    .site-header {
        font-family: var(--aspia-infotech-font-primary);
        background: #0D1735;
        border-bottom: none;
        position: sticky;
        top: 0;
        z-index: 999;
        transition: background 0.3s, border-color 0.3s;
        width: 100%;
    }
    .site-header .container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
        width: 100%;
        box-sizing: border-box;
    }
    .site-header .nav {
        display: grid;
        grid-template-columns: auto 1fr auto;
        align-items: center;
        padding: 20px 0;
        min-height: 76px;
        gap: 16px;
        border-bottom: none;
    }
    .site-header .nav-logo {
        font-size: 1.55rem;
        font-weight: 800;
        color: #ffffff;
        letter-spacing: -0.02em;
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        flex-shrink: 0;
    }
    .site-header .nav-logo .accent {
        color: #16C4F4;
    }
    .site-header .nav-logo .badge {
        font-size: 0.58rem;
        font-weight: 600;
        background: rgba(22, 196, 244, 0.15);
        color: #16C4F4;
        padding: 3px 12px;
        border-radius: 12px;
        letter-spacing: 0.04em;
        margin-left: 6px;
    }
    .site-header .nav-links {
        display: flex;
        justify-content: center;
        gap: 26px;
        list-style: none;
        font-size: 0.85rem;
        font-weight: 500;
        align-items: center;
        margin: 0 auto;
    }
    .site-header .nav-links a {
        color: #cbd5e1;
        text-decoration: none;
        transition: 0.15s;
    }
    .site-header .nav-links a:hover,
    .site-header .nav-links a.active {
        color: #16C4F4;
        font-weight: 700;
    }

    /* DROPDOWN MENU STYLES */
    .site-header .nav-links li.dropdown-parent {
        position: relative;
        padding: 6px 0;
    }
    .site-header .nav-links li.dropdown-parent > a {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .site-header .dropdown-arrow {
        font-size: 0.65rem;
        transition: transform 0.25s ease;
        opacity: 0.7;
    }
    .site-header .nav-links li.dropdown-parent:hover .dropdown-arrow {
        transform: rotate(180deg);
        color: #16C4F4;
    }
    .site-header .dropdown-popover {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        width: 320px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 14px;
        box-shadow: 0 12px 30px -5px rgba(15, 23, 42, 0.15), 0 4px 10px -2px rgba(15, 23, 42, 0.05);
        opacity: 0;
        visibility: hidden;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
        margin-top: 4px;
    }
    .site-header .dropdown-popover::before {
        content: '';
        position: absolute;
        top: -12px;
        left: 0;
        right: 0;
        height: 12px;
    }
    .site-header .nav-links li.dropdown-parent:hover .dropdown-popover,
    .site-header .nav-links li.dropdown-parent:focus-within .dropdown-popover {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }
    .site-header .dropdown-popover-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 8px;
        margin-bottom: 8px;
        border-bottom: 1px solid #f0f2f6;
    }
    .site-header .popover-title {
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #16C4F4;
    }
    .site-header .popover-all-link {
        font-size: 0.75rem;
        font-weight: 700;
        color: #16C4F4 !important;
        text-decoration: none;
        transition: opacity 0.2s;
    }
    .site-header .popover-all-link:hover {
        text-decoration: underline;
        opacity: 0.85;
    }
    .site-header .dropdown-popover-list {
        display: flex;
        flex-direction: column;
        gap: 4px;
        max-height: 380px;
        overflow-y: auto;
        padding-right: 4px;
        scroll-behavior: smooth;
    }
    .site-header .dropdown-popover-list::-webkit-scrollbar {
        width: 5px;
    }
    .site-header .dropdown-popover-list::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 4px;
    }
    .site-header .dropdown-popover-list::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }
    .site-header .dropdown-popover-list::-webkit-scrollbar-thumb:hover {
        background: #16C4F4;
    }
    .site-header .dropdown-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 8px 10px;
        background: #f8fafc;
        border: 1px solid #f0f2f6;
        border-radius: 8px;
        text-decoration: none !important;
        transition: all 0.2s ease;
    }
    .site-header .dropdown-card:hover {
        border-color: #16C4F4;
        background: #ffffff;
        transform: translateX(3px);
        box-shadow: 0 2px 8px rgba(22, 196, 244, 0.12);
    }
    .site-header .dropdown-card-body {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .site-header .dropdown-card-title-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }
    .site-header .dropdown-card-title {
        font-size: 0.8rem;
        font-weight: 600;
        color: #0D1735;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.3;
    }
    .site-header .dropdown-card:hover .dropdown-card-title {
        color: #16C4F4;
    }
    .site-header .dropdown-card-sub {
        font-size: 0.68rem;
        color: #64748b;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .site-header .card-badge {
        font-family: var(--aspia-infotech-font-mono);
        font-size: 0.62rem;
        font-weight: 700;
        padding: 2px 6px;
        border-radius: 4px;
        flex-shrink: 0;
        white-space: nowrap;
    }
    .site-header .badge-emerald { background: #ecfdf5; color: #059669; border: 1px solid rgba(5, 150, 105, 0.25); }
    .site-header .badge-cyan    { background: #e0f2fe; color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.25); }
    .site-header .badge-amber   { background: #fffbeb; color: #d97706; border: 1px solid rgba(217, 119, 6, 0.25); }
    .site-header .badge-purple  { background: #f5f3ff; color: #7c3aed; border: 1px solid rgba(124, 58, 237, 0.25); }
    .site-header .badge-rose    { background: #fff1f2; color: #e11d48; border: 1px solid rgba(225, 29, 72, 0.25); }

    /* Dark Mode Dropdown Overrides */
    [data-theme="dark"] .site-header .dropdown-popover,
    body.dark-mode .site-header .dropdown-popover {
        background: #111827 !important;
        border-color: #1e293b !important;
        box-shadow: 0 12px 30px -5px rgba(0, 0, 0, 0.5) !important;
    }
    [data-theme="dark"] .site-header .dropdown-popover-header,
    body.dark-mode .site-header .dropdown-popover-header {
        border-bottom-color: #1e293b !important;
    }
    [data-theme="dark"] .site-header .popover-title,
    [data-theme="dark"] .site-header .popover-all-link,
    body.dark-mode .site-header .popover-title,
    body.dark-mode .site-header .popover-all-link {
        color: #16C4F4 !important;
    }
    [data-theme="dark"] .site-header .dropdown-card,
    body.dark-mode .site-header .dropdown-card {
        background: #1f2937 !important;
        border-color: #374151 !important;
    }
    [data-theme="dark"] .site-header .dropdown-card:hover,
    body.dark-mode .site-header .dropdown-card:hover {
        background: #111827 !important;
        border-color: #16C4F4 !important;
    }
    [data-theme="dark"] .site-header .dropdown-card-title,
    body.dark-mode .site-header .dropdown-card-title {
        color: #f3f4f6 !important;
    }
    [data-theme="dark"] .site-header .dropdown-card:hover .dropdown-card-title,
    body.dark-mode .site-header .dropdown-card:hover .dropdown-card-title {
        color: #16C4F4 !important;
    }
    [data-theme="dark"] .site-header .dropdown-card-sub,
    body.dark-mode .site-header .dropdown-card-sub {
        color: #9ca3af !important;
    }
    [data-theme="dark"] .site-header .dropdown-popover-list::-webkit-scrollbar-track,
    body.dark-mode .site-header .dropdown-popover-list::-webkit-scrollbar-track {
        background: #1f2937 !important;
    }
    [data-theme="dark"] .site-header .dropdown-popover-list::-webkit-scrollbar-thumb,
    body.dark-mode .site-header .dropdown-popover-list::-webkit-scrollbar-thumb {
        background: #4b5563 !important;
    }
    [data-theme="dark"] .site-header .badge-emerald, body.dark-mode .site-header .badge-emerald { background: rgba(5, 150, 105, 0.15) !important; color: #34d399 !important; border-color: rgba(52, 211, 153, 0.3) !important; }
    [data-theme="dark"] .site-header .badge-cyan,    body.dark-mode .site-header .badge-cyan    { background: rgba(22, 196, 244, 0.15) !important; color: #16C4F4 !important; border-color: rgba(22, 196, 244, 0.3) !important; }
    [data-theme="dark"] .site-header .badge-amber,   body.dark-mode .site-header .badge-amber   { background: rgba(251, 191, 36, 0.15) !important; color: #fbbf24 !important; border-color: rgba(251, 191, 36, 0.3) !important; }
    [data-theme="dark"] .site-header .badge-purple,  body.dark-mode .site-header .badge-purple  { background: rgba(192, 132, 252, 0.15) !important; color: #c084fc !important; border-color: rgba(192, 132, 252, 0.3) !important; }
    [data-theme="dark"] .site-header .badge-rose,    body.dark-mode .site-header .badge-rose    { background: rgba(251, 113, 133, 0.15) !important; color: #fb7185 !important; border-color: rgba(251, 113, 133, 0.3) !important; }

    .site-header .nav-actions {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: flex-end;
        flex-shrink: 0;
    }
    .site-header .mobile-menu-toggle {
        display: none;
        background: transparent;
        border: 1.5px solid rgba(255, 255, 255, 0.25);
        color: #ffffff;
        font-size: 1.1rem;
        padding: 6px 12px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .site-header .mobile-menu-toggle:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: #16C4F4;
        color: #16C4F4;
    }
    .site-header .btn-outline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 7px 18px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        font-family: inherit;
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff !important;
        border: 1.5px solid rgba(255, 255, 255, 0.35);
        text-decoration: none !important;
        transition: all 0.2s ease;
        white-space: nowrap;
    }
    .site-header .btn-outline:hover {
        background: #ffffff;
        color: #0D1735 !important;
        border-color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25);
    }
    .site-header .theme-switch {
        position: relative;
        display: inline-block;
        width: 52px;
        height: 26px;
        user-select: none;
        cursor: pointer;
        margin-right: 4px;
    }
    .site-header .theme-switch input {
        opacity: 0;
        width: 0;
        height: 0;
        position: absolute;
    }
    .site-header .theme-switch .slider {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: #e2e8f0;
        border: 1px solid #cbd5e1;
        border-radius: 26px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 6px;
    }
    .site-header .theme-switch .slider .icon-sun {
        font-size: 0.7rem;
        color: #f59e0b;
        z-index: 1;
    }
    .site-header .theme-switch .slider .icon-moon {
        font-size: 0.7rem;
        color: #94a3b8;
        z-index: 1;
    }
    .site-header .theme-switch .slider .thumb {
        position: absolute;
        height: 20px;
        width: 20px;
        left: 2px;
        bottom: 2px;
        background-color: #ffffff;
        border-radius: 50%;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.3s;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        z-index: 2;
    }
    .site-header .theme-switch input:checked + .slider {
        background-color: #1e293b;
        border-color: #334155;
    }
    .site-header .theme-switch input:checked + .slider .icon-moon {
        color: #16C4F4;
    }
    .site-header .theme-switch input:checked + .slider .thumb {
        transform: translateX(26px);
        background-color: #0f172a;
    }
    .site-header .btn-outline {
        background: transparent;
        color: #0b1a33;
        border: 1.5px solid #d0d8e4;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        height: 38px;
        padding: 0 18px !important;
        border-radius: 8px;
        font-size: 0.85rem !important;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        transition: all 0.25s;
        text-decoration: none;
        box-sizing: border-box;
        line-height: 1;
        white-space: nowrap;
    }
    .site-header .btn-outline:hover {
        background: #f0f4fa;
        border-color: #0b1a33;
    }

    /* Dark Mode Header Overrides */
    [data-theme="dark"] .site-header,
    body.dark-mode .site-header {
        background: #0D1735 !important;
        border-color: #1e293b !important;
    }
    [data-theme="dark"] .site-header .nav-logo,
    body.dark-mode .site-header .nav-logo {
        color: #f8fafc !important;
    }
    [data-theme="dark"] .site-header .nav-logo .accent,
    body.dark-mode .site-header .nav-logo .accent {
        color: #16C4F4 !important;
    }
    [data-theme="dark"] .site-header .nav-logo .badge,
    body.dark-mode .site-header .nav-logo .badge {
        background: rgba(22, 196, 244, 0.15) !important;
        color: #16C4F4 !important;
    }
    [data-theme="dark"] .site-header .nav-links a,
    body.dark-mode .site-header .nav-links a {
        color: #94a3b8 !important;
    }
    [data-theme="dark"] .site-header .nav-links a:hover,
    [data-theme="dark"] .site-header .nav-links a.active,
    body.dark-mode .site-header .nav-links a:hover,
    body.dark-mode .site-header .nav-links a.active {
        color: #16C4F4 !important;
    }
    [data-theme="dark"] .site-header .btn-outline,
    body.dark-mode .site-header .btn-outline {
        color: #f1f5f9 !important;
        border-color: #334155 !important;
    }

    @media (max-width: 768px) {
        .site-header .container {
            padding: 0 16px;
        }
        .site-header .mobile-menu-toggle {
            display: inline-flex;
        }
        .site-header .nav-links {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #ffffff;
            flex-direction: column;
            padding: 16px 20px;
            gap: 12px;
            border-bottom: 1px solid #f0f2f6;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .site-header .nav-links.active {
            display: flex;
        }
        .site-header .dropdown-popover {
            position: static;
            transform: none !important;
            width: 100%;
            box-shadow: none;
            display: none;
            margin-top: 6px;
        }
        .site-header .nav-links li.dropdown-parent:hover .dropdown-popover {
            display: flex;
        }
        [data-theme="dark"] .site-header .nav-links,
        body.dark-mode .site-header .nav-links {
            background: #0b1329 !important;
            border-color: #1e293b !important;
        }
    }
</style>

<header class="site-header">
    <div class="container">
        <nav class="nav" aria-label="Main Navigation">
            <a href="<?php echo e(route('home')); ?>" class="nav-logo" title="ASPIA UCL Homepage">
                ASPIA <span class="accent">UCL</span>
                <span class="badge">Free Directory</span>
            </a>
            <ul class="nav-links">
                <li class="dropdown-parent">
                    <a href="<?php echo e(route('frameworks.public_index')); ?>" class="<?php echo e(($activeTab ?? '') === 'frameworks' ? 'active' : ''); ?>" title="Compliance Frameworks">
                        <span>Frameworks</span>
                        <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-popover">
                        <div class="dropdown-popover-header">
                            <span class="popover-title">Compliance Frameworks</span>
                            <a href="<?php echo e(route('frameworks.public_index')); ?>" class="popover-all-link">View All →</a>
                        </div>
                        <div class="dropdown-popover-list">
                            <?php $__currentLoopData = $headerFrameworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeClass = $badgeClasses[$loop->index % count($badgeClasses)];
                                    $url  = route('frameworks.show', $fw->slug);
                                    $code = $fw->framework_code ?: ($fw->framework_family ?: 'FW');
                                    $name = $fw->name;
                                    $cat  = $fw->category ?: 'Regulatory Framework';
                                ?>
                                <a href="<?php echo e($url); ?>" class="dropdown-card">
                                    <div class="dropdown-card-body">
                                        <div class="dropdown-card-title-row">
                                            <span class="dropdown-card-title"><?php echo e($name); ?></span>
                                            <span class="card-badge <?php echo e($badgeClass); ?>"><?php echo e($code); ?></span>
                                        </div>
                                        <span class="dropdown-card-sub"><?php echo e($cat); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>

                <li class="dropdown-parent">
                    <a href="<?php echo e(route('domains.public_index')); ?>" class="<?php echo e(($activeTab ?? '') === 'domains' ? 'active' : ''); ?>" title="Governance Domains">
                        <span>Domains</span>
                        <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-popover">
                        <div class="dropdown-popover-header">
                            <span class="popover-title">Governance Domains</span>
                            <a href="<?php echo e(route('domains.public_index')); ?>" class="popover-all-link">View All →</a>
                        </div>
                        <div class="dropdown-popover-list">
                            <?php $__currentLoopData = $headerDomains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeClass = $badgeClasses[$loop->index % count($badgeClasses)];
                                    $url  = route('domains.show', $d->slug);
                                    $code = $d->domain_code ?: ($d->domain_id ?: 'DOM');
                                    $name = $d->name;
                                    $sub  = $d->short_overview ?: ($d->purpose ?: 'Control Domain');
                                ?>
                                <a href="<?php echo e($url); ?>" class="dropdown-card">
                                    <div class="dropdown-card-body">
                                        <div class="dropdown-card-title-row">
                                            <span class="dropdown-card-title"><?php echo e($name); ?></span>
                                            <span class="card-badge <?php echo e($badgeClass); ?>"><?php echo e($code); ?></span>
                                        </div>
                                        <span class="dropdown-card-sub"><?php echo e($sub); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>

                <li class="dropdown-parent">
                    <a href="<?php echo e(route('controls.public_index')); ?>" class="<?php echo e(($activeTab ?? '') === 'controls' ? 'active' : ''); ?>" title="Unified Controls">
                        <span>Controls</span>
                        <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-popover">
                        <div class="dropdown-popover-header">
                            <span class="popover-title">Unified Controls</span>
                            <a href="<?php echo e(route('controls.public_index')); ?>" class="popover-all-link">View All →</a>
                        </div>
                        <div class="dropdown-popover-list">
                            <?php $__currentLoopData = $headerControls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $badgeClass = $badgeClasses[$loop->index % count($badgeClasses)];
                                    $url  = route('controls.show', $c->control_id);
                                    $code = $c->control_id;
                                    $name = $c->name;
                                    $sub  = $c->control_category ?: ($c->description ?: 'Security Control');
                                ?>
                                <a href="<?php echo e($url); ?>" class="dropdown-card">
                                    <div class="dropdown-card-body">
                                        <div class="dropdown-card-title-row">
                                            <span class="dropdown-card-title"><?php echo e($name); ?></span>
                                            <span class="card-badge <?php echo e($badgeClass); ?>"><?php echo e($code); ?></span>
                                        </div>
                                        <span class="dropdown-card-sub"><?php echo e($sub); ?></span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>

                <li><a href="<?php echo e(url('/#about-ucl')); ?>" title="About Unified Control Layer">About UCL</a></li>
                <li><a href="<?php echo e(url('/#blog')); ?>" title="Resources & Articles">Blog</a></li>
            </ul>
            <div class="nav-actions">
                <label class="theme-switch" for="themeToggleSwitch" title="Toggle Light/Dark Theme" aria-label="Toggle Theme">
                    <input type="checkbox" id="themeToggleSwitch" />
                    <span class="slider">
                        <i class="fas fa-sun icon-sun" aria-hidden="true"></i>
                        <i class="fas fa-moon icon-moon" aria-hidden="true"></i>
                        <span class="thumb"></span>
                    </span>
                </label>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="btn-outline" title="Go to Dashboard"><i class="fas fa-chart-line" aria-hidden="true"></i> Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn-outline" title="Sign In">Sign In</a>
                <?php endif; ?>
                <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle Navigation Menu">
                    <i class="fas fa-bars" aria-hidden="true"></i>
                </button>
            </div>
        </nav>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\AspiaUCL\resources\views/aspiaUcl/partials/header.blade.php ENDPATH**/ ?>