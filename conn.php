<?php
$servername = "localhost";  // Or your server IP
$username = "root";         // MySQL username
$password = "";             // MySQL password
$dbname = "qavi";  // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";
$conn->close();

?>