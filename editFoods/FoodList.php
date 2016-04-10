<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- BASIC SETUP INFORMATION -->
<meta charset="utf-8">

<!-- WEBPAGE DATA -->
<title>Food List</title>
<meta name="description" content="edit foods">
<meta name="keywords" content="foods, recipedia">
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
        <li class="active"><a href="../FoodList.php">Food List</a></li>
        <li ><a href="../generateList/GenerateList.php">Generate List</a></li>
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
		
			<form role="form" action="" method="get">
			<?php
			$servername = "localhost";
			$username = "mealuser";
			$password = "JyCCCFxBr3YQFyuW";
			$dbname = "mealplanner";

			if(isset($_SESSION["user"]))
				$user = $_SESSION["user"];

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			$conn1 = new mysqli($servername, $username, $password, $dbname);
			$conn2 = new mysqli($servername, $username, $password, $dbname);
			
			$query2 = "SELECT name FROM customer WHERE id=?";
			$stmt2 = $conn2->prepare($query2);
			$stmt2->bind_param("i", $_SESSION["user"]);
			$stmt2->execute();
			$stmt2->bind_result($result2);
			$stmt2->fetch();
			echo "<p>Hello, " . $result2 . "</p>";
			
			$query = "SELECT food_id FROM customer_meal WHERE customer_id=?;";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("i", $user);
			$stmt->execute();

			$id=NULL;
			$stmt->bind_result($id);
			//$names = array();
			
			$query = "SELECT name FROM meal where id=?;";
					
			$stmt1 = $conn1->prepare($query);
			$stmt1->bind_param("i", $id);
			while($stmt->fetch()) {
					
					
					
					$stmt1->execute();
					
					$food_name = NULL;
					$stmt1->bind_result($food_name);
					$stmt1->fetch();
					//array_push($names, $food_name);
					echo "<div><p id=\"food\">" . $food_name . "</p><button type=\"submit\" id=\"update\" name=\"update\" onclick=\"del(". $id . ")\" class=\"btn btn-danger btn-block\">Delete</button></div>";
					
					
					
				}
			//echo json_encode($names);

			//echo $meal_id_list;
			$conn->close();
			//$conn1->close();
?>
		<div class="col-sm-3"></div>
	</div>
</div>
</main>

<script>
 $(function() {
    $("#update").click(function() {
      // validate and process form here
	  var name = $("#food").val();
	  $.get("removeFood.php", {food: name});
    });
  });
  
function del(id) {
	$.get("removeFood.php", {food: id});
	location.reload();
}
  
	/*
$(function(document).on("pagecreate", function() {
	$.get("create_food_list.php");
});
*/
function newImage(){
var xmlhttp = new XMLHttpRequest();
var out;
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", "create_food_list.php", true);
xmlhttp.send();
}
function myFunction(response) {
    var arr = JSON.parse(response);
    var i;

    out = arr[0].Name; 
	$("#photo").attr("src", out);
    console.log(out);
}
</script>

</body>
<!-- CLOSE THE PAGE -->
</html>