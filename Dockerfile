# Dependencies

FROM composer:latest as vendor

COPY database/ database/

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Frontend

FROM node:8-alpine as frontend

RUN mkdir -p /app/public

COPY package.json webpack.mix.js yarn.lock /app/
COPY resources/assets/ /app/resources/assets/

WORKDIR /app

RUN yarn install && yarn production

# Application

FROM php:7.2-fpm-alpine as opencycle

LABEL maintainer="Ben Speakman <https://github.com/threesquared>"

RUN apk update && apk add --no-cache postgresql-dev && docker-php-ext-install pdo_mysql pdo_pgsql

COPY . /var/www/html
COPY --from=vendor /app/vendor/ /var/www/html/vendor/
COPY --from=frontend /app/public/js/ /var/www/html/public/js/
COPY --from=frontend /app/public/css/ /var/www/html/public/css/
COPY --from=frontend /app/public/mix-manifest.json /var/www/html/public/mix-manifest.json

WORKDIR /var/www/html

ENV LOG_CHANNEL=stderr

RUN chgrp -R www-data /var/www/html/storage /var/www/html/bootstrap/cache && chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache
