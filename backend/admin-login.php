<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodconnectlife";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Assuming predefined admin credentials:
    $admin_email = "admin@example.com";
    $admin_password_hash = password_hash("admin123", PASSWORD_DEFAULT); // Use the hashed password you saved

    if ($email === $admin_email && password_verify($password, $admin_password_hash)) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../admin-dashboard.html");
        exit;
    } else {
        echo "<script>alert('Invalid admin credentials'); window.location.href='../admin-login.html';</script>";
        exit;
    }
}
?>
