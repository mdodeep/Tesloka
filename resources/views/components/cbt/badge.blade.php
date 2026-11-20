@props([
    'variant' => null,
    'color' => null,
])

@php
    $type = $variant ?? $color ?? 'slate';

    $variants = [
        'primary' => 'bg-primary/10 text-primary border border-primary/20',
        'secondary' => 'bg-secondary/10 text-secondary border border-secondary/20',
        'success' => 'bg-emerald-50 text-emerald-700 border border-emerald-200/80',
        'warning' => 'bg-amber-50 text-amber-700 border border-amber-200/80',
        'danger' => 'bg-rose-50 text-rose-700 border border-rose-200/80',
        'info' => 'bg-sky-50 text-sky-700 border border-sky-200/80',
        'slate' => 'bg-default-100 text-default-700 border border-default-200',
        'indigo' => 'bg-indigo-50 text-indigo-700 border border-indigo-200/80',
        'purple' => 'bg-purple-50 text-purple-700 border border-purple-200/80',
        'teal' => 'bg-teal-50 text-teal-700 border border-teal-200/80',
    ];

    $classes = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[11px] font-semibold tracking-wide whitespace-nowrap ' . ($variants[$type] ?? $variants['slate']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
