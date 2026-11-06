@extends('layouts.main')

@section('title', 'Categories')

@section('content')
<div class="page-header">
    <h1>📁 Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
</div>

<div class="card">
    @if($categories->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->description ?? '—' }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state">
            <div class="empty-icon">📁</div>
            <p>No categories found.</p>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Create First Category</a>
        </div>
    @endif
</div>
@endsection
