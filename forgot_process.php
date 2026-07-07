<?php

include 'connection.php';

$email = $_POST['email'];

$query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($query)>0){

    header("Location: reset_password.php?email=$email");

}else{

    echo "
    <script>
    alert('Email tidak ditemukan');
    window.location='forgot_password.php';
    </script>
    ";

}