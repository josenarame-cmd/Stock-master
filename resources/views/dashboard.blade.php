@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1>📊 Stock Management Dashboard</h1>
</div>

{{-- Stat Cards --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Products</div>
        <div class="stat-value">{{ $totalProducts }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Suppliers</div>
        <div class="stat-value">{{ $totalSuppliers }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Warehouses</div>
        <div class="stat-value">{{ $totalWarehouses }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Stock</div>
        <div class="stat-value">{{ $totalStock }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Orders</div>
        <div class="stat-value">{{ $totalOrders }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Pending Orders</div>
        <div class="stat-value" style="color: var(--warning);">{{ $pendingOrders }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Low Stock Items</div>
        <div class="stat-value" style="color: var(--danger);">{{ $lowStockItems }}</div>
    </div>
</div>

{{-- Recent Orders --}}
<div class="card">
    <h2 style="margin-bottom: 16px;">Recent Purchase Orders</h2>
    @if($recentOrders->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Supplier</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr>
                        <td><a href="{{ route('purchase_orders.show', $order) }}">{{ $order->order_number }}</a></td>
                        <td>{{ $order->supplier->name }}</td>
                        <td>{{ $order->order_date ? $order->order_date->format('M d, Y') : '—' }}</td>
                        <td>
                            <span class="badge @if($order->status == 'pending') badge-warning @elseif($order->status == 'received') badge-success @else badge-danger @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state">
            <div class="empty-icon">�</div>
            <p>No purchase orders yet. Start by creating suppliers and products.</p>
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Create First Supplier</a>
        </div>
    @endif
</div>
@endsection
