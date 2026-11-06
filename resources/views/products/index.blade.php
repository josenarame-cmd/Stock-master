@extends('layouts.main')

@section('title', 'Products')

@section('content')
<div class="page-header">
    <h1>📦 Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
</div>

<div class="card">
    @if($products->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->sku }}</td>
                        <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->category->name ?? '—' }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
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
            <div class="empty-icon">📦</div>
            <p>No products found.</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Create First Product</a>
        </div>
    @endif
</div>
@endsection
