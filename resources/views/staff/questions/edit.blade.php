@extends('layouts.staff')

@section('title', 'Edit Butir Soal ' . $question->code . '')
@section('page-parent', 'Bank Soal')
@section('page-title', 'Edit Soal: ' . $question->code)
@section('page-subtitle', 'Versi #' . $question->version . ' • Menyimpan perubahan menghasilkan snapshot Versi #' . ($question->version + 1) . ' otomatis.')

@section('page-actions')
    <a href="{{ route('staff.questions.show', $question) }}" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="eye" class="size-4"></i>
        <span>Pratinjau</span>
    </a>
    <a href="{{ route('staff.question-banks.show', $questionBank) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="arrow-left" class="size-4"></i>
        <span>Kembali</span>
    </a>
@endsection

@section('content')
<div class="space-y-6 w-full">

    @if($errors->any())
        <x-cbt.alert type="danger" dismissible="true">
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </x-cbt.alert>
    @endif

    <form action="{{ route('staff.questions.update', $question) }}" method="POST" id="questionForm">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Kolom Kiri: Metadata & Catatan Versi -->
            <div class="space-y-6">
                <x-cbt.card title="Pencatatan Versi Baru">
                    <div class="space-y-4">
                        <div class="p-3 bg-amber-50 border border-amber-200 rounded text-xs text-amber-800">
                            <strong>Audit Versioning:</strong> Setiap perubahan disimpan permanen ke dalam riwayat versi soal.
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Ringkasan Perubahan *</label>
                            <input type="text" name="change_summary" value="{{ old('change_summary', 'Pembaruan butir soal ke versi ' . ($question->version + 1)) }}" placeholder="Contoh: Koreksi kunci jawaban opsi B" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Tipe Soal *</label>
                            <select name="type" id="questionType" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" onchange="handleTypeChange(this.value)">
                                <option value="multiple_choice" {{ old('type', $question->type) == 'multiple_choice' ? 'selected' : '' }}>Pilihan Ganda (Tunggal)</option>
                                <option value="multiple_choice_complex" {{ old('type', $question->type) == 'multiple_choice_complex' ? 'selected' : '' }}>Pilihan Ganda Kompleks (Multipel)</option>
                                <option value="true_false" {{ old('type', $question->type) == 'true_false' ? 'selected' : '' }}>Benar / Salah</option>
                                <option value="short_answer" {{ old('type', $question->type) == 'short_answer' ? 'selected' : '' }}>Isian Singkat</option>
                                <option value="numeric" {{ old('type', $question->type) == 'numeric' ? 'selected' : '' }}>Numerik / Angka</option>
                                <option value="matching" {{ old('type', $question->type) == 'matching' ? 'selected' : '' }}>Menjodohkan (Matching)</option>
                                <option value="essay" {{ old('type', $question->type) == 'essay' ? 'selected' : '' }}>Uraian / Esai</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Stimulus / Wacana Bacaan</label>
                            <select name="stimulus_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <option value="">-- Tanpa Stimulus (Mandiri) --</option>
                                @foreach($questionBank->stimuli as $stim)
                                    <option value="{{ $stim->id }}" {{ old('stimulus_id', $question->stimulus_id) == $stim->id ? 'selected' : '' }}>
                                        {{ $stim->title }} ({{ $stim->type }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Tingkat Kesulitan *</label>
                                <select name="difficulty" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                    <option value="easy" {{ old('difficulty', $question->difficulty) == 'easy' ? 'selected' : '' }}>Mudah</option>
                                    <option value="medium" {{ old('difficulty', $question->difficulty) == 'medium' ? 'selected' : '' }}>Sedang</option>
                                    <option value="hard" {{ old('difficulty', $question->difficulty) == 'hard' ? 'selected' : '' }}>Sukar</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Bobot Nilai *</label>
                                <input type="number" step="0.1" min="0.1" max="100" name="weight" value="{{ old('weight', $question->weight) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Kategori Seksi Soal (Khusus Ujian Bahasa / TOEFL / TOAFL)</label>
                            <select name="section_category" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <option value="">-- Umum / Tanpa Seksi --</option>
                                @foreach(\App\Services\ScoreScaleService::questionSectionOptions() as $secKey => $secLabel)
                                    <option value="{{ $secKey }}" {{ old('section_category', $question->section_category) === $secKey ? 'selected' : '' }}>{{ $secLabel }}</option>
                                @endforeach
                            </select>
                            <p class="text-[11px] text-default-400 mt-1">Digunakan untuk rekap nilai per sub-bagian pada sertifikat kecakapan bahasa (misal Listening, Structure, Reading).</p>
                        </div>

                        <div class="pt-2 border-t border-default-100 space-y-3">
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xs font-bold text-default-700 block">Teks Arab / Harakat (RTL)</span>
                                    <p class="text-[11px] text-default-400">Perataan kanan soal &amp; opsi Bahasa Arab</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_rtl" value="1" id="isRtlCheckbox" {{ old('is_rtl', $question->is_rtl) ? 'checked' : '' }} onchange="toggleRtl(this.checked)" class="form-switch">
                                </label>
                            </div>

                            @php
                                $currentRtlStyleMeta = old('rtl_option_style', $question->metadata['rtl_option_style'] ?? 'inherit');
                            @endphp
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Gaya Huruf Opsi Arab (RTL)</label>
                                <select name="rtl_option_style" class="form-select w-full h-9 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                    <option value="inherit" {{ $currentRtlStyleMeta === 'inherit' ? 'selected' : '' }}>Ikuti Pengaturan Ujian (Default: أ، ب، ت، ث)</option>
                                    <option value="arabic_hijaiyah" {{ $currentRtlStyleMeta === 'arabic_hijaiyah' ? 'selected' : '' }}>Hijaiyah (أ، ب، ت، ث، ج)</option>
                                    <option value="arabic_abjadiyah" {{ $currentRtlStyleMeta === 'arabic_abjadiyah' ? 'selected' : '' }}>Abjadiyah / TOAFL (أ، ب، ج، د، هـ)</option>
                                    <option value="latin" {{ $currentRtlStyleMeta === 'latin' ? 'selected' : '' }}>Huruf Latin (A, B, C, D)</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Batas Putar Audio Khusus Soal (Opsional)</label>
                                <input type="number" min="0" max="20" name="audio_max_plays" value="{{ old('audio_max_plays', $question->getAudioMaxPlaysOverride()) }}" placeholder="Kosong = ikut aturan ujian (0 = bebas)" class="form-input w-full h-9 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <p class="text-[11px] text-default-400 mt-1">Isi <code>0</code> agar bebas diputar berulang, atau angka <code>1-20</code>.</p>
                            </div>
                        </div>
                    </div>
                </x-cbt.card>

                <x-cbt.card title="Pembahasan & Penjelasan">
                    <textarea name="explanation" rows="4" placeholder="Tuliskan pembahasan atau solusi butir soal ini..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">{{ old('explanation', $question->explanation) }}</textarea>
                </x-cbt.card>
            </div>

            <!-- Kolom Tengah & Kanan: Konten Soal & Opsi Jawaban -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Media Lampiran Soal (Audio / Gambar dari Pustaka Media) -->
                <x-cbt.card title="Media Lampiran Soal (Audio / Gambar)">
                    <x-cbt.media-picker
                        namePath="media_path"
                        nameType="media_type"
                        :currentPath="$question->media_path"
                        :currentType="$question->media_type"
                        :currentUrl="$question->media_url"
                        label="Media Lampiran Butir Soal"
                    />
                </x-cbt.card>

                <x-cbt.card title="Konten Pokok Soal">
                    <div class="space-y-3">
                        <div class="flex flex-wrap items-center justify-between gap-2 pb-2 border-b border-default-100">
                            <span class="text-xs text-default-500 font-medium" id="editorModeLabel">
                                Mode Editor: <strong class="text-default-700">Visual (WYSIWYG)</strong>
                            </span>
                            <button type="button" onclick="toggleEditorMode()" id="btnToggleEditorMode" class="btn btn-xs bg-default-100 hover:bg-default-200 text-default-700 font-semibold inline-flex items-center gap-1.5 transition cursor-pointer">
                                <i data-lucide="code-2" id="toggleModeIcon" class="size-3.5"></i>
                                <span id="toggleModeText">Beralih ke Teks Kode / Raw</span>
                            </button>
                        </div>

                        <!-- WYSIWYG Quill Snow Editor Container -->
                        <div id="quillWrapper" class="space-y-1">
                            <div id="quillEditor" style="min-height: 180px;" class="bg-white rounded-b border border-default-200 text-sm leading-relaxed"></div>
                        </div>

                        <!-- Raw Textarea (Fallback / Kode HTML / KaTeX Raw) -->
                        <textarea name="content" id="questionContent" rows="6" class="hidden form-textarea w-full text-sm rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary leading-relaxed font-mono {{ $question->is_rtl ? 'text-right font-serif' : '' }}" {{ $question->is_rtl ? 'dir=rtl' : '' }} required>{{ old('content', $question->content) }}</textarea>

                        <div class="flex justify-between items-center text-xs text-default-400">
                            <span>Mendukung teks terformat, rumus KaTeX/LaTeX, dan karakter khusus.</span>
                            <span id="charCount">{{ strlen($question->content) }} karakter</span>
                        </div>

                        <!-- Collapsible Panduan KaTeX, Formula Kimia & Simbol Khusus -->
                        @include('staff.questions.partials.math-guide')
                    </div>
                </x-cbt.card>

                <!-- Dynamic Options Container -->
                <x-cbt.card title="Pilihan & Kunci Jawaban" id="optionsCard">
                    <div class="mb-4 flex items-center justify-between">
                        <p class="text-xs text-default-500" id="optionsGuidance">Perbarui pilihan dan tentukan kunci jawaban benar.</p>
                        <button type="button" id="btnAddOption" onclick="addOptionRow()" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold inline-flex items-center gap-1.5 transition cursor-pointer">
                            <i data-lucide="plus" class="size-3.5"></i>
                            <span>Tambah Pilihan</span>
                        </button>
                    </div>

                    <div id="optionsList" class="space-y-3">
                        @if($question->type === 'matching')
                            @foreach($question->options as $idx => $opt)
                                <div class="option-row p-3.5 border border-default-200 rounded grid grid-cols-1 md:grid-cols-2 gap-3 bg-white shadow-2xs">
                                    <input type="hidden" name="options[{{ $idx }}][is_correct]" value="1">
                                    <input type="hidden" name="options[{{ $idx }}][key]" value="{{ $opt->option_key }}">
                                    <div>
                                        <label class="block text-[11px] font-bold uppercase text-default-500 mb-1">Premis / Pernyataan {{ $idx + 1 }}</label>
                                        <input type="text" name="options[{{ $idx }}][content]" value="{{ $opt->content }}" class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-9" required>
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-bold uppercase text-default-500 mb-1">Pasangan Benar</label>
                                        <input type="text" name="options[{{ $idx }}][pair_match]" value="{{ $opt->pair_match }}" class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-9" required>
                                    </div>
                                </div>
                            @endforeach
                        @elseif($question->type === 'true_false')
                            @php
                                $optBenar = $question->options->firstWhere('option_key', 'BENAR');
                                $optSalah = $question->options->firstWhere('option_key', 'SALAH');
                                $isBenar = (bool) optional($optBenar)->is_correct;
                                $isSalah = (bool) optional($optSalah)->is_correct;
                                if (!$isBenar && !$isSalah) $isBenar = true;
                            @endphp
                            <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white shadow-2xs">
                                <input type="radio" name="correct_option" value="BENAR" {{ $isBenar ? 'checked' : '' }} onchange="syncRadioSelection(this)" class="form-radio correct-input text-primary focus:ring-primary/20 cursor-pointer">
                                <input type="hidden" name="options[0][is_correct]" class="option-is-correct" value="{{ $isBenar ? '1' : '0' }}">
                                <input type="hidden" name="options[0][key]" value="BENAR">
                                <input type="text" name="options[0][content]" value="BENAR" class="flex-1 text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded px-3 py-2" readonly>
                            </div>
                            <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white shadow-2xs">
                                <input type="radio" name="correct_option" value="SALAH" {{ $isSalah ? 'checked' : '' }} onchange="syncRadioSelection(this)" class="form-radio correct-input text-primary focus:ring-primary/20 cursor-pointer">
                                <input type="hidden" name="options[1][is_correct]" class="option-is-correct" value="{{ $isSalah ? '1' : '0' }}">
                                <input type="hidden" name="options[1][key]" value="SALAH">
                                <input type="text" name="options[1][content]" value="SALAH" class="flex-1 text-xs font-bold text-rose-700 bg-rose-50 border border-rose-200 rounded px-3 py-2" readonly>
                            </div>
                        @elseif($question->type === 'short_answer' || $question->type === 'numeric')
                            <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white shadow-2xs">
                                <input type="hidden" name="options[0][is_correct]" value="1">
                                <input type="hidden" name="options[0][key]" value="KUNCI">
                                <div class="w-28 text-xs font-bold text-default-600 uppercase">Kunci Valid:</div>
                                <div class="flex-1">
                                    <input type="text" name="options[0][content]" value="{{ optional($question->options->first())->content }}" class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-10" required>
                                </div>
                            </div>
                        @elseif($question->type === 'multiple_choice_complex')
                            @foreach($question->options as $idx => $opt)
                                <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white hover:bg-default-50/50 transition shadow-2xs">
                                    <div class="pt-0.5">
                                        <input type="checkbox" name="options[{{ $idx }}][is_correct]" value="1" {{ $opt->is_correct ? 'checked' : '' }} class="form-checkbox correct-input text-primary focus:ring-primary/20 cursor-pointer">
                                    </div>
                                    <div class="w-10 font-bold text-default-700 text-xs">
                                        <input type="text" name="options[{{ $idx }}][key]" value="{{ $opt->option_key }}" class="form-input w-full text-center font-bold bg-default-50 border-default-200 rounded-lg py-1 text-xs" readonly>
                                    </div>
                                    <div class="flex-1">
                                        <input type="text" name="options[{{ $idx }}][content]" value="{{ $opt->content }}" class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-9" required>
                                    </div>
                                    <div>
                                        <button type="button" onclick="removeOptionRow(this)" class="text-default-400 hover:text-danger p-1.5 rounded hover:bg-danger/10 transition cursor-pointer" title="Hapus Opsi">
                                            <i data-lucide="trash-2" class="size-4"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- multiple_choice default (Tunggal) --}}
                            @php
                                $firstCorrectOpt = $question->options->firstWhere('is_correct', true);
                                $chosenKey = $firstCorrectOpt ? $firstCorrectOpt->option_key : optional($question->options->first())->option_key;
                            @endphp
                            @foreach($question->options as $idx => $opt)
                                @php
                                    $isThisCorrect = ($opt->option_key === $chosenKey);
                                @endphp
                                <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white hover:bg-default-50/50 transition shadow-2xs">
                                    <div class="pt-0.5">
                                        <input type="radio" name="correct_option" value="{{ $opt->option_key }}" {{ $isThisCorrect ? 'checked' : '' }} onchange="syncRadioSelection(this)" class="form-radio correct-input text-primary focus:ring-primary/20 cursor-pointer">
                                        <input type="hidden" name="options[{{ $idx }}][is_correct]" class="option-is-correct" value="{{ $isThisCorrect ? '1' : '0' }}">
                                    </div>
                                    <div class="w-10 font-bold text-default-700 text-xs">
                                        <input type="text" name="options[{{ $idx }}][key]" value="{{ $opt->option_key }}" class="form-input w-full text-center font-bold bg-default-50 border-default-200 rounded-lg py-1 text-xs" readonly>
                                    </div>
                                    <div class="flex-1">
                                        <input type="text" name="options[{{ $idx }}][content]" value="{{ $opt->content }}" class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-9" required>
                                    </div>
                                    <div>
                                        <button type="button" onclick="removeOptionRow(this)" class="text-default-400 hover:text-danger p-1.5 rounded hover:bg-danger/10 transition cursor-pointer" title="Hapus Opsi">
                                            <i data-lucide="trash-2" class="size-4"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </x-cbt.card>

                <!-- Actions -->
                <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 pt-4">
                    <a href="{{ route('staff.questions.show', $question) }}" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold transition text-center w-full sm:w-auto">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold shadow-2xs inline-flex items-center justify-center gap-2 transition w-full sm:w-auto">
                        <i data-lucide="save" class="size-4 shrink-0"></i>
                        <span>Simpan Versi Baru (#{{ $question->version + 1 }})</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    let isRawMode = false;

    // Inisialisasi Quill Editor (Quill Snow WYSIWYG)
    function initQuillEditor() {
        const QuillClass = window.Quill || (typeof Quill !== 'undefined' ? Quill : null);
        if (!QuillClass) {
            setTimeout(initQuillEditor, 50);
            return;
        }

        if (window.questionQuill) return;

        const toolbarOptions = [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'script': 'sub'}, { 'script': 'super' }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'direction': 'rtl' }, { 'align': [] }],
            ['blockquote', 'code-block'],
            ['link', 'clean']
        ];

        window.questionQuill = new QuillClass('#quillEditor', {
            theme: 'snow',
            placeholder: 'Tuliskan teks pertanyaan atau instruksi soal di sini...',
            modules: {
                toolbar: toolbarOptions
            }
        });

        const initialContent = document.getElementById('questionContent').value;
        if (initialContent) {
            window.questionQuill.root.innerHTML = initialContent;
        }

        window.questionQuill.on('text-change', function() {
            syncQuillToTextarea();
        });

        // Set initial RTL if needed
        const isRtl = document.getElementById('isRtlCheckbox')?.checked;
        if (isRtl) {
            toggleRtl(true);
        }

        syncQuillToTextarea();
    }

    function syncQuillToTextarea() {
        if (!window.questionQuill) return;
        const textarea = document.getElementById('questionContent');
        const charCount = document.getElementById('charCount');
        const html = window.questionQuill.root.innerHTML;
        const cleanHtml = (html === '<p><br></p>' || html.trim() === '') ? '' : html;
        textarea.value = cleanHtml;
        const plainText = window.questionQuill.getText().trim();
        if (charCount) charCount.innerText = plainText.length + ' karakter';
    }

    function syncTextareaToQuill() {
        if (!window.questionQuill) return;
        const textarea = document.getElementById('questionContent');
        const charCount = document.getElementById('charCount');
        window.questionQuill.root.innerHTML = textarea.value || '';
        const plainText = window.questionQuill.getText().trim();
        if (charCount) charCount.innerText = plainText.length + ' karakter';
    }

    function toggleEditorMode() {
        const quillWrapper = document.getElementById('quillWrapper');
        const textarea = document.getElementById('questionContent');
        const label = document.getElementById('editorModeLabel');
        const btnText = document.getElementById('toggleModeText');
        const btnIcon = document.getElementById('toggleModeIcon');

        if (!isRawMode) {
            // Switch to Raw Mode
            syncQuillToTextarea();
            quillWrapper.classList.add('hidden');
            textarea.classList.remove('hidden');
            label.innerHTML = 'Mode Editor: <strong class="text-amber-600">Teks Kode (Raw)</strong>';
            btnText.innerText = 'Beralih ke Mode Visual';
            if (btnIcon) btnIcon.setAttribute('data-lucide', 'eye');
            isRawMode = true;
        } else {
            // Switch to Visual Mode
            syncTextareaToQuill();
            textarea.classList.add('hidden');
            quillWrapper.classList.remove('hidden');
            label.innerHTML = 'Mode Editor: <strong class="text-default-700">Visual (WYSIWYG)</strong>';
            btnText.innerText = 'Beralih ke Teks Kode / Raw';
            if (btnIcon) btnIcon.setAttribute('data-lucide', 'code-2');
            isRawMode = false;
        }
        if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
    }

    function toggleRtl(isRtl) {
        const textarea = document.getElementById('questionContent');
        if (textarea) {
            if (isRtl) {
                textarea.setAttribute('dir', 'rtl');
                textarea.classList.add('text-right', 'font-serif');
            } else {
                textarea.removeAttribute('dir');
                textarea.classList.remove('text-right', 'font-serif');
            }
        }
        if (window.questionQuill && window.questionQuill.root) {
            window.questionQuill.root.setAttribute('dir', isRtl ? 'rtl' : 'ltr');
            window.questionQuill.root.classList.toggle('text-right', isRtl);
            window.questionQuill.root.classList.toggle('font-serif', isRtl);
            window.questionQuill.format('direction', isRtl ? 'rtl' : false);
            window.questionQuill.format('align', isRtl ? 'right' : false);
        }
        document.querySelectorAll('#optionsList input[name*="[content]"]').forEach(input => {
            if (isRtl) {
                input.setAttribute('dir', 'rtl');
                input.classList.add('text-right', 'font-serif');
            } else {
                input.removeAttribute('dir');
                input.classList.remove('text-right', 'font-serif');
            }
        });
    }

    // Mutual exclusivity handler for Single Choice radio buttons
    function syncRadioSelection(radioEl) {
        document.querySelectorAll('#optionsList .option-is-correct').forEach(hidden => {
            hidden.value = '0';
        });
        const row = radioEl.closest('.option-row');
        if (row) {
            const hidden = row.querySelector('.option-is-correct');
            if (hidden) hidden.value = '1';
        }
    }

    function reindexOptions() {
        const container = document.getElementById('optionsList');
        const rows = container.querySelectorAll('.option-row');
        const qType = document.getElementById('questionType').value;
        const isSingle = (qType === 'multiple_choice' || qType === 'true_false');

        let hasChecked = false;

        rows.forEach((row, i) => {
            const letter = letters[i] || ('O' + (i + 1));
            // Key input
            const keyInput = row.querySelector('input[name*="[key]"]');
            if (keyInput) {
                keyInput.name = `options[${i}][key]`;
                if (qType !== 'true_false' && qType !== 'matching' && qType !== 'short_answer' && qType !== 'numeric') {
                    keyInput.value = letter;
                }
            }
            // Content input
            const contentInput = row.querySelector('input[name*="[content]"]');
            if (contentInput) {
                contentInput.name = `options[${i}][content]`;
                if (qType !== 'true_false' && qType !== 'matching' && qType !== 'short_answer' && qType !== 'numeric') {
                    contentInput.placeholder = `Teks opsi ${letter}...`;
                }
            }
            // Pair match for matching
            const pairInput = row.querySelector('input[name*="[pair_match]"]');
            if (pairInput) {
                pairInput.name = `options[${i}][pair_match]`;
            }
            // Correct input
            const correctInput = row.querySelector('.correct-input');
            const hiddenCorrect = row.querySelector('.option-is-correct');
            if (correctInput) {
                if (isSingle) {
                    correctInput.name = 'correct_option';
                    correctInput.value = keyInput ? keyInput.value : letter;
                    if (hiddenCorrect) {
                        hiddenCorrect.name = `options[${i}][is_correct]`;
                        if (correctInput.checked) {
                            hiddenCorrect.value = '1';
                            hasChecked = true;
                        } else {
                            hiddenCorrect.value = '0';
                        }
                    }
                } else {
                    correctInput.name = `options[${i}][is_correct]`;
                }
            }
        });

        // Jika single choice dan tidak ada yang terpilih, pilih baris pertama otomatis
        if (isSingle && !hasChecked && rows.length > 0) {
            const firstRadio = rows[0].querySelector('.correct-input');
            const firstHidden = rows[0].querySelector('.option-is-correct');
            if (firstRadio) firstRadio.checked = true;
            if (firstHidden) firstHidden.value = '1';
        }
    }

    function handleTypeChange(type) {
        const container = document.getElementById('optionsList');
        const guidance = document.getElementById('optionsGuidance');
        const btnAdd = document.getElementById('btnAddOption');
        const optionsCard = document.getElementById('optionsCard');

        if (type === 'essay') {
            optionsCard.style.display = 'none';
            container.innerHTML = '';
            return;
        }

        optionsCard.style.display = 'block';

        if (type === 'multiple_choice') {
            guidance.innerText = 'Pilih satu opsi radio sebagai kunci jawaban benar.';
            btnAdd.style.display = 'inline-flex';
            renderStandardOptions('radio');
        } else if (type === 'multiple_choice_complex') {
            guidance.innerText = 'Centang kotak (checkbox) untuk setiap opsi yang merupakan jawaban benar (multipel benar).';
            btnAdd.style.display = 'inline-flex';
            renderStandardOptions('checkbox');
        } else if (type === 'true_false') {
            guidance.innerText = 'Tentukan pernyataan ini Benar atau Salah.';
            btnAdd.style.display = 'none';
            renderTrueFalseOptions();
        } else if (type === 'short_answer' || type === 'numeric') {
            guidance.innerText = 'Tuliskan kata kunci atau angka pasti jawaban benar.';
            btnAdd.style.display = 'none';
            renderSingleKeyOption(type === 'numeric' ? 'Angka Tepat' : 'Kunci Kata / Frasa');
        } else if (type === 'matching') {
            guidance.innerText = 'Tuliskan item premis di kiri dan pasangannya di kanan.';
            btnAdd.style.display = 'inline-flex';
            renderMatchingOptions();
        }
    }

    function renderStandardOptions(inputType) {
        const container = document.getElementById('optionsList');
        container.innerHTML = '';
        const isRadio = inputType === 'radio';
        const inputClass = isRadio ? 'form-radio' : 'form-checkbox';

        for (let i = 0; i < 4; i++) {
            const letter = letters[i];
            const div = document.createElement('div');
            div.className = 'option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white hover:bg-default-50/50 transition shadow-2xs';

            let inputHtml = '';
            if (isRadio) {
                inputHtml = `
                    <input type="radio" name="correct_option" value="${letter}" ${i === 0 ? 'checked' : ''} onchange="syncRadioSelection(this)" class="form-radio correct-input text-primary focus:ring-primary/20 cursor-pointer">
                    <input type="hidden" name="options[${i}][is_correct]" class="option-is-correct" value="${i === 0 ? '1' : '0'}">
                `;
            } else {
                inputHtml = `
                    <input type="checkbox" name="options[${i}][is_correct]" value="1" ${i === 0 ? 'checked' : ''} class="form-checkbox correct-input text-primary focus:ring-primary/20 cursor-pointer">
                `;
            }

            div.innerHTML = `
                <div class="pt-0.5">
                    ${inputHtml}
                </div>
                <div class="w-10 font-bold text-default-700 text-xs">
                    <input type="text" name="options[${i}][key]" value="${letter}" class="form-input w-full text-center font-bold bg-default-50 border-default-200 rounded-lg py-1 text-xs" readonly>
                </div>
                <div class="flex-1">
                    <input type="text" name="options[${i}][content]" placeholder="Teks opsi ${letter}..." class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-9" required>
                </div>
                <div>
                    <button type="button" onclick="removeOptionRow(this)" class="text-default-400 hover:text-danger p-1.5 rounded hover:bg-danger/10 transition cursor-pointer" title="Hapus Opsi">
                        <i data-lucide="trash-2" class="size-4"></i>
                    </button>
                </div>
            `;
            container.appendChild(div);
        }
        if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
    }

    function renderTrueFalseOptions() {
        const container = document.getElementById('optionsList');
        container.innerHTML = `
            <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white shadow-2xs">
                <input type="radio" name="correct_option" value="BENAR" checked onchange="syncRadioSelection(this)" class="form-radio text-primary focus:ring-primary/20 cursor-pointer">
                <input type="hidden" name="options[0][is_correct]" class="option-is-correct" value="1">
                <input type="hidden" name="options[0][key]" value="BENAR">
                <input type="text" name="options[0][content]" value="BENAR" class="flex-1 text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded px-3 py-2" readonly>
            </div>
            <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white shadow-2xs">
                <input type="radio" name="correct_option" value="SALAH" onchange="syncRadioSelection(this)" class="form-radio text-primary focus:ring-primary/20 cursor-pointer">
                <input type="hidden" name="options[1][is_correct]" class="option-is-correct" value="0">
                <input type="hidden" name="options[1][key]" value="SALAH">
                <input type="text" name="options[1][content]" value="SALAH" class="flex-1 text-xs font-bold text-rose-700 bg-rose-50 border border-rose-200 rounded px-3 py-2" readonly>
            </div>
        `;
    }

    function renderSingleKeyOption(placeholder) {
        const container = document.getElementById('optionsList');
        container.innerHTML = `
            <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white shadow-2xs">
                <input type="hidden" name="options[0][is_correct]" value="1">
                <input type="hidden" name="options[0][key]" value="KUNCI">
                <div class="w-28 text-xs font-bold text-default-600 uppercase">Kunci Valid:</div>
                <div class="flex-1">
                    <input type="text" name="options[0][content]" placeholder="${placeholder}..." class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-10" required>
                </div>
            </div>
        `;
    }

    function renderMatchingOptions() {
        const container = document.getElementById('optionsList');
        container.innerHTML = '';
        for (let i = 0; i < 3; i++) {
            const num = i + 1;
            const div = document.createElement('div');
            div.className = 'option-row p-3.5 border border-default-200 rounded grid grid-cols-1 md:grid-cols-2 gap-3 bg-white shadow-2xs';
            div.innerHTML = `
                <input type="hidden" name="options[${i}][is_correct]" value="1">
                <input type="hidden" name="options[${i}][key]" value="P${num}">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-default-500 mb-1">Premis / Pernyataan ${num}</label>
                    <input type="text" name="options[${i}][content]" placeholder="Premis ${num}..." class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-9" required>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-default-500 mb-1">Pasangan Benar</label>
                    <input type="text" name="options[${i}][pair_match]" placeholder="Pasangan cocok untuk premis ${num}..." class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-9" required>
                </div>
            `;
            container.appendChild(div);
        }
    }

    function addOptionRow() {
        const container = document.getElementById('optionsList');
        const rows = container.getElementsByClassName('option-row');
        const nextIdx = rows.length;
        if (nextIdx >= 8) {
            alert('Maksimal 8 opsi pilihan.');
            return;
        }
        const letter = letters[nextIdx] || ('O' + (nextIdx + 1));
        const qType = document.getElementById('questionType').value;
        const isRadio = qType === 'multiple_choice';

        const div = document.createElement('div');
        div.className = 'option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white hover:bg-default-50/50 transition shadow-2xs';

        let inputHtml = '';
        if (isRadio) {
            inputHtml = `
                <input type="radio" name="correct_option" value="${letter}" onchange="syncRadioSelection(this)" class="form-radio correct-input text-primary focus:ring-primary/20 cursor-pointer">
                <input type="hidden" name="options[${nextIdx}][is_correct]" class="option-is-correct" value="0">
            `;
        } else {
            inputHtml = `
                <input type="checkbox" name="options[${nextIdx}][is_correct]" value="1" class="form-checkbox correct-input text-primary focus:ring-primary/20 cursor-pointer">
            `;
        }

        div.innerHTML = `
            <div class="pt-0.5">
                ${inputHtml}
            </div>
            <div class="w-10 font-bold text-default-700 text-xs">
                <input type="text" name="options[${nextIdx}][key]" value="${letter}" class="form-input w-full text-center font-bold bg-default-50 border-default-200 rounded-lg py-1 text-xs" readonly>
            </div>
            <div class="flex-1">
                <input type="text" name="options[${nextIdx}][content]" placeholder="Teks opsi ${letter}..." class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-9" required>
            </div>
            <div>
                <button type="button" onclick="removeOptionRow(this)" class="text-default-400 hover:text-danger p-1.5 rounded hover:bg-danger/10 transition cursor-pointer" title="Hapus Opsi">
                    <i data-lucide="trash-2" class="size-4"></i>
                </button>
            </div>
        `;
        container.appendChild(div);
        if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
    }

    function removeOptionRow(btn) {
        const container = document.getElementById('optionsList');
        const rows = container.getElementsByClassName('option-row');
        if (rows.length <= 2) {
            alert('Minimal membutuhkan 2 opsi pilihan.');
            return;
        }
        btn.closest('.option-row').remove();
        reindexOptions();
        if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
    }

    document.getElementById('questionContent').addEventListener('input', function() {
        document.getElementById('charCount').innerText = this.value.length + ' karakter';
    });

    // Form submit listener to ensure latest content is in textarea
    const questionForm = document.querySelector('form');
    if (questionForm) {
        questionForm.addEventListener('submit', function() {
            if (!isRawMode && window.questionQuill) {
                syncQuillToTextarea();
            }
        });
    }

    // Auto initialize Quill editor
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initQuillEditor);
    } else {
        initQuillEditor();
    }
</script>
@endsection

