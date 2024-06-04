FROM php:8.3.3-fpm

# Cài đặt các gói cần thiết
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
    sqlite3 \
    nano \
    cron \
    nginx

# Sao chép mã nguồn vào thư mục /var/www/html
COPY . /var/www/html

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Sao chép cấu hình Nginx
COPY .docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Thiết lập quyền sở hữu và quyền truy cập
RUN chown -R www-data:www-data /var/www/html

# Tạo file cấu hình supervisor
COPY .docker/nginx/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Mở cổng 80
EXPOSE 80

# Khởi động supervisor để quản lý Nginx và PHP-FPM

CMD ["php-fpm", "-F"]

CMD ["/usr/bin/supervisord"]