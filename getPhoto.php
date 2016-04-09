<?php session_start(); ?>

<?php

// get a list of images in the current directory
$images = scandir(getcwd(), ".jpg");

// return one of the images
$image = $images[rand(0, sizeof($images)) - 1];

echo json_encode(array("image"=>"$image"));
echo image;
?>