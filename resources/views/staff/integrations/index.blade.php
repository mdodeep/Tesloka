@extends('layouts.staff')

@section('title', 'Integrasi Sistem, API & Webhook — TESLOKA CBT')
@section('page-parent', 'Tata Kelola & Keamanan')
@section('page-title', 'Integrasi Sistem, API & Webhook')
@section('page-subtitle', 'Kelola API Keys antarsistem, sinkronisasi sertifikat kelulusan, dan siaran peristiwa webhook.')

@section('page-actions')
    <button type="button" onclick="document.getElementById('createWebhookModal').classList.remove('hidden')" class="btn btn-sm bg-white hover:bg-default-50 text-default-700 border border-default-200 rounded text-xs font-semibold shadow-xs transition inline-flex items-center justify-center gap-2 cursor-pointer w-full sm:w-auto">
        <svg class="w-4 h-4 text-default-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        <span>Tambah Webhook</span>
    </button>
    <button type="button" onclick="document.getElementById('createApiKeyModal').classList.remove('hidden')" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs transition inline-flex items-center justify-center gap-2 cursor-pointer w-full sm:w-auto">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
        <span>Buat API Key Baru</span>
    </button>
@endsection

@section('content')
<div class="space-y-6 w-full">

    @if(session('error'))
        <x-cbt.alert type="danger" :message="session('error')" />
    @endif

    {{-- Kunci Baru Dihasilkan Alert --}}
    @if(session('generated_plain_key'))
        <div class="bg-amber-50 border border-amber-300 rounded-md p-5 shadow-xs space-y-3">
            <div class="flex items-center gap-2 text-amber-900 font-bold text-sm">
                <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
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
        <div class="bg-white border border-default-200 rounded-md shadow-xs overflow-hidden flex flex-col">
            <div class="p-5 border-b border-default-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded bg-blue-50 text-primary flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
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
                <table class="w-full min-w-[700px] text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-default-50 border-b border-default-200 text-default-600 font-semibold uppercase tracking-wider text-[11px]">
                            <th class="py-3 px-4 whitespace-nowrap">Nama & Prefix</th>
                            <th class="py-3 px-4 whitespace-nowrap">Cakupan (Abilities)</th>
                            <th class="py-3 px-4 whitespace-nowrap">Status / Kadaluwarsa</th>
                            <th class="py-3 px-4 whitespace-nowrap">Penggunaan Terakhir</th>
                            <th class="py-3 px-4 text-right whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($apiKeys as $key)
                            <tr class="hover:bg-default-50/80 transition">
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-default-800">{{ $key->name }}</div>
                                    <div class="font-mono text-[11px] text-default-400">{{ $key->prefix }}••••••••</div>
                                </td>
                                <td class="py-3.5 px-4">
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
                                <td class="py-3.5 px-4">
                                    @if($key->isValid())
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">Aktif</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-200">Kadaluwarsa</span>
                                    @endif
                                    <div class="text-[10px] text-default-400 mt-0.5">
                                        {{ $key->expires_at ? $key->expires_at->format('d M Y') : 'Tanpa Batas' }}
                                    </div>
                                </td>
                                <td class="py-3.5 px-4 text-default-500">
                                    {{ $key->last_used_at ? $key->last_used_at->diffForHumans() : 'Belum pernah' }}
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <form action="{{ route('staff.integrations.api-keys.destroy', $key) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mencabut dan menghapus API Key ini? Akses aplikasi eksternal akan langsung terputus.');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg text-rose-600 hover:bg-rose-50 border border-transparent hover:border-rose-200 transition cursor-pointer" title="Cabut Kunci">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center">
                                    <div class="max-w-xs mx-auto space-y-3">
                                        <div class="size-12 rounded-md bg-blue-50 text-primary flex items-center justify-center mx-auto">
                                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                                        </div>
                                        <div class="text-xs font-bold text-default-700">Belum Ada Kunci API Dibuat</div>
                                        <p class="text-[11px] text-default-400">Buat API Key untuk menghubungkan aplikasi kelulusan eksternal secara aman.</p>
                                        <button type="button" onclick="document.getElementById('createApiKeyModal').classList.remove('hidden')" class="px-3.5 py-1.5 bg-primary hover:bg-primary-hover text-white text-[11px] font-bold rounded shadow-xs transition">
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
        <div class="bg-white border border-default-200 rounded-md shadow-xs overflow-hidden flex flex-col">
            <div class="p-5 border-b border-default-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded bg-teal-50 text-[#14bba6] flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
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
                <table class="w-full min-w-[700px] text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-default-50 border-b border-default-200 text-default-600 font-semibold uppercase tracking-wider text-[11px]">
                            <th class="py-3 px-4 whitespace-nowrap">Nama & URL Endpoint</th>
                            <th class="py-3 px-4 whitespace-nowrap">Peristiwa</th>
                            <th class="py-3 px-4 whitespace-nowrap">Status</th>
                            <th class="py-3 px-4 whitespace-nowrap">Riwayat</th>
                            <th class="py-3 px-4 text-right whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($webhooks as $wh)
                            <tr class="hover:bg-default-50/80 transition">
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-default-800">{{ $wh->name }}</div>
                                    <div class="font-mono text-[10px] text-default-500 truncate max-w-[200px]" title="{{ $wh->url }}">
                                        {{ $wh->url }}
                                    </div>
                                </td>
                                <td class="py-3.5 px-4">
                                    <div class="flex flex-wrap gap-1 max-w-xs">
                                        @foreach($wh->events as $ev)
                                            <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-blue-50 text-primary border border-blue-200">{{ $ev }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="py-3.5 px-4">
                                    @if($wh->is_active)
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">Aktif</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-default-100 text-default-500">Nonaktif</span>
                                    @endif
                                    @if($wh->failure_count > 0)
                                        <div class="text-[10px] text-rose-600 font-semibold mt-0.5">{{ $wh->failure_count }} kegagalan</div>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 text-default-500">
                                    <div>{{ $wh->last_delivery_at ? $wh->last_delivery_at->diffForHumans() : 'Belum ada' }}</div>
                                    @if($wh->last_status_code)
                                        <div class="text-[10px]">Kode: <code>{{ $wh->last_status_code }}</code></div>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <form action="{{ route('staff.integrations.webhooks.toggle', $wh) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="p-1.5 rounded-lg text-default-500 hover:text-default-800 hover:bg-default-100 transition cursor-pointer" title="{{ $wh->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('staff.integrations.webhooks.destroy', $wh) }}" method="POST" onsubmit="return confirm('Hapus webhook ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg text-rose-600 hover:bg-rose-50 transition cursor-pointer" title="Hapus Webhook">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center">
                                    <div class="max-w-xs mx-auto space-y-3">
                                        <div class="size-12 rounded-md bg-teal-50 text-[#14bba6] flex items-center justify-center mx-auto">
                                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        </div>
                                        <div class="text-xs font-bold text-default-700">Belum Ada Endpoint Webhook</div>
                                        <p class="text-[11px] text-default-400">Daftarkan endpoint HTTPS untuk menerima peristiwa kelulusan & hasil ujian otomatis.</p>
                                        <button type="button" onclick="document.getElementById('createWebhookModal').classList.remove('hidden')" class="px-3.5 py-1.5 bg-[#14bba6] hover:bg-[#0f9f8d] text-white text-[11px] font-bold rounded shadow-xs transition">
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
    <div class="bg-white border border-default-200 rounded-md shadow-xs overflow-hidden">
        <div class="p-5 border-b border-default-100 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="w-8 h-8 rounded bg-default-100 text-default-600 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </span>
                <div>
                    <h3 class="text-sm font-bold text-default-800">Riwayat Pengiriman Webhook Terkini</h3>
                    <p class="text-[11px] text-default-500">Audit log setiap percobaan transmisi payload HTTP</p>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto -mx-3.5 sm:mx-0">
            <table class="w-full min-w-[760px] text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-default-50 border-b border-default-200 text-default-600 font-semibold uppercase tracking-wider text-[11px]">
                        <th class="py-3 px-4 whitespace-nowrap">Waktu</th>
                        <th class="py-3 px-4 whitespace-nowrap">Pelanggan</th>
                        <th class="py-3 px-4 whitespace-nowrap">Jenis Peristiwa</th>
                        <th class="py-3 px-4 text-center whitespace-nowrap">Status HTTP</th>
                        <th class="py-3 px-4 text-center whitespace-nowrap">Percobaan</th>
                        <th class="py-3 px-4 whitespace-nowrap">Pesan / Respons</th>
                        <th class="py-3 px-4 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($recentDeliveries as $deliv)
                        <tr class="hover:bg-default-50/80 transition">
                            <td class="py-3.5 px-4 text-default-500 font-mono text-[11px]">{{ $deliv->created_at->format('d/m/Y H:i:s') }}</td>
                            <td class="py-3.5 px-4 font-bold text-default-800">{{ $deliv->subscription ? $deliv->subscription->name : 'N/A' }}</td>
                            <td class="py-3.5 px-4 font-mono text-[11px] text-primary"><code>{{ $deliv->event_type }}</code></td>
                            <td class="py-3.5 px-4 text-center">
                                @if($deliv->status === 'delivered')
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">Terkirim ({{ $deliv->response_status }})</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-200">Gagal {{ $deliv->response_status ? "({$deliv->response_status})" : '' }}</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-center text-default-500">Ke-{{ $deliv->attempt_number }}</td>
                            <td class="py-3.5 px-4 text-default-500 max-w-xs truncate" title="{{ $deliv->error_message ?: ($deliv->response_body ?: 'OK') }}">
                                {{ $deliv->error_message ?: ($deliv->response_body ?: 'OK') }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
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
                                    <div class="size-10 rounded bg-default-100 text-default-400 flex items-center justify-center mx-auto">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
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
    <div class="bg-white border border-default-200 rounded-md p-6 shadow-xs space-y-4">
        <div class="flex items-center gap-2.5 text-default-900 font-bold text-sm">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
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
<div id="createApiKeyModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 z-50">
    <div class="bg-white rounded-md max-w-lg w-full p-4 sm:p-6 shadow-xl max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between border-b border-default-100 pb-3 mb-4 shrink-0">
            <h3 class="text-base font-bold text-default-900">Buat API Key Baru</h3>
            <button type="button" onclick="document.getElementById('createApiKeyModal').classList.add('hidden')" class="text-default-400 hover:text-default-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <form action="{{ route('staff.integrations.api-keys.store') }}" method="POST" class="space-y-4 overflow-y-auto pr-1">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">Nama Aplikasi / Klien <span class="text-rose-500">*</span></label>
                <input type="text" name="name" class="w-full px-3 py-2 border border-default-200 rounded text-xs focus:ring-2 focus:ring-primary/20 focus:outline-none" placeholder="Contoh: Aplikasi Sertifikat Online Institusi" required>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">Masa Berlaku (Hari)</label>
                <input type="number" name="expires_days" class="w-full px-3 py-2 border border-default-200 rounded text-xs focus:ring-2 focus:ring-primary/20 focus:outline-none" placeholder="Kosongkan jika tidak ada batas kadaluwarsa" min="1" max="365">
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-2">Hak Akses (Abilities)</label>
                <div class="space-y-2 text-xs">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="abilities[]" value="*" checked class="rounded text-primary">
                        <span class="font-medium text-default-800">Akses Penuh (*)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="abilities[]" value="grades.read" class="rounded text-primary">
                        <span class="text-default-600">Baca Nilai & Kelulusan (grades.read)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="abilities[]" value="exams.read" class="rounded text-primary">
                        <span class="text-default-600">Baca Data Ujian (exams.read)</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100 shrink-0">
                <button type="button" onclick="document.getElementById('createApiKeyModal').classList.add('hidden')" class="btn btn-sm border border-default-200 rounded text-xs font-semibold text-default-600 hover:bg-default-50 cursor-pointer text-center justify-center w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs cursor-pointer text-center justify-center w-full sm:w-auto">
                    Generate API Key
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Tambah Webhook --}}
<div id="createWebhookModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4 z-50">
    <div class="bg-white rounded-md max-w-lg w-full p-4 sm:p-6 shadow-xl max-h-[90vh] flex flex-col">
        <div class="flex items-center justify-between border-b border-default-100 pb-3 mb-4 shrink-0">
            <h3 class="text-base font-bold text-default-900">Daftarkan Webhook Baru</h3>
            <button type="button" onclick="document.getElementById('createWebhookModal').classList.add('hidden')" class="text-default-400 hover:text-default-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <form action="{{ route('staff.integrations.webhooks.store') }}" method="POST" class="space-y-4 overflow-y-auto pr-1">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">Nama Webhook <span class="text-rose-500">*</span></label>
                <input type="text" name="name" class="w-full px-3 py-2 border border-default-200 rounded text-xs focus:ring-2 focus:ring-primary/20 focus:outline-none" placeholder="Contoh: Sync Sertifikat Otomatis" required>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">URL Endpoint Penerima (HTTPS) <span class="text-rose-500">*</span></label>
                <input type="url" name="url" class="w-full px-3 py-2 border border-default-200 rounded text-xs focus:ring-2 focus:ring-primary/20 focus:outline-none" placeholder="https://sertifikat.institusi.ac.id/api/webhooks/tesloka" required>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-1">Kunci Rahasia HMAC (Secret)</label>
                <input type="text" name="secret" class="w-full px-3 py-2 border border-default-200 rounded text-xs focus:ring-2 focus:ring-primary/20 focus:outline-none" placeholder="Kosongkan untuk dibuatkan otomatis">
                <p class="text-[10px] text-default-400 mt-1">Digunakan untuk menandatangani header X-TESLOKA-Signature.</p>
            </div>
            <div>
                <label class="block text-xs font-semibold text-default-700 mb-2">Peristiwa yang Dilanggan <span class="text-rose-500">*</span></label>
                <div class="space-y-2 text-xs">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="events[]" value="exam.graduation_published" checked class="rounded text-primary">
                        <span class="text-default-700">Hasil Kelulusan & Nilai Diterbitkan (exam.graduation_published)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="events[]" value="exam.published" class="rounded text-primary">
                        <span class="text-default-700">Ujian Baru Dipublikasikan (exam.published)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="events[]" value="exam.completed" class="rounded text-primary">
                        <span class="text-default-700">Sesi Ujian Selesai (exam.completed)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="events[]" value="grade.updated" class="rounded text-primary">
                        <span class="text-default-700">Penilaian Ulang (Regrade Checkpoint)</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end gap-2 pt-3 border-t border-default-100 shrink-0">
                <button type="button" onclick="document.getElementById('createWebhookModal').classList.add('hidden')" class="btn btn-sm border border-default-200 rounded text-xs font-semibold text-default-600 hover:bg-default-50 cursor-pointer text-center justify-center w-full sm:w-auto">
                    Batal
                </button>
                <button type="submit" class="btn btn-sm bg-primary hover:bg-primary-hover text-white rounded text-xs font-semibold shadow-xs cursor-pointer text-center justify-center w-full sm:w-auto">
                    Daftarkan Webhook
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

