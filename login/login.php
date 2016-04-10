<?php session_start(); ?>

<?php
$userID = $_POST["user"];

$_SESSION["user"] = $userID;
header( 'Location: ../' ) ;

?>