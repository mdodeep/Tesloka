@extends('layouts.staff')

@section('title', 'Template Notifikasi & Pesan — TESLOKA CBT')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Template Notifikasi & Pesan')
@section('page-subtitle', 'Kustomisasi subjek dan bodi pesan otomatis dengan variabel dinamis (merge tags).')

@section('page-actions')
    <a href="{{ route('staff.settings.smtp.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded-md inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="w-4 h-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <span>Pengaturan SMTP</span>
    </a>
    <a href="{{ route('staff.settings.notification-logs.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded-md inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="w-4 h-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        <span>Log Pengiriman</span>
    </a>
@endsection

@section('content')
@php
    $systemInstitution = \App\Models\Institution::first();
    $systemLogoUrl = $systemInstitution?->logo_url ?? asset('assets/images/logo-tesloka-cbt.webp');
    $systemInstName = $systemInstitution?->name ?? 'Tesloka';
    $appName = config('app.name', 'TESLOKA CBT');
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
                                class="btn-preview-template w-full sm:w-auto px-4 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold text-xs rounded-md shadow-xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>Pratinjau Email (View Template)</span>
                        </button>

                        <button type="submit" class="w-full sm:w-auto px-5 py-2 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded-md shadow-xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer">
                            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
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
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
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

            <button type="button" onclick="closeTemplatePreview()" class="text-default-400 hover:text-default-600 cursor-pointer p-1 rounded hover:bg-default-100">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
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
                            <thead>
                                <tr class="border-b border-default-200 text-default-500 text-[11px] uppercase tracking-wider">
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
                <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
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
    'token': 'TESLOKA26',
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
