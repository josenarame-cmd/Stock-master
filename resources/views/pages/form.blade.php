@extends('layouts.app')

@section('title', 'Form page')

@section('content')
    <section class="intro">
        <p class="eyebrow">Page 02 / GET + POST routes</p>
        <h1>A form with a route.</h1>
        <p>The page loads with GET. Submitting sends a POST request to a different route.</p>
    </section>

    <section class="content-panel">
        <span class="route-label">GET /form -> pages.form</span>

        @if (session('success'))
            <p class="success" role="status">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('form.submit') }}">
            @csrf
            <label for="name">Name
                <input id="name" name="name" type="text" value="{{ old('name') }}" required maxlength="80" autocomplete="name">
                @error('name') <span class="errors">{{ $message }}</span> @enderror
            </label>
            <label for="email">Email
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email') <span class="errors">{{ $message }}</span> @enderror
            </label>
            <label for="message">Message
                <textarea id="message" name="message" required maxlength="500">{{ old('message') }}</textarea>
                @error('message') <span class="errors">{{ $message }}</span> @enderror
            </label>
            <button type="submit">Send example form</button>
        </form>
    </section>

    <a class="back-link" href="{{ route('home') }}">&larr; Back to the route index</a>
@endsection
