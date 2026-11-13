@extends('layouts.staff')

@section('title', 'Pengaturan Server Email SMTP — TESLOKA CBT')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Pengaturan Server Email & SMTP')
@section('page-subtitle', 'Konfigurasi server SMTP transaksional dan pengujian pengiriman email sistem.')

@section('page-actions')
    <a href="{{ route('staff.settings.notification-templates.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded-md inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="w-4 h-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        <span>Template Pesan</span>
    </a>
    <a href="{{ route('staff.settings.notification-logs.index') }}" class="px-3.5 py-2 bg-white hover:bg-default-50 text-default-700 border border-default-200 text-xs font-semibold rounded-md inline-flex items-center gap-1.5 shadow-xs transition">
        <svg class="w-4 h-4 text-default-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        <span>Log Pengiriman</span>
    </a>
@endsection

@section('content')
<div class="space-y-6">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Kiri: Formulir Konfigurasi Parameter SMTP -->
        <div class="lg:col-span-2">
            <x-cbt.card title="Parameter Koneksi SMTP">
                <form id="smtpConfigForm" method="POST" action="{{ route('staff.settings.smtp.update') }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1.5 min-w-0">
                            <label for="input_host" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                                Host SMTP <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="input_host" name="host" required
                                value="{{ old('host', $smtp['host']) }}"
                                placeholder="Contoh: smtp.gmail.com atau 127.0.0.1"
                                class="form-input font-mono @error('host') border-rose-500 @enderror">
                            @error('host')
                                <p class="text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5 min-w-0">
                            <label for="input_port" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                                Port SMTP <span class="text-rose-500">*</span>
                            </label>
                            <input type="number" id="input_port" name="port" required min="1" max="65535"
                                value="{{ old('port', $smtp['port']) }}"
                                placeholder="587, 465, atau 25"
                                class="form-input font-mono @error('port') border-rose-500 @enderror">
                            @error('port')
                                <p class="text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1.5 min-w-0">
                            <label for="input_username" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                                Username SMTP
                            </label>
                            <input type="text" id="input_username" name="username"
                                value="{{ old('username', $smtp['username']) }}"
                                placeholder="Email pengguna / API Key"
                                class="form-input font-mono @error('username') border-rose-500 @enderror">
                            <span class="text-[11px] text-default-400">Kosongkan jika menggunakan server relay lokal tanpa autentikasi.</span>
                            @error('username')
                                <p class="text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5 min-w-0">
                            <label for="input_password" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                                Password SMTP
                            </label>
                            <div class="relative">
                                <input type="password" id="input_password" name="password" autocomplete="new-password"
                                    placeholder="•••••••• (Kosongkan bila tidak diubah)"
                                    class="form-input font-mono pr-10 @error('password') border-rose-500 @enderror">
                                <button type="button" onclick="togglePasswordVisibility('input_password', this)" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-default-400 hover:text-default-700">
                                    <svg class="w-4 h-4 eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <svg class="w-4 h-4 eye-closed hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                </button>
                            </div>
                            <span class="text-[11px] text-default-400">Biarkan kosong jika tetap memakai password tersimpan saat ini.</span>
                            @error('password')
                                <p class="text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1.5 min-w-0">
                            <label for="select_encryption" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                                Protokol Enkripsi
                            </label>
                            <select id="select_encryption" name="encryption" class="form-select @error('encryption') border-rose-500 @enderror">
                                <option value="tls" @selected(old('encryption', strtolower($smtp['encryption'])) === 'tls')>TLS (STARTTLS — Rekomendasi Port 587)</option>
                                <option value="ssl" @selected(old('encryption', strtolower($smtp['encryption'])) === 'ssl')>SSL (SMTPS — Port 465)</option>
                                <option value="none" @selected(old('encryption', strtolower($smtp['encryption'])) === 'none' || empty($smtp['encryption']))>None (Tanpa Enkripsi / Local Relay)</option>
                            </select>
                            @error('encryption')
                                <p class="text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-3 border-t border-default-100">
                        <div class="space-y-1.5 min-w-0">
                            <label for="input_from_address" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                                Alamat Email Pengirim (From Address) <span class="text-rose-500">*</span>
                            </label>
                            <input type="email" id="input_from_address" name="from_address" required
                                value="{{ old('from_address', $smtp['from_address']) }}"
                                placeholder="noreply@institusi.ac.id"
                                class="form-input font-mono @error('from_address') border-rose-500 @enderror">
                            <span class="text-[11px] text-default-400">Alamat email yang tercantum sebagai header pengirim keluar.</span>
                            @error('from_address')
                                <p class="text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5 min-w-0">
                            <label for="input_from_name" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">
                                Nama Pengirim (From Name) <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="input_from_name" name="from_name" required
                                value="{{ old('from_name', $smtp['from_name']) }}"
                                placeholder="TESLOKA CBT"
                                class="form-input @error('from_name') border-rose-500 @enderror">
                            <span class="text-[11px] text-default-400">Nama resmi sistem atau institusi yang tampil di inbox penerima.</span>
                            @error('from_name')
                                <p class="text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 pt-4 border-t border-default-100">
                        <div class="flex items-center gap-2 text-xs text-default-500">
                            <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            <span>Tersimpan aman di database institusi (<code>system_settings</code>).</span>
                        </div>

                        <button type="submit" id="btnSaveSmtp" class="h-10 px-5 bg-primary hover:bg-primary-hover text-white text-xs font-semibold rounded shadow-xs transition inline-flex items-center justify-center gap-2 cursor-pointer w-full sm:w-auto">
                            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Simpan Konfigurasi SMTP</span>
                        </button>
                    </div>
                </form>
            </x-cbt.card>
        </div>

        <!-- Kolom Kanan: Pengujian Langsung -->
        <div class="space-y-6">
            <x-cbt.card title="Uji Coba Pengiriman Email">
                <div class="space-y-4">
                    <p class="text-xs text-default-600 leading-relaxed">
                        Kirimkan email uji coba ke alamat Anda untuk memverifikasi apakah server SMTP institusi menerima koneksi dan dapat mengirimkan pesan keluar dengan pengaturan saat ini.
                    </p>

                    <div class="space-y-1.5">
                        <label for="testEmailInput" class="block text-xs font-semibold text-default-700 uppercase tracking-wider">Email Tujuan Uji Coba</label>
                        <input type="email" id="testEmailInput" value="{{ auth()->user()->email ?? 'admin@tesloka.test' }}" placeholder="admin@institusi.ac.id" class="form-input">
                    </div>

                    <button type="button" id="btnTestSend" onclick="executeSmtpTest()" class="w-full py-2.5 px-4 bg-primary hover:bg-primary-hover text-white font-semibold text-xs rounded shadow-xs transition flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        <span>Kirim Email Uji Coba</span>
                    </button>

                    <div id="testStatusBox" class="hidden p-3 rounded text-xs font-medium border"></div>

                    <div class="p-3 bg-default-50 border border-default-200 rounded text-[11px] text-default-600 space-y-1">
                        <div class="font-semibold text-default-700 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Tips Pengaturan:</span>
                        </div>
                        <ul class="list-disc list-inside space-y-0.5 text-default-500">
                            <li><strong>Gmail:</strong> Gunakan Host <code>smtp.gmail.com</code>, Port <code>587</code>, TLS, dan <em>App Password</em> (bukan kata sandi akun Google biasa).</li>
                            <li><strong>Mailtrap / Mailpit:</strong> Gunakan Port <code>2525</code> atau <code>1025</code> tanpa enkripsi untuk pengujian lokal.</li>
                            <li><strong>Custom Relay:</strong> Jika relay via localhost tanpa autentikasi, biarkan username & password kosong.</li>
                        </ul>
                    </div>
                </div>
            </x-cbt.card>
        </div>
    </div>
</div>

<script>
function togglePasswordVisibility(inputId, btn) {
    const input = document.getElementById(inputId);
    const eyeOpen = btn.querySelector('.eye-open');
    const eyeClosed = btn.querySelector('.eye-closed');
    if (input.type === 'password') {
        input.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
    } else {
        input.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeClosed.classList.add('hidden');
    }
}

function executeSmtpTest() {
    const email = document.getElementById('testEmailInput').value.trim();
    const btn = document.getElementById('btnTestSend');
    const box = document.getElementById('testStatusBox');

    if (!email) {
        alert('Silakan masukkan alamat email tujuan uji coba.');
        return;
    }

    btn.disabled = true;
    btn.innerHTML = '<span class="inline-flex items-center gap-1.5"><svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg> Mengirim...</span>';
    box.className = 'p-3 rounded text-xs font-medium border bg-blue-50 text-blue-800 border-blue-200 block';
    box.innerHTML = 'Menghubungkan ke server SMTP dan mengirimkan pesan...';

    fetch('{{ route('staff.settings.smtp.test') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ test_email: email })
    })
    .then(r => r.json().then(data => ({ status: r.status, body: data })))
    .then(res => {
        btn.disabled = false;
        btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg><span>Kirim Email Uji Coba</span>';
        if (res.status === 200 && res.body.success) {
            box.className = 'p-3 rounded text-xs font-medium border bg-emerald-50 text-emerald-800 border-emerald-200 block';
            box.innerHTML = '✓ ' + res.body.message;
        } else {
            box.className = 'p-3 rounded text-xs font-medium border bg-rose-50 text-rose-800 border-rose-200 block';
            box.innerHTML = '✕ ' + (res.body.message || 'Gagal mengirim email.');
        }
    })
    .catch(err => {
        btn.disabled = false;
        btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg><span>Kirim Email Uji Coba</span>';
        box.className = 'p-3 rounded text-xs font-medium border bg-rose-50 text-rose-800 border-rose-200 block';
        box.innerHTML = '✕ Terjadi kesalahan koneksi jaringan: ' + err;
    });
}
</script>
@endsection
