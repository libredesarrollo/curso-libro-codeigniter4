#!/bin/bash
set -e

echo "🔄 Ejecutando migraciones..."
php spark migrate --all --force

echo "🚀 Iniciando servidor en puerto $PORT..."
php -S 0.0.0.0:$PORT -t public
