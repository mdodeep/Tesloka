@extends('layouts.staff')

@section('title', 'Pusat Penilaian & Koreksi Ujian')
@section('page-parent', 'Evaluasi & Hasil')
@section('page-title', 'Penilaian & Koreksi')
@section('page-subtitle', 'Pusat penilaian otomatis, koreksi manual soal esai, rubrik penilaian, moderasi, regrade, dan publikasi hasil ujian.')

@section('page-actions')
    <a href="{{ route('staff.graduation.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="check-check" class="size-4 text-emerald-600"></i>
        <span>Hasil & Kelulusan</span>
    </a>
    <a href="{{ route('staff.reports.overview') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="bar-chart-3" class="size-4 text-primary"></i>
        <span>Grafik & Analitik</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Metric Overview Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        <x-cbt.stat-card 
            title="Total Ujian" 
            value="{{ $stats['total_exams'] }}" 
            subtitle="Seluruh Paket Terdaftar" 
            icon="file-text" 
            color="primary" />
        <x-cbt.stat-card 
            title="Ujian Ada Nilai" 
            value="{{ $stats['exams_with_results'] }}" 
            subtitle="Memiliki Lembar Jawaban" 
            icon="check-circle-2" 
            color="info" />
        <x-cbt.stat-card 
            title="Peserta Dinilai" 
            value="{{ $stats['total_graded_participants'] }}" 
            subtitle="Nilai Akhir Ditetapkan" 
            icon="users" 
            color="teal" />
        <x-cbt.stat-card 
            title="Antrean Koreksi Esai" 
            value="{{ $stats['pending_essays'] }}" 
            subtitle="Perlu Penilaian Manual" 
            icon="edit-3" 
            color="warning" />
        <x-cbt.stat-card 
            title="Kelulusan Rerata" 
            value="{{ $stats['overall_pass_rate'] }}%" 
            subtitle="Tuntas KKM Institusi" 
            icon="award" 
            color="success" />
    </div>

    @if($stats['pending_essays'] > 0)
        <div class="p-4 rounded-lg bg-amber-50 border border-amber-200 text-amber-900 text-xs flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <i data-lucide="alert-circle" class="size-5 text-amber-600 shrink-0"></i>
                <div>
                    <span class="font-bold">Terdapat {{ $stats['pending_essays'] }} butir jawaban esai yang belum dinilai!</span>
                    <p class="text-amber-700 mt-0.5">Buka masing-masing ujian di bawah ini untuk melakukan koreksi jawaban esai peserta menggunakan rubrik penilaian.</p>
                </div>
            </div>
            <a href="#tabel-ujian" class="px-3 py-1.5 bg-amber-600 hover:bg-amber-700 text-white rounded text-xs font-semibold transition shrink-0">
                Lihat Ujian
            </a>
        </div>
    @endif

    <!-- Daftar Ujian untuk Penilaian -->
    <x-cbt.card flush title="Daftar Ujian & Status Penilaian" id="tabel-ujian">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] divide-y divide-default-200/80 text-left text-xs" id="table-grading-overview">
                <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">Kode & Judul Ujian</th>
                        <th class="px-3 py-3 whitespace-nowrap">Mata Pelajaran</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">KKM</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Pengumpulan</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Peserta Dinilai</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Status Publikasi</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Aksi Penilaian</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse($exams as $exam)
                        <tr class="hover:bg-default-50/60 transition-colors">
                            <td class="ps-4 sm:ps-6 pe-3 py-3.5 font-medium whitespace-nowrap">
                                <x-cbt.badge color="primary" class="font-mono mr-1">
                                    {{ $exam->code }}
                                </x-cbt.badge>
                                <span class="text-default-900 font-bold text-xs">{{ $exam->title }}</span>
                                <div class="text-[11px] text-default-400 mt-0.5">
                                    Tipe: {{ ucfirst($exam->exam_type) }} &bull; Durasi: {{ $exam->duration_minutes }} Menit
                                </div>
                            </td>
                            <td class="px-3 py-3.5 text-default-700 font-medium whitespace-nowrap">
                                {{ $exam->subject->name ?? '-' }}
                            </td>
                            <td class="px-3 py-3.5 text-center font-mono font-bold text-emerald-600 text-sm whitespace-nowrap">
                                @if(!($exam->has_passing_grade ?? true) || $exam->isCertification())
                                    <span class="text-xs font-sans text-teal-600">Tanpa KKM</span>
                                @else
                                    {{ $exam->passing_grade ?? 75 }}
                                @endif
                            </td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                <span class="font-bold text-default-800">{{ $exam->submitted_attempts_count }}</span>
                                <span class="text-default-400">/ {{ $exam->total_attempts_count }}</span>
                            </td>
                            <td class="px-3 py-3.5 text-center font-bold text-indigo-600 whitespace-nowrap">
                                {{ $exam->graded_count }}
                            </td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                @if($exam->show_result_on_finish)
                                    <x-cbt.badge color="success">Terpublikasi</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="warning">Draft / Belum Publik</x-cbt.badge>
                                @endif
                            </td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right space-x-1.5 whitespace-nowrap">
                                <a href="{{ route('staff.exams.grading.index', $exam) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded-lg text-xs font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
                                    <i data-lucide="award" class="size-3.5"></i>
                                    <span>Buka Penilaian</span>
                                </a>
                                <a href="{{ route('staff.exams.reports.index', $exam) }}" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-card hover:bg-default-100 text-default-600 hover:text-default-900 shadow-2xs transition inline-flex items-center justify-center" title="Laporan & Psikometri">
                                    <i data-lucide="bar-chart-2" class="size-4"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-12 px-4 sm:px-6 text-default-400">
                                <x-cbt.empty-state :bordered="false" title="Belum Ada Ujian Dinilai" message="Belum ada ujian yang terdaftar untuk dilakukan penilaian hasil peserta." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($exams->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 sm:px-6 py-3.5 border-t border-default-200/80 bg-default-50/30">
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

