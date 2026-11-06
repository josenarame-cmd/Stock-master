@extends('layouts.main')

@section('title', 'Edit Warehouse')

@section('content')
<div class="page-header">
    <h1>Edit Warehouse</h1>
    <a href="{{ route('warehouses.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <form action="{{ route('warehouses.update', $warehouse) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $warehouse->name) }}" required>
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="{{ old('location', $warehouse->location) }}" required>
            @error('location') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $warehouse->capacity) }}" min="0" required>
            @error('capacity') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="manager_id">Manager</label>
            <select id="manager_id" name="manager_id">
                <option value="">Select Manager</option>
                @foreach($managers as $manager)
                    <option value="{{ $manager->id }}" {{ old('manager_id', $warehouse->manager_id) == $manager->id ? 'selected' : '' }}>{{ $manager->name }}</option>
                @endforeach
            </select>
            @error('manager_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Warehouse</button>
    </form>
</div>
@endsection
