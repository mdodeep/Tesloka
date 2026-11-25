# Panduan Lengkap LiveKit Cloud, WebRTC SFU, & Monitoring Real-Time TESLOKA

Dokumen ini menjelaskan pilihan mode pengawasan kamera peserta di **TESLOKA CBT**, perbandingan **LiveKit Cloud (Gratis vs Berbayar)** dengan **Self-Host Docker**, kalkulasi kebutuhan **VPS**, serta langkah instalasi dan pemecahan masalah secara menyeluruh.

---

## 1. Apakah Harus Memakai LiveKit atau Sewa VPS Lagi?

**Jawaban singkatnya: TIDAK WAJIB.** TESLOKA dirancang bertingkat agar dapat berjalan mulai dari server kecil berbiaya hemat hingga skala ratusan peserta dengan video kamera live serentak. Pilih mode sesuai jumlah peserta dan anggaran institusi Anda:

| Mode | Biaya Tambahan | Perlu Sewa VPS Lagi? | Kapasitas Serentak | Tampilan di Layar Pengawas | Kapan Memilih Mode Ini? |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Mode 0: Snapshot Berkala + Near-Live Zoom** *(Bawaan)* | **Rp 0** (Gratis bawaan) | **Tidak** | **100 - 500+ siswa** di 1 VPS utama | Grid foto tiap **30 detik** (`15-120d`), namun saat pengawas klik **Zoom View** otomatis refresh tiap **3 detik** (`2-15d`) + snapshot insiden | **Paling disarankan untuk mayoritas sekolah/kampus.** Hemat RAM, hemat CPU, aman di WiFi lab yang terbatas |
| **Mode 1: LiveKit Cloud (Build Plan)** | **Rp 0 / Gratis** (`5.000` participant-minutes/bln) | **Tidak** | Maks. `100` koneksi serentak, kuota `5.000` menit/bln | **Video WebRTC bergerak 10-15 FPS** (`LIVE VIDEO WEBRTC`) di grid & Zoom HD | **Uji coba, demo, atau ujian khusus skala kecil** (misal 15-30 siswa) tanpa perlu setting Docker & firewall |
| **Mode 2: Self-Host LiveKit di VPS Utama** | **Rp 0** (Open-source Apache 2.0) | **Tidak** *(gabung 1 VPS)* | Maks. **30 - 50 peserta** kamera live (`240p`/`360p`) | **Video WebRTC bergerak 10-15 FPS** tanpa batas menit bulanan | Jika institusi hanya punya 1 VPS kuat (min. **4 vCPU, 8-16 GB RAM**) dan peserta ujian kamera live tidak lebih dari 1-2 ruang |
| **Mode 3: Self-Host LiveKit di VPS Media Terpisah** | Biaya 1 VPS Media (~2-4 vCPU, 4-8 GB RAM) | **Ya** *(VPS khusus LiveKit)* | **50 - 300+ peserta** video serentak | **Video WebRTC bergerak 10-15 FPS** stabil tanpa mengganggu autosave DB | **Wajib untuk > 50 peserta video live serentak.** Jauh lebih murah daripada paket LiveKit Cloud berbayar (`$50+/bln`) untuk ujian rutin |

> [!TIP]
> **Kombinasi Paling Efisien untuk Harian:** Aktifkan **Laravel Reverb WebSocket** di VPS utama CBT (cukup tambah RAM ~150-300 MB, tidak perlu VPS baru) agar status peserta, tab blur, **Force Stop**, **Force Logout**, dan **Near-Live Zoom 3 detik** berjalan instan dalam hitungan sub-detik, tanpa menyalakan video streaming terus-menerus kecuali benar-benar diperlukan.

---

## 2. Penjelasan Lengkap LiveKit Cloud: Paket Gratis, Kuota, & Kalkulator Kapasitas

LiveKit menyediakan layanan cloud terkelola di [https://cloud.livekit.io](https://cloud.livekit.io) sehingga institusi tidak perlu menyewa VPS media, mengelola Docker, atau membuka port UDP firewall secara manual.

### A. Paket Gratis LiveKit Cloud (`Build` Plan - `$0/bulan`)
Berdasarkan dokumentasi resmi paket LiveKit Cloud:
- **Biaya:** `$0/bulan` (gratis, tanpa kewajiban kartu kredit di awal).
- **WebRTC Participant Minutes:** **`5.000 menit/bulan`**.
- **Downstream Bandwidth:** **`50 GB/bulan`**. (Traffic upload dari browser siswa ke LiveKit tidak dihitung sebagai biaya downstream; yang dihitung ke kuota `50 GB` adalah stream video yang ditonton/di-subscribe oleh pengawas pada halaman `Grid Kamera`).
- **Concurrent Connections:** Maksimal **`100` koneksi WebRTC serentak**.
- **Hard Cap Protection:** Pada paket `Build`, kuota berhenti otomatis saat limit tercapai sehingga **tidak ada tagihan mendadak**. Saat kuota LiveKit habis atau koneksi ditolak, **TESLOKA otomatis beralih kembali ke mode Snapshot Berkala + Near-Live Zoom** sehingga ujian siswa tidak pernah terputus.

### B. Paket Berbayar LiveKit Cloud
Jika kuota gratis `5.000 menit/bulan` tidak mencukupi:
- **Ship Plan:** Mulai **`$50/bulan`** (menyertakan kuota jauh lebih besar dan dukungan pemakaian skala komersial dengan perhitungan kelebihan pemakaian/overage).
- **Scale Plan:** Mulai **`$500/bulan`** untuk skala besar / SLA khusus.

> [!IMPORTANT]
> Jika institusi menyelenggarakan ujian berskala ratusan siswa setiap bulan dengan kamera video live 10-15 FPS, biaya **LiveKit Cloud berbayar (`$50+` / ~Rp800rb+ per bulan + overage)** akan jauh lebih mahal daripada menyewa **1 VPS Linux terpisah di Jakarta/Singapore (`2-4 vCPU, 4-8 GB RAM`)** yang menjalankan LiveKit Open-Source via Docker tanpa batas menit.

### C. Kalkulator & Simulasi Kuota `5.000` Participant-Minutes
Rumus perhitungan pemakaian menit LiveKit Cloud per sesi ujian:

$$\text{Total Menit} = (\text{Jumlah Siswa Kamera Aktif} + \text{Jumlah Pengawas Membuka Grid}) \times \text{Durasi Ujian (menit)}$$

Tabel simulasi pemakaian nyata paket gratis `5.000 menit/bulan`:

| Skenario Ujian | Jumlah Siswa + Pengawas | Durasi Sesi | Total Pemakaian per Sesi | Cukup untuk Berapa Sesi per Bulan (Paket Gratis `5.000` Mnt)? | Rekomendasi |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Uji Coba / Demo Kecil** | 5 siswa + 1 pengawas | 30 menit | `180 menit` | **~27 sesi/bulan** | **LiveKit Cloud Gratis** sangat cukup |
| **Sidang / Kelas Khusus** | 15 siswa + 1 pengawas | 60 menit | `960 menit` | **~5 sesi/bulan** | **LiveKit Cloud Gratis** cukup |
| **1 Kelas Standar** | 30 siswa + 1 pengawas | 60 menit | `1.860 menit` | **~2 sesi/bulan** | Cukup 2x ujian/bln di **LiveKit Cloud Gratis** |
| **2 Kelas Paralel** | 60 siswa + 2 pengawas | 90 menit | `5.580 menit` | **Melebihi batas 1x pakai!** | **Self-Host VPS Terpisah** atau gunakan Mode 0 (Snapshot + Near-Live Zoom) |
| **Ujian Serentak Kampus** | 200 siswa + 6 pengawas | 90 menit | `18.540 menit` | Tidak muat di paket gratis | **Wajib Self-Host VPS Media Terpisah** atau gunakan Mode 0 (Snapshot + Near-Live Zoom) |

---

## 3. Tutorial Opsi A: Menghubungkan LiveKit Cloud Gratis (5 Menit Siap Pakai)

Gunakan langkah berikut untuk mencoba live video WebRTC tanpa memasang server tambahan:

### Langkah 1: Daftar, Buat Project, & Ambil Kredensial di LiveKit Cloud
1. Buka [https://cloud.livekit.io](https://cloud.livekit.io) lalu buat akun gratis (otomatis masuk paket **Build** `$0/month`).
2. Buat **Project** baru (misal: `Tesloka`). Jika pada dashboard muncul `PROJECT DATA REGION: United States` (atau pilihan wilayah lain), biarkan saja tidak masalah karena jaringan media WebRTC LiveKit menggunakan *global mesh* yang tetap merutekan kamera lewat server terdekat peserta.
3. Pada dashboard proyek LiveKit Cloud (`Overview`), ambil kredensial dengan salah satu dari dua cara berikut:
   - **Cara Tercepat (Langsung di Overview):** Klik kotak kartu **`Manage API keys`** (terletak di baris pertama kolom tengah pada halaman **Overview**).
   - **Cara Lewat Sidebar Kiri:** Klik menu **`Settings >`** di pojok kiri bawah daftar menu utama, lalu pilih sub-menu **API keys** / **Keys** (atau **Project** untuk melihat URL WebSocket proyek).
4. Di halaman **API keys**, klik tombol **Add new key** (atau **Create key**), beri deskripsi (misal `tesloka-cbt`), lalu salin **tiga nilai penting** berikut *(Catatan: **API Secret hanya ditampilkan 1 kali saat key baru dibuat**; jika Anda lupa menyalin secret key lama, cukup buat key baru lewat **Add new key**)*:
   - **WebSocket URL (`LIVEKIT_URL`):** contoh format `wss://tesloka-xxxxxx.livekit.cloud` (juga tampil di bagian atas / menu **Settings** proyek).
   - **API Key (`LIVEKIT_API_KEY`):** contoh format `APIxxxxxxxxxxxx`.
   - **API Secret (`LIVEKIT_API_SECRET`):** string acak panjang yang muncul sekali saat pembuatan key.

### Langkah 2: Konfigurasi di Portal Staf TESLOKA
1. Login ke Portal Staf sebagai **Administrator** (`https://staff.domainanda.sch.id`).
2. Buka menu **Pengaturan Sistem** (`/staff/settings/general`), lalu klik tab **4. Sistem & Lokalisasi**.
3. Gulir ke panel **Monitoring Real-Time (Reverb WebSocket) & Kamera Live Video (LiveKit SFU)**:
   - Centang saklar **Aktifkan Streaming Live Video WebRTC (LiveKit SFU)**.
   - Isi **URL Server WebSocket LiveKit** dengan `wss://nama-project-anda.livekit.cloud`.
   - Pilih **Resolusi Streaming Video Peserta**:
     - `240p Hemat Bandwidth (~150 kbps / peserta)` -> disarankan untuk > 20 peserta agar koneksi pengawas lancar.
     - `360p Standar Seimbang (~250 kbps / peserta)` -> disarankan untuk <= 20 peserta.
     - `480p Resolusi Tinggi (~450 kbps / peserta)` -> khusus jumlah sedikit / LAN cepat.
   - Isi **LiveKit API Key** dan **LiveKit API Secret** (disimpan terenkripsi di database).
   - Opsional: centang **Wajibkan Uji Kamera Lulus Sebelum Tombol Mulai Ujian** agar tombol `Mulai Mengerjakan Ujian` pada halaman Petunjuk siswa terkunci sampai izin kamera aktif.
4. Klik tombol **Simpan Seluruh Pengaturan** di bagian bawah halaman.
5. Klik tombol **Uji Koneksi LiveKit** dan pastikan muncul notifikasi hijau bahwa server LiveKit merespons (HTTP < 500, misal `HTTP 200`).

### Langkah 3: Verifikasi Pengawasan pada Sesi Ujian
1. Pastikan pada pengaturan ujian target, toggle **Pengawasan Kamera Peserta (Webcam Proctoring)** dalam keadaan aktif.
2. Minta 1 akun siswa uji coba membuka ujian:
   - Pada halaman **Petunjuk & Verifikasi**, uji panel **Uji Kamera Pengawas** melalui tombol **Uji & Izinkan Kamera**.
   - Setelah masuk lembar ujian, badge kamera di bilah kanan siswa akan berubah dari `Snapshot Aktif` menjadi **`Live Video Aktif` (`WebRTC Streaming Aktif`)**.
3. Buka portal pengawas pada halaman `/staff/sessions/{id}/camera-grid`:
   - Tile siswa otomatis menampilkan badge hijau **`LIVE VIDEO`** dan memutar stream video secara langsung (`VideoQuality.LOW` untuk menghemat CPU/bandwidth grid).
   - Klik tile siswa untuk membuka **Modal Zoom Kamera & Telemetri Peserta**: LiveKit otomatis menaikkan kualitas video khusus siswa tersebut menjadi **HIGH** (`VideoQuality.HIGH`), menampilkan badge **`LIVE VIDEO WEBRTC`**, sekaligus tetap menyediakan tombol **Simpan Bukti Foto (Snapshot)** kapan pun dibutuhkan.

---

## 4. Tutorial Opsi B: Self-Host LiveKit Server Open-Source dengan Docker

Untuk ujian rutin berskala 50 sampai 300+ peserta live video tanpa biaya per-menit, jalankan **LiveKit Server Open-Source** menggunakan templat siap pakai di direktori `deploy/` repositori TESLOKA.

### Prasyarat Server (VPS Media Khusus LiveKit)
- **Kapasitas VPS Media yang Disarankan:**
  - Hingga ~50-80 peserta (`240p`): **2 vCPU, 4 GB RAM**, Ubuntu 22.04/24.04 LTS, bandwidth unmetered/besar, lokasi **Jakarta atau Singapore**.
  - Hingga ~150-300 peserta (`240p`): **4 vCPU, 8 GB RAM** dengan network throughput >= 1 Gbps.
- **IP Publik IPv4 Statis:** WebRTC membutuhkan IP publik langsung agar ICE candidate UDP tidak gagal terhubung.
- **Subdomain DNS:** Arahkan A-Record (misal `livekit.domainanda.sch.id`) ke IP VPS Media (nonaktifkan proxy CDN seperti awan oranye Cloudflare pada subdomain WebRTC agar port UDP media tidak terhalang).

### Langkah 1: Pasang Docker & Salin Konfigurasi LiveKit
Login ke SSH VPS Media sebagai `root`, lalu pasang Docker Engine & siapkan direktori konfigurasi:

```bash
# 1. Pasang Docker resmi pada Ubuntu/Debian
curl -fsSL https://get.docker.com | sudo sh

# 2. Buat folder konfigurasi LiveKit
sudo mkdir -p /opt/tesloka-livekit
cd /opt/tesloka-livekit
```

Salin isi [`deploy/docker-compose.livekit.yml`](docker-compose.livekit.yml) dan [`deploy/livekit.yaml`](livekit.yaml) dari repositori TESLOKA ke `/opt/tesloka-livekit/`:

**1. Generate API Secret acak yang kuat (minimal 32 karakter):**
```bash
openssl rand -hex 24
```

**2. Sesuaikan `/opt/tesloka-livekit/livekit.yaml`:**
```yaml
port: 7880
bind_addresses:
  - ""

rtc:
  tcp_port: 7881
  port_range_start: 50000
  port_range_end: 50200
  use_external_ip: true

# Ganti kunci di bawah dengan key & secret hasil 'openssl rand -hex 24'.
# Jangan gunakan secret bawaan contoh di produksi!
keys:
  APITESLOKALIVEKITKEY: GANTI_DENGAN_SECRET_ACAK_MINIMAL_32_KARAKTER

logging:
  level: info
  pion_level: error

room:
  auto_create: true
  empty_timeout: 300
  max_participants: 120
```

**3. Isi `/opt/tesloka-livekit/docker-compose.livekit.yml`:**
```yaml
services:
  livekit:
    image: livekit/livekit-server:latest
    container_name: tesloka-livekit-sfu
    restart: unless-stopped
    network_mode: host
    volumes:
      - ./livekit.yaml:/etc/livekit.yaml:ro
    command: --config /etc/livekit.yaml
```

> [!WARNING]
> **Jangan pernah** menggunakan nilai secret contoh (`GANTI_DENGAN_SECRET_ACAK_MINIMAL_32_KARAKTER`) di server produksi dan **jangan gabung** layanan LiveKit dengan server database PostgreSQL utama bila jumlah peserta kamera live di atas 50 orang.

### Langkah 2: Buka Port Firewall VPS & Security Group Cloud
LiveKit memerlukan port signaling dan rentang port UDP untuk lalu lintas media WebRTC:

| Protokol | Port | Arah | Fungsi | Wajib? |
| :--- | :--- | :--- | :--- | :--- |
| **TCP** | `80`, `443` | Inbound | HTTPS / WSS Reverse Proxy & Sertifikat SSL Let's Encrypt | **Ya** |
| **TCP** | `7880` | Localhost / Proxy | HTTP & WebSocket Signaling internal LiveKit *(jangan buka publik langsung jika sudah diproxy port 443)* | Internal |
| **TCP** | `7881` | Inbound | WebRTC ICE over TCP *(jalur cadangan saat WiFi sekolah memblokir UDP)* | **Ya** |
| **UDP** | `50000-50200` | Inbound | Lalu lintas utama paket video WebRTC | **Ya** |

Jika memakai UFW di Ubuntu (serta pastikan **Security Group / Firewall Panel Cloud Provider** seperti AWS/GCP/Alibaba/Biznet/IDCloudHost juga mengizinkan port yang sama):
```bash
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw allow 7881/tcp
sudo ufw allow 50000:50200/udp
sudo ufw reload
```

### Langkah 3: Jalankan Container & Pasang Reverse Proxy WSS (HTTPS)
1. Nyalakan LiveKit Server via Docker Compose:
   ```bash
   cd /opt/tesloka-livekit
   docker compose -f docker-compose.livekit.yml up -d
   docker logs -f tesloka-livekit-sfu
   ```
   Pastikan muncul log bahwa server mendengarkan port `7880` dan RTC IP publik berhasil terdeteksi.
2. Buat Virtual Host di Nginx (atau di aaPanel: **Website -> Add site** untuk `livekit.domainanda.sch.id`, aktifkan **SSL Let's Encrypt**), lalu tambahkan konfigurasi Reverse Proxy WebSocket:
   ```nginx
   server {
       listen 443 ssl http2;
       server_name livekit.domainanda.sch.id;

       # Lokasi sertifikat Let's Encrypt / aaPanel
       ssl_certificate     /etc/letsencrypt/live/livekit.domainanda.sch.id/fullchain.pem;
       ssl_certificate_key /etc/letsencrypt/live/livekit.domainanda.sch.id/privkey.pem;

       location / {
           proxy_pass http://127.0.0.1:7880;
           proxy_http_version 1.1;
           proxy_set_header Upgrade $http_upgrade;
           proxy_set_header Connection "Upgrade";
           proxy_set_header Host $host;
           proxy_set_header X-Real-IP $remote_addr;
           proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
           proxy_set_header X-Forwarded-Proto $scheme;
           proxy_read_timeout 86400s;
       }
   }
   ```
3. Uji dari server utama CBT atau browser bahwa `https://livekit.domainanda.sch.id` aktif, lalu masukkan `wss://livekit.domainanda.sch.id`, `API Key`, dan `API Secret` ke **Pengaturan Sistem -> 4. Sistem & Lokalisasi -> Monitoring Real-Time & LiveKit SFU**, klik **Simpan Seluruh Pengaturan**, lalu klik **Uji Koneksi LiveKit**.

### Langkah 4: Catatan Penting untuk Jaringan WiFi Kampus / Sekolah Ketat (NAT / Firewall)
Jika komputer siswa berada di balik firewall kampus yang memblokir hampir seluruh port UDP keluar:
- Pastikan port **`7881/tcp`** terbuka di VPS LiveKit agar WebRTC tetap bisa fallback ke **ICE/TCP**.
- Bila firewall sekolah memblokir seluruh port selain `80` dan `443`, gunakan fitur **TURN Server on TLS (Port 443)** (misalnya melalui sub-konfigurasi `turn:` di `livekit.yaml` pada subdomain kedua seperti `turn.domainanda.sch.id`) atau gunakan **LiveKit Cloud** yang sudah menyertakan TURN global terkelola di port `443`.

---

## 5. Integrasi WebSocket Real-Time (Laravel Reverb) di VPS Utama

Berbeda dengan video kamera LiveKit, **Laravel Reverb** tidak mengalirkan media berat, melainkan menyiarkan pesan event JSON sub-detik (perubahan status online, pelanggaran tab blur, **Force Stop**, **Force Logout**, **Near-Live Zoom**, dan **Siarkan Pengumuman**).

1. **Tidak butuh VPS baru:** Jalankan di VPS utama CBT bersamaan dengan Nginx, PostgreSQL, dan Redis (tambahan RAM ~150-300 MB).
2. **Konfigurasi ringkas `.env` dan aaPanel:** Ikuti [Panduan Deployment aaPanel (`INSTALL-AAPANEL.md`)](INSTALL-AAPANEL.md#langkah-tambahan-2-websocket-real-time-laravel-reverb--kamera-live-video-livekit-sfu) untuk mengaktifkan `BROADCAST_CONNECTION=reverb`, systemd daemon `tesloka-reverb` (`php artisan reverb:start --host=127.0.0.1 --port=8080`), dan blok `location /app` di Nginx.
3. **Verifikasi Otomatis:** Buka tab **Monitoring Real-Time & LiveKit SFU** di **Pengaturan Sistem** atau menu **Kesehatan Sistem** (`/staff/system/health`) dan pastikan lencana status menunjukkan **`Reverb Live Aktif`**. Jika daemon Reverb dimatikan sewaktu-waktu, sistem otomatis jatuh aman ke **Auto-Sync Polling (5 detik)** tanpa mengganggu ujian siswa.

---

## 6. Desain Keamanan Token & Simulasi Kebutuhan Bandwidth

### A. Isolasi Token JWT Per Peran (`LiveKitTokenService`)
Setiap akses ruang video LiveKit dikontrol oleh JWT bertanda tangan **HMAC-SHA256** (`HS256`) yang dibangkitkan backend TESLOKA:
- **Token Siswa (`POST /ujian/attempts/{id}/livekit-token`):**
  - Identitas unik `student-{id}-attempt-{attemptId}`, hanya berlaku selama sisa waktu ujian + 15 menit.
  - Hak akses: **`canPublish: true, canSubscribe: false, canPublishData: false`**. Siswa hanya mengirim videonya ke pengawas dan **tidak pernah bisa melihat atau mengintip video peserta lain**.
- **Token Pengawas (`POST /staff/sessions/{id}/livekit-token`):**
  - Identitas `proctor-{staffId}` dengan status **`hidden: true`**.
  - Hak akses: **`canPublish: false, canSubscribe: true`**. Pengawas tidak mengirim video apa pun dan dapat memantau seluruh grid peserta tanpa terdeteksi di daftar partisipan sisi siswa.

### B. Simulasi Kebutuhan Bandwidth Sisi Pengawas
TESLOKA mengaktifkan **Simulcast + Adaptive Stream**:
- Di tampilan grid multi-tile (`Grid Kamera Live`), sistem memaksa resolusi rendah (`VideoQuality.LOW`, sekitar ~100-150 kbps per tile). Untuk **30 peserta serentak**, komputer pengawas hanya mengunduh sekitar **~3 s.d. 4,5 Mbps**.
- Saat pengawas mengeklik 1 tile untuk **Zoom View**, sistem sementara menaikkan kualitas video khusus peserta tersebut ke **`VideoQuality.HIGH`** dan menurunkannya kembali ke `LOW` begitu modal Zoom ditutup.
- Pastikan ruangan pengawas memiliki koneksi internet minimal **10 Mbps download stabil** apabila memantau 30 kamera video LiveKit sekaligus.

---

## 7. Pemecahan Masalah (Troubleshooting)

| Gejala / Kendala | Penyebab Umum | Langkah Solusi |
| :--- | :--- | :--- |
| **Kamera gagal aktif di peramban siswa (`Kamera Mati` / `Tidak Didukung`)** | Portal `ujian.*` masih diakses lewat HTTP non-TLS (`http://`) atau izin kamera diblokir peramban | Browser modern mewajibkan **HTTPS** untuk API `getUserMedia` (kecuali `localhost`). Pastikan SSL Let's Encrypt aktif pada domain `ujian.*` dan peserta mengeklik **Allow / Izinkan** saat popup kamera muncul. |
| **Tombol "Uji Koneksi LiveKit" gagal (`Gagal terhubung...` / HTTP >= 500)** | URL tidak diawali `wss://`, subdomain belum mengarah ke IP VPS LiveKit, port `7880` belum berjalan, atau header WebSocket Nginx kurang | Pastikan container `tesloka-livekit-sfu` berjalan (`docker ps`), Nginx meneruskan header `Upgrade` dan `Connection "Upgrade"`, serta URL memakai format `wss://...`. |
| **Status LiveKit terhubung namun tile video tetap hitam / kembali ke Snapshot** | Port **UDP `50000-50200`** atau **TCP `7881`** tertutup di UFW atau Security Group cloud provider | Buka port `50000:50200/udp` dan `7881/tcp` pada UFW Linux **dan** Firewall/Security Group panel cloud VPS. |
| **Token LiveKit ditolak (`Invalid Token / Expired`)** | Jam sistem VPS CBT utama berbeda jauh (> 30 detik) dengan jam server LiveKit atau `API Key/Secret` tidak cocok | Sinkronkan waktu NTP di VPS CBT dengan `sudo timedatectl set-ntp true` lalu periksa ulang kecocokan `keys:` di `livekit.yaml` dan Pengaturan Sistem TESLOKA. |
| **Badge di Monitoring menunjukkan `Mode HTTP Polling (null)` atau `Reverb Menunggu Daemon`** | Nilai `.env` `BROADCAST_CONNECTION` masih `log`/`null` atau daemon `tesloka-reverb` belum menyala | Setel `BROADCAST_CONNECTION=reverb` di `.env`, jalankan `php artisan config:clear`, dan aktifkan service `tesloka-reverb`. Cek status melalui `/staff/system/health`. |
| **Koneksi siswa ke LiveKit terputus mendadak di tengah ujian** | Koneksi WiFi siswa terputus sementara atau kuota gratis LiveKit Cloud habis di tengah bulan | **Tenang, ujian tidak terhenti.** Browser siswa otomatis turun ke mode **Snapshot Cadangan**, jawaban tetap tersimpan ke PostgreSQL via autosave HTTP, dan pengawas tetap dapat mengawasi via Snapshot + Near-Live Zoom. |
