	<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$DOCTOR_ID = $_POST['DOCTOR_ID']; // or $_GET['DOCTOR_ID'], depends on your form/method

$stmt = $conn->prepare("DELETE FROM doctor WHERE DOCTOR_ID=?");
$stmt->bind_param("i", $DOCTOR_ID);

if ($stmt->execute()) {
  echo "Doctor deleted successfully. <a href='view_doctors.php'>View All Doctors</a>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
