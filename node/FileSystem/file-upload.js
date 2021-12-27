var http = require('http')
var fs = require('fs')
var formidable = require('formidable')

http
	.createServer((request, response) => {
		if (request.url == '/myfileUpload') {
			var form = new formidable.IncomingForm()
			form.parse(request, (err, fields, files) => {
				if (err) {
					console.log('test1')
					console.error(err)
				}
				var oldPath = files.filetoupload.filepath
				var newPath =
					'D:DocumentVIT\5th_SEMESTERIWP_CSE3002TheoryIWP-FAT-hacks\nodeFileSystemMyFiles/' +
					files.filetoupload.originalFilename
				fs.rename(oldPath, newPath, (err) => {
					response.write('done finally *sigh*')
					response.end()
				})
			})
		} else {
			response.writeHead(200, { 'Content-Type': 'text/html' })
			response.write(
				'<form action="myfileUpload" method="post" enctype="multipart/form-data">'
			)
			response.write('<input type="file" name="filetoupload"><br>')
			response.write('<input type="submit">')
			response.write('</form>')
			return response.end()
		}
	})
	.listen(8080)

console.log('Server is listening @ port 8080')
