FROM php:8.2-fpm

RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl \
    iputils-ping \
    ca-certificates && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*


#CMD ["chown", "-R", "1000:1000", "/var/www/html"]

RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN pecl install xdebug-3.3.2 && docker-php-ext-enable xdebug

COPY docker/php/conf.d/* $PHP_INI_DIR/conf.d/
COPY . /var/www/html

RUN mkdir -p /var/www/html/storage

CMD ["php-fpm"]
