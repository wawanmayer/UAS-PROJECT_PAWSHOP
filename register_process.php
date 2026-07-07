<?php

include "connection.php";

// Ambil data dari form
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$phone = trim($_POST["phone"]);
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

// Cek apakah semua field terisi
if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
    echo "<script>
            alert('Please fill in all fields.');
            window.history.back();
          </script>";
    exit;
}

// Cek password sama atau tidak
if ($password !== $confirm_password) {
    echo "<script>
            alert('Password and Confirm Password do not match.');
            window.history.back();
          </script>";
    exit;
}

// Cek apakah email sudah terdaftar
$check_email = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE email='$email'"
);

if (mysqli_num_rows($check_email) > 0) {
    echo "<script>
            alert('Email is already registered.');
            window.history.back();
          </script>";
    exit;
}

// Enkripsi password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database
$insert = mysqli_query(
    $conn,
    "INSERT INTO users (name, email, phone, password)
     VALUES ('$name', '$email', '$phone', '$hashed_password')"
);

// Cek berhasil atau tidak
if ($insert) {

    echo "<script>
            alert('Registration successful! Please login.');
            window.location='login.php';
          </script>";

} else {

    echo "<script>
            alert('Registration failed!');
            window.history.back();
          </script>";
}

?>