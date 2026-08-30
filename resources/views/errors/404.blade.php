<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Not Found | Aspia UCL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #0b1120;
            --bg-card: #131d33;
            --border-color: #1e293b;
            --accent-cyan: #06b6d4;
            --accent-purple: #8b5cf6;
            --accent-amber: #f59e0b;
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-primary);
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(6, 182, 212, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(139, 92, 246, 0.08) 0%, transparent 40%);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .error-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 48px 40px;
            max-width: 560px;
            width: 100%;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .error-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-cyan), var(--accent-purple), var(--accent-amber));
        }

        .error-icon-box {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: rgba(245, 158, 11, 0.12);
            border: 1px solid rgba(245, 158, 11, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 24px;
        }

        .error-code {
            font-family: 'JetBrains Mono', monospace;
            font-size: 13px;
            font-weight: 700;
            color: var(--accent-amber);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .error-title {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 14px;
            color: var(--text-primary);
        }

        .error-message {
            font-size: 15px;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 32px;
            background: rgba(15, 23, 42, 0.6);
            padding: 16px 20px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            word-break: break-word;
        }

        .error-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(6, 182, 212, 0.35);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6, 182, 212, 0.5);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.06);
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="error-icon-box">⚠️</div>
        <div class="error-code">404 NOT FOUND</div>
        <h1 class="error-title">No Template Available</h1>
        <p class="error-message">
            {{ $exception->getMessage() ?: 'No template has been created or configured for this record yet. Please insert an HTML template via the admin management section.' }}
        </p>
        <div class="error-actions">
            <button onclick="history.back()" class="btn btn-secondary">
                ← Go Back
            </button>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                Go to Dashboard →
            </a>
        </div>
    </div>
</body>
</html>
