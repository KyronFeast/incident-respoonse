<?php
// Database configuration
$servername = "localhost";
$username = "incident4";
$password = "incident4";
$database = "incident4";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
