FROM php:7.2-fpm-alpine

WORKDIR /var/www

# Packages
RUN apk update && apk add --no-cache \
    # common tools
    gcc g++ make wget unzip git vim \
    # for ext php modules
    autoconf libtool \
    # curl zlib zip pspell openssl bz2 modules
    curl-dev zlib-dev libzip-dev aspell-dev openssl-dev bzip2-dev \
    # gd
    freetype-dev libjpeg-turbo-dev libpng-dev \
    # imagick redis yaml packages
    imagemagick-dev hiredis-dev yaml-dev \
    # pgsql
    postgresql-dev \

    # Pecl packages
    && pecl install imagick \
    && pecl install redis-5.0.2 \
    && pecl install xdebug-2.7.2 \
    && pecl install yaml-2.0.4 \

    # docker-php-ext-configure
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include \
    && docker-php-ext-configure zip --with-libzip \

    # docker-php-ext-install
    && docker-php-ext-install \
        pgsql pdo_mysql mysqli \
        curl zip sockets mbstring \
        bcmath pspell bz2 gd \
        pcntl openssl opcache\

    # docker-php-ext-enable
    && docker-php-ext-enable opcache imagick redis xdebug yaml \
    && rm -rf /tmp/pear

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

CMD php-fpm
