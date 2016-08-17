var server = require("./server");
var router = require("./router");

//server.test();
server.start(router.route);