@extends('layouts.staff')

@section('title', 'Grid Kamera Pengawasan — ' . $session->name)
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Grid Kamera: ' . $session->name)

@section('content')
<div class="space-y-6 w-full">

    <!-- Header Banner -->
    <div class="bg-slate-900 text-white rounded-md p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-2 flex-wrap mb-1">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-rose-500 text-white">
                    <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                    SFU WebRTC Live-Only
                </span>
                <span class="px-2.5 py-0.5 bg-slate-800 text-slate-300 text-xs rounded font-mono">
                    {{ $session->room->name }} (Kapasitas: {{ $session->room->capacity }})
                </span>
            </div>
            <h2 class="text-2xl font-bold">Grid Kamera Pengawas Real-Time</h2>
            <p class="text-xs text-default-400 mt-1">
                Kebijakan DEC-004: Live Streaming murni tanpa penyimpanan video kontinu ke disk. Bukti kecurangan disimpan otomatis berupa snapshot resolusi tinggi saat insiden.
            </p>
        </div>

        <div class="flex items-center gap-3 flex-wrap">
            <a href="{{ route('staff.sessions.monitor', $session) }}" class="btn btn-sm bg-slate-800 hover:bg-slate-700 text-white font-semibold transition inline-flex items-center gap-1.5 shadow-2xs">
                <i data-lucide="bar-chart-2" class="size-4"></i>
                <span>Buka Monitoring Teks</span>
            </a>
            <div class="bg-slate-800 border border-slate-700 px-4 py-2 rounded text-center">
                <span class="block text-[10px] text-default-400 uppercase tracking-wider">Kanal Media SFU</span>
                <span class="font-mono text-xs font-bold text-emerald-400">{{ $sfuRoom->room_name }}</span>
            </div>
        </div>
    </div>

    <!-- Layout: Main Video Grid (Left/Top) & Incident Snapshots Drawer (Right/Bottom) -->
    <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 items-start">
        <!-- 20-30 Video Tiles Grid (3 Kolom di layar besar) -->
        <div class="xl:col-span-3 space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3" id="camera-tiles-container">
                @foreach($participants as $p)
                    <div class="camera-tile bg-slate-900 border border-slate-800 rounded overflow-hidden shadow-sm flex flex-col justify-between aspect-video relative group transition hover:border-primary"
                         data-student-id="{{ $p['student_id'] }}"
                         data-attempt-id="{{ $p['attempt_id'] ?? '' }}">

                        <!-- Video Stream Canvas / Feed Placeholder -->
                        <div class="w-full h-full bg-slate-950 flex items-center justify-center relative overflow-hidden">
                            @if($p['is_online'] && $p['camera_status'] === 'active')
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent z-10"></div>
                                <div class="flex flex-col items-center justify-center text-default-600 gap-1">
                                    <i data-lucide="video" class="size-8 text-primary animate-pulse"></i>
                                    <span class="text-[10px] text-default-400 font-mono">Live WebRTC</span>
                                </div>
                            @elseif($p['attempt_status'] === 'submitted' || $p['attempt_status'] === 'terminated')
                                <div class="flex flex-col items-center justify-center text-default-600">
                                    <span class="text-[11px] font-semibold text-default-400">Ujian Berakhir</span>
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center text-default-600 gap-1">
                                    <i data-lucide="video-off" class="size-6 text-default-600"></i>
                                    <span class="text-[10px] text-default-500">Kamera Mati / Belum Mulai</span>
                                </div>
                            @endif

                            <!-- Overlay Controls on Hover -->
                            @if($p['attempt_id'] && $p['attempt_status'] === 'in_progress')
                                <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-xs opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2 z-20">
                                    <button type="button" onclick="triggerSnapshotRequest({{ $p['attempt_id'] }}, '{{ addslashes($p['student_name']) }}')" class="p-2 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow cursor-pointer transition" title="Ambil Foto Snapshot">
                                        <i data-lucide="camera" class="size-4"></i>
                                    </button>
                                </div>
                            @endif
                        </div>

                        <!-- Tile Bottom Info Bar -->
                        <div class="bg-slate-900 p-2 z-10 flex items-center justify-between text-white border-t border-slate-800">
                            <div class="truncate pr-1">
                                <span class="font-bold text-[11px] block truncate" title="{{ $p['student_name'] }}">
                                    [{{ $p['seat_number'] }}] {{ $p['student_name'] }}
                                </span>
                            </div>
                            <div class="shrink-0">
                                @if($p['is_online'])
                                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-500" title="Online & Aktif"></span>
                                @else
                                    <span class="inline-block w-2 h-2 rounded-full bg-rose-500" title="Offline / Terputus"></span>
                                @endif
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
                        <div class="p-2 border border-default-200 rounded bg-default-50 space-y-2 text-xs">
                            <div class="flex items-center justify-between text-[11px]">
                                <strong class="text-default-800 truncate" title="{{ $snap->student->name }}">{{ $snap->student->name }}</strong>
                                <span class="font-mono text-default-400">{{ $snap->captured_at->format('H:i:s') }}</span>
                            </div>
                            <div class="aspect-video bg-black rounded-lg overflow-hidden relative group">
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
                        <p class="text-xs text-default-400 text-center py-8">Belum ada snapshot insiden yang tercatat.</p>
                    @endforelse
                </div>
            </x-cbt.card>
        </div>
    </div>
</div>

<script>
    const sessionId = {{ $session->id }};

    function triggerSnapshotRequest(attemptId, studentName) {
        if (!confirm(`Minta penangkapan foto kamera dari peserta ${studentName}?`)) return;

        fetch(`/staff/sessions/${sessionId}/attempts/${attemptId}/request-snapshot`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        }).then(r => r.json()).then(data => {
            alert(data.message || 'Permintaan snapshot telah dikirim.');
        }).catch(err => alert('Gagal mengirim permintaan snapshot.'));
    }
</script>
@endsection

