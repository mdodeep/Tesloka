@extends('layouts.staff')

@section('title', 'Cadangan & Disaster Recovery — TESLOKA CBT')
@section('page-parent', 'Tata Kelola & Keamanan')
@section('page-title')
Manajemen Cadangan & Pemulihan Sistem
@endsection
@section('page-subtitle', 'Pencadangan berkala database PostgreSQL dan manifest berkas media dengan verifikasi checksum kriptografis SHA-256.')

@section('page-actions')
    <form action="{{ route('staff.backups.store') }}" method="POST" class="inline">
        @csrf
        <input type="hidden" name="type" value="database">
        <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
            <i data-lucide="database" class="size-4"></i>
            <span>Cadangkan Database</span>
        </button>
    </form>

    <form action="{{ route('staff.backups.store') }}" method="POST" class="inline">
        @csrf
        <input type="hidden" name="type" value="full">
        <button type="submit" class="btn btn-sm bg-default-800 text-white hover:bg-default-900 shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
            <i data-lucide="archive" class="size-4"></i>
            <span>Cadangan Penuh</span>
        </button>
    </form>

    <a href="{{ route('staff.backups.archives') }}" class="btn btn-sm border border-default-200 bg-card hover:bg-default-100 text-default-700 shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
        <i data-lucide="history" class="size-4 text-default-500"></i>
        <span>Arsip Ujian</span>
    </a>
@endsection

@section('content')
<div class="space-y-5 w-full">

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="card">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-default-400 uppercase tracking-wider">Total Arsip Cadangan</span>
                    <span class="size-8 rounded bg-primary/10 text-primary flex items-center justify-center">
                        <i data-lucide="database" class="size-4"></i>
                    </span>
                </div>
                <div class="text-2xl font-bold text-default-800 mt-2">{{ $totalBackups }} Berkas</div>
                <p class="text-xs text-default-500 mt-1">Tersimpan di direktori privat server</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-default-400 uppercase tracking-wider">Integritas Teruji (SHA-256)</span>
                    <span class="size-8 rounded bg-success/10 text-success flex items-center justify-center">
                        <i data-lucide="shield-check" class="size-4"></i>
                    </span>
                </div>
                <div class="text-2xl font-bold text-success mt-2">{{ $verifiedCount }} Terverifikasi</div>
                <p class="text-xs text-default-500 mt-1">Uji verifikasi checksum valid</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-default-400 uppercase tracking-wider">Penggunaan Ruang Disk</span>
                    <span class="size-8 rounded bg-indigo-500/10 text-indigo-600 flex items-center justify-center">
                        <i data-lucide="hard-drive" class="size-4"></i>
                    </span>
                </div>
                <div class="text-2xl font-bold text-default-800 mt-2">
                    @if($totalSize >= 1048576)
                        {{ number_format($totalSize / 1048576, 2) }} MB
                    @elseif($totalSize >= 1024)
                        {{ number_format($totalSize / 1024, 1) }} KB
                    @else
                        {{ $totalSize }} B
                    @endif
                </div>
                <p class="text-xs text-default-500 mt-1">Efisien &amp; terkompresi</p>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Cadangan -->
    <x-cbt.card title="Riwayat Berkas Cadangan Sistem">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-backups">
                <thead class="bg-default-150">
                    <tr class="text-xs uppercase font-semibold text-default-600 whitespace-nowrap tracking-wider">
                        <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Nama Berkas</th>
                        <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Tipe</th>
                        <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Ukuran</th>
                        <th class="px-3.5 py-3 border-b border-default-200 whitespace-nowrap">Checksum SHA-256</th>
                        <th class="px-3.5 py-3 border-b border-default-200 text-center whitespace-nowrap">Status Integritas</th>
                        <th class="px-3.5 py-3 border-b border-default-200 text-center w-48 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse($backups as $b)
                        <tr class="hover:bg-default-50 transition">
                            <td class="px-3.5 py-2.5 border-y border-default-200 font-mono font-semibold text-default-800 whitespace-nowrap">
                                <div>{{ basename($b->filename) }}</div>
                                <div class="text-[10px] text-default-400 font-normal font-sans">{{ $b->created_at->format('d/m/Y H:i:s') }} WIB</div>
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                <span class="px-2 py-0.5 rounded text-[10px] font-semibold uppercase {{ $b->backup_type === 'database' ? 'bg-primary/10 text-primary border border-primary/20' : 'bg-purple-500/10 text-purple-700 border border-purple-200' }}">
                                    {{ $b->backup_type }}
                                </span>
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 text-center font-mono font-semibold text-default-700 whitespace-nowrap">
                                {{ $b->formatted_size }}
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 font-mono text-[11px] text-default-500 max-w-xs truncate whitespace-nowrap" title="{{ $b->checksum_sha256 }}">
                                {{ $b->checksum_sha256 ? substr($b->checksum_sha256, 0, 16) . '...' : '-' }}
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                @if($b->restore_verified)
                                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-success/10 text-success border border-success/20" title="{{ $b->restore_notes }}">
                                        Terverifikasi Utuh
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-default-100 text-default-500">
                                        Belum Diuji
                                    </span>
                                @endif
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-default-200 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center gap-1.5">
                                    <!-- Uji Integritas -->
                                    <form action="{{ route('staff.backups.verify', $b) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm bg-success/10 text-success hover:bg-success hover:text-white rounded" title="Uji Checksum SHA-256">
                                            Uji SHA-256
                                        </button>
                                    </form>

                                    <!-- Unduh -->
                                    <a href="{{ route('staff.backups.download', $b) }}" class="btn btn-sm border border-default-200 bg-card hover:bg-default-100 text-default-700 rounded">
                                        Unduh
                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('staff.backups.destroy', $b) }}" method="POST" onsubmit="return confirm('Hapus berkas cadangan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm bg-danger/10 text-danger hover:bg-danger hover:text-white rounded" title="Hapus Berkas">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-default-400">
                                <x-cbt.empty-state title="Belum Ada Berkas Cadangan" description="Jalankan pencadangan manual pertama untuk mengamankan data PostgreSQL dan manifest media terisolasi." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($backups->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 py-3.5 border-t border-default-200 dark:border-white/14 bg-default-50/30">
                <p class="text-xs text-default-500">
                    Menampilkan <span class="font-semibold text-default-700">{{ $backups->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-default-700">{{ $backups->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-default-700">{{ $backups->total() }}</span> data
                </p>
                <div>
                    {{ $backups->links() }}
                </div>
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection
