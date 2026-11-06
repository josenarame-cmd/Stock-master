@extends('layouts.main')

@section('title', 'Supplier Details')

@section('content')
<div class="page-header">
    <h1>Supplier Details</h1>
    <a href="{{ route('suppliers.index') }}" class="btn">Back</a>
</div>

<div class="card">
    <div class="detail-row">
        <label>Name:</label>
        <span>{{ $supplier->name }}</span>
    </div>
    <div class="detail-row">
        <label>Contact Person:</label>
        <span>{{ $supplier->contact_person ?? '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Email:</label>
        <span>{{ $supplier->email ?? '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Phone:</label>
        <span>{{ $supplier->phone ?? '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Address:</label>
        <span>{{ $supplier->address ?? '—' }}</span>
    </div>
    <div class="detail-row">
        <label>Created:</label>
        <span>{{ $supplier->created_at->format('M d, Y') }}</span>
    </div>

    <div style="margin-top: 24px;">
        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection
