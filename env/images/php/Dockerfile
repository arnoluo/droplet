FROM php:7.2-fpm-alpine

WORKDIR /var/www

######## Modules Already included in this image:
# Core ctype curl date dom fileinfo filter ftp hash iconv json
# libxml mbstring mysqlnd openssl pcre PDO pdo_sqlite Phar posix
# readline Reflection session SimpleXML sodium SPL sqlite3
# standard tokenizer xml xmlreader xmlwriter zlib 
####################################################

RUN apk add --no-cache --virtual .build-deps \
    gcc g++ make unzip autoconf libtool

RUN apk add --no-cache \
    # common tools
    git vim \
    # zip bz2 pgsql modules
    libzip-dev bzip2-dev postgresql-dev \
    # gd
    freetype-dev libjpeg-turbo-dev libpng-dev \
    # imagick redis yaml packages
    imagemagick-dev hiredis-dev yaml-dev \

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
        zip sockets bcmath bz2 gd pcntl opcache \
        # pdo_mysql mysqli \
        pdo_pgsql pgsql \

    # docker-php-ext-enable
    && docker-php-ext-enable opcache imagick redis xdebug yaml

RUN apk del .build-deps

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

CMD php-fpm
