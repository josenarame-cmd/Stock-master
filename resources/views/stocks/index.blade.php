@extends('layouts.main')

@section('title', 'Stock')

@section('content')
<div class="page-header">
    <h1>📊 Stock Levels</h1>
    <a href="{{ route('stocks.create') }}" class="btn btn-primary">Add Stock</a>
</div>

<div class="card">
    @if($stocks->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Warehouse</th>
                        <th>Quantity</th>
                        <th>Reorder Level</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stocks as $stock)
                    <tr>
                        <td>{{ $stock->product->name }}</td>
                        <td>{{ $stock->warehouse->name }}</td>
                        <td>{{ $stock->quantity }}</td>
                        <td>{{ $stock->reorder_level }}</td>
                        <td>
                            @if($stock->quantity <= $stock->reorder_level)
                                <span class="badge badge-danger">Low Stock</span>
                            @else
                                <span class="badge badge-success">OK</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-sm">Edit</a>
                            <form action="{{ route('stocks.destroy', $stock) }}" method="POST" style="display: inline;">
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
            <div class="empty-icon">📊</div>
            <p>No stock records found.</p>
            <a href="{{ route('stocks.create') }}" class="btn btn-primary">Create First Stock Record</a>
        </div>
    @endif
</div>
@endsection
