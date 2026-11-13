# Panduan Lengkap Instalasi & Deployment Produksi — TESLOKA CBT

Panduan ini disusun secara adaptif agar **kompatibel dengan berbagai spesifikasi server (2 GB s.d. 32 GB RAM)**, berbagai jenis domain (multi-subdomain, single-domain, maupun IP lokal LAN), serta berbagai lingkungan server Linux (baik menggunakan **aaPanel** maupun **Ubuntu/Debian Standar**).

---

## 1. Matriks Perencanaan & Sizing Hardware Server

Pilih spesifikasi yang paling sesuai dengan target jumlah peserta ujian serentak institusi Anda. Jangan paksakan parameter server besar ke server kecil agar server tidak mengalami *Out of Memory (OOM)*.

| Skala Institusi | Peserta Serentak | Rekomendasi VPS / Server | PostgreSQL `shared_buffers` | PHP-FPM `pm.max_children` | Redis `maxmemory` |
|:---|:---|:---|:---|:---|:---|
| **Laboratorium Kecil** | 30 – 50 siswa | 1-2 vCPU, 2 GB RAM | `512MB` | `12` | `256mb` |
| **Standar Sekolah / Lab** | 50 – 150 siswa | 2-4 vCPU, 4 GB RAM | `1GB` | `24` | `512mb` |
| **Multi-Lab / Kampus** | 150 – 300 siswa | 4 vCPU, 8 GB RAM | `2GB` | `48` | `1024mb` |
| **Enterprise Institusi** | 300 – 600 siswa | 4-8 vCPU, 16 GB RAM | `4GB` | `64` | `2048mb` |
| **Ujian Akbar / Serentak** | 600 – 1.200+ siswa| 8-16 vCPU, 32 GB RAM | `8GB` | `128` | `4096mb` |

> [!TIP]
> **Penyimpanan:** Disarankan menggunakan **SSD NVMe Enterprise (RAID 10)** minimal 50–100 GB agar I/O operasi baca-tulis autosave database tetap berada di bawah 50 ms.

---

## 2. Pilihan Arsitektur Domain & Subdomain

TESLOKA mendukung dua model routing domain secara native:

### Opsi A: Model Tiga Subdomain (Sangat Direkomendasikan)
Institusi mengarahkan tiga DNS record A/CNAME ke IP server yang sama:
1. `staff.domainanda.ac.id`  → Portal Admin, Pengawas, & Dosen/Guru
2. `ujian.domainanda.ac.id`  → Portal Pengerjaan Ujian Siswa
3. `sertifikat.domainanda.ac.id` → Portal Verifikasi Ijazah/Sertifikat Publik (Tanpa Login)

*Ketiga subdomain diarahkan ke satu folder root yang sama (`public/`). Router TESLOKA secara otomatis mendeteksi subdomain yang diakses.*

### Opsi B: Model Single-Domain (1 Domain Saja)
Jika institusi hanya memiliki 1 domain (misal: `cbt.sekolah.sch.id`):
- Portal Staf: `https://cbt.sekolah.sch.id/staff/login`
- Portal Ujian: `https://cbt.sekolah.sch.id/ujian/login`
- Verifikasi: `https://cbt.sekolah.sch.id/verifikasi-sertifikat`

### Opsi C: Model IP Lokal (Offline LAN Lab Tanpa Internet)
Jika dioperasikan murni di laboratorium komputer sekolah tanpa internet:
- Cukup gunakan IP server lokal, misalnya: `http://192.168.1.100/staff/login` dan `http://192.168.1.100/ujian/login`.

---

## 3. Langkah Instalasi Melalui aaPanel

### Langkah 3.1: Pasang aaPanel pada VPS Bersih
Jalankan perintah resmi instalasi aaPanel pada VPS Linux Anda:
```bash
# Untuk Ubuntu / Debian:
wget -O install.sh http://www.aapanel.com/script/install-ubuntu_6.0_en.sh && sudo bash install.sh aapanel
```
Setelah instalasi selesai, simpan URL panel, username, dan password yang muncul di terminal.

### Langkah 3.2: Instal Paket Melalui App Store aaPanel
Login ke dashboard aaPanel, lalu masuk ke menu **App Store** dan instal:
1. **Nginx** (Pilih versi `1.24` atau `1.26+`).
2. **PHP** (Pilih **PHP 8.3**, **8.4**, atau **8.5** — TESLOKA mendukung PHP ^8.3).
3. **PostgreSQL Manager** (Versi 15, 16, atau 17).
4. **Redis** (Versi 7.x atau 8.x).
5. **Supervisor Manager** (Untuk manajemen background worker antrean ujian).

### Langkah 3.3: Konfigurasi Ekstensi PHP di aaPanel
Buka **App Store > PHP-8.x > Settings**:
1. Masuk ke tab **Install Extensions**, pasang ekstensi wajib berikut:
   - `pdo_pgsql` & `pgsql` (Koneksi database PostgreSQL)
   - `redis` (Cache & queue berkecepatan tinggi)
   - `opcache` (Optimalisasi eksekusi bytecode PHP)
   - `fileinfo` & `exif` (Validasi media soal)
   - `gd` (Manipulasi gambar & watermark sertifikat)
   - `zip` (Ekspor/impor butir soal Excel)
   - `bcmath` (Kalkulasi rumus presisi tinggi)
2. Masuk ke tab **Configuration (php.ini)**, perbarui parameter berikut:
   ```ini
   upload_max_filesize = 50M
   post_max_size = 50M
   memory_limit = 256M        ; (Gunakan 512M jika server memiliki 16GB+ RAM)
   max_execution_time = 180
   max_input_vars = 5000
   ```
3. Masuk ke tab **Performance Tuning**:
   - Sesuaikan nilai **Max children** sesuai tabel Sizing RAM di atas (contoh: 24 untuk 4GB RAM, 64 untuk 16GB RAM).
4. Klik **Restart Service** pada PHP-FPM.

---

## 4. Konfigurasi Basis Data PostgreSQL

1. Buka **aaPanel > Database > PostgreSQL** (atau via PostgreSQL Manager):
   - Klik **Add Database**.
   - **Database Name:** `tesloka_cbt`
   - **Username:** `tesloka_user`
   - **Password:** *Buat password yang kuat dan aman*
   - **Encoding:** `UTF8`
2. **Tuning `postgresql.conf` (Sesuai RAM Server Anda):**
   Lokasi file konfigurasi biasanya berada di `/www/server/pgsql/data/postgresql.conf` atau `/etc/postgresql/<version>/main/postgresql.conf`.
   Sesuaikan parameter berikut berdasarkan RAM VPS Anda:
   ```ini
   # Contoh untuk VPS 4 GB RAM:
   shared_buffers = 1GB
   effective_cache_size = 3GB
   work_mem = 32MB
   maintenance_work_mem = 256MB
   max_connections = 150

   # Contoh untuk VPS 16 GB RAM:
   # shared_buffers = 4GB
   # effective_cache_size = 10GB
   # work_mem = 64MB
   # maintenance_work_mem = 512MB
   # max_connections = 300
   ```
3. Restart layanan PostgreSQL:
   ```bash
   systemctl restart postgresql
   # atau via tombol restart di aaPanel
   ```

---

## 5. Konfigurasi Redis

1. Buka **aaPanel > App Store > Redis > Settings**:
2. Di tab **Performance Tuning**:
   - **Max Memory:** Atur sesuai tabel RAM (contoh: `512` MB untuk server 4GB, `2048` MB untuk server 16GB).
3. Di tab **Configuration File**:
   - Pastikan baris `maxmemory-policy` disetel ke:
     ```ini
     maxmemory-policy allkeys-lru
     ```
     > [!WARNING]
     > **JANGAN gunakan `noeviction`!** Jika disetel `noeviction`, ketika memori Redis penuh, aplikasi akan mengalami error 500 (*OOM command not allowed*). Kebijakan `allkeys-lru` memastikan cache lama dibersihkan secara aman saat memori penuh.
4. Klik **Save** dan **Restart** Redis.

---

## 6. Penempatan Kode & Konfigurasi Laravel

### Langkah 6.1: Menyiapkan Folder Situs di aaPanel
1. Buka **aaPanel > Website > Add Site**:
   - **Domain:** Masukkan domain Anda, misalnya: `cbt.institusi.ac.id` (jika menggunakan multi-subdomain, masukkan seluruh subdomain: `cbt.institusi.ac.id`, `staff.institusi.ac.id`, `ujian.institusi.ac.id`, `sertifikat.institusi.ac.id`).
   - **Root Path:** `/www/wwwroot/cbt.institusi.ac.id`
   - **PHP Version:** Pilih versi PHP yang telah diinstal (`PHP-83`, `PHP-84`, atau `PHP-85`).
2. Masuk ke direktori situs via terminal:
   ```bash
   cd /www/wwwroot/cbt.institusi.ac.id
   ```

### Langkah 6.2: Mengunduh / Clone Kode TESLOKA
```bash
# Clone dari repositori GitHub resmi pengembang:
git clone https://github.com/mdodeep/Tesloka.git .

# Atau jika Anda mengunggah berkas zip hasil release:
# unzip tesloka-release.zip && rm tesloka-release.zip
```

### Langkah 6.3: Konfigurasi File Lingkungan (.env)
Salin contoh konfigurasi:
```bash
cp .env.example .env
nano .env
```
Sesuaikan bagian-bagian penting berikut:
```ini
APP_NAME="TESLOKA CBT"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://cbt.institusi.ac.id

# LOGGING
LOG_CHANNEL=daily
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

# POSTGRESQL PRODUCTION
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=tesloka_cbt
DB_USERNAME=tesloka_user
DB_PASSWORD=PasswordDatabaseAndaYangAman

# CACHE & QUEUE VIA REDIS
CACHE_STORE=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

# REDIS CONNECTION
REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null    # Isi password jika Redis diberi password
REDIS_PORT=6379
REDIS_DB=0
REDIS_CACHE_DB=1
```

### Langkah 6.4: Instalasi Dependensi & Inisialisasi Database
Jalankan rangkaian perintah berikut di terminal server:
```bash
# 1. Instal dependensi Composer (mode produksi tanpa paket dev):
composer install --no-dev --optimize-autoloader

# 2. Buat kunci enkripsi aplikasi:
php artisan key:generate --force

# 3. Jalankan migrasi tabel PostgreSQL dan data awal (seeder):
php artisan migrate --force
php artisan db:seed --force

# 4. Buat symbolic link storage berkas publik:
php artisan storage:link

# 5. Atur kepemilikan dan hak akses berkas:
# (Untuk aaPanel, web user adalah 'www'):
chown -R www:www /www/wwwroot/cbt.institusi.ac.id
chmod -R 775 storage bootstrap/cache

# 6. Kompilasi cache Laravel untuk kecepatan maksimal:
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 7. Konfigurasi Nginx Virtual Host (Wajib Dilakukan di aaPanel)

> [!IMPORTANT]
> **DUA LANGKAH KRITIS DI AAPANEL AGAR TIDAK ERROR 404 NOT FOUND ATAU 403 FORBIDDEN:**
>
> 1. **Running Directory Wajib `/public`:**
>    - Buka **aaPanel > Website > Klik Nama Situs Anda > Site Directory**.
>    - Pada kolom **Running directory**, ubah dari `/` menjadi `/public`.
>    - Klik tombol **Save**! *(Wajib agar Nginx mengeksekusi `public/index.php` Laravel, bukan folder root proyek)*.
>
> 2. **URL Rewrite Wajib Preset `laravel 5`:**
>    - Masih di jendela pengaturan situs, klik tab **URL rewrite**.
>    - Pada dropdown pilihan framework, pilih **laravel 5** (atau pastikan isi kodenya memiliki `try_files $uri $uri/ /index.php?$query_string;`).
>    - Klik tombol **Save**! *(Wajib agar seluruh sub-halaman seperti `/ujian/login`, `/staff/login`, dan API autosave tidak 404 Not Found)*.

3. Buka tab **Configuration**:
   - Anda dapat meninjau template resmi dari `deploy/nginx/tesloka.conf` untuk tuning buffer, batas upload 50MB, dan caching aset statis.
4. **Memasang SSL / HTTPS (Let's Encrypt):**
   - Masuk ke tab **SSL > Let's Encrypt**.
   - Pilih seluruh domain/subdomain yang diarahkan ke situs ini.
   - Klik **Apply** untuk menerbitkan sertifikat otomatis.
   - Aktifkan opsi **Force HTTPS** setelah SSL berhasil dipasang.

---

## 8. Konfigurasi Background Worker & Scheduler (Supervisor)

Tugas-tugas berat seperti impor soal dari Excel, regrade nilai massal, pengiriman email notifikasi, dan pemantauan timer otomatis dijalankan di latar belakang oleh Worker dan Scheduler.

### Opsi A: Melalui Plugin 'Supervisor Manager' di aaPanel (Paling Mudah)
1. Buka **aaPanel > App Store > Supervisor Manager > Settings**.
2. Klik **Add Daemon**:
   - **Name:** `tesloka-worker`
   - **Run User:** `www`
   - **Run Dir:** `/www/wwwroot/cbt.institusi.ac.id`
   - **Command:** `php artisan queue:work redis --sleep=3 --tries=3 --max-time=3600 --timeout=120`
   - **Processes:** `2` (untuk VPS 2-4GB) atau `4` (untuk VPS 8-16GB).
   - Klik **Confirm**.
3. Pastikan status `tesloka-worker` berubah menjadi warna hijau (**Running**).

### Konfigurasi Scheduler (Pemantau Ujian Otomatis Tiap Menit):
Gunakan **aaPanel > Cron**:
- **Type of Task:** `Shell Script`
- **Name of Task:** `TESLOKA Scheduler`
- **Period:** `N Minutes` -> isi `1` Minute.
- **Script content:**
  ```bash
  cd /www/wwwroot/cbt.institusi.ac.id && php artisan schedule:run >> /dev/null 2>&1
  ```
- Klik **Add Task**.

---

## 9. Verifikasi Kesiapan Sistem (Health Check)

Setelah seluruh langkah selesai, buka terminal server dan jalankan perintah verifikasi bawaan:

```bash
php artisan tesloka:production-check
```

Perintah ini akan menguji secara riil:
1. Status koneksi database PostgreSQL (baca/tulis ACID).
2. Status koneksi cache & antrean Redis.
3. Ketersediaan ruang penyimpanan (Disk Storage).
4. Izin tulis direktori `storage/` dan `bootstrap/cache/`.
5. Integritas link berkas publik (`public/storage`).
6. Status queue worker yang sedang berjalan.

Jika seluruh indikator berstatus **PASS [OK]**, sistem siap digunakan untuk operasional ujian digital institusi secara penuh.

---

## 10. Panduan Pemecahan Masalah (Troubleshooting)

### Kendala 1: Error 404 Not Found atau 403 Forbidden Saat Membuka Website
- **Penyebab Utama di aaPanel:**
  1. Pengaturan **Running directory** di aaPanel masih mengarah ke root `/` alih-alih `/public`.
  2. Aturan **URL Rewrite** belum diaktifkan sehingga rute dinamis Laravel dicari sebagai file fisik yang tidak ada di disk.
- **Solusi Cepat 10 Detik di aaPanel:**
  1. Buka **aaPanel > Website > Klik Nama Situs Anda**.
  2. Buka tab **Site Directory**, ubah **Running directory** menjadi `/public` lalu klik **Save**!
  3. Buka tab **URL rewrite**, pilih preset **laravel 5** lalu klik **Save**!
  4. Bersihkan cache browser atau buka via incognito tab.

### Kendala 2: Error 502 Bad Gateway
- **Penyebab:** Nginx tidak dapat tersambung ke socket PHP-FPM.
- **Solusi:**
  1. Periksa apakah PHP-FPM sedang berjalan: `systemctl status php-fpm` (atau cek tombol start di aaPanel).
  2. Periksa path socket di konfigurasi vhost Nginx:
     Jalankan di terminal: `ls -la /tmp/php-cgi*.sock` (pada aaPanel) atau `ls -la /run/php/*.sock` (pada Ubuntu standar).
     Pastikan baris `fastcgi_pass` di Nginx sama persis dengan socket yang aktif.

### Kendala 3: Error 500 Internal Server Error
- **Penyebab:** `APP_KEY` belum dibuat, izin direktori `storage` belum diatur, atau cache framework usang.
- **Langkah Diagnosa Cepat:**
  1. Jalankan perintah diagnosa resmi:
     ```bash
     php artisan tesloka:production-check
     ```
  2. Lihat error detail di log Laravel:
     ```bash
     tail -n 50 storage/logs/laravel.log
     ```
- **Solusi Perbaikan:**
  ```bash
  php artisan key:generate --force
  chown -R www:www storage bootstrap/cache
  chmod -R 775 storage bootstrap/cache
  php artisan optimize:clear
  ```

### Kendala 4: Gagal `php artisan storage:link` (The "public/storage" link already exists)
- **Penyebab:** Symlink lama masih tertinggal.
- **Solusi:**
  ```bash
  rm -f public/storage
  php artisan storage:link
  ```

### Kendala 5: Database Error "Ident authentication failed" atau "Connection refused"
- **Penyebab:** Password database salah atau PostgreSQL belum mengizinkan koneksi lokal md5/scram.
- **Solusi:**
  1. Pastikan `DB_HOST=127.0.0.1` (gunakan IP, hindari `localhost` jika socket lokal bermasalah).
  2. Periksa file `pg_hba.conf` di PostgreSQL, pastikan baris IPv4 local connections disetel ke `scram-sha-256` atau `md5`:
     ```
     host    all             all             127.0.0.1/32            scram-sha-256
     ```
  3. Uji login database via terminal:
     `psql -h 127.0.0.1 -U tesloka_user -d tesloka_cbt`

### Kendala 5: Redis Error "OOM command not allowed"
- **Penyebab:** Memori Redis penuh dan policy disetel ke `noeviction`.
- **Solusi:**
  Buka konfigurasi Redis, ubah baris `maxmemory-policy` menjadi:
  ```ini
  maxmemory-policy allkeys-lru
  ```
  Lalu restart Redis: `systemctl restart redis` (atau restart via aaPanel).
