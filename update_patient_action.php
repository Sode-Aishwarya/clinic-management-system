<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");

$PATIENT_ID = $_POST['PATIENT_ID'];
$DATE = $_POST['DATE'];
$PATIENT_NAME = $_POST['PATIENT_NAME'];
$PATIENT_PHNO = $_POST['PATIENT_PHNO'];
$AGE = $_POST['AGE'];
$GENDER = $_POST['GENDER'];
$ADDRESS = $_POST['ADDRESS'];
$Doc_Id = $_POST['Doc_Id'];

$sql = "UPDATE patients 
        SET DATE='$DATE', PATIENT_NAME='$PATIENT_NAME', PATIENT_PHNO='$PATIENT_PHNO', AGE='$AGE',
            GENDER='$GENDER', ADDRESS='$ADDRESS', Doc_Id='$Doc_Id' 
        WHERE PATIENT_ID=$PATIENT_ID";

if ($conn->query($sql) === TRUE) {
    echo "Patient updated successfully. <a href='view_patients.php'>View All</a>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
