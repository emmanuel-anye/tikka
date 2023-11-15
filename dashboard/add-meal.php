<?php
session_start();
require_once "../login/connection.php";

$mealName = $_POST['mealName'];
$mealPrice = $_POST['mealPrice'];
$mealDescription = $_POST['mealDescription'];
$restaurantId = $_SESSION['restaurantId']; // Assuming you have stored the restaurantID in the session

// Process uploaded image
$uploadDirectory = "uploads/"; // The path to the folder where you want to store uploaded images
$mealImage = $_FILES['mealImage']['tmp_name'];

// Generate a unique filename for the uploaded image
$uniqueFilename = uniqid() . '_' . $_FILES['mealImage']['name'];
$destination = $uploadDirectory . $uniqueFilename;

if (move_uploaded_file($_FILES['mealImage']['tmp_name'], $destination)) {
    // Image successfully uploaded and moved to the uploads folder

    // Prepare statement
    $sql = $connection->prepare("INSERT INTO meal (mealName, mealPrice, mealDescription, restaurantId, mealImage) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sdsss", $mealName, $mealPrice, $mealDescription, $restaurantId, $uniqueFilename);

    if ($sql->execute()) {
        $_SESSION['meal_added'] = true; // Set a session variable to indicate meal added
        header("Location: restau-dash.php"); // Redirect to restau-dash.php
        exit();
    } else {
        echo "Error adding meal: " . $sql->error;
    }
} else {
    echo "Error uploading image.";
}

$connection->close();
?>