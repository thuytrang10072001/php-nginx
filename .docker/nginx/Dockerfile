FROM php:8.3.3-fpm

RUN apt-get update -y \
    && apt-get install -y nginx

# PHP_CPPFLAGS are used by the docker-php-ext-* scripts
ENV PHP_CPPFLAGS="$PHP_CPPFLAGS -std=c++11"

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql 


COPY .docker/nginx/default.conf /etc/nginx/sites-enabled/default
COPY .docker/nginx/entrypoint.sh /etc/entrypoint.sh
RUN chmod +x /etc/entrypoint.sh

COPY --chown=www-data:www-data . /var/www/html

WORKDIR /var/www/html

EXPOSE 80 443

ENTRYPOINT ["/etc/entrypoint.sh"]