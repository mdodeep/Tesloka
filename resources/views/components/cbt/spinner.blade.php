@props([
    'type' => 'default', // 'default' (spinner) | 'ping' | 'bounce'
    'size' => 'md',      // 'xs' | 'sm' | 'md' | 'lg' | 'xl'
    'color' => 'primary', // 'primary' | 'success' | 'warning' | 'danger' | 'info' | 'secondary' | 'white' | 'default'
    'label' => null,     // Optional label text next to spinner
])

@php
    $sizeMap = [
        'xs' => 'size-3.5',
        'sm' => 'size-4',
        'md' => 'size-6',
        'lg' => 'size-8',
        'xl' => 'size-10',
    ];

    $borderColorMap = [
        'primary'   => 'border-primary',
        'success'   => 'border-success',
        'warning'   => 'border-warning',
        'danger'    => 'border-danger',
        'info'      => 'border-info',
        'secondary' => 'border-secondary',
        'white'     => 'border-white',
        'default'   => 'border-default-800',
    ];

    $bgColorMap = [
        'primary'   => 'bg-primary',
        'success'   => 'bg-success',
        'warning'   => 'bg-warning',
        'danger'    => 'bg-danger',
        'info'      => 'bg-info',
        'secondary' => 'bg-secondary',
        'white'     => 'bg-white',
        'default'   => 'bg-default-800',
    ];

    $dimension = $sizeMap[$size] ?? 'size-6';
    $borderColor = $borderColorMap[$color] ?? 'border-primary';
    $bgColor = $bgColorMap[$color] ?? 'bg-primary';
@endphp

<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-2']) }}>
    @if ($type === 'ping')
        <div class="inline-flex rounded-full opacity-75 {{ $dimension }} animate-ping {{ $bgColor }}"></div>
    @elseif ($type === 'bounce')
        <div class="inline-flex rounded-full opacity-75 {{ $dimension }} animate-bounce {{ $bgColor }}"></div>
    @else
        <div class="inline-block border-2 rounded-full {{ $dimension }} animate-spin border-s-transparent {{ $borderColor }}"></div>
    @endif

    @if ($label)
        <span class="text-xs text-default-600 font-medium">{{ $label }}</span>
    @endif
</div>

