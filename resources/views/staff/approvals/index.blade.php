@extends('layouts.staff')

@section('title', 'Persetujuan Four-Eyes — TESLOKA CBT')
@section('page-parent', 'Tata Kelola & Keamanan')
@section('page-title', 'Four-Eyes Approval')
@section('page-subtitle', 'Tindakan berisiko tinggi wajib disetujui minimal oleh dua pihak berwenang yang berbeda.')

@section('content')
<div class="space-y-6">
    <!-- Metric Overview Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <x-cbt.stat-card 
            title="Total Permohonan" 
            value="{{ $pendingRequests->count() + $historyRequests->count() }}" 
            subtitle="Aktivitas Kritis Four-Eyes" 
            icon="shield-check" 
            color="primary" />
        <x-cbt.stat-card 
            title="Menunggu Persetujuan" 
            value="{{ $pendingRequests->count() }}" 
            subtitle="Perlu Telaah Pihak Kedua" 
            icon="clock" 
            color="warning" />
        <x-cbt.stat-card 
            title="Disetujui" 
            value="{{ $historyRequests->where('status', 'approved')->count() }}" 
            subtitle="Tindakan Disahkan" 
            icon="check-circle-2" 
            color="success" />
        <x-cbt.stat-card 
            title="Ditolak" 
            value="{{ $historyRequests->where('status', 'rejected')->count() }}" 
            subtitle="Permohonan Dibatalkan" 
            icon="x-circle" 
            color="danger" />
    </div>

    <!-- Pending Requests -->
    <x-cbt.card title="Permohonan Menunggu Persetujuan" subtitle="Daftar tindakan administratif kritis yang memerlukan persetujuan pihak kedua">
        <x-slot:actions>
            <span class="px-2.5 py-1 bg-amber-50 text-amber-800 font-bold text-[11px] rounded-lg border border-amber-200">
                {{ $pendingRequests->count() }} Menunggu
            </span>
        </x-slot:actions>

        <div class="overflow-x-auto -mx-3.5 sm:-mx-6 -my-4">
            <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-approvals-pending">
                <thead class="bg-default-50/75 border-y border-default-200/80">
                    <tr class="text-[11px] font-semibold uppercase tracking-wider text-default-500 whitespace-nowrap">
                        <th class="py-3.5 px-6 border-b border-default-200 whitespace-nowrap">Tindakan Kritis</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Pemohon</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Waktu Pengajuan</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Alasan / Catatan</th>
                        <th class="py-3.5 px-6 border-b border-default-200 text-right whitespace-nowrap">Tindakan Penyetuju</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse ($pendingRequests as $req)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="py-3.5 px-6 whitespace-nowrap">
                                <span class="px-2.5 py-0.5 rounded-full font-mono text-[10px] bg-rose-50 text-rose-700 border border-rose-200 font-semibold">
                                    {{ $req->action_type }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 font-semibold text-default-800 whitespace-nowrap">{{ $req->requester?->name }}</td>
                            <td class="py-3.5 px-4 font-mono text-default-500 whitespace-nowrap">{{ $req->created_at->format('Y-m-d H:i') }}</td>
                            <td class="py-3.5 px-4 text-default-600 max-w-xs truncate">{{ $req->reason ?? '-' }}</td>
                            <td class="py-3.5 px-6 text-right whitespace-nowrap">
                                @if (! auth('staff')->user()?->isAdmin() && auth('staff')->id() === $req->requester_id)
                                    <span class="text-default-400 italic text-[11px]">(Anda adalah pemohon - Four Eyes)</span>
                                @else
                                    <div class="flex items-center justify-end gap-2">
                                        <form method="POST" action="{{ route('staff.approvals.approve', $req) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm rounded-lg bg-emerald-600 text-white font-semibold hover:bg-emerald-700 shadow-2xs text-xs transition cursor-pointer inline-flex items-center gap-1.5">
                                                <i data-lucide="check" class="size-3.5"></i>
                                                <span>Setujui</span>
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('staff.approvals.reject', $req) }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="rejection_reason" value="Ditolak oleh {{ auth('staff')->user()->name }}">
                                            <button type="submit" class="btn btn-sm rounded-lg bg-rose-600 text-white font-semibold hover:bg-rose-700 shadow-2xs text-xs transition cursor-pointer inline-flex items-center gap-1.5">
                                                <i data-lucide="x" class="size-3.5"></i>
                                                <span>Tolak</span>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-default-400">
                                <x-cbt.empty-state title="Tidak Ada Permohonan Tertunda" description="Semua permohonan tindakan kritis telah diproses dan diputuskan." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-cbt.card>

    <!-- History Requests -->
    <x-cbt.card title="Riwayat Keputusan Four-Eyes" subtitle="Catatan keputusan permohonan kritis terdahulu">
        <div class="overflow-x-auto -mx-3.5 sm:-mx-6 -my-4">
            <table class="w-full min-w-[760px] divide-y divide-default-200 dark:divide-white/14 text-left text-xs" id="table-approvals-history">
                <thead class="bg-default-50/75 border-y border-default-200/80">
                    <tr class="text-[11px] font-semibold uppercase tracking-wider text-default-500 whitespace-nowrap">
                        <th class="py-3.5 px-6 border-b border-default-200 whitespace-nowrap">Tindakan</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Pemohon</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Penyetuju</th>
                        <th class="py-3.5 px-4 border-b border-default-200 text-center whitespace-nowrap">Keputusan</th>
                        <th class="py-3.5 px-4 border-b border-default-200 whitespace-nowrap">Waktu</th>
                        <th class="py-3.5 px-6 border-b border-default-200 whitespace-nowrap">Catatan / Alasan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200 dark:divide-white/14">
                    @forelse ($historyRequests as $hist)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="py-3.5 px-6 font-mono font-bold text-default-800 whitespace-nowrap">{{ $hist->action_type }}</td>
                            <td class="py-3.5 px-4 font-semibold text-default-700 whitespace-nowrap">{{ $hist->requester?->name }}</td>
                            <td class="py-3.5 px-4 font-semibold text-default-700 whitespace-nowrap">{{ $hist->approver?->name ?? '-' }}</td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                @if ($hist->status === 'approved')
                                    <x-cbt.badge color="success">Disetujui</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="danger">Ditolak</x-cbt.badge>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 font-mono text-default-500 whitespace-nowrap">{{ $hist->updated_at->format('Y-m-d H:i') }}</td>
                            <td class="py-3.5 px-6 text-default-600">{{ $hist->rejection_reason ?? $hist->reason ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-default-400">
                                <x-cbt.empty-state title="Belum Ada Riwayat" description="Belum ada riwayat permohonan yang disetujui atau ditolak." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-cbt.card>
</div>
@endsection
