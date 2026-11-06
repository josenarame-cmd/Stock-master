@extends('layouts.app')

@section('title', 'Table page')

@section('content')
    <section class="intro">
        <p class="eyebrow">Page 03 / GET route with data</p>
        <h1>A table from route data.</h1>
        <p>The route prepares an array and passes it into this view. Blade loops over each row.</p>
    </section>

    <section class="content-panel">
        <span class="route-label">GET /table -> pages.table</span>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr><th>Name</th><th>Role</th><th>Status</th></tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person['name'] }}</td>
                            <td>{{ $person['role'] }}</td>
                            <td><span class="status">{{ $person['status'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <a class="back-link" href="{{ route('home') }}">&larr; Back to the route index</a>
@endsection
