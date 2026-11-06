@extends('layouts.main')

@section('title', 'Trashed Students')

@section('content')
<div class="page-header">
    <h1>🗑 Trashed Students</h1>
    <a href="{{ route('students.index') }}" class="btn btn-outline">← Back to Students</a>
</div>

<div class="card">
    @if($students->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Deleted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td><span class="badge">{{ $student->course->name ?? '—' }}</span></td>
                        <td>{{ $student->deleted_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-btns">
                                {{-- Topic 3: Restore soft-deleted record --}}
                                <form action="{{ route('students.restore', $student->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>

                                {{-- Permanently delete --}}
                                <form action="{{ route('students.forceDelete', $student->id) }}" method="POST"
                                      onsubmit="return confirm('Permanently delete this student? This cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete Forever</button>
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
            <div class="empty-icon">✨</div>
            <p>No trashed students. The recycle bin is empty!</p>
        </div>
    @endif
</div>
@endsection
