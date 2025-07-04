<?php
// Enable errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$conn = new mysqli("localhost", "root", "", "bloodconnectlife");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST["id"]);
    $status = $conn->real_escape_string($_POST["status"]);

    $sql = "UPDATE requests SET status = '$status' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to admin requests page
        header("Location: admin-requests.php");
        exit();
    } else {
        echo "Error updating request: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}
?>
