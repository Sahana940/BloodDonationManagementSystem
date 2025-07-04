<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "bloodconnectlife"; // Use your DB name

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle update
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $units = $_POST['units'];
    $sql = "UPDATE inventory SET units = '$units' WHERE id = '$id'";
    $conn->query($sql);
}

// Fetch current inventory
$result = $conn->query("SELECT * FROM inventory");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inventory</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #fff8f8;
      padding: 20px;
    }
    h2 {
      color: #b71c1c;
      text-align: center;
    }
    table {
      margin: auto;
      border-collapse: collapse;
      width: 80%;
    }
    th, td {
      border: 1px solid #aaa;
      padding: 12px;
      text-align: center;
    }
    th {
      background-color: #b71c1c;
      color: white;
    }
    input[type="number"] {
      width: 60px;
      padding: 5px;
      text-align: center;
    }
    input[type="submit"] {
      background-color: #b71c1c;
      color: white;
      border: none;
      padding: 6px 12px;
      cursor: pointer;
      border-radius: 4px;
    }
    input[type="submit"]:hover {
      background-color: #880e4f;
    }
  </style>
</head>
<body>

<h2>Blood Inventory</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Blood Group</th>
    <th>Units</th>
    <th>Update</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <form method="POST" action="">
        <td><?= $row['id'] ?></td>
        <td><?= $row['blood_group'] ?></td>
        <td>
          <input type="number" name="units" value="<?= $row['units'] ?>" min="0" />
          <input type="hidden" name="id" value="<?= $row['id'] ?>" />
        </td>
        <td><input type="submit" value="Save" /></td>
      </form>
    </tr>
  <?php } ?>
</table>

</body>
</html>
