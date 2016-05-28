<?php
/**
 * 商场收银系统，简单做法
 */
session_start();
$countList = $_SESSION['countList']?$_SESSION['countList']:'';
$sessTotal = $_SESSION['sessTotal']?$_SESSION['sessTotal']:0;
$favorable = ['没优惠','打八折','打九折','满300送100'];
if($_POST['submit']) {
    $total = 0;
    try {
        switch($_POST['favorable']) {
            case 1:
                $total = $_POST['price'] * $_POST['num'] * 0.8;
                $favorableText = '';
                break;
            case 2:
                $total = $_POST['price'] * $_POST['num'] * 0.9;
                break;
            case 3:
                $total = $_POST['price'] * $_POST['num'];
                if($total>=300) {
                    $total = $_POST['price'] * $_POST['num']-100;
                }
                break;
            default:
                $total = $_POST['price'] * $_POST['num'];
        }
    } catch(Exception $e) {
        throw new Exception($e->show_message());
    }
    if($total) {
        $favorableText = $favorable[$_POST['favorable']];
        $sessTotal += $total;
        $_SESSION['sessTotal'] = $sessTotal;
        $countList .= "<p>单价：{$_POST['price']} 数量：{$_POST['num']} {$favorableText} 合计{$total}</p>";
        $_SESSION['countList'] = $countList;
    }
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

