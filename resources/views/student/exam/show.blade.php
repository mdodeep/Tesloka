<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $attempt->exam->title }} - TESLOKA CBT</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    <header class="sticky top-0 z-40 bg-white border-b border-default-200 shadow-xs">
        <div class="w-full px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            <!-- Left: Exam & Student Meta -->
            <div class="flex items-center gap-3">
                <span class="w-9 h-9 rounded bg-primary text-white font-extrabold flex items-center justify-center text-sm shadow-xs">
                    T
                </span>
                <div>
                    <h1 class="text-sm font-bold text-default-900 leading-tight truncate max-w-xs sm:max-w-md">
                        {{ $attempt->exam->title }}
                    </h1>
                    <div class="text-[11px] text-default-500 font-mono">
                        {{ $attempt->student->name }} &bull; Kursi: <strong>{{ $attempt->participant->seat_number ?? '-' }}</strong>
                    </div>
                </div>
            </div>

            <!-- Center: Real-time Autosave Sync Status -->
            <div class="hidden md:flex items-center gap-2 text-xs">
                <span id="saveStatusIndicator" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 font-medium border border-emerald-200">
                    <i data-lucide="check-circle" class="size-4 text-emerald-600"></i>
                    <span id="saveStatusText">Tersimpan di Server</span>
                </span>
            </div>

            <!-- Right: Server Timer & Palette Trigger -->
            <div class="flex items-center gap-3">
                <div class="bg-slate-900 text-white px-3.5 py-1.5 rounded font-mono text-sm font-bold tracking-wider flex items-center gap-2 shadow-xs">
                    <i data-lucide="clock" class="size-4 text-amber-400"></i>
                    <span id="cbtTimerDisplay">00:00:00</span>
                </div>

                <!-- Accessibility Toolbar -->
                <div class="hidden sm:flex items-center gap-1 bg-default-100 p-1 rounded text-xs font-semibold">
                    <button type="button" onclick="toggleDyslexicFont()" class="px-2 py-1 rounded-lg hover:bg-white text-default-700 transition" title="Toggle Font Ramah Disleksia (OpenDyslexic)">
                        Dyslexic
                    </button>
                    <button type="button" onclick="cycleFontSize()" class="px-2 py-1 rounded-lg hover:bg-white text-default-700 font-mono transition" title="Ubah Ukuran Teks">
                        <span id="fontSizeLabel">A</span>
                    </button>
                    <button type="button" onclick="toggleHighContrast()" class="px-2 py-1 rounded-lg hover:bg-white text-default-700 transition" title="Mode Kontras Tinggi">
                        Kontras
                    </button>
                </div>

                <button type="button" onclick="toggleFullscreen()" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-600 hidden sm:inline-flex" title="Layar Penuh">
                    <i data-lucide="maximize" class="size-4"></i>
                </button>

                <button type="button" onclick="document.getElementById('paletteSidebar').classList.toggle('hidden')" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-700 lg:hidden" title="Daftar Soal">
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

                <div class="bg-white border border-default-200 rounded-md p-6 sm:p-8 shadow-xs min-h-[500px] flex flex-col justify-between">
                    <!-- Top Question Meta -->
                    <div>
                        <div class="flex items-center justify-between pb-4 border-b border-default-100 mb-6">
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 bg-primary-50 text-primary-700 font-bold text-xs rounded-lg uppercase">
                                    Soal Nomor <span id="currentQuestionNum">1</span>
                                </span>
                                <span class="text-xs text-default-400">dari {{ count($orderedQuestions) }} Soal</span>
                            </div>
                            <div>
                                <span id="questionTypeBadge" class="px-2.5 py-0.5 bg-default-100 text-default-600 font-mono text-[11px] rounded uppercase">
                                    Pilihan Ganda
                                </span>
                            </div>
                        </div>

                        <!-- Stimulus Wacana Bacaan (Jika ada) -->
                        <div id="stimulusContainer" class="hidden p-4 bg-default-50 border border-default-200 rounded mb-6">
                            <div class="text-xs font-bold text-default-500 uppercase tracking-wide mb-1 flex items-center gap-1.5">
                                <i data-lucide="file-text" class="size-4 text-primary"></i>
                                <span id="stimulusTitle">Stimulus</span>
                            </div>
                            <div id="stimulusContent" class="text-sm text-default-700 leading-relaxed prose prose-sm max-w-none"></div>
                        </div>

                        <!-- Teks Pokok Soal -->
                        <div class="mb-8">
                            <div id="questionContent" class="text-base text-default-900 leading-relaxed font-sans">
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
                        <button type="button" id="btnPrev" onclick="navigateQuestion(-1)" class="w-full sm:w-auto btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-xs rounded inline-flex items-center justify-center gap-2 disabled:opacity-40 disabled:cursor-not-allowed cursor-pointer">
                            <i data-lucide="chevron-left" class="size-4"></i>
                            <span>Soal Sebelumnya</span>
                        </button>

                        <button type="button" id="btnFlag" onclick="toggleCurrentFlag()" class="w-full sm:w-auto btn btn-sm bg-amber-50 hover:bg-amber-100 text-amber-800 font-semibold text-xs rounded border border-amber-200 inline-flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="flag" class="size-4 text-amber-600"></i>
                            <span id="btnFlagText">Ragu-ragu</span>
                        </button>

                        <div class="flex items-center gap-2 w-full sm:w-auto">
                            <button type="button" id="btnNext" onclick="navigateQuestion(1)" class="flex-1 sm:flex-none btn btn-sm bg-primary hover:bg-primary-hover text-white font-bold text-xs rounded shadow-xs inline-flex items-center justify-center gap-2 cursor-pointer">
                                <span>Soal Berikutnya</span>
                                <i data-lucide="chevron-right" class="size-4"></i>
                            </button>
                            <button type="button" onclick="openFinishModal()" class="btn btn-sm bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded shadow-xs inline-flex items-center justify-center gap-2 cursor-pointer">
                                <i data-lucide="check" class="size-4"></i>
                                <span>Selesai</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Palet Nomor Soal & Ringkasan (1 Kolom) -->
            <div id="paletteSidebar" class="hidden lg:block fixed inset-0 lg:static z-50 lg:z-auto bg-black/40 lg:bg-transparent backdrop-blur-xs lg:backdrop-blur-none flex items-center justify-center lg:items-stretch lg:justify-start p-3 sm:p-4 lg:p-0">
                <div class="bg-white border border-default-200 rounded-md p-4 sm:p-5 shadow-2xl lg:shadow-xs space-y-4 sm:space-y-5 w-full max-w-sm lg:max-w-none max-h-[90vh] lg:max-h-none overflow-y-auto">
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
    <div id="finishModal" class="fixed inset-0 z-50 flex items-center justify-center bg-default-900/50 backdrop-blur-xs hidden p-3 sm:p-4">
        <div class="card max-w-md w-full p-4 sm:p-6 shadow-2xl space-y-4 max-h-[90vh] flex flex-col">
            <div class="text-center space-y-2 shrink-0">
                <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-2xl font-bold">
                    <i data-lucide="check" class="size-6"></i>
                </div>
                <h3 class="text-lg font-bold text-default-900">Konfirmasi Selesai Ujian</h3>
                <p class="text-xs text-default-500">Apakah Anda yakin ingin mengumpulkan lembar jawaban ujian sekarang?</p>
            </div>

            <div class="overflow-y-auto space-y-3 pr-1">
                <div class="p-4 bg-default-50 rounded space-y-2 border border-default-200 text-xs">
                    <div class="flex justify-between py-1 border-b border-default-200">
                        <span class="text-default-500">Total Butir Soal:</span>
                        <strong class="text-default-800">{{ count($orderedQuestions) }} Soal</strong>
                    </div>
                    <div class="flex justify-between py-1 border-b border-default-200">
                        <span class="text-default-500">Sudah Dijawab:</span>
                        <strong class="text-emerald-700" id="modalAnsweredCount">0</strong>
                    </div>
                    <div class="flex justify-between py-1">
                        <span class="text-default-500">Belum Dijawab:</span>
                        <strong class="text-rose-600" id="modalUnansweredCount">0</strong>
                    </div>
                </div>

                <div id="unansweredWarning" class="hidden p-3 bg-rose-50 border border-rose-200 rounded text-xs text-rose-800 flex items-start gap-2">
                    <i data-lucide="alert-triangle" class="size-4 text-rose-600 shrink-0 mt-0.5"></i>
                    <span><strong>Peringatan:</strong> Masih ada butir soal yang belum Anda jawab. Jawaban kosong bernilai 0.</span>
                </div>
            </div>

            <form action="{{ route('student.exam.submit', $attempt) }}" method="POST" id="submitExamForm" class="pt-2 flex flex-col-reverse sm:flex-row gap-2 justify-end shrink-0">
                @csrf
                <button type="button" onclick="document.getElementById('finishModal').classList.add('hidden')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-xs rounded cursor-pointer text-center justify-center w-full sm:w-auto">
                    Periksa Kembali
                </button>
                <button type="submit" class="btn btn-sm bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded shadow-xs inline-flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto">
                    <i data-lucide="check" class="size-4"></i>
                    <span>Ya, Kumpulkan Sekarang</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Data Injection for Client Engine -->
    <script>
        window.CBT_DATA = {
            attemptId: {{ $attempt->id }},
            remainingSeconds: {{ $attempt->getRemainingSeconds() }},
            saveUrl: "{{ route('student.exam.save-answer', $attempt) }}",
            flagUrl: "{{ route('student.exam.toggle-flag', $attempt) }}",
            timeUrl: "{{ route('student.exam.time', $attempt) }}",
            heartbeatUrl: "{{ route('student.exam.heartbeat', $attempt) }}",
            announcementsUrl: "{{ route('student.exam.announcements', $attempt) }}",
            submitUrl: "{{ route('student.exam.submit', $attempt) }}",
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            questions: [
                @foreach($orderedQuestions as $idx => $pq)
                    @php
                        $snap = $pq->question_snapshot;
                        $ans = $answersMap->get($pq->id);
                    @endphp
                    {
                        packageQuestionId: {{ $pq->id }},
                        number: {{ $idx + 1 }},
                        type: "{{ $snap['type'] ?? 'multiple_choice' }}",
                        content: {!! json_encode($snap['content'] ?? '') !!},
                        difficulty: "{{ $snap['difficulty'] ?? 'medium' }}",
                        weight: {{ $snap['weight'] ?? 1.0 }},
                        isRtl: {{ !empty($snap['is_rtl']) ? 'true' : 'false' }},
                        stimulus: {!! json_encode($snap['stimulus'] ?? null) !!},
                        options: {!! json_encode($snap['options'] ?? []) !!},
                        currentAnswer: {!! json_encode($ans?->answer_payload ?? null) !!},
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

        function renderQuestion(idx) {
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
                if (q.stimulus.media_type === 'audio' && q.stimulus.media_url) {
                    stimHtml += `<div class="cbt-audio-container mb-3"><audio controls preload="none" src="${q.stimulus.media_url}" class="w-full"></audio></div>`;
                    stimHtml += `<div class="p-2.5 rounded bg-primary-50/70 border border-primary-200/60 text-xs text-primary-900 flex items-center gap-2"><i data-lucide="headphones" class="size-4 text-primary shrink-0"></i><span><strong>Petunjuk Mendengarkan:</strong> Dengarkan rekaman audio di atas untuk menjawab butir soal terkait. Transkrip teks tidak ditampilkan pada sesi ujian.</span></div>`;
                } else if (q.stimulus.media_type === 'image' && q.stimulus.media_url) {
                    stimHtml += `<div class="cbt-image-container mb-3"><img src="${q.stimulus.media_url}" alt="${q.stimulus.title || ''}" class="max-h-72 rounded border border-default-200"></div>`;
                    if (q.stimulus.content) {
                        stimHtml += q.stimulus.content.replace(/\n/g, '<br>');
                    }
                } else {
                    if (q.stimulus.content) {
                        stimHtml += q.stimulus.content.replace(/\n/g, '<br>');
                    }
                }
                document.getElementById('stimulusContent').innerHTML = stimHtml;
                if (typeof lucide !== 'undefined' && lucide.createIcons) {
                    lucide.createIcons();
                }
            } else {
                stimBox.classList.add('hidden');
            }

            // Question Content (Arabic RTL Harakat Support)
            const qContentEl = document.getElementById('questionContent');
            qContentEl.innerHTML = q.content.replace(/\n/g, '<br>');
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

            if (q.type === 'multiple_choice' || q.type === 'true_false') {
                q.options.forEach(opt => {
                    const isChecked = q.currentAnswer === opt.key;
                    const div = document.createElement('div');
                    div.className = `p-3.5 rounded border transition-all cursor-pointer flex items-center gap-3 ${isChecked ? 'bg-primary/5 border-primary shadow-xs' : 'bg-white border-default-200 hover:bg-default-50'}`;
                    div.onclick = () => selectSingleOption(opt.key);
                    div.innerHTML = `
                        <span class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-xs ${isChecked ? 'bg-primary text-white' : 'bg-default-100 text-default-700'}">
                            ${opt.display_key || opt.key}
                        </span>
                        <span class="text-sm text-default-800 ${q.isRtl ? 'text-right font-serif' : ''}">${opt.content}</span>
                    `;
                    optBox.appendChild(div);
                });
            } else if (q.type === 'multiple_choice_complex') {
                const currentArr = Array.isArray(q.currentAnswer) ? q.currentAnswer : [];
                q.options.forEach(opt => {
                    const isChecked = currentArr.includes(opt.key);
                    const div = document.createElement('div');
                    div.className = `p-3.5 rounded border transition-all cursor-pointer flex items-center gap-3 ${isChecked ? 'bg-primary/5 border-primary' : 'bg-white border-default-200 hover:bg-default-50'}`;
                    div.onclick = () => toggleComplexOption(opt.key);
                    div.innerHTML = `
                        <input type="checkbox" ${isChecked ? 'checked' : ''} class="w-4 h-4 rounded text-primary pointer-events-none">
                        <span class="w-7 h-7 rounded-lg flex items-center justify-center font-bold text-xs ${isChecked ? 'bg-primary text-white' : 'bg-default-100 text-default-700'}">
                            ${opt.display_key || opt.key}
                        </span>
                        <span class="text-sm text-default-800">${opt.content}</span>
                    `;
                    optBox.appendChild(div);
                });
            } else if (q.type === 'short_answer' || q.type === 'numeric') {
                const val = q.currentAnswer || '';
                optBox.innerHTML = `
                    <div class="space-y-2">
                        <label class="block text-xs font-semibold text-default-500 uppercase">Ketikkan Jawaban Anda:</label>
                        <input type="text" id="shortAnswerInput" value="${val}" onblur="saveTextAnswer(this.value)" placeholder="Ketik jawaban di sini..." class="form-input w-full text-base border-default-200 rounded p-3 focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium bg-white">
                        <p class="text-xs text-default-400">Tekan di luar kotak input atau pindah soal untuk menyimpan otomatis.</p>
                    </div>
                `;
            } else if (q.type === 'essay') {
                const val = q.currentAnswer || '';
                optBox.innerHTML = `
                    <div class="space-y-2">
                        <label class="block text-xs font-semibold text-default-500 uppercase">Tuliskan Uraian / Jawaban Esai:</label>
                        <textarea id="essayInput" rows="6" onblur="saveTextAnswer(this.value)" placeholder="Tuliskan uraian lengkap di sini..." class="form-textarea w-full text-base border-default-200 rounded p-3 focus:ring-2 focus:ring-primary/20 focus:border-primary leading-relaxed bg-white">${val}</textarea>
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

        function sendHeartbeat(options = {}) {
            const payload = {
                is_fullscreen: !(!document.fullscreenElement),
                is_tab_focused: document.hasFocus(),
                battery_level: null,
                camera_status: 'active',
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
                if (data.is_expired || data.status === 'expired') {
                    if (data.redirect_url) {
                        window.location.href = data.redirect_url;
                    } else {
                        document.getElementById('submitExamForm').submit();
                    }
                    return;
                }

                if (data.instruction === 'force_refresh') {
                    window.location.reload();
                    return;
                }

                if (data.instruction === 'force_logout') {
                    alert('Sesi perangkat Anda telah di-reset / di-logout paksa oleh Pengawas Ujian. Jawaban Anda tersimpan dengan aman di server. Silakan hubungi pengawas atau masuk kembali.');
                    window.location.href = "{{ route('student.login') }}";
                    return;
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
         * Pengontrol Batas Pemutaran Audio Listening Comprehension (FULL-FEATURE 15.3, GAP-07).
         * Mencegah peserta memutar ulang audio soal melebihi batas maksimal (default 2x).
         */
        function initAudioListeningLimiter() {
            const containers = [document.getElementById('stimulusContent'), document.getElementById('questionContent')];
            containers.forEach(container => {
                if (!container) return;
                const audios = container.querySelectorAll('audio');
                audios.forEach((audio, aIdx) => {
                    const audioSrc = audio.currentSrc || audio.src || audio.querySelector('source')?.src || `audio_${currentIndex}_${aIdx}`;
                    const storageKey = `audio_play_count_${window.CBT_DATA.attemptId}_${btoa(audioSrc).slice(0, 24)}`;
                    const maxPlays = parseInt(audio.dataset.maxPlays || '2', 10);
                    let playedCount = parseInt(sessionStorage.getItem(storageKey) || '0', 10);

                    // Buat wrapper UI jika belum ada
                    let wrapper = audio.closest('.cbt-audio-wrapper');
                    if (!wrapper) {
                        wrapper = document.createElement('div');
                        wrapper.className = 'cbt-audio-wrapper my-3 p-3.5 bg-slate-50 border border-default-200 rounded-lg space-y-2';
                        audio.parentNode.insertBefore(wrapper, audio);

                        const header = document.createElement('div');
                        header.className = 'flex items-center justify-between text-xs font-semibold';
                        header.innerHTML = `
                            <span class="flex items-center gap-1.5 text-primary">
                                <i data-lucide="volume-2" class="size-4"></i>
                                <span>Audio Listening Comprehension</span>
                            </span>
                            <span class="audio-play-counter px-2 py-0.5 rounded font-mono text-[11px] ${playedCount >= maxPlays ? 'bg-rose-100 text-rose-800' : 'bg-primary/10 text-primary'}">
                                Sisa Putar: ${Math.max(0, maxPlays - playedCount)}x (Maks. ${maxPlays}x)
                            </span>
                        `;
                        wrapper.appendChild(header);
                        wrapper.appendChild(audio);
                        if (window.lucide && window.lucide.createIcons) {
                            window.lucide.createIcons();
                        }
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
            // Heartbeat live telemetri setiap 15 detik
            sendHeartbeat();
            setInterval(sendHeartbeat, 15000);

            // Deteksi seketika saat window blur atau fullscreen exit
            window.addEventListener('blur', () => sendHeartbeat({ is_tab_focused: false }));
            window.addEventListener('focus', () => sendHeartbeat({ is_tab_focused: true }));
            document.addEventListener('fullscreenchange', () => sendHeartbeat({ is_fullscreen: !(!document.fullscreenElement) }));
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
            checkNetwork();
        })();
    </script>
</body>
</html>
