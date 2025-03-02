# Используем официальный образ Nginx
FROM nginx:latest

# Копируем конфигурацию Nginx
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Копируем статические файлы (если есть)
COPY src/public /var/www/public