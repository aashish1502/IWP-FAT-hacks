var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/mydb";

MongoClient.connect(url, function(err, db) {

    const readline = require('readline').createInterface({
        input: process.stdin,
        output: process.stdout
      })
      
      readline.question(`What's the ID you want to fetch? `, id => {
        if (err) throw err;
        var dbo = db.db("mydb");
        const test = parseInt(id)
        dbo.collection("employees").findOne({_id: test}, function(err, res){
            if (err) throw err;
            if(!res)
                console.log("data not present in the Database!");
            else
                console.log(res);
            db.close();
        });
        readline.close()
      })

  });

  