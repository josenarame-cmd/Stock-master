<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') — StockMaster</title>
    <meta name="description" content="Stock Management System built with Laravel">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ── Reset & Variables ────────────────────────────────── */
        :root {
            --bg: #f0f2f5;
            --surface: #ffffff;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-light: #eef2ff;
            --text: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --success: #059669;
            --success-bg: #ecfdf5;
            --danger: #dc2626;
            --danger-bg: #fef2f2;
            --warning: #d97706;
            --warning-bg: #fffbeb;
            --radius: 8px;
            --shadow: 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.06);
            --shadow-md: 0 4px 6px rgba(0,0,0,.07), 0 2px 4px rgba(0,0,0,.06);
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 15px;
            line-height: 1.6;
            min-height: 100vh;
        }
        a { color: var(--primary); text-decoration: none; }
        a:hover { text-decoration: underline; }

        /* ── Top Navigation ───────────────────────────────────── */
        .top-nav {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            min-height: 60px;
            gap: 32px;
        }
        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--text);
            font-weight: 700;
            font-size: 17px;
            white-space: nowrap;
        }
        .nav-brand .icon {
            width: 34px; height: 34px;
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            border-radius: 8px;
            display: grid; place-items: center;
            color: #fff; font-size: 16px; font-weight: 700;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
            overflow-x: auto;
        }
        .nav-links a {
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            white-space: nowrap;
            transition: all .15s ease;
        }
        .nav-links a:hover { background: var(--primary-light); color: var(--primary); }
        .nav-links a.active { background: var(--primary-light); color: var(--primary); font-weight: 600; }
        .nav-logout {
            padding: 8px 16px;
            background: var(--danger-bg);
            color: var(--danger);
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: all .15s ease;
        }
        .nav-logout:hover { background: var(--danger); color: #fff; }

        .nav-user {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 700;
            font-size: 16px;
            text-decoration: none;
            transition: all .15s ease;
        }
        .user-avatar:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
        }

        /* ── Page Container ───────────────────────────────────── */
        .page-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 28px 20px 60px;
        }

        /* ── Page Header ──────────────────────────────────────── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
        }
        .page-header h1 {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        /* ── Cards ────────────────────────────────────────────── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 24px;
        }

        /* ── Stat Cards ───────────────────────────────────────── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 20px 24px;
        }
        .stat-card .stat-label {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .04em;
        }
        .stat-card .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
            margin-top: 4px;
        }

        /* ── Tables ───────────────────────────────────────────── */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        thead th {
            text-align: left;
            padding: 12px 16px;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .04em;
            border-bottom: 2px solid var(--border);
            white-space: nowrap;
        }
        tbody td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
            vertical-align: middle;
        }
        tbody tr:hover { background: #f8fafc; }
        .student-photo {
            width: 40px; height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border);
        }
        .no-photo {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: grid; place-items: center;
            font-weight: 700;
            font-size: 16px;
        }

        /* ── Buttons ──────────────────────────────────────────── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 18px;
            border: none;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all .15s ease;
            white-space: nowrap;
        }
        .btn:hover { text-decoration: none; }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-hover); }
        .btn-success { background: var(--success); color: #fff; }
        .btn-success:hover { background: #047857; }
        .btn-danger { background: var(--danger); color: #fff; }
        .btn-danger:hover { background: #b91c1c; }
        .btn-outline {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text);
        }
        .btn-outline:hover { background: #f8fafc; border-color: #cbd5e1; }
        .btn-sm { padding: 6px 12px; font-size: 13px; }
        .action-btns { display: flex; gap: 6px; align-items: center; }

        /* ── Forms ─────────────────────────────────────────────── */
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
        }
        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
            color: var(--text);
            background: #fff;
            transition: border-color .15s ease, box-shadow .15s ease;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,70,229,.12);
        }
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748b' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }
        textarea.form-control { min-height: 100px; resize: vertical; }
        .form-text { font-size: 12px; color: var(--text-muted); margin-top: 4px; }

        /* ── Alerts ────────────────────────────────────────────── */
        .alert {
            padding: 14px 18px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        .alert-success { background: var(--success-bg); color: var(--success); border: 1px solid #a7f3d0; }
        .alert-danger  { background: var(--danger-bg);  color: var(--danger);  border: 1px solid #fecaca; }
        .alert-warning { background: var(--warning-bg); color: var(--warning); border: 1px solid #fde68a; }

        /* ── Validation Errors ─────────────────────────────────── */
        .invalid-feedback {
            color: var(--danger);
            font-size: 13px;
            margin-top: 4px;
        }
        .is-invalid { border-color: var(--danger) !important; }

        /* ── Badge ─────────────────────────────────────────────── */
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background: var(--primary-light);
            color: var(--primary);
        }
        .badge-success { background: var(--success-bg); color: var(--success); }
        .badge-danger  { background: var(--danger-bg);  color: var(--danger); }

        /* ── Detail View ──────────────────────────────────────── */
        .detail-grid {
            display: grid;
            grid-template-columns: 160px 1fr;
            gap: 0;
        }
        .detail-grid dt {
            padding: 12px 0;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .03em;
            border-bottom: 1px solid var(--border);
        }
        .detail-grid dd {
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }
        .profile-photo-lg {
            width: 100px; height: 100px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid var(--border);
        }

        /* ── Empty State ──────────────────────────────────────── */
        .empty-state {
            text-align: center;
            padding: 48px 20px;
            color: var(--text-muted);
        }
        .empty-state .empty-icon { font-size: 48px; margin-bottom: 12px; }
        .empty-state p { margin-bottom: 16px; }

        /* ── Footer ───────────────────────────────────────────── */
        .site-footer {
            text-align: center;
            padding: 20px;
            color: var(--text-muted);
            font-size: 12px;
            border-top: 1px solid var(--border);
            margin-top: 40px;
        }

        /* ── Responsive ───────────────────────────────────────── */
        @media (max-width: 640px) {
            .nav-inner { gap: 16px; flex-wrap: wrap; }
            .nav-user { display: none; }
            .page-header { flex-direction: column; align-items: flex-start; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .detail-grid { grid-template-columns: 1fr; }
            .detail-grid dt { border-bottom: none; padding-bottom: 2px; }
            .detail-grid dd { padding-top: 0; }
            .action-btns { flex-wrap: wrap; }
        }
    </style>
</head>
<body>
    {{-- Top Navigation --}}
    <nav class="top-nav">
        <div class="nav-inner">
            <a class="nav-brand" href="{{ route('dashboard') }}">
                <span class="icon">SM</span>
                <span>StockMaster</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">Categories</a>
                <a href="{{ route('suppliers.index') }}" class="{{ request()->routeIs('suppliers.*') ? 'active' : '' }}">Suppliers</a>
                <a href="{{ route('warehouses.index') }}" class="{{ request()->routeIs('warehouses.*') ? 'active' : '' }}">Warehouses</a>
                <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Products</a>
                <a href="{{ route('stocks.index') }}" class="{{ request()->routeIs('stocks.*') ? 'active' : '' }}">Stock</a>
                <a href="{{ route('purchase_orders.index') }}" class="{{ request()->routeIs('purchase_orders.*') ? 'active' : '' }}">Orders</a>
                <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Users</a>
            </div>
            <div class="nav-user">
                <a href="{{ route('profile', ['email' => request()->get('email', 'admin@stock.com')]) }}" class="user-avatar">U</a>
                <a href="{{ route('logout') }}" class="nav-logout">Logout</a>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="page-container">
        {{-- Topic 9: Session Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">✕ {{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

    <footer class="site-footer">
        Stock Management System &middot; Built with Laravel {{ app()->version() }}
    </footer>
</body>
</html>
