<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Run the query
$sql = "SELECT * FROM doctor";
$result = $conn->query($sql);

// Check for query success
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Doctors</title>
</head>
<body>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Specialization</th>
			 <th>Actions</th> <!-- New column for Update/Delete buttons -->
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['DOCTOR_ID']; ?></td>
            <td><?php echo $row['DOCTOR_NAME']; ?></td>
            <td><?php echo $row['DOCTOR_PHNO']; ?></td>
            <td><?php echo $row['ADDRESS']; ?></td>
            <td><?php echo $row['SPECIALIZATION']; ?></td>
			<td>
                <a href="update_doctor.php?id=<?php echo $row['DOCTOR_ID']; ?>">Update</a> |
                <a href="delete_doctor.php?id=<?php echo $row['DOCTOR_ID']; ?>" onclick="return confirm('Are you sure you want to delete this doctor?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="add_doctor.html">Add Another Doctors</a>
</body>
</html>

<?php
$conn->close();
?>
