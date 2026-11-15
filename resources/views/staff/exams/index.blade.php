@extends('layouts.staff')

@section('title', 'Perancangan & Paket Ujian — TESLOKA CBT')
@section('page-parent', 'Konten & Ujian')
@section('page-title', 'Perancangan & Paket Ujian')
@section('page-subtitle', 'Kelola jadwal ujian, cetak biru (blueprint), pembentukan paket terisolasi, dan validasi persetujuan penerbitan.')

@section('page-actions')
    <a href="{{ route('staff.exams.create') }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition inline-flex items-center gap-1.5 cursor-pointer">
        <i data-lucide="plus" class="size-4"></i>
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
                    <i data-lucide="search" class="size-4 text-default-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"></i>
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
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition flex-1 h-10">
                    <i data-lucide="filter" class="size-4"></i>
                    <span>Terapkan Filter</span>
                </button>
                <a href="{{ route('staff.exams.index') }}" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 text-xs font-medium rounded inline-flex items-center justify-center transition h-10 px-3.5" title="Reset Filter">
                    Reset
                </a>
            </div>
        </form>
    </x-cbt.card>

    <!-- Table of Exams -->
    <x-cbt.card>
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[780px] text-left text-xs text-default-600" data-gridjs="true" data-gridjs-page-size="10">
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
                                    <x-cbt.badge color="primary">{{ $exam->blueprints_count }} BP</x-cbt.badge>
                                    <x-cbt.badge color="purple">{{ $exam->packages_count }} Pkg</x-cbt.badge>
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
                                    <a href="{{ route('staff.exams.grading.index', $exam) }}" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-emerald-600 hover:border-emerald-300 hover:bg-emerald-50 transition" title="Penilaian &amp; Hasil Siswa">
                                        <i data-lucide="check-square" class="size-4"></i>
                                    </a>
                                    <a href="{{ route('staff.exams.reports.index', $exam) }}" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 transition" title="Grafik, Psikometri &amp; Analisis">
                                        <i data-lucide="bar-chart-2" class="size-4"></i>
                                    </a>
                                    <a href="{{ route('staff.exams.show', $exam) }}" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-primary hover:border-primary/40 hover:bg-primary/5 transition" title="Detail & Kelola Blueprint">
                                        <i data-lucide="eye" class="size-4"></i>
                                    </a>
                                    <a href="{{ route('staff.exams.edit', $exam) }}" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-amber-600 hover:border-amber-300 hover:bg-amber-50 transition" title="Edit Konfigurasi">
                                        <i data-lucide="edit" class="size-4"></i>
                                    </a>
                                    <form action="{{ route('staff.exams.duplicate', $exam) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 transition" title="Gandakan Ujian">
                                            <i data-lucide="copy" class="size-4"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('staff.exams.destroy', $exam) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus/mengarsipkan ujian ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon size-8 rounded border border-default-200 bg-white hover:text-rose-600 hover:border-rose-300 hover:bg-rose-50 transition" title="Hapus Ujian">
                                            <i data-lucide="trash-2" class="size-4"></i>
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
