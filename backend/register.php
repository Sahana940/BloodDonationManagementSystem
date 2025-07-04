<?php
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
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
$blood_group = $conn->real_escape_string($_POST['blood_group']);
$age = (int)$_POST['age'];
$phone = $conn->real_escape_string($_POST['phone']);

// Check if email already exists
$check_sql = "SELECT id FROM users WHERE email = '$email'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>alert('Email already registered! Please use a different email.'); window.location.href='../register.html';</script>";
} else {
    // Insert new user
    $sql = "INSERT INTO users (name, email, password, blood_group, age, phone) 
            VALUES ('$name', '$email', '$password_hashed', '$blood_group', $age, '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href='../login.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
