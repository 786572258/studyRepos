var http = require('http');

http.createServer(function (request, response) {

	// 发送 HTTP 头部 
	// HTTP 状态值: 200 : OK
	// 内容类型: text/plain
	response.writeHead(200, {'Content-Type': 'text/plain'});
	//阻塞代码实例
var fs = require("fs");

var data = fs.readFileSync('input.txt');
	response.end(data.toString());	
	response.end("同步!");	
	response.end("程序执行结束!");
	// 发送响应数据 "Hello World"
	//response.end('Hello World\n');

}).listen(8888);

