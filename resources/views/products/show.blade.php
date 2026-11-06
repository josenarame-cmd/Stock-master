@extends('layouts.main')

@section('title', 'Product Details')

@section('content')
<div class="page-header">
    <h1>Product Details</h1>
    <a href="{{ route('products.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <div class="detail-row">
        <label>SKU:</label>
        <span>{{ $product->sku }}</span>
    </div>
    <div class="detail-row">
        <label>Name:</label>
        <span>{{ $product->name }}</span>
    </div>
    <div class="detail-row">
        <label>Description:</label>
        <span>{{ $product->description ?? '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Price:</label>
        <span>${{ number_format($product->price, 2) }}</span>
    </div>
    <div class="detail-row">
        <label>Category:</label>
        <span>{{ $product->category->name ?? '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Created:</label>
        <span>{{ $product->created_at->format('M d, Y') }}</span>
    </div>

    <div style="margin-top: 24px;">
        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
    </div>
</div>

@if($product->stocks->count())
<div class="card" style="margin-top: 24px;">
    <h2 style="margin-bottom: 16px;">Stock by Warehouse</h2>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Warehouse</th>
                    <th>Quantity</th>
                    <th>Reorder Level</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->stocks as $stock)
                <tr>
                    <td>{{ $stock->warehouse->name }}</td>
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
