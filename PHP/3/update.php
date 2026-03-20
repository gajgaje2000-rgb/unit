<?php
include 'db.php';

$id = $_POST['id'];
$price = $_POST['price'];

mysqli_query($conn, "UPDATE books SET price='$price' WHERE book_id=$id");
?>