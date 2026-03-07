<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "clinic_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM appointment";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Appointments</title>
</head>
<body>
  <h2>Appointments</h2>
  <table border="1" cellpadding="8">
    <tr>
      <th>Patient ID</th>
      <th>Doctor ID</th>
      <th>Visit Date</th>
      <th>Visit Time</th>
      <th>Reason</th>
      <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo htmlspecialchars($row['patient_id']); ?></td>
        <td><?php echo htmlspecialchars($row['doctor_id']); ?></td>
        <td><?php echo htmlspecialchars($row['visit_date']); ?></td>
        <td><?php echo htmlspecialchars($row['visit_time']); ?></td>
        <td><?php echo htmlspecialchars($row['reason_for_visit']); ?></td>
        <td>
          <a href="update_appointment.php?id=<?php echo $row['appointment_id']; ?>">Update</a> |
          <a href="delete_appointment.php?id=<?php echo $row['appointment_id']; ?>" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
  <br>
  <a href="add_appointment.html">Add Appointment</a>
</body>
</html>

<?php
$conn->close();
?>
