var MongoClient = require('mongodb').MongoClient
var url = 'mongodb://localhost:27017/mydb'

MongoClient.connect(url, function (err, db) {
	const readline = require('readline').createInterface({
		input: process.stdin,
		output: process.stdout,
	})

	readline.question(`Rate? `, (rate) => {
		if (err) throw err
		var dbo = db.db('mydb')
		const test = rate
		dbo.collection('movies').find({ rating: {$lt: test} }).toArray(function (err, res) {
			if (err) throw err
			if (!res) console.log('Data not present in the Database!')
			else console.log(res)
			db.close()
		})
		readline.close()
	})
})
