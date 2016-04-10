<?php session_start(); ?>

<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- BASIC SETUP INFORMATION -->
<meta charset="utf-8">

<!-- WEBPAGE DATA -->
<title>Meal Planner</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="./websiteIcon.ico">

<!-- REQUIRED FOR BOOTSTRAP AND JQUERY -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
$(document).on("pagecreate",function(){
  $("#photo").on("swiperight",function(){
	  
	// add code to add the image to a database of good food
	var image = $("#photo").attr("src");
	
	// execute a query to the database to add food item
	$.get("addFood.php", {food: image});  
	  
    newImage();
	
  });
  $("p").on("swipeleft", function(){
		 
	newImage();	 
	 
  });
});
</script>
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
        <li class="active"><a href="index.php">Home</a></li>
        <li ><a href="FoodList.php">Food List</a></li>
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
	<div id="pageone">
	<img src="" id="photo" class="img-responsive img-thumbnail img-square center-block" alt="food" style="max-height: 300px;">
	</div>
	
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6 text-justify">
			<h1> <?php echo "Weclcome to mealPlanner, a mobile website that allows you to automate your meal selecting process."; ?> </h1>
			<p id="answer"><p>
		<div class="col-sm-3"></div>
		<div id="picture">
		
		</div>
	</div>
</div>


<script>

function newImage(){
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
 $( document ).ready(function() {
     newImage();
 });
</script>



</main>

</body>
<!-- CLOSE THE PAGE -->
</html>