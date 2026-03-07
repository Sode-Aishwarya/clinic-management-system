<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "clinic_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $CLINIC_ID = $_POST["CLINIC_ID"];
    $CLINIC_NAME = $_POST["CLINIC_NAME"];
    $CLINIC_LOCATION = $_POST["CLINIC_LOCATION"];
    
    $STAFF_id = $_POST["STAFF_id"];
   

    $sql = "INSERT INTO clinic (CLINIC_ID,CLINIC_NAME, CLINIC_LOCATION, STAFF_id)
            VALUES ('$CLINIC_ID','$CLINIC_NAME', '$CLINIC_LOCATION', '$STAFF_id')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "Clinic record added successfully! <br>";
        echo "<a href='clinic.html'>Add Another</a> | <a href='view_clinic.php'>View Clinics</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
