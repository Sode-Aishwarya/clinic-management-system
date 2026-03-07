<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$DOCTOR_ID = $_POST['DOCTOR_ID'];
$DOCTOR_NAME = $_POST['DOCTOR_NAME'];
$DOCTOR_PHNO = $_POST['DOCTOR_PHNO'];
$ADDRESS = $_POST['ADDRESS'];
$SPECIALIZATION = $_POST['SPECIALIZATION'];
$sql = "INSERT INTO doctor (DOCTOR_ID,DOCTOR_NAME,DOCTOR_PHNO,ADDRESS,SPECIALIZATION) VALUES ('$DOCTOR_ID', '$DOCTOR_NAME', '$DOCTOR_PHNO','$ADDRESS','$SPECIALIZATION')";

if ($conn->query($sql) === TRUE) {
  echo "DOCTOR added successfully. <a href='add_doctor.html'>Add Another</a>";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
