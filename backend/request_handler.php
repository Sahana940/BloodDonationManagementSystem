<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "bloodconnectlife");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize form inputs
$patient_name = $conn->real_escape_string($_POST['patient_name']);
$hospital_name = $conn->real_escape_string($_POST['hospital_name']);
$blood_group = $conn->real_escape_string($_POST['blood_group']);
$units = $conn->real_escape_string($_POST['units']);

// Insert into 'requests' table
$sql = "INSERT INTO requests (patient_name, hospital_name, blood_group,units) 
        VALUES ('$patient_name', '$hospital_name', '$blood_group','$units')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Blood request submitted successfully.'); window.location.href='../requests.html';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
