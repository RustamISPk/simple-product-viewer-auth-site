FROM php:8.3-fpm


RUN apt-get update && apt-get install -y libzip-dev zip libpq-dev libpng-dev libjpeg-dev libwebp-dev redis chromium gdb wget

# Install PHP extensions
RUN docker-php-ext-configure gd --enable-gd --with-webp --with-jpeg  \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install sockets

RUN docker-php-ext-install pdo pdo_pgsql && docker-php-ext-enable pdo_pgsql

RUN apt-get install -y libc-client-dev libkrb5-dev  && rm -r /var/lib/apt/lists/*


# Install xdebug
RUN pecl install xdebug \
 && docker-php-ext-enable xdebug

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Copy php conf
COPY ./conf.d /usr/local/etc/php/conf.d

RUN usermod -u 1000 www-data \
  && chown -R www-data /var/www

RUN dbus-daemon --system

RUN usermod -u 1000 www-data \
  && chown -R www-data /var/www

USER www-data

# Set working directory
WORKDIR /
