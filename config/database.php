<?php
// ===== LOAD .env FILE =====
$envFile = __DIR__ . '/../.env';

if (!file_exists($envFile)) {
    die('Missing .env file');
}

$env = parse_ini_file($envFile);
$host = getenv('DB_HOST')?:$env['DB_HOST'];
$db   = getenv('DB_NAME')?:$env['DB_PORT'];
$user = getenv('DB_USER')?:$env['DB_USER'];
$pass = getenv('DB_PASS')?:$env['DB_PASS'];;
$port = getenv('DB_PORT') ?: 3306;

$conn = new PDO(
    "mysql:host=$host;port=$port;dbname=$db;charset=utf8",
    $user,
    $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
    ]
);
