<?php 
namespace B;
use A;
//const test = ’Btest’;

function test() { 
	echo '我是b.php的test()----';
	return __FUNCTION__; 
}

class Test{
	public function __construct(){
		return __METHOD__;
	}
}
include "a.php";//必须包含A命名空间的文件
echo A\test();   //输出A\test
echo '<br>';
echo namespace\test();	// namespace关键字代表当前命名空间

print_r(new namespace\Test());
echo '<br>';
print_r(new A\Test());
/*
// 限定名称  
// 这里已经通过`use A`申明了在这个文件可以通过`A...`使用A命名空间的函数
echo A	est;	//输出Atest
// 非限定名称
// 非限定名称的函数`test`会从当前命名控件查找，即B
echo test;	  //输出Btest

echo namespace/test;
*/

include "c.php";
use  C\TEST\TEST2 AS TEST3;
TEST3\test();


?>
<meta charset="utf-8">