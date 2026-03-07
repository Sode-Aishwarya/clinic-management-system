<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "clinic_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $CLINIC_ID = intval($_POST["CLINIC_ID"]);
    $CLINIC_NAME = $_POST["CLINIC_NAME"];
    $CLINIC_LOCATION = $_POST["CLINIC_LOCATION"];
    $P_id = $_POST["P_id"];
    $STAFF_id = $_POST["STAFF_id"];
    $DOC_ID = $_POST["DOC_ID"];

    $sql = "UPDATE clinic SET 
                CLINIC_NAME = '$CLINIC_NAME',
                CLINIC_LOCATION = '$CLINIC_LOCATION',
                P_id = '$P_id',
                STAFF_id = '$STAFF_id',
                DOC_ID = '$DOC_ID'
            WHERE CLINIC_ID = $CLINIC_ID";

    if ($conn->query($sql) === TRUE) {
        echo "Clinic record updated successfully.<br>";
        echo "<a href='view_clinic.php'>View Clinics</a>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
