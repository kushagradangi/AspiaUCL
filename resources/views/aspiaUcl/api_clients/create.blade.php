@extends('layouts.aspiaUcl')

@section('title', ' | Create API Client')

@section('page-title', 'Create API Client')

@section('content')

<style>
    .form-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .form-panel {
        background: #162544;
        border: 1px solid #1c4266;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 25px;
    }

    .panel-header {
        padding: 20px 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .panel-header h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #ffffff;
    }

    .panel-body {
        padding: 24px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 13.5px;
        font-weight: 500;
        color: #e2e8f0;
    }

    .form-hint {
        display: block;
        font-size: 12px;
        color: #8fa2be;
        margin-top: 5px;
    }

    .form-input, .form-textarea, .form-select {
        width: 100%;
        background: #0D1735;
        border: 1px solid #1c4266;
        border-radius: 9px;
        padding: 10px 14px;
        color: #ffffff;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-input:focus, .form-textarea:focus, .form-select:focus {
        border-color: #16C4F4;
        box-shadow: 0 0 0 3px rgba(22, 196, 244, 0.15);
    }

    .checkbox-card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 12px;
        margin-top: 8px;
    }

    .checkbox-card {
        background: #0D1735;
        border: 1px solid #1c4266;
        border-radius: 10px;
        padding: 14px 16px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .checkbox-card:hover {
        border-color: rgba(22, 196, 244, 0.4);
    }

    .checkbox-card input[type="checkbox"] {
        margin-top: 3px;
        accent-color: #16C4F4;
        width: 16px;
        height: 16px;
        cursor: pointer;
    }

    .checkbox-card-label {
        font-size: 14px;
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 2px;
    }

    .checkbox-card-desc {
        font-size: 11.5px;
        color: #8fa2be;
    }

    /* IP Rows */
    .ip-rows-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
    }

    .ip-row {
        display: grid;
        grid-template-columns: 1fr 1fr 40px;
        gap: 10px;
        align-items: center;
    }

    .remove-ip-btn {
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(239, 68, 68, 0.12);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .remove-ip-btn:hover {
        background: rgba(239, 68, 68, 0.25);
    }

    .add-ip-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: transparent;
        border: 1px dashed #1c4266;
        color: #16C4F4;
        border-radius: 8px;
        padding: 8px 14px;
        font-size: 13px;
        cursor: pointer;
        margin-top: 8px;
        transition: all 0.2s;
    }

    .add-ip-btn:hover {
        border-color: #16C4F4;
        background: rgba(22, 196, 244, 0.08);
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        padding: 18px 24px;
        background: rgba(13, 23, 53, 0.6);
        border-top: 1px solid rgba(255, 255, 255, 0.07);
    }

    .btn-secondary {
        background: transparent;
        color: #cbd5e1;
        border: 1px solid #1c4266;
        padding: 10px 18px;
        border-radius: 9px;
        font-size: 13.5px;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: #8fa2be;
        color: #ffffff;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #16C4F4;
        color: #0D1735;
        font-weight: 600;
        font-size: 13.5px;
        padding: 10px 20px;
        border-radius: 9px;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-primary:hover {
        background: #0ea8d3;
        box-shadow: 0 4px 14px rgba(22, 196, 244, 0.3);
    }

    .field-error {
        color: #f87171;
        font-size: 12px;
        margin-top: 4px;
        display: block;
    }
</style>

<div class="form-container">

    <div style="margin-bottom: 20px;">
        <a href="{{ route('api-clients.index') }}" style="color:#16C4F4; text-decoration:none; font-size:13.5px; display:inline-flex; align-items:center; gap:6px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"/>
                <polyline points="12 19 5 12 12 5"/>
            </svg>
            Back to API Access Management
        </a>
    </div>

    @if ($errors->any())
        <div class="alert-error" style="background:rgba(239,68,68,.12); border:1px solid rgba(239,68,68,.3); color:#ff8585; padding:14px 18px; border-radius:10px; margin-bottom:22px; font-size:13.5px;">
            <strong style="display:block; margin-bottom:6px;">Please correct the following errors:</strong>
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('api-clients.store') }}" id="create-client-form">
        @csrf

        <div class="form-panel">
            <div class="panel-header">
                <h2>1. Client Information</h2>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="form-label" for="name">Client Name <span style="color:#f87171;">*</span></label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-input"
                        placeholder="e.g. External Audit Partner Corp, Staging Data Pipeline"
                        value="{{ old('name') }}"
                        required
                    >
                    <span class="form-hint">A clear identifier for the application or organization integrating with the API.</span>
                    @error('name')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="description">Description (Optional)</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="3"
                        class="form-textarea"
                        placeholder="Describe the client's integration purpose, contact person, or environment details..."
                    >{{ old('description') }}</textarea>
                    <span class="form-hint">Internal notes describing the consumer's role and purpose.</span>
                </div>

                <div class="form-group">
                    <label class="checkbox-card" style="margin-top:6px;">
                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', '1') ? 'checked' : '' }}
                            id="is_active"
                        >
                        <div>
                            <div class="checkbox-card-label">Active Status</div>
                            <div class="checkbox-card-desc">Enable API access immediately. When inactive, all client requests will be blocked with HTTP 403.</div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-panel">
            <div class="panel-header">
                <h2>2. Module-Level API Permissions</h2>
            </div>
            <div class="panel-body">
                <p style="margin:0 0 14px; font-size:13.5px; color:#8fa2be;">
                    Select which UCL data modules this client is authorized to consume. The IP Whitelist Middleware validates these permissions on every protected endpoint.
                </p>

                <div class="checkbox-card-grid">
                    @php
                        $selectedPermissions = old('permissions', ['frameworks', 'domains', 'controls', 'requirements', 'requirement-evidence-mappings']);
                        $moduleDescriptions = [
                            'frameworks'                    => 'Access regulatory frameworks and compliance standards.',
                            'domains'                       => 'Access categorized security and governance control domains.',
                            'controls'                      => 'Access baseline and compensating controls specification.',
                            'requirements'                  => 'Access audit requirements and framework mappings.',
                            'requirement-evidence-mappings' => 'Access audit evidence specifications and testing procedures.',
                        ];
                    @endphp

                    @foreach($availableModules as $key => $title)
                        <label class="checkbox-card">
                            <input
                                type="checkbox"
                                name="permissions[]"
                                value="{{ $key }}"
                                {{ in_array($key, $selectedPermissions) ? 'checked' : '' }}
                                id="perm-{{ $key }}"
                            >
                            <div>
                                <div class="checkbox-card-label">{{ $title }}</div>
                                <div class="checkbox-card-desc">{{ $moduleDescriptions[$key] ?? 'Access ' . $title . ' endpoints' }}</div>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('permissions')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-panel">
            <div class="panel-header">
                <h2>3. Whitelisted IP Addresses</h2>
            </div>
            <div class="panel-body">
                <p style="margin:0 0 14px; font-size:13.5px; color:#8fa2be;">
                    Specify authorized IPv4 or IPv6 addresses for this client. <strong>One client can have multiple whitelisted IP addresses.</strong> Any API request coming from an IP address not in this list will be rejected with HTTP 403.
                </p>

                <div class="ip-rows-container" id="ip-rows-container">
                    @php
                        $oldIps = old('ips', [
                            ['ip' => '', 'label' => 'Primary Server']
                        ]);
                    @endphp

                    @foreach($oldIps as $index => $oldIp)
                        <div class="ip-row" id="ip-row-{{ $index }}">
                            <input
                                type="text"
                                name="ips[{{ $index }}][ip]"
                                class="form-input ip-input-field"
                                placeholder="IP address (e.g. 203.0.113.10 or 2001:db8::1)"
                                value="{{ $oldIp['ip'] ?? '' }}"
                            >
                            <input
                                type="text"
                                name="ips[{{ $index }}][label]"
                                class="form-input"
                                placeholder="Optional label (e.g. Office HQ, AWS Lambda)"
                                value="{{ $oldIp['label'] ?? '' }}"
                            >
                            <button
                                type="button"
                                class="remove-ip-btn"
                                onclick="removeIpRow(this)"
                                title="Remove IP"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="add-ip-btn" id="btn-add-ip" onclick="addIpRow()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Add Another Whitelisted IP
                </button>
                <span class="form-hint" style="margin-top:10px;">Note: You can also add, edit, or remove IP addresses at any time later in the client management view.</span>
            </div>

            <div class="form-actions">
                <a href="{{ route('api-clients.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary" id="btn-submit-client">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                        <polyline points="17 21 17 13 7 13 7 21"/>
                        <polyline points="7 3 7 8 15 8"/>
                    </svg>
                    Save & Create API Client
                </button>
            </div>
        </div>

    </form>

</div>

<script>
    let ipRowIndex = {{ count($oldIps) }};

    function addIpRow() {
        const container = document.getElementById('ip-rows-container');
        const row = document.createElement('div');
        row.className = 'ip-row';
        row.id = `ip-row-${ipRowIndex}`;
        row.innerHTML = `
            <input
                type="text"
                name="ips[${ipRowIndex}][ip]"
                class="form-input ip-input-field"
                placeholder="IP address (e.g. 203.0.113.11 or 2001:db8::2)"
            >
            <input
                type="text"
                name="ips[${ipRowIndex}][label]"
                class="form-input"
                placeholder="Optional label (e.g. Staging Server, Backup Gateway)"
            >
            <button
                type="button"
                class="remove-ip-btn"
                onclick="removeIpRow(this)"
                title="Remove IP"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        `;
        container.appendChild(row);
        ipRowIndex++;
    }

    function removeIpRow(button) {
        const row = button.closest('.ip-row');
        const container = document.getElementById('ip-rows-container');
        if (container.children.length > 1) {
            row.remove();
        } else {
            // Just clear the inputs if only one row left
            const inputs = row.querySelectorAll('input');
            inputs.forEach(i => i.value = '');
        }
    }
</script>

@endsection
