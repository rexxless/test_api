FROM php:8.2-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk update && apk add --no-cache \
    bash \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    icu-dev \
    postgresql-dev \
    oniguruma-dev \
    libxml2-dev \
    autoconf \
    g++ \
    make \
    pkgconfig \
    libpng-dev \
    jpeg-dev \
    nano \
    vim \
    re2c \
    file \
    dpkg-dev \
    dpkg

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    mbstring \
    bcmath \
    zip \
    intl \
    opcache

# Install Redis PHP extension
RUN pecl install redis && docker-php-ext-enable redis

# Clean up package cache and temporary files
RUN rm -rf /var/cache/apk/* /tmp/* /var/tmp/*

WORKDIR /var/www

RUN mkdir -p storage/framework/{views,cache,sessions} storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
