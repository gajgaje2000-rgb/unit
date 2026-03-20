<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM employees");

echo "<table class='table table-bordered'>
<tr>
<th>ID</th><th>Name</th><th>Department</th><th>Salary</th><th>Action</th>
</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['emp_id']}</td>
    <td>{$row['emp_name']}</td>
    <td>{$row['department']}</td>
    <td>{$row['salary']}</td>
    <td>
        <button onclick=\"updateEmployee(
            {$row['emp_id']},
            '{$row['emp_name']}',
            '{$row['department']}',
            {$row['salary']}
        )\" class='btn btn-warning btn-sm'>Update</button>

        <button onclick=\"deleteEmployee({$row['emp_id']})\" 
        class='btn btn-danger btn-sm'>Delete</button>
    </td>
    </tr>";
}

echo "</table>";
?>