var MongoClient = require('mongodb').MongoClient
var url = 'mongodb://localhost:27017/mydb'

MongoClient.connect(url, function (err, db) {
	if (err) throw err
	var dbo = db.db('mydb')
	var query = { address: 'Highway 71' }
	dbo
		.collection('customers')
		.find(query)
		.toArray(function (err, res) {
			if (err) throw err
			console.log(res)
			db.close()
		})
})
