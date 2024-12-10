<?php
// Include the database connection file
include('connection.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $roll_no = $_POST['Roll_NO'];  // Use 'roll_no' as the key here
    $name = $_POST['name'];
    $course = $_POST['course'];
    $number = $_POST['number'];

    // Prepare the SQL query to insert data into the table
    $sql_insert = "INSERT INTO students (Roll_NO, Name, Course, Number) VALUES ('$roll_no', '$name', '$course', '$number')";

    // Execute the query
    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Data inserted successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Query to fetch data from the database
$sql = "SELECT * FROM students";  
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
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type='text'], input[type='number'] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ddd;
        }
        input[type='submit'] {
            background-color: #c9028a;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        input[type='submit']:hover {
            background-color: green;
        }
      </style></head><body>";

// Create a container for the table and form
echo "<div class='container'><h2>Student List</h2>";

// Form to insert data
echo "<form action='' method='POST'>
        <label for='roll_no'>Roll No:</label>
        <input type='text' id='roll_no' name='Roll_NO' required><br>
        
        <label for='name'>Name:</label>
        <input type='text' id='name' name='name' required><br>
        
        <label for='course'>Course:</label>
        <input type='text' id='course' name='course' required><br>
        
        <label for='number'>Mobile Number:</label>
        <input type='number' id='number' name='number' required><br>
        
        <input type='submit' value='Insert Data'>
      </form>";

// Check if there are results
if ($result->num_rows > 0) {
    // Start the table
    echo "<table><tr><th>Roll No</th><th>Name</th><th>Course</th><th>Mobile Number</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Use backticks (`) to handle columns with spaces in SQL query
        echo "<tr>
                <td>" . $row["Roll_NO"] . "</td>
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
