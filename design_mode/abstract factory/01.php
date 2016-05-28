<meta charset="utf-8">
<?php
/**
 * 抽象工厂模式
 * -------------
 * @author      zhaoxuejie <zxj198468@gmail.com>
 * @package     design pattern
 * @version     v1.0 2011-12-14
 */

//抽象工厂  
interface AnimalFactory {

    public function createCat();
    public function createDog();

}

//具体工厂  
class BlackAnimalFactory implements AnimalFactory {

    function createCat(){
        return new BlackCat();
    }

    function createDog(){
        return new BlackDog();
    }
}

class WhiteAnimalFactory implements AnimalFactory {

    function createCat(){
        return new WhiteCat();
    }

    function createDog(){
        return new WhiteDog();
    }
}

//抽象产品  
interface Cat {
    function Voice();
}

interface Dog {
    function Voice();
}

//具体产品  
class BlackCat implements Cat {

    function Voice(){
        echo '黑猫喵喵……';
    }
}

class WhiteCat implements Cat {

    function Voice(){
        echo '白猫喵喵……';
    }
}

class BlackDog implements Dog {

    function Voice(){
        echo '黑狗汪汪……';
    }
}

class WhiteDog implements Dog {

    function Voice(){
        echo '白狗汪汪……';
    }
}

//客户端  
class Client {

    public static function main() {
        self::run(new BlackAnimalFactory());
        self::run(new WhiteAnimalFactory());
    }

    public static function run(AnimalFactory $AnimalFactory){
        $cat = $AnimalFactory->createCat();
        $cat->Voice();

        $dog = $AnimalFactory->createDog();
        $dog->Voice();
    }
}
Client::main();
?>