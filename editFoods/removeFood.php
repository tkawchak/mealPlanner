<?php session_start(); ?>

<?php

$food = $_GET["food"];

if(isset($_SESSION["user"]))
	$user = $_SESSION["user"];

// echo $food;

$servername = "localhost";
$username = "mealuser";
$password = "JyCCCFxBr3YQFyuW";
$dbname = "mealplanner";

//echo $food;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query = "DELETE FROM customer_meal WHERE customer_id=? AND food_id=(SELECT id FROM meal WHERE name=?)";
$stmt = $conn->prepare($query);

$stmt->bind_param("is", $user, $food);
$stmt->execute();

?>