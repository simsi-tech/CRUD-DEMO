<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
</head>
<body>
    <h2>Employee Management</h2>
    <a href="create.php">Create New Employee</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Position</th>
            <th>Department</th>
            <th>Hire Date</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <td><?php echo $row['position']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td><?php echo $row['hire_date']; ?></td>
            <td>
                <a href="read.php?id=<?php echo $row['id']; ?>">View</a>
                <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
