FROM jkaninda/nginx-php-fpm:8.3
# Copy laravel project files
COPY . /var/www/html
# Storage Volume
VOLUME /var/www/html/storage

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

USER www-data

# FROM php:8.0-fpm

# RUN apt-get update && apt-get install -y \
#     nginx \
#     libfreetype6-dev \
#     libjpeg62-turbo-dev \
#     libpng-dev \
#     libonig-dev \
#     libzip-dev \
#     zip \
#     unzip \
#     && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo pdo_mysql zip

# # Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Copy website files to the container
# WORKDIR /var/www/html
# COPY . .

# # Allow running Composer as root
# ENV COMPOSER_ALLOW_SUPERUSER=1

# # Install PHP dependencies
# # RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# # Copy Nginx configuration
# ADD .docker/nginx/default.conf /etc/nginx/conf.d/

# # Change ownership of the web root to www-data
# RUN chown -R www-data:www-data /var/www/html

# # Start Nginx and PHP-FPM
# CMD service php-fpm start && nginx -g 'daemon off;'


