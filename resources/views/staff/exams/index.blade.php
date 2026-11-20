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

    <!-- Quick Stats Grid (Unified Metric Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-cbt.stat-card 
            title="Total Paket Ujian" 
            value="{{ number_format($exams->total()) }}" 
            subtitle="Seluruh Kategori Ujian" 
            icon="calendar" 
            color="primary" />
        <x-cbt.stat-card 
            title="Ujian Siap &amp; Terbit" 
            value="{{ number_format($exams->whereIn('status', ['ready', 'published', 'scheduled', 'active', 'ongoing'])->count()) }}" 
            subtitle="Dapat Dijadwalkan" 
            icon="check-circle-2" 
            color="success" />
        <x-cbt.stat-card 
            title="Blueprint Terdaftar" 
            value="{{ number_format($exams->sum('blueprints_count')) }}" 
            subtitle="Komposisi Butir Soal" 
            icon="layers" 
            color="info" />
        <x-cbt.stat-card 
            title="Mata Pelajaran Aktif" 
            value="{{ number_format($subjects->count()) }}" 
            subtitle="Mata Uji Terdaftar" 
            icon="book-open" 
            color="warning" />
    </div>

    <!-- Filter & Search Bar (Design System) -->
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
                    <span>Filter</span>
                </button>
                <a href="{{ route('staff.exams.index') }}" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 text-xs font-medium rounded inline-flex items-center justify-center transition h-10 px-3.5" title="Reset Filter">
                    Reset
                </a>
            </div>
        </form>
    </x-cbt.card>

    <!-- Table of Exams -->
    <x-cbt.card flush>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[780px] divide-y divide-default-200/80 dark:divide-white/14 text-left text-xs text-default-600" id="table-exams">
                <thead class="bg-default-50/75 border-b border-default-200/80">
                    <tr class="text-[11px] font-semibold uppercase tracking-wider text-default-500 whitespace-nowrap">
                        <th class="py-3.5 ps-4 sm:ps-6 pe-4 whitespace-nowrap">Kode & Judul Ujian</th>
                        <th class="py-3.5 px-4 whitespace-nowrap">Mata Pelajaran & Tipe</th>
                        <th class="py-3.5 px-4 text-center whitespace-nowrap">Durasi & KKM</th>
                        <th class="py-3.5 px-4 text-center whitespace-nowrap">Blueprint / Paket</th>
                        <th class="py-3.5 px-4 text-center whitespace-nowrap">Status</th>
                        <th class="py-3.5 ps-4 pe-4 sm:pe-6 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/80 dark:divide-white/14">
                    @forelse($exams as $exam)
                        <tr class="hover:bg-default-50/80 transition-colors">
                            <td class="py-3.5 ps-4 sm:ps-6 pe-4 whitespace-nowrap">
                                <div class="flex items-center gap-1.5 flex-wrap">
                                    <a href="{{ route('staff.exams.show', $exam) }}" class="font-bold text-default-900 hover:text-primary transition text-sm">
                                        {{ $exam->title }}
                                    </a>
                                    @if($exam->isLanguageCertification())
                                        <x-cbt.badge color="info">Bahasa</x-cbt.badge>
                                    @elseif($exam->isCertification())
                                        <x-cbt.badge color="purple">Sertifikasi</x-cbt.badge>
                                    @endif
                                </div>
                                <div class="text-[11px] text-default-400 font-mono mt-0.5">
                                    {{ $exam->code }} &bull; Dibuat oleh: {{ $exam->creator->name ?? 'Staf' }}
                                </div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <div class="font-semibold text-default-800 text-xs">{{ $exam->subject->name ?? '-' }}</div>
                                <div class="text-[11px] text-default-500 mt-0.5">{{ $exam->getDeliveryModeLabel() }} &bull; {{ $exam->academicYear->name ?? '-' }}</div>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <div class="font-bold text-default-800">{{ $exam->duration_minutes }} mnt</div>
                                <div class="text-[11px] text-default-500 mt-0.5">{{ $exam->has_passing_grade ? ('KKM: ' . $exam->passing_grade) : 'Sertifikasi' }}</div>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <x-cbt.badge color="primary">{{ $exam->blueprints_count }} BP</x-cbt.badge>
                                    <x-cbt.badge color="slate">{{ $exam->packages_count }} Pkg</x-cbt.badge>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                @if($exam->status === 'draft')
                                    <x-cbt.badge color="slate">Draf</x-cbt.badge>
                                @elseif($exam->status === 'pending_approval')
                                    <x-cbt.badge color="warning">Menunggu Persetujuan</x-cbt.badge>
                                @elseif(in_array($exam->status, ['ready', 'published']))
                                    <x-cbt.badge color="success">Siap / Terbit</x-cbt.badge>
                                @elseif($exam->status === 'scheduled')
                                    <x-cbt.badge color="info">Terjadwal</x-cbt.badge>
                                @elseif(in_array($exam->status, ['active', 'ongoing']))
                                    <x-cbt.badge color="primary">Sedang Aktif</x-cbt.badge>
                                @elseif($exam->status === 'finished')
                                    <x-cbt.badge color="slate">Selesai</x-cbt.badge>
                                @elseif($exam->status === 'archived')
                                    <x-cbt.badge color="slate">Diarsipkan</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="slate">{{ ucfirst($exam->status) }}</x-cbt.badge>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a href="{{ route('staff.exams.grading.index', $exam) }}" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-white hover:text-emerald-600 hover:border-emerald-300 hover:bg-emerald-50 transition" title="Penilaian & Hasil Siswa">
                                        <i data-lucide="check-square" class="size-4"></i>
                                    </a>
                                    <a href="{{ route('staff.exams.reports.index', $exam) }}" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-white hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 transition" title="Grafik, Psikometri & Analisis">
                                        <i data-lucide="bar-chart-2" class="size-4"></i>
                                    </a>
                                    <a href="{{ route('staff.exams.show', $exam) }}" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-white hover:text-primary hover:border-primary/40 hover:bg-primary/5 transition" title="Detail & Kelola Blueprint">
                                        <i data-lucide="eye" class="size-4"></i>
                                    </a>
                                    <a href="{{ route('staff.exams.edit', $exam) }}" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-white hover:text-amber-600 hover:border-amber-300 hover:bg-amber-50 transition" title="Edit Konfigurasi">
                                        <i data-lucide="edit" class="size-4"></i>
                                    </a>
                                    <form action="{{ route('staff.exams.duplicate', $exam) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-white hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 transition" title="Gandakan Ujian">
                                            <i data-lucide="copy" class="size-4"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('staff.exams.destroy', $exam) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus/mengarsipkan ujian ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-white hover:text-rose-600 hover:border-rose-300 hover:bg-rose-50 transition" title="Hapus Ujian">
                                            <i data-lucide="trash-2" class="size-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-default-400">
                                <x-cbt.empty-state title="Belum Ada Rancangan Ujian" description="Mulai dengan membuat rancangan ujian baru dan menyusun cetak biru soal." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($exams->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 sm:px-6 py-3.5 border-t border-default-200/80 dark:border-white/14 bg-default-50/30">
                <p class="text-xs text-default-500">
                    Menampilkan <span class="font-semibold text-default-700">{{ $exams->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-default-700">{{ $exams->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-default-700">{{ $exams->total() }}</span> data
                </p>
                <div>
                    {{ $exams->links() }}
                </div>
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection
