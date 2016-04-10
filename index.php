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
  $("img").on("swiperight",function(){
    $(this).hide(); add(1,3);
  });
  $("p").on("swipeleft", function(){
     $(this).hide(); add(5,6);
  });
});

function add(a, b)
{
	var c = a + b;
	document.getElementById("answer").innerHTML = c;
}
</script>

<script>
        $(document).on("pagecreate", function(){
            $("img").on("swiperight", function(e){

                // as you have used hyperlink(a tag), this prevent to redirect to another/same page
                e.preventDefault();

                // get values from textboxs  
                var uName = $('#userName').val();
                var mailId = $('#addressemailId').val();
                var mobNum = $('#userContactNumber').val();

                $.ajax({
                    url:"localhost/insertFood.php",
                    type:"GET",
                    dataType:"json",
                    data:{type:"insert",Name:uName, Email:mailId, Mob_Num:mobNum},
                    //type: should be same in server code, otherwise code will not run
                    ContentType:"application/json",
                    success: function(response){
                        alert(JSON.stringify(response));
                    },
                    error: function(err){
                        alert(JSON.stringify(err));
                    }
                })
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
        <li><a href="FoodList.php">Food List</a></li>
		<li><a href="GenerateList.php">Generate List</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>

<!-- MAIN CONTENT FOR THE PAGE GOES HERE -->
<main>
<div class="container">
	<!-- profile image -->
	<img src="" id="photo" class="img-responsive img-thumbnail img-square center-block" alt="food" style="max-height: 300px;">
	
	
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6 text-justify">
			<p> <?php echo "Weclcome to mealPlanner, a mobile website that allows you to automate your meal selecting process."; ?> </p>
			<img src="bear.jpg" />
			<p id="answer"><p>
		<div class="col-sm-3"></div>
		<div id="picture">
		
		</div>
	</div>
</div>


<script>

var xmlhttp = new XMLHttpRequest();
var out;
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", "http://localhost/getPhoto.php", true);
xmlhttp.send();

function myFunction(response) {
    var arr = JSON.parse(response);
    var i;

    out = arr[0].Name; 
	$("#photo").attr("src", out);
    console.log(out);
}
 $( document ).ready(function() {
     myFunction();
 });

// function updatePhoto() {
	// var photo;
	// $.get( "getPhoto.php", function( data ) {
		// photo = data.image;
		// $("#photo").attr("src", photo);
	// }, "json" );
	
// }
</script>



</main>

</body>
<!-- CLOSE THE PAGE -->
</html>