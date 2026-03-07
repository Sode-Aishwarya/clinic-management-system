<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "clinic_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $STAFF_ID = $_POST["STAFF_ID"];
    $STAFF_NAME = $_POST["STAFF_NAME"];
    $ADDRESS = $_POST["ADDRESS"];
    $JOB = $_POST["JOB"];
    $ST_PHNO = $_POST["ST_PHNO"];

    $sql = "INSERT INTO staff (STAFF_ID,STAFF_NAME, ADDRESS, JOB, ST_PHNO)
            VALUES ('$STAFF_ID','$STAFF_NAME', '$ADDRESS', '$JOB', '$ST_PHNO')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "Staff member added successfully! <br>";
        echo "<a href='staff.html'>Add Another</a> | <a href='view_staff.php'>View Staff</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
