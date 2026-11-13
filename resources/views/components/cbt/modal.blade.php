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

<div id="{{ $id }}" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="card w-full {{ $sizeClass }} max-h-[90vh] flex flex-col shadow-lg animate-in fade-in zoom-in-95 duration-150">
        <div class="card-header shrink-0">
            <h4 class="card-title">{{ $title }}</h4>
            <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')" class="btn btn-icon size-8 rounded hover:bg-default-100 text-default-500 cursor-pointer">
                <i data-lucide="x" class="size-4"></i>
            </button>
        </div>

        <div class="card-body overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</div>
