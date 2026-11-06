@extends('layouts.main')

@section('title', 'Purchase Order Details')

@section('content')
<div class="page-header">
    <h1>Purchase Order Details</h1>
    <a href="{{ route('purchase_orders.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <div class="detail-row">
        <label>Order Number:</label>
        <span>{{ $purchaseOrder->order_number }}</span>
    </div>
    <div class="detail-row">
        <label>Supplier:</label>
        <span>{{ $purchaseOrder->supplier->name }}</span>
    </div>
    <div class="detail-row">
        <label>Warehouse:</label>
        <span>{{ $purchaseOrder->warehouse->name }}</span>
    </div>
    <div class="detail-row">
        <label>Order Date:</label>
        <span>{{ $purchaseOrder->order_date ? $purchaseOrder->order_date->format('M d, Y') : '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Expected Date:</label>
        <span>{{ $purchaseOrder->expected_date ? $purchaseOrder->expected_date->format('M d, Y') : '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Status:</label>
        <span>
            <span class="badge @if($purchaseOrder->status == 'pending') badge-warning @elseif($purchaseOrder->status == 'received') badge-success @else badge-danger @endif">
                {{ ucfirst($purchaseOrder->status) }}
            </span>
        </span>
    </div>
    <div class="detail-row">
        <label>Total Amount:</label>
        <span>${{ number_format($purchaseOrder->total_amount, 2) }}</span>
    </div>
    <div class="detail-row">
        <label>Created:</label>
        <span>{{ $purchaseOrder->created_at->format('M d, Y') }}</span>
    </div>

    <div style="margin-top: 24px;">
        <a href="{{ route('purchase_orders.edit', $purchaseOrder) }}" class="btn btn-primary">Edit</a>
    </div>
</div>

@if($purchaseOrder->orderItems->count())
<div class="card" style="margin-top: 24px;">
    <h2 style="margin-bottom: 16px;">Order Items</h2>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchaseOrder->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->unit_price, 2) }}</td>
                    <td>${{ number_format($item->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
