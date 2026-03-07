<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$PATIENT_ID = $_POST['PATIENT_ID'];
$DATE = $_POST['DATE'];
$PATIENT_NAME = $_POST['PATIENT_NAME'];
if (strpos($PATIENT_NAME, ',') !== false) {
    die("Error: Please enter only one name (no commas).");
}
$PATIENT_PHNO = $_POST['PATIENT_PHNO'];
$AGE = $_POST['AGE'];
$GENDER = $_POST['GENDER'];
if (strpos($GENDER, ',') !== false) {
    die("Error: Please enter only one name (no commas).");
}
$ADDRESS = $_POST['ADDRESS'];
$Doc_Id = $_POST['Doc_Id'];

$sql = "INSERT INTO patients (`DATE`, PATIENT_ID, PATIENT_NAME, PATIENT_PHNO, AGE, GENDER, ADDRESS, Doc_Id) 
        VALUES ('$DATE', '$PATIENT_ID', '$PATIENT_NAME', '$PATIENT_PHNO', '$AGE', '$GENDER', '$ADDRESS', '$Doc_Id')";

if ($conn->query($sql) === TRUE) {
    echo "Patient added successfully. <a href='add_patient_new.html'>Add Another</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
