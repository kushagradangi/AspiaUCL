<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'aspiaUCL') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #040914;
            background-image: 
                radial-gradient(ellipse at 50% 40%, #0d2044 0%, #060e20 45%, #040814 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 20px;
            color: #ffffff;
        }

        /* Ambient Wave Lines Background */
        .bg-waves {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .bg-wave-svg {
            position: absolute;
            width: 160%;
            left: -30%;
            height: 100%;
            opacity: 0.45;
        }

        /* Subtle glowing particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: #38bdf8;
            box-shadow: 0 0 10px #38bdf8;
            opacity: 0.35;
            pointer-events: none;
        }

        /* Main Container Card */
        .login-card-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 760px;
            min-height: 440px;
            background: rgba(7, 16, 36, 0.88);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 180, 255, 0.22);
            border-radius: 20px;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.85),
                0 0 35px -8px rgba(0, 150, 255, 0.15),
                inset 0 1px 1px rgba(255, 255, 255, 0.1);
            display: flex;
            overflow: hidden;
        }

        /* Left Column - Branding Panel */
        .brand-panel {
            flex: 0 0 43%;
            background: linear-gradient(175deg, #0a1b3c 0%, #061128 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 36px 28px;
            overflow: hidden;
        }

        .brand-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 60%;
            background: radial-gradient(circle at 50% 20%, rgba(0, 200, 255, 0.14), transparent 70%);
            pointer-events: none;
        }

        .brand-symbol-wrap {
            position: relative;
            margin-bottom: 8px;
            display: inline-block;
        }

        .brand-symbol {
            width: 56px;
            height: 56px;
            object-fit: contain;
            filter: drop-shadow(0 0 15px rgba(0, 210, 255, 0.5));
            transition: transform 0.3s ease;
        }

        .brand-symbol:hover {
            transform: scale(1.05);
        }

        .brand-title {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 12.5px;
            font-weight: 500;
            color: #93c5fd;
            letter-spacing: 0.2px;
            margin-top: 3px;
        }

        /* Circular Shield Badge */
        .security-badge {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #0a1b38;
            border: 1px solid rgba(56, 189, 248, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px auto 16px auto;
            box-shadow: 0 0 14px rgba(56, 189, 248, 0.2);
        }

        .security-badge svg {
            width: 15px;
            height: 15px;
            color: #38bdf8;
        }

        .brand-tagline {
            font-size: 11.5px;
            color: #8fa0be;
            line-height: 1.5;
            max-width: 220px;
        }

        /* Bottom Waves Decoration in Left Column */
        .left-wave-svg {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 65px;
            pointer-events: none;
            opacity: 0.65;
        }

        /* Right Column - Form Panel */
        .form-panel {
            flex: 1;
            background: linear-gradient(180deg, #071126 0%, #050c1c 100%);
            padding: 34px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-logo {
            height: 32px;
            width: auto;
            margin: 0 auto;
            display: block;
            object-fit: contain;
            filter: drop-shadow(0 0 10px rgba(0, 195, 255, 0.3));
        }

        .form-title {
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
            margin-top: 10px;
            letter-spacing: -0.3px;
        }

        .form-desc {
            font-size: 12px;
            color: #8fa0be;
            margin-top: 3px;
        }

        /* Alerts & Status */
        .alert-error {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.35);
            color: #fca5a5;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 12px;
            margin-bottom: 14px;
        }

        .alert-status {
            background: rgba(56, 189, 248, 0.12);
            border: 1px solid rgba(56, 189, 248, 0.35);
            color: #7dd3fc;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 12px;
            margin-bottom: 14px;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #e2e8f0;
            margin-bottom: 5px;
        }

        .required-star {
            color: #38bdf8;
            margin-left: 2px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon-left {
            position: absolute;
            left: 12px;
            width: 15px;
            height: 15px;
            color: #556987;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .form-input {
            width: 100%;
            height: 38px;
            background: #081328;
            border: 1px solid #1c3660;
            border-radius: 7px;
            padding: 8px 12px 8px 36px;
            font-size: 13px;
            color: #ffffff;
            transition: all 0.2s ease;
        }

        .form-input::placeholder {
            color: #435570;
        }

        .form-input:focus {
            outline: none;
            border-color: #38bdf8;
            background: #0a1730;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.22);
        }

        .input-wrapper:focus-within .input-icon-left {
            color: #38bdf8;
        }

        .password-toggle-btn {
            position: absolute;
            right: 10px;
            background: none;
            border: none;
            color: #556987;
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s ease;
        }

        .password-toggle-btn:hover {
            color: #93c5fd;
        }

        .password-toggle-btn svg {
            width: 16px;
            height: 16px;
        }

        /* Autofill dark mode override */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: #ffffff !important;
            -webkit-box-shadow: 0 0 0px 1000px #081328 inset !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Links & Buttons */
        .form-links {
            display: flex;
            justify-content: flex-end;
            margin-top: 3px;
            margin-bottom: 18px;
        }

        .forgot-link {
            font-size: 11.5px;
            color: #60a5fa;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .forgot-link:hover {
            color: #93c5fd;
            text-decoration: underline;
        }

        .btn-signin {
            width: 100%;
            height: 38px;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 50%, #4f46e5 100%);
            border: none;
            border-radius: 7px;
            color: #ffffff;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.4);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-signin:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 22px rgba(37, 99, 235, 0.6);
            filter: brightness(1.08);
        }

        .btn-signin:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-card-container {
                flex-direction: column;
                max-width: 440px;
                min-height: auto;
            }

            .brand-panel {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                padding: 36px 24px;
            }

            .form-panel {
                padding: 32px 24px;
            }
        }
    </style>
</head>
<body>

    <!-- Ambient Waves Background -->
    <div class="bg-waves">
        <svg class="bg-wave-svg" viewBox="0 0 1440 900" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M-100 250 C300 180 600 420 1100 320 C1400 260 1600 340 1800 300" stroke="rgba(0, 180, 255, 0.2)" stroke-width="1.8" />
            <path d="M-100 420 C250 350 700 580 1200 480 C1500 420 1700 500 1800 470" stroke="rgba(56, 189, 248, 0.16)" stroke-width="1.5" />
            <path d="M-100 600 C350 520 800 720 1300 620 C1550 570 1750 640 1800 620" stroke="rgba(0, 163, 255, 0.22)" stroke-width="2" />
            <path d="M-100 680 C400 610 850 800 1350 700 C1600 650 1780 710 1800 700" stroke="rgba(37, 99, 235, 0.18)" stroke-width="1.2" />
        </svg>

        <!-- Ambient Particles -->
        <div class="particle" style="top: 15%; left: 20%; width: 4px; height: 4px;"></div>
        <div class="particle" style="top: 25%; left: 80%; width: 3px; height: 3px;"></div>
        <div class="particle" style="top: 75%; left: 15%; width: 3px; height: 3px;"></div>
        <div class="particle" style="top: 85%; left: 75%; width: 4px; height: 4px;"></div>
        <div class="particle" style="top: 45%; left: 8%; width: 2px; height: 2px;"></div>
        <div class="particle" style="top: 55%; left: 92%; width: 3px; height: 3px;"></div>
    </div>

    <!-- Login Container -->
    <div class="login-card-container">
        
        <!-- Left Branding Panel -->
        <div class="brand-panel">
            <div class="brand-symbol-wrap">
                <img src="{{ asset('images/aspia-icon.png') }}" alt="Aspia Logo" class="brand-symbol">
            </div>

            <h2 class="brand-title">Aspia</h2>
            <p class="brand-subtitle">Unified Control Library</p>

            <div class="security-badge">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="m9 12 2 2 4-4"/>
                </svg>
            </div>

            <p class="brand-tagline">
                Empower your organization to govern risk and ensure compliance.
            </p>

            <!-- Bottom Wave Effect -->
            <svg class="left-wave-svg" viewBox="0 0 380 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 55 C90 40 180 75 380 45" stroke="rgba(0, 195, 255, 0.4)" stroke-width="1.5" />
                <path d="M0 68 C110 50 210 82 380 58" stroke="rgba(0, 195, 255, 0.25)" stroke-width="1.5" />
                <path d="M0 80 C130 65 240 88 380 72" stroke="rgba(0, 195, 255, 0.15)" stroke-width="1.5" />
            </svg>
        </div>

        <!-- Right Form Panel -->
        <div class="form-panel">
            <div class="form-header">
                <img src="{{ asset('images/aspia.png') }}" alt="Aspia" class="form-logo">
                <h1 class="form-title">Welcome back!</h1>
                <p class="form-desc">Sign in to continue to your account</p>
            </div>

            <!-- Session Status Alert -->
            @if (session('status'))
                <div class="alert-status">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Errors Alert -->
            @if ($errors->any())
                <div class="alert-error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" autocomplete="on">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        Email Address <span class="required-star">*</span>
                    </label>
                    <div class="input-wrapper">
                        <svg class="input-icon-left" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            autocomplete="username" 
                            class="form-input" 
                            placeholder="name@example.com"
                        >
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        Password <span class="required-star">*</span>
                    </label>
                    <div class="input-wrapper">
                        <svg class="input-icon-left" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password" 
                            class="form-input" 
                            style="padding-right: 42px;"
                            placeholder="••••••••"
                        >
                        <button 
                            type="button" 
                            id="togglePasswordBtn" 
                            class="password-toggle-btn" 
                            title="Toggle password visibility" 
                            onclick="togglePassword()"
                        >
                            <!-- Eye icon (default) -->
                            <svg id="eyeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <!-- Eye off icon (hidden by default) -->
                            <svg id="eyeSlashIcon" style="display: none;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                                <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                                <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                                <line x1="2" x2="22" y1="2" y2="22"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Forgot Password -->
                <div class="form-links">
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @else
                        <a class="forgot-link" href="#">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-signin">
                    Sign in
                </button>
            </form>
        </div>

    </div>

    <!-- Password visibility toggle script -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                eyeIcon.style.display = 'block';
                eyeSlashIcon.style.display = 'none';
            }
        }
    </script>
</body>
</html>
