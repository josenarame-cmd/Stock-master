@extends('layouts.main')

@section('title', 'Edit Course')

@section('content')
<div class="page-header">
    <h1>✏️ Edit Course</h1>
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

    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Course Name *</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $course->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="code">Course Code *</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                   value="{{ old('code', $course->code) }}" required>
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $course->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: flex; gap: 12px; margin-top: 8px;">
            <button type="submit" class="btn btn-primary">Update Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
