<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM patients WHERE PATIENT_ID = $id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Update Patient</title></head>
<body>
  <h2>Update Patient</h2>
  <form action="update_patient_action.php" method="POST">
    <input type="hidden" name="PATIENT_ID" value="<?php echo $row['PATIENT_ID']; ?>">
    DATE: <input type="date" name="DATE" value="<?php echo $row['DATE']; ?>"><br><br>
    NAME: <input type="text" name="PATIENT_NAME" value="<?php echo $row['PATIENT_NAME']; ?>"><br><br>
    PHONE NUMBER: <input type="number" name="PATIENT_PHNO" value="<?php echo $row['PATIENT_PHNO']; ?>"><br><br>
    AGE: <input type="number" name="AGE" value="<?php echo $row['AGE']; ?>"><br><br>
    GENDER: <input type="text" name="GENDER" value="<?php echo $row['GENDER']; ?>"><br><br>
    ADDRESS: <input type="text" name="ADDRESS" value="<?php echo $row['ADDRESS']; ?>"><br><br>
    Doctor ID: <input type="number" name="Doc_Id" value="<?php echo $row['Doc_Id']; ?>"><br><br>

    <input type="submit" value="Update Patient">
  </form>
</body>
</html>
