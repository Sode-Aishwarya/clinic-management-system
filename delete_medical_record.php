<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {
    $conn = new mysqli("localhost", "root", "", "clinic_db");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $RECORD_ID = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM medical_record WHERE RECORD_ID = ?");
    $stmt->bind_param("i", $RECORD_ID);

    if ($stmt->execute()) {
        echo "Medical record deleted successfully. <a href='view_medical_record.php'>View All</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No ID specified.";
}
?>
