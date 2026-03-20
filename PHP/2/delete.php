<?php
include 'db.php';

// Get ID from URL
$id = $_GET['id'];

// 👉 CHANGE TABLE NAME if needed
mysqli_query($conn, "DELETE FROM employees WHERE id=$id");

// Redirect back
header("Location: index.php");
?>