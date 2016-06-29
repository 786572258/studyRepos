<?php
header("Content-Type:text/html;charset=utf-8");

class Waiter {
    public $orderList;
    public function setOrder(Command $command) {
        if (get_class($command) == "BakeMuttonCommand") {
            echo "服务员：羊肉串没有了，请点别的烧烤<br>";
        } else {
            $this->orderList[] = $command;
            echo "增加订单：".get_class($command)." 时间：".date("Y-m-d H:i:s", time())."<br>";
        }
    }

    public function notify() {
        foreach($this->orderList as $v) {
            $v->executeCommand();
        }
    }
}

/**
 * Class Command
 *
 */
abstract class Command {
    //命令需要知道执行对象
    public $executor;

    public function __construct(Barbecuer $executor) {
        $this->executor = $executor;
    }

    public abstract function executeCommand();
}

class BakeMuttonCommand extends Command
{
    public function executeCommand() {
        $this->executor->bakeMutton();
    }
}

class BakeChickenWingCommand extends Command {
    public function executeCommand() {
        $this->executor->bakeChickenWing();
    }
}

/**
 * Class Barbecuer
 * 烤肉者
 */
class Barbecuer {
    public function bakeMutton() {
        echo "烤羊肉串...<br>";
    }

    public function bakeChickenWing() {
        echo "烤鸡翅...<br>";
    }
}

class Client {
    public static function main() {
        $barbecuer = new Barbecuer();
        $bakeMuttonCommand1 = new BakeMuttonCommand($barbecuer);
        $bakeChickenWingCommand1 = new BakeChickenWingCommand($barbecuer);
        $bakeChickenWingCommand2 = new BakeChickenWingCommand($barbecuer);
        $waiter = new Waiter();
        $waiter->setOrder($bakeMuttonCommand1);
        $waiter->setOrder($bakeChickenWingCommand1);
        $waiter->setOrder($bakeChickenWingCommand2);
        $waiter->notify();
    }
}

Client::main();
?>