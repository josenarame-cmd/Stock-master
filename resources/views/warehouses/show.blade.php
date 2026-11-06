@extends('layouts.main')

@section('title', 'Warehouse Details')

@section('content')
<div class="page-header">
    <h1>Warehouse Details</h1>
    <a href="{{ route('warehouses.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <div class="detail-row">
        <label>Name:</label>
        <span>{{ $warehouse->name }}</span>
    </div>
    <div class="detail-row">
        <label>Location:</label>
        <span>{{ $warehouse->location }}</span>
    </div>
    <div class="detail-row">
        <label>Capacity:</label>
        <span>{{ $warehouse->capacity }}</span>
    </div>
    <div class="detail-row">
        <label>Manager:</label>
        <span>{{ $warehouse->manager->name ?? '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Created:</label>
        <span>{{ $warehouse->created_at->format('M d, Y') }}</span>
    </div>

    <div style="margin-top: 24px;">
        <a href="{{ route('warehouses.edit', $warehouse) }}" class="btn btn-primary">Edit</a>
    </div>
</div>

@if($warehouse->stocks->count())
<div class="card" style="margin-top: 24px;">
    <h2 style="margin-bottom: 16px;">Stock in this Warehouse</h2>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Reorder Level</th>
                </tr>
            </thead>
            <tbody>
                @foreach($warehouse->stocks as $stock)
                <tr>
                    <td>{{ $stock->product->name }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->reorder_level }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
