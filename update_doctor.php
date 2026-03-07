<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);  // sanitize input
$result = $conn->query("SELECT * FROM doctor WHERE DOCTOR_ID = $id");

if ($result->num_rows == 0) {
    die("Doctor not found");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Update Doctor</title></head>
<body>
  <h2>Update Doctor</h2>
  <form action="update_doctor_action.php" method="POST">
    <input type="hidden" name="DOCTOR_ID" value="<?php echo htmlspecialchars($row['DOCTOR_ID']); ?>">

    Name: <input type="text" name="DOCTOR_NAME" value="<?php echo htmlspecialchars($row['DOCTOR_NAME']); ?>" required><br><br>
    Phone Number: <input type="text" name="DOCTOR_PHNO" value="<?php echo htmlspecialchars($row['DOCTOR_PHNO']); ?>" required><br><br>
    Address: <input type="text" name="ADDRESS" value="<?php echo htmlspecialchars($row['ADDRESS']); ?>"><br><br>
    Specialization: <input type="text" name="SPECIALIZATION" value="<?php echo htmlspecialchars($row['SPECIALIZATION']); ?>"><br><br>

    <input type="submit" value="Update Doctor">
  </form>
</body>
</html>
