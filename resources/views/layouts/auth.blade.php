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
<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 {{ $bgFile ? 'bg-default-900/60 backdrop-blur-xs' : 'bg-default-50' }}">
    <div class="w-full max-w-md z-10 mx-auto">
        <!-- Logo & Brand Header -->
        <div class="text-center mb-6">
            <a href="/" class="inline-block hover:opacity-95 transition">
                <img src="{{ $systemLogoUrl }}" alt="{{ $systemInstName }}" class="h-10 sm:h-11 mx-auto object-contain max-w-[220px]">
            </a>
        </div>

        @if($customInstructions)
            <div class="mb-4 p-3.5 bg-sky-50 border border-sky-200 rounded-xl text-xs text-sky-900 leading-relaxed shadow-2xs">
                {!! nl2br(e($customInstructions)) !!}
            </div>
        @endif

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="mb-4 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-sm flex items-center gap-3 shadow-2xs">
                <i data-lucide="check-circle" class="size-5 shrink-0 text-emerald-600"></i>
                <span class="font-medium text-xs sm:text-sm">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('warning'))
            <div class="mb-4 p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-900 text-sm flex items-center gap-3 shadow-2xs">
                <i data-lucide="alert-triangle" class="size-5 shrink-0 text-amber-600"></i>
                <span class="font-medium text-xs sm:text-sm">{{ session('warning') }}</span>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="mb-4 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-900 text-sm shadow-2xs">
                <div class="font-bold mb-1.5 flex items-center gap-2 text-xs sm:text-sm">
                    <i data-lucide="alert-octagon" class="size-5 shrink-0 text-rose-600"></i>
                    <span>Terdapat Kesalahan Input</span>
                </div>
                <ul class="list-disc list-inside space-y-1 text-xs text-rose-800">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card Container -->
        <div class="card rounded-2xl shadow-xl border border-default-200/90 bg-white overflow-hidden">
            <div class="card-body p-6 sm:p-8">
                @yield('content')
            </div>
        </div>

        <div class="mt-6 text-center text-xs text-default-400 font-medium">
            &copy; {{ date('Y') }} {{ $systemInstName }} &bull; TESLOKA CBT
        </div>
    </div>
</body>
</html>
