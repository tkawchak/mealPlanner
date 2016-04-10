<?php session_start(); ?>

<?php

// MAKE SURE THAT NO IMAGES REPEAT IN HERE
// REMOVE THE IMAGE FROM A LIST AFTER GENERATING IT

if(isset($_SESSION["user"]))
	$user = $_SESSION["user"];

// echo $food;

$servername = "localhost";
$username = "mealuser";
$password = "JyCCCFxBr3YQFyuW";
$dbname = "mealplanner";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn1 = new mysqli($servername, $username, $password, $dbname);

// get a list of images in the current directory
$files = scandir(getcwd() . "/images");
$can_use = true;
$images = array();

for ($i = 0; $i < sizeof($files); $i = $i + 1) {
	if (strpos($files[$i], ".jpg") != false) {
		array_push($images, ($files[$i]));
	}
}

	// return one of the images
	$image = $images[rand(0, sizeof($images) - 1)];
	// query for id of image
	$query = "SELECT id FROM meal";
	$query1 = "SELECT DISTINCT food_id FROM customer_meal WHERE customer_id=?";

	$stmt = $conn->prepare($query);
	//$stmt->bind_param("s", $image);
	$stmt->execute();
	$stmt->bind_result($photo_id);
	
	$foods = array();
	while($stmt->fetch())
	{
		array_push($foods, $photo_id);
	}

	$stmt1 = $conn1->prepare($query1);
	$stmt1->bind_param("i", $user);
	$stmt1->execute();
	$stmt1->bind_result($meal_id);
	$ids = array();
//	echo "photo " . $photo_id . "<br />";
	while($stmt1->fetch())
	{
		array_push($ids, $meal_id);
	}
	//$difference = array();
	$difference = array_diff($foods, $ids);
//	foreach($difference as $i)
//		echo $i . "<br />";
		
	if (sizeof($difference) > 1)
		$image_id = $difference[array_rand($difference)];
	else
		foreach($difference as $i)
			$image_id = $i;
	
//	echo "mage: " . $image_id . "<br />";
	$conn2 = new mysqli($servername, $username, $password, $dbname);
	$query2 = "SELECT photo_path FROM meal WHERE id=?";
	$stmt2 = $conn2->prepare($query2);
	$stmt2->bind_param("i", $image_id);
	$stmt2->execute();
	$stmt2->bind_result($result2);
	$stmt2->fetch();
//echo $image;

$outp = '[{"Name":"' . $result2 . '"}]';

echo $outp;
?>