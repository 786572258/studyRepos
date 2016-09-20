<?php
$dsn = "mysql:host=127.0.0.1;dbname=test";
$db = new PDO($dsn, 'root', 'root');
var_dump($db);
exit;
//==================可变参数函数的写法========================
function f($i, $j, ...$k) {
	var_dump($k);
}

f(1,2,3,4,5,6);
exit;

//==================使用表达式定义常量========================
const ONE = 1;
const TWO = ONE + ONE;
echo TWO;
exit;

//===================yield生成器例子1========================
function gen() {
	$cmd = (yield "第一个");
//	var_dump($cmd);
	$cmd = (yield "第二个");
//	var_dump($cmd);
	yield "第三个";
}

$gen = gen();
//var_dump($gen->current());
foreach($gen as $k => $v) {
//	$gen->send($k);
	echo "$k => $v".PHP_EOL;
}
//var_dump($gen->send("one"));
//var_dump($gen->send("one"));
//var_dump($gen->send("one"));
exit;

//=========================yield生成器例子2=======================
function xrange($start, $limit, $step = 1) {
    for ($i = $start; $i <= $limit; $i += $step) {
        yield $i;
    }
}

$x = xrange(1,100);
foreach($x as $k => $v) {
	echo $v . '-';
}
//print_r($x);
exit;


//=========================::class 测试==========================
class Test {
	public $name = "wei";
	public function showName() {
		echo $this->name;
	}
}

$test = new Test();
$test->showName();
echo Ti::class;
