<?php
require_once "connection.php";


$firstname = $_POST['customerFname'];
$lastname = $_POST['customerLname'];
$email = $_POST['customerEmail'];
$phonenumber = $_POST['customerPhonenumber'];
$password = $_POST['customerPassword'];



// Prepare statement
$sql = $connection->prepare("INSERT INTO `customer`(`customerFname`, `customerLname`, `customerEmail`, `customerPhonenumber`, `customerPassword`) VALUES (?, ?, ?, ?, ?)");

$sql->bind_param("sssss", $firstname, $lastname, $email, $phonenumber, $password);

// Create a password hash
$password = password_hash($password, PASSWORD_DEFAULT); 


$sql->execute();



header("location: login.php");

$connection->close();


?>