#!/bin/sh
set -e

# Fallback APP_KEY jika belum di-set di environment Vercel
if [ -z "${APP_KEY}" ]; then
    export APP_KEY="base64:jfPRwnWxp+pKOA68AEbTKe8y2+rzBEw1OT/EC9DObNE="
fi

# Jika APP_URL tidak di-set eksplisit, gunakan URL deployment Vercel
if [ -z "${APP_URL}" ] && [ -n "${VERCEL_URL}" ]; then
    export APP_URL="https://${VERCEL_URL}"
fi

# Inisialisasi SQLite database otomatis jika menggunakan driver sqlite
if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    DB_FILE="${DB_DATABASE:-/app/database/database.sqlite}"
    if [ ! -f "${DB_FILE}" ]; then
        echo "Creating SQLite database at ${DB_FILE}..."
        touch "${DB_FILE}"
        php artisan migrate --force --isolated || true
        php artisan db:seed --force || true
    fi
fi

# Cache konfigurasi dan route untuk performa produksi
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

exec frankenphp run --config /etc/frankenphp/Caddyfile