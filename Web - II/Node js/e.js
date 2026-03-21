const http = require('http');
http.createServer(function (req, res) {
    if (req.url == "/") {
        res.write("Home Page");
    }
    else if (req.url == "/about") {
        res.write("About Page");
    }
    else {
        res.write("Page Not Found");
    }
    res.end();
}).listen(3000);
console.log("Server running at http://localhost:3000"); 