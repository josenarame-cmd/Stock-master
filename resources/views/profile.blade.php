@extends('layouts.main')

@section('title', 'Profile')

@section('content')
<div class="page-header">
    <h1>👤 User Profile</h1>
</div>

<div class="card">
    <form action="{{ route('profile.update', $user->id) }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" id="role" class="form-control" value="{{ ucfirst($user->role) }}" disabled>
            <p class="form-text">Role cannot be changed</p>
        </div>

        <div class="form-group">
            <label for="password">New Password (leave blank to keep current)</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Profile</button>
            <a href="{{ route('dashboard') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
