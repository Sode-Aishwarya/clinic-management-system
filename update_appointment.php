<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id']);  // sanitize input
$result = $conn->query("SELECT * FROM appointment WHERE appointment_id = $id");

if ($result->num_rows == 0) die("Appointment not found");

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Update Appointment</title></head>
<body>
  <h2>Update Appointment</h2>
  <form action="update_appointment_action.php" method="POST">
    <input type="hidden" name="appointment_id" value="<?php echo htmlspecialchars($row['appointment_id']); ?>">

    Patient ID: <input type="number" name="patient_id" value="<?php echo htmlspecialchars($row['patient_id']); ?>" required><br><br>
    Doctor ID: <input type="number" name="doctor_id" value="<?php echo htmlspecialchars($row['doctor_id']); ?>" required><br><br>
    Visit Date: <input type="date" name="visit_date" value="<?php echo htmlspecialchars($row['visit_date']); ?>" required><br><br>
    Visit Time: <input type="time" name="visit_time" value="<?php echo htmlspecialchars($row['visit_time']); ?>" required><br><br>
    Reason for Visit: <input type="text" name="reason_for_visit" value="<?php echo htmlspecialchars($row['reason_for_visit']); ?>"><br><br>

    <input type="submit" value="Update Appointment">
  </form>
</body>
</html>
