<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM clinic WHERE CLINIC_ID = $id");

if ($result->num_rows == 0) {
    die("Clinic record not found");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Update Clinic</title></head>
<body>
  <h2>Update Clinic</h2>
  <form action="update_clinic_action.php" method="POST">
    <input type="hidden" name="CLINIC_ID" value="<?php echo htmlspecialchars($row['CLINIC_ID']); ?>">

    Clinic Name: <input type="text" name="CLINIC_NAME" value="<?php echo htmlspecialchars($row['CLINIC_NAME']); ?>" required><br><br>
    Clinic Location: <input type="text" name="CLINIC_LOCATION" value="<?php echo htmlspecialchars($row['CLINIC_LOCATION']); ?>" required><br><br>
    Patient ID: <input type="number" name="P_id" value="<?php echo htmlspecialchars($row['P_id']); ?>" required><br><br>
    Staff ID: <input type="number" name="STAFF_id" value="<?php echo htmlspecialchars($row['STAFF_id']); ?>" required><br><br>
    Doctor ID: <input type="number" name="DOC_ID" value="<?php echo htmlspecialchars($row['DOC_ID']); ?>" required><br><br>

    <input type="submit" value="Update Clinic">
  </form>
</body>
</html>
