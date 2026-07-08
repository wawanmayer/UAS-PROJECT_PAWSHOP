<?php

session_start();
include "../connection.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: ../login.php");
    exit;
}

if (!isset($_POST["id"]) || !isset($_POST["status"])) {
    header("Location: orders.php");
    exit;
}

$id = $_POST["id"];
$status = $_POST["status"];

mysqli_query(
    $conn,
    "UPDATE orders
    SET status='$status'
    WHERE id='$id'"
);

header("Location: orders.php");
exit;

?>