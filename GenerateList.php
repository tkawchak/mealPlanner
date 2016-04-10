<!DOCTYPE html>
<html lang="en">

<head>
<!-- BASIC SETUP INFORMATION -->
<meta charset="utf-8">

<!-- WEBPAGE DATA -->
<title>Generate List</title>
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
        <li ><a href="FoodList.php">Food List</a></li>
        <li class="active"><a href="GenerateList.php">Generate List</a></li>
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
	
		<form role="form" action="./makeList.php" method="post">
			<div class="form-group">
			<label for="numMeals">Number of Meals:</label>
				<select>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
				</select>
				<label for="usr">Username:</label>
				<input type="text" class="form-control" required="true" id="usr" name="usr" placeholder="Enter your username">
			</div>
			<div class="form-group required">
			  <label for="pwd">Password:</label>
			  <input type="password" class="form-control" id="pwd" required="true" name="pwd" placeholder="Enter your password">
			</div>
			<div class="extraInfo"></div>
			
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
	
	
	
	
      <!-- custmer id based on name. -->
      <p> <?php echo "Generated List";
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
            
            $sql = "SELECT name FROM customer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "id: " . $row["name"]. "<br>";
              }
            } else {
                echo "0 results";
              }
              $conn->close();
              ?> </p>
    <div class="col-sm-3"></div>
  </div>
</div>
</main>

</body>
<!-- CLOSE THE PAGE -->
</html>