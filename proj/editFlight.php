<?php
require "connect.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $flight_id = $_GET["id"];

    $sql = "SELECT * FROM flights WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $flight_id);
    $statement->execute();
    
    $flightData = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$flightData) {
        die("Flight not found");
    }
} else {
    die("Invalid request");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Flight</title>
    <link rel="stylesheet" type="text/css" href="Style/edit.css">
</head>
<body>
    <script src="script.js"></script>
    <header>
        <nav>
            <div class="navbar">
                <div class="back-btn">
                    <a href="managetrips.php" id="back">Back</a>
                </div>
                <div class="logo">
                    <img class="logo-img" src="Images/logo.png">
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="edit-flight-form">
            <h2>Edit Flight Information</h2>
            <form method="post" action="updateFlight.php">
                <input type="hidden" name="id" value="<?php echo $flightData['id']; ?>">

                <label for="from-location">From:</label>
                <input type="text" id="from-location" name="from-location" value="<?php echo $flightData['FromC']; ?>">

                <label for="to-location">To:</label>
                <input type="text" id="to-location" name="to-location" value="<?php echo $flightData['ToC']; ?>">

                <label for="travel-date">Date:</label>
                <input type="date" id="travel-date" name="travel-date" value="<?php echo $flightData['Date']; ?>">

                <input type="hidden" name="id" value="<?php echo $flightData['id']; ?>">


                <button type="submit">Save Changes</button>
            </form>
        </div>
    </main>
</body>
</html>
