@extends('layouts.staff')

@section('title', 'Cadangan & Disaster Recovery : TESLOKA CBT')
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
        <x-cbt.stat-card 
            title="Total Arsip Cadangan" 
            value="{{ $totalBackups }} Berkas" 
            subtitle="Tersimpan di direktori privat server" 
            icon="database" 
            color="primary" />

        <x-cbt.stat-card 
            title="Integritas Teruji (SHA-256)" 
            value="{{ $verifiedCount }} Terverifikasi" 
            subtitle="Uji verifikasi checksum valid" 
            icon="shield-check" 
            color="success" />

        <x-cbt.stat-card 
            title="Penggunaan Ruang Disk" 
            value="{{ $totalSize >= 1048576 ? number_format($totalSize / 1048576, 2) . ' MB' : ($totalSize >= 1024 ? number_format($totalSize / 1024, 1) . ' KB' : $totalSize . ' B') }}" 
            subtitle="Efisien &amp; terkompresi" 
            icon="hard-drive" 
            color="indigo" />
    </div>

    <!-- Tabel Daftar Cadangan -->
    <x-cbt.card flush title="Riwayat Berkas Cadangan Sistem">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] divide-y divide-default-200/80 text-left text-xs" id="table-backups">
                <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 border-b border-default-200/80 whitespace-nowrap">Nama Berkas</th>
                        <th class="px-3 py-3 border-b border-default-200/80 text-center whitespace-nowrap">Tipe</th>
                        <th class="px-3 py-3 border-b border-default-200/80 text-center whitespace-nowrap">Ukuran</th>
                        <th class="px-3 py-3 border-b border-default-200/80 whitespace-nowrap">Checksum SHA-256</th>
                        <th class="px-3 py-3 border-b border-default-200/80 text-center whitespace-nowrap">Status Integritas</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 border-b border-default-200/80 text-center w-48 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse($backups as $b)
                        <tr class="hover:bg-default-50/60 transition-colors">
                            <td class="ps-4 sm:ps-6 pe-3 py-3 font-mono font-semibold text-default-800 whitespace-nowrap">
                                <div>{{ basename($b->filename) }}</div>
                                <div class="text-[10px] text-default-400 font-normal font-sans">{{ $b->created_at->format('d/m/Y H:i:s') }} WIB</div>
                            </td>
                            <td class="px-3 py-3 text-center whitespace-nowrap">
                                <x-cbt.badge :color="$b->backup_type === 'database' ? 'primary' : 'slate'">
                                    {{ strtoupper($b->backup_type) }}
                                </x-cbt.badge>
                            </td>
                            <td class="px-3 py-3 text-center font-mono font-semibold text-default-700 whitespace-nowrap">
                                {{ $b->formatted_size }}
                            </td>
                            <td class="px-3 py-3 font-mono text-[11px] text-default-500 max-w-xs truncate whitespace-nowrap" title="{{ $b->checksum_sha256 }}">
                                {{ $b->checksum_sha256 ? substr($b->checksum_sha256, 0, 16) . '...' : '-' }}
                            </td>
                            <td class="px-3 py-3 text-center whitespace-nowrap">
                                @if($b->restore_verified)
                                    <x-cbt.badge color="success" title="{{ $b->restore_notes }}">
                                        Terverifikasi Utuh
                                    </x-cbt.badge>
                                @else
                                    <x-cbt.badge color="slate">
                                        Belum Diuji
                                    </x-cbt.badge>
                                @endif
                            </td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center gap-1.5">
                                    <!-- Uji Integritas -->
                                    <form action="{{ route('staff.backups.verify', $b) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm bg-success/10 text-success hover:bg-success hover:text-white rounded-lg transition" title="Uji Checksum SHA-256">
                                            Uji SHA-256
                                        </button>
                                    </form>

                                    <!-- Unduh -->
                                    <a href="{{ route('staff.backups.download', $b) }}" class="btn btn-sm border border-default-200/90 bg-card hover:bg-default-100 text-default-700 rounded-lg transition">
                                        Unduh
                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('staff.backups.destroy', $b) }}" method="POST" onsubmit="return confirm('Hapus berkas cadangan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm bg-danger/10 text-danger hover:bg-danger hover:text-white rounded-lg transition" title="Hapus Berkas">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 px-4 sm:px-6 text-center text-default-400">
                                <x-cbt.empty-state :bordered="false" title="Belum Ada Berkas Cadangan" message="Jalankan pencadangan manual pertama untuk mengamankan data PostgreSQL dan manifest media terisolasi." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($backups->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 sm:px-6 py-3.5 border-t border-default-200/80 bg-default-50/30">
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
