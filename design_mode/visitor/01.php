<?php
header("content-type:text/html;charset=utf-8");
class ObjStructure {
    private $elements;
    public function attach(Person $p) {
        $this->elements[] = $p;
    }

    public function display(Action $visitor) {
        foreach($this->elements as $k => $v) {
            $v->accept($visitor);
        }
    }
}

abstract class Person {
    public abstract function accept(Action $visitor);
}

class Man extends Person {
    public function accept(Action $visitor) {
        $visitor->getManConclusion($this);
    }
}

class Woman extends Person {
    public function accept(Action $visitor) {
        $visitor->getWomanConclusion($this);
    }
}

//“状态” 访问者
abstract class Action {
    public abstract function getManConclusion(Man $elementA);
    public abstract function getWomanConclusion(Woman $elementB);
}

class Success extends Action {
    public function getManConclusion(Man $elementA) {
        echo "男人成功时,背后多半有一个伟大的女人。<br>";
    }

    public function getWomanConclusion(Woman $elementA) {
        echo "女人成功时,背后大多有一个不成功的男人。<br>";
    }
}

class Failing extends Action {
    public function getManConclusion(Man $elementA) {
        echo "男人失败时,闷头喝酒，谁也不用劝。<br>";
    }

    public function getWomanConclusion(Woman $elementA) {
        echo "女人失败时,泪眼汪汪，谁也劝不了。<br>";
    }
}

class Client {
    public static function main() {
        $objStructure = new ObjStructure();
        $objStructure->attach(new Man());
        $objStructure->attach(new Woman());

        $success = new Success();
        $objStructure->display($success);

        $failing = new Failing();   //访问者
        $objStructure->display($failing);   //访问者给结构对象
    }
}

Client::main();
?>