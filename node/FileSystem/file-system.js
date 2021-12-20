
let fs = require('fs')

var http = require("http");
http.createServer((request, response) => {

    /* Reading a file */
    fs.readFile("FileToReadFrom.txt", 'utf8', (err, data) => {
        console.log(data);
        response.writeHead(200, {"Content-Type": "text/plain"});
        response.end(data,"utf-8");
    
    });

    
    /* Creating a file */
    fs.open('fileToCreate.txt','w', (err, data) => {

        if(err){
            console.error()
        }
        else{
            console.log("file created!");
        }

    })

    /* Writing a file */
    fs.writeFile('fileToWrite.txt','write anything you want and then yup run it file written kr dena console dot log pe', (err, data) => {

        if(err){
            console.error()
        }
        else{
            console.log("file written!");
        }

    })
    
    /* Updating a file */
    fs.appendFile('fileToWrite.txt','\ridhar likho jo tumhara jo man hai , i said tumhara jo man hai achha okay ugh idhar i didnt stop ', (err, data) => {

        if(err){
            console.error()
        }
        else{
            console.log("file appened!");
        }

    })
    

    /* Deleting a file */
    fs.unlink('fileToCreate.txt', (err) => {

        if(err){
            console.error()
        }

    })


}).listen(5000)

console.log("Server is listening @ port 5000");
