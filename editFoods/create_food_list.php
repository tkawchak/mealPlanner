<?php session_start(); ?>

<?php

$servername = "localhost";
$username = "mealuser";
$password = "JyCCCFxBr3YQFyuW";
$dbname = "mealplanner";

if(isset($_SESSION["user"]))
	$user = $_SESSION["user"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query = "SELECT food_id FROM customer_meal WHERE customer_id=?";
$stmt->bind_param("i", $user);
$stmt = $conn->prepare($query);
$stmt->execute();

$id=NULL;
$stmt->bind_result($id);
$names = array();

while($stmt->fetch()) {
        
		$query = "SELECT name FROM meal where id=?";
		
		$conn1 = new mysqli($servername, $username, $password, $dbname);
		
		$stmt1 = $conn1->prepare($query);
		$stmt1->bind_param("i", $id);
		$stmt1->execute();
		
		$food_name = NULL;
		$stmt1->bind_result($food_name);
		$stmt1->fetch();
		array_push($names, $food_name);
		$conn1->close();
		
		
    }
echo json_encode($names);

//echo $meal_id_list;
$conn->close();

$query = "SELECT * FROM meal WHERE id=(SELECT * FROM customer_meal WHERE customer_id=1)";

?>