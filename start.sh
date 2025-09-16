#!/bin/bash

# Arranca PHP-FPM
php-fpm &

# Arranca Nginx en primer plano
nginx -g "daemon off;"
