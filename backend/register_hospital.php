<?php
$conn = new mysqli("localhost", "root", "", "bloodconnectlife");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hospital_name = $_POST['hospital_name'];
$email = $_POST['email'];
$city = $_POST['city'];

$stmt = $conn->prepare("INSERT INTO hospitals (hospital_name, email, city) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $hospital_name, $email, $city);

if ($stmt->execute()) {
    echo "<script>alert('Hospital registered successfully!'); window.location.href='../hospital.html';</script>";
} else {
    echo "<script>alert('Registration failed.'); window.location.href='../hospital.html';</script>";
}

$conn->close();
?>
