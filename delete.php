<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $sql = "DELETE FROM employees WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Employee</title>
</head>
<body>
    <h2>Delete Employee</h2>
    <p>Are you sure you want to delete this employee?</p>
    <p>Name: <?php echo $row['name']; ?></p>
    <p>Address: <?php echo $row['address']; ?></p>
    <p>Salary: <?php echo $row['salary']; ?></p>
    <p>Position: <?php echo $row['position']; ?></p>
    <p>Department: <?php echo $row['department']; ?></p>
    <p>Hire Date: <?php echo $row['hire_date']; ?></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit" value="Delete">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>

<?php $conn->close(); ?>
