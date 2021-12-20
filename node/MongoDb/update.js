var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/mydb";

MongoClient.connect(url, function(err, db) {
    if (err) throw err;
    var dbo = db.db("mydb");
    var query = {address: "Ocean blvd 2"};
    var newValues = { $set: {name: "Mickey", address: "Canyon 123" } };
    dbo.collection("customers").updateMany(query, newValues, function(err, res){
        if (err) throw err;
        console.log(res);
        db.close();
    });
  });

  