<?php session_start(); ?>

<?php
$user = $_POST["usr"];
$email = $_POST["email"];

$sql = "INSERT INTO customer (name, email) VALUES (?, ?)";

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

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $email);
$stmt->execute();

$conn->close();

header( 'Location: ./loginPage.php' ) ;

?>