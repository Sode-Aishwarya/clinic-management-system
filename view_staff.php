<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM staff";
$result = $conn->query($sql);

echo "<h2>All Staff Members</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>STAFF_ID</th>
            <th>STAFF_NAME</th>
            <th>ADDRESS</th>
            <th>JOB</th>
            <th>ST_PHNO</th>
            <th>Actions</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['STAFF_ID']}</td>
            <td>{$row['STAFF_NAME']}</td>
            <td>{$row['ADDRESS']}</td>
            <td>{$row['JOB']}</td>
            <td>{$row['ST_PHNO']}</td>
            <td>
                <a href='update_staff.php?id={$row['STAFF_ID']}'>Update</a> |
                <a href='delete_staff.php?id={$row['STAFF_ID']}' onclick=\"return confirm('Are you sure you want to delete this Staff?');\">Delete</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No staff records found.";
}

$conn->close();
?>
