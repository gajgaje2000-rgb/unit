<?php
include 'db.php';

$id = $_POST['id'];

mysqli_query($conn, "DELETE FROM employees WHERE emp_id=$id");
?>