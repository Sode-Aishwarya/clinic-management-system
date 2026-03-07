<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM medical_record";
$result = $conn->query($sql);

echo "<h2>All Medical Records</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>RECORD_ID</th>
            <th>PATIENT_ID</th>
            <th>MEDICINE</th>
            <th>DOC_ID</th>
            <th>VISIT_DATE</th>
            <th>DIAGNOSIS</th>
            <th>FEE</th>
            <th>TREATMENT</th>
            <th>Actions</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['RECORD_ID']) . "</td>
            <td>" . htmlspecialchars($row['PATIENT_ID']) . "</td>
            <td>" . htmlspecialchars($row['MEDICINE']) . "</td>
            <td>" . htmlspecialchars($row['DOC_ID']) . "</td>
            <td>" . htmlspecialchars($row['VISIT_DATE']) . "</td>
            <td>" . htmlspecialchars($row['DIAGNOSIS']) . "</td>
            <td>" . htmlspecialchars($row['FEE']) . "</td>
            <td>" . htmlspecialchars($row['TREATMENT']) . "</td>
            <td>
                <a href='update_medical_record.php?id=" . $row['RECORD_ID'] . "'>Update</a> |
                <a href='delete_medical_record.php?id=" . $row['RECORD_ID'] . "' onclick=\"return confirm('Are you sure you want to delete this medical record?');\">Delete</a>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>