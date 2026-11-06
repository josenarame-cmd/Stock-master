@extends('layouts.main')

@section('title', 'Activity Logs')

@section('content')
<div class="page-header">
    <h1>📋 Activity Logs</h1>
    <div>
        <form action="{{ route('activity_logs.clear') }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to clear all activity logs?');">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Clear All Logs</button>
        </form>
    </div>
</div>

{{-- Filter Form --}}
<div class="card" style="margin-bottom: 20px;">
    <form action="{{ route('activity_logs.index') }}" method="GET">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; align-items: end;">
            <div class="form-group" style="margin-bottom: 0;">
                <label for="action">Action</label>
                <select id="action" name="action" class="form-control">
                    <option value="">All Actions</option>
                    @foreach($actions as $action)
                        <option value="{{ $action }}" {{ $filters['action'] ?? '' === $action ? 'selected' : '' }}>{{ ucfirst($action) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label for="user_id">User</label>
                <select id="user_id" name="user_id" class="form-control">
                    <option value="">All Users</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ ($filters['user_id'] ?? '') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label for="date_from">From Date</label>
                <input type="date" id="date_from" name="date_from" class="form-control" value="{{ $filters['date_from'] ?? '' }}">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label for="date_to">To Date</label>
                <input type="date" id="date_to" name="date_to" class="form-control" value="{{ $filters['date_to'] ?? '' }}">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('activity_logs.index') }}" class="btn btn-outline">Reset</a>
            </div>
        </div>
    </form>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Model</th>
                    <th>Description</th>
                    <th>IP Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->created_at ? $log->created_at->format('M d, Y H:i') : '—' }}</td>
                    <td>{{ $log->user ? $log->user->name : 'System' }}</td>
                    <td>
                        <span class="badge @if($log->action === 'created') badge-success @elseif($log->action === 'updated') badge-warning @elseif($log->action === 'deleted') badge-danger @else badge @endif">
                            {{ ucfirst($log->action) }}
                        </span>
                    </td>
                    <td>{{ $log->model_type ? class_basename($log->model_type) : '—' }}</td>
                    <td>{{ $log->description ?? '—' }}</td>
                    <td>{{ $log->ip_address ?? '—' }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('activity_logs.show', $log->id) }}" class="btn btn-sm btn-outline">View</a>
                            <form action="{{ route('activity_logs.destroy', $log->id) }}" method="POST" style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this log entry?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $logs->links() }}
</div>
@endsection
