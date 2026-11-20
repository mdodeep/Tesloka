@extends('layouts.staff')

@section('title', 'Pusat Grafik & Laporan Analisis CBT — TESLOKA')
@section('page-parent', 'Evaluasi & Hasil')
@section('page-title', 'Grafik & Analitik')
@section('page-subtitle', 'Visualisasi psikometri butir soal, distribusi statistik skor ujian, komparasi performa mata pelajaran, dan analisis kelulusan komprehensif.')

@section('page-actions')
    <a href="{{ route('staff.grading.overview') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="award" class="size-4 text-primary"></i>
        <span>Pusat Penilaian</span>
    </a>
    <a href="{{ route('staff.graduation.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <i data-lucide="check-check" class="size-4 text-emerald-600"></i>
        <span>Hasil & Kelulusan</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Top Statistical Metric Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <x-cbt.stat-card 
            title="Total Ujian Terdaftar" 
            value="{{ $stats['total_exams'] }}" 
            subtitle="Paket Ujian Institusi" 
            icon="file-text" 
            color="primary" />
        <x-cbt.stat-card 
            title="Peserta Terevaluasi" 
            value="{{ $stats['total_evaluated_students'] }}" 
            subtitle="Lembar Jawaban Dinilai" 
            icon="users" 
            color="info" />
        <x-cbt.stat-card 
            title="Rata-rata Skor Institusi" 
            value="{{ $stats['overall_avg_score'] }}" 
            subtitle="Rerata Nilai Seluruh Ujian" 
            icon="trending-up" 
            color="teal" />
        <x-cbt.stat-card 
            title="Tingkat Kelulusan" 
            value="{{ $stats['pass_rate'] }}%" 
            subtitle="Tuntas Standar KKM" 
            icon="award" 
            color="success" />
    </div>

    <!-- Interactive Visual Analytics Charts (Grid 2x2) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Chart 1: Histogram Sebaran Rentang Nilai -->
        <x-cbt.card title="Distribusi Rentang Nilai Peserta (Histogram Skor)">
            <div id="chartScoreDistribution" class="w-full min-h-[270px]"></div>
        </x-cbt.card>

        <!-- Chart 2: Donut Chart Rasio Kelulusan -->
        <x-cbt.card title="Rasio Kelulusan Peserta CBT (Lulus vs Remedial)">
            <div id="chartPassFailOverview" class="w-full min-h-[270px] flex items-center justify-center"></div>
        </x-cbt.card>

        <!-- Chart 3: Komparasi Nilai Rata-rata per Ujian -->
        <div class="lg:col-span-2">
            <x-cbt.card title="Perbandingan Nilai Rata-rata Peserta vs Batas Standar KKM per Ujian">
                <div id="chartExamComparison" class="w-full min-h-[300px]"></div>
            </x-cbt.card>
        </div>
    </div>

    <!-- Tabel Ujian & Tautan Analisis Psikometri Terperinci -->
    <x-cbt.card flush title="Daftar Paket Ujian & Analisis Psikometri Butir Soal">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] divide-y divide-default-200/80 text-left text-xs" id="table-reports-overview">
                <thead class="bg-default-50/75 border-b border-default-200/80 text-[11px] font-bold text-default-600 uppercase tracking-wider">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">Kode & Judul Ujian</th>
                        <th class="px-3 py-3 whitespace-nowrap">Mata Pelajaran</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Standar KKM</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Peserta Dinilai</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Status Hasil</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Laporan & Analisis Butir</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse($allExams as $ex)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="ps-4 sm:ps-6 pe-3 py-3.5 font-medium whitespace-nowrap">
                                <x-cbt.badge color="primary" class="font-mono mr-1">
                                    {{ $ex->code }}
                                </x-cbt.badge>
                                <span class="text-default-900 font-bold text-xs">{{ $ex->title }}</span>
                                <div class="text-[11px] text-default-400 mt-0.5">
                                    Tipe: {{ ucfirst($ex->exam_type) }} &bull; Durasi: {{ $ex->duration_minutes }} Menit
                                </div>
                            </td>
                            <td class="px-3 py-3.5 text-default-700 font-medium whitespace-nowrap">
                                {{ $ex->subject->name ?? '-' }}
                            </td>
                            <td class="px-3 py-3.5 text-center font-mono font-bold text-emerald-600 text-sm whitespace-nowrap">
                                {{ $ex->passing_grade ?? 75 }}
                            </td>
                            <td class="px-3 py-3.5 text-center font-bold text-indigo-600 whitespace-nowrap">
                                {{ $ex->graded_count }} Peserta
                            </td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                @if($ex->show_result_on_finish)
                                    <x-cbt.badge color="success">Terpublikasi</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="warning">Draft / Internal</x-cbt.badge>
                                @endif
                            </td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right space-x-1.5 whitespace-nowrap">
                                <a href="{{ route('staff.exams.reports.index', $ex) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded-lg text-xs font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
                                    <i data-lucide="bar-chart-2" class="size-3.5"></i>
                                    <span>Analisis Butir & Psikometri</span>
                                </a>
                                <a href="{{ route('staff.exams.reports.export-csv', $ex) }}" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-card hover:bg-default-100 text-default-600 hover:text-default-900 shadow-2xs transition inline-flex items-center justify-center" title="Unduh CSV Nilai">
                                    <i data-lucide="download" class="size-4"></i>
                                </a>
                                <a href="{{ route('staff.exams.reports.print-official', $ex) }}" target="_blank" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-card hover:bg-default-100 text-default-600 hover:text-default-900 shadow-2xs transition inline-flex items-center justify-center" title="Cetak Berita Acara / Laporan Resmi">
                                    <i data-lucide="printer" class="size-4"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-0">
                                <x-cbt.empty-state :bordered="false" title="Belum Ada Ujian" message="Belum ada ujian terdaftar untuk ditampilkan laporan statistiknya." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between px-4 sm:px-6 py-3 border-t border-default-200/80 text-xs text-default-500 bg-default-50/30">
            <span>Total: <b class="text-default-700 font-semibold">{{ count($allExams) }}</b> paket ujian</span>
        </div>
    </x-cbt.card>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof ApexCharts === 'undefined') return;

    // 1. Histogram Distribusi Nilai
    const scoreDistEl = document.getElementById('chartScoreDistribution');
    if (scoreDistEl) {
        const distData = @json($scoreDistribution);
        const scoreOptions = {
            chart: {
                type: 'bar',
                height: 260,
                fontFamily: 'Sora, sans-serif',
                toolbar: { show: false }
            },
            series: [{
                name: 'Jumlah Peserta',
                data: Object.values(distData)
            }],
            xaxis: {
                categories: ['0 - 50 (Sangat Kurang)', '51 - 70 (Remedial)', '71 - 85 (Tuntas KKM)', '86 - 100 (Unggul)'],
                labels: { style: { fontSize: '11px' } }
            },
            colors: ['#e11d48', '#f59e0b', '#059669', '#2e33ff'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '45%',
                    distributed: true
                }
            },
            legend: { show: false },
            dataLabels: { enabled: true }
        };
        new ApexCharts(scoreDistEl, scoreOptions).render();
    }

    // 2. Donut Rasio Kelulusan
    const passFailEl = document.getElementById('chartPassFailOverview');
    if (passFailEl) {
        const passed = {{ $graduationSummary['passed'] }};
        const remedial = {{ $graduationSummary['remedial'] }};

        if (passed > 0 || remedial > 0) {
            const passFailOptions = {
                chart: {
                    type: 'donut',
                    height: 250,
                    fontFamily: 'Sora, sans-serif'
                },
                series: [passed, remedial],
                labels: ['Lulus (Tuntas KKM)', 'Tidak Lulus / Remedial'],
                colors: ['#059669', '#e11d48'],
                legend: { position: 'bottom', fontSize: '12px' },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Tingkat Kelulusan',
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
            new ApexCharts(passFailEl, passFailOptions).render();
        } else {
            passFailEl.innerHTML = '<div class="text-xs text-default-400 py-12 text-center">Belum ada data nilai ujian peserta.</div>';
        }
    }

    // 3. Bar Chart Komparasi Nilai per Ujian
    const compEl = document.getElementById('chartExamComparison');
    if (compEl) {
        const compData = @json($examComparisons);
        if (compData.length > 0) {
            const titles = compData.map(c => c.title.length > 25 ? c.title.substring(0, 25) + '...' : c.title);
            const avgs = compData.map(c => c.avg_score);
            const kkms = compData.map(c => c.passing_grade);

            const compOptions = {
                chart: {
                    type: 'bar',
                    height: 290,
                    fontFamily: 'Sora, sans-serif',
                    toolbar: { show: false }
                },
                series: [
                    { name: 'Rerata Nilai Siswa', data: avgs },
                    { name: 'Standar KKM', data: kkms }
                ],
                xaxis: {
                    categories: titles,
                    labels: { style: { fontSize: '11px' } }
                },
                colors: ['#2e33ff', '#059669'],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '45%',
                        borderRadius: 3
                    }
                },
                legend: { position: 'top', horizontalAlign: 'right' },
                dataLabels: { enabled: false },
                tooltip: {
                    y: { formatter: (val) => val.toFixed(1) }
                }
            };
            new ApexCharts(compEl, compOptions).render();
        } else {
            compEl.innerHTML = '<div class="text-xs text-default-400 py-12 text-center">Belum ada ujian yang memiliki nilai terkumpul untuk dikomparasi.</div>';
        }
    }
});
</script>
@endsection

