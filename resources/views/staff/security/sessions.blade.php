@extends('layouts.staff')

@section('title', 'Sesi & Perangkat Aktif — TESLOKA CBT')
@section('page-parent', 'Tata Kelola & Keamanan')
@section('page-title')
Manajemen Sesi & Perangkat Aktif
@endsection
@section('page-subtitle', 'Pantau seluruh perangkat yang saat ini terhubung ke akun Anda. Cabut sesi yang mencurigakan demi menjaga integritas sistem.')

@section('page-actions')
    @if(($otherActiveCount ?? 0) > 0)
        <form action="{{ route('staff.security.sessions.revoke-others') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mencabut seluruh sesi perangkat lain?')" class="inline w-full sm:w-auto">
            @csrf
            <button type="submit" class="btn btn-sm bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 rounded text-xs font-semibold transition inline-flex items-center justify-center gap-1.5 cursor-pointer shadow-2xs w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>Cabut Seluruh Sesi Lain ({{ $otherActiveCount }})</span>
            </button>
        </form>
    @endif
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Daftar Perangkat Sesi Aktif -->
    <x-cbt.card title="Daftar Perangkat Terdeteksi ({{ $sessions->total() }})">
        <!-- Filter Status Sesi (Semua, Aktif Saja, Dicabut) -->
        <div class="flex items-center gap-2 mb-4 overflow-x-auto pb-1 -mx-1 px-1">
            <a href="{{ route('staff.security.sessions', ['status' => 'all']) }}"
               class="px-3 py-1.5 rounded text-xs font-semibold transition inline-flex items-center gap-1.5 {{ $status === 'all' ? 'bg-primary text-white shadow-2xs' : 'bg-default-100 text-default-600 hover:bg-default-200' }}">
                <span>Semua Sesi</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $status === 'all' ? 'bg-white/20 text-white' : 'bg-default-200 text-default-700' }}">{{ $totalCount }}</span>
            </a>
            <a href="{{ route('staff.security.sessions', ['status' => 'active']) }}"
               class="px-3 py-1.5 rounded text-xs font-semibold transition inline-flex items-center gap-1.5 {{ $status === 'active' ? 'bg-emerald-600 text-white shadow-2xs' : 'bg-default-100 text-default-600 hover:bg-default-200' }}">
                <span class="size-1.5 rounded-full {{ $status === 'active' ? 'bg-white' : 'bg-emerald-500' }}"></span>
                <span>Aktif Saja</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ $status === 'active' ? 'bg-white/20 text-white' : 'bg-emerald-100 text-emerald-800' }}">{{ $activeCount }}</span>
            </a>
            <a href="{{ route('staff.security.sessions', ['status' => 'revoked']) }}"
               class="px-3 py-1.5 rounded text-xs font-semibold transition inline-flex items-center gap-1.5 {{ $status === 'revoked' ? 'bg-rose-600 text-white shadow-2xs' : 'bg-default-100 text-default-600 hover:bg-default-200' }}">
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
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded {{ $isCurrent ? 'bg-primary/10 text-primary border border-primary/20' : 'bg-default-100 text-default-600' }} flex items-center justify-center shrink-0">
                            @if($session->device_type === 'mobile')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            @endif
                        </div>

                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="font-bold text-sm text-default-900">
                                    {{ $session->browser ?? 'Browser' }} pada {{ $session->platform ?? 'Perangkat' }}
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
                                <button type="submit" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-semibold rounded-lg border border-rose-200 transition cursor-pointer">
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
