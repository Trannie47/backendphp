<?php

// ===== LOAD .env CHỈ KHI CHẠY LOCAL =====
$envFile = __DIR__ . '/../.env';

if (file_exists($envFile)) {
    $env = parse_ini_file($envFile);
    foreach ($env as $key => $value) {
        putenv("$key=$value");
    }
}

// ===== LẤY BIẾN MÔI TRƯỜNG =====
$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$port = getenv('DB_PORT') ?: 3306;

if (!$host || !$db || !$user) {
    die('Missing database environment variables');
}

// ===== KẾT NỐI DB =====
$conn = new PDO(
    "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
    $user,
    $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
    ]
);
