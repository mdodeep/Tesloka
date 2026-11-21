@extends('layouts.staff')

@section('title', 'Lisensi & Pembaruan Sistem - Pengaturan')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb & Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <nav class="flex items-center gap-2 text-xs text-default-500 mb-1">
                <a href="{{ route('staff.dashboard') }}" class="hover:text-primary transition">Beranda</a>
                <span>/</span>
                <a href="{{ route('staff.settings.general') }}" class="hover:text-primary transition">Pengaturan Sistem</a>
                <span>/</span>
                <span class="text-default-800 font-semibold">Lisensi &amp; Pembaruan</span>
            </nav>
            <h1 class="text-xl sm:text-2xl font-bold text-default-900 tracking-tight">Lisensi &amp; Pusat Pembaruan</h1>
            <p class="text-xs text-default-500 mt-0.5">Kelola status lisensi Supporter, hak kepemilikan seumur hidup, dan pembaruan otomatis 1-klik.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <a href="{{ $donateServerUrl }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg bg-primary hover:bg-primary-dark text-white font-bold text-xs transition shadow-xs">
                <span>Server Donasi &amp; Lisensi</span>
                <i data-lucide="external-link" class="size-3.5"></i>
            </a>
        </div>
    </div>

    <!-- Alert Notifikasi -->
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-medium flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5 text-emerald-600 shrink-0"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if(session('error'))
        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs sm:text-sm font-medium flex items-center gap-3">
            <i data-lucide="alert-circle" class="size-5 text-rose-600 shrink-0"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    <!-- 1. KARTU STATUS LISENSI SAAT INI -->
    <div class="rounded-2xl border {{ $license['is_supporter'] ? 'border-emerald-200 bg-white' : 'border-default-200 bg-white' }} p-6 shadow-xs">
        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl {{ $license['is_supporter'] ? 'bg-emerald-100 text-emerald-600' : 'bg-default-100 text-default-600' }} flex items-center justify-center shrink-0">
                    <i data-lucide="{{ $license['is_supporter'] ? 'shield-check' : 'shield' }}" class="size-6"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold {{ $license['is_supporter'] ? 'bg-emerald-100 text-emerald-800' : 'bg-default-100 text-default-700' }}">
                            {{ $license['is_supporter'] ? 'Supporter License Aktif' : 'Versi Komunitas (Gratis)' }}
                        </span>
                        <span class="text-xs text-default-400">&bull; Versi {{ $currentVersion }}</span>
                    </div>

                    <h2 class="text-lg font-bold text-default-900 mt-1">
                        {{ $license['institution_name'] ?? 'Instalasi TESLOKA CBT Komunitas' }}
                    </h2>

                    <p class="text-xs text-default-500 mt-1 max-w-xl">
                        @if($license['is_supporter'])
                            Institusi Anda telah mendukung ekosistem mandiri TESLOKA CBT melalui donasi resmi. Seluruh fitur eksklusif termasuk Update Otomatis 1-Klik dan Kustomisasi Sertifikat aktif tanpa batas.
                        @else
                            Aplikasi TESLOKA CBT ini gratis digunakan selamanya dengan kapasitas siswa dan ujian tanpa batas. Anda dapat berdonasi minimal Rp 200.000 untuk mendapatkan Supporter License resmi.
                        @endif
                    </p>
                </div>
            </div>

            @if($license['is_supporter'])
                <form action="{{ route('staff.settings.license.deactivate') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menonaktifkan lisensi Supporter pada server ini?')">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 rounded-lg border border-default-200 text-default-600 hover:text-danger hover:border-danger text-xs font-semibold transition">
                        Lepas Lisensi
                    </button>
                </form>
            @endif
        </div>

        @if($license['is_supporter'])
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3 mt-6 pt-5 border-t border-default-100 text-xs">
                <div class="p-3 rounded-xl bg-default-50 border border-default-100">
                    <span class="text-default-400 block font-medium">Kunci Lisensi:</span>
                    <span class="font-mono font-bold text-default-900">{{ $license['license_key'] ?? '-' }}</span>
                </div>
                <div class="p-3 rounded-xl bg-default-50 border border-default-100">
                    <span class="text-default-400 block font-medium">Hak Pakai Aplikasi:</span>
                    <span class="font-bold text-emerald-600">Seumur Hidup (Lifetime)</span>
                </div>
                <div class="p-3 rounded-xl bg-default-50 border border-default-100">
                    <span class="text-default-400 block font-medium">Masa Akses Pembaruan:</span>
                    @if($license['is_update_eligible'])
                        <span class="font-bold text-emerald-600">{{ $license['expires_at'] }} ({{ $license['days_remaining'] }} hari)</span>
                    @else
                        <span class="font-bold text-rose-600">Berakhir pada {{ $license['expires_at'] }}</span>
                    @endif
                </div>
                <div class="p-3 rounded-xl bg-default-50 border border-default-100">
                    <span class="text-default-400 block font-medium">Verifikasi Keamanan:</span>
                    <span class="font-bold text-default-800">RSA-2048 Digital Offline</span>
                </div>
            </div>
        @else
            <div class="mt-5 pt-4 border-t border-default-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 bg-default-50/70 p-4 rounded-xl">
                <div>
                    <h4 class="text-xs font-bold text-default-900">Ingin Mengaktifkan Update Otomatis &amp; Fitur Lengkap?</h4>
                    <p class="text-[11px] text-default-500 mt-0.5">Donasi minimal Rp 200.000 / tahun untuk mendukung kelangsungan rilis dan mendapatkan Supporter License resmi.</p>
                </div>
                <a href="{{ $donateServerUrl }}" target="_blank" class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-dark text-white font-bold text-xs transition shrink-0 shadow-xs">
                    Berdonasi &amp; Dapatkan Lisensi
                </a>
            </div>
        @endif
    </div>

    <!-- 2. PUSAT PEMBARUAN SISTEM 1-KLIK (AUTO-UPDATE ENGINE) -->
    <div class="rounded-2xl border border-default-200 bg-white p-6 shadow-xs space-y-5">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-default-100 pb-4">
            <div>
                <h3 class="font-bold text-base text-default-900 flex items-center gap-2">
                    <i data-lucide="refresh-cw" class="size-4.5 text-primary"></i>
                    <span>Pusat Pembaruan Aplikasi (Auto-Update)</span>
                </h3>
                <p class="text-xs text-default-500 mt-0.5">Pembaruan sistem terstandarisasi dengan proteksi snapshot database dan pemulihan otomatis.</p>
            </div>
            <div class="flex items-center gap-2">
                <form action="{{ route('staff.settings.license.check-update') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-3.5 py-2 rounded-lg border border-default-200 hover:bg-default-50 text-default-700 font-semibold text-xs transition flex items-center gap-1.5 shadow-xs">
                        <i data-lucide="search" class="size-3.5"></i>
                        <span>Periksa Pembaruan</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Update Available Banner (Jika Terdeteksi) -->
        @php
            $updateAvailable = session('update_available');
        @endphp

        @if($updateAvailable)
            <div class="p-5 rounded-xl border border-primary/30 bg-primary/5 space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                    <div>
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-primary text-white text-[10px] font-extrabold uppercase tracking-wider">
                            Versi Baru Tersedia: v{{ $updateAvailable['latest_version'] }}
                        </div>
                        <h4 class="font-bold text-base text-default-900 mt-1.5">{{ $updateAvailable['release_title'] }}</h4>
                        <p class="text-xs text-default-600 mt-1">{{ $updateAvailable['release_notes'] }}</p>
                    </div>
                </div>

                @if(!empty($updateAvailable['changelog']))
                    <div class="p-3.5 rounded-lg bg-white border border-primary/10">
                        <div class="text-xs font-bold text-default-800 mb-2">Daftar Perubahan (Changelog):</div>
                        <ul class="list-disc list-inside text-xs text-default-600 space-y-1">
                            @foreach($updateAvailable['changelog'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="p-3 rounded-lg bg-emerald-50 border border-emerald-200 text-xs text-emerald-800 flex items-start gap-2.5">
                    <i data-lucide="shield-check" class="size-4.5 text-emerald-600 shrink-0 mt-0.5"></i>
                    <div>
                        <strong class="font-bold block">Proteksi Keamanan Database Aktif</strong>
                        Sebelum pembaruan dieksekusi, sistem secara otomatis mengambil snapshot keamanan database dan mencadangkan berkas. Jika terjadi kesalahan di tengah jalan, sistem akan melakukan <em>Auto-Rollback</em> secara instan.
                    </div>
                </div>

                @if($license['is_supporter'] && $license['is_update_eligible'])
                    <form action="{{ route('staff.settings.license.perform-update') }}" method="POST" onsubmit="return confirm('Mulai proses pembaruan otomatis ke v{{ $updateAvailable['latest_version'] }}? Sistem akan membuat snapshot database sebelum memperbarui.')">
                        @csrf
                        <input type="hidden" name="target_version" value="{{ $updateAvailable['latest_version'] }}">
                        <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-primary hover:bg-primary-dark text-white font-extrabold text-xs transition flex items-center justify-center gap-2 shadow-sm">
                            <i data-lucide="download" class="size-4"></i>
                            <span>Perbarui Sekarang Secara Aman (1-Klik)</span>
                        </button>
                    </form>
                @else
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pt-2">
                        <div class="text-xs text-amber-700 font-medium">
                            @if(!$license['is_supporter'])
                                Fitur Pembaruan Otomatis 1-Klik hanya tersedia bagi institusi Supporter. Anda tetap dapat memperbarui aplikasi secara manual via Git/CLI.
                            @else
                                Masa pembaruan lisensi Anda telah berakhir. Perpanjang donasi untuk menikmati update 1-klik otomatis.
                            @endif
                        </div>
                        <a href="{{ $donateServerUrl }}" target="_blank" class="px-4 py-2 rounded-lg bg-primary text-white font-bold text-xs transition shrink-0">
                            Berdonasi untuk Akses Update 1-Klik
                        </a>
                    </div>
                @endif
            </div>
        @else
            <div class="flex items-center gap-3 p-4 rounded-xl bg-default-50 border border-default-100 text-xs text-default-600">
                <i data-lucide="info" class="size-4.5 text-default-400 shrink-0"></i>
                <div>
                    Versi terpasang saat ini adalah <strong class="text-default-900 font-bold">v{{ $currentVersion }}</strong>. Klik tombol <strong>Periksa Pembaruan</strong> untuk memeriksa ketersediaan rilis resmi terbaru dari server TESLOKA.
                </div>
            </div>
        @endif
    </div>

    <!-- 3. FORMULIR AKTIVASI LISENSI -->
    <div class="rounded-2xl border border-default-200 bg-white p-6 shadow-xs space-y-4">
        <div class="border-b border-default-100 pb-3">
            <h3 class="font-bold text-base text-default-900 flex items-center gap-2">
                <i data-lucide="key" class="size-4.5 text-primary"></i>
                <span>{{ $license['is_supporter'] ? 'Perbarui atau Ganti Kunci Lisensi' : 'Aktivasi Supporter License' }}</span>
            </h3>
            <p class="text-xs text-default-500 mt-0.5">
                Masukkan Kunci Lisensi (<code class="font-mono text-primary font-bold">TESLOKA-SUPP-XXXX-XXXX-XXXX</code>) atau Token Digital Kriptografis lengkap yang diperoleh dari server donasi.
            </p>
        </div>

        <form action="{{ route('staff.settings.license.activate') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="license_input" class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-1.5">
                    Kunci Lisensi atau Token Digital Lengkap <span class="text-danger">*</span>
                </label>
                <textarea id="license_input" name="license_input" rows="3" required
                    class="w-full px-3.5 py-2.5 text-xs font-mono rounded-xl border border-default-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                    placeholder="Tempelkan Kunci Lisensi (e.g. TESLOKA-SUPP-XXXX-XXXX-XXXX) atau Token Digital lengkap..."></textarea>
                <p class="text-[11px] text-default-400 mt-1">
                    Mendukung verifikasi online otomatis atau verifikasi offline tanda tangan digital RSA-2048 tanpa internet.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-primary hover:bg-primary-dark text-white font-bold text-xs transition shadow-xs flex items-center gap-1.5">
                    <i data-lucide="check" class="size-4"></i>
                    <span>Aktifkan Lisensi Supporter</span>
                </button>
                <a href="{{ $donateServerUrl }}" target="_blank" class="px-4 py-2.5 rounded-xl border border-default-200 hover:bg-default-50 text-default-700 font-semibold text-xs transition">
                    Belum Punya Lisensi? Donasi di Sini
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
