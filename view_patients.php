<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Run the query
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patients</title>
</head>
<body>
    <h2>Patient Records</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Doctor ID</th>
            <th>Actions</th> <!-- New column for Update/Delete buttons -->
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['PATIENT_ID']; ?></td>
            <td><?php echo $row['DATE']; ?></td>
            <td><?php echo $row['PATIENT_NAME']; ?></td>
            <td><?php echo $row['PATIENT_PHNO']; ?></td>
            <td><?php echo $row['AGE']; ?></td>
            <td><?php echo $row['GENDER']; ?></td>
            <td><?php echo $row['ADDRESS']; ?></td>
            <td><?php echo $row['Doc_Id']; ?></td>
            <td>
                <a href="update_patient.php?id=<?php echo $row['PATIENT_ID']; ?>">Update</a> |
                <a href="delete_patient.php?id=<?php echo $row['PATIENT_ID']; ?>" onclick="return confirm('Are you sure you want to delete this patient?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="add_patient_new.html">Add Another Patient</a>
</body>
</html>

<?php
$conn->close();
?>
