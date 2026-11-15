# Panduan Lengkap Instalasi & Deployment Produksi — TESLOKA CBT
### Komprehensif: aaPanel & Linux Server (Ubuntu, Debian, AlmaLinux, Rocky Linux)

Dokumen ini adalah panduan teknis resmi langkah demi langkah untuk menginstalasi, mengonfigurasi, dan mengoptimasi **TESLOKA CBT** pada server VPS/Dedicated Server Linux. Panduan ini dirancang adaptif untuk **segala spesifikasi hardware (dari server hemat 1 vCPU & 2 GB RAM hingga server enterprise 16 vCPU & 32 GB RAM)**, berbagai arsitektur domain (multi-subdomain, single domain, maupun IP lokal LAN), serta dilengkapi solusi mendalam untuk kendala umum seperti instalasi Node.js, Python, PostgreSQL, Redis, dan **Supervisor Manager yang sering mengalami galat (error)**.

---

## DAFTAR ISI
1. [Persiapan Awal Sistem Operasi VPS (Wajib Saat VPS Baru Online)](#1-persiapan-awal-sistem-operasi-vps)
2. [Matriks Performa & Tuning Hardware Server (1 vCPU 2GB s.d. 16 vCPU 32GB)](#2-matriks-performa--tuning-hardware-server)
3. [Pilihan Arsitektur Domain & Jaringan](#3-pilihan-arsitektur-domain--jaringan)
4. [Instalasi aaPanel pada VPS Bersih](#4-instalasi-aapanel-pada-vps-bersih)
5. [Instalasi Seluruh Komponen Stack di aaPanel](#5-instalasi-seluruh-komponen-stack-di-aapanel)
   - 5.1 [Nginx Web Server](#51-nginx-web-server)
   - 5.2 [Node.js (Node Version Manager)](#52-nodejs-node-version-manager)
   - 5.3 [Python Environment](#53-python-environment)
   - 5.4 [PHP & Seluruh Ekstensi Wajib](#54-php--seluruh-ekstensi-wajib)
   - 5.5 [PostgreSQL Manager & Basis Data](#55-postgresql-manager--basis-data)
   - 5.6 [Redis Server & Cache Policy](#56-redis-server--cache-policy)
   - 5.7 [Supervisor Manager (Solusi Error & Opsi Native Systemd)](#57-supervisor-manager-solusi-error--opsi-native-systemd)
6. [Penempatan Kode & Konfigurasi Laravel](#6-penempatan-kode--konfigurasi-laravel)
7. [Konfigurasi Nginx Virtual Host (Kritis: Anti-404 & Anti-403)](#7-konfigurasi-nginx-virtual-host-kritis-anti-404--anti-403)
8. [Konfigurasi Background Queue Worker & Cron Scheduler](#8-konfigurasi-background-queue-worker--cron-scheduler)
9. [Verifikasi Kesiapan Sistem (Automated Health Check)](#9-verifikasi-kesiapan-sistem-automated-health-check)
10. [Panduan Pemecahan Masalah Lengkap (Troubleshooting A s.d. Z)](#10-panduan-pemecahan-masalah-lengkap-troubleshooting-a-sd-z)

---

## 1. Persiapan Awal Sistem Operasi VPS

Segera setelah VPS Anda aktif (online) dan Anda dapat login melalui SSH sebagai `root` atau pengguna dengan hak akses `sudo`, lakukan langkah persiapan sistem berikut sebelum memasang panel atau software apa pun:

### 1.1 Update & Upgrade Repository Sistem Operasi

Pilih perintah sesuai dengan distro Linux VPS Anda:

#### Opsi A: Ubuntu / Debian (Sangat Direkomendasikan)
```bash
# Perbarui daftar paket dan perbarui seluruh sistem ke versi patch terbaru
sudo apt update && sudo apt upgrade -y

# Bersihkan dependensi lama yang tidak lagi digunakan
sudo apt autoremove -y && sudo apt clean

# Pasang utilitas dasar server yang esensial
sudo apt install -y curl wget git unzip htop software-properties-common build-essential ufw
```

#### Opsi B: AlmaLinux / Rocky Linux / RHEL / CentOS Stream
```bash
# Perbarui seluruh paket sistem
sudo dnf update -y

# Pasang repositori EPEL dan utilitas dasar
sudo dnf install -y epel-release
sudo dnf install -y curl wget git unzip htop tar gcc make
```

---

### 1.2 Konfigurasi Virtual Memory (Swap File) — Sangat Krusial untuk RAM 2 GB & 4 GB

> [!IMPORTANT]
> **MENGAPA SWAP FILE SANGAT KRUSIAL?**
> Pada server berkapasitas 1-2 vCPU dan 2 GB RAM, proses instalasi dependensi (`composer install`), kompilasi aset frontend (`npm run build`), atau lonjakan request ujian dapat menyebabkan memori fisik terisi penuh. Tanpa Swap File, kernel Linux akan memicu mekanisme **OOM Killer (Out of Memory)** yang mematikan proses PHP-FPM atau PostgreSQL secara paksa (`Killed: process terminated`).
> Membuat Swap File 2 GB s.d. 4 GB menjamin server tetap stabil 100% dan bebas dari error crash.

Jalankan perintah berikut untuk membuat Swap File (contoh: **2 GB Swap** untuk server RAM 2 GB, atau **4 GB Swap** untuk server RAM 4 GB+):

```bash
# 1. Periksa apakah swap sudah ada (jika kosong, lanjutkan langkah berikutnya)
swapon --show

# 2. Alokasikan file swap sebesar 2 GB (Ganti '2G' dengan '4G' jika server memiliki storage leluasa)
sudo fallocate -l 2G /swapfile

# 3. Kunci hak akses berkas agar hanya bisa diakses root (keamanan)
sudo chmod 600 /swapfile

# 4. Inisialisasi area swap Linux
sudo mkswap /swapfile

# 5. Aktifkan swap secara langsung
sudo swapon /swapfile

# 6. Jadikan permanen agar swap tetap aktif setelah VPS direboot
echo '/swapfile none swap sw 0 0' | sudo tee -a /etc/fstab

# 7. Optimalkan parameter swappiness (nilai 10-20 ideal untuk database server)
sudo sysctl vm.swappiness=15
echo 'vm.swappiness=15' | sudo tee -a /etc/sysctl.conf

# 8. Verifikasi bahwa swap sudah aktif:
free -h
```

---

### 1.3 Pengaturan Zona Waktu Server (NTP Server Time)

CBT TESLOKA menggunakan **waktu server absolut** untuk timer hitung mundur lembar ujian peserta, rilis token otomatis, dan audit log proctoring. Pastikan zona waktu VPS Anda telah disetel ke zona waktu institusi Anda (contoh: WIB / Jakarta):

```bash
# Set zona waktu ke Asia/Jakarta (WIB)
sudo timedatectl set-timezone Asia/Jakarta

# Verifikasi waktu dan tanggal server saat ini:
timedatectl
```
*(Gunakan `Asia/Makassar` untuk WITA atau `Asia/Jayapura` untuk WIT).*

---

## 2. Matriks Performa & Tuning Hardware Server

Pilihlah tier konfigurasi yang paling sesuai dengan hardware VPS Anda. **Jangan memasukkan konfigurasi server 16 GB ke dalam VPS 2 GB**, dan sebaliknya **jangan biarkan server 16 GB memakai konfigurasi bawaan yang terlalu rendah**.

### Ringkasan Matriks Konfigurasi Berdasarkan Kapasitas

| Tier & Spesifikasi | Target Siswa Serentak | Rekomendasi Swap | PHP `memory_limit` | PHP-FPM `pm.max_children` | PostgreSQL `shared_buffers` | Redis `maxmemory` | Worker Queue |
|:---|:---|:---|:---|:---|:---|:---|:---|
| **Tier 1: 1 vCPU, 2 GB RAM** | 30 – 50 siswa (1 Lab) | `2 GB` | `256M` | `12` | `256MB` | `256mb` | 1 worker |
| **Tier 2: 2-4 vCPU, 4 GB RAM**| 50 – 150 siswa (Sekolah) | `2 GB` | `256M` | `24` | `1GB` | `512mb` | 2 worker |
| **Tier 3: 4 vCPU, 8 GB RAM** | 150 – 300 siswa (Kampus) | `4 GB` | `512M` | `48` | `2GB` | `1024mb` | 4 worker |
| **Tier 4: 4-8 vCPU, 16 GB RAM**| 300 – 600 siswa (Enterprise) | `4 GB` | `512M` | `64` | `4GB` | `2048mb` | 6 worker |
| **Tier 5: 8-16 vCPU, 32 GB RAM**| 600 – 1.200+ (Akbar) | `8 GB` | `1024M` | `128` | `8GB` | `4096mb` | 8 worker |

---

### Detail Konfigurasi Spesifik per Tier Hardware

#### 🟢 TIER 1: Minimalis / Lab Kecil (1 vCPU, 2 GB RAM — 30 s.d. 50 Siswa)
- **`php.ini` Settings:**
  ```ini
  memory_limit = 256M
  upload_max_filesize = 50M
  post_max_size = 50M
  max_execution_time = 120
  max_input_vars = 3000
  ```
- **PHP-FPM Settings (`/www/server/php/8x/etc/php-fpm.d/www.conf` atau via aaPanel GUI):**
  ```ini
  pm = dynamic
  pm.max_children = 12
  pm.start_servers = 3
  pm.min_spare_servers = 2
  pm.max_spare_servers = 5
  pm.max_requests = 500
  ```
- **PostgreSQL Settings (`postgresql.conf`):**
  ```ini
  shared_buffers = 256MB
  effective_cache_size = 768MB
  work_mem = 16MB
  maintenance_work_mem = 64MB
  max_connections = 60
  ```
- **Redis Settings (`redis.conf`):**
  ```ini
  maxmemory 256mb
  maxmemory-policy allkeys-lru
  ```
- **Supervisor Workers:** `1` process (`--timeout=90`).

---

#### 🟢 TIER 2: Standar Sekolah / Laboratorium (2-4 vCPU, 4 GB RAM — 50 s.d. 150 Siswa)
- **`php.ini` Settings:**
  ```ini
  memory_limit = 256M
  upload_max_filesize = 50M
  post_max_size = 50M
  max_execution_time = 180
  max_input_vars = 5000
  ```
- **PHP-FPM Settings:**
  ```ini
  pm = dynamic
  pm.max_children = 24
  pm.start_servers = 6
  pm.min_spare_servers = 4
  pm.max_spare_servers = 10
  pm.max_requests = 1000
  ```
- **PostgreSQL Settings (`postgresql.conf`):**
  ```ini
  shared_buffers = 1GB
  effective_cache_size = 3GB
  work_mem = 32MB
  maintenance_work_mem = 256MB
  max_connections = 120
  ```
- **Redis Settings (`redis.conf`):**
  ```ini
  maxmemory 512mb
  maxmemory-policy allkeys-lru
  ```
- **Supervisor Workers:** `2` processes (`--timeout=120`).

---

#### 🟢 TIER 3: Multi-Lab / Kampus (4 vCPU, 8 GB RAM — 150 s.d. 300 Siswa)
- **`php.ini` Settings:**
  ```ini
  memory_limit = 512M
  upload_max_filesize = 50M
  post_max_size = 50M
  max_execution_time = 180
  max_input_vars = 5000
  ```
- **PHP-FPM Settings:**
  ```ini
  pm = dynamic
  pm.max_children = 48
  pm.start_servers = 12
  pm.min_spare_servers = 8
  pm.max_spare_servers = 20
  pm.max_requests = 1000
  ```
- **PostgreSQL Settings (`postgresql.conf`):**
  ```ini
  shared_buffers = 2GB
  effective_cache_size = 6GB
  work_mem = 64MB
  maintenance_work_mem = 512MB
  max_connections = 200
  ```
- **Redis Settings (`redis.conf`):**
  ```ini
  maxmemory 1024mb
  maxmemory-policy allkeys-lru
  ```
- **Supervisor Workers:** `4` processes (`--timeout=120`).

---

#### 🟢 TIER 4: Enterprise Institusi (4-8 vCPU, 16 GB RAM — 300 s.d. 600 Siswa)
- **`php.ini` Settings:**
  ```ini
  memory_limit = 512M
  upload_max_filesize = 50M
  post_max_size = 50M
  max_execution_time = 240
  max_input_vars = 10000
  ```
- **PHP-FPM Settings:**
  ```ini
  pm = dynamic
  pm.max_children = 64
  pm.start_servers = 16
  pm.min_spare_servers = 10
  pm.max_spare_servers = 30
  pm.max_requests = 2000
  ```
- **PostgreSQL Settings (`postgresql.conf`):**
  ```ini
  shared_buffers = 4GB
  effective_cache_size = 12GB
  work_mem = 64MB
  maintenance_work_mem = 1GB
  max_connections = 300
  ```
- **Redis Settings (`redis.conf`):**
  ```ini
  maxmemory 2048mb
  maxmemory-policy allkeys-lru
  ```
- **Supervisor Workers:** `6` processes (`--timeout=180`).

---

#### 🟢 TIER 5: Ujian Akbar / Skala Nasional (8-16 vCPU, 32 GB RAM — 600 s.d. 1.200+ Siswa)
- **`php.ini` Settings:**
  ```ini
  memory_limit = 1024M
  upload_max_filesize = 100M
  post_max_size = 100M
  max_execution_time = 300
  max_input_vars = 10000
  ```
- **PHP-FPM Settings:**
  ```ini
  pm = dynamic
  pm.max_children = 128
  pm.start_servers = 32
  pm.min_spare_servers = 16
  pm.max_spare_servers = 48
  pm.max_requests = 3000
  ```
- **PostgreSQL Settings (`postgresql.conf`):**
  ```ini
  shared_buffers = 8GB
  effective_cache_size = 24GB
  work_mem = 128MB
  maintenance_work_mem = 2GB
  max_connections = 500
  ```
- **Redis Settings (`redis.conf`):**
  ```ini
  maxmemory 4096mb
  maxmemory-policy allkeys-lru
  ```
- **Supervisor Workers:** `8` processes (`--timeout=240`).

---

## 3. Pilihan Arsitektur Domain & Jaringan

TESLOKA CBT mendukung 3 pilihan arsitektur domain:

### Opsi A: Model Tiga Subdomain (Paling Direkomendasikan untuk Institusi)
Mengarahkan 3 DNS A-Record ke IP publik VPS Anda:
1. `staff.domainanda.ac.id`  → Portal Staf, Dosen/Guru, dan Pengawas Ruangan
2. `ujian.domainanda.ac.id`  → Portal Siswa Mengerjakan Ujian
3. `sertifikat.domainanda.ac.id` → Portal Publik Verifikasi Ijazah / SKHU (Tanpa Login)

*Ketiga domain ini dimasukkan bersamaan ke dalam satu Virtual Host situs aaPanel yang sama.*

### Opsi B: Model Single-Domain (1 Domain Saja)
Jika institusi hanya memiliki 1 domain (misal: `cbt.institusi.ac.id`):
- Portal Staf: `https://cbt.institusi.ac.id/staff/login`
- Portal Siswa: `https://cbt.institusi.ac.id/ujian/login`
- Portal Sertifikat: `https://cbt.institusi.ac.id/verifikasi-sertifikat`

### Opsi C: Model IP Lokal (Offline LAN Laboratorium Tanpa Internet)
Jika komputer laboratorium tidak terhubung ke internet:
- Akses via IP lokal server: `http://192.168.1.100/staff/login` dan `http://192.168.1.100/ujian/login`.

---

## 4. Instalasi aaPanel pada VPS Bersih

Jalankan perintah instalasi resmi aaPanel pada terminal SSH VPS Anda:

### Untuk Ubuntu / Debian:
```bash
wget -O install.sh http://www.aapanel.com/script/install-ubuntu_6.0_en.sh && sudo bash install.sh aapanel
```

### Untuk AlmaLinux / Rocky Linux / CentOS:
```bash
yum install -y wget && wget -O install.sh http://www.aapanel.com/script/install_6.0.sh && sh install.sh aapanel
```

Saat proses instalasi selesai, terminal akan menampilkan:
- **aaPanel Internet Address:** (contoh: `http://217.x.x.x:8888/aapanel`)
- **Username:** `xxxxxxxx`
- **Password:** `xxxxxxxx`

Buka alamat tersebut di browser Anda dan login ke dashboard aaPanel.

---

## 5. Instalasi Seluruh Komponen Stack di aaPanel

Setelah berhasil login ke aaPanel, masuk ke menu **App Store** di bilah kiri. Lakukan instalasi software berikut secara berurutan:

---

### 5.1 Nginx Web Server
1. Cari **Nginx** di App Store.
2. Pilih versi **Nginx 1.24** atau **Nginx 1.26+**.
3. Pilih metode instalasi: **Fast (Official package)** untuk instalasi cepat dalam 1-2 menit, atau **Compiled** jika menginginkan kompilasi modul kustom.

---

### 5.2 Node.js (Node Version Manager)
Node.js diperlukan untuk mengelola pustaka frontend dan kompilasi aset jika Anda menjalankan build langsung di server:
1. Di **aaPanel > App Store**, cari **Node.js Version Manager** lalu klik **Install**.
2. Setelah terpasang, klik **Settings** pada Node.js Version Manager.
3. Pada tab **Node version list**, instal versi LTS:
   - Pilih **v20.x.x (LTS)** atau **v22.x.x (LTS)**.
   - Klik **Install**, lalu setel versi tersebut sebagai versi default (*Set to command-line version*).
4. Verifikasi di terminal SSH:
   ```bash
   node -v
   npm -v
   ```

---

### 5.3 Python Environment (Penting untuk Supervisor & Scripting)
Python adalah dependensi dasar manajemen background process di server Linux:
1. Di **aaPanel > App Store**, cari **Python Version Manager** lalu pasang.
2. Pada tab version list, Anda dapat memasang **Python 3.10** atau **3.11**.
3. Pastikan juga paket Python native OS telah terpasang melalui terminal SSH:
   ```bash
   sudo apt install -y python3 python3-pip python3-venv python3-setuptools
   ```

---

### 5.4 PHP & Seluruh Ekstensi Wajib

TESLOKA berjalan optimal pada **PHP 8.3, 8.4, atau 8.5**.
1. Di **aaPanel > App Store**, cari **PHP** dan pasang versi **PHP 8.3** (atau 8.4/8.5).
2. Setelah PHP selesai terpasang, klik **Settings** pada PHP tersebut:
3. **Tab "Install Extensions" — PASANG EKSTENSI WAJIB BERIKUT:**
   - [x] **`pdo_pgsql`** *(Wajib: Koneksi database PostgreSQL)*
   - [x] **`pgsql`** *(Wajib: Driver PostgreSQL)*
   - [x] **`redis`** *(Wajib: Cache telemetri & antrean queue)*
   - [x] **`opcache`** *(Wajib: Caching bytecode PHP untuk respon instan < 50ms)*
   - [x] **`fileinfo`** *(Wajib: Validasi berkas upload soal & media)*
   - [x] **`exif`** *(Wajib: Metadata foto profil & identitas peserta)*
   - [x] **`gd`** *(Wajib: Pembuatan QR Code, watermark, & sertifikat kelulusan)*
   - [x] **`zip`** *(Wajib: Ekspor/impor butir soal zip & backup sistem)*
   - [x] **`bcmath`** *(Wajib: Kalkulasi rumus psikometri & pembobotan presisi tinggi)*
4. **Tab "Configuration (php.ini)":**
   Perbarui parameter sesuai Tier hardware Anda pada Bagian 2 (contoh Tier 2 / Standar):
   ```ini
   upload_max_filesize = 50M
   post_max_size = 50M
   memory_limit = 256M
   max_execution_time = 180
   max_input_vars = 5000
   ```
5. **Tab "Performance Tuning":**
   Sesuaikan parameter `pm.max_children` sesuai Tier hardware Anda (contoh: `12` untuk RAM 2GB, `24` untuk RAM 4GB, `64` untuk RAM 16GB).
6. Klik **Restart Service** pada PHP-FPM.

---

### 5.5 PostgreSQL Manager & Basis Data

PostgreSQL adalah **Single Source of Truth** permanen seluruh data ujian TESLOKA CBT.
1. Di **aaPanel > App Store**, cari dan pasang **PostgreSQL Manager** (Versi 15, 16, atau 17).
2. Setelah terpasang, buka **aaPanel > Database > PostgreSQL**:
   - Klik **Add Database**.
   - **Database Name:** `tesloka_cbt`
   - **Username:** `tesloka_user`
   - **Password:** *Buat password yang kuat dan aman (misal: `RahasiaCBT_2026!`)*
   - **Encoding:** `UTF8`
   - Klik **Submit**.
3. **Tuning `postgresql.conf`:**
   Buka file konfigurasi di `/www/server/pgsql/data/postgresql.conf` (atau `/etc/postgresql/<version>/main/postgresql.conf`), lalu sesuaikan parameter memori sesuai Tier hardware Anda:
   ```ini
   # Contoh untuk Tier 2 (VPS 4 GB RAM):
   shared_buffers = 1GB
   effective_cache_size = 3GB
   work_mem = 32MB
   maintenance_work_mem = 256MB
   max_connections = 120
   ```
4. **Konfigurasi Autentikasi `pg_hba.conf` (Anti-Error "Ident Authentication Failed"):**
   Buka file `pg_hba.conf` di folder data PostgreSQL yang sama, pastikan baris koneksi lokal IPv4 disetel ke `scram-sha-256` atau `md5`:
   ```text
   # TYPE  DATABASE        USER            ADDRESS                 METHOD
   host    all             all             127.0.0.1/32            scram-sha-256
   host    all             all             ::1/128                 scram-sha-256
   ```
5. Restart layanan PostgreSQL:
   ```bash
   sudo systemctl restart postgresql
   ```

---

### 5.6 Redis Server & Cache Policy

Redis digunakan khusus untuk cache sesi aktif, antrean queue background, dan telemetri pengawas.
1. Di **aaPanel > App Store**, cari dan pasang **Redis** (Versi 7.x atau 8.x).
2. Klik **Settings** pada Redis:
   - **Tab "Performance Tuning":** Atur `maxmemory` sesuai Tier hardware (misal `256mb` untuk RAM 2GB, `512mb` untuk RAM 4GB, `2048mb` untuk RAM 16GB).
   - **Tab "Configuration File":** Pastikan baris policy eviction disetel ke:
     ```ini
     maxmemory-policy allkeys-lru
     ```
     > [!WARNING]
     > **JANGAN gunakan `noeviction`!** Jika disetel `noeviction`, ketika memori Redis penuh, aplikasi akan mengalami error 500 (*OOM command not allowed*). Kebijakan `allkeys-lru` menjamin memori Redis selalu stabil dan cache kadaluarsa dibersihkan otomatis.
3. Klik **Save** dan **Restart** Redis.

---

### 5.7 Supervisor Manager (Solusi Error & Opsi Native Systemd)

> [!CAUTION]
> **ANALISIS MENDALAM: KENAPA SUPERVISOR MANAGER DI AAPANEL SERING ERROR?**
> Plugin GUI *Supervisor Manager* di App Store aaPanel menginstal dependensi supervisor ke dalam virtual environment internal Python aaPanel (`/www/server/panel/pyenv`). Pada sistem operasi Linux modern (seperti Ubuntu 22.04 LTS atau 24.04 LTS), kebijakan proteksi paket pip (PEP 668 *externally-managed-environment*) atau inkonsistensi versi Python sering menyebabkan instalasi plugin gagal, menu Supervisor tidak muncul, atau daemon supervisor tidak bisa *start* di panel.

Berikut adalah 2 opsi solusi tuntas:

#### 🔹 OPSI A: Memperbaiki Instalasi Plugin aaPanel "Supervisor Manager"
Jika Anda ingin tetap menggunakan tombol GUI di dalam panel aaPanel:
1. Sebelum menginstal Supervisor Manager, pastikan Anda telah memasang **Python Version Manager** di App Store dengan versi **Python 3.10** (atau Python bawaan aaPanel).
2. Masuk ke terminal SSH dan perbaiki dependensi pip di pyenv aaPanel:
   > [!WARNING]
   > **JANGAN PERNAH upgrade `setuptools` tanpa batas versi!** Mulai dari `setuptools >= 82` (seperti versi 84.x), modul `pkg_resources` telah dihapus resmi oleh pengembang Python. Jika setuptools ter-upgrade ke 82+, `supervisord` akan langsung crash dengan pesan error: `ModuleNotFoundError: No module named 'pkg_resources'`.
   
   Jalankan perintah bersih berikut (membersihkan sisa cache, mematok versi stabil `setuptools==68.0.0`, dan membuat template konfigurasi `/etc/supervisor/supervisord.conf`):
   ```bash
   # 1. Bersihkan modul & pasang versi stabil
   rm -rf /www/server/panel/pyenv/lib/python3.12/site-packages/setuptools*
   rm -rf /www/server/panel/pyenv/lib/python3.12/site-packages/pkg_resources*
   /www/server/panel/pyenv/bin/pip install setuptools==68.0.0 supervisor

   # 2. Buat file konfigurasi /etc/supervisor/supervisord.conf jika belum ada
   mkdir -p /etc/supervisor/conf.d /www/server/panel/plugin/supervisor/profile /www/server/panel/plugin/supervisor/log
   if [ ! -f /etc/supervisor/supervisord.conf ]; then
       /www/server/panel/pyenv/bin/echo_supervisord_conf > /etc/supervisor/supervisord.conf
       printf "\n[include]\nfiles = /etc/supervisor/conf.d/*.conf /www/server/panel/plugin/supervisor/profile/*.ini\n" >> /etc/supervisor/supervisord.conf
   fi

   # 3. Bersihkan socket lama dan restart service
   rm -f /tmp/supervisor.sock /var/run/supervisor.sock
   systemctl restart supervisord
   systemctl status supervisord
   ```
3. Kembali ke **aaPanel > App Store**, cari **Supervisor Manager**, klik **Install** (atau buka **Settings** jika sudah terpasang). Status layanan kini akan berwarna hijau normal (`RUNNING`).
4. Buka **Supervisor Manager > Settings > Add Daemon**:
   - **Name:** `tesloka-worker`
   - **Run User:** `www`
   - **Run Dir:** `/www/wwwroot/<nama-folder-situs>`
   - **Command:** `php artisan queue:work redis --sleep=3 --tries=3 --max-time=3600 --timeout=120`
   - **Processes:** Sesuaikan tabel Tier (misal: `2`).

---

#### 🔹 OPSI B: Menggunakan Native Linux Systemd Supervisor (SANGAT DIREKOMENDASIKAN / 100% BEBAS BUG)
Metode ini **jauh lebih stabil, tidak pernah error**, terintegrasi langsung dengan kernel Linux, dan otomatis berjalan saat VPS reboot:

1. Pasang package supervisor bawaan distro Linux melalui terminal SSH:
   ```bash
   # Ubuntu / Debian:
   sudo apt install -y supervisor

   # AlmaLinux / Rocky Linux:
   sudo dnf install -y supervisor
   ```
2. Pastikan layanan supervisor aktif di systemd:
   ```bash
   sudo systemctl enable supervisor
   sudo systemctl start supervisor
   ```
3. Buat file konfigurasi worker antrean TESLOKA:
   ```bash
   sudo nano /etc/supervisor/conf.d/tesloka-worker.conf
   ```
4. Masukkan konfigurasi berikut (sesuaikan path folder situs Anda):
   ```ini
   [program:tesloka-worker]
   process_name=%(program_name)s_%(process_num)02d
   command=php /www/wwwroot/cbt.institusi.ac.id/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600 --timeout=120
   autostart=true
   autorestart=true
   stopasgroup=true
   killasgroup=true
   user=www
   numprocs=2
   redirect_stderr=true
   stdout_logfile=/www/wwwroot/cbt.institusi.ac.id/storage/logs/worker.log
   stopwaitsecs=3600
   ```
   *(Ubah `numprocs=2` sesuai tier hardware Anda: `1` untuk RAM 2GB, `4` untuk RAM 8GB, `6` untuk RAM 16GB).*
5. Terapkan konfigurasi baru:
   ```bash
   sudo supervisorctl reread
   sudo supervisorctl update
   sudo supervisorctl start tesloka-worker:*
   ```
6. Cek status worker (harus berwarna hijau `RUNNING`):
   ```bash
   sudo supervisorctl status
   ```

---

## 6. Penempatan Kode & Konfigurasi Laravel

### 6.1 Membuat Folder Situs di aaPanel
1. Buka **aaPanel > Website > Add Site**:
   - **Domain:** Masukkan domain institusi Anda (contoh: `cbt.institusi.ac.id` atau jika multi-subdomain masukkan seluruhnya: `cbt.institusi.ac.id`, `staff.institusi.ac.id`, `ujian.institusi.ac.id`, `sertifikat.institusi.ac.id`).
   - **Root Path:** Biarkan default (`/www/wwwroot/cbt.institusi.ac.id`).
   - **PHP Version:** Pilih PHP yang telah diinstal (`PHP-83`, `PHP-84`, atau `PHP-85`).
   - Klik **Submit**.
2. Masuk ke folder situs via terminal SSH:
   ```bash
   cd /www/wwwroot/cbt.institusi.ac.id
   ```

---

### 6.2 Mengunduh Kode Rilis Resmi TESLOKA
Unduh kode rilis distribusi publik terbaru dari GitHub:
```bash
# Clone rilis publik langsung ke folder saat ini:
git clone https://github.com/mdodeep/Tesloka.git .
```

---

### 6.3 Menyiapkan Berkas Environment (`.env`)
Salin file konfigurasi contoh:
```bash
cp .env.example .env
nano .env
```
Sesuaikan bagian-bagian kunci berikut:
```ini
APP_NAME="TESLOKA CBT"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://cbt.institusi.ac.id

# LOGGING PRODUKSI
LOG_CHANNEL=daily
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

# POSTGRESQL (SESUAIKAN DENGAN DATABASE AAPANEL)
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=tesloka_cbt
DB_USERNAME=tesloka_user
DB_PASSWORD=PasswordDatabaseAndaYangAman

# REDIS CACHE & ANTRIAN
CACHE_STORE=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
REDIS_DB=0
REDIS_CACHE_DB=1
```

---

### 6.4 Inisialisasi Dependensi, Kunci, & Database
Jalankan rangkaian perintah instalasi resmi di terminal:
```bash
# 1. Pasang dependensi PHP (mode produksi tanpa dev packages):
composer install --no-dev --optimize-autoloader

# 2. Buat kunci enkripsi 32-byte aplikasi:
php artisan key:generate --force

# 3. Jalankan migrasi tabel database dan data seeder institusi:
php artisan migrate --force

# Pada server produksi (APP_ENV=production), jalankan ProductionSeeder (hanya 1 akun admin, 0 dummy data):
php artisan db:seed --class=ProductionSeeder --force
# (Kredensial awal Administrator: username 'admin', password 'Tesloka2026!')

# 4. Hubungkan symlink storage publik:
php artisan storage:link

# 5. Berikan hak akses penuh ke user web server aaPanel ('www'):
chown -R www:www /www/wwwroot/cbt.institusi.ac.id
chmod -R 775 storage bootstrap/cache

# 6. Kompilasi cache Laravel untuk performa maksimal:
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 7. Konfigurasi Nginx Virtual Host (Kritis: Anti-404 & Anti-403)

> [!IMPORTANT]
> **DUA LANGKAH PALING KRITIS DI AAPANEL AGAR TIDAK MENGALAMI 404 NOT FOUND ATAU 403 FORBIDDEN:**
>
> 1. **Running Directory Wajib `/public`:**
>    - Buka **aaPanel > Website > Klik Nama Domain Anda > Site Directory**.
>    - Pada dropdown **Running directory**, ubah dari `/` menjadi `/public`.
>    - Klik tombol **Save**! *(Langkah ini mutlak agar web server melayani folder `public/index.php`, bukan root proyek).*
>
> 2. **URL Rewrite Wajib Preset `laravel 5`:**
>    - Masih di jendela yang sama, klik tab **URL rewrite**.
>    - Pilih preset **laravel 5** dari daftar dropdown.
>    - Pastikan isinya memuat aturan redirect rute:
>      ```nginx
>      location / {
>          try_files $uri $uri/ /index.php?$query_string;
>      }
>      ```
>    - Klik tombol **Save**! *(Tanpa ini, setiap rute dinamis seperti `/ujian/login` atau `/staff/login` akan gagal dengan status 404).*

### 7.3 Memasang Sertifikat SSL Gratis (Let's Encrypt HTTPS)
1. Buka tab **SSL > Let's Encrypt**.
2. Centang seluruh domain dan subdomain yang mengarah ke VPS.
3. Klik **Apply**.
4. Setelah SSL aktif, hidupkan saklar **Force HTTPS**.

---

## 8. Konfigurasi Background Queue Worker & Cron Scheduler

### 8.1 Menjadwalkan Task Scheduler Otomatis (Tiap 1 Menit)
Scheduler Laravel bertugas memantau batas waktu sesi ujian secara otomatis, menutup ujian siswa yang habis waktu, dan memelihara token.
1. Buka **aaPanel > Cron**:
   - **Type of Task:** `Shell Script`
   - **Name of Task:** `TESLOKA Scheduler`
   - **Period:** `N Minutes` -> isi `1` Minute.
   - **Script Content:**
     ```bash
     cd /www/wwwroot/cbt.institusi.ac.id && php artisan schedule:run >> /dev/null 2>&1
     ```
   - Klik **Add Task**.

---

## 9. Verifikasi Kesiapan Sistem (Automated Health Check)

Buka terminal SSH VPS dan jalankan perintah diagnosa resmi bawaan TESLOKA:

```bash
php artisan tesloka:production-check
```

Sistem akan menguji secara otomatis:
- Versi PHP (>= 8.3)
- Ekstensi PHP wajib (pdo_pgsql, redis, gd, zip, bcmath, fileinfo, dll.)
- Koneksi database PostgreSQL & jumlah tabel aktif
- Latensi dan integritas Redis Server
- Status izin tulis direktori `storage/` dan `bootstrap/cache/`
- Integritas symlink `public/storage`
- Status `APP_KEY` dan profil institusi

Jika seluruh baris berstatus **PASS [OK]**, sistem CBT TESLOKA telah 100% siap digunakan untuk ujian digital nyata!

---

## 10. Panduan Pemecahan Masalah Lengkap (Troubleshooting A s.d. Z)

### 🔴 Kendala 1: Error 404 Not Found Saat Mengakses Halaman Login / Sub-Route
- **Penyebab:** Running directory di aaPanel masih mengarah ke root `/` atau URL Rewrite belum aktif.
- **Solusi 10 Detik:**
  1. Masuk ke **aaPanel > Website > Klik Domain Anda > Site Directory**.
  2. Ubah **Running directory** ke `/public`, klik **Save**.
  3. Buka tab **URL rewrite**, pilih preset **laravel 5**, klik **Save**.

---

### 🔴 Kendala 2: Error 500 Internal Server Error & Layar Putih (Blank)
- **Langkah Diagnosa:**
  1. Cek baris error riil di file log:
     ```bash
     tail -n 50 storage/logs/laravel.log
     ```
  2. Jalankan: `php artisan tesloka:production-check`
- **Solusi Cepat:**
  ```bash
  # Pastikan APP_KEY terbuat:
  php artisan key:generate --force

  # Perbaiki izin folder:
  chown -R www:www storage bootstrap/cache
  chmod -R 775 storage bootstrap/cache

  # Bersihkan cache lama:
  php artisan optimize:clear
  ```

---

### 🔴 Kendala 3: Supervisor Manager di aaPanel Gagal Start / `could not find config file /etc/supervisor/supervisord.conf`
- **Penyebab:** Pada aaPanel yang menggunakan Python 3.12 / pyenv terbaru, jika paket `setuptools` ter-upgrade ke versi 82+ (seperti 84.x), modul usang `pkg_resources` telah dihapus secara resmi oleh pengembang Python. Selain itu, file konfigurasi `/etc/supervisor/supervisord.conf` sering kali belum digenerate saat instalasi baru.
- **Solusi Tuntas (Perbaiki Plugin GUI aaPanel):**
  Jalankan perintah berikut di SSH untuk membersihkan file usang, mengunci `setuptools==68.0.0`, dan membuat file konfigurasi `/etc/supervisor/supervisord.conf`:
  ```bash
  rm -rf /www/server/panel/pyenv/lib/python3.12/site-packages/setuptools*
  rm -rf /www/server/panel/pyenv/lib/python3.12/site-packages/pkg_resources*
  /www/server/panel/pyenv/bin/pip install setuptools==68.0.0 supervisor
  mkdir -p /etc/supervisor/conf.d /www/server/panel/plugin/supervisor/profile /www/server/panel/plugin/supervisor/log
  if [ ! -f /etc/supervisor/supervisord.conf ]; then
      /www/server/panel/pyenv/bin/echo_supervisord_conf > /etc/supervisor/supervisord.conf
      printf "\n[include]\nfiles = /etc/supervisor/conf.d/*.conf /www/server/panel/plugin/supervisor/profile/*.ini\n" >> /etc/supervisor/supervisord.conf
  fi
  rm -f /tmp/supervisor.sock /var/run/supervisor.sock
  systemctl restart supervisord
  systemctl status supervisord
  ```
  *(Tips: Jika masih ingin melihat log detail penyebab crash, jalankan: `journalctl -xeu supervisord.service -n 20 --no-pager` atau tes langsung via foreground: `/www/server/panel/pyenv/bin/supervisord -n -c /etc/supervisor/supervisord.conf`).*
- **Solusi Alternatif Permanen (Gunakan Native Systemd Supervisor):**
  Jika tidak ingin bergantung pada lingkungan virtual Python internal aaPanel, gunakan supervisor native bawaan Ubuntu/Debian (Lihat panduan lengkap di **Bagian 5.7 Opsi B**):
  ```bash
  sudo apt install -y supervisor
  sudo systemctl enable supervisor && sudo systemctl start supervisor
  ```
  Lalu buat konfigurasi di `/etc/supervisor/conf.d/tesloka-worker.conf`.

---

### 🔴 Kendala 4: Composer Install Gagal / Muncul Pesan "Killed" (Out of Memory)
- **Penyebab:** Server kekurangan memori RAM fisik dan tidak memiliki Swap File.
- **Solusi:**
  Buat Swap File 2 GB sesuai panduan di **Bagian 1.2**, lalu ulangi:
  ```bash
  composer install --no-dev --optimize-autoloader
  ```

---

### 🔴 Kendala 5: Gagal `php artisan storage:link` (Link Already Exists)
- **Penyebab:** Symlink lama masih tertinggal saat deploy ulang.
- **Solusi:**
  ```bash
  rm -f public/storage
  php artisan storage:link
  ```

---

### 🔴 Kendala 6: Database Error "Ident authentication failed" atau "Connection refused"
- **Solusi:**
  1. Pastikan di `.env` tertulis `DB_HOST=127.0.0.1` (gunakan IP, jangan `localhost`).
  2. Periksa `pg_hba.conf`, pastikan baris koneksi lokal IPv4 disetel ke `scram-sha-256` atau `md5`.
  3. Restart PostgreSQL: `sudo systemctl restart postgresql`.

---

### 🔴 Kendala 7: Redis Error "OOM command not allowed when used memory > 'maxmemory'"
- **Penyebab:** Memori Redis penuh dan policy disetel ke `noeviction`.
- **Solusi:**
  Buka konfigurasi Redis, ubah:
  ```ini
  maxmemory-policy allkeys-lru
  ```
  Lalu restart Redis: `sudo systemctl restart redis`.
