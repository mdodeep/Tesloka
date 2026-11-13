@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
])

@php
    $baseClasses = 'btn';

    $variants = [
        'primary' => 'bg-primary text-white hover:bg-primary-hover shadow-xs <!-- #2e33ff -->',
        'secondary' => 'border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs',
        'success' => 'bg-success text-white hover:bg-success/90 shadow-xs',
        'danger' => 'bg-danger text-white hover:bg-danger/90 shadow-xs',
        'warning' => 'bg-warning text-white hover:bg-warning/90 shadow-xs',
        'soft-primary' => 'bg-primary/10 text-primary hover:bg-primary hover:text-white',
        'outline' => 'border border-default-300 text-default-700 hover:bg-default-100',
        'ghost' => 'text-default-600 hover:bg-default-100 border-transparent',
    ];

    $sizes = [
        'sm' => 'btn-sm',
        'md' => '',
        'lg' => 'btn-lg',
    ];

    $classes = "{$baseClasses} " . ($variants[$variant] ?? $variants['primary']) . ($sizes[$size] ? ' ' . $sizes[$size] : '');
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
