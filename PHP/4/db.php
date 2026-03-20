<?php
//  CHANGE if needed
$host = "localhost";
$user = "root";
$password = "";
$dbname = "student_db"; // using same DB

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>