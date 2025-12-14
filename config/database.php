<?php

header('Content-Type: application/json');

$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$port = getenv('DB_PORT') ?: 3306;

if (!$host || !$db || !$user || !$pass) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Missing database environment variables'
    ]);
    exit;
}

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

    $conn = new PDO(
        $dsn,
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

            // 🔐 BẮT BUỘC cho Aiven
            PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Database connection failed',
        'message' => $e->getMessage()
    ]);
    exit;
}
