@extends('layouts.staff')

@section('title', 'Delegasi Wewenang — TESLOKA CBT')
@section('page-parent', 'Tata Kelola & Keamanan')
@section('page-title', 'Delegasi Wewenang')
@section('page-subtitle', 'Mekanisme pelimpahan wewenang sementara kepada koordinator atau pengganti resmi.')

@section('content')
<div class="space-y-6">
    <!-- Metric Overview Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <x-cbt.stat-card 
            title="Delegasi Diberikan" 
            value="{{ $delegationsGiven->count() }}" 
            subtitle="Wewenang Dilimpahkan" 
            icon="send" 
            color="primary" />
        <x-cbt.stat-card 
            title="Delegasi Diterima" 
            value="{{ $delegationsReceived->count() }}" 
            subtitle="Kewenangan Tambahan" 
            icon="inbox" 
            color="info" />
        <x-cbt.stat-card 
            title="Aktif Berlaku" 
            value="{{ $delegationsGiven->where('status', 'active')->count() + $delegationsReceived->where('status', 'active')->count() }}" 
            subtitle="Dapat Digunakan" 
            icon="check-circle-2" 
            color="success" />
        <x-cbt.stat-card 
            title="Riwayat Nonaktif" 
            value="{{ $delegationsGiven->where('status', '!=', 'active')->count() + $delegationsReceived->where('status', '!=', 'active')->count() }}" 
            subtitle="Dicabut / Kedaluwarsa" 
            icon="clock" 
            color="secondary" />
    </div>

    <div class="flex items-center justify-end">
        <button onclick="document.getElementById('modal-delegation').classList.toggle('hidden')" class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded-lg shadow-2xs flex items-center justify-center gap-2 cursor-pointer transition w-full sm:w-auto">
            <i data-lucide="plus" class="size-4"></i>
            <span>Berikan Delegasi Wewenang</span>
        </button>
    </div>

    <!-- Delegasi yang Diberikan -->
    <x-cbt.card flush title="Delegasi yang Anda Berikan" subtitle="Daftar wewenang yang Anda limpahkan kepada rekan sejawat">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] divide-y divide-default-200/80 text-left text-xs" id="table-delegations-given">
                <thead class="bg-default-50/75 border-b border-default-200/80 text-[11px] font-bold text-default-600 uppercase tracking-wider">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">Penerima Wewenang</th>
                        <th class="px-3 py-3 whitespace-nowrap">Cakupan (Scope)</th>
                        <th class="px-3 py-3 whitespace-nowrap">Masa Berlaku</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Status</th>
                        <th class="px-3 py-3 whitespace-nowrap">Alasan</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse ($delegationsGiven as $del)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="ps-4 sm:ps-6 pe-3 py-3.5 font-semibold text-default-900 whitespace-nowrap">{{ $del->delegatee?->name ?? 'User #'.$del->delegatee_id }}</td>
                            <td class="px-3 py-3.5 whitespace-nowrap">
                                <span class="px-2.5 py-0.5 rounded-full font-mono text-[10px] bg-primary/10 text-primary border border-primary/20 font-semibold">
                                    {{ $del->scope }}
                                </span>
                            </td>
                            <td class="px-3 py-3.5 font-mono text-default-600 whitespace-nowrap">{{ $del->start_date->format('Y-m-d') }} s.d. {{ $del->end_date->format('Y-m-d') }}</td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                @if ($del->status === 'active' && $del->isValidNow())
                                    <x-cbt.badge color="success">Aktif Berlaku</x-cbt.badge>
                                @elseif ($del->status === 'revoked')
                                    <x-cbt.badge color="danger">Dicabut</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="secondary">Kedaluwarsa</x-cbt.badge>
                                @endif
                            </td>
                            <td class="px-3 py-3.5 text-default-600 max-w-xs truncate">{{ $del->reason }}</td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right whitespace-nowrap">
                                @if ($del->status === 'active')
                                    <form method="POST" action="{{ route('staff.delegations.revoke', $del) }}" class="inline" onsubmit="return confirm('Cabut delegasi ini?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm bg-danger/10 hover:bg-danger/20 text-danger border border-danger/20 rounded-lg text-xs font-semibold transition cursor-pointer">
                                            Cabut
                                        </button>
                                    </form>
                                @else
                                    <span class="text-default-400 text-xs">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-0">
                                <x-cbt.empty-state :bordered="false" title="Belum Ada Delegasi yang Diberikan" message="Anda belum pernah memberikan pelimpahan kewenangan kepada staf lain." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-cbt.card>

    <!-- Delegasi yang Diterima -->
    <x-cbt.card flush title="Delegasi yang Anda Terima dari Staf Lain" subtitle="Kewenangan tambahan yang dilimpahkan rekan sejawat kepada Anda">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] divide-y divide-default-200/80 text-left text-xs" id="table-delegations-received">
                <thead class="bg-default-50/75 border-b border-default-200/80 text-[11px] font-bold text-default-600 uppercase tracking-wider">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">Pemberi Wewenang</th>
                        <th class="px-3 py-3 whitespace-nowrap">Cakupan (Scope)</th>
                        <th class="px-3 py-3 whitespace-nowrap">Masa Berlaku</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Status</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 whitespace-nowrap">Alasan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse ($delegationsReceived as $del)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="ps-4 sm:ps-6 pe-3 py-3.5 font-semibold text-default-900 whitespace-nowrap">{{ $del->delegator?->name ?? 'User #'.$del->delegator_id }}</td>
                            <td class="px-3 py-3.5 whitespace-nowrap">
                                <span class="px-2.5 py-0.5 rounded-full font-mono text-[10px] bg-primary/10 text-primary border border-primary/20 font-semibold">
                                    {{ $del->scope }}
                                </span>
                            </td>
                            <td class="px-3 py-3.5 font-mono text-default-600 whitespace-nowrap">{{ $del->start_date->format('Y-m-d') }} s.d. {{ $del->end_date->format('Y-m-d') }}</td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                @if ($del->status === 'active' && $del->isValidNow())
                                    <x-cbt.badge color="success">Aktif Berlaku</x-cbt.badge>
                                @elseif ($del->status === 'revoked')
                                    <x-cbt.badge color="danger">Dicabut</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="secondary">Kedaluwarsa</x-cbt.badge>
                                @endif
                            </td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-default-600">{{ $del->reason }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-0">
                                <x-cbt.empty-state :bordered="false" title="Belum Ada Delegasi yang Diterima" message="Belum ada wewenang yang dilimpahkan dari staf lain kepada Anda." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-cbt.card>
</div>

<!-- Modal Form Delegasi -->
<div id="modal-delegation" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="card max-w-lg w-full p-4 sm:p-6 shadow-xl border border-default-200 max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-default-100 shrink-0">
            <h3 class="text-sm font-bold text-default-800">Formulir Pelimpahan Delegasi Wewenang</h3>
            <button onclick="document.getElementById('modal-delegation').classList.add('hidden')" class="text-default-400 hover:text-default-600 cursor-pointer p-1 rounded hover:bg-default-100">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('staff.delegations.store') }}" class="space-y-4 text-xs overflow-y-auto pr-1">
            @csrf
            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-default-600 mb-1.5">Pilih Penerima Delegasi (Staf/Pengajar)</label>
                <select name="delegatee_id" required class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    @foreach ($staffUsers as $su)
                        <option value="{{ $su->id }}">{{ $su->name }} ({{ $su->roles->pluck('display_name')->first() }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-default-600 mb-1.5">Cakupan Kewenangan (Scope)</label>
                <select name="scope" required class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="exam.publish">Persetujuan & Penerbitan Ujian (exam.publish)</option>
                    <option value="grading.regrade">Persetujuan Regrade Nilai (grading.regrade)</option>
                    <option value="proctoring.manage">Kontrol Sesi Peserta & Waktu Tambahan (proctoring.manage)</option>
                    <option value="questions.approve">Persetujuan Publikasi Soal (questions.approve)</option>
                    <option value="*">Seluruh Wewenang Administratif (*)</option>
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="min-w-0">
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-default-600 mb-1.5">Mulai Berlaku</label>
                    <input type="date" name="start_date" value="{{ date('Y-m-d') }}" required
                        class="form-input w-full">
                </div>
                <div class="min-w-0">
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-default-600 mb-1.5">Berakhir Pada</label>
                    <input type="date" name="end_date" value="{{ date('Y-m-d', strtotime('+7 days')) }}" required
                        class="form-input w-full">
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-default-600 mb-1.5">Alasan Delegasi</label>
                <textarea name="reason" rows="3" required placeholder="Contoh: Menggantikan tugas dinas luar kota selama periode ujian semester..."
                    class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary"></textarea>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100 shrink-0">
                <button type="button" onclick="document.getElementById('modal-delegation').classList.add('hidden')" class="btn btn-sm border border-default-200 text-default-600 hover:bg-default-50 cursor-pointer text-center justify-center w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary text-white font-semibold hover:bg-primary-hover shadow-xs cursor-pointer text-center justify-center w-full sm:w-auto">
                    Terbitkan Delegasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
