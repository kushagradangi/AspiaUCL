@extends('layouts.aspiaUcl')

@section('title', ' | API Access Management')

@section('page-title', 'API Access Management')

@section('content')

<style>
    /* =========================================================
       PAGE STYLES
    ========================================================= */
    .api-management-page {
        width: 100%;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .page-header h1 {
        margin: 0 0 6px;
        font-size: 28px;
        font-weight: 600;
        color: #ffffff;
    }

    .page-header p {
        margin: 0;
        color: #8fa2be;
        font-size: 14px;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #16C4F4;
        color: #0D1735;
        font-weight: 600;
        font-size: 13.5px;
        padding: 10px 18px;
        border-radius: 9px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background: #0ea8d3;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(22, 196, 244, 0.3);
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 14px;
        padding: 20px;
        position: relative;
        overflow: hidden;
        transition: transform 0.2s, border-color 0.2s;
    }

    .stat-card:hover {
        border-color: rgba(22, 196, 244, 0.35);
        transform: translateY(-2px);
    }

    .stat-card .stat-icon {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: rgba(22, 196, 244, 0.1);
        color: #16C4F4;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-card.active-card .stat-icon {
        background: rgba(34, 197, 94, 0.12);
        color: #4ade80;
    }

    .stat-card.inactive-card .stat-icon {
        background: rgba(239, 68, 68, 0.12);
        color: #f87171;
    }

    .stat-card.ip-card .stat-icon {
        background: rgba(168, 85, 247, 0.12);
        color: #c084fc;
    }

    .stat-label {
        font-size: 12.5px;
        color: #8fa2be;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: #ffffff;
        line-height: 1;
        margin-bottom: 6px;
    }

    .stat-subtext {
        font-size: 12px;
        color: #64748b;
    }

    /* Content Panel */
    .content-panel {
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 14px;
        overflow: hidden;
    }

    .panel-toolbar {
        padding: 18px 22px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .search-box {
        position: relative;
        flex: 1;
        max-width: 380px;
        min-width: 240px;
    }

    .search-box input {
        width: 100%;
        background: #0D1735;
        border: 1px solid #1c4266;
        border-radius: 9px;
        padding: 9px 14px 9px 38px;
        color: #ffffff;
        font-size: 13.5px;
        outline: none;
        transition: border-color 0.2s;
    }

    .search-box input:focus {
        border-color: #16C4F4;
    }

    .search-box .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        pointer-events: none;
    }

    .search-box .clear-btn {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #8fa2be;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 2px 6px;
        font-size: 12px;
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
        width: 100%;
        scrollbar-width: thin;
        scrollbar-color: rgba(22, 196, 244, 0.2) transparent;
    }

    .table-container::-webkit-scrollbar {
        height: 5px;
    }

    .table-container::-webkit-scrollbar-thumb {
        background: rgba(22, 196, 244, 0.25);
        border-radius: 4px;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12.5px;
        text-align: left;
    }

    .custom-table th {
        background: rgba(13, 23, 53, 0.6);
        padding: 11px 10px;
        color: #8fa2be;
        font-weight: 600;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        white-space: nowrap;
    }

    .custom-table td {
        padding: 10px 10px;
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
        gap: 4px;
        padding: 2.5px 7px;
        border-radius: 5px;
        font-size: 11px;
        font-weight: 500;
        white-space: nowrap;
        line-height: 1.3;
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
        padding: 2px 6px;
        font-size: 10.5px;
        margin: 0;
        border-radius: 4px;
    }

    .badge-count {
        background: rgba(255, 255, 255, 0.08);
        color: #e2e8f0;
        border: 1px solid rgba(255, 255, 255, 0.12);
        font-family: var(--aspia-infotech-font-mono, monospace);
        font-size: 10.5px;
        padding: 2.5px 6.5px;
    }

    .modules-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 3px;
        max-width: 165px;
    }

    /* Actions Dropdown / Group */
    .actions-group {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        flex-wrap: nowrap;
        flex-shrink: 0;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border-radius: 6px;
        background: #0D1735;
        border: 1px solid #1c4266;
        color: #aebbd0;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s;
        padding: 0;
        flex-shrink: 0;
    }

    .action-btn svg {
        width: 13.5px;
        height: 13.5px;
    }

    .action-btn:hover {
        color: #16C4F4;
        border-color: #16C4F4;
        background: rgba(22, 196, 244, 0.1);
    }

    .action-btn.delete-btn:hover {
        color: #f87171;
        border-color: #ef4444;
        background: rgba(239, 68, 68, 0.1);
    }

    .action-btn.toggle-btn:hover {
        color: #facc15;
        border-color: #eab308;
        background: rgba(234, 179, 8, 0.1);
    }

    .client-title {
        font-weight: 600;
        color: #ffffff;
        font-size: 13px;
        margin-bottom: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 165px;
    }

    .client-desc {
        font-size: 11px;
        color: #64748b;
        max-width: 165px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .empty-state {
        padding: 50px 20px;
        text-align: center;
        color: #8fa2be;
    }

    .empty-state svg {
        margin-bottom: 14px;
        color: #3b5072;
    }

    .pagination-bar {
        padding: 16px 22px;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<div class="api-management-page">

    <!-- Flash Alerts -->
    @if(session('success'))
        <div class="alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>API Access Management</h1>
            <p>Manage external API clients, issue personal access tokens, whitelist authorized IP addresses, and control module permissions.</p>
        </div>
        <div class="header-actions">
            <a href="{{ route('api-clients.create') }}" class="btn-primary" id="btn-create-client">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Create API Client
            </a>
        </div>
    </div>

    <!-- Summary Metrics Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div class="stat-label">Total Clients</div>
            <div class="stat-value" id="stat-total-clients">{{ $totalClients }}</div>
            <div class="stat-subtext">Configured API consumers</div>
        </div>

        <div class="stat-card active-card">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                    <path d="m9 12 2 2 4-4"/>
                </svg>
            </div>
            <div class="stat-label">Active Clients</div>
            <div class="stat-value" id="stat-active-clients">{{ $activeClients }}</div>
            <div class="stat-subtext">{{ $inactiveClients }} inactive / suspended</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>
            <div class="stat-label">Active Tokens</div>
            <div class="stat-value" id="stat-active-tokens">{{ $activeTokens }}</div>
            <div class="stat-subtext">{{ $revokedOrExpiredTokens }} expired / revoked</div>
        </div>

        <div class="stat-card ip-card">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="8" x="2" y="2" rx="2" ry="2"/>
                    <rect width="20" height="8" x="2" y="14" rx="2" ry="2"/>
                    <line x1="6" y1="6" x2="6.01" y2="6"/>
                    <line x1="6" y1="18" x2="6.01" y2="18"/>
                </svg>
            </div>
            <div class="stat-label">Whitelisted IPs</div>
            <div class="stat-value" id="stat-total-ips">{{ $totalWhitelistedIps }}</div>
            <div class="stat-subtext">Enforced address filters</div>
        </div>
    </div>

    <!-- Main Table Panel -->
    <div class="content-panel">
        <div class="panel-toolbar">
            <form method="GET" action="{{ route('api-clients.index') }}" class="search-box">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input
                    type="text"
                    name="search"
                    placeholder="Search by client name or description..."
                    value="{{ $search }}"
                    id="search-input"
                >
                @if($search !== '')
                    <a href="{{ route('api-clients.index') }}" class="clear-btn" title="Clear search">✕</a>
                @endif
            </form>

            <div style="color: #8fa2be; font-size: 13px;">
                Showing <strong>{{ $clients->firstItem() ?? 0 }}</strong> to <strong>{{ $clients->lastItem() ?? 0 }}</strong> of <strong>{{ $clients->total() }}</strong> clients
            </div>
        </div>

        <div class="table-container">
            <table class="custom-table" id="clients-table">
                <thead>
                    <tr>
                        <th style="min-width: 140px;">Client</th>
                        <th style="min-width: 70px;">Status</th>
                        <th style="min-width: 110px;">Whitelisted IPs</th>
                        <th style="min-width: 110px;">Tokens</th>
                        <th style="min-width: 125px;">Permitted Modules</th>
                        <th style="min-width: 75px;">Created</th>
                        <th style="min-width: 80px;">Last Used</th>
                        <th style="text-align: right; min-width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        @php
                            $activeIpsCount = $client->ips->where('is_active', true)->count();
                            $totalIpsCount = $client->ips->count();
                            $activeTokensCount = $client->tokens->filter(fn($t) => is_null($t->expires_at) || \Carbon\Carbon::parse($t->expires_at)->isFuture())->count();
                            $latestToken = $client->tokens->sortByDesc('last_used_at')->first();
                        @endphp
                        <tr id="client-row-{{ $client->id }}">
                            <td>
                                <div class="client-title">
                                    <a href="{{ route('api-clients.show', $client) }}" style="color:#ffffff; text-decoration:none;">
                                        {{ $client->name }}
                                    </a>
                                </div>
                                @if($client->description)
                                    <div class="client-desc" title="{{ $client->description }}">
                                        {{ $client->description }}
                                    </div>
                                @else
                                    <div class="client-desc" style="color:#475569;">No description</div>
                                @endif
                            </td>

                            <td>
                                @if($client->is_active)
                                    <span class="badge badge-success">
                                        <span style="display:inline-block; width:6px; height:6px; border-radius:50%; background:#4ade80;"></span>
                                        Active
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        <span style="display:inline-block; width:6px; height:6px; border-radius:50%; background:#f87171;"></span>
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('api-clients.show', $client) }}#ips-section" style="text-decoration:none;">
                                    <span class="badge badge-count" title="{{ $activeIpsCount }} active out of {{ $totalIpsCount }} IPs">
                                        {{ $activeIpsCount }} active / {{ $totalIpsCount }} total
                                    </span>
                                </a>
                            </td>

                            <td>
                                <a href="{{ route('api-clients.show', $client) }}#tokens-section" style="text-decoration:none;">
                                    <span class="badge badge-count">
                                        {{ $activeTokensCount }} active ({{ $client->tokens->count() }} total)
                                    </span>
                                </a>
                            </td>

                            <td>
                                <div class="modules-wrap">
                                    @php $perms = $client->permissions ?? []; @endphp
                                    @if(empty($perms))
                                        <span style="color:#64748b; font-size:12px;">No permissions</span>
                                    @else
                                        @foreach($perms as $moduleKey)
                                            <span class="badge badge-module">
                                                {{ $availableModules[$moduleKey] ?? ucfirst($moduleKey) }}
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                            </td>

                            <td style="color:#8fa2be; font-size:12px; white-space:nowrap;">
                                {{ $client->created_at->format('M d, Y') }}
                            </td>

                            <td style="color:#8fa2be; font-size:12px; white-space:nowrap;">
                                @if($latestToken && $latestToken->last_used_at)
                                    {{ \Carbon\Carbon::parse($latestToken->last_used_at)->diffForHumans() }}
                                @else
                                    <span style="color:#475569;">Never</span>
                                @endif
                            </td>

                            <td style="text-align: right; white-space: nowrap;">
                                <div class="actions-group" style="justify-content: flex-end;">
                                    <!-- View/Manage Details -->
                                    <a
                                        href="{{ route('api-clients.show', $client) }}"
                                        class="action-btn"
                                        title="View client details & manage tokens"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </a>

                                    <!-- Edit Client -->
                                    <a
                                        href="{{ route('api-clients.edit', $client) }}"
                                        class="action-btn"
                                        title="Edit client information"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                            <path d="m15 5 4 4"/>
                                        </svg>
                                    </a>

                                    <!-- Toggle Active/Inactive -->
                                    <form
                                        method="POST"
                                        action="{{ route('api-clients.toggle-status', $client) }}"
                                        style="display:inline;"
                                        onsubmit="return confirm('Are you sure you want to {{ $client->is_active ? 'deactivate' : 'activate' }} client \'{{ $client->name }}\'?');"
                                    >
                                        @csrf
                                        @method('PATCH')
                                        <button
                                            type="submit"
                                            class="action-btn toggle-btn"
                                            title="{{ $client->is_active ? 'Deactivate client' : 'Activate client' }}"
                                        >
                                            @if($client->is_active)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect width="4" height="16" x="6" y="4"/>
                                                    <rect width="4" height="16" x="14" y="4"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polygon points="5 3 19 12 5 21 5 3"/>
                                                </svg>
                                            @endif
                                        </button>
                                    </form>

                                    <!-- Delete Client -->
                                    <form
                                        method="POST"
                                        action="{{ route('api-clients.destroy', $client) }}"
                                        style="display:inline;"
                                        onsubmit="return confirm('WARNING: Deleting \'{{ $client->name }}\' will revoke all associated tokens and remove all whitelisted IPs. This action cannot be undone. Proceed?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="action-btn delete-btn"
                                            title="Delete client and revoke tokens"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18"/>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                                <line x1="10" y1="11" x2="10" y2="17"/>
                                                <line x1="14" y1="11" x2="14" y2="17"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                    </svg>
                                    <h3 style="color:#ffffff; margin:0 0 6px; font-weight:500;">No API clients found</h3>
                                    <p style="margin:0 0 18px; font-size:13.5px;">Get started by registering an external client to generate personal access tokens.</p>
                                    <a href="{{ route('api-clients.create') }}" class="btn-primary">
                                        Create First API Client
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($clients->hasPages())
            <div class="pagination-bar">
                {{ $clients->links() }}
            </div>
        @endif
    </div>

</div>

@endsection
