<?php
/*策略模式 计算器*/
interface Math {
	public function calc($op1, $op2);
}

class MatchAdd implements Math {
	public function calc($op1, $op2) {
		return $op1+$op2;
	}
}

class MatchSub implements Math {
	public function calc($op1, $op2) {
		return $op1-$op2;
	}
}

class MatchMul implements Math {
	public function calc($op1, $op2) {
		return $op1*$op2;
	}
}

class MatchDiv implements Math {
	public function calc($op1, $op2) {
		return $op1/$op2;
	}
}


//虚拟计算器
class CMath {
	protected  $matchX = null;
	public function __construct($operator) {
		$matchX = 'Match' . $operator;
		$this->matchX = new $matchX();
	}
	
	public function calc($op1, $op2) {
		return $this->matchX->calc($op1, $op2);
	}
}

$type = $_POST['operator'];
$cMath = new CMath($type);
$res = $cMath->calc($_POST['operand1'], $_POST['operand2']);
echo '结果：'.$res;
?>