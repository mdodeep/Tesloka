<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Pemasang Sistem' }} : TESLOKA CBT</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/images/favicon-tesloka-bg-putih.webp') }}">

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
            --color-border-hover: #cbd5e1;
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
            padding: 0.875rem 1.5rem;
            position: sticky;
            top: 0;
            z-index: 30;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.03);
        }
        .header-inner {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .brand-badge {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            transition: opacity 0.15s ease;
        }
        .brand-badge:hover {
            opacity: 0.9;
        }
        .brand-logo {
            height: 2rem;
            max-width: 170px;
            object-fit: contain;
            display: block;
        }
        .header-meta {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .version-pill {
            display: inline-flex;
            align-items: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--color-primary);
            background: rgba(46, 51, 255, 0.08);
            border: 1px solid rgba(46, 51, 255, 0.18);
            padding: 0.2rem 0.625rem;
            border-radius: 9999px;
        }
        .system-tag {
            font-size: 0.75rem;
            color: var(--color-muted);
            font-weight: 500;
        }
        @media (max-width: 640px) {
            .system-tag {
                display: none;
            }
        }
        .installer-container {
            flex: 1;
            max-width: 800px;
            width: 100%;
            margin: 1.75rem auto;
            padding: 0 1rem;
        }

        /* Step Card & Indicator */
        .step-card {
            background: #ffffff;
            border-radius: 0.875rem;
            border: 1px solid var(--color-border);
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.02);
        }
        .step-indicator {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }
        .step-line-bg {
            position: absolute;
            top: 1.125rem;
            left: 2rem;
            right: 2rem;
            height: 3px;
            background: #e2e8f0;
            z-index: 1;
            border-radius: 9999px;
        }
        .step-line-fill {
            height: 100%;
            background: linear-gradient(90deg, #2e33ff 0%, #14bba6 100%);
            border-radius: 9999px;
            transition: width 0.3s ease;
        }
        .step-item {
            position: relative;
            z-index: 2;
            background: #ffffff;
            padding: 0 0.35rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.375rem;
            text-align: center;
        }
        .step-circle {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8125rem;
            font-weight: 700;
            background: #f8fafc;
            border: 2px solid var(--color-border);
            color: var(--color-muted);
            transition: all 0.2s ease;
        }
        .step-circle svg {
            width: 1rem;
            height: 1rem;
        }
        .step-item.active .step-circle {
            background: var(--color-primary);
            border-color: var(--color-primary);
            color: #ffffff;
            box-shadow: 0 0 0 4px rgba(46, 51, 255, 0.16);
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
            letter-spacing: -0.01em;
        }
        .step-item.active .step-title {
            color: var(--color-primary);
            font-weight: 700;
        }
        .step-item.completed .step-title {
            color: var(--color-dark);
        }
        @media (max-width: 640px) {
            .step-card {
                padding: 1rem;
            }
            .step-title {
                display: none;
            }
            .step-circle {
                width: 2rem;
                height: 2rem;
                font-size: 0.75rem;
            }
            .step-line-bg {
                top: 1rem;
                left: 1.5rem;
                right: 1.5rem;
            }
        }

        /* Installer Main Card */
        .installer-card {
            background: #ffffff;
            border-radius: 1rem;
            border: 1px solid var(--color-border);
            box-shadow: 0 4px 20px -2px rgba(20, 33, 61, 0.05), 0 2px 6px -1px rgba(20, 33, 61, 0.03);
            padding: 2rem;
        }
        @media (max-width: 640px) {
            .installer-card {
                padding: 1.25rem;
                border-radius: 0.875rem;
            }
        }

        /* Form Controls & Utilities */
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
            margin-top: 0.375rem;
            line-height: 1.4;
        }
        .form-input {
            width: 100%;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
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
        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364728b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem;
            padding-right: 2.25rem;
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
            box-shadow: 0 1px 2px 0 rgba(46, 51, 255, 0.2);
        }
        .btn-primary:hover {
            background: var(--color-primary-hover);
            transform: translateY(-0.5px);
        }
        .btn-secondary {
            background: #ffffff;
            border: 1px solid var(--color-border);
            color: var(--color-dark);
        }
        .btn-secondary:hover {
            background: var(--color-bg);
            border-color: var(--color-border-hover);
        }
        .btn-accent {
            background: var(--color-accent);
            color: #ffffff;
        }
        .btn-accent:hover {
            opacity: 0.95;
        }
        .btn-disabled {
            opacity: 0.5;
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
        .table-responsive {
            overflow-x: auto;
            border-radius: 0.5rem;
            border: 1px solid var(--color-border);
            margin-bottom: 1.25rem;
        }
        .status-table {
            width: 100%;
            min-width: 580px;
            border-collapse: collapse;
            font-size: 0.8125rem;
        }
        .status-table th {
            text-align: left;
            padding: 0.625rem 0.875rem;
            background: #f8fafc;
            border-bottom: 1px solid var(--color-border);
            font-weight: 600;
            color: var(--color-dark);
            white-space: nowrap;
        }
        .status-table td {
            padding: 0.625rem 0.875rem;
            border-bottom: 1px solid var(--color-border);
            vertical-align: middle;
        }
        .status-table tr:last-child td {
            border-bottom: none;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.2rem 0.55rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            white-space: nowrap;
        }
        .badge-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        .badge-danger {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        .badge-warning {
            background: #fffbeb;
            color: #92400e;
            border: 1px solid #fde68a;
        }
        .alert {
            padding: 0.875rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.25rem;
            font-size: 0.8125rem;
            line-height: 1.5;
            border: 1px solid transparent;
        }
        .alert-info {
            background: #eff6ff;
            border-color: #bfdbfe;
            color: #1e40af;
        }
        .alert-success {
            background: #ecfdf5;
            border-color: #a7f3d0;
            color: #065f46;
        }
        .alert-danger {
            background: #fef2f2;
            border-color: #fecaca;
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
        <div class="header-inner">
            <a href="{{ route('installer.index') }}" class="brand-badge">
                <img src="{{ asset('assets/images/logo-tesloka-cbt.webp') }}" alt="TESLOKA CBT" class="brand-logo">
            </a>
            <div class="header-meta">
                <span class="version-pill">Setup Wizard v1.0</span>
                <span class="system-tag">Sistem Pemasang Terpadu</span>
            </div>
        </div>
    </header>

    <main class="installer-container">
        <!-- Step Progress Card -->
        <div class="step-card">
            <div class="step-indicator">
                <div class="step-line-bg">
                    <div class="step-line-fill" style="width: {{ (($step - 1) / 5) * 100 }}%;"></div>
                </div>
                <div class="step-item {{ $step == 1 ? 'active' : ($step > 1 ? 'completed' : '') }}">
                    <div class="step-circle">
                        @if ($step > 1)
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        @else
                            1
                        @endif
                    </div>
                    <div class="step-title">Prasyarat</div>
                </div>
                <div class="step-item {{ $step == 2 ? 'active' : ($step > 2 ? 'completed' : '') }}">
                    <div class="step-circle">
                        @if ($step > 2)
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        @else
                            2
                        @endif
                    </div>
                    <div class="step-title">Basis Data</div>
                </div>
                <div class="step-item {{ $step == 3 ? 'active' : ($step > 3 ? 'completed' : '') }}">
                    <div class="step-circle">
                        @if ($step > 3)
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        @else
                            3
                        @endif
                    </div>
                    <div class="step-title">Institusi</div>
                </div>
                <div class="step-item {{ $step == 4 ? 'active' : ($step > 4 ? 'completed' : '') }}">
                    <div class="step-circle">
                        @if ($step > 4)
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        @else
                            4
                        @endif
                    </div>
                    <div class="step-title">Admin</div>
                </div>
                <div class="step-item {{ $step == 5 ? 'active' : ($step > 5 ? 'completed' : '') }}">
                    <div class="step-circle">
                        @if ($step > 5)
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        @else
                            5
                        @endif
                    </div>
                    <div class="step-title">Eksekusi</div>
                </div>
                <div class="step-item {{ $step == 6 ? 'active' : ($step > 6 ? 'completed' : '') }}">
                    <div class="step-circle">
                        @if ($step == 6)
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        @else
                            6
                        @endif
                    </div>
                    <div class="step-title">Selesai</div>
                </div>
            </div>
        </div>

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Terdapat kesalahan pada isian formulir:</strong>
                <ul style="margin: 0.375rem 0 0 1.125rem; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
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
