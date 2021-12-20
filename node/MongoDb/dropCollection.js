var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/mydb";

MongoClient.connect(url, function(err, db) {
    if (err) throw err;
    var dbo = db.db("mydb");
    dbo.collection("Person").drop(function(err, res){
        if (err) throw err;
        if(res){
            console.log("Collection dropped!");
        }
        db.close();
    });
  });

  