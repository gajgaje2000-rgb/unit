function getStudent() {

    var sid = document.getElementById("sid").value;

    // Create XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // open(method, URL, async)
    xhr.open("GET", "students.json", true);

    // readyState change event
    xhr.onreadystatechange = function () {

        // readyState 4 = request complete
        // status 200 = success
        if (xhr.readyState == 4 && xhr.status == 200) {

            var data = JSON.parse(xhr.responseText);

            var students = data.students;
            var output = "Student Not Found";

            for (var i = 0; i < students.length; i++) {

                if (students[i].id == sid) {
                    output = `
                        Name: ${students[i].name} <br>
                        Course: ${students[i].course} <br>
                        Marks: ${students[i].marks}
                    `;
                }
            }

            document.getElementById("result").innerHTML = output;
        }
    };

    // Send request
    xhr.send();
}