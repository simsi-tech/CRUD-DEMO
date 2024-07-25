<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM employees WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Employee</title>
</head>
<body>
    <h2>View Employee</h2>
    <p>Name: <?php echo $row['name']; ?></p>
    <p>Address: <?php echo $row['address']; ?></p>
    <p>Salary: <?php echo $row['salary']; ?></p>
    <p>Position: <?php echo $row['position']; ?></p>
    <p>Department: <?php echo $row['department']; ?></p>
    <p>Hire Date: <?php echo $row['hire_date']; ?></p>
    <a href="index.php">Back to list</a>
</body>
</html>

<?php $conn->close(); ?>
