<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    @php
        $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
        $institution = $institution ?? \App\Models\Institution::first();
        $logoUrl = $institution?->logo_url ?? $branding['logo_url'];
        $faviconUrl = $institution?->favicon_url ?? $branding['favicon_url'];
        $instName = $institution?->name ?? $branding['institution_name'];
    @endphp
    <title>Pencarian & Verifikasi Sertifikat Resmi : {{ $branding['app_name'] }}</title>
    <link rel="icon" type="image/x-icon" href="{{ $faviconUrl }}">
    <style>
        @font-face {
            font-family: 'Sora';
            src: url('{{ asset('assets/fonts/sora.ttf') }}') format('truetype');
            font-display: swap;
        }
        body {
            font-family: 'Sora', sans-serif;
            background-color: #f8fafc;
            color: #14213d;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-cbt.branding-styles />
</head>
<body class="min-h-screen bg-default-50 flex flex-col justify-between p-4 sm:p-6 antialiased">
    <!-- Top Header Brand -->
    <header class="w-full max-w-4xl mx-auto py-4 flex items-center justify-between border-b border-default-200 mb-8">
        <div class="flex items-center gap-3">
            <img src="{{ $logoUrl }}" alt="{{ $instName }}" class="h-9 max-w-[180px] object-contain">
            <div class="hidden sm:block">
                <div class="text-xs font-bold text-default-800 uppercase tracking-tight">{{ $instName }}</div>
                <div class="text-[10px] text-default-400">Verifikasi Resmi Dokumen & Sertifikat</div>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('student.login') }}" class="px-3 py-1.5 text-xs font-semibold rounded bg-default-100 hover:bg-default-200 text-default-700 transition">
                Portal Siswa
            </a>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200">
                <i data-lucide="shield-check" class="size-3.5"></i>
                Publik Sah
            </span>
        </div>
    </header>

    <!-- Main Container -->
    <main class="w-full max-w-2xl mx-auto flex-1 flex flex-col justify-center py-6">
        <div class="bg-white border border-default-200/90 rounded-2xl shadow-xl p-6 sm:p-10 space-y-6">
            <div class="text-center space-y-2">
                <div class="size-16 rounded-2xl bg-primary/10 text-primary mx-auto flex items-center justify-center shadow-xs">
                    <i data-lucide="award" class="size-8"></i>
                </div>
                <h1 class="text-2xl font-black text-default-900 tracking-tight">Verifikasi Keaslian Sertifikat</h1>
                <p class="text-xs text-default-500 max-w-md mx-auto leading-relaxed">
                    Periksa keabsahan sertifikat kelulusan, surat keterangan hasil ujian (SKHU), dan integritas data penilaian institusi tanpa perlu login ke sistem.
                </p>
            </div>

            <!-- Form Pencarian Publik -->
            <form action="{{ route('certificate.search.post') }}" method="POST" class="space-y-4" onsubmit="this.querySelector('button[type=submit]').disabled=true; this.querySelector('button[type=submit] span').innerText='Memverifikasi...'; this.querySelector('#btn-spinner').classList.remove('hidden'); this.querySelector('#btn-icon').classList.add('hidden');">
                @csrf
                <div class="space-y-1.5">
                    <label for="token" class="block text-xs font-bold text-default-700 uppercase tracking-wider">
                        Nomor Sertifikat / Nomor Resi / ID Hasil Ujian
                    </label>
                    <div class="relative">
                        <input
                            type="text"
                            id="token"
                            name="token"
                            value="{{ old('token') }}"
                            placeholder="Contoh: CERT/CBT/EXAM-01/000001 atau RCP-XXXX-XXXX-XXXX"
                            required
                            autofocus
                            class="w-full px-4 py-3 rounded-xl border border-default-300 focus:border-primary focus:ring-2 focus:ring-primary/20 text-sm font-mono text-default-900 shadow-2xs transition"
                        >
                    </div>
                    @error('token')
                        <p class="text-xs text-danger font-medium mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-3.5 px-4 bg-primary hover:bg-primary-hover text-white rounded-xl font-bold text-sm shadow-xs transition flex items-center justify-center gap-2 cursor-pointer active:scale-[0.99]">
                    <div id="btn-spinner" class="hidden inline-block border-2 rounded-full size-4 animate-spin border-s-transparent border-white"></div>
                    <i id="btn-icon" data-lucide="search" class="size-4"></i>
                    <span>Cari &amp; Verifikasi Sertifikat Sekarang</span>
                </button>
            </form>

            <!-- Informasi Keamanan & Isolasi Beban Server -->
            <div class="p-4 rounded-xl bg-emerald-50/70 border border-emerald-200 text-emerald-900 text-xs space-y-1.5 shadow-2xs">
                <div class="flex items-center gap-2 font-bold text-emerald-800">
                    <i data-lucide="zap" class="size-4 text-emerald-600 shrink-0"></i>
                    <span>Layanan Verifikasi Cepat &amp; Terisolasi Penuh</span>
                </div>
                <p class="text-[11px] text-emerald-700 leading-relaxed">
                    Sistem verifikasi ini dilengkapi perlindungan cache Redis in-memory dan pembatasan laju request. Ratusan mahasiswa atau pihak ketiga yang melakukan pengecekan sertifikat secara bersamaan tidak akan mempengaruhi atau memperlambat sesi ujian yang sedang aktif.
                </p>
            </div>

            <!-- Panduan Format Pencarian -->
            <div class="pt-4 border-t border-default-200 text-xs text-default-500 space-y-1">
                <span class="font-bold text-default-700 block">Kunci pencarian yang didukung:</span>
                <ul class="list-disc list-inside space-y-0.5 text-[11px]">
                    <li><strong>Nomor Resi Resmi:</strong> Dicetak saat peserta mengumpulkan ujian (contoh: <code class="text-primary font-mono font-bold">RCP-A82F-B931-10C4</code>)</li>
                    <li><strong>Nomor Sertifikat:</strong> Format resmi <code class="text-primary font-mono font-bold">CERT/CBT/KODE-UJIAN/NOMOR</code></li>
                    <li><strong>ID Sesi Ujian:</strong> Nomor indeks pengerjaan ujian siswa</li>
                </ul>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full max-w-4xl mx-auto py-6 text-center text-xs text-default-400">
        @if($branding['is_white_label'])
            &copy; {{ date('Y') }} {{ $instName }}
        @else
            &copy; {{ date('Y') }} {{ $instName }} &bull; Sistem Evaluasi Berbasis Komputer TESLOKA CBT On-Premise
        @endif
    </footer>
</body>
</html>

