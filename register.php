<!DOCTYPE html>
<html>

<head>
    <title>PawShop Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login.css">

</head>

<body>


<div class="login-container">


    <!-- Left Image -->
    <div class="left-side">
        <img src="logincat.jpg" alt="Cat">
    </div>


    <!-- Right Form -->
    <div class="right-side">

        <h2>Register</h2>


        <form action="register_process.php" method="POST">


            <input 
                type="text"
                name="name"
                placeholder="Full Name"
                required>


            <input 
                type="email"
                name="email"
                placeholder="Email"
                required>


            <input 
                type="text"
                name="phone"
                placeholder="Phone Number"
                required>


            <input 
                type="password"
                name="password"
                placeholder="Password"
                required>


            <input 
                type="password"
                name="confirm_password"
                placeholder="Confirm Password"
                required>


            <button type="submit">
                Register
            </button>


        </form>


        <p class="register">
            Already have an account?
            <a href="login.php">
                Login
            </a>
        </p>


    </div>


</div>


</body>
</html>