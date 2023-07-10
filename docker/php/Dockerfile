FROM php:8.1-fpm

RUN docker-php-ext-install mysqli
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev
RUN docker-php-ext-install zip

COPY ./ /var/www/
WORKDIR /var/www/

COPY conf.d/* $PHP_INI_DIR/conf.d/
#COPY conf.d/* /usr/local/etc/php/conf.d/