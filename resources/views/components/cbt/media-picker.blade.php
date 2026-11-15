@props([
    'namePath' => 'media_path',
    'nameType' => 'media_type',
    'currentPath' => null,
    'currentType' => null,
    'currentUrl' => null,
    'label' => 'Media Lampiran Soal (Audio / Gambar)',
])

@php
    $uniqueId = 'picker_' . str_replace(['[', ']', '-'], '_', $namePath) . '_' . substr(md5($namePath . microtime()), 0, 6);
    $hasMedia = !empty($currentPath);
    $isAudio = $currentType === 'audio' || str_ends_with(strtolower($currentPath ?? ''), '.mp3') || str_ends_with(strtolower($currentPath ?? ''), '.wav');
    $isImage = $currentType === 'image' || preg_match('/\.(jpg|jpeg|png|webp|gif|svg)$/i', $currentPath ?? '');
@endphp

<div id="{{ $uniqueId }}_container" class="space-y-3">
    <div class="flex items-center justify-between">
        <label class="block text-xs font-semibold text-default-700 uppercase">{{ $label }}</label>
        <span class="text-[11px] text-default-400 font-mono">Pustaka Media Terisolasi</span>
    </div>

    <!-- Hidden Form Inputs -->
    <input type="hidden" name="{{ $namePath }}" id="{{ $uniqueId }}_input_path" value="{{ old($namePath, $currentPath) }}">
    <input type="hidden" name="{{ $nameType }}" id="{{ $uniqueId }}_input_type" value="{{ old($nameType, $currentType) }}">

    <!-- Preview Container (When Media is Attached) -->
    <div id="{{ $uniqueId }}_preview_card" class="{{ $hasMedia ? '' : 'hidden' }} p-3.5 bg-slate-50 border border-default-200 rounded-md shadow-2xs">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <div id="{{ $uniqueId }}_icon_holder" class="w-10 h-10 rounded-full {{ $isAudio ? 'bg-indigo-100 text-indigo-700' : 'bg-emerald-100 text-emerald-700' }} flex items-center justify-center shrink-0">
                    <i data-lucide="{{ $isAudio ? 'volume-2' : 'image' }}" class="size-5"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <h5 id="{{ $uniqueId }}_filename" class="text-xs font-bold text-default-800 truncate" title="{{ basename($currentPath ?? '') }}">
                        {{ basename($currentPath ?? 'Berkas Terlampir') }}
                    </h5>
                    <p id="{{ $uniqueId }}_meta" class="text-[11px] text-default-500 font-mono mt-0.5">
                        Tipe: <span class="uppercase font-bold text-default-700">{{ $currentType ?? ($isAudio ? 'AUDIO' : 'GAMBAR') }}</span>
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                <button type="button" onclick="{{ $uniqueId }}_openModal()" class="btn btn-sm bg-white hover:bg-default-100 text-default-700 border border-default-200 text-xs font-semibold rounded shadow-2xs transition inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="refresh-cw" class="size-3.5"></i>
                    <span>Ganti Media</span>
                </button>
                <button type="button" onclick="{{ $uniqueId }}_removeMedia()" class="btn btn-sm bg-danger/10 hover:bg-danger/20 text-danger border border-danger/20 text-xs font-semibold rounded shadow-2xs transition inline-flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="trash-2" class="size-3.5"></i>
                    <span>Hapus Media</span>
                </button>
            </div>
        </div>

        <!-- Audio Player Player Preview -->
        <div id="{{ $uniqueId }}_audio_player_container" class="{{ $isAudio ? '' : 'hidden' }} mt-3 pt-3 border-t border-default-200">
            <audio id="{{ $uniqueId }}_audio_element" controls class="w-full h-8" preload="none" src="{{ $currentUrl }}">
                Browser Anda tidak mendukung pemutar audio.
            </audio>
        </div>

        <!-- Image Player Preview -->
        <div id="{{ $uniqueId }}_image_preview_container" class="{{ $isImage ? '' : 'hidden' }} mt-3 pt-3 border-t border-default-200">
            <div class="max-h-48 overflow-hidden rounded border border-default-200 bg-white p-2 flex items-center justify-center">
                <img id="{{ $uniqueId }}_image_element" src="{{ $currentUrl }}" alt="Pratinjau Media" class="max-h-44 object-contain rounded">
            </div>
        </div>
    </div>

    <!-- Empty State Container (When No Media Attached) -->
    <div id="{{ $uniqueId }}_empty_card" class="{{ $hasMedia ? 'hidden' : '' }} p-4 border border-dashed border-default-300 rounded-md bg-white hover:bg-default-50/50 transition text-center space-y-3">
        <div class="w-10 h-10 mx-auto rounded-full bg-default-100 text-default-400 flex items-center justify-center">
            <i data-lucide="paperclip" class="size-5"></i>
        </div>
        <div>
            <h5 class="text-xs font-bold text-default-700">Belum Ada Media Dilampirkan</h5>
            <p class="text-[11px] text-default-400 mt-0.5">Lampirkan audio listening atau gambar stimulus langsung dari Pustaka Media.</p>
        </div>
        <div class="flex items-center justify-center gap-2 pt-1 flex-wrap">
            <button type="button" onclick="{{ $uniqueId }}_openModal('all')" class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded shadow-2xs transition inline-flex items-center gap-1.5 cursor-pointer">
                <i data-lucide="folder" class="size-3.5"></i>
                <span>Pilih dari Pustaka Media</span>
            </button>
            <button type="button" onclick="{{ $uniqueId }}_openModal('upload')" class="btn btn-sm bg-white hover:bg-default-100 text-default-700 border border-default-200 text-xs font-semibold rounded shadow-2xs transition inline-flex items-center gap-1.5 cursor-pointer">
                <i data-lucide="upload" class="size-3.5"></i>
                <span>Unggah Berkas Baru</span>
            </button>
        </div>
    </div>
</div>

<!-- Modal Dialog Pustaka Media -->
<div id="{{ $uniqueId }}_modal" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-3 sm:p-4">
    <div class="card w-full max-w-4xl max-h-[90vh] flex flex-col shadow-xl animate-in fade-in zoom-in-95 duration-150">
        <!-- Modal Header -->
        <div class="card-header flex items-center justify-between p-4 sm:px-5 border-b border-default-200 shrink-0">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <i data-lucide="folder" class="size-4"></i>
                </div>
                <div>
                    <h4 class="card-title text-sm sm:text-base font-bold text-default-900">Pustaka Media Terisolasi</h4>
                    <p class="text-[11px] text-default-400">Pilih berkas media untuk ditautkan pada butir soal ini</p>
                </div>
            </div>
            <button type="button" onclick="{{ $uniqueId }}_closeModal()" class="btn btn-icon size-8 rounded hover:bg-default-100 text-default-500 cursor-pointer">
                <i data-lucide="x" class="size-4"></i>
            </button>
        </div>

        <!-- Modal Tabs & Filter Bar -->
        <div class="p-3 sm:px-5 border-b border-default-200 bg-default-50/60 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 shrink-0">
            <div class="flex items-center gap-1 overflow-x-auto text-xs">
                <button type="button" onclick="{{ $uniqueId }}_switchTab('all')" id="{{ $uniqueId }}_tab_all" class="px-3 py-1.5 rounded font-semibold transition bg-primary text-white shadow-xs cursor-pointer">
                    Semua Berkas
                </button>
                <button type="button" onclick="{{ $uniqueId }}_switchTab('audio')" id="{{ $uniqueId }}_tab_audio" class="px-3 py-1.5 rounded font-semibold transition bg-default-100 text-default-600 hover:bg-slate-200 cursor-pointer">
                    Audio Listening
                </button>
                <button type="button" onclick="{{ $uniqueId }}_switchTab('image')" id="{{ $uniqueId }}_tab_image" class="px-3 py-1.5 rounded font-semibold transition bg-default-100 text-default-600 hover:bg-slate-200 cursor-pointer">
                    Gambar & Diagram
                </button>
                <button type="button" onclick="{{ $uniqueId }}_switchTab('upload')" id="{{ $uniqueId }}_tab_upload" class="px-3 py-1.5 rounded font-semibold transition bg-default-100 text-default-600 hover:bg-slate-200 cursor-pointer inline-flex items-center gap-1">
                    <i data-lucide="upload" class="size-3.5"></i>
                    <span>Unggah Baru</span>
                </button>
            </div>

            <div id="{{ $uniqueId }}_search_container" class="flex items-center gap-2">
                <input type="text" id="{{ $uniqueId }}_search_input" oninput="{{ $uniqueId }}_filterList()" placeholder="Cari nama berkas..."
                    class="form-input w-full sm:w-56 h-8 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
            </div>
        </div>

        <!-- Modal Body Content -->
        <div class="card-body overflow-y-auto p-4 sm:p-5 flex-1 min-h-[300px]">
            <!-- Gallery View Tab -->
            <div id="{{ $uniqueId }}_gallery_pane" class="space-y-4">
                <!-- Loading State -->
                <div id="{{ $uniqueId }}_loading" class="py-12 text-center text-default-400 space-y-2">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
                    <p class="text-xs">Memuat berkas media dari server...</p>
                </div>

                <!-- Grid Media Items -->
                <div id="{{ $uniqueId }}_grid" class="hidden grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                    <!-- Dynamic Items Injected via JS -->
                </div>

                <!-- Empty State -->
                <div id="{{ $uniqueId }}_no_items" class="hidden py-12 text-center text-default-400 space-y-2">
                    <div class="w-12 h-12 mx-auto rounded-full bg-default-100 flex items-center justify-center">
                        <i data-lucide="folder-search" class="size-6 text-default-400"></i>
                    </div>
                    <p class="text-xs font-semibold text-default-600">Tidak ada berkas yang sesuai</p>
                    <p class="text-[11px] text-default-400">Coba ubah kata kunci pencarian atau unggah berkas baru.</p>
                </div>
            </div>

            <!-- Upload Tab -->
            <div id="{{ $uniqueId }}_upload_pane" class="hidden space-y-4 max-w-lg mx-auto py-4">
                <div class="p-4 border-2 border-dashed border-default-300 rounded-lg text-center space-y-3 bg-default-50/50 hover:bg-default-50 transition">
                    <div class="w-12 h-12 mx-auto rounded-full bg-primary/10 text-primary flex items-center justify-center">
                        <i data-lucide="upload-cloud" class="size-6"></i>
                    </div>
                    <div>
                        <h5 class="text-xs font-bold text-default-800">Pilih Berkas Media untuk Diunggah</h5>
                        <p class="text-[11px] text-default-400 mt-0.5">Format didukung: MP3, WAV, JPG, PNG, WEBP, PDF (Maks. 25 MB).</p>
                    </div>
                    <input type="file" id="{{ $uniqueId }}_file_input" accept="audio/*,image/*,application/pdf" class="block w-full text-xs text-default-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-hover cursor-pointer">
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-default-700">Kategori Berkas</label>
                    <select id="{{ $uniqueId }}_upload_category" class="form-select w-full h-9 text-xs rounded border-default-200 bg-white">
                        <option value="question" selected>Media Soal (Audio / Gambar)</option>
                        <option value="stimulus">Wacana Stimulus</option>
                        <option value="audio">Audio Listening</option>
                        <option value="general">Umum</option>
                    </select>
                </div>

                <div id="{{ $uniqueId }}_upload_progress" class="hidden space-y-1.5">
                    <div class="flex justify-between text-xs font-bold text-primary">
                        <span>Mengunggah berkas...</span>
                        <span id="{{ $uniqueId }}_upload_percent">0%</span>
                    </div>
                    <div class="w-full bg-default-200 rounded-full h-1.5 overflow-hidden">
                        <div id="{{ $uniqueId }}_upload_bar" class="bg-primary h-1.5 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                </div>

                <div class="pt-2 flex justify-end gap-2">
                    <button type="button" onclick="{{ $uniqueId }}_switchTab('all')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold cursor-pointer">
                        Kembali ke Galeri
                    </button>
                    <button type="button" id="{{ $uniqueId }}_btn_upload_action" onclick="{{ $uniqueId }}_executeUpload()" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center gap-1.5 cursor-pointer">
                        <i data-lucide="upload" class="size-4"></i>
                        <span>Unggah & Pilih Berkas Ini</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="card-footer flex items-center justify-between p-3 sm:px-5 border-t border-default-200 shrink-0 bg-white">
            <span class="text-[11px] text-default-400 font-mono" id="{{ $uniqueId }}_footer_info">
                Pilih salah satu berkas di atas untuk dilampirkan.
            </span>
            <button type="button" onclick="{{ $uniqueId }}_closeModal()" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold cursor-pointer">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
(function() {
    const uniqueId = '{{ $uniqueId }}';
    let mediaItems = [];
    let currentTab = 'all';
    let isLoaded = false;

    window[uniqueId + '_openModal'] = function(tab = 'all') {
        const modal = document.getElementById(uniqueId + '_modal');
        if (modal) {
            modal.classList.remove('hidden');
            window[uniqueId + '_switchTab'](tab);
            if (!isLoaded) {
                window[uniqueId + '_fetchMedia']();
            }
        }
    };

    window[uniqueId + '_closeModal'] = function() {
        const modal = document.getElementById(uniqueId + '_modal');
        if (modal) {
            modal.classList.add('hidden');
        }
    };

    window[uniqueId + '_switchTab'] = function(tab) {
        currentTab = tab;
        const tabs = ['all', 'audio', 'image', 'upload'];
        tabs.forEach(t => {
            const btn = document.getElementById(uniqueId + '_tab_' + t);
            if (btn) {
                if (t === tab) {
                    btn.className = 'px-3 py-1.5 rounded font-semibold transition bg-primary text-white shadow-xs cursor-pointer';
                } else {
                    btn.className = 'px-3 py-1.5 rounded font-semibold transition bg-default-100 text-default-600 hover:bg-slate-200 cursor-pointer';
                }
            }
        });

        const galleryPane = document.getElementById(uniqueId + '_gallery_pane');
        const uploadPane = document.getElementById(uniqueId + '_upload_pane');
        const searchContainer = document.getElementById(uniqueId + '_search_container');

        if (tab === 'upload') {
            if (galleryPane) galleryPane.classList.add('hidden');
            if (uploadPane) uploadPane.classList.remove('hidden');
            if (searchContainer) searchContainer.classList.add('hidden');
        } else {
            if (galleryPane) galleryPane.classList.remove('hidden');
            if (uploadPane) uploadPane.classList.add('hidden');
            if (searchContainer) searchContainer.classList.remove('hidden');
            window[uniqueId + '_filterList']();
        }
    };

    window[uniqueId + '_fetchMedia'] = function() {
        const loading = document.getElementById(uniqueId + '_loading');
        const grid = document.getElementById(uniqueId + '_grid');
        const noItems = document.getElementById(uniqueId + '_no_items');

        if (loading) loading.classList.remove('hidden');
        if (grid) grid.classList.add('hidden');
        if (noItems) noItems.classList.add('hidden');

        fetch('{{ route('staff.media.picker') }}')
            .then(res => res.json())
            .then(json => {
                if (json.success && Array.isArray(json.data)) {
                    mediaItems = json.data;
                    isLoaded = true;
                    window[uniqueId + '_filterList']();
                }
            })
            .catch(err => {
                console.error('Error fetching media picker:', err);
                if (loading) loading.innerHTML = '<p class="text-xs text-danger font-semibold">Gagal memuat berkas media.</p>';
            });
    };

    window[uniqueId + '_filterList'] = function() {
        const searchInput = document.getElementById(uniqueId + '_search_input');
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();

        const filtered = mediaItems.filter(item => {
            // Filter Tab
            if (currentTab === 'audio' && !item.is_audio) return false;
            if (currentTab === 'image' && !item.is_image) return false;

            // Filter Search
            if (query) {
                const name = (item.original_name || '').toLowerCase();
                const path = (item.storage_path || '').toLowerCase();
                const usageStr = JSON.stringify(item.usage || {}).toLowerCase();
                return name.includes(query) || path.includes(query) || usageStr.includes(query);
            }
            return true;
        });

        window[uniqueId + '_renderGrid'](filtered);
    };

    window[uniqueId + '_renderGrid'] = function(items) {
        const loading = document.getElementById(uniqueId + '_loading');
        const grid = document.getElementById(uniqueId + '_grid');
        const noItems = document.getElementById(uniqueId + '_no_items');

        if (loading) loading.classList.add('hidden');

        if (!items || items.length === 0) {
            if (grid) grid.classList.add('hidden');
            if (noItems) noItems.classList.remove('hidden');
            return;
        }

        if (noItems) noItems.classList.add('hidden');
        if (grid) {
            grid.classList.remove('hidden');
            grid.innerHTML = items.map(item => {
                const isAudio = item.is_audio;
                const isImage = item.is_image;
                const usage = item.usage || {};
                let usageBadge = '';

                if (usage.is_used) {
                    if (usage.type === 'stimulus') {
                        usageBadge = `
                            <div class="mt-1.5 p-1.5 bg-indigo-50 border border-indigo-200 rounded text-[10px] text-indigo-800">
                                <div class="font-bold flex items-center gap-1">
                                    <i data-lucide="book-open" class="size-3 text-indigo-600"></i>
                                    <span class="truncate">Stimulus: ${usage.target_title || ''}</span>
                                </div>
                                <div class="text-[9px] text-indigo-600 mt-0.5 font-mono font-medium">${usage.questions_count || 0} Soal Tertaut</div>
                            </div>
                        `;
                    } else if (usage.type === 'question') {
                        usageBadge = `
                            <div class="mt-1.5 p-1.5 bg-emerald-50 border border-emerald-200 rounded text-[10px] text-emerald-800">
                                <div class="font-bold flex items-center gap-1">
                                    <i data-lucide="help-circle" class="size-3 text-emerald-600"></i>
                                    <span class="truncate">Soal: ${usage.target_code || ''}</span>
                                </div>
                            </div>
                        `;
                    }
                } else {
                    usageBadge = `
                        <div class="mt-1.5 p-1 bg-slate-50 border border-slate-200 rounded text-[10px] text-slate-500">
                            Belum dikaitkan
                        </div>
                    `;
                }

                return `
                    <div class="border border-default-200 rounded-md p-3 bg-white hover:border-primary/50 hover:shadow-xs transition flex flex-col justify-between space-y-2">
                        <div class="flex items-start gap-2.5">
                            <div class="w-9 h-9 rounded-full ${isAudio ? 'bg-indigo-50 text-indigo-600' : 'bg-emerald-50 text-emerald-600'} flex items-center justify-center shrink-0">
                                <i data-lucide="${isAudio ? 'volume-2' : 'image'}" class="size-4"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h5 class="text-xs font-bold text-default-900 truncate" title="${item.original_name}">${item.original_name}</h5>
                                <p class="text-[10px] text-default-400 font-mono">${item.formatted_size} &bull; ${item.created_at || ''}</p>
                                ${usageBadge}
                            </div>
                        </div>

                        ${isAudio ? `
                            <audio controls class="w-full h-7 mt-1" preload="none">
                                <source src="${item.url}" type="${item.mime_type}">
                            </audio>
                        ` : ''}

                        ${isImage ? `
                            <div class="h-20 bg-default-50 rounded border border-default-100 flex items-center justify-center overflow-hidden my-1">
                                <img src="${item.url}" alt="${item.original_name}" class="max-h-full max-w-full object-contain">
                            </div>
                        ` : ''}

                        <button type="button" onclick="${uniqueId}_selectMedia(${JSON.stringify(item).replace(/"/g, '&quot;')})"
                            class="w-full btn btn-sm bg-primary/10 hover:bg-primary text-primary hover:text-white rounded text-xs font-semibold py-1.5 transition cursor-pointer mt-1">
                            Pilih Berkas Ini
                        </button>
                    </div>
                `;
            }).join('');

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }
    };

    window[uniqueId + '_selectMedia'] = function(item) {
        const inputPath = document.getElementById(uniqueId + '_input_path');
        const inputType = document.getElementById(uniqueId + '_input_type');
        const previewCard = document.getElementById(uniqueId + '_preview_card');
        const emptyCard = document.getElementById(uniqueId + '_empty_card');
        const filename = document.getElementById(uniqueId + '_filename');
        const meta = document.getElementById(uniqueId + '_meta');
        const iconHolder = document.getElementById(uniqueId + '_icon_holder');
        const audioContainer = document.getElementById(uniqueId + '_audio_player_container');
        const audioElement = document.getElementById(uniqueId + '_audio_element');
        const imageContainer = document.getElementById(uniqueId + '_image_preview_container');
        const imageElement = document.getElementById(uniqueId + '_image_element');

        const mediaType = item.is_audio ? 'audio' : (item.is_image ? 'image' : 'document');

        if (inputPath) inputPath.value = item.storage_path;
        if (inputType) inputType.value = mediaType;

        if (filename) {
            filename.textContent = item.original_name;
            filename.title = item.original_name;
        }

        if (meta) {
            meta.innerHTML = `Tipe: <span class="uppercase font-bold text-default-700">${mediaType}</span> &bull; ${item.formatted_size}`;
        }

        if (iconHolder) {
            iconHolder.className = `w-10 h-10 rounded-full ${item.is_audio ? 'bg-indigo-100 text-indigo-700' : 'bg-emerald-100 text-emerald-700'} flex items-center justify-center shrink-0`;
            iconHolder.innerHTML = `<i data-lucide="${item.is_audio ? 'volume-2' : 'image'}" class="size-5"></i>`;
        }

        if (item.is_audio) {
            if (audioContainer) audioContainer.classList.remove('hidden');
            if (audioElement) {
                audioElement.src = item.url;
                audioElement.load();
            }
            if (imageContainer) imageContainer.classList.add('hidden');
        } else if (item.is_image) {
            if (imageContainer) imageContainer.classList.remove('hidden');
            if (imageElement) imageElement.src = item.url;
            if (audioContainer) audioContainer.classList.add('hidden');
        } else {
            if (audioContainer) audioContainer.classList.add('hidden');
            if (imageContainer) imageContainer.classList.add('hidden');
        }

        if (emptyCard) emptyCard.classList.add('hidden');
        if (previewCard) previewCard.classList.remove('hidden');

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        window[uniqueId + '_closeModal']();
    };

    window[uniqueId + '_removeMedia'] = function() {
        if (!confirm('Hapus lampiran media dari butir soal ini?')) return;

        const inputPath = document.getElementById(uniqueId + '_input_path');
        const inputType = document.getElementById(uniqueId + '_input_type');
        const previewCard = document.getElementById(uniqueId + '_preview_card');
        const emptyCard = document.getElementById(uniqueId + '_empty_card');
        const audioElement = document.getElementById(uniqueId + '_audio_element');

        if (inputPath) inputPath.value = '';
        if (inputType) inputType.value = '';

        if (audioElement) {
            audioElement.pause();
            audioElement.src = '';
        }

        if (previewCard) previewCard.classList.add('hidden');
        if (emptyCard) emptyCard.classList.remove('hidden');
    };

    window[uniqueId + '_executeUpload'] = function() {
        const fileInput = document.getElementById(uniqueId + '_file_input');
        const categorySelect = document.getElementById(uniqueId + '_upload_category');
        const progressDiv = document.getElementById(uniqueId + '_upload_progress');
        const progressBar = document.getElementById(uniqueId + '_upload_bar');
        const progressPercent = document.getElementById(uniqueId + '_upload_percent');
        const btnUpload = document.getElementById(uniqueId + '_btn_upload_action');

        if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
            alert('Silakan pilih berkas yang ingin diunggah terlebih dahulu.');
            return;
        }

        const file = fileInput.files[0];
        const formData = new FormData();
        formData.append('file', file);
        formData.append('category', categorySelect ? categorySelect.value : 'question');
        formData.append('_token', '{{ csrf_token() }}');

        if (progressDiv) progressDiv.classList.remove('hidden');
        if (btnUpload) {
            btnUpload.disabled = true;
            btnUpload.innerHTML = 'Mengunggah...';
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route('staff.media.store') }}');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                const percent = Math.round((e.loaded / e.total) * 100);
                if (progressBar) progressBar.style.width = percent + '%';
                if (progressPercent) progressPercent.textContent = percent + '%';
            }
        };

        xhr.onload = function() {
            if (btnUpload) {
                btnUpload.disabled = false;
                btnUpload.innerHTML = '<i data-lucide="upload" class="size-4"></i><span>Unggah & Pilih Berkas Ini</span>';
            }
            if (xhr.status >= 200 && xhr.status < 300) {
                try {
                    const res = JSON.parse(xhr.responseText);
                    if (res.success) {
                        alert("Berkas '" + res.original_name + "' berhasil diunggah!");
                        // Add to local items
                        mediaItems.unshift(res);
                        // Automatically select it
                        window[uniqueId + '_selectMedia'](res);
                        return;
                    }
                } catch(e) {
                    console.error(e);
                }
            }
            alert('Gagal mengunggah berkas. Pastikan ukuran dan format sesuai ketentuan.');
            if (progressDiv) progressDiv.classList.add('hidden');
        };

        xhr.onerror = function() {
            if (btnUpload) {
                btnUpload.disabled = false;
                btnUpload.innerHTML = '<i data-lucide="upload" class="size-4"></i><span>Unggah & Pilih Berkas Ini</span>';
            }
            alert('Terjadi kesalahan jaringan saat mengunggah.');
            if (progressDiv) progressDiv.classList.add('hidden');
        };

        xhr.send(formData);
    };
})();
</script>
