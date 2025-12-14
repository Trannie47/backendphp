<?php
$getenv = parse_ini_file(__DIR__ . "/../.env");
$host = $getenv("DB_HOST");
$port = $getenv("DB_PORT");
$db   = $getenv("DB_NAME");
$user = $getenv("DB_USER");
$pass = $getenv("DB_PASS");
$conn = new PDO(
    "mysql:host=$host;port=$port;dbname=$db;charset=utf8",
    $user,
    $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
    ]
);
