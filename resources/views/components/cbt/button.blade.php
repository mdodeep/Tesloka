@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
])

@php
    $baseClasses = 'btn cursor-pointer inline-flex items-center justify-center gap-1.5 font-semibold transition-all duration-150 select-none active:scale-[0.98] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2';

    $variants = [
        'primary' => 'bg-primary text-white hover:bg-primary-hover hover:text-white shadow-xs focus-visible:ring-primary/40',
        'secondary' => 'border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-2xs focus-visible:ring-default-400',
        'success' => 'bg-success text-white hover:bg-success/90 shadow-xs focus-visible:ring-success/40',
        'danger' => 'bg-danger text-white hover:bg-danger/90 shadow-xs focus-visible:ring-danger/40',
        'warning' => 'bg-warning text-white hover:bg-warning/90 shadow-xs focus-visible:ring-warning/40',
        'soft-primary' => 'bg-primary/10 text-primary hover:bg-primary hover:text-white border border-primary/20 focus-visible:ring-primary/40',
        'outline' => 'border border-default-300 text-default-700 hover:bg-default-100 focus-visible:ring-default-400',
        'ghost' => 'text-default-600 hover:bg-default-100 border-transparent focus-visible:ring-default-400',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs rounded-md',
        'md' => 'px-3.5 py-2 text-xs sm:text-sm rounded-lg',
        'lg' => 'px-5 py-2.5 text-sm sm:text-base rounded-lg',
    ];

    $classes = "{$baseClasses} " . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

<button type="{{ $type }}" data-theme-color="#2e33ff" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
