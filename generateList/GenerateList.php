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
	
		<div class="jumbotron">
		<h1>Create Shopping List</h1>
		<p>Select the number of meals that you would like and we will generate a shopping list for that many unique meals!</p>
		</div>
		
		<br/>
	
		<form role="form" action="./makeList.php" method="post">
			<div class="form-group">
			<label for="numMeals">Number of Meals:</label>
				<select class="dropdown align-left" name="numberOfMeals">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
				</select>
        <button  type="submit" id="generate" class="btn btn-succsess text-left"> generate </button>
    </form>
	
    <div class="col-sm-3"></div>
  </div>
</div>
</main>

</body>
<!-- CLOSE THE PAGE -->
</html>