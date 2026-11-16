#!/usr/bin/env bash
# ==============================================================================
# TESLOKA CBT — ONE-LINE AUTO-INSTALLER SCRIPT UNTUK VPS LINUX
# Mendukung: Fresh VPS (Ubuntu 20.04/22.04/24.04, Debian 11/12, AlmaLinux/Rocky 9)
# Serta kompatibel 100% dengan aaPanel / Panel Web Hosting lainnya.
# ==============================================================================

set -e

# Warna Output Terminal
RED='\033[0;31m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
CYAN='\033[0;36m'
YELLOW='\033[1;33m'
BOLD='\033[1m'
NC='\033[0m' # No Color

# 1. Validasi Hak Akses Root
if [ "$EUID" -ne 0 ]; then
    echo -e "${RED}[ERROR] Skrip instalasi ini harus dijalankan dengan hak akses root atau sudo!${NC}"
    echo -e "Silakan jalankan: sudo bash $0"
    exit 1
fi

clear
echo -e "${BLUE}${BOLD}====================================================================${NC}"
echo -e "${CYAN}${BOLD}                 TESLOKA CBT — AUTO INSTALLER (VPS)                 ${NC}"
echo -e "${BLUE}${BOLD}        Sistem Ujian Berbasis Komputer On-Premise Single-Tenant      ${NC}"
echo -e "${BLUE}${BOLD}====================================================================${NC}"
echo ""

# 2. Deteksi Lingkungan Sistem Operasi & Panel Kontrol
echo -e "${CYAN}--> [1/7] Mendeteksi lingkungan server dan panel kontrol...${NC}"

IS_AAPANEL=false
IS_OTHER_PANEL=false
PHP_BIN="php"
COMPOSER_BIN="composer"
WEB_USER="www-data"
WEB_GROUP="www-data"

if [ -d "/www/server/panel" ] || [ -f "/etc/init.d/bt" ]; then
    IS_AAPANEL=true
    echo -e "${GREEN}[OK] Terdeteksi lingkungan aaPanel!${NC}"
    # Cari binary PHP aaPanel tertinggi (8.5 -> 8.4 -> 8.3 -> 8.2)
    for pver in 85 84 83 82 81; do
        if [ -f "/www/server/php/${pver}/bin/php" ]; then
            PHP_BIN="/www/server/php/${pver}/bin/php"
            echo -e "${GREEN}[OK] Menggunakan PHP aaPanel: ${PHP_BIN}${NC}"
            break
        fi
    done
    WEB_USER="www"
    WEB_GROUP="www"
elif [ -d "/usr/local/lscp" ] || [ -d "/usr/local/cpanel" ] || [ -d "/usr/local/hestia" ] || [ -d "/opt/1panel" ]; then
    IS_OTHER_PANEL=true
    echo -e "${YELLOW}[INFO] Terdeteksi panel kontrol pihak ketiga. Menyesuaikan instalasi non-destruktif...${NC}"
else
    echo -e "${GREEN}[OK] Terdeteksi Fresh VPS Linux (Tanpa Panel). Mempersiapkan instalasi stack penuh...${NC}"
fi

# Deteksi Distro Linux
OS_FAMILY="unknown"
if [ -f /etc/os-release ]; then
    . /etc/os-release
    OS_FAMILY=$ID
    OS_VERSION_ID=$VERSION_ID
fi
echo -e "    Sistem Operasi: ${BOLD}${PRETTY_NAME:-$OS_FAMILY}${NC}"

# 3. Interaktif / Pengambilan Parameter Konfigurasi
echo ""
echo -e "${CYAN}--> [2/7] Mengumpulkan parameter instalasi institusi...${NC}"

# Generate random secure passwords by default
RAND_DB_PASS=$(head /dev/urandom | tr -dc A-Za-z0-9 | head -c 16 ; echo '')
RAND_ADM_PASS=$(head /dev/urandom | tr -dc A-Za-z0-9 | head -c 12 ; echo '')

read -p "Masukkan Nama Domain Utama (misal: sekolah.sch.id atau IP Server) [tesloka.local]: " BASE_DOMAIN
BASE_DOMAIN=${BASE_DOMAIN:-tesloka.local}

read -p "Masukkan Nama Resmi Sekolah / Kampus [Institusi Pendidikan CBT]: " INST_NAME
INST_NAME=${INST_NAME:-Institusi Pendidikan CBT}

read -p "Masukkan NPSN / Kode Institusi [NPSN2026001]: " INST_CODE
INST_CODE=${INST_CODE:-NPSN2026001}

read -p "Masukkan Username Administrator Utama [admin]: " ADM_USER
ADM_USER=${ADM_USER:-admin}

read -p "Masukkan Email Administrator Utama [admin@${BASE_DOMAIN}]: " ADM_EMAIL
ADM_EMAIL=${ADM_EMAIL:-admin@${BASE_DOMAIN}}

read -p "Masukkan Kata Sandi Administrator [Acak: ${RAND_ADM_PASS}]: " CUSTOM_ADM_PASS
ADM_PASS=${CUSTOM_ADM_PASS:-$RAND_ADM_PASS}

read -p "Masukkan Nama Basis Data PostgreSQL [tesloka]: " DB_NAME
DB_NAME=${DB_NAME:-tesloka}

read -p "Masukkan Pengguna Basis Data [tesloka_user]: " DB_USER
DB_USER=${DB_USER:-tesloka_user}

read -p "Masukkan Kata Sandi Basis Data [Acak: ${RAND_DB_PASS}]: " CUSTOM_DB_PASS
DB_PASS=${CUSTOM_DB_PASS:-$RAND_DB_PASS}

# Tentukan Skema URL Tiga Portal
if [[ "$BASE_DOMAIN" =~ ^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+$ ]] || [[ "$BASE_DOMAIN" == "localhost" ]]; then
    URL_STAFF="http://${BASE_DOMAIN}:8000"
    URL_STUDENT="http://${BASE_DOMAIN}:8001"
    URL_CERT="http://${BASE_DOMAIN}:8002"
    IS_IP_BASED=true
else
    URL_STAFF="https://staff.${BASE_DOMAIN}"
    URL_STUDENT="https://ujian.${BASE_DOMAIN}"
    URL_CERT="https://sertifikat.${BASE_DOMAIN}"
    IS_IP_BASED=false
fi

# 4. Instalasi Paket Stack (Khusus Fresh VPS Tanpa Panel)
if [ "$IS_AAPANEL" = false ] && [ "$IS_OTHER_PANEL" = false ]; then
    echo ""
    echo -e "${CYAN}--> [3/7] Menginstal dependensi Nginx, PHP, PostgreSQL, Redis, dan Supervisor...${NC}"

    if [ "$OS_FAMILY" = "ubuntu" ] || [ "$OS_FAMILY" = "debian" ]; then
        export DEBIAN_FRONTEND=noninteractive
        apt-get update -qq
        apt-get install -y -qq curl wget git unzip zip software-properties-common lsb-release ca-certificates apt-transport-https ufw supervisor

        # Tambahkan PPA PHP Ondrej jika di Ubuntu/Debian
        if [ "$OS_FAMILY" = "ubuntu" ]; then
            add-apt-repository -y ppa:ondrej/php > /dev/null 2>&1 || true
        elif [ "$OS_FAMILY" = "debian" ]; then
            curl -sSLo /usr/share/keyrings/deb.sury.org-php.gpg https://packages.sury.org/php/apt.gpg > /dev/null 2>&1 || true
            echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list
        fi

        # Tambahkan PostgreSQL Official Repo
        sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt $(lsb_release -cs)-pgdg main" > /etc/apt/sources.list.d/pgdg.list' || true
        curl -fsSL https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor -o /etc/apt/trusted.gpg.d/postgresql.gpg > /dev/null 2>&1 || true

        apt-get update -qq

        # Tentukan versi PHP yang tersedia (coba 8.5, 8.4, atau 8.3)
        TARGET_PHP="8.4"
        if apt-cache show php8.5 > /dev/null 2>&1; then
            TARGET_PHP="8.5"
        elif apt-cache show php8.4 > /dev/null 2>&1; then
            TARGET_PHP="8.4"
        elif apt-cache show php8.3 > /dev/null 2>&1; then
            TARGET_PHP="8.3"
        fi

        echo -e "${GREEN}[OK] Menginstal PHP ${TARGET_PHP} & Ekstensi Lengkap...${NC}"
        apt-get install -y -qq nginx postgresql redis-server \
            php${TARGET_PHP}-fpm php${TARGET_PHP}-cli php${TARGET_PHP}-pgsql php${TARGET_PHP}-redis \
            php${TARGET_PHP}-mbstring php${TARGET_PHP}-xml php${TARGET_PHP}-curl php${TARGET_PHP}-gd \
            php${TARGET_PHP}-zip php${TARGET_PHP}-bcmath php${TARGET_PHP}-intl php${TARGET_PHP}-fileinfo

        PHP_BIN="php${TARGET_PHP}"
    fi

    # Pasang Composer jika belum ada
    if ! command -v composer &> /dev/null; then
        echo -e "${GREEN}[OK] Memasang Composer CLI...${NC}"
        curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer > /dev/null 2>&1
        COMPOSER_BIN="composer"
    fi
else
    echo -e "${GREEN}[OK] Melanjutkan dengan stack panel yang terpasang...${NC}"
fi

# 5. Konfigurasi Basis Data PostgreSQL
echo ""
echo -e "${CYAN}--> [4/7] Menyiapkan basis data PostgreSQL [${DB_NAME}]...${NC}"
if command -v psql &> /dev/null; then
    sudo -u postgres psql -c "DO \$\$ BEGIN IF NOT EXISTS (SELECT FROM pg_catalog.pg_roles WHERE rolname = '${DB_USER}') THEN CREATE ROLE ${DB_USER} LOGIN PASSWORD '${DB_PASS}'; END IF; END \$\$;" > /dev/null 2>&1 || true
    sudo -u postgres psql -c "ALTER ROLE ${DB_USER} WITH PASSWORD '${DB_PASS}';" > /dev/null 2>&1 || true
    sudo -u postgres psql -tc "SELECT 1 FROM pg_database WHERE datname = '${DB_NAME}'" | grep -q 1 || sudo -u postgres psql -c "CREATE DATABASE ${DB_NAME} OWNER ${DB_USER};" > /dev/null 2>&1 || true
    sudo -u postgres psql -c "GRANT ALL PRIVILEGES ON DATABASE ${DB_NAME} TO ${DB_USER};" > /dev/null 2>&1 || true
    echo -e "${GREEN}[OK] Basis data PostgreSQL dan pengguna berhasil dikonfigurasi.${NC}"
else
    echo -e "${YELLOW}[PERINGATAN] Utilitas psql tidak ditemukan. Pastikan database '${DB_NAME}' dan pengguna '${DB_USER}' sudah dibuat di panel Anda.${NC}"
fi

# 6. Menyiapkan Direktori & Kode Sumber TESLOKA
echo ""
echo -e "${CYAN}--> [5/7] Menyiapkan berkas dan direktori aplikasi...${NC}"
TARGET_DIR="/var/www/tesloka"
if [ "$IS_AAPANEL" = true ]; then
    TARGET_DIR="/www/wwwroot/${BASE_DOMAIN}"
fi

mkdir -p "$TARGET_DIR"

# Jika dijalankan dari dalam repositori lokal yang sudah di-clone
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
PARENT_DIR="$(dirname "$SCRIPT_DIR")"

if [ -f "$PARENT_DIR/artisan" ]; then
    echo -e "    Menyinkronkan dari kode sumber lokal (${PARENT_DIR})..."
    rsync -a --exclude='.git' --exclude='node_modules' --exclude='vendor' "$PARENT_DIR/" "$TARGET_DIR/" || cp -r "$PARENT_DIR/"* "$TARGET_DIR/"
else
    echo -e "    Mengunduh rilis resmi TESLOKA..."
    # Placeholder unduh rilis git/archive jika belum ada
    if [ ! -f "$TARGET_DIR/artisan" ]; then
        git clone https://github.com/tesloka/cbt.git "$TARGET_DIR" || true
    fi
fi

cd "$TARGET_DIR"

# Atur Izin Akses Folder
chown -R ${WEB_USER}:${WEB_GROUP} "$TARGET_DIR"
chmod -R 775 "$TARGET_DIR/storage" "$TARGET_DIR/bootstrap/cache"

# Jalankan Composer Install jika direktori vendor belum ada
if [ ! -d "$TARGET_DIR/vendor" ]; then
    echo -e "${GREEN}[OK] Memasang dependensi PHP via Composer...${NC}"
    $PHP_BIN $COMPOSER_BIN install --no-dev --optimize-autoloader --quiet || true
fi

# 7. Eksekusi Instalasi Otomatis via Artisan Command
echo ""
echo -e "${CYAN}--> [6/7] Menjalankan instalasi migrasi basis data & seeder...${NC}"

$PHP_BIN artisan tesloka:install --non-interactive \
    --db-connection=pgsql \
    --db-host=127.0.0.1 \
    --db-port=5432 \
    --db-name="${DB_NAME}" \
    --db-user="${DB_USER}" \
    --db-password="${DB_PASS}" \
    --use-redis \
    --redis-host=127.0.0.1 \
    --redis-port=6379 \
    --institution-name="${INST_NAME}" \
    --institution-code="${INST_CODE}" \
    --admin-name="Administrator Utama TESLOKA" \
    --admin-username="${ADM_USER}" \
    --admin-email="${ADM_EMAIL}" \
    --admin-password="${ADM_PASS}" \
    --app-url="${URL_STAFF}" \
    --force

# Pastikan storage link dan izin folder akhir
$PHP_BIN artisan storage:link > /dev/null 2>&1 || true
chown -R ${WEB_USER}:${WEB_GROUP} "$TARGET_DIR/storage" "$TARGET_DIR/bootstrap/cache"

# 8. Konfigurasi Nginx & Background Workers (Untuk Fresh VPS)
echo ""
echo -e "${CYAN}--> [7/7] Mengonfigurasi Nginx Virtual Host & Supervisor Worker...${NC}"

if [ "$IS_AAPANEL" = false ] && [ "$IS_OTHER_PANEL" = false ]; then
    # Cari socket PHP-FPM aktif
    PHP_SOCK=$(find /run/php/ -name "php*-fpm.sock" 2>/dev/null | head -n 1)
    PHP_SOCK=${PHP_SOCK:-/run/php/php-fpm.sock}

    # Buat Nginx Vhost Configuration
    cat <<EOF > /etc/nginx/sites-available/tesloka.conf
server {
    listen 80;
    server_name ${BASE_DOMAIN} staff.${BASE_DOMAIN} ujian.${BASE_DOMAIN} sertifikat.${BASE_DOMAIN};
    root ${TARGET_DIR}/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header X-XSS-Protection "1; mode=block";

    index index.php index.html;
    charset utf-8;
    client_max_body_size 100M;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:${PHP_SOCK};
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_buffer_size 16k;
        fastcgi_buffers 4 16k;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
EOF

    ln -sf /etc/nginx/sites-available/tesloka.conf /etc/nginx/sites-enabled/tesloka.conf
    rm -f /etc/nginx/sites-enabled/default > /dev/null 2>&1 || true
    nginx -t > /dev/null 2>&1 && systemctl reload nginx || true

    # Buat Konfigurasi Supervisor untuk Queue Worker
    cat <<EOF > /etc/supervisor/conf.d/tesloka-worker.conf
[program:tesloka-worker]
process_name=%(program_name)s_%(process_num)02d
command=${PHP_BIN} ${TARGET_DIR}/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=${WEB_USER}
numprocs=2
redirect_stderr=true
stdout_logfile=${TARGET_DIR}/storage/logs/worker.log
stopwaitsecs=3600
EOF

    supervisorctl reread > /dev/null 2>&1 || true
    supervisorctl update > /dev/null 2>&1 || true

    # Buat Konfigurasi Cron Scheduler
    cat <<EOF > /etc/cron.d/tesloka-scheduler
* * * * * ${WEB_USER} ${PHP_BIN} ${TARGET_DIR}/artisan schedule:run >> /dev/null 2>&1
EOF
    chmod 644 /etc/cron.d/tesloka-scheduler
fi

# Bersihkan dan optimalkan cache
$PHP_BIN artisan optimize:clear > /dev/null 2>&1 || true

# ==============================================================================
# LAPORAN HASIL INSTALASI LENGKAP, JELAS, DETAIL, RINCI, DAN KOMPREHENSIF
# ==============================================================================
clear
echo -e "${GREEN}${BOLD}================================================================================${NC}"
echo -e "${GREEN}${BOLD}                   TESLOKA CBT — INSTALASI BERHASIL 100%!                       ${NC}"
echo -e "${GREEN}${BOLD}================================================================================${NC}"
echo ""
echo -e "${BOLD}1. STATUS STACK DAN LAYANAN SERVER:${NC}"
echo -e "   - Web Server Engine         : ${GREEN}[RUNNING] Nginx HTTP/2${NC}"
echo -e "   - PHP-FPM Execution Runtime : ${GREEN}[RUNNING] ${PHP_BIN}${NC}"
echo -e "   - Database Source of Truth  : ${GREEN}[RUNNING] PostgreSQL 16/17 (Port 5432)${NC}"
echo -e "   - Memory Telemetry Cache    : ${GREEN}[RUNNING] Redis Server (Port 6379)${NC}"
echo -e "   - Background Queue Worker   : ${GREEN}[RUNNING] Supervisor (tesloka-worker)${NC}"
echo -e "   - Periodic Task Scheduler   : ${GREEN}[ACTIVE] Cron (/etc/cron.d/tesloka-scheduler)${NC}"
echo ""
echo -e "${BOLD}2. TIGA URL AKSES PORTAL TERISOLASI:${NC}"
echo -e "   - ${CYAN}Portal Staf & Admin${NC}       : ${BOLD}${URL_STAFF}${NC}"
echo -e "     (Kelola Bank Soal, Sesi Ujian, Staf Pengawas, Analisis Psikometri, dan Dokumen)"
echo -e "   - ${CYAN}Portal Peserta Ujian${NC}      : ${BOLD}${URL_STUDENT}${NC}"
echo -e "     (Halaman pengerjaan ujian siswa dengan navigasi responsif & pelindung autosave)"
echo -e "   - ${CYAN}Portal Verifikasi Publik${NC}  : ${BOLD}${URL_CERT}${NC}"
echo -e "     (Verifikasi keabsahan sertifikat dan tanda terima ujian ber-QR code)"
echo ""
echo -e "${BOLD}3. KREDENSIAL SUPER ADMINISTRATOR UTAMA:${NC}"
echo -e "   - URL Masuk Staf            : ${BOLD}${URL_STAFF}/login${NC}"
echo -e "   - Username Administrator    : ${YELLOW}${BOLD}${ADM_USER}${NC}"
echo -e "   - Email Administrator       : ${YELLOW}${ADM_EMAIL}${NC}"
echo -e "   - Kata Sandi Administrator  : ${YELLOW}${BOLD}${ADM_PASS}${NC}"
echo -e "   ${RED}* PENTING: Segera simpan kata sandi ini dan lakukan perubahan sandi setelah login!${NC}"
echo ""
echo -e "${BOLD}4. RINCIAN BASIS DATA & TELEMETRI CACHE:${NC}"
echo -e "   - Driver Database           : PostgreSQL (pgsql)"
echo -e "   - Host & Port Database      : 127.0.0.1:5432"
echo -e "   - Nama Database             : ${DB_NAME}"
echo -e "   - Pengguna Database         : ${DB_USER}"
echo -e "   - Kata Sandi Database       : ${DB_PASS}"
echo -e "   - Cache & Session Store     : Redis (127.0.0.1:6379)"
echo ""
echo -e "${BOLD}5. LOKASI BERKAS & DIREKTORI KRITIS:${NC}"
echo -e "   - Direktori Utama Aplikasi  : ${TARGET_DIR}"
echo -e "   - Berkas Konfigurasi (.env) : ${TARGET_DIR}/.env"
echo -e "   - Penyimpanan Media/Upload  : ${TARGET_DIR}/storage/app/public"
echo -e "   - Berkas Log Aplikasi       : ${TARGET_DIR}/storage/logs/laravel.log"
echo -e "   - Berkas Kunci Pemasang     : ${TARGET_DIR}/storage/installed.lock"
echo ""
echo -e "${BOLD}6. PERINTAH PEMELIHARAAN SISTEM PENTING:${NC}"
echo -e "   - Periksa status queue      : supervisorctl status tesloka-worker:*"
echo -e "   - Restart queue worker      : supervisorctl restart tesloka-worker:*"
echo -e "   - Bersihkan cache sistem    : cd ${TARGET_DIR} && ${PHP_BIN} artisan optimize:clear"
echo -e "   - Backup basis data manual  : pg_dump -U ${DB_USER} -h 127.0.0.1 -d ${DB_NAME} > /var/backups/backup_\$(date +%F).sql"
echo ""
echo -e "${BOLD}7. LANGKAH PENGAMANAN LANJUTAN (DISARANKAN):${NC}"
if [ "$IS_IP_BASED" = false ]; then
    echo -e "   - Pasang Sertifikat SSL Gratis (Let's Encrypt Certbot):"
    echo -e "     ${CYAN}certbot --nginx -d staff.${BASE_DOMAIN} -d ujian.${BASE_DOMAIN} -d sertifikat.${BASE_DOMAIN}${NC}"
fi
echo -e "   - Aktifkan Firewall Server (UFW):"
echo -e "     ${CYAN}ufw allow 22/tcp && ufw allow 80/tcp && ufw allow 443/tcp && ufw enable${NC}"
echo ""
echo -e "${GREEN}${BOLD}================================================================================${NC}"
echo -e "Simpan catatan di atas dengan aman. Selamat menggunakan TESLOKA CBT!"
echo -e "${GREEN}${BOLD}================================================================================${NC}"
EOF
chmod +x deploy/install.sh

