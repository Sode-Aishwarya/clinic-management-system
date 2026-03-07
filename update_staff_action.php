<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "clinic_db");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $STAFF_ID = $_POST['STAFF_ID'];
    $STAFF_NAME = $_POST["STAFF_NAME"];
    $ADDRESS = $_POST["ADDRESS"];
    $JOB = $_POST["JOB"];
    $ST_PHNO = $_POST["ST_PHNO"];

    $stmt = $conn->prepare("UPDATE staff SET STAFF_NAME=?, ADDRESS=?, JOB=?, ST_PHNO=? WHERE STAFF_ID=?");
    $stmt->bind_param("ssssi", $STAFF_NAME, $ADDRESS, $JOB, $ST_PHNO, $STAFF_ID);

    if ($stmt->execute()) {
        echo "Staff updated successfully. <a href='view_staff.php'>View All</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
