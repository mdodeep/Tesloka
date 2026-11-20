@extends('layouts.staff')

@section('title', 'Log & Riwayat Pengiriman Email — TESLOKA CBT')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Log Pengiriman Email')
@section('page-subtitle', 'Pemantauan status pengiriman pesan transaksional keluar (sent, failed, pending).')

@section('page-actions')
    <a href="{{ route('staff.settings.smtp.index') }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="settings" class="size-4 text-default-500"></i>
        <span>Pengaturan SMTP</span>
    </a>
    <a href="{{ route('staff.settings.notification-templates.index') }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="mail" class="size-4 text-default-500"></i>
        <span>Template Pesan</span>
    </a>
@endsection

@section('content')
<div class="space-y-6">

    <!-- KPI Stats -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <x-cbt.stat-card 
            title="Total Pesan" 
            value="{{ $stats['total'] }}" 
            subtitle="Seluruh Log Transaksional" 
            icon="mail" 
            color="primary" />
        <x-cbt.stat-card 
            title="Berhasil (Sent)" 
            value="{{ $stats['sent'] }}" 
            subtitle="Diterima Mail Server" 
            icon="check-circle-2" 
            color="success" />
        <x-cbt.stat-card 
            title="Gagal (Failed)" 
            value="{{ $stats['failed'] }}" 
            subtitle="Kendala Jaringan / SMTP" 
            icon="x-circle" 
            color="danger" />
        <x-cbt.stat-card 
            title="Dalam Antrean" 
            value="{{ $stats['pending'] }}" 
            subtitle="Menunggu Pengiriman" 
            icon="clock" 
            color="warning" />
    </div>

    <!-- Filter Form -->
    <x-cbt.card>
        <form method="GET" class="flex flex-col sm:flex-row items-center gap-3">
            <div class="flex-1 w-full min-w-0">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan email tujuan atau subjek..." class="form-input">
            </div>
            <div class="w-full sm:w-48 min-w-0">
                <select name="status" class="form-select">
                    <option value="">-- Semua Status --</option>
                    <option value="sent" {{ request('status') === 'sent' ? 'selected' : '' }}>Terkirim (Sent)</option>
                    <option value="failed" {{ request('status') === 'failed' ? 'selected' : '' }}>Gagal (Failed)</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
            <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover rounded-lg shadow-2xs text-xs font-semibold px-4 inline-flex items-center gap-1.5 cursor-pointer">
                <i data-lucide="filter" class="size-4"></i>
                <span>Filter</span>
            </button>
            <a href="{{ route('staff.settings.notification-logs.index') }}" class="btn btn-icon size-9 border border-default-200/90 bg-card hover:bg-default-100 text-default-700 rounded-lg text-xs font-medium inline-flex items-center justify-center transition" title="Reset Filter">
                <i data-lucide="rotate-ccw" class="size-4"></i>
            </a>
        </form>
    </x-cbt.card>

    <!-- Table Logs -->
    <x-cbt.card title="Riwayat Pengiriman Pesan">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs text-default-600" id="table-notification-logs">
                <thead class="bg-default-50/75 border-y border-default-200/80">
                    <tr class="text-[11px] font-semibold uppercase tracking-wider text-default-500 whitespace-nowrap">
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Waktu</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Email Tujuan</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Subjek</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Status</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Catatan / Error</th>
                        <th class="py-3 px-4 border-b border-default-200 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse($logs as $log)
                        <tr class="hover:bg-default-50/80 transition-colors">
                            <td class="py-3 px-4 font-mono text-[11px] text-default-500 whitespace-nowrap">
                                {{ $log->created_at->format('Y-m-d H:i:s') }}
                            </td>
                            <td class="py-3 px-4 font-medium text-default-800 whitespace-nowrap">
                                {{ $log->recipient_email }}
                            </td>
                            <td class="py-3 px-4 text-default-700 max-w-xs truncate whitespace-nowrap">
                                {{ $log->subject }}
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                @if($log->status === 'sent')
                                    <x-cbt.badge color="success">Terkirim</x-cbt.badge>
                                @elseif($log->status === 'failed')
                                    <x-cbt.badge color="danger">Gagal</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="warning">Pending</x-cbt.badge>
                                @endif
                            </td>
                            <td class="py-3 px-4 max-w-xs truncate text-default-500 text-[11px] whitespace-nowrap">
                                {{ $log->error_message ?? '-' }}
                            </td>
                            <td class="py-3 px-4 text-right whitespace-nowrap">
                                @if($log->status === 'failed')
                                    <form action="{{ route('staff.settings.notification-logs.retry', $log) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 rounded-lg text-xs font-semibold transition whitespace-nowrap cursor-pointer inline-flex items-center gap-1" title="Kirim Ulang Email">
                                            <i data-lucide="refresh-cw" class="size-3"></i>
                                            <span>Kirim Ulang</span>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-default-400 text-xs">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-default-400">
                                Belum ada riwayat pengiriman email transaksional.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 py-3.5 border-t border-default-200 dark:border-white/14 bg-default-50/30">
                <p class="text-xs text-default-500">
                    Menampilkan <span class="font-semibold text-default-700">{{ $logs->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-default-700">{{ $logs->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-default-700">{{ $logs->total() }}</span> data
                </p>
                <div>
                    {{ $logs->links() }}
                </div>
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection

