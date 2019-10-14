FROM php:7.2-fpm-alpine

WORKDIR /var/www

# Packages
RUN apk add --no-cache \
    gcc g++ make wget unzip curl git \
    aspell-dev \
    autoconf \
    zlib-dev \
    subversion \
    freetype-dev \
    libjpeg-turbo-dev \
    libmcrypt-dev libltdl \
    libpng-dev \
    libtool \
    libbz2 \
    bzip2-dev \
    libstdc++ \
    libxslt-dev \
    openldap-dev \
    imagemagick-dev \
    hiredis-dev \
    ffmpeg \
    yaml-dev \
    postgresql-dev \

    # Pecl packages
    && pecl install imagick \
    && pecl install redis-5.0.2 \
    && pecl install xdebug-2.7.2 \
    && pecl install yaml-2.0.4 \


    # docker-php-ext-configure
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \

    # docker-php-ext-install
    && docker-php-ext-install \
        zip pdo_pgsql pgsql pdo_mysql mysqli opcache sockets mbstring json xmlrpc \
        bcmath pcntl xsl pspell bz2 gd \

    # docker-php-ext-enable
    && docker-php-ext-enable opcache imagick redis xdebug yaml

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

CMD php-fpm
