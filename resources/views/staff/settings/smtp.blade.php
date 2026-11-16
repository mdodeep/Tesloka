@extends('layouts.staff')

@section('title', 'Pengaturan Server Email SMTP — TESLOKA CBT')
@section('page-parent', 'Tata Kelola')
@section('page-title', 'Pengaturan Server Email & SMTP')
@section('page-subtitle', 'Konfigurasi server SMTP transaksional dan pengujian pengiriman email sistem.')

@section('page-actions')
    <a href="{{ route('staff.settings.notification-templates.index') }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="mail" class="size-4 text-default-500"></i>
        <span>Template Pesan</span>
    </a>
    <a href="{{ route('staff.settings.notification-logs.index') }}" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 font-semibold inline-flex items-center gap-1.5 shadow-2xs transition">
        <i data-lucide="file-text" class="size-4 text-default-500"></i>
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
                                <button type="button" onclick="togglePasswordVisibility('input_password', this)" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-default-400 hover:text-default-700 cursor-pointer">
                                    <span class="eye-open"><i data-lucide="eye" class="size-4"></i></span>
                                    <span class="eye-closed hidden"><i data-lucide="eye-off" class="size-4"></i></span>
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
                            <div class="mt-1.5 p-2.5 bg-amber-50/90 border border-amber-200 rounded text-[11px] text-amber-800 flex items-start gap-2">
                                <i data-lucide="info" class="size-4 text-amber-600 shrink-0 mt-0.5"></i>
                                <span><strong>Penting untuk cPanel / Domain Khusus:</strong> Alamat pengirim wajib sama dengan <em>Username SMTP</em> (misal: <code>ujian@lbbptiq.id</code>). Jika berbeda, mail server akan menolak dengan error 550.</span>
                            </div>
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
                            <i data-lucide="shield-check" class="size-4 text-emerald-500 shrink-0"></i>
                            <span>Tersimpan aman di database institusi (<code>system_settings</code>).</span>
                        </div>

                        <button type="submit" id="btnSaveSmtp" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold inline-flex items-center justify-center gap-2 cursor-pointer w-full sm:w-auto shadow-2xs">
                            <i data-lucide="save" class="size-4 shrink-0"></i>
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

                    <button type="button" id="btnTestSend" onclick="executeSmtpTest()" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold flex items-center justify-center gap-2 cursor-pointer w-full shadow-2xs">
                        <i data-lucide="send" class="size-4"></i>
                        <span>Kirim Email Uji Coba</span>
                    </button>

                    <div id="testStatusBox" class="hidden p-3 rounded text-xs font-medium border"></div>

                    <div class="p-3 bg-default-50 border border-default-200 rounded text-[11px] text-default-600 space-y-1">
                        <div class="font-semibold text-default-700 flex items-center gap-1.5">
                            <i data-lucide="info" class="size-3.5 text-primary"></i>
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

document.addEventListener('DOMContentLoaded', function() {
    const userInput = document.getElementById('input_username');
    const fromInput = document.getElementById('input_from_address');
    if (userInput && fromInput) {
        userInput.addEventListener('input', function() {
            const val = this.value.trim();
            if (val.includes('@') && (!fromInput.value || fromInput.value.includes('@example.com') || fromInput.value.includes('@tesloka.test'))) {
                fromInput.value = val;
            }
        });
    }
});

function executeSmtpTest() {
    const email = document.getElementById('testEmailInput').value.trim();
    const btn = document.getElementById('btnTestSend');
    const box = document.getElementById('testStatusBox');

    if (!email) {
        alert('Silakan masukkan alamat email tujuan uji coba.');
        return;
    }

    const host = document.getElementById('input_host')?.value.trim();
    const port = document.getElementById('input_port')?.value.trim();
    const username = document.getElementById('input_username')?.value.trim();
    const password = document.getElementById('input_password')?.value;
    const encryption = document.getElementById('select_encryption')?.value;
    const from_address = document.getElementById('input_from_address')?.value.trim();
    const from_name = document.getElementById('input_from_name')?.value.trim();

    btn.disabled = true;
    btn.innerHTML = '<span class="inline-flex items-center gap-1.5"><div class="inline-block border-2 rounded-full size-4 animate-spin border-s-transparent border-white"></div> Menguji...</span>';
    box.className = 'p-3 rounded text-xs font-medium border bg-blue-50 text-blue-800 border-blue-200 block';
    box.innerHTML = 'Menghubungkan ke server SMTP dan mengirimkan pesan...';

    const payload = {
        test_email: email,
        host: host || undefined,
        port: port || undefined,
        username: username !== undefined ? username : undefined,
        password: password ? password : undefined,
        encryption: encryption || undefined,
        from_address: from_address || undefined,
        from_name: from_name || undefined
    };

    fetch('{{ route('staff.settings.smtp.test') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(payload)
    })
    .then(r => r.json().then(data => ({ status: r.status, body: data })))
    .then(res => {
        btn.disabled = false;
        btn.innerHTML = '<i data-lucide="send" class="size-4"></i><span>Kirim Email Uji Coba</span>';
        if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
        if (res.status === 200 && res.body.success) {
            box.className = 'p-3 rounded text-xs font-medium border bg-emerald-50 text-emerald-800 border-emerald-200 block';
            box.innerHTML = res.body.message;
        } else {
            box.className = 'p-3 rounded text-xs font-medium border bg-rose-50 text-rose-800 border-rose-200 block';
            box.innerHTML = res.body.message || 'Gagal mengirim email.';
        }
    })
    .catch(err => {
        btn.disabled = false;
        btn.innerHTML = '<i data-lucide="send" class="size-4"></i><span>Kirim Email Uji Coba</span>';
        if (window.lucide && window.lucide.createIcons) window.lucide.createIcons();
        box.className = 'p-3 rounded text-xs font-medium border bg-rose-50 text-rose-800 border-rose-200 block';
        box.innerHTML = 'Terjadi kesalahan koneksi jaringan: ' + err;
    });
}
</script>
@endsection
