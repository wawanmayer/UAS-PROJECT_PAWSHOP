<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<link rel="stylesheet" href="login.css">
</head>

<body>

<div class="login-container">

<div class="left-side">
<img src="logincat.jpg">
</div>

<div class="right-side">

<h2>New Password</h2>

<form action="reset_process.php" method="POST">

<input
type="hidden"
name="email"
value="<?= $_GET['email']; ?>">

<input
type="password"
name="password"
placeholder="New Password"
required>

<input
type="password"
name="confirm_password"
placeholder="Confirm Password"
required>

<button>
Save Password
</button>

</form>

</div>

</div>

</body>
</html>