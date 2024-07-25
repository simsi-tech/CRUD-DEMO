<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $address = $conn->real_escape_string($_POST["address"]);
    $salary = $conn->real_escape_string($_POST["salary"]);
    $position = $conn->real_escape_string($_POST["position"]);
    $department = $conn->real_escape_string($_POST["department"]);
    $hire_date = $conn->real_escape_string($_POST["hire_date"]);

    $sql = "INSERT INTO employees (name, address, salary, position, department, hire_date) VALUES ('$name', '$address', '$salary', '$position', '$department', '$hire_date')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
</head>
<body>
    <h2>Create New Employee</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" required><br><br>
        Address: <input type="text" name="address" required><br><br>
        Salary: <input type="number" step="0.01" name="salary" required><br><br>
        Position: <input type="text" name="position" required><br><br>
        Department: <input type="text" name="department" required><br><br>
        Hire Date: <input type="date" name="hire_date" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Back to list</a>
</body>
</html>
