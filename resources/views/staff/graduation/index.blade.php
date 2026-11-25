@extends('layouts.staff')

@section('title', 'Pusat Hasil & Kelulusan Siswa')
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
        <span>Grafik & Analitik</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Metric Overview Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        <x-cbt.stat-card 
            title="Total Dinilai" 
            value="{{ $stats['total_evaluated'] }}" 
            subtitle="Seluruh Nilai Akhir" 
            icon="users" 
            color="primary" />
        <x-cbt.stat-card 
            title="Lulus / Tuntas KKM" 
            value="{{ $stats['total_passed'] }}" 
            subtitle="Memenuhi KKM" 
            icon="check-circle-2" 
            color="success" />
        <x-cbt.stat-card 
            title="Tidak Lulus / Remedial" 
            value="{{ $stats['total_remedial'] }}" 
            subtitle="Di Bawah Batas KKM" 
            icon="alert-triangle" 
            color="danger" />
        <x-cbt.stat-card 
            title="Tingkat Lulus" 
            value="{{ $stats['pass_rate'] }}%" 
            subtitle="Rasio Lulus Institusi" 
            icon="percent" 
            color="teal" />
        <x-cbt.stat-card 
            title="Skor Rata-rata" 
            value="{{ $stats['avg_score'] }}" 
            subtitle="Rerata Nilai Siswa" 
            icon="trending-up" 
            color="info" />
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
                <button type="submit" class="btn btn-sm w-full py-2 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded-lg shadow-2xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer">
                    <i data-lucide="filter" class="size-4"></i>
                    <span>Filter</span>
                </button>
                @if(request()->hasAny(['exam_id', 'status', 'search']))
                    <a href="{{ route('staff.graduation.index') }}" class="btn btn-icon size-9 rounded-lg border border-default-200/90 bg-card hover:bg-default-100 text-default-700 text-xs font-semibold transition inline-flex items-center justify-center" title="Reset Filter">
                        <i data-lucide="rotate-ccw" class="size-4"></i>
                    </a>
                @endif
            </div>
        </form>
    </x-cbt.card>

    <!-- Results Table -->
    <x-cbt.card flush title="Rekapitulasi Hasil Kelulusan & Yudisium Peserta">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[850px] divide-y divide-default-200/80 text-left text-xs" id="table-graduation">
                <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 text-center w-12 whitespace-nowrap">No</th>
                        <th class="px-3 py-3 whitespace-nowrap">Nama Siswa / Peserta</th>
                        <th class="px-3 py-3 whitespace-nowrap">Ujian & Mata Pelajaran</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Skor Akhir</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Capaian (%)</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">KKM</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Predikat</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Status Kelulusan</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Dokumen Kelulusan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse($results as $index => $res)
                        <tr class="hover:bg-default-50/60 transition-colors">
                            <td class="ps-4 sm:ps-6 pe-3 py-3.5 text-center text-default-500 font-medium whitespace-nowrap">
                                {{ $results->firstItem() + $index }}
                            </td>
                            <td class="px-3 py-3.5 font-bold text-default-900 whitespace-nowrap">
                                <div>{{ $res->student->name ?? '-' }}</div>
                                <div class="text-[11px] font-mono font-normal text-default-500 mt-0.5">
                                    {{ $res->student->identity_number ?? $res->student->username ?? '-' }}
                                </div>
                            </td>
                            <td class="px-3 py-3.5 text-default-800 whitespace-nowrap">
                                <span class="font-bold text-xs">{{ $res->exam->title ?? '-' }}</span>
                                <div class="text-[11px] text-default-400 mt-0.5">
                                    {{ $res->exam->subject->name ?? '-' }} &bull; Kode: {{ $res->exam->code ?? '-' }}
                                </div>
                            </td>
                            <td class="px-3 py-3.5 text-center font-mono font-bold text-default-800 text-sm whitespace-nowrap">
                                {{ number_format($res->total_score, 1) }} <span class="text-default-400 text-xs">/ {{ number_format($res->max_score, 1) }}</span>
                            </td>
                            <td class="px-3 py-3.5 text-center font-bold text-default-800 whitespace-nowrap">
                                {{ number_format($res->percentage, 1) }}%
                            </td>
                            <td class="px-3 py-3.5 text-center font-mono font-semibold whitespace-nowrap">
                                @if($res->exam && (!($res->exam->has_passing_grade ?? true) || $res->exam->isCertification()))
                                    <span class="text-slate-400 font-normal text-xs">Tanpa KKM</span>
                                @else
                                    <span class="text-emerald-600">{{ number_format($res->passing_grade, 1) }}</span>
                                @endif
                            </td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                <x-cbt.badge color="{{ $res->final_grade_letter === 'A' ? 'success' : ($res->final_grade_letter === 'B' ? 'info' : ($res->final_grade_letter === 'C' ? 'warning' : 'danger')) }}" class="font-black font-mono">
                                    {{ $res->final_grade_letter ?? '-' }}
                                </x-cbt.badge>
                            </td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                @if($res->exam && (!($res->exam->has_passing_grade ?? true) || $res->exam->isCertification()))
                                    <x-cbt.badge color="info">
                                        <i data-lucide="award" class="size-3"></i>
                                        <span>TERSERTIFIKASI</span>
                                    </x-cbt.badge>
                                @elseif($res->is_passed)
                                    <x-cbt.badge color="success">
                                        <i data-lucide="check" class="size-3"></i>
                                        <span>LULUS</span>
                                    </x-cbt.badge>
                                @else
                                    <x-cbt.badge color="danger">
                                        <i data-lucide="x" class="size-3"></i>
                                        <span>REMEDIAL</span>
                                    </x-cbt.badge>
                                @endif
                            </td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right space-x-1 whitespace-nowrap">
                                <a href="{{ route('staff.graduation.skl', $res) }}" target="_blank" rel="noopener noreferrer" class="px-2.5 py-1.5 bg-white hover:bg-default-50 text-default-700 border border-default-200/90 rounded-lg text-xs font-semibold inline-flex items-center gap-1 shadow-2xs transition" title="Cetak Surat Keterangan Lulus (SKL)">
                                    <i data-lucide="file-text" class="size-3.5 text-primary"></i>
                                    <span>SKL</span>
                                </a>

                                <a href="{{ route('staff.graduation.certificate', $res) }}" target="_blank" rel="noopener noreferrer" class="px-2.5 py-1.5 bg-white hover:bg-default-50 text-default-700 border border-default-200/90 rounded-lg text-xs font-semibold inline-flex items-center gap-1 shadow-2xs transition" title="Cetak Sertifikat Kelulusan">
                                    <i data-lucide="award" class="size-3.5 text-amber-600"></i>
                                    <span>Sertifikat</span>
                                </a>

                                <a href="{{ route('staff.graduation.transcript', $res) }}" target="_blank" rel="noopener noreferrer" class="px-2.5 py-1.5 bg-white hover:bg-default-50 text-default-700 border border-default-200/90 rounded-lg text-xs font-semibold inline-flex items-center gap-1 shadow-2xs transition" title="Cetak Transkrip SKHU">
                                    <i data-lucide="scroll" class="size-3.5 text-indigo-600"></i>
                                    <span>Transkrip</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-12 px-4 sm:px-6 text-default-400">
                                <x-cbt.empty-state :bordered="false" title="Belum Ada Hasil Kelulusan" message="Belum ada data hasil kelulusan yang sesuai dengan filter yang dipilih." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($results->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 sm:px-6 py-3.5 border-t border-default-200/80 bg-default-50/30">
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

