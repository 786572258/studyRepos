<?php
/**
 * 建造者模式
 *
 */
/*Veg Meal
Item : Veg Burger, Packing : Wrapper, Price : 25.0
Item : Coke, Packing : Bottle, Price : 30.0
Total Cost: 55.0


Non-Veg Meal
Item : Chicken Burger, Packing : Wrapper, Price : 50.5
Item : Pepsi, Packing : Bottle, Price : 35.0
Total Cost: 85.5
*/

/*
public class BuilderPatternDemo {
    public static void main(String[] args) {
        MealBuilder mealBuilder = new MealBuilder();

        Meal vegMeal = mealBuilder.prepareVegMeal();
        System.out.println("Veg Meal");
        vegMeal.showItems();
        System.out.println("Total Cost: " +vegMeal.getCost());

        Meal nonVegMeal = mealBuilder.prepareNonVegMeal();
        System.out.println("\n\nNon-Veg Meal");
        nonVegMeal.showItems();
        System.out.println("Total Cost: " +nonVegMeal.getCost());
    }
}
*/
interface Item {
    function name();
    function packing();
    function price();
}

interface Packing {
    function pack();
}

class Wrapper implements Packing {
    public function pack() {
        return "Wrapper";
    }
}

abstract class Burger implements Item {
    public function packing() {
        return new Wrapper();
    }
}

class VegBurger extends Burger{
    public function name() {
        return "VegBurger";
    }

    public function packing() {
        return new Wrapper();
    }

    public function price() {
        return 20;
    }
}

class Bottle implements Packing {
    public function pack() {
        return "Bottle";
    }
}

abstract class ColdDrink implements Item {
    public function packing() {
        return new Bottle();
    }
}

class Coke extends ColdDrink{
    public function name() {
        return "Coke";
    }

    public function packing() {
        return new Bottle();
    }

    public function price() {
        return 10;
    }
}

class ChickenBurger extends Burger{
    public function name() {
        return "ChickenBurger";
    }

    public function packing() {
        return new Wrapper();
    }

    public function price() {
        return 30;
    }
}


class Pepsi extends ColdDrink{
    public function name() {
        return "Pepsi";
    }

    public function packing() {
        return new Bottle();
    }

    public function price() {
        return 15;
    }
}

class Meal {
    private $_items = [];

    public function addItem(Item $item) {
        $this->_items[] = $item;
    }

    public function showItems() {
        foreach($this->_items as $k => $v) {
            echo "Item: {$v->name()}, Packing:{$v->packing()->pack()}, Price:{$v->price()}<br>";
        }
    }

    public function getCost() {
        $cost = 0.00;
        foreach($this->_items as $k => $v) {
            $cost += $v->price();
        }
        return $cost;
    }
}

class MealBuilder {
    public function prepareVagMeal() {
        $meal = new Meal();
        $meal->addItem(new VegBurger());
        $meal->addItem(new Coke());
        return $meal;
    }

    public function prepareNonVagMeal() {
        $meal = new Meal();
        $meal->addItem(new ChickenBurger());
        $meal->addItem(new Pepsi());
        return $meal;
    }
}

class Client {
    public static function main() {
        $mealBuilder = new MealBuilder();
        $vegMeal = $mealBuilder->prepareVagMeal();
        echo "Veg Meal <br>";
        $vegMeal->showItems();
        echo "Total Cose:".$vegMeal->getCost();
        echo "<hr>";

        $nonVegMeal = $mealBuilder->prepareNonVagMeal();
        echo "NonVeg Meal <br>";
        $nonVegMeal->showItems();
        echo "Total Cose:".$nonVegMeal->getCost();
    }
}

Client::main();