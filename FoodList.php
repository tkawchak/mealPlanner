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
        <li class=""><a href="loginPage.php">Login Page</a></li>
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
			<div class="form-group">
				<label for="usr">Food:</label>
				<input type="text" class="form-control" required="true" id="food" name="food" placeholder="Enter food to delete">
			</div>
			<div class="extraInfo"></div>
			<div class="userOptions">
				<button type="submit" id="update" name="update" class="btn btn-success btn-block">Delete</button>
			</div>
			?>
		  </form>
			
			<form role="form" action="" method="get">
			<div class="form-group">
				<label for="usr">Food:</label>
				<input type="text" class="form-control" required="true" id="food" name="food" placeholder="Enter food to delete">
			</div>
			<div class="extraInfo"></div>
			<div class="userOptions">
				<button type="submit" id="update" name="update" class="btn btn-success btn-block">Delete</button>
			</div>
		  </form>
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
	
$(function(document).on("pagecreate", function() {
	$.get("create_food_list.php");
});

var xmlhttp = new XMLHttpRequest();
var out;
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", "getPhoto.php", true);
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