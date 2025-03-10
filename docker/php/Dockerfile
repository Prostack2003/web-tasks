# Используем официальный образ PHP-FPM
FROM php:8.2-fpm

# Устанавливаем необходимые расширения PHP
RUN docker-php-ext-install pdo_mysql
RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "zip"]
RUN ["apt-get", "install", "-y", "unzip"]

# Устанавливаем Composer
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Указываем рабочую директорию
WORKDIR /var/www

# Копируем composer.json и composer.lock
COPY composer.json composer.lock /var/www/

# Устанавливаем зависимости Composer
RUN composer install --no-dev --optimize-autoloader

COPY src /var/www/src