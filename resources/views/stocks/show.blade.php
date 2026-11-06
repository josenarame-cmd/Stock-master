@extends('layouts.main')

@section('title', 'Stock Details')

@section('content')
<div class="page-header">
    <h1>Stock Details</h1>
    <a href="{{ route('stocks.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <div class="detail-row">
        <label>Product:</label>
        <span>{{ $stock->product->name }} ({{ $stock->product->sku }})</span>
    </div>
    <div class="detail-row">
        <label>Warehouse:</label>
        <span>{{ $stock->warehouse->name }}</span>
    </div>
    <div class="detail-row">
        <label>Quantity:</label>
        <span>{{ $stock->quantity }}</span>
    </div>
    <div class="detail-row">
        <label>Reorder Level:</label>
        <span>{{ $stock->reorder_level }}</span>
    </div>
    <div class="detail-row">
        <label>Status:</label>
        <span>
            @if($stock->quantity <= $stock->reorder_level)
                <span class="badge badge-danger">Low Stock</span>
            @else
                <span class="badge badge-success">OK</span>
            @endif
        </span>
    </div>
    <div class="detail-row">
        <label>Created:</label>
        <span>{{ $stock->created_at->format('M d, Y') }}</span>
    </div>

    <div style="margin-top: 24px;">
        <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection
