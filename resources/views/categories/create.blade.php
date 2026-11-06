@extends('layouts.main')

@section('title', 'Create Category')

@section('content')
<div class="page-header">
    <h1>Create Category</h1>
    <a href="{{ route('categories.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3">{{ old('description') }}</textarea>
            @error('description') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>
@endsection
