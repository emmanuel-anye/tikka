<?php
require_once "connection.php";


$ownerfirstname = $_POST['ownerFname'];
$ownerlastname = $_POST['ownerLname'];
$restauname = $_POST['restaurantName'];
$restauemail = $_POST['restaurantEmail'];
$restauphonenumber = $_POST['restaurantPhonenumber'];
$restauaddress = $_POST['restaurantAddress'];
$restaupassword = $_POST['restaurantPassword'];



// Prepare statement
$sql = $connection->prepare("INSERT INTO `restaurant`(`ownerFname`, `ownerLname`, `restaurantName`, `restaurantEmail`, `restaurantPhonenumber`, `restaurantAddress`, `restaurantPassword`) VALUES (?, ?, ?, ?, ?, ?, ?)");

$sql->bind_param("sssssss", $ownerfirstname, $ownerlastname, $restauname, $restauemail, $restauphonenumber, $restauaddress, $restaupassword);

// Create a password hash
$restaupassword = password_hash($restaupassword, PASSWORD_DEFAULT); 


$sql->execute();

header("location: login.php");

$connection->close();

?>