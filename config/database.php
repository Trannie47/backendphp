<?php
// ===== LOAD .env FILE =====
$envFile = __DIR__ . '/../.env';

if (!file_exists($envFile)) {
    die('Missing .env file');
}

$env = parse_ini_file($envFile);

$host = $env['DB_HOST'];
$port = $env['DB_PORT'];
$db   = $env['DB_NAME'];
$user = $env['DB_USER'];
$pass = $env['DB_PASS'];

$conn = new PDO(
    "mysql:host=$host;port=$port;dbname=$db;charset=utf8",
    $user,
    $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
    ]
);
