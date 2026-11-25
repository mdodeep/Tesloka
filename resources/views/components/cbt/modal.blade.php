@props([
    'id',
    'title' => 'Konfirmasi Tindakan',
    'size' => 'md', // sm, md, lg, xl
])

@php
    $sizes = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<div id="{{ $id }}" role="dialog" aria-modal="true" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4 transition-opacity">
    <div class="card w-full {{ $sizeClass }} max-h-[90vh] flex flex-col shadow-2xl border border-default-200/90 rounded-xl overflow-hidden animate-in fade-in zoom-in-95 duration-150">
        <div class="card-header shrink-0 flex items-center justify-between px-5 py-4 border-b border-default-200 bg-white">
            <h4 class="card-title text-base font-bold text-default-900">{{ $title }}</h4>
            <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')" aria-label="Tutup dialog" class="btn btn-icon size-8 rounded-lg hover:bg-default-100 text-default-500 hover:text-default-700 cursor-pointer transition">
                <i data-lucide="x" class="size-4"></i>
            </button>
        </div>

        <div class="card-body overflow-y-auto p-5 sm:p-6 bg-white">
            {{ $slot }}
        </div>
    </div>
</div>
