<?php
function make($name, $concrete = '') {
	echo $name;
	echo call_user_func_array($concrete, [3,4,5]);
	//print_r($concrete);
}

echo make('wei', function($a,$b){
	echo $a . '--'. $b;
	return '返回';
});
