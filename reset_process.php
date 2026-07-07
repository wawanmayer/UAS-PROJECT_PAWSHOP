<?php

include 'connection.php';

$email = $_POST['email'];

$password = $_POST['password'];

$confirm = $_POST['confirm_password'];

if($password != $confirm){

    echo "
    <script>
    alert('Password tidak sama');
    history.back();
    </script>
    ";

    exit;
}

$password = password_hash($password, PASSWORD_DEFAULT);

mysqli_query($conn,"
UPDATE users
SET password='$password'
WHERE email='$email'
");

echo "
<script>
alert('Password berhasil diubah');
window.location='login.php';
</script>
";