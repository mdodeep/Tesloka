@props([
    'type' => 'info',
    'title' => null,
])

@php
    $types = [
        'info' => [
            'box' => 'bg-info/10 border-info/30 text-info',
            'icon' => '<i data-lucide="info" class="size-5 text-info shrink-0"></i>',
        ],
        'success' => [
            'box' => 'bg-success/10 border-success/30 text-success text-emerald-800',
            'icon' => '<i data-lucide="check-circle" class="size-5 text-success shrink-0"></i>',
        ],
        'warning' => [
            'box' => 'bg-warning/10 border-warning/30 text-warning text-amber-800',
            'icon' => '<i data-lucide="alert-triangle" class="size-5 text-warning shrink-0"></i>',
        ],
        'danger' => [
            'box' => 'bg-danger/10 border-danger/30 text-danger text-rose-800',
            'icon' => '<i data-lucide="alert-octagon" class="size-5 text-danger shrink-0"></i>',
        ],
        'primary' => [
            'box' => 'bg-primary/10 border-primary/30 text-primary',
            'icon' => '<i data-lucide="shield" class="size-5 text-primary shrink-0"></i>',
        ],
    ];

    $current = $types[$type] ?? $types['info'];
@endphp

<div {{ $attributes->merge(['class' => 'p-4 rounded border text-sm flex items-start gap-3 ' . $current['box']]) }}>
    {!! $current['icon'] !!}
    <div class="flex-1">
        @if ($title)
            <div class="font-semibold text-sm mb-0.5">{{ $title }}</div>
        @endif
        <div class="text-xs leading-relaxed">{{ $slot }}</div>
    </div>
</div>
