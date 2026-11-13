@extends('layouts.staff')

@section('title', 'Perancangan & Paket Ujian — TESLOKA CBT')
@section('page-parent', 'Konten & Ujian')
@section('page-title', 'Perancangan & Paket Ujian')
@section('page-subtitle', 'Kelola jadwal ujian, cetak biru (blueprint), pembentukan paket terisolasi, dan validasi persetujuan penerbitan.')

@section('page-actions')
    <a href="{{ route('staff.exams.create') }}" class="px-3.5 py-2 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition inline-flex items-center gap-2 cursor-pointer">
        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        <span>Rancang Ujian Baru</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">
    <!-- Filter & Search Bar (Tailwick Design System) -->
    <x-cbt.card>
        <form method="GET" action="{{ route('staff.exams.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div>
                <label for="filter_search" class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Cari Ujian</label>
                <div class="relative">
                    <input type="text" id="filter_search" name="search" value="{{ request('search') }}" placeholder="Judul atau kode ujian..." class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary pl-9">
                    <svg class="size-4 text-default-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            <div>
                <label for="filter_subject_id" class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Mata Pelajaran</label>
                <select id="filter_subject_id" name="subject_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">-- Semua Mata Pelajaran --</option>
                    @foreach($subjects as $subj)
                        <option value="{{ $subj->id }}" {{ request('subject_id') == $subj->id ? 'selected' : '' }}>
                            {{ $subj->name }} ({{ $subj->code }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="filter_status" class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Status Ujian</label>
                <select id="filter_status" name="status" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">-- Semua Status --</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draf</option>
                    <option value="pending_approval" {{ request('status') === 'pending_approval' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                    <option value="ready" {{ request('status') === 'ready' ? 'selected' : '' }}>Siap / Terbit</option>
                    <option value="scheduled" {{ request('status') === 'scheduled' ? 'selected' : '' }}>Terjadwal</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Sedang Aktif</option>
                    <option value="finished" {{ request('status') === 'finished' ? 'selected' : '' }}>Selesai</option>
                    <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Diarsipkan</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <button type="submit" class="h-10 px-4 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition flex-1">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    <span>Terapkan Filter</span>
                </button>
                <a href="{{ route('staff.exams.index') }}" class="h-10 px-3.5 bg-default-100 hover:bg-slate-200 text-default-700 text-xs font-medium rounded inline-flex items-center justify-center transition" title="Reset Filter">
                    Reset
                </a>
            </div>
        </form>
    </x-cbt.card>

    <!-- Table of Exams -->
    <x-cbt.card>
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[780px] text-left text-xs text-default-600">
                <thead class="bg-default-50 text-[11px] uppercase font-bold text-default-500 border-b border-default-200">
                    <tr>
                        <th class="py-3.5 px-4 whitespace-nowrap">Kode & Judul Ujian</th>
                        <th class="py-3.5 px-4 whitespace-nowrap">Mata Pelajaran & Tipe</th>
                        <th class="py-3.5 px-4 text-center whitespace-nowrap">Durasi & KKM</th>
                        <th class="py-3.5 px-4 text-center whitespace-nowrap">Blueprint / Paket</th>
                        <th class="py-3.5 px-4 text-center whitespace-nowrap">Status</th>
                        <th class="py-3.5 px-4 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($exams as $exam)
                        <tr class="hover:bg-default-50/80 transition-colors">
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <a href="{{ route('staff.exams.show', $exam) }}" class="font-bold text-default-900 hover:text-primary transition block text-sm">
                                    {{ $exam->title }}
                                </a>
                                <div class="text-[11px] text-default-400 font-mono mt-0.5">
                                    {{ $exam->code }} &bull; Dibuat oleh: {{ $exam->creator->name ?? 'Staf' }}
                                </div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <div class="font-semibold text-default-800 text-xs">{{ $exam->subject->name ?? '-' }}</div>
                                <div class="text-[11px] text-default-500 uppercase mt-0.5">{{ $exam->exam_type }} &bull; {{ $exam->academicYear->name ?? '-' }}</div>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <div class="font-bold text-default-800">{{ $exam->duration_minutes }} mnt</div>
                                <div class="text-[11px] text-default-500 mt-0.5">KKM: {{ $exam->passing_grade }}</div>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-[11px] font-semibold rounded-full border border-blue-200/60" title="Jumlah aturan cetak biru">
                                        {{ $exam->blueprints_count }} BP
                                    </span>
                                    <span class="px-2 py-0.5 bg-purple-50 text-purple-700 text-[11px] font-semibold rounded-full border border-purple-200/60" title="Jumlah paket soal terbentuk">
                                        {{ $exam->packages_count }} Pkg
                                    </span>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                @if($exam->status === 'draft')
                                    <x-cbt.badge color="secondary">Draf</x-cbt.badge>
                                @elseif($exam->status === 'pending_approval')
                                    <x-cbt.badge color="warning">Menunggu Persetujuan</x-cbt.badge>
                                @elseif($exam->status === 'ready')
                                    <x-cbt.badge color="success">Siap / Terbit</x-cbt.badge>
                                @elseif($exam->status === 'scheduled')
                                    <x-cbt.badge color="info">Terjadwal</x-cbt.badge>
                                @elseif($exam->status === 'active')
                                    <x-cbt.badge color="primary">Sedang Aktif</x-cbt.badge>
                                @elseif($exam->status === 'archived')
                                    <x-cbt.badge color="secondary">Diarsipkan</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="secondary">{{ ucfirst($exam->status) }}</x-cbt.badge>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a href="{{ route('staff.exams.grading.index', $exam) }}" class="size-8 rounded-lg border border-default-200 bg-white inline-flex items-center justify-center text-default-600 hover:text-emerald-600 hover:border-emerald-300 hover:bg-emerald-50 shadow-2xs transition" title="Penilaian &amp; Hasil Siswa">
                                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    </a>
                                    <a href="{{ route('staff.exams.reports.index', $exam) }}" class="size-8 rounded-lg border border-default-200 bg-white inline-flex items-center justify-center text-default-600 hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 shadow-2xs transition" title="Grafik, Psikometri &amp; Analisis">
                                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                    </a>
                                    <a href="{{ route('staff.exams.show', $exam) }}" class="size-8 rounded-lg border border-default-200 bg-white inline-flex items-center justify-center text-default-600 hover:text-primary hover:border-primary/40 hover:bg-primary/5 shadow-2xs transition" title="Detail & Kelola Blueprint">
                                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </a>
                                    <a href="{{ route('staff.exams.edit', $exam) }}" class="size-8 rounded-lg border border-default-200 bg-white inline-flex items-center justify-center text-default-600 hover:text-amber-600 hover:border-amber-300 hover:bg-amber-50 shadow-2xs transition" title="Edit Konfigurasi">
                                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('staff.exams.duplicate', $exam) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="size-8 rounded-lg border border-default-200 bg-white inline-flex items-center justify-center text-default-600 hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 shadow-2xs transition" title="Gandakan Ujian">
                                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('staff.exams.destroy', $exam) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus/mengarsipkan ujian ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="size-8 rounded-lg border border-default-200 bg-white inline-flex items-center justify-center text-default-600 hover:text-rose-600 hover:border-rose-300 hover:bg-rose-50 shadow-2xs transition" title="Hapus Ujian">
                                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-default-400">
                                <x-cbt.empty-state title="Belum Ada Rancangan Ujian" description="Mulai dengan membuat rancangan ujian baru dan menyusun cetak biru soal." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($exams->hasPages())
            <div class="mt-4 pt-3 border-t border-default-100">
                {{ $exams->links() }}
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection
