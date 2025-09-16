# Reemplaza $PORT en nginx.conf
envsubst '$PORT' < /etc/nginx/conf.d/default.conf > /etc/nginx/conf.d/default_run.conf

# Arranca PHP-FPM
php-fpm &

# Arranca Nginx con la configuración reemplazada
nginx -g "daemon off;" -c /etc/nginx/nginx.conf