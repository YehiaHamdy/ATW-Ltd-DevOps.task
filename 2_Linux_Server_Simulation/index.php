<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost";
$username = "admin";
$password = "admin123";
$dbname = "hello_world";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get visitor IP address
$visitor_ip = $_SERVER['REMOTE_ADDR'];

// Get current time
$current_time = date('Y-m-d H:i:s');

// Insert visit into database
$sql = "INSERT INTO visits (ip_address, visit_time) VALUES ('$visitor_ip', '$current_time')";
if (!$conn->query($sql) === TRUE) {
    echo "Error: " . $conn->error;
}

// Display message
echo "<!DOCTYPE html>
<html>
<head>
    <title>Visitor Information</title>
</head>
<body>
    <h1>Hello World!</h1>
    <p>Your IP address is: $visitor_ip</p>
    <p>The current time is: $current_time</p>
</body>
</html>";

// Close connection
$conn->close();
?>

