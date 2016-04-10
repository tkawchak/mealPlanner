<?php session_start(); ?>

<?php


?>


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
	<!-- profile image -->
	<div class="row">
		<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
		
			<div class="page-header userOptions text-center"><h3><?php echo "Welcome $user!";?></h3></div>
		
		  <form role="form" action="./" method="post">
			<div class="form-group">
				<label for="usr">Username:</label>
				<select>
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

						for($i = 0; $i < $num; $i++)
						{
							$row = $result->fetch_assoc();
							echo "<option value='" . $row["id"] "'>" . $row["name"] . "</option>";
						}
					$conn->close();
				?>
				</select>
			<button  type="submit" id="generate" class="btn btn-succsess btn-block">Select User</button>
			</div>
			
			<br/>
			
			<div class="noUser">
				<button type="submit" id="login" name="login" class="btn btn-success btn-block">Login</button>
				<a id="newUser" class="btn btn-primary btn-block">New User?</a>
				<button type="submit" id="register" name="register" class="extraInfo btn btn-primary btn-block">Submit</button>
			</div>
			<div class="userOptions">
				<button type="submit" id="update" name="update" class="btn btn-success btn-block">Update Info</button>
			</div>
		  </form>
		  
		  <br/>
		  
		  <form role="form" action="./" method="post">
			  <div class="userOptions">
				<button type="submit" id="delete" name="delete" class="btn btn-danger btn-block">Delete Account</button>
				<button type="submit" id="logout" name="logout" class="btn btn-primary btn-block">Logout</button>
			  </div>
		  </form>
		  
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</main>

<script>
$(document).ready(function(){
    var user = $("#user").text();
	if (user != " User ")
	{
		// user is logged in
		$(".userOptions").show();
		$(".noUser").hide();
		$(".extraInfo").show();
	}
	else
	{
		// no one logged in
		$(".userOptions").hide();
		$(".noUser").show();
		$(".extraInfo").hide();
	}
	
	// update the place-holders of the form fields
	
	$("#newUser").click(function() {
		$("#newUser").hide();
		$("#login").hide();
		$(".extraInfo").show();
	});
});
</script>

</body>
<!-- CLOSE THE PAGE -->
</html>