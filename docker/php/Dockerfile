# Use the official PHP-FPM image
FROM php:8.2-fpm

# Install required PHP extensions
RUN docker-php-ext-install bcmath

# Install system dependencies and PHP extensions needed by Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo pdo_mysql

# Install Xdebug (specific version 3.2.2)
RUN pecl install xdebug-3.2.2 && docker-php-ext-enable xdebug

# Define a build argument for the Xdebug config file path
ARG XDEBUG_INI=/usr/local/etc/php/conf.d/xdebug.ini
ARG XDEBUG_PATH=/usr/local/lib/php/extensions/no-debug-non-zts-2022082/xdebug.so

# Configure Xdebug
RUN echo    ${XDEBUG_PATH} > ${XDEBUG_INI} \
    && echo "xdebug.mode=debug" >> ${XDEBUG_INI} \
    && echo "xdebug.start_with_request=yes" >> ${XDEBUG_INI} \
    && echo "xdebug.client_host=192.168.11.213" >> ${XDEBUG_INI} \
    && echo "xdebug.client_port=9005" >> ${XDEBUG_INI} \
    && echo "xdebug.log=/var/log/xdebug.log" >> ${XDEBUG_INI}

# Install Composer (copying it from the official Composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Fix permissions for Laravel (so Apache can read the files)
RUN chown -R www-data:www-data /var/www/html
# RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
# RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN mkdir -p /var/log && touch /var/log/xdebug.log && \
    chown www-data:www-data /var/log/xdebug.log && chmod 664 /var/log/xdebug.log

# RUN php artisan migrate --force

# Expose PHP-FPM port (default 9000)
EXPOSE 9000

CMD ["php-fpm"]