@extends('layouts.staff')

@section('title', 'Laporan Analisis & Statistik Ujian : ' . $exam->title)
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
            <a href="{{ route('staff.exams.reports.export-csv', $exam) }}" class="btn btn-sm bg-emerald-600 hover:bg-emerald-500 text-white font-semibold transition inline-flex items-center justify-center gap-1.5 shadow-xs w-full sm:w-auto">
                <i data-lucide="file-spreadsheet" class="size-4 shrink-0"></i>
                <span>Ekspor CSV Nilai</span>
            </a>

            <a href="{{ route('staff.exams.reports.export-pdf', $exam) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold transition inline-flex items-center justify-center gap-1.5 shadow-xs w-full sm:w-auto" title="Unduh Berkas PDF Asli Laporan Resmi">
                <i data-lucide="download" class="size-4 shrink-0"></i>
                <span>Unduh PDF Asli</span>
            </a>

            <a href="{{ route('staff.exams.reports.print-official', $exam) }}" target="_blank" class="btn btn-sm bg-slate-800 hover:bg-slate-700 text-white font-semibold transition inline-flex items-center justify-center gap-1.5 border border-slate-700 w-full sm:w-auto">
                <i data-lucide="printer" class="size-4 shrink-0 text-slate-300"></i>
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

        <x-cbt.card flush title="Karakteristik Psikometrik Butir Soal Ujian">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[780px] divide-y divide-default-200/80 text-left text-xs" id="table-exam-psychometrics">
                    <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                        <tr>
                            <th class="ps-4 sm:ps-6 pe-3 py-3 w-12 text-center whitespace-nowrap">No</th>
                            <th class="px-3 py-3 whitespace-nowrap">Kode Soal</th>
                            <th class="px-3 py-3 whitespace-nowrap">Tipe Soal</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Bobot</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Indeks Kesukaran (P)</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Tingkat Kesukaran</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Rasch Logit (b)</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Model Fit (MNSQ)</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Daya Pembeda (D)</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Kategori Pembeda</th>
                            <th class="ps-3 pe-4 sm:pe-6 py-3 text-center whitespace-nowrap">Benar / Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200/70">
                        @forelse($itemAnalysis as $idx => $item)
                            <tr class="hover:bg-default-50/80 transition">
                                <td class="ps-4 sm:ps-6 pe-3 py-3.5 text-center font-bold text-default-500 whitespace-nowrap">{{ $idx + 1 }}</td>
                                <td class="px-3 py-3.5 font-mono font-bold text-default-800 whitespace-nowrap">{{ $item['question_code'] }}</td>
                                <td class="px-3 py-3.5 uppercase text-default-600 font-mono whitespace-nowrap">{{ $item['question_type'] }}</td>
                                <td class="px-3 py-3.5 text-center font-bold whitespace-nowrap">{{ number_format($item['weight'], 1) }}</td>
                                <td class="px-3 py-3.5 text-center font-mono font-bold whitespace-nowrap">{{ number_format($item['facility_index'], 3) }}</td>
                                <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold whitespace-nowrap {{ $item['difficulty_category'] === 'Sukar' ? 'bg-rose-100 text-rose-800' : ($item['difficulty_category'] === 'Sedang' ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800') }}">
                                        {{ $item['difficulty_category'] }}
                                    </span>
                                </td>
                                <td class="px-3 py-3.5 text-center font-mono font-bold whitespace-nowrap">
                                    <span class="{{ $item['rasch_difficulty_logit'] > 0 ? 'text-rose-600' : 'text-emerald-600' }}">
                                        {{ ($item['rasch_difficulty_logit'] > 0 ? '+' : '') . number_format($item['rasch_difficulty_logit'], 3) }}
                                    </span>
                                </td>
                                <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold whitespace-nowrap {{ $item['rasch_fit_color'] === 'emerald' ? 'bg-emerald-100 text-emerald-800' : ($item['rasch_fit_color'] === 'blue' ? 'bg-blue-100 text-blue-800' : ($item['rasch_fit_color'] === 'amber' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800')) }}" title="Outfit MNSQ: {{ number_format($item['rasch_outfit_mnsq'], 3) }}">
                                        {{ number_format($item['rasch_outfit_mnsq'], 2) }} ({{ $item['rasch_fit_category'] }})
                                    </span>
                                </td>
                                <td class="px-3 py-3.5 text-center font-mono font-bold whitespace-nowrap">{{ number_format($item['discrimination_index'], 3) }}</td>
                                <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold whitespace-nowrap {{ $item['discrimination_category'] === 'Sangat Baik' ? 'bg-emerald-100 text-emerald-800' : ($item['discrimination_category'] === 'Baik' ? 'bg-blue-100 text-blue-800' : ($item['discrimination_category'] === 'Cukup' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800')) }}">
                                        {{ $item['discrimination_category'] }}
                                    </span>
                                </td>
                                <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-center font-mono text-default-600 whitespace-nowrap">
                                    {{ $item['correct_count'] }} / {{ $item['total_answers'] }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="p-0">
                                    <x-cbt.empty-state :bordered="false" title="Belum Ada Data Analisis Butir" message="Belum ada data pengerjaan peserta yang mencukupi untuk analisis butir soal." />
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-cbt.card>

        <!-- Matriks Efektivitas Pengecoh / Distraktor (FULL-FEATURE 35.4) -->
        <x-cbt.card flush title="Matriks Analisis Efektivitas Pengecoh / Distraktor (Distractor Analysis)" subtitle="Evaluasi pilihan ganda: Pola sebaran pilihan Kelompok Atas (Upper 27%) vs Kelompok Bawah (Lower 27%)">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] divide-y divide-default-200/80 text-left text-xs" id="table-exam-distractors">
                    <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                        <tr>
                            <th class="ps-4 sm:ps-6 pe-3 py-3 w-12 text-center whitespace-nowrap">No</th>
                            <th class="px-3 py-3 whitespace-nowrap">Kode &amp; Cuplikan Soal</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Opsi</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Kel. Atas (27%)</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Kel. Bawah (27%)</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Total Pemilih</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Persentase</th>
                            <th class="ps-3 pe-4 sm:pe-6 py-3 text-center whitespace-nowrap">Status Keberfungsian Pengecoh</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200/70">
                        @php $hasDistractors = false; @endphp
                        @foreach($itemAnalysis as $idx => $item)
                            @if(!empty($item['distractors']))
                                @php $hasDistractors = true; @endphp
                                @foreach($item['distractors'] as $optIdx => $dist)
                                    <tr class="hover:bg-default-50/80 transition {{ $dist['is_correct'] ? 'bg-emerald-50/30' : '' }}">
                                        @if($optIdx === 0)
                                            <td rowspan="{{ count($item['distractors']) }}" class="ps-4 sm:ps-6 pe-3 py-3.5 text-center font-bold text-default-700 align-top border-r border-default-100 whitespace-nowrap">
                                                {{ $idx + 1 }}
                                            </td>
                                            <td rowspan="{{ count($item['distractors']) }}" class="px-3 py-3.5 align-top border-r border-default-100">
                                                <div class="font-mono font-bold text-default-900">{{ $item['question_code'] }}</div>
                                                <p class="text-[11px] text-default-500 line-clamp-2 mt-0.5">{{ strip_tags($item['question_content']) }}</p>
                                            </td>
                                        @endif
                                        <td class="px-3 py-2.5 text-center whitespace-nowrap font-mono font-bold {{ $dist['is_correct'] ? 'text-emerald-700' : 'text-default-700' }}">
                                            {{ $dist['option_key'] }}
                                            @if($dist['is_correct'])
                                                <i data-lucide="check" class="size-3 text-emerald-600 inline ml-0.5"></i>
                                            @endif
                                        </td>
                                        <td class="px-3 py-2.5 text-center font-mono font-semibold text-default-700 whitespace-nowrap">
                                            {{ $dist['upper_count'] }}
                                        </td>
                                        <td class="px-3 py-2.5 text-center font-mono font-semibold text-default-700 whitespace-nowrap">
                                            {{ $dist['lower_count'] }}
                                        </td>
                                        <td class="px-3 py-2.5 text-center font-mono font-bold text-default-900 whitespace-nowrap">
                                            {{ $dist['selected_count'] }}
                                        </td>
                                        <td class="px-3 py-2.5 text-center whitespace-nowrap">
                                            <div class="inline-flex items-center gap-1.5">
                                                <span class="font-mono text-xs">{{ $dist['percentage'] }}%</span>
                                                <div class="w-12 bg-default-100 h-1.5 rounded-full overflow-hidden hidden sm:block">
                                                    <div class="h-1.5 rounded-full {{ $dist['is_correct'] ? 'bg-emerald-500' : 'bg-primary' }}" style="width: {{ min(100, $dist['percentage']) }}%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="ps-3 pe-4 sm:pe-6 py-2.5 text-center whitespace-nowrap">
                                            @if($dist['status_color'] === 'emerald')
                                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                    Kunci Jawaban
                                                </span>
                                            @elseif($dist['status_color'] === 'indigo')
                                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-indigo-100 text-indigo-800 border border-indigo-200">
                                                    Pengecoh Efektif
                                                </span>
                                            @elseif($dist['status_color'] === 'rose')
                                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-800 border border-rose-200" title="Lebih banyak mengecoh siswa kelompok atas daripada kelompok bawah">
                                                    Menyesatkan (Revisi)
                                                </span>
                                            @else
                                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200" title="Pemilih kurang dari 5% peserta">
                                                    Kurang Berfungsi (&lt; 5%)
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        @if(!$hasDistractors)
                            <tr>
                                <td colspan="8" class="p-0">
                                    <x-cbt.empty-state :bordered="false" title="Belum Ada Data Pengecoh" message="Belum ada data pengerjaan pilihan ganda untuk matriks analisis pengecoh." />
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </x-cbt.card>
    </div>

    <!-- Tab 2: Statistics & Distribution -->
    <div id="tab-statistics" class="tab-content hidden space-y-6">
        <!-- 6 Metrics Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            <div class="bg-white border border-default-200/90 rounded-xl p-4 shadow-2xs text-center">
                <span class="block text-2xl font-black text-default-800">{{ $statistics['count'] }}</span>
                <span class="text-xs text-default-500 font-medium">Siswa Terdata</span>
            </div>
            <div class="bg-white border border-primary/20 rounded-xl p-4 shadow-2xs text-center">
                <span class="block text-2xl font-black text-primary">{{ number_format($statistics['mean'], 1) }}</span>
                <span class="text-xs text-primary font-medium">Mean (Rata-rata)</span>
            </div>
            <div class="bg-white border border-default-200/90 rounded-xl p-4 shadow-2xs text-center">
                <span class="block text-2xl font-black text-default-700">{{ number_format($statistics['median'], 1) }}</span>
                <span class="text-xs text-default-500 font-medium">Median (Nilai Tengah)</span>
            </div>
            <div class="bg-white border border-default-200/90 rounded-xl p-4 shadow-2xs text-center">
                <span class="block text-2xl font-black text-default-700">{{ number_format($statistics['mode'], 1) }}</span>
                <span class="text-xs text-default-500 font-medium">Modus</span>
            </div>
            <div class="bg-white border border-purple-200 rounded-xl p-4 shadow-2xs text-center">
                <span class="block text-2xl font-black text-purple-600">{{ number_format($statistics['std_dev'], 2) }}</span>
                <span class="text-xs text-purple-700 font-medium">Standar Deviasi (&sigma;)</span>
            </div>
            <div class="bg-white border border-emerald-200 rounded-xl p-4 shadow-2xs text-center">
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
        <x-cbt.card flush title="Daftar Siswa Rekomendasi Program Remedial (Di Bawah KKM {{ $exam->passing_grade ?? 75 }})">
            @slot('actions')
                @if($remedialStudents->isNotEmpty())
                    <a href="{{ route('staff.exams.remedial', $exam) }}" class="btn btn-sm bg-amber-600 hover:bg-amber-700 text-white font-semibold shadow-xs transition inline-flex items-center gap-1.5 cursor-pointer">
                        <i data-lucide="refresh-cw" class="size-4"></i>
                        <span>Jadwalkan Ujian Remedial ({{ $remedialStudents->count() }} Siswa)</span>
                    </a>
                @endif
            @endslot
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px] divide-y divide-default-200/80 text-left text-xs" id="table-exam-remedials">
                    <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                        <tr>
                            <th class="ps-4 sm:ps-6 pe-3 py-3 w-12 text-center whitespace-nowrap">No</th>
                            <th class="px-3 py-3 whitespace-nowrap">Nama Peserta</th>
                            <th class="px-3 py-3 whitespace-nowrap">NISN</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Skor Diperoleh</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Persentase</th>
                            <th class="px-3 py-3 text-center whitespace-nowrap">Selisih ke KKM</th>
                            <th class="ps-3 pe-4 sm:pe-6 py-3 text-center whitespace-nowrap">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200/70">
                        @forelse($remedialStudents as $idx => $rem)
                            @php
                                $diff = ($exam->passing_grade ?? 75) - $rem->percentage;
                            @endphp
                            <tr class="hover:bg-default-50/80 transition">
                                <td class="ps-4 sm:ps-6 pe-3 py-3.5 text-center font-bold text-default-500 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-3 py-3.5 font-bold text-default-900 whitespace-nowrap">{{ $rem->student->name }}</td>
                                <td class="px-3 py-3.5 font-mono text-default-500 whitespace-nowrap">{{ $rem->student->nisn ?? $rem->student->username }}</td>
                                <td class="px-3 py-3.5 text-center font-mono font-bold whitespace-nowrap">{{ number_format($rem->total_score, 1) }}</td>
                                <td class="px-3 py-3.5 text-center font-bold text-rose-600 whitespace-nowrap">{{ number_format($rem->percentage, 1) }}%</td>
                                <td class="px-3 py-3.5 text-center font-mono text-amber-600 whitespace-nowrap">-{{ number_format($diff, 1) }}%</td>
                                <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-center whitespace-nowrap">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-800 whitespace-nowrap">
                                        Wajib Remedial
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-0">
                                    <x-cbt.empty-state :bordered="false" title="Seluruh Peserta Tuntas" message="Luar biasa! Seluruh peserta ujian ini berhasil mencapai nilai di atas batas KKM." />
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

