FROM php:8.0-fpm

RUN apt-get update  \
    && apt-get install -y zlib1g-dev libicu-dev libxml2-dev libpng-dev libzip-dev \
    && docker-php-ext-install bcmath pdo_mysql zip intl soap opcache pcntl calendar gd \
    && apt-get remove -y zlib1g-dev libicu-dev libxml2-dev

RUN useradd -ms /bin/bash student

# install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

USER student
