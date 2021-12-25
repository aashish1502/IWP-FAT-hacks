var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/mydb";

MongoClient.connect(url, function(err, db) {
    if (err) throw err;
    var dbo = db.db("mydb");
    var myobj = [
        { mname: 'Vertigo', actor:'James', actress:'Katy', direction:'John', running_time:'3', rating: "9.5"},
        { mname: 'The Innocent', actor:'Jake', actress:'Betty', direction:'Michael', running_time:'2.5', rating: "8.5"},
        { mname: 'Spirited Away', actor:'Stephen', actress:'Nicole', direction:'San', running_time:'1.5', rating: "7.9"},
        { mname: 'Braveheart', actor:'James', actress:'Katy', direction:'John', running_time:'3', rating: "5.5"},
        { mname: 'Back to the Future', actor:'James', actress:'Katy', direction:'John', running_time:'3', rating: "6.5"},
    ]
    dbo.collection("movies").insertMany(myobj, function(err, res){
        if (err) throw err;
        console.log("row inserted!");
        console.log(res);
        db.close();
    });
});
