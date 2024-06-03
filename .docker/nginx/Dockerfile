# FROM nginx:alpine
# ADD .docker/nginx/default.conf /etc/nginx/conf.d

# FROM php:8.3-fpm-alpine3.20


FROM php:8.3.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmemcached-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    librdkafka-dev \
    libpq-dev \
    openssh-server \
    zip \
    unzip \
    supervisor \
    sqlite3  \
    nano \
    cron
RUN apt-get update && apt-get install -y nginx

COPY . /var/www/html

WORKDIR /var/www/html

COPY .docker/nginx/default.conf /etc/nginx/conf.d/

EXPOSE 80



