var http = require('http')
var fs = require('fs')
var { parse } = require('querystring')
var MongoClient = require('mongodb').MongoClient
var url = 'mongodb://localhost:27017/mydb'

//Creating the collection
MongoClient.connect(url, function (err, db) {
	if (err) {
		throw err
	}
	var dbo = db.db('mydb')
	dbo.createCollection('bmi', function (err, res) {
		if (err) {
			//console.log(err);
			if (err.codeName =="NamespaceExists") {
				console.log("Already Exists Collection");
				return;
			}
		}
		console.log('Collection created!')
		db.close()
	})
})

//Reading HTML and creating server
fs.readFile('./index.html', function (err, html) {
	if (err) {
		throw err
	}
	http
		.createServer(function (request, response) {
			response.writeHeader(200, { 'Content-Type': 'text/html' })
			response.write(html)
			if (request.url == '/result') {
				let body = ''
				request.on('data', (chunk) => {
					body += chunk.toString()
				})
				request.on('end', () => {
					var obj = parse(body)
					var today = new Date()
					var birthDate = new Date(obj.dob)
					var age = today.getFullYear() - birthDate.getFullYear()
					var m = today.getMonth() - birthDate.getMonth()
					if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
						age--
					}
					var bmi = (obj.weight/obj.height);
					obj.bmi=bmi
					console.log("Age is :",age)
					obj.name = obj.name.toUpperCase()
					MongoClient.connect(url, function (err, db) {
						if (err) {
							throw err
						}
						var dbo = db.db('mydb')
						dbo.collection('bmi').insertOne(obj, function (err, res) {
							if (err) throw err
							console.log('row inserted!')
							console.log(res)
							db.close()
						})
					})
					console.log(obj)
					response.write("Age :"+age)
					response.write("BMI :"+bmi)
					response.end()
				})
			}
		})
		.listen(5000)
})

console.log('Server is listening @ port 5000')
