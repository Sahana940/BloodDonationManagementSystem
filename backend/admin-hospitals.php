<?php
$conn = new mysqli("localhost", "root", "", "bloodconnectlife");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM hospitals");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registered Hospitals - Admin</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<style>
    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }
    th {
      background-color: #dc3545;
      color: white;
    }
  </style>
<body>
  <h2>Registered Hospitals</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>ID</th>
      <th>Hospital Name</th>
      <th>Email</th>
      <th>City</th>
      <th>Registered On</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['hospital_name']) ?></td>
      <td><?= htmlspecialchars($row['email']) ?></td>
      <td><?= htmlspecialchars($row['city']) ?></td>
      <td><?= $row['registered_on'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
