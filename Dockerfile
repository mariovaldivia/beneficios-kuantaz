FROM php:8.2.17-fpm

ARG UID
ARG HOME_DIR=/appdata/www
# Create user and some useful stuff
RUN adduser --disabled-password --gecos "" appuser
# RUN adduser -u ${UID} --disabled-password --gecos "" appuser
RUN usermod -aG sudo appuser
RUN mkdir /home/appuser/.ssh
RUN chown -R appuser:appuser /home/appuser/

# Install packages and PHP extensions
RUN apt update \
    && apt install -y git acl openssl openssh-client wget zip vim libssh-dev coreutils

# RUN set -eux; \
    # apt install -y --no-install-recommends \
    # zlib1g-dev libjpeg62-turbo-dev\
    # libzip-dev libxml2-dev libicu-dev\
    # libfreetype6 libonig-dev libxslt1-dev; 
    # rm -rf /var/lib/apt/lists/*

RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \

            libssl-dev \
            libwebp-dev \
            libxpm-dev \
            libmcrypt-dev \
            libonig-dev; \
    rm -rf /var/lib/apt/lists/*
RUN pecl install apcu

RUN docker-php-ext-install pdo pdo_mysql exif mbstring 
RUN docker-php-ext-enable --ini-name 05-opcache.ini opcache

# Install and update composer
RUN curl https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer
RUN composer self-update

RUN apt-get update && apt-get install -y nodejs npm

RUN mkdir -p /appdata/www

WORKDIR /appdata/www

RUN chown -R appuser:appuser ${HOME_DIR}
    # && usermod --uid appuser --home ${HOME_DIR} --shell /bin/bash www-data \
    # && groupmod --gid appuser www-data