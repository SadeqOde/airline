<?php
require "connect.php";
session_start();

if (!isset($_SESSION['currentuser'])) {
    header("location:login.php");
    exit();
}

$user = $_SESSION['currentuser'];

$sql = "SELECT * FROM flights WHERE user = :user";
$statement=$pdo->prepare($sql);
$statement->bindParam(':user', $user);
$statement->execute();

$data=$statement->fetchAll();

echo "<header>
<nav>
    <nav>
        <div class='navbar'>
            <div class='back-btn'>
                <a href='index.html' id='back'>Back</a>
            </div>
            <div class='logo'>
                <img class='logo-img' src='Images/logo.png'>
            </div>
            <div class='user'>
                <a href='user.html'><img class='user-img' src='Images/user.png'></a>
            </div>
        </div>
    </nav>
</nav>
</header>";
echo "<main>";
echo "<div class='title'>
<h1>My Trips</h1>
</div>";
echo "<div class='trips'>";
foreach($data as $row){

    echo "<div class='trip-container'>";
    echo "<div class='trip-details'>";

    echo "<h2>Flight ". $row["FromC"]. " - ". $row["ToC"]. "</h2>"; 
    echo "<p>From: ". $row["FromC"]. "</p>";
    echo "<p>To: ". $row["ToC"]. "</p>";
    echo "<p>Date: ". $row["Date"]. "</p>";

    echo "<div class='trip-buttons'>";
    echo "<a href='editFlight.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>";
    echo "  ";
    echo "<a href='deleteFlight.php?id=" . $row['id'] . "' class='delete-btn'>Delete</a>";
    echo "</div>";

    echo "</div>";
    echo "</div>";


}
echo "</div>";

echo "<div class='more'>
<h2>Search for more flights!</h2>
<button><a href=''>Find Flights</a></button>
</div>";
echo "</main>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trips</title>
    <link rel="stylesheet" type="text/css" href="Style/trips.css">
    <link rel="stylesheet" type="text/css" href="Style/cont.css">
</head>
<body>
    <script src="script.js"></script>

    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p>Information about the airline and its mission.</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="book.html">Book</a></li>
                        <li><a href="status.html">Flight Status</a></li>
                        <li><a href="info.html">Destination Info</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>Email: contact@pheonixairline.com</p>
                    <p>Phone: +926 791234567</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Pheonix Airline. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>