@props([
    'title' => null,
    'subtitle' => null,
    'actions' => null,
    'footer' => null,
])

<div {{ $attributes->merge(['class' => 'card']) }}>
    @if ($title || $actions)
        <div class="card-header flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 sm:px-5 border-b border-default-200">
            <div class="min-w-0">
                @if ($title)
                    <h4 class="card-title">{{ $title }}</h4>
                @endif
                @if ($subtitle)
                    <p class="text-xs text-default-500 mt-0.5 leading-relaxed">{{ $subtitle }}</p>
                @endif
            </div>
            @if ($actions)
                <div class="flex items-center gap-2 shrink-0 self-start sm:self-auto flex-wrap">
                    {{ $actions }}
                </div>
            @endif
        </div>
    @endif

    <div class="card-body p-3.5 sm:p-5">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="card-footer flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 sm:px-5 border-t border-default-200">
            {{ $footer }}
        </div>
    @endif
</div>
