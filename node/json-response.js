var http = require("http");

http.createServer((request, response) => {

    if(request.url == "/data"){  
        response.writeHead(200, {"Content-Type": "application/json"});
        response.write(JSON.stringify({message: "okay you can write whatever you want to write"}));
    }

}).listen(5000)

console.log("Server is listening @ port 5000");