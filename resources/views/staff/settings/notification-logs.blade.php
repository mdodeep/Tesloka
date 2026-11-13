@extends('layouts.staff')

@section('title', 'Log & Riwayat Pengiriman Email — TESLOKA CBT')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Log Pengiriman Email')
@section('page-subtitle', 'Pemantauan status pengiriman pesan transaksional keluar (sent, failed, pending).')

@section('page-actions')
    <a href="{{ route('staff.settings.smtp.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="w-4 h-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <span>Pengaturan SMTP</span>
    </a>
    <a href="{{ route('staff.settings.notification-templates.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="w-4 h-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
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
            <table class="w-full min-w-[760px] text-left text-xs text-default-600">
                <thead class="bg-default-50 text-default-700 font-bold uppercase text-[11px] border-b border-default-200">
                    <tr>
                        <th class="py-3 px-4 whitespace-nowrap">Waktu</th>
                        <th class="py-3 px-4 whitespace-nowrap">Email Tujuan</th>
                        <th class="py-3 px-4 whitespace-nowrap">Subjek</th>
                        <th class="py-3 px-4 whitespace-nowrap">Status</th>
                        <th class="py-3 px-4 whitespace-nowrap">Catatan / Error</th>
                        <th class="py-3 px-4 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
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
                                        <button type="submit" class="px-2.5 py-1 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg text-xs font-semibold transition whitespace-nowrap cursor-pointer" title="Kirim Ulang Email">
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
            <div class="pt-4 border-t border-default-100">
                {{ $logs->links() }}
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection

