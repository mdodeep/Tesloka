@extends('layouts.staff')

@section('title', 'Autentikasi Dua Faktor (2FA)')
@section('page-parent', 'Keamanan')
@section('page-title', 'Autentikasi Dua Faktor (2FA)')
@section('page-subtitle', 'Lapisan keamanan ekstra yang mengharuskan memasukkan kode numerik 6 digit dari aplikasi autentikator di ponsel cerdas Anda saat masuk ke sistem.')

@section('content')
<div class="space-y-5 w-full">
    <!-- Header Status Card -->
    <div class="card rounded-xl border border-default-200/90 shadow-2xs bg-white overflow-hidden">
        <div class="card-body p-4 sm:p-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-start gap-4">
                    <div class="size-12 rounded-xl {{ $isEnabled ? 'bg-success/10 text-success border border-success/20' : 'bg-warning/10 text-warning border border-warning/20' }} flex items-center justify-center shrink-0">
                        @if($isEnabled)
                            <i data-lucide="shield-check" class="size-6"></i>
                        @else
                            <i data-lucide="shield-alert" class="size-6"></i>
                        @endif
                    </div>

                    <div>
                        <div class="flex items-center gap-3 flex-wrap">
                            <h3 class="text-base font-bold text-default-900 tracking-tight">Status Perlindungan Akun</h3>
                            @if($isEnabled)
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-success/10 text-success border border-success/20">
                                    <span class="size-1.5 rounded-full bg-success animate-pulse"></span>
                                    Aktif &amp; Terlindungi
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-warning/10 text-warning border border-warning/20">
                                    <span class="size-1.5 rounded-full bg-warning"></span>
                                    Belum Diaktifkan
                                </span>
                            @endif
                        </div>
                        <p class="text-xs text-default-500 mt-1 max-w-2xl leading-relaxed">
                            Lapisan keamanan ekstra yang mengharuskan memasukkan kode numerik 6 digit dari aplikasi autentikator di ponsel cerdas Anda saat masuk ke portal staf.
                        </p>
                    </div>
                </div>

                <div class="shrink-0 w-full sm:w-auto">
                    @if(! $isEnabled)
                        <a href="{{ route('staff.security.two-factor.setup') }}" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-2xs inline-flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto rounded-lg">
                            <i data-lucide="plus" class="size-4"></i>
                            <span>Aktifkan 2FA Sekarang</span>
                        </a>
                    @else
                        <button type="button" onclick="document.getElementById('modal-disable-2fa').classList.remove('hidden')" class="btn btn-sm bg-danger/10 hover:bg-danger text-danger hover:text-white rounded-lg border border-danger/20 transition cursor-pointer inline-flex items-center justify-center gap-1.5 w-full sm:w-auto">
                            <i data-lucide="shield-off" class="size-4"></i>
                            <span>Nonaktifkan 2FA</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(! $isEnabled)
        <!-- Grid Keunggulan 2FA -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="card rounded-xl border border-default-200/90 shadow-2xs bg-white overflow-hidden p-5 flex flex-col justify-between">
                <div>
                    <div class="size-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center mb-3">
                        <i data-lucide="lock" class="size-5"></i>
                    </div>
                    <h4 class="text-sm font-bold text-default-800">Proteksi Brute Force</h4>
                    <p class="text-xs text-default-500 mt-2 leading-relaxed">
                        Mencegah pembajakan akun dan serangan credential stuffing. Meskipun kata sandi Anda bocor, pihak luar tidak dapat masuk tanpa akses fisik ke aplikasi autentikator.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-default-200/70 text-xs font-semibold text-primary">
                    Keamanan Tingkat Lanjut &rarr;
                </div>
            </div>

            <div class="card rounded-xl border border-default-200/90 shadow-2xs bg-white overflow-hidden p-5 flex flex-col justify-between">
                <div>
                    <div class="size-10 rounded-lg bg-teal-500/10 text-teal-600 flex items-center justify-center mb-3">
                        <i data-lucide="clock" class="size-5"></i>
                    </div>
                    <h4 class="text-sm font-bold text-default-800">Standar RFC 6238 TOTP</h4>
                    <p class="text-xs text-default-500 mt-2 leading-relaxed">
                        Menggunakan algoritma Time-based One-Time Password standar industri yang berganti setiap 30 detik tanpa memerlukan koneksi internet pada perangkat ponsel cerdas Anda.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-default-200/70 text-xs font-semibold text-teal-600">
                    Kompatibilitas Standar Universal &rarr;
                </div>
            </div>

            <div class="card rounded-xl border border-default-200/90 shadow-2xs bg-white overflow-hidden p-5 flex flex-col justify-between">
                <div>
                    <div class="size-10 rounded-lg bg-indigo-500/10 text-indigo-600 flex items-center justify-center mb-3">
                        <i data-lucide="key" class="size-5"></i>
                    </div>
                    <h4 class="text-sm font-bold text-default-800">8 Kode Pemulihan Darurat</h4>
                    <p class="text-xs text-default-500 mt-2 leading-relaxed">
                        Sistem menyediakan 8 kode pemulihan darurat satu kali pakai yang dapat Anda simpan atau cetak untuk mengakses akun bila ponsel Anda rusak atau hilang.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-default-200/70 text-xs font-semibold text-indigo-600">
                    Akses Aman Terjamin &rarr;
                </div>
            </div>
        </div>

        <!-- Panduan & Aplikasi Autentikator yang Didukung -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <x-cbt.card title="Aplikasi Autentikator yang Didukung" subtitle="Dapat diunduh secara gratis melalui Google Play Store atau Apple App Store">
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 rounded bg-default-50 border border-default-200">
                        <div class="flex items-center gap-3">
                            <div class="size-8 rounded bg-card border border-default-200 flex items-center justify-center text-xs font-bold text-default-700">G</div>
                            <div>
                                <span class="text-xs font-semibold text-default-800 block">Google Authenticator</span>
                                <span class="text-[11px] text-default-400">Android, iOS &bull; Ringan &amp; Tanpa Iklan</span>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-success/10 text-success border border-success/20">Rekomendasi</span>
                    </div>

                    <div class="flex items-center justify-between p-3 rounded bg-default-50 border border-default-200">
                        <div class="flex items-center gap-3">
                            <div class="size-8 rounded bg-card border border-default-200 flex items-center justify-center text-xs font-bold text-default-700">M</div>
                            <div>
                                <span class="text-xs font-semibold text-default-800 block">Microsoft Authenticator</span>
                                <span class="text-[11px] text-default-400">Android, iOS &bull; Sinkronisasi Cloud Aman</span>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-primary/10 text-primary border border-primary/20">Populer</span>
                    </div>

                    <div class="flex items-center justify-between p-3 rounded bg-default-50 border border-default-200">
                        <div class="flex items-center gap-3">
                            <div class="size-8 rounded bg-card border border-default-200 flex items-center justify-center text-xs font-bold text-default-700">K</div>
                            <div>
                                <span class="text-xs font-semibold text-default-800 block">Apple Passwords / Bitwarden / 1Password</span>
                                <span class="text-[11px] text-default-400">Multi-Platform &amp; Password Manager Terintegrasi</span>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-default-200 text-default-700">Didukung</span>
                    </div>
                </div>
            </x-cbt.card>

            <x-cbt.card title="Alur 3 Langkah Aktivasi" subtitle="Hanya membutuhkan waktu kurang dari 1 menit">
                <ol class="space-y-4 text-xs text-default-600">
                    <li class="flex items-start gap-3">
                        <span class="size-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">1</span>
                        <div>
                            <strong class="text-default-800 block">Buka Halaman Setup &amp; Pindai QR Code</strong>
                            <p class="text-default-500 mt-0.5">Klik tombol "Aktifkan 2FA Sekarang", buka aplikasi autentikator di ponsel Anda, lalu pindai kode QR yang ditampilkan di layar.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="size-6 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">2</span>
                        <div>
                            <strong class="text-default-800 block">Masukkan 6 Digit Angka Konfirmasi</strong>
                            <p class="text-default-500 mt-0.5">Ketikkan 6 digit kode yang sedang aktif di aplikasi autentikator Anda untuk membuktikan sinkronisasi berhasil.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="size-6 rounded-full bg-success text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">3</span>
                        <div>
                            <strong class="text-default-800 block">Simpan 8 Kode Pemulihan Darurat</strong>
                            <p class="text-default-500 mt-0.5">Sistem akan menampilkan 8 kode cadangan satu kali pakai. Simpan kode tersebut di catatan aman Anda.</p>
                        </div>
                    </li>
                </ol>
            </x-cbt.card>
        </div>
    @else
        <!-- Kode Pemulihan Darurat Saat 2FA Aktif -->
        <x-cbt.card title="Kode Pemulihan Darurat (Emergency Recovery Codes)" subtitle="Simpan kode-kode pemulihan berikut di tempat yang aman. Setiap kode hanya dapat dipakai satu kali.">
            <x-slot:actions>
                <button type="button" onclick="copyAllRecoveryCodes()" id="btn-copy-codes" class="btn btn-sm border border-default-200 bg-white hover:bg-default-50 text-default-700 text-xs font-semibold rounded shadow-2xs inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="copy" class="size-3.5 text-default-500"></i>
                    <span id="btn-copy-text">Salin Semua Kode</span>
                </button>
                <button type="button" onclick="downloadRecoveryCodes()" class="btn btn-sm border border-default-200 bg-white hover:bg-default-50 text-default-700 text-xs font-semibold rounded shadow-2xs inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="download" class="size-3.5 text-default-500"></i>
                    <span>Unduh (.txt)</span>
                </button>
                <button type="button" onclick="window.print()" class="btn btn-sm border border-default-200 bg-white hover:bg-default-50 text-default-700 text-xs font-semibold rounded shadow-2xs inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="printer" class="size-3.5 text-default-500"></i>
                    <span>Cetak</span>
                </button>
            </x-slot:actions>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-default-50 p-4 rounded border border-default-200">
                @foreach($recoveryCodes as $code)
                    <div class="font-mono text-center text-xs font-bold tracking-widest bg-card py-2 px-3 rounded border border-default-200 text-default-800 shadow-xs">
                        {{ $code }}
                    </div>
                @endforeach
            </div>

            <!-- Petunjuk Penting Kode Pemulihan -->
            <div class="mt-4 p-3.5 rounded bg-warning/10 border border-warning/20 text-xs text-warning-800 dark:text-warning-300 flex items-start gap-2.5">
                <i data-lucide="alert-triangle" class="size-4.5 text-warning shrink-0 mt-0.5"></i>
                <div>
                    <span class="font-bold text-default-800 block mb-0.5">Petunjuk Penting Kode Pemulihan Darurat:</span>
                    <p class="text-default-600 leading-relaxed">
                        Setiap kode di atas berfungsi sebagai kunci pemulihan satu kali pakai (*one-time recovery code*) untuk masuk ke akun Anda jika perangkat ponsel cerdas Anda rusak, hilang, atau tidak dapat mengakses aplikasi autentikator. Simpan kode ini secara aman dan terpisah dari ponsel Anda.
                    </p>
                </div>
            </div>
        </x-cbt.card>

        <!-- Modal Konfirmasi Nonaktifkan 2FA -->
        <div id="modal-disable-2fa" class="hidden fixed inset-0 bg-default-900/40 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 z-50">
            <div class="bg-card rounded-md max-w-md w-full p-4 sm:p-5 shadow-2xl border border-default-200 space-y-4 max-h-[90vh] flex flex-col">
                <div class="shrink-0 space-y-1">
                    <h4 class="text-base font-semibold text-default-800">Konfirmasi Nonaktifkan 2FA</h4>
                    <p class="text-xs text-default-500">
                        Masukkan password Anda saat ini untuk mengonfirmasi penonaktifan Autentikasi Dua Faktor.
                    </p>
                </div>

                <form action="{{ route('staff.security.two-factor.disable') }}" method="POST" class="space-y-3.5 overflow-y-auto pr-1">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-default-800 mb-1">Password Saat Ini</label>
                        <input type="password" name="password" required class="form-input" placeholder="Password akun Anda">
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 pt-3 border-t border-default-200 shrink-0">
                        <button type="button" onclick="document.getElementById('modal-disable-2fa').classList.add('hidden')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded text-center justify-center w-full sm:w-auto">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-sm bg-danger text-white hover:bg-danger/90 rounded text-center justify-center w-full sm:w-auto">
                            Ya, Nonaktifkan 2FA
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            const recoveryCodesList = @json($recoveryCodes ?? []);

            function copyAllRecoveryCodes() {
                if (!recoveryCodesList || recoveryCodesList.length === 0) return;
                const text = recoveryCodesList.join('\n');
                navigator.clipboard.writeText(text).then(() => {
                    const btnText = document.getElementById('btn-copy-text');
                    if (btnText) {
                        const originalText = btnText.innerText;
                        btnText.innerText = 'Tersalin!';
                        setTimeout(() => {
                            btnText.innerText = originalText;
                        }, 2000);
                    }
                }).catch(err => {
                    console.error('Failed to copy: ', err);
                });
            }

            function downloadRecoveryCodes() {
                if (!recoveryCodesList || recoveryCodesList.length === 0) return;
                const header = "KODE PEMULIHAN DARURAT (EMERGENCY RECOVERY CODES) : {{ $branding['app_name'] }}\n" +
                    "Akun: {{ $user->name }} ({{ $user->username }})\n" +
                    "Institusi: {{ $user->institution->name ?? $branding['institution_name'] }}\n" +
                    "Tanggal Unduh: " + new Date().toLocaleString('id-ID') + "\n" +
                    "----------------------------------------------------------------------\n" +
                    "PERINGATAN: Setiap kode hanya dapat dipakai 1 kali saat darurat.\n" +
                    "Simpan file ini di lokasi aman (brankas password / media offline).\n" +
                    "----------------------------------------------------------------------\n\n";
                const content = header + recoveryCodesList.map((code, idx) => (idx + 1) + ". " + code).join('\n') + "\n";
                const blob = new Blob([content], { type: 'text/plain;charset=utf-8' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = "kode-pemulihan-2fa-tesloka-{{ $user->username }}.txt";
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }
        </script>
    @endif
</div>
@endsection
