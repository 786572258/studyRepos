<?php
header("Content-Type:text/html;charset=utf-8");
abstract class HandsetBrand {
    protected $soft;
    public abstract function run();

    public function setHandsetSoft(HandsetSoft $soft) {
        $this->soft = $soft;
    }
}

abstract class HandsetSoft{
    public abstract function run();
}

class HandsetGame extends HandsetSoft {
    public function run() {
        echo '运行手机游戏<br>';
    }
}

class HandsetBrandNokia extends HandsetBrand {
    public function run() {
        echo "诺基亚启动";
        $this->soft->run().'<br>';
    }
}

class HandsetAddressList extends HandsetSoft {
    public function run() {
        echo '运行手机通讯录<br>';
    }
}

class HandsetBrandSAMSUNG extends HandsetBrand {
    public function run() {
        echo "三星手机启动";
        $this->soft->run().'<br>';
    }
}

class Client {
    public static function main() {
        //实例化诺基亚品牌
        $handsetBrandNokia = new HandsetBrandNokia();
        //为品牌设置游戏软件
        $handsetBrandNokia->setHandsetSoft(new HandsetGame());
        $handsetBrandNokia->run();
        //为品牌设置通讯录软件
        $handsetBrandNokia->setHandsetSoft(new HandsetAddressList());
        $handsetBrandNokia->run();

        //实例化三星品牌
        $handsetBrandNokia = new HandsetBrandSAMSUNG();
        //为品牌设置游戏软件
        $handsetBrandNokia->setHandsetSoft(new HandsetGame());
        $handsetBrandNokia->run();
    }
}

Client::main();
?>