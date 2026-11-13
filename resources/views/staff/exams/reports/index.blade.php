@extends('layouts.staff')

@section('title', 'Laporan Analisis & Statistik Ujian — ' . $exam->title)
@section('page-parent', 'Konten & Ujian')
@section('page-title', 'Laporan & Analitik')

@section('content')
<div class="space-y-6 w-full">

    <!-- Top Action Banner -->
    <div class="bg-slate-900 text-white rounded-md p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-2 flex-wrap mb-1">
                <span class="px-2.5 py-1 bg-primary text-white text-xs font-bold rounded uppercase shadow-xs">
                    {{ $exam->exam_type }}
                </span>
                <span class="text-xs text-default-400">Kode: <strong class="text-white">{{ $exam->code }}</strong></span>
                <span class="text-xs text-default-400">KKM: <strong class="text-emerald-400">{{ $exam->passing_grade ?? 75 }}</strong></span>
            </div>
            <h2 class="text-2xl font-bold">Laporan Psikometri & Analisis Ujian</h2>
            <p class="text-xs text-default-400 mt-1">
                Analisis Daya Pembeda, Tingkat Kesukaran Butir Soal, Distribusi Statistik Skor, dan Rekomendasi Remedial.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 w-full md:w-auto">
            <a href="{{ route('staff.exams.reports.export-csv', $exam) }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded text-xs font-semibold transition inline-flex items-center justify-center gap-1.5 shadow-sm w-full sm:w-auto">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>Ekspor CSV Nilai</span>
            </a>

            <a href="{{ route('staff.exams.reports.print-official', $exam) }}" target="_blank" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded text-xs font-semibold transition inline-flex items-center justify-center gap-1.5 border border-slate-700 w-full sm:w-auto">
                <svg class="w-4 h-4 text-slate-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                <span>Cetak Laporan Resmi</span>
            </a>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="border-b border-default-200 overflow-x-auto scrollbar-none -mx-3.5 px-3.5 sm:mx-0 sm:px-0">
        <nav class="flex gap-2 sm:gap-4 min-w-max pb-0.5">
            <button type="button" onclick="switchReportTab('item-analysis')" class="tab-btn active py-3 px-2 sm:px-1 border-b-2 border-primary font-bold text-xs text-primary whitespace-nowrap" data-tab="item-analysis">
                Analisis Butir Soal & Psikometri
            </button>
            <button type="button" onclick="switchReportTab('statistics')" class="tab-btn py-3 px-2 sm:px-1 border-b-2 border-transparent font-medium text-xs text-default-500 hover:text-default-700 whitespace-nowrap" data-tab="statistics">
                Statistik & Distribusi Skor
            </button>
            <button type="button" onclick="switchReportTab('remedial')" class="tab-btn py-3 px-2 sm:px-1 border-b-2 border-transparent font-medium text-xs text-default-500 hover:text-default-700 whitespace-nowrap" data-tab="remedial">
                Peserta Remedial ({{ $remedialStudents->count() }})
            </button>
        </nav>
    </div>

    <!-- Tab 1: Item Analysis -->
    <div id="tab-item-analysis" class="tab-content space-y-6">
        @php
            $diffCounts = [
                'Mudah' => collect($itemAnalysis)->where('difficulty_category', 'Mudah')->count(),
                'Sedang' => collect($itemAnalysis)->where('difficulty_category', 'Sedang')->count(),
                'Sukar' => collect($itemAnalysis)->where('difficulty_category', 'Sukar')->count(),
            ];
            $discCounts = [
                'Sangat Baik' => collect($itemAnalysis)->where('discrimination_category', 'Sangat Baik')->count(),
                'Baik' => collect($itemAnalysis)->where('discrimination_category', 'Baik')->count(),
                'Cukup' => collect($itemAnalysis)->where('discrimination_category', 'Cukup')->count(),
                'Perlu Revisi' => collect($itemAnalysis)->whereNotIn('discrimination_category', ['Sangat Baik', 'Baik', 'Cukup'])->count(),
            ];
        @endphp

        <!-- Visual Analytics ApexCharts: Difficulty & Discrimination -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-cbt.card title="Distribusi Tingkat Kesukaran Soal (Facility Index)">
                <div id="difficultyApexChart" class="w-full min-h-[250px] flex items-center justify-center"></div>
            </x-cbt.card>

            <x-cbt.card title="Kualitas Daya Pembeda Butir Soal (Discrimination Index)">
                <div id="discriminationApexChart" class="w-full min-h-[250px]"></div>
            </x-cbt.card>
        </div>

        <x-cbt.card title="Karakteristik Psikometrik Butir Soal Ujian">
            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[780px] text-left text-xs border-collapse">
                    <thead>
                        <tr class="border-b border-default-200 bg-default-50 text-default-600 font-semibold uppercase tracking-wider text-[11px]">
                            <th class="py-3 px-3.5 w-12 text-center whitespace-nowrap">No</th>
                            <th class="py-3 px-3.5 whitespace-nowrap">Kode Soal</th>
                            <th class="py-3 px-3.5 whitespace-nowrap">Tipe Soal</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Bobot</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Indeks Kesukaran (P)</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Tingkat Kesukaran</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Daya Pembeda (D)</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Kategori Pembeda</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Benar / Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($itemAnalysis as $idx => $item)
                            <tr class="hover:bg-default-50 transition">
                                <td class="py-3 px-3.5 text-center font-bold text-default-500 whitespace-nowrap">{{ $idx + 1 }}</td>
                                <td class="py-3 px-3.5 font-mono font-bold text-default-800 whitespace-nowrap">{{ $item['question_code'] }}</td>
                                <td class="py-3 px-3.5 uppercase text-default-600 font-mono whitespace-nowrap">{{ $item['question_type'] }}</td>
                                <td class="py-3 px-3.5 text-center font-bold whitespace-nowrap">{{ number_format($item['weight'], 1) }}</td>
                                <td class="py-3 px-3.5 text-center font-mono font-bold whitespace-nowrap">{{ number_format($item['facility_index'], 3) }}</td>
                                <td class="py-3 px-3.5 text-center whitespace-nowrap">
                                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold whitespace-nowrap {{ $item['difficulty_category'] === 'Sukar' ? 'bg-rose-100 text-rose-800' : ($item['difficulty_category'] === 'Sedang' ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800') }}">
                                        {{ $item['difficulty_category'] }}
                                    </span>
                                </td>
                                <td class="py-3 px-3.5 text-center font-mono font-bold whitespace-nowrap">{{ number_format($item['discrimination_index'], 3) }}</td>
                                <td class="py-3 px-3.5 text-center whitespace-nowrap">
                                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold whitespace-nowrap {{ $item['discrimination_category'] === 'Sangat Baik' ? 'bg-emerald-100 text-emerald-800' : ($item['discrimination_category'] === 'Baik' ? 'bg-blue-100 text-blue-800' : ($item['discrimination_category'] === 'Cukup' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800')) }}">
                                        {{ $item['discrimination_category'] }}
                                    </span>
                                </td>
                                <td class="py-3 px-3.5 text-center font-mono text-default-600 whitespace-nowrap">
                                    {{ $item['correct_count'] }} / {{ $item['total_answers'] }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-8 text-default-400 whitespace-nowrap">
                                    Belum ada data pengerjaan peserta yang mencukupi untuk analisis butir soal.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-cbt.card>
    </div>

    <!-- Tab 2: Statistics & Distribution -->
    <div id="tab-statistics" class="tab-content hidden space-y-6">
        <!-- 6 Metrics Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            <div class="bg-white border border-default-200 rounded p-4 shadow-sm text-center">
                <span class="block text-2xl font-black text-default-800">{{ $statistics['count'] }}</span>
                <span class="text-xs text-default-500 font-medium">Siswa Terdata</span>
            </div>
            <div class="bg-white border border-blue-200 rounded p-4 shadow-sm text-center">
                <span class="block text-2xl font-black text-blue-600">{{ number_format($statistics['mean'], 1) }}</span>
                <span class="text-xs text-blue-700 font-medium">Mean (Rata-rata)</span>
            </div>
            <div class="bg-white border border-default-200 rounded p-4 shadow-sm text-center">
                <span class="block text-2xl font-black text-default-700">{{ number_format($statistics['median'], 1) }}</span>
                <span class="text-xs text-default-500 font-medium">Median (Nilai Tengah)</span>
            </div>
            <div class="bg-white border border-default-200 rounded p-4 shadow-sm text-center">
                <span class="block text-2xl font-black text-default-700">{{ number_format($statistics['mode'], 1) }}</span>
                <span class="text-xs text-default-500 font-medium">Modus</span>
            </div>
            <div class="bg-white border border-purple-200 rounded p-4 shadow-sm text-center">
                <span class="block text-2xl font-black text-purple-600">{{ number_format($statistics['std_dev'], 2) }}</span>
                <span class="text-xs text-purple-700 font-medium">Standar Deviasi (&sigma;)</span>
            </div>
            <div class="bg-white border border-emerald-200 rounded p-4 shadow-sm text-center">
                <span class="block text-2xl font-black text-emerald-600">{{ number_format($statistics['range'], 1) }}</span>
                <span class="text-xs text-emerald-700 font-medium">Rentang Nilai (Range)</span>
            </div>
        </div>

        <!-- Interactive Visual Analytics Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Score Distribution Bar Chart -->
            <div class="lg:col-span-2">
                <x-cbt.card title="Visualisasi Distribusi Sebaran Nilai (Histogram)">
                    <div id="scoreDistributionApexChart" class="w-full min-h-[260px]"></div>
                </x-cbt.card>
            </div>

            <!-- Pass / Remedial Donut Chart -->
            <div>
                <x-cbt.card title="Rasio Kelulusan KKM ({{ $exam->passing_grade ?? 75 }})">
                    <div id="passFailDonutApexChart" class="w-full min-h-[260px] flex items-center justify-center"></div>
                </x-cbt.card>
            </div>
        </div>

        <!-- Score Distribution Frequency Table -->
        <x-cbt.card title="Tabel Distribusi Frekuensi Sebaran Nilai Peserta">
            <div class="space-y-3 pt-2">
                @foreach($statistics['distribution'] as $range => $freq)
                    @php
                        $pct = $statistics['count'] > 0 ? round(($freq / $statistics['count']) * 100, 1) : 0;
                    @endphp
                    <div class="space-y-1 text-xs">
                        <div class="flex items-center justify-between text-default-700">
                            <span class="font-mono font-bold w-20">Rentang {{ $range }}:</span>
                            <span class="font-semibold">{{ $freq }} Siswa ({{ $pct }}%)</span>
                        </div>
                        <div class="w-full bg-default-100 h-2.5 rounded-full overflow-hidden">
                            <div class="bg-primary h-2.5 rounded-full transition-all duration-500" style="width: {{ $pct }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-cbt.card>
    </div>

    <!-- Tab 3: Remedial Students -->
    <div id="tab-remedial" class="tab-content hidden space-y-4">
        <x-cbt.card title="Daftar Siswa Rekomendasi Program Remedial (Di Bawah KKM {{ $exam->passing_grade ?? 75 }})">
            <div class="overflow-x-auto -mx-3.5 sm:mx-0">
                <table class="w-full min-w-[760px] text-left text-xs border-collapse">
                    <thead>
                        <tr class="border-b border-default-200 bg-default-50 text-default-600 font-semibold uppercase tracking-wider text-[11px]">
                            <th class="py-3 px-3.5 w-12 text-center whitespace-nowrap">No</th>
                            <th class="py-3 px-3.5 whitespace-nowrap">Nama Peserta</th>
                            <th class="py-3 px-3.5 whitespace-nowrap">NISN</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Skor Diperoleh</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Persentase</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Selisih ke KKM</th>
                            <th class="py-3 px-3.5 text-center whitespace-nowrap">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($remedialStudents as $idx => $rem)
                            @php
                                $diff = ($exam->passing_grade ?? 75) - $rem->percentage;
                            @endphp
                            <tr class="hover:bg-default-50 transition">
                                <td class="py-3 px-3.5 text-center font-bold text-default-500 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="py-3 px-3.5 font-bold text-default-900 whitespace-nowrap">{{ $rem->student->name }}</td>
                                <td class="py-3 px-3.5 font-mono text-default-500 whitespace-nowrap">{{ $rem->student->nisn ?? $rem->student->username }}</td>
                                <td class="py-3 px-3.5 text-center font-mono font-bold whitespace-nowrap">{{ number_format($rem->total_score, 1) }}</td>
                                <td class="py-3 px-3.5 text-center font-bold text-rose-600 whitespace-nowrap">{{ number_format($rem->percentage, 1) }}%</td>
                                <td class="py-3 px-3.5 text-center font-mono text-amber-600 whitespace-nowrap">-{{ number_format($diff, 1) }}%</td>
                                <td class="py-3 px-3.5 text-center whitespace-nowrap">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-800 whitespace-nowrap">
                                        Wajib Remedial
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-8 text-emerald-600 font-semibold whitespace-nowrap">
                                    Luar biasa! Seluruh peserta ujian ini berhasil mencapai nilai di atas batas KKM.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-cbt.card>
    </div>
</div>

<script>
    let distributionChart = null;
    let passFailChart = null;
    let difficultyChart = null;
    let discriminationChart = null;

    function initItemAnalysisCharts() {
        if (typeof ApexCharts === 'undefined') return;

        // Difficulty Donut Chart
        const diffEl = document.getElementById('difficultyApexChart');
        if (diffEl && !difficultyChart) {
            const diffData = @json(array_values($diffCounts));
            const diffLabels = @json(array_keys($diffCounts));
            const totalItems = diffData.reduce((a, b) => a + b, 0);

            if (totalItems > 0) {
                const diffOptions = {
                    chart: { type: 'donut', height: 250, fontFamily: 'Sora, sans-serif' },
                    series: diffData,
                    labels: diffLabels,
                    colors: ['#3b82f6', '#10b981', '#ef4444'],
                    legend: { position: 'bottom', fontSize: '11px' },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%',
                                labels: {
                                    show: true,
                                    total: { show: true, label: 'Butir Soal', formatter: () => totalItems }
                                }
                            }
                        }
                    }
                };
                difficultyChart = new ApexCharts(diffEl, diffOptions);
                difficultyChart.render();
            } else {
                diffEl.innerHTML = '<div class="text-xs text-default-400 py-8">Belum ada data butir soal.</div>';
            }
        }

        // Discrimination Bar Chart
        const discEl = document.getElementById('discriminationApexChart');
        if (discEl && !discriminationChart) {
            const discData = @json(array_values($discCounts));
            const discLabels = @json(array_keys($discCounts));
            const totalDisc = discData.reduce((a, b) => a + b, 0);

            if (totalDisc > 0) {
                const discOptions = {
                    chart: { type: 'bar', height: 250, fontFamily: 'Sora, sans-serif', toolbar: { show: false } },
                    series: [{ name: 'Butir Soal', data: discData }],
                    colors: ['#10b981'],
                    plotOptions: {
                        bar: {
                            borderRadius: 4,
                            horizontal: true,
                            distributed: true,
                            colors: {
                                ranges: [
                                    { from: 0, to: 0, color: '#10b981' },
                                    { from: 1, to: 1, color: '#3b82f6' },
                                    { from: 2, to: 2, color: '#f59e0b' },
                                    { from: 3, to: 3, color: '#ef4444' }
                                ]
                            }
                        }
                    },
                    dataLabels: { enabled: true, style: { fontSize: '11px' } },
                    xaxis: { categories: discLabels, labels: { style: { fontSize: '11px' } } },
                    legend: { show: false }
                };
                discriminationChart = new ApexCharts(discEl, discOptions);
                discriminationChart.render();
            } else {
                discEl.innerHTML = '<div class="text-xs text-default-400 py-8">Belum ada data butir soal.</div>';
            }
        }
    }

    function initCharts() {
        if (typeof ApexCharts === 'undefined') return;

        // Distribution Histogram / Column Chart
        const distEl = document.getElementById('scoreDistributionApexChart');
        if (distEl && !distributionChart) {
            const categories = @json(array_keys($statistics['distribution']));
            const dataValues = @json(array_values($statistics['distribution']));

            const distOptions = {
                chart: {
                    type: 'bar',
                    height: 260,
                    fontFamily: 'Sora, sans-serif',
                    toolbar: { show: false }
                },
                series: [{
                    name: 'Jumlah Peserta',
                    data: dataValues
                }],
                colors: ['#2e33ff'],
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        columnWidth: '50%',
                        distributed: false,
                        dataLabels: { position: 'top' }
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -20,
                    style: { fontSize: '11px', colors: ['#475569'] }
                },
                xaxis: {
                    categories: categories.map(c => 'Rentang ' + c),
                    labels: { style: { fontSize: '11px', colors: '#64748b' } },
                    axisBorder: { show: false },
                    axisTicks: { show: false }
                },
                yaxis: {
                    title: { text: 'Peserta', style: { fontSize: '11px', color: '#64748b' } },
                    labels: { style: { fontSize: '11px', colors: '#64748b' } }
                },
                grid: { borderColor: '#f1f5f9' },
                tooltip: {
                    y: { formatter: (val) => val + ' Siswa' }
                }
            };
            distributionChart = new ApexCharts(distEl, distOptions);
            distributionChart.render();
        }

        // Pass / Remedial Donut Chart
        const donutEl = document.getElementById('passFailDonutApexChart');
        if (donutEl && !passFailChart) {
            const passedCount = {{ $results->where('is_passed', true)->count() }};
            const remedialCount = {{ $results->where('is_passed', false)->count() }};

            const donutOptions = {
                chart: {
                    type: 'donut',
                    height: 260,
                    fontFamily: 'Sora, sans-serif'
                },
                series: [passedCount, remedialCount],
                labels: ['Lulus (≥ KKM)', 'Remedial (< KKM)'],
                colors: ['#10b981', '#f43f5e'],
                legend: { position: 'bottom', fontSize: '11px' },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total',
                                    fontSize: '12px',
                                    formatter: () => {{ $results->count() }}
                                }
                            }
                        }
                    }
                },
                dataLabels: { enabled: true }
            };
            passFailChart = new ApexCharts(donutEl, donutOptions);
            passFailChart.render();
        }
    }

    function switchReportTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById(`tab-${tabId}`).classList.remove('hidden');

        document.querySelectorAll('.tab-btn').forEach(btn => {
            if (btn.dataset.tab === tabId) {
                btn.className = 'tab-btn active py-3 px-1 border-b-2 border-primary font-bold text-xs text-primary';
            } else {
                btn.className = 'tab-btn py-3 px-1 border-b-2 border-transparent font-medium text-xs text-default-500 hover:text-default-700';
            }
        });

        if (tabId === 'item-analysis') {
            setTimeout(initItemAnalysisCharts, 60);
        } else if (tabId === 'statistics') {
            setTimeout(initCharts, 60);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        initItemAnalysisCharts();
        const activeTab = document.querySelector('.tab-btn.active');
        if (activeTab && activeTab.dataset.tab === 'statistics') {
            initCharts();
        }
    });
</script>
@endsection

