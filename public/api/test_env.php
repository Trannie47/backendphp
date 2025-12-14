<?php
header('Content-Type: application/json');
require __DIR__ . '/../../config/database.php';

try {
    $stmt = $conn->query("SELECT 1");
    echo json_encode([
        'status' => 'OK',
        'db' => getenv('DB_NAME')
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}
