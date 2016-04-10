
<?php
	session_start();
	$user = NULL;
	
	if (isset($_SESSION["user"])) {	
		$user = $_SESSION["user"];
	}
	else {
		header( 'Location: ./GenerateList.php' ) ;
	}
	?>
	<!DOCTYPE html>
<html lang="en">

<head>
<!-- BASIC SETUP INFORMATION -->
<meta charset="utf-8">

<!-- WEBPAGE DATA -->
<title>Generate List</title>
<meta name="description" content="generate list of food">
<meta name="keywords" content="generate list, recipedia">
<meta name="author" content="Tom, Adam, Ben">
<link rel="shortcut icon" href="../websiteIcon.ico">

<!-- REQUIRED FOR BOOTSTRAP AND JQUERY -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<!-- CONTENT OF PAGE, CONSULT BOOTSTRAP STYLE GUIDE WHEN ASSIGNING CLASSES -->
<body>

<!-- TOP OF PAGE INFORMATION AND NAVIGATION -->
<header>
<!-- dummy navbar to give buffer for top of page -->
<div class="navbar"></div>

<!-- contains the navigation for the page -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand"></div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="../index.php">Home</a></li>
        <li ><a href="../editFoods/FoodList.php">Food List</a></li>
        <li class="active"><a href="./generateList/GenerateList.php">Generate List</a></li>
        <li class=""><a href="../login/loginPage.php">Login Page</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>

<!-- MAIN CONTENT FOR THE PAGE GOES HERE -->
<main>
<div class="container">
  <!-- profile image -->
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 text-justify">
	
	<?php
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
			echo $result3 . "<br>"."amount: " . $result2_amount . "<br>" ."Ingerdient ID: " . $result2 . "<br>" . "<br/>";
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

</div>
</main>