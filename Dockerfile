FROM dunglas/frankenphp:php8.4-bookworm

# Cài PDO + MySQL driver
RUN install-php-extensions pdo pdo_mysql

WORKDIR /app
COPY . .

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
