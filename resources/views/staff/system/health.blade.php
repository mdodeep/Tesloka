@extends('layouts.staff')

@section('title', 'Kesehatan Sistem & Observabilitas — TESLOKA CBT')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Kesehatan Sistem')
@section('page-subtitle', 'Pemantauan real-time infrastruktur database, cache, antrean queue, kapasitas penyimpanan, dan audit produksi.')

@section('page-actions')
    @if($health['is_production_ready'])
        <span class="px-3 py-1.5 bg-emerald-100 text-emerald-800 text-xs font-bold rounded inline-flex items-center gap-1.5 shadow-2xs">
            <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
            Sistem Siap Operasional
        </span>
    @else
        <span class="px-3 py-1.5 bg-rose-100 text-rose-800 text-xs font-bold rounded inline-flex items-center gap-1.5 shadow-2xs">
            <span class="size-2 rounded-full bg-rose-500 animate-ping"></span>
            Perlu Perhatian ({{ $health['critical_failures_count'] }} Isu Kritis)
        </span>
    @endif
    <button id="btnRefreshHealth" onclick="window.location.reload()" class="btn btn-sm bg-white border border-default-200 hover:bg-default-50 text-default-700 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition cursor-pointer">
        <i data-lucide="refresh-cw" class="size-3.5 text-default-500"></i>
        <span>Perbarui</span>
    </button>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Metric Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- PostgreSQL DB -->
        <div class="p-4 bg-white border border-default-200 rounded shadow-xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-default-500">PostgreSQL Database</span>
                <span class="px-2 py-0.5 {{ $health['db']['status'] === 'healthy' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }} text-[10px] font-bold rounded">
                    {{ strtoupper($health['db']['status']) }}
                </span>
            </div>
            <div class="text-2xl font-black text-default-900 tracking-tight">
                {{ $health['db']['latency'] }} <span class="text-xs font-normal text-default-500">ms</span>
            </div>
            <div class="text-[11px] text-default-500 truncate" title="{{ $health['db']['version'] }}">
                {{ Str::limit($health['db']['version'], 30) }}
            </div>
        </div>

        <!-- Redis & Cache -->
        <div class="p-4 bg-white border border-default-200 rounded shadow-xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-default-500">Cache & Memory Store</span>
                <span class="px-2 py-0.5 {{ $health['cache']['status'] === 'healthy' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }} text-[10px] font-bold rounded">
                    {{ strtoupper($health['cache']['status']) }}
                </span>
            </div>
            <div class="text-2xl font-black text-default-900 tracking-tight">
                {{ $health['cache']['latency'] }} <span class="text-xs font-normal text-default-500">ms</span>
            </div>
            <div class="text-[11px] text-default-500">
                RAM Terpakai: <strong>{{ $health['server']['memory_mb'] }} MB</strong> (Peak: {{ $health['server']['memory_peak_mb'] }} MB)
            </div>
        </div>

        <!-- Background Queue -->
        <div class="p-4 bg-white border border-default-200 rounded shadow-xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-default-500">Background Queue</span>
                <span class="px-2 py-0.5 {{ $health['queue']['status'] === 'healthy' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }} text-[10px] font-bold rounded">
                    {{ strtoupper($health['queue']['status']) }}
                </span>
            </div>
            <div class="text-2xl font-black text-default-900 tracking-tight">
                {{ $health['queue']['failed_jobs'] }} <span class="text-xs font-normal text-default-500">failed</span>
            </div>
            <div class="text-[11px] text-default-500">
                Pekerjaan antrean gagal terkontrol
            </div>
        </div>

        <!-- Disk Storage -->
        <div class="p-4 bg-white border border-default-200 rounded shadow-xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-default-500">Kapasitas Disk Storage</span>
                <span class="px-2 py-0.5 {{ $health['disk']['status'] === 'healthy' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }} text-[10px] font-bold rounded">
                    {{ $health['disk']['used_percentage'] }}%
                </span>
            </div>
            <div class="text-2xl font-black text-default-900 tracking-tight">
                {{ $health['disk']['free_gb'] }} <span class="text-xs font-normal text-default-500">GB Free</span>
            </div>
            <div class="w-full bg-default-100 rounded-full h-1.5">
                <div class="bg-primary h-1.5 rounded-full" style="width: {{ min(100, $health['disk']['used_percentage']) }}%"></div>
            </div>
        </div>
    </div>

    <!-- Pre-Flight Checklist Table -->
    <x-cbt.card title="Audit Kesiapan Sistem Sebelum Production">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[700px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-system-health">
                <thead class="bg-default-50/75 border-y border-default-200/80">
                    <tr class="text-[11px] font-semibold uppercase tracking-wider text-default-500 whitespace-nowrap">
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Komponen Diperiksa</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Kategori</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Detail & Hasil Diagnosis</th>
                        <th class="py-3 px-4 border-b border-default-200 text-right whitespace-nowrap">Status Kesiapan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @foreach($health['preflight'] as $item)
                        <tr class="hover:bg-default-50/50 transition">
                            <td class="py-3 px-4 font-semibold text-default-900 whitespace-nowrap">
                                {{ $item['name'] }}
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                @if($item['critical'])
                                    <x-cbt.badge color="danger">Wajib (Kritis)</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="secondary">Standar</x-cbt.badge>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-default-600 min-w-[200px]">
                                {{ $item['detail'] }}
                            </td>
                            <td class="py-3 px-4 text-right whitespace-nowrap">
                                @if($item['status'] === 'passed')
                                    <x-cbt.badge color="success">
                                        <i data-lucide="check" class="size-3.5 mr-1 inline-block"></i>
                                        Lolos
                                    </x-cbt.badge>
                                @elseif($item['status'] === 'warning')
                                    <x-cbt.badge color="warning">
                                        Peringatan
                                    </x-cbt.badge>
                                @else
                                    <x-cbt.badge color="danger">
                                        Gagal Kritis
                                    </x-cbt.badge>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between px-4 py-3 border-t border-default-200 dark:border-white/14 text-xs text-default-500 bg-default-50/30">
            <span>Total: <b class="text-default-700 font-semibold">{{ count($health['preflight']) }}</b> komponen kesiapan diperiksa</span>
        </div>
    </x-cbt.card>

    <!-- Informasi Lingkungan Server -->
    <div class="p-4 bg-default-50 border border-default-200 rounded">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-xs">
            <div>
                <span class="text-default-400 block font-medium">PHP Version:</span>
                <strong class="text-default-800 font-mono">{{ $health['server']['php_version'] }}</strong>
            </div>
            <div>
                <span class="text-default-400 block font-medium">Sistem Operasi Host:</span>
                <strong class="text-default-800">{{ $health['server']['os'] }}</strong>
            </div>
            <div>
                <span class="text-default-400 block font-medium">Lingkungan (APP_ENV):</span>
                <strong class="text-default-800 font-mono uppercase">{{ $health['server']['app_env'] }}</strong>
            </div>
            <div>
                <span class="text-default-400 block font-medium">Waktu Server Resmi:</span>
                <strong class="text-default-800 font-mono">{{ $health['server']['server_time'] }}</strong>
            </div>
        </div>
    </div>
</div>
@endsection

