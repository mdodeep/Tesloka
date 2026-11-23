<!DOCTYPE html>
<html lang="id" data-theme="light" data-sidenav-color="light" data-sidenav-size="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    @php
        $systemInstitution = \App\Models\Institution::first();
        $systemLogoUrl = $systemInstitution?->logo_url ?? asset('assets/images/logo-tesloka-cbt.webp');
        $systemFaviconUrl = $systemInstitution?->favicon_url ?? asset('assets/images/favicon-tesloka-bg-putih.webp');
        $systemInstName = \App\Models\SystemSetting::get('app.name', $systemInstitution?->name ?? 'TESLOKA CBT');
    @endphp
    <title>@yield('title', 'Portal Staf') : {{ $systemInstName }}</title>
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
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-cbt.branding-styles />
    <script>
        (function() {
            try {
                if (window.innerWidth <= 1024) {
                    document.documentElement.setAttribute('data-sidenav-size', 'offcanvas');
                } else {
                    const savedSize = localStorage.getItem('tesloka_sidenav_size') || 'default';
                    document.documentElement.setAttribute('data-sidenav-size', savedSize);
                }
            } catch(e) {}
        })();
    </script>
</head>
<body class="antialiased font-body font-normal text-sm leading-normal bg-default-50 text-default-800">
    <div class="wrapper">
        <!-- Sidebar Navigation (Sidebar Navigation) -->
        <aside id="app-menu" class="app-menu bg-card border-e border-default-200">
            <!-- Brand Logo & Mobile Close Button -->
            <div class="logo-box sticky top-0 flex min-h-topbar-height items-center justify-between px-5 bg-card border-b border-default-200 z-10 transition-all">
                <a href="{{ route('staff.dashboard') }}" class="flex items-center">
                    <img src="{{ $systemLogoUrl }}" alt="{{ $systemInstName }}" class="logo-lg h-8 max-w-[170px] object-contain">
                    <img src="{{ $systemFaviconUrl }}" alt="{{ $systemInstName }}" class="logo-sm h-8 w-8 object-contain mx-auto">
                </a>
                <button type="button" id="button-close-mobile-menu" class="lg:hidden btn btn-icon size-8 rounded-full bg-default-100 hover:bg-default-200 text-default-600 inline-flex items-center justify-center cursor-pointer transition" aria-label="Tutup Menu">
                    <i data-lucide="x" class="size-4"></i>
                </button>
            </div>

            <!-- Sidenav Menu Items -->
            <div class="relative min-h-0 flex-grow">
                <div class="size-full sidebar-scroll" id="staffSidebarNav">
                    <ul class="side-nav p-3">
                        <!-- 1. OVERVIEW -->
                        <li class="menu-title">
                            <span>Overview</span>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.dashboard') }}" class="menu-link {{ request()->routeIs('staff.dashboard') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="layout-dashboard" class="size-4.5"></i></span>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>

                        <!-- 2. MASTER DATA -->
                        @if(auth('staff')->user()->hasRole(['admin', 'super_admin', 'institution_admin']))
                            <li class="menu-title">
                                <span>Master Data</span>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.academic.index') }}" class="menu-link {{ request()->routeIs('staff.academic.*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="building-2" class="size-4.5"></i></span>
                                    <span class="menu-text">Struktur Akademik</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.users.index') }}" class="menu-link {{ request()->routeIs('staff.users.*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="users" class="size-4.5"></i></span>
                                    <span class="menu-text">Manajemen Pengguna</span>
                                </a>
                            </li>
                        @endif

                        <!-- 3. KONTEN & ASESMEN -->
                        <li class="menu-title">
                            <span>Konten &amp; Asesmen</span>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.question-banks.index') }}" class="menu-link {{ request()->routeIs('staff.question-banks.*', 'staff.questions.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="file-question" class="size-4.5"></i></span>
                                <span class="menu-text">Bank Soal &amp; Konten</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.media.index') }}" class="menu-link {{ request()->routeIs('staff.media.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="image" class="size-4.5"></i></span>
                                <span class="menu-text">Pustaka Media</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.exams.index') }}" class="menu-link {{ request()->routeIs('staff.exams.*') && !request()->routeIs('staff.exams.grading.*', 'staff.exams.reports.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="file-text" class="size-4.5"></i></span>
                                <span class="menu-text">Perancangan Ujian</span>
                            </a>
                        </li>

                        <!-- 4. PELAKSANAAN CBT -->
                        <li class="menu-title">
                            <span>Pelaksanaan CBT</span>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.rooms.index') }}" class="menu-link {{ request()->routeIs('staff.rooms.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="door-open" class="size-4.5"></i></span>
                                <span class="menu-text">Ruang Ujian</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.sessions.index') }}" class="menu-link {{ request()->routeIs('staff.sessions.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="calendar-clock" class="size-4.5"></i></span>
                                <span class="menu-text">Sesi &amp; Penjadwalan</span>
                            </a>
                        </li>

                        <!-- 5. EVALUASI & KELULUSAN -->
                        <li class="menu-title">
                            <span>Evaluasi &amp; Kelulusan</span>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.grading.overview') }}" class="menu-link {{ request()->routeIs('staff.grading.*', 'staff.exams.grading.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="award" class="size-4.5"></i></span>
                                <span class="menu-text">Penilaian &amp; Koreksi</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.graduation.index') }}" class="menu-link {{ request()->routeIs('staff.graduation.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="check-check" class="size-4.5"></i></span>
                                <span class="menu-text">Hasil &amp; Kelulusan</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.reports.overview') }}" class="menu-link {{ request()->routeIs('staff.reports.*', 'staff.exams.reports.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="bar-chart-3" class="size-4.5"></i></span>
                                <span class="menu-text">Grafik &amp; Analitik</span>
                            </a>
                        </li>

                        <!-- 6. TATA KELOLA & KEPATUHAN -->
                        <li class="menu-title">
                            <span>Tata Kelola &amp; Kepatuhan</span>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.delegations.index') }}" class="menu-link {{ request()->routeIs('staff.delegations.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="shield-check" class="size-4.5"></i></span>
                                <span class="menu-text">Delegasi Wewenang</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.approvals.index') }}" class="menu-link {{ request()->routeIs('staff.approvals.*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="user-check" class="size-4.5"></i></span>
                                <span class="menu-text">Four-Eyes Approval</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.security.audit-logs') }}" class="menu-link {{ request()->routeIs('staff.security.audit-logs*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="file-spreadsheet" class="size-4.5"></i></span>
                                <span class="menu-text">Jejak Audit Sistem</span>
                            </a>
                        </li>

                        <!-- 7. SISTEM & INTEGRASI -->
                        @if(auth('staff')->user()->hasRole(['admin', 'super_admin', 'institution_admin']))
                            <li class="menu-title">
                                <span>Sistem &amp; Integrasi</span>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.settings.general') }}" class="menu-link {{ request()->routeIs('staff.settings.general*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="sliders-horizontal" class="size-4.5"></i></span>
                                    <span class="menu-text">Pengaturan &amp; Branding</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.system.health') }}" class="menu-link {{ request()->routeIs('staff.system.health*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="activity" class="size-4.5"></i></span>
                                    <span class="menu-text">Kesehatan Sistem (Health)</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.backups.index') }}" class="menu-link {{ request()->routeIs('staff.backups.*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="database" class="size-4.5"></i></span>
                                    <span class="menu-text">Cadangan &amp; Arsip</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.integrations.index') }}" class="menu-link {{ request()->routeIs('staff.integrations.*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="cpu" class="size-4.5"></i></span>
                                    <span class="menu-text">API &amp; Webhook</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.settings.smtp.index') }}" class="menu-link {{ request()->routeIs('staff.settings.smtp*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="mail" class="size-4.5"></i></span>
                                    <span class="menu-text">Pengaturan Email</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.settings.notification-templates.index') }}" class="menu-link {{ request()->routeIs('staff.settings.notification-templates*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="bell" class="size-4.5"></i></span>
                                    <span class="menu-text">Templat Notifikasi</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.settings.notification-logs.index') }}" class="menu-link {{ request()->routeIs('staff.settings.notification-logs*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="file-clock" class="size-4.5"></i></span>
                                    <span class="menu-text">Log Notifikasi</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.settings.maintenance.index') }}" class="menu-link {{ request()->routeIs('staff.settings.maintenance*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="wrench" class="size-4.5"></i></span>
                                    <span class="menu-text">Mode Pemeliharaan</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('staff.settings.license.index') }}" class="menu-link {{ request()->routeIs('staff.settings.license*') ? 'active !bg-primary !text-white' : '' }}">
                                    <span class="menu-icon"><i data-lucide="shield-check" class="size-4.5"></i></span>
                                    <span class="menu-text">Lisensi &amp; Pembaruan</span>
                                    @if(app(\App\Services\LicenseService::class)->isSupporter())
                                        <span class="ms-auto inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800">SUPPORTER</span>
                                    @endif
                                </a>
                            </li>
                        @endif

                        <!-- 8. AKUN & KEAMANAN SAYA -->
                        <li class="menu-title">
                            <span>Akun &amp; Keamanan Saya</span>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.profile') }}" class="menu-link {{ request()->routeIs('staff.profile') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="user" class="size-4.5"></i></span>
                                <span class="menu-text">Profil &amp; Kata Sandi</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.security.two-factor') }}" class="menu-link {{ request()->routeIs('staff.security.two-factor*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="key" class="size-4.5"></i></span>
                                <span class="menu-text">Autentikasi 2FA</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('staff.security.sessions') }}" class="menu-link {{ request()->routeIs('staff.security.sessions*') ? 'active !bg-primary !text-white' : '' }}">
                                <span class="menu-icon"><i data-lucide="monitor" class="size-4.5"></i></span>
                                <span class="menu-text">Sesi &amp; Perangkat</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar Footer -->
            <div class="p-3 border-t border-default-200 shrink-0 text-center text-xs text-default-400">
                TESLOKA CBT &bull; v1.0
            </div>
        </aside>

        <!-- Page Content Area -->
        <div class="page-content">
            <!-- Topbar Header -->
            <header class="app-header min-h-topbar-height flex items-center sticky top-0 z-30 bg-card border-b border-default-200">
                <div class="w-full flex items-center justify-between px-3 sm:px-6">
                    <!-- Left: Menu Toggle & Quick Search -->
                    <div class="flex items-center gap-2 sm:gap-4">
                        <button id="button-toggle-menu" class="btn btn-icon size-9 bg-default-100 hover:bg-default-200 rounded text-default-600 inline-flex items-center justify-center shrink-0" aria-label="Toggle Menu">
                            <i data-lucide="menu" class="size-5"></i>
                        </button>

                        <button type="button" onclick="openCommandPalette()" class="flex items-center gap-2 px-3 py-1.5 rounded border border-default-200 bg-default-50 text-default-400 hover:text-default-700 hover:bg-default-100 transition-all text-xs cursor-pointer shadow-xs max-w-[170px] sm:max-w-none sm:w-72">
                            <i data-lucide="search" class="size-4 text-default-400 shrink-0"></i>
                            <span class="truncate">Cari menu, ujian...</span>
                            <kbd class="ms-auto px-1.5 py-0.5 text-[10px] font-mono font-semibold bg-white border border-default-200 rounded text-default-500 shadow-xs shrink-0 hidden sm:inline-block">Ctrl+K</kbd>
                        </button>
                    </div>

                    <!-- Right: Notifications & User Profile -->
                    <div class="flex items-center gap-3">
                        <!-- In-App Notification Center (Topbar Notification Dropdown) -->
                        <div class="relative" id="staffNotifContainer">
                            <button type="button" id="staffNotifBtn" onclick="toggleStaffNotifDropdown()" class="btn btn-icon size-8 hover:bg-default-150 rounded-full relative cursor-pointer" aria-haspopup="menu" aria-expanded="false" aria-label="Notifikasi" title="Pusat Notifikasi">
                                <i data-lucide="bell-ring" class="size-4.5 text-default-600"></i>
                                <span id="staffNotifBadge" class="hidden absolute -top-1 -end-1 min-w-4 h-4 px-1 bg-orange-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center animate-pulse">0</span>
                            </button>

                            <!-- Notification Dropdown -->
                            <div id="staffNotifDropdown" class="hidden absolute end-0 mt-2 w-84 sm:w-96 bg-card border border-default-200 rounded-md shadow-xl z-50 overflow-hidden divide-y divide-default-100" role="menu">
                                <!-- Header -->
                                <div class="p-3.5 sm:p-4 border-b border-default-200 bg-card">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <h3 class="text-sm sm:text-base font-semibold text-default-800">Notifikasi</h3>
                                            <span id="staffNotifHeaderBadge" class="min-w-5 h-5 px-1.5 font-semibold bg-orange-500 rounded text-white flex items-center justify-center text-xs">0</span>
                                        </div>
                                        <button type="button" onclick="markAllStaffNotifsRead()" class="text-xs text-primary hover:underline font-semibold cursor-pointer">
                                            Tandai Semua Dibaca
                                        </button>
                                    </div>
                                </div>

                                <!-- Filter Tabs (Filter Tabs) -->
                                <nav class="flex gap-x-1 bg-default-150 p-2 border-b border-default-200" aria-label="Tabs" role="tablist">
                                    <button type="button" onclick="filterStaffNotifs('all')" id="tab-notif-all" class="py-1 px-3 rounded font-semibold inline-flex items-center text-xs whitespace-nowrap bg-card text-primary shadow-xs transition cursor-pointer">
                                        Semua
                                    </button>
                                    <button type="button" onclick="filterStaffNotifs('unread')" id="tab-notif-unread" class="py-1 px-3 rounded font-semibold inline-flex items-center text-xs whitespace-nowrap text-default-500 hover:text-default-700 transition cursor-pointer">
                                        Belum Dibaca
                                    </button>
                                    <button type="button" onclick="filterStaffNotifs('exam')" id="tab-notif-exam" class="py-1 px-3 rounded font-semibold inline-flex items-center text-xs whitespace-nowrap text-default-500 hover:text-default-700 transition cursor-pointer">
                                        Ujian &amp; Sesi
                                    </button>
                                    <button type="button" onclick="filterStaffNotifs('security')" id="tab-notif-security" class="py-1 px-3 rounded font-semibold inline-flex items-center text-xs whitespace-nowrap text-default-500 hover:text-default-700 transition cursor-pointer">
                                        Keamanan
                                    </button>
                                </nav>

                                <!-- Content List -->
                                <div id="staffNotifList" class="h-80 max-h-80 overflow-y-auto divide-y divide-default-100 text-xs">
                                    <div class="p-8 text-center text-default-400">
                                        <div class="inline-block border-2 rounded-full size-6 animate-spin border-s-transparent border-primary mb-2"></div>
                                        <p class="text-xs">Memuat notifikasi...</p>
                                    </div>
                                </div>

                                <!-- Footer (Modern Style) -->
                                <div class="flex items-center justify-between p-3.5 border-t border-default-200 bg-default-50/50">
                                    <a href="{{ route('staff.settings.notification-logs.index') }}" class="text-xs font-semibold text-default-700 hover:text-primary transition">
                                        Log Pengiriman
                                    </a>
                                    <a href="{{ route('staff.notifications.index') }}" class="btn btn-sm text-white bg-primary hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
                                        <span>Lihat Semua</span>
                                        <i data-lucide="move-right" class="size-3.5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="h-6 w-px bg-default-200 hidden sm:block"></div>

                        <!-- User Profile Dropdown -->
                        <div class="relative" id="userProfileMenuContainer">
                            <button type="button" onclick="toggleUserProfileMenu()" class="flex items-center gap-2.5 hover:opacity-90 transition cursor-pointer text-left" title="Menu Pengguna">
                                <img src="{{ auth('staff')->user()->photo_url }}" alt="{{ auth('staff')->user()->name }}" class="size-9 rounded-full object-cover border border-default-200 shadow-xs">
                                <div class="text-left hidden sm:block">
                                    <div class="text-xs font-semibold text-default-800 leading-tight flex items-center gap-1">
                                        <span>{{ auth('staff')->user()->name }}</span>
                                        <i data-lucide="chevron-down" class="size-3 text-default-400"></i>
                                    </div>
                                    <div class="text-[11px] text-default-400 font-medium">
                                        {{ auth('staff')->user()->roles->pluck('display_name')->first() ?? 'Staf' }}
                                    </div>
                                </div>
                            </button>

                            <div id="userProfileDropdown" class="hidden absolute right-0 mt-2 w-52 bg-white border border-default-200 rounded-md shadow-lg z-50 py-1 divide-y divide-default-100">
                                <div class="px-3.5 py-2.5 bg-default-50">
                                    <p class="text-xs font-bold text-default-900 truncate">{{ auth('staff')->user()->name }}</p>
                                    <p class="text-[10px] text-default-400 truncate">{{ auth('staff')->user()->email }}</p>
                                </div>
                                <div class="py-1">
                                    <a href="{{ route('staff.profile') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                                        <i data-lucide="user" class="size-4 text-default-400"></i>
                                        <span>Profil &amp; Kata Sandi</span>
                                    </a>
                                    <a href="{{ route('staff.security.two-factor') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                                        <i data-lucide="key" class="size-4 text-default-400"></i>
                                        <span>Keamanan 2FA</span>
                                    </a>
                                    <a href="{{ route('staff.security.sessions') }}" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                                        <i data-lucide="monitor" class="size-4 text-default-400"></i>
                                        <span>Sesi &amp; Perangkat</span>
                                    </a>
                                </div>
                                <div class="py-1">
                                    <form method="POST" action="{{ route('staff.logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center gap-2.5 px-3.5 py-2 text-xs text-danger hover:bg-danger/10 transition text-left cursor-pointer">
                                            <i data-lucide="log-out" class="size-4 text-danger"></i>
                                            <span>Keluar Sistem</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Workspace -->
            <main>
                <div class="container-fluid">
                    <!-- Standardized Page Title & Breadcrumbs -->
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-5">
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-1.5 text-[11px] font-medium text-default-400 mb-1 flex-wrap">
                                @if(request()->routeIs('staff.dashboard'))
                                    <span class="text-default-700 font-semibold">Dashboard</span>
                                @else
                                    <a href="{{ route('staff.dashboard') }}" class="text-default-500 hover:text-primary transition">Dashboard</a>
                                    @hasSection('page-parent')
                                        <i data-lucide="chevron-right" class="size-3 text-default-300"></i>
                                        <span class="text-default-500">@yield('page-parent')</span>
                                    @endif
                                    @hasSection('page-title')
                                        <i data-lucide="chevron-right" class="size-3 text-default-300"></i>
                                        <span class="text-default-700 font-semibold truncate max-w-xs sm:max-w-md md:max-w-xl">@yield('page-title')</span>
                                    @endif
                                @endif
                            </div>
                            <h4 class="text-default-900 text-lg font-semibold break-words">@yield('page-title', 'Dashboard')</h4>
                            @hasSection('page-subtitle')
                                <p class="text-xs text-default-500 mt-0.5 break-words">@yield('page-subtitle')</p>
                            @endif
                        </div>
                        @hasSection('page-actions')
                            <div class="flex items-center gap-2 shrink-0 flex-wrap justify-start lg:justify-end">
                                @yield('page-actions')
                            </div>
                        @endif
                    </div>

                    <!-- Flash Messages (Single Source of Truth) -->
                    @if (session('success'))
                        <div class="mb-5 p-4 rounded bg-success/10 border border-success/30 text-success text-sm flex items-center justify-between gap-2.5">
                            <div class="flex items-center gap-2.5">
                                <i data-lucide="check-circle" class="size-5 shrink-0 text-success"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                            <button type="button" onclick="this.closest('.bg-success\\/10').remove()" class="text-success/70 hover:text-success transition" title="Tutup">
                                <i data-lucide="x" class="size-4"></i>
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-5 p-4 rounded bg-danger/10 border border-danger/30 text-danger text-sm">
                            <div class="flex items-start justify-between gap-2.5">
                                <div class="flex items-start gap-2.5">
                                    <i data-lucide="alert-octagon" class="size-5 shrink-0 text-danger mt-0.5"></i>
                                    <div>
                                        <h5 class="font-bold text-sm text-danger mb-1">Terdapat kesalahan pada isian formulir:</h5>
                                        <ul class="list-disc list-inside space-y-0.5 text-xs text-danger/90">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button type="button" onclick="this.closest('.bg-danger\\/10').remove()" class="text-danger/70 hover:text-danger transition shrink-0" title="Tutup">
                                    <i data-lucide="x" class="size-4"></i>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if (session('error') || session('danger'))
                        <div class="mb-5 p-4 rounded bg-danger/10 border border-danger/30 text-danger text-sm flex items-center justify-between gap-2.5">
                            <div class="flex items-center gap-2.5">
                                <i data-lucide="alert-octagon" class="size-5 shrink-0 text-danger"></i>
                                <span>{{ session('error') ?? session('danger') }}</span>
                            </div>
                            <button type="button" onclick="this.closest('.bg-danger\\/10').remove()" class="text-danger/70 hover:text-danger transition" title="Tutup">
                                <i data-lucide="x" class="size-4"></i>
                            </button>
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="mb-5 p-4 rounded bg-warning/10 border border-warning/30 text-warning text-sm flex items-center justify-between gap-2.5">
                            <div class="flex items-center gap-2.5">
                                <i data-lucide="alert-triangle" class="size-5 shrink-0 text-warning"></i>
                                <span>{{ session('warning') }}</span>
                            </div>
                            <button type="button" onclick="this.closest('.bg-warning\\/10').remove()" class="text-warning/70 hover:text-warning transition" title="Tutup">
                                <i data-lucide="x" class="size-4"></i>
                            </button>
                        </div>
                    @endif

                    @if (session('info') || session('status'))
                        <div class="mb-5 p-4 rounded bg-info/10 border border-info/30 text-info text-sm flex items-center justify-between gap-2.5">
                            <div class="flex items-center gap-2.5">
                                <i data-lucide="info" class="size-5 shrink-0 text-info"></i>
                                <span>{{ session('info') ?? session('status') }}</span>
                            </div>
                            <button type="button" onclick="this.closest('.bg-info\\/10').remove()" class="text-info/70 hover:text-info transition" title="Tutup">
                                <i data-lucide="x" class="size-4"></i>
                            </button>
                        </div>
                    @endif

                    @if (isset($errors) && $errors->any())
                        <div class="mb-5 p-4 rounded bg-danger/10 border border-danger/30 text-danger text-sm relative">
                            <div class="flex items-center justify-between mb-1">
                                <div class="font-semibold flex items-center gap-2">
                                    <i data-lucide="alert-octagon" class="size-5 shrink-0 text-danger"></i>
                                    Terjadi Kesalahan
                                </div>
                                <button type="button" onclick="this.closest('.bg-danger\\/10').remove()" class="text-danger/70 hover:text-danger transition" title="Tutup">
                                    <i data-lucide="x" class="size-4"></i>
                                </button>
                            </div>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>

            <!-- App Footer -->
            <footer class="mt-auto footer flex items-center py-4 border-t border-default-200">
                <div class="px-6 w-full flex justify-between items-center text-xs text-default-500">
                    @if(app(\App\Services\LicenseService::class)->shouldHideBranding())
                        <div>{{ date('Y') }} &copy; {{ $systemInstName }}</div>
                    @else
                        <div>{{ date('Y') }} &copy; {{ $systemInstName }} &bull; TESLOKA CBT Community</div>
                    @endif
                    <div class="font-medium text-primary">v{{ app(\App\Services\UpdateService::class)->getCurrentVersion() }}</div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Command Palette (Ctrl+K) Modal -->
    <div id="commandPaletteModal" class="fixed inset-0 z-50 bg-default-900/40 backdrop-blur-xs flex items-start justify-center pt-8 sm:pt-20 p-3 sm:p-4 hidden transition-opacity" role="dialog" aria-modal="true">
        <div class="bg-card rounded-md shadow-2xl border border-default-200 w-full max-w-2xl max-h-[85vh] flex flex-col overflow-hidden transform transition-all">
            <!-- Search Bar -->
            <div class="p-3.5 border-b border-default-200 flex items-center gap-3 shrink-0">
                <i data-lucide="search" class="size-4.5 text-default-400 shrink-0"></i>
                <input id="commandPaletteInput" type="text" placeholder="Ketik untuk mencari ujian, soal, sesi, ruang, atau pengguna..." autocomplete="off"
                    class="w-full text-sm text-default-800 placeholder-default-400 bg-transparent border-0 focus:ring-0 focus:outline-none">
                <span class="text-[10px] font-mono text-default-400 bg-default-100 border border-default-200 px-1.5 py-0.5 rounded">ESC</span>
            </div>

            <!-- Results Container -->
            <div id="commandPaletteResults" class="max-h-96 overflow-y-auto p-2 divide-y divide-default-100 flex-1">
                <div class="p-8 text-center text-xs text-default-400">
                    Ketik minimal 2 karakter untuk memulai pencarian di seluruh modul.
                </div>
            </div>

            <!-- Footer Hints -->
            <div class="bg-default-50 px-4 py-2 border-t border-default-200 flex flex-wrap items-center justify-between text-xs text-default-400 shrink-0 gap-2">
                <div class="flex items-center gap-2 sm:gap-3 text-[11px]">
                    <span><kbd class="font-mono bg-white border border-default-200 px-1 rounded shadow-xs">↑↓</kbd> Navigasi</span>
                    <span><kbd class="font-mono bg-white border border-default-200 px-1 rounded shadow-xs">↵</kbd> Buka</span>
                    <span><kbd class="font-mono bg-white border border-default-200 px-1 rounded shadow-xs">ESC</kbd> Tutup</span>
                </div>
                <span class="text-[11px] hidden sm:inline">Pencarian Cepat CBT</span>
            </div>
        </div>
    </div>

    <script>
        function openCommandPalette() {
            const modal = document.getElementById('commandPaletteModal');
            const input = document.getElementById('commandPaletteInput');
            modal.classList.remove('hidden');
            setTimeout(() => input.focus(), 50);
        }

        function closeCommandPalette() {
            const modal = document.getElementById('commandPaletteModal');
            modal.classList.add('hidden');
        }

        document.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                const modal = document.getElementById('commandPaletteModal');
                if (modal.classList.contains('hidden')) {
                    openCommandPalette();
                } else {
                    closeCommandPalette();
                }
            } else if (e.key === 'Escape') {
                closeCommandPalette();
            }
        });

        document.getElementById('commandPaletteModal')?.addEventListener('click', function (e) {
            if (e.target === this) {
                closeCommandPalette();
            }
        });

        let searchDebounceTimer = null;
        document.getElementById('commandPaletteInput')?.addEventListener('input', function (e) {
            const query = e.target.value.trim();
            clearTimeout(searchDebounceTimer);

            if (query.length < 2) {
                document.getElementById('commandPaletteResults').innerHTML = `
                    <div class="p-8 text-center text-xs text-default-400">
                        Ketik minimal 2 karakter untuk memulai pencarian di seluruh modul.
                    </div>
                `;
                return;
            }

            searchDebounceTimer = setTimeout(() => {
                fetch(`{{ route('staff.global-search') }}?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        const container = document.getElementById('commandPaletteResults');
                        if (!data.results || data.results.length === 0) {
                            container.innerHTML = `
                                <div class="p-8 text-center text-xs text-default-400">
                                    Tidak ditemukan hasil untuk "<strong>${data.query}</strong>".
                                </div>
                            `;
                            return;
                        }

                        let html = '';
                        let currentCat = '';
                        data.results.forEach((item) => {
                            if (item.category !== currentCat) {
                                currentCat = item.category;
                                html += `<div class="px-3 pt-3 pb-1 text-[10px] font-bold uppercase tracking-wider text-default-400">${currentCat}</div>`;
                            }
                            html += `
                                <a href="${item.url}" class="palette-item block px-3 py-2.5 rounded hover:bg-default-100 transition-colors group">
                                    <div class="text-xs font-semibold text-default-800 group-hover:text-primary">${item.title}</div>
                                    <div class="text-xs text-default-500 mt-0.5">${item.subtitle}</div>
                                </a>
                            `;
                        });
                        container.innerHTML = html;
                    })
                    .catch(() => {
                        document.getElementById('commandPaletteResults').innerHTML = `
                            <div class="p-4 text-center text-xs text-danger">
                                Gagal memuat hasil pencarian.
                            </div>
                        `;
                    });
            }, 250);
        });

        // Notification Center JavaScript
        function toggleStaffNotifDropdown() {
            const dropdown = document.getElementById('staffNotifDropdown');
            dropdown.classList.toggle('hidden');
            if (!dropdown.classList.contains('hidden')) {
                fetchStaffNotifications();
            }
        }

        document.addEventListener('click', function(e) {
            const container = document.getElementById('staffNotifContainer');
            if (container && !container.contains(e.target)) {
                document.getElementById('staffNotifDropdown')?.classList.add('hidden');
            }
            const langContainer = document.getElementById('staffLangContainer');
            if (langContainer && !langContainer.contains(e.target)) {
                document.getElementById('staffLangDropdown')?.classList.add('hidden');
            }
        });

        let staffNotificationsCache = [];
        let currentStaffNotifFilter = 'all';

        function fetchStaffNotifications() {
            fetch("{{ route('staff.notifications.index') }}", {
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(res => res.json())
                .then(data => {
                    const badge = document.getElementById('staffNotifBadge');
                    const headerBadge = document.getElementById('staffNotifHeaderBadge');

                    const count = data.unread_count || 0;
                    if (badge) {
                        if (count > 0) {
                            badge.textContent = count > 99 ? '99+' : count;
                            badge.classList.remove('hidden');
                        } else {
                            badge.classList.add('hidden');
                        }
                    }
                    if (headerBadge) {
                        headerBadge.textContent = count > 99 ? '99+' : count;
                    }

                    staffNotificationsCache = data.notifications || [];
                    renderStaffNotificationList();
                })
                .catch(() => {
                    const list = document.getElementById('staffNotifList');
                    if (list) {
                        list.innerHTML = '<div class="p-6 text-center text-xs text-danger">Gagal memuat notifikasi.</div>';
                    }
                });
        }

        function filterStaffNotifs(filterType) {
            currentStaffNotifFilter = filterType;
            const tabs = ['all', 'unread', 'exam', 'security'];
            tabs.forEach(t => {
                const btn = document.getElementById(`tab-notif-${t}`);
                if (!btn) return;
                if (t === filterType) {
                    btn.className = 'py-1 px-3 rounded font-semibold inline-flex items-center text-xs whitespace-nowrap bg-card text-primary shadow-xs transition cursor-pointer';
                } else {
                    btn.className = 'py-1 px-3 rounded font-semibold inline-flex items-center text-xs whitespace-nowrap text-default-500 hover:text-default-700 transition cursor-pointer';
                }
            });
            renderStaffNotificationList();
        }

        function renderStaffNotificationList() {
            const list = document.getElementById('staffNotifList');
            if (!list) return;

            let filtered = staffNotificationsCache;
            if (currentStaffNotifFilter === 'unread') {
                filtered = staffNotificationsCache.filter(n => !n.is_read);
            } else if (currentStaffNotifFilter === 'exam') {
                filtered = staffNotificationsCache.filter(n => {
                    const t = (n.type || '').toLowerCase();
                    const title = (n.title || '').toLowerCase();
                    return t.includes('exam') || t.includes('session') || title.includes('ujian') || title.includes('sesi');
                });
            } else if (currentStaffNotifFilter === 'security') {
                filtered = staffNotificationsCache.filter(n => {
                    const t = (n.type || '').toLowerCase();
                    const title = (n.title || '').toLowerCase();
                    return t.includes('security') || t.includes('auth') || title.includes('keamanan') || title.includes('password') || title.includes('login') || title.includes('2fa');
                });
            }

            if (!filtered || filtered.length === 0) {
                list.innerHTML = `
                    <div class="p-8 text-center text-default-400">
                        <i data-lucide="bell-off" class="size-8 mx-auto text-default-300 mb-2"></i>
                        <p class="font-medium text-xs">Belum ada notifikasi pada kategori ini.</p>
                    </div>
                `;
                if (window.lucide) window.lucide.createIcons();
                return;
            }

            let html = '';
            filtered.forEach(n => {
                let iconName = 'bell';
                let iconBg = 'bg-default-100 text-default-600';

                const t = (n.type || '').toLowerCase();
                const title = (n.title || '').toLowerCase();

                if (t.includes('exam') || t.includes('session') || title.includes('ujian') || title.includes('sesi')) {
                    iconName = 'file-text';
                    iconBg = 'bg-primary/10 text-primary';
                } else if (t.includes('security') || t.includes('auth') || title.includes('keamanan') || title.includes('password') || title.includes('2fa')) {
                    iconName = 'shield-alert';
                    iconBg = 'bg-warning/10 text-warning';
                } else if (t.includes('error') || t.includes('danger') || title.includes('gagal') || title.includes('peringatan')) {
                    iconName = 'alert-circle';
                    iconBg = 'bg-danger/10 text-danger';
                } else if (t.includes('success') || t.includes('cert') || title.includes('sukses') || title.includes('sertifikat')) {
                    iconName = 'award';
                    iconBg = 'bg-success/10 text-success';
                }

                html += `
                    <div class="p-3.5 hover:bg-default-50 transition flex items-start gap-3 ${!n.is_read ? 'bg-primary/5' : ''}">
                        <div class="size-10 rounded-md ${iconBg} flex items-center justify-center shrink-0">
                            <i data-lucide="${iconName}" class="size-5"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2">
                                <div class="font-semibold text-default-800 text-xs truncate"><b>${n.title}</b></div>
                                <div class="flex items-center gap-1.5 text-[11px] text-default-400 shrink-0">
                                    ${!n.is_read ? '<span class="size-1.5 bg-primary rounded-full shrink-0"></span>' : ''}
                                    <span>${n.time_ago}</span>
                                </div>
                            </div>
                            <p class="text-default-500 text-xs mt-1 line-clamp-2 leading-relaxed">${n.message}</p>
                            <div class="flex items-center justify-between gap-2 mt-2 pt-1 border-t border-default-50">
                                ${n.action_url ? `<a href="${n.action_url}" class="text-[11px] font-semibold text-primary hover:underline inline-flex items-center gap-1">Buka Tautan &rarr;</a>` : '<span></span>'}
                                ${!n.is_read ? `
                                    <button type="button" onclick="markStaffNotifRead(${n.id})" class="text-[11px] text-default-400 hover:text-primary font-medium cursor-pointer">
                                        Tandai Dibaca
                                    </button>
                                ` : '<span class="text-[10px] text-default-300 font-medium">Dibaca</span>'}
                            </div>
                        </div>
                    </div>
                `;
            });

            list.innerHTML = html;
            if (window.lucide) window.lucide.createIcons();
        }

        function markStaffNotifRead(id) {
            fetch(`/staff/notifications/${id}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }).then(() => fetchStaffNotifications());
        }

        function markAllStaffNotifsRead() {
            fetch("{{ route('staff.notifications.read-all') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }).then(() => fetchStaffNotifications());
        }

        document.addEventListener('DOMContentLoaded', fetchStaffNotifications);

        // Sidebar Scroll & Sidenav Toggle State Management
        function initSidebarScrollManagement() {
            const nav = document.getElementById('staffSidebarNav');
            if (!nav) return;

            // 1. Restore scroll position if saved
            const savedScroll = sessionStorage.getItem('tesloka_sidebar_scroll');
            if (savedScroll !== null) {
                nav.scrollTop = parseInt(savedScroll, 10);
            }

            // 2. Ensure active menu item is scrolled into view comfortably if outside viewport
            const activeItem = nav.querySelector('.menu-link.active');
            if (activeItem) {
                const navRect = nav.getBoundingClientRect();
                const itemRect = activeItem.getBoundingClientRect();
                const isOutOfView = (itemRect.top < navRect.top + 10) || (itemRect.bottom > navRect.bottom - 10);
                
                if (savedScroll === null || isOutOfView) {
                    activeItem.scrollIntoView({ block: 'center', behavior: 'instant' });
                    sessionStorage.setItem('tesloka_sidebar_scroll', nav.scrollTop);
                }
            }

            // 3. Save scroll position whenever user scrolls
            let scrollTimer = null;
            nav.addEventListener('scroll', function () {
                clearTimeout(scrollTimer);
                scrollTimer = setTimeout(() => {
                    sessionStorage.setItem('tesloka_sidebar_scroll', nav.scrollTop);
                }, 40);
            }, { passive: true });

            // 4. Save scroll position immediately on clicking any menu link
            nav.querySelectorAll('a.menu-link').forEach(link => {
                link.addEventListener('click', function () {
                    sessionStorage.setItem('tesloka_sidebar_scroll', nav.scrollTop);
                });
            });

            // 5. Enhance toggle button to persist state in localStorage (desktop only)
            const toggleBtn = document.getElementById('button-toggle-menu');
            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    if (window.innerWidth > 1024) {
                        setTimeout(() => {
                            const currentSize = document.documentElement.getAttribute('data-sidenav-size') || 'default';
                            localStorage.setItem('tesloka_sidenav_size', currentSize);
                        }, 50);
                    }
                });
            }
        }

        function toggleUserProfileMenu() {
            const dropdown = document.getElementById('userProfileDropdown');
            if (dropdown) dropdown.classList.toggle('hidden');
        }

        document.addEventListener('click', function(e) {
            const container = document.getElementById('userProfileMenuContainer');
            const dropdown = document.getElementById('userProfileDropdown');
            if (container && dropdown && !container.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initSidebarScrollManagement);
        } else {
            initSidebarScrollManagement();
        }
    </script>
    @stack('scripts')
</body>
</html>
