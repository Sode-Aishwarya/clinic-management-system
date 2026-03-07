<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$PATIENT_ID = $_POST['PATIENT_ID'];
$DOCTOR_ID = $_POST['DOCTOR_ID'];
$VISIT_DATE = $_POST['VISIT_DATE'];
$VISIT_TIME = $_POST['VISIT_TIME'];
$REASON_FOR_VISIT = $_POST['REASON_FOR_VISIT'];

$sql = "INSERT INTO appointment (PATIENT_ID, DOCTOR_ID, VISIT_DATE, VISIT_TIME, REASON_FOR_VISIT)
        VALUES ('$PATIENT_ID', '$DOCTOR_ID', '$VISIT_DATE', '$VISIT_TIME', '$REASON_FOR_VISIT')";

if ($conn->query($sql) === TRUE) {
    echo "Appointment added successfully. <a href='add_appointment.html'>Add Another</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
