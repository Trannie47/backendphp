<?php
require "../config/database.php";

$id    = $_POST['id'];
$name  = $_POST['name'];
$email = $_POST['email'];

$sql = "UPDATE Students SET name=?, email=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$name, $email, $id]);

echo json_encode(["status" => "updated"]);
