var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/mydb";

MongoClient.connect(url, function(err, db) {
    if (err) throw err;
    var sort = {name: 1}
    var dbo = db.db("mydb");
    dbo.collection("customers").find({}).sort(sort).toArray(function(err, res){
        if (err) throw err;
        console.log(res);
        db.close();
    });
  });

  