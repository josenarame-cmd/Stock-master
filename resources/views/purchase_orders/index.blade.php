@extends('layouts.main')

@section('title', 'Purchase Orders')

@section('content')
<div class="page-header">
    <h1>📋 Purchase Orders</h1>
    <a href="{{ route('purchase_orders.create') }}" class="btn btn-primary">Add Purchase Order</a>
</div>

<div class="card">
    @if($orders->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Supplier</th>
                        <th>Warehouse</th>
                        <th>Order Date</th>
                        <th>Expected Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td><a href="{{ route('purchase_orders.show', $order) }}">{{ $order->order_number }}</a></td>
                        <td>{{ $order->supplier->name }}</td>
                        <td>{{ $order->warehouse->name }}</td>
                        <td>{{ $order->order_date ? $order->order_date->format('M d, Y') : '—' }}</td>
                        <td>{{ $order->expected_date ? $order->expected_date->format('M d, Y') : '—' }}</td>
                        <td>
                            <span class="badge @if($order->status == 'pending') badge-warning @elseif($order->status == 'received') badge-success @else badge-danger @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            <a href="{{ route('purchase_orders.edit', $order) }}" class="btn btn-sm">Edit</a>
                            <form action="{{ route('purchase_orders.destroy', $order) }}" method="POST" style="display: inline;">
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
            <div class="empty-icon">📋</div>
            <p>No purchase orders found.</p>
            <a href="{{ route('purchase_orders.create') }}" class="btn btn-primary">Create First Purchase Order</a>
        </div>
    @endif
</div>
@endsection
