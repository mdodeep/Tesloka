@extends('layouts.staff')

@section('title', 'Integrasi Sistem, API & Webhook — TESLOKA CBT')
@section('page-parent', 'Tata Kelola & Keamanan')
@section('page-title', 'Integrasi Sistem, API & Webhook')
@section('page-subtitle', 'Kelola API Keys antarsistem, sinkronisasi sertifikat kelulusan, dan siaran peristiwa webhook.')

@section('page-actions')
    <button type="button" onclick="document.getElementById('createWebhookModal').classList.remove('hidden')" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200/90 rounded-lg text-xs font-semibold shadow-2xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto">
        <i data-lucide="zap" class="size-4 text-default-500"></i>
        <span>Tambah Webhook</span>
    </button>
    <button type="button" onclick="document.getElementById('createApiKeyModal').classList.remove('hidden')" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded-lg text-xs font-semibold shadow-2xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto">
        <i data-lucide="key" class="size-4"></i>
        <span>Buat API Key Baru</span>
    </button>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <!-- Metric Overview Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <x-cbt.stat-card 
            title="Total API Keys" 
            value="{{ $apiKeys->count() }}" 
            subtitle="Kunci Akses Terdaftar" 
            icon="key" 
            color="primary" />
        <x-cbt.stat-card 
            title="Kunci Aktif" 
            value="{{ $apiKeys->filter->isValid()->count() }}" 
            subtitle="Berlaku Valid" 
            icon="shield-check" 
            color="success" />
        <x-cbt.stat-card 
            title="Total Webhook" 
            value="{{ $webhooks->count() }}" 
            subtitle="Langganan Peristiwa" 
            icon="zap" 
            color="teal" />
        <x-cbt.stat-card 
            title="Webhook Aktif" 
            value="{{ $webhooks->where('is_active', true)->count() }}" 
            subtitle="Siaran Siap Kirim" 
            icon="activity" 
            color="info" />
    </div>

    @if(session('error'))
        <x-cbt.alert type="danger" :message="session('error')" />
    @endif

    {{-- Kunci Baru Dihasilkan Alert --}}
    @if(session('generated_plain_key'))
        <div class="bg-amber-50 border border-amber-300 rounded-md p-5 shadow-xs space-y-3">
            <div class="flex items-center gap-2 text-amber-900 font-bold text-sm">
                <i data-lucide="alert-triangle" class="size-5 text-amber-600 shrink-0"></i>
                <span>Salin API Key Baru Anda Segera!</span>
            </div>
            <p class="text-xs text-amber-800 leading-relaxed">
                Demi keamanan, kunci rahasia ini hanya ditampilkan <strong>satu kali</strong> dan tidak disimpan dalam bentuk teks biasa di server database.
            </p>
            <div class="flex items-center gap-2 max-w-xl">
                <input type="text" id="plainApiKeyInput" class="w-full px-4 py-2 bg-white border border-amber-300 rounded font-mono text-xs font-bold text-default-800 select-all" value="{{ session('generated_plain_key') }}" readonly>
                <button type="button" onclick="navigator.clipboard.writeText(document.getElementById('plainApiKeyInput').value); alert('API Key berhasil disalin!');" class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white rounded text-xs font-semibold shrink-0 cursor-pointer">
                    Salin Kunci
                </button>
            </div>
            <div class="text-[11px] text-amber-700">Nama Kunci: <strong>{{ session('generated_key_name') }}</strong></div>
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        {{-- Section 1: API Keys --}}
        <div class="card rounded-xl border border-default-200/90 shadow-2xs overflow-hidden bg-white flex flex-col">
            <div class="p-4 sm:px-6 border-b border-default-200/80 bg-white flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-lg bg-blue-50 text-primary flex items-center justify-center">
                        <i data-lucide="key" class="size-4"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-default-800">Kunci API Antarsistem (API Keys)</h3>
                        <p class="text-[11px] text-default-500">Kredensial akses aman untuk aplikasi eksternal</p>
                    </div>
                </div>
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">
                    {{ $apiKeys->count() }} Kunci
                </span>
            </div>

            <div class="overflow-x-auto flex-1">
                <table class="w-full min-w-[700px] divide-y divide-default-200/80 text-left text-xs" id="table-api-keys">
                    <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                        <tr>
                            <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">Nama & Prefix</th>
                            <th class="px-3 py-3 whitespace-nowrap">Cakupan (Abilities)</th>
                            <th class="px-3 py-3 whitespace-nowrap">Status / Kadaluwarsa</th>
                            <th class="px-3 py-3 whitespace-nowrap">Penggunaan Terakhir</th>
                            <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200/70">
                        @forelse($apiKeys as $key)
                            <tr class="hover:bg-default-50/80 transition">
                                <td class="ps-4 sm:ps-6 pe-3 py-3.5">
                                    <div class="font-bold text-default-800">{{ $key->name }}</div>
                                    <div class="font-mono text-[11px] text-default-400">{{ $key->prefix }}••••••••</div>
                                </td>
                                <td class="px-3 py-3.5">
                                    @if($key->abilities && in_array('*', $key->abilities))
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-slate-800 text-white">Akses Penuh (*)</span>
                                    @elseif($key->abilities)
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($key->abilities as $ab)
                                                <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-default-100 text-default-700 border border-default-200">{{ $ab }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-default-100 text-default-500">Default</span>
                                    @endif
                                </td>
                                <td class="px-3 py-3.5">
                                    @if($key->isValid())
                                        <x-cbt.badge color="success">Aktif</x-cbt.badge>
                                    @else
                                        <x-cbt.badge color="danger">Kedaluwarsa</x-cbt.badge>
                                    @endif
                                    <div class="text-[10px] text-default-400 mt-0.5">
                                        {{ $key->expires_at ? $key->expires_at->format('d M Y') : 'Tanpa Batas' }}
                                    </div>
                                </td>
                                <td class="px-3 py-3.5 text-default-500">
                                    {{ $key->last_used_at ? $key->last_used_at->diffForHumans() : 'Belum pernah' }}
                                </td>
                                <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right">
                                    <form action="{{ route('staff.integrations.api-keys.destroy', $key) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mencabut dan menghapus API Key ini? Akses aplikasi eksternal akan langsung terputus.');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg text-rose-600 hover:bg-rose-50 border border-transparent hover:border-rose-200 transition cursor-pointer" title="Cabut Kunci">
                                            <i data-lucide="trash-2" class="size-4"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center">
                                    <div class="max-w-xs mx-auto space-y-3">
                                        <div class="size-12 rounded-lg bg-blue-50 text-primary flex items-center justify-center mx-auto">
                                            <i data-lucide="key" class="size-6"></i>
                                        </div>
                                        <div class="text-xs font-bold text-default-700">Belum Ada Kunci API Dibuat</div>
                                        <p class="text-[11px] text-default-400">Buat API Key untuk menghubungkan aplikasi kelulusan eksternal secara aman.</p>
                                        <button type="button" onclick="document.getElementById('createApiKeyModal').classList.remove('hidden')" class="btn btn-sm bg-primary hover:bg-primary-hover text-white text-[11px] font-bold rounded-lg shadow-2xs transition">
                                            + Buat API Key Pertama
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Section 2: Webhook Subscriptions --}}
        <div class="card rounded-xl border border-default-200/90 shadow-2xs overflow-hidden bg-white flex flex-col">
            <div class="p-4 sm:px-6 border-b border-default-200/80 bg-white flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-lg bg-teal-50 text-[#14bba6] flex items-center justify-center">
                        <i data-lucide="zap" class="size-4"></i>
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-default-800">Langganan Webhook (Peristiwa)</h3>
                        <p class="text-[11px] text-default-500">Pengiriman event otomatis berbasis HTTPS POST</p>
                    </div>
                </div>
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-teal-50 text-teal-700 border border-teal-200">
                    {{ $webhooks->count() }} Endpoint
                </span>
            </div>

            <div class="overflow-x-auto flex-1">
                <table class="w-full min-w-[700px] divide-y divide-default-200/80 text-left text-xs" id="table-webhooks">
                    <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                        <tr>
                            <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">Nama & URL Endpoint</th>
                            <th class="px-3 py-3 whitespace-nowrap">Peristiwa</th>
                            <th class="px-3 py-3 whitespace-nowrap">Status</th>
                            <th class="px-3 py-3 whitespace-nowrap">Riwayat</th>
                            <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200/70">
                        @forelse($webhooks as $wh)
                            <tr class="hover:bg-default-50/80 transition">
                                <td class="ps-4 sm:ps-6 pe-3 py-3.5">
                                    <div class="font-bold text-default-800">{{ $wh->name }}</div>
                                    <div class="font-mono text-[10px] text-default-500 truncate max-w-[200px]" title="{{ $wh->url }}">
                                        {{ $wh->url }}
                                    </div>
                                </td>
                                <td class="px-3 py-3.5">
                                    <div class="flex flex-wrap gap-1 max-w-xs">
                                        @foreach($wh->events as $ev)
                                            <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-blue-50 text-primary border border-blue-200">{{ $ev }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-3 py-3.5">
                                    @if($wh->is_active)
                                        <x-cbt.badge color="success">Aktif</x-cbt.badge>
                                    @else
                                        <x-cbt.badge color="secondary">Nonaktif</x-cbt.badge>
                                    @endif
                                    @if($wh->failure_count > 0)
                                        <div class="text-[10px] text-rose-600 font-semibold mt-0.5">{{ $wh->failure_count }} kegagalan</div>
                                    @endif
                                </td>
                                <td class="px-3 py-3.5 text-default-500">
                                    <div>{{ $wh->last_delivery_at ? $wh->last_delivery_at->diffForHumans() : 'Belum ada' }}</div>
                                    @if($wh->last_status_code)
                                        <div class="text-[10px]">Kode: <code>{{ $wh->last_status_code }}</code></div>
                                    @endif
                                </td>
                                <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <form action="{{ route('staff.integrations.webhooks.toggle', $wh) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="p-1.5 rounded-lg text-default-500 hover:text-default-800 hover:bg-default-100 transition cursor-pointer" title="{{ $wh->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                <i data-lucide="power" class="size-4"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('staff.integrations.webhooks.destroy', $wh) }}" method="POST" onsubmit="return confirm('Hapus webhook ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg text-rose-600 hover:bg-rose-50 transition cursor-pointer" title="Hapus Webhook">
                                                <i data-lucide="trash-2" class="size-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center">
                                    <div class="max-w-xs mx-auto space-y-3">
                                        <div class="size-12 rounded-lg bg-teal-50 text-[#14bba6] flex items-center justify-center mx-auto">
                                            <i data-lucide="zap" class="size-6"></i>
                                        </div>
                                        <div class="text-xs font-bold text-default-700">Belum Ada Endpoint Webhook</div>
                                        <p class="text-[11px] text-default-400">Daftarkan endpoint HTTPS untuk menerima peristiwa kelulusan & hasil ujian otomatis.</p>
                                        <button type="button" onclick="document.getElementById('createWebhookModal').classList.remove('hidden')" class="px-3.5 py-1.5 bg-[#14bba6] hover:bg-[#0f9f8d] text-white text-[11px] font-bold rounded-lg shadow-2xs transition">
                                            + Tambah Webhook Pertama
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Section 3: Webhook Delivery History --}}
    <div class="card rounded-xl border border-default-200/90 shadow-2xs overflow-hidden bg-white">
        <div class="p-4 sm:px-6 border-b border-default-200/80 bg-white flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="w-8 h-8 rounded-lg bg-default-100 text-default-600 flex items-center justify-center">
                    <i data-lucide="clock" class="size-4"></i>
                </span>
                <div>
                    <h3 class="text-sm font-bold text-default-800">Riwayat Pengiriman Webhook Terkini</h3>
                    <p class="text-[11px] text-default-500">Audit log setiap percobaan transmisi payload HTTP</p>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] divide-y divide-default-200/80 text-left text-xs" id="table-webhook-deliveries">
                <thead class="bg-default-100 border-b border-default-200 text-xs font-semibold text-default-700">
                    <tr>
                        <th class="ps-4 sm:ps-6 pe-3 py-3 whitespace-nowrap">Waktu</th>
                        <th class="px-3 py-3 whitespace-nowrap">Pelanggan</th>
                        <th class="px-3 py-3 whitespace-nowrap">Jenis Peristiwa</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Status HTTP</th>
                        <th class="px-3 py-3 text-center whitespace-nowrap">Percobaan</th>
                        <th class="px-3 py-3 whitespace-nowrap">Pesan / Respons</th>
                        <th class="ps-3 pe-4 sm:pe-6 py-3 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-default-200/70">
                    @forelse($recentDeliveries as $deliv)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="ps-4 sm:ps-6 pe-3 py-3.5 text-default-500 font-mono text-[11px] whitespace-nowrap">{{ $deliv->created_at->format('d/m/Y H:i:s') }}</td>
                            <td class="px-3 py-3.5 font-bold text-default-800 whitespace-nowrap">{{ $deliv->subscription ? $deliv->subscription->name : 'N/A' }}</td>
                            <td class="px-3 py-3.5 font-mono text-[11px] text-primary whitespace-nowrap"><code>{{ $deliv->event_type }}</code></td>
                            <td class="px-3 py-3.5 text-center whitespace-nowrap">
                                @if($deliv->status === 'delivered')
                                    <x-cbt.badge color="success">Terkirim ({{ $deliv->response_status }})</x-cbt.badge>
                                @else
                                    <x-cbt.badge color="danger">Gagal {{ $deliv->response_status ? "({$deliv->response_status})" : '' }}</x-cbt.badge>
                                @endif
                            </td>
                            <td class="px-3 py-3.5 text-center text-default-500 whitespace-nowrap">Ke-{{ $deliv->attempt_number }}</td>
                            <td class="px-3 py-3.5 text-default-500 max-w-xs truncate" title="{{ $deliv->error_message ?: ($deliv->response_body ?: 'OK') }}">
                                {{ $deliv->error_message ?: ($deliv->response_body ?: 'OK') }}
                            </td>
                            <td class="ps-3 pe-4 sm:pe-6 py-3.5 text-right whitespace-nowrap">
                                @if($deliv->status === 'failed' && $deliv->subscription)
                                    <form action="{{ route('staff.integrations.webhooks.deliveries.retry', $deliv) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-2.5 py-1 bg-blue-50 hover:bg-blue-100 text-primary rounded-lg text-[10px] font-semibold transition cursor-pointer">
                                            Coba Ulang
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-10 text-center">
                                <div class="max-w-xs mx-auto space-y-2">
                                    <div class="size-10 rounded-lg bg-default-100 text-default-400 flex items-center justify-center mx-auto">
                                        <i data-lucide="clock" class="size-5"></i>
                                    </div>
                                    <div class="text-xs font-bold text-default-700">Belum Ada Riwayat Pengiriman Webhook</div>
                                    <p class="text-[11px] text-default-400">Pengiriman webhook akan dicatat di sini saat peristiwa ujian/kelulusan dipicu.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Section 4: Panduan Integrasi Cepat (Quick API Docs) --}}
    <div class="bg-white border border-default-200/90 rounded-xl p-5 sm:p-6 shadow-2xs space-y-4">
        <div class="flex items-center gap-2.5 text-default-900 font-bold text-sm">
            <i data-lucide="code" class="size-5 text-primary"></i>
            <span>Dokumentasi Cepat Integrasi Aplikasi Sertifikat (REST API v1)</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 text-xs">
            <div class="space-y-2">
                <div class="font-semibold text-default-700">Endpoint REST API Tersedia</div>
                <ul class="divide-y divide-slate-100 border border-default-200 rounded overflow-hidden bg-default-50/50">
                    <li class="px-3 py-2"><code>GET /api/v1/exams</code> — Daftar ujian yang dipublikasikan/selesai</li>
                    <li class="px-3 py-2"><code>GET /api/v1/exams/{id}/grades?passed=1</code> — Data kelulusan & nilai peserta</li>
                    <li class="px-3 py-2"><code>GET /api/v1/exams/{id}/grades/{student_id}</code> — Nilai spesifik peserta pada ujian</li>
                    <li class="px-3 py-2"><code>GET /api/v1/students/{nomor_peserta}/results</code> — Riwayat ujian & kelulusan siswa</li>
                </ul>
            </div>

            <div class="space-y-2">
                <div class="font-semibold text-default-700">Otentikasi Header Permintaan (cURL)</div>
                <div class="bg-slate-900 text-slate-100 p-4 rounded font-mono text-[11px] leading-relaxed overflow-x-auto">
                    curl -X GET https://tesloka.lan/api/v1/exams/1/grades \<br>
                    &nbsp;&nbsp;-H "X-API-KEY: tslk_xxxxxxxx..." \<br>
                    &nbsp;&nbsp;-H "Accept: application/json"
                </div>
                <p class="text-[11px] text-default-500">
                    Webhook menandatangani payload dengan header <code>X-TESLOKA-Signature</code> menggunakan algoritma HMAC-SHA256 berdasarkan secret endpoint.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Modal Buat API Key --}}
<div id="createApiKeyModal" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 z-50">
    <div class="card max-w-lg w-full p-4 sm:p-6 shadow-2xl max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between border-b border-default-200 pb-3 mb-4 shrink-0">
            <h3 class="text-base font-bold text-default-900">Buat API Key Baru</h3>
            <button type="button" onclick="document.getElementById('createApiKeyModal').classList.add('hidden')" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-500 rounded-md transition cursor-pointer">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <form action="{{ route('staff.integrations.api-keys.store') }}" method="POST" class="space-y-4 overflow-y-auto pr-1">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">Nama Aplikasi / Klien <span class="text-rose-500">*</span></label>
                <input type="text" name="name" class="form-input w-full text-xs h-10 rounded border-default-200 bg-white" placeholder="Contoh: Aplikasi Sertifikat Online Institusi" required>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">Masa Berlaku (Hari)</label>
                <input type="number" name="expires_days" class="form-input w-full text-xs h-10 rounded border-default-200 bg-white" placeholder="Kosongkan jika tidak ada batas kadaluwarsa" min="1" max="365">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-2">Hak Akses (Abilities)</label>
                <div class="space-y-2 text-xs">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="abilities[]" value="*" checked class="rounded text-primary focus:ring-primary">
                        <span class="font-medium text-default-800">Akses Penuh (*)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="abilities[]" value="grades.read" class="rounded text-primary focus:ring-primary">
                        <span class="text-default-600">Baca Nilai & Kelulusan (grades.read)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="abilities[]" value="exams.read" class="rounded text-primary focus:ring-primary">
                        <span class="text-default-600">Baca Data Ujian (exams.read)</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100 shrink-0">
                <button type="button" onclick="document.getElementById('createApiKeyModal').classList.add('hidden')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold cursor-pointer text-center justify-center w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs cursor-pointer text-center justify-center w-full sm:w-auto">
                    Generate API Key
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Tambah Webhook --}}
<div id="createWebhookModal" class="hidden fixed inset-0 bg-default-900/50 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 z-50">
    <div class="card max-w-lg w-full p-4 sm:p-6 shadow-2xl max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between border-b border-default-200 pb-3 mb-4 shrink-0">
            <h3 class="text-base font-bold text-default-900">Daftarkan Webhook Baru</h3>
            <button type="button" onclick="document.getElementById('createWebhookModal').classList.add('hidden')" class="btn btn-sm btn-icon bg-default-100 hover:bg-default-200 text-default-500 rounded-md transition cursor-pointer">
                <i data-lucide="x" class="size-5"></i>
            </button>
        </div>

        <form action="{{ route('staff.integrations.webhooks.store') }}" method="POST" class="space-y-4 overflow-y-auto pr-1">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">Nama Webhook <span class="text-rose-500">*</span></label>
                <input type="text" name="name" class="form-input w-full text-xs h-10 rounded border-default-200 bg-white" placeholder="Contoh: Sync Sertifikat Otomatis" required>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">URL Endpoint Penerima (HTTPS) <span class="text-rose-500">*</span></label>
                <input type="url" name="url" class="form-input w-full text-xs h-10 rounded border-default-200 bg-white" placeholder="https://sertifikat.institusi.ac.id/api/webhooks/tesloka" required>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">Kunci Rahasia HMAC (Secret)</label>
                <input type="text" name="secret" class="form-input w-full text-xs h-10 rounded border-default-200 bg-white" placeholder="Kosongkan untuk dibuatkan otomatis">
                <p class="text-[10px] text-default-400 mt-1">Digunakan untuk menandatangani header X-TESLOKA-Signature.</p>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-2">Peristiwa yang Dilanggan <span class="text-rose-500">*</span></label>
                <div class="space-y-2 text-xs">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="events[]" value="exam.graduation_published" checked class="rounded text-primary focus:ring-primary">
                        <span class="text-default-700">Hasil Kelulusan & Nilai Diterbitkan (exam.graduation_published)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="events[]" value="exam.published" class="rounded text-primary focus:ring-primary">
                        <span class="text-default-700">Ujian Baru Dipublikasikan (exam.published)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="events[]" value="exam.completed" class="rounded text-primary focus:ring-primary">
                        <span class="text-default-700">Sesi Ujian Selesai (exam.completed)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="events[]" value="grade.updated" class="rounded text-primary focus:ring-primary">
                        <span class="text-default-700">Penilaian Ulang (Regrade Checkpoint)</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100 shrink-0">
                <button type="button" onclick="document.getElementById('createWebhookModal').classList.add('hidden')" class="btn btn-sm bg-default-100 hover:bg-default-200 text-default-700 font-semibold cursor-pointer text-center justify-center w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white font-semibold shadow-xs cursor-pointer text-center justify-center w-full sm:w-auto">
                    Daftarkan Webhook
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

