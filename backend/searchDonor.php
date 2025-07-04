<?php
session_start();

// Optional: protect the page from unauthenticated access
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "bloodconnectlife");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get blood group from GET parameter
$bloodGroup = isset($_GET['blood_group']) ? $conn->real_escape_string($_GET['blood_group']) : '';

echo "<!DOCTYPE html>
<html>
<head>
    <title>Blood Group Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 20px;
            padding: 20px;
        }
        h3 {
            color: #d9534f;
            text-align: center;
        }
        p {
            text-align: center;
            font-size: 18px;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #d9534f;
            color: white;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>";

if (empty($bloodGroup)) {
    echo "<p>Please select a blood group to search.</p>";
    echo "</body></html>";
    exit;
}

// Query from the donors table instead of users
$sql = "SELECT name, email, blood_group, phone FROM donors WHERE blood_group = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $bloodGroup);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h3>Registered Donors with Blood Group: $bloodGroup</h3>";
    echo "<table>
            <tr><th>Name</th><th>Email</th><th>Blood Group</th><th>Phone</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".htmlspecialchars($row['name'])."</td>
                <td>".htmlspecialchars($row['email'])."</td>
                <td>".htmlspecialchars($row['blood_group'])."</td>
                <td>".htmlspecialchars($row['phone'])."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No donors found with blood group <strong>$bloodGroup</strong>.</p>";
}

$stmt->close();
$conn->close();

echo "</body></html>";
?>
