<?php

include "database.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (name, phone, email, password)
            VALUES ('$name', '$phone', '$email', '$password')";

    if ($conn->query($sql)) {
        $message = "Account Created Successfully!";
    } else {
        $message = $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>

<h2>Create Account</h2>

<?php echo $message; ?>

<form method="POST">

    <input
        type="text"
        name="name"
        placeholder="Full Name"
        required
    >

    <br><br>

    <input
        type="text"
        name="phone"
        placeholder="Phone Number"
        required
    >

    <br><br>

    <input
        type="email"
        name="email"
        placeholder="Email"
        required
    >

    <br><br>

    <input
        type="password"
        name="password"
        placeholder="Password"
        required
    >

    <br><br>

    <button type="submit">
        Sign Up
    </button>

</form>

</body>
</html>