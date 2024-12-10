<?php
$servername = "localhost";
$username = "root"; // Use your MySQL username
$password = "";     // Use your MySQL password
$dbname = "student_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Add/Update/Delete operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $roll_no = $_POST['roll_no'];
        $name = $_POST['name'];
        $fathername = $_POST['fathername'];
        $course = $_POST['course'];
        $conn->query("INSERT INTO students (roll_no, name, fathername, course) VALUES ('$roll_no', '$name', '$fathername', '$course')");
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $roll_no = $_POST['roll_no'];
        $name = $_POST['name'];
        $fathername = $_POST['fathername'];
        $course = $_POST['course'];
        $conn->query("UPDATE students SET roll_no='$roll_no', name='$name', fathername='$fathername', course='$course' WHERE id=$id");
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $conn->query("DELETE FROM students WHERE id=$id");
    }
}

// Fetch all students
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Student Management System</h1>

    <!-- Add New Student -->
    <form method="POST">
        <h3>Add Student</h3>
        Roll No: <input type="text" name="roll_no" required>
        Name: <input type="text" name="name" required>
        Father's Name: <input type="text" name="fathername" required>
        Course: <input type="text" name="course" required>
        <button type="submit" name="add">Add Student</button>
    </form>

    <!-- Display Students -->
    <h3>Student Records</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Roll No</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <form method="POST">
                        <td><?= $row['id'] ?></td>
                        <td><input type="text" name="roll_no" value="<?= $row['roll_no'] ?>"></td>
                        <td><input type="text" name="name" value="<?= $row['name'] ?>"></td>
                        <td><input type="text" name="fathername" value="<?= $row['fathername'] ?>"></td>
                        <td><input type="text" name="course" value="<?= $row['course'] ?>"></td>
                        <td>
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="update">Update</button>
                            <button type="submit" name="delete">Delete</button>
                        </td>
                    </form>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php $conn->close(); ?>
