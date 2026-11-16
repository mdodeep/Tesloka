@extends('layouts.staff')

@section('title', 'Pusat Hasil & Kelulusan Siswa — TESLOKA CBT')
@section('page-parent', 'Evaluasi & Hasil')
@section('page-title', 'Hasil & Kelulusan')
@section('page-subtitle', 'Rekapitulasi penetapan status kelulusan, standar KKM, transkrip nilai akademik, cetak SKL, dan sertifikat kelulusan siswa.')

@section('page-actions')
    <a href="{{ route('staff.graduation.export-csv', request()->query()) }}" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="download" class="size-4"></i>
        <span>Ekspor CSV Kelulusan</span>
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
            <span class="text-xs font-semibold text-default-400 uppercase tracking-wider block">Total Peserta Dinilai</span>
            <div class="text-2xl font-bold text-default-800 mt-1">{{ $stats['total_evaluated'] }}</div>
            <p class="text-[11px] text-default-500 mt-0.5">Seluruh Nilai Akhir</p>
        </div>

        <div class="card p-4 border-emerald-200 bg-emerald-50/30">
            <span class="text-xs font-semibold text-emerald-700 uppercase tracking-wider block">Lulus / Tuntas KKM</span>
            <div class="text-2xl font-bold text-emerald-700 mt-1">{{ $stats['total_passed'] }}</div>
            <p class="text-[11px] text-emerald-600 mt-0.5">Memenuhi Syarat Kelulusan</p>
        </div>

        <div class="card p-4 border-rose-200 bg-rose-50/30">
            <span class="text-xs font-semibold text-rose-700 uppercase tracking-wider block">Tidak Lulus / Remedial</span>
            <div class="text-2xl font-bold text-rose-700 mt-1">{{ $stats['total_remedial'] }}</div>
            <p class="text-[11px] text-rose-600 mt-0.5">Di Bawah Batas KKM</p>
        </div>

        <div class="card p-4">
            <span class="text-xs font-semibold text-default-400 uppercase tracking-wider block">Tingkat Kelulusan</span>
            <div class="text-2xl font-bold text-primary mt-1">{{ $stats['pass_rate'] }}%</div>
            <p class="text-[11px] text-default-500 mt-0.5">Rasio Lulus Institusi</p>
        </div>

        <div class="card p-4">
            <span class="text-xs font-semibold text-default-400 uppercase tracking-wider block">Skor Rata-rata</span>
            <div class="text-2xl font-bold text-indigo-600 mt-1">{{ $stats['avg_score'] }}</div>
            <p class="text-[11px] text-default-500 mt-0.5">Rata-rata Nilai Siswa</p>
        </div>
    </div>

    <!-- Visual Charts: Donut Rasio Kelulusan & Sebaran Mutu Nilai -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-cbt.card title="Rasio Kelulusan Peserta (Lulus vs Remedial)">
            <div id="chartGraduationDonut" class="w-full min-h-[260px] flex items-center justify-center"></div>
        </x-cbt.card>

        <x-cbt.card title="Distribusi Predikat Mutu Nilai Siswa (A - E)">
            <div id="chartGradeLetters" class="w-full min-h-[260px]"></div>
        </x-cbt.card>
    </div>

    <!-- Filter Bar -->
    <x-cbt.card>
        <form method="GET" action="{{ route('staff.graduation.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-4 items-end">
            <div class="space-y-1">
                <label for="filter_exam" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">Ujian</label>
                <select name="exam_id" id="filter_exam" class="form-select text-xs">
                    <option value="">Semua Ujian</option>
                    @foreach($exams as $ex)
                        <option value="{{ $ex->id }}" @selected(request('exam_id') == $ex->id)>
                            {{ $ex->code }} - {{ $ex->title }} (KKM: {{ $ex->passing_grade }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-1">
                <label for="filter_status" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">Status Kelulusan</label>
                <select name="status" id="filter_status" class="form-select text-xs">
                    <option value="">Semua Status</option>
                    <option value="passed" @selected(request('status') === 'passed')>LULUS (Tuntas KKM)</option>
                    <option value="remedial" @selected(request('status') === 'remedial')>REMEDIAL (Belum Tuntas)</option>
                </select>
            </div>

            <div class="space-y-1">
                <label for="filter_search" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">Cari Siswa</label>
                <input type="text" name="search" id="filter_search" value="{{ request('search') }}" placeholder="Nama / NISN / Username..." class="form-input text-xs">
            </div>

            <div class="flex items-center gap-2">
                <button type="submit" class="w-full py-2 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded shadow-xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer">
                    <i data-lucide="filter" class="size-4"></i>
                    <span>Terapkan Filter</span>
                </button>
                @if(request()->hasAny(['exam_id', 'status', 'search']))
                    <a href="{{ route('staff.graduation.index') }}" class="px-3 py-2 bg-default-100 hover:bg-default-200 text-default-700 text-xs font-semibold rounded transition" title="Reset Filter">
                        <i data-lucide="rotate-ccw" class="size-4"></i>
                    </a>
                @endif
            </div>
        </form>
    </x-cbt.card>

    <!-- Results Table -->
    <x-cbt.card title="Rekapitulasi Hasil Kelulusan &amp; Yudisium Peserta">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[850px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-graduation">
                <thead class="bg-default-150">
                    <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                        <th class="py-3 px-4 border-b border-default-200 text-center w-12 whitespace-nowrap">No</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Nama Siswa / Peserta</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Ujian &amp; Mata Pelajaran</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Skor Akhir</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Capaian (%)</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">KKM</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Predikat</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Status Kelulusan</th>
                        <th class="py-3 px-4 border-b border-default-200 text-right whitespace-nowrap">Dokumen Kelulusan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse($results as $index => $res)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="py-3 px-4 text-center text-default-500 font-medium whitespace-nowrap">
                                {{ $results->firstItem() + $index }}
                            </td>
                            <td class="py-3 px-4 font-bold text-default-900 whitespace-nowrap">
                                <div>{{ $res->student->name ?? '-' }}</div>
                                <div class="text-[11px] font-mono font-normal text-default-500 mt-0.5">
                                    {{ $res->student->identity_number ?? $res->student->username ?? '-' }}
                                </div>
                            </td>
                            <td class="py-3 px-4 text-default-800 whitespace-nowrap">
                                <span class="font-bold text-xs">{{ $res->exam->title ?? '-' }}</span>
                                <div class="text-[11px] text-default-400 mt-0.5">
                                    {{ $res->exam->subject->name ?? '-' }} &bull; Kode: {{ $res->exam->code ?? '-' }}
                                </div>
                            </td>
                            <td class="py-3 px-4 text-center font-mono font-bold text-default-800 text-sm whitespace-nowrap">
                                {{ number_format($res->total_score, 1) }} <span class="text-default-400 text-xs">/ {{ number_format($res->max_score, 1) }}</span>
                            </td>
                            <td class="py-3 px-4 text-center font-bold text-default-800 whitespace-nowrap">
                                {{ number_format($res->percentage, 1) }}%
                            </td>
                            <td class="py-3 px-4 text-center font-mono font-semibold whitespace-nowrap">
                                @if($res->exam && (!($res->exam->has_passing_grade ?? true) || $res->exam->isCertification()))
                                    <span class="text-slate-400 font-normal text-xs">Tanpa KKM</span>
                                @else
                                    <span class="text-emerald-600">{{ number_format($res->passing_grade, 1) }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                <span class="px-2 py-0.5 rounded font-black font-mono {{ $res->final_grade_letter === 'A' ? 'bg-emerald-100 text-emerald-800' : ($res->final_grade_letter === 'B' ? 'bg-blue-100 text-blue-800' : ($res->final_grade_letter === 'C' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800')) }}">
                                    {{ $res->final_grade_letter ?? '-' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                @if($res->exam && (!($res->exam->has_passing_grade ?? true) || $res->exam->isCertification()))
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-100 text-blue-800 inline-flex items-center gap-1 border border-blue-200 whitespace-nowrap">
                                        <i data-lucide="award" class="size-3"></i>
                                        <span>TERSERTIFIKASI</span>
                                    </span>
                                @elseif($res->is_passed)
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800 inline-flex items-center gap-1 border border-emerald-200 whitespace-nowrap">
                                        <i data-lucide="check" class="size-3"></i>
                                        <span>LULUS</span>
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-100 text-rose-800 inline-flex items-center gap-1 border border-rose-200 whitespace-nowrap">
                                        <i data-lucide="x" class="size-3"></i>
                                        <span>REMEDIAL</span>
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-1 whitespace-nowrap">
                                <a href="{{ route('staff.graduation.skl', $res) }}" target="_blank" class="px-2.5 py-1.5 bg-white hover:bg-default-50 text-default-700 border border-default-200 rounded text-xs font-semibold inline-flex items-center gap-1 shadow-xs transition" title="Cetak Surat Keterangan Lulus (SKL)">
                                    <i data-lucide="file-text" class="size-3.5 text-primary"></i>
                                    <span>SKL</span>
                                </a>

                                <a href="{{ route('staff.graduation.certificate', $res) }}" target="_blank" class="px-2.5 py-1.5 bg-white hover:bg-default-50 text-default-700 border border-default-200 rounded text-xs font-semibold inline-flex items-center gap-1 shadow-xs transition" title="Cetak Sertifikat Kelulusan">
                                    <i data-lucide="award" class="size-3.5 text-amber-600"></i>
                                    <span>Sertifikat</span>
                                </a>

                                <a href="{{ route('staff.graduation.transcript', $res) }}" target="_blank" class="px-2.5 py-1.5 bg-white hover:bg-default-50 text-default-700 border border-default-200 rounded text-xs font-semibold inline-flex items-center gap-1 shadow-xs transition" title="Cetak Transkrip SKHU">
                                    <i data-lucide="scroll" class="size-3.5 text-indigo-600"></i>
                                    <span>Transkrip</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-10 text-default-400">
                                Belum ada data hasil kelulusan yang sesuai dengan filter yang dipilih.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($results->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 py-3.5 border-t border-default-200 dark:border-white/14 bg-default-50/30">
                <p class="text-xs text-default-500">
                    Menampilkan <span class="font-semibold text-default-700">{{ $results->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-default-700">{{ $results->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-default-700">{{ $results->total() }}</span> data
                </p>
                <div>
                    {{ $results->links() }}
                </div>
            </div>
        @endif
    </x-cbt.card>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof ApexCharts === 'undefined') return;

    // 1. Donut Chart Kelulusan
    const donutEl = document.getElementById('chartGraduationDonut');
    if (donutEl) {
        const passedCount = {{ $stats['total_passed'] }};
        const remedialCount = {{ $stats['total_remedial'] }};

        if (passedCount > 0 || remedialCount > 0) {
            const donutOptions = {
                chart: {
                    type: 'donut',
                    height: 250,
                    fontFamily: 'Sora, sans-serif'
                },
                series: [passedCount, remedialCount],
                labels: ['Lulus / Tuntas KKM', 'Tidak Lulus / Remedial'],
                colors: ['#059669', '#e11d48'],
                legend: {
                    position: 'bottom',
                    fontSize: '12px'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Kelulusan',
                                    formatter: () => '{{ $stats['pass_rate'] }}%'
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: (val) => val.toFixed(1) + '%'
                }
            };
            new ApexCharts(donutEl, donutOptions).render();
        } else {
            donutEl.innerHTML = '<div class="text-xs text-default-400 py-12 text-center">Belum ada data hasil penilaian.</div>';
        }
    }

    // 2. Bar Chart Sebaran Predikat Mutu (A - E)
    const barEl = document.getElementById('chartGradeLetters');
    if (barEl) {
        const grades = @json($stats['grade_distribution']);
        const barOptions = {
            chart: {
                type: 'bar',
                height: 250,
                fontFamily: 'Sora, sans-serif',
                toolbar: { show: false }
            },
            series: [{
                name: 'Jumlah Peserta',
                data: [grades.A || 0, grades.B || 0, grades.C || 0, grades.D || 0, grades.E || 0]
            }],
            xaxis: {
                categories: ['Predikat A (Sangat Baik)', 'Predikat B (Baik)', 'Predikat C (Cukup)', 'Predikat D (Kurang)', 'Predikat E (Gagal)'],
                labels: {
                    style: { fontSize: '11px' }
                }
            },
            colors: ['#2e33ff'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '40%',
                    distributed: true
                }
            },
            colors: ['#059669', '#2563eb', '#f59e0b', '#f97316', '#e11d48'],
            legend: { show: false },
            dataLabels: { enabled: true }
        };
        new ApexCharts(barEl, barOptions).render();
    }
});
</script>
@endsection

