<?php

session_start();

include "../connection.php";

$username = $_POST["username"];
$password = $_POST["password"];

$query = mysqli_query(
    $conn,
    "SELECT * FROM admin
    WHERE username='$username'
    AND password='$password'"
);

if(mysqli_num_rows($query) > 0){

    $admin = mysqli_fetch_assoc($query);

    $_SESSION["admin_id"] = $admin["id"];
    $_SESSION["admin_username"] = $admin["username"];

    header("Location: dashboard.php");
    exit;

}else{

    echo "Username atau Password salah.";

}