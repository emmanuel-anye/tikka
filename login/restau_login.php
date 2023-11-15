<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to restaurant dashboard.
if (isset($_SESSION["restaurantId"])) {
    header("location: ../dashboard/restau-dash.php");
    exit;
}

require_once "connection.php";

// Get user input from the login form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare a query to retrieve user data based on the provided email
$sql = $connection->prepare("SELECT * FROM `restaurant` WHERE `restaurantEmail` = ?");
$sql->bind_param("s", $email);
$sql->execute();

// Get the result of the query
$result = $sql->get_result();

// Check if a user with the provided email exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify the provided password against the stored password
    if (password_verify($password, $user['restaurantPassword'])) {
        // Password is correct, so login and start session.
        session_start();

        // Store data in session variables
        $_SESSION["restaurantId"] = $user['restaurantId']; // This line was missing

        // Redirect the user to index.php
        header("location: ../dashboard/restau-dash.php");
        exit(); // Make sure to exit after sending the header

    } else {
        // Incorrect password
        echo "Incorrect password. Please try again.";
    }
} else {
    // No user with the provided email found
    echo "No user with this email found.";
}

// Close the database connection
$connection->close();