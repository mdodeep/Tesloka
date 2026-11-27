@extends('layouts.staff')

@section('title', 'Sesi & Perangkat Aktif')
@section('page-parent', 'Tata Kelola & Keamanan')
@section('page-title')
Manajemen Sesi & Perangkat Aktif
@endsection
@section('page-subtitle', 'Pantau seluruh perangkat yang saat ini terhubung ke akun Anda. Cabut sesi yang mencurigakan demi menjaga integritas sistem.')

@section('page-actions')
    @if(($otherActiveCount ?? 0) > 0)
        <form action="{{ route('staff.security.sessions.revoke-others') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mencabut seluruh sesi perangkat lain?')" class="inline w-full sm:w-auto">
            @csrf
            <button type="submit" class="btn btn-sm bg-danger/10 hover:bg-danger/20 text-danger border border-danger/20 rounded text-xs font-semibold transition inline-flex items-center justify-center gap-1.5 cursor-pointer shadow-2xs w-full sm:w-auto">
                <i data-lucide="log-out" class="size-4"></i>
                <span>Cabut Seluruh Sesi Lain ({{ $otherActiveCount }})</span>
            </button>
        </form>
    @endif
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Metric Overview Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <x-cbt.stat-card 
            title="Total Sesi" 
            value="{{ $totalCount }}" 
            subtitle="Seluruh Perangkat" 
            icon="shield" 
            color="primary" />
        <x-cbt.stat-card 
            title="Aktif Sekarang" 
            value="{{ $activeCount }}" 
            subtitle="Sesi Terotentikasi" 
            icon="check-circle-2" 
            color="success" />
        <x-cbt.stat-card 
            title="Perangkat Lain" 
            value="{{ $otherActiveCount ?? 0 }}" 
            subtitle="Di Luar Peramban Ini" 
            icon="monitor" 
            color="warning" />
        <x-cbt.stat-card 
            title="Dicabut Keluar" 
            value="{{ $revokedCount }}" 
            subtitle="Sesi Telah Ditutup" 
            icon="log-out" 
            color="secondary" />
    </div>

    <!-- Daftar Perangkat Sesi Aktif -->
    <x-cbt.card title="Daftar Perangkat Terdeteksi ({{ $sessions->total() }})">
        <!-- Filter Status Sesi (Semua, Aktif Saja, Dicabut) -->
        <div class="flex items-center gap-2 mb-4 overflow-x-auto pb-1 -mx-1 px-1">
            <a href="{{ route('staff.security.sessions', ['status' => 'all']) }}"
               class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition inline-flex items-center gap-1.5 {{ $status === 'all' ? 'bg-primary text-white shadow-2xs' : 'bg-white border border-default-200/90 text-default-600 hover:bg-default-50' }}">
                <span>Semua Sesi</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $status === 'all' ? 'bg-white/20 text-white' : 'bg-default-200 text-default-700' }}">{{ $totalCount }}</span>
            </a>
            <a href="{{ route('staff.security.sessions', ['status' => 'active']) }}"
               class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition inline-flex items-center gap-1.5 {{ $status === 'active' ? 'bg-emerald-600 text-white shadow-2xs' : 'bg-white border border-default-200/90 text-default-600 hover:bg-default-50' }}">
                <span class="size-1.5 rounded-full {{ $status === 'active' ? 'bg-white' : 'bg-emerald-500' }}"></span>
                <span>Aktif Saja</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $status === 'active' ? 'bg-white/20 text-white' : 'bg-emerald-100 text-emerald-800' }}">{{ $activeCount }}</span>
            </a>
            <a href="{{ route('staff.security.sessions', ['status' => 'revoked']) }}"
               class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition inline-flex items-center gap-1.5 {{ $status === 'revoked' ? 'bg-rose-600 text-white shadow-2xs' : 'bg-white border border-default-200/90 text-default-600 hover:bg-default-50' }}">
                <span>Dicabut Keluar</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $status === 'revoked' ? 'bg-white/20 text-white' : 'bg-rose-100 text-rose-800' }}">{{ $revokedCount }}</span>
            </a>
        </div>

        <div class="divide-y divide-slate-100">
            @forelse($sessions as $session)
                @php
                    $isCurrent = $session->session_id === $currentSessionId;
                @endphp
                <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 {{ $session->is_revoked ? 'opacity-50' : '' }}">
                    @php
                        $friendlyDev = $session->getFriendlyDeviceLabel();
                        $devCat = $session->device_category ?? $session->device_type;
                    @endphp
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded {{ $isCurrent ? 'bg-primary/10 text-primary border border-primary/20' : 'bg-default-100 text-default-600' }} flex items-center justify-center shrink-0">
                            @if($devCat === 'hp' || $devCat === 'mobile')
                                <i data-lucide="smartphone" class="size-5"></i>
                            @elseif($devCat === 'tablet')
                                <i data-lucide="tablet" class="size-5"></i>
                            @elseif($devCat === 'laptop')
                                <i data-lucide="laptop" class="size-5"></i>
                            @else
                                <i data-lucide="monitor" class="size-5"></i>
                            @endif
                        </div>

                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="font-bold text-sm text-default-900">
                                    {{ $session->browser ?? 'Browser' }} pada {{ $session->os_name ?? $session->platform ?? 'Perangkat' }}
                                </span>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-primary border border-blue-200">
                                    {{ $friendlyDev }}
                                </span>
                                @if($isCurrent)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                        Sesi Perangkat Ini
                                    </span>
                                @endif
                                @if($session->is_revoked)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-default-100 text-default-500">
                                        Dicabut Keluar
                                    </span>
                                @endif
                            </div>

                            <div class="text-xs text-default-500 mt-1 space-x-3">
                                <span>IP: <strong class="font-mono text-default-700">{{ $session->ip_address }}</strong></span>
                                <span>&bull;</span>
                                <span>Aktivitas Terakhir: {{ $session->last_active_at ? $session->last_active_at->diffForHumans() : '-' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="sm:text-right">
                        @if(! $isCurrent && ! $session->is_revoked)
                            <form action="{{ route('staff.security.sessions.revoke', $session) }}" method="POST" onsubmit="return confirm('Cabut akses untuk perangkat ini?')">
                                @csrf
                                <button type="submit" class="btn btn-sm bg-danger/10 hover:bg-danger/20 text-danger border border-danger/20 rounded text-xs font-semibold transition cursor-pointer">
                                    Cabut Sesi
                                </button>
                            </form>
                        @elseif($isCurrent)
                            <span class="text-xs text-emerald-600 font-semibold flex items-center sm:justify-end gap-1">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Aktif Sekarang
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-default-400 text-sm">
                    Belum ada riwayat sesi tercatat untuk kategori ini.
                </div>
            @endforelse
        </div>

        @if($sessions->hasPages())
            <div class="mt-4 pt-3 border-t border-default-200">
                {{ $sessions->links() }}
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection
