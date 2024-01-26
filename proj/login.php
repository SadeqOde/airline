<?php
require "connect.php";
session_start();

if (isset($_SESSION['currentuser'])) {
    header("location:index.html");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION['currentuser'] = $username;
        header("location:index.html");
        exit();
    } else {
        $msg = "Invalid username or password";
        echo "<script>alert('$msg');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="Style/register.css">
</head>

<body>
    <form method="POST" action="login.php">
        <h2>Log In</h2>

        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="submit">Log In</button>

        <p class="login-link">Don't have an account? <a href="signup.php">Sign Up!</a></p>
    </form>
</body>

</html>
