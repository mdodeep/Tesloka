@props([
    'title' => 'Tidak Ada Data',
    'description' => 'Belum ada data yang tersedia untuk ditampilkan.',
    'message' => null,
    'bordered' => false,
])

@php
    $effectiveDescription = $message ?? $description;
    $wrapperClasses = $bordered
        ? 'p-8 border border-dashed border-default-200 rounded-md text-center space-y-3 bg-default-50/50'
        : 'py-12 px-4 text-center space-y-3';
@endphp

<div {{ $attributes->merge(['class' => $wrapperClasses]) }}>
    <div class="size-11 rounded-full bg-default-100 text-default-600 flex items-center justify-center mx-auto">
        <i data-lucide="inbox" class="size-5"></i>
    </div>
    <div>
        <div class="text-sm font-semibold text-default-800">{{ $title }}</div>
        <p class="text-xs text-default-600 max-w-sm mx-auto mt-0.5">{{ $effectiveDescription }}</p>
    </div>
    @if ($slot->isNotEmpty())
        <div class="pt-2">
            {{ $slot }}
        </div>
    @endif
</div>
