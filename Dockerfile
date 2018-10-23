FROM php:7.2-fpm-alpine

RUN docker-php-ext-install pdo_mysql
