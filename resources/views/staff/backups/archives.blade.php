@extends('layouts.staff')

@section('title', 'Penyimpanan Arsip Ujian Historis — TESLOKA CBT')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Penyimpanan Arsip Ujian Historis')
@section('page-subtitle', 'Data ujian yang telah selesai diarsipkan secara permanen dengan manifest data snapshot utuh dan proteksi hukum (Legal Hold).')

@section('page-actions')
    <a href="{{ route('staff.backups.index') }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition cursor-pointer">
        <i data-lucide="arrow-left" class="size-4 text-default-500"></i>
        <span>Kembali ke Cadangan</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Tabel Arsip Ujian -->
    <x-cbt.card title="Daftar Arsip Ujian Resmi (Total {{ $archives->total() }})">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-backup-archives">
                <thead class="bg-default-50/75 border-y border-default-200/80">
                    <tr class="text-[11px] font-semibold uppercase tracking-wider text-default-500 whitespace-nowrap">
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Kode Arsip</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Judul Ujian</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Waktu Diarsipkan</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Peserta</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Rata-rata Skor</th>
                        <th class="py-3 px-4 border-b border-default-200 text-center whitespace-nowrap">Status Legal Hold</th>
                        <th class="py-3 px-4 border-b border-default-200 whitespace-nowrap">Checksum Manifest</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse($archives as $arc)
                        <tr class="hover:bg-default-50 transition">
                            <td class="py-3 px-4 font-mono font-bold text-primary-600 whitespace-nowrap">
                                {{ $arc->archive_code }}
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                <div class="font-bold text-default-900">{{ $arc->exam->title ?? '-' }}</div>
                                <div class="text-[10px] text-default-400 font-mono">Kode Ujian: {{ $arc->exam->code ?? '-' }}</div>
                            </td>
                            <td class="py-3 px-4 text-center font-mono text-default-600 whitespace-nowrap">
                                {{ $arc->archived_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-3 px-4 text-center font-bold text-default-800 whitespace-nowrap">
                                {{ $arc->total_examinees }} Siswa
                            </td>
                            <td class="py-3 px-4 text-center font-mono font-bold text-default-700 whitespace-nowrap">
                                {{ number_format($arc->average_score, 2) }}
                            </td>
                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                @if($arc->legal_hold)
                                    <x-cbt.badge color="warning">Legal Hold Aktif</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="secondary">Standar (5 Thn)</x-cbt.badge>
                                @endif
                            </td>
                            <td class="py-3 px-4 font-mono text-[10px] text-default-500 truncate max-w-xs whitespace-nowrap" title="{{ $arc->manifest_checksum }}">
                                {{ substr($arc->manifest_checksum, 0, 16) }}...
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-default-400">
                                Belum ada ujian yang diarsipkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($archives->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 py-3.5 border-t border-default-200 dark:border-white/14 bg-default-50/30">
                <p class="text-xs text-default-500">
                    Menampilkan <span class="font-semibold text-default-700">{{ $archives->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-default-700">{{ $archives->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-default-700">{{ $archives->total() }}</span> data
                </p>
                <div>
                    {{ $archives->links() }}
                </div>
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection

