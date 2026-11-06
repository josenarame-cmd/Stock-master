@extends('layouts.main')

@section('title', 'Edit Product')

@section('content')
<div class="page-header">
    <h1>Edit Product</h1>
    <a href="{{ route('products.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" required>
            @error('sku') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
            @error('description') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
            @error('price') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
