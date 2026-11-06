@extends('layouts.main')

@section('title', 'Activity Log Details')

@section('content')
<div class="page-header">
    <h1>📋 Activity Log Details</h1>
    <a href="{{ route('activity_logs.index') }}" class="btn btn-outline">Back to Logs</a>
</div>

<div class="card">
    <div class="detail-grid">
        <dt>ID</dt>
        <dd>{{ $log->id }}</dd>

        <dt>Date & Time</dt>
        <dd>{{ $log->created_at ? $log->created_at->format('M d, Y H:i:s') : '—' }}</dd>

        <dt>User</dt>
        <dd>{{ $log->user ? $log->user->name . ' (' . $log->user->email . ')' : 'System' }}</dd>

        <dt>Action</dt>
        <dd>
            <span class="badge @if($log->action === 'created') badge-success @elseif($log->action === 'updated') badge-warning @elseif($log->action === 'deleted') badge-danger @else badge @endif">
                {{ ucfirst($log->action) }}
            </span>
        </dd>

        <dt>Model</dt>
        <dd>{{ $log->model_type ? class_basename($log->model_type) . ' #' . $log->model_id : '—' }}</dd>

        <dt>Description</dt>
        <dd>{{ $log->description ?? '—' }}</dd>

        <dt>IP Address</dt>
        <dd>{{ $log->ip_address ?? '—' }}</dd>

        <dt>User Agent</dt>
        <dd style="word-break: break-all;">{{ $log->user_agent ?? '—' }}</dd>

        @if($log->old_values)
        <dt>Old Values</dt>
        <dd>
            <pre style="background: var(--bg); padding: 12px; border-radius: 6px; overflow-x: auto;">{{ json_encode($log->old_values, JSON_PRETTY_PRINT) }}</pre>
        </dd>
        @endif

        @if($log->new_values)
        <dt>New Values</dt>
        <dd>
            <pre style="background: var(--bg); padding: 12px; border-radius: 6px; overflow-x: auto;">{{ json_encode($log->new_values, JSON_PRETTY_PRINT) }}</pre>
        </dd>
        @endif
    </div>
</div>
@endsection
