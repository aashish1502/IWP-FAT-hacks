
let fs = require('fs')

var http = require("http");
http.createServer((request, response) => {

    

    fs.readFile("FileToReadFrom.txt", 'utf8', (err, data) => {
        console.log(data);
        response.writeHead(200, {"Content-Type": "text/plain"});
        response.end(data,"utf-8");
    
    });
    

}).listen(5000)

console.log("Server is listening @ port 5000");
