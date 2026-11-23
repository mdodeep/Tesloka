@extends('layouts.staff')

@section('title', 'Pengaturan Sistem & Branding : TESLOKA CBT')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Pengaturan Sistem & Branding')
@section('page-subtitle', 'Kelola profil institusi, identitas visual branding, template sertifikat kelulusan, dan preferensi engine CBT.')

@section('content')
<div class="space-y-6 w-full">
    <!-- Navigation Tabs Bar -->
    <div class="border-b border-default-200 overflow-x-auto scrollbar-none -mx-3.5 px-3.5 sm:mx-0 sm:px-0">
        <nav class="flex space-x-2 sm:space-x-4 min-w-max pb-0.5" aria-label="Tabs" id="settingsTabs">
            <!-- Tab 1: Profil Institusi -->
            <button type="button" onclick="switchSettingsTab('profile')" id="tab-btn-profile" class="tab-btn py-3 px-3.5 text-xs font-semibold border-b-2 border-primary text-primary transition flex items-center gap-2 cursor-pointer shrink-0">
                <i data-lucide="building" class="size-4"></i>
                <span>1. Profil Institusi</span>
            </button>

            <!-- Tab 2: Branding & Visual -->
            <button type="button" onclick="switchSettingsTab('branding')" id="tab-btn-branding" class="tab-btn py-3 px-3.5 text-xs font-semibold border-b-2 border-transparent text-default-500 hover:text-default-700 transition flex items-center gap-2 cursor-pointer shrink-0">
                <i data-lucide="palette" class="size-4"></i>
                <span>2. Branding &amp; Visual</span>
            </button>

            <!-- Tab 3: Blangko & Sertifikat -->
            <button type="button" onclick="switchSettingsTab('certificate')" id="tab-btn-certificate" class="tab-btn py-3 px-3.5 text-xs font-semibold border-b-2 border-transparent text-default-500 hover:text-default-700 transition flex items-center gap-2 cursor-pointer shrink-0">
                <i data-lucide="award" class="size-4"></i>
                <span>3. Blangko &amp; Sertifikat</span>
            </button>

            <!-- Tab 4: Sistem & Parameter -->
            <button type="button" onclick="switchSettingsTab('system')" id="tab-btn-system" class="tab-btn py-3 px-3.5 text-xs font-semibold border-b-2 border-transparent text-default-500 hover:text-default-700 transition flex items-center gap-2 cursor-pointer shrink-0">
                <i data-lucide="sliders" class="size-4"></i>
                <span>4. Sistem &amp; Lokalisasi</span>
            </button>

            <!-- Tab 5: Pemeliharaan & Alat Sistem -->
            <button type="button" onclick="switchSettingsTab('tools')" id="tab-btn-tools" class="tab-btn py-3 px-3.5 text-xs font-semibold border-b-2 border-transparent text-default-500 hover:text-default-700 transition flex items-center gap-2 cursor-pointer shrink-0">
                <i data-lucide="wrench" class="size-4"></i>
                <span>5. Pemeliharaan &amp; Alat Sistem</span>
            </button>
        </nav>
    </div>

    <!-- Form Pengaturan Umum & Branding (Tabs 1-4) -->
    <form action="{{ route('staff.settings.general.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="generalSettingsForm">
        @csrf
        <input type="hidden" name="active_tab" id="active_tab" value="{{ old('active_tab', 'profile') }}">

        <!-- ========================================== -->
        <!-- TAB 1: PROFIL RESMI INSTITUSI              -->
        <!-- ========================================== -->
        <div id="tab-pane-profile" class="tab-pane space-y-6">
            <x-cbt.card title="Profil Resmi Institusi" subtitle="Informasi identitas lembaga yang dicetak pada seluruh kop surat, berita acara, dan kartu ujian peserta.">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5 min-w-0">
                        <label for="institution_name" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nama Resmi Institusi *</label>
                        <input type="text" id="institution_name" name="institution_name" value="{{ old('institution_name', $institution->name) }}" required class="form-input">
                        <p class="text-xs text-default-500 mt-1">Dicetak pada seluruh kop surat, berita acara, dan kartu ujian peserta.</p>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="institution_code" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Kode / Singkatan Institusi *</label>
                        <input type="text" id="institution_code" name="institution_code" value="{{ old('institution_code', $institution->code) }}" required class="form-input font-mono">
                        <p class="text-xs text-default-500 mt-1">Digunakan sebagai prefix kode ujian dan pengelompokan berkas.</p>
                    </div>

                    <div class="md:col-span-2 space-y-1.5 min-w-0">
                        <label for="address" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Alamat Lengkap Kampus / Sekolah</label>
                        <textarea id="address" name="address" rows="3" class="form-textarea">{{ old('address', $institution->address) }}</textarea>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="phone" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nomor Telepon Resmi</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $institution->phone) }}" class="form-input">
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="email" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Email Layanan &amp; Helpdesk</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $institution->email) }}" class="form-input">
                    </div>
                </div>
            </x-cbt.card>
        </div>

        <!-- ========================================== -->
        <!-- TAB 2: BRANDING & IDENTITAS VISUAL         -->
        <!-- ========================================== -->
        <div id="tab-pane-branding" class="tab-pane hidden space-y-6">
            <!-- Sub 1: Identitas Visual & Warna -->
            <x-cbt.card title="Identitas Visual & Skema Warna Aplikasi" subtitle="Nama portal publik, tagline, serta palet warna primer dan sekunder sistem CBT.">
                <!-- Preset Skema Warna Identitas -->
                <div class="mb-5">
                    <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-2">Preset Skema Warna Identitas Siap Pakai</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-2.5">
                        <button type="button" onclick="setBrandingColors('#2e33ff', '#14213d')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left cursor-pointer">
                            <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #2e33ff 50%, #14213d 50%);"></span>
                            <span class="text-xs font-medium text-default-700 truncate">Tesloka Classic</span>
                        </button>
                        <button type="button" onclick="setBrandingColors('#059669', '#064e3b')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left cursor-pointer">
                            <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #059669 50%, #064e3b 50%);"></span>
                            <span class="text-xs font-medium text-default-700 truncate">Emerald Green</span>
                        </button>
                        <button type="button" onclick="setBrandingColors('#4f46e5', '#1e1b4b')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left cursor-pointer">
                            <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #4f46e5 50%, #1e1b4b 50%);"></span>
                            <span class="text-xs font-medium text-default-700 truncate">Royal Indigo</span>
                        </button>
                        <button type="button" onclick="setBrandingColors('#dc2626', '#450a0a')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left cursor-pointer">
                            <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #dc2626 50%, #450a0a 50%);"></span>
                            <span class="text-xs font-medium text-default-700 truncate">Crimson Prestige</span>
                        </button>
                        <button type="button" onclick="setBrandingColors('#0891b2', '#164e63')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left cursor-pointer">
                            <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #0891b2 50%, #164e63 50%);"></span>
                            <span class="text-xs font-medium text-default-700 truncate">Ocean Cyan</span>
                        </button>
                        <button type="button" onclick="setBrandingColors('#7c3aed', '#2e1065')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left cursor-pointer">
                            <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #7c3aed 50%, #2e1065 50%);"></span>
                            <span class="text-xs font-medium text-default-700 truncate">Violet Majestic</span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5 min-w-0">
                        <label for="app_name" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nama Aplikasi Publik *</label>
                        <input type="text" id="app_name" name="app_name" value="{{ old('app_name', $settings['app_name']) }}" required class="form-input">
                        <p class="text-xs text-default-500 mt-1">Nama portal yang tampil pada bilah judul dan tab browser.</p>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="app_tagline" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Tagline / Moto Aplikasi</label>
                        <input type="text" id="app_tagline" name="app_tagline" value="{{ old('app_tagline', $settings['app_tagline']) }}" class="form-input">
                        <p class="text-xs text-default-500 mt-1">Slogan atau deskripsi pendek pada halaman login peserta.</p>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="primary_color" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Warna Primer Identitas (Hex) *</label>
                        <div class="flex items-center gap-2">
                            <input type="color" id="primary_color_picker" value="{{ old('primary_color', $settings['primary_color']) }}" class="size-9 rounded border border-default-200 cursor-pointer p-0.5 bg-card" onchange="document.getElementById('primary_color').value = this.value; updateColorPreviews();">
                            <input type="text" id="primary_color" name="primary_color" value="{{ old('primary_color', $settings['primary_color']) }}" required class="form-input flex-1 font-mono uppercase" oninput="document.getElementById('primary_color_picker').value = this.value; updateColorPreviews();">
                        </div>
                        <p class="text-xs text-default-500 mt-1">Warna tombol utama, aksen aktif, dan badge CBT (Standar: #2e33ff).</p>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="secondary_color" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Warna Sekunder Identitas (Hex)</label>
                        <div class="flex items-center gap-2">
                            <input type="color" id="secondary_color_picker" value="{{ old('secondary_color', $settings['secondary_color']) }}" class="size-9 rounded border border-default-200 cursor-pointer p-0.5 bg-card" onchange="document.getElementById('secondary_color').value = this.value; updateColorPreviews();">
                            <input type="text" id="secondary_color" name="secondary_color" value="{{ old('secondary_color', $settings['secondary_color']) }}" class="form-input flex-1 font-mono uppercase" oninput="document.getElementById('secondary_color_picker').value = this.value; updateColorPreviews();">
                        </div>
                        <p class="text-xs text-default-500 mt-1">Warna kontras gelap untuk sidebar dan kartu header (Standar: #14213d).</p>
                    </div>
                </div>

                <!-- Live Interactive Color Preview Box -->
                <div class="mt-5 p-4 rounded-xl border border-default-200 bg-default-50/60">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 mb-3">
                        <h5 class="text-xs font-bold text-default-800 uppercase tracking-wider flex items-center gap-1.5">
                            <i data-lucide="eye" class="size-4 text-primary"></i>
                            <span>Pratinjau Langsung (Live Preview) Skema Warna</span>
                        </h5>
                        <span class="text-[11px] text-default-500">Berubah seketika saat warna primer/sekunder dipilih</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="p-3 rounded-lg bg-card border border-default-200 flex flex-col justify-between">
                            <span class="text-[11px] font-semibold text-default-500 uppercase tracking-wider mb-2">Tombol Primer</span>
                            <button type="button" id="preview_primary_btn" class="w-full py-2 px-3 text-xs font-semibold text-white rounded-md shadow-xs transition" style="background-color: {{ old('primary_color', $settings['primary_color']) }};">
                                Mulai Ujian CBT
                            </button>
                        </div>
                        <div class="p-3 rounded-lg bg-card border border-default-200 flex flex-col justify-between">
                            <span class="text-[11px] font-semibold text-default-500 uppercase tracking-wider mb-2">Badge & Teks Aksen</span>
                            <div class="space-y-1.5">
                                <span id="preview_primary_badge" class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold" style="background-color: {{ old('primary_color', $settings['primary_color']) }}20; color: {{ old('primary_color', $settings['primary_color']) }};">
                                    Sesi Aktif
                                </span>
                                <p id="preview_primary_text" class="text-xs font-semibold" style="color: {{ old('primary_color', $settings['primary_color']) }};">
                                    Tautan & Status Aksen
                                </p>
                            </div>
                        </div>
                        <div class="p-3 rounded-lg border border-default-200 flex flex-col justify-between" id="preview_secondary_box" style="background-color: {{ old('secondary_color', $settings['secondary_color']) }}; color: #ffffff;">
                            <span class="text-[11px] font-semibold uppercase tracking-wider opacity-80 mb-2">Sidebar / Kontras Sekunder</span>
                            <div class="flex items-center justify-between text-xs font-bold">
                                <span>Navigasi Menu</span>
                                <span class="size-2 rounded-full bg-emerald-400"></span>
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-card border border-default-200 flex flex-col justify-between">
                            <span class="text-[11px] font-semibold text-default-500 uppercase tracking-wider mb-2">Item Aktif Sidebar</span>
                            <div id="preview_active_nav" class="flex items-center gap-2 p-2 rounded-md text-xs font-bold text-white shadow-xs" style="background-color: {{ old('primary_color', $settings['primary_color']) }};">
                                <i data-lucide="layers" class="size-3.5"></i>
                                <span>Bank Soal CBT</span>
                            </div>
                        </div>
                    </div>
                </div>
            </x-cbt.card>

            <!-- Sub 2: Upload Logo & Favicon -->
            <x-cbt.card title="Logo Resmi Institusi & Favicon Browser" subtitle="Unggah aset grafis resmi lembaga dalam format transparan dan resolusi tinggi.">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        @if($settings['logo_url'])
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs text-default-500">Logo institusi aktif</span>
                                <label class="inline-flex items-center gap-1.5 text-xs text-danger font-semibold cursor-pointer">
                                    <input type="checkbox" name="remove_logo" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                    <span>Hapus Logo (Gunakan Teks Default)</span>
                                </label>
                            </div>
                        @endif
                        <x-cbt.dropzone
                            name="logo"
                            id="logo_dropzone"
                            label="Logo Resmi Institusi / Aplikasi"
                            accept="image/png,image/jpeg,image/webp,image/svg+xml"
                            maxSize="2MB"
                            :currentUrl="$settings['logo_url']"
                            hint="PNG, SVG, WEBP, atau JPG. Tampil di header portal, kartu ujian &amp; SKHU."
                        />
                    </div>

                    <div>
                        @if($settings['favicon_url'])
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs text-default-500">Favicon browser aktif</span>
                                <label class="inline-flex items-center gap-1.5 text-xs text-danger font-semibold cursor-pointer">
                                    <input type="checkbox" name="remove_favicon" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                    <span>Hapus Favicon (Gunakan Default)</span>
                                </label>
                            </div>
                        @endif
                        <x-cbt.dropzone
                            name="favicon"
                            id="favicon_dropzone"
                            label="Favicon Tab Browser"
                            accept=".ico,image/png,image/svg+xml,image/webp"
                            maxSize="1MB"
                            :currentUrl="$settings['favicon_url']"
                            hint="Minimal favicon harus 512x512 px (Format PNG, ICO, atau WEBP, Maks. 1MB)."
                        />
                        <p class="text-[11px] text-default-500 mt-2 flex items-center gap-1.5">
                            <i data-lucide="info" class="size-3.5 text-primary shrink-0"></i>
                            <span>Catatan: Minimal favicon harus <strong>512x512</strong> piksel untuk kejernihan tampilan tab browser.</span>
                        </p>
                    </div>
                </div>
            </x-cbt.card>

            <!-- Sub 3: Kustomisasi Login Portals -->
            <x-cbt.card title="Kustomisasi Halaman Masuk (Login Portals)" subtitle="Petunjuk login dan berkas gambar pemandangan latar belakang portal siswa dan portal staf.">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5 min-w-0">
                        <label for="student_login_instructions" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Petunjuk Login Peserta Ujian</label>
                        <textarea id="student_login_instructions" name="student_login_instructions" rows="3" class="form-textarea">{{ old('student_login_instructions', $settings['student_login_instructions']) }}</textarea>
                        <p class="text-xs text-default-500 mt-1">Pesan bantuan yang ditampilkan di portal siswa (ujian.tesloka.test).</p>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="staff_login_instructions" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Petunjuk Login Staf &amp; Pengawas</label>
                        <textarea id="staff_login_instructions" name="staff_login_instructions" rows="3" class="form-textarea">{{ old('staff_login_instructions', $settings['staff_login_instructions']) }}</textarea>
                        <p class="text-xs text-default-500 mt-1">Pesan bantuan yang ditampilkan di portal staf (staff.tesloka.test).</p>
                    </div>

                    <div>
                        @if($settings['student_login_bg'])
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs text-default-500">Latar portal siswa aktif</span>
                                <label class="inline-flex items-center gap-1.5 text-xs text-danger font-semibold cursor-pointer">
                                    <input type="checkbox" name="remove_student_login_bg" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                    <span>Hapus Gambar Latar</span>
                                </label>
                            </div>
                        @endif
                        <x-cbt.dropzone
                            name="student_login_bg"
                            id="student_login_bg_dropzone"
                            label="Gambar Latar Login Siswa (Opsional)"
                            accept="image/png,image/jpeg,image/webp"
                            maxSize="4MB"
                            :currentUrl="$settings['student_login_bg']"
                            hint="Gambar pemandangan kampus/institusi (Maks. 4MB)."
                        />
                    </div>

                    <div>
                        @if($settings['staff_login_bg'])
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs text-default-500">Latar portal staf aktif</span>
                                <label class="inline-flex items-center gap-1.5 text-xs text-danger font-semibold cursor-pointer">
                                    <input type="checkbox" name="remove_staff_login_bg" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                    <span>Hapus Gambar Latar</span>
                                </label>
                            </div>
                        @endif
                        <x-cbt.dropzone
                            name="staff_login_bg"
                            id="staff_login_bg_dropzone"
                            label="Gambar Latar Login Staf (Opsional)"
                            accept="image/png,image/jpeg,image/webp"
                            maxSize="4MB"
                            :currentUrl="$settings['staff_login_bg']"
                            hint="Gambar arsitektur atau simbol institusi (Maks. 4MB)."
                        />
                    </div>
                </div>
            </x-cbt.card>

            <!-- Sub 4: Opsi White-Labeling (Supporter License) -->
            <x-cbt.card title="Opsi White-Labeling &amp; Watermark Komunitas" subtitle="Pengaturan visibilitas label ekosistem TESLOKA pada footer portal ujian dan portal staf.">
                @php
                    $isSupporter = app(\App\Services\LicenseService::class)->isSupporter();
                @endphp
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-xl border {{ $isSupporter ? 'border-default-200 bg-card' : 'border-default-200 bg-default-50/70' }}">
                    <div>
                        <div class="flex items-center gap-2">
                            <h4 class="text-xs font-bold text-default-900">Sembunyikan Watermark Footer Komunitas (White-Labeling)</h4>
                            @if($isSupporter)
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800">SUPPORTER AKTIF</span>
                            @else
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-default-200 text-default-700">SUPPORTER ONLY</span>
                            @endif
                        </div>
                        <p class="text-xs text-default-500 mt-1 max-w-xl">
                            Menghilangkan label footer &quot;TESLOKA CBT Community&quot; pada portal peserta ujian, portal staf, dan halaman login, sehingga institusi Anda tampil mandiri sepenuhnya.
                        </p>
                    </div>

                    <div>
                        @if($isSupporter)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="hide_footer_branding" value="1" {{ old('hide_footer_branding', $settings['hide_footer_branding'] ?? false) ? 'checked' : '' }} class="rounded border-default-300 text-primary focus:ring-primary size-4.5">
                                <span class="text-xs font-semibold text-default-700">Sembunyikan Watermark</span>
                            </label>
                        @else
                            <a href="{{ route('staff.settings.license.index') }}" class="px-3.5 py-2 rounded-lg border border-primary text-primary hover:bg-primary hover:text-white text-xs font-bold transition shadow-xs inline-flex items-center gap-1.5">
                                <i data-lucide="shield" class="size-3.5"></i>
                                <span>Buka Supporter License</span>
                            </a>
                        @endif
                    </div>
                </div>
            </x-cbt.card>
        </div>

        <!-- ========================================== -->
        <!-- TAB 3: BLANGKO & SERTIFIKAT                -->
        <!-- ========================================== -->
        <div id="tab-pane-certificate" class="tab-pane hidden space-y-6">
            <!-- Sub 1: Desain Template Vektor Sertifikat A4 -->
            <x-cbt.card title="Desain & Warna Template Sertifikat Resmi (A4 Landscape)">
                <div class="space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-lg bg-primary-50/50 border border-primary-200/60">
                        <div class="space-y-0.5">
                            <h4 class="text-xs font-bold text-primary-950 uppercase tracking-wider flex items-center gap-1.5">
                                <i data-lucide="award" class="size-4 text-primary"></i>
                                <span>Template Vektor Dinamis Sertifikat CBT (A4 Landscape)</span>
                            </h4>
                            <p class="text-xs text-default-600">
                                Sertifikat kelulusan dirancang presisi untuk format A4 Landscape (297 x 210 mm) dengan ornamen vektor lossless, segel emas 3D, watermark institusi, dan verifikasi QR terintegrasi.
                            </p>
                        </div>
                        <a href="{{ route('staff.graduation.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-primary text-white text-xs font-semibold hover:bg-primary-600 transition shrink-0">
                            <i data-lucide="external-link" class="size-3.5"></i>
                            <span>Pratinjau Kelulusan</span>
                        </a>
                    </div>

                    <!-- Preset Palet Warna Sertifikat -->
                    <div>
                        <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-2">Preset Skema Warna Siap Pakai</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-2.5">
                            <button type="button" onclick="setCertColors('#14213d', '#c59b27')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left">
                                <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #14213d 50%, #c59b27 50%);"></span>
                                <span class="text-xs font-medium text-default-700">Royal Navy &amp; Gold</span>
                            </button>
                            <button type="button" onclick="setCertColors('#064e3b', '#d97706')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left">
                                <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #064e3b 50%, #d97706 50%);"></span>
                                <span class="text-xs font-medium text-default-700">Emerald &amp; Gold</span>
                            </button>
                            <button type="button" onclick="setCertColors('#4c0519', '#eab308')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left">
                                <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #4c0519 50%, #eab308 50%);"></span>
                                <span class="text-xs font-medium text-default-700">Burgundy Prestige</span>
                            </button>
                            <button type="button" onclick="setCertColors('#1e3a8a', '#38bdf8')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left">
                                <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #1e3a8a 50%, #38bdf8 50%);"></span>
                                <span class="text-xs font-medium text-default-700">Sapphire Modern</span>
                            </button>
                            <button type="button" onclick="setCertColors('#18181b', '#a1a1aa')" class="flex items-center gap-2 p-2 rounded-lg border border-default-200 hover:border-primary hover:bg-primary-50/30 transition text-left">
                                <span class="size-4 rounded-full border border-black/10 shrink-0" style="background: linear-gradient(135deg, #18181b 50%, #a1a1aa 50%);"></span>
                                <span class="text-xs font-medium text-default-700">Charcoal Elite</span>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-1">
                        <div class="space-y-1.5 min-w-0">
                            <label for="cert_primary_color" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Warna Utama Bingkai &amp; Judul (Hex) *</label>
                            <div class="flex items-center gap-2">
                                <input type="color" id="cert_primary_color_picker" value="{{ old('cert_primary_color', $settings['cert_primary_color']) }}" class="size-9 rounded border border-default-200 cursor-pointer p-0.5 bg-card" onchange="document.getElementById('cert_primary_color').value = this.value">
                                <input type="text" id="cert_primary_color" name="cert_primary_color" value="{{ old('cert_primary_color', $settings['cert_primary_color']) }}" required class="form-input flex-1 font-mono uppercase" oninput="document.getElementById('cert_primary_color_picker').value = this.value">
                            </div>
                            <p class="text-xs text-default-500 mt-1">Warna bingkai luar, teks institusi, dan judul sertifikat (Standar: #14213d).</p>
                        </div>

                        <div class="space-y-1.5 min-w-0">
                            <label for="cert_accent_color" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Warna Aksen Emas &amp; Ornamen (Hex) *</label>
                            <div class="flex items-center gap-2">
                                <input type="color" id="cert_accent_color_picker" value="{{ old('cert_accent_color', $settings['cert_accent_color']) }}" class="size-9 rounded border border-default-200 cursor-pointer p-0.5 bg-card" onchange="document.getElementById('cert_accent_color').value = this.value">
                                <input type="text" id="cert_accent_color" name="cert_accent_color" value="{{ old('cert_accent_color', $settings['cert_accent_color']) }}" required class="form-input flex-1 font-mono uppercase" oninput="document.getElementById('cert_accent_color_picker').value = this.value">
                            </div>
                            <p class="text-xs text-default-500 mt-1">Warna garis ganda, ornamen sudut vektor, dan segel (Standar: #c59b27).</p>
                        </div>
                    </div>

                    <!-- Teks & Redaksi Sertifikat -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-2">
                        <div class="space-y-1.5 min-w-0">
                            <label for="cert_title" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Judul Utama Sertifikat</label>
                            <input type="text" id="cert_title" name="cert_title" value="{{ old('cert_title', $settings['cert_title']) }}" class="form-input" placeholder="SERTIFIKAT KELULUSAN">
                            <p class="text-xs text-default-500 mt-1">Teks judul utama yang tampil besar di tengah sertifikat.</p>
                        </div>

                        <div class="space-y-1.5 min-w-0">
                            <label for="cert_subtitle" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Subjudul / Status Akreditasi</label>
                            <input type="text" id="cert_subtitle" name="cert_subtitle" value="{{ old('cert_subtitle', $settings['cert_subtitle']) }}" class="form-input" placeholder="CERTIFICATE OF ACHIEVEMENT">
                            <p class="text-xs text-default-500 mt-1">Teks pelengkap di bawah judul dan sebelum nomor sertifikat.</p>
                        </div>
                    </div>

                    <!-- Template Teks Narasi / Pernyataan Kelulusan -->
                    <div class="space-y-1.5 min-w-0 pt-2">
                        <div class="flex items-center justify-between">
                            <label for="cert_statement_template" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">
                                Template Teks Pernyataan Kelulusan Sertifikat
                            </label>
                            <span class="text-[11px] text-default-400">Mendukung Tag Dinamis &#123;&#123;...&#125;&#125;</span>
                        </div>
                        <textarea id="cert_statement_template" name="cert_statement_template" rows="3" class="form-textarea w-full text-xs font-normal leading-relaxed" placeholder="Atas keberhasilan menuntaskan seluruh rangkaian evaluasi terstandar pada mata pelajaran @{{mata pelajaran}} dalam ujian &quot;@{{nama ujian}}&quot; yang diselenggarakan oleh sistem TESLOKA CBT terakreditasi institusi dengan capaian:">{{ old('cert_statement_template', $settings['cert_statement_template']) }}</textarea>
                        <div class="flex flex-wrap items-center gap-1.5 text-[11px] text-default-500 mt-1">
                            <span class="font-medium text-default-600">Tag variabel tersedia (klik untuk menyisipkan):</span>
                            <button type="button" onclick="insertCertTag('@{{mata pelajaran}}')" class="px-2 py-0.5 rounded bg-default-100 hover:bg-default-200 text-default-700 font-mono text-[10px] border border-default-200 transition" title="Sisipkan Mata Pelajaran">@{{mata pelajaran}}</button>
                            <button type="button" onclick="insertCertTag('@{{nama ujian}}')" class="px-2 py-0.5 rounded bg-default-100 hover:bg-default-200 text-default-700 font-mono text-[10px] border border-default-200 transition" title="Sisipkan Nama Ujian">@{{nama ujian}}</button>
                            <button type="button" onclick="insertCertTag('@{{nama institusi}}')" class="px-2 py-0.5 rounded bg-default-100 hover:bg-default-200 text-default-700 font-mono text-[10px] border border-default-200 transition" title="Sisipkan Nama Institusi">@{{nama institusi}}</button>
                            <button type="button" onclick="insertCertTag('@{{nama siswa}}')" class="px-2 py-0.5 rounded bg-default-100 hover:bg-default-200 text-default-700 font-mono text-[10px] border border-default-200 transition" title="Sisipkan Nama Siswa">@{{nama siswa}}</button>
                            <button type="button" onclick="insertCertTag('@{{nim}}')" class="px-2 py-0.5 rounded bg-default-100 hover:bg-default-200 text-default-700 font-mono text-[10px] border border-default-200 transition" title="Sisipkan Nomor Induk / NIM">@{{nim}}</button>
                            <button type="button" onclick="insertCertTag('@{{nilai}}')" class="px-2 py-0.5 rounded bg-default-100 hover:bg-default-200 text-default-700 font-mono text-[10px] border border-default-200 transition" title="Sisipkan Nilai Akhir">@{{nilai}}</button>
                            <button type="button" onclick="insertCertTag('@{{predikat}}')" class="px-2 py-0.5 rounded bg-default-100 hover:bg-default-200 text-default-700 font-mono text-[10px] border border-default-200 transition" title="Sisipkan Predikat">@{{predikat}}</button>
                            <button type="button" onclick="insertCertTag('@{{tanggal}}')" class="px-2 py-0.5 rounded bg-default-100 hover:bg-default-200 text-default-700 font-mono text-[10px] border border-default-200 transition" title="Sisipkan Tanggal Terbit">@{{tanggal}}</button>
                        </div>
                        <p class="text-[11px] text-default-400 mt-1">Gunakan format kurung ganda seperti <code class="text-primary font-mono">@{{mata pelajaran}}</code> atau <code class="text-primary font-mono">@{{nama ujian}}</code> untuk menyisipkan data secara otomatis.</p>
                    </div>

                    <!-- Toggles & Visibilitas Elemen Grafis -->
                    <div class="pt-2">
                        <label class="block text-xs font-semibold text-default-800 uppercase tracking-wider mb-2.5">Opsi Elemen Grafis & Komponen Visual</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="flex items-center gap-2.5 p-3 rounded-lg border border-default-200 bg-card hover:bg-default-50 cursor-pointer transition">
                                <input type="checkbox" name="cert_show_logo" value="1" {{ old('cert_show_logo', $settings['cert_show_logo']) ? 'checked' : '' }} class="rounded border-default-300 text-primary focus:ring-primary size-4">
                                <span class="text-xs font-medium text-default-700">Logo Resmi di Header</span>
                            </label>
                            <label class="flex items-center gap-2.5 p-3 rounded-lg border border-default-200 bg-card hover:bg-default-50 cursor-pointer transition">
                                <input type="checkbox" name="cert_show_watermark" value="1" {{ old('cert_show_watermark', $settings['cert_show_watermark']) ? 'checked' : '' }} class="rounded border-default-300 text-primary focus:ring-primary size-4">
                                <span class="text-xs font-medium text-default-700">Watermark Logo di Tengah</span>
                            </label>
                            <label class="flex items-center gap-2.5 p-3 rounded-lg border border-default-200 bg-card hover:bg-default-50 cursor-pointer transition">
                                <input type="checkbox" name="cert_show_score" value="1" {{ old('cert_show_score', $settings['cert_show_score']) ? 'checked' : '' }} class="rounded border-default-300 text-primary focus:ring-primary size-4">
                                <span class="text-xs font-medium text-default-700">Nilai Akhir & Predikat KKM</span>
                            </label>
                            <label class="flex items-center gap-2.5 p-3 rounded-lg border border-default-200 bg-card hover:bg-default-50 cursor-pointer transition">
                                <input type="checkbox" name="cert_dual_signatures" value="1" {{ old('cert_dual_signatures', $settings['cert_dual_signatures']) ? 'checked' : '' }} class="rounded border-default-300 text-primary focus:ring-primary size-4">
                                <span class="text-xs font-medium text-default-700">Format Dua Tanda Tangan</span>
                            </label>
                        </div>
                    </div>

                    <!-- Desain Blangko Latar Belakang Sertifikat Resmi A4 Landscape -->
                    <div class="pt-4 border-t border-default-200">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                            <div>
                                <div class="flex items-center gap-2">
                                    <h5 class="text-xs font-semibold text-default-800 uppercase tracking-wider">Desain Blangko Khusus Institusi A4 Landscape</h5>
                                    @if($isSupporter)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800">SUPPORTER AKTIF</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-800">SUPPORTER ONLY</span>
                                    @endif
                                </div>
                                <p class="text-xs text-default-500 mt-0.5">Jika institusi Anda telah memiliki desain blangko siap cetak berukuran A4 Landscape dari tim desainer grafis, unggah di sini. Teks nama, nomor, nilai, dan QR verifikasi akan otomatis dicetak presisi di atas blangko tersebut.</p>
                            </div>
                            @if($isSupporter && $settings['certificate_bg'])
                                <div class="flex items-center gap-3 shrink-0">
                                    <a href="{{ $settings['certificate_bg'] }}" target="_blank" class="px-2.5 py-1 text-xs font-semibold rounded bg-default-100 hover:bg-default-200 text-default-700 transition">Lihat Blangko Aktif</a>
                                    <label class="inline-flex items-center gap-1.5 text-xs text-danger font-semibold cursor-pointer">
                                        <input type="checkbox" name="remove_certificate_bg" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                        <span>Hapus (Kembali ke Vektor Dinamis)</span>
                                    </label>
                                </div>
                            @endif
                        </div>

                        @if($isSupporter)
                            <x-cbt.dropzone
                                name="certificate_bg"
                                id="certificate_bg_dropzone"
                                label="Unggah Template Blangko Sertifikat A4"
                                accept="image/png,image/jpeg,image/webp"
                                maxSize="5MB"
                                :currentUrl="$settings['certificate_bg']"
                                hint="Format: PNG, JPG, atau WebP ukuran A4 Landscape (Maks. 5MB). Otomatis dikonversi ke WebP untuk performa rendering cetak optimal."
                            />
                        @else
                            <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-200/60 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs">
                                <div class="flex items-start gap-3">
                                    <i data-lucide="lock" class="size-5 text-amber-600 shrink-0 mt-0.5"></i>
                                    <div>
                                        <strong class="font-bold text-amber-900 block">Kustomisasi Latar Belakang Khusus untuk Supporter License</strong>
                                        <span class="text-amber-800">Institusi Anda saat ini menggunakan <strong>Desain Bingkai Resmi Bawaan</strong> yang elegan, profesional, dan presisi A4. Untuk mengunggah berkas blangko gambar kustom institusi Anda, silakan aktifkan Supporter License melalui donasi resmi.</span>
                                    </div>
                                </div>
                                <a href="{{ route('staff.settings.license.index') }}" class="px-3.5 py-2 rounded-lg bg-primary hover:bg-primary-dark text-white font-bold text-xs transition shrink-0 shadow-xs inline-flex items-center gap-1.5">
                                    <i data-lucide="shield" class="size-3.5"></i>
                                    <span>Aktifkan Lisensi</span>
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Template Blangko Kertas Surat Resmi A4 Portret (SKL, Transkrip, Daftar Hadir, Berita Acara, & Dokumen Evaluasi) -->
                    <div class="pt-4 border-t border-default-200">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                            <div>
                                <h5 class="text-xs font-semibold text-default-800 uppercase tracking-wider">Template Blangko Kertas Surat Resmi A4 Portret (SKL, Transkrip, Daftar Hadir, Berita Acara, &amp; Laporan Evaluasi)</h5>
                                <p class="text-xs text-default-500 mt-0.5">Unggah gambar blangko kertas surat resmi 1 halaman penuh A4 Portret (orientasi vertikal 210 x 297 mm, misalnya berkas <code class="font-mono text-primary">koplbb.jpg</code>). Jika diunggah, seluruh dokumen administratif dan evaluasi A4 Portret (SKL, Transkrip SKHU, Daftar Hadir Peserta, Berita Acara Pelaksanaan, Surat Tugas Pengawas, Rekapitulasi Pengawasan, dan Laporan Resmi Hasil Ujian) akan dicetak langsung di atas blangko kertas ini (1 kertas penuh sebagai latar belakang tanpa kop teks dobel). Jika kosong, sistem otomatis merender kop surat teks resmi berlogo institusi.</p>
                            </div>
                            @if($settings['doc_letterhead_image'])
                                <div class="flex items-center gap-3 shrink-0">
                                    <a href="{{ $settings['doc_letterhead_image'] }}" target="_blank" class="px-2.5 py-1 text-xs font-semibold rounded bg-default-100 hover:bg-default-200 text-default-700 transition">Lihat Blangko Aktif</a>
                                    <label class="inline-flex items-center gap-1.5 text-xs text-danger font-semibold cursor-pointer">
                                        <input type="checkbox" name="remove_doc_letterhead_image" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                        <span>Hapus (Gunakan Kop Teks Standar)</span>
                                    </label>
                                </div>
                            @endif
                        </div>

                        <x-cbt.dropzone
                            name="doc_letterhead_image"
                            id="doc_letterhead_image_dropzone"
                            label="Unggah Template Blangko Kertas Surat A4 Portret (1 Kertas Penuh)"
                            accept="image/png,image/jpeg,image/webp"
                            maxSize="5MB"
                            :currentUrl="$settings['doc_letterhead_image']"
                            hint="Format: PNG, JPG, atau WebP ukuran 1 lembar A4 Portrait penuh (Rasio 210 x 297 mm, misal 2480 x 3508 piksel). Latar belakang seluruh dokumen evaluasi dan berita acara resmi akan diisi penuh oleh gambar blangko ini."
                        />
                    </div>
                </div>
            </x-cbt.card>

            <!-- Sub 2: Pejabat Penandatangan & Tanda Tangan Digital -->
            <x-cbt.card title="Pejabat Berwenang Penandatangan & Tanda Tangan Digital">
                <div class="space-y-6">
                    <div class="p-4 rounded-lg bg-default-50 border border-default-200">
                        <p class="text-xs text-default-600">
                            Kelola data identitas pejabat penandatangan dan unggah berkas gambar tanda tangan asli bertransparan (PNG). Tanda tangan dan cap stempel yang diunggah akan otomatis ditempatkan presisi di atas nama masing-masing pejabat pada lembar Sertifikat Kelulusan, Surat Keterangan Lulus (SKL), dan Transkrip Nilai (SKHU).
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Pejabat Utama (Kanan) -->
                        <div class="space-y-4 p-4 rounded-md border border-default-200 bg-default-50/40">
                            <div class="flex items-center justify-between pb-2 border-b border-default-100">
                                <h5 class="text-xs font-bold text-default-800 uppercase tracking-wider flex items-center gap-1.5">
                                    <i data-lucide="user-check" class="size-4 text-primary"></i>
                                    <span>Pejabat Utama (Kanan)</span>
                                </h5>
                                @if($settings['cert_signer_signature'])
                                    <label class="inline-flex items-center gap-1 text-[11px] text-danger font-semibold cursor-pointer">
                                        <input type="checkbox" name="remove_cert_signer_signature" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                        <span>Hapus Tanda Tangan</span>
                                    </label>
                                @endif
                            </div>

                            <div class="space-y-1.5">
                                <label for="cert_signer_name" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nama Pejabat Utama Beserta Gelar *</label>
                                <input type="text" id="cert_signer_name" name="cert_signer_name" value="{{ old('cert_signer_name', $settings['cert_signer_name']) }}" class="form-input">
                            </div>

                            <div class="space-y-1.5">
                                <label for="cert_signer_title" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Jabatan Resmi *</label>
                                <input type="text" id="cert_signer_title" name="cert_signer_title" value="{{ old('cert_signer_title', $settings['cert_signer_title']) }}" class="form-input" placeholder="Direktur / Kepala Akademik">
                            </div>

                            <div class="space-y-1.5">
                                <label for="cert_signer_nip" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">NIP / Nomor Identitas Resmi</label>
                                <input type="text" id="cert_signer_nip" name="cert_signer_nip" value="{{ old('cert_signer_nip', $settings['cert_signer_nip']) }}" class="form-input font-mono" placeholder="19690815 199403 1 001">
                            </div>

                            <x-cbt.dropzone
                                name="cert_signer_signature"
                                id="cert_signer_signature_dropzone"
                                label="Unggah Tanda Tangan Digital Pejabat Utama"
                                accept="image/png,image/jpeg,image/webp,image/svg+xml"
                                maxSize="2MB"
                                :currentUrl="$settings['cert_signer_signature']"
                                hint="Format PNG transparan disarankan (Maks. 2MB). Tampil di atas nama pejabat."
                            />
                        </div>

                        <!-- Pejabat Kedua (Kiri) -->
                        <div class="space-y-4 p-4 rounded-md border border-default-200 bg-default-50/40">
                            <div class="flex items-center justify-between pb-2 border-b border-default-100">
                                <h5 class="text-xs font-bold text-default-800 uppercase tracking-wider flex items-center gap-1.5">
                                    <i data-lucide="users" class="size-4 text-primary"></i>
                                    <span>Pejabat Kedua / Penguji (Kiri)</span>
                                </h5>
                                @if($settings['cert_signer_secondary_signature'])
                                    <label class="inline-flex items-center gap-1 text-[11px] text-danger font-semibold cursor-pointer">
                                        <input type="checkbox" name="remove_cert_signer_secondary_signature" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                        <span>Hapus Tanda Tangan</span>
                                    </label>
                                @endif
                            </div>

                            <div class="space-y-1.5">
                                <label for="cert_signer_secondary_name" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Nama Pejabat Kedua Beserta Gelar</label>
                                <input type="text" id="cert_signer_secondary_name" name="cert_signer_secondary_name" value="{{ old('cert_signer_secondary_name', $settings['cert_signer_secondary_name']) }}" class="form-input">
                            </div>

                            <div class="space-y-1.5">
                                <label for="cert_signer_secondary_title" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Jabatan Resmi</label>
                                <input type="text" id="cert_signer_secondary_title" name="cert_signer_secondary_title" value="{{ old('cert_signer_secondary_title', $settings['cert_signer_secondary_title']) }}" class="form-input" placeholder="Ketua Tim Penguji CBT">
                            </div>

                            <div class="space-y-1.5">
                                <label for="cert_signer_secondary_nip" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">NIP / Nomor Identitas Resmi</label>
                                <input type="text" id="cert_signer_secondary_nip" name="cert_signer_secondary_nip" value="{{ old('cert_signer_secondary_nip', $settings['cert_signer_secondary_nip']) }}" class="form-input font-mono" placeholder="19780512 200312 1 002">
                            </div>

                            <x-cbt.dropzone
                                name="cert_signer_secondary_signature"
                                id="cert_signer_secondary_signature_dropzone"
                                label="Unggah Tanda Tangan Digital Pejabat Kedua"
                                accept="image/png,image/jpeg,image/webp,image/svg+xml"
                                maxSize="2MB"
                                :currentUrl="$settings['cert_signer_secondary_signature']"
                                hint="Format PNG transparan disarankan (Maks. 2MB). Tampil di atas nama pejabat."
                            />
                        </div>
                    </div>

                    <!-- Cap Stempel Resmi Institusi (Opsional) -->
                    <div class="pt-4 border-t border-default-200">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                            <div>
                                <h5 class="text-xs font-semibold text-default-800 uppercase tracking-wider">Cap / Stempel Resmi Institusi (Opsional)</h5>
                                <p class="text-xs text-default-500 mt-0.5">Unggah cap stempel resmi institusi (lingkaran/oval) bertinta biru atau merah. Akan otomatis dicetak transparan di bagian footer tengah sertifikat.</p>
                            </div>
                            @if($settings['cert_stamp'])
                                <div class="flex items-center gap-3 shrink-0">
                                    <a href="{{ $settings['cert_stamp'] }}" target="_blank" class="px-2.5 py-1 text-xs font-semibold rounded bg-default-100 hover:bg-default-200 text-default-700 transition">Lihat Stempel Aktif</a>
                                    <label class="inline-flex items-center gap-1.5 text-xs text-danger font-semibold cursor-pointer">
                                        <input type="checkbox" name="remove_cert_stamp" value="1" class="rounded border-default-300 text-danger focus:ring-danger">
                                        <span>Hapus Stempel</span>
                                    </label>
                                </div>
                            @endif
                        </div>

                        <x-cbt.dropzone
                            name="cert_stamp"
                            id="cert_stamp_dropzone"
                            label="Unggah Berkas Cap Stempel Institusi"
                            accept="image/png,image/jpeg,image/webp,image/svg+xml"
                            maxSize="2MB"
                            :currentUrl="$settings['cert_stamp']"
                            hint="Format PNG transparan sangat disarankan agar latar stempel tidak menutupi teks dokumen."
                        />
                    </div>
                </div>
            </x-cbt.card>
        </div>

        <!-- ========================================== -->
        <!-- TAB 4: SISTEM & LOKALISASI                 -->
        <!-- ========================================== -->
        <div id="tab-pane-system" class="tab-pane hidden space-y-6">
            <x-cbt.card title="Lokalisasi & Parameter Engine CBT" subtitle="Konfigurasi zona waktu server pelaksanaan, autosave interval PostgreSQL, idle session, dan format tanggal/waktu.">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5 min-w-0">
                        <label for="timezone" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Zona Waktu Server Pelaksanaan *</label>
                        <select id="timezone" name="timezone" class="form-select">
                            <option value="Asia/Jakarta" {{ old('timezone', $settings['timezone']) === 'Asia/Jakarta' ? 'selected' : '' }}>WIB - Asia/Jakarta (UTC+7)</option>
                            <option value="Asia/Makassar" {{ old('timezone', $settings['timezone']) === 'Asia/Makassar' ? 'selected' : '' }}>WITA - Asia/Makassar (UTC+8)</option>
                            <option value="Asia/Jayapura" {{ old('timezone', $settings['timezone']) === 'Asia/Jayapura' ? 'selected' : '' }}>WIT - Asia/Jayapura (UTC+9)</option>
                            <option value="UTC" {{ old('timezone', $settings['timezone']) === 'UTC' ? 'selected' : '' }}>UTC (Coordinated Universal Time)</option>
                        </select>
                        <p class="text-xs text-default-500 mt-1">Seluruh jadwal sesi dan timer pengerjaan menggunakan zona waktu ini.</p>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="autosave_interval" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Interval Autosave Jawaban (Detik) *</label>
                        <input type="number" id="autosave_interval" name="autosave_interval" min="3" max="60" value="{{ old('autosave_interval', $settings['autosave_interval']) }}" required class="form-input font-mono">
                        <p class="text-xs text-default-500 mt-1">Frekuensi penyelarasan latar belakang ke PostgreSQL (Rekomendasi: 5 detik).</p>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="idle_timeout_minutes" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Batas Waktu Idle Sesi Staf (Menit) *</label>
                        <input type="number" id="idle_timeout_minutes" name="idle_timeout_minutes" min="5" max="240" value="{{ old('idle_timeout_minutes', $settings['idle_timeout_minutes']) }}" required class="form-input font-mono">
                        <p class="text-xs text-default-500 mt-1">Otomatis meminta re-autentikasi jika staf tidak aktif.</p>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="date_format" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Format Tampilan Tanggal *</label>
                        <select id="date_format" name="date_format" class="form-select">
                            <option value="d/m/Y" {{ old('date_format', $settings['date_format']) === 'd/m/Y' ? 'selected' : '' }}>DD/MM/YYYY (24/11/2026)</option>
                            <option value="Y-m-d" {{ old('date_format', $settings['date_format']) === 'Y-m-d' ? 'selected' : '' }}>YYYY-MM-DD (2026-11-24)</option>
                            <option value="d F Y" {{ old('date_format', $settings['date_format']) === 'd F Y' ? 'selected' : '' }}>DD Bulan YYYY (24 November 2026)</option>
                        </select>
                    </div>

                    <div class="space-y-1.5 min-w-0">
                        <label for="time_format" class="block text-xs font-semibold text-default-800 uppercase tracking-wider">Format Tampilan Waktu *</label>
                        <select id="time_format" name="time_format" class="form-select">
                            <option value="H:i:s" {{ old('time_format', $settings['time_format']) === 'H:i:s' ? 'selected' : '' }}>24 Jam dengan Detik (14:30:45)</option>
                            <option value="H:i" {{ old('time_format', $settings['time_format']) === 'H:i' ? 'selected' : '' }}>24 Jam Standar (14:30)</option>
                            <option value="h:i A" {{ old('time_format', $settings['time_format']) === 'h:i A' ? 'selected' : '' }}>12 Jam AM/PM (02:30 PM)</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2 p-4 bg-default-50 border border-default-200 rounded-lg flex items-center justify-between gap-4">
                        <div>
                            <label for="allow_student_self_registration" class="text-xs font-bold text-default-800 uppercase tracking-wider block cursor-pointer">
                                Pendaftaran Mandiri Peserta Baru (SPMB / Registrasi Publik)
                            </label>
                            <p class="text-xs text-default-500 mt-0.5">
                                Jika diaktifkan, calon peserta ujian atau siswa baru dapat mendaftarkan akun secara mandiri melalui URL <code>https://ujian.tesloka.test/register</code>.
                            </p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer shrink-0">
                            <input type="checkbox" id="allow_student_self_registration" name="allow_student_self_registration" value="1" {{ old('allow_student_self_registration', $settings['allow_student_self_registration'] ?? false) ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-default-200 peer-focus:outline-hidden rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-default-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        </label>
                    </div>
                </div>
            </x-cbt.card>
        </div>

        <!-- Action Submit for Tabs 1-4 -->
        <div id="settingsSubmitBar" class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pt-4 border-t border-default-200">
            <p class="text-xs text-default-500 flex items-center gap-1.5">
                <i data-lucide="info" class="size-3.5 text-primary shrink-0"></i>
                <span>Perubahan konfigurasi pada formulir pengaturan di atas akan tersimpan ke sistem.</span>
            </p>
            <div class="flex items-center gap-2.5 shrink-0 self-end sm:self-auto">
                <x-cbt.button type="submit" variant="primary" size="md">
                    <i data-lucide="check" class="size-4"></i>
                    <span>Simpan Seluruh Pengaturan</span>
                </x-cbt.button>
            </div>
        </div>
    </form>

    <!-- ========================================== -->
    <!-- TAB 5: PEMELIHARAAN & ALAT SISTEM          -->
    <!-- ========================================== -->
    <div id="tab-pane-tools" class="tab-pane hidden space-y-6">

        <!-- 1. DIAGNOSTIK KESEHATAN & LINGKUNGAN SISTEM -->
        <x-cbt.card title="Status & Diagnostik Lingkungan Server" subtitle="Pantauan langsung status konektivitas basis data, cache memori, perizinan storage, dan ruang penyimpanan server.">
            <x-slot:actions>
                <form action="{{ route('staff.settings.tools.run-diagnostics') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-8 px-3 text-xs font-semibold inline-flex items-center gap-1.5 cursor-pointer transition rounded-md">
                        <i data-lucide="activity" class="size-3.5 text-primary"></i>
                        <span>Uji Benchmark Diagnostik</span>
                    </button>
                </form>
            </x-slot:actions>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Database Status -->
                <div class="p-3.5 rounded-lg border border-default-200 bg-default-50/50 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-semibold text-default-600 uppercase tracking-wider flex items-center gap-1.5">
                            <i data-lucide="database" class="size-3.5 text-primary"></i>
                            Basis Data
                        </span>
                        @if(($diagnostics['db_status'] ?? '') === 'online')
                            <x-cbt.badge color="success">Online</x-cbt.badge>
                        @else
                            <x-cbt.badge color="danger">Terputus</x-cbt.badge>
                        @endif
                    </div>
                    <div>
                        <div class="text-sm font-bold text-default-800">{{ $diagnostics['db_version'] ?? 'PostgreSQL' }}</div>
                        <div class="text-[11px] text-default-500 mt-0.5">Latensi kueri: <span class="font-mono font-medium text-default-700">{{ $diagnostics['db_latency'] ?? 0 }} ms</span></div>
                    </div>
                </div>

                <!-- Cache & Redis Status -->
                <div class="p-3.5 rounded-lg border border-default-200 bg-default-50/50 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-semibold text-default-600 uppercase tracking-wider flex items-center gap-1.5">
                            <i data-lucide="zap" class="size-3.5 text-primary"></i>
                            Cache &amp; Memori
                        </span>
                        @if(($diagnostics['redis_status'] ?? '') === 'online')
                            <x-cbt.badge color="success">Redis Aktif</x-cbt.badge>
                        @elseif(($diagnostics['redis_status'] ?? '') === 'disabled')
                            <x-cbt.badge color="slate">Driver Standar</x-cbt.badge>
                        @else
                            <x-cbt.badge color="warning">Nonaktif</x-cbt.badge>
                        @endif
                    </div>
                    <div>
                        <div class="text-sm font-bold text-default-800 truncate" title="{{ $diagnostics['redis_message'] ?? '' }}">
                            {{ $diagnostics['redis_message'] ?? 'Cache Driver' }}
                        </div>
                        <div class="text-[11px] text-default-500 mt-0.5">Mendukung Redis &amp; File Cache</div>
                    </div>
                </div>

                <!-- Storage & Symlink -->
                <div class="p-3.5 rounded-lg border border-default-200 bg-default-50/50 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-semibold text-default-600 uppercase tracking-wider flex items-center gap-1.5">
                            <i data-lucide="folder-check" class="size-3.5 text-primary"></i>
                            Media Storage
                        </span>
                        @if(!empty($diagnostics['storage_linked']) && !empty($diagnostics['all_dirs_writable']))
                            <x-cbt.badge color="success">Tersambung (OK)</x-cbt.badge>
                        @else
                            <x-cbt.badge color="warning">Perlu Cek</x-cbt.badge>
                        @endif
                    </div>
                    <div>
                        <div class="text-sm font-bold text-default-800">
                            {{ !empty($diagnostics['storage_linked']) ? 'public/storage Valid' : 'Tautan Putus' }}
                        </div>
                        <div class="text-[11px] text-default-500 mt-0.5">
                            {{ !empty($diagnostics['all_dirs_writable']) ? 'Seluruh direktori writable' : 'Ada direktori terkunci' }}
                        </div>
                    </div>
                </div>

                <!-- Disk Space -->
                <div class="p-3.5 rounded-lg border border-default-200 bg-default-50/50 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-semibold text-default-600 uppercase tracking-wider flex items-center gap-1.5">
                            <i data-lucide="hard-drive" class="size-3.5 text-primary"></i>
                            Ruang Disk Bebas
                        </span>
                        <x-cbt.badge color="info">Penyimpanan</x-cbt.badge>
                    </div>
                    <div>
                        <div class="text-sm font-bold text-default-800">{{ $diagnostics['disk_free'] ?? 'N/A' }} Bebas</div>
                        <div class="text-[11px] text-default-500 mt-0.5">Total Kapasitas: {{ $diagnostics['disk_total'] ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>

            <!-- Detail Spesifikasi Runtime & Mode Pemeliharaan -->
            <div class="mt-4 pt-4 border-t border-default-200 flex flex-col xl:flex-row xl:items-center justify-between gap-3 text-xs">
                <div class="flex flex-wrap items-center gap-1.5 sm:gap-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-card border border-default-200 text-default-700 shadow-xs">
                        <span class="text-default-400 font-semibold text-[11px] uppercase tracking-wider">PHP:</span>
                        <span class="font-mono font-bold text-default-800">v{{ $diagnostics['php_version'] ?? PHP_VERSION }}</span>
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-card border border-default-200 text-default-700 shadow-xs">
                        <span class="text-default-400 font-semibold text-[11px] uppercase tracking-wider">OPcache:</span>
                        <span class="font-bold {{ !empty($diagnostics['opcache_enabled']) ? 'text-success' : 'text-default-500' }}">
                            {{ !empty($diagnostics['opcache_enabled']) ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-card border border-default-200 text-default-700 shadow-xs">
                        <span class="text-default-400 font-semibold text-[11px] uppercase tracking-wider">Batas Memori:</span>
                        <span class="font-mono font-bold text-default-800">{{ $diagnostics['memory_limit'] ?? 'N/A' }}</span>
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-card border border-default-200 text-default-700 shadow-xs">
                        <span class="text-default-400 font-semibold text-[11px] uppercase tracking-wider">Ukuran Log:</span>
                        <span class="font-mono font-bold text-warning">{{ $diagnostics['log_size'] ?? '0 B' }}</span>
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-card border border-default-200 text-default-700 shadow-xs">
                        <span class="text-default-400 font-semibold text-[11px] uppercase tracking-wider">Ujian Aktif:</span>
                        <span class="font-bold text-primary">{{ $diagnostics['active_attempts_count'] ?? 0 }} Peserta</span>
                    </span>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <span class="text-xs text-default-500">Mode Pemeliharaan:</span>
                    @if(!empty($diagnostics['is_maintenance_down']))
                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-danger bg-danger/10 px-2.5 py-1 rounded-md border border-danger/20">
                            <span class="size-2 rounded-full bg-danger animate-pulse"></span>
                            Aktif (503)
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-success bg-success/10 px-2.5 py-1 rounded-md border border-success/20">
                            <span class="size-2 rounded-full bg-success"></span>
                            Sistem Normal
                        </span>
                    @endif
                    <a href="{{ route('staff.settings.maintenance.index') }}" class="text-xs text-primary hover:underline font-semibold inline-flex items-center gap-1 ml-1">
                        <span>Kelola 503</span>
                        <i data-lucide="external-link" class="size-3"></i>
                    </a>
                </div>
            </div>
        </x-cbt.card>

        <!-- 2. MANAJEMEN & PEMBERSIHAN CACHE SISTEM -->
        <x-cbt.card title="Manajemen & Pembersihan Cache" subtitle="Segarkan cache aplikasi, rute terkompilasi, template tampilan Blade, dan memori untuk memastikan perubahan sistem langsung diterapkan.">
            <!-- Tombol Utama: Bersihkan Seluruh Cache Sekaligus -->
            <div class="p-5 rounded-xl border border-primary/20 bg-primary/5 flex flex-col md:flex-row md:items-center justify-between gap-4 mb-5">
                <div class="space-y-1">
                    <div class="flex items-center gap-2 font-bold text-sm text-default-800">
                        <i data-lucide="sparkles" class="size-4 text-primary shrink-0"></i>
                        <span>Pembersihan Seluruh Cache Sistem (All-In-One Purge)</span>
                    </div>
                    <p class="text-xs text-default-600 max-w-2xl leading-relaxed">
                        Membersihkan cache data aplikasi, cache memori Redis (termasuk verifikasi sertifikat publik), cache template tampilan Blade, konfigurasi bootstrap, serta peta routing URL dalam satu tindakan cepat.
                    </p>
                </div>
                <form action="{{ route('staff.settings.cache.clear') }}" method="POST" class="shrink-0">
                    @csrf
                    <input type="hidden" name="scope" value="all">
                    <button type="submit" class="btn bg-primary text-white hover:bg-primary-hover shadow-xs h-10 px-5 text-xs font-semibold whitespace-nowrap inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 40px;">
                        <i data-lucide="trash-2" class="size-4 shrink-0"></i>
                        <span>Bersihkan Semua Cache</span>
                    </button>
                </form>
            </div>

            <!-- Opsi Pembersihan Cache Terarah -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- 1. Cache Tampilan Blade -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2 font-semibold text-xs text-default-800">
                            <i data-lucide="layout" class="size-4 text-indigo-500 shrink-0"></i>
                            <span>Cache Tampilan (Blade Views)</span>
                        </div>
                        <p class="text-xs text-default-500 leading-normal">
                            Menghapus file HTML Blade terkompilasi. Jalankan setelah mengubah desain SKL, Transkrip, atau Sertifikat.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.cache.clear') }}" method="POST">
                        @csrf
                        <input type="hidden" name="scope" value="views">
                        <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="refresh-cw" class="size-3.5 shrink-0"></i>
                            <span>Hapus Cache Tampilan</span>
                        </button>
                    </form>
                </div>

                <!-- 2. Cache Konfigurasi & Rute -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2 font-semibold text-xs text-default-800">
                            <i data-lucide="git-branch" class="size-4 text-amber-500 shrink-0"></i>
                            <span>Cache Konfigurasi &amp; Rute</span>
                        </div>
                        <p class="text-xs text-default-500 leading-normal">
                            Membersihkan cache file bootstrap konfigurasi dan rute URL agar penambahan fitur dan endpoint langsung terbaca.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.cache.clear') }}" method="POST">
                        @csrf
                        <input type="hidden" name="scope" value="config">
                        <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="refresh-cw" class="size-3.5 shrink-0"></i>
                            <span>Hapus Cache Konfigurasi</span>
                        </button>
                    </form>
                </div>

                <!-- 3. Cache Data Aplikasi & Redis -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2 font-semibold text-xs text-default-800">
                            <i data-lucide="database-zap" class="size-4 text-emerald-500 shrink-0"></i>
                            <span>Cache Data &amp; Redis</span>
                        </div>
                        <p class="text-xs text-default-500 leading-normal">
                            Mengosongkan cache query data dinamis serta cache verifikasi sertifikat tanpa menghapus kompilasi kode sistem.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.cache.clear') }}" method="POST">
                        @csrf
                        <input type="hidden" name="scope" value="application">
                        <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="trash-2" class="size-3.5 shrink-0"></i>
                            <span>Hapus Cache Data</span>
                        </button>
                    </form>
                </div>

                <!-- 4. Token Transien CBT & Heartbeat -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2 font-semibold text-xs text-default-800">
                            <i data-lucide="activity" class="size-4 text-cyan-500 shrink-0"></i>
                            <span>Transien CBT &amp; Heartbeat</span>
                        </div>
                        <p class="text-xs text-default-500 leading-normal">
                            Menyegarkan token rate-limit, gembok kueri autosave in-flight, serta cache status pengawasan peserta.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.tools.refresh-cbt-transients') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="refresh-cw" class="size-3.5 shrink-0"></i>
                            <span>Segarkan Transien CBT</span>
                        </button>
                    </form>
                </div>
            </div>
        </x-cbt.card>

        <!-- 3. ALAT PEMELIHARAAN SISTEM & BERKAS -->
        <x-cbt.card title="Alat Pemeliharaan Berkas & Utilitas Server" subtitle="Alat operasional untuk menjaga keutuhan tautan storage media, pembersihan berkas sementara, pemangkasan sesi menggantung, dan optimalisasi basis data.">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- 1. Perbaikan Tautan Storage -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-xs text-default-800 flex items-center gap-2">
                                <i data-lucide="link-2" class="size-4 text-primary shrink-0"></i>
                                Sinkronisasi Storage (storage:link)
                            </span>
                            @if(!empty($diagnostics['storage_linked']))
                                <x-cbt.badge color="success">Tersambung</x-cbt.badge>
                            @else
                                <x-cbt.badge color="danger">Terputus</x-cbt.badge>
                            @endif
                        </div>
                        <p class="text-xs text-default-500 leading-relaxed">
                            Membuat atau memulihkan tautan dari <code class="bg-default-100 px-1 py-0.5 rounded text-[11px]">public/storage</code> ke <code class="bg-default-100 px-1 py-0.5 rounded text-[11px]">storage/app/public</code> agar logo, blangko SKL, dan tanda tangan tampil bebas galat 404.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.tools.storage-link') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="refresh-cw" class="size-3.5 shrink-0"></i>
                            <span>Sinkronkan Tautan Storage</span>
                        </button>
                    </form>
                </div>

                <!-- 2. Restart Queue Workers -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-xs text-default-800 flex items-center gap-2">
                                <i data-lucide="play-circle" class="size-4 text-primary shrink-0"></i>
                                Muat Ulang Worker (queue:restart)
                            </span>
                            <x-cbt.badge color="info">Antrean</x-cbt.badge>
                        </div>
                        <p class="text-xs text-default-500 leading-relaxed">
                            Mengirim sinyal graceful reload ke worker antrean background agar memuat logika kode terbaru tanpa menggagalkan pengerjaan ujian.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.tools.queue-restart') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="refresh-cw" class="size-3.5 shrink-0"></i>
                            <span>Restart Antrean Background</span>
                        </button>
                    </form>
                </div>

                <!-- 3. Kosongkan Log Teknis -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-xs text-default-800 flex items-center gap-2">
                                <i data-lucide="file-text" class="size-4 text-warning shrink-0"></i>
                                Pembersihan Log (laravel.log)
                            </span>
                            <span class="text-xs font-mono font-semibold text-default-600 bg-default-100 px-2 py-0.5 rounded">{{ $diagnostics['log_size'] ?? '0 B' }}</span>
                        </div>
                        <p class="text-xs text-default-500 leading-relaxed">
                            Mengosongkan berkas log teknis <code class="bg-default-100 px-1 py-0.5 rounded text-[11px]">storage/logs/laravel.log</code> untuk menghemat disk. <em>Log audit bisnis di PostgreSQL tetap 100% aman.</em>
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.tools.clear-log') }}" method="POST" onsubmit="return confirm('Kosongkan berkas log teknis aplikasi?')">
                        @csrf
                        <button type="submit" class="btn border border-warning/30 bg-card text-warning-hover hover:bg-warning/10 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="trash" class="size-3.5 shrink-0"></i>
                            <span>Kosongkan Log ({{ $diagnostics['log_size'] ?? '0 B' }})</span>
                        </button>
                    </form>
                </div>

                <!-- 4. Kompilasi Optimasi Produksi -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-xs text-default-800 flex items-center gap-2">
                                <i data-lucide="cpu" class="size-4 text-success shrink-0"></i>
                                Optimasi Produksi (optimize)
                            </span>
                            <x-cbt.badge color="success">Performa</x-cbt.badge>
                        </div>
                        <p class="text-xs text-default-500 leading-relaxed">
                            Mengkombinasikan seluruh rute, event, dan konfigurasi ke dalam cache memori terkompilasi untuk mendongkrak kecepatan respon server.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.tools.optimize') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="zap" class="size-3.5 text-success shrink-0"></i>
                            <span>Jalankan Optimalisasi</span>
                        </button>
                    </form>
                </div>

                <!-- 5. Pembersihan Sesi Perangkat Kadaluwarsa (Baru) -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-xs text-default-800 flex items-center gap-2">
                                <i data-lucide="shield-check" class="size-4 text-teal-600 shrink-0"></i>
                                Pangkas Sesi Kedaluwarsa
                            </span>
                            <x-cbt.badge color="slate">Keamanan</x-cbt.badge>
                        </div>
                        <p class="text-xs text-default-500 leading-relaxed">
                            Menghapus sesi login perangkat peserta dan staf yang telah dicabut atau tidak aktif lebih dari 7 hari dari tabel database sesi perangkat.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.tools.purge-sessions') }}" method="POST" onsubmit="return confirm('Pangkas seluruh sesi perangkat yang telah dicabut / tidak aktif?')">
                        @csrf
                        <input type="hidden" name="days" value="7">
                        <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="user-x" class="size-3.5 shrink-0"></i>
                            <span>Pangkas Sesi Tidak Aktif (&gt;7 Hari)</span>
                        </button>
                    </form>
                </div>

                <!-- 6. Pembersihan Berkas Sementara (Baru) -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-xs text-default-800 flex items-center gap-2">
                                <i data-lucide="trash-2" class="size-4 text-rose-500 shrink-0"></i>
                                Pembersihan Berkas Temp
                            </span>
                            <x-cbt.badge color="slate">Penyimpanan</x-cbt.badge>
                        </div>
                        <p class="text-xs text-default-500 leading-relaxed">
                            Membersihkan berkas sementara sisa impor bank soal (Excel/CSV), pratinjau unggahan, dan berkas ekspor PDF lama yang berusia &gt;6 jam.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.tools.clean-temp-files') }}" method="POST" onsubmit="return confirm('Bersihkan seluruh berkas sementara server?')">
                        @csrf
                        <button type="submit" class="btn border border-default-200 bg-card text-default-700 hover:bg-default-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="sparkles" class="size-3.5 shrink-0"></i>
                            <span>Bersihkan Berkas Temp (&gt;6 Jam)</span>
                        </button>
                    </form>
                </div>

                <!-- 7. Optimasi & Vakum Basis Data PostgreSQL (Baru) -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3 md:col-span-2 lg:col-span-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-xs text-default-800 flex items-center gap-2">
                                <i data-lucide="database" class="size-4 text-primary shrink-0"></i>
                                Optimasi Statistik Basis Data PostgreSQL (ANALYZE)
                            </span>
                            <x-cbt.badge color="info">PostgreSQL 16</x-cbt.badge>
                        </div>
                        <p class="text-xs text-default-500 leading-relaxed">
                            Menjalankan perintah pemeliharaan <code class="bg-default-100 px-1 py-0.5 rounded text-[11px]">ANALYZE</code> secara transaksional untuk memperbarui statistik perencana kueri internal PostgreSQL, mengoptimalkan indeks tabel jawaban, riwayat submit, dan log proctoring.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.tools.optimize-database') }}" method="POST" class="pt-1">
                        @csrf
                        <button type="submit" class="btn border border-primary/30 bg-primary/5 text-primary hover:bg-primary/10 shadow-xs h-9 px-4 text-xs font-semibold inline-flex items-center gap-2 cursor-pointer transition rounded-md">
                            <i data-lucide="zap" class="size-3.5 shrink-0"></i>
                            <span>Jalankan PostgreSQL ANALYZE Sekarang</span>
                        </button>
                    </form>
                </div>
            </div>
        </x-cbt.card>

        <!-- 4. CADANGKAN & PULIHKAN PENGATURAN SISTEM (JSON BACKUP & RESTORE) -->
        <x-cbt.card title="Cadangkan & Pulihkan Pengaturan Sistem" subtitle="Amankan seluruh konfigurasi parameter, identitas institusi, dan pengaturan CBT ke berkas JSON sebelum melakukan pemeliharaan atau reset server.">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Box 1: Unduh Cadangan JSON -->
                <div class="p-4.5 rounded-xl border border-default-200 bg-card flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2.5 font-bold text-sm text-default-800">
                            <div class="size-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0">
                                <i data-lucide="download" class="size-4"></i>
                            </div>
                            <span>Unduh Cadangan Pengaturan (.JSON)</span>
                        </div>
                        <p class="text-xs text-default-600 leading-relaxed">
                            Ekspor seluruh konfigurasi profil institusi, identitas visual, parameter autosave &amp; timeout CBT, serta preferensi format tampilan ke dalam berkas cadangan JSON yang siap diarsipkan atau dipulihkan sewaktu-waktu.
                        </p>
                    </div>
                    <div class="pt-2">
                        <a href="{{ route('staff.settings.tools.export-settings') }}" class="btn bg-primary text-white hover:bg-primary-hover shadow-xs h-10 px-5 text-xs font-semibold inline-flex items-center gap-2 rounded-md transition cursor-pointer">
                            <i data-lucide="download-cloud" class="size-4 shrink-0"></i>
                            <span>Unduh Berkas Cadangan (.JSON)</span>
                        </a>
                    </div>
                </div>

                <!-- Box 2: Pulihkan Pengaturan dari JSON -->
                <div class="p-4.5 rounded-xl border border-default-200 bg-card flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2.5 font-bold text-sm text-default-800">
                            <div class="size-8 rounded-lg bg-teal-500/10 text-teal-600 flex items-center justify-center shrink-0">
                                <i data-lucide="upload" class="size-4"></i>
                            </div>
                            <span>Pulihkan Pengaturan dari Berkas Cadangan</span>
                        </div>
                        <p class="text-xs text-default-600 leading-relaxed">
                            Pilih berkas JSON hasil cadangan resmi TESLOKA CBT untuk memulihkan seluruh parameter sistem. Kredensial rahasia SMTP tetap terlindungi dan tidak akan tertimpa.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.tools.restore-settings') }}" method="POST" enctype="multipart/form-data" class="space-y-3 pt-2" onsubmit="return confirm('Pulihkan seluruh pengaturan sistem dari berkas JSON yang dipilih?')">
                        @csrf
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5">
                            <input type="file" name="settings_file" accept=".json,application/json" required 
                                   class="form-input text-xs px-3 py-1.5 border-default-200 focus:border-primary focus:ring-primary bg-card rounded-md shadow-xs h-10 w-full">
                            <button type="submit" class="btn border border-teal-500/30 bg-teal-50 text-teal-700 hover:bg-teal-100 shadow-xs h-10 px-4 text-xs font-semibold whitespace-nowrap inline-flex items-center justify-center gap-2 rounded-md transition cursor-pointer shrink-0">
                                <i data-lucide="upload-cloud" class="size-4 shrink-0"></i>
                                <span>Pulihkan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-cbt.card>

        <!-- 5. RESET PENGATURAN KE STANDAR DEFAULT -->
        <x-cbt.card title="Reset Pengaturan ke Standar Default" subtitle="Kembalikan konfigurasi sistem, identitas visual, atau template sertifikat ke pengaturan awal bawaan TESLOKA CBT.">
            <!-- Alert Informasi Keamanan -->
            <div class="p-3.5 rounded-lg border border-amber-200 bg-amber-50/60 text-xs text-amber-900 flex items-start gap-2.5 mb-5">
                <i data-lucide="info" class="size-4 text-amber-600 shrink-0 mt-0.5"></i>
                <div class="leading-relaxed">
                    <strong>Pemberitahuan Keamanan:</strong> Tindakan reset di bawah ini hanya mengembalikan nilai konfigurasi parameter ke standar bawaan institusi. Seluruh data ujian aktif, bank butir soal, riwayat kelulusan, nilai peserta, dan akun pengguna <strong>tetap aman 100% dan tidak akan dihapus</strong>.
                </div>
            </div>

            <!-- Grid 3 Opsi Reset Kategori -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <!-- 1. Reset Branding -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center gap-2 font-semibold text-xs text-default-800">
                            <i data-lucide="palette" class="size-4 text-primary shrink-0"></i>
                            <span>Reset Branding &amp; Visual</span>
                        </div>
                        <p class="text-xs text-default-500 leading-normal">
                            Mengembalikan warna primer (#2e33ff), sekunder (#14213d), nama portal, tagline, serta petunjuk teks login ke standar default bawaan sistem. Menghapus latar belakang kustom siswa &amp; staf.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.reset') }}" method="POST" onsubmit="return confirm('Kembalikan pengaturan identitas visual & branding ke standar bawaan?')">
                        @csrf
                        <input type="hidden" name="scope" value="branding">
                        <button type="submit" class="btn border border-amber-200 bg-amber-50 text-amber-700 hover:bg-amber-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="rotate-ccw" class="size-3.5 shrink-0"></i>
                            <span>Reset Branding</span>
                        </button>
                    </form>
                </div>

                <!-- 2. Reset Sertifikat & Dokumen -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center gap-2 font-semibold text-xs text-default-800">
                            <i data-lucide="award" class="size-4 text-primary shrink-0"></i>
                            <span>Reset Template Sertifikat &amp; SKL</span>
                        </div>
                        <p class="text-xs text-default-500 leading-normal">
                            Mengembalikan narasi template kelulusan resmi, warna bingkai, data penandatangan, serta <strong>MENGHAPUS blangko kop SKL/transkrip kustom, latar sertifikat kustom, tanda tangan, dan cap stempel</strong> kembali ke standar institusi.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.reset') }}" method="POST" onsubmit="return confirm('Kembalikan template sertifikat & hapus seluruh blangko kop dokumen resmi kustom ke standar bawaan?')">
                        @csrf
                        <input type="hidden" name="scope" value="certificate">
                        <button type="submit" class="btn border border-amber-200 bg-amber-50 text-amber-700 hover:bg-amber-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="rotate-ccw" class="size-3.5 shrink-0"></i>
                            <span>Reset Template &amp; Blangko</span>
                        </button>
                    </form>
                </div>

                <!-- 3. Reset CBT & Parameter -->
                <div class="p-4 rounded-lg border border-default-200 bg-card flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5">
                        <div class="flex items-center gap-2 font-semibold text-xs text-default-800">
                            <i data-lucide="sliders" class="size-4 text-primary shrink-0"></i>
                            <span>Reset Parameter Engine CBT</span>
                        </div>
                        <p class="text-xs text-default-500 leading-normal">
                            Mengembalikan interval autosave jawaban (5 detik), batas idle logout (30 menit), serta format tampilan tanggal dan jam ke standar bawaan.
                        </p>
                    </div>
                    <form action="{{ route('staff.settings.reset') }}" method="POST" onsubmit="return confirm('Kembalikan parameter engine CBT & lokalisasi ke standar bawaan?')">
                        @csrf
                        <input type="hidden" name="scope" value="cbt">
                        <button type="submit" class="btn border border-amber-200 bg-amber-50 text-amber-700 hover:bg-amber-100 shadow-xs h-9 px-3 text-xs font-semibold w-full justify-center inline-flex items-center gap-2 cursor-pointer transition rounded-md" style="height: 36px;">
                            <i data-lucide="rotate-ccw" class="size-3.5 shrink-0"></i>
                            <span>Reset Parameter CBT</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Zona Khusus: Factory Reset Pengaturan -->
            <div class="p-5 rounded-xl border border-danger/30 bg-danger/5">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <div class="space-y-1.5">
                        <div class="flex items-center gap-2 text-sm font-bold text-danger">
                            <i data-lucide="alert-triangle" class="size-4.5 text-danger shrink-0"></i>
                            <span>Reset Seluruh Pengaturan Sistem (Factory Reset)</span>
                        </div>
                        <p class="text-xs text-default-600 max-w-2xl leading-relaxed">
                            Mengembalikan seluruh entri konfigurasi sistem ke kondisi awal instalasi pabrik. <strong>Seluruh template blangko kop SKL kustom, blangko sertifikat kustom, tanda tangan pejabat, cap stempel, logo kustom, dan favicon kustom akan dihapus total.</strong> Seluruh data ujian aktif, bank soal, dan riwayat nilai peserta tetap aman 100%.
                        </p>
                    </div>

                    <form action="{{ route('staff.settings.reset') }}" method="POST" class="w-full sm:w-auto shrink-0">
                        @csrf
                        <input type="hidden" name="scope" value="all">
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 w-full sm:w-auto">
                            <input type="text" name="confirm_text" placeholder="Ketik 'RESET'" required 
                                   class="form-input text-xs font-mono font-bold tracking-widest uppercase px-3 text-center border-danger/40 focus:border-danger focus:ring-danger bg-card rounded-md shadow-xs h-10 w-full sm:w-36">
                            <button type="submit" 
                                    class="btn bg-danger text-white hover:bg-danger/90 shadow-xs px-4 text-xs font-semibold whitespace-nowrap inline-flex items-center justify-center gap-2 cursor-pointer transition rounded-md h-10 w-full sm:w-auto">
                                <i data-lucide="rotate-ccw" class="size-4 shrink-0"></i>
                                <span>Jalankan Factory Reset</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-cbt.card>

    </div>
</div>

<script>
    function switchSettingsTab(tabId) {
        // Hide all panes
        document.querySelectorAll('.tab-pane').forEach(el => el.classList.add('hidden'));

        // Reset all buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-primary', 'text-primary');
            btn.classList.add('border-transparent', 'text-default-500');
        });

        // Activate selected pane and button
        const activePane = document.getElementById('tab-pane-' + tabId);
        const activeBtn = document.getElementById('tab-btn-' + tabId);

        if (activePane) activePane.classList.remove('hidden');
        if (activeBtn) {
            activeBtn.classList.remove('border-transparent', 'text-default-500');
            activeBtn.classList.add('border-primary', 'text-primary');
        }

        // Update hidden active_tab input in form
        const activeTabInput = document.getElementById('active_tab');
        if (activeTabInput) {
            activeTabInput.value = tabId;
        }

        // Adjust visibility of submit bar for general settings
        const submitBar = document.getElementById('settingsSubmitBar');
        if (submitBar) {
            if (tabId === 'tools') {
                submitBar.classList.add('hidden');
            } else {
                submitBar.classList.remove('hidden');
            }
        }

        // Store active tab in URL hash and sessionStorage without jump
        sessionStorage.setItem('settings_active_tab', tabId);
        if (window.history.replaceState) {
            window.history.replaceState(null, null, '#' + tabId);
        } else {
            window.location.hash = tabId;
        }

        // Re-initialize Lucide icons when switching tabs
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function setBrandingColors(primary, secondary) {
        const primInput = document.getElementById('primary_color');
        const primPicker = document.getElementById('primary_color_picker');
        const secInput = document.getElementById('secondary_color');
        const secPicker = document.getElementById('secondary_color_picker');

        if (primInput) primInput.value = primary;
        if (primPicker) primPicker.value = primary;
        if (secInput) secInput.value = secondary;
        if (secPicker) secPicker.value = secondary;

        updateColorPreviews();
    }

    function updateColorPreviews() {
        const primInput = document.getElementById('primary_color');
        const secInput = document.getElementById('secondary_color');

        const primary = (primInput && primInput.value ? primInput.value.trim() : '#2e33ff');
        const secondary = (secInput && secInput.value ? secInput.value.trim() : '#14213d');

        const btn = document.getElementById('preview_primary_btn');
        if (btn) btn.style.backgroundColor = primary;

        const badge = document.getElementById('preview_primary_badge');
        if (badge) {
            badge.style.backgroundColor = primary + '20';
            badge.style.color = primary;
        }

        const text = document.getElementById('preview_primary_text');
        if (text) text.style.color = primary;

        const activeNav = document.getElementById('preview_active_nav');
        if (activeNav) activeNav.style.backgroundColor = primary;

        const secBox = document.getElementById('preview_secondary_box');
        if (secBox) secBox.style.backgroundColor = secondary;
    }

    function setCertColors(primary, accent) {
        document.getElementById('cert_primary_color').value = primary;
        document.getElementById('cert_primary_color_picker').value = primary;
        document.getElementById('cert_accent_color').value = accent;
        document.getElementById('cert_accent_color_picker').value = accent;
    }

    function insertCertTag(tag) {
        const textarea = document.getElementById('cert_statement_template');
        if (!textarea) return;
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const text = textarea.value;
        textarea.value = text.substring(0, start) + tag + text.substring(end);
        textarea.focus();
        textarea.selectionStart = textarea.selectionEnd = start + tag.length;
    }

    // Auto-restore tab from query param, hash, or sessionStorage on load
    document.addEventListener('DOMContentLoaded', function () {
        const validTabs = ['profile', 'branding', 'certificate', 'system', 'tools'];
        const urlParams = new URLSearchParams(window.location.search);
        const queryTab = urlParams.get('tab');
        const hash = window.location.hash.replace('#', '');
        const savedTab = sessionStorage.getItem('settings_active_tab');

        let targetTab = 'profile';
        if (validTabs.includes(queryTab)) {
            targetTab = queryTab;
        } else if (validTabs.includes(hash)) {
            targetTab = hash;
        } else if (validTabs.includes(savedTab)) {
            targetTab = savedTab;
        }

        switchSettingsTab(targetTab);

        updateColorPreviews();

        // Re-initialize lucide icons if needed
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>
@endsection
