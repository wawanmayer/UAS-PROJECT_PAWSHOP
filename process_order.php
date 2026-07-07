<?php

session_start();
include "connection.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["id"];

$name = $_POST["name"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$payment = $_POST["payment"];
$total = $_POST["total"];

$cart = json_decode($_POST["cart"], true);



// Simpan ke tabel orders
$query = mysqli_query(
    $conn,
    "INSERT INTO orders
    (user_id, customer_name, phone, address, payment_method, total)
    VALUES
    ('$user_id','$name','$phone','$address','$payment','$total')"
);

if (!$query) {
    die("Orders Error : " . mysqli_error($conn));
}

// Ambil ID order yang baru dibuat
$order_id = mysqli_insert_id($conn);

// Simpan setiap produk ke order_items
foreach ($cart as $item) {

    $product = $item["name"];
    $price = $item["price"];
    $qty = $item["quantity"];
    $subtotal = $price * $qty;

    $query2 = mysqli_query(
        $conn,
        "INSERT INTO order_items
        (order_id, product_name, price, quantity, subtotal)
        VALUES
        ('$order_id','$product','$price','$qty','$subtotal')"
    );

    if (!$query2) {
        die("Order Items Error : " . mysqli_error($conn));
    }
}

echo "Order placed successfully!";