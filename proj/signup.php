<?php
require "connect.php";
session_start();

if (isset($_SESSION['currentuser'])) {
    header("location:index.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users(username,password) VALUES (:username, :password)";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);

    $result = $statement->execute();
    if ($result) {
        header("Location: login.php");
    } else {
        $msg = "Failure";
        echo "<script>alert('$msg');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="Style/register.css">
</head>

<body>
<form method="POST" action="signup.php">
        <h2>Sign Up</h2>

        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Sign Up</button>

        <p class="login-link">Already have an account? <a href="login.php">Log In</a></p>
    </form>
</body>


</html>