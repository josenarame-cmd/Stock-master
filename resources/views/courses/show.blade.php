@extends('layouts.main')

@section('title', $course->name)

@section('content')
<div class="page-header">
    <h1>📖 {{ $course->name }}</h1>
    <div class="action-btns">
        <a href="{{ route('courses.edit', $course) }}" class="btn btn-outline">✏️ Edit</a>
        <a href="{{ route('courses.index') }}" class="btn btn-outline">← Back</a>
    </div>
</div>

<div class="card" style="margin-bottom: 24px;">
    <dl class="detail-grid">
        <dt>Course Name</dt>
        <dd>{{ $course->name }}</dd>

        <dt>Code</dt>
        <dd><span class="badge">{{ $course->code }}</span></dd>

        <dt>Description</dt>
        <dd>{{ $course->description ?? 'No description provided.' }}</dd>

        <dt>Created</dt>
        <dd>{{ $course->created_at->format('F d, Y') }}</dd>
    </dl>
</div>

{{-- Topic 4: One-to-Many — show all students enrolled in this course --}}
<div class="card">
    <h2 style="margin-bottom: 16px;">Enrolled Students ({{ $course->students->count() }})</h2>

    @if($course->students->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Enrolled</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course->students as $student)
                    <tr>
                        <td>
                            @if($student->photo)
                                <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}" class="student-photo">
                            @else
                                <div class="no-photo">{{ strtoupper(substr($student->name, 0, 1)) }}</div>
                            @endif
                        </td>
                        <td><a href="{{ route('students.show', $student) }}">{{ $student->name }}</a></td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state" style="padding: 24px;">
            <p>No students enrolled in this course yet.</p>
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">Add Student</a>
        </div>
    @endif
</div>
@endsection
