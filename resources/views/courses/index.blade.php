@extends('layouts.main')

@section('title', 'All Courses')

@section('content')
<div class="page-header">
    <h1>📚 Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">+ Add Course</a>
</div>

<div class="card">
    @if($courses->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td><span class="badge">{{ $course->code }}</span></td>
                        <td><strong>{{ $course->name }}</strong></td>
                        <td>{{ Str::limit($course->description, 60) ?? '—' }}</td>
                        <td>{{ $course->students_count }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('courses.show', $course) }}" class="btn btn-outline btn-sm">View</a>
                                <a href="{{ route('courses.edit', $course) }}" class="btn btn-outline btn-sm">Edit</a>
                                <form action="{{ route('courses.destroy', $course) }}" method="POST"
                                      onsubmit="return confirm('Delete this course? All students in this course will also be deleted.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state">
            <div class="empty-icon">📖</div>
            <p>No courses created yet.</p>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">Create First Course</a>
        </div>
    @endif
</div>
@endsection
