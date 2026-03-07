<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$DOCTOR_ID = $_POST['DOCTOR_ID'];
$DOCTOR_NAME = $_POST['DOCTOR_NAME'];
$DOCTOR_PHNO = $_POST['DOCTOR_PHNO'];
$ADDRESS = $_POST['ADDRESS'];
$SPECIALIZATION = $_POST['SPECIALIZATION'];

$stmt = $conn->prepare("UPDATE doctor SET DOCTOR_NAME=?, DOCTOR_PHNO=?, ADDRESS=?, SPECIALIZATION=? WHERE DOCTOR_ID=?");
$stmt->bind_param("ssssi", $DOCTOR_NAME, $DOCTOR_PHNO, $ADDRESS, $SPECIALIZATION, $DOCTOR_ID);

if ($stmt->execute()) {
  echo "Doctor updated successfully. <a href='view_doctors.php'>View All Doctors</a>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
