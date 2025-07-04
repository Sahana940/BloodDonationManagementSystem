<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Database connection
$conn = new mysqli("localhost", "root", "", "bloodconnectlife");

// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed"]);
    exit;
}

// Get JSON data from request
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["success" => false, "error" => "Invalid JSON"]);
    exit;
}

// Sanitize and insert
$name = $conn->real_escape_string($data['name']);
$email = $conn->real_escape_string($data['email']);
$age = (int)$data['age'];
$gender = $conn->real_escape_string($data['gender']);
$blood_group = $conn->real_escape_string($data['blood_group']);
$phone = $conn->real_escape_string($data['phone']);

$sql = "INSERT INTO donors (name, email, age, gender, blood_group, phone)
        VALUES ('$name', '$email', $age, '$gender', '$blood_group', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>
