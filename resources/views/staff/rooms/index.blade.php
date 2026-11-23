@extends('layouts.staff')

@section('title', 'Manajemen Ruang Ujian')
@section('page-parent', 'Pelaksanaan Ujian')
@section('page-title', 'Ruang Ujian')
@section('page-subtitle', 'Kelola ruang pelaksanaan ujian dan kapasitas pengawasan kelompok peserta (standar 20–30 peserta per ruang).')

@section('page-actions')
    <button type="button" onclick="document.getElementById('createRoomModal').classList.remove('hidden')" class="btn btn-sm bg-primary text-white hover:bg-primary-hover shadow-xs inline-flex items-center gap-1.5 cursor-pointer">
        <i data-lucide="plus" class="size-4"></i>
        <span>Tambah Ruang Baru</span>
    </button>
@endsection

@section('content')
<div class="space-y-5 w-full">

    <!-- Quick Stats Grid (Unified Metric Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-cbt.stat-card 
            title="Total Ruang Ujian" 
            value="{{ number_format($rooms->total()) }}" 
            subtitle="Laboratorium &amp; Ruang CBT" 
            icon="building" 
            color="primary" />
        <x-cbt.stat-card 
            title="Total Daya Tampung" 
            value="{{ number_format($rooms->sum('capacity')) }}" 
            subtitle="Kapasitas Maksimal Siswa" 
            icon="users" 
            color="info" />
        <x-cbt.stat-card 
            title="Ruang Siap &amp; Aktif" 
            value="{{ number_format($rooms->where('is_active', true)->count()) }}" 
            subtitle="Operasional Standar" 
            icon="check-circle-2" 
            color="success" />
        <x-cbt.stat-card 
            title="Sesi Terjadwal" 
            value="{{ number_format($rooms->sum('sessions_count')) }}" 
            subtitle="Alokasi Pelaksanaan" 
            icon="clock" 
            color="warning" />
    </div>

    <div class="p-4 bg-primary/5 border border-primary/20 rounded-xl flex items-start gap-3">
        <i data-lucide="info" class="size-5 text-primary shrink-0 mt-0.5"></i>
        <div class="text-xs text-default-700 leading-relaxed">
            <strong>Standar Operasional Ruang Pengawasan:</strong> Kapasitas tiap ruang ujian dibatasi maksimal 20–30 peserta untuk menjamin kelancaran koneksi streaming video pengawas proctoring dan ketertiban ruang.
        </div>
    </div>

    <!-- Table of Rooms -->
    <x-cbt.card flush title="Daftar Ruang Ujian & Laboratorium CBT" subtitle="Kelola kapasitas komputer, lokasi fisik gedung, dan pantau status ruang pelaksanaan">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px] divide-y divide-default-200/80 text-left text-xs" id="table-rooms">
                <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">Kode &amp; Nama Ruang</th>
                        <th class="px-3 py-3 whitespace-nowrap">Lokasi Fisik / Gedung</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Kapasitas Maksimal</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Total Sesi Terjadwal</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Status</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse($rooms as $room)
                        <tr class="hover:bg-default-50/60 transition-colors">
                            <td class="ps-4 sm:ps-6 pe-3 py-3.5 whitespace-nowrap">
                                <strong class="text-default-900 font-semibold block">{{ $room->name }}</strong>
                                <span class="text-xs font-mono text-default-400">{{ $room->code }}</span>
                            </td>
                            <td class="px-3 py-3.5 text-default-600 whitespace-nowrap">
                                {{ $room->location ?? 'Gedung Utama' }}
                            </td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                <x-cbt.badge color="primary">
                                    {{ $room->capacity }} Peserta
                                </x-cbt.badge>
                            </td>
                            <td class="px-3 py-3.5 text-center font-semibold text-default-700 whitespace-nowrap">
                                {{ $room->sessions_count }} Sesi
                            </td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                <x-cbt.badge color="{{ $room->is_active ? 'success' : 'slate' }}">
                                    {{ $room->is_active ? 'Aktif' : 'Nonaktif' }}
                                </x-cbt.badge>
                            </td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <form action="{{ route('staff.rooms.destroy', $room) }}" method="POST" class="inline" onsubmit="return confirm('Hapus atau nonaktifkan ruang ujian ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon size-8 rounded-lg border border-default-200/90 bg-card hover:bg-danger/10 hover:text-danger hover:border-danger/30 text-default-600 transition cursor-pointer" title="Hapus / Nonaktifkan">
                                            <i data-lucide="trash-2" class="size-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 px-4 sm:px-6 text-center text-default-400">
                                <x-cbt.empty-state :bordered="false" title="Belum Ada Ruang Ujian" message="Silakan buat ruang ujian baru untuk menampung sesi pelaksanaan ujian." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($rooms->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-4 sm:px-6 py-3.5 border-t border-default-200/80 bg-default-50/30">
                <p class="text-xs text-default-500">
                    Menampilkan <span class="font-semibold text-default-700">{{ $rooms->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-default-700">{{ $rooms->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-default-700">{{ $rooms->total() }}</span> data
                </p>
                <div>
                    {{ $rooms->links() }}
                </div>
            </div>
        @endif
    </x-cbt.card>
</div>

<!-- Modal Tambah Ruang Baru -->
<div id="createRoomModal" class="fixed inset-0 z-50 flex items-center justify-center bg-default-900/40 backdrop-blur-xs hidden p-3 sm:p-4">
    <div class="bg-card rounded-md max-w-md w-full p-4 sm:p-5 shadow-2xl border border-default-200 max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between border-b border-default-200 pb-3 mb-4 shrink-0">
            <h4 class="text-sm font-semibold text-default-800">Tambah Ruang Ujian Baru</h4>
            <button type="button" onclick="document.getElementById('createRoomModal').classList.add('hidden')" class="text-default-400 hover:text-default-600 cursor-pointer">
                <i data-lucide="x" class="size-4.5"></i>
            </button>
        </div>
        <form action="{{ route('staff.rooms.store') }}" method="POST" class="space-y-3.5 overflow-y-auto pr-1">
            @csrf
            <div class="space-y-1.5">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nama Ruang Ujian *</label>
                <input type="text" name="name" placeholder="Contoh: Lab Komputer 1 / Ruang 204" class="form-input" required>
            </div>
            <div class="space-y-1.5">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Kode Ruang (Opsional)</label>
                <input type="text" name="code" placeholder="Otomatis jika dikosongkan (cth: R-LAB01)" class="form-input font-mono">
            </div>
            <div class="space-y-1.5">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Lokasi Fisik / Gedung</label>
                <input type="text" name="location" placeholder="Contoh: Gedung B Lantai 2" class="form-input">
            </div>
            <div class="space-y-1.5">
                <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Kapasitas Peserta (Maksimal 30) *</label>
                <input type="number" min="1" max="30" name="capacity" value="30" class="form-input font-bold text-primary" required>
                <p class="text-xs text-default-500 mt-1">Batas maksimal kuota per ruang pengawasan adalah 30 peserta.</p>
            </div>
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-200 shrink-0">
                <button type="button" onclick="document.getElementById('createRoomModal').classList.add('hidden')" class="btn btn-sm border border-default-200 text-default-700 hover:bg-default-100 rounded cursor-pointer w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary text-white hover:bg-primary-hover rounded cursor-pointer w-full sm:w-auto">
                    Simpan Ruang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
