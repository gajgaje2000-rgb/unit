<?php
include 'db.php';

$id = $_GET['id'];

// Fetch data
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE students SET name='$name', email='$email' WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Edit Student</h2>

<form method="POST">
    <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control mb-2" required>
    <input type="email" name="email" value="<?= $data['email']; ?>" class="form-control mb-2" required>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>

</body>
</html>