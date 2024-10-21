FROM php:8.2-fpm-alpine

WORKDIR /var/www/src

RUN docker-php-ext-install pdo pdo_mysql