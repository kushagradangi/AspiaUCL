@extends('layouts.aspiaUcl')

@section('title', ' | Edit API Client')

@section('page-title', 'Edit API Client: ' . $client->name)

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

    .form-input, .form-textarea {
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

    .form-input:focus, .form-textarea:focus {
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
        <a href="{{ route('api-clients.show', $client) }}" style="color:#16C4F4; text-decoration:none; font-size:13.5px; display:inline-flex; align-items:center; gap:6px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"/>
                <polyline points="12 19 5 12 12 5"/>
            </svg>
            Back to Client Details
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

    <form method="POST" action="{{ route('api-clients.update', $client) }}" id="edit-client-form">
        @csrf
        @method('PUT')

        <div class="form-panel">
            <div class="panel-header">
                <h2>Client Details</h2>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="form-label" for="name">Client Name <span style="color:#f87171;">*</span></label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-input"
                        value="{{ old('name', $client->name) }}"
                        required
                    >
                    <span class="form-hint">A clear identifier for the consumer application or partner organization.</span>
                    @error('name')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="description">Description</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="3"
                        class="form-textarea"
                    >{{ old('description', $client->description) }}</textarea>
                    <span class="form-hint">Optional context regarding usage, contact, or environment.</span>
                </div>

                <div class="form-group">
                    <label class="checkbox-card" style="margin-top:6px;">
                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $client->is_active) ? 'checked' : '' }}
                            id="is_active"
                        >
                        <div>
                            <div class="checkbox-card-label">Active Status</div>
                            <div class="checkbox-card-desc">Enable API access. If unchecked, all requests from this client will be rejected with HTTP 403.</div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-panel">
            <div class="panel-header">
                <h2>Permitted API Modules</h2>
            </div>
            <div class="panel-body">
                <p style="margin:0 0 14px; font-size:13.5px; color:#8fa2be;">
                    Authorize which UCL modules this client is permitted to query.
                </p>

                <div class="checkbox-card-grid">
                    @php
                        $currentPermissions = old('permissions', $client->permissions ?? []);
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
                                {{ in_array($key, $currentPermissions) ? 'checked' : '' }}
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

            <div class="form-actions">
                <a href="{{ route('api-clients.show', $client) }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary" id="btn-save-client">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                        <polyline points="17 21 17 13 7 13 7 21"/>
                        <polyline points="7 3 7 8 15 8"/>
                    </svg>
                    Save Changes
                </button>
            </div>
        </div>

    </form>

</div>

@endsection
