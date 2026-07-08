<?php

session_start();
include "../connection.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ../login.php");
    exit;
}

$query = mysqli_query(
    $conn,
    "SELECT *
    FROM orders
    ORDER BY order_date DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Manage Orders</title>

    <link rel="stylesheet" href="admin.css">

</head>

<body>

<div class="container">

    <h1>Manage Orders</h1>

    <a href="dashboard.php" class="manage-btn">
        Back to Dashboard
    </a>

    <a href="../logout.php" class="logout-btn">
        Logout
    </a>

    <br><br>

    <?php while ($order = mysqli_fetch_assoc($query)) { ?>

        <div class="card">

            <h3>
                Order #<?= $order["id"]; ?>
            </h3>

            <p>
                <strong>Customer:</strong>
                <?= $order["customer_name"]; ?>
            </p>

            <p>
                <strong>Payment:</strong>
                <?= $order["payment_method"]; ?>
            </p>

            <p>
                <strong>Total:</strong>
                Rp<?= number_format($order["total"], 0, ",", "."); ?>
            </p>

            <p>
                <strong>Status:</strong>
                <?= $order["status"]; ?>
            </p>

            <a href="edit_order.php?id=<?= $order["id"]; ?>" class="logout-btn">
                Edit Status
            </a>

        </div>

        <br>

    <?php } ?>

</div>

</body>

</html>
