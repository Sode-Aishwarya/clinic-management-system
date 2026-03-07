<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM clinic";
$result = $conn->query($sql);

echo "<h2>All Clinics</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>CLINIC_ID</th>
            <th>CLINIC_NAME</th>
            <th>CLINIC_LOCATION</th>
            <th>STAFF_id</th>
            <th>Actions</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['CLINIC_ID']}</td>
            <td>{$row['CLINIC_NAME']}</td>
            <td>{$row['CLINIC_LOCATION']}</td>
            <td>{$row['STAFF_id']}</td>
            <td>
                <a href='update_clinic.php?id={$row['CLINIC_ID']}'>Update</a> |
                <a href='delete_clinic.php?id={$row['CLINIC_ID']}' onclick=\"return confirm('Are you sure you want to delete this clinic?');\">Delete</a>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No clinic records found.";
}

$conn->close();
?>
