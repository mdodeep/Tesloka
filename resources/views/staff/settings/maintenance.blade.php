@extends('layouts.staff')

@section('title', 'Manajemen Mode Pemeliharaan — TESLOKA CBT')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Kontrol Pemeliharaan Sistem CBT')
@section('page-subtitle', 'Aktivasi mode pemeliharaan dengan proteksi ujian aktif, token rahasia (bypass secret), dan audit terperinci.')

@section('page-actions')
    @if($isDown)
        <span class="inline-flex items-center px-3 py-1.5 rounded text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300 shadow-2xs">
            <span class="size-2 rounded-full bg-amber-500 animate-ping mr-1.5"></span>
            Sedang Pemeliharaan
        </span>
        <form action="{{ route('staff.settings.maintenance.disable') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="btn btn-sm bg-success hover:bg-success-hover text-white flex items-center gap-1.5 cursor-pointer shadow-2xs">
                <i data-lucide="check" class="size-4"></i>
                <span>Buka Sistem</span>
            </button>
        </form>
    @else
        <span class="inline-flex items-center px-3 py-1.5 rounded text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-300 shadow-2xs">
            <span class="size-2 rounded-full bg-emerald-500 mr-1.5"></span>
            Normal (Aktif)
        </span>
    @endif
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Active Exams Safety Guard Notice -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="card rounded-xl border border-default-200/90 p-4 shadow-2xs flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="size-11 rounded-lg bg-primary/10 border border-primary/20 text-primary flex items-center justify-center font-bold shrink-0">
                    <i data-lucide="clock" class="size-5"></i>
                </div>
                <div>
                    <div class="text-xs text-default-500 font-semibold uppercase tracking-wider">Pengerjaan Ujian Sedang Berlangsung</div>
                    <div class="text-xl font-bold {{ $activeAttemptsCount > 0 ? 'text-rose-600' : 'text-default-800' }} mt-0.5">
                        {{ $activeAttemptsCount }} Siswa
                    </div>
                </div>
            </div>
            @if($activeAttemptsCount > 0)
                <span class="px-2.5 py-1 bg-rose-50 text-rose-700 text-[11px] font-semibold rounded-lg border border-rose-200">
                    Perhatian Khusus
                </span>
            @else
                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-[11px] font-semibold rounded-lg border border-emerald-200">
                    Aman
                </span>
            @endif
        </div>

        <div class="card rounded-xl border border-default-200/90 p-4 shadow-2xs flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="size-11 rounded-lg bg-indigo-50 border border-indigo-200 text-indigo-600 flex items-center justify-center font-bold shrink-0">
                    <i data-lucide="calendar" class="size-5"></i>
                </div>
                <div>
                    <div class="text-xs text-default-500 font-semibold uppercase tracking-wider">Sesi Ujian Aktif Saat Ini</div>
                    <div class="text-xl font-bold text-default-800 mt-0.5">{{ $activeSessionsCount }} Sesi</div>
                </div>
            </div>
            <div class="text-right text-xs text-default-400">
                IP Anda: <code class="font-mono text-default-700 bg-default-100 px-2 py-0.5 rounded-md border border-default-200/60">{{ $clientIp }}</code>
            </div>
        </div>
    </div>

    @if($isDown)
        <!-- Current Maintenance Info Box -->
        <x-cbt.card title="Detail Status Mode Pemeliharaan Aktif">
            <div class="space-y-3 text-xs">
                <div class="flex items-center justify-between py-2 border-b border-default-100">
                    <span class="text-default-500">Waktu Diaktifkan:</span>
                    <span class="font-mono font-semibold text-default-800">
                        {{ isset($downData['time']) ? date('d M Y H:i:s', $downData['time']) : '-' }}
                    </span>
                </div>
                <div class="flex items-center justify-between py-2 border-b border-default-100">
                    <span class="text-default-500">Bypass Secret Token:</span>
                    <span class="font-mono font-bold text-primary-600 bg-primary-50 px-2 py-0.5 rounded">
                        {{ $downData['secret'] ?? '-' }}
                    </span>
                </div>
                <div class="flex items-center justify-between py-2 border-b border-default-100">
                    <span class="text-default-500">HTTP Status Code:</span>
                    <span class="font-mono font-semibold text-default-800">{{ $downData['status'] ?? 503 }}</span>
                </div>
                @if(!empty($downData['message']))
                <div class="flex items-center justify-between py-2 border-b border-default-100">
                    <span class="text-default-500">Pesan Pengguna:</span>
                    <span class="font-semibold text-default-800">{{ $downData['message'] }}</span>
                </div>
                @endif
                <div class="flex items-center justify-between py-2 border-b border-default-100">
                    <span class="text-default-500">URL Akses Bypass Manual:</span>
                    @if(!empty($downData['secret']))
                        <a href="{{ url('/' . $downData['secret']) }}" target="_blank" class="font-mono text-blue-600 hover:underline">
                            {{ url('/' . $downData['secret']) }} &rarr;
                        </a>
                    @else
                        <span class="text-default-400">-</span>
                    @endif
                </div>
                <div class="p-3 bg-emerald-50 rounded border border-emerald-200 text-[11px] text-emerald-800 flex items-center gap-2 mt-2">
                    <i data-lucide="info" class="size-4 shrink-0 text-emerald-600"></i>
                    <span><strong>Pengecualian Petugas Aktif:</strong> Portal Staf & Pengawas tetap dapat diakses penuh oleh administrator sehingga Anda dapat memantau dan menonaktifkan pemeliharaan kapan saja.</span>
                </div>
            </div>
        </x-cbt.card>
    @else
        <!-- Activation Form -->
        <x-cbt.card title="Formulir Aktivasi Mode Pemeliharaan">
            <form action="{{ route('staff.settings.maintenance.enable') }}" method="POST" class="space-y-4">
                @csrf

                @if($activeAttemptsCount > 0)
                    <div class="p-4 rounded bg-rose-50 border border-rose-200 text-rose-800 text-xs flex items-start gap-3">
                        <i data-lucide="alert-triangle" class="size-5 shrink-0 text-rose-600 mt-0.5"></i>
                        <div>
                            <strong class="font-bold">PERINGATAN PERLINDUNGAN CBT:</strong>
                            <p class="mt-0.5">Saat ini terdapat {{ $activeAttemptsCount }} pengerjaan ujian siswa yang aktif. Mengaktifkan mode pemeliharaan dapat memutuskan sesi pengerjaan ujian siswa. Centang kotak persetujuan darurat di bawah jika ini adalah perbaikan kritis.</p>
                            <label class="mt-2.5 flex items-center gap-2 cursor-pointer font-semibold text-rose-900">
                                <input type="checkbox" name="confirm_override" value="1" class="rounded border-rose-400 text-rose-600 focus:ring-rose-500">
                                <span>Saya memahami risikonya dan menyetujui pemeliharaan darurat saat ujian berlangsung</span>
                            </label>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5 min-w-0">
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                            Bypass Secret Token <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="secret" value="{{ 'maintenance-admin-' . substr(bin2hex(random_bytes(4)), 0, 8) }}" required
                            class="form-input font-mono">
                        <p class="text-[11px] text-default-500 mt-1">Portal Staf (/staff/*) otomatis dikecualikan. Token ini dan cookie bypass otomatis memungkinkan pengujian portal siswa selama pemeliharaan.</p>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                            HTTP Status Code
                        </label>
                        <select name="status" class="form-select">
                            <option value="503" selected>503 - Service Unavailable (Standar Maintenance)</option>
                            <option value="403">403 - Forbidden</option>
                        </select>
                        <p class="text-[11px] text-default-500 mt-1">Kode status HTTP yang dikirimkan ke peramban siswa.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5 min-w-0">
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                            Pesan Pemberitahuan untuk Pengguna (Opsional)
                        </label>
                        <input type="text" name="message" placeholder="Contoh: Sistem sedang ditingkatkan untuk pemeliharaan terjadwal."
                            class="form-input">
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                            Retry-After Header (Detik)
                        </label>
                        <input type="number" name="retry" value="60" min="10" max="3600"
                            class="form-input font-mono">
                        <p class="text-[11px] text-default-500 mt-1">Perkiraan durasi dalam detik peramban harus mencoba menyegarkan halaman.</p>
                    </div>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="btn btn-sm bg-danger hover:bg-danger-hover text-white flex items-center justify-center gap-2 w-full sm:w-auto cursor-pointer shadow-2xs">
                        <i data-lucide="lock" class="size-4 shrink-0"></i>
                        <span>Aktifkan Mode Pemeliharaan Sekarang</span>
                    </button>
                </div>
            </form>
        </x-cbt.card>
    @endif
</div>
@endsection

