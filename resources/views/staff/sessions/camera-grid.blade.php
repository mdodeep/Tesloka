@extends('layouts.staff')

@section('title', 'Grid Kamera Pengawasan : ' . $session->name)
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Grid Kamera: ' . $session->name)

@section('content')
@vite(['resources/js/proctoring.js'])
<div class="space-y-6 w-full">

    <!-- Header Banner -->
    <div class="bg-secondary text-white rounded-xl p-5 sm:p-6 shadow-2xs flex flex-col md:flex-row md:items-center justify-between gap-6 border border-slate-800">
        <div>
            <div class="flex items-center gap-2 flex-wrap mb-1">
                @if($proctoringConfig['livekit_configured'])
                    <span id="camera-mode-badge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-600 text-white">
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                        WebRTC SFU Live Video (LiveKit)
                    </span>
                @else
                    <span id="camera-mode-badge" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-sky-600 text-white">
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                        Kamera Snapshot &amp; Near-Live Zoom
                    </span>
                @endif
                <span class="px-2.5 py-0.5 bg-slate-800 text-slate-300 text-xs rounded-md font-mono border border-slate-700/80">
                    {{ $session->room->name ?? 'Daring / Online' }} (Kapasitas: {{ $session->room->capacity ?? count($participants) }})
                </span>
                <span class="px-2 py-0.5 bg-slate-800 text-slate-300 text-xs rounded-md font-mono border border-slate-700/80" id="live-sync-indicator">
                    Sinkronisasi: Polling
                </span>
            </div>
            <h2 class="text-xl sm:text-2xl font-bold">Grid Kamera Pengawas Real-Time &amp; Zoom CCTV</h2>
            <p class="text-xs text-slate-400 mt-1 max-w-2xl">
                @if($proctoringConfig['livekit_configured'])
                    Streaming video WebRTC LiveKit aktif (kualitas rendah di grid agar hemat CPU, otomatis HD saat dibuka pada Zoom View).
                @else
                    Menampilkan foto snapshot kamera berkala tiap {{ $proctoringConfig['snapshot_interval_seconds'] }} detik. Klik tile untuk mengaktifkan Near-Live Zoom ({{ $proctoringConfig['zoom_snapshot_interval_seconds'] }} detik) atau aktifkan LiveKit SFU di Pengaturan Sistem untuk video streaming 15 FPS.
                @endif
            </p>
        </div>

        <div class="flex items-center gap-3 flex-wrap">
            <button type="button" onclick="refreshCameraFeed()" class="btn btn-sm bg-slate-800 hover:bg-slate-700 text-white font-semibold transition inline-flex items-center gap-1.5 shadow-2xs border border-slate-700 rounded-lg cursor-pointer">
                <i data-lucide="refresh-cw" class="size-4" id="refresh-icon"></i>
                <span>Segarkan Grid</span>
            </button>
            <a href="{{ route('staff.sessions.monitor', $session) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold transition inline-flex items-center gap-1.5 shadow-2xs rounded-lg">
                <i data-lucide="bar-chart-2" class="size-4"></i>
                <span>Monitoring Teks</span>
            </a>
        </div>
    </div>

    <!-- Layout: Main Video Grid (Left/Top) & Incident Snapshots Drawer (Right/Bottom) -->
    <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 items-start">
        <!-- 20-30 Video Tiles Grid -->
        <div class="xl:col-span-3 space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3" id="camera-tiles-container">
                @foreach($participants as $p)
                    <div class="camera-tile bg-slate-900 border border-slate-800 rounded-md overflow-hidden shadow-sm flex flex-col justify-between aspect-video relative group transition hover:border-primary cursor-pointer"
                         id="tile-card-{{ $p['student_id'] }}"
                         data-student-id="{{ $p['student_id'] }}"
                         data-attempt-id="{{ $p['attempt_id'] ?? '' }}"
                         onclick="openZoomModal({{ $p['student_id'] }})">

                        <!-- Video Stream Canvas / Feed Snapshot Area -->
                        <div class="w-full h-full bg-slate-950 flex items-center justify-center relative overflow-hidden" id="tile-feed-{{ $p['student_id'] }}">
                            <!-- LiveKit WebRTC Video Slot -->
                            <div id="tile-video-slot-{{ $p['student_id'] }}" class="hidden w-full h-full"></div>

                            <!-- Snapshot Fallback Image / Placeholder -->
                            <img src="{{ $p['latest_snapshot_url'] ?? '' }}"
                                 alt="{{ $p['student_name'] }}"
                                 class="w-full h-full object-cover tile-snapshot-img transition-transform duration-300 group-hover:scale-105 {{ $p['latest_snapshot_url'] ? '' : 'hidden' }}"
                                 id="tile-img-{{ $p['student_id'] }}">

                            <div class="flex flex-col items-center justify-center text-slate-500 gap-1 p-2 text-center {{ $p['latest_snapshot_url'] ? 'hidden' : '' }}" id="tile-placeholder-{{ $p['student_id'] }}">
                                @if($p['is_online'])
                                    <i data-lucide="camera" class="size-7 text-primary animate-pulse mb-1"></i>
                                    <span class="text-[10px] text-slate-300 font-medium">Kamera Terhubung</span>
                                @else
                                    <i data-lucide="camera-off" class="size-7 text-slate-600 mb-1"></i>
                                    <span class="text-[10px] text-slate-500">Offline / Belum Mulai</span>
                                @endif
                            </div>

                            <!-- Top Overlay: Status Kamera & Waktu -->
                            <div class="absolute top-2 left-2 right-2 flex items-center justify-between z-10 pointer-events-none">
                                @php
                                    $camBadgeClass = match($p['camera_status']) {
                                        'livekit_streaming' => 'bg-emerald-600/90 text-white',
                                        'active' => 'bg-sky-600/90 text-white',
                                        'denied' => 'bg-rose-600/90 text-white',
                                        default => 'bg-slate-800/90 text-slate-300',
                                    };
                                    $camBadgeLabel = match($p['camera_status']) {
                                        'livekit_streaming' => 'LIVE VIDEO',
                                        'active' => 'SNAPSHOT',
                                        'denied' => 'DITOLAK',
                                        default => 'OFFLINE',
                                    };
                                @endphp
                                <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold backdrop-blur-xs {{ $camBadgeClass }}" id="tile-status-{{ $p['student_id'] }}">
                                    {{ $camBadgeLabel }}
                                </span>
                                <span class="px-1.5 py-0.5 rounded text-[9px] font-mono bg-black/70 text-slate-300" id="tile-time-{{ $p['student_id'] }}">
                                    {{ $p['latest_snapshot_time'] ? \Carbon\Carbon::parse($p['latest_snapshot_time'])->format('H:i:s') : '--:--' }}
                                </span>
                            </div>

                            <!-- Overlay Controls on Hover -->
                            <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-xs opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2 z-20">
                                <span class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-semibold px-2.5 py-1.5 rounded inline-flex items-center gap-1.5 shadow transition">
                                    <i data-lucide="maximize-2" class="size-3.5"></i>
                                    <span>Zoom View</span>
                                </span>
                                @if($p['attempt_id'])
                                    <button type="button" onclick="triggerSnapshotRequest({{ $p['attempt_id'] }}, '{{ addslashes($p['student_name']) }}', event)" class="btn btn-sm bg-slate-800 hover:bg-slate-700 text-white text-xs font-semibold p-1.5 rounded border border-slate-700 shadow cursor-pointer transition" title="Ambil Foto Sekarang (On-Demand)">
                                        <i data-lucide="camera" class="size-4"></i>
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- Tile Bottom Info Bar -->
                        <div class="bg-slate-900 p-2 z-10 flex items-center justify-between text-white border-t border-slate-800">
                            <div class="truncate pr-1">
                                <span class="font-bold text-[11px] block truncate text-slate-200" title="{{ $p['student_name'] }}">
                                    [{{ $p['seat_number'] }}] {{ $p['student_name'] }}
                                </span>
                            </div>
                            <div class="shrink-0 flex items-center gap-1.5">
                                <span class="inline-block w-2 h-2 rounded-full {{ $p['is_online'] ? 'bg-emerald-500' : 'bg-rose-500' }}" id="tile-dot-{{ $p['student_id'] }}" title="{{ $p['is_online'] ? 'Online & Aktif' : 'Offline' }}"></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Side: Galeri Snapshot Insiden -->
        <div class="xl:col-span-1 space-y-4">
            <x-cbt.card title="Bukti Snapshot Insiden (Otomatis)">
                <p class="text-xs text-default-500 mb-3">
                    Frame foto yang diambil otomatis oleh sistem saat peserta keluar fullscreen, tab blur, atau diminta oleh pengawas.
                </p>

                <div class="space-y-3 max-h-[600px] overflow-y-auto pr-1" id="snapshots-gallery">
                    @forelse($recentSnapshots as $snap)
                        <div class="p-2 border border-default-200 rounded-md bg-default-50 space-y-2 text-xs">
                            <div class="flex items-center justify-between text-[11px]">
                                <strong class="text-default-800 truncate" title="{{ $snap->student->name }}">{{ $snap->student->name }}</strong>
                                <span class="font-mono text-default-400">{{ $snap->captured_at->format('H:i:s') }}</span>
                            </div>
                            <div class="aspect-video bg-black rounded overflow-hidden relative group">
                                <img src="{{ route('staff.sessions.snapshots.view', $snap) }}" alt="Snapshot Insiden" class="w-full h-full object-cover">
                                <a href="{{ route('staff.sessions.snapshots.view', $snap) }}" target="_blank" rel="noopener noreferrer" class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-semibold">
                                    Buka Foto Penuh
                                </a>
                            </div>
                            <div class="flex items-center justify-between text-[10px] text-default-500">
                                <span class="px-1.5 py-0.5 rounded bg-slate-200 font-mono">{{ $snap->trigger_reason }}</span>
                                <span>{{ round($snap->file_size_bytes / 1024) }} KB</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-default-400 text-center py-8" id="empty-snapshot-msg">Belum ada snapshot insiden yang tercatat.</p>
                    @endforelse
                </div>
            </x-cbt.card>
        </div>
    </div>
</div>

<!-- ======================================================== -->
<!-- MODAL ZOOM KAMERA & TELEMETRI PESERTA (FULL DETAIL ZOOM) -->
<!-- ======================================================== -->
<div id="modalZoomCamera" role="dialog" aria-modal="true" aria-labelledby="zoomStudentName" class="hidden fixed inset-0 z-50 bg-black/75 backdrop-blur-xs flex items-center justify-center p-3 sm:p-5">
    <div class="bg-slate-900 border border-slate-800 text-white rounded-lg w-full max-w-4xl max-h-[92vh] flex flex-col shadow-2xl overflow-hidden animate-in fade-in zoom-in-95 duration-150">
        <!-- Modal Header -->
        <div class="p-4 sm:px-6 border-b border-slate-800 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-8 h-8 rounded-full bg-primary/20 text-primary flex items-center justify-center shrink-0">
                    <i data-lucide="video" class="size-4"></i>
                </div>
                <div class="min-w-0">
                    <h3 class="text-base font-bold truncate text-slate-100" id="zoomStudentName">Detail Kamera Peserta</h3>
                    <p class="text-xs text-slate-400 font-mono" id="zoomStudentMeta">Kursi: - • Username: -</p>
                </div>
            </div>
            <button type="button" onclick="closeZoomModal()" class="p-1.5 rounded-md hover:bg-slate-800 text-slate-400 hover:text-white transition cursor-pointer" title="Tutup Modal">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-4 sm:p-6 space-y-5 overflow-y-auto flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                <!-- Large Video / Snapshot Frame (2 Kolom) -->
                <div class="lg:col-span-2 space-y-3">
                    <div class="aspect-video bg-black rounded-lg border border-slate-800 overflow-hidden relative flex items-center justify-center shadow-inner">
                        <div id="zoomModalVideoSlot" class="hidden w-full h-full flex items-center justify-center"></div>
                        <img id="zoomModalImg" src="" alt="Live Feed Peserta" class="w-full h-full object-contain hidden">
                        <div id="zoomModalPlaceholder" class="flex flex-col items-center justify-center text-slate-500 gap-2 p-6 text-center">
                            <i data-lucide="camera-off" class="size-12 text-slate-700"></i>
                            <span class="text-xs text-slate-400">Belum ada foto snapshot yang tersedia dari peserta ini.</span>
                        </div>

                        <!-- Live Status Overlay -->
                        <div class="absolute top-3 left-3 flex items-center gap-2 z-10 pointer-events-none">
                            <span id="zoomLiveBadge" class="px-2.5 py-1 rounded text-xs font-mono font-bold bg-emerald-600 text-white shadow">
                                LIVE
                            </span>
                            <span id="zoomTimeBadge" class="px-2 py-1 rounded text-xs font-mono bg-black/75 text-slate-300">
                                --:--:--
                            </span>
                        </div>
                    </div>

                    <!-- Action Controls -->
                    <div class="flex flex-wrap items-center justify-between gap-2.5 pt-1">
                        <div class="flex items-center gap-2">
                            <button type="button" id="btnRequestSnapModal" onclick="triggerSnapshotFromModal()" class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-semibold px-3 py-2 rounded inline-flex items-center gap-1.5 shadow transition cursor-pointer">
                                <i data-lucide="camera" class="size-4"></i>
                                <span>Simpan Bukti Foto (Snapshot)</span>
                            </button>
                            <span id="snapRequestFeedback" class="text-xs font-medium text-emerald-400 hidden"></span>
                        </div>
                        <a id="zoomOpenFullImg" href="#" onclick="if(this.getAttribute('href')==='#'){return false;}" target="_blank" rel="noopener noreferrer" class="btn btn-sm bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-medium px-3 py-2 rounded inline-flex items-center gap-1.5 transition">
                            <i data-lucide="external-link" class="size-3.5"></i>
                            <span>Buka Gambar Asli</span>
                        </a>
                    </div>
                </div>

                <!-- Telemetry & History (1 Kolom) -->
                <div class="space-y-4">
                    <div class="bg-slate-950 p-4 rounded-lg border border-slate-800 space-y-3">
                        <h4 class="text-xs font-bold text-slate-300 uppercase tracking-wider">Telemetri Keamanan Siswa</h4>
                        <div class="space-y-2 text-xs">
                            <div class="flex justify-between items-center py-1 border-b border-slate-900">
                                <span class="text-slate-400">Status Koneksi:</span>
                                <strong id="zoomStatConnection" class="text-emerald-400">Online</strong>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-slate-900">
                                <span class="text-slate-400">Kamera Siswa:</span>
                                <strong id="zoomStatCamera" class="text-slate-200">Aktif</strong>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-slate-900">
                                <span class="text-slate-400">Fokus Tab Browser:</span>
                                <strong id="zoomStatTab" class="text-emerald-400">Fokus (Aman)</strong>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-slate-900">
                                <span class="text-slate-400">Mode Layar Penuh:</span>
                                <strong id="zoomStatFullscreen" class="text-emerald-400">Aktif</strong>
                            </div>
                            <div class="flex justify-between items-center py-1">
                                <span class="text-slate-400">Sumber Frame:</span>
                                <strong id="zoomStatReason" class="font-mono text-slate-300">-</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Riwayat Snapshot Siswa Ini -->
                    <div class="space-y-2">
                        <h4 class="text-xs font-bold text-slate-300 uppercase tracking-wider">Riwayat Foto Siswa</h4>
                        <div class="grid grid-cols-3 gap-2 max-h-36 overflow-y-auto pr-1" id="zoomRecentThumbs">
                            <!-- Thumbnails injected by JS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const sessionId = {{ $session->id }};
    const feedUrl = "{{ route('staff.sessions.camera-feed', $session) }}";
    const livekitTokenUrl = "{{ route('staff.sessions.livekit-token', $session) }}";
    const csrfToken = "{{ csrf_token() }}";
    window.CBT_REALTIME = @json($realtimeConfig);
    window.CBT_PROCTORING = @json($proctoringConfig);

    let participantsData = @json($participants);
    let activeZoomStudentId = null;
    let zoomFocusKeepaliveTimer = null;
    let zoomModalVideoEl = null;

    let participantsMap = {};
    participantsData.forEach(p => {
        participantsMap[p.student_id] = p;
    });

    function escapeHtml(str) {
        return String(str ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function sendZoomFocusSignal(attemptId, active) {
        if (!attemptId) return;
        fetch(`/staff/sessions/${sessionId}/attempts/${attemptId}/zoom-focus`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ active: Boolean(active) })
        }).catch(() => {});
    }

    function renderZoomModalState(p) {
        if (!p) return;

        document.getElementById('zoomStudentName').innerText = `[${p.seat_number}] ${p.student_name}`;
        document.getElementById('zoomStudentMeta').innerText = `Nomor Kursi: ${p.seat_number} • Username: ${p.student_username || '-'} • Paket: ${p.package_code || '-'}`;

        const videoSlot = document.getElementById('zoomModalVideoSlot');
        const imgEl = document.getElementById('zoomModalImg');
        const placeholderEl = document.getElementById('zoomModalPlaceholder');
        const openFullLink = document.getElementById('zoomOpenFullImg');

        const hasLiveTrack = window.TeslokaProctorLiveKit && window.TeslokaProctorLiveKit.getTrack(p.student_id);

        if (hasLiveTrack && videoSlot) {
            videoSlot.classList.remove('hidden');
            imgEl.classList.add('hidden');
            placeholderEl.classList.add('hidden');
        } else {
            if (videoSlot) videoSlot.classList.add('hidden');
            if (p.latest_snapshot_url) {
                imgEl.src = p.latest_snapshot_url;
                imgEl.classList.remove('hidden');
                placeholderEl.classList.add('hidden');
                openFullLink.href = p.latest_snapshot_url;
                openFullLink.classList.remove('hidden');
            } else {
                imgEl.classList.add('hidden');
                placeholderEl.classList.remove('hidden');
                openFullLink.classList.add('hidden');
            }
        }

        const liveBadge = document.getElementById('zoomLiveBadge');
        if (hasLiveTrack || p.camera_status === 'livekit_streaming') {
            liveBadge.className = 'px-2.5 py-1 rounded text-xs font-mono font-bold bg-emerald-600 text-white shadow';
            liveBadge.innerText = 'LIVE VIDEO WEBRTC';
        } else if (p.camera_status === 'active') {
            liveBadge.className = 'px-2.5 py-1 rounded text-xs font-mono font-bold bg-sky-600 text-white shadow';
            liveBadge.innerText = 'NEAR-LIVE SNAPSHOT';
        } else if (p.camera_status === 'denied') {
            liveBadge.className = 'px-2.5 py-1 rounded text-xs font-mono font-bold bg-rose-600 text-white shadow';
            liveBadge.innerText = 'IZIN KAMERA DITOLAK';
        } else {
            liveBadge.className = 'px-2.5 py-1 rounded text-xs font-mono font-bold bg-slate-800 text-slate-300 shadow';
            liveBadge.innerText = 'KAMERA MATI';
        }

        const timeBadge = document.getElementById('zoomTimeBadge');
        if (hasLiveTrack) {
            timeBadge.innerText = 'REALTIME STREAM';
        } else if (p.latest_snapshot_time) {
            timeBadge.innerText = p.latest_snapshot_time.includes('T') ? p.latest_snapshot_time.split('T')[1].slice(0, 8) : p.latest_snapshot_time;
        } else {
            timeBadge.innerText = '--:--:--';
        }

        document.getElementById('zoomStatConnection').innerText = p.is_online ? 'Online' : 'Offline';
        document.getElementById('zoomStatConnection').className = p.is_online ? 'text-emerald-400 font-bold' : 'text-rose-400 font-bold';

        const camLabels = {
            livekit_streaming: 'Streaming WebRTC Live',
            active: 'Aktif (Snapshot)',
            denied: 'Izin Ditolak Siswa',
            unsupported: 'Browser Tidak Mendukung',
            inactive: 'Tidak Aktif',
        };
        document.getElementById('zoomStatCamera').innerText = camLabels[p.camera_status] || 'Tidak Aktif';
        document.getElementById('zoomStatCamera').className = (p.camera_status === 'active' || p.camera_status === 'livekit_streaming')
            ? 'text-emerald-400 font-bold'
            : (p.camera_status === 'denied' ? 'text-rose-400 font-bold' : 'text-slate-400');

        document.getElementById('zoomStatTab').innerText = p.is_tab_focused ? 'Fokus (Aman)' : 'Meninggalkan Tab (Blur)';
        document.getElementById('zoomStatTab').className = p.is_tab_focused ? 'text-emerald-400 font-bold' : 'text-amber-400 font-bold';

        document.getElementById('zoomStatFullscreen').innerText = p.is_fullscreen ? 'Layar Penuh' : 'Keluar Fullscreen';
        document.getElementById('zoomStatFullscreen').className = p.is_fullscreen ? 'text-emerald-400 font-bold' : 'text-rose-400 font-bold';

        document.getElementById('zoomStatReason').innerText = hasLiveTrack ? 'livekit_webrtc' : (p.latest_snapshot_reason || '-');
        renderThumbnails(p.recent_snapshots || []);
    }

    function openZoomModal(studentId) {
        if (activeZoomStudentId && activeZoomStudentId !== studentId) {
            closeZoomModal();
        }
        activeZoomStudentId = studentId;
        const p = participantsMap[studentId];
        if (!p) return;

        // Jika LiveKit aktif untuk siswa ini, naikkan kualitas video ke HIGH & attach ke modal slot
        const track = window.TeslokaProctorLiveKit ? window.TeslokaProctorLiveKit.getTrack(studentId) : null;
        const videoSlot = document.getElementById('zoomModalVideoSlot');
        if (track && videoSlot) {
            window.TeslokaProctorLiveKit.setStudentQuality(studentId, true);
            videoSlot.innerHTML = '';
            zoomModalVideoEl = track.attach();
            zoomModalVideoEl.className = 'w-full h-full object-contain';
            videoSlot.appendChild(zoomModalVideoEl);
        }

        renderZoomModalState(p);

        // Aktifkan mode Near-Live Zoom frame cepat di perangkat siswa (bila belum ada LiveKit track)
        if (!track && p.attempt_id && p.attempt_status === 'in_progress') {
            sendZoomFocusSignal(p.attempt_id, true);
            if (zoomFocusKeepaliveTimer) clearInterval(zoomFocusKeepaliveTimer);
            zoomFocusKeepaliveTimer = setInterval(() => {
                if (activeZoomStudentId === studentId && !window.TeslokaProctorLiveKit?.getTrack(studentId)) {
                    sendZoomFocusSignal(p.attempt_id, true);
                }
            }, 22000);
        }

        document.getElementById('modalZoomCamera').classList.remove('hidden');
        if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
    }

    function closeZoomModal() {
        const prevStudentId = activeZoomStudentId;
        const prevP = prevStudentId ? participantsMap[prevStudentId] : null;
        activeZoomStudentId = null;

        if (zoomFocusKeepaliveTimer) {
            clearInterval(zoomFocusKeepaliveTimer);
            zoomFocusKeepaliveTimer = null;
        }

        if (prevStudentId && window.TeslokaProctorLiveKit) {
            window.TeslokaProctorLiveKit.setStudentQuality(prevStudentId, false);
            const track = window.TeslokaProctorLiveKit.getTrack(prevStudentId);
            if (track && zoomModalVideoEl) {
                try { track.detach(zoomModalVideoEl); } catch (e) {}
            }
        }
        zoomModalVideoEl = null;
        const slot = document.getElementById('zoomModalVideoSlot');
        if (slot) {
            slot.innerHTML = '';
            slot.classList.add('hidden');
        }

        if (prevP && prevP.attempt_id) {
            sendZoomFocusSignal(prevP.attempt_id, false);
        }

        document.getElementById('modalZoomCamera').classList.add('hidden');
    }

    function renderThumbnails(snaps) {
        const container = document.getElementById('zoomRecentThumbs');
        container.innerHTML = '';
        if (!snaps || snaps.length === 0) {
            container.innerHTML = '<span class="text-[11px] text-slate-500 col-span-3">Belum ada snapshot tambahan.</span>';
            return;
        }

        snaps.forEach(s => {
            const div = document.createElement('div');
            div.className = 'aspect-video bg-black rounded overflow-hidden border border-slate-800 hover:border-primary cursor-pointer transition';
            div.onclick = () => {
                const imgEl = document.getElementById('zoomModalImg');
                imgEl.src = s.url;
                imgEl.classList.remove('hidden');
                document.getElementById('zoomModalPlaceholder').classList.add('hidden');
                document.getElementById('zoomOpenFullImg').href = s.url;
                document.getElementById('zoomOpenFullImg').classList.remove('hidden');
                document.getElementById('zoomTimeBadge').innerText = s.captured_at;
                document.getElementById('zoomStatReason').innerText = s.reason;
            };
            div.innerHTML = `<img src="${s.url}" alt="Snapshot" class="w-full h-full object-cover">`;
            container.appendChild(div);
        });
    }

    function triggerSnapshotFromModal() {
        if (!activeZoomStudentId) return;
        const p = participantsMap[activeZoomStudentId];
        if (!p || !p.attempt_id) {
            alert('Peserta belum memiliki sesi ujian aktif.');
            return;
        }

        const btn = document.getElementById('btnRequestSnapModal');
        const feedback = document.getElementById('snapRequestFeedback');
        btn.disabled = true;
        btn.innerHTML = '<i data-lucide="loader" class="size-4 animate-spin"></i><span>Meminta Foto...</span>';
        if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();

        fetch(`/staff/sessions/${sessionId}/attempts/${p.attempt_id}/request-snapshot`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(r => r.json())
        .then(() => {
            btn.disabled = false;
            btn.innerHTML = '<i data-lucide="camera" class="size-4"></i><span>Simpan Bukti Foto (Snapshot)</span>';
            if (feedback) {
                feedback.innerText = 'Permintaan foto terkirim ke siswa!';
                feedback.classList.remove('hidden');
                setTimeout(() => feedback.classList.add('hidden'), 3500);
            }
            if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
            setTimeout(refreshCameraFeed, 2000);
        })
        .catch(() => {
            btn.disabled = false;
            btn.innerHTML = '<i data-lucide="camera" class="size-4"></i><span>Simpan Bukti Foto (Snapshot)</span>';
            alert('Gagal mengirim instruksi snapshot.');
        });
    }

    function triggerSnapshotRequest(attemptId, studentName, event) {
        if (event) event.stopPropagation();
        if (!confirm(`Minta penangkapan foto kamera dari peserta ${studentName}?`)) return;

        fetch(`/staff/sessions/${sessionId}/attempts/${attemptId}/request-snapshot`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(r => r.json())
        .then(data => {
            alert(data.message || 'Permintaan snapshot telah dikirim ke siswa.');
            setTimeout(refreshCameraFeed, 2000);
        })
        .catch(() => alert('Gagal mengirim permintaan snapshot.'));
    }

    function updateTileDom(p) {
        participantsMap[p.student_id] = p;
        const imgEl = document.getElementById(`tile-img-${p.student_id}`);
        const placeholderEl = document.getElementById(`tile-placeholder-${p.student_id}`);
        const videoSlot = document.getElementById(`tile-video-slot-${p.student_id}`);
        const statusEl = document.getElementById(`tile-status-${p.student_id}`);
        const timeEl = document.getElementById(`tile-time-${p.student_id}`);
        const dotEl = document.getElementById(`tile-dot-${p.student_id}`);

        const hasLiveTrack = window.TeslokaProctorLiveKit && window.TeslokaProctorLiveKit.getTrack(p.student_id);

        if (hasLiveTrack && videoSlot) {
            videoSlot.classList.remove('hidden');
            if (imgEl) imgEl.classList.add('hidden');
            if (placeholderEl) placeholderEl.classList.add('hidden');
        } else {
            if (videoSlot) videoSlot.classList.add('hidden');
            if (p.latest_snapshot_url && imgEl) {
                imgEl.src = p.latest_snapshot_url;
                imgEl.classList.remove('hidden');
                if (placeholderEl) placeholderEl.classList.add('hidden');
            } else {
                if (imgEl) imgEl.classList.add('hidden');
                if (placeholderEl) placeholderEl.classList.remove('hidden');
            }
        }

        if (statusEl) {
            if (hasLiveTrack || p.camera_status === 'livekit_streaming') {
                statusEl.innerText = 'LIVE VIDEO';
                statusEl.className = 'px-2 py-0.5 rounded text-[10px] font-mono font-bold backdrop-blur-xs bg-emerald-600/90 text-white';
            } else if (p.camera_status === 'active') {
                statusEl.innerText = 'SNAPSHOT';
                statusEl.className = 'px-2 py-0.5 rounded text-[10px] font-mono font-bold backdrop-blur-xs bg-sky-600/90 text-white';
            } else if (p.camera_status === 'denied') {
                statusEl.innerText = 'DITOLAK';
                statusEl.className = 'px-2 py-0.5 rounded text-[10px] font-mono font-bold backdrop-blur-xs bg-rose-600/90 text-white';
            } else {
                statusEl.innerText = 'OFFLINE';
                statusEl.className = 'px-2 py-0.5 rounded text-[10px] font-mono font-bold backdrop-blur-xs bg-slate-800/90 text-slate-300';
            }
        }

        if (timeEl) {
            if (hasLiveTrack) {
                timeEl.innerText = 'STREAM';
            } else if (p.latest_snapshot_time) {
                timeEl.innerText = p.latest_snapshot_time.includes('T') ? p.latest_snapshot_time.split('T')[1].slice(0, 8) : p.latest_snapshot_time;
            }
        }

        if (dotEl) {
            dotEl.className = `inline-block w-2 h-2 rounded-full ${p.is_online ? 'bg-emerald-500' : 'bg-rose-500'}`;
            dotEl.title = p.is_online ? 'Online & Aktif' : 'Offline';
        }

        if (activeZoomStudentId === p.student_id) {
            renderZoomModalState(p);
        }
    }

    function refreshCameraFeed() {
        const icon = document.getElementById('refresh-icon');
        if (icon) icon.classList.add('animate-spin');

        fetch(feedUrl, { headers: { 'Accept': 'application/json' } })
            .then(r => r.json())
            .then(data => {
                if (icon) icon.classList.remove('animate-spin');
                if (!data.success || !data.participants) return;

                data.participants.forEach(updateTileDom);

                if (data.recent_snapshots && data.recent_snapshots.length > 0) {
                    const gallery = document.getElementById('snapshots-gallery');
                    const emptyMsg = document.getElementById('empty-snapshot-msg');
                    if (emptyMsg) emptyMsg.remove();

                    gallery.innerHTML = data.recent_snapshots.map(s => `
                        <div class="p-2 border border-default-200 rounded-md bg-default-50 space-y-2 text-xs">
                            <div class="flex items-center justify-between text-[11px]">
                                <strong class="text-default-800 truncate" title="${escapeHtml(s.student_name)}">${escapeHtml(s.student_name)}</strong>
                                <span class="font-mono text-default-400">${escapeHtml(s.captured_at)}</span>
                            </div>
                            <div class="aspect-video bg-black rounded overflow-hidden relative group">
                                <img src="${s.url}" alt="Snapshot Insiden" class="w-full h-full object-cover">
                                <a href="${s.url}" target="_blank" rel="noopener noreferrer" class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-semibold">
                                    Buka Foto Penuh
                                </a>
                            </div>
                            <div class="flex items-center justify-between text-[10px] text-default-500">
                                <span class="px-1.5 py-0.5 rounded bg-slate-200 font-mono">${escapeHtml(s.reason)}</span>
                                <span>${Number(s.size_kb || 0)} KB</span>
                            </div>
                        </div>
                    `).join('');
                }

                if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
            })
            .catch(() => {
                if (icon) icon.classList.remove('animate-spin');
            });
    }

    function initLiveKitProctorRoom() {
        if (!window.CBT_PROCTORING || !window.CBT_PROCTORING.livekit_configured || !window.TeslokaProctorLiveKit) {
            return;
        }

        fetch(livekitTokenUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(r => r.json())
        .then(cfg => {
            if (!cfg.enabled || !cfg.url || !cfg.token) return;
            window.TeslokaProctorLiveKit.connect({
                url: cfg.url,
                token: cfg.token,
                onTrackAttached: (studentId, track) => {
                    const slot = document.getElementById(`tile-video-slot-${studentId}`);
                    if (slot) {
                        slot.innerHTML = '';
                        const vid = track.attach();
                        vid.className = 'w-full h-full object-cover';
                        slot.appendChild(vid);
                    }
                    const p = participantsMap[studentId];
                    if (p) {
                        p.camera_status = 'livekit_streaming';
                        updateTileDom(p);
                    }
                },
                onTrackDetached: (studentId, track) => {
                    const slot = document.getElementById(`tile-video-slot-${studentId}`);
                    if (track && typeof track.detach === 'function') {
                        try { track.detach(); } catch (e) {}
                    }
                    if (slot) slot.innerHTML = '';
                    const p = participantsMap[studentId];
                    if (p) {
                        if (p.camera_status === 'livekit_streaming') {
                            p.camera_status = p.latest_snapshot_url ? 'active' : 'inactive';
                        }
                        updateTileDom(p);
                    }
                },
                onStateChange: (state) => {
                    const badge = document.getElementById('camera-mode-badge');
                    if (badge && state === 'connected') {
                        badge.className = 'inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-600 text-white';
                        badge.innerHTML = '<span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>WebRTC SFU Live Video (LiveKit)';
                    }
                }
            });
        })
        .catch(() => {});
    }

    let cameraPollTimer = null;
    function scheduleCameraPolling(ms) {
        if (cameraPollTimer) clearInterval(cameraPollTimer);
        cameraPollTimer = setInterval(refreshCameraFeed, ms);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const echo = typeof window.createTeslokaEcho === 'function'
            ? window.createTeslokaEcho(window.CBT_REALTIME, {
                onStateChange: (state) => {
                    const ind = document.getElementById('live-sync-indicator');
                    if (ind) {
                        ind.innerText = state === 'connected' ? 'WebSocket: Reverb Live' : 'Sinkronisasi: Polling (5d)';
                    }
                    scheduleCameraPolling(state === 'connected' ? 15000 : 5000);
                }
            })
            : null;

        if (echo) {
            echo.private(`exam.session.${sessionId}`)
                .listen('.telemetry.updated', (e) => {
                    if (e && e.participant) {
                        const prev = participantsMap[e.participant.student_id] || {};
                        const merged = Object.assign({}, prev, e.participant);
                        updateTileDom(merged);
                    }
                })
                .listen('.snapshot.uploaded', (e) => {
                    if (!e || !e.snapshot) return;
                    const s = e.snapshot;
                    const p = participantsMap[s.student_id];
                    if (p) {
                        p.latest_snapshot_url = s.url;
                        p.latest_snapshot_time = s.captured_iso || s.captured_at;
                        p.latest_snapshot_reason = s.reason;
                        if (!s.is_live_frame && s.id) {
                            p.recent_snapshots = [
                                { id: s.id, url: s.url, captured_at: s.captured_at, reason: s.reason },
                                ...(p.recent_snapshots || [])
                            ].slice(0, 6);
                        }
                        updateTileDom(p);
                    }
                    if (!s.is_live_frame) {
                        refreshCameraFeed();
                    }
                });
        }

        initLiveKitProctorRoom();
        scheduleCameraPolling(5000);
    });
</script>
@endsection
