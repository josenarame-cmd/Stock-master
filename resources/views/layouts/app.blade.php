<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Route practice') | Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --ink: #202b28; --muted: #6e7974; --paper: #f6f7f2; --white: #fff; --line: #dfe4dc; --green: #316d59; --coral: #e5765c; --soft-green: #e8f0e9; }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: 'DM Sans', sans-serif; font-size: 16px; line-height: 1.55; }
        a { color: inherit; }
        .site-header { border-bottom: 1px solid var(--line); background: rgba(255,255,255,.76); }
        .header-inner, main, .site-footer { width: min(100% - 40px, 940px); margin-inline: auto; }
        .header-inner { min-height: 76px; display: flex; align-items: center; justify-content: space-between; gap: 24px; }
        .brand { display: inline-flex; align-items: center; gap: 11px; color: var(--ink); text-decoration: none; font-weight: 700; }
        .brand-mark { width: 30px; height: 30px; display: grid; place-items: center; background: var(--coral); color: white; font-family: 'DM Mono', monospace; border-radius: 8px; }
        nav { display: flex; align-items: center; gap: 7px; }
        nav a { text-decoration: none; color: var(--muted); font-size: 14px; padding: 8px 11px; border-radius: 5px; }
        nav a:hover, nav a.active { background: var(--soft-green); color: var(--green); }
        main { min-height: calc(100vh - 142px); padding-block: 64px 80px; }
        .intro { max-width: 660px; margin-bottom: 42px; }
        .eyebrow { color: var(--green); font-family: 'DM Mono', monospace; font-size: 12px; text-transform: uppercase; letter-spacing: 0; margin: 0 0 12px; }
        h1, h2, p { margin-top: 0; }
        h1 { font-size: clamp(34px, 7vw, 54px); line-height: 1.04; letter-spacing: 0; margin-bottom: 16px; }
        h2 { font-size: 25px; line-height: 1.2; letter-spacing: 0; margin-bottom: 0; }
        .intro > p:last-child { color: var(--muted); max-width: 520px; margin-bottom: 0; font-size: 18px; }
        .section-heading { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 17px; }
        .route-count, .route-label { color: var(--muted); font-family: 'DM Mono', monospace; font-size: 12px; }
        .page-list { border-top: 1px solid var(--line); }
        .page-link { min-height: 86px; display: grid; grid-template-columns: 48px 1fr auto 20px; align-items: center; gap: 18px; border-bottom: 1px solid var(--line); text-decoration: none; transition: background .18s ease, padding .18s ease; }
        .page-link:hover { background: var(--white); padding-inline: 12px; }
        .page-number { color: var(--coral); font-family: 'DM Mono', monospace; font-size: 13px; }
        .page-info { display: grid; }
        .page-info strong { font-size: 17px; }
        .page-info small { color: var(--muted); font-size: 13px; }
        code, .route-label { font-family: 'DM Mono', monospace; }
        .page-link code, .learning-note code { font-size: 12px; color: var(--green); background: var(--soft-green); padding: 4px 7px; border-radius: 4px; }
        .arrow { color: var(--green); font-size: 18px; }
        .learning-note { display: flex; align-items: flex-start; gap: 14px; margin-top: 38px; padding: 18px 20px; border-left: 3px solid var(--coral); background: #fff; }
        .learning-note p { margin: 0; color: var(--muted); font-size: 14px; }
        .learning-note strong { color: var(--ink); }
        .note-mark { flex: 0 0 24px; height: 24px; display: grid; place-items: center; border-radius: 50%; background: var(--soft-green); color: var(--green); font-weight: 700; }
        .content-panel { background: var(--white); border: 1px solid var(--line); padding: clamp(20px, 5vw, 34px); border-radius: 8px; }
        .content-panel > p { color: var(--muted); }
        .route-label { display: inline-block; margin: 3px 0 24px; color: var(--green); font-size: 12px; }
        .photo { display: block; width: 100%; max-height: 440px; object-fit: cover; border-radius: 5px; }
        .photo-caption { margin: 12px 0 0; color: var(--muted); font-size: 13px; }
        form { display: grid; gap: 18px; max-width: 560px; }
        label { display: grid; gap: 7px; font-size: 14px; font-weight: 600; }
        input, textarea { width: 100%; padding: 11px 12px; border: 1px solid #cbd3cb; border-radius: 5px; background: #fff; color: var(--ink); font: inherit; }
        input:focus, textarea:focus { outline: 2px solid #a9c7b8; border-color: var(--green); }
        textarea { min-height: 120px; resize: vertical; }
        button { justify-self: start; padding: 11px 17px; border: 0; border-radius: 5px; background: var(--green); color: white; font: inherit; font-weight: 600; cursor: pointer; }
        button:hover { background: #245642; }
        .success { padding: 12px 14px; margin-bottom: 20px; background: var(--soft-green); color: var(--green); border-radius: 5px; }
        .errors { color: #a53f2e; font-size: 13px; font-weight: 400; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 14px 12px; border-bottom: 1px solid var(--line); white-space: nowrap; }
        th { color: var(--muted); font-family: 'DM Mono', monospace; font-size: 11px; font-weight: 400; text-transform: uppercase; }
        td { font-size: 14px; }
        .status { display: inline-block; padding: 4px 8px; border-radius: 20px; background: var(--soft-green); color: var(--green); font-size: 12px; }
        .back-link { display: inline-block; margin-top: 25px; color: var(--green); font-size: 14px; text-decoration-thickness: 1px; text-underline-offset: 3px; }
        .site-footer { padding-block: 20px; border-top: 1px solid var(--line); color: var(--muted); font-family: 'DM Mono', monospace; font-size: 11px; }
        @media (max-width: 560px) {
            .header-inner, main, .site-footer { width: min(100% - 28px, 940px); }
            .header-inner { align-items: flex-start; flex-direction: column; padding-block: 15px; gap: 10px; }
            nav { width: 100%; overflow-x: auto; }
            nav a { padding-inline: 9px; }
            main { padding-top: 42px; }
            .page-link { grid-template-columns: 32px 1fr 20px; gap: 10px; }
            .page-link code { display: none; }
            .section-heading { align-items: flex-start; flex-direction: column; gap: 8px; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="{{ route('home') }}"><span class="brand-mark">R</span><span>Route practice</span></a>
            <nav aria-label="Main navigation">
                <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Index</a>
                <a class="{{ request()->routeIs('image') ? 'active' : '' }}" href="{{ route('image') }}">Image</a>
                <a class="{{ request()->routeIs('form*') ? 'active' : '' }}" href="{{ route('form') }}">Form</a>
                <a class="{{ request()->routeIs('table') ? 'active' : '' }}" href="{{ route('table') }}">Table</a>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="site-footer">Laravel routes &middot; Blade views &middot; One small example</footer>
</body>
</html>
