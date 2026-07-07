<?php

session_start();
include "connection.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET["id"])) {
    header("Location: history.php");
    exit;
}

$order_id = $_GET["id"];
$user_id = $_SESSION["id"];

// Ambil data order
$orderQuery = mysqli_query(
    $conn,
    "SELECT *
    FROM orders
    WHERE id='$order_id'
    AND user_id='$user_id'"
);

$order = mysqli_fetch_assoc($orderQuery);

if (!$order) {
    die("Order not found.");
}

// Ambil produk
$itemQuery = mysqli_query(
    $conn,
    "SELECT *
    FROM order_items
    WHERE order_id='$order_id'"
);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Order Details</title>

    <link rel="stylesheet" href="detail_order.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="container">

    <a href="history.php" class="back-btn">
        ← Back to My Orders
    </a>

    <div class="card">

        <div class="header">

            <div>

                <h1>
                    Order #PS<?= str_pad($order["id"],5,"0",STR_PAD_LEFT); ?>
                </h1>

                <p>
                    <?= date("d F Y", strtotime($order["order_date"])); ?>
                </p>

            </div>

            <span class="status">
                <?= $order["status"]; ?>
            </span>

        </div>

        <hr>

        <h3>Products</h3>

        <?php while($item = mysqli_fetch_assoc($itemQuery)){ ?>

        <div class="product">

            <div>

                <strong>
                    <?= $item["product_name"]; ?>
                </strong>

                <p>
                    Qty : <?= $item["quantity"]; ?>
                </p>

            </div>

            <div>

                Rp<?= number_format($item["subtotal"],0,",","."); ?>

            </div>

        </div>

        <?php } ?>

        <hr>

        <div class="info">

            <p>
                <strong>Payment</strong>
            </p>

            <span>
                <?= $order["payment_method"]; ?>
            </span>

        </div>

        <div class="info">

            <p>
                <strong>Shipping Address</strong>
            </p>

            <span>
                <?= $order["address"]; ?>
            </span>

        </div>

        <hr>

        <div class="total">

            <h2>Total Payment</h2>

            <h2>

                Rp<?= number_format($order["total"],0,",","."); ?>

            </h2>

        </div>

    </div>

</div>

</body>

</html>