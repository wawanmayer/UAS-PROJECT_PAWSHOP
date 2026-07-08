<?php

session_start();
include "../connection.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ../login.php");
    exit;
}

if (!isset($_GET["id"])) {
    header("Location: orders.php");
    exit;
}

$id = $_GET["id"];

$query = mysqli_query(
    $conn,
    "SELECT * FROM orders WHERE id='$id'"
);

$order = mysqli_fetch_assoc($query);

if (!$order) {
    header("Location: orders.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Order</title>

    <link rel="stylesheet" href="admin.css">

</head>

<body>

<div class="container">

    <h1>Edit Order</h1>

    <a href="orders.php" class="manage-btn">
        Manage Orders
    </a>

    <br><br>

    <form action="update_order.php" method="POST">

        <input
            type="hidden"
            name="id"
            value="<?= $order["id"]; ?>">

        <p>
            <strong>Customer:</strong>
            <?= $order["customer_name"]; ?>
        </p>

        <br>

        <label>Status</label>

        <br><br>

        <select name="status">

            <option
                value="Pending"
                <?= $order["status"] == "Pending" ? "selected" : ""; ?>>
                Pending
            </option>

            <option
                value="Processing"
                <?= $order["status"] == "Processing" ? "selected" : ""; ?>>
                Processing
            </option>

            <option
                value="Delivered"
                <?= $order["status"] == "Delivered" ? "selected" : ""; ?>>
                Delivered
            </option>

            <option
                value="Cancelled"
                <?= $order["status"] == "Cancelled" ? "selected" : ""; ?>>
                Cancelled
            </option>

        </select>

        <br><br>

        <button type="submit">
            Save Changes
        </button>

    </form>

</div>

</body>

</html>