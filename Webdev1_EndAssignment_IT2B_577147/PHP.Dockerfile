FROM php:fpm

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y git unzip libzip-dev

RUN docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/zz-docker.conf
