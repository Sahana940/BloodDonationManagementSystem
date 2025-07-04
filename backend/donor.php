<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$conn = new mysqli("localhost", "root", "", "bloodconnectlife");

if ($conn->connect_error) {
    echo json_encode([]);
    exit;
}

$result = $conn->query("SELECT * FROM donors ORDER BY id DESC");

$donors = [];
while ($row = $result->fetch_assoc()) {
    $donors[] = $row;
}

echo json_encode($donors);
$conn->close();
?>
