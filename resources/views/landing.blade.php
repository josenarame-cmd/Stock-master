<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Management System - Revolutionize Your Inventory</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #0a0a0f;
            --bg-secondary: #12121a;
            --bg-tertiary: #1a1a2e;
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.7);
            --text-muted: rgba(255, 255, 255, 0.5);
            --accent-primary: #6366f1;
            --accent-secondary: #8b5cf6;
            --accent-tertiary: #a855f7;
            --border-color: rgba(255, 255, 255, 0.1);
            --card-bg: rgba(255, 255, 255, 0.05);
        }

        [data-theme="light"] {
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --bg-tertiary: #f1f5f9;
            --text-primary: #1e293b;
            --text-secondary: rgba(30, 41, 59, 0.7);
            --text-muted: rgba(30, 41, 59, 0.5);
            --accent-primary: #6366f1;
            --accent-secondary: #8b5cf6;
            --accent-tertiary: #a855f7;
            --border-color: rgba(0, 0, 0, 0.1);
            --card-bg: rgba(255, 255, 255, 0.8);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-primary);
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--text-primary);
            transition: background 0.3s ease, color 0.3s ease;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            transition: opacity 0.3s ease;
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(139, 92, 246, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 40% 80%, rgba(168, 85, 247, 0.1) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }

        [data-theme="light"] .bg-animation::before {
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(139, 92, 246, 0.05) 0%, transparent 50%),
                        radial-gradient(circle at 40% 80%, rgba(168, 85, 247, 0.05) 0%, transparent 50%);
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(-5%, -5%) rotate(1deg); }
            50% { transform: translate(-10%, 0) rotate(0deg); }
            75% { transform: translate(-5%, 5%) rotate(-1deg); }
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(10px);
            background: rgba(10, 10, 15, 0.8);
            border-bottom: 1px solid var(--border-color);
            transition: background 0.3s ease;
        }

        [data-theme="light"] nav {
            background: rgba(255, 255, 255, 0.9);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .theme-toggle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
            border-color: var(--accent-primary);
        }

        .btn {
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            cursor: pointer;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--border-color);
            color: var(--text-primary);
        }

        .btn-outline:hover {
            border-color: var(--accent-primary);
            background: rgba(99, 102, 241, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 40px rgba(99, 102, 241, 0.4);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8rem 5% 4rem;
            text-align: center;
        }

        .hero-content {
            max-width: 900px;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-badge {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: rgba(99, 102, 241, 0.2);
            border: 1px solid rgba(99, 102, 241, 0.5);
            border-radius: 50px;
            font-size: 0.85rem;
            margin-bottom: 2rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.4); }
            50% { box-shadow: 0 0 0 10px rgba(99, 102, 241, 0); }
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--text-primary) 0%, var(--text-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero h1 span {
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 50%, var(--accent-tertiary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.3rem;
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 2.5rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .hero-buttons .btn {
            padding: 1rem 2.5rem;
            font-size: 1rem;
        }

        /* Features Section */
        .features {
            padding: 6rem 5%;
            background: var(--bg-secondary);
        }

        .features h2 {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .features p.subtitle {
            text-align: center;
            color: var(--text-secondary);
            margin-bottom: 4rem;
            font-size: 1.1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 2.5rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            opacity: 0;
            transition: 0.4s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: var(--accent-primary);
            box-shadow: 0 20px 60px rgba(99, 102, 241, 0.2);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .feature-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .feature-card p {
            color: var(--text-secondary);
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        /* Stats Section */
        .stats {
            padding: 6rem 5%;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .stat-item {
            animation: fadeInUp 0.8s ease-out;
        }

        .stat-item:nth-child(1) { animation-delay: 0.1s; }
        .stat-item:nth-child(2) { animation-delay: 0.2s; }
        .stat-item:nth-child(3) { animation-delay: 0.3s; }
        .stat-item:nth-child(4) { animation-delay: 0.4s; }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 1rem;
            font-weight: 500;
        }

        /* CTA Section */
        .cta {
            padding: 6rem 5%;
            text-align: center;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15) 0%, rgba(139, 92, 246, 0.15) 100%);
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .cta p {
            color: var(--text-secondary);
            margin-bottom: 2rem;
            font-size: 1.2rem;
        }

        /* Footer */
        footer {
            padding: 3rem 5%;
            text-align: center;
            border-top: 1px solid var(--border-color);
            color: var(--text-muted);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .nav-buttons {
                flex-direction: column;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>

    <nav>
        <a href="/" class="logo">StockMaster</a>
        <div class="nav-buttons">
            <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
                <span id="themeIcon">🌙</span>
            </button>
            <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">🚀 Revolutionize Your Inventory Management</div>
            <h1>Smart Stock Management for <span>Modern Businesses</span></h1>
            <p>Take control of your inventory with our powerful, intuitive stock management system. Track products, manage suppliers, monitor warehouses, and optimize your supply chain - all in one place.</p>
            <div class="hero-buttons">
                <a href="{{ route('register') }}" class="btn btn-primary">Get Started Free</a>
                <a href="{{ route('login') }}" class="btn btn-outline">View Demo</a>
            </div>
        </div>
    </section>

    <section class="features">
        <h2>Powerful Features</h2>
        <p class="subtitle">Everything you need to manage your inventory efficiently</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📦</div>
                <h3>Product Management</h3>
                <p>Organize your product catalog with ease. Track SKUs, pricing, categories, and detailed product information in one centralized system.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏭</div>
                <h3>Multi-Warehouse Support</h3>
                <p>Manage inventory across multiple warehouses. Track stock levels, assign managers, and optimize storage capacity.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏢</div>
                <h3>Supplier Management</h3>
                <p>Build strong relationships with suppliers. Track contact information, manage purchase orders, and monitor delivery status.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Real-time Analytics</h3>
                <p>Get instant insights into your inventory. View stock levels, track low-stock alerts, and monitor order status in real-time.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📋</div>
                <h3>Purchase Orders</h3>
                <p>Streamline your procurement process. Create, track, and manage purchase orders with suppliers efficiently.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Smart Alerts</h3>
                <p>Never run out of stock again. Get automatic notifications when products reach reorder levels.</p>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">5+</div>
                <div class="stat-label">Core Entities</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Cloud Based</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Availability</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">∞</div>
                <div class="stat-label">Scalability</div>
            </div>
        </div>
    </section>

    <section class="cta">
        <h2>Ready to Transform Your Inventory?</h2>
        <p>Join thousands of businesses already using StockMaster to streamline their operations.</p>
        <div class="hero-buttons">
            <a href="{{ route('register') }}" class="btn btn-primary">Start Free Trial</a>
            <a href="{{ route('login') }}" class="btn btn-outline">Login to Account</a>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 StockMaster. Built with Laravel 10. All rights reserved.</p>
    </footer>

    <script>
        // Theme Toggle Functionality
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const html = document.documentElement;

        // Check for saved theme preference or default to dark
        const savedTheme = localStorage.getItem('theme') || 'dark';
        html.setAttribute('data-theme', savedTheme);
        updateThemeIcon(savedTheme);

        themeToggle.addEventListener('click', () => {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        });

        function updateThemeIcon(theme) {
            themeIcon.textContent = theme === 'dark' ? '🌙' : '☀️';
        }
    </script>
</body>
</html>
