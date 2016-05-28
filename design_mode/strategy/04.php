<?php
error_reporting(0);
/**
 * 商场收银系统，策略+工厂模式
 */

/*
 * 现金收取策略类
 */
class CashContext {
    public $cs = null;  //CashSuper对象

    public function __construct($type) {
        switch($type) {
            case 1:
                $this->cs = new CashRebate("0.8");
                break;
            case 2:
                $this->cs = new CashRebate("0.9");
                break;
            case 3:
                $this->cs = new CashReturn("300", "100");
                break;
            default:
                $this->cs = new CashNormal();
        }
        return $this->cs;
    }

    public function getResult($money) {
       return $this->cs->acceptCash($money);
    }
}

abstract class CashSuper{
    //收取现金
    abstract public function acceptCash($money);
}

/**
 * 现金收取超类
 */
class CashNormal extends CashSuper{
    public function acceptCash($money) {
        return $money;
    }
}

/**
 * 打折收费子类
 */
class CashRebate extends CashSuper{
    private $_rebate = 1;
    public function __construct($rebate) {
        $this->_rebate = $rebate;
    }

    public function acceptCash($money) {
        return $money*$this->_rebate;
    }
}

/**
 * 返利收费子类
 */
class CashReturn extends CashSuper{
    private $_moneyCondition = 0.00;
    private $_moneyReturn = 0.00;
    public function __construct($moneyCondition, $moneyReturn) {
        $this->_moneyCondition = $moneyCondition;
        $this->_moneyReturn = $moneyReturn;
    }

    public function acceptCash($money) {
        $result = $money;
        if($money >= $this->_moneyCondition) {
            $result = $money - $this->_moneyReturn;
        }
        return $result;
    }
}

//客户端调用
session_start();
$countList = $_SESSION['countList']?$_SESSION['countList']:'';
$sessTotal = $_SESSION['sessTotal']?$_SESSION['sessTotal']:0;
$favorable = ['没优惠','打八折','打九折','满300送100'];
if($_POST['submit']) {
    if(!$_POST['price'] || !$_POST['num']) {
        header("location:{$_SERVER["HTTP_REFERER"]}");
        exit;
    }
    $favorableText = $favorable[$_POST['favorable']];   //通过一个策略类把具体的收费算法彻底与客户端分离了，让客户端只认识一个CashContext就可以了。耦合更加降低。
    $cc = new CashContext($_POST['favorable']);
    //计算后的价钱
    $totalPrice = $cc->getResult($_POST['price']*$_POST['num']);
    $sessTotal += $totalPrice;
    $_SESSION['sessTotal'] = $sessTotal;
    $_SESSION['countList'] = $countList .= "<p>单价：{$_POST['price']} 数量：{$_POST['num']} {$favorableText} 合计{$totalPrice}</p>";;
} elseif($_POST['reset']) {
    $_SESSION['sessTotal'] = '';
    $_SESSION['countList'] = '';
    $countList = '';
    $sessTotal = '';
}
?>

<meta charset="UTF-8">
<title>商场收银系统</title>
<form action="" method="post">
    <p>单价：<input type="text" name="price" id=""></p>
    <p>数量：<input type="text" name="num" id=""></p>
    <p>优惠：
        <select name="favorable" id="">
            <? foreach($favorable as $k => $v) {?>
                <option value="<? echo $k; ?>"><? echo $v; ?></option>
            <? } ?>
        </select>
    </p>
    <p><input type="submit" name="submit" value="提交" id="">  <input type="submit" value="重置" name="reset" id=""></p>
</form>
<hr>
<!--<p>单价：1000 数量：1 正常收费 合计1000</p>
<p>单价：1000 数量：1 满300返100 合计700</p>
<p>单价：1000 数量：1 打八折 合计800</p>-->
<? echo $countList; ?>
<hr>
<p style="color:red">总计：<? echo $sessTotal; ?></p>

