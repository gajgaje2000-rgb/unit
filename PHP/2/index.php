<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Employee Records</h2>
<a href="add.php" class="btn btn-primary mb-3">Add Employee</a>

<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Salary</th>
    <th>Department</th>
    <th>Action</th>
</tr>

<?php
//  CHANGE TABLE NAME if needed
$result = mysqli_query($conn, "SELECT * FROM employees");

while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['salary']; ?></td>
    <td><?= $row['department']; ?></td>
    <td>
    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit Salary</a>

    <!-- DELETE BUTTON -->
    <a href="delete.php?id=<?= $row['id']; ?>" 
       class="btn btn-danger btn-sm"
       onclick="return confirm('Are you sure?')">
       Delete
    </a>
</td>
</tr>
<?php } ?>

</table>
</body>
</html>