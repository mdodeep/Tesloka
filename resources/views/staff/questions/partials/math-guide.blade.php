<!-- Collapsible Panduan Penulisan Rumus (KaTeX/LaTeX) & Karakter Khusus -->
<div class="border border-default-200 rounded-md overflow-hidden bg-white shadow-2xs mt-3">
    <button type="button" onclick="toggleMathGuide()" id="btnToggleMathGuide"
        class="w-full p-3 sm:px-4 bg-default-50/70 hover:bg-default-100/70 text-left flex items-center justify-between transition cursor-pointer">
        <div class="flex items-center gap-2.5 min-w-0">
            <div class="w-7 h-7 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0">
                <i data-lucide="help-circle" class="size-4"></i>
            </div>
            <div class="min-w-0">
                <h5 class="text-xs font-bold text-default-800 truncate">
                    Panduan Format Teks, Rumus Matematika (KaTeX / LaTeX), &amp; Karakter Khusus
                </h5>
                <p class="text-[11px] text-default-400 mt-0.5 truncate">
                    Klik untuk melihat contoh penulisan rumus KaTeX, subskrip kimia, dan palet simbol instan.
                </p>
            </div>
        </div>
        <div class="flex items-center gap-1.5 shrink-0 text-xs font-semibold text-primary ml-2">
            <span id="mathGuideToggleText">Buka Panduan</span>
            <i data-lucide="chevron-down" id="mathGuideToggleIcon" class="size-4 transition-transform duration-200"></i>
        </div>
    </button>

    <div id="mathGuideBody" class="hidden border-t border-default-200 p-4 space-y-4 bg-white">
        <!-- Palet Simbol Cepat (1-Klik Masuk ke Editor) -->
        <div class="space-y-1.5">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-default-700 uppercase tracking-wide">
                    Palet Simbol Cepat (Klik untuk Menyisipkan Langsung)
                </span>
                <span class="text-[10px] text-default-400 font-mono">1-Klik Salin</span>
            </div>
            <div class="flex flex-wrap gap-1 p-2 bg-default-50/70 border border-default-200 rounded-md">
                @php
                    $symbols = [
                        '±', '×', '÷', '≠', '≈', '≤', '≥', '≡', '‰', '°',
                        '√', '∛', '∞', '∑', '∏', '∫', '∂', '∇',
                        '∀', '∃', '∈', '∉', '⊂', '⊆', '∪', '∩', '∅', '→', '↔', '⇒', '⇔',
                        'α', 'β', 'γ', 'δ', 'ε', 'θ', 'λ', 'μ', 'π', 'ρ', 'σ', 'τ', 'φ', 'ω', 'Δ', 'Ω',
                        '°C', '°F', 'Å', 'µm', '²', '³', '½', '¼', '¾'
                    ];
                @endphp
                @foreach($symbols as $sym)
                    <button type="button" onclick="insertSymbolToEditor('{{ $sym }}')"
                        class="px-2 py-1 bg-white hover:bg-primary hover:text-white text-default-700 text-xs font-mono font-bold rounded border border-default-200 shadow-2xs transition cursor-pointer"
                        title="Klik untuk menyisipkan {{ $sym }}">
                        {{ $sym }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Tabel Contoh Rumus Matematika (KaTeX / LaTeX) -->
        <div class="space-y-2">
            <span class="text-xs font-bold text-default-700 uppercase tracking-wide">
                Rumus Matematika &amp; Sains (Sintaks KaTeX / LaTeX)
            </span>
            <p class="text-[11px] text-default-500">
                Gunakan tanda dollar tunggal <code class="px-1 py-0.5 bg-default-100 rounded text-primary font-mono">$...$</code> untuk rumus sejajar teks (inline), atau dollar ganda <code class="px-1 py-0.5 bg-default-100 rounded text-primary font-mono">$$...$$</code> untuk rumus blok terpusat.
            </p>

            <div class="overflow-x-auto border border-default-200 rounded-md">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-default-100 border-y border-default-200 text-xs font-semibold text-default-700">
                        <tr class="text-[11px] font-semibold uppercase tracking-wider text-default-500 whitespace-nowrap">
                            <th class="p-2.5 whitespace-nowrap">Kategori / Nama</th>
                            <th class="p-2.5 whitespace-nowrap">Sintaks KaTeX / LaTeX</th>
                            <th class="p-2.5 whitespace-nowrap">Tampilan yang Dihasilkan</th>
                            <th class="p-2.5 text-right whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-100 text-default-700">
                        <tr>
                            <td class="p-2.5 font-semibold text-default-900">Pecahan (Fraction)</td>
                            <td class="p-2.5 font-mono text-primary text-[11px]">$\frac{a}{b}$</td>
                            <td class="p-2.5 font-serif">\( \frac{a}{b} \) (a dibagi b)</td>
                            <td class="p-2.5 text-right">
                                <button type="button" onclick="insertSymbolToEditor('$\\frac{a}{b}$ ')" class="btn btn-xs bg-default-100 hover:bg-primary hover:text-white text-default-700 font-semibold rounded px-2 py-1 transition cursor-pointer">
                                    Sisipkan
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2.5 font-semibold text-default-900">Pangkat &amp; Akar</td>
                            <td class="p-2.5 font-mono text-primary text-[11px]">$x^2 + y^2 = r^2$, $\sqrt{x}$</td>
                            <td class="p-2.5 font-serif">\( x^2 + y^2 = r^2 \), \( \sqrt{x} \)</td>
                            <td class="p-2.5 text-right">
                                <button type="button" onclick="insertSymbolToEditor('$\\sqrt{x^2 + y^2}$ ')" class="btn btn-xs bg-default-100 hover:bg-primary hover:text-white text-default-700 font-semibold rounded px-2 py-1 transition cursor-pointer">
                                    Sisipkan
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2.5 font-semibold text-default-900">Rumus Kuadratik (ABC)</td>
                            <td class="p-2.5 font-mono text-primary text-[11px]">$x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$</td>
                            <td class="p-2.5 font-serif">Rumus Kuadratik</td>
                            <td class="p-2.5 text-right">
                                <button type="button" onclick="insertSymbolToEditor('$x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a}$ ')" class="btn btn-xs bg-default-100 hover:bg-primary hover:text-white text-default-700 font-semibold rounded px-2 py-1 transition cursor-pointer">
                                    Sisipkan
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2.5 font-semibold text-default-900">Penjumlahan Sigma</td>
                            <td class="p-2.5 font-mono text-primary text-[11px]">$\sum_{i=1}^{n} x_i$</td>
                            <td class="p-2.5 font-serif">\( \sum_{i=1}^n x_i \)</td>
                            <td class="p-2.5 text-right">
                                <button type="button" onclick="insertSymbolToEditor('$\\sum_{i=1}^{n} x_i$ ')" class="btn btn-xs bg-default-100 hover:bg-primary hover:text-white text-default-700 font-semibold rounded px-2 py-1 transition cursor-pointer">
                                    Sisipkan
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2.5 font-semibold text-default-900">Integral Tentu</td>
                            <td class="p-2.5 font-mono text-primary text-[11px]">$\int_{a}^{b} f(x) \, dx$</td>
                            <td class="p-2.5 font-serif">\( \int_a^b f(x) dx \)</td>
                            <td class="p-2.5 text-right">
                                <button type="button" onclick="insertSymbolToEditor('$\\int_{a}^{b} f(x) \\, dx$ ')" class="btn btn-xs bg-default-100 hover:bg-primary hover:text-white text-default-700 font-semibold rounded px-2 py-1 transition cursor-pointer">
                                    Sisipkan
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2.5 font-semibold text-default-900">Limit Fungsi</td>
                            <td class="p-2.5 font-mono text-primary text-[11px]">$\lim_{x \to 0} \frac{\sin x}{x} = 1$</td>
                            <td class="p-2.5 font-serif">Limit x mendekati 0</td>
                            <td class="p-2.5 text-right">
                                <button type="button" onclick="insertSymbolToEditor('$\\lim_{x \\to 0} \\frac{\\sin x}{x} = 1$ ')" class="btn btn-xs bg-default-100 hover:bg-primary hover:text-white text-default-700 font-semibold rounded px-2 py-1 transition cursor-pointer">
                                    Sisipkan
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Formula Kimia & Subskrip -->
        <div class="space-y-2">
            <span class="text-xs font-bold text-default-700 uppercase tracking-wide">
                Formula Kimia &amp; Subskrip / Superskrip
            </span>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                <div class="p-2.5 bg-default-50 border border-default-200 rounded flex items-center justify-between">
                    <div>
                        <div class="font-bold text-xs text-default-900">Air (H₂O)</div>
                        <div class="text-[10px] text-default-400 font-mono">H&lt;sub&gt;2&lt;/sub&gt;O</div>
                    </div>
                    <button type="button" onclick="insertSymbolToEditor('H<sub>2</sub>O')" class="btn btn-xs bg-white hover:bg-primary hover:text-white text-default-700 border border-default-200 font-semibold rounded px-2 py-1 transition cursor-pointer">
                        Sisipkan
                    </button>
                </div>
                <div class="p-2.5 bg-default-50 border border-default-200 rounded flex items-center justify-between">
                    <div>
                        <div class="font-bold text-xs text-default-900">CO₂</div>
                        <div class="text-[10px] text-default-400 font-mono">CO&lt;sub&gt;2&lt;/sub&gt;</div>
                    </div>
                    <button type="button" onclick="insertSymbolToEditor('CO<sub>2</sub>')" class="btn btn-xs bg-white hover:bg-primary hover:text-white text-default-700 border border-default-200 font-semibold rounded px-2 py-1 transition cursor-pointer">
                        Sisipkan
                    </button>
                </div>
                <div class="p-2.5 bg-default-50 border border-default-200 rounded flex items-center justify-between">
                    <div>
                        <div class="font-bold text-xs text-default-900">Asam Sulfat</div>
                        <div class="text-[10px] text-default-400 font-mono">H&lt;sub&gt;2&lt;/sub&gt;SO&lt;sub&gt;4&lt;/sub&gt;</div>
                    </div>
                    <button type="button" onclick="insertSymbolToEditor('H<sub>2</sub>SO<sub>4</sub>')" class="btn btn-xs bg-white hover:bg-primary hover:text-white text-default-700 border border-default-200 font-semibold rounded px-2 py-1 transition cursor-pointer">
                        Sisipkan
                    </button>
                </div>
                <div class="p-2.5 bg-default-50 border border-default-200 rounded flex items-center justify-between">
                    <div>
                        <div class="font-bold text-xs text-default-900">Percepatan (m/s²)</div>
                        <div class="text-[10px] text-default-400 font-mono">m/s&lt;sup&gt;2&lt;/sup&gt;</div>
                    </div>
                    <button type="button" onclick="insertSymbolToEditor('m/s<sup>2</sup>')" class="btn btn-xs bg-white hover:bg-primary hover:text-white text-default-700 border border-default-200 font-semibold rounded px-2 py-1 transition cursor-pointer">
                        Sisipkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleMathGuide() {
        const body = document.getElementById('mathGuideBody');
        const icon = document.getElementById('mathGuideToggleIcon');
        const text = document.getElementById('mathGuideToggleText');

        if (body.classList.contains('hidden')) {
            body.classList.remove('hidden');
            icon.classList.add('rotate-180');
            text.innerText = 'Tutup Panduan';
        } else {
            body.classList.add('hidden');
            icon.classList.remove('rotate-180');
            text.innerText = 'Buka Panduan';
        }
    }

    function insertSymbolToEditor(str) {
        // Cek apakah Quill editor aktif
        if (window.questionQuill && typeof window.questionQuill.getSelection === 'function' && !document.getElementById('quillWrapper').classList.contains('hidden')) {
            const range = window.questionQuill.getSelection(true);
            const index = range ? range.index : window.questionQuill.getLength();
            window.questionQuill.insertText(index, str);
            window.questionQuill.setSelection(index + str.length);
            // Sync
            if (typeof syncQuillToTextarea === 'function') syncQuillToTextarea();
            return;
        }

        // Fallback ke Textarea murni
        const textarea = document.getElementById('questionContent');
        if (!textarea) return;

        const start = textarea.selectionStart || textarea.value.length;
        const end = textarea.selectionEnd || textarea.value.length;
        const text = textarea.value;

        textarea.value = text.substring(0, start) + str + text.substring(end);
        textarea.selectionStart = textarea.selectionEnd = start + str.length;
        textarea.focus();

        const countEl = document.getElementById('charCount');
        if (countEl) countEl.innerText = textarea.value.length + ' karakter';

        // Jika Quill ada, sinkronkan juga
        if (window.questionQuill && typeof syncTextareaToQuill === 'function') {
            syncTextareaToQuill();
        }
    }
</script>

