<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id']);  // sanitize input
$result = $conn->query("SELECT * FROM medical_record WHERE RECORD_ID = $id");

if ($result->num_rows == 0) die("Medical record not found");

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Update Medical Record</title></head>
<body>
  <h2>Update Medical Record</h2>
  <form action="update_medical_record_action.php" method="POST">
    <input type="hidden" name="RECORD_ID" value="<?php echo htmlspecialchars($row['RECORD_ID']); ?>">

    Patient ID: <input type="number" name="PATIENT_ID" value="<?php echo htmlspecialchars($row['PATIENT_ID']); ?>" required><br><br>
    Medicine: <input type="text" name="MEDICINE" value="<?php echo htmlspecialchars($row['MEDICINE']); ?>"><br><br>
    Doctor ID: <input type="number" name="DOC_ID" value="<?php echo htmlspecialchars($row['DOC_ID']); ?>" required><br><br>
    Visit Date: <input type="date" name="VISIT_DATE" value="<?php echo htmlspecialchars($row['VISIT_DATE']); ?>" required><br><br>
    Diagnosis: <input type="text" name="DIAGNOSIS" value="<?php echo htmlspecialchars($row['DIAGNOSIS']); ?>"><br><br>
    Fee: <input type="number" step="0.01" name="FEE" value="<?php echo htmlspecialchars($row['FEE']); ?>"><br><br>
    Treatment: <input type="text" name="TREATMENT" value="<?php echo htmlspecialchars($row['TREATMENT']); ?>"><br><br>

    <input type="submit" value="Update Medical Record">
  </form>
</body>
</html>
