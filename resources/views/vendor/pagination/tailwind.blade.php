@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Navigasi Halaman" class="flex items-center justify-between sm:justify-end gap-1.5">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-default-300 bg-default-50 border border-default-200 rounded cursor-not-allowed">
                <i data-lucide="chevron-left" class="size-3.5 mr-1"></i>
                <span>Sebelumnya</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-default-700 bg-white border border-default-200 rounded hover:bg-default-50 hover:text-primary hover:border-primary/40 transition">
                <i data-lucide="chevron-left" class="size-3.5 mr-1"></i>
                <span>Sebelumnya</span>
            </a>
        @endif

        {{-- Pagination Elements --}}
        <div class="hidden sm:inline-flex items-center gap-1">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="inline-flex items-center justify-center min-w-[28px] h-7 px-1 text-xs font-medium text-default-400 cursor-default">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="inline-flex items-center justify-center min-w-[28px] h-7 px-2 text-xs font-bold text-white bg-primary rounded shadow-2xs">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="inline-flex items-center justify-center min-w-[28px] h-7 px-2 text-xs font-medium text-default-700 bg-white border border-default-200 rounded hover:bg-default-50 hover:text-primary hover:border-primary/40 transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-default-700 bg-white border border-default-200 rounded hover:bg-default-50 hover:text-primary hover:border-primary/40 transition">
                <span>Berikutnya</span>
                <i data-lucide="chevron-right" class="size-3.5 ml-1"></i>
            </a>
        @else
            <span class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-default-300 bg-default-50 border border-default-200 rounded cursor-not-allowed">
                <span>Berikutnya</span>
                <i data-lucide="chevron-right" class="size-3.5 ml-1"></i>
            </span>
        @endif
    </nav>
@endif
