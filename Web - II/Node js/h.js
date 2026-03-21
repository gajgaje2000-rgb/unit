const http = require('http');
const os = require('os');

http.createServer(function (req, res) {

    res.write("Hostname: " + os.hostname() + "\n");
    res.write("Platform: " + os.platform() + "\n");
    
    res.write("Free Memory: " + (os.freemem() / (1024 * 1024 * 1024)).toFixed(2) + " GB");

    res.end();

}).listen(3000);

console.log("Server running at http://localhost:3000");