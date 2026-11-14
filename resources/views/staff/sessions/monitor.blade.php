@extends('layouts.staff')

@section('title', 'Monitoring Pengawasan — ' . $session->name)
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Monitoring Real-Time')

@section('content')
<div class="space-y-6 w-full" id="monitoring-root" data-feed-url="{{ route('staff.sessions.monitor.feed', $session) }}">

    <!-- Top Session Header -->
    <div class="bg-slate-900 text-white rounded-md p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="space-y-1">
            <div class="flex items-center gap-2 flex-wrap">
                <span class="px-2.5 py-1 bg-primary text-white text-xs font-bold rounded uppercase shadow-xs">
                    {{ $session->exam->exam_type }}
                </span>
                <span class="px-2.5 py-0.5 bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-xs font-semibold rounded">
                    Ruang: {{ $session->room->name }} (Maks {{ $session->room->capacity }})
                </span>
                <span class="text-xs text-default-400">Kode Sesi: <strong class="text-white">{{ $session->session_code }}</strong></span>
            </div>
            <h2 class="text-xl md:text-2xl font-bold">{{ $session->exam->title }}</h2>
            <p class="text-sm text-default-400">
                Mata Pelajaran: <span class="text-slate-200">{{ $session->exam->subject->name ?? '-' }}</span> |
                Jadwal: <span class="text-slate-200">{{ $session->start_time->format('d/m/Y H:i') }} - {{ $session->end_time->format('H:i') }} WIB</span>
            </p>
        </div>

        <div class="flex items-center gap-3 flex-wrap">
            <a href="{{ route('staff.sessions.camera-grid', $session) }}" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded text-sm font-semibold transition inline-flex items-center gap-2 border border-slate-700 shadow-sm">
                <svg class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
                Grid Kamera Live
            </a>
            <div class="bg-slate-800 border border-slate-700 px-4 py-2 rounded text-center">
                <span class="block text-[10px] text-default-400 uppercase tracking-wider">Token Rilis</span>
                <span class="font-mono text-lg font-bold text-amber-400 tracking-widest">{{ $session->token ?: 'BELUM AKTIF' }}</span>
            </div>
            <button type="button" onclick="openAnnouncementModal()" class="px-4 py-2 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold transition inline-flex items-center gap-2 shadow-xs cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                </svg>
                Siarkan Pengumuman
            </button>
            <button type="button" onclick="openIncidentModal()" class="px-4 py-2 bg-rose-600 hover:bg-rose-500 text-white rounded text-sm font-semibold transition inline-flex items-center gap-2 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                Catat Insiden
            </button>
        </div>
    </div>

    <!-- Metric Stat Badges -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
        <div class="bg-white border border-default-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-default-800" id="stat-total">{{ $stats['total_registered'] }}</span>
            <span class="text-xs text-default-500 font-medium">Terdaftar</span>
        </div>
        <div class="bg-white border border-emerald-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-emerald-600" id="stat-online">{{ $stats['online'] }}</span>
            <span class="text-xs text-emerald-700 font-medium">Online (Live)</span>
        </div>
        <div class="bg-white border border-rose-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-rose-600" id="stat-offline">{{ $stats['offline'] }}</span>
            <span class="text-xs text-rose-700 font-medium">Offline / Putus</span>
        </div>
        <div class="bg-white border border-blue-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-blue-600" id="stat-completed">{{ $stats['completed'] }}</span>
            <span class="text-xs text-blue-700 font-medium">Selesai Submit</span>
        </div>
        <div class="bg-white border border-default-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-default-600" id="stat-not-started">{{ $stats['not_started'] }}</span>
            <span class="text-xs text-default-500 font-medium">Belum Masuk</span>
        </div>
        <div class="bg-white border border-amber-200 rounded p-4 shadow-sm text-center">
            <span class="block text-2xl font-black text-amber-600" id="stat-warning">{{ $stats['warning_focus'] }}</span>
            <span class="text-xs text-amber-700 font-medium">Peringatan Tab Blur</span>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white border border-default-200 rounded p-4 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-2 flex-wrap w-full md:w-auto">
            <span class="text-xs font-bold text-default-400 uppercase tracking-wider mr-1">Filter:</span>
            <button type="button" onclick="setFilter('all')" class="filter-btn active px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-900 text-white transition" data-filter="all">Semua</button>
            <button type="button" onclick="setFilter('online')" class="filter-btn px-3 py-1.5 rounded-lg text-xs font-semibold bg-default-100 text-default-700 hover:bg-slate-200 transition" data-filter="online">Online</button>
            <button type="button" onclick="setFilter('warning')" class="filter-btn px-3 py-1.5 rounded-lg text-xs font-semibold bg-default-100 text-default-700 hover:bg-slate-200 transition" data-filter="warning">Peringatan Blur</button>
            <button type="button" onclick="setFilter('offline')" class="filter-btn px-3 py-1.5 rounded-lg text-xs font-semibold bg-default-100 text-default-700 hover:bg-slate-200 transition" data-filter="offline">Offline</button>
            <button type="button" onclick="setFilter('completed')" class="filter-btn px-3 py-1.5 rounded-lg text-xs font-semibold bg-default-100 text-default-700 hover:bg-slate-200 transition" data-filter="completed">Selesai</button>
        </div>

        <div class="flex items-center gap-3 w-full md:w-auto">
            <div class="relative w-full md:w-64">
                <input type="text" id="search-input" onkeyup="filterParticipants()" placeholder="Cari nama / meja..." class="form-input w-full pl-9 pr-3 h-9 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                <svg class="w-4 h-4 text-default-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <div class="flex items-center gap-1 text-[11px] text-default-500 shrink-0">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span id="feed-status">Auto-Sync Live</span>
            </div>
        </div>
    </div>

    <!-- Student Exam Desks Grid (20-30 Peserta per Ruang) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="participants-grid">
        @foreach($participantsData as $part)
            <div class="participant-card bg-white border border-default-200 rounded p-4 shadow-sm hover:shadow transition relative flex flex-col justify-between"
                 data-student-id="{{ $part['student_id'] }}"
                 data-attempt-id="{{ $part['attempt_id'] ?? '' }}"
                 data-name="{{ strtolower($part['student_name']) }}"
                 data-seat="{{ strtolower($part['seat_number']) }}"
                 data-status="{{ $part['is_online'] ? 'online' : ($part['attempt_status'] === 'submitted' || $part['attempt_status'] === 'terminated' ? 'completed' : ($part['attempt_status'] === 'in_progress' ? 'offline' : 'not_started')) }}"
                 data-focus="{{ $part['is_tab_focused'] ? 'focused' : 'blur' }}">

                <!-- Desk & Online Status Header -->
                <div>
                    <div class="flex items-center justify-between gap-2 mb-2">
                        <div class="flex items-center gap-1.5">
                            <span class="px-2 py-0.5 bg-slate-900 text-white font-mono text-xs font-bold rounded">
                                {{ $part['seat_number'] }}
                            </span>
                            <span class="px-1.5 py-0.5 bg-default-100 text-default-600 text-[10px] font-semibold rounded font-mono">
                                {{ $part['package_code'] }}
                            </span>
                        </div>
                        <div class="flex items-center gap-1">
                            @if($part['is_online'])
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> Online
                                </span>
                            @elseif($part['attempt_status'] === 'submitted')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-100 text-blue-800">
                                    Submitted
                                </span>
                            @elseif($part['attempt_status'] === 'terminated')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-rose-100 text-rose-800">
                                    Dihentikan
                                </span>
                            @elseif($part['attempt_status'] === 'in_progress')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-rose-100 text-rose-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-600"></span> Offline
                                </span>
                            @else
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-default-100 text-default-600">
                                    Belum Mulai
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Student Name -->
                    <h3 class="font-bold text-default-800 text-sm truncate" title="{{ $part['student_name'] }}">
                        {{ $part['student_name'] }}
                    </h3>
                    <span class="text-xs text-default-400 block font-mono">NISN: {{ $part['student_nisn'] ?? '-' }}</span>

                    <!-- Warnings (Tab blur / fullscreen) -->
                    @if(! $part['is_tab_focused'])
                        <div class="mt-2 px-2 py-1 bg-amber-50 border border-amber-200 rounded text-[11px] text-amber-800 font-medium flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <span>Fokus Tab Lepas (Blur)</span>
                        </div>
                    @endif

                    <!-- Progress Bar & Answer Count -->
                    @if($part['attempt_id'])
                        <div class="mt-3 space-y-1">
                            <div class="flex items-center justify-between text-[11px] text-default-600">
                                <span>Terjawab: <strong>{{ $part['answered_count'] }}/{{ $part['total_questions'] }}</strong></span>
                                <span class="font-semibold">{{ $part['progress_percent'] }}%</span>
                            </div>
                            <div class="w-full bg-default-100 h-1.5 rounded-full overflow-hidden">
                                <div class="bg-primary h-1.5 rounded-full" style="width: {{ $part['progress_percent'] }}%"></div>
                            </div>
                            @if($part['doubtful_count'] > 0)
                                <span class="text-[10px] text-amber-600 block">Ragu-ragu: {{ $part['doubtful_count'] }} soal</span>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Intervention Actions Menu -->
                @if($part['attempt_id'] && $part['attempt_status'] === 'in_progress')
                    <div class="mt-4 pt-3 border-t border-default-100 flex items-center justify-between gap-1 flex-wrap">
                        <button type="button" onclick="openStudentWarningModal({{ $part['student_id'] }}, '{{ addslashes($part['student_name']) }}')" class="px-2 py-1 text-[11px] font-semibold text-rose-600 hover:bg-rose-50 rounded transition" title="Kirim Peringatan Langsung ke Peserta Ini">
                            Peringatkan
                        </button>
                        <button type="button" onclick="openAddTimeModal({{ $part['attempt_id'] }}, '{{ addslashes($part['student_name']) }}')" class="px-2 py-1 text-[11px] font-semibold text-primary hover:bg-blue-50 rounded transition" title="Tambah Waktu">
                            +15 Mnt
                        </button>
                        <button type="button" onclick="confirmForceRefresh({{ $part['attempt_id'] }}, '{{ addslashes($part['student_name']) }}')" class="px-2 py-1 text-[11px] font-semibold text-default-600 hover:bg-default-100 rounded transition" title="Paksa Reload Layar">
                            Reload
                        </button>
                        <button type="button" onclick="openForceLogoutModal({{ $part['attempt_id'] }}, '{{ addslashes($part['student_name']) }}')" class="px-2 py-1 text-[11px] font-semibold text-amber-600 hover:bg-amber-50 rounded transition" title="Logout Paksa Sesi Perangkat (Jawaban Aman)">
                            Reset Sesi
                        </button>
                        <button type="button" onclick="openForceStopModal({{ $part['attempt_id'] }}, '{{ addslashes($part['student_name']) }}')" class="px-2 py-1 text-[11px] font-semibold text-rose-700 hover:bg-rose-50 rounded transition" title="Hentikan Ujian Permanen">
                            Stop
                        </button>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Bottom Grids: Log Insiden & Pengumuman Aktif -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 pt-4">
        <!-- Log Insiden Sesi -->
        <x-cbt.card title="Log Insiden & Gangguan Ruang Ujian">
            <div class="space-y-3 max-h-80 overflow-y-auto pr-1" id="incidents-list">
                @forelse($incidents as $inc)
                    <div class="p-3 border border-default-200 rounded text-xs space-y-1.5 {{ $inc->severity === 'critical' ? 'bg-rose-50/50 border-rose-200' : ($inc->severity === 'warning' ? 'bg-amber-50/50 border-amber-200' : 'bg-default-50') }}">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1.5">
                                <span class="font-mono font-bold text-default-700">{{ $inc->incident_code }}</span>
                                <span class="px-1.5 py-0.2 rounded font-semibold uppercase text-[10px] {{ $inc->severity === 'critical' ? 'bg-rose-100 text-rose-800' : ($inc->severity === 'warning' ? 'bg-amber-100 text-amber-800' : 'bg-slate-200 text-default-700') }}">
                                    {{ $inc->severity }}
                                </span>
                            </div>
                            <span class="text-default-400 font-mono">{{ $inc->created_at->format('H:i:s') }}</span>
                        </div>
                        <p class="text-default-700 font-medium">{{ $inc->description }}</p>
                        <div class="flex items-center justify-between text-[11px] text-default-500 pt-1 border-t border-default-200">
                            <span>Peserta: {{ $inc->student->name ?? 'Sistem / Umum' }}</span>
                            @if($inc->status === 'resolved')
                                <span class="text-emerald-600 font-semibold">Terselesaikan ({{ $inc->resolvedBy->name ?? 'Staff' }})</span>
                            @else
                                <button type="button" onclick="openResolveIncidentModal({{ $inc->id }}, '{{ $inc->incident_code }}')" class="text-primary font-semibold hover:underline cursor-pointer">
                                    Tindak Lanjuti
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-default-400 text-center py-6">Belum ada insiden yang tercatat pada sesi ini.</p>
                @endforelse
            </div>
        </x-cbt.card>

        <!-- Pengumuman Ruang & Sesi -->
        <x-cbt.card title="Pengumuman Siaran Aktif">
            <div class="space-y-3 max-h-80 overflow-y-auto pr-1" id="announcements-list">
                @forelse($announcements as $ann)
                    <div class="p-3 border border-default-200 rounded text-xs space-y-1 {{ $ann->priority === 'emergency' ? 'bg-rose-50 border-rose-300' : ($ann->priority === 'urgent' ? 'bg-amber-50 border-amber-300' : 'bg-default-50') }}">
                        <div class="flex items-center justify-between">
                            <strong class="text-default-800 font-bold">{{ $ann->title }}</strong>
                            <span class="text-[10px] text-default-400 font-mono">{{ $ann->created_at->format('H:i') }}</span>
                        </div>
                        <p class="text-default-600">{{ $ann->message }}</p>
                        <div class="text-[10px] text-default-400 pt-1 flex items-center justify-between">
                            <span>Oleh: {{ $ann->sender->name ?? 'Pengawas' }}</span>
                            <span class="capitalize">Target: {{ $ann->target_type }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-default-400 text-center py-6">Belum ada pengumuman yang disiarkan.</p>
                @endforelse
            </div>
        </x-cbt.card>
    </div>
</div>

<!-- Modal Siarkan Pengumuman -->
<div id="modal-announcement" class="hidden fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-lg w-full max-h-[90vh] flex flex-col p-5 sm:p-6 space-y-4 shadow-xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3">
            <h3 class="font-bold text-default-900 text-base">Siarkan Pengumuman Selama Ujian</h3>
            <button type="button" onclick="closeAnnouncementModal()" class="text-default-400 hover:text-default-600 cursor-pointer text-lg leading-none">&times;</button>
        </div>
        <form action="{{ route('staff.sessions.monitor.announcements.store', $session) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Judul Pengumuman</label>
                <input type="text" name="title" required placeholder="Contoh: Perhatian Soal No 15" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Target Penerima</label>
                <select name="target_type" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="session">Seluruh Peserta Sesi Ini</option>
                    <option value="room">Khusus Ruang Ini</option>
                    <option value="all">Seluruh Peserta Ujian Ini</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Prioritas</label>
                <select name="priority" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="normal">Normal (Banner Info)</option>
                    <option value="urgent">Mendesak (Peringatan)</option>
                    <option value="emergency">Darurat (Popup Interaktif)</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Isi Pesan Pengumuman</label>
                <textarea name="message" rows="3" required placeholder="Tuliskan petunjuk atau klarifikasi..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary"></textarea>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" id="req_ack" name="requires_acknowledgement" value="1" class="form-checkbox text-primary focus:ring-primary/20">
                <label for="req_ack" class="text-xs text-default-600 cursor-pointer">Wajibkan konfirmasi baca oleh peserta</label>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100">
                <button type="button" onclick="closeAnnouncementModal()" class="w-full sm:w-auto px-4 py-2.5 border border-default-200 rounded text-xs font-semibold text-default-700 hover:bg-default-50 transition cursor-pointer">Batal</button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer">Siarkan Sekarang</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Peringatan Khusus Peserta (Targeted Proctor Warning - FULL-FEATURE 20.8, 22) -->
<div id="modal-student-warning" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-lg w-full max-h-[90vh] flex flex-col p-5 sm:p-6 space-y-4 shadow-xl border border-rose-200 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-rose-100 pb-3">
            <div class="flex items-center gap-2">
                <span class="size-8 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold">!</span>
                <div>
                    <h3 class="font-bold text-default-900 text-base">Kirim Peringatan Khusus Peserta</h3>
                    <p class="text-[11px] text-default-500">Peringatan langsung ke layar peserta dengan konfirmasi wajib (satu arah)</p>
                </div>
            </div>
            <button type="button" onclick="closeStudentWarningModal()" class="text-default-400 hover:text-default-600 cursor-pointer text-lg leading-none">&times;</button>
        </div>

        <form action="{{ route('staff.sessions.monitor.announcements.store', $session) }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="target_type" value="student">
            <input type="hidden" name="target_id" id="warning_target_id" value="">
            <input type="hidden" name="priority" value="urgent">
            <input type="hidden" name="requires_acknowledgement" value="1">
            <input type="hidden" name="title" value="Peringatan Pengawas Ruang Ujian">

            <div class="p-3 bg-rose-50 border border-rose-200 rounded text-xs text-rose-900">
                Peringatan akan dikirimkan kepada: <strong id="warning_student_name" class="font-bold"></strong>. Layar ujian siswa akan terblokir sampai siswa menekan tombol konfirmasi.
            </div>

            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">Pilihan Cepat Pesan Peringatan:</label>
                <div class="grid grid-cols-1 gap-1.5 text-[11px]">
                    <button type="button" onclick="setWarningPreset('Harap fokus pandangan ke layar monitor Anda dan jangan menoleh ke arah lain.')" class="text-left px-2.5 py-1.5 rounded bg-default-50 hover:bg-rose-50 hover:text-rose-700 border border-default-200 transition cursor-pointer">
                        &bull; Fokus pandangan ke layar monitor
                    </button>
                    <button type="button" onclick="setWarningPreset('Posisikan wajah Anda tepat di depan kamera pengawas dan jangan tinggalkan tempat duduk.')" class="text-left px-2.5 py-1.5 rounded bg-default-50 hover:bg-rose-50 hover:text-rose-700 border border-default-200 transition cursor-pointer">
                        &bull; Posisikan wajah tepat di depan kamera pengawas
                    </button>
                    <button type="button" onclick="setWarningPreset('Dilarang keras membuka tab, jendela browser lain, atau aplikasi tambahan selama ujian berlangsung!')" class="text-left px-2.5 py-1.5 rounded bg-default-50 hover:bg-rose-50 hover:text-rose-700 border border-default-200 transition cursor-pointer">
                        &bull; Larangan membuka tab atau aplikasi lain
                    </button>
                    <button type="button" onclick="setWarningPreset('Dilarang berbicara atau berkomunikasi dengan siapapun di dalam ruang ujian!')" class="text-left px-2.5 py-1.5 rounded bg-default-50 hover:bg-rose-50 hover:text-rose-700 border border-default-200 transition cursor-pointer">
                        &bull; Larangan berbicara / berkomunikasi
                    </button>
                    <button type="button" onclick="setWarningPreset('Peringatan integritas: aktivitas mencurigakan terdeteksi oleh pengawas. Harap patuhi tata tertib ujian.')" class="text-left px-2.5 py-1.5 rounded bg-default-50 hover:bg-rose-50 hover:text-rose-700 border border-default-200 transition cursor-pointer">
                        &bull; Peringatan integritas &amp; tata tertib ujian
                    </button>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Isi Pesan Peringatan</label>
                <textarea name="message" id="warning_message" rows="3" required placeholder="Pilih preset di atas atau ketik pesan peringatan kustom..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500"></textarea>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100">
                <button type="button" onclick="closeStudentWarningModal()" class="w-full sm:w-auto px-4 py-2.5 border border-default-200 rounded text-xs font-semibold text-default-700 hover:bg-default-50 transition cursor-pointer">Batal</button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer">Kirim Peringatan Tegas</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Catat Insiden -->
<div id="modal-incident" class="hidden fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-lg w-full max-h-[90vh] flex flex-col p-5 sm:p-6 space-y-4 shadow-xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3">
            <h3 class="font-bold text-default-900 text-base">Catat Laporan Insiden Ujian</h3>
            <button type="button" onclick="closeIncidentModal()" class="text-default-400 hover:text-default-600 cursor-pointer text-lg leading-none">&times;</button>
        </div>
        <form action="{{ route('staff.sessions.monitor.incidents.store', $session) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Jenis Insiden / Kejadian</label>
                <select name="event_type" required class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="gangguan_koneksi">Gangguan Koneksi Jaringan</option>
                    <option value="gangguan_perangkat">Gangguan Perangkat / Mati Listrik</option>
                    <option value="dugaan_pelanggaran">Dugaan Pelanggaran / Mencontek</option>
                    <option value="peserta_sakit">Peserta Sakit / Izin Keluar</option>
                    <option value="kesalahan_soal">Laporan Kesalahan Redaksi Butir Soal</option>
                    <option value="lainnya">Kejadian Operasional Lainnya</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Tingkat Keparahan</label>
                <select name="severity" required class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="info">Informasi (Rendah)</option>
                    <option value="warning" selected>Peringatan (Sedang)</option>
                    <option value="critical">Kritis (Menghentikan Ujian)</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Peserta Terkait (Opsional)</label>
                <select name="student_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">-- Tidak Terkait Peserta Tertentu / Umum --</option>
                    @foreach($session->participants as $p)
                        <option value="{{ $p->student_id }}">[{{ $p->seat_number }}] {{ $p->student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Deskripsi Kejadian</label>
                <textarea name="description" rows="3" required placeholder="Deskripsikan kronologis kejadian..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary"></textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Tindakan Penanganan Langsung (Opsional)</label>
                <input type="text" name="action_taken" placeholder="Contoh: Perangkat diganti, waktu ditambahkan 10 menit" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100">
                <button type="button" onclick="closeIncidentModal()" class="w-full sm:w-auto px-4 py-2.5 border border-default-200 rounded text-xs font-semibold text-default-700 hover:bg-default-50 transition cursor-pointer">Batal</button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer">Simpan Insiden</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Waktu Ujian -->
<div id="modal-add-time" class="hidden fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] flex flex-col p-5 sm:p-6 space-y-4 shadow-xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3">
            <h3 class="font-bold text-default-900 text-base">Berikan Tambahan Waktu Ujian</h3>
            <button type="button" onclick="closeAddTimeModal()" class="text-default-400 hover:text-default-600 cursor-pointer text-lg leading-none">&times;</button>
        </div>
        <form id="form-add-time" method="POST" class="space-y-4">
            @csrf
            <div>
                <span class="text-xs text-default-500 block mb-1">Peserta Penerima:</span>
                <strong id="add-time-student-name" class="text-default-800 text-sm block"></strong>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Jumlah Waktu Tambahan (Menit)</label>
                <select name="minutes" required class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="5">5 Menit</option>
                    <option value="10">10 Menit</option>
                    <option value="15" selected>15 Menit</option>
                    <option value="30">30 Menit</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Alasan Penambahan Waktu (Wajib)</label>
                <input type="text" name="reason" required placeholder="Contoh: Gangguan teknis restart PC selama 10 menit" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100">
                <button type="button" onclick="closeAddTimeModal()" class="w-full sm:w-auto px-4 py-2.5 border border-default-200 rounded text-xs font-semibold text-default-700 hover:bg-default-50 transition cursor-pointer">Batal</button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer">Tambahkan Waktu</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hentikan Paksa Ujian -->
<div id="modal-force-stop" class="hidden fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] flex flex-col p-5 sm:p-6 space-y-4 shadow-xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3">
            <h3 class="font-bold text-rose-600 text-base">Hentikan Paksa Percobaan Ujian</h3>
            <button type="button" onclick="closeForceStopModal()" class="text-default-400 hover:text-default-600 cursor-pointer text-lg leading-none">&times;</button>
        </div>
        <form id="form-force-stop" method="POST" class="space-y-4">
            @csrf
            <div class="p-3 bg-rose-50 border border-rose-200 rounded text-xs text-rose-800">
                Peringatan: Tindakan ini akan mengakhiri kesempatan ujian peserta secara permanen dan sah. Jawaban saat ini akan dikunci.
            </div>
            <div>
                <span class="text-xs text-default-500 block mb-1">Nama Peserta:</span>
                <strong id="force-stop-student-name" class="text-default-800 text-sm block"></strong>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Alasan Penghentian (Wajib Diisi)</label>
                <textarea name="reason" rows="2" required placeholder="Contoh: Terbukti melakukan kecurangan mencontek..." class="form-textarea w-full text-xs rounded border-rose-200 focus:border-rose-500 focus:ring-2 focus:ring-rose-200"></textarea>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100">
                <button type="button" onclick="closeForceStopModal()" class="w-full sm:w-auto px-4 py-2.5 border border-default-200 rounded text-xs font-semibold text-default-700 hover:bg-default-50 transition cursor-pointer">Batal</button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer">Hentikan Sekarang</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Reset / Force Logout Sesi Perangkat -->
<div id="modal-force-logout" class="hidden fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] flex flex-col p-5 sm:p-6 space-y-4 shadow-xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3">
            <h3 class="font-bold text-amber-600 text-base">Reset Sesi / Logout Paksa Perangkat</h3>
            <button type="button" onclick="closeForceLogoutModal()" class="text-default-400 hover:text-default-600 cursor-pointer text-lg leading-none">&times;</button>
        </div>
        <form id="form-force-logout" method="POST" class="space-y-4">
            @csrf
            <div class="p-3 bg-amber-50 border border-amber-200 rounded text-xs text-amber-800 leading-relaxed">
                <strong>Catatan Integritas:</strong> Berbeda dengan menghentikan ujian, aksi ini hanya mencabut sesi login perangkat (misal siswa pindah ke komputer lain/rusak). Seluruh jawaban yang tersimpan di PostgreSQL tetap utuh dan siswa dapat login kembali.
            </div>
            <div>
                <span class="text-xs text-default-500 block mb-1">Nama Peserta:</span>
                <strong id="force-logout-student-name" class="text-default-800 text-sm block"></strong>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Alasan Reset Sesi (Wajib Diisi)</label>
                <textarea name="reason" rows="2" required placeholder="Contoh: Komputer klien macet / restart, siswa diarahkan ke komputer cadangan..." class="form-textarea w-full text-xs rounded border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200"></textarea>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100">
                <button type="button" onclick="closeForceLogoutModal()" class="w-full sm:w-auto px-4 py-2.5 border border-default-200 rounded text-xs font-semibold text-default-700 hover:bg-default-50 transition cursor-pointer">Batal</button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer">Reset Sesi Peserta</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tindak Lanjut Insiden (FULL-FEATURE 23.4) -->
<div id="modal-resolve-incident" class="hidden fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] flex flex-col p-5 sm:p-6 space-y-4 shadow-xl border border-default-200 overflow-y-auto">
        <div class="flex items-center justify-between border-b border-default-100 pb-3">
            <h3 class="font-bold text-default-900 text-base">Tindak Lanjuti &amp; Selesaikan Insiden</h3>
            <button type="button" onclick="closeResolveIncidentModal()" class="text-default-400 hover:text-default-600 cursor-pointer text-lg leading-none">&times;</button>
        </div>
        <form id="form-resolve-incident" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')
            <div>
                <span class="text-xs text-default-500 block mb-1">Kode Insiden:</span>
                <strong id="resolve-incident-code" class="text-default-800 font-mono text-sm block"></strong>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Tindakan Mitigasi / Penanganan <span class="text-rose-500">*</span></label>
                <textarea name="action_taken" rows="3" required placeholder="Contoh: Pengawas memberikan instruksi lisan, memeriksa layar peserta, dan mengizinkan melanjutkan ujian..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary"></textarea>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100">
                <button type="button" onclick="closeResolveIncidentModal()" class="w-full sm:w-auto px-4 py-2.5 border border-default-200 rounded text-xs font-semibold text-default-700 hover:bg-default-50 transition cursor-pointer">Batal</button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer">Selesaikan Insiden</button>
            </div>
        </form>
    </div>
</div>

<script>
    const sessionId = {{ $session->id }};
    const feedUrl = document.getElementById('monitoring-root').dataset.feedUrl;

    function openAnnouncementModal() { document.getElementById('modal-announcement').classList.remove('hidden'); }
    function closeAnnouncementModal() { document.getElementById('modal-announcement').classList.add('hidden'); }

    function openStudentWarningModal(studentId, studentName) {
        document.getElementById('warning_target_id').value = studentId;
        document.getElementById('warning_student_name').textContent = studentName;
        document.getElementById('modal-student-warning').classList.remove('hidden');
    }
    function closeStudentWarningModal() {
        document.getElementById('modal-student-warning').classList.add('hidden');
    }
    function setWarningPreset(text) {
        document.getElementById('warning_message').value = text;
    }

    function openIncidentModal() { document.getElementById('modal-incident').classList.remove('hidden'); }
    function closeIncidentModal() { document.getElementById('modal-incident').classList.add('hidden'); }

    function openResolveIncidentModal(incidentId, incidentCode) {
        document.getElementById('resolve-incident-code').textContent = incidentCode;
        document.getElementById('form-resolve-incident').action = `/staff/sessions/${sessionId}/incidents/${incidentId}/resolve`;
        document.getElementById('modal-resolve-incident').classList.remove('hidden');
    }
    function closeResolveIncidentModal() {
        document.getElementById('modal-resolve-incident').classList.add('hidden');
    }

    function openAddTimeModal(attemptId, studentName) {
        document.getElementById('add-time-student-name').textContent = studentName;
        document.getElementById('form-add-time').action = `/staff/sessions/${sessionId}/attempts/${attemptId}/add-time`;
        document.getElementById('modal-add-time').classList.remove('hidden');
    }
    function closeAddTimeModal() { document.getElementById('modal-add-time').classList.add('hidden'); }

    function openForceStopModal(attemptId, studentName) {
        document.getElementById('force-stop-student-name').textContent = studentName;
        document.getElementById('form-force-stop').action = `/staff/sessions/${sessionId}/attempts/${attemptId}/force-stop`;
        document.getElementById('modal-force-stop').classList.remove('hidden');
    }
    function closeForceStopModal() { document.getElementById('modal-force-stop').classList.add('hidden'); }

    function openForceLogoutModal(attemptId, studentName) {
        document.getElementById('force-logout-student-name').textContent = studentName;
        document.getElementById('form-force-logout').action = `/staff/sessions/${sessionId}/attempts/${attemptId}/force-logout`;
        document.getElementById('modal-force-logout').classList.remove('hidden');
    }
    function closeForceLogoutModal() { document.getElementById('modal-force-logout').classList.add('hidden'); }

    function confirmForceRefresh(attemptId, studentName) {
        if (!confirm(`Kirim instruksi muat ulang (reload) layar ujian untuk siswa ${studentName}?`)) return;
        fetch(`/staff/sessions/${sessionId}/attempts/${attemptId}/force-refresh`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ reason: 'Instruksi refresh oleh pengawas ruang.' })
        }).then(r => r.json()).then(data => {
            alert(data.message || 'Instruksi reload terkirim.');
        }).catch(err => alert('Gagal mengirim instruksi reload.'));
    }

    let currentFilter = 'all';
    function setFilter(filter) {
        currentFilter = filter;
        document.querySelectorAll('.filter-btn').forEach(btn => {
            if (btn.dataset.filter === filter) {
                btn.classList.add('bg-slate-900', 'text-white', 'active');
                btn.classList.remove('bg-default-100', 'text-default-700');
            } else {
                btn.classList.remove('bg-slate-900', 'text-white', 'active');
                btn.classList.add('bg-default-100', 'text-default-700');
            }
        });
        filterParticipants();
    }

    function filterParticipants() {
        const query = document.getElementById('search-input').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.participant-card');

        cards.forEach(card => {
            const name = card.dataset.name;
            const seat = card.dataset.seat;
            const status = card.dataset.status;
            const focus = card.dataset.focus;

            let matchesFilter = true;
            if (currentFilter === 'online') matchesFilter = (status === 'online');
            else if (currentFilter === 'offline') matchesFilter = (status === 'offline');
            else if (currentFilter === 'completed') matchesFilter = (status === 'completed');
            else if (currentFilter === 'warning') matchesFilter = (focus === 'blur');

            const matchesSearch = !query || name.includes(query) || seat.includes(query);

            if (matchesFilter && matchesSearch) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    }

    // Polling live telemetry setiap 10 detik
    setInterval(() => {
        fetch(feedUrl, { headers: { 'Accept': 'application/json' } })
            .then(res => res.json())
            .then(data => {
                if (!data || !data.stats) return;
                document.getElementById('stat-total').textContent = data.stats.total_registered;
                document.getElementById('stat-online').textContent = data.stats.online;
                document.getElementById('stat-offline').textContent = data.stats.offline;
                document.getElementById('stat-completed').textContent = data.stats.completed;
                document.getElementById('stat-not-started').textContent = data.stats.not_started;
                document.getElementById('stat-warning').textContent = data.stats.warning_focus;
            })
            .catch(e => console.error('Feed sync error:', e));
    }, 10000);
</script>
@endsection
