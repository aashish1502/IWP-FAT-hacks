var http = require("http");

http.createServer((request, response) => {

    response.writeHead(200, {"Content-Type": "text/plain"});
    response.end('Hello World\n');
}).listen(5000)

console.log("Server is listening @ port 5000");