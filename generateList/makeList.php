<?php
	$num = $_POST["numberOfMeals"] ;
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

            $sql2 = "SELECT name FROM ingredient";
            $result2 = $conn->query($sql2);

            for($i = 0; $i < $num; $i++)
			{
				$row = $result->fetch_assoc();
				echo "meal " . ($i + 1) . ": ". $row["name"]. "<br>";
			}

            echo "<br>" . "List of Ingredients" . "<br>";

            for($i = 0; $i < $num; $i++)
            {
                $row = $result2->fetch_assoc();
                echo "<br>" . $row["name"];
            }

    $conn->close();
?>
