FROM php:8.2-fpm

# Instala extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copia tu app
WORKDIR /var/www/html
COPY . .

# Copia configuración de Nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

CMD ["php-fpm"]