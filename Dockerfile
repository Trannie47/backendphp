FROM dunglas/frankenphp:php8.4-bookworm

# Cài PDO MySQL (BẮT BUỘC)
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    libmysqlclient-dev \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . .

# Railway cấp PORT động → PHẢI dùng biến PORT
EXPOSE 3000

CMD sh -c 'frankenphp run --port ${PORT} --root /app'
