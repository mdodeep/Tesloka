@extends('layouts.staff')

@section('title', 'Pusat Penilaian & Koreksi Ujian — TESLOKA CBT')
@section('page-parent', 'Evaluasi & Hasil')
@section('page-title', 'Penilaian & Koreksi')
@section('page-subtitle', 'Pusat penilaian otomatis, koreksi manual soal esai, rubrik penilaian, moderasi, regrade, dan publikasi hasil ujian.')

@section('page-actions')
    <a href="{{ route('staff.graduation.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="check-check" class="size-4 text-emerald-600"></i>
        <span>Hasil &amp; Kelulusan</span>
    </a>
    <a href="{{ route('staff.reports.overview') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="bar-chart-3" class="size-4 text-primary"></i>
        <span>Grafik &amp; Analitik</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Metric Overview Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        <div class="card p-4">
            <span class="text-xs font-semibold text-default-400 uppercase tracking-wider block">Total Ujian</span>
            <div class="text-2xl font-bold text-default-800 mt-1">{{ $stats['total_exams'] }}</div>
            <p class="text-[11px] text-default-500 mt-0.5">Seluruh Paket Terdaftar</p>
        </div>

        <div class="card p-4">
            <span class="text-xs font-semibold text-default-400 uppercase tracking-wider block">Ujian Ada Nilai</span>
            <div class="text-2xl font-bold text-indigo-600 mt-1">{{ $stats['exams_with_results'] }}</div>
            <p class="text-[11px] text-default-500 mt-0.5">Memiliki Lembar Jawaban</p>
        </div>

        <div class="card p-4">
            <span class="text-xs font-semibold text-default-400 uppercase tracking-wider block">Peserta Dinilai</span>
            <div class="text-2xl font-bold text-emerald-600 mt-1">{{ $stats['total_graded_participants'] }}</div>
            <p class="text-[11px] text-default-500 mt-0.5">Nilai Akhir Ditetapkan</p>
        </div>

        <div class="card p-4 border-amber-200 bg-amber-50/40">
            <span class="text-xs font-semibold text-amber-700 uppercase tracking-wider block">Antrean Koreksi Esai</span>
            <div class="text-2xl font-bold text-amber-700 mt-1">{{ $stats['pending_essays'] }}</div>
            <p class="text-[11px] text-amber-600 mt-0.5">Jawaban Esai Perlu Nilai</p>
        </div>

        <div class="card p-4">
            <span class="text-xs font-semibold text-default-400 uppercase tracking-wider block">Kelulusan Rata-rata</span>
            <div class="text-2xl font-bold text-primary mt-1">{{ $stats['overall_pass_rate'] }}%</div>
            <p class="text-[11px] text-default-500 mt-0.5">Tuntas KKM Institusi</p>
        </div>
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
    <x-cbt.card title="Daftar Ujian &amp; Status Penilaian" id="tabel-ujian">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-grading-overview">
                <thead class="bg-default-150">
                    <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Kode &amp; Judul Ujian</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Mata Pelajaran</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">KKM</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Pengumpulan</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Peserta Dinilai</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Status Publikasi</th>
                        <th class="py-3 px-4 border-b border-default-200 text-right whitespace-nowrap">Aksi Penilaian</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse($exams as $exam)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="py-3.5 px-4 font-medium whitespace-nowrap">
                                <span class="px-1.5 py-0.5 rounded bg-primary/10 text-primary font-mono text-[10px] font-bold uppercase mr-1">
                                    {{ $exam->code }}
                                </span>
                                <span class="text-default-900 font-bold text-xs">{{ $exam->title }}</span>
                                <div class="text-[11px] text-default-400 mt-0.5">
                                    Tipe: {{ ucfirst($exam->exam_type) }} &bull; Durasi: {{ $exam->duration_minutes }} Menit
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-default-700 font-medium whitespace-nowrap">
                                {{ $exam->subject->name ?? '-' }}
                            </td>
                            <td class="py-3.5 px-4 text-center font-mono font-bold text-emerald-600 text-sm whitespace-nowrap">
                                {{ $exam->passing_grade ?? 75 }}
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <span class="font-bold text-default-800">{{ $exam->submitted_attempts_count }}</span>
                                <span class="text-default-400">/ {{ $exam->total_attempts_count }}</span>
                            </td>
                            <td class="py-3.5 px-4 text-center font-bold text-indigo-600 whitespace-nowrap">
                                {{ $exam->graded_count }}
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                @if($exam->show_result_on_finish)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                        Terpublikasi
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">
                                        Draft / Belum Publik
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right space-x-1.5 whitespace-nowrap">
                                <a href="{{ route('staff.exams.grading.index', $exam) }}" class="px-3 py-1.5 bg-primary hover:bg-primary-hover text-white rounded font-semibold inline-flex items-center gap-1 shadow-xs transition">
                                    <i data-lucide="award" class="size-3.5"></i>
                                    <span>Buka Penilaian</span>
                                </a>
                                <a href="{{ route('staff.exams.reports.index', $exam) }}" class="px-2.5 py-1.5 bg-default-100 hover:bg-default-200 text-default-700 rounded font-semibold inline-flex items-center gap-1 transition" title="Laporan & Psikometri">
                                    <i data-lucide="bar-chart-2" class="size-3.5"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-default-400">
                                Belum ada ujian yang terdaftar untuk dilakukan penilaian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($exams->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 py-3.5 border-t border-default-200 dark:border-white/14 bg-default-50/30">
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

