<!DOCTYPE html>
<html>
<head>
    <title>Library AJAX (Fetch)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Library Books</h2>

<!-- FORM -->
<input type="text" id="name" placeholder="Book Name" class="form-control mb-2">
<input type="text" id="author" placeholder="Author" class="form-control mb-2">
<input type="number" id="price" placeholder="Price" class="form-control mb-2">

<button onclick="addBook()" class="btn btn-success">Add Book</button>

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
function addBook() {
    let name = document.getElementById("name").value;
    let author = document.getElementById("author").value;
    let price = document.getElementById("price").value;

    fetch("insert.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `name=${name}&author=${author}&price=${price}`
    })
    .then(() => loadData());
}

// DELETE
function deleteBook(id) {
    fetch("delete.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `id=${id}`
    })
    .then(() => loadData());
}

// UPDATE
function updateBook(id) {
    let price = prompt("Enter new price:");

    fetch("update.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `id=${id}&price=${price}`
    })
    .then(() => loadData());
}

// LOAD ON START
loadData();
</script>

</body>
</html>