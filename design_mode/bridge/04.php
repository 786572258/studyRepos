<?php
abstract class Shape {
    private $x, $y, $redius;
    abstract function draw();
}

interface DrawAPI {
    function draw($x, $y, $redius);
}

class Circle extends Shape {
    public function __construct($x, $y, $redius, DrawAPI $shape) {
        $this->x = $x;
        $this->y = $y;
        $this->redius = $redius;
        $this->shape = $shape;
    }

    public function draw() {
        $this->shape->draw($this->x, $this->y, $this->redius);
    }
}

class RedCircle implements DrawAPI {
    public function draw($x, $y, $redius) {
        echo "Drawing Circle[  color: red, radius: {$x}, x: {$y}, {$redius}]<br>";
    }
}

class GreenCircle implements DrawAPI {
    public function draw($x, $y, $redius) {
        echo "Drawing Circle[  color: green,  radius: {$x}, x: {$y}, {$redius}]<br>";
    }
}

class Client {
    public static function main() {
        $redCircle = new Circle(100, 100, 10, new RedCircle());
        $redCircle->draw();
        $greenCircle = new Circle(100, 100, 20, new GreenCircle());
        $greenCircle->draw();
    }
}
Client::main();