<?php session_start(); ?>

<?php

$food = $_GET["food"];

// echo $food;

$servername = "localhost";
$username = "mealuser";
$password = "JyCCCFxBr3YQFyuW";
$dbname = "mealplanner";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
} 
else{
  echo "connection worked";
}


// query for id of image
$query = "SELECT id FROM meal WHERE photo_path=?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $food);
$stmt->execute();

$imgID = NULL;

$stmt->bind_result($imgID);
$stmt->fetch();
$conn->close();
//echo $imgID;

$conn1 = new mysqli($servername, $username, $password, $dbname);
// query to insert into the image into the database
$query1 = "INSERT INTO customer_meal (customer_id, food_id) VALUES (1, ?)";
$stmt1 = $conn1->prepare($query1);
$stmt1->bind_param("i", $imgID);
$stmt1->execute();

$conn1->close();

?>