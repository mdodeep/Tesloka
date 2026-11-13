@props([
    'name',
    'id' => null,
    'label' => null,
    'accept' => null,
    'maxSize' => '2MB',
    'currentUrl' => null,
    'hint' => null,
    'required' => false,
])

@php
    $inputId = $id ?? 'dropzone_' . $name . '_' . uniqid();
    $previewContainerId = 'preview_' . $inputId;
@endphp

<div class="space-y-2">
    @if($label)
        <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <!-- Dropzone Box (Tampil saat belum ada berkas baru yang dipilih) -->
    <div
        id="dropzone_box_{{ $inputId }}"
        class="border-2 border-dashed border-default-300 hover:border-primary/80 bg-default-50/50 hover:bg-primary/5 rounded-lg p-6 text-center transition-all cursor-pointer group relative {{ $currentUrl ? 'hidden' : '' }}"
        onclick="document.getElementById('{{ $inputId }}').click()"
        ondragover="event.preventDefault(); this.classList.add('!border-primary', 'bg-primary/10');"
        ondragleave="event.preventDefault(); this.classList.remove('!border-primary', 'bg-primary/10');"
        ondrop="event.preventDefault(); this.classList.remove('!border-primary', 'bg-primary/10'); handleDropzoneDrop(event, '{{ $inputId }}');"
    >
        <input
            type="file"
            id="{{ $inputId }}"
            name="{{ $name }}"
            @if($accept) accept="{{ $accept }}" @endif
            @if($required) required @endif
            class="sr-only hidden"
            style="display: none !important; position: absolute !important; width: 0 !important; height: 0 !important; opacity: 0 !important; pointer-events: none !important;"
            tabindex="-1"
            aria-hidden="true"
            onchange="handleDropzoneChange(this, '{{ $previewContainerId }}')"
        >

        <div class="flex flex-col items-center justify-center">
            <div class="size-12 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-3 group-hover:scale-110 transition-transform shadow-2xs">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                </svg>
            </div>
            <p class="font-medium text-xs text-default-800 group-hover:text-primary transition-colors">
                Tarik & letakkan berkas di sini, atau <span class="text-primary font-bold underline underline-offset-2">pilih dari perangkat</span>
            </p>
            <p class="text-[11px] text-default-400 mt-1">
                {{ $hint ?? ($accept ? 'Mendukung ' . $accept : 'Pilih berkas dari perangkat') }} &bull; Maks. {{ $maxSize }}
            </p>
        </div>
    </div>

    <!-- Active File Preview Card (Menggantikan dropzone secara rapi dengan tampilan modern Tailwick) -->
    <div id="{{ $previewContainerId }}" class="hidden">
        <div class="border border-default-200 rounded-lg bg-white p-3.5 shadow-2xs transition-all hover:border-primary/40">
            <!-- Loading Indicator Konversi WebP 60% -->
            <div id="converting_{{ $inputId }}" class="hidden flex items-center gap-2.5 p-2.5 bg-primary/5 rounded-md border border-primary/20 text-xs text-primary mb-3">
                <svg class="size-4 animate-spin shrink-0 text-primary" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
                <div class="flex-1 min-w-0">
                    <strong class="font-semibold block text-primary">Mengompresi ke WebP 60%...</strong>
                    <span class="text-[11px] text-primary/80">Mengoptimalkan efisiensi ukuran gambar dengan visual jernih</span>
                </div>
            </div>

            <div class="flex items-center gap-3.5">
                <!-- Thumbnail Box -->
                <div id="thumb_box_{{ $inputId }}" class="size-14 rounded-lg bg-default-100 border border-default-200 flex items-center justify-center shrink-0 overflow-hidden relative shadow-2xs">
                    <img id="thumb_img_{{ $inputId }}" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'/%3E" class="size-full object-cover hidden" alt="Selected File">
                    <svg id="thumb_icon_{{ $inputId }}" class="size-6 text-default-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>

                <!-- File Info Details -->
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 flex-wrap mb-1">
                        <span id="filename_{{ $inputId }}" class="text-xs font-bold text-default-900 truncate max-w-[220px] sm:max-w-[320px]" title="Nama Berkas">file.webp</span>
                        <span id="badge_webp_{{ $inputId }}" class="hidden shrink-0 px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200/80">
                            WebP 60%
                        </span>
                    </div>
                    <div class="text-[11px] text-default-500 flex items-center gap-2 flex-wrap">
                        <span id="filesize_{{ $inputId }}" class="font-semibold text-default-700">0 KB</span>
                        <span id="savings_tag_{{ $inputId }}" class="hidden text-emerald-700 font-semibold bg-emerald-50 px-2 py-0.5 rounded text-[10px] border border-emerald-200/60 inline-flex items-center gap-1">
                            <svg class="size-3 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                            <span>Hemat 0%</span>
                        </span>
                    </div>
                </div>

                <!-- Action Controls -->
                <div class="flex items-center gap-1.5 shrink-0">
                    <button type="button" onclick="document.getElementById('{{ $inputId }}').click()" class="px-3 py-1.5 bg-default-100 hover:bg-default-200 text-default-700 text-xs font-semibold rounded border border-default-200/70 transition cursor-pointer shadow-2xs" title="Ganti berkas">
                        Ganti
                    </button>
                    <button type="button" onclick="resetDropzone('{{ $inputId }}', '{{ $previewContainerId }}', '{{ $currentUrl ? 'current_' . $inputId : '' }}')" class="size-8 flex items-center justify-center text-default-400 hover:text-rose-600 hover:bg-rose-50 rounded transition cursor-pointer" title="Hapus / Batal Pilih">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Current File State (Tampil jika sudah ada berkas sebelumnya di halaman edit) -->
    @if($currentUrl)
        <div id="current_{{ $inputId }}" class="border border-default-200 rounded-lg bg-white p-3 shadow-2xs flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <img src="{{ $currentUrl }}" alt="Berkas Saat Ini" class="size-12 rounded-lg bg-default-100 object-cover border border-default-200 shrink-0" onerror="this.onerror=null; this.src='{{ asset('assets/images/favicon-tesloka-bg-putih.webp') }}'">
                <div class="text-left truncate">
                    <div class="text-xs font-bold text-default-800 truncate">Berkas Tersimpan Saat Ini</div>
                    <div class="text-[11px] text-emerald-600 font-medium flex items-center gap-1 mt-0.5">
                        <span class="size-1.5 rounded-full bg-emerald-500"></span> Aktif digunakan di sistem
                    </div>
                </div>
            </div>
            <button type="button" onclick="document.getElementById('{{ $inputId }}').click()" class="px-3 py-1.5 bg-primary/10 text-primary hover:bg-primary hover:text-white rounded text-xs font-semibold transition cursor-pointer">
                Ganti Berkas
            </button>
        </div>
    @endif

    @error($name)
        <p class="text-xs text-danger font-medium mt-1">{{ $message }}</p>
    @enderror
</div>
