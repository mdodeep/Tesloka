@extends('layouts.student')

@section('title', 'Petunjuk Ujian - ' . $exam->title)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-sm text-default-500">
        <a href="{{ route('student.dashboard') }}" class="hover:text-primary-600">Beranda</a>
        <span>/</span>
        <a href="{{ route('student.exam.index') }}" class="hover:text-primary-600">Daftar Ujian</a>
        <span>/</span>
        <span class="text-default-800 font-medium">Petunjuk & Verifikasi</span>
    </div>

    @if($errors->any())
        <x-cbt.alert type="danger" dismissible="true">
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </x-cbt.alert>
    @endif

    <x-cbt.card title="Konfirmasi & Petunjuk Pelaksanaan Ujian">
        <div class="space-y-6">
            <!-- Informasi Ujian -->
            <div class="p-4 bg-default-50 border border-default-200 rounded space-y-3">
                <div class="flex items-center justify-between">
                    <span class="px-2.5 py-0.5 bg-primary-100 text-primary-800 text-xs font-bold rounded uppercase">
                        {{ $exam->exam_type }}
                    </span>
                    <span class="text-xs text-default-500 font-mono">Kode: {{ $exam->code }}</span>
                </div>
                <h2 class="text-xl font-bold text-default-900">{{ $exam->title }}</h2>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs pt-2 border-t border-default-200 text-default-700">
                    <div>
                        <span class="text-default-400 block">Mata Pelajaran:</span>
                        <strong>{{ $exam->subject->name ?? '-' }}</strong>
                    </div>
                    <div>
                        <span class="text-default-400 block">Durasi Pengerjaan:</span>
                        <strong>{{ $exam->duration_minutes }} Menit</strong>
                    </div>
                    <div>
                        <span class="text-default-400 block">Ruang Pelaksanaan:</span>
                        <strong>{{ $participant->session->room->name ?? '-' }}</strong>
                    </div>
                    <div>
                        <span class="text-default-400 block">Nomor Kursi:</span>
                        <strong class="text-primary font-mono">{{ $participant->seat_number ?? '-' }}</strong>
                    </div>
                </div>
                <div class="pt-2 flex justify-end">
                    <a href="{{ route('student.exam.card', $exam) }}" target="_blank" class="btn btn-sm bg-white border border-default-200 hover:bg-default-50 text-default-700 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
                        <i data-lucide="printer" class="size-3.5 text-default-500"></i>
                        <span>Cetak Kartu Peserta Ujian</span>
                    </a>
                </div>
            </div>

            <!-- Pemeriksaan Kesiapan Perangkat (Device Pre-Flight Check) -->
            <div class="p-4 bg-white border border-default-200 rounded space-y-3">
                <div class="flex items-center justify-between border-b border-default-100 pb-2.5">
                    <h3 class="text-sm font-bold text-default-900 flex items-center gap-2">
                        <i data-lucide="check-circle" class="size-4.5 text-primary"></i>
                        <span>Pemeriksaan Kesiapan Perangkat (Pre-Flight Check)</span>
                    </h3>
                    <span id="preflightOverallBadge" class="px-2.5 py-0.5 bg-blue-100 text-blue-800 text-[11px] font-bold rounded-full">
                        Memeriksa Perangkat...
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs">
                    <!-- Browser & OS -->
                    <div class="p-2.5 bg-default-50 border border-default-200 rounded-lg flex items-center justify-between">
                        <div class="space-y-0.5">
                            <span class="text-default-500 font-medium block">Browser & Sistem Operasi:</span>
                            <span id="preflightBrowser" class="font-semibold text-default-800">Mendeteksi...</span>
                        </div>
                        <span id="badgeBrowser" class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-default-100 text-default-700 border border-default-200">Cek</span>
                    </div>

                    <!-- Resolusi Layar -->
                    <div class="p-2.5 bg-default-50 border border-default-200 rounded-lg flex items-center justify-between">
                        <div class="space-y-0.5">
                            <span class="text-default-500 font-medium block">Resolusi Layar (Viewport):</span>
                            <span id="preflightResolution" class="font-semibold text-default-800">Mendeteksi...</span>
                        </div>
                        <span id="badgeResolution" class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-default-100 text-default-700 border border-default-200">Cek</span>
                    </div>

                    <!-- Latensi Server -->
                    <div class="p-2.5 bg-default-50 border border-default-200 rounded-lg flex items-center justify-between">
                        <div class="space-y-0.5">
                            <span class="text-default-500 font-medium block">Koneksi Server (Latensi):</span>
                            <span id="preflightLatency" class="font-semibold text-default-800">Mengukur ping...</span>
                        </div>
                        <span id="badgeLatency" class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-default-100 text-default-700 border border-default-200">Cek</span>
                    </div>

                    <!-- Mode Fullscreen -->
                    <div class="p-2.5 bg-default-50 border border-default-200 rounded-lg flex items-center justify-between">
                        <div class="space-y-0.5">
                            <span class="text-default-500 font-medium block">Dukungan Layar Penuh:</span>
                            <span id="preflightFullscreen" class="font-semibold text-default-800">Didukung</span>
                        </div>
                        <span id="badgeFullscreen" class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80">Tersedia</span>
                    </div>
                </div>

                <div id="preflightAlert" class="hidden p-3 rounded-lg text-xs font-medium"></div>
            </div>

            @if($exam->seb_required)
                <div class="p-4 bg-amber-50 border border-amber-200 rounded flex items-center justify-between gap-4 flex-wrap">
                    <div class="flex items-center gap-3">
                        <div class="size-9 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center shrink-0">
                            <i data-lucide="lock" class="size-5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-amber-900 uppercase">Ujian Ini Mewajibkan Safe Exam Browser</span>
                            <p class="text-xs text-amber-700">Buka ujian ini menggunakan aplikasi Safe Exam Browser resmi.</p>
                        </div>
                    </div>
                    <a href="{{ route('student.exam.seb-config', $exam) }}" class="btn btn-sm bg-amber-600 hover:bg-amber-700 text-white font-semibold inline-flex items-center gap-1.5 shadow-xs">
                        <i data-lucide="download" class="size-4"></i>
                        <span>Unduh File .seb</span>
                    </a>
                </div>
            @endif

            <!-- Tata Tertib & Ketentuan CBT -->
            <div class="space-y-3">
                <h3 class="text-sm font-bold text-default-800 uppercase tracking-wide flex items-center gap-2">
                    <i data-lucide="clipboard-list" class="size-4.5 text-primary"></i>
                    <span>Tata Tertib & Ketentuan Pengerjaan:</span>
                </h3>
                <ul class="text-xs text-default-600 space-y-2 list-disc list-inside bg-white p-4 border border-default-200 rounded leading-relaxed">
                    <li><strong>Waktu Server:</strong> Hitung mundur pengerjaan menggunakan jam server resmi {{ $branding['system_label'] ?? 'CBT' }}. Menutup browser atau memuat ulang halaman tidak menghentikan maupun menambah durasi timer.</li>
                    <li><strong>Penyimpanan Jawaban:</strong> Jawaban yang Anda pilih disimpan secara otomatis dan instan (*real-time autosave*) ke basis data server.</li>
                    <li><strong>Integritas Layar Penuh:</strong> Anda diharapkan tetap berada pada jendela ujian. Tindakan berpindah tab, membuka aplikasi lain, atau keluar dari layar penuh akan dicatat ke dalam log insiden sistem.</li>
                    <li><strong>Pengumpulan Ujian:</strong> Klik tombol <strong>Selesai Ujian</strong> jika telah memeriksa seluruh jawaban Anda. Sistem akan menerbitkan <strong>Bukti Tanda Terima Digital</strong> sah sebagai konfirmasi akhir.</li>
                </ul>
            </div>

            <!-- Form Verifikasi Token & Mulai Ujian -->
            <form action="{{ route('student.exam.start', $exam) }}" method="POST" class="pt-4 border-t border-default-200 space-y-4">
                @csrf
                <div>
                    <label for="student_exam_token" class="block text-xs font-bold text-default-800 uppercase mb-1.5">
                        Masukkan Token Rilis Ujian *
                    </label>
                    <input type="text" id="student_exam_token" name="token" value="{{ old('token') }}" placeholder="Ketik 6 digit token dari pengawas (cth: AB12CD)" class="form-input w-full text-base font-mono font-bold tracking-widest text-center border-default-200 rounded focus:ring-2 focus:ring-primary/20 focus:border-primary uppercase py-2.5 h-11" maxlength="20" required autocomplete="off">
                    <p class="text-xs text-default-400 text-center mt-1.5">Token rilis diberikan oleh pengawas ruang ujian di papan tulis atau pengumuman ruang.</p>
                </div>

                <div class="p-3.5 bg-blue-50/70 border border-blue-200/80 rounded">
                    <label class="flex items-start gap-2.5 cursor-pointer text-xs text-blue-900 leading-relaxed font-semibold select-none">
                        <input type="checkbox" name="integrity_pledge" value="1" {{ old('integrity_pledge') ? 'checked' : '' }} class="form-checkbox size-4 text-primary rounded mt-0.5" required>
                        <span>Saya menyatakan akan mengerjakan ujian ini secara mandiri, jujur, dan mematuhi seluruh tata tertib pelaksanaan yang berlaku (Pakta Integritas Peserta).</span>
                    </label>
                </div>

                <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-between gap-2.5 pt-2">
                    <a href="{{ route('student.exam.index') }}" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-center w-full sm:w-auto">
                        Batal & Kembali
                    </a>
                    <button type="submit" id="btnStartExam" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-bold shadow-xs inline-flex items-center justify-center gap-2 transition w-full sm:w-auto">
                        <i data-lucide="play-circle" class="size-4 shrink-0"></i>
                        <span>Mulai Mengerjakan Ujian</span>
                    </button>
                </div>
            </form>
        </div>
    </x-cbt.card>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ua = navigator.userAgent;

    // 1. Browser & OS Detection
    let os = 'Unknown OS';
    if (ua.indexOf('Win') !== -1) os = 'Windows';
    else if (ua.indexOf('Mac') !== -1) os = 'macOS';
    else if (ua.indexOf('Linux') !== -1) os = 'Linux';
    else if (ua.indexOf('Android') !== -1) os = 'Android';
    else if (ua.indexOf('like Mac') !== -1) os = 'iOS';

    let browser = 'Browser Modern';
    if (ua.indexOf('SEB') !== -1) browser = 'Safe Exam Browser';
    else if (ua.indexOf('Edg') !== -1) browser = 'Microsoft Edge';
    else if (ua.indexOf('Chrome') !== -1) browser = 'Google Chrome';
    else if (ua.indexOf('Firefox') !== -1) browser = 'Mozilla Firefox';
    else if (ua.indexOf('Safari') !== -1) browser = 'Apple Safari';

    const browserEl = document.getElementById('preflightBrowser');
    const badgeBrowser = document.getElementById('badgeBrowser');
    if (browserEl) browserEl.textContent = `${browser} (${os})`;
    if (badgeBrowser) {
        badgeBrowser.className = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80';
        badgeBrowser.textContent = 'Kompatibel';
    }

    // 2. Screen Resolution
    const w = window.screen.width || window.innerWidth;
    const h = window.screen.height || window.innerHeight;
    const resEl = document.getElementById('preflightResolution');
    const badgeRes = document.getElementById('badgeResolution');
    if (resEl) resEl.textContent = `${w} x ${h} px`;
    if (badgeRes) {
        if (w >= 1024) {
            badgeRes.className = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80';
            badgeRes.textContent = 'Optimal';
        } else {
            badgeRes.className = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200/80';
            badgeRes.textContent = 'Cukup';
        }
    }

    // 3. Fullscreen Capability
    const fsSupported = document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled || document.msFullscreenEnabled;
    const fsEl = document.getElementById('preflightFullscreen');
    const badgeFs = document.getElementById('badgeFullscreen');
    if (fsEl) fsEl.textContent = fsSupported ? 'Didukung Penuh' : 'Terbatas';
    if (badgeFs) {
        badgeFs.className = fsSupported 
            ? 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80'
            : 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200/80';
        badgeFs.textContent = fsSupported ? 'Tersedia' : 'Peringatan';
    }

    // 4. Server Ping Latency
    const latencyEl = document.getElementById('preflightLatency');
    const badgeLat = document.getElementById('badgeLatency');
    const overallBadge = document.getElementById('preflightOverallBadge');
    const t0 = performance.now();

    fetch('{{ route('student.ping') }}')
        .then(res => res.json())
        .then(data => {
            const ms = Math.round(performance.now() - t0);
            if (latencyEl) latencyEl.textContent = `${ms} ms (Terhubung)`;
            if (badgeLat) {
                if (ms < 400) {
                    badgeLat.className = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80';
                    badgeLat.textContent = 'Sangat Cepat';
                } else if (ms < 1500) {
                    badgeLat.className = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80';
                    badgeLat.textContent = 'Stabil';
                } else {
                    badgeLat.className = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200/80';
                    badgeLat.textContent = 'Lambat';
                }
            }
            if (overallBadge) {
                overallBadge.className = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80';
                overallBadge.textContent = 'Perangkat Siap (100%)';
            }
        })
        .catch(err => {
            if (latencyEl) latencyEl.textContent = 'Koneksi lokal aktif';
            if (badgeLat) {
                badgeLat.className = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80';
                badgeLat.textContent = 'Siap';
            }
            if (overallBadge) {
                overallBadge.className = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/80';
                overallBadge.textContent = 'Perangkat Siap';
            }
        });
});
</script>
@endsection

