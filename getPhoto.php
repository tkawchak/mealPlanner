<?php session_start(); ?>

<?php

// get a list of images in the current directory
$files = scandir(getcwd());

$images = array();

for ($i = 0; $i < sizeof($files); $i = $i + 1) {
	if (strpos($files[$i], ".jpg") != false) {
		array_push($images, ($files[$i]));
	}
}

// return one of the images
$image = $images[rand(0, sizeof($images) - 1)];

//echo $image;

$outp = '[{"Name":"' . $image . '"}]';

echo $outp;

//echo json_encode(array("image"=>"$image));
?>