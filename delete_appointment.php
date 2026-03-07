<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {
    $conn = new mysqli("localhost", "root", "", "clinic_db");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $appointment_id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM appointment WHERE appointment_id = ?");
    $stmt->bind_param("i", $appointment_id);

    if ($stmt->execute()) {
        echo "Appointment deleted successfully. <a href='view_appointment.php'>View All</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No ID specified.";
}
?>
