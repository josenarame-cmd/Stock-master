@extends('layouts.main')

@section('title', 'Add Course')

@section('content')
<div class="page-header">
    <h1>➕ Add New Course</h1>
    <a href="{{ route('courses.index') }}" class="btn btn-outline">← Back to Courses</a>
</div>

<div class="card" style="max-width: 600px;">
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul style="margin: 8px 0 0 16px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Course Name *</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" placeholder="e.g. Web Development" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="code">Course Code *</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                   value="{{ old('code') }}" placeholder="e.g. CS101" required>
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                      placeholder="Brief description of the course...">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: flex; gap: 12px; margin-top: 8px;">
            <button type="submit" class="btn btn-primary">Save Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
