@extends('layouts.main')

@section('title', 'Edit Stock')

@section('content')
<div class="page-header">
    <h1>Edit Stock Record</h1>
    <a href="{{ route('stocks.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <form action="{{ route('stocks.update', $stock) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_id">Product</label>
            <select id="product_id" name="product_id" required>
                <option value="">Select Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id', $stock->product_id) == $product->id ? 'selected' : '' }}>{{ $product->name }} ({{ $product->sku }})</option>
                @endforeach
            </select>
            @error('product_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="warehouse_id">Warehouse</label>
            <select id="warehouse_id" name="warehouse_id" required>
                <option value="">Select Warehouse</option>
                @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}" {{ old('warehouse_id', $stock->warehouse_id) == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                @endforeach
            </select>
            @error('warehouse_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $stock->quantity) }}" min="0" required>
            @error('quantity') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="reorder_level">Reorder Level</label>
            <input type="number" id="reorder_level" name="reorder_level" value="{{ old('reorder_level', $stock->reorder_level) }}" min="0" required>
            @error('reorder_level') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Stock Record</button>
    </form>
</div>
@endsection
