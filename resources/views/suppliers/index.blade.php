@extends('layouts.main')

@section('title', 'Suppliers')

@section('content')
<div class="page-header">
    <h1>🏢 Suppliers</h1>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add Supplier</a>
</div>

<div class="card">
    @if($suppliers->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact Person</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td><a href="{{ route('suppliers.show', $supplier) }}">{{ $supplier->name }}</a></td>
                        <td>{{ $supplier->contact_person ?? '—' }}</td>
                        <td>{{ $supplier->email ?? '—' }}</td>
                        <td>{{ $supplier->phone ?? '—' }}</td>
                        <td>
                            <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-sm">Edit</a>
                            <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display: inline;">
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
            <div class="empty-icon">🏢</div>
            <p>No suppliers found.</p>
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Create First Supplier</a>
        </div>
    @endif
</div>
@endsection
