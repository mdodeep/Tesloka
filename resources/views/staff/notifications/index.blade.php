@extends('layouts.staff')

@section('title', 'Pusat Notifikasi Internal')
@section('page-parent', 'Sistem & Pengaturan')
@section('page-title', 'Pusat Notifikasi Internal')
@section('page-subtitle', 'Pantau seluruh pemberitahuan sistem, approval, dan aktivitas penting secara terpusat')

@section('page-actions')
    <form action="{{ route('staff.notifications.read-all') }}" method="POST" class="inline w-full sm:w-auto">
        @csrf
        <button type="submit" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded inline-flex items-center justify-center gap-1.5 shadow-xs transition cursor-pointer w-full sm:w-auto">
            <i data-lucide="check-check" class="size-4 text-default-500"></i>
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
                            <i data-lucide="bell" class="size-4"></i>
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
                                    <i data-lucide="arrow-right" class="size-3"></i>
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
                    <i data-lucide="inbox" class="size-10 mx-auto text-default-300 mb-2"></i>
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

