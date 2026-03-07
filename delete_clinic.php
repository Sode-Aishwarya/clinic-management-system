<?php
if (isset($_GET['id'])) {
    $conn = new mysqli("localhost", "root", "", "clinic_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = intval($_GET['id']);

    $sql = "DELETE FROM clinic WHERE CLINIC_ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Clinic record deleted successfully.<br>";
        echo "<a href='view_clinic.php'>Back to Clinic List</a>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
