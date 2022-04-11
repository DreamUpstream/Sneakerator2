FROM php:8.1-fpm-bullseye

RUN apt-get update && apt-get install -y \
        locales \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        ghostscript \
        git \
        zip libzip-dev \
        unzip
        
RUN curl -fsSL https://deb.nodesource.com/setup_17.x | bash - 
RUN apt-get install -y nodejs

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install zip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

COPY --from=composer:2.2.3 /usr/bin/composer /usr/bin/composer

COPY ./conf/* /usr/local/etc/php/conf.d