<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "clinic_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $PATIENT_ID = $_POST["PATIENT_ID"];
    $MEDICINE = $_POST["MEDICINE"];
    $DOC_ID = $_POST["DOC_ID"];
    $VISIT_DATE = $_POST["VISIT_DATE"];
    $DIAGNOSIS = $_POST["DIAGNOSIS"];
    $FEE = $_POST["FEE"];
    $TREATMENT = $_POST["TREATMENT"];

    $sql = "INSERT INTO medical_record (PATIENT_ID, MEDICINE, DOC_ID, VISIT_DATE, DIAGNOSIS, FEE, TREATMENT)
            VALUES ('$PATIENT_ID', '$MEDICINE', '$DOC_ID', '$VISIT_DATE', '$DIAGNOSIS', '$FEE', '$TREATMENT')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully!<br>";
        echo "<a href='medical_record.html'>Add Another</a> | <a href='view_medical_record.php'>View Records</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
