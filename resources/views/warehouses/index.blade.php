@extends('layouts.main')

@section('title', 'Warehouses')

@section('content')
<div class="page-header">
    <h1>🏭 Warehouses</h1>
    <a href="{{ route('warehouses.create') }}" class="btn btn-primary">Add Warehouse</a>
</div>

<div class="card">
    @if($warehouses->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Capacity</th>
                        <th>Manager</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warehouses as $warehouse)
                    <tr>
                        <td><a href="{{ route('warehouses.show', $warehouse) }}">{{ $warehouse->name }}</a></td>
                        <td>{{ $warehouse->location }}</td>
                        <td>{{ $warehouse->capacity }}</td>
                        <td>{{ $warehouse->manager->name ?? '—' }}</td>
                        <td>
                            <a href="{{ route('warehouses.edit', $warehouse) }}" class="btn btn-sm">Edit</a>
                            <form action="{{ route('warehouses.destroy', $warehouse) }}" method="POST" style="display: inline;">
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
            <div class="empty-icon">🏭</div>
            <p>No warehouses found.</p>
            <a href="{{ route('warehouses.create') }}" class="btn btn-primary">Create First Warehouse</a>
        </div>
    @endif
</div>
@endsection
