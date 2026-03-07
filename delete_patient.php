<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
$id = $_GET['id'];

$sql = "DELETE FROM patients WHERE PATIENT_ID = $id";

if ($conn->query($sql) === TRUE) {
    echo "Patient deleted successfully. <a href='view_patients.php'>Back to List</a>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
