<?php session_start(); ?>

<?php

$servername = "localhost";
$username = "mealuser";
$password = "JyCCCFxBr3YQFyuW";
$dbname = "mealplanner";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// query for user and password
$query = "SELECT id FROM meal WHERE photo_path=?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $food);
$stmt->execute();

$imgID = NULL;
$stmt->bind_result($imgID);
$stmt->fetch();

$conn->close();

// compare the user's password and entered password



// send the login status to the session variables


?>