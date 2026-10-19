#!/bin/sh
# Jika APP_URL tidak di-set eksplisit, gunakan URL deployment Vercel
# secara otomatis (bisa berupa preview maupun production).
if [ -z "${APP_URL}" ] && [ -n "${VERCEL_URL}" ]; then
    export APP_URL="https://${VERCEL_URL}"
fi

exec frankenphp run --config /etc/frankenphp/Caddyfile