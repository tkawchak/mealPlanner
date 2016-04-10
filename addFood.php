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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$food_paths = explode("/", $food);
echo $food_paths[sizeof($food_paths) - 1];

// query for id of image
$query = "SELECT id FROM meal WHERE photo_path=?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $food_paths[sizeof($food_paths) - 1]);
$stmt->execute();

$imgID = NULL;
$stmt->bind_result($imgID);
$stmt->fetch();
$conn->close();
//echo $imgID;

// create second connection - why do we need to do this? breaks if don't
$conn1 = new mysqli($servername, $username, $password, $dbname);

// query to insert into the image into the database
$query1 = "INSERT INTO customer_meal (customer_id, food_id) VALUES (?, ?)";
$stmt1 = $conn1->prepare($query1);
$stmt1->bind_param("ii", $user, $imgID);
$stmt1->execute();

$conn1->close();

?>