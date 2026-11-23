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
    @endphp
    <title>@yield('title', 'Portal Ujian') : {{ $systemInstName }}</title>
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
</head>
<body class="min-h-screen bg-default-50 flex flex-col text-default-800 antialiased font-body text-sm">
    <!-- Student Header (Tailwind Topbar Style) -->
    <header class="app-header bg-white/95 backdrop-blur-md border-b border-default-200/90 sticky top-0 z-30 min-h-topbar-height flex items-center">
        <div class="w-full px-3.5 sm:px-6 lg:px-8 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('student.dashboard') }}" class="flex items-center gap-2 hover:opacity-90 transition">
                    <img src="{{ $systemLogoUrl }}" alt="{{ $systemInstName }}" class="h-7 sm:h-8 max-w-[150px] sm:max-w-[180px] object-contain">
                </a>
            </div>

            <!-- Student Profile, Notifications & Status -->
            <div class="flex items-center gap-2 sm:gap-3">
                <!-- In-App Notification Center (Topbar Notification Dropdown) -->
                <div class="relative" id="studentNotifContainer">
                    <button type="button" id="studentNotifBtn" onclick="toggleStudentNotifDropdown()" class="btn btn-icon size-8 hover:bg-default-150 rounded-full relative cursor-pointer" aria-haspopup="menu" aria-expanded="false" aria-label="{{ __('Notifikasi Peserta') }}" title="{{ __('Notifikasi Peserta') }}">
                        <i data-lucide="bell-ring" class="size-4.5 text-default-600"></i>
                        <span id="studentNotifBadge" class="hidden absolute -top-1 -end-1 min-w-4 h-4 px-1 bg-orange-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center animate-pulse">0</span>
                    </button>

                    <!-- Popover Dropdown -->
                    <div id="studentNotifDropdown" class="hidden absolute end-0 mt-2 w-84 sm:w-96 bg-card border border-default-200 rounded-xl shadow-xl z-50 overflow-hidden divide-y divide-default-100" role="menu">
                        <div class="p-3.5 sm:p-4 bg-card border-b border-default-200 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-sm sm:text-base text-default-800">{{ __('Notifikasi Peserta') }}</span>
                                <span id="studentNotifHeaderBadge" class="min-w-5 h-5 px-1.5 font-semibold bg-orange-500 rounded text-white flex items-center justify-center text-xs">0</span>
                            </div>
                            <button type="button" onclick="markAllStudentNotifsRead()" class="text-xs text-primary hover:underline font-semibold cursor-pointer">
                                {{ __('Tandai Semua Dibaca') }}
                            </button>
                        </div>
                        <div id="studentNotifList" class="h-80 max-h-80 overflow-y-auto divide-y divide-default-100 text-xs">
                            <div class="p-8 text-center text-default-400">
                                <div class="inline-block border-2 rounded-full size-6 animate-spin border-s-transparent border-primary mb-2"></div>
                                <p class="text-xs">{{ __('Memuat notifikasi...') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accessibility Quick Menu (Section 11) -->
                <div class="relative" id="studentA11yContainer">
                    <button type="button" onclick="document.getElementById('studentA11yMenu').classList.toggle('hidden')" class="btn btn-icon size-9 bg-default-100 hover:bg-default-200 rounded-lg text-default-600 cursor-pointer" title="{{ __('Aksesibilitas & Akomodasi') }}">
                        <i data-lucide="eye" class="size-4.5"></i>
                    </button>
                    <div id="studentA11yMenu" class="hidden absolute right-0 mt-2 w-56 bg-card border border-default-200 rounded-xl shadow-lg z-50 p-3 space-y-2 text-xs">
                        <div class="font-bold text-default-800 pb-1 border-b border-default-100 flex items-center justify-between">
                            <span>Aksesibilitas</span>
                            <span class="text-[10px] text-default-400 font-normal">Sec. 11</span>
                        </div>
                        <button type="button" onclick="toggleStudentDyslexic()" class="w-full text-left px-2.5 py-1.5 rounded-lg hover:bg-default-100 flex items-center justify-between cursor-pointer">
                            <span>Font Ramah Disleksia</span>
                            <i data-lucide="type" class="size-3.5 text-primary"></i>
                        </button>
                        <button type="button" onclick="cycleStudentFontSize()" class="w-full text-left px-2.5 py-1.5 rounded-lg hover:bg-default-100 flex items-center justify-between cursor-pointer">
                            <span>Ukuran Teks (<span id="portalScaleLabel">Normal</span>)</span>
                            <i data-lucide="zoom-in" class="size-3.5 text-primary"></i>
                        </button>
                        <button type="button" onclick="toggleStudentContrast()" class="w-full text-left px-2.5 py-1.5 rounded-lg hover:bg-default-100 flex items-center justify-between cursor-pointer">
                            <span>Kontras Tinggi</span>
                            <i data-lucide="sun-medium" class="size-3.5 text-primary"></i>
                        </button>
                    </div>
                </div>

                <div class="h-6 w-px bg-default-200 hidden md:block"></div>

                <div class="text-right hidden md:block">
                    <div class="text-xs font-semibold text-default-800">{{ auth('student')->user()->name }}</div>
                    <div class="text-[11px] text-default-400 font-mono">{{ auth('student')->user()->identity_number ?? auth('student')->user()->username }}</div>
                </div>

                <a href="{{ route('student.profile') }}" class="flex items-center gap-2 hover:opacity-90 transition" title="Profil Peserta">
                    <img src="{{ auth('student')->user()->photo_url }}" alt="{{ auth('student')->user()->name }}" class="size-9 rounded-full object-cover border border-default-200 shadow-xs">
                </a>

                <form method="POST" action="{{ route('student.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-sm bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 rounded-lg inline-flex items-center gap-1.5 h-9 px-2.5 sm:px-3 font-semibold transition cursor-pointer" title="Keluar">
                        <i data-lucide="log-out" class="size-3.5"></i>
                        <span class="hidden sm:inline">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Container (Fluid & Spacious) -->
    <main class="flex-1 w-full px-3.5 py-4 sm:px-6 lg:px-8 sm:py-6">
        <div class="container-fluid">
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

    <!-- Student Footer (Tailwind Footer Style) -->
    <footer class="mt-auto footer flex items-center py-5 border-t border-default-200 bg-card">
        <div class="w-full px-6 lg:px-8 flex md:justify-between justify-center gap-4 text-xs text-default-500">
            <div>
                @if(app(\App\Services\LicenseService::class)->shouldHideBranding())
                    © {{ date('Y') }} {{ $systemInstName }}
                @else
                    © {{ date('Y') }} {{ $systemInstName }} &bull; TESLOKA CBT Community
                @endif
            </div>
            <div class="md:flex hidden gap-2 items-center text-default-400">
                Portal Pelaksanaan Ujian Terstandar
            </div>
        </div>
    </footer>

    <!-- In-App Notification Client Script -->
    <script>
        function toggleStudentNotifDropdown() {
            const dropdown = document.getElementById('studentNotifDropdown');
            if (!dropdown) return;
            const isHidden = dropdown.classList.contains('hidden');
            if (isHidden) {
                dropdown.classList.remove('hidden');
                fetchStudentNotifs();
            } else {
                dropdown.classList.add('hidden');
            }
        }

        async function fetchStudentNotifs() {
            try {
                const res = await fetch('{{ route('student.notifications.index') }}', {
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                if (!res.ok) return;
                const data = await res.json();
                renderStudentNotifs(data.notifications, data.unread_count);
            } catch (e) {
                console.error('Gagal mengambil notifikasi:', e);
            }
        }

        function renderStudentNotifs(items, unreadCount) {
            const badge = document.getElementById('studentNotifBadge');
            const headerBadge = document.getElementById('studentNotifHeaderBadge');
            const list = document.getElementById('studentNotifList');
            if (badge) {
                if (unreadCount > 0) {
                    badge.textContent = unreadCount > 99 ? '99+' : unreadCount;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            }
            if (headerBadge) {
                headerBadge.textContent = unreadCount > 99 ? '99+' : unreadCount;
            }
            if (!list) return;

            if (!items || items.length === 0) {
                list.innerHTML = `
                    <div class="p-8 text-center text-default-400">
                        <i data-lucide="bell-off" class="size-8 mx-auto text-default-300 mb-2"></i>
                        <p class="font-medium text-xs">Tidak ada notifikasi saat ini.</p>
                    </div>
                `;
                if (window.lucide) window.lucide.createIcons();
                return;
            }

            list.innerHTML = items.map(n => `
                <div class="p-3.5 hover:bg-default-50 transition flex items-start gap-3 cursor-pointer ${n.read_at ? 'opacity-75' : 'bg-primary/5'}" onclick="markStudentNotifRead('${n.id}', '${n.action_url || ''}')">
                    <div class="size-10 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0">
                        <i data-lucide="bell" class="size-5"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2">
                            <div class="font-semibold text-xs text-default-800 truncate"><b>${escapeHtml(n.title)}</b></div>
                            <div class="flex items-center gap-1.5 text-[11px] text-default-400 shrink-0">
                                ${!n.read_at ? '<span class="size-1.5 bg-primary rounded-full shrink-0"></span>' : ''}
                                <span>${n.created_at}</span>
                            </div>
                        </div>
                        <div class="text-[11px] text-default-600 mt-1 leading-relaxed line-clamp-2">${escapeHtml(n.message)}</div>
                    </div>
                </div>
            `).join('');
            if (window.lucide) window.lucide.createIcons();
        }

        async function markStudentNotifRead(id, url) {
            try {
                await fetch('{{ url('student/notifications') }}/' + id + '/read', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                    credentials: 'same-origin'
                });
            } catch (e) {}
            if (url && url !== 'null' && url !== 'undefined') {
                window.location.href = url;
            } else {
                fetchStudentNotifs();
            }
        }

        async function markAllStudentNotifsRead() {
            try {
                await fetch('{{ route('student.notifications.read-all') }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                    credentials: 'same-origin'
                });
                fetchStudentNotifs();
            } catch (e) {}
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text || '';
            return div.innerHTML;
        }

        let portalScale = 0;
        function toggleStudentDyslexic() {
            const isDyslexic = document.documentElement.classList.toggle('font-dyslexic');
            document.body.classList.toggle('font-dyslexic', isDyslexic);
            localStorage.setItem('cbt_pref_dyslexic', isDyslexic ? '1' : '0');
        }
        function cycleStudentFontSize() {
            portalScale = (portalScale + 1) % 3;
            applyPortalScale(portalScale);
            localStorage.setItem('cbt_pref_scale', portalScale);
        }
        function applyPortalScale(scale) {
            document.documentElement.classList.remove('text-scale-125', 'text-scale-150');
            document.body.classList.remove('text-scale-125', 'text-scale-150');
            const lbl = document.getElementById('portalScaleLabel');
            if (scale === 1) {
                document.documentElement.classList.add('text-scale-125');
                document.body.classList.add('text-scale-125');
                if (lbl) lbl.textContent = 'Besar';
            } else if (scale === 2) {
                document.documentElement.classList.add('text-scale-150');
                document.body.classList.add('text-scale-150');
                if (lbl) lbl.textContent = 'Sangat Besar';
            } else {
                if (lbl) lbl.textContent = 'Normal';
            }
        }
        function toggleStudentContrast() {
            const isHighContrast = document.documentElement.classList.toggle('high-contrast-mode');
            document.body.classList.toggle('high-contrast-mode', isHighContrast);
            localStorage.setItem('cbt_pref_contrast', isHighContrast ? '1' : '0');
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('cbt_pref_dyslexic') === '1') {
                document.documentElement.classList.add('font-dyslexic');
                document.body.classList.add('font-dyslexic');
            }
            if (localStorage.getItem('cbt_pref_contrast') === '1') {
                document.documentElement.classList.add('high-contrast-mode');
                document.body.classList.add('high-contrast-mode');
            }
            const savedScale = parseInt(localStorage.getItem('cbt_pref_scale') || '0', 10);
            if (savedScale > 0) {
                portalScale = savedScale;
                applyPortalScale(portalScale);
            }

            fetchStudentNotifs();
            setInterval(fetchStudentNotifs, 45000);
            document.addEventListener('click', (e) => {
                const container = document.getElementById('studentNotifContainer');
                const dropdown = document.getElementById('studentNotifDropdown');
                if (container && dropdown && !container.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
                const a11yContainer = document.getElementById('studentA11yContainer');
                const a11yMenu = document.getElementById('studentA11yMenu');
                if (a11yContainer && a11yMenu && !a11yContainer.contains(e.target)) {
                    a11yMenu.classList.add('hidden');
                }
                const langContainer = document.getElementById('studentLangContainer');
                const langDropdown = document.getElementById('studentLangDropdown');
                if (langContainer && langDropdown && !langContainer.contains(e.target)) {
                    langDropdown.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
