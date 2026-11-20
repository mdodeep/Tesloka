@props([
    'title' => null,
    'subtitle' => null,
    'actions' => null,
    'footer' => null,
    'flush' => false,
])

<div {{ $attributes->merge(['class' => 'card rounded-xl border border-default-200/90 shadow-2xs bg-white overflow-hidden']) }}>
    @if ($title || $actions)
        <div class="card-header flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 sm:px-6 border-b border-default-200/80">
            <div class="min-w-0">
                @if ($title)
                    <h4 class="card-title text-sm sm:text-base font-bold text-default-900 tracking-tight">{{ $title }}</h4>
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

    <div class="{{ $flush ? 'card-body p-0' : 'card-body p-4 sm:p-5' }}">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="card-footer flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 sm:px-6 border-t border-default-200/80 bg-default-50/40">
            {{ $footer }}
        </div>
    @endif
</div>
