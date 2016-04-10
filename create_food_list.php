<?php session_start(); ?>

<?php

$servername = "localhost";
$username = "mealuser";
$password = "JyCCCFxBr3YQFyuW";
$dbname = "mealplanner";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$query = "SELECT food_id FROM customer_meal WHERE customer_id=1";
$stmt = $conn->prepare($query);
$stmt->execute();

$id=NULL;
$stmt->bind_result($id);

while($stmt->fetch()) {
        
		$query = "SELECT name FROM meal where id=?";
		
		$conn1 = new mysqli($servername, $username, $password, $dbname);
		
		$stmt1 = $conn1->prepare($query);
		$stmt1->bind_param("i", $id);
		$stmt1->execute();
		
		$food_name = NULL;
		$stmt1->bind_result($food_name);
		$stmt1->fetch();
		echo $food_name . "<br />";
		$conn1->close();
		
		
    }

//echo $meal_id_list;
$conn->close();

$query = "SELECT * FROM meal WHERE id=(SELECT * FROM customer_meal WHERE customer_id=1)";

?>