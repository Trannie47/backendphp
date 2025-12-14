<?php
require "../config/database.php";

$stmt = $conn->query("SELECT * FROM Students");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
