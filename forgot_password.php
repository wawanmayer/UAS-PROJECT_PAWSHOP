<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-container">

<div class="left-side">
    <img src="logincat.jpg">
</div>

<div class="right-side">

<h2>Forgot Password</h2>

<form action="forgot_process.php" method="POST">

<input
type="email"
name="email"
placeholder="Enter your email"
required>

<button type="submit">
Continue
</button>

</form>

<p class="register">
<a href="login.php">Back to Login</a>
</p>

</div>
</div>

</body>
</html>