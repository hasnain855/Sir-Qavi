<?php
// Include the database connection file
include('connection.php');

// Query the database
$sql = "SELECT * FROM students";  // Example query
$result = $conn->query($sql);

// Start the HTML output
echo "<html><head><style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #c9028a;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #fc58c9;
        }
        tr:hover {
            background-color: green;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
      </style></head><body>";

// Create a container for the table
echo "<div class='container'><h2>Student List</h2>";

// Check if there are results
if ($result->num_rows > 0) {
    // Start the table
    echo "<table><tr><th>Roll No</th><th>Name</th><th>Course</th><th>Mobile Number</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["Roll NO"] . "</td>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["Course"] . "</td>
                <td>" . $row["Number"] . "</td>
              </tr>";
    }

    // End the table
    echo "</table>";
} else {
    echo "<p>No results found.</p>"; 
}

// Close the container div
echo "</div>";

// Close the database connection
$conn->close();

// Close the HTML tags
echo "</body></html>";
?>
