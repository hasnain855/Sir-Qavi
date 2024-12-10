<?php
// Include the database connection file
include('connection.php');

// Query the database
$sql = "SELECT * FROM students";  // Example query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Roll No: " . $row["Roll NO"] . " Name: " . $row["Name"] . " Course " . $row["Course"] . " Mobile Number " . $row["Number"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>
