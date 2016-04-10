
<?php
	session_start();
	$user = NULL;
	
	if (isset($_SESSION["user"])) {	
		$user = $_SESSION["user"];
	}
	else {
		header( 'Location: ./GenerateList.php' ) ;
	}
	
	$num = $_POST["numberOfMeals"];
	
	$servername = "localhost";
    $username = "mealuser";
    $password = "JyCCCFxBr3YQFyuW";
    $dbname = "mealplanner";

	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	} 
	else{
	  //echo "connection worked";
	}
	
	$sql = "SELECT food_id FROM customer_meal WHERE customer_id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $user);
	$stmt->bind_result($result);
	$stmt->execute();
	
	$conn2 = new mysqli($servername, $username, $password, $dbname);
	$sql2 = "SELECT ingredient_id, amount FROM food_ingredient WHERE food_id=?";
	$stmt2 = $conn2->prepare($sql2);
	$stmt2->bind_param("i", $foodID);
	$stmt2->bind_result($result2, $result2_amount);
	
	$conn3 = new mysqli($servername, $username, $password, $dbname);
	$sql3 = "SELECT name FROM ingredient WHERE id=?";
	$stmt3 = $conn3->prepare($sql3);
	$stmt3->bind_param("i", $ingredientID);
	$stmt3->bind_result($result3);
	$mail_string = "";
	for ($i = 0; $i < $num; $i++) {
		$stmt->fetch();
		$foodID = $result;
		$stmt2->execute();
		while($stmt2->fetch()) {
			$ingredientID = $result2;
			$ingredientAmount = $result2_amount;
			$stmt3->execute();
			$stmt3->fetch();
			echo $result3 . "|" . $result2_amount . "|" . $result2 . "<br />";
			$mail_string .= $result3 . "|" . $result2_amount . "|" . $result2 . "<br />";
		}
	}
	
	mail("tkawchak@gmail.com","Grocery List", $mail_string);
	
	$conn->close();
	$conn2->close();
	$conn3->close();

	// $sql2 = "SELECT  FROM ingredient";
	// $result2 = $conn->query($sql2);

	// for($i = 0; $i < $num; $i++)
	// {
		// $row = $result->fetch_assoc();
		// echo "meal " . ($i + 1) . ": ". $row["name"]. "<br>";
	// }

	// echo "<br>" . "List of Ingredients" . "<br>";

	// for($i = 0; $i < $num; $i++)
	// {
		// $row = $result2->fetch_assoc();
		// echo "<br>" . $row["name"];
	// }

    // $conn->close();
?>
