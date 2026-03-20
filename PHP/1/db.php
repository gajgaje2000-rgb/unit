<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "student_db"; // your database name

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>