@extends('layouts.main')

@section('title', 'All Students')

@section('content')
<div class="page-header">
    <h1>👩‍🎓 Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
</div>

<div class="card">
    @if($students->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>
                            @if($student->photo)
                                <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}" class="student-photo">
                            @else
                                <div class="no-photo">{{ strtoupper(substr($student->name, 0, 1)) }}</div>
                            @endif
                        </td>
                        <td><strong>{{ $student->name }}</strong></td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone ?? '—' }}</td>
                        <td><span class="badge">{{ $student->course->name ?? '—' }}</span></td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('students.show', $student) }}" class="btn btn-outline btn-sm">View</a>
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-outline btn-sm">Edit</a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Move this student to trash?')">
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
            <div class="empty-icon">📭</div>
            <p>No students found.</p>
            <a href="{{ route('students.create') }}" class="btn btn-primary">Add First Student</a>
        </div>
    @endif
</div>
@endsection
