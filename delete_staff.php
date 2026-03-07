<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {
    $conn = new mysqli("localhost", "root", "", "clinic_db");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $STAFF_ID = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM staff WHERE STAFF_ID = ?");
    $stmt->bind_param("i", $STAFF_ID);

    if ($stmt->execute()) {
        echo "Staff member deleted successfully. <a href='view_staff.php'>View All</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No ID specified.";
}
?>
