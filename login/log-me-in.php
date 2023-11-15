<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to customer dashboard.
if (isset($_SESSION["customerId"])) {
    header("location: ../dashboard/customer-dash.php");
    exit;
}

require_once "connection.php";

// Get user input from the login form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare a query to retrieve user data based on the provided email
$sql = $connection->prepare("SELECT * FROM `customer` WHERE `customerEmail` = ?");
$sql->bind_param("s", $email);
$sql->execute();

// Get the result of the query
$result = $sql->get_result();

// Check if a user with the provided email exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify the provided password against the stored password
    if (password_verify($password, $user['customerPassword'])) {
        // Password is correct, so login and start session.
        session_start();

        // Store data in session variables
        $_SESSION["customerId"] = $user['customerId']; 

        // Redirect the user to index.php
        header("location: ../dashboard/customer-dash.php");
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