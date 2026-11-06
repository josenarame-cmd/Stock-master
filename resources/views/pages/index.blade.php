@extends('layouts.app')

@section('title', 'Route practice')

@section('content')
    <section class="intro">
        <p class="eyebrow">Laravel route examples</p>
        <h1>Route practice.</h1>
    </section>

    <section class="route-map" aria-labelledby="route-map-title">
        <div class="section-heading">
            <div>
                <h2 id="route-map-title">Pages</h2>
            </div>
        </div>

        <div class="page-list">
            <a class="page-link" href="{{ route('image') }}">
                <span class="page-number">01</span>
                <span class="page-info"><strong>Image</strong><small>GET -> view</small></span>
                <code>/image</code>
                <span class="arrow" aria-hidden="true">&rarr;</span>
            </a>
            <a class="page-link" href="{{ route('form') }}">
                <span class="page-number">02</span>
                <span class="page-info"><strong>Form</strong><small>GET + POST</small></span>
                <code>/form</code>
                <span class="arrow" aria-hidden="true">&rarr;</span>
            </a>
            <a class="page-link" href="{{ route('table') }}">
                <span class="page-number">03</span>
                <span class="page-info"><strong>Table</strong><small>GET + data</small></span>
                <code>/table</code>
                <span class="arrow" aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </section>

@endsection
