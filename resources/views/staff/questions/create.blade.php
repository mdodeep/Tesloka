@extends('layouts.staff')

@section('title', 'Tambah Butir Soal — ' . $questionBank->name)
@section('page-parent', 'Bank Soal')
@section('page-title', 'Tambah Butir Soal')
@section('page-subtitle', 'Bank Soal: ' . $questionBank->name . ' (' . $questionBank->code . ') • Mapel: ' . ($questionBank->subject->name ?? '-'))

@section('page-actions')
    <a href="{{ route('staff.question-banks.show', $questionBank) }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="arrow-left" class="size-4"></i>
        <span>Kembali ke Bank Soal</span>
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

    <form action="{{ route('staff.question-banks.questions.store', $questionBank) }}" method="POST" id="questionForm">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Kolom Kiri: Metadata & Parameter -->
            <div class="space-y-6">
                <x-cbt.card title="Pengaturan Butir Soal">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Tipe Soal *</label>
                            <select name="type" id="questionType" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary font-medium" onchange="handleTypeChange(this.value)">
                                <option value="multiple_choice" {{ old('type') == 'multiple_choice' ? 'selected' : '' }}>Pilihan Ganda (Tunggal)</option>
                                <option value="multiple_choice_complex" {{ old('type') == 'multiple_choice_complex' ? 'selected' : '' }}>Pilihan Ganda Kompleks (Multipel)</option>
                                <option value="true_false" {{ old('type') == 'true_false' ? 'selected' : '' }}>Benar / Salah</option>
                                <option value="short_answer" {{ old('type') == 'short_answer' ? 'selected' : '' }}>Isian Singkat</option>
                                <option value="numeric" {{ old('type') == 'numeric' ? 'selected' : '' }}>Numerik / Angka</option>
                                <option value="matching" {{ old('type') == 'matching' ? 'selected' : '' }}>Menjodohkan (Matching)</option>
                                <option value="essay" {{ old('type') == 'essay' ? 'selected' : '' }}>Uraian / Esai</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Stimulus / Wacana Bacaan</label>
                            <select name="stimulus_id" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <option value="">-- Tanpa Stimulus (Mandiri) --</option>
                                @foreach($questionBank->stimuli as $stim)
                                    <option value="{{ $stim->id }}" {{ old('stimulus_id') == $stim->id ? 'selected' : '' }}>
                                        {{ $stim->title }} ({{ $stim->type }})
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-xs text-default-400 mt-1">Gunakan wacana bersama untuk rumpun butir soal terkait.</p>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Tingkat Kesulitan *</label>
                                <select name="difficulty" class="form-select w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                    <option value="easy" {{ old('difficulty') == 'easy' ? 'selected' : '' }}>Mudah</option>
                                    <option value="medium" {{ old('difficulty', 'medium') == 'medium' ? 'selected' : '' }}>Sedang</option>
                                    <option value="hard" {{ old('difficulty') == 'hard' ? 'selected' : '' }}>Sukar</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Bobot Nilai *</label>
                                <input type="number" step="0.1" min="0.1" max="100" name="weight" value="{{ old('weight', 1.0) }}" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-default-700 uppercase mb-1">Kode Butir Soal (Opsional)</label>
                            <input type="text" name="code" value="{{ old('code') }}" placeholder="Otomatis jika dikosongkan (cth: Q-AB12CD)" class="form-input w-full h-10 text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        </div>

                        <div class="pt-2 border-t border-default-100 flex items-center justify-between">
                            <div>
                                <span class="text-xs font-bold text-default-700 block">Teks Arab / Harakat (RTL)</span>
                                <p class="text-[11px] text-default-400">Perataan kanan untuk soal bahasa Arab</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_rtl" value="1" id="isRtlCheckbox" {{ old('is_rtl') ? 'checked' : '' }} onchange="toggleRtl(this.checked)" class="form-switch">
                            </label>
                        </div>
                    </div>
                </x-cbt.card>

                <x-cbt.card title="Pembahasan & Penjelasan">
                    <textarea name="explanation" rows="4" placeholder="Tuliskan pembahasan atau kunci solusi butir soal ini (hanya tampil untuk guru/evaluator)..." class="form-textarea w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary">{{ old('explanation') }}</textarea>
                </x-cbt.card>
            </div>

            <!-- Kolom Tengah & Kanan: Konten Soal & Opsi Jawaban -->
            <div class="lg:col-span-2 space-y-6">
                <x-cbt.card title="Konten Pokok Soal">
                    <div class="space-y-2">
                        <textarea name="content" id="questionContent" rows="6" placeholder="Tuliskan teks pertanyaan atau instruksi soal di sini..." class="form-textarea w-full text-sm rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary leading-relaxed" required>{{ old('content') }}</textarea>
                        <div class="flex justify-between items-center text-xs text-default-400">
                            <span>Mendukung teks terformat, rumus, dan karakter khusus.</span>
                            <span id="charCount">0 karakter</span>
                        </div>
                    </div>
                </x-cbt.card>

                <!-- Dynamic Options Container -->
                <x-cbt.card title="Pilihan & Kunci Jawaban" id="optionsCard">
                    <div class="mb-4 flex items-center justify-between">
                        <p class="text-xs text-default-500" id="optionsGuidance">Pilih salah satu opsi sebagai jawaban benar.</p>
                        <button type="button" id="btnAddOption" onclick="addOptionRow()" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold inline-flex items-center gap-1.5 transition cursor-pointer">
                            <i data-lucide="plus" class="size-3.5"></i>
                            <span>Tambah Pilihan</span>
                        </button>
                    </div>

                    <div id="optionsList" class="space-y-3">
                        <!-- Default Options A-D for Multiple Choice -->
                        @foreach(['A', 'B', 'C', 'D'] as $idx => $optKey)
                        <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white hover:bg-default-50/50 transition shadow-2xs">
                            <div class="pt-0.5">
                                <input type="radio" name="options[{{ $idx }}][is_correct]" value="1" {{ $idx === 0 ? 'checked' : '' }} class="form-radio correct-input text-primary focus:ring-primary/20">
                            </div>
                            <div class="w-10 font-bold text-default-700 text-xs">
                                <input type="text" name="options[{{ $idx }}][key]" value="{{ $optKey }}" class="form-input w-full text-center font-bold bg-default-50 border-default-200 rounded-lg py-1 text-xs" readonly>
                            </div>
                            <div class="flex-1">
                                <input type="text" name="options[{{ $idx }}][content]" placeholder="Teks opsi {{ $optKey }}..." class="form-input w-full text-xs rounded border-default-200 bg-white shadow-2xs focus:ring-2 focus:ring-primary/20 focus:border-primary h-9" required>
                            </div>
                            <div>
                                <button type="button" onclick="removeOptionRow(this)" class="text-default-400 hover:text-danger p-1.5 rounded hover:bg-danger/10 transition cursor-pointer" title="Hapus Opsi">
                                    <i data-lucide="trash-2" class="size-4"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </x-cbt.card>

                <!-- Actions -->
                <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 pt-4">
                    <a href="{{ route('staff.question-banks.show', $questionBank) }}" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold transition text-center w-full sm:w-auto">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold shadow-2xs inline-flex items-center justify-center gap-2 transition w-full sm:w-auto">
                        <i data-lucide="save" class="size-4 shrink-0"></i>
                        <span>Simpan Butir Soal (Versi #1)</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

    function toggleRtl(isRtl) {
        const textarea = document.getElementById('questionContent');
        if (isRtl) {
            textarea.setAttribute('dir', 'rtl');
            textarea.classList.add('text-right', 'font-serif');
        } else {
            textarea.removeAttribute('dir');
            textarea.classList.remove('text-right', 'font-serif');
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
        const inputClass = inputType === 'radio' ? 'form-radio' : 'form-checkbox';
        for (let i = 0; i < 4; i++) {
            const letter = letters[i];
            const div = document.createElement('div');
            div.className = 'option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white hover:bg-default-50/50 transition shadow-2xs';
            div.innerHTML = `
                <div class="pt-0.5">
                    <input type="${inputType}" name="${inputType === 'radio' ? 'options[' + i + '][is_correct]' : 'options[' + i + '][is_correct]'}" value="1" ${i === 0 ? 'checked' : ''} class="${inputClass} correct-input text-primary focus:ring-primary/20">
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
                <input type="radio" name="options[0][is_correct]" value="1" checked class="form-radio text-primary focus:ring-primary/20">
                <input type="hidden" name="options[0][key]" value="BENAR">
                <input type="text" name="options[0][content]" value="BENAR" class="flex-1 text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded px-3 py-2" readonly>
            </div>
            <div class="option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white shadow-2xs">
                <input type="radio" name="options[1][is_correct]" value="1" class="form-radio text-primary focus:ring-primary/20">
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
        const inputType = qType === 'multiple_choice_complex' ? 'checkbox' : 'radio';
        const inputClass = inputType === 'radio' ? 'form-radio' : 'form-checkbox';

        const div = document.createElement('div');
        div.className = 'option-row p-3 border border-default-200 rounded flex items-center gap-3 bg-white hover:bg-default-50/50 transition shadow-2xs';
        div.innerHTML = `
            <div class="pt-0.5">
                <input type="${inputType}" name="options[${nextIdx}][is_correct]" value="1" class="${inputClass} correct-input text-primary focus:ring-primary/20">
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
    }

    document.getElementById('questionContent').addEventListener('input', function() {
        document.getElementById('charCount').innerText = this.value.length + ' karakter';
    });
</script>
@endsection

