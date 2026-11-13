@extends('layouts.staff')

@section('title', 'Pusat Notifikasi Internal')
@section('page-parent', 'Sistem & Pengaturan')
@section('page-title', 'Pusat Notifikasi Internal')
@section('page-subtitle', 'Pantau seluruh pemberitahuan sistem, approval, dan aktivitas penting secara terpusat')

@section('page-actions')
    <form action="{{ route('staff.notifications.read-all') }}" method="POST" class="inline w-full sm:w-auto">
        @csrf
        <button type="submit" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition cursor-pointer w-full sm:w-auto">
            <svg class="size-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span>Tandai Semua Sudah Dibaca</span>
        </button>
    </form>
@endsection

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border border-default-200 rounded p-4 shadow-2xs">
            <div class="text-[11px] font-bold text-default-400 uppercase tracking-wider">Belum Dibaca</div>
            <div class="text-2xl font-bold text-primary mt-1">{{ $unreadCount }}</div>
            <p class="text-xs text-default-400 mt-1">Pemberitahuan butuh tindakan / perhatian</p>
        </div>
        <div class="bg-white border border-default-200 rounded p-4 shadow-2xs">
            <div class="text-[11px] font-bold text-default-400 uppercase tracking-wider">Total Notifikasi</div>
            <div class="text-2xl font-bold text-default-800 mt-1">{{ $allNotifications->total() }}</div>
            <p class="text-xs text-default-400 mt-1">Riwayat notifikasi akun Anda</p>
        </div>
        <div class="bg-white border border-default-200 rounded p-4 shadow-2xs">
            <div class="text-[11px] font-bold text-default-400 uppercase tracking-wider">Kanal Real-time</div>
            <div class="text-2xl font-bold text-emerald-600 mt-1">Aktif</div>
            <p class="text-xs text-default-400 mt-1">Sinkronisasi in-app & WebSocket</p>
        </div>
    </div>

    <x-cbt.card title="Daftar Notifikasi Masuk">
        <div class="divide-y divide-default-100">
            @forelse($allNotifications as $item)
                <div class="py-3.5 px-2 flex flex-col sm:flex-row sm:items-start justify-between gap-3 sm:gap-4 {{ $item->is_read ? 'opacity-80' : 'bg-primary/5 rounded' }}">
                    <div class="flex items-start gap-3">
                        <div class="size-8 rounded-full flex items-center justify-center shrink-0 mt-0.5 {{ $item->is_read ? 'bg-default-100 text-default-500' : 'bg-primary/10 text-primary' }}">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <h4 class="text-xs font-bold text-default-800">{{ $item->title }}</h4>
                                @if(! $item->is_read)
                                    <span class="size-2 rounded-full bg-primary inline-block"></span>
                                @endif
                                <span class="text-[10px] text-default-400 font-mono">{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-xs text-default-600 mt-1 leading-relaxed">{{ $item->message }}</p>
                            @if($item->action_url)
                                <a href="{{ $item->action_url }}" class="inline-flex items-center gap-1 text-[11px] font-semibold text-primary hover:underline mt-2">
                                    <span>Buka Tautan Terkait</span>
                                    <svg class="size-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                    @if(! $item->is_read)
                        <form action="{{ route('staff.notifications.read', $item) }}" method="POST" class="shrink-0">
                            @csrf
                            <button type="submit" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 rounded font-medium transition cursor-pointer text-xs w-full sm:w-auto">
                                Tandai Dibaca
                            </button>
                        </form>
                    @endif
                </div>
            @empty
                <div class="py-12 text-center text-default-400">
                    <svg class="size-10 mx-auto text-default-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                    <p class="text-xs">Tidak ada notifikasi yang ditemukan.</p>
                </div>
            @endforelse
        </div>

        @if($allNotifications->hasPages())
            <div class="mt-4 pt-3 border-t border-default-100">
                {{ $allNotifications->links() }}
            </div>
        @endif
    </x-cbt.card>
</div>
@endsection

