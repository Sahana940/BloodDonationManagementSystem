<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodconnectlife";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize POST data
$email = $conn->real_escape_string($_POST['email']);
$password = $_POST['password'];  // Raw password input for verification

// Prepare SQL statement to fetch user by email
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $user['password'])) {
        // Password is correct, create session and redirect
        $_SESSION['user_id'] = $user['id'];  // Assuming 'id' is primary key
        $_SESSION['user_name'] = $user['name'];
        header("Location: ../welcome.html");
        exit();
    } else {
        // Wrong password
        echo "<script>alert('Invalid email or password.'); window.location.href='../login.html';</script>";
    }
} else {
    // No user found
    echo "<script>alert('Invalid email or password.'); window.location.href='../login.html';</script>";
}

$stmt->close();
$conn->close();
?>
