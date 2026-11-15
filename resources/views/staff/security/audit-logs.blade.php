@extends('layouts.staff')

@section('title', 'Jejak Audit Keamanan Sistem — TESLOKA CBT')
@section('page-parent', 'Tata Kelola & Keamanan')
@section('page-title', 'Jejak Audit Sistem')
@section('page-subtitle', 'Catatan terperinci seluruh aktivitas autentikasi, perubahan kebijakan, otorisasi Four-Eyes, dan modifikasi data institusi yang tersimpan permanen di database.')

@section('page-actions')
    <a href="{{ route('staff.security.audit-logs.export-csv', request()->query()) }}" class="btn btn-sm bg-success hover:bg-success/90 text-white rounded text-xs font-semibold transition inline-flex items-center gap-1.5 shadow-xs">
        <i data-lucide="download" class="size-4"></i>
        <span>Ekspor CSV</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Forensic Filter Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-1 text-xs font-semibold">
        <a href="{{ route('staff.security.audit-logs', array_merge(request()->except('tab'), ['tab' => 'all'])) }}" class="px-4 py-2 rounded transition {{ ($activeTab ?? 'all') === 'all' ? 'bg-primary text-white shadow-xs' : 'bg-white border border-default-200 text-default-600 hover:bg-default-50' }}">
            Semua Aktivitas
        </a>
        <a href="{{ route('staff.security.audit-logs', array_merge(request()->except('tab'), ['tab' => 'security'])) }}" class="px-4 py-2 rounded transition inline-flex items-center gap-2 {{ ($activeTab ?? 'all') === 'security' ? 'bg-rose-600 text-white shadow-xs' : 'bg-white border border-default-200 text-default-600 hover:bg-default-50' }}">
            <span>Insiden Keamanan</span>
            @if(($securityIncidentsCount ?? 0) > 0)
                <span class="px-1.5 py-0.2 rounded-full text-[10px] font-bold {{ ($activeTab ?? 'all') === 'security' ? 'bg-white text-rose-600' : 'bg-rose-100 text-rose-700' }}">
                    {{ $securityIncidentsCount }}
                </span>
            @endif
        </a>
        <a href="{{ route('staff.security.audit-logs', array_merge(request()->except('tab'), ['tab' => 'auth'])) }}" class="px-4 py-2 rounded transition {{ ($activeTab ?? 'all') === 'auth' ? 'bg-primary text-white shadow-xs' : 'bg-white border border-default-200 text-default-600 hover:bg-default-50' }}">
            Autentikasi & Sesi
        </a>
        <a href="{{ route('staff.security.audit-logs', array_merge(request()->except('tab'), ['tab' => 'operations'])) }}" class="px-4 py-2 rounded transition {{ ($activeTab ?? 'all') === 'operations' ? 'bg-primary text-white shadow-xs' : 'bg-white border border-default-200 text-default-600 hover:bg-default-50' }}">
            Operasional & Ujian
        </a>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white border border-default-200 rounded-md p-5 shadow-xs">
        <form method="GET" action="{{ route('staff.security.audit-logs') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-3 items-end">
            <input type="hidden" name="tab" value="{{ $activeTab ?? 'all' }}">
            <!-- Event Type -->
            <div>
                <label class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Tipe Event</label>
                <select name="event_type" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">Semua Event</option>
                    @foreach($eventTypes as $type)
                        <option value="{{ $type }}" {{ request('event_type') === $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- User -->
            <div>
                <label class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Aktor Pengguna</label>
                <select name="user_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                    <option value="">Semua Pengguna</option>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>
                            {{ $u->name }} ({{ $u->username }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- IP Address -->
            <div>
                <label class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Alamat IP</label>
                <input type="text" name="ip_address" value="{{ request('ip_address') }}" placeholder="Contoh: 127.0.0.1"
                    class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            </div>

            <!-- Start Date -->
            <div>
                <label class="block text-[11px] font-bold text-default-600 uppercase tracking-wider mb-1.5">Dari Tanggal</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}"
                    class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-2">
                <button type="submit" class="btn btn-sm h-10 flex-1 px-4 bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition cursor-pointer inline-flex items-center justify-center gap-1.5">
                    <i data-lucide="filter" class="size-4"></i>
                    <span>Filter</span>
                </button>
                <a href="{{ route('staff.security.audit-logs') }}" class="btn btn-sm h-10 px-3.5 border border-default-200 bg-default-100 hover:bg-default-200 text-default-700 rounded text-xs font-medium inline-flex items-center justify-center transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Tabel Audit Logs -->
    <x-cbt.card title="Daftar Rekaman Audit (Total {{ $logs->total() }})">
        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[760px] text-left text-xs border-collapse" data-gridjs="true" data-gridjs-page-size="10">
                <thead>
                    <tr class="border-b border-default-200 bg-default-50 text-default-600 font-semibold uppercase tracking-wider">
                        <th class="py-3 px-4 w-12 text-center whitespace-nowrap">ID</th>
                        <th class="py-3 px-4 w-36 whitespace-nowrap">Waktu Kejadian</th>
                        <th class="py-3 px-4 whitespace-nowrap">Tipe Event</th>
                        <th class="py-3 px-4 whitespace-nowrap">Aktor Pengguna</th>
                        <th class="py-3 px-4 whitespace-nowrap">Alamat IP</th>
                        <th class="py-3 px-4 whitespace-nowrap">Catatan Aktivitas</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($logs as $log)
                        <tr class="hover:bg-default-50 transition">
                            <td class="py-3 px-4 text-center font-mono text-default-400 whitespace-nowrap">#{{ $log->id }}</td>
                            <td class="py-3 px-4 text-default-600 whitespace-nowrap font-mono">
                                {{ $log->created_at->format('d/m/Y H:i:s') }}
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                <span class="px-2 py-0.5 rounded font-mono font-bold text-[10px] bg-default-100 text-default-800 border border-default-200">
                                    {{ $log->event_type }}
                                </span>
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                @if($log->user)
                                    <div class="font-bold text-default-900">{{ $log->user->name }}</div>
                                    <div class="text-[10px] text-default-400 font-mono">{{ $log->user->username }}</div>
                                @else
                                    <span class="text-default-400 italic">Sistem Otonom</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 font-mono text-default-600 whitespace-nowrap">
                                {{ $log->ip_address ?? '-' }}
                            </td>
                            <td class="py-3 px-4 text-default-700 min-w-[200px]">
                                {{ $log->notes ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-default-400">
                                Belum ada data audit log yang sesuai dengan filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
            <div class="p-4 border-t border-default-100">
                {{ $logs->links() }}
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection

