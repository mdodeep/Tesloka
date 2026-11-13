@extends('layouts.staff')

@section('title', 'Kelola Sesi — ' . $session->name)
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', $session->name)
@section('page-subtitle', 'Kode: ' . $session->session_code . ' • Ujian: ' . $session->exam->title . ' • Ruang: ' . $session->room->name . ' (Kapasitas: ' . $session->room->capacity . ')')

@section('page-actions')
    <a href="{{ route('staff.sessions.monitor', $session) }}" class="px-3.5 py-2 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        <span>Monitoring</span>
    </a>
    <a href="{{ route('staff.sessions.camera-grid', $session) }}" class="px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
        <span>Kamera Live</span>
    </a>
    <a href="{{ route('staff.sessions.print-attendance', $session) }}" target="_blank" class="px-3 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-medium rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        <span>Daftar Hadir</span>
    </a>
    <a href="{{ route('staff.sessions.print-minutes', $session) }}" target="_blank" class="px-3 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-medium rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
        <span>Berita Acara</span>
    </a>
    @if($session->status === 'scheduled')
        <form action="{{ route('staff.sessions.update-status', $session) }}" method="POST" class="inline">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="active">
            <button type="submit" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Mulai Sesi</span>
            </button>
        </form>
    @elseif($session->status === 'active')
        <form action="{{ route('staff.sessions.update-status', $session) }}" method="POST" class="inline" onsubmit="return confirm('Selesaikan sesi ujian ini?')">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="finished">
            <button type="submit" class="px-3.5 py-2 bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold rounded inline-flex items-center gap-1.5 shadow-xs transition cursor-pointer">
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"/></svg>
                <span>Selesaikan Sesi</span>
            </button>
        </form>
    @endif
@endsection

@section('content')
<div class="space-y-6 w-full">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Kiri: Token Rilis Ujian & Pengawas Ruang -->
        <div class="space-y-6">
            <!-- Token Rilis Box -->
            <x-cbt.card title="Token Rilis Ujian">
                <div class="text-center p-4 bg-amber-50/60 border border-amber-200/80 rounded space-y-2.5">
                    <div class="text-[11px] font-bold text-amber-800 uppercase tracking-wider">Token Akses Peserta</div>
                    <div class="text-4xl font-extrabold font-mono tracking-widest text-amber-950 py-1 bg-white/80 rounded-lg border border-amber-200/60 inline-block px-6">
                        {{ $session->token ?? '------' }}
                    </div>
                    <p class="text-[11px] text-amber-700 leading-relaxed">Berikan token ini kepada peserta di ruang ujian saat ujian siap dimulai.</p>

                    <div class="flex items-center justify-center gap-2 pt-1 flex-wrap">
                        <form action="{{ route('staff.sessions.generate-token', $session) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-3.5 py-1.5 bg-amber-200/80 hover:bg-amber-300 text-amber-900 text-xs font-semibold rounded-lg inline-flex items-center gap-1.5 transition cursor-pointer">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                <span>Segarkan Token</span>
                            </button>
                        </form>

                        <form action="{{ route('staff.sessions.notify-participants', $session) }}" method="POST" onsubmit="return confirm('Kirimkan email notifikasi jadwal dan token ujian ke {{ $session->participants->count() }} peserta sesi ini?')">
                            @csrf
                            <button type="submit" class="px-3.5 py-1.5 bg-primary/10 hover:bg-primary/20 text-primary text-xs font-semibold rounded-lg inline-flex items-center gap-1.5 transition cursor-pointer" title="Kirim email jadwal dan token ujian ke semua peserta sesi">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <span>Kirim Token ke Peserta</span>
                            </button>
                        </form>
                    </div>
                </div>
            </x-cbt.card>

            <!-- Pengawas Ruang Ujian (Tailwick Clean Form & Roster) -->
            <x-cbt.card title="Pengawas Ruang Ujian">
                <x-slot:actions>
                    <span class="px-2.5 py-1 bg-primary/10 text-primary font-bold text-[11px] rounded-lg">
                        {{ $session->proctors->count() }} Pengawas
                    </span>
                </x-slot:actions>

                <form action="{{ route('staff.sessions.proctors.store', $session) }}" method="POST" class="space-y-3 mb-5 pb-5 border-b border-default-100">
                    @csrf
                    <div>
                        <label for="proctor_id_select" class="block text-[11px] font-bold uppercase tracking-wider text-default-600 mb-1.5">
                            Pilih Guru / Staf Pengawas
                        </label>
                        <select id="proctor_id_select" name="proctor_id" class="form-select w-full text-xs h-10 rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                            <option value="">-- Pilih Guru / Pengawas --</option>
                            @foreach($staffMembers as $stf)
                                <option value="{{ $stf->id }}">{{ $stf->name }} ({{ $stf->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="proctor_role_select" class="block text-[11px] font-bold uppercase tracking-wider text-default-600 mb-1.5">
                            Peran Pengawasan
                        </label>
                        <select id="proctor_role_select" name="role_title" class="form-select w-full text-xs h-10 rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                            <option value="Pengawas Ruang">Pengawas Ruang</option>
                            <option value="Pengawas Utama">Pengawas Utama</option>
                            <option value="Pengawas Pendamping">Pengawas Pendamping</option>
                            <option value="Proktor CBT">Proktor CBT</option>
                            <option value="Teknisi IT">Teknisi IT</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full h-10 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded inline-flex items-center justify-center gap-2 shadow-xs transition cursor-pointer">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                        <span>Tugaskan Pengawas</span>
                    </button>
                </form>

                <div class="space-y-2.5">
                    <div class="text-[11px] font-bold uppercase tracking-wider text-default-400 mb-2">Daftar Pengawas Ditugaskan</div>
                    @forelse($session->proctors as $prc)
                        <div class="p-3 bg-default-50/70 hover:bg-default-50 border border-default-200 rounded flex items-center justify-between text-xs transition">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="size-8 rounded-full bg-primary/10 text-primary font-bold text-xs flex items-center justify-center shrink-0">
                                    {{ strtoupper(substr($prc->proctor->name, 0, 1)) }}
                                </div>
                                <div class="truncate">
                                    <strong class="text-default-800 block font-semibold truncate">{{ $prc->proctor->name }}</strong>
                                    <div class="flex items-center gap-1.5 mt-0.5">
                                        <span class="px-1.5 py-0.2 rounded text-[10px] font-medium bg-white border border-default-200 text-default-600">{{ $prc->role_title }}</span>
                                        <span class="text-default-400 text-[10px] truncate">{{ $prc->proctor->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('staff.sessions.proctors.destroy', $prc) }}" method="POST" onsubmit="return confirm('Hapus pengawas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-default-400 hover:text-rose-600 hover:bg-rose-50 p-1.5 rounded-lg transition cursor-pointer" title="Hapus Pengawas">
                                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="text-center py-6 px-4 border border-dashed border-default-200 rounded bg-default-50/50">
                            <svg class="size-8 text-slate-300 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            <p class="text-xs text-default-600 font-semibold">Belum ada pengawas ditugaskan</p>
                            <p class="text-[11px] text-default-400 mt-0.5">Pilih guru atau staf di atas untuk menetapkan proktor ruangan.</p>
                        </div>
                    @endforelse
                </div>
            </x-cbt.card>
        </div>

        <!-- Kolom Tengah & Kanan: Manajemen Peserta & Kapasitas DEC-001 -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Capacity & Allocation Bar -->
            <x-cbt.card title="Kapasitas Ruang & Penugasan Peserta">
                @php
                    $count = $session->participants->count();
                    $cap = $session->room->capacity;
                    $percent = $cap > 0 ? min(100, round(($count / $cap) * 100)) : 0;
                @endphp
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-semibold text-default-700">Kapasitas Ruang Terisi (Maksimal 30 Peserta per DEC-001):</span>
                        <span class="font-bold {{ $count >= $cap ? 'text-amber-600' : 'text-default-800' }}">
                            {{ $count }} / {{ $cap }} Peserta ({{ $percent }}%)
                        </span>
                    </div>
                    <div class="w-full bg-default-100 rounded-full h-2.5 overflow-hidden">
                        <div class="h-2.5 rounded-full {{ $count >= $cap ? 'bg-amber-500' : 'bg-primary' }}" style="width: {{ $percent }}%"></div>
                    </div>

                    <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                        <button type="button" onclick="document.getElementById('assignClassModal').classList.remove('hidden')" class="w-full sm:w-auto px-3.5 py-2.5 sm:py-2 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                            <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            <span>Tugaskan Rombel / Kelas</span>
                        </button>
                        <button type="button" onclick="document.getElementById('assignStudentModal').classList.remove('hidden')" class="w-full sm:w-auto px-3.5 py-2.5 sm:py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold text-xs rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition">
                            <svg class="size-4 text-default-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            <span>Tambah Siswa Individual</span>
                        </button>
                    </div>
                </div>
            </x-cbt.card>

            <!-- Table of Enrolled Participants -->
            <x-cbt.card title="Daftar Peserta Ujian">
                <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                    <table class="w-full min-w-[760px] text-left text-xs text-default-600">
                        <thead class="bg-default-50 font-semibold text-default-500 border-b border-default-200 uppercase text-[11px]">
                            <tr>
                                <th class="py-3 px-3.5 whitespace-nowrap">No. Kursi</th>
                                <th class="py-3 px-3.5 whitespace-nowrap">Nama Siswa / NISN</th>
                                <th class="py-3 px-3.5 whitespace-nowrap">Paket Soal</th>
                                <th class="py-3 px-3.5 text-center whitespace-nowrap">Kehadiran</th>
                                <th class="py-3 px-3.5 text-right whitespace-nowrap">Ubah Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($session->participants as $ptc)
                                <tr class="hover:bg-default-50/80 transition-colors">
                                    <td class="py-3 px-3.5 whitespace-nowrap">
                                        <span class="inline-block px-2.5 py-1 bg-default-100 font-mono font-bold text-default-800 rounded-lg text-xs whitespace-nowrap">
                                            {{ $ptc->seat_number ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-3.5 whitespace-nowrap">
                                        <div class="flex items-center gap-2.5">
                                            <img src="{{ $ptc->student->photo_url }}" alt="{{ $ptc->student->name }}" class="size-7 rounded-full object-cover border border-default-200 shrink-0">
                                            <div>
                                                <strong class="text-default-800 block text-xs font-semibold whitespace-nowrap">{{ $ptc->student->name }}</strong>
                                                <span class="text-[11px] text-default-400 font-mono whitespace-nowrap">{{ $ptc->student->identity_number ?? $ptc->student->username }}</span>
                                            </div>
                                        </div>
                                        @if(($ptc->time_extension_percent ?? 0) > 0 || ($ptc->needs_scribe ?? false))
                                            <div class="flex items-center gap-1.5 mt-0.5 flex-wrap whitespace-nowrap">
                                                @if(($ptc->time_extension_percent ?? 0) > 0)
                                                    <span class="px-1.5 py-0.2 bg-blue-50 text-blue-700 text-[10px] font-bold rounded border border-blue-200 whitespace-nowrap" title="Akomodasi tambahan waktu">
                                                        +{{ $ptc->time_extension_percent }}% Waktu
                                                    </span>
                                                @endif
                                                @if($ptc->needs_scribe ?? false)
                                                    <span class="px-1.5 py-0.2 bg-amber-50 text-amber-700 text-[10px] font-bold rounded border border-amber-200 whitespace-nowrap" title="Didampingi Scribe resmi">
                                                        Scribe: {{ $ptc->scribe_name ?? 'Ada' }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                    <td class="py-3 px-3.5 whitespace-nowrap">
                                        <span class="inline-block px-2.5 py-1 bg-purple-50 text-purple-700 font-semibold rounded-full text-[11px] border border-purple-200/60 whitespace-nowrap">
                                            {{ $ptc->package->name ?? 'Paket Default' }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-3.5 text-center whitespace-nowrap">
                                        @if($ptc->status === 'checked_in')
                                            <span class="inline-block px-2.5 py-0.5 bg-emerald-50 text-emerald-700 font-semibold rounded-full text-[11px] border border-emerald-200/60 whitespace-nowrap">Hadir</span>
                                        @elseif($ptc->status === 'absent')
                                            <span class="inline-block px-2.5 py-0.5 bg-rose-50 text-rose-700 font-semibold rounded-full text-[11px] border border-rose-200/60 whitespace-nowrap">Tidak Hadir</span>
                                        @else
                                            <span class="inline-block px-2.5 py-0.5 bg-default-100 text-default-600 rounded-full text-[11px] border border-default-200 whitespace-nowrap">Terdaftar</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-3.5 text-right whitespace-nowrap">
                                        <div class="inline-flex items-center gap-1.5 whitespace-nowrap">
                                            <button type="button" onclick="openAccommodationModal({{ $ptc->id }}, '{{ addslashes($ptc->student->name) }}', {{ $ptc->time_extension_percent ?? 0 }}, {{ $ptc->needs_scribe ? 'true' : 'false' }}, '{{ addslashes($ptc->scribe_name ?? '') }}', '{{ addslashes($ptc->scribe_nik ?? '') }}', '{{ addslashes($ptc->scribe_phone ?? '') }}', '{{ addslashes($ptc->scribe_pledge ?? '') }}', '{{ addslashes($ptc->accommodation_notes ?? ($ptc->accommodations['notes'] ?? '')) }}')" class="p-1.5 text-default-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition" title="Atur Akomodasi Disabilitas & Scribe">
                                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                            </button>
                                            <form action="{{ route('staff.sessions.participants.attendance', $ptc) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="checked_in">
                                                <button type="submit" class="px-2.5 py-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 rounded-lg text-[11px] font-semibold border border-emerald-200/60 transition" title="Tandai Hadir">
                                                    Hadir
                                                </button>
                                            </form>
                                            <form action="{{ route('staff.sessions.participants.attendance', $ptc) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="absent">
                                                <button type="submit" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-lg text-[11px] font-semibold border border-rose-200/60 transition" title="Tandai Absen">
                                                    Absen
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-default-400">
                                        Belum ada peserta yang ditugaskan ke sesi ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-cbt.card>
        </div>
    </div>
</div>

<!-- Modal Tugaskan Kelas / Rombel -->
<div id="assignClassModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs hidden p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] flex flex-col shadow-2xl border border-default-200 animate-in fade-in zoom-in-95 duration-150">
        <div class="flex items-center justify-between border-b border-default-100 p-4 sm:p-5 shrink-0">
            <h3 class="text-sm font-bold text-default-800">Tugaskan Rombongan Belajar (Kelas)</h3>
            <button type="button" onclick="document.getElementById('assignClassModal').classList.add('hidden')" class="p-1 rounded text-default-400 hover:text-default-600 hover:bg-default-100 transition cursor-pointer">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form action="{{ route('staff.sessions.assign-class', $session) }}" method="POST" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            <div>
                <label for="modal_academic_class_id" class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">Pilih Kelas Sasaran *</label>
                <select id="modal_academic_class_id" name="academic_class_id" class="form-select w-full text-xs h-10 rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($classes as $cls)
                        <option value="{{ $cls->id }}">
                            {{ $cls->name }} ({{ $cls->code }}) - {{ $cls->enrollments_count }} Siswa
                        </option>
                    @endforeach
                </select>
                <p class="text-[11px] text-default-400 mt-1.5 leading-relaxed">Sistem otomatis mendistribusikan varian paket soal secara bergantian (A, B, C...) dan mengalokasikan nomor kursi.</p>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-2 border-t border-default-100">
                <button type="button" onclick="document.getElementById('assignClassModal').classList.add('hidden')" class="w-full sm:w-auto px-4 py-2 bg-default-100 hover:bg-slate-200 text-default-700 text-xs font-medium rounded transition">
                    Batal
                </button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2 bg-primary hover:bg-primary-hover text-white text-xs font-bold rounded shadow-xs transition">
                    Tugaskan Siswa Kelas
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Siswa Individual -->
<div id="assignStudentModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs hidden p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] flex flex-col shadow-2xl border border-default-200 animate-in fade-in zoom-in-95 duration-150">
        <div class="flex items-center justify-between border-b border-default-100 p-4 sm:p-5 shrink-0">
            <h3 class="text-sm font-bold text-default-800">Tambah Peserta Individual</h3>
            <button type="button" onclick="document.getElementById('assignStudentModal').classList.add('hidden')" class="p-1 rounded text-default-400 hover:text-default-600 hover:bg-default-100 transition cursor-pointer">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form action="{{ route('staff.sessions.assign-student', $session) }}" method="POST" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            <div>
                <label for="modal_student_id" class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">Pilih Siswa *</label>
                <select id="modal_student_id" name="student_id" class="form-select w-full text-xs h-10 rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($students as $std)
                        <option value="{{ $std->id }}">{{ $std->name }} ({{ $std->identity_number ?? $std->username }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="modal_exam_package_id" class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1.5">Pilih Paket Soal (Opsional)</label>
                <select id="modal_exam_package_id" name="exam_package_id" class="form-select w-full text-xs h-10 rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">-- Otomatis Paket Pertama / Acak --</option>
                    @foreach($session->exam->packages as $pkg)
                        <option value="{{ $pkg->id }}">{{ $pkg->name }} ({{ $pkg->package_code }})</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-2 border-t border-default-100">
                <button type="button" onclick="document.getElementById('assignStudentModal').classList.add('hidden')" class="w-full sm:w-auto px-4 py-2 bg-default-100 hover:bg-slate-200 text-default-700 text-xs font-medium rounded transition">
                    Batal
                </button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2 bg-primary hover:bg-primary-hover text-white text-xs font-bold rounded shadow-xs transition">
                    Tambahkan Peserta
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Akomodasi Khusus & Scribe -->
<div id="accommodationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs hidden p-3 sm:p-4">
    <div class="bg-white rounded-lg max-w-md w-full max-h-[90vh] flex flex-col shadow-2xl border border-default-200 animate-in fade-in zoom-in-95 duration-150">
        <div class="flex items-center justify-between border-b border-default-100 p-4 sm:p-5 shrink-0">
            <div>
                <h3 class="text-sm font-bold text-default-800">Akomodasi Khusus & Pendamping (Scribe)</h3>
                <p id="accomStudentName" class="text-[11px] text-default-400 mt-0.5 font-medium"></p>
            </div>
            <button type="button" onclick="document.getElementById('accommodationModal').classList.add('hidden')" class="p-1 rounded text-default-400 hover:text-default-600 hover:bg-default-100 transition cursor-pointer">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form id="accommodationForm" method="POST" class="p-4 sm:p-5 space-y-4 overflow-y-auto">
            @csrf
            @method('PATCH')
            <div>
                <label for="modal_time_extension" class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">
                    Tambahan Waktu Otomatis (%)
                </label>
                <div class="flex items-center gap-2">
                    <input type="number" id="modal_time_extension" name="time_extension_percent" min="0" max="200" step="5" class="form-input w-28 text-xs h-10 rounded border-default-200 bg-white" placeholder="0">
                    <span class="text-xs text-default-500 font-semibold">% dari durasi ujian standar</span>
                </div>
                <p class="text-[11px] text-default-400 mt-1">Contoh: +25% atau +50% waktu pengerjaan otomatis terhitung di timer server.</p>
            </div>

            <div class="space-y-2 pt-2 border-t border-default-100">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="modal_needs_scribe" name="needs_scribe" value="1" onchange="document.getElementById('scribeDetailsBox').classList.toggle('hidden', !this.checked)" class="rounded text-primary focus:ring-primary">
                    <span class="text-xs font-semibold text-default-800">Peserta Didampingi Scribe / Juru Tulis Resmi</span>
                </label>

                <div id="scribeDetailsBox" class="hidden pl-6 space-y-2 pt-1">
                    <div>
                        <label for="modal_scribe_name" class="block text-[11px] font-semibold text-default-600 mb-1">Nama Petugas Pendamping (Scribe) *</label>
                        <input type="text" id="modal_scribe_name" name="scribe_name" class="form-input w-full text-xs h-9 rounded border-default-200 bg-white" placeholder="Nama lengkap petugas scribe">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div class="min-w-0">
                            <label for="modal_scribe_nik" class="block text-[11px] font-semibold text-default-600 mb-1">NIK / Identitas Scribe</label>
                            <input type="text" id="modal_scribe_nik" name="scribe_nik" class="form-input w-full text-xs rounded border-default-200 bg-white" placeholder="16 digit NIK">
                        </div>
                        <div class="min-w-0">
                            <label for="modal_scribe_phone" class="block text-[11px] font-semibold text-default-600 mb-1">Nomor WhatsApp / HP</label>
                            <input type="text" id="modal_scribe_phone" name="scribe_phone" class="form-input w-full text-xs rounded border-default-200 bg-white" placeholder="+62...">
                        </div>
                    </div>
                    <div>
                        <label for="modal_scribe_pledge" class="block text-[11px] font-semibold text-default-600 mb-1">Pernyataan Pakta Integritas Scribe</label>
                        <textarea id="modal_scribe_pledge" name="scribe_pledge" rows="2" class="form-textarea w-full text-xs rounded border-default-200 bg-white" placeholder="Scribe bertindak murni membantu teknis motorik/penulisan jawaban tanpa intervensi isi jawaban..."></textarea>
                    </div>
                </div>
            </div>

            <div>
                <label for="modal_accommodations" class="block text-xs font-semibold text-default-700 uppercase tracking-wider mb-1">Catatan Kebutuhan Khusus / Diagnosa</label>
                <textarea id="modal_accommodations" name="accommodations" rows="2" class="form-textarea w-full text-xs rounded border-default-200 bg-white" placeholder="Contoh: Gangguan motorik halus tangan kanan, pembesaran font soal disleksia..."></textarea>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-2 border-t border-default-100">
                <button type="button" onclick="document.getElementById('accommodationModal').classList.add('hidden')" class="w-full sm:w-auto px-4 py-2 bg-default-100 hover:bg-slate-200 text-default-700 text-xs font-medium rounded transition">
                    Batal
                </button>
                <button type="submit" class="w-full sm:w-auto px-5 py-2 bg-primary hover:bg-primary-hover text-white text-xs font-bold rounded shadow-xs transition">
                    Simpan Akomodasi
                </button>
            </div>
        </form>
    </div>
</div>
        </form>
    </div>
</div>

<script>
    function openAccommodationModal(participantId, studentName, timePercent, needsScribe, scribeName, scribeNik, scribePhone, scribePledge, notes) {
        document.getElementById('accomStudentName').textContent = 'Siswa: ' + studentName;
        document.getElementById('modal_time_extension').value = timePercent;
        const scribeCheckbox = document.getElementById('modal_needs_scribe');
        scribeCheckbox.checked = needsScribe;
        document.getElementById('scribeDetailsBox').classList.toggle('hidden', !needsScribe);
        document.getElementById('modal_scribe_name').value = scribeName || '';
        document.getElementById('modal_scribe_nik').value = scribeNik || '';
        document.getElementById('modal_scribe_phone').value = scribePhone || '';
        document.getElementById('modal_scribe_pledge').value = scribePledge || '';
        document.getElementById('modal_accommodations').value = notes || '';

        const form = document.getElementById('accommodationForm');
        form.action = `/staff/sessions/participants/${participantId}/accommodation`;

        document.getElementById('accommodationModal').classList.remove('hidden');
    }
</script>
@endsection
