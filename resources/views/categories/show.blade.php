@extends('layouts.main')

@section('title', 'Category Details')

@section('content')
<div class="page-header">
    <h1>Category Details</h1>
    <a href="{{ route('categories.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <div class="detail-row">
        <label>Name:</label>
        <span>{{ $category->name }}</span>
    </div>
    <div class="detail-row">
        <label>Description:</label>
        <span>{{ $category->description ?? '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Created:</label>
        <span>{{ $category->created_at->format('M d, Y') }}</span>
    </div>

    <div style="margin-top: 24px;">
        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection
