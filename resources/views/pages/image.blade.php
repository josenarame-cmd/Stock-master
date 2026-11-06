@extends('layouts.app')

@section('title', 'Image page')

@section('content')
    <section class="intro">
        <p class="eyebrow">Page 01 / GET route</p>
        <h1>A view with an image.</h1>
        <p>This URL is handled by a route that returns this Blade view.</p>
    </section>

    <article class="content-panel">
        <span class="route-label">GET /image -> pages.image</span>
        <img class="photo" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=1400&q=85" alt="Mountain lake surrounded by forest beneath a clear sky">
        <p class="photo-caption">A sample image rendered by the image page view.</p>
    </article>

    <a class="back-link" href="{{ route('home') }}">&larr; Back to the route index</a>
@endsection
