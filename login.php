<?php
session_start();

if (isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html>

<head>
    <title>PawShop Login</title>

    <link 
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&family=Nunito:wght@400;600;700&display=swap" 
    rel="stylesheet">

    <link rel="stylesheet" href="login.css">

</head>


<body>


<div class="login-container">

    <!-- gambar kiri -->
    <div class="left-side">
        <img src="logincat.jpg" alt="Login Image">
    </div>


    <!-- form kanan -->
    <div class="right-side">

        <h2>Login</h2>

      <?php
            if (isset($_SESSION["error"])) {
                echo "<p class='error'>" . $_SESSION["error"] . "</p>";
                unset($_SESSION["error"]);
            }
            ?>

        <form action="login_process.php" method="POST">

            <input 
                type="email"
                name="email"
                placeholder="Email"
                required>

            <input 
                type="password"
                name="password"
                placeholder="Password"
                required>

            <button type="submit">
                Login
            </button>

        </form>

        <p class="forgot">
             <a href="forgot_password.php">Forgot Password?</a>
        </p>


        <p class="register">
            Don't have an account?
            <a href="register.php">
                Register
            </a>
        </p>

    </div>

</div>


</body>
</html>