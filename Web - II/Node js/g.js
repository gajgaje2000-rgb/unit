const http = require('http');
const fs = require('fs');

http.createServer(function (req, res) {

    fs.readFile('index.html', (err, data) => {

        if (err) {
            res.writeHead(404, { 'Content-Type': 'text/plain' });
            res.write("File not found");
            return res.end();
        }

        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.write(data);
        res.end();
    });

}).listen(5000);

console.log("Server running at http://localhost:5000");