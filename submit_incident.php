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

// Handle form submission and process incident report
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $incidentType = isset($_POST["incidentType"]) ? mysqli_real_escape_string($conn, strip_tags(stripslashes($_POST["incidentType"]))) : "";
    $description = isset($_POST["description"]) ? mysqli_real_escape_string($conn, strip_tags(stripslashes($_POST["description"]))) : "";
    $severity = isset($_POST["severity"]) ? mysqli_real_escape_string($conn, $_POST["severity"]) : "";
    $priority = isset($_POST["priority"]) ? mysqli_real_escape_string($conn, $_POST["priority"]) : "";

    // Prepare SQL statement
    $sql = "INSERT INTO incidents (incident_type, description, severity, priority) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $incidentType, $description, $severity, $priority);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success">Incident reported successfully!</div>';
    } else {
        echo '<div class="alert alert-danger">Error occurred while reporting incident. Please try again later.</div>';
    }

    // Close statement
    $stmt->close();
} else {
    echo '<div class="alert alert-danger">Invalid request method.</div>';
}

// Close connection
$conn->close();
?>
