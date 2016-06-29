<?php
header("Content-type: text/html; charset=utf-8");

class GameRole {
    public $vit;
    public $atk;
    public $def;

    public function saveState() {
        //return new RoleStateMemento($this->vit, $this->atk, $this->def);
        $rsm = new RoleStateMemento();
        $rsm->vit = $this->vit;
        $rsm->atk = $this->vit;
        $rsm->def = $this->vit;
        $rsm->def3 = $this->vit;
        return $rsm;
    }

    public function recoverState(RoleStateMemento $rsm) {
        $this->vit = $rsm->vit;
        $this->atk = $rsm->atk;
        $this->def = $rsm->def;
    }

    public function stateDisplay() {
        echo "Vitality:".$this->vit."<br>";
        echo "Attack:".$this->atk."<br>";
        echo "Defense:".$this->def."<br>";
    }

    public function getInitState() {
        $this->vit = 100;
        $this->atk = 100;
        $this->def = 100;
    }

    public function fight() {
        $this->vit = 50;
        $this->atk = 40;
        $this->def = 10;
    }

}
/**
 * Class RoleStateMemento
 * 角色状态存储箱
 */
class RoleStateMemento {
    private $vit;
    private $atk;
    private $def;

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new Exception();
        }
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function __construct($vit = '', $atk = '', $def = '') {
        $this->vit = $vit;
        $this->atk = $atk;
        $this->def = $def;
    }

}

/**
 * Class RoleStateCaretaker
 * 角色状态管理者,存取箱子
 */
class RoleStateCaretaker {
    private $memento;

    public function memento(RoleStateMemento $rsm = null) {
        if (func_num_args() == 0 ) {
           return $this->memento;
        } else {
            $this->memento = $rsm;
        }
    }
}

$maimai = new GameRole();
$maimai->getInitState();
echo "初始化角色状态：";
$maimai->stateDisplay();

echo "保存角色状态……"."<br>";
$rsc = new RoleStateCaretaker();
$rsc->memento($maimai->saveState());
//print_r($rsc->memento());


echo "大战BOSS……"."<br>";
$maimai->fight();

echo "战后状态"."<br>";
$maimai->stateDisplay();

echo "恢复战斗力"."<br>";
$maimai->recoverState($rsc->memento());
$maimai->stateDisplay();

?>