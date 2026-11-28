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
                <span class="text-xs text-default-400">
                    @if(!($exam->has_passing_grade ?? true) || $exam->isCertification())
                        Mode: <strong class="text-teal-300">Tanpa KKM (Sertifikasi)</strong>
                    @else
                        KKM: <strong class="text-emerald-400">{{ $exam->passing_grade ?? 75 }}</strong>
                    @endif
                </span>
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

            <a href="{{ route('staff.exams.reports.print-official', $exam) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm bg-slate-800 hover:bg-slate-700 text-white font-semibold transition inline-flex items-center justify-center gap-1.5 border border-slate-700 w-full sm:w-auto">
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

        <!-- Ringkasan Reliabilitas KR-20 & Panduan Psikometri -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            <div class="bg-white border border-default-200/90 rounded-xl p-4 shadow-2xs flex flex-col justify-between">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-default-500 block">Reliabilitas Tes (KR-20)</span>
                    <div class="text-3xl font-black text-primary mt-1 font-mono">
                        {{ $insights['kr20'] !== null ? number_format($insights['kr20'], 3) : '-' }}
                    </div>
                </div>
                <div class="mt-2">
                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-{{ $insights['kr20_color'] ?? 'slate' }}-100 text-{{ $insights['kr20_color'] ?? 'slate' }}-800">
                        {{ $insights['kr20_label'] ?? 'Menunggu Sampel' }}
                    </span>
                </div>
            </div>
            <div class="lg:col-span-3 p-4 rounded-xl bg-sky-50/70 border border-sky-200/80 text-xs text-sky-900 space-y-1.5 leading-relaxed">
                <strong class="block text-xs uppercase tracking-wider text-sky-950">Cara Membaca Grafik &amp; Tabel Psikometri Butir Soal:</strong>
                <ul class="list-disc list-inside space-y-1 text-[11.5px]">
                    <li><strong>Reliabilitas (KR-20):</strong> Mengukur konsistensi internal soal secara keseluruhan (ideal <strong>&ge; 0.70</strong>; skor &ge; 0.80 menandakan instrumen ujian sangat ajeg).</li>
                    <li><strong>Indeks Kesukaran (P):</strong> Proporsi peserta yang menjawab benar. Rentang <strong>0.30 - 0.70 (Sedang)</strong> paling ideal; di bawah 0.30 berarti sukar, di atas 0.70 berarti mudah.</li>
                    <li><strong>Daya Pembeda (D):</strong> Kemampuan soal membedakan peserta paham dan belum paham. Nilai <strong>&ge; 0.30 Baik</strong>; nilai <strong>&lt; 0.20 atau negatif</strong> menandakan butir soal/kunci jawaban perlu ditinjau ulang.</li>
                    <li><strong>Rasch Fit (MNSQ):</strong> Kesesuaian pola jawaban dengan teori respons butir (ideal <strong>0.70 - 1.30</strong>). Di atas 1.50 berarti banyak tebakan acak / ambiguitas soal.</li>
                </ul>
            </div>
        </div>

        <!-- Visual Analytics ApexCharts: Difficulty, Discrimination, Scatter & Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-cbt.card title="Distribusi Tingkat Kesukaran Soal (Facility Index)">
                <p class="text-[11px] text-default-500 mb-2">Cara baca: Ujian seimbang umumnya didominasi kategori <strong>Sedang (hijau)</strong> dengan porsi soal Mudah dan Sukar yang terukur.</p>
                <div id="difficultyApexChart" class="w-full min-h-[250px] flex items-center justify-center"></div>
            </x-cbt.card>

            <x-cbt.card title="Kualitas Daya Pembeda Butir Soal (Discrimination Index)">
                <p class="text-[11px] text-default-500 mb-2">Cara baca: Perhatikan kategori <strong>Perlu Revisi (merah)</strong>; soal pada kelompok tersebut gagal membedakan siswa kelompok atas dan bawah.</p>
                <div id="discriminationApexChart" class="w-full min-h-[250px]"></div>
            </x-cbt.card>

            <x-cbt.card title="Peta Kuadran Kualitas Butir: Kesukaran (P) vs Daya Pembeda (D)">
                <p class="text-[11px] text-default-500 mb-2">Cara baca: Titik ideal berada di tengah-atas (<strong>P: 0.30 - 0.70</strong> dan <strong>D &ge; 0.30</strong>). Titik di bagian paling bawah (D &lt; 0.20) sebaiknya direvisi.</p>
                <div id="psychometricScatterChart" class="w-full min-h-[260px]"></div>
            </x-cbt.card>

            <x-cbt.card title="Rata-rata Akurasi per Seksi / Kategori Soal">
                <p class="text-[11px] text-default-500 mb-2">Cara baca: Membandingkan persentase jawaban benar antar seksi (mis. Listening, Structure, Reading) maupun komposisi perangkat peserta.</p>
                <div id="sectionAccuracyChart" class="w-full min-h-[260px]"></div>
            </x-cbt.card>
        </div>

        @if(! empty($itemAnalysis))
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <x-cbt.card title="5 Soal Paling Sukar">
                    <ul class="space-y-2 text-xs">
                        @foreach($insights['hardest_items'] ?? [] as $hi)
                            <li class="flex items-center justify-between gap-2 pb-1.5 border-b border-default-100 last:border-0">
                                <span class="font-mono font-bold text-default-800 truncate">{{ $hi['question_code'] }}</span>
                                <span class="px-2 py-0.5 rounded bg-rose-50 text-rose-700 font-mono text-[11px] shrink-0">P = {{ number_format($hi['facility_index'], 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </x-cbt.card>
                <x-cbt.card title="5 Butir Pembeda Terbaik">
                    <ul class="space-y-2 text-xs">
                        @foreach($insights['best_items'] ?? [] as $bi)
                            <li class="flex items-center justify-between gap-2 pb-1.5 border-b border-default-100 last:border-0">
                                <span class="font-mono font-bold text-default-800 truncate">{{ $bi['question_code'] }}</span>
                                <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-mono text-[11px] shrink-0">D = {{ number_format($bi['discrimination_index'], 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </x-cbt.card>
                <x-cbt.card title="Butir Disarankan untuk Revisi ({{ count($insights['revision_items'] ?? []) }})">
                    <ul class="space-y-2 text-xs max-h-44 overflow-y-auto">
                        @forelse(array_slice($insights['revision_items'] ?? [], 0, 5) as $ri)
                            <li class="flex items-center justify-between gap-2 pb-1.5 border-b border-default-100 last:border-0">
                                <span class="font-mono font-bold text-default-800 truncate">{{ $ri['question_code'] }}</span>
                                <span class="px-2 py-0.5 rounded bg-amber-50 text-amber-800 font-mono text-[10px] shrink-0">P={{ number_format($ri['facility_index'], 2) }} / D={{ number_format($ri['discrimination_index'], 2) }}</span>
                            </li>
                        @empty
                            <li class="text-emerald-700 font-semibold">Seluruh butir memenuhi ambang kualitas minimal.</li>
                        @endforelse
                    </ul>
                </x-cbt.card>
            </div>
        @endif

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
            <div class="p-3.5 sm:px-6 border-b border-default-200/80 bg-sky-50/70 text-xs text-sky-900 leading-relaxed">
                <strong>Cara Membaca Tabel Pengecoh:</strong> Pengecoh (opsi salah) berfungsi baik apabila dipilih oleh minimal 5% peserta dan <strong>lebih banyak menarik Kelompok Bawah (27%) dibanding Kelompok Atas (27%)</strong>. Jika pengecoh bertanda merah (<em>Menyesatkan</em>), siswa pintar lebih banyak tertipu opsi tersebut daripada kunci jawaban; periksa kejelasan redaksi atau kunci soal.
            </div>
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
        <div class="p-3.5 rounded-xl bg-sky-50/70 border border-sky-200/80 text-xs text-sky-900 leading-relaxed">
            <strong>Cara Membaca Statistik &amp; Histogram Skor:</strong> Jika <strong>Mean &lt; Median</strong>, distribusi condong ke kanan (banyak nilai tinggi); bila <strong>Standar Deviasi (&sigma;)</strong> kecil, kemampuan peserta relatif merata, sedangkan &sigma; besar menunjukkan kesenjangan skor lebar antar peserta.
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Score Distribution Bar Chart -->
            <div class="lg:col-span-2">
                <x-cbt.card title="Visualisasi Distribusi Sebaran Nilai (Histogram)">
                    <div id="scoreDistributionApexChart" class="w-full min-h-[260px]"></div>
                </x-cbt.card>
            </div>

            <!-- Pass / Remedial Donut Chart -->
            <div>
                <x-cbt.card :title="!($exam->requiresPassingGrade()) ? 'Rasio Evaluasi (Mode Tanpa KKM)' : 'Rasio Kelulusan KKM (' . ($exam->passing_grade ?? 75) . ')'">
                    <div id="passFailDonutApexChart" class="w-full min-h-[260px] flex items-center justify-center"></div>
                </x-cbt.card>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-cbt.card title="Rerata Durasi Pengerjaan vs Hasil (Menit)">
                <p class="text-[11px] text-default-500 mb-2">Cara baca: Membandingkan rata-rata waktu penyelesaian ujian peserta yang Lulus terhadap peserta Remedial agar evaluator melihat apakah durasi ujian terlalu sempit atau peserta terburu-buru.</p>
                <div id="durationOutcomeChart" class="w-full min-h-[230px]"></div>
            </x-cbt.card>

            <x-cbt.card title="Statistik Perangkat Peserta pada Ujian Ini">
                <p class="text-[11px] text-default-500 mb-2">Cara baca: Melihat distribusi jenis perangkat peserta beserta rata-rata skor capaian pada masing-masing tipe perangkat.</p>
                <div id="examDeviceStatsChart" class="w-full min-h-[230px]"></div>
            </x-cbt.card>
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
        <x-cbt.card flush :title="(!($exam->has_passing_grade ?? true) || $exam->isCertification()) ? 'Daftar Evaluasi Remedial (Mode Tanpa KKM / Sertifikasi)' : 'Daftar Siswa Rekomendasi Program Remedial (Di Bawah KKM ' . ($exam->passing_grade ?? 75) . ')'">
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
                                $targetKkm = (float) ($exam->passing_grade ?? 75);
                                $isScaledExam = ($exam->score_scale ?? 'standard_100') !== 'standard_100' || $targetKkm > 100;
                                $achievedScore = (float) ($isScaledExam ? ($rem->effective_score ?? $rem->total_score) : $rem->percentage);
                                $diff = max(0, $targetKkm - $achievedScore);
                            @endphp
                            <tr class="hover:bg-default-50/80 transition">
                                <td class="ps-4 sm:ps-6 pe-3 py-3.5 text-center font-bold text-default-500 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-3 py-3.5 font-bold text-default-900 whitespace-nowrap">{{ $rem->student->name }}</td>
                                <td class="px-3 py-3.5 font-mono text-default-500 whitespace-nowrap">{{ $rem->student->nisn ?? $rem->student->username }}</td>
                                <td class="px-3 py-3.5 text-center font-mono font-bold whitespace-nowrap">{{ number_format($rem->effective_score ?? $rem->total_score, $isScaledExam ? 0 : 1) }}</td>
                                <td class="px-3 py-3.5 text-center font-bold text-rose-600 whitespace-nowrap">{{ number_format($rem->percentage, 1) }}%</td>
                                <td class="px-3 py-3.5 text-center font-mono text-amber-700 whitespace-nowrap">-{{ number_format($diff, $isScaledExam ? 0 : 1) }}{{ $isScaledExam ? '' : '%' }}</td>
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
    let scatterChart = null;
    let sectionAccChart = null;
    let durationChart = null;
    let examDeviceChart = null;

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

        // Scatter P vs D
        const scatterEl = document.getElementById('psychometricScatterChart');
        if (scatterEl && !scatterChart) {
            const rawItems = @json($itemAnalysis ?? []);
            if (rawItems.length > 0) {
                const points = rawItems.map(it => ({
                    x: Number(it.facility_index || 0),
                    y: Number(it.discrimination_index || 0)
                }));
                scatterChart = new ApexCharts(scatterEl, {
                    chart: { type: 'scatter', height: 250, fontFamily: 'Sora, sans-serif', toolbar: { show: false } },
                    series: [{ name: 'Butir Soal (P, D)', data: points }],
                    xaxis: { min: 0, max: 1, title: { text: 'Indeks Kesukaran (P)', style: { fontSize: '11px' } } },
                    yaxis: { min: -0.5, max: 1, title: { text: 'Daya Pembeda (D)', style: { fontSize: '11px' } } },
                    colors: ['#2e33ff']
                });
                scatterChart.render();
            } else {
                scatterEl.innerHTML = '<div class="text-xs text-default-400 py-8 text-center">Belum ada sampel pengerjaan untuk peta kuadran butir.</div>';
            }
        }

        // Section Category Accuracy
        const secAccEl = document.getElementById('sectionAccuracyChart');
        if (secAccEl && !sectionAccChart) {
            const secData = @json($insights['section_breakdown'] ?? []);
            if (secData.length > 0) {
                sectionAccChart = new ApexCharts(secAccEl, {
                    chart: { type: 'bar', height: 250, fontFamily: 'Sora, sans-serif', toolbar: { show: false } },
                    series: [{ name: 'Akurasi Benar (%)', data: secData.map(s => s.avg_accuracy) }],
                    xaxis: { categories: secData.map(s => `${s.label} (${s.question_count} soal)`), labels: { style: { fontSize: '10px' } } },
                    yaxis: { max: 100 },
                    colors: ['#14bba6'],
                    plotOptions: { bar: { borderRadius: 4, columnWidth: '45%' } },
                    dataLabels: { enabled: true, formatter: v => v + '%' }
                });
                sectionAccChart.render();
            } else {
                secAccEl.innerHTML = '<div class="text-xs text-default-400 py-8 text-center">Belum ada butir soal dengan kategori seksi bahasa (Listening, Structure, Reading).</div>';
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

        // Duration vs Outcome Chart
        const durEl = document.getElementById('durationOutcomeChart');
        if (durEl && !durationChart) {
            const durStats = @json($insights['duration_stats'] ?? []);
            if ((durStats.completed_samples || 0) > 0) {
                durationChart = new ApexCharts(durEl, {
                    chart: { type: 'bar', height: 220, fontFamily: 'Sora, sans-serif', toolbar: { show: false } },
                    series: [{ name: 'Rata-rata Menit', data: [durStats.avg_all_minutes || 0, durStats.avg_passed_minutes || 0, durStats.avg_remedial_minutes || 0] }],
                    xaxis: { categories: ['Semua Peserta', 'Peserta Lulus', 'Peserta Remedial'] },
                    colors: ['#2e33ff', '#10b981', '#e11d48'],
                    plotOptions: { bar: { distributed: true, borderRadius: 4, columnWidth: '45%' } },
                    legend: { show: false },
                    dataLabels: { enabled: true, formatter: v => v + ' mnt' }
                });
                durationChart.render();
            } else {
                durEl.innerHTML = '<div class="text-xs text-default-400 py-8 text-center">Belum ada peserta yang menyelesaikan ujian untuk statistik durasi.</div>';
            }
        }

        // Device Stats for This Exam
        const devExamEl = document.getElementById('examDeviceStatsChart');
        if (devExamEl && !examDeviceChart) {
            const devList = @json($insights['device_stats'] ?? []);
            if (devList.length > 0) {
                examDeviceChart = new ApexCharts(devExamEl, {
                    chart: { type: 'bar', height: 220, fontFamily: 'Sora, sans-serif', toolbar: { show: false } },
                    series: [
                        { name: 'Jumlah Peserta', data: devList.map(d => d.count) },
                        { name: 'Rerata Skor', data: devList.map(d => d.avg_score) }
                    ],
                    xaxis: { categories: devList.map(d => d.label) },
                    colors: ['#14213d', '#14bba6'],
                    plotOptions: { bar: { borderRadius: 4, columnWidth: '45%' } },
                    legend: { position: 'top' }
                });
                examDeviceChart.render();
            } else {
                devExamEl.innerHTML = '<div class="text-xs text-default-400 py-8 text-center">Belum ada data perangkat peserta pada ujian ini.</div>';
            }
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

