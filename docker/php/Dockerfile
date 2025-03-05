# Используем официальный образ PHP-FPM
FROM php:8.2-fpm

# Устанавливаем необходимые расширения PHP
RUN docker-php-ext-install pdo_mysql

# Устанавливаем Composer
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Копируем исходный код в контейнер
WORKDIR /var/www
COPY src /var/www

# Указываем рабочую директорию
WORKDIR /var/www/public