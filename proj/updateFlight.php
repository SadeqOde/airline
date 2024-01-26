<?php
require "connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $from = $_POST["from-location"];
    $to = $_POST["to-location"];
    $date = $_POST["travel-date"];

    $sql = "UPDATE flights SET FromC = :from, ToC = :to, Date = :date WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':from', $from);
    $statement->bindParam(':to', $to);
    $statement->bindParam(':date', $date);

    $result = $statement->execute();
    if ($result) {
        header('Location: managetrips.php');
    } else {
        die("Error updating flight.");
    }
} else {
    die("Invalid request.");
}
?>
