<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $attempt->exam->title }} - {{ $branding['app_name'] }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/proctoring.js'])
    <x-cbt.branding-styles />
    <style>
        [v-cloak] { display: none; }
        .no-select { user-select: none; -webkit-user-select: none; }
        @media (min-width: 1024px) {
            #paletteSidebar { display: block !important; }
        }
    </style>
</head>
<body class="bg-default-100 text-default-800 font-sans min-h-screen flex flex-col no-select">
    <!-- Top Bar Navigation (Fixed) -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-default-200/90 shadow-2xs">
        <div class="w-full px-3.5 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-2 sm:gap-4">
            <!-- Left: Exam & Student Meta -->
            <div class="flex items-center gap-2 sm:gap-3 min-w-0 flex-1">
                <span class="size-8 sm:size-9 rounded-xl bg-primary text-white font-black flex items-center justify-center text-xs sm:text-sm shadow-xs shrink-0">
                    T
                </span>
                <div class="min-w-0 flex-1">
                    <h1 class="text-xs sm:text-sm font-bold text-default-900 leading-tight truncate">
                        {{ $attempt->exam->title }}
                    </h1>
                    <div class="text-[10px] sm:text-[11px] text-default-500 font-mono truncate">
                        {{ $attempt->student->name }} &bull; Kursi: <strong class="text-default-800">{{ $attempt->participant->seat_number ?? '-' }}</strong>
                    </div>
                </div>
            </div>

            <!-- Center: Real-time Autosave Sync Status -->
            <div class="hidden md:flex items-center gap-2 text-xs shrink-0">
                <span id="saveStatusIndicator" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold border border-emerald-200 shadow-2xs">
                    <i data-lucide="check-circle" class="size-4 text-emerald-600"></i>
                    <span id="saveStatusText">Tersimpan di Server</span>
                </span>
            </div>

            <!-- Right: Server Timer & Palette Trigger -->
            <div class="flex items-center gap-1.5 sm:gap-3 shrink-0">
                <div class="bg-slate-900 text-amber-400 px-3 sm:px-3.5 py-1.5 rounded-xl font-mono text-xs sm:text-sm font-bold tracking-wider flex items-center gap-1.5 sm:gap-2 shadow-inner shrink-0 border border-slate-800">
                    <i data-lucide="clock" class="size-3.5 sm:size-4 text-amber-400"></i>
                    <span id="cbtTimerDisplay">00:00:00</span>
                </div>

                <!-- Accessibility Toolbar -->
                <div class="hidden sm:flex items-center gap-1 bg-default-100 p-1 rounded-xl text-xs font-semibold">
                    <button type="button" onclick="toggleDyslexicFont()" class="px-2.5 py-1 rounded-lg hover:bg-white text-default-700 transition cursor-pointer" title="Toggle Font Ramah Disleksia (OpenDyslexic)">
                        Dyslexic
                    </button>
                    <button type="button" onclick="cycleFontSize()" class="px-2.5 py-1 rounded-lg hover:bg-white text-default-700 font-mono transition cursor-pointer" title="Ubah Ukuran Teks">
                        <span id="fontSizeLabel">A</span>
                    </button>
                    <button type="button" onclick="toggleHighContrast()" class="px-2.5 py-1 rounded-lg hover:bg-white text-default-700 transition cursor-pointer" title="Mode Kontras Tinggi">
                        Kontras
                    </button>
                </div>

                <button type="button" onclick="toggleFullscreen()" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-600 hidden sm:inline-flex rounded-xl" title="Layar Penuh">
                    <i data-lucide="maximize" class="size-4"></i>
                </button>

                <button type="button" onclick="document.getElementById('paletteSidebar').classList.toggle('hidden')" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-700 lg:hidden shrink-0 rounded-xl" title="Daftar Soal">
                    <i data-lucide="layout-grid" class="size-4"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Workspace -->
    <main class="flex-1 w-full px-3.5 sm:px-6 lg:px-8 py-4 sm:py-6">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 items-start">
            <!-- Kolom Utama: Lembar Pertanyaan (3 Kolom) -->
            <div class="lg:col-span-3 space-y-4">
                <!-- Offline Network Warning Banner -->
                <div id="offlineBanner" class="hidden p-4 bg-rose-50 border-2 border-rose-300 rounded-md shadow-sm space-y-1 text-rose-900">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-rose-600 animate-ping"></span>
                        <strong class="text-sm font-bold">Koneksi Terputus (Mode Offline Aktif)</strong>
                    </div>
                    <p class="text-xs text-rose-700 leading-relaxed">
                        Anda sedang bekerja secara offline. Lembar jawaban Anda tetap tersimpan aman di peramban ini dan akan otomatis disinkronkan ke server saat jaringan pulih kembali.
                    </p>
                </div>

                <!-- Announcement Broadcast Banner -->
                <div id="announcementBanner" class="hidden p-4 bg-amber-50 border-2 border-amber-300 rounded-md shadow-sm space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                            <strong id="announcementTitle" class="text-sm font-bold text-amber-900"></strong>
                        </div>
                        <button type="button" onclick="acknowledgeCurrentAnnouncement()" class="px-3 py-1 bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold rounded-lg shadow-xs transition">
                            Saya Mengerti
                        </button>
                    </div>
                    <p id="announcementMessage" class="text-xs text-amber-800 leading-relaxed"></p>
                </div>

                <!-- Camera Denied / Warning Banner -->
                <div id="cameraDeniedBanner" class="hidden p-4 bg-rose-50 border-2 border-rose-300 rounded-md shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-start gap-2.5 text-rose-900">
                        <i data-lucide="camera-off" class="size-5 text-rose-600 shrink-0 mt-0.5"></i>
                        <div class="text-xs leading-relaxed">
                            <strong class="font-bold block">Akses Kamera Pengawas Diperlukan</strong>
                            <span>Izin kamera perangkat Anda tidak aktif atau ditolak. Status ini tercatat pada dashboard Pengawas Ruang. Harap izinkan akses kamera pada pengaturan browser Anda.</span>
                        </div>
                    </div>
                    <button type="button" onclick="initCameraProctoring(true)" class="btn btn-sm bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs rounded-lg shrink-0 cursor-pointer">
                        Aktifkan Kamera Sekarang
                    </button>
                </div>

                <div class="bg-white border border-default-200/90 rounded-2xl p-5 sm:p-7 lg:p-8 shadow-2xs min-h-[520px] flex flex-col justify-between">
                    <!-- Top Question Meta -->
                    <div>
                        <div class="flex items-center justify-between pb-4 border-b border-default-100 mb-6">
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 bg-primary-50 text-primary-700 font-bold text-xs rounded-xl uppercase tracking-wider border border-primary-200/50">
                                    Soal Nomor <span id="currentQuestionNum">1</span>
                                </span>
                                <span class="text-xs text-default-500 font-medium">dari {{ count($orderedQuestions) }} Soal</span>
                            </div>
                            <div>
                                <span id="questionTypeBadge" class="px-3 py-1 bg-default-100 text-default-700 font-mono text-[11px] font-bold rounded-lg uppercase border border-default-200/80">
                                    Pilihan Ganda
                                </span>
                            </div>
                        </div>

                        <!-- Stimulus Wacana Bacaan (Jika ada) -->
                        <div id="stimulusContainer" class="hidden p-4 sm:p-5 bg-default-50/80 border border-default-200 rounded-xl mb-6 shadow-2xs">
                            <div class="text-xs font-bold text-default-600 uppercase tracking-wider mb-1.5 flex items-center gap-2">
                                <i data-lucide="file-text" class="size-4 text-primary"></i>
                                <span id="stimulusTitle">Stimulus</span>
                            </div>
                            <div id="stimulusContent" class="text-sm text-default-800 leading-relaxed prose prose-sm max-w-none"></div>
                        </div>

                        <!-- Teks Pokok Soal -->
                        <div class="mb-8">
                            <div id="questionContent" class="text-base sm:text-lg text-default-900 leading-relaxed font-sans font-medium">
                                <!-- Konten pertanyaan dimuat via JS -->
                            </div>
                        </div>

                        <!-- Wadah Pilihan / Input Jawaban -->
                        <div id="optionsContainer" class="space-y-3 mb-8">
                            <!-- Opsi jawaban dimuat dinamis via JS -->
                        </div>
                    </div>

                    <!-- Bottom Navigation Buttons -->
                    <div class="pt-6 border-t border-default-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                        <button type="button" id="btnPrev" onclick="navigateQuestion(-1)" class="w-full sm:w-auto btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-bold text-xs rounded-xl inline-flex items-center justify-center gap-2 disabled:opacity-40 disabled:cursor-not-allowed cursor-pointer px-4 py-2.5 transition">
                            <i data-lucide="chevron-left" class="size-4"></i>
                            <span>Soal Sebelumnya</span>
                        </button>

                        <button type="button" id="btnFlag" onclick="toggleCurrentFlag()" class="w-full sm:w-auto btn btn-sm bg-amber-50 hover:bg-amber-100 text-amber-800 font-bold text-xs rounded-xl border border-amber-200 inline-flex items-center justify-center gap-2 cursor-pointer px-4 py-2.5 transition">
                            <i data-lucide="flag" class="size-4 text-amber-600"></i>
                            <span id="btnFlagText">Ragu-ragu</span>
                        </button>

                        <div class="flex items-center gap-2 w-full sm:w-auto">
                            <button type="button" id="btnNext" onclick="navigateQuestion(1)" class="flex-1 sm:flex-none btn btn-sm bg-primary hover:bg-primary-hover text-white font-bold text-xs rounded-xl shadow-xs inline-flex items-center justify-center gap-2 cursor-pointer px-4 py-2.5 transition active:scale-[0.98]">
                                <span>Soal Berikutnya</span>
                                <i data-lucide="chevron-right" class="size-4"></i>
                            </button>
                            <button type="button" onclick="openFinishModal()" class="btn btn-sm bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-xs inline-flex items-center justify-center gap-2 cursor-pointer px-4 py-2.5 transition active:scale-[0.98]">
                                <i data-lucide="check" class="size-4"></i>
                                <span>Selesai</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Palet Nomor Soal & Ringkasan (1 Kolom) -->
            <div id="paletteSidebar" class="hidden lg:block fixed inset-0 lg:static z-50 lg:z-auto bg-black/40 lg:bg-transparent backdrop-blur-xs lg:backdrop-blur-none flex items-center justify-center lg:items-stretch lg:justify-start p-3 sm:p-4 lg:p-0">
                <div class="bg-white border border-default-200/90 rounded-2xl p-5 shadow-2xl lg:shadow-2xs space-y-4 sm:space-y-5 w-full max-w-sm lg:max-w-none max-h-[90vh] lg:max-h-none overflow-y-auto">

                    @if($attempt->exam->isCameraProctoringEnabled())
                        <!-- Widget Kamera Pengawas Peserta (Live Proctoring & Anti-Cheat) -->
                        <div id="cbtWebcamWidget" class="bg-slate-900 border border-slate-800 rounded-md p-3 text-white space-y-2.5 shadow-sm">
                            <div class="flex items-center justify-between text-xs pb-1.5 border-b border-slate-800">
                                <div class="flex items-center gap-1.5 font-bold text-slate-200">
                                    <span id="cbtCamIndicator" class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                                    <span>Kamera Pengawas</span>
                                </div>
                                <span id="cbtCamBadge" class="text-[10px] font-mono px-2 py-0.5 rounded bg-slate-800 text-amber-300">
                                    Meminta Izin...
                                </span>
                            </div>

                            <div class="aspect-video bg-black rounded overflow-hidden relative flex items-center justify-center border border-slate-800">
                                <video id="cbtWebcamVideo" autoplay playsinline muted class="w-full h-full object-cover -scale-x-100"></video>
                                <canvas id="cbtSnapshotCanvas" class="hidden" width="640" height="480"></canvas>
                                <div id="cbtWebcamFallback" class="absolute inset-0 flex flex-col items-center justify-center text-center p-3 bg-slate-950/95 text-slate-400 z-10">
                                    <i data-lucide="camera-off" class="size-6 text-rose-400 mb-1"></i>
                                    <span id="cbtWebcamFallbackText" class="text-[11px] font-medium text-slate-300">Menghubungkan kamera...</span>
                                    <button type="button" onclick="initCameraProctoring(true)" class="mt-2 px-2.5 py-1 bg-primary hover:bg-primary-hover text-white text-[11px] font-semibold rounded shadow-xs transition cursor-pointer">
                                        Aktifkan Kamera
                                    </button>
                                </div>
                            </div>

                            <div class="flex items-center justify-between text-[10px] text-slate-400">
                                <span>Status: <strong id="cbtCamStatusText" class="text-slate-200">Menyiapkan</strong></span>
                                <span id="cbtSnapCounter" class="font-mono text-slate-400">0 Snapshot</span>
                            </div>
                        </div>
                    @endif

                    <div class="flex items-center justify-between pb-3 border-b border-default-100">
                        <h3 class="text-xs font-bold text-default-800 uppercase tracking-wide">Navigasi Soal</h3>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-default-400 font-mono">{{ count($orderedQuestions) }} Butir</span>
                            <button type="button" onclick="document.getElementById('paletteSidebar').classList.add('hidden')" class="lg:hidden p-1 rounded-md hover:bg-default-100 text-default-500 transition cursor-pointer" title="Tutup Palet Soal">
                                <i data-lucide="x" class="size-4"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Grid Palet Nomor Soal -->
                    <div class="grid grid-cols-5 gap-2 max-h-80 overflow-y-auto p-1" id="paletteGrid">
                        <!-- Tombol palet digenerate secara dinamis -->
                    </div>

                    <!-- Ringkasan Status Soal -->
                    <div class="pt-3 border-t border-default-100 space-y-2 text-xs">
                        <div class="flex items-center justify-between">
                            <span class="flex items-center gap-1.5 text-default-600">
                                <span class="w-3 h-3 rounded-full bg-emerald-600"></span> Sudah Dijawab:
                            </span>
                            <strong class="text-default-800" id="summaryAnswered">0</strong>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center gap-1.5 text-default-600">
                                <span class="w-3 h-3 rounded-full bg-amber-500"></span> Ragu-ragu:
                            </span>
                            <strong class="text-default-800" id="summaryFlagged">0</strong>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center gap-1.5 text-default-600">
                                <span class="w-3 h-3 rounded-full bg-slate-200 border border-default-200"></span> Belum Dijawab:
                            </span>
                            <strong class="text-default-800" id="summaryUnanswered">{{ count($orderedQuestions) }}</strong>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="button" onclick="openFinishModal()" class="w-full btn btn-sm bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded shadow-xs inline-flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="check-circle" class="size-4"></i>
                            <span>Kumpulkan Ujian</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Peringatan Khusus Pengawas (Urgent Proctor Warning - FULL-FEATURE 20.8, 22) -->
    <div id="urgentWarningModal" class="fixed inset-0 z-50 flex items-center justify-center bg-default-900/50 backdrop-blur-xs hidden p-3 sm:p-4">
        <div class="card max-w-md w-full p-6 text-center shadow-2xl border-2 border-rose-500 space-y-4 max-h-[90vh] flex flex-col">
            <div class="size-14 rounded-full bg-rose-100 text-rose-600 mx-auto flex items-center justify-center shrink-0">
                <i data-lucide="alert-triangle" class="size-8"></i>
            </div>
            <div class="shrink-0">
                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-rose-100 text-rose-800 border border-rose-200">
                    Pemberitahuan Khusus Pengawas
                </span>
                <h3 id="urgentWarningTitle" class="text-base font-bold text-default-900 mt-2">PERINGATAN PENGAWAS</h3>
            </div>
            <div class="overflow-y-auto p-4 bg-rose-50/60 rounded-lg border border-rose-200 text-xs text-rose-950 font-medium leading-relaxed text-left">
                <p id="urgentWarningMessage" class="whitespace-pre-wrap"></p>
            </div>
            <div class="pt-2 shrink-0">
                <button type="button" onclick="acknowledgeUrgentWarning()" class="w-full btn btn-sm bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs rounded-lg shadow-xs transition cursor-pointer">
                    Saya Mengerti &amp; Siap Melanjutkan Ujian
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Pengumpulan Ujian -->
    <div id="finishModal" class="fixed inset-0 z-50 flex items-center justify-center bg-default-900/60 backdrop-blur-xs hidden p-3 sm:p-4 transition-opacity">
        <div class="card max-w-md w-full p-5 sm:p-7 shadow-2xl rounded-2xl border border-default-200/90 space-y-4 max-h-[90vh] flex flex-col bg-white animate-in fade-in zoom-in-95 duration-150">
            <div class="text-center space-y-2 shrink-0">
                <div class="size-14 rounded-2xl bg-emerald-50 text-emerald-600 border border-emerald-200 flex items-center justify-center mx-auto text-2xl font-bold shadow-xs">
                    <i data-lucide="check-circle" class="size-7"></i>
                </div>
                <h3 class="text-lg font-black text-default-900 tracking-tight">Konfirmasi Selesai Ujian</h3>
                <p class="text-xs text-default-500 max-w-xs mx-auto leading-relaxed">Apakah Anda yakin ingin mengumpulkan seluruh lembar jawaban ujian sekarang?</p>
            </div>

            <div class="overflow-y-auto space-y-3 pr-1">
                <div class="p-4 bg-default-50 rounded-xl space-y-2.5 border border-default-200 text-xs shadow-2xs">
                    <div class="flex justify-between py-1 border-b border-default-200/70">
                        <span class="text-default-500 font-medium">Total Butir Soal:</span>
                        <strong class="text-default-900">{{ count($orderedQuestions) }} Soal</strong>
                    </div>
                    <div class="flex justify-between py-1 border-b border-default-200/70">
                        <span class="text-default-500 font-medium">Sudah Dijawab:</span>
                        <strong class="text-emerald-700 font-bold" id="modalAnsweredCount">0</strong>
                    </div>
                    <div class="flex justify-between py-1">
                        <span class="text-default-500 font-medium">Belum Dijawab:</span>
                        <strong class="text-rose-600 font-bold" id="modalUnansweredCount">0</strong>
                    </div>
                </div>

                <div id="unansweredWarning" class="hidden p-3.5 bg-rose-50 border border-rose-200 rounded-xl text-xs text-rose-800 flex items-start gap-2.5 shadow-2xs">
                    <i data-lucide="alert-triangle" class="size-4.5 text-rose-600 shrink-0 mt-0.5"></i>
                    <span class="leading-relaxed"><strong>Peringatan:</strong> Masih ada butir soal yang belum Anda jawab. Jawaban kosong bernilai 0.</span>
                </div>
            </div>

            <form action="{{ route('student.exam.submit', $attempt) }}" method="POST" id="submitExamForm" class="pt-2 flex flex-col-reverse sm:flex-row gap-2 justify-end shrink-0">
                @csrf
                <button type="button" onclick="document.getElementById('finishModal').classList.add('hidden')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-bold text-xs rounded-xl cursor-pointer text-center justify-center w-full sm:w-auto px-4 py-2.5 transition">
                    Periksa Kembali
                </button>
                <button type="submit" class="btn btn-sm bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-xs inline-flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto px-4 py-2.5 transition active:scale-[0.98]">
                    <i data-lucide="check" class="size-4"></i>
                    <span>Ya, Kumpulkan Sekarang</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Data Injection for Client Engine -->
    @php
        $examMediaConfig = $attempt->exam->getMediaAndDisplayConfig();
    @endphp
    <script>
        window.CBT_REALTIME = @json($realtimeConfig ?? ['enabled' => false]);
        window.CBT_PROCTORING = @json($proctoringConfig ?? ['livekit_configured' => false, 'snapshot_interval_seconds' => 30, 'zoom_snapshot_interval_seconds' => 3]);
        window.CBT_DATA = {
            attemptId: {{ $attempt->id }},
            remainingSeconds: {{ $attempt->getRemainingSeconds() }},
            saveUrl: "{{ route('student.exam.save-answer', $attempt) }}",
            flagUrl: "{{ route('student.exam.toggle-flag', $attempt) }}",
            timeUrl: "{{ route('student.exam.time', $attempt) }}",
            heartbeatUrl: "{{ route('student.exam.heartbeat', $attempt) }}",
            announcementsUrl: "{{ route('student.exam.announcements', $attempt) }}",
            snapshotUrl: "{{ route('student.exam.incident-snapshot', $attempt) }}",
            livekitTokenUrl: "{{ route('student.exam.livekit-token', $attempt) }}",
            liveFrameUrl: "{{ route('student.exam.live-frame', $attempt) }}",
            cameraProctoring: {{ $attempt->exam->isCameraProctoringEnabled() ? 'true' : 'false' }},
            fullscreenLockEnabled: {{ $attempt->exam->fullscreen_lock_enabled ? 'true' : 'false' }},
            submitUrl: "{{ route('student.exam.submit', $attempt) }}",
            finishUrl: "{{ route('student.exam.finish', $attempt) }}",
            loginUrl: "{{ route('student.login') }}",
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            mediaConfig: {
                audioMaxPlays: {{ (int) $examMediaConfig['audio_max_plays'] }},
                audioAllowSeek: {{ $examMediaConfig['audio_allow_seek'] ? 'true' : 'false' }},
                imageZoomEnabled: {{ $examMediaConfig['image_zoom_enabled'] ? 'true' : 'false' }},
                rtlOptionStyle: "{{ $examMediaConfig['rtl_option_style'] }}",
                rtlAlignOptionsRight: {{ $examMediaConfig['rtl_align_options_right'] ? 'true' : 'false' }}
            },
            questions: [
                @foreach($orderedQuestions as $idx => $pq)
                    @php
                        $snap = $pq->question_snapshot;
                        $ans = $answersMap->get($pq->id);
                        $snapMeta = is_array($snap['metadata'] ?? null) ? $snap['metadata'] : [];
                        $resolvedQMediaUrl = \App\Services\MediaStorageService::resolveMediaUrl($snap['media_path'] ?? $snap['media_url'] ?? null);
                        $resolvedQMediaType = $snap['media_type'] ?? \App\Services\MediaStorageService::inferMediaType($snap['media_path'] ?? $snap['media_url'] ?? null);
                        $snapStimulus = $snap['stimulus'] ?? null;
                        if (is_array($snapStimulus)) {
                            $snapStimulus['media_url'] = \App\Services\MediaStorageService::resolveMediaUrl($snapStimulus['media_path'] ?? $snapStimulus['media_url'] ?? null);
                            $snapStimulus['media_type'] = $snapStimulus['media_type'] ?? \App\Services\MediaStorageService::inferMediaType($snapStimulus['media_path'] ?? $snapStimulus['media_url'] ?? null);
                        }
                    @endphp
                    {
                        packageQuestionId: {{ $pq->id }},
                        number: {{ $idx + 1 }},
                        type: "{{ $snap['type'] ?? 'multiple_choice' }}",
                        content: {!! json_encode($snap['content'] ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!},
                        media_type: "{{ $resolvedQMediaType ?? '' }}",
                        media_path: {!! json_encode($snap['media_path'] ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!},
                        media_url: {!! json_encode($resolvedQMediaUrl ?? '', JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!},
                        difficulty: "{{ $snap['difficulty'] ?? 'medium' }}",
                        weight: {{ $snap['weight'] ?? 1.0 }},
                        isRtl: {{ !empty($snap['is_rtl']) ? 'true' : 'false' }},
                        audioMaxPlays: {!! isset($snapMeta['audio_max_plays']) && $snapMeta['audio_max_plays'] !== '' ? (int) $snapMeta['audio_max_plays'] : 'null' !!},
                        rtlOptionStyle: {!! json_encode($snapMeta['rtl_option_style'] ?? null, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!},
                        stimulus: {!! json_encode($snapStimulus, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!},
                        options: {!! json_encode($snap['options'] ?? [], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!},
                        currentAnswer: {!! json_encode($ans?->answer_payload ?? null, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!},
                        isFlagged: {{ !empty($ans?->is_flagged) ? 'true' : 'false' }},
                        isAnswered: {{ !empty($ans?->is_answered) ? 'true' : 'false' }},
                        revisionSequence: {{ $ans?->revision_sequence ?? 0 }}
                    },
                @endforeach
            ]
        };
    </script>

    <!-- CBT Core Engine Script (Timer, Navigation, Real-time Autosave) -->
    <script>
        let currentIndex = 0;
        const total = window.CBT_DATA.questions.length;
        let remainingSeconds = window.CBT_DATA.remainingSeconds;

        document.addEventListener('DOMContentLoaded', function() {
            renderPalette();
            renderQuestion(currentIndex);
            startTimer();
            startServerSyncHeartbeat();
        });

        function isAudioMedia(type, url, path) {
            if (type === 'audio') return true;
            const target = (path || url || '').toLowerCase();
            return /\.(mp3|wav|ogg|m4a|aac|webm|flac)(\?.*)?$/.test(target);
        }

        function isImageMedia(type, url, path) {
            if (type === 'image') return true;
            const target = (path || url || '').toLowerCase();
            return /\.(jpg|jpeg|png|webp|gif|svg)(\?.*)?$/.test(target);
        }

        function formatOptionLabel(rawKey, isRtl, questionStyle) {
            const key = String(rawKey || '').trim().toUpperCase();
            const examCfg = window.CBT_DATA.mediaConfig || {};
            const style = (questionStyle && ['arabic_hijaiyah', 'arabic_abjadiyah', 'latin'].includes(questionStyle))
                ? questionStyle
                : (examCfg.rtlOptionStyle || 'arabic_hijaiyah');

            if (!isRtl || style === 'latin') {
                return key;
            }

            const maps = {
                arabic_hijaiyah: { A: 'أ', B: 'ب', C: 'ت', D: 'ث', E: 'ج', F: 'ح', G: 'خ', H: 'د' },
                arabic_abjadiyah: { A: 'أ', B: 'ب', C: 'ج', D: 'د', E: 'هـ', F: 'و', G: 'ز', H: 'ح' },
            };
            const map = maps[style] || maps.arabic_hijaiyah;
            return map[key] || key;
        }

        function buildAudioPlayerHtml(src, label, q) {
            const safeSrc = String(src || '').replace(/"/g, '&quot;');
            const examCfg = window.CBT_DATA.mediaConfig || {};
            const maxPlays = (q && q.audioMaxPlays !== null && q.audioMaxPlays !== undefined)
                ? parseInt(q.audioMaxPlays, 10)
                : (typeof examCfg.audioMaxPlays === 'number' ? examCfg.audioMaxPlays : 2);
            const allowSeek = examCfg.audioAllowSeek === false ? '0' : '1';
            return `<div class="cbt-audio-container mb-3.5 p-3 rounded-lg bg-slate-50 border border-default-200 space-y-2">
                <audio controls preload="metadata" controlsList="nodownload" src="${safeSrc}" data-max-plays="${maxPlays}" data-allow-seek="${allowSeek}" class="w-full" onerror="window.handleCbtAudioError(this, '${safeSrc}')">
                    Browser Anda tidak mendukung pemutar audio HTML5.
                </audio>
                <div class="cbt-audio-error hidden p-2.5 rounded bg-rose-50 border border-rose-200 text-xs text-rose-800 flex items-center justify-between gap-2">
                    <span>Berkas audio ${label} gagal dimuat atau tidak tersedia. Hubungi pengawas ruang jika berlanjut.</span>
                    <button type="button" onclick="window.retryCbtAudio(this, '${safeSrc}')" class="px-2.5 py-1 rounded bg-white border border-rose-300 text-rose-800 font-semibold text-[11px] hover:bg-rose-100 shrink-0 cursor-pointer">Muat Ulang</button>
                </div>
            </div>`;
        }

        function buildImageHtml(src, altText) {
            const safeSrc = String(src || '').replace(/"/g, '&quot;');
            const safeAlt = String(altText || '').replace(/"/g, '&quot;');
            const zoomEnabled = !window.CBT_DATA.mediaConfig || window.CBT_DATA.mediaConfig.imageZoomEnabled !== false;
            if (!zoomEnabled) {
                return `<div class="cbt-image-container mb-3.5"><img src="${safeSrc}" alt="${safeAlt}" class="max-h-72 rounded border border-default-200"></div>`;
            }
            return `<div class="cbt-image-container mb-3.5">
                <button type="button" onclick="window.openCbtImageZoom('${safeSrc}')" class="inline-block text-left cursor-zoom-in group" title="Klik untuk memperbesar gambar">
                    <img src="${safeSrc}" alt="${safeAlt}" class="max-h-72 rounded border border-default-200 group-hover:opacity-95 transition">
                    <span class="mt-1 inline-flex items-center gap-1 text-[11px] font-semibold text-primary group-hover:underline">
                        <i data-lucide="zoom-in" class="size-3.5"></i>
                        <span>Klik gambar untuk memperbesar</span>
                    </span>
                </button>
            </div>`;
        }

        window.openCbtImageZoom = function(src) {
            const modal = document.getElementById('imageZoomModal');
            const img = document.getElementById('imageZoomTarget');
            if (modal && img && src) {
                img.src = src;
                modal.classList.remove('hidden');
            }
        };

        window.closeCbtImageZoom = function(event) {
            const modal = document.getElementById('imageZoomModal');
            if (!modal) return;
            if (!event || event.target === modal) {
                modal.classList.add('hidden');
            }
        };

        window.handleCbtAudioError = function(audioEl) {
            const box = audioEl && audioEl.parentElement ? audioEl.parentElement.querySelector('.cbt-audio-error') : null;
            if (box) box.classList.remove('hidden');
        };

        window.retryCbtAudio = function(btn, src) {
            const container = btn.closest('.cbt-audio-container');
            const audioEl = container ? container.querySelector('audio') : null;
            const errBox = container ? container.querySelector('.cbt-audio-error') : null;
            if (errBox) errBox.classList.add('hidden');
            if (audioEl) {
                audioEl.src = src + (src.includes('?') ? '&' : '?') + '_r=' + Date.now();
                audioEl.load();
            }
        };

        function renderQuestion(idx) {
            // Hentikan seluruh pemutar audio yang sedang aktif sebelum berpindah soal
            document.querySelectorAll('.cbt-audio-container audio').forEach(a => {
                try { a.pause(); a.currentTime = 0; } catch (e) {}
            });

            currentIndex = idx;
            const q = window.CBT_DATA.questions[idx];

            document.getElementById('currentQuestionNum').innerText = q.number;
            document.getElementById('questionTypeBadge').innerText = q.type.replace('_', ' ').toUpperCase();

            // Stimulus
            const stimBox = document.getElementById('stimulusContainer');
            if (q.stimulus && (q.stimulus.content || q.stimulus.media_url)) {
                stimBox.classList.remove('hidden');
                document.getElementById('stimulusTitle').innerText = q.stimulus.title || 'Wacana Stimulus';
                let stimHtml = '';
                const stimContentEl = document.getElementById('stimulusContent');
                if (isAudioMedia(q.stimulus.media_type, q.stimulus.media_url, q.stimulus.media_path) && q.stimulus.media_url) {
                    stimHtml += buildAudioPlayerHtml(q.stimulus.media_url, 'stimulus', q);
                    stimHtml += `<div class="p-2.5 rounded bg-primary-50/70 border border-primary-200/60 text-xs text-primary-900 flex items-center gap-2"><i data-lucide="headphones" class="size-4 text-primary shrink-0"></i><span><strong>Petunjuk Mendengarkan:</strong> Dengarkan rekaman audio di atas untuk menjawab butir soal terkait. Transkrip teks tidak ditampilkan pada sesi ujian.</span></div>`;
                } else if (isImageMedia(q.stimulus.media_type, q.stimulus.media_url, q.stimulus.media_path) && q.stimulus.media_url) {
                    stimHtml += buildImageHtml(q.stimulus.media_url, q.stimulus.title || '');
                    if (q.stimulus.content) {
                        stimHtml += `<div class="${q.isRtl ? 'text-right font-serif text-base leading-relaxed' : ''}" ${q.isRtl ? 'dir="rtl"' : ''}>${q.stimulus.content.replace(/\n/g, '<br>')}</div>`;
                    }
                } else {
                    if (q.stimulus.content) {
                        stimHtml += `<div class="${q.isRtl ? 'text-right font-serif text-base leading-relaxed' : ''}" ${q.isRtl ? 'dir="rtl"' : ''}>${q.stimulus.content.replace(/\n/g, '<br>')}</div>`;
                    }
                }
                stimContentEl.innerHTML = stimHtml;
                if (typeof lucide !== 'undefined' && lucide.createIcons) {
                    lucide.createIcons();
                }
            } else {
                stimBox.classList.add('hidden');
            }

            // Question Content (Arabic RTL Harakat Support & Media Audio/Image)
            const qContentEl = document.getElementById('questionContent');
            let qMediaHtml = '';
            if (q.media_url) {
                if (isAudioMedia(q.media_type, q.media_url, q.media_path)) {
                    qMediaHtml = buildAudioPlayerHtml(q.media_url, 'soal', q);
                } else if (isImageMedia(q.media_type, q.media_url, q.media_path)) {
                    qMediaHtml = buildImageHtml(q.media_url, 'Lampiran Soal');
                }
            }
            qContentEl.innerHTML = qMediaHtml + q.content.replace(/\n/g, '<br>');
            if (q.isRtl) {
                qContentEl.setAttribute('dir', 'rtl');
                qContentEl.classList.add('text-right', 'font-serif', 'text-xl');
            } else {
                qContentEl.removeAttribute('dir');
                qContentEl.classList.remove('text-right', 'font-serif', 'text-xl');
            }

            // Options Rendering
            const optBox = document.getElementById('optionsContainer');
            optBox.innerHTML = '';
            const examMediaCfg = window.CBT_DATA.mediaConfig || {};
            const alignOptionsRight = Boolean(q.isRtl && examMediaCfg.rtlAlignOptionsRight !== false);

            if (q.type === 'multiple_choice' || q.type === 'true_false') {
                q.options.forEach(opt => {
                    const isChecked = q.currentAnswer === opt.key;
                    const displayLabel = formatOptionLabel(opt.display_key || opt.key, q.isRtl, q.rtlOptionStyle);
                    const div = document.createElement('div');
                    div.className = `p-4 rounded-xl border-2 transition-all duration-150 cursor-pointer flex items-start sm:items-center gap-3.5 ${alignOptionsRight ? 'text-right' : ''} ${isChecked ? 'bg-primary-50/40 border-primary ring-2 ring-primary/20 shadow-xs' : 'bg-white border-default-200/90 hover:border-primary/40 hover:bg-default-50/60'}`;
                    if (alignOptionsRight) {
                        div.setAttribute('dir', 'rtl');
                    }
                    div.onclick = () => selectSingleOption(opt.key);
                    div.innerHTML = `
                        <span class="size-8 rounded-lg flex items-center justify-center font-bold shrink-0 transition-colors ${q.isRtl ? 'font-serif text-sm' : 'text-xs'} ${isChecked ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-700'}">
                            ${displayLabel}
                        </span>
                        <span class="text-sm sm:text-base text-default-900 leading-snug font-medium flex-1 ${q.isRtl ? 'text-right font-serif text-lg' : ''}">${opt.content}</span>
                    `;
                    optBox.appendChild(div);
                });
            } else if (q.type === 'multiple_choice_complex') {
                const currentArr = Array.isArray(q.currentAnswer) ? q.currentAnswer : [];
                q.options.forEach(opt => {
                    const isChecked = currentArr.includes(opt.key);
                    const displayLabel = formatOptionLabel(opt.display_key || opt.key, q.isRtl, q.rtlOptionStyle);
                    const div = document.createElement('div');
                    div.className = `p-4 rounded-xl border-2 transition-all duration-150 cursor-pointer flex items-start sm:items-center gap-3.5 ${alignOptionsRight ? 'text-right' : ''} ${isChecked ? 'bg-primary-50/40 border-primary ring-2 ring-primary/20 shadow-xs' : 'bg-white border-default-200/90 hover:border-primary/40 hover:bg-default-50/60'}`;
                    if (alignOptionsRight) {
                        div.setAttribute('dir', 'rtl');
                    }
                    div.onclick = () => toggleComplexOption(opt.key);
                    div.innerHTML = `
                        <input type="checkbox" ${isChecked ? 'checked' : ''} class="size-4.5 rounded text-primary pointer-events-none mt-1 sm:mt-0">
                        <span class="size-7 rounded-lg flex items-center justify-center font-bold shrink-0 transition-colors ${q.isRtl ? 'font-serif text-sm' : 'text-xs'} ${isChecked ? 'bg-primary text-white shadow-xs' : 'bg-default-100 text-default-700'}">
                            ${displayLabel}
                        </span>
                        <span class="text-sm sm:text-base text-default-900 leading-snug font-medium flex-1 ${q.isRtl ? 'text-right font-serif text-lg' : ''}">${opt.content}</span>
                    `;
                    optBox.appendChild(div);
                });
            } else if (q.type === 'short_answer' || q.type === 'numeric') {
                const val = q.currentAnswer || '';
                optBox.innerHTML = `
                    <div class="space-y-2">
                        <label class="block text-xs font-semibold text-default-500 uppercase">Ketikkan Jawaban Anda:</label>
                        <input type="text" id="shortAnswerInput" value="${val}" ${q.isRtl ? 'dir="rtl"' : ''} onblur="saveTextAnswer(this.value)" placeholder="Ketik jawaban di sini..." class="form-input w-full text-base border-default-200 rounded p-3 focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium bg-white ${q.isRtl ? 'text-right font-serif' : ''}">
                        <p class="text-xs text-default-400">Tekan di luar kotak input atau pindah soal untuk menyimpan otomatis.</p>
                    </div>
                `;
            } else if (q.type === 'essay') {
                const val = q.currentAnswer || '';
                optBox.innerHTML = `
                    <div class="space-y-2">
                        <label class="block text-xs font-semibold text-default-500 uppercase">Tuliskan Uraian / Jawaban Esai:</label>
                        <textarea id="essayInput" rows="6" ${q.isRtl ? 'dir="rtl"' : ''} onblur="saveTextAnswer(this.value)" placeholder="Tuliskan uraian lengkap di sini..." class="form-textarea w-full text-base border-default-200 rounded p-3 focus:ring-2 focus:ring-primary/20 focus:border-primary leading-relaxed bg-white ${q.isRtl ? 'text-right font-serif' : ''}">${val}</textarea>
                        <p class="text-xs text-default-400">Jawaban tersimpan otomatis saat Anda berpindah soal.</p>
                    </div>
                `;
            }

            // Flag Button State
            const btnFlag = document.getElementById('btnFlag');
            const btnFlagText = document.getElementById('btnFlagText');
            if (q.isFlagged) {
                btnFlag.className = 'w-full sm:w-auto px-4 py-2.5 bg-amber-500 text-white font-bold text-xs rounded shadow-xs inline-flex items-center justify-center gap-1.5';
                btnFlagText.innerText = 'Ragu-ragu (Ditandai)';
            } else {
                btnFlag.className = 'w-full sm:w-auto px-4 py-2.5 bg-default-100 hover:bg-slate-200 text-default-700 font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5';
                btnFlagText.innerText = 'Tandai Ragu-ragu';
            }

            // Prev/Next Button States
            document.getElementById('btnPrev').disabled = (idx === 0);
            document.getElementById('btnNext').innerText = (idx === total - 1) ? 'Soal Terakhir' : 'Soal Berikutnya';

            initAudioListeningLimiter();
            updatePaletteCurrent();
        }

        function navigateQuestion(offset) {
            const nextIdx = currentIndex + offset;
            if (nextIdx >= 0 && nextIdx < total) {
                renderQuestion(nextIdx);
            }
        }

        function jumpToQuestion(idx) {
            renderQuestion(idx);
            // Hide sidebar on mobile after clicking
            if (window.innerWidth < 1024) {
                document.getElementById('paletteSidebar').classList.add('hidden');
            }
        }

        function selectSingleOption(key) {
            const q = window.CBT_DATA.questions[currentIndex];
            q.currentAnswer = key;
            q.isAnswered = true;
            q.revisionSequence++;
            renderQuestion(currentIndex);
            triggerAutosave(q);
        }

        function toggleComplexOption(key) {
            const q = window.CBT_DATA.questions[currentIndex];
            let arr = Array.isArray(q.currentAnswer) ? [...q.currentAnswer] : [];
            if (arr.includes(key)) {
                arr = arr.filter(k => k !== key);
            } else {
                arr.push(key);
            }
            q.currentAnswer = arr;
            q.isAnswered = (arr.length > 0);
            q.revisionSequence++;
            renderQuestion(currentIndex);
            triggerAutosave(q);
        }

        function saveTextAnswer(val) {
            const q = window.CBT_DATA.questions[currentIndex];
            if (q.currentAnswer !== val) {
                q.currentAnswer = val;
                q.isAnswered = (val.trim().length > 0);
                q.revisionSequence++;
                updatePaletteCurrent();
                triggerAutosave(q);
            }
        }

        function toggleCurrentFlag() {
            const q = window.CBT_DATA.questions[currentIndex];
            q.isFlagged = !q.isFlagged;
            renderQuestion(currentIndex);

            fetch(window.CBT_DATA.flagUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.CBT_DATA.csrfToken
                },
                body: JSON.stringify({
                    exam_package_question_id: q.packageQuestionId,
                    is_flagged: q.isFlagged
                })
            }).catch(console.error);
        }

        function triggerAutosave(q) {
            const indicator = document.getElementById('saveStatusIndicator');
            const statusText = document.getElementById('saveStatusText');
            statusText.innerText = 'Menyimpan...';
            indicator.className = 'inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 font-medium border border-amber-200';

            fetch(window.CBT_DATA.saveUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.CBT_DATA.csrfToken
                },
                body: JSON.stringify({
                    exam_package_question_id: q.packageQuestionId,
                    answer_payload: q.currentAnswer,
                    revision_sequence: q.revisionSequence,
                    is_flagged: q.isFlagged,
                    client_timestamp: new Date().toISOString()
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'saved') {
                    statusText.innerText = 'Tersimpan di Server';
                    indicator.className = 'inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-medium border border-emerald-200';
                }
            })
            .catch(() => {
                statusText.innerText = 'Menunggu Koneksi...';
                indicator.className = 'inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-rose-50 text-rose-700 font-medium border border-rose-200';
            });
        }

        function renderPalette() {
            const grid = document.getElementById('paletteGrid');
            grid.innerHTML = '';
            window.CBT_DATA.questions.forEach((q, idx) => {
                const btn = document.createElement('button');
                btn.id = 'palette-btn-' + idx;
                btn.type = 'button';
                btn.onclick = () => jumpToQuestion(idx);
                btn.className = getPaletteClass(q, idx === currentIndex);
                btn.innerText = q.number;
                grid.appendChild(btn);
            });
            updateSummaryCounts();
        }

        function updatePaletteCurrent() {
            window.CBT_DATA.questions.forEach((q, idx) => {
                const btn = document.getElementById('palette-btn-' + idx);
                if (btn) {
                    btn.className = getPaletteClass(q, idx === currentIndex);
                }
            });
            updateSummaryCounts();
        }

        function getPaletteClass(q, isCurrent) {
            let base = 'h-9 w-full rounded-lg font-bold text-xs flex items-center justify-center transition-all cursor-pointer ';
            if (isCurrent) {
                base += 'ring-2 ring-primary ring-offset-1 ';
            }
            if (q.isFlagged) {
                return base + 'bg-amber-500 text-white';
            } else if (q.isAnswered) {
                return base + 'bg-emerald-600 text-white';
            } else {
                return base + 'bg-default-100 hover:bg-slate-200 text-default-700 border border-default-200';
            }
        }

        function updateSummaryCounts() {
            const answered = window.CBT_DATA.questions.filter(q => q.isAnswered).length;
            const flagged = window.CBT_DATA.questions.filter(q => q.isFlagged).length;
            const unanswered = total - answered;

            document.getElementById('summaryAnswered').innerText = answered;
            document.getElementById('summaryFlagged').innerText = flagged;
            document.getElementById('summaryUnanswered').innerText = unanswered;

            document.getElementById('modalAnsweredCount').innerText = answered;
            document.getElementById('modalUnansweredCount').innerText = unanswered;

            const warnBox = document.getElementById('unansweredWarning');
            if (unanswered > 0) {
                warnBox.classList.remove('hidden');
            } else {
                warnBox.classList.add('hidden');
            }
        }

        function startTimer() {
            function updateTimerDisplay() {
                if (remainingSeconds <= 0) {
                    document.getElementById('cbtTimerDisplay').innerText = '00:00:00';
                    alert('Waktu ujian telah habis! Sistem akan mengumpulkan lembar jawaban secara otomatis.');
                    document.getElementById('submitExamForm').submit();
                    return;
                }

                const hrs = Math.floor(remainingSeconds / 3600);
                const mins = Math.floor((remainingSeconds % 3600) / 60);
                const secs = remainingSeconds % 60;

                const str = `${String(hrs).padStart(2, '0')}:${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
                document.getElementById('cbtTimerDisplay').innerText = str;

                remainingSeconds--;
            }

            updateTimerDisplay();
            setInterval(updateTimerDisplay, 1000);
        }

        // ==========================================
        // WEBCAM, LIVEKIT SFU & REAL-TIME ENGINE
        // ==========================================
        let webcamStream = null;
        let isCameraActive = false;
        let cameraState = window.CBT_DATA.cameraProctoring ? 'inactive' : 'inactive';
        let snapshotCount = 0;
        let zoomWatchTimer = null;
        let zoomWatchStopTimeout = null;
        let isRedirectingOut = false;

        function stopCameraAndStreams() {
            if (zoomWatchTimer) { clearInterval(zoomWatchTimer); zoomWatchTimer = null; }
            if (zoomWatchStopTimeout) { clearTimeout(zoomWatchStopTimeout); zoomWatchStopTimeout = null; }
            if (window.TeslokaStudentLiveKit) {
                window.TeslokaStudentLiveKit.disconnect();
            }
            if (webcamStream) {
                webcamStream.getTracks().forEach(t => { try { t.stop(); } catch (e) {} });
                webcamStream = null;
            }
            isCameraActive = false;
        }

        function handleProctorInstruction(instruction, payload = {}) {
            if (!instruction || isRedirectingOut) return;

            if (instruction === 'force_stop') {
                isRedirectingOut = true;
                stopCameraAndStreams();
                alert('Percobaan ujian Anda telah dihentikan secara resmi oleh Pengawas Ujian.');
                window.location.href = payload.redirect_url || window.CBT_DATA.finishUrl;
                return;
            }

            if (instruction === 'force_logout') {
                isRedirectingOut = true;
                stopCameraAndStreams();
                alert('Sesi perangkat Anda telah di-reset / di-logout paksa oleh Pengawas Ujian. Jawaban Anda tersimpan aman di server. Silakan hubungi pengawas atau login kembali.');
                window.location.href = payload.redirect_url || window.CBT_DATA.loginUrl;
                return;
            }

            if (instruction === 'force_refresh') {
                window.location.reload();
                return;
            }

            if (instruction === 'take_snapshot') {
                takeAndUploadSnapshot('proctor_requested');
                return;
            }

            if (instruction === 'add_time' && payload.remaining_seconds !== undefined) {
                remainingSeconds = Number(payload.remaining_seconds);
                return;
            }

            if (instruction === 'zoom_watch_start') {
                startZoomWatchFrames(payload.interval_seconds, payload.duration_seconds);
                return;
            }

            if (instruction === 'zoom_watch_stop') {
                stopZoomWatchFrames();
            }
        }

        function startZoomWatchFrames(intervalSec, durationSec) {
            if (!window.CBT_DATA.cameraProctoring || !isCameraActive) return;
            if (cameraState === 'livekit_streaming') return;

            const intervalMs = Math.max(2000, Number(intervalSec || window.CBT_PROCTORING?.zoom_snapshot_interval_seconds || 3) * 1000);
            const durationMs = Math.min(45000, Math.max(10000, Number(durationSec || 30) * 1000));

            stopZoomWatchFrames();
            uploadLiveFrame();
            zoomWatchTimer = setInterval(uploadLiveFrame, intervalMs);
            zoomWatchStopTimeout = setTimeout(stopZoomWatchFrames, durationMs);
        }

        function stopZoomWatchFrames() {
            if (zoomWatchTimer) { clearInterval(zoomWatchTimer); zoomWatchTimer = null; }
            if (zoomWatchStopTimeout) { clearTimeout(zoomWatchStopTimeout); zoomWatchStopTimeout = null; }
        }

        function uploadLiveFrame() {
            if (!isCameraActive || !window.CBT_DATA.liveFrameUrl) return;
            const base64 = captureFrameBase64(0.55);
            if (!base64) return;

            fetch(window.CBT_DATA.liveFrameUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': window.CBT_DATA.csrfToken
                },
                body: JSON.stringify({ image_base64: base64 })
            }).catch(() => {});
        }

        async function connectStudentLiveKit(stream) {
            if (!window.CBT_PROCTORING?.livekit_configured || !window.TeslokaStudentLiveKit) return;

            const badgeEl = document.getElementById('cbtCamBadge');
            const statusTextEl = document.getElementById('cbtCamStatusText');

            try {
                const res = await fetch(window.CBT_DATA.livekitTokenUrl, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': window.CBT_DATA.csrfToken
                    }
                });
                const cfg = await res.json();
                if (!cfg.enabled || !cfg.url || !cfg.token) return;

                await window.TeslokaStudentLiveKit.connect({
                    url: cfg.url,
                    token: cfg.token,
                    stream: stream,
                    videoProfile: cfg.video_profile || window.CBT_PROCTORING.video_profile || {},
                    onStateChange: (state) => {
                        if (state === 'streaming') {
                            cameraState = 'livekit_streaming';
                            if (badgeEl) {
                                badgeEl.innerText = 'Live Video Aktif';
                                badgeEl.className = 'text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-950 text-emerald-300 border border-emerald-800';
                            }
                            if (statusTextEl) statusTextEl.innerText = 'WebRTC Streaming Aktif';
                            sendHeartbeat({ camera_status: 'livekit_streaming' });
                        } else if (state === 'disconnected' || state === 'failed') {
                            if (isCameraActive) {
                                cameraState = 'active';
                                if (badgeEl) badgeEl.innerText = 'Snapshot Aktif';
                                if (statusTextEl) statusTextEl.innerText = 'Mode Snapshot Cadangan';
                            }
                        }
                    }
                });
            } catch (e) {
                console.warn('LiveKit student init fallback to snapshot:', e);
            }
        }

        async function initCameraProctoring(isUserClick = false) {
            if (!window.CBT_DATA.cameraProctoring) return;

            const fallbackEl = document.getElementById('cbtWebcamFallback');
            const fallbackText = document.getElementById('cbtWebcamFallbackText');
            const deniedBanner = document.getElementById('cameraDeniedBanner');
            const badgeEl = document.getElementById('cbtCamBadge');
            const indicatorEl = document.getElementById('cbtCamIndicator');
            const statusTextEl = document.getElementById('cbtCamStatusText');
            const videoEl = document.getElementById('cbtWebcamVideo');

            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                cameraState = 'unsupported';
                if (fallbackText) fallbackText.innerText = 'Peramban tidak mendukung akses kamera.';
                if (badgeEl) {
                    badgeEl.innerText = 'Tidak Didukung';
                    badgeEl.className = 'text-[10px] font-mono px-2 py-0.5 rounded bg-rose-950 text-rose-300';
                }
                sendHeartbeat({ camera_status: 'unsupported' });
                return;
            }

            try {
                if (fallbackText) fallbackText.innerText = 'Meminta izin kamera...';
                const profile = window.CBT_PROCTORING?.video_profile || {};
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: {
                        width: { ideal: Number(profile.width || 640) },
                        height: { ideal: Number(profile.height || 360) },
                        frameRate: { ideal: Number(profile.frame_rate || 12), max: 20 },
                        facingMode: 'user'
                    },
                    audio: false
                });

                webcamStream = stream;
                if (videoEl) {
                    videoEl.srcObject = stream;
                    await videoEl.play();
                }

                isCameraActive = true;
                cameraState = 'active';
                if (deniedBanner) deniedBanner.classList.add('hidden');
                if (fallbackEl) fallbackEl.classList.add('hidden');
                if (badgeEl) {
                    badgeEl.innerText = 'Snapshot Aktif';
                    badgeEl.className = 'text-[10px] font-mono px-2 py-0.5 rounded bg-sky-950 text-sky-300 border border-sky-800';
                }
                if (indicatorEl) {
                    indicatorEl.className = 'w-2 h-2 rounded-full bg-emerald-500 animate-pulse';
                }
                if (statusTextEl) statusTextEl.innerText = 'Aktif & Terhubung';

                setTimeout(() => takeAndUploadSnapshot('exam_start'), 2000);
                sendHeartbeat({ camera_status: 'active' });
                connectStudentLiveKit(stream);

            } catch (err) {
                console.warn('Akses kamera tidak diizinkan atau gagal:', err);
                isCameraActive = false;
                cameraState = 'denied';
                if (deniedBanner) deniedBanner.classList.remove('hidden');
                if (fallbackEl) fallbackEl.classList.remove('hidden');
                if (fallbackText) fallbackText.innerText = 'Izin kamera belum diberikan.';
                if (badgeEl) {
                    badgeEl.innerText = 'Kamera Mati';
                    badgeEl.className = 'text-[10px] font-mono px-2 py-0.5 rounded bg-rose-950 text-rose-300 border border-rose-800';
                }
                if (indicatorEl) {
                    indicatorEl.className = 'w-2 h-2 rounded-full bg-rose-500';
                }
                if (statusTextEl) statusTextEl.innerText = 'Izin Ditolak';
                sendHeartbeat({ camera_status: 'denied' });
            }
        }

        function captureFrameBase64(quality = 0.65) {
            const video = document.getElementById('cbtWebcamVideo');
            const canvas = document.getElementById('cbtSnapshotCanvas');
            if (!video || !canvas || !isCameraActive || video.videoWidth === 0) return null;

            canvas.width = video.videoWidth || 640;
            canvas.height = video.videoHeight || 360;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            return canvas.toDataURL('image/jpeg', quality);
        }

        function takeAndUploadSnapshot(reason = 'periodic_check') {
            if (!window.CBT_DATA.cameraProctoring) return;
            const base64 = captureFrameBase64(0.65);
            if (!base64) return;

            fetch(window.CBT_DATA.snapshotUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': window.CBT_DATA.csrfToken
                },
                body: JSON.stringify({
                    image_base64: base64,
                    trigger_reason: reason,
                    metadata: {
                        timestamp: new Date().toISOString(),
                        current_question: (currentIndex + 1),
                        is_tab_focused: document.hasFocus(),
                        is_fullscreen: !(!document.fullscreenElement)
                    }
                })
            })
            .then(r => r.json())
            .then(data => {
                if (data.status === 'uploaded') {
                    snapshotCount++;
                    const counterEl = document.getElementById('cbtSnapCounter');
                    if (counterEl) counterEl.innerText = `${snapshotCount} Snapshot`;
                }
            })
            .catch(e => console.warn('Gagal upload snapshot:', e));
        }

        function sendHeartbeat(options = {}) {
            if (isRedirectingOut) return;

            const payload = {
                is_fullscreen: !(!document.fullscreenElement),
                is_tab_focused: document.hasFocus(),
                battery_level: null,
                camera_status: isCameraActive ? cameraState : (['denied', 'unsupported'].includes(cameraState) ? cameraState : 'inactive'),
                ...options
            };

            fetch(window.CBT_DATA.heartbeatUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': window.CBT_DATA.csrfToken
                },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'terminated' || data.instruction === 'force_stop') {
                    handleProctorInstruction('force_stop', { redirect_url: data.redirect_url });
                    return;
                }

                if (data.status === 'logged_out' || data.instruction === 'force_logout') {
                    handleProctorInstruction('force_logout', { redirect_url: data.redirect_url });
                    return;
                }

                if (data.is_expired || data.status === 'expired' || data.status === 'submitted') {
                    isRedirectingOut = true;
                    stopCameraAndStreams();
                    if (data.redirect_url) {
                        window.location.href = data.redirect_url;
                    } else {
                        document.getElementById('submitExamForm').submit();
                    }
                    return;
                }

                if (Array.isArray(data.instructions) && data.instructions.length > 0) {
                    data.instructions.forEach(item => handleProctorInstruction(item.type, item.payload || {}));
                } else if (data.instruction) {
                    handleProctorInstruction(data.instruction);
                }

                if (data.remaining_seconds !== undefined) {
                    if (Math.abs(remainingSeconds - data.remaining_seconds) > 3) {
                        remainingSeconds = data.remaining_seconds;
                    }
                }

                if (data.unread_announcements_count > 0) {
                    fetchAnnouncements();
                }
            })
            .catch(console.error);
        }

        function fetchAnnouncements() {
            fetch(window.CBT_DATA.announcementsUrl, { headers: { 'Accept': 'application/json' } })
                .then(r => r.json())
                .then(data => {
                    if (!data.announcements || data.announcements.length === 0) return;
                    const unread = data.announcements.filter(a => !a.is_read);
                    if (unread.length > 0) {
                        displayAnnouncement(unread[0]);
                    }
                })
                .catch(console.error);
        }

        function displayAnnouncement(ann) {
            const isUrgent = (ann.priority === 'urgent' || ann.priority === 'emergency' || ann.requires_acknowledgement);
            if (isUrgent) {
                const urgentModal = document.getElementById('urgentWarningModal');
                const urgentTitle = document.getElementById('urgentWarningTitle');
                const urgentMsg = document.getElementById('urgentWarningMessage');
                if (urgentModal && urgentTitle && urgentMsg) {
                    urgentTitle.textContent = ann.title || 'PERINGATAN PENGAWAS';
                    urgentMsg.textContent = ann.message;
                    urgentModal.dataset.announcementId = ann.id;
                    urgentModal.classList.remove('hidden');
                    return;
                }
            }

            const banner = document.getElementById('announcementBanner');
            const titleEl = document.getElementById('announcementTitle');
            const msgEl = document.getElementById('announcementMessage');
            if (banner && titleEl && msgEl) {
                titleEl.textContent = `[${ann.priority.toUpperCase()}] ${ann.title}`;
                msgEl.textContent = ann.message;
                banner.dataset.announcementId = ann.id;
                banner.classList.remove('hidden');
            }
        }

        function acknowledgeUrgentWarning() {
            const urgentModal = document.getElementById('urgentWarningModal');
            const annId = urgentModal ? urgentModal.dataset.announcementId : null;
            if (!annId) {
                if (urgentModal) urgentModal.classList.add('hidden');
                return;
            }

            fetch(`/ujian/attempts/${window.CBT_DATA.attemptId}/announcements/${annId}/acknowledge`, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': window.CBT_DATA.csrfToken
                }
            }).then(() => {
                if (urgentModal) urgentModal.classList.add('hidden');
            }).catch(console.error);
        }

        function acknowledgeCurrentAnnouncement() {
            const banner = document.getElementById('announcementBanner');
            const annId = banner.dataset.announcementId;
            if (!annId) return;

            fetch(`/ujian/attempts/${window.CBT_DATA.attemptId}/announcements/${annId}/acknowledge`, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': window.CBT_DATA.csrfToken
                }
            }).then(() => {
                banner.classList.add('hidden');
            }).catch(console.error);
        }

        /**
         * Pengontrol Batas Pemutaran & Kebijakan Seek Audio Listening Comprehension.
         * Mengikuti rules_config ujian (0 = bebas tak terbatas) serta override per butir soal.
         */
        function initAudioListeningLimiter() {
            const containers = [document.getElementById('stimulusContent'), document.getElementById('questionContent')];
            const defaultPlays = window.CBT_DATA.mediaConfig ? window.CBT_DATA.mediaConfig.audioMaxPlays : 2;
            const defaultAllowSeek = !window.CBT_DATA.mediaConfig || window.CBT_DATA.mediaConfig.audioAllowSeek !== false;

            containers.forEach(container => {
                if (!container) return;
                const audios = container.querySelectorAll('audio');
                audios.forEach((audio, aIdx) => {
                    const audioSrc = audio.currentSrc || audio.src || audio.querySelector('source')?.src || `audio_${currentIndex}_${aIdx}`;
                    const storageKey = `audio_play_count_${window.CBT_DATA.attemptId}_${btoa(audioSrc).slice(0, 24)}`;
                    const maxPlays = parseInt(audio.dataset.maxPlays ?? String(defaultPlays), 10);
                    const allowSeek = (audio.dataset.allowSeek ?? (defaultAllowSeek ? '1' : '0')) !== '0';
                    const isUnlimited = maxPlays === 0;
                    let playedCount = parseInt(sessionStorage.getItem(storageKey) || '0', 10);

                    let wrapper = audio.closest('.cbt-audio-wrapper');
                    if (!wrapper) {
                        wrapper = document.createElement('div');
                        wrapper.className = 'cbt-audio-wrapper my-3 p-3.5 bg-slate-50 border border-default-200 rounded-lg space-y-2';
                        audio.parentNode.insertBefore(wrapper, audio);

                        const header = document.createElement('div');
                        header.className = 'flex flex-wrap items-center justify-between gap-2 text-xs font-semibold';
                        const badgeClass = isUnlimited
                            ? 'bg-emerald-100 text-emerald-800'
                            : (playedCount >= maxPlays ? 'bg-rose-100 text-rose-800' : 'bg-primary/10 text-primary');
                        const badgeText = isUnlimited
                            ? 'Putar Bebas (Tanpa Batas)'
                            : `Sisa Putar: ${Math.max(0, maxPlays - playedCount)}x (Maks. ${maxPlays}x)`;
                        const seekBadge = !allowSeek
                            ? '<span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800 text-[10px] font-semibold">Putar Berurutan</span>'
                            : '';

                        header.innerHTML = `
                            <span class="flex items-center gap-1.5 text-primary">
                                <i data-lucide="volume-2" class="size-4"></i>
                                <span>Audio Listening Comprehension</span>
                            </span>
                            <div class="flex items-center gap-1.5">
                                ${seekBadge}
                                <span class="audio-play-counter px-2 py-0.5 rounded font-mono text-[11px] ${badgeClass}">
                                    ${badgeText}
                                </span>
                            </div>
                        `;
                        wrapper.appendChild(header);
                        wrapper.appendChild(audio);
                        if (window.lucide && window.lucide.createIcons) {
                            window.lucide.createIcons();
                        }
                    }

                    if (!allowSeek && audio.dataset.seekBound !== '1') {
                        audio.dataset.seekBound = '1';
                        let lastAllowedTime = 0;
                        audio.addEventListener('timeupdate', () => {
                            if (!audio.seeking && audio.currentTime > lastAllowedTime) {
                                lastAllowedTime = audio.currentTime;
                            }
                        });
                        audio.addEventListener('seeking', () => {
                            if (Math.abs(audio.currentTime - lastAllowedTime) > 1.0) {
                                audio.currentTime = lastAllowedTime;
                            }
                        });
                    }

                    if (isUnlimited) {
                        return;
                    }

                    const counterEl = wrapper.querySelector('.audio-play-counter');
                    if (playedCount >= maxPlays) {
                        audio.pause();
                        audio.controls = false;
                        if (counterEl) {
                            counterEl.className = 'audio-play-counter px-2 py-0.5 rounded font-mono text-[11px] bg-rose-100 text-rose-800 font-bold';
                            counterEl.textContent = 'Batas Putar Habis (0x)';
                        }
                        return;
                    }

                    audio.onplay = () => {
                        playedCount = parseInt(sessionStorage.getItem(storageKey) || '0', 10);
                        if (playedCount >= maxPlays) {
                            audio.pause();
                            audio.controls = false;
                            return;
                        }
                        playedCount++;
                        sessionStorage.setItem(storageKey, playedCount);
                        if (counterEl) {
                            const remaining = Math.max(0, maxPlays - playedCount);
                            counterEl.textContent = `Sisa Putar: ${remaining}x (Maks. ${maxPlays}x)`;
                            if (remaining === 0) {
                                counterEl.className = 'audio-play-counter px-2 py-0.5 rounded font-mono text-[11px] bg-rose-100 text-rose-800 font-bold';
                                counterEl.textContent = 'Batas Putar Habis (0x)';
                                audio.onended = () => {
                                    audio.controls = false;
                                };
                            }
                        }
                    };
                });
            });
        }

        function startServerSyncHeartbeat() {
            // Inisialisasi Kamera Pengawas & LiveKit
            if (window.CBT_DATA.cameraProctoring) {
                initCameraProctoring();
                const snapIntervalMs = Math.max(15000, Number(window.CBT_PROCTORING?.snapshot_interval_seconds || 30) * 1000);
                setInterval(() => {
                    if (isCameraActive) {
                        takeAndUploadSnapshot('periodic_check');
                    }
                }, snapIntervalMs);
            }

            // Hubungkan WebSocket Reverb (instan < 1 detik untuk pengumuman, force_stop, force_logout, request_snapshot, zoom_watch)
            if (typeof window.createTeslokaEcho === 'function') {
                const echo = window.createTeslokaEcho(window.CBT_REALTIME);
                if (echo) {
                    echo.private(`exam.attempt.${window.CBT_DATA.attemptId}`)
                        .listen('.intervention.issued', (e) => {
                            if (e && e.instruction) {
                                handleProctorInstruction(e.instruction, e.payload || {});
                            }
                        })
                        .listen('.announcement.broadcasted', (e) => {
                            if (e && e.announcement) {
                                displayAnnouncement(e.announcement);
                            }
                        });
                }
            }

            // Heartbeat live telemetri setiap 15 detik
            sendHeartbeat();
            setInterval(sendHeartbeat, 15000);

            // Deteksi seketika saat window blur atau fullscreen exit
            window.addEventListener('blur', () => {
                sendHeartbeat({ is_tab_focused: false, event_trigger: 'tab_blur' });
                takeAndUploadSnapshot('tab_blur');
            });
            window.addEventListener('focus', () => sendHeartbeat({ is_tab_focused: true }));
            document.addEventListener('fullscreenchange', () => {
                const isFull = !(!document.fullscreenElement);
                sendHeartbeat({ is_fullscreen: isFull, event_trigger: isFull ? 'fullscreen_enter' : 'fullscreen_exit' });
                if (!isFull && window.CBT_DATA.fullscreenLockEnabled) {
                    takeAndUploadSnapshot('fullscreen_exit');
                }
            });
        }

        function openFinishModal() {
            updateSummaryCounts();
            document.getElementById('finishModal').classList.remove('hidden');
        }

        function toggleFullscreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen().catch(() => {});
            } else {
                document.exitFullscreen().catch(() => {});
            }
        }

        // Accessibility & Accommodations
        let currentScale = 0;
        function toggleDyslexicFont() {
            const isDyslexic = document.documentElement.classList.toggle('font-dyslexic');
            document.body.classList.toggle('font-dyslexic', isDyslexic);
            localStorage.setItem('cbt_pref_dyslexic', isDyslexic ? '1' : '0');
        }
        function cycleFontSize() {
            currentScale = (currentScale + 1) % 3;
            applyFontSize(currentScale);
            localStorage.setItem('cbt_pref_scale', currentScale);
        }
        function applyFontSize(scale) {
            document.documentElement.classList.remove('text-scale-125', 'text-scale-150');
            document.body.classList.remove('text-scale-125', 'text-scale-150');
            const label = document.getElementById('fontSizeLabel');
            if (scale === 1) {
                document.documentElement.classList.add('text-scale-125');
                document.body.classList.add('text-scale-125');
                if (label) label.innerText = 'A+';
            } else if (scale === 2) {
                document.documentElement.classList.add('text-scale-150');
                document.body.classList.add('text-scale-150');
                if (label) label.innerText = 'A++';
            } else {
                if (label) label.innerText = 'A';
            }
        }
        function toggleHighContrast() {
            const isHighContrast = document.documentElement.classList.toggle('high-contrast-mode');
            document.body.classList.toggle('high-contrast-mode', isHighContrast);
            localStorage.setItem('cbt_pref_contrast', isHighContrast ? '1' : '0');
        }

        // Restore accessibility preferences on load
        (function initAccessibility() {
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
                currentScale = savedScale;
                applyFontSize(currentScale);
            }

            // Offline Resilience Listeners
            function checkNetwork() {
                const offEl = document.getElementById('offlineBanner');
                if (offEl) {
                    if (!navigator.onLine) {
                        offEl.classList.remove('hidden');
                    } else {
                        offEl.classList.add('hidden');
                    }
                }
            }
            window.addEventListener('offline', checkNetwork);
            window.addEventListener('online', checkNetwork);
            window.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') window.closeCbtImageZoom();
            });
            checkNetwork();
        })();
    </script>

    <!-- Lightbox Perbesar Gambar Soal Peserta -->
    <div id="imageZoomModal" class="hidden fixed inset-0 z-50 bg-black/75 backdrop-blur-xs flex items-center justify-center p-4" onclick="window.closeCbtImageZoom(event)">
        <div class="relative max-w-4xl max-h-[90vh] flex flex-col items-center">
            <button type="button" onclick="window.closeCbtImageZoom()" class="mb-2 self-end px-3 py-1 rounded-full bg-white text-default-800 text-xs font-bold shadow cursor-pointer">Tutup</button>
            <img id="imageZoomTarget" src="" alt="Perbesaran Media Soal" class="max-h-[82vh] max-w-full rounded-lg shadow-2xl bg-white p-1 object-contain">
        </div>
    </div>
</body>
</html>
