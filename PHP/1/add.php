<?php
include 'db.php';

if(isset($_POST['submit'])) {
    //  CHANGE COLUMN NAMES if needed
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "INSERT INTO students (name, email) VALUES ('$name', '$email')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Add Student</h2>

<form method="POST">
    <input type="text" name="name" class="form-control mb-2" placeholder="Enter Name" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Enter Email" required>
    <button type="submit" name="submit" class="btn btn-success">Save</button>
</form>

</body>
</html>