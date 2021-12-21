var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/mydb";

MongoClient.connect(url, function(err, db) {
    if (err) throw err;
    var dbo = db.db("mydb");
    var myobj = [
        { _id:1 , name: 'Aashish', surname: 'Sharma', level:'Level 1', salary: "100000000000"},
        { _id:2 , name: 'Sanskrita', surname: 'Saha', level:'Level 1', salary: "100000000000"},
        { _id:3 , name: 'John', surname: 'Smith', level:'Level 2', salary: "10000000"},
        { _id:4 , name: 'Alex', surname: 'Benjamin', level:'Level 4', salary: "10000"},
        { _id:5 , name: 'Lily', surname: 'Potter', level:'Level 1', salary: "100000000000"},
        { _id:6 , name: 'James', surname: 'Potter', level:'Level 1', salary: "100000000000"},
        { _id:7 , name: 'Bill', surname: 'Cosby', level:'Level 0', salary: "10000000000000"},
        { _id:8 , name: 'this', surname: 'name', level:'Level 2', salary: "12345"},
        { _id:9 , name: 'Blind', surname: 'Girl', level:'Level 2', salary: "100000000000"},
    ]
    dbo.collection("employees").insertMany(myobj, function(err, res){
        if (err) throw err;
        console.log("row inserted!");
        console.log(res);
        db.close();
    });
  });

  