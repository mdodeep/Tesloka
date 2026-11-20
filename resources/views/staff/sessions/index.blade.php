@extends('layouts.staff')

@section('title', 'Sesi & Penjadwalan Ujian — TESLOKA CBT')
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Sesi & Penjadwalan')
@section('page-subtitle', 'Kelola jadwal pelaksanaan, penugasan ruang, token rilis ujian, pengawas, dan daftar hadir peserta.')

@section('page-actions')
    <a href="{{ route('staff.sessions.create') }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition inline-flex items-center gap-1.5 cursor-pointer">
        <i data-lucide="plus" class="size-4"></i>
        <span>Jadwalkan Sesi Baru</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Quick Stats Grid (Unified Metric Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="card rounded-xl border border-default-200/90 shadow-2xs hover:shadow-xs transition">
            <div class="card-body p-4 sm:p-5 flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Total Sesi Ujian</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ number_format($sessions->total()) }}</div>
                    <div class="text-xs text-default-400 mt-0.5">Sesi Terdaftar Sistem</div>
                </div>
                <div class="size-11 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <i data-lucide="clock" class="size-5.5"></i>
                </div>
            </div>
        </div>
        <div class="card rounded-xl border border-default-200/90 shadow-2xs hover:shadow-xs transition">
            <div class="card-body p-4 sm:p-5 flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Sesi Aktif</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ number_format($sessions->where('status', 'active')->count()) }}</div>
                    <div class="text-xs text-default-400 mt-0.5">Sedang Berlangsung</div>
                </div>
                <div class="size-11 rounded-lg bg-success/10 text-success flex items-center justify-center shrink-0">
                    <i data-lucide="activity" class="size-5.5"></i>
                </div>
            </div>
        </div>
        <div class="card rounded-xl border border-default-200/90 shadow-2xs hover:shadow-xs transition">
            <div class="card-body p-4 sm:p-5 flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Sesi Terjadwal</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ number_format($sessions->where('status', 'scheduled')->count()) }}</div>
                    <div class="text-xs text-default-400 mt-0.5">Menunggu Pelaksanaan</div>
                </div>
                <div class="size-11 rounded-lg bg-info/10 text-info flex items-center justify-center shrink-0">
                    <i data-lucide="calendar" class="size-5.5"></i>
                </div>
            </div>
        </div>
        <div class="card rounded-xl border border-default-200/90 shadow-2xs hover:shadow-xs transition">
            <div class="card-body p-4 sm:p-5 flex items-center justify-between">
                <div>
                    <div class="text-xs text-default-400 font-semibold uppercase tracking-wider">Sesi Selesai</div>
                    <div class="text-2xl font-bold text-default-800 mt-1">{{ number_format($sessions->where('status', 'finished')->count()) }}</div>
                    <div class="text-xs text-default-400 mt-0.5">Arsip &amp; Penilaian</div>
                </div>
                <div class="size-11 rounded-lg bg-warning/10 text-warning flex items-center justify-center shrink-0">
                    <i data-lucide="check-check" class="size-5.5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Bar (Design System) -->
    <x-cbt.card>
        <form method="GET" action="{{ route('staff.sessions.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div>
                <label for="filter_exam_id" class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Ujian Terkait</label>
                <select id="filter_exam_id" name="exam_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">-- Semua Ujian --</option>
                    @foreach($exams as $ex)
                        <option value="{{ $ex->id }}" {{ request('exam_id') == $ex->id ? 'selected' : '' }}>
                            {{ $ex->title }} ({{ $ex->code }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="filter_room_id" class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Ruang Ujian</label>
                <select id="filter_room_id" name="room_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">-- Semua Ruang --</option>
                    @foreach($rooms as $rm)
                        <option value="{{ $rm->id }}" {{ request('room_id') == $rm->id ? 'selected' : '' }}>
                            {{ $rm->name }} (Kap: {{ $rm->capacity }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="filter_status" class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Status Sesi</label>
                <select id="filter_status" name="status" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">-- Semua Status --</option>
                    <option value="scheduled" {{ request('status') === 'scheduled' ? 'selected' : '' }}>Terjadwal</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Sedang Berlangsung</option>
                    <option value="suspended" {{ request('status') === 'suspended' ? 'selected' : '' }}>Ditangguhkan</option>
                    <option value="finished" {{ request('status') === 'finished' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition flex-1 h-10 cursor-pointer">
                    <i data-lucide="filter" class="size-3.5"></i>
                    <span>Filter</span>
                </button>
                <a href="{{ route('staff.sessions.index') }}" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 text-xs font-medium rounded inline-flex items-center justify-center transition h-10 px-3.5" title="Reset Filter">
                    Reset
                </a>
            </div>
        </form>
    </x-cbt.card>

    <!-- Table of Sessions -->
    <x-cbt.card>
        <div class="overflow-x-auto -mx-3.5 sm:mx-0 -my-3.5 sm:-my-5">
            <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-sessions">
                <thead class="bg-default-150">
                    <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Kode & Nama Sesi</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Ujian & Mapel</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Ruang & Kapasitas</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Jadwal Waktu</th>
                        <th class="py-3.5 px-4 border-b border-default-200 text-center whitespace-nowrap">Status</th>
                        <th class="py-3.5 px-4 border-b border-default-200 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse($sessions as $session)
                        <tr class="hover:bg-default-50/80 transition-colors">
                            <td class="py-3.5 px-4 min-w-[160px] max-w-[220px]">
                                <a href="{{ route('staff.sessions.show', $session) }}" class="font-bold text-default-900 hover:text-primary text-sm block leading-snug">
                                    {{ $session->name }}
                                </a>
                                <span class="text-[11px] font-mono text-default-400">{{ $session->session_code }}</span>
                            </td>
                            <td class="py-3.5 px-4 min-w-[180px] max-w-[260px]">
                                <div class="font-semibold text-default-800 text-sm leading-snug">{{ $session->exam->title ?? '-' }}</div>
                                <div class="text-[11px] text-default-500 mt-0.5">{{ $session->exam->subject->name ?? '-' }}</div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <div class="flex items-center gap-1.5 font-semibold text-default-800 text-sm">
                                    @if($session->isOnline() || ! $session->exam_room_id)
                                        <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[10px] font-bold bg-teal-100 text-teal-800 border border-teal-200">
                                            <i data-lucide="globe" class="size-3"></i> Daring
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[10px] font-bold bg-indigo-100 text-indigo-800 border border-indigo-200">
                                            <i data-lucide="building" class="size-3"></i> Lab CBT
                                        </span>
                                    @endif
                                    <span>{{ $session->room->name ?? 'Daring (Online CBT)' }}</span>
                                </div>
                                <div class="text-[11px] text-default-500 mt-0.5">
                                    @if($session->isOnline() || ! $session->exam_room_id)
                                        Terdaftar: <strong class="text-default-800">{{ $session->participants_count }}</strong> Peserta
                                    @else
                                        Terisi: <strong class="{{ $session->participants_count > ($session->room->capacity ?? 30) ? 'text-rose-600' : 'text-default-800' }}">{{ $session->participants_count }}</strong> / {{ $session->room->capacity ?? 30 }} Peserta
                                    @endif
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-xs text-default-700 whitespace-nowrap">
                                <div class="font-medium text-default-800">{{ $session->start_time->format('d M Y H:i') }}</div>
                                <div class="text-[11px] text-default-400">s/d {{ $session->end_time->format('H:i') }} WIB</div>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                @if($session->status === 'scheduled')
                                    <x-cbt.badge color="info">Terjadwal</x-cbt.badge>
                                @elseif($session->status === 'active')
                                    <x-cbt.badge color="success">Aktif Berlangsung</x-cbt.badge>
                                @elseif($session->status === 'suspended')
                                    <x-cbt.badge color="warning">Ditangguhkan</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="slate">Selesai</x-cbt.badge>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5 justify-end">
                                    @if(in_array($session->status, ['scheduled', 'active']))
                                        <a href="{{ route('staff.sessions.monitor', $session) }}" class="btn btn-sm bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 rounded-lg inline-flex items-center gap-1.5 shadow-2xs transition" title="Monitoring Pelaksanaan">
                                            <i data-lucide="bar-chart-2" class="size-3.5"></i>
                                            <span>Monitoring</span>
                                        </a>
                                    @endif
                                    <a href="{{ route('staff.sessions.show', $session) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200/90 rounded-lg inline-flex items-center gap-1.5 shadow-2xs transition" title="Kelola Sesi, Peserta & Pengawas">
                                        <i data-lucide="settings" class="size-3.5 text-default-500"></i>
                                        <span>Kelola Sesi</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-default-400">
                                <div class="max-w-xs mx-auto space-y-3">
                                    <div class="size-12 rounded-md bg-primary/10 text-primary flex items-center justify-center mx-auto">
                                        <i data-lucide="clock" class="size-6 text-primary"></i>
                                    </div>
                                    <div class="font-bold text-default-800 text-sm">Belum Ada Sesi Ujian</div>
                                    <p class="text-xs text-default-500">Jadwalkan sesi pelaksanaan ujian baru dan tentukan ruang serta peserta.</p>
                                    <a href="{{ route('staff.sessions.create') }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition inline-flex items-center gap-1.5">
                                        <i data-lucide="plus" class="size-4"></i>
                                        <span>Jadwalkan Sesi Pertama</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($sessions->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 py-3.5 border-t border-default-200 dark:border-white/14 bg-default-50/30">
                <p class="text-xs text-default-500">
                    Menampilkan <span class="font-semibold text-default-700">{{ $sessions->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-default-700">{{ $sessions->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-default-700">{{ $sessions->total() }}</span> data
                </p>
                <div>
                    {{ $sessions->links() }}
                </div>
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection
