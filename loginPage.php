<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- BASIC SETUP INFORMATION -->
<meta charset="utf-8">

<!-- WEBPAGE DATA -->
<title>Food List</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="./websiteIcon.ico">

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
        <li ><a href="index.php">Home</a></li>
        <li class="active"><a href="FoodList.php">Food List</a></li>
        <li ><a href="GenerateList.php">Generate List</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>

<!-- MAIN CONTENT FOR THE PAGE GOES HERE -->
<main>
<div class="container">
	
	<div class="row">
		<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
		
		  <form role="form" action="./login.php" method="post">
			<div class="form-group">
				<label for="usr">Username:</label>
				<select name="user">
				<?php
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
						
						$sql = "SELECT id, name FROM customer";
						$result = $conn->query($sql);

						while ($row = $result->fetch_assoc())
						{
							echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
						}
					$conn->close();
				?>
				</select>
				<button  type="submit" id="user" class="btn btn-succsess btn-block"> Select User </button>
		  </form>
		  
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</main>

</body>
<!-- CLOSE THE PAGE -->
</html>