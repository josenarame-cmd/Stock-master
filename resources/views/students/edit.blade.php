@extends('layouts.main')

@section('title', 'Edit Student')

@section('content')
<div class="page-header">
    <h1>✏️ Edit Student</h1>
    <a href="{{ route('students.index') }}" class="btn btn-outline">← Back to Students</a>
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

    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Full Name *</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $student->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $student->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                   value="{{ old('phone', $student->phone) }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="course_id">Course *</label>
            <select name="course_id" id="course_id" class="form-control @error('course_id') is-invalid @enderror" required>
                <option value="">— Select a Course —</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }}>
                        {{ $course->name }} ({{ $course->code }})
                    </option>
                @endforeach
            </select>
            @error('course_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="photo">Profile Photo</label>
            @if($student->photo)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Current photo" style="width: 80px; height: 80px; border-radius: 8px; object-fit: cover; border: 2px solid var(--border);">
                    <div class="form-text">Current photo — upload a new one to replace it.</div>
                </div>
            @endif
            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror"
                   accept="image/*">
            <div class="form-text">Optional. Max 2MB. Accepted: JPEG, PNG, JPG, GIF</div>
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: flex; gap: 12px; margin-top: 8px;">
            <button type="submit" class="btn btn-primary">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
