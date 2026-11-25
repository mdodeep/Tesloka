# Panduan Pemasangan & Deploy TESLOKA CBT di aaPanel

Panduan ini ditulis khusus agar mudah diikuti oleh operator maupun pengelola IT sekolah, madrasah, pesantren, maupun perguruan tinggi. Anda tidak perlu menghafal ratusan perintah Linux yang rumit karena TESLOKA kini mendukung **Zero-Vendor Web Bootstrapper**: Anda cukup mengunggah file kode ke aaPanel, mengatur folder `public`, lalu membuka `https://domainanda.sch.id/install` di browser.

> [!NOTE]
> Untuk pengaturan performa agar server tidak lambat atau mati kehabisan RAM (*Out of Memory / OOM*), lanjutkan membaca panduan khusus multi-spesifikasi pada [OPTIMISASI-SERVER.md](OPTIMISASI-SERVER.md).

---

## Ringkasan Alur Pemasangan (5 Langkah Besar)

1. **Siapkan VPS & Swap Memory:** Mencegah server crash saat memasang dependensi.
2. **Pasang Paket Dasar di aaPanel:** Nginx, PHP 8.3/8.4/8.5, PostgreSQL 16+, dan Redis 7+.
3. **Buat Website & Database di aaPanel:** Arahkan Web Root ke folder `/public` dan atur URL Rewrite Laravel.
4. **Unggah File Proyek & Atur Pemilik (`www:www`):** Pastikan folder `vendor/` atau `.env` tidak perlu dibuat manual.
5. **Buka `/install` di Browser:** Bootstrapper Web otomatis memperbarui Composer (`self-update`), memasang `vendor/`, membuat `.env` dan `APP_KEY`, lalu membuka Wizard 6 Langkah TESLOKA.

---

## Langkah 1: Persiapan VPS Sebelum Memasang Aplikasi

Masuk ke server VPS melalui SSH (atau menu **Terminal** di aaPanel), lalu jalankan dua langkah penting berikut:

### 1.1 Buat Virtual Memory (Swap File)
Swap berfungsi sebagai "memori cadangan" di disk agar proses `composer install` dan ujian serentak tidak membuat server mati mendadak (terutama pada VPS 1 GB atau 2 GB RAM).

```bash
# Cek apakah swap sudah aktif
swapon --show

# Jika belum ada, buat Swap 2 GB (gunakan 4G jika disk VPS >= 50 GB)
sudo fallocate -l 2G /swapfile
sudo chmod 600 /swapfile
sudo mkswap /swapfile
sudo swapon /swapfile
echo '/swapfile none swap sw 0 0' | sudo tee -a /etc/fstab
sudo sysctl vm.swappiness=15
```

### 1.2 Pasang aaPanel (Jika VPS Masih Kosong)
```bash
URL=https://www.aapanel.com/script/install_7.0_en.sh
if [ -f /usr/bin/curl ]; then curl -ksSO "$URL"; else wget --no-check-certificate -O install_7.0_en.sh "$URL"; fi
sudo bash install_7.0_en.sh aapanel
```

---

## Langkah 2: Pasang Paket Server di App Store aaPanel

Buka menu **App Store** pada panel aaPanel, lalu pasang keempat layanan ini (gunakan metode **Fast** / RPM agar cepat selesai):

| Layanan | Versi Disarankan | Pengaturan Wajib di aaPanel |
|:---|:---|:---|
| **Nginx** | `1.24+` atau `1.26` | Biarkan pengaturan standar saat pasang. |
| **PHP** | `8.5` (atau `8.3` / `8.4`) | Buka **Settings -> Install Extensions**, lalu pasang: **`fileinfo`**, **`pgsql`**, **`pdo_pgsql`**, **`redis`**, **`opcache`**, **`exif`**, **`intl`**, **`bcmath`**, dan **`zip`**. |
| **PostgreSQL Manager** | `16` atau `17` | Buka app-nya lalu buat **Database** baru (misal `tesloka`) beserta **Username** dan **Password**. |
| **Redis** | `7.x` | Buka **Settings -> Performance Tuning**, pastikan `maxmemory-policy` bernilai `allkeys-lru`. |

### Pengaturan `Disable functions` PHP (Penting untuk `/install` Web)
Buka **App Store -> PHP 8.5 -> Settings -> Disable functions**:
- Pastikan fungsi **`exec`** **TIDAK** ada di daftar blokir (hapus `exec` jika ada) agar Web Bootstrapper `/install` dapat menjalankan `composer self-update` dan `composer install` otomatis dari browser.
- Jika institusi mewajibkan `exec` tetap diblokir demi kebijakan keamanan host, tidak masalah: halaman `/install` akan otomatis mendeteksinya dan menyediakan **1 baris perintah terminal** yang tinggal disalin-tempel ke SSH.

---

## Langkah 3: Buat Website & Atur Folder `/public` di aaPanel

1. Buka menu **Website -> Add Site**.
2. Isi nama domain utama (misalnya `staff.domainanda.sch.id`). Pada kolom **Domain**, Anda bisa langsung menambahkan ketiga domain ekosistem jika memakai arsitektur satu folder:
   - `staff.domainanda.sch.id`
   - `ujian.domainanda.sch.id`
   - `sertifikat.domainanda.sch.id`
3. Pada **PHP Version**, pilih **PHP 8.5** (atau 8.3/8.4).
4. Setelah website terbuat, klik nama domainnya untuk membuka pengaturan site:
   - **Site Directory -> Running Directory:** Ubah dari `/` menjadi **`/public`**, lalu klik **Save**. (Wajib agar tidak muncul error 403/404 dan menjaga keamanan file `.env`!).
   - **URL Rewrite:** Pilih preset **`laravel5`** dari dropdown (atau tempel konfigurasi berikut), lalu klik **Save**:
     ```nginx
     location / {
         try_files $uri $uri/ /index.php?$query_string;
     }
     ```
   - **SSL (HTTPS):** Buka tab **SSL -> Let's Encrypt**, centang seluruh domain, lalu klik **Apply** dan aktifkan **Force HTTPS**.
   - **Anti-Timeout Composer Install (Opsional disarankan):** Pada tab **Config** site Nginx, pastikan `fastcgi_read_timeout` cukup leluasa (misalnya `300;` di dalam blok PHP atau `nginx.conf`) agar pemasangan vendor dari browser tidak terputus di tengah jalan pada koneksi lambat.

---

## Langkah 4: Unggah Kode TESLOKA & Atur Izin Pemilik File

1. Masuk ke menu **Files** di aaPanel menuju direktori site Anda (misal `/www/wwwroot/domainanda.sch.id`).
2. Hapus file bawaan (`index.html`, `404.html`). Jangan hapus folder `.well-known` jika SSL Let's Encrypt memakainya.
3. Unggah kode TESLOKA (`tesloka-obfuscated` atau clone Git) lalu ekstrak ke folder site.
   - **Tidak perlu** mengunggah folder `vendor/` atau `node_modules/`.
   - **Tidak perlu** membuat file `.env` secara manual.
4. Pastikan kepemilikan seluruh file site adalah **`www`** (user PHP-FPM aaPanel). Jalankan di Terminal aaPanel:

```bash
cd /www/wwwroot/domainanda.sch.id
chown -R www:www /www/wwwroot/domainanda.sch.id
chmod -R 775 storage bootstrap/cache
```

> [!IMPORTANT]
> Jika kepemilikan masih `root:root`, Web Bootstrapper `/install` tidak akan bisa membuat folder `vendor/` dan menulis file `.env`. Selalu pastikan perintah `chown -R www:www` sudah dijalankan sebelum membuka browser.

---

## Langkah 5: Jalankan Pemasang Web Langsung di `/install`

Sekarang buka browser Anda dan akses:
`https://domainanda.sch.id/install` (atau `/install/`)

### Apa yang Terjadi Secara Otomatis?
1. **Tahap 0 (Zero-Vendor Web Bootstrapper):**
   - Karena folder `vendor/` belum ada, TESLOKA otomatis menampilkan halaman **Penyiapan Awal Dependensi**.
   - Klik tombol biru **"Update Composer, Pasang Vendor & Lanjut ke /install"**.
   - Sistem akan otomatis mengunduh `composer-stable.phar` ke folder aman `storage/app/`, menjalankan `composer self-update` ke versi terbaru, memasang seluruh paket Laravel produksi (`composer install --no-dev --optimize-autoloader`), membuat `.env` dari `.env.example`, dan mengisi `APP_KEY` terenkripsi.
   - Tunggu 20 hingga 90 detik hingga halaman otomatis beralih ke Wizard Laravel `/install`.
   - Begitu `vendor/autoload.php` selesai dibuat, Bootstrapper Tahap 0 otomatis mengunci dirinya demi keamanan.
2. **Tahap 1 s.d. 6 (Wizard Pemasang TESLOKA):**
   - **Langkah 1 (Cek Prasyarat):** Memastikan seluruh ekstensi PHP dan izin tulis aktif.
   - **Langkah 2 (Basis Data & Redis):** Masukkan nama database, user, dan password PostgreSQL yang dibuat pada Langkah 2. Gunakan host `127.0.0.1` dan port `5432`. Uji koneksi hingga hijau.
   - **Langkah 3 (Profil Institusi):** Isi nama sekolah/kampus dan ketiga domain portal.
   - **Langkah 4 (Akun Super Admin):** Buat username, email, dan kata sandi pengelola utama.
   - **Langkah 5 (Eksekusi Sistem):** Migrasi seluruh tabel PostgreSQL, penyiapan data master bersih, dan pembuatan symlink `public/storage`.
   - **Langkah 6 (Selesai):** Unduh ringkasan kredensial `.txt`. File kunci `storage/installed.lock` otomatis dibuat agar rute `/install` tidak bisa diakses ulang oleh pihak luar.

---

## Langkah Tambahan: Queue Worker & Cron Job (Wajib untuk Produksi)

Agar proses ekspor nilai, pembuatan sertifikat PDF, dan pengiriman antrean latar belakang berjalan mulus:

### A. Cron Scheduler (1 Klik di aaPanel)
Buka menu **Cron -> Add Task**:
- **Task Type:** `Shell Script`
- **Name:** `TESLOKA Laravel Scheduler`
- **Period:** `Every N Minutes` -> isi **`1` minute**
- **Script Content:**
  ```bash
  /www/server/php/85/bin/php /www/wwwroot/domainanda.sch.id/artisan schedule:run >> /dev/null 2>&1
  ```

### B. Queue Worker (Pakai Systemd Linux agar Stabil)
Plugin *Supervisor Manager* di aaPanel terkadang gagal dijalankan pada beberapa versi Python OS terbaru. Gunakan layanan **Systemd bawaan Linux** yang jauh lebih stabil:

```bash
sudo tee /etc/systemd/system/tesloka-worker.service > /dev/null <<'EOF'
[Unit]
Description=TESLOKA CBT Queue Worker
After=network.target postgresql.service

[Service]
User=www
Group=www
Restart=always
RestartSec=3
ExecStart=/www/server/php/85/bin/php /www/wwwroot/domainanda.sch.id/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600

[Install]
WantedBy=multi-user.target
EOF

sudo systemctl daemon-reload
sudo systemctl enable --now tesloka-worker
sudo systemctl status tesloka-worker
```

---

## Langkah Tambahan 2: WebSocket Real-Time (Laravel Reverb) & Kamera Live Video (LiveKit SFU)

### A. Mengaktifkan Monitoring Real-Time WebSocket (Laravel Reverb)
Secara default TESLOKA berjalan dengan **HTTP Polling Otomatis** tanpa memerlukan daemon tambahan. Jika Anda ingin pembaruan status peserta, log insiden, paksa stop/logout, dan notifikasi pengawas terkirim secara instan dalam hitungan **< 1 detik**, aktifkan **Laravel Reverb**:

1. **Ubah `.env` di folder root website (pastikan `REVERB_APP_ID`, `REVERB_APP_KEY`, dan `REVERB_APP_SECRET` terisi LENGKAP sebelum menyalakan `BROADCAST_CONNECTION=reverb`, serta pastikan `composer install --no-dev` sudah dijalankan agar `pusher/pusher-php-server` tersedia):**
   ```env
   BROADCAST_CONNECTION=reverb
   REVERB_APP_ID=tesloka-app
   REVERB_APP_KEY=tesloka-reverb-key
   REVERB_APP_SECRET=ganti-dengan-string-acak-minimal-24-karakter
   REVERB_HOST=staff.domainanda.sch.id
   REVERB_PORT=443
   REVERB_SCHEME=https
   REVERB_SERVER_HOST=127.0.0.1
   REVERB_SERVER_PORT=8080
   ```
   *(Bersihkan dan cache ulang config setelah mengubah `.env`: `php artisan optimize:clear && php artisan optimize`).*

2. **Jalankan daemon Reverb lewat Systemd Linux:**
   ```bash
   sudo tee /etc/systemd/system/tesloka-reverb.service > /dev/null <<'EOF'
   [Unit]
   Description=TESLOKA CBT WebSocket Reverb Server
   After=network.target redis.service

   [Service]
   User=www
   Group=www
   WorkingDirectory=/www/wwwroot/domainanda.sch.id
   Restart=always
   RestartSec=3
   ExecStart=/www/server/php/85/bin/php /www/wwwroot/domainanda.sch.id/artisan reverb:start --host=127.0.0.1 --port=8080

   [Install]
   WantedBy=multi-user.target
   EOF

   sudo systemctl daemon-reload
   sudo systemctl enable --now tesloka-reverb
   sudo systemctl status tesloka-reverb
   ```

3. **Tambahkan Reverse Proxy WebSocket di aaPanel Nginx (`/app/` dan `/apps/`):**
   Buat file `/www/server/panel/vhost/nginx/extension/domainanda.sch.id/reverb.conf` (atau tempel di **Website -> Nama Domain -> Config** sebelum `location /` pada domain `staff.*` dan `ujian.*`). Memakai folder `extension/` mencegah konfigurasi terhapus otomatis ketika Rewrite/SSL disimpan ulang di panel:
   ```nginx
   location ^~ /app/ {
       proxy_http_version 1.1;
       proxy_set_header Host $http_host;
       proxy_set_header Scheme $scheme;
       proxy_set_header SERVER_PORT $server_port;
       proxy_set_header REMOTE_ADDR $remote_addr;
       proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
       proxy_set_header X-Forwarded-Proto $scheme;
       proxy_set_header Upgrade $http_upgrade;
       proxy_set_header Connection "Upgrade";
       proxy_read_timeout 86400s;
       proxy_send_timeout 86400s;
       proxy_pass http://127.0.0.1:8080;
   }

   location ^~ /apps/ {
       proxy_http_version 1.1;
       proxy_set_header Host $http_host;
       proxy_set_header Scheme $scheme;
       proxy_set_header SERVER_PORT $server_port;
       proxy_set_header REMOTE_ADDR $remote_addr;
       proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
       proxy_set_header X-Forwarded-Proto $scheme;
       proxy_read_timeout 60s;
       proxy_pass http://127.0.0.1:8080;
   }
   ```

### B. Mengaktifkan Streaming Live Video Kamera (LiveKit SFU - Opsional)
Secara bawaan, fitur Kamera Pengawas menggunakan **Snapshot Berkala + Near-Live Zoom** yang sangat hemat CPU/RAM dan sudah cukup untuk sebagian besar sekolah. Bila Anda membutuhkan **video bergerak 10-15 FPS serentak**:

1. **Pilihan Paling Praktis (LiveKit Cloud):** Daftar di LiveKit Cloud (tersedia tier gratis `Build` 5.000 menit/bulan untuk uji coba), salin **WebSocket URL (`wss://...`)**, **API Key**, dan **API Secret**, lalu masukkan di menu **Pengaturan Sistem -> 4. Sistem & Lokalisasi -> Monitoring Real-Time & LiveKit**.
2. **Pilihan Self-Host Terpisah (Docker):** Siapkan VPS media terpisah (jangan gabung dengan database utama CBT bila peserta di atas 50 orang), salin file `deploy/docker-compose.livekit.yml` & `deploy/livekit.yaml`, sesuaikan `keys` rahasia, buka port firewall UDP `50000-50200` + TCP `7880-7881`, jalankan `docker compose -f docker-compose.livekit.yml up -d`, arahkan subdomain HTTPS (misal `livekit.domainanda.sch.id`) ke port `7880` dengan dukungan WebSocket Upgrade, lalu uji melalui tombol **"Uji Koneksi LiveKit"** di Pengaturan Sistem.

> **Panduan Lengkap LiveKit & Perhitungan VPS:** Untuk perbandingan lengkap 4 mode kamera, kalkulasi kapasitas peserta pada kuota gratis LiveKit Cloud vs biaya sewa VPS media terpisah, serta langkah setup Docker & TURN server, baca [`deploy/PANDUAN-LIVEKIT-WEBRTC.md`](PANDUAN-LIVEKIT-WEBRTC.md).

---

## Pemecahan Masalah Umum (Ringkas & Solutif)

### 1. Halaman `/install` menampilkan "Permission denied" saat klik Pasang Vendor
- **Penyebab:** Folder site dimiliki oleh `root`, bukan `www`.
- **Solusi:** Jalankan `chown -R www:www /www/wwwroot/domainanda.sch.id && chmod -R 775 /www/wwwroot/domainanda.sch.id/storage /www/wwwroot/domainanda.sch.id/bootstrap/cache`.

### 2. Muncul peringatan `exec()` dinonaktifkan di `php.ini`
- **Penyebab:** Pengaturan keamanan bawaan PHP-FPM aaPanel memblokir `exec`.
- **Solusi:** Hapus `exec` di aaPanel -> PHP 8.5 -> Settings -> Disable functions -> Restart PHP, **atau** salin 1 baris perintah terminal yang ditampilkan langsung di layar Web Bootstrapper dan jalankan di SSH.

### 3. Timeout (504 Gateway Time-out) saat memasang `vendor/` lewat browser
- **Penyebab:** Koneksi server ke GitHub/Packagist membutuhkan waktu lebih dari 60 detik (batas default Nginx `fastcgi_read_timeout`).
- **Solusi:** Muat ulang halaman (jika folder `vendor/autoload.php` sudah selesai di latar belakang, browser langsung masuk ke `/install`). Jika belum lengkap, jalankan perintah CLI Composer di SSH:
  ```bash
  cd /www/wwwroot/domainanda.sch.id
  sudo -u www COMPOSER_MEMORY_LIMIT=-1 /www/server/php/85/bin/php storage/app/composer.phar install --no-dev --optimize-autoloader
  ```

### 4. Error "404 Not Found" saat membuka `/install` atau halaman lain
- **Penyebab:** **Running Directory** belum diarahkan ke `/public` atau **URL Rewrite** `laravel5` belum disimpan.
- **Solusi:** Periksa ulang Langkah 3 di atas, pastikan Running Directory = `/public` dan URL Rewrite memakai aturan `try_files $uri $uri/ /index.php?$query_string;`.

### 5. Gambar / Logo atau Upload Soal Tidak Tampil (404 `/storage/...`)
- **Penyebab:** Symlink `public/storage` belum terbuat (sering terjadi jika fungsi `symlink` diblokir PHP-FPM).
- **Solusi:** Jalankan satu kali lewat SSH:
  ```bash
  cd /www/wwwroot/domainanda.sch.id
  rm -rf public/storage
  ln -s /www/wwwroot/domainanda.sch.id/storage/app/public /www/wwwroot/domainanda.sch.id/public/storage
  chown -h www:www public/storage
  ```

### 6. Error `Class "Pusher\Pusher" not found` atau Pembaruan Manual ZIP / GitHub di VPS
- **Penyebab:** Arsip kode dari GitHub (`Source code .zip`) tidak menyertakan folder `vendor/`, sehingga mengunggah/mengekstrak ZIP baru di atas instalasi lama memperbarui `composer.json`/`composer.lock` tanpa menginstal paket baru (`laravel/reverb`, `pusher/pusher-php-server`), atau `.env` menyetel `BROADCAST_CONNECTION=reverb` sebelum `REVERB_APP_ID/KEY/SECRET` terisi.
- **Solusi (Catatan Praktis Setiap Kali Upload Update ZIP/GitHub secara Manual):**
  Pastikan hak kepemilikan file milik `www:www`, sinkronkan dependensi Composer, jalankan migrasi & cache ulang, lalu restart daemon Reverb/Worker dan PHP-FPM:
  ```bash
  cd /www/wwwroot/domainanda.sch.id && chown -R www:www . && su -s /bin/bash www -c 'COMPOSER_MEMORY_LIMIT=-1 /www/server/php/85/bin/php /usr/bin/composer install --no-dev --optimize-autoloader && /www/server/php/85/bin/php artisan migrate --force && /www/server/php/85/bin/php artisan optimize:clear && /www/server/php/85/bin/php artisan optimize' && systemctl restart tesloka-reverb tesloka-worker && /etc/init.d/php-fpm-85 reload
  ```
