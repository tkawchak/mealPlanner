<?php
	$num = $_POST["numberOfMeals"];
	//echo $num;
	
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
            
            $sql = "SELECT name FROM meal";
            $result = $conn->query($sql);

            for($i = 0; $i < $num; $i++)
			{
				$row = $result->fetch_assoc();
				echo "meal" . ($i + 1) . ": ". $row["name"]. "<br>";
			}
    $conn->close();
?>