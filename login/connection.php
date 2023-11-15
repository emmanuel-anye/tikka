<?php
$host = "localhost";
$username = "php_website_user";
$password = "d4TEdZbC4J]26aL6";
$database = "tikka";

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}