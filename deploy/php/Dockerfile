FROM php:8.2-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add --no-cache \
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
    redis

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

RUN rm -rf /var/cache/apk/*

WORKDIR /var/www

RUN mkdir -p storage/framework/{views,cache,sessions} storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
