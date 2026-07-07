
<?php

session_start();
include "connection.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

$user_id = $_SESSION["id"];

$query = mysqli_query(
    $conn,
    "SELECT *
     FROM orders
     WHERE user_id = '$user_id'
     ORDER BY order_date DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>

    <link rel="stylesheet" href="history.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="container">

    <h1>My Orders</h1>

    <?php
    if(mysqli_num_rows($query) > 0){

        while($order = mysqli_fetch_assoc($query)){
    ?>

    <div class="order-card">

        <div class="top">

            <div>
                <h3>
                    Order #<?= $order["id"]; ?>
                </h3>

                <p>
                    <?= date("d F Y", strtotime($order["order_date"])); ?>
                </p>
            </div>

            <span class="status">
                <?= $order["status"]; ?>
            </span>

        </div>

        <div class="middle">

            <p>
                Payment :
                <?= $order["payment_method"]; ?>
            </p>

            <p>
                Address :
                <?= $order["address"]; ?>
            </p>

        </div>

        <div class="bottom">

            <h2>
                Rp<?= number_format($order["total"],0,",","."); ?>
            </h2>

            <a
                href="detail_order.php?id=<?= $order["id"]; ?>"
                class="detail-btn">

                View Details

            </a>

        </div>

    </div>

    <?php

        }

    }else{

        echo "<p>You don't have any orders yet.</p>";

    }
    ?>

</div>

</body>
</html>