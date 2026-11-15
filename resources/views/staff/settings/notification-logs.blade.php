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
        <div class="bg-white border border-default-200 rounded-md p-4 shadow-2xs">
            <span class="text-xs font-semibold text-default-500 uppercase tracking-wider block mb-1">Total Terkirim</span>
            <div class="text-2xl font-bold text-default-900 font-mono">{{ $stats['total'] }}</div>
        </div>
        <div class="bg-white border border-default-200 rounded-md p-4 shadow-2xs">
            <span class="text-xs font-semibold text-emerald-600 uppercase tracking-wider block mb-1">Berhasil (Sent)</span>
            <div class="text-2xl font-bold text-emerald-700 font-mono">{{ $stats['sent'] }}</div>
        </div>
        <div class="bg-white border border-default-200 rounded-md p-4 shadow-2xs">
            <span class="text-xs font-semibold text-rose-600 uppercase tracking-wider block mb-1">Gagal (Failed)</span>
            <div class="text-2xl font-bold text-rose-700 font-mono">{{ $stats['failed'] }}</div>
        </div>
        <div class="bg-white border border-default-200 rounded-md p-4 shadow-2xs">
            <span class="text-xs font-semibold text-amber-600 uppercase tracking-wider block mb-1">Dalam Antrean</span>
            <div class="text-2xl font-bold text-amber-700 font-mono">{{ $stats['pending'] }}</div>
        </div>
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
            <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs">
                Filter
            </button>
            <a href="{{ route('staff.settings.notification-logs.index') }}" class="btn btn-sm border border-default-200 text-default-600 hover:bg-default-100">
                Reset
            </a>
        </form>
    </x-cbt.card>

    <!-- Table Logs -->
    <x-cbt.card title="Riwayat Pengiriman Pesan">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs text-default-600" id="table-notification-logs">
                <thead class="bg-default-150">
                    <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
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
                                    <span class="inline-block px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 font-semibold text-[10px] whitespace-nowrap">Terkirim</span>
                                @elseif($log->status === 'failed')
                                    <span class="inline-block px-2 py-0.5 rounded-full bg-rose-50 text-rose-700 border border-rose-200 font-semibold text-[10px] whitespace-nowrap">Gagal</span>
                                @else
                                    <span class="inline-block px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200 font-semibold text-[10px] whitespace-nowrap">Pending</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 max-w-xs truncate text-default-500 text-[11px] whitespace-nowrap">
                                {{ $log->error_message ?? '-' }}
                            </td>
                            <td class="py-3 px-4 text-right whitespace-nowrap">
                                @if($log->status === 'failed')
                                    <form action="{{ route('staff.settings.notification-logs.retry', $log) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 rounded text-xs font-semibold transition whitespace-nowrap cursor-pointer" title="Kirim Ulang Email">
                                            Kirim Ulang
                                        </button>
                                    </form>
                                @else
                                    <span class="text-default-400 text-[11px]">&bull;&bull;&bull;</span>
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

