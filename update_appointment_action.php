<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "clinic_db");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $appointment_id=$_POST['appointment_id'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $visit_date = $_POST['visit_date'];
    $visit_time = $_POST['visit_time'];
    $reason_for_visit = $_POST['reason_for_visit'];

    $stmt = $conn->prepare("UPDATE appointment SET patient_id=?, doctor_id=?, visit_date=?, visit_time=?, reason_for_visit=? WHERE appointment_id=?");
    $stmt->bind_param("iisssi", $patient_id, $doctor_id, $visit_date, $visit_time, $reason_for_visit,$appointment_id);

    if ($stmt->execute()) {
        echo "Appointment updated successfully. <a href='view_appointment.php'>View All</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
