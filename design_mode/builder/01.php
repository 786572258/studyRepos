<?php
header("Content-type: text/html; charset=utf-8");

abstract class PersonBuilder {
    abstract function builderHead();
    abstract function builderBody();
    abstract function builderArmLeft();
    abstract function builderArmRight();
    abstract function builderLegLeft();
    abstract function builderLegRight();
}

class PersonLgBuilder extends PersonBuilder {
    public function builderHead() {
        echo '建造大人的头';
    }

    public function builderBody() {
        echo '建造大人的身体';
    }

    public function builderArmLeft() {
        echo '建造大人左臂';
    }

    public function builderArmRight() {
        echo '建造大人的右臂';
    }
    public function builderLegLeft() {
        echo '建造大人的左腿';
    }
    public function builderLegRight() {
        echo '建造大人的右腿';
    }

}

class PersonSmBuilder extends PersonBuilder {
    public function builderHead() {
        echo '建造小人的头';
    }

    public function builderBody() {
        echo '建造小人的身体';
    }

    public function builderArmLeft() {
        echo '建造小人左臂';
    }

    public function builderArmRight() {
        echo '建造小人的右臂';
    }
    public function builderLegLeft() {
        echo '建造小人的左腿';
    }
    public function builderLegRight() {
        echo '建造小人的右腿';
    }

}

class Director {
    public function createPerson($personBuilder) {
        $personBuilder->builderHead();
        $personBuilder->builderBody();
        $personBuilder->builderArmLeft();
        $personBuilder->builderArmRight();
        $personBuilder->builderLegLeft();
        $personBuilder->builderLegRight();
    }
}

class Client {
    public static function main() {
        $personLgBuilder = new PersonLgBuilder();
        $director = new Director();
        //造大人
        $director->createPerson($personLgBuilder);

        $personSmBuilder = new PersonSmBuilder();
        //造小人
        $director->createPerson($personSmBuilder);

    }
}

Client::main();
?>