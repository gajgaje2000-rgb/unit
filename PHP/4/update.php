<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$dept = $_POST['dept'];
$salary = $_POST['salary'];

// 👉 Update all fields
mysqli_query($conn, "UPDATE employees 
                     SET emp_name='$name',
                         department='$dept',
                         salary='$salary'
                     WHERE emp_id=$id");
?>