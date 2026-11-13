@props([
    'number',
    'status' => 'unanswered', // 'unanswered', 'answered', 'doubtful'
    'isCurrent' => false,
])

@php
    $base = 'size-9 rounded font-semibold text-xs flex items-center justify-center transition-all cursor-pointer select-none';

    $statusClasses = [
        'unanswered' => 'bg-card border border-default-200 text-default-700 hover:border-primary',
        'answered' => 'bg-success bg-emerald-600 text-white shadow-xs hover:bg-success/90',
        'doubtful' => 'bg-warning bg-amber-500 text-white shadow-xs hover:bg-warning/90',
    ];

    $currentClass = $isCurrent ? ' ring-2 ring-[#2e33ff] ring-offset-2 font-bold' : '';
    $classes = "{$base} " . ($statusClasses[$status] ?? $statusClasses['unanswered']) . $currentClass;
@endphp

<button type="button" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $number }}
</button>
