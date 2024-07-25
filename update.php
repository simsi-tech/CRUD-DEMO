<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $conn->real_escape_string($_POST["name"]);
    $address = $conn->real_escape_string($_POST["address"]);
    $salary = $conn->real_escape_string($_POST["salary"]);
    $position = $conn->real_escape_string($_POST["position"]);
    $department = $conn->real_escape_string($_POST["department"]);
    $hire_date = $conn->real_escape_string($_POST["hire_date"]);

    $sql = "UPDATE employees SET name='$name', address='$address', salary='$salary', position='$position', department='$department', hire_date='$hire_date' WHERE id=$id";

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
    <title>Update Employee</title>
</head>
<body>
    <h2>Update Employee</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        Address: <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br><br>
        Salary: <input type="number" step="0.01" name="salary" value="<?php echo $row['salary']; ?>" required><br><br>
        Position: <input type="text" name="position" value="<?php echo $row['position']; ?>" required><br><br>
        Department: <input type="text" name="department" value="<?php echo $row['department']; ?>" required><br><br>
        Hire Date: <input type="date" name="hire_date" value="<?php echo $row['hire_date']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to list</a>
</body>
</html>
