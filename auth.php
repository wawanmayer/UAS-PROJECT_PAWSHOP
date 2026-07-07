<?php
session_start();
include "database.php";

$action = $_POST['action'];

if ($action == "register") {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, phone, email, password)
            VALUES ('$name', '$phone', '$email', '$password')";

    if ($conn->query($sql)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Register gagal!";
    }
}

if ($action == "login") {

    $login = $_POST['login']; // email atau phone
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE (email='$login' OR phone='$login')
            AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        header("Location: index.php");
        exit();

    } else {
        header("Location: login.php?error=1");
        exit();
    }
}
?>