FROM dunglas/frankenphp:php8.4-bookworm

# Cài thư viện cần cho pdo_mysql
RUN apt-get update && apt-get install -y \
    libmysqlclient-dev \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . .

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
