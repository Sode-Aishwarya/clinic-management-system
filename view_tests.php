<?php
$conn = new mysqli("localhost", "root", "", "clinic_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Tests</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <h2>All Tests</h2>
    <a href="tests.html">Add New Test</a><br><br>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    
                    <th>TEST_TYPE</th>
                    <th>TEST_REPORT</th>
                    <th>BILL</th>
                    <th>D_ID</th>
                    <th>P_ID</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    
                    <td><?php echo htmlspecialchars($row['TEST_TYPE']); ?></td>
                    <td><?php echo htmlspecialchars($row['TEST_REPORT']); ?></td>
                    <td><?php echo htmlspecialchars($row['BILL']); ?></td>
                    <td><?php echo htmlspecialchars($row['D_ID']); ?></td>
                    <td><?php echo htmlspecialchars($row['P_ID']); ?></td>
                    
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No test records found.</p>
    <?php endif; ?>

<?php
$conn->close();
?>
</body>
</html>
