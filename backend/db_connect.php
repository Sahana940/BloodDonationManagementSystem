<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "your_database_name"; // change this!

$mysqli = new mysqli($host, $user, $password, $dbname);
if ($mysqli->connect_errno) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => "Failed to connect to DB: " . $mysqli->connect_error]);
    exit;
}
