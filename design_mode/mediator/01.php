<?php
header("content-type:text/html;charset=utf-8");
//联合机构
abstract class UnitedNations {
    abstract public function toDeclare($message, Country $country);
}


//联合国理事会
class UnitedNationsSecurityCouncil extends UnitedNations {
    private $usa;
    private $iraq;
    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function toDeclare($message,Country $country) {
        if ($country == $this->usa) {
            $this->iraq->getMessage($message);
        } else {
            $this->usa->getMessage($message);
        }
    }
}

abstract class Country {
    protected $mediator;

    public function __construct(UnitedNations $mediator) {
        $this->mediator = $mediator;
    }
    abstract function getMessage($message);
    public function toDeclare($message) {
        $this->mediator->toDeclare($message, $this);
    }

}

class USA extends Country {


    public function getMessage($message) {
        echo "美国获取对方信息：".$message.'<br>';
    }
}

class Iraq extends Country {


    public function getMessage($message) {
        echo "伊拉克获取对方信息：".$message.'<br>';
    }
}


class Client {
    public function main() {
        $unsc = new UnitedNationsSecurityCouncil();
        $usa = new USA($unsc);
        $iraq = new Iraq($unsc);
        //让中介者认识通信对象
        $unsc->usa = $usa;
        $unsc->iraq = $iraq;
        $usa->toDeclare("不准研制核武器，否则发动战争！");
        $iraq->toDeclare("不要不要。。。");
    }
}

Client::main();
?>