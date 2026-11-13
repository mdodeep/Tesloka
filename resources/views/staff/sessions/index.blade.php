@extends('layouts.staff')

@section('title', 'Sesi & Penjadwalan Ujian — TESLOKA CBT')
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Sesi & Penjadwalan')
@section('page-subtitle', 'Kelola jadwal pelaksanaan, penugasan ruang, token rilis ujian, pengawas, dan daftar hadir peserta.')

@section('page-actions')
    <a href="{{ route('staff.sessions.create') }}" class="px-3.5 py-2 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition inline-flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        <span>Jadwalkan Sesi Baru</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Filter Bar (Tailwick Design System) -->
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
                <button type="submit" class="h-10 px-4 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition flex-1 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    <span>Filter</span>
                </button>
                <a href="{{ route('staff.sessions.index') }}" class="h-10 px-3.5 bg-default-100 hover:bg-slate-200 text-default-700 text-xs font-medium rounded inline-flex items-center justify-center transition" title="Reset Filter">
                    Reset
                </a>
            </div>
        </form>
    </x-cbt.card>

    <!-- Table of Sessions -->
    <x-cbt.card>
        <div class="overflow-x-auto -mx-3.5 sm:-mx-6 -my-4">
            <table class="w-full min-w-[700px] text-left text-xs border-collapse">
                <thead class="bg-default-50 text-[11px] uppercase font-bold text-default-600 border-b border-default-200">
                    <tr>
                        <th class="py-3.5 px-6 whitespace-nowrap">Kode & Nama Sesi</th>
                        <th class="py-3.5 px-4 whitespace-nowrap">Ujian & Mapel</th>
                        <th class="py-3.5 px-4 whitespace-nowrap">Ruang & Kapasitas</th>
                        <th class="py-3.5 px-4 whitespace-nowrap">Jadwal Waktu</th>
                        <th class="py-3.5 px-4 text-center whitespace-nowrap">Token Rilis</th>
                        <th class="py-3.5 px-4 text-center whitespace-nowrap">Status</th>
                        <th class="py-3.5 px-6 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($sessions as $session)
                        <tr class="hover:bg-default-50/80 transition-colors">
                            <td class="py-3.5 px-6 whitespace-nowrap">
                                <a href="{{ route('staff.sessions.show', $session) }}" class="font-bold text-default-900 hover:text-primary text-sm block">
                                    {{ $session->name }}
                                </a>
                                <span class="text-[11px] font-mono text-default-400">{{ $session->session_code }}</span>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <div class="font-semibold text-default-800 text-sm">{{ $session->exam->title ?? '-' }}</div>
                                <div class="text-[11px] text-default-500">{{ $session->exam->subject->name ?? '-' }}</div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <div class="font-semibold text-default-800 text-sm">{{ $session->room->name ?? '-' }}</div>
                                <div class="text-[11px] text-default-500">
                                    Terisi: <strong class="{{ $session->participants_count > ($session->room->capacity ?? 30) ? 'text-rose-600' : 'text-default-800' }}">{{ $session->participants_count }}</strong> / {{ $session->room->capacity ?? 30 }} Peserta
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-xs text-default-700 whitespace-nowrap">
                                <div class="font-medium text-default-800">{{ $session->start_time->format('d M Y H:i') }}</div>
                                <div class="text-[11px] text-default-400">s/d {{ $session->end_time->format('H:i') }} WIB</div>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <span class="px-2.5 py-1 bg-amber-50 text-amber-900 font-mono font-bold text-xs rounded-lg border border-amber-200 shadow-2xs whitespace-nowrap inline-block">
                                    {{ $session->token ?? 'NONE' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                @if($session->status === 'scheduled')
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-sky-50 text-sky-700 border border-sky-200 whitespace-nowrap inline-block">Terjadwal</span>
                                @elseif($session->status === 'active')
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 whitespace-nowrap inline-block">Aktif Berlangsung</span>
                                @elseif($session->status === 'suspended')
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200 whitespace-nowrap inline-block">Ditangguhkan</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-default-100 text-default-600 border border-default-200 whitespace-nowrap inline-block">Selesai</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-6 text-right whitespace-nowrap">
                                <a href="{{ route('staff.sessions.show', $session) }}" class="px-3.5 py-1.5 bg-white hover:bg-default-50 text-default-700 border border-default-200 rounded text-xs font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
                                    <svg class="w-3.5 h-3.5 text-default-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span>Kelola Sesi</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-default-400">
                                <div class="max-w-xs mx-auto space-y-3">
                                    <div class="size-12 rounded-md bg-blue-50 text-primary flex items-center justify-center mx-auto">
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <div class="font-bold text-default-800 text-sm">Belum Ada Sesi Ujian</div>
                                    <p class="text-xs text-default-500">Jadwalkan sesi pelaksanaan ujian baru dan tentukan ruang serta peserta.</p>
                                    <a href="{{ route('staff.sessions.create') }}" class="px-4 py-2 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition inline-flex items-center gap-1.5">
                                        + Jadwalkan Sesi Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($sessions->hasPages())
            <div class="mt-4 pt-3 border-t border-default-100">
                {{ $sessions->links() }}
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection
