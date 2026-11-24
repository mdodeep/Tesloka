@extends('layouts.staff')

@section('title', 'Dashboard Utama')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6 w-full">
    <!-- Hero Welcome Banner -->
    <div class="relative overflow-hidden rounded-2xl border border-primary/20 p-5 sm:p-6 text-white shadow-sm" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-800) 100%);">
        <div class="pointer-events-none absolute -top-16 -right-16 size-56 rounded-full bg-white/10 blur-2xl"></div>
        <div class="pointer-events-none absolute -bottom-20 left-1/3 size-48 rounded-full bg-white/5 blur-2xl"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-5">
            <div class="space-y-2 max-w-2xl">
                <div class="text-xs font-semibold text-white/85 tracking-wide flex flex-wrap items-center gap-2">
                    <span>{{ $branding['institution_name'] }}</span>
                    <span class="opacity-60">&bull;</span>
                    <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white tracking-tight">
                    Selamat Datang, {{ auth('staff')->user()->name }}
                </h2>
                <p class="text-xs sm:text-sm text-white/85 leading-relaxed">
                    Kelola bank soal, jadwalkan sesi ruang, pantau pengawasan ujian, dan terbitkan hasil evaluasi institusi secara terpadu.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2.5 shrink-0">
                @if(auth('staff')->user()->hasRole(['admin', 'super_admin', 'institution_admin', 'teacher', 'proctor', 'exam_coordinator', 'academic_coordinator', 'academic_operator', 'technical_officer', 'helpdesk_officer', 'auditor']))
                    <a href="{{ route('staff.sessions.index') }}" class="btn btn-sm bg-white text-primary hover:bg-white/95 shadow-xs inline-flex items-center gap-2 rounded-lg px-4 py-2.5 text-xs font-bold transition">
                        <i data-lucide="clock" class="size-4"></i>
                        <span>Pantau Sesi Ujian</span>
                    </a>
                @endif
                @if(auth('staff')->user()->hasRole(['admin', 'super_admin', 'institution_admin', 'teacher', 'exam_coordinator', 'academic_coordinator', 'approver']))
                    <a href="{{ route('staff.question-banks.index') }}" class="btn btn-sm bg-white/15 hover:bg-white/25 text-white border border-white/25 inline-flex items-center gap-2 rounded-lg px-4 py-2.5 text-xs font-semibold transition">
                        <i data-lucide="file-question" class="size-4"></i>
                        <span>Bank Soal &amp; Konten</span>
                    </a>
                @endif
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
    @if(auth('staff')->user()->hasRole(['admin', 'super_admin', 'institution_admin', 'teacher', 'academic_coordinator', 'exam_coordinator', 'grader', 'grading_moderator', 'approver', 'auditor', 'academic_operator']))
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if(auth('staff')->user()->hasRole(['admin', 'super_admin', 'institution_admin', 'teacher', 'exam_coordinator', 'grader', 'grading_moderator', 'approver']))
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
            @endif

            @if(auth('staff')->user()->hasRole(['admin', 'super_admin', 'institution_admin', 'teacher', 'academic_coordinator', 'exam_coordinator', 'grading_moderator', 'approver', 'auditor', 'academic_operator']))
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
                            <h4 class="text-sm font-bold text-default-800 group-hover:text-primary transition">Grafik &amp; Analitik</h4>
                            <p class="text-xs text-default-500">Distribusi skor &amp; psikometri</p>
                        </div>
                    </div>
                    <i data-lucide="chevron-right" class="size-4 text-default-400 group-hover:text-primary transition"></i>
                </a>
            @endif
        </div>
    @endif

    <!-- Visual Analytics: Grafik Sebaran Nilai & Rasio Kelulusan -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <x-cbt.card title="Distribusi Nilai Peserta (Histogram Skor)" subtitle="Sebaran capaian nilai akhir seluruh peserta ujian">
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
