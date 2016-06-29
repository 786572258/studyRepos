<?php
header("Content-type: text/html; charset=utf-8");

abstract class Iterator2 {
    public abstract function first();
    public abstract function next();
    public abstract function isDone();
    public abstract function currentItem();
}

abstract class Aggregate {
    public abstract function createIterator();
}

class ConcreteAggregate extends Aggregate{
    public function createIterator() {
        return new ConcreteIterator($this);
    }
}

class ConcreteIterator extends Iterator2 {
    private $_aggregate;
    private $_current = 0;

    public function __construct(ConcreteAggregate $aggregate) {
        $this->_aggregate = $aggregate;
    }

    public function first() {
        return $this->_aggregate[0];
    }

    public function next() {
    }

    public function isDone() {
    }

    public function currentItem() {
    }
}

class Client {
    public static function main() {
        $aggregate = new ConcreteAggregate();
        $aggregate[0] = ['大鸟'];
        $aggregate[1] = ['小菜'];
        $aggregate[2] = ['行李'];
        $aggregate[3] = ['小偷'];

        $iterator = new ConcreteIterator($aggregate);
        echo $iterator->first();

    }
}

Client::main();
?>