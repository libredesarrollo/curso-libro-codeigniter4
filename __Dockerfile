FROM php:8.2-fpm

# Instala extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Instala Nginx
RUN apt-get update && apt-get install -y nginx && rm -rf /var/lib/apt/lists/*

# Copia tu app
WORKDIR /var/www/html
COPY . .

# Copia configuración de Nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Copia script de arranque
COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80

# Ejecuta el script que levanta PHP-FPM + Nginx
CMD ["/start.sh"]