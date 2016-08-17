/*console.log( __filename );*/

/*
function printHello(){
    console.log( "Hello, World!");
}
// 两秒后执行以上函数
setTimeout(printHello, 2000);
*/

/*
function printHello(){
    console.log( "Hello, World!");
}
// 两秒后执行以上函数
setInterval(printHello, 2000);
*/

/*
 var data = [{id:1}, {id:2}];
 var str = JSON.stringify(data);
 var data2 = JSON.parse(str);

 var $json = global;
 $str = JSON.stringify($json)
 //JSON.stringify(global);
 console.log($str);*/


var http = require('http');
var url = require('url');
var util = require('util');

http.createServer(function(req, res){
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.write(util.inspect(global));
    res.write('----------------------\n');
    res.end(util.inspect(url.parse(req.url, true)));

}).listen(3000);
//在浏览器中访问http://localhost:3000/user?name=w3c&email=w3c@w3cschool.cc 然后查看返回结果:
