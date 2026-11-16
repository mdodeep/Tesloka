<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Pemasang Sistem' }} — TESLOKA CBT</title>

    <style>
        @font-face {
            font-family: 'Sora';
            src: url('/assets/fonts/sora.ttf') format('truetype');
            font-weight: 100 900;
            font-display: swap;
        }
        :root {
            --color-primary: #2e33ff;
            --color-primary-hover: #1f24d9;
            --color-dark: #14213d;
            --color-bg: #f8fafc;
            --color-accent: #14bba6;
            --color-muted: #64728b;
            --color-border: #e2e8f0;
            --color-success: #10b981;
            --color-danger: #ef4444;
            --color-warning: #f59e0b;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Sora', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--color-bg);
            color: var(--color-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }
        .installer-header {
            background: #ffffff;
            border-bottom: 1px solid var(--color-border);
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .brand-badge {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--color-dark);
            font-weight: 700;
            font-size: 1.25rem;
        }
        .brand-badge .logo-circle {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
            background: linear-gradient(135deg, #2e33ff 0%, #14213d 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 800;
            font-size: 1rem;
        }
        .installer-container {
            flex: 1;
            max-width: 860px;
            width: 100%;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .installer-card {
            background: #ffffff;
            border-radius: 1rem;
            border: 1px solid var(--color-border);
            box-shadow: 0 10px 25px -5px rgba(20, 33, 61, 0.05), 0 8px 10px -6px rgba(20, 33, 61, 0.05);
            padding: 2rem;
        }
        @media (max-width: 640px) {
            .installer-card {
                padding: 1.25rem;
            }
        }
        /* Step Indicator */
        .step-indicator {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
        }
        .step-indicator::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 2rem;
            right: 2rem;
            height: 2px;
            background: var(--color-border);
            transform: translateY(-50%);
            z-index: 1;
        }
        .step-item {
            position: relative;
            z-index: 2;
            background: #ffffff;
            padding: 0 0.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
            text-align: center;
        }
        .step-circle {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 700;
            background: var(--color-bg);
            border: 2px solid var(--color-border);
            color: var(--color-muted);
            transition: all 0.2s ease;
        }
        .step-item.active .step-circle {
            background: var(--color-primary);
            border-color: var(--color-primary);
            color: #ffffff;
            box-shadow: 0 0 0 4px rgba(46, 51, 255, 0.15);
        }
        .step-item.completed .step-circle {
            background: var(--color-success);
            border-color: var(--color-success);
            color: #ffffff;
        }
        .step-title {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--color-muted);
        }
        .step-item.active .step-title {
            color: var(--color-primary);
        }
        .step-item.completed .step-title {
            color: var(--color-dark);
        }
        @media (max-width: 640px) {
            .step-title {
                display: none;
            }
        }
        /* Form & Utilities */
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--color-dark);
            margin-bottom: 0.375rem;
        }
        .form-hint {
            font-size: 0.75rem;
            color: var(--color-muted);
            margin-top: 0.25rem;
        }
        .form-input {
            width: 100%;
            padding: 0.625rem 0.875rem;
            font-size: 0.9375rem;
            font-family: inherit;
            border: 1px solid var(--color-border);
            border-radius: 0.5rem;
            background: #ffffff;
            color: var(--color-dark);
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }
        .form-input:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(46, 51, 255, 0.12);
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: inherit;
            border-radius: 0.5rem;
            cursor: pointer;
            text-decoration: none;
            border: 1px solid transparent;
            transition: all 0.15s ease;
        }
        .btn-primary {
            background: var(--color-primary);
            color: #ffffff;
        }
        .btn-primary:hover {
            background: var(--color-primary-hover);
        }
        .btn-secondary {
            background: #ffffff;
            border-color: var(--color-border);
            color: var(--color-dark);
        }
        .btn-secondary:hover {
            background: var(--color-bg);
        }
        .btn-accent {
            background: var(--color-accent);
            color: #ffffff;
        }
        .btn-accent:hover {
            opacity: 0.9;
        }
        .btn-disabled {
            opacity: 0.6;
            cursor: not-allowed;
            pointer-events: none;
        }
        .btn-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--color-border);
            flex-wrap: wrap;
            gap: 0.75rem;
        }
        /* Table & Lists */
        .status-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        .status-table th {
            text-align: left;
            padding: 0.75rem 1rem;
            background: var(--color-bg);
            border-bottom: 1px solid var(--color-border);
            font-weight: 600;
            color: var(--color-dark);
        }
        .status-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--color-border);
            vertical-align: middle;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.625rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-success {
            background: #ecfdf5;
            color: #065f46;
        }
        .badge-danger {
            background: #fef2f2;
            color: #991b1b;
        }
        .badge-warning {
            background: #fffbeb;
            color: #92400e;
        }
        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
            border-left: 4px solid transparent;
        }
        .alert-info {
            background: #eff6ff;
            border-left-color: var(--color-primary);
            color: #1e40af;
        }
        .alert-success {
            background: #ecfdf5;
            border-left-color: var(--color-success);
            color: #065f46;
        }
        .alert-danger {
            background: #fef2f2;
            border-left-color: var(--color-danger);
            color: #991b1b;
        }
        .installer-footer {
            margin-top: auto;
            text-align: center;
            padding: 1.5rem;
            font-size: 0.75rem;
            color: var(--color-muted);
            border-top: 1px solid var(--color-border);
            background: #ffffff;
        }
    </style>
</head>
<body>
    <header class="installer-header">
        <a href="{{ route('installer.index') }}" class="brand-badge">
            <span class="logo-circle">T</span>
            <span>TESLOKA CBT</span>
        </a>
        <div style="font-size: 0.8125rem; color: var(--color-muted);">
            Pemasang Sistem Terpadu (Setup Wizard v1.0)
        </div>
    </header>

    <main class="installer-container">
        <!-- Step Progress -->
        <div class="step-indicator">
            <div class="step-item {{ $step == 1 ? 'active' : ($step > 1 ? 'completed' : '') }}">
                <div class="step-circle">{{ $step > 1 ? '✓' : '1' }}</div>
                <div class="step-title">Prasyarat</div>
            </div>
            <div class="step-item {{ $step == 2 ? 'active' : ($step > 2 ? 'completed' : '') }}">
                <div class="step-circle">{{ $step > 2 ? '✓' : '2' }}</div>
                <div class="step-title">Basis Data</div>
            </div>
            <div class="step-item {{ $step == 3 ? 'active' : ($step > 3 ? 'completed' : '') }}">
                <div class="step-circle">{{ $step > 3 ? '✓' : '3' }}</div>
                <div class="step-title">Institusi</div>
            </div>
            <div class="step-item {{ $step == 4 ? 'active' : ($step > 4 ? 'completed' : '') }}">
                <div class="step-circle">{{ $step > 4 ? '✓' : '4' }}</div>
                <div class="step-title">Admin</div>
            </div>
            <div class="step-item {{ $step == 5 ? 'active' : ($step > 5 ? 'completed' : '') }}">
                <div class="step-circle">{{ $step > 5 ? '✓' : '5' }}</div>
                <div class="step-title">Eksekusi</div>
            </div>
            <div class="step-item {{ $step == 6 ? 'active' : ($step > 6 ? 'completed' : '') }}">
                <div class="step-circle">{{ $step == 6 ? '★' : '6' }}</div>
                <div class="step-title">Selesai</div>
            </div>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="installer-card">
            @yield('content')
        </div>
    </main>

    <footer class="installer-footer">
        Hak Cipta &copy; {{ date('Y') }} TESLOKA CBT. Sistem Ujian Berbasis Komputer On-Premise Single-Tenant.
    </footer>

    @yield('scripts')
</body>
</html>

