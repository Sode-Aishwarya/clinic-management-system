<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "clinic_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $TEST_TYPE = $_POST["TEST_TYPE"];
    $TEST_REPORT = $_POST["TEST_REPORT"];
    $BILL = $_POST["BILL"];
    $D_ID = $_POST["D_ID"];
    $P_ID = $_POST["P_ID"];

    $sql = "INSERT INTO tests (TEST_TYPE, TEST_REPORT, BILL, D_ID, P_ID)
            VALUES ('$TEST_TYPE', '$TEST_REPORT', '$BILL', '$D_ID', '$P_ID')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "Test record added successfully! (TEST_ID = $last_id)<br>";
        echo "<a href='tests.html'>Add Another</a> | <a href='view_tests.php'>View Tests</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
