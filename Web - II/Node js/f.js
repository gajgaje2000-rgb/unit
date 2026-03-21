const fs = require('fs');
// 1. Create File 
fs.writeFile('demo.txt', 'This is Node.js File System Demo',
    function (err) {
        if (err) throw err;
        console.log("File created successfully");

        // 2. Read File 
        fs.readFile('demo.txt', 'utf8', function (err, data) {
            if (err) throw err;
            console.log("File Content:", data);

            // 3. Append Data 
            fs.appendFile('demo.txt', '\nNew data added',
                function (err) {
                    if (err) throw err;
                    console.log("Data appended");

                    // 4. Rename File 
                    fs.rename('demo.txt', 'newdemo.txt', function (err) {
                        if (err) throw err;
                        console.log("File renamed");

                        // 5. Delete File 
                        fs.unlink('newdemo.txt', function (err) {
                            if (err) throw err;
                            console.log("File deleted");
                        });
                    });
                });
        });
    });