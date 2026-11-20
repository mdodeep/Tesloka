@props([
    'title',
    'value',
    'subtitle' => null,
    'icon' => 'activity',
    'color' => 'primary',
])

@php
    $colorMap = [
        'primary' => 'bg-primary/10 text-primary',
        'info' => 'bg-info/10 text-info',
        'success' => 'bg-emerald-500/10 text-emerald-600',
        'warning' => 'bg-amber-500/10 text-amber-600',
        'danger' => 'bg-rose-500/10 text-rose-600',
        'secondary' => 'bg-secondary/10 text-secondary',
        'indigo' => 'bg-indigo-500/10 text-indigo-600',
        'teal' => 'bg-teal-500/10 text-teal-600',
        'purple' => 'bg-purple-500/10 text-purple-600',
    ];

    $iconColor = $colorMap[$color] ?? $colorMap['primary'];
@endphp

<div {{ $attributes->merge(['class' => 'card rounded-xl border border-default-200/90 shadow-2xs hover:border-default-300 transition bg-white']) }}>
    <div class="card-body p-4 sm:p-5 flex items-center justify-between">
        <div class="min-w-0 pr-2">
            <div class="text-xs text-default-600 font-semibold tracking-normal truncate">{!! $title !!}</div>
            <div class="text-2xl font-bold text-default-800 mt-1 truncate">{{ $value }}</div>
            @if ($subtitle)
                <div class="text-xs text-default-400 mt-0.5 truncate">{!! $subtitle !!}</div>
            @endif
        </div>
        <div class="size-11 rounded-lg {{ $iconColor }} flex items-center justify-center shrink-0">
            <i data-lucide="{{ $icon }}" class="size-5.5"></i>
        </div>
    </div>
</div>
