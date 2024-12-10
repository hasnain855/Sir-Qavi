<?php
// Database credentials
$servername = "localhost";  // Or your server IP
$username = "root";         // MySQL username
$password = "";             // MySQL password
$dbname = "qavi";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully <br>";

// Close the connection when done
// $conn->close();
?>
