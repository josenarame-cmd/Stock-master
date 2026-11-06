@extends('layouts.main')

@section('title', $student->name)

@section('content')
<div class="page-header">
    <h1>👤 {{ $student->name }}</h1>
    <div class="action-btns">
        <a href="{{ route('students.edit', $student) }}" class="btn btn-outline">✏️ Edit</a>
        <a href="{{ route('students.index') }}" class="btn btn-outline">← Back</a>
    </div>
</div>

<div class="card">
    <div style="display: flex; gap: 24px; flex-wrap: wrap; align-items: flex-start;">
        {{-- Profile Photo --}}
        <div>
            @if($student->photo)
                <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}" class="profile-photo-lg">
            @else
                <div class="no-photo" style="width: 100px; height: 100px; border-radius: 12px; font-size: 36px;">
                    {{ strtoupper(substr($student->name, 0, 1)) }}
                </div>
            @endif
        </div>

        {{-- Student Details --}}
        <div style="flex: 1; min-width: 280px;">
            <dl class="detail-grid">
                <dt>Name</dt>
                <dd>{{ $student->name }}</dd>

                <dt>Email</dt>
                <dd><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></dd>

                <dt>Phone</dt>
                <dd>{{ $student->phone ?? 'Not provided' }}</dd>

                {{-- Topic 4: Display the associated course --}}
                <dt>Course</dt>
                <dd>
                    @if($student->course)
                        <a href="{{ route('courses.show', $student->course) }}">
                            <span class="badge">{{ $student->course->name }}</span>
                        </a>
                        <span style="color: var(--text-muted); font-size: 13px;">({{ $student->course->code }})</span>
                    @else
                        <span style="color: var(--text-muted);">No course assigned</span>
                    @endif
                </dd>

                <dt>Enrolled</dt>
                <dd>{{ $student->created_at->format('F d, Y \a\t h:i A') }}</dd>

                <dt>Last Updated</dt>
                <dd>{{ $student->updated_at->format('F d, Y \a\t h:i A') }}</dd>
            </dl>
        </div>
    </div>
</div>
@endsection
