var http = require("http");
var url = require("url");

function start(route) {
  function onRequest(request, response) {
	//console.log(url.parse(request.url));
    var pathname = url.parse(request.url).pathname;
    console.log("Request for " + pathname + " received.");

    route(pathname);

    response.writeHead(200, {"Content-Type": "text/plain"});
    response.write("Hello World");
    response.end();
  }

  http.createServer(onRequest).listen(8888);
  console.log("Server has started.");
}

function test() {
  console.log("test.......");
}

exports.start = start;
exports.test = test;