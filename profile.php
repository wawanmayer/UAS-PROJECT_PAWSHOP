<?php
session_start();
include "connection.php";

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION["id"];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>

<head>

    <title>My Profile</title>

    <link rel="stylesheet" href="profile.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="profile-card">

    <h1>My Profile</h1>

    <div class="info">

        <label>Name</label>

        <p><?= $user["name"]; ?></p>

    </div>

    <div class="info">

        <label>Email</label>

        <p><?= $user["email"]; ?></p>

    </div>

    <div class="info">

        <label>Phone</label>

        <p><?= $user["phone"]; ?></p>

    </div>

    <div class="order-link">

        <a href="history.php">
            <span>My Orders</span>
            <span>→</span>
        </a>

    </div>

    <div class="buttons">

        <a href="index.php" class="back-btn">
            Back Home
        </a>

        <a href="logout.php" class="logout-btn">
            Logout
        </a>

    </div>

</div>

</body>
</html>