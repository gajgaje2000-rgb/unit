<?php
include 'db.php';

$name = $_POST['name'];
$dept = $_POST['dept'];
$salary = $_POST['salary'];

mysqli_query($conn, "INSERT INTO employees (emp_name, department, salary)
                     VALUES ('$name', '$dept', '$salary')");
?>