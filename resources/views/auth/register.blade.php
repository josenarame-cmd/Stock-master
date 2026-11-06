<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - StockMaster</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #0a0a0f;
            --bg-secondary: #12121a;
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.7);
            --text-muted: rgba(255, 255, 255, 0.5);
            --accent-primary: #6366f1;
            --accent-secondary: #8b5cf6;
            --border-color: rgba(255, 255, 255, 0.1);
            --card-bg: rgba(255, 255, 255, 0.05);
            --input-bg: rgba(255, 255, 255, 0.05);
        }

        [data-theme="light"] {
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: rgba(30, 41, 59, 0.7);
            --text-muted: rgba(30, 41, 59, 0.5);
            --accent-primary: #6366f1;
            --accent-secondary: #8b5cf6;
            --border-color: rgba(0, 0, 0, 0.1);
            --card-bg: rgba(255, 255, 255, 0.9);
            --input-bg: rgba(0, 0, 0, 0.05);
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
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            padding: 2rem;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(139, 92, 246, 0.1) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }

        [data-theme="light"] .bg-animation::before {
            background: radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(139, 92, 246, 0.05) 0%, transparent 50%);
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-10%, 0) rotate(0deg); }
        }

        .register-container {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 30px;
            padding: 3rem;
            max-width: 500px;
            width: 100%;
            animation: fadeInUp 0.8s ease-out;
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

        .logo {
            text-align: center;
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            text-align: center;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 1rem 1.2rem;
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--accent-primary);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
        }

        .form-group input::placeholder {
            color: var(--text-muted);
        }

        .form-group select {
            cursor: pointer;
        }

        .form-group select option {
            background: var(--bg-secondary);
            color: var(--text-primary);
        }

        .btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 40px rgba(99, 102, 241, 0.4);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border-color);
        }

        .divider span {
            padding: 0 1rem;
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: var(--accent-primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: var(--accent-secondary);
        }

        .features {
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .features h4 {
            color: var(--accent-primary);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .features ul {
            list-style: none;
            padding: 0;
        }

        .features li {
            color: var(--text-secondary);
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--accent-primary);
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>

    <div class="register-container">
        <div class="logo">StockMaster</div>
        <p class="subtitle">Create your account and start managing inventory today.</p>

        <form action="{{ route('dashboard') }}" method="GET">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select your role</option>
                    <option value="manager">Inventory Manager</option>
                    <option value="staff">Warehouse Staff</option>
                </select>
            </div>

            <button type="submit" class="btn">Create Account</button>
        </form>

        <div class="features">
            <h4>What you'll get:</h4>
            <ul>
                <li>Full access to inventory management</li>
                <li>Real-time stock tracking</li>
                <li>Purchase order management</li>
                <li>Multi-warehouse support</li>
                <li>Advanced analytics dashboard</li>
            </ul>
        </div>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="back-link">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>

        <div class="back-link">
            <a href="{{ route('landing') }}">← Back to Home</a>
        </div>
    </div>

    <script>
        // Theme Toggle Functionality
        const html = document.documentElement;
        const savedTheme = localStorage.getItem('theme') || 'dark';
        html.setAttribute('data-theme', savedTheme);
    </script>
</body>
</html>
