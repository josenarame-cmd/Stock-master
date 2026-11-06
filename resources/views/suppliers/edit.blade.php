@extends('layouts.main')

@section('title', 'Edit Supplier')

@section('content')
<div class="page-header">
    <h1>Edit Supplier</h1>
    <a href="{{ route('suppliers.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="contact_person">Contact Person</label>
            <input type="text" id="contact_person" name="contact_person" value="{{ old('contact_person', $supplier->contact_person) }}">
            @error('contact_person') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $supplier->email) }}">
            @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $supplier->phone) }}">
            @error('phone') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" rows="3">{{ old('address', $supplier->address) }}</textarea>
            @error('address') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Supplier</button>
    </form>
</div>
@endsection
