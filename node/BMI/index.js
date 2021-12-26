var http = require('http')
var fs = require('fs')
var {parse} = require('querystring')

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
					console.log(parse(body))
					response.end('ok')
				})
			}
		})
		.listen(5000)
})

console.log('Server is listening @ port 5000')
