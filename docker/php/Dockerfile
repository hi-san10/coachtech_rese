FROM php:7.4.9-fpm

COPY php.ini /usr/local/etc/php/

RUN apt update \
    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
    libpq-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-install pdo_mysql zip\
    gd \
    && docker-php-ext-install -j$(nproc) gd\
    && apt-get install -y \
    libmagickwand-dev imagemagick \
    && pecl install imagick \
    && docker-php-ext-enable imagick

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

WORKDIR /var/www
