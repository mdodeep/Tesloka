@extends('layouts.staff')

@section('title', 'Dashboard Utama : TESLOKA CBT')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6 w-full">
    <!-- Hero Welcome Banner -->
    <div class="relative overflow-hidden bg-secondary rounded-xl border border-secondary-800 p-6 sm:p-7 text-white shadow-2xs">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2.5 max-w-2xl">
                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-white/10 border border-white/15 text-white/90 text-xs font-medium">
                    <i data-lucide="shield-check" class="size-3.5 text-teal-400"></i>
                    <span>Sistem Evaluasi Terpadu &bull; Produksi Standar</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white tracking-tight">
                    Selamat Datang, {{ auth('staff')->user()->name }}
                </h2>
                <p class="text-xs sm:text-sm text-white/80 leading-relaxed">
                    Pusat komando operasional Computer Based Test (CBT) TESLOKA. Kelola bank soal, jadwalkan sesi ruang, pantau integritas proctoring, dan verifikasi kelulusan terstandar.
                </p>
                <div class="flex flex-wrap gap-2.5 pt-1">
                    <a href="{{ route('staff.sessions.index') }}" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-2 rounded-lg px-3.5 py-2 text-xs font-semibold">
                        <i data-lucide="clock" class="size-4"></i>
                        <span>Pantau Sesi Ujian</span>
                    </a>
                    <a href="{{ route('staff.question-banks.index') }}" class="btn btn-sm bg-white/10 hover:bg-white/20 text-white border border-white/20 inline-flex items-center gap-2 rounded-lg px-3.5 py-2 text-xs font-semibold">
                        <i data-lucide="file-question" class="size-4"></i>
                        <span>Bank Soal &amp; Konten</span>
                    </a>
                </div>
            </div>

            <div class="hidden lg:flex flex-col items-center justify-center p-4 rounded-xl bg-white/5 border border-white/10 text-center min-w-[200px]">
                <span class="text-xs text-default-300 font-semibold uppercase tracking-wider">Kapasitas Maks / Ruang</span>
                <span class="text-3xl sm:text-4xl font-black text-white mt-1">30</span>
                <span class="text-xs text-emerald-400 mt-1 font-bold flex items-center gap-1">
                    <i data-lucide="users" class="size-3.5"></i>
                    <span>Peserta Terjadwal</span>
                </span>
            </div>
        </div>
    </div>

    <!-- Stat Cards (Standardized Unified Metric Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-cbt.stat-card 
            title="Total Peserta Terdaftar" 
            value="{{ number_format($stats['total_students']) }}" 
            subtitle="Siswa &amp; Peserta Ujian" 
            icon="users" 
            color="primary" />

        <x-cbt.stat-card 
            title="Rombel / Kelas Aktif" 
            value="{{ number_format($stats['total_classes']) }}" 
            subtitle="Tahun Ajaran Aktif" 
            icon="graduation-cap" 
            color="secondary" />

        <x-cbt.stat-card 
            title="Bank Soal &amp; Butir" 
            value="{{ number_format($stats['total_questions']) }}" 
            subtitle="Butir Soal Multi-Tipe" 
            icon="file-question" 
            color="success" />

        <x-cbt.stat-card 
            title="Paket Ujian Aktif" 
            value="{{ number_format($stats['total_exams']) }}" 
            subtitle="Siap Dijadwalkan" 
            icon="calendar" 
            color="warning" />
    </div>

    <!-- Quick Navigation Hub: Penilaian, Kelulusan & Grafik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('staff.grading.overview') }}" class="p-4 bg-white hover:bg-default-50/80 border border-default-200/90 rounded-xl shadow-2xs hover:border-default-300 flex items-center justify-between group transition">
            <div class="flex items-center gap-3.5">
                <div class="size-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold">
                    <i data-lucide="award" class="size-5"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-default-800 group-hover:text-primary transition">Pusat Penilaian &amp; Koreksi</h4>
                    <p class="text-xs text-default-500">Penilaian otomatis, esai &amp; rubrik</p>
                </div>
            </div>
            <i data-lucide="chevron-right" class="size-4 text-default-400 group-hover:text-primary transition"></i>
        </a>

        <a href="{{ route('staff.graduation.index') }}" class="p-4 bg-white hover:bg-default-50/80 border border-default-200/90 rounded-xl shadow-2xs hover:border-default-300 flex items-center justify-between group transition">
            <div class="flex items-center gap-3.5">
                <div class="size-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                    <i data-lucide="check-check" class="size-5"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-default-800 group-hover:text-primary transition">Hasil &amp; Kelulusan</h4>
                    <p class="text-xs text-default-500">Rekap KKM, SKL &amp; Sertifikat</p>
                </div>
            </div>
            <i data-lucide="chevron-right" class="size-4 text-default-400 group-hover:text-primary transition"></i>
        </a>

        <a href="{{ route('staff.reports.overview') }}" class="p-4 bg-white hover:bg-default-50/80 border border-default-200/90 rounded-xl shadow-2xs hover:border-default-300 flex items-center justify-between group transition">
            <div class="flex items-center gap-3.5">
                <div class="size-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center font-bold">
                    <i data-lucide="bar-chart-3" class="size-5"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-default-800 group-hover:text-primary transition">Grafik &amp; Analitik CBT</h4>
                    <p class="text-xs text-default-500">Distribusi skor &amp; psikometri</p>
                </div>
            </div>
            <i data-lucide="chevron-right" class="size-4 text-default-400 group-hover:text-primary transition"></i>
        </a>
    </div>

    <!-- Visual Analytics: Grafik Sebaran Nilai & Rasio Kelulusan -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <x-cbt.card title="Distribusi Nilai Peserta CBT (Histogram Skor)" subtitle="Sebaran capaian nilai akhir seluruh peserta ujian">
            <div id="dashboardScoreChart" class="w-full min-h-[260px]"></div>
        </x-cbt.card>

        <x-cbt.card title="Rasio Kelulusan KKM Institusi" subtitle="Persentase peserta tuntas KKM vs butuh perbaikan">
            <div id="dashboardGraduationChart" class="w-full min-h-[260px] flex items-center justify-center"></div>
        </x-cbt.card>
    </div>

    @if(auth('staff')->user()->hasRole('teacher'))
        <!-- Dashboard Khusus Pengajar / Guru -->
        <x-cbt.card title="Ringkasan Aktivitas Pengajar" subtitle="Statistik pembuatan bank soal, paket ujian, dan antrean koreksi esai Anda">
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div class="p-3 bg-default-50 border border-default-200 rounded">
                    <span class="text-xs text-default-500 block">Bank Soal Saya:</span>
                    <strong class="text-lg text-default-800">{{ $teacherStats['my_banks_count'] }}</strong> Bank
                </div>
                <div class="p-3 bg-default-50 border border-default-200 rounded">
                    <span class="text-xs text-default-500 block">Butir Soal Saya:</span>
                    <strong class="text-lg text-default-800">{{ $teacherStats['my_questions_count'] }}</strong> Butir
                </div>
                <div class="p-3 bg-default-50 border border-default-200 rounded">
                    <span class="text-xs text-default-500 block">Ujian Dirancang:</span>
                    <strong class="text-lg text-default-800">{{ $teacherStats['my_exams_count'] }}</strong> Ujian
                </div>
                <div class="p-3 bg-warning/10 border border-warning/20 rounded">
                    <span class="text-xs text-warning block font-semibold">Antrean Koreksi Esai:</span>
                    <div class="flex items-center justify-between mt-1">
                        <strong class="text-lg text-default-800">{{ $teacherStats['pending_essays_count'] }}</strong>
                        <a href="{{ route('staff.exams.index') }}" class="text-xs font-semibold text-primary hover:underline">Periksa &rarr;</a>
                    </div>
                </div>
            </div>
        </x-cbt.card>
    @endif

    @if(auth('staff')->user()->hasRole('proctor') && $proctorSessions->isNotEmpty())
        <!-- Dashboard Khusus Pengawas Ujian -->
        <x-cbt.card title="Penugasan Sesi Ujian Pengawas" subtitle="Sesi ujian aktif yang ditugaskan kepada Anda untuk dipantau secara langsung">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @foreach($proctorSessions as $sess)
                    <div class="p-3 bg-default-50 border border-default-200 rounded flex items-center justify-between gap-3">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 bg-primary/10 text-primary text-[10px] font-bold rounded font-mono">{{ $sess->session_code }}</span>
                                <span class="text-xs font-semibold text-default-800">{{ $sess->name }}</span>
                            </div>
                            <div class="text-xs text-default-500">
                                {{ $sess->exam->title ?? '-' }} &bull; Ruang: <strong>{{ $sess->room->name ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('staff.sessions.camera-grid', $sess) }}" class="btn btn-sm bg-default-800 text-white hover:bg-default-900 rounded">
                                Kamera
                            </a>
                            <a href="{{ route('staff.sessions.show', $sess) }}" class="btn btn-sm bg-primary text-white hover:bg-primary-hover rounded">
                                Pantau
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-cbt.card>
    @endif

    <!-- Recent Audit Logs Table -->
    <x-cbt.card flush title="Aktivitas & Log Audit Sistem Terbaru" subtitle="10 peristiwa akses dan modifikasi data terkini yang tercatat pada PostgreSQL">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-left text-xs divide-y divide-default-200/80">
                <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 text-left whitespace-nowrap">Waktu (WIB)</th>
                        <th class="px-3 py-3 text-left whitespace-nowrap">Pengguna</th>
                        <th class="px-3 py-3 text-left whitespace-nowrap">Jenis Peristiwa</th>
                        <th class="px-3 py-3 text-left font-mono whitespace-nowrap">IP Address</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 text-left whitespace-nowrap">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse ($recentAudits as $log)
                        <tr class="hover:bg-default-50/60 transition-colors">
                            <td class="ps-4 sm:ps-6 pe-3 py-3 font-mono text-default-500 whitespace-nowrap">{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                            <td class="px-3 py-3 font-semibold text-default-800 whitespace-nowrap">{{ $log->user?->name ?? 'Sistem / Tamu' }}</td>
                            <td class="px-3 py-3 whitespace-nowrap">
                                <x-cbt.badge color="slate">{{ $log->event_type }}</x-cbt.badge>
                            </td>
                            <td class="px-3 py-3 font-mono text-default-500 whitespace-nowrap">{{ $log->ip_address ?? '-' }}</td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3 text-default-600 whitespace-nowrap">{{ $log->notes ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-10 px-4 sm:px-6 text-center text-default-400 whitespace-nowrap">
                                <x-cbt.empty-state :bordered="false" title="Belum Ada Catatan Audit" message="Belum ada riwayat aktivitas yang tercatat pada sistem." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-cbt.card>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof ApexCharts === 'undefined') return;

    // 1. Dashboard Score Histogram
    const scoreEl = document.getElementById('dashboardScoreChart');
    if (scoreEl) {
        const scoreData = @json($scoreDistribution);
        const scoreOpt = {
            chart: {
                type: 'bar',
                height: 250,
                fontFamily: 'Sora, sans-serif',
                toolbar: { show: false }
            },
            series: [{
                name: 'Peserta',
                data: Object.values(scoreData)
            }],
            xaxis: {
                categories: ['0 - 50', '51 - 70', '71 - 85', '86 - 100'],
                labels: { style: { fontSize: '11px' } }
            },
            colors: ['#e11d48', '#f59e0b', '#059669', '#2e33ff'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '40%',
                    distributed: true
                }
            },
            legend: { show: false },
            dataLabels: { enabled: true }
        };
        new ApexCharts(scoreEl, scoreOpt).render();
    }

    // 2. Dashboard Graduation Donut
    const gradEl = document.getElementById('dashboardGraduationChart');
    if (gradEl) {
        const passed = {{ $graduationDonut['passed'] }};
        const remedial = {{ $graduationDonut['remedial'] }};

        if (passed > 0 || remedial > 0) {
            const gradOpt = {
                chart: {
                    type: 'donut',
                    height: 250,
                    fontFamily: 'Sora, sans-serif'
                },
                series: [passed, remedial],
                labels: ['Lulus / Tuntas KKM', 'Remedial / Belum Tuntas'],
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
                                    label: 'Kelulusan',
                                    formatter: () => '{{ $graduationDonut['pass_rate'] }}%'
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
            new ApexCharts(gradEl, gradOpt).render();
        } else {
            gradEl.innerHTML = '<div class="text-xs text-default-400 py-12 text-center">Belum ada data nilai peserta untuk dihitung kelulusannya.</div>';
        }
    }
});
</script>
@endsection
