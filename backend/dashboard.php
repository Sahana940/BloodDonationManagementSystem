<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Blood Donation Management</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Header -->
<header>
    <h1>Welcome, <?php echo $_SESSION["user_name"]; ?>!</h1>
    <p>Blood Donation Management System</p>
</header>

<!-- Navigation -->
<nav class="nav-bar">
    <ul>
        <li><a href="requests.php">Requests</a></li>
        <li><a href="donor.php">Donors</a></li>
        <li><a href="hospital.php">Hospitals</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="admin.php">Admin Dashboard</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<!-- Dashboard Content -->
<div class="container">
    <h2>Welcome to Your Dashboard</h2>
    <p>Manage blood donation requests, donor details, hospital coordination, and track inventory.</p>
</div>

</body>
</html>