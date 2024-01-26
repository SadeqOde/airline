<?php
include("connect.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM flights WHERE id = :id";
    $statement = $pdo->prepare($sql);
    
    $statement->bindParam(':id', $id);

    $result = $statement->execute();

    if ($result) {
        header('Location: managetrips.php');
    } else {
        die();
    }
}
?>
