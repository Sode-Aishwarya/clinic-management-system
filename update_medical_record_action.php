<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "clinic_db");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $RECORD_ID = $_POST['RECORD_ID'];  // Assuming primary key is RECORD_ID
    $PATIENT_ID = $_POST["PATIENT_ID"];
    $MEDICINE = $_POST["MEDICINE"];
    $DOC_ID = $_POST["DOC_ID"];
    $VISIT_DATE = $_POST["VISIT_DATE"];
    $DIAGNOSIS = $_POST["DIAGNOSIS"];
    $FEE = $_POST["FEE"];
    $TREATMENT = $_POST["TREATMENT"];

    $stmt = $conn->prepare("UPDATE medical_record SET PATIENT_ID=?, MEDICINE=?, DOC_ID=?, VISIT_DATE=?, DIAGNOSIS=?, FEE=?, TREATMENT=? WHERE RECORD_ID=?");
    $stmt->bind_param("isissdsi", $PATIENT_ID, $MEDICINE, $DOC_ID, $VISIT_DATE, $DIAGNOSIS, $FEE, $TREATMENT, $RECORD_ID);

    if ($stmt->execute()) {
        echo "Medical record updated successfully. <a href='view_medical_record.php'>View All</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
