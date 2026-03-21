const http = require('http');
const url = require('url');
const fs = require('fs');
http.createServer(function (req, res) {
    const q = url.parse(req.url, true).query;
    res.writeHead(200, {
        'Content-Type': 'text/html'
    });
    if (req.url == "/") {
        res.write("<h1>Welcome to Node.js Server</h1>");
        res.write("<p>Use /about , /create , /read ,  /delete < /p>"); 
        }

    else if (req.url == "/about") {
        res.write("<h2>This is About Page</h2>");
    } else if (req.url.startsWith("/user")) {
        res.write("<h2>User Information</h2>");
        res.write("Name: " + q.name + "<br>");
        res.write("City: " + q.city);
    } else if (req.url == "/create") {
        fs.writeFile("demo.txt", "Node.js File Created", (err) => {
            if (err) throw err;
        });

        res.write("File Created");
    } else if (req.url == "/read") {
        fs.readFile("demo.txt", "utf8", (err, data) => {
            res.write("File Content: " + data);
            res.end();
        });
        return;
    } else if (req.url == "/delete") {
        fs.unlink("demo.txt", (err) => {
            if (err) throw err;
        });

        res.write("File Deleted");
    } else {
        res.write("Page Not Found");
    }

    res.end();

}).listen(3000);
console.log("Server running at http://localhost:3000");