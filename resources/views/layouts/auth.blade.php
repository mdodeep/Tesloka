<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    @php
        $systemInstitution = \App\Models\Institution::first();
        $systemLogoUrl = $systemInstitution?->logo_url ?? asset('assets/images/logo-tesloka-cbt.webp');
        $systemFaviconUrl = $systemInstitution?->favicon_url ?? asset('assets/images/favicon-tesloka-bg-putih.webp');
        $systemInstName = \App\Models\SystemSetting::get('app.name', $systemInstitution?->name ?? 'TESLOKA CBT');
        $systemTagline = \App\Models\SystemSetting::get('app.tagline', 'Sistem Evaluasi & Ujian Berbasis Komputer On-Premise');
        $isStaff = request()->is('staff*') || request()->routeIs('staff.*');
        $bgFile = $isStaff
            ? \App\Models\SystemSetting::get('branding.staff_login_bg')
            : \App\Models\SystemSetting::get('branding.student_login_bg');
        $customInstructions = $isStaff
            ? \App\Models\SystemSetting::get('branding.staff_login_instructions')
            : \App\Models\SystemSetting::get('branding.student_login_instructions');
    @endphp
    <title>@yield('title', 'Autentikasi') — {{ $systemInstName }}</title>
    <link rel="icon" type="image/x-icon" href="{{ $systemFaviconUrl }}">
    <style>
        @font-face {
            font-family: 'Sora';
            src: url('{{ asset('assets/fonts/sora.ttf') }}') format('truetype');
            font-display: swap;
        }
        body {
            font-family: 'Sora', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            @if($bgFile)
            background-image: url('{{ asset('storage/' . $bgFile) }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            @endif
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-cbt.branding-styles />
</head>
<body class="min-h-screen flex items-center justify-center p-4 {{ $bgFile ? 'bg-default-900/60 backdrop-blur-xs' : 'bg-default-50' }}">
    <div class="w-full max-w-md z-10 mx-auto">
        <!-- Logo -->
        <div class="text-center mb-6">
            <a href="/" class="inline-block">
                <img src="{{ $systemLogoUrl }}" alt="{{ $systemInstName }}" class="h-10 mx-auto object-contain max-w-[220px]">
            </a>
        </div>

        @if($customInstructions)
            <div class="mb-4 p-3 bg-info/10 border border-info/30 rounded text-xs text-info leading-relaxed">
                {!! nl2br(e($customInstructions)) !!}
            </div>
        @endif

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="mb-4 p-4 rounded bg-success/10 border border-success/30 text-success text-sm flex items-center gap-2">
                <i data-lucide="check-circle" class="size-5 shrink-0 text-success"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('warning'))
            <div class="mb-4 p-4 rounded bg-warning/10 border border-warning/30 text-warning text-sm flex items-center gap-2">
                <i data-lucide="alert-triangle" class="size-5 shrink-0 text-warning"></i>
                <span>{{ session('warning') }}</span>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="mb-4 p-4 rounded bg-danger/10 border border-danger/30 text-danger text-sm">
                <div class="font-semibold mb-1 flex items-center gap-2">
                    <i data-lucide="alert-octagon" class="size-5 shrink-0 text-danger"></i>
                    Terjadi Kesalahan
                </div>
                <ul class="list-disc list-inside space-y-1 text-xs">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Tailwick Card Container -->
        <div class="card shadow-sm">
            <div class="card-body p-6 sm:p-8">
                @yield('content')
            </div>
        </div>

        <div class="mt-6 text-center text-xs text-default-400">
            &copy; {{ date('Y') }} {{ $systemInstName }} &bull; TESLOKA CBT
        </div>
    </div>
</body>
</html>
