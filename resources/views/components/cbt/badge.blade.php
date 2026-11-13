@props([
    'variant' => null,
    'color' => null,
])

@php
    $type = $variant ?? $color ?? 'slate';

    $variants = [
        'primary' => 'bg-primary/10 text-primary border border-primary/20',
        'secondary' => 'bg-secondary/10 text-secondary border border-secondary/20',
        'success' => 'bg-success/10 text-success text-emerald-600 border border-success/20',
        'warning' => 'bg-warning/10 text-warning text-amber-600 border border-warning/20',
        'danger' => 'bg-danger/10 text-danger border border-danger/20',
        'info' => 'bg-info/10 text-info border border-info/20',
        'slate' => 'bg-default-100 text-default-700 border border-default-200',
        'indigo' => 'bg-indigo-500/10 text-indigo-600 border border-indigo-500/20',
        'purple' => 'bg-purple-500/10 text-purple-600 border border-purple-500/20',
    ];

    $classes = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded text-[11px] font-medium ' . ($variants[$type] ?? $variants['slate']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
