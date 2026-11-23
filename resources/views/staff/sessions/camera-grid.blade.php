@extends('layouts.staff')

@section('title', 'Grid Kamera Pengawasan : ' . $session->name)
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Grid Kamera: ' . $session->name)

@section('content')
<div class="space-y-6 w-full">

    <!-- Header Banner -->
    <div class="bg-secondary text-white rounded-xl p-5 sm:p-6 shadow-2xs flex flex-col md:flex-row md:items-center justify-between gap-6 border border-secondary-800">
        <div>
            <div class="flex items-center gap-2 flex-wrap mb-1">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-500 text-white">
                    <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                    SFU WebRTC Live-Only &amp; Real-Time
                </span>
                <span class="px-2.5 py-0.5 bg-secondary-800 text-slate-300 text-xs rounded-md font-mono border border-secondary-700/80">
                    {{ $session->room->name ?? 'Daring / Online CBT' }} (Kapasitas: {{ $session->room->capacity ?? count($participants) }})
                </span>
                <span class="px-2 py-0.5 bg-secondary-800 text-slate-400 text-xs rounded-md font-mono border border-secondary-700/80" id="live-sync-indicator">
                    Sinkronisasi: Aktif
                </span>
            </div>
            <h2 class="text-xl sm:text-2xl font-bold">Grid Kamera Pengawas Real-Time &amp; Zoom CCTV</h2>
            <p class="text-xs text-slate-400 mt-1 max-w-2xl">
                Pantau kamera seluruh peserta ujian secara serentak. Klik pada salah satu tile kamera untuk memperbesar (Zoom View), melihat telemetri detil, atau meminta snapshot resolusi tinggi seketika.
            </p>
        </div>

        <div class="flex items-center gap-3 flex-wrap">
            <button type="button" onclick="refreshCameraFeed()" class="btn btn-sm bg-secondary-800 hover:bg-secondary-700 text-white font-semibold transition inline-flex items-center gap-1.5 shadow-2xs border border-secondary-700 rounded-lg">
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
        <!-- 20-30 Video Tiles Grid (3 Kolom di layar besar) -->
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
                            @if($p['latest_snapshot_url'])
                                <img src="{{ $p['latest_snapshot_url'] }}"
                                     alt="{{ $p['student_name'] }}"
                                     class="w-full h-full object-cover tile-snapshot-img transition-transform duration-300 group-hover:scale-105"
                                     id="tile-img-{{ $p['student_id'] }}">
                            @else
                                <div class="flex flex-col items-center justify-center text-slate-500 gap-1 p-2 text-center" id="tile-placeholder-{{ $p['student_id'] }}">
                                    @if($p['is_online'])
                                        <i data-lucide="camera" class="size-7 text-primary animate-pulse mb-1"></i>
                                        <span class="text-[10px] text-slate-300 font-medium">Kamera Terhubung</span>
                                    @else
                                        <i data-lucide="camera-off" class="size-7 text-slate-600 mb-1"></i>
                                        <span class="text-[10px] text-slate-500">Offline / Belum Mulai</span>
                                    @endif
                                </div>
                            @endif

                            <!-- Top Overlay: Status Kamera & Waktu -->
                            <div class="absolute top-2 left-2 right-2 flex items-center justify-between z-10 pointer-events-none">
                                <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold backdrop-blur-xs {{ $p['camera_status'] === 'active' ? 'bg-emerald-600/90 text-white' : 'bg-slate-800/90 text-slate-300' }}" id="tile-status-{{ $p['student_id'] }}">
                                    {{ $p['camera_status'] === 'active' ? 'LIVE' : 'OFFLINE' }}
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
                                <a href="{{ route('staff.sessions.snapshots.view', $snap) }}" target="_blank" class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-semibold">
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
<div id="modalZoomCamera" class="hidden fixed inset-0 z-50 bg-black/75 backdrop-blur-xs flex items-center justify-center p-3 sm:p-5">
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
                        <img id="zoomModalImg" src="" alt="Live Feed Peserta" class="w-full h-full object-contain hidden">
                        <div id="zoomModalPlaceholder" class="flex flex-col items-center justify-center text-slate-500 gap-2 p-6 text-center">
                            <i data-lucide="camera-off" class="size-12 text-slate-700"></i>
                            <span class="text-xs text-slate-400">Belum ada foto snapshot yang tersedia dari peserta ini.</span>
                        </div>

                        <!-- Live Status Overlay -->
                        <div class="absolute top-3 left-3 flex items-center gap-2">
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
                                <span>Ambil Foto Sekarang (On-Demand)</span>
                            </button>
                            <span id="snapRequestFeedback" class="text-xs font-medium text-emerald-400 hidden"></span>
                        </div>
                        <a id="zoomOpenFullImg" href="#" target="_blank" class="btn btn-sm bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-medium px-3 py-2 rounded inline-flex items-center gap-1.5 transition">
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
                                <span class="text-slate-400">Alasan Snapshot:</span>
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
    let participantsData = @json($participants);
    let activeZoomStudentId = null;

    // Map data by student_id
    let participantsMap = {};
    participantsData.forEach(p => {
        participantsMap[p.student_id] = p;
    });

    function openZoomModal(studentId) {
        activeZoomStudentId = studentId;
        const p = participantsMap[studentId];
        if (!p) return;

        document.getElementById('zoomStudentName').innerText = `[${p.seat_number}] ${p.student_name}`;
        document.getElementById('zoomStudentMeta').innerText = `Nomor Kursi: ${p.seat_number} • Username: ${p.student_username || '-'} • Paket: ${p.package_code || '-'}`;

        const imgEl = document.getElementById('zoomModalImg');
        const placeholderEl = document.getElementById('zoomModalPlaceholder');
        const openFullLink = document.getElementById('zoomOpenFullImg');

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

        const liveBadge = document.getElementById('zoomLiveBadge');
        if (p.camera_status === 'active') {
            liveBadge.className = 'px-2.5 py-1 rounded text-xs font-mono font-bold bg-emerald-600 text-white shadow';
            liveBadge.innerText = 'LIVE KAMERA AKTIF';
        } else {
            liveBadge.className = 'px-2.5 py-1 rounded text-xs font-mono font-bold bg-slate-800 text-slate-300 shadow';
            liveBadge.innerText = 'KAMERA MATI';
        }

        const timeBadge = document.getElementById('zoomTimeBadge');
        if (p.latest_snapshot_time) {
            timeBadge.innerText = p.latest_snapshot_time.includes('T') ? p.latest_snapshot_time.split('T')[1].slice(0, 8) : p.latest_snapshot_time;
        } else {
            timeBadge.innerText = '--:--:--';
        }

        // Telemetry
        document.getElementById('zoomStatConnection').innerText = p.is_online ? 'Online' : 'Offline';
        document.getElementById('zoomStatConnection').className = p.is_online ? 'text-emerald-400 font-bold' : 'text-rose-400 font-bold';

        document.getElementById('zoomStatCamera').innerText = p.camera_status === 'active' ? 'Aktif Mengawasi' : 'Tidak Aktif';
        document.getElementById('zoomStatCamera').className = p.camera_status === 'active' ? 'text-emerald-400 font-bold' : 'text-slate-400';

        document.getElementById('zoomStatTab').innerText = p.is_tab_focused ? 'Fokus (Aman)' : 'Meninggalkan Tab (Blur)';
        document.getElementById('zoomStatTab').className = p.is_tab_focused ? 'text-emerald-400 font-bold' : 'text-amber-400 font-bold';

        document.getElementById('zoomStatFullscreen').innerText = p.is_fullscreen ? 'Layar Penuh' : 'Keluar Fullscreen';
        document.getElementById('zoomStatFullscreen').className = p.is_fullscreen ? 'text-emerald-400 font-bold' : 'text-rose-400 font-bold';

        document.getElementById('zoomStatReason').innerText = p.latest_snapshot_reason || '-';

        // Thumbnails
        renderThumbnails(p.recent_snapshots || []);

        document.getElementById('modalZoomCamera').classList.remove('hidden');
        if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
    }

    function closeZoomModal() {
        activeZoomStudentId = null;
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
                document.getElementById('zoomModalImg').src = s.url;
                document.getElementById('zoomModalImg').classList.remove('hidden');
                document.getElementById('zoomModalPlaceholder').classList.add('hidden');
                document.getElementById('zoomOpenFullImg').href = s.url;
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
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(r => r.json())
        .then(data => {
            btn.disabled = false;
            btn.innerHTML = '<i data-lucide="camera" class="size-4"></i><span>Ambil Foto Sekarang (On-Demand)</span>';
            if (feedback) {
                feedback.innerText = 'Permintaan foto terkirim ke siswa!';
                feedback.classList.remove('hidden');
                setTimeout(() => feedback.classList.add('hidden'), 3500);
            }
            if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
            // Segarkan grid segera
            setTimeout(refreshCameraFeed, 2000);
        })
        .catch(err => {
            btn.disabled = false;
            btn.innerHTML = '<i data-lucide="camera" class="size-4"></i><span>Ambil Foto Sekarang</span>';
            alert('Gagal mengirim instruksi snapshot.');
        });
    }

    function triggerSnapshotRequest(attemptId, studentName, event) {
        if (event) event.stopPropagation();
        if (!confirm(`Minta penangkapan foto kamera dari peserta ${studentName}?`)) return;

        fetch(`/staff/sessions/${sessionId}/attempts/${attemptId}/request-snapshot`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(r => r.json())
        .then(data => {
            alert(data.message || 'Permintaan snapshot telah dikirim ke siswa.');
            setTimeout(refreshCameraFeed, 2000);
        })
        .catch(err => alert('Gagal mengirim permintaan snapshot.'));
    }

    // ==========================================
    // AUTO-POLLING REAL-TIME CCTV LOOP (DEC-004)
    // ==========================================
    function refreshCameraFeed() {
        const icon = document.getElementById('refresh-icon');
        if (icon) icon.classList.add('animate-spin');

        fetch(feedUrl, {
            headers: { 'Accept': 'application/json' }
        })
        .then(r => r.json())
        .then(data => {
            if (icon) icon.classList.remove('animate-spin');
            if (!data.success || !data.participants) return;

            data.participants.forEach(p => {
                participantsMap[p.student_id] = p;

                // Update tile image
                const feedBox = document.getElementById(`tile-feed-${p.student_id}`);
                const imgEl = document.getElementById(`tile-img-${p.student_id}`);
                const statusEl = document.getElementById(`tile-status-${p.student_id}`);
                const timeEl = document.getElementById(`tile-time-${p.student_id}`);
                const dotEl = document.getElementById(`tile-dot-${p.student_id}`);

                if (p.latest_snapshot_url) {
                    if (imgEl) {
                        imgEl.src = p.latest_snapshot_url;
                    } else if (feedBox) {
                        feedBox.innerHTML = `
                            <img src="${p.latest_snapshot_url}" alt="${p.student_name}" class="w-full h-full object-cover tile-snapshot-img transition-transform duration-300 group-hover:scale-105" id="tile-img-${p.student_id}">
                            <div class="absolute top-2 left-2 right-2 flex items-center justify-between z-10 pointer-events-none">
                                <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold backdrop-blur-xs ${p.camera_status === 'active' ? 'bg-emerald-600/90 text-white' : 'bg-slate-800/90 text-slate-300'}" id="tile-status-${p.student_id}">
                                    ${p.camera_status === 'active' ? 'LIVE' : 'OFFLINE'}
                                </span>
                                <span class="px-1.5 py-0.5 rounded text-[9px] font-mono bg-black/70 text-slate-300" id="tile-time-${p.student_id}">
                                    ${p.latest_snapshot_time ? p.latest_snapshot_time.split('T')[1].slice(0, 8) : '--:--'}
                                </span>
                            </div>
                            <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-xs opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2 z-20">
                                <span class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-semibold px-2.5 py-1.5 rounded inline-flex items-center gap-1.5 shadow transition">
                                    <i data-lucide="maximize-2" class="size-3.5"></i>
                                    <span>Zoom View</span>
                                </span>
                            </div>
                        `;
                    }
                }

                if (statusEl) {
                    statusEl.innerText = p.camera_status === 'active' ? 'LIVE' : 'OFFLINE';
                    statusEl.className = `px-2 py-0.5 rounded text-[10px] font-mono font-bold backdrop-blur-xs ${p.camera_status === 'active' ? 'bg-emerald-600/90 text-white' : 'bg-slate-800/90 text-slate-300'}`;
                }

                if (timeEl && p.latest_snapshot_time) {
                    timeEl.innerText = p.latest_snapshot_time.includes('T') ? p.latest_snapshot_time.split('T')[1].slice(0, 8) : p.latest_snapshot_time;
                }

                if (dotEl) {
                    dotEl.className = `inline-block w-2 h-2 rounded-full ${p.is_online ? 'bg-emerald-500' : 'bg-rose-500'}`;
                }

                // If this student is currently in Zoom modal, update modal image live!
                if (activeZoomStudentId === p.student_id) {
                    const zoomImg = document.getElementById('zoomModalImg');
                    if (p.latest_snapshot_url && zoomImg) {
                        zoomImg.src = p.latest_snapshot_url;
                    }
                }
            });

            // Update Snapshots Gallery
            if (data.recent_snapshots && data.recent_snapshots.length > 0) {
                const gallery = document.getElementById('snapshots-gallery');
                const emptyMsg = document.getElementById('empty-snapshot-msg');
                if (emptyMsg) emptyMsg.remove();

                let html = '';
                data.recent_snapshots.forEach(s => {
                    html += `
                        <div class="p-2 border border-default-200 rounded-md bg-default-50 space-y-2 text-xs">
                            <div class="flex items-center justify-between text-[11px]">
                                <strong class="text-default-800 truncate" title="${s.student_name}">${s.student_name}</strong>
                                <span class="font-mono text-default-400">${s.captured_at}</span>
                            </div>
                            <div class="aspect-video bg-black rounded overflow-hidden relative group">
                                <img src="${s.url}" alt="Snapshot Insiden" class="w-full h-full object-cover">
                                <a href="${s.url}" target="_blank" class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-semibold">
                                    Buka Foto Penuh
                                </a>
                            </div>
                            <div class="flex items-center justify-between text-[10px] text-default-500">
                                <span class="px-1.5 py-0.5 rounded bg-slate-200 font-mono">${s.reason}</span>
                                <span>${s.size_kb} KB</span>
                            </div>
                        </div>
                    `;
                });
                gallery.innerHTML = html;
            }

            if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
        })
        .catch(err => {
            if (icon) icon.classList.remove('animate-spin');
        });
    }

    // Jalankan auto-polling setiap 5 detik
    setInterval(refreshCameraFeed, 5000);
</script>
@endsection
