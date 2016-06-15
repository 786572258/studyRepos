<?php	
//file a.php
namespace A;
//const test = ’Atest’;

function test() { 
	echo '我是a.php的test()----';
	return __FUNCTION__;
}

class Test{
	public function __construct() {
		return __METHOD__;
	}
}
?>