<?php
include 'db.php';

if(isset($_POST['submit'])) {
    //  CHANGE COLUMN NAMES if needed
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $department = $_POST['department'];

    mysqli_query($conn, "INSERT INTO employees (name, salary, department) 
                         VALUES ('$name', '$salary', '$department')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Add Employee</h2>

<form method="POST">
    <input type="text" name="name" class="form-control mb-2" placeholder="Enter Name" required>
    <input type="number" name="salary" class="form-control mb-2" placeholder="Enter Salary" required>
    <input type="text" name="department" class="form-control mb-2" placeholder="Enter Department" required>

    <button type="submit" name="submit" class="btn btn-success">Save</button>
</form>

</body>
</html>