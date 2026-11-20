@props([
    'variant' => null,
    'color' => null,
])

@php
    $type = $variant ?? $color ?? 'slate';

    $variants = [
        'primary' => 'bg-primary/10 text-primary border border-primary/20',
        'secondary' => 'bg-secondary/10 text-secondary border border-secondary/20',
        'success' => 'bg-emerald-50 text-emerald-700 border border-emerald-200 dark:bg-emerald-950/40 dark:text-emerald-400',
        'warning' => 'bg-amber-50 text-amber-700 border border-amber-200 dark:bg-amber-950/40 dark:text-amber-400',
        'danger' => 'bg-rose-50 text-rose-700 border border-rose-200 dark:bg-rose-950/40 dark:text-rose-400',
        'info' => 'bg-sky-50 text-sky-700 border border-sky-200 dark:bg-sky-950/40 dark:text-sky-400',
        'slate' => 'bg-default-100 text-default-700 border border-default-200',
        'indigo' => 'bg-indigo-50 text-indigo-700 border border-indigo-200',
        'purple' => 'bg-purple-50 text-purple-700 border border-purple-200',
    ];

    $classes = 'inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md text-[11px] font-semibold tracking-wide ' . ($variants[$type] ?? $variants['slate']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
