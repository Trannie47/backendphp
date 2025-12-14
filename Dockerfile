FROM php:8.2-cli

# Cài PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app
COPY . .

# Railway cấp port qua biến PORT
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT} -t public"]
