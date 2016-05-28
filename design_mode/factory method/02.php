<?php

interface IHanbao {
    function Allay();
}
/**鸡肉汉堡
 * Class ChickenBao
 */
class ChickenBao implements IHanbao
{
    function Allay() {
        echo " I am 鸡肉汉堡，小的给主人解饿了！";

    }

}

/**肉松汉堡
 * Class ChickenBao
 */
class RouSongBao implements IHanbao
{
    function Allay() {
        echo " I am 肉松汉堡，小的给主人解饿了！";

    }

}

/**抽象工厂角色
 * Interface IServerFactory
 */
interface IServerFactory
{
    function MakeHanbao();
}

/**具体工厂角色     肉松汉堡工厂
 * Class RouSongFactory
 */
class RouSongFactory implements IServerFactory
{

    function MakeHanbao()
    {
        return new RouSongBao();
    }
}

class ChickenFactory implements IServerFactory
{

    function MakeHanbao()
    {
        return new ChickenBao();
    }
}


header("Content-Type:text/html;charset=utf-8");
//------------------------工厂方式测试代码------------------
//-----------------餐厅厨师-----------
$chickenFactory = new ChickenFactory();
$rouSongFactory = new RouSongFactory();
$zhuRouFactory = new zhuRouFactory();

//-----------点餐------------
$chicken1 = $chickenFactory->MakeHanbao();
$chicken2 = $chickenFactory->MakeHanbao();
$rouSong1 = $rouSongFactory->MakeHanbao();
$rouSong2 = $rouSongFactory->MakeHanbao();

$zhuRou1 = $zhuRouFactory->MakeHanbao();

//------------------顾客吃饭---------
$chicken1->Allay();
echo '<br>';
$chicken2->Allay();
echo '<br>';
$rouSong1->Allay();
echo '<br>';
$rouSong2->Allay();
?>