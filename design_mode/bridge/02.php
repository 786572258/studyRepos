<meta charset="utf-8">

<?php
/**
 * 桥接模式
 * 场景：
 *         公路上可以有小车、公共汽车、自行车
 *         街道上可以有自行车、小车
 *         高速公路上可以有小车、公共汽车
 *         
 */

abstract class Way {
    public $carList = array();
    //添加汽车
    abstract function addCar(Car $car);
}

abstract class Car {
    protected $CarName = '';
}

class Bus extends Car {
    public function __construct($carName = '') {
        $this->carName = '公共汽车'.$carName;
    }
}

class Bike extends Car {
    public function __construct($carName = '') {
        $this->carName = '自行车'.$carName;
    }
}

class SpeedWay extends Way {
    public function wayCondition() {
        if($this->carList) {
            foreach($this->carList as $k => $v) {
                echo "{$v}在高速公路上行驶<br>";
            }
        } else {
            echo '没有车在高速公路上行驶';
        }
        
    }

    public function addCar(Car $car) {
        $this->carList[] = $car->carName;
    }

   

}


class StreetWay extends Way {
    public function wayCondition() {
        if($this->carList) {
            foreach($this->carList as $k => $v) {
                echo "{$v}在街道上行驶<br>";
            }
        } else {
            echo '没有车在街道上行驶';
        }
        
    }

    public function addCar(Car $car) {
        $this->carList[] = $car->carName;
    }

}


//公共汽车332在高速公路上行驶
$speedWay = new SpeedWay();
$speedWay->addCar(new Bus('332')); 
$speedWay->addCar(new Bus('336')); 
//道路状况
$speedWay->WayCondition();


//自行车在街道上行驶
$streetWay = new StreetWay();
$streetWay->addCar(new Bike()); 
//道路状况
$streetWay->WayCondition();
