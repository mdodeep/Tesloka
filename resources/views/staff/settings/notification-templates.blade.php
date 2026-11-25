@extends('layouts.staff')

@section('title', 'Template Notifikasi & Pesan')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Template Notifikasi & Pesan')
@section('page-subtitle', 'Kustomisasi subjek dan bodi pesan otomatis dengan variabel dinamis (merge tags).')

@section('page-actions')
    <a href="{{ route('staff.settings.smtp.index') }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="settings" class="size-4 text-default-500"></i>
        <span>Pengaturan SMTP</span>
    </a>
    <a href="{{ route('staff.settings.notification-logs.index') }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="file-text" class="size-4 text-default-500"></i>
        <span>Log Pengiriman</span>
    </a>
@endsection

@section('content')
@php
    $branding = $branding ?? app(\App\Services\BrandingService::class)->getBranding();
    $systemLogoUrl = $branding['logo_url'];
    $systemInstName = $branding['institution_name'];
    $appName = $branding['app_name'];
@endphp
<div class="space-y-6">

    <div class="space-y-6">
        @foreach($templates as $tmpl)
            <x-cbt.card :title="$tmpl->name">
                <form id="form-template-{{ $tmpl->id }}" action="{{ route('staff.settings.notification-templates.update', $tmpl) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center justify-between pb-2 border-b border-default-100">
                        <span class="text-xs font-mono px-2 py-0.5 rounded bg-default-100 text-default-600 font-bold">
                            Kode: {{ $tmpl->code }} &bull; Kanal: {{ strtoupper($tmpl->channel) }}
                        </span>
                        <label class="flex items-center gap-2 text-xs font-semibold text-default-700 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ $tmpl->is_active ? 'checked' : '' }} class="form-switch">
                            <span>Status Aktif</span>
                        </label>
                    </div>

                    <div class="space-y-1.5">
                        <label for="subject-{{ $tmpl->id }}" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">Subjek Pesan</label>
                        <input type="text" id="subject-{{ $tmpl->id }}" name="subject" value="{{ old('subject', $tmpl->subject) }}" class="form-input" required>
                    </div>

                    <div class="space-y-1.5">
                        <label for="body-{{ $tmpl->id }}" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">Bodi Pesan (HTML / Teks)</label>
                        <textarea id="body-{{ $tmpl->id }}" name="body_template" rows="5" class="form-textarea font-mono text-xs" required>{{ old('body_template', $tmpl->body_template) }}</textarea>
                        <p class="text-[11px] text-default-500 mt-1.5 leading-normal">
                            Variabel tersedia: <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{nama_siswa}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{username}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{judul_ujian}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{token}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{kode_sesi}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{waktu_mulai}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{nama_ruang}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{durasi}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{nilai}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{kkm}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{status_kelulusan}}</code>, <code class="px-1 py-0.5 rounded bg-default-100 text-default-700 text-[10px] font-mono">@{{nama_institusi}}</code>.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 pt-3 border-t border-default-100">
                        <button type="button" 
                                id="btn-preview-{{ $tmpl->id }}"
                                onclick="openTemplatePreview({{ $tmpl->id }}, '{{ $tmpl->code }}', '{{ addslashes($tmpl->name) }}')" 
                                class="btn-preview-template btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center justify-center gap-1.5 cursor-pointer shadow-2xs w-full sm:w-auto">
                            <i data-lucide="eye" class="size-4 text-primary shrink-0"></i>
                            <span>Pratinjau Email (View Template)</span>
                        </button>

                        <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center justify-center gap-1.5 cursor-pointer shadow-2xs w-full sm:w-auto">
                            <i data-lucide="save" class="size-4 shrink-0"></i>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </form>
            </x-cbt.card>
        @endforeach
    </div>
</div>

<!-- Modal Pratinjau Email (View Template) -->
<div id="modal-template-preview" class="hidden fixed inset-0 z-50 bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-card rounded-lg max-w-3xl w-full p-6 shadow-2xl border border-default-200 max-h-[90vh] flex flex-col">
        <!-- Header Modal -->
        <div class="flex items-center justify-between pb-4 border-b border-default-200 shrink-0">
            <div class="flex items-center gap-2.5">
                <div class="size-9 rounded-lg bg-primary/10 text-primary flex items-center justify-center font-bold">
                    <i data-lucide="mail" class="size-5"></i>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-default-800">Pratinjau Template Email</h3>
                    <p id="previewModalTemplateName" class="text-xs text-default-500 font-medium">Akun Baru Pengguna (account_created)</p>
                </div>
            </div>

            <!-- Tab Switcher -->
            <div class="flex items-center gap-1 bg-default-100 p-1 rounded-md text-xs font-medium">
                <button type="button" id="tabBtnInbox" onclick="switchPreviewTab('inbox')" class="px-3 py-1 rounded bg-white text-default-800 shadow-xs font-semibold cursor-pointer">
                    Simulasi Inbox
                </button>
                <button type="button" id="tabBtnVariables" onclick="switchPreviewTab('variables')" class="px-3 py-1 rounded text-default-600 hover:text-default-800 font-medium cursor-pointer">
                    Nilai Variabel
                </button>
            </div>

            <button aria-label="Tutup dialog" type="button" onclick="closeTemplatePreview()" class="text-default-400 hover:text-default-600 cursor-pointer p-1 rounded hover:bg-default-100">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <!-- Body Modal (Scrollable) -->
        <div class="flex-1 overflow-y-auto py-4 space-y-4">
            
            <!-- Tab 1: Inbox Simulation -->
            <div id="previewTabInbox" class="space-y-4">
                <!-- Email Metadata Header (Simulasi Email Client seperti Gmail / Outlook) -->
                <div class="p-3.5 bg-default-50 border border-default-200 rounded-lg text-xs space-y-2">
                    <div class="flex items-start justify-between gap-4">
                        <div class="space-y-1.5 flex-1 min-w-0">
                            <div class="flex items-baseline gap-2">
                                <span class="font-semibold text-default-500 w-16 shrink-0">Subjek:</span>
                                <span id="previewModalSubject" class="font-bold text-default-900 text-sm break-words">...</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-default-500 w-16 shrink-0">Dari:</span>
                                <span class="text-default-700 font-mono text-[11px]">{{ $systemInstName }} &lt;{{ config('mail.from.address', 'noreply@institusi.ac.id') }}&gt;</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-default-500 w-16 shrink-0">Kepada:</span>
                                <span class="text-default-700 font-mono text-[11px]">Ahmad Fauzi &lt;ahmad.fauzi@siswa.test&gt;</span>
                            </div>
                        </div>
                        <div class="text-right text-[11px] text-default-400 shrink-0">
                            <span>Hari Ini, 19:15 WIB</span>
                        </div>
                    </div>
                </div>

                <!-- Email Body (Rendered HTML Container) -->
                <div class="border border-default-200 rounded-lg overflow-hidden shadow-xs bg-white">
                    <!-- Di Paling Atas: Header Logo Resmi Saja -->
                    <div class="bg-white px-6 py-4 flex items-center">
                        <img src="{{ $systemLogoUrl }}" alt="{{ $systemInstName }}" class="h-8 max-h-8 w-auto object-contain">
                    </div>

                    <!-- Pita Pemisah Biru (Divider) -->
                    <div class="bg-primary h-2 w-full"></div>

                    <!-- Email Body Container -->
                    <div class="p-6 md:p-8 bg-white min-h-[160px]">
                        <div id="previewModalBody" class="prose max-w-none text-default-800 text-sm leading-relaxed space-y-3 font-normal">
                            <!-- Dynamic Content Rendered Here -->
                        </div>
                    </div>

                    <!-- Email Footer Note -->
                    <div class="bg-default-50 px-6 py-3.5 border-t border-default-200 text-center text-[11px] text-default-500 leading-normal">
                        <p class="font-semibold text-default-700">{{ $systemInstName }}</p>
                        <p class="text-default-400 mt-0.5">Pesan ini dikirimkan secara otomatis oleh server. Harap tidak membalas email ini secara langsung.</p>
                    </div>
                </div>
            </div>

            <!-- Tab 2: Variabel & Nilai Sampel -->
            <div id="previewTabVariables" class="hidden">
                <div class="p-4 bg-default-50 border border-default-200 rounded-lg text-xs space-y-3">
                    <p class="text-default-600 leading-relaxed">
                        Berikut adalah daftar variabel merge tags yang disimulasikan dengan nilai contoh pada pratinjau ini:
                    </p>
                    <div class="overflow-x-auto -mx-2 sm:mx-0">
                        <table class="w-full min-w-[360px] text-left border-collapse">
                            <thead class="bg-default-100 border-y border-default-200 text-xs font-semibold text-default-700">
                                <tr class="text-[11px] font-semibold uppercase tracking-wider text-default-500 whitespace-nowrap">
                                    <th class="py-2 px-3 font-semibold whitespace-nowrap">Tag Variabel</th>
                                    <th class="py-2 px-3 font-semibold whitespace-nowrap">Nilai Contoh (Sample Value)</th>
                                </tr>
                            </thead>
                            <tbody id="previewVariablesTableBody" class="divide-y divide-default-100 text-default-700">
                                <!-- Populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Modal -->
        <div class="pt-4 border-t border-default-200 flex flex-wrap items-center justify-between gap-3 shrink-0">
            <span class="text-[11px] text-default-500 flex items-center gap-1.5">
                <i data-lucide="info" class="size-4 text-emerald-500 shrink-0"></i>
                <span>Pratinjau membaca langsung perubahan teks yang sedang diedit di formulir tanpa perlu disimpan terlebih dahulu.</span>
            </span>

            <button type="button" onclick="closeTemplatePreview()" class="px-4 py-2 bg-default-100 hover:bg-default-200 text-default-700 font-semibold text-xs rounded-md transition cursor-pointer">
                Tutup Pratinjau
            </button>
        </div>
    </div>
</div>

<script>
const sampleTemplateData = {
    'nama_siswa': 'Ahmad Fauzi',
    'username': '20261001',
    'email_siswa': 'ahmad.fauzi@siswa.test',
    'judul_ujian': 'Ujian Akhir Semester Ganjil 2026/2027',
    'kode_sesi': 'SESI-PAGI-01',
    'waktu_mulai': 'Senin, 10 Nov 2026 08:00 WIB',
    'nama_ruang': 'Laboratorium Komputer 1',
    'nilai': '88.50',
    'kkm': '75.00',
    'status_kelulusan': '<strong class="text-emerald-600 font-bold">LULUS</strong>',
    'nama_institusi': '{{ addslashes($systemInstName) }}',
    'nama_aplikasi': '{{ addslashes($appName) }}',
    'token': 'CBT2026',
    'durasi': '90 Menit',
    'tanggal': '09 November 2026'
};

function renderMergeTags(text, data) {
    if (!text) return '';
    let result = text;
    for (const [key, val] of Object.entries(data)) {
        const regex = new RegExp(`\\{\\{\\s*${key}\\s*\\}\\}`, 'g');
        result = result.replace(regex, val);
    }
    return result;
}

function openTemplatePreview(id, code, name) {
    const subjectInput = document.getElementById(`subject-${id}`);
    const bodyInput = document.getElementById(`body-${id}`);

    const rawSubject = subjectInput ? subjectInput.value : '';
    const rawBody = bodyInput ? bodyInput.value : '';

    const renderedSubject = renderMergeTags(rawSubject, sampleTemplateData);
    const renderedBody = renderMergeTags(rawBody, sampleTemplateData);

    document.getElementById('previewModalTemplateName').textContent = `${name} (${code})`;
    document.getElementById('previewModalSubject').textContent = renderedSubject;
    document.getElementById('previewModalBody').innerHTML = renderedBody;

    // Populate variables table
    const tbody = document.getElementById('previewVariablesTableBody');
    tbody.innerHTML = '';
    for (const [key, val] of Object.entries(sampleTemplateData)) {
        const tr = document.createElement('tr');
        const displayVal = val.replace(/<[^>]*>?/gm, ''); // strip HTML tag for table display
        tr.innerHTML = `
            <td class="py-2 px-3 font-mono font-bold text-primary text-[11px]">&#123;&#123;${key}&#125;&#125;</td>
            <td class="py-2 px-3 text-default-700 font-medium">${displayVal}</td>
        `;
        tbody.appendChild(tr);
    }

    switchPreviewTab('inbox');
    document.getElementById('modal-template-preview').classList.remove('hidden');
}

function closeTemplatePreview() {
    const modal = document.getElementById('modal-template-preview');
    if (modal) modal.classList.add('hidden');
}

function switchPreviewTab(tab) {
    const inboxTab = document.getElementById('previewTabInbox');
    const varTab = document.getElementById('previewTabVariables');
    const btnInbox = document.getElementById('tabBtnInbox');
    const btnVar = document.getElementById('tabBtnVariables');

    if (tab === 'inbox') {
        inboxTab.classList.remove('hidden');
        varTab.classList.add('hidden');
        btnInbox.className = 'px-3 py-1 rounded bg-white text-default-800 shadow-xs font-semibold cursor-pointer';
        btnVar.className = 'px-3 py-1 rounded text-default-600 hover:text-default-800 font-medium cursor-pointer';
    } else {
        inboxTab.classList.add('hidden');
        varTab.classList.remove('hidden');
        btnInbox.className = 'px-3 py-1 rounded text-default-600 hover:text-default-800 font-medium cursor-pointer';
        btnVar.className = 'px-3 py-1 rounded bg-white text-default-800 shadow-xs font-semibold cursor-pointer';
    }
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeTemplatePreview();
    }
});

document.getElementById('modal-template-preview')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeTemplatePreview();
    }
});
</script>
@endsection
