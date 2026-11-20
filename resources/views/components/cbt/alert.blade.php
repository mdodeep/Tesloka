@props([
    'type' => 'info',
    'title' => null,
])

@php
    $types = [
        'info' => [
            'box' => 'bg-sky-50 border-sky-200 text-sky-900 dark:bg-sky-950/40 dark:text-sky-300 dark:border-sky-800',
            'icon' => '<i data-lucide="info" class="size-5 text-sky-600 shrink-0 mt-0.5"></i>',
        ],
        'success' => [
            'box' => 'bg-emerald-50 border-emerald-200 text-emerald-900 dark:bg-emerald-950/40 dark:text-emerald-300 dark:border-emerald-800',
            'icon' => '<i data-lucide="check-circle" class="size-5 text-emerald-600 shrink-0 mt-0.5"></i>',
        ],
        'warning' => [
            'box' => 'bg-amber-50 border-amber-200 text-amber-900 dark:bg-amber-950/40 dark:text-amber-300 dark:border-amber-800',
            'icon' => '<i data-lucide="alert-triangle" class="size-5 text-amber-600 shrink-0 mt-0.5"></i>',
        ],
        'danger' => [
            'box' => 'bg-rose-50 border-rose-200 text-rose-900 dark:bg-rose-950/40 dark:text-rose-300 dark:border-rose-800',
            'icon' => '<i data-lucide="alert-octagon" class="size-5 text-rose-600 shrink-0 mt-0.5"></i>',
        ],
        'primary' => [
            'box' => 'bg-primary/10 border-primary/25 text-primary-950 dark:bg-primary-950/40 dark:text-primary-300 dark:border-primary-800',
            'icon' => '<i data-lucide="shield" class="size-5 text-primary shrink-0 mt-0.5"></i>',
        ],
    ];

    $current = $types[$type] ?? $types['info'];
@endphp

<div {{ $attributes->merge(['class' => 'p-4 rounded-xl border text-sm flex items-start gap-3 shadow-2xs ' . $current['box']]) }}>
    {!! $current['icon'] !!}
    <div class="flex-1 min-w-0">
        @if ($title)
            <div class="font-bold text-sm mb-0.5">{{ $title }}</div>
        @endif
        <div class="text-xs leading-relaxed">{{ $slot }}</div>
    </div>
</div>
