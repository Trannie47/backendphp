FROM dunglas/frankenphp:php8.4-bookworm

# Cài PDO MySQL
RUN apt-get update && apt-get install -y \
    libmysqlclient-dev \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . .

# Railway cấp PORT
ENV PORT=8080
EXPOSE 8080

# Serve thư mục /app
CMD ["frankenphp", "run", "--port", "8080", "--root", "/app"]
