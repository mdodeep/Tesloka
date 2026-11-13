# Panduan Instalasi & Deployment Produksi aaPanel — TESLOKA CBT

Panduan ini adalah panduan resmi implementasi operasional untuk lingkungan server produksi institusi berbasis **Linux (Ubuntu 24.04 LTS)** dengan panel **aaPanel**, sesuai arsitektur spesifikasi resmi:
- **Server:** 4 vCPU, 16 GB RAM, 100 GB NVMe SSD Enterprise RAID 10, Dedicated IPv4.
- **Stack:** Nginx + PHP 8.5-FPM + PostgreSQL 17/18 + Redis 8.x + Supervisor + SSL Let's Encrypt.
- **Arsitektur:** On-Premise Single-Tenant (satu institusi per instalasi, zero SaaS multi-tenant).

---

## 1. Persiapan Server & Instalasi aaPanel

1. Jalankan perintah instalasi aaPanel pada terminal VPS Ubuntu 24.04 bersih:
   ```bash
   wget -O install.sh http://www.aapanel.com/script/install-ubuntu_6.0_en.sh && sudo bash install.sh aapanel
   ```
2. Buka panel admin aaPanel melalui URL dan port yang diberikan pada output terminal.
3. Masuk ke menu **App Store** di aaPanel dan instal perangkat lunak:
   - **Nginx** (versi 1.24 atau 1.26+)
   - **PHP 8.5**
   - **PostgreSQL Manager** (PostgreSQL 17 atau 18)
   - **Redis 8.x**
   - **Supervisor Manager**

---

## 2. Konfigurasi Ekstensi PHP 8.5

Masuk ke **App Store > PHP 8.5 > Settings**:
1. **Install Extensions**: Centang dan pasang ekstensi:
   - `pdo_pgsql`, `pgsql`, `redis`, `opcache`, `fileinfo`, `exif`, `bcmath`, `curl`, `gd`, `zip`.
2. **Configuration (`php.ini`)**:
   - `upload_max_filesize = 50M`
   - `post_max_size = 50M`
   - `memory_limit = 256M`
   - `max_execution_time = 120`
   - `max_input_vars = 5000`
3. Salin konfigurasi pool dari `deploy/php-fpm/tesloka.conf` ke `/www/server/php/85/etc/php-fpm.d/tesloka.conf` lalu restart PHP-FPM.

---

## 3. Konfigurasi Basis Data PostgreSQL

1. Buat database baru untuk aplikasi CBT melalui aaPanel PostgreSQL Manager:
   - **Database Name:** `tesloka_cbt`
   - **Username:** `tesloka_user`
   - **Password:** `<generate_password_aman_32_karakter>`
   - **Encoding:** `UTF8`
   - **Collate:** `en_US.UTF-8`
2. Konfigurasi `postgresql.conf` (Tuning untuk 16 GB RAM):
   - `shared_buffers = 4GB`
   - `effective_cache_size = 10GB`
   - `work_mem = 64MB`
   - `maintenance_work_mem = 512MB`
   - `wal_buffers = 16MB`
   - `max_connections = 300`

---

## 4. Penyiapan Domain & Virtual Host Nginx

1. Di menu **Website > Add Site**:
   - **Domain:** `cbt.institusi.ac.id`
   - **Root Path:** `/www/wwwroot/cbt.institusi.ac.id/public`
   - **PHP Version:** `PHP-85`
2. Aktifkan **SSL** menggunakan sertifikat Let's Encrypt (DNS Verification atau HTTP-01).
3. Timpa file konfigurasi Nginx vhost dengan isi dari `deploy/nginx/tesloka.conf`.
4. Uji dan muat ulang Nginx:
   ```bash
   nginx -t && systemctl reload nginx
   ```

---

## 5. Deployment Kode & Migrasi Aplikasi

1. Clone repositori ke direktori root:
   ```bash
   cd /www/wwwroot/cbt.institusi.ac.id
   git clone <repo_url> .
   chown -R www:www /www/wwwroot/cbt.institusi.ac.id
   ```
2. Buat file `.env` produksi:
   ```bash
   cp .env.example .env
   ```
   Atur variabel lingkungan produksi:
   ```ini
   APP_NAME="TESLOKA CBT"
   APP_ENV=production
   APP_KEY=
   APP_DEBUG=false
   APP_URL=https://cbt.institusi.ac.id

   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=tesloka_cbt
   DB_USERNAME=tesloka_user
   DB_PASSWORD=<password_db_anda>

   CACHE_STORE=redis
   QUEUE_CONNECTION=redis
   SESSION_DRIVER=redis
   REDIS_HOST=127.0.0.1
   REDIS_PORT=6379
   ```
3. Generate application key, migrate database, dan build asset lokal:
   ```bash
   composer install --no-dev --optimize-autoloader
   php artisan key:generate
   php artisan migrate --force
   php artisan db:seed --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
4. Atur izin akses direktori storage:
   ```bash
   chmod -R 775 storage bootstrap/cache
   chown -R www:www storage bootstrap/cache
   ```

---

## 6. Supervisor Queue Worker & Scheduler

1. Tambahkan worker queue dari `deploy/supervisor/tesloka-worker.conf` ke Supervisor.
2. Tambahkan scheduler dari `deploy/supervisor/tesloka-scheduler.conf` ke Supervisor.
3. Perbarui supervisor:
   ```bash
   supervisorctl reread && supervisorctl update && supervisorctl start all
   ```

---

## 7. Verifikasi Akhir Kesiapan Produksi (Self-Check)

Jalankan perintah audit kesiapan bawaan:
```bash
php artisan tesloka:production-check
```
Pastikan seluruh 8 indikator berstatus **PASS**.

Simulasikan uji beban autosave konkurensi:
```bash
php artisan tesloka:simulate-load --students=30 --answers=5
```
Pastikan P95 latensi berada di bawah target 1.000 ms dan error rate 0.00%.

Aplikasi TESLOKA CBT kini telah resmi siap melayani ujian digital skala institusi secara aman dan stabil.

