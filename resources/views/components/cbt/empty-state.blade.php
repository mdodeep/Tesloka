@props([
    'title' => 'Tidak Ada Data',
    'description' => 'Belum ada data yang tersedia untuk ditampilkan.',
])

<div {{ $attributes->merge(['class' => 'p-8 border border-dashed border-default-200 rounded-md text-center space-y-3 bg-default-50/50']) }}>
    <div class="size-12 rounded-full bg-default-100 text-default-400 flex items-center justify-center mx-auto">
        <i data-lucide="inbox" class="size-6"></i>
    </div>
    <div>
        <div class="text-sm font-semibold text-default-800">{{ $title }}</div>
        <p class="text-xs text-default-500 max-w-sm mx-auto mt-0.5">{{ $description }}</p>
    </div>
    @if ($slot->isNotEmpty())
        <div class="pt-2">
            {{ $slot }}
        </div>
    @endif
</div>
