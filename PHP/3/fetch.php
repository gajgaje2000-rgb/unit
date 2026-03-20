<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM books");

echo "<table class='table table-bordered'>
<tr>
<th>ID</th><th>Name</th><th>Author</th><th>Price</th><th>Action</th>
</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['book_id']}</td>
    <td>{$row['book_name']}</td>
    <td>{$row['author']}</td>
    <td>{$row['price']}</td>
    <td>
        <button onclick='updateBook({$row['book_id']})' class='btn btn-warning btn-sm'>Update</button>
        <button onclick='deleteBook({$row['book_id']})' class='btn btn-danger btn-sm'>Delete</button>
    </td>
    </tr>";
}

echo "</table>";
?>