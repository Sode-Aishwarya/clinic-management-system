<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id']);  // sanitize input
$result = $conn->query("SELECT * FROM staff WHERE STAFF_ID = $id");

if ($result->num_rows == 0) die("Staff member not found");

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Update Staff</title></head>
<body>
  <h2>Update Staff Member</h2>
  <form action="update_staff_action.php" method="POST">
    <input type="hidden" name="STAFF_ID" value="<?php echo htmlspecialchars($row['STAFF_ID']); ?>">

    Name: <input type="text" name="STAFF_NAME" value="<?php echo htmlspecialchars($row['STAFF_NAME']); ?>" required><br><br>
    Address: <input type="text" name="ADDRESS" value="<?php echo htmlspecialchars($row['ADDRESS']); ?>"><br><br>
    Job: <input type="text" name="JOB" value="<?php echo htmlspecialchars($row['JOB']); ?>"><br><br>
    Phone Number: <input type="text" name="ST_PHNO" value="<?php echo htmlspecialchars($row['ST_PHNO']); ?>"><br><br>

    <input type="submit" value="Update Staff">
  </form>
</body>
</html>
