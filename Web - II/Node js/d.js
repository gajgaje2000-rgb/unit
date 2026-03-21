const http = require('http');
const url = require('url');
http.createServer(function (req, res) {
    const q = url.parse(req.url, true).query;
    res.write("Name: " + q.name + "\n");
    res.write("City: " + q.city);
    res.end();
}).listen(3000);
console.log("Server running at http://localhost:3000");
// //http://localhost:3000/?name=Bhumi&city=Surat url will give data to page