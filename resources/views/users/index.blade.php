@extends('layouts.main')

@section('title', 'User Management')

@section('content')
<div class="page-header">
    <h1>👥 User Management</h1>
    <a href="{{ route('register') }}" class="btn btn-primary">Add New User</a>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge @if($user->role === 'admin') badge-danger @elseif($user->role === 'manager') badge-success @else badge-warning @endif">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td>{{ $user->created_at ? $user->created_at->format('M d, Y') : '—' }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('users.edit_role', $user->id) }}" class="btn btn-sm btn-outline">Edit Role</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
