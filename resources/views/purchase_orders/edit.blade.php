@extends('layouts.main')

@section('title', 'Edit Purchase Order')

@section('content')
<div class="page-header">
    <h1>Edit Purchase Order</h1>
    <a href="{{ route('purchase_orders.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <form action="{{ route('purchase_orders.update', $purchaseOrder) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="order_number">Order Number</label>
            <input type="text" id="order_number" name="order_number" value="{{ old('order_number', $purchaseOrder->order_number) }}" required>
            @error('order_number') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select id="supplier_id" name="supplier_id" required>
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $purchaseOrder->supplier_id) == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplier_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="warehouse_id">Warehouse</label>
            <select id="warehouse_id" name="warehouse_id" required>
                <option value="">Select Warehouse</option>
                @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}" {{ old('warehouse_id', $purchaseOrder->warehouse_id) == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                @endforeach
            </select>
            @error('warehouse_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="order_date">Order Date</label>
            <input type="date" id="order_date" name="order_date" value="{{ old('order_date', $purchaseOrder->order_date ? $purchaseOrder->order_date->format('Y-m-d') : '') }}" required>
            @error('order_date') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="expected_date">Expected Date</label>
            <input type="date" id="expected_date" name="expected_date" value="{{ old('expected_date', $purchaseOrder->expected_date ? $purchaseOrder->expected_date->format('Y-m-d') : '') }}">
            @error('expected_date') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="pending" {{ old('status', $purchaseOrder->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="received" {{ old('status', $purchaseOrder->status) == 'received' ? 'selected' : '' }}>Received</option>
                <option value="cancelled" {{ old('status', $purchaseOrder->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('status') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="number" id="total_amount" name="total_amount" step="0.01" value="{{ old('total_amount', $purchaseOrder->total_amount) }}" required>
            @error('total_amount') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Purchase Order</button>
    </form>
</div>
@endsection
