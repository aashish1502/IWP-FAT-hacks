var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/mydb";

var myobj = { name: "Company Inc", address: "Highway 37" };
dbo.collection("customers").insertOne(myobj, function(err, res){
    if (err) throw err;
    console.log("row inserted!");
    console.log(res);
    db.close();
});