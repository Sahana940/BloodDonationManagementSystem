<?php
$conn = new mysqli("localhost", "root", "", "bloodconnectlife");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM requests");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Blood Requests</title>
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
    select, button {
      padding: 5px;
    }
  </style>
</head>
<body>
  <h2 style="text-align:center;">All Blood Requests</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Patient Name</th>
      <th>Hospital Name</th>
      <th>Blood Group</th>
      <th>Units</th>
      <th>Requested At</th>
      <th>Status</th>
      <th>Update</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['patient_name']) ?></td>
      <td><?= htmlspecialchars($row['hospital_name']) ?></td>
      <td><?= $row['blood_group'] ?></td>
      <td><?= $row['units'] ?></td>
      <td><?= $row['created_at'] ?></td>
      <td>
        <form action="update_status.php" method="post">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
          <select name="status">
            <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
            <option value="Approved" <?= $row['status'] == 'Approved' ? 'selected' : '' ?>>Approved</option>
            <option value="Rejected" <?= $row['status'] == 'Rejected' ? 'selected' : '' ?>>Rejected</option>
          </select>
      </td>
      <td>
          <button type="submit">Update</button>
        </form>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
