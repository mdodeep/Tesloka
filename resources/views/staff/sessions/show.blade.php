@extends('layouts.staff')

@section('title', 'Kelola Sesi : ' . $session->name)
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', $session->name)
@section('page-subtitle', 'Kode: ' . $session->session_code . ' • Ujian: ' . $session->exam->title . ' • ' . ($session->isOnline() ? 'Pelaksanaan: Daring (Online CBT)' : ('Ruang: ' . ($session->room->name ?? 'Lab CBT') . ' (Kapasitas: ' . ($session->room->capacity ?? 30) . ')')))

@section('page-actions')
    <a href="{{ route('staff.sessions.edit', $session) }}" class="btn btn-sm bg-white hover:bg-amber-50 text-default-700 hover:text-amber-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition" title="Ubah Jadwal &amp; Ruang Sesi">
        <i data-lucide="edit" class="size-4"></i>
        <span>Edit Sesi</span>
    </a>
    <a href="{{ route('staff.sessions.monitor', $session) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center gap-1.5 shadow-2xs transition" title="Monitoring Pelaksanaan">
        <i data-lucide="bar-chart-2" class="size-4"></i>
        <span>Monitoring</span>
    </a>
    <a href="{{ route('staff.sessions.camera-grid', $session) }}" class="btn btn-sm bg-slate-900 hover:bg-slate-800 text-white font-semibold inline-flex items-center gap-1.5 shadow-2xs transition" title="Grid Kamera Live Siswa">
        <i data-lucide="video" class="size-4 text-rose-400"></i>
        <span>Kamera Live</span>
    </a>

    <!-- Dropdown Menu Cetak Dokumen Administrasi -->
    <div class="relative inline-block text-left" id="sessionDocDropdownContainer">
        <button type="button" onclick="toggleSessionDocDropdown()" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition cursor-pointer">
            <i data-lucide="printer" class="size-4 text-default-500"></i>
            <span>Cetak Dokumen Sesi</span>
            <i data-lucide="chevron-down" class="size-3.5 text-default-400"></i>
        </button>

        <div id="sessionDocDropdownMenu" class="hidden absolute right-0 mt-2 w-64 bg-white border border-default-200 rounded-md shadow-lg z-50 py-1 divide-y divide-default-100">
            <div class="py-1">
                <a href="{{ route('staff.sessions.print-cards', $session) }}" target="_blank" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                    <i data-lucide="credit-card" class="size-4 text-indigo-500"></i>
                    <div>
                        <div class="font-semibold">Kartu Peserta Ujian</div>
                        <div class="text-[10px] text-default-400">Format A4 (Grid 4 kartu per lembar)</div>
                    </div>
                </a>
                <a href="{{ route('staff.sessions.print-desk-labels', $session) }}" target="_blank" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                    <i data-lucide="tag" class="size-4 text-amber-500"></i>
                    <div>
                        <div class="font-semibold">Tempelan / Label Meja Lab</div>
                        <div class="text-[10px] text-default-400">Label nomor meja &amp; QR login peserta</div>
                    </div>
                </a>
                <a href="{{ route('staff.sessions.print-attendance', $session) }}" target="_blank" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                    <i data-lucide="clipboard-list" class="size-4 text-emerald-500"></i>
                    <div>
                        <div class="font-semibold">Daftar Hadir Peserta</div>
                        <div class="text-[10px] text-default-400">Lembar presensi &amp; tanda tangan kehadiran</div>
                    </div>
                </a>
            </div>
            <div class="py-1">
                <a href="{{ route('staff.sessions.print-minutes', $session) }}" target="_blank" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                    <i data-lucide="file-check-2" class="size-4 text-blue-500"></i>
                    <div>
                        <div class="font-semibold">Berita Acara Pelaksanaan</div>
                        <div class="text-[10px] text-default-400">Format resmi Berita Acara ruang ujian</div>
                    </div>
                </a>
                <a href="{{ route('staff.sessions.print-proctor-duties', $session) }}" target="_blank" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                    <i data-lucide="file-text" class="size-4 text-purple-500"></i>
                    <div>
                        <div class="font-semibold">Surat Tugas Pengawas</div>
                        <div class="text-[10px] text-default-400">Surat penugasan kepala institusi</div>
                    </div>
                </a>
                <a href="{{ route('staff.sessions.print-integrity-pledge', $session) }}" target="_blank" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                    <i data-lucide="shield" class="size-4 text-rose-500"></i>
                    <div>
                        <div class="font-semibold">Pakta Integritas Pengawas</div>
                        <div class="text-[10px] text-default-400">Lembar komitmen integritas pengawas</div>
                    </div>
                </a>
                <a href="{{ route('staff.sessions.print-proctoring-summary', $session) }}" target="_blank" class="flex items-center gap-2.5 px-3.5 py-2 text-xs text-default-700 hover:bg-default-50 hover:text-primary transition">
                    <i data-lucide="bar-chart" class="size-4 text-slate-500"></i>
                    <div>
                        <div class="font-semibold">Rekapitulasi Pengawasan</div>
                        <div class="text-[10px] text-default-400">Rekap status peserta &amp; insiden</div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    @if($session->status === 'scheduled')
        <form action="{{ route('staff.sessions.update-status', $session) }}" method="POST" class="inline">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="active">
            <button type="submit" class="btn btn-sm bg-success hover:bg-success-hover text-white font-semibold inline-flex items-center gap-1.5 shadow-2xs transition cursor-pointer">
                <i data-lucide="play" class="size-4"></i>
                <span>Mulai Sesi</span>
            </button>
        </form>
    @elseif($session->status === 'active')
        <form action="{{ route('staff.sessions.update-status', $session) }}" method="POST" class="inline" onsubmit="return confirm('Selesaikan sesi ujian ini?')">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="finished">
            <button type="submit" class="btn btn-sm bg-slate-900 hover:bg-slate-800 text-white font-semibold inline-flex items-center gap-1.5 shadow-2xs transition cursor-pointer">
                <i data-lucide="square" class="size-4 text-amber-400"></i>
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
                            <button type="submit" class="btn btn-sm bg-amber-100 hover:bg-amber-200 text-amber-900 font-semibold inline-flex items-center gap-1.5 transition cursor-pointer">
                                <i data-lucide="refresh-cw" class="size-3.5"></i>
                                <span>Segarkan Token</span>
                            </button>
                        </form>

                        <form action="{{ route('staff.sessions.notify-participants', $session) }}" method="POST" onsubmit="return confirm('Kirimkan email notifikasi jadwal dan token ujian ke {{ $session->participants->count() }} peserta sesi ini?')">
                            @csrf
                            <button type="submit" class="btn btn-sm bg-primary/10 hover:bg-primary/20 text-primary font-semibold inline-flex items-center gap-1.5 transition cursor-pointer" title="Kirim email jadwal dan token ujian ke semua peserta sesi">
                                <i data-lucide="send" class="size-3.5"></i>
                                <span>Kirim Token ke Peserta</span>
                            </button>
                        </form>
                    </div>
                </div>
            </x-cbt.card>

            <!-- Pengawas Ruang Ujian (Clean Form & Roster) -->
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
                        <div class="mt-2 p-2.5 rounded-lg bg-default-50 border border-default-200 text-[11px] text-default-600 space-y-1 leading-relaxed">
                            <div><strong class="text-default-800">Pengawas Utama:</strong> Koordinator pengawas di ruang ujian dan penandatangan utama Berita Acara, Daftar Hadir, serta Rekapitulasi Pengawasan.</div>
                            <div><strong class="text-default-800">Pengawas Ruang / Pendamping:</strong> Pengawas operasional tata tertib &amp; pemantau layar peserta di ruangan (namanya tetap tercetak di Surat Tugas &amp; Pakta Integritas).</div>
                            <div><strong class="text-default-800">Teknisi IT / Proktor CBT:</strong> Penanggung jawab perangkat jaringan lab dan penandatangan sisi teknis pada Rekapitulasi Pengawasan Ruang.</div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center justify-center gap-2 shadow-2xs transition cursor-pointer w-full">
                        <i data-lucide="user-plus" class="size-4"></i>
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
                                <button type="submit" class="text-default-400 hover:text-danger hover:bg-danger/10 p-1.5 rounded transition cursor-pointer" title="Hapus Pengawas">
                                    <i data-lucide="trash-2" class="size-4"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="text-center py-6 px-4 border border-dashed border-default-200 rounded bg-default-50/50">
                            <i data-lucide="users" class="size-8 text-slate-300 mx-auto mb-2"></i>
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
                    $isOnline = $session->isOnline() || ! $session->exam_room_id;
                    $cap = $isOnline ? 1000 : ($session->room->capacity ?? 30);
                    $percent = $cap > 0 ? min(100, round(($count / $cap) * 100)) : 0;
                @endphp
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-semibold text-default-700">
                            @if($isOnline)
                                <span class="inline-flex items-center gap-1 text-teal-700 font-bold">
                                    <i data-lucide="globe" class="size-3.5"></i> Sesi Pelaksanaan Daring (Online CBT)
                                </span>
                            @else
                                Kapasitas Ruang Terisi (Maksimal 30 Peserta per DEC-001):
                            @endif
                        </span>
                        <span class="font-bold {{ (!$isOnline && $count >= $cap) ? 'text-amber-600' : 'text-default-800' }}">
                            @if($isOnline)
                                {{ $count }} Peserta Terdaftar (Daring / Fleksibel)
                            @else
                                {{ $count }} / {{ $cap }} Peserta ({{ $percent }}%)
                            @endif
                        </span>
                    </div>
                    @if(! $isOnline)
                        <div class="w-full bg-default-100 rounded-full h-2.5 overflow-hidden">
                            <div class="h-2.5 rounded-full {{ $count >= $cap ? 'bg-amber-500' : 'bg-primary' }}" style="width: {{ $percent }}%"></div>
                        </div>
                    @endif

                    <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                        <button type="button" onclick="document.getElementById('assignClassModal').classList.remove('hidden')" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center justify-center gap-1.5 shadow-2xs transition w-full sm:w-auto">
                            <i data-lucide="users" class="size-4 shrink-0"></i>
                            <span>Tugaskan Rombel / Kelas</span>
                        </button>
                        <button type="button" onclick="document.getElementById('assignStudentModal').classList.remove('hidden')" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center justify-center gap-1.5 shadow-2xs transition w-full sm:w-auto">
                            <i data-lucide="user-plus" class="size-4 text-default-500 shrink-0"></i>
                            <span>Tambah Siswa Individual</span>
                        </button>
                    </div>
                </div>
            </x-cbt.card>

            <!-- Table of Enrolled Participants -->
            <x-cbt.card flush title="Daftar Peserta Ujian">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[760px] divide-y divide-default-200/80 text-left text-xs text-default-600">
                        <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                            <tr>
                                <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">No. Kursi</th>
                                <th class="px-3 py-3 whitespace-nowrap">Nama Siswa / NISN</th>
                                <th class="px-3 py-3 whitespace-nowrap">Paket Soal</th>
                                <th class="px-3 py-3 text-center whitespace-nowrap">Kehadiran</th>
                                <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Ubah Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-default-200/70">
                            @forelse($session->participants as $ptc)
                                <tr class="hover:bg-default-50/80 transition-colors">
                                    <td class="ps-4 sm:ps-6 pe-3 py-3.5 whitespace-nowrap">
                                        <span class="inline-block px-2.5 py-1 bg-default-100 font-mono font-bold text-default-800 rounded-lg text-xs whitespace-nowrap">
                                            {{ $ptc->seat_number ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-3.5 whitespace-nowrap">
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
                                    <td class="px-3 py-3.5 whitespace-nowrap">
                                        <span class="inline-block px-2.5 py-1 bg-purple-50 text-purple-700 font-semibold rounded-full text-[11px] border border-purple-200/60 whitespace-nowrap">
                                            {{ $ptc->package->name ?? 'Paket Default' }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                        @if($ptc->status === 'checked_in')
                                            <span class="inline-block px-2.5 py-0.5 bg-emerald-50 text-emerald-700 font-semibold rounded-full text-[11px] border border-emerald-200/60 whitespace-nowrap">Hadir</span>
                                        @elseif($ptc->status === 'absent')
                                            <span class="inline-block px-2.5 py-0.5 bg-rose-50 text-rose-700 font-semibold rounded-full text-[11px] border border-rose-200/60 whitespace-nowrap">Tidak Hadir</span>
                                        @else
                                            <span class="inline-block px-2.5 py-0.5 bg-default-100 text-default-600 rounded-full text-[11px] border border-default-200 whitespace-nowrap">Terdaftar</span>
                                        @endif
                                    </td>
                                    <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right whitespace-nowrap">
                                        <div class="inline-flex items-center gap-1.5 whitespace-nowrap">
                                            <button type="button" onclick="openAccommodationModal({{ $ptc->id }}, '{{ addslashes($ptc->student->name) }}', {{ $ptc->time_extension_percent ?? 0 }}, {{ $ptc->needs_scribe ? 'true' : 'false' }}, '{{ addslashes($ptc->scribe_name ?? '') }}', '{{ addslashes($ptc->scribe_nik ?? '') }}', '{{ addslashes($ptc->scribe_phone ?? '') }}', '{{ addslashes($ptc->scribe_pledge ?? '') }}', '{{ addslashes($ptc->accommodation_notes ?? ($ptc->accommodations['notes'] ?? '')) }}')" class="btn btn-sm btn-icon bg-default-100 hover:bg-primary-50 text-default-500 hover:text-primary rounded-md transition" title="Atur Akomodasi Disabilitas & Scribe">
                                                <i data-lucide="user-check" class="size-4"></i>
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
                                            <form action="{{ route('staff.sessions.participants.destroy', $ptc) }}" method="POST" class="inline" onsubmit="return confirm('Keluarkan {{ addslashes($ptc->student->name) }} dari sesi ujian ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-icon bg-default-100 hover:bg-rose-100 text-default-500 hover:text-rose-700 rounded-md transition cursor-pointer" title="Keluarkan Peserta dari Sesi">
                                                    <i data-lucide="trash-2" class="size-3.5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-0">
                                        <x-cbt.empty-state :bordered="false" title="Belum Ada Peserta" message="Belum ada peserta yang ditugaskan ke sesi ini." />
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
<div id="assignClassModal" class="fixed inset-0 z-50 flex items-center justify-center bg-default-900/50 backdrop-blur-xs hidden p-3 sm:p-4">
    <div class="card max-w-md w-full max-h-[90vh] flex flex-col p-4 sm:p-5 shadow-2xl animate-in fade-in zoom-in-95 duration-150">
        <div class="flex items-center justify-between border-b border-default-200 pb-3 shrink-0">
            <h3 class="text-sm font-bold text-default-800">Tugaskan Rombongan Belajar (Kelas)</h3>
            <button type="button" onclick="document.getElementById('assignClassModal').classList.add('hidden')" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-500 rounded-md transition cursor-pointer">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>
        <form action="{{ route('staff.sessions.assign-class', $session) }}" method="POST" class="pt-4 space-y-4 overflow-y-auto">
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
                <button type="button" onclick="document.getElementById('assignClassModal').classList.add('hidden')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs">
                    Tugaskan Siswa Kelas
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Siswa Individual -->
<div id="assignStudentModal" class="fixed inset-0 z-50 flex items-center justify-center bg-default-900/50 backdrop-blur-xs hidden p-3 sm:p-4">
    <div class="card max-w-md w-full max-h-[90vh] flex flex-col p-4 sm:p-5 shadow-2xl animate-in fade-in zoom-in-95 duration-150">
        <div class="flex items-center justify-between border-b border-default-200 pb-3 shrink-0">
            <h3 class="text-sm font-bold text-default-800">Tambah Peserta Individual</h3>
            <button type="button" onclick="document.getElementById('assignStudentModal').classList.add('hidden')" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-500 rounded-md transition cursor-pointer">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>
        <form action="{{ route('staff.sessions.assign-student', $session) }}" method="POST" class="pt-4 space-y-4 overflow-y-auto">
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
                <button type="button" onclick="document.getElementById('assignStudentModal').classList.add('hidden')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs">
                    Tambahkan Peserta
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Akomodasi Khusus & Scribe -->
<div id="accommodationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-default-900/50 backdrop-blur-xs hidden p-3 sm:p-4">
    <div class="card max-w-md w-full max-h-[90vh] flex flex-col p-4 sm:p-5 shadow-2xl animate-in fade-in zoom-in-95 duration-150">
        <div class="flex items-center justify-between border-b border-default-200 pb-3 shrink-0">
            <div>
                <h3 class="text-sm font-bold text-default-800">Akomodasi Khusus & Pendamping (Scribe)</h3>
                <p id="accomStudentName" class="text-[11px] text-default-400 mt-0.5 font-medium"></p>
            </div>
            <button type="button" onclick="document.getElementById('accommodationModal').classList.add('hidden')" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-500 rounded-md transition cursor-pointer">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>
        <form id="accommodationForm" method="POST" class="pt-4 space-y-4 overflow-y-auto">
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
                <button type="button" onclick="document.getElementById('accommodationModal').classList.add('hidden')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs">
                    Simpan Akomodasi
                </button>
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

    function toggleSessionDocDropdown() {
        const menu = document.getElementById('sessionDocDropdownMenu');
        if (menu) menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function(e) {
        const container = document.getElementById('sessionDocDropdownContainer');
        const menu = document.getElementById('sessionDocDropdownMenu');
        if (container && menu && !container.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>
@endsection
