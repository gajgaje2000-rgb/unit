<?php
include 'db.php';

$id = $_GET['id'];

// Fetch employee
$result = mysqli_query($conn, "SELECT * FROM employees WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $salary = $_POST['salary'];

    mysqli_query($conn, "UPDATE employees SET salary='$salary' WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Salary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Update Salary</h2>

<form method="POST">
    <input type="text" value="<?= $data['name']; ?>" class="form-control mb-2" disabled>
    <input type="number" name="salary" value="<?= $data['salary']; ?>" class="form-control mb-2" required>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>

</body>
</html>