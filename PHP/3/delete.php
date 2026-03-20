<?php
include 'db.php';

$id = $_POST['id'];

mysqli_query($conn, "DELETE FROM books WHERE book_id=$id");
?>