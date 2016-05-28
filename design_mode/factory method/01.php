<meta charset="UTF-8">
<?php
/**
 *
 * 工厂方法：和简单工厂的区别在于对工厂类关闭修改。开闭原则。
 */
interface CalcFactory {
    function createOperation();
}

abstract class Operation {
    public $op1 = 0;
    public $op2 = 0;
    abstract function getResult();
}

class AddFactory implements CalcFactory {
    public function createOperation() {
        return new AddOperation();
    }
}

class AddOperation extends Operation{
    public function getResult() {
        return $this->op1+$this->op2;
    }
}

class SubFactory implements CalcFactory {
    public function createOperation() {
        return new SubOperation();
    }
}

class SubOperation extends Operation{
    public function getResult() {
        return $this->op1-$this->op2;
    }
}

class VCalc {
    public $op1 = 0;
    public $op = '+';
    public $op2 = 0;

    public function getResult() {
        switch($this->op) {
            case "+":
                $operation = new AddOperation
        }

    }
}
if($_POST) {
    $vCalc = new VCalc();
    $vCalc->op1 =  $_POST['op1'];
    $vCalc->op =  $_POST['op'];
    $vCalc->op2 =  $_POST['op2'];
    $result = $vCalc->getResult();
}

?>

<form action="" method="post">
    <input type="text" name="op1">
    <select name="op" id="">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="op2">
    <input type="submit" name="" >
</form>
<hr>
<p>结果：<? echo @$result; ?></p>
