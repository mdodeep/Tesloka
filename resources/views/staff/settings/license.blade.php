@extends('layouts.staff')

@section('title', ! empty($license['is_activated']) ? 'Lisensi & Pembaruan Sistem - Pengaturan' : 'Aktivasi Lisensi Resmi - Pengaturan')

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
                <span class="text-default-800 font-semibold">{{ ! empty($license['is_activated']) ? 'Lisensi & Pembaruan' : 'Aktivasi Lisensi' }}</span>
            </nav>
            <h1 class="text-xl sm:text-2xl font-bold text-default-900 tracking-tight">{{ ! empty($license['is_activated']) ? 'Lisensi & Pusat Pembaruan' : 'Aktivasi Lisensi Resmi' }}</h1>
            <p class="text-xs text-default-500 mt-0.5">
                @if(! empty($license['is_activated']))
                    Kelola status lisensi resmi institusi, pendataan komunitas, dan pembaruan otomatis 1-klik.
                @else
                    Hubungkan instalasi TESLOKA CBT dengan kunci lisensi resmi institusi Anda untuk mengaktifkan sistem secara menyeluruh.
                @endif
            </p>
        </div>
        <div class="flex items-center gap-2.5">
            <a href="{{ $donateServerUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg bg-primary hover:bg-primary-hover text-white font-bold text-xs transition shadow-2xs">
                <span>Portal Anggota &amp; Lisensi</span>
                <i data-lucide="external-link" class="size-3.5"></i>
            </a>
        </div>
    </div>

    <!-- Alert Notifikasi -->
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-medium space-y-2">
            <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="size-5 text-emerald-600 shrink-0"></i>
                <div>{{ session('success') }}</div>
            </div>
            @if(! empty($license['is_activated']) && is_array(session('update_details')) && !empty(session('update_details')))
                <ul class="list-disc list-inside text-[11px] text-emerald-700 ps-8 space-y-0.5">
                    @foreach(session('update_details') as $detailLine)
                        <li>{{ $detailLine }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

    @if(session('error'))
        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs sm:text-sm font-medium flex items-center gap-3">
            <i data-lucide="alert-circle" class="size-5 text-rose-600 shrink-0"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    <!-- 1. KARTU STATUS LISENSI SAAT INI -->
    <div class="rounded-2xl border {{ $license['is_supporter'] ? 'border-amber-200 bg-white' : ($license['is_community'] ? 'border-emerald-200 bg-white' : 'border-default-200 bg-white') }} p-6 shadow-2xs">
        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl {{ $license['is_supporter'] ? 'bg-amber-100 text-amber-700' : ($license['is_community'] ? 'bg-emerald-100 text-emerald-600' : 'bg-default-100 text-default-600') }} flex items-center justify-center shrink-0">
                    <i data-lucide="{{ $license['is_supporter'] ? 'award' : ($license['is_community'] ? 'shield-check' : 'shield-alert') }}" class="size-6"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2 flex-wrap">
                        @if($license['is_supporter'])
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-800 border border-amber-200">
                                <i data-lucide="star" class="size-3 text-amber-600 fill-amber-500"></i>
                                Supporter License Aktif
                            </span>
                        @elseif($license['is_community'])
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                <i data-lucide="check" class="size-3 text-emerald-600"></i>
                                Lisensi Komunitas Resmi Terdaftar
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-default-100 text-default-700">
                                Belum Terdaftar Lisensi Resmi
                            </span>
                        @endif
                        <span class="text-xs text-default-400">&bull; Aplikasi Versi {{ $currentVersion }}</span>
                    </div>

                    <h2 class="text-lg font-bold text-default-900 mt-1">
                        {{ $license['institution_name'] ?? 'Instalasi Belum Terdaftar' }}
                    </h2>

                    <p class="text-xs text-default-500 mt-1 max-w-xl leading-relaxed">
                        @if($license['is_supporter'])
                            Institusi Anda resmi terdaftar sebagai Supporter TESLOKA CBT. Hak pembaruan otomatis 1-klik, unggah template sertifikat kustom, dan white-labeling aktif seutuhnya.
                        @elseif($license['is_community'])
                            Institusi Anda resmi terdata menggunakan Lisensi Komunitas. Seluruh fitur CBT (kapasitas siswa, rombel, bank soal, dan ujian tanpa batas) bebas digunakan seumur hidup.
                        @else
                            Instalasi ini belum dihubungkan dengan lisensi resmi. Daftarkan akun institusi Anda secara gratis di portal resmi untuk mendapatkan Lisensi Komunitas Resmi instan agar server CBT terverifikasi offline.
                        @endif
                    </p>
                </div>
            </div>

            @if($license['is_activated'])
                <form action="{{ route('staff.settings.license.deactivate') }}" method="POST" onsubmit="return confirm('Cabut dan lepas lisensi dari domain/server ini agar dapat dipindahkan ke domain lain?')">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 rounded-lg border border-default-200 text-default-600 hover:text-danger hover:border-danger text-xs font-semibold transition cursor-pointer">
                        Cabut &amp; Lepas Lisensi
                    </button>
                </form>
            @endif
        </div>

        @if($license['is_activated'])
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
                    @if($license['is_supporter'])
                        @if($license['is_update_eligible'])
                            <span class="font-bold text-emerald-600">{{ $license['expires_at'] }} ({{ $license['days_remaining'] }} hari)</span>
                        @else
                            <span class="font-bold text-rose-600">Berakhir pada {{ $license['expires_at'] }}</span>
                        @endif
                    @else
                        <span class="font-semibold text-default-600">Manual via Git (Komunitas)</span>
                    @endif
                </div>
                <div class="p-3 rounded-xl bg-default-50 border border-default-100">
                    <span class="text-default-400 block font-medium">Verifikasi Kriptografis:</span>
                    <span class="font-bold text-default-800">RSA-2048 Digital Offline</span>
                </div>
            </div>

            @if($license['is_community'])
                <div class="mt-5 pt-4 border-t border-default-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 bg-primary/5 border border-primary/20 p-4 rounded-xl">
                    <div>
                        <h4 class="text-xs font-bold text-default-900">Tingkatkan ke Supporter License (Akses Auto-Update 1-Klik)</h4>
                        <p class="text-[11px] text-default-600 mt-0.5">Dukung pemeliharaan ekosistem TESLOKA mulai Rp 200.000 untuk menikmati pembaruan otomatis 1-klik dan kustomisasi latar sertifikat.</p>
                    </div>
                    <a href="{{ $donateServerUrl }}/dashboard" target="_blank" rel="noopener noreferrer" class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-hover text-white font-bold text-xs transition shrink-0 shadow-2xs">
                        Upgrade ke Supporter
                    </a>
                </div>
            @endif
        @else
            <div class="mt-5 pt-4 border-t border-default-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 bg-amber-50/70 border border-amber-200 p-4 rounded-xl">
                <div>
                    <h4 class="text-xs font-bold text-amber-900">Dapatkan Lisensi Komunitas Resmi Secara Gratis</h4>
                    <p class="text-[11px] text-amber-700 mt-0.5">Daftarkan institusi Anda di portal resmi (100% Bebas Biaya) agar instalasi sekolah Anda terdata dan terverifikasi.</p>
                </div>
                <a href="{{ $donateServerUrl }}/register" target="_blank" rel="noopener noreferrer" class="px-4 py-2 rounded-lg bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs transition shrink-0 shadow-2xs">
                    Daftar Lisensi Gratis Sekarang
                </a>
            </div>
        @endif
    </div>

    @if(! empty($license['is_activated']))
        <!-- 2. PUSAT PEMBARUAN SISTEM 1-KLIK (AUTO-UPDATE ENGINE) -->
        <div class="rounded-2xl border border-default-200 bg-white p-6 shadow-2xs space-y-5">
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
                        <button type="submit" class="px-3.5 py-2 rounded-lg border border-default-200 hover:bg-default-50 text-default-700 font-semibold text-xs transition flex items-center gap-1.5 shadow-2xs cursor-pointer">
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
                            <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-primary hover:bg-primary-hover text-white font-extrabold text-xs transition flex items-center justify-center gap-2 shadow-sm cursor-pointer">
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
                            <a href="{{ $donateServerUrl }}/dashboard" target="_blank" rel="noopener noreferrer" class="px-4 py-2 rounded-lg bg-primary text-white font-bold text-xs transition shrink-0">
                                Upgrade ke Supporter untuk Update 1-Klik
                            </a>
                        </div>
                    @endif
                </div>
            @else
                <div class="flex items-center gap-3 p-4 rounded-xl bg-default-50 border border-default-100 text-xs text-default-600">
                    <i data-lucide="info" class="size-4.5 text-default-400 shrink-0"></i>
                    <div>
                        Versi terpasang saat ini adalah <strong class="text-default-900 font-bold">v{{ $currentVersion }}</strong>. Klik tombol <strong>Periksa Pembaruan</strong> untuk memeriksa ketersediaan rilis resmi terbaru dari server <code class="font-mono text-primary">{{ parse_url($donateServerUrl, PHP_URL_HOST) ?: 'tesloka.web.id' }}</code>.
                    </div>
                </div>
            @endif
        </div>

        <!-- 2B. PEMBARUAN MANUAL VIA UPLOAD PAKET ZIP -->
        <div class="rounded-2xl border border-default-200 bg-white p-6 shadow-2xs space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-default-100 pb-4">
                <div>
                    <h3 class="font-bold text-base text-default-900 flex items-center gap-2">
                        <i data-lucide="file-archive" class="size-4.5 text-primary"></i>
                        <span>Pembaruan Manual (Unggah Paket ZIP)</span>
                    </h3>
                    <p class="text-xs text-default-500 mt-0.5">
                        Terapkan paket pembaruan aplikasi (<code class="font-mono">.zip</code>) langsung ke instalasi yang sudah berjalan tanpa menghapus database atau mengulang setup dari awal.
                    </p>
                </div>
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">
                    <i data-lucide="unlock" class="size-3.5"></i>
                    Tersedia untuk Lisensi Aktif
                </span>
            </div>

            <div class="p-3.5 rounded-xl bg-sky-50 border border-sky-200 text-xs text-sky-900 flex items-start gap-2.5 leading-relaxed">
                <i data-lucide="shield-check" class="size-4.5 text-sky-600 shrink-0 mt-0.5"></i>
                <div>
                    <strong class="block font-bold">Perlindungan Data &amp; Migrasi Skema Otomatis</strong>
                    Konfigurasi <code>.env</code>, direktori <code>storage/</code> (termasuk foto, audio soal, kunci lisensi, dan backup), serta data basis data tetap aman terlindungi. Setelah ekstraksi selesai, sistem otomatis menjalankan penyesuaian struktur tabel (<code>migrate --force</code>), membersihkan cache, dan menyediakan <em>Auto-Rollback</em> bila terjadi kegagalan.
                </div>
            </div>

            <form action="{{ route('staff.settings.license.manual-update') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs" onsubmit="return confirm('Terapkan paket pembaruan ZIP ini? Sistem akan membuat snapshot backup dan menyelaraskan skema database secara otomatis tanpa menghapus data.')">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2 space-y-1.5">
                        <label for="manual_update_package" class="block font-semibold text-default-800 uppercase tracking-wider">
                            Pilih Berkas Paket Pembaruan (.zip) <span class="text-danger">*</span>
                        </label>
                        <input type="file" id="manual_update_package" name="update_package" accept=".zip,application/zip" required
                            class="form-input w-full text-xs file:me-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                        @error('update_package')
                            <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                        <p class="text-[11px] text-default-400">Maksimal 200 MB. Mendukung arsip ZIP langsung dari rilis resmi maupun repositori ZIP.</p>
                    </div>
                    <div class="space-y-1.5">
                        <label for="manual_target_version" class="block font-semibold text-default-800 uppercase tracking-wider">
                            Versi Target (Opsional)
                        </label>
                        <input type="text" id="manual_target_version" name="target_version" value="{{ old('target_version') }}" placeholder="Contoh: 1.2.0"
                            class="form-input font-mono w-full">
                        @error('target_version')
                            <p class="text-[11px] text-rose-600 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                        <p class="text-[11px] text-default-400">Kosongkan untuk deteksi otomatis dari berkas paket.</p>
                    </div>
                </div>

                <div>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-primary hover:bg-primary-hover text-white font-bold text-xs transition shadow-2xs inline-flex items-center gap-2 cursor-pointer">
                        <i data-lucide="upload-cloud" class="size-4"></i>
                        <span>Unggah &amp; Terapkan Pembaruan ZIP</span>
                    </button>
                </div>
            </form>
        </div>
    @endif

    <!-- 3. FORMULIR AKTIVASI LISENSI -->
    <div class="rounded-2xl border border-default-200 bg-white p-6 shadow-2xs space-y-4">
        <div class="border-b border-default-100 pb-3">
            <h3 class="font-bold text-base text-default-900 flex items-center gap-2">
                <i data-lucide="key" class="size-4.5 text-primary"></i>
                <span>{{ $license['is_activated'] ? 'Perbarui atau Ganti Kunci Lisensi' : 'Aktivasi Lisensi Resmi (Komunitas / Supporter)' }}</span>
            </h3>
            <p class="text-xs text-default-500 mt-0.5">
                Masukkan Kunci Lisensi (<code class="font-mono text-primary font-bold">TESLOKA-COMM-XXXX</code> atau <code class="font-mono text-primary font-bold">TESLOKA-SUPP-XXXX</code>) atau Token Digital Kriptografis lengkap yang diperoleh dari portal resmi.
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
                    placeholder="Tempelkan Kunci Lisensi (e.g. TESLOKA-COMM-XXXX atau TESLOKA-SUPP-XXXX) atau Token Digital lengkap...">{{ old('license_input') }}</textarea>
                <p class="text-[11px] text-default-400 mt-1">
                    Mendukung verifikasi online otomatis atau verifikasi offline tanda tangan digital RSA-2048 tanpa butuh koneksi internet.
                </p>
            </div>

            <div class="flex items-center gap-3 flex-wrap">
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-primary hover:bg-primary-hover text-white font-bold text-xs transition shadow-2xs flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="check" class="size-4"></i>
                    <span>Simpan &amp; Verifikasi Lisensi</span>
                </button>
                <a href="{{ $donateServerUrl }}/register" target="_blank" rel="noopener noreferrer" class="px-4 py-2.5 rounded-xl border border-default-200 hover:bg-default-50 text-default-700 font-semibold text-xs transition">
                    Belum Punya Lisensi? Dapatkan Gratis di Sini
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
