<?php

session_start();
include "../connection.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ../login.php");
    exit;
}

$total = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM orders")
);

$pending = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM orders WHERE status='Pending'"
    )
);

$delivered = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM orders WHERE status='Delivered'"
    )
);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="admin.css">

</head>

<body>

<div class="container">

    <h1>Admin Dashboard</h1>

    <p>
        Welcome back,
        <strong><?= $_SESSION["admin_email"]; ?></strong>
    </p>

    <div class="cards">

        <div class="card">

            <h3>Total Orders</h3>

            <h2><?= $total ?></h2>

        </div>

        <div class="card">

            <h3>Pending</h3>

            <h2><?= $pending ?></h2>

        </div>

        <div class="card">

            <h3>Delivered</h3>

            <h2><?= $delivered ?></h2>

        </div>

    </div>

    <br>

<div class="action-buttons">

    <a href="orders.php" class="manage-btn">
        Manage Orders
    </a>

    <a href="../logout.php" class="logout-btn">
        Logout
    </a>

</div>

</div>

</body>
</html>