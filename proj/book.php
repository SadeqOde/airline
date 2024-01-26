<?php

require "connect.php";
session_start();

if (!isset($_SESSION['currentuser'])) {
    header("location:login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flight'])) {
    $options = $_POST["trip-options"];
    $from = $_POST["from-location"];
    $to = $_POST["to-location"];
    $date = $_POST["travel-date"];
    $user = $_SESSION['currentuser'];

    $sql = "INSERT INTO flights(Options, FromC, ToC, Date, user) VALUES (:options, :from, :to, :date, :user)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':options', $options);
    $statement->bindParam(':from', $from);
    $statement->bindParam(':to', $to);
    $statement->bindParam(':date', $date);
    $statement->bindParam(':user', $user); 

    if ($statement->execute()) {
        echo "Record is inserted successfully";
    } else {
        echo "Error inserting record into the database";
    }

    $pdo = null;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" type="text/css" href="Style/style.css">
</head>
<body>
    <script src="script.js"></script>
    <header>
        <nav>
            <div class="navbar">
                <div class="back-btn">
                    <a href="index.html" id="back">Back</a>
                </div>
                <div class="logo">
                    <img class="logo-img" src="Images/logo.png">
                </div>
                <div class="user">
                    <a href="user.html"><img class="user-img" src="Images/user.png"></a>
                </div>
                
                
            </div>

            <div class="mobile-nav">
                <button class="mobile-nav-btn" onclick="toggleMobileNav()">&#9776;</button>
                <div class="mobile-nav-sidebar" id="mobile-user-nav">
                    <div class="user">
                        <a href="user.html"><img class="user-img" src="Images/user.png" alt="User"></a>
                    </div>
                    <div class="mobile-nav-options">
                        <button id="mobile-booking-btn" class="mobile-nav-btn" onclick="toggleMobileOptions('mobile-booking-options')">Booking +</button>
                        <div class="mobile-options" id="mobile-booking-options">
                            <a href="book.html">Book</a>
                            <a href="status.html">Flight Status</a>
                            <a href="checkin.html">Check In</a>
                        </div>
            
                        <button id="mobile-trips-btn" class="mobile-nav-btn" onclick="toggleMobileOptions('mobile-trips-options')">My Trips +</button>
                        <div class="mobile-options" id="mobile-trips-options">
                            <a href="managetrips.php">Manage my trips</a>
                        </div>
            
                        <button id="mobile-travel-info-btn" class="mobile-nav-btn" onclick="toggleMobileOptions('mobile-travel-info-options')">Travel Info +</button>
                        <div class="mobile-options" id="mobile-travel-info-options">
                            <a href="info.html">Destination Info</a>
                            <a href="faq.html">Travel FAQs</a>
                        </div>
            
                        <button id="mobile-deals-btn" class="mobile-nav-btn" onclick="toggleMobileOptions('mobile-deals-options')">Deals +</button>
                        <div class="mobile-options" id="mobile-deals-options">
                            <a href="offers.html">Offers and Promos</a>
                        </div>
            
                        <button id="mobile-help-btn" class="mobile-nav-btn" onclick="toggleMobileOptions('mobile-help-options')">Help +</button>
                        <div class="mobile-options" id="mobile-help-options">
                            <a href="contact.html">Contact</a>
                            <a href="refund-policy.html">Refund Policy</a>
                            <a href="damage.html">Lost or Damaged Bags</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </nav>
    </header>

    <main>
        <form method="post">
            <div class="h-book">
                <h2>Booking</h2>
                <hr>
                <div class="booking-options">
                    <label for="trip-options">Options:</label>
                    <select name="trip-options" id="trip-options">
                        <option value="round-trip">Round Trip</option>
                        <option value="one-way">One Way</option>
                    </select>
                </div>
                <div class="from-to">
                    <div class="from">
                        <label for="from-location">From:</label>
                        <select name="from-location" id="from-location">
                        <option value="turkey">Turkey</option>
                        <option value="dubai">Dubai</option>
                        <option value="Jordan">Jordan</option>
                        </select>
                    </div>
                    <div class="to">
                        <label for="to-location">To:</label>
                        <select name="to-location" id="to-location">
                        <option value="turkey">Turkey</option>
                        <option value="dubai">Dubai</option>
                        <option value="Jordan">Jordan</option>
                        </select>
                    </div>
                </div>
                <div class="date">
                    <label for="travel-date">Date:</label>
                    <input type="date" id="travel-date" name="travel-date">
                </div>
                <div class="cabin-class">
                    <label for="cabin-options">Cabin Class:</label>
                    <select name="cabin-options" id="cabin-options">
                        <option value="economy">Economy Class</option>
                        <option value="business">Business Class</option>
                    </select>
                </div>
                <button type="submit" name="flight">Book Flight</button>
            </div>
        </form>
    </main>

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