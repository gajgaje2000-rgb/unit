<?php
include 'db.php';

$name = $_POST['name'];
$author = $_POST['author'];
$price = $_POST['price'];

mysqli_query($conn, "INSERT INTO books (book_name, author, price)
                     VALUES ('$name', '$author', '$price')");
?>