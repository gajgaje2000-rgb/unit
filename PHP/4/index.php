<!DOCTYPE html>
<html>
<head>
    <title>Employee AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Employee Records</h2>

<!-- FORM -->
<input type="text" id="name" placeholder="Employee Name" class="form-control mb-2">
<input type="text" id="dept" placeholder="Department" class="form-control mb-2">
<input type="number" id="salary" placeholder="Salary" class="form-control mb-2">

<button onclick="addEmployee()" class="btn btn-success">Add Employee</button>

<hr>

<div id="data"></div>

<script>
// LOAD DATA
function loadData() {
    fetch("fetch.php")
    .then(res => res.text())
    .then(data => {
        document.getElementById("data").innerHTML = data;
    });
}

// INSERT
function addEmployee() {
    let name = document.getElementById("name").value;
    let dept = document.getElementById("dept").value;
    let salary = document.getElementById("salary").value;

    fetch("insert.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `name=${name}&dept=${dept}&salary=${salary}`
    })
    .then(() => {
        loadData();
    });
}

// DELETE
function deleteEmployee(id) {
    fetch("delete.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `id=${id}`
    })
    .then(() => loadData());
}

// UPDATE (salary only)
function updateEmployee(id, name, dept, salary) {
    let newName = prompt("Enter name:", name);
    let newDept = prompt("Enter department:", dept);
    let newSalary = prompt("Enter salary:", salary);

    fetch("update.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `id=${id}&name=${newName}&dept=${newDept}&salary=${newSalary}`
    })
    .then(() => loadData());
}

// AUTO LOAD
loadData();
</script>

</body>
</html>