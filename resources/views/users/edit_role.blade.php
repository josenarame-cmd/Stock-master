@extends('layouts.main')

@section('title', 'Edit User Role')

@section('content')
<div class="page-header">
    <h1>🔧 Edit User Role</h1>
    <a href="{{ route('users.index') }}" class="btn btn-outline">Back to Users</a>
</div>

<div class="card">
    <form action="{{ route('users.update_role', $user->id) }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" id="name" class="form-control" value="{{ $user->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
        </div>

        <div class="form-group">
            <label for="role">Current Role</label>
            <input type="text" id="current_role" class="form-control" value="{{ ucfirst($user->role) }}" disabled>
        </div>

        <div class="form-group">
            <label for="role">New Role</label>
            <select id="role" name="role" class="form-control" required>
                <option value="">Select new role</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrator</option>
                <option value="manager" {{ $user->role === 'manager' ? 'selected' : '' }}>Inventory Manager</option>
                <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Warehouse Staff</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Role</button>
            <a href="{{ route('users.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
