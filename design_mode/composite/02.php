<?php
header("Content-type: text/html; charset=utf-8");

abstract class MenuComponent
{
    public $name;
    public abstract function getName();
    public abstract function add(MenuComponent $menu);

    public abstract function remove(MenuComponent $menu);

    public abstract function getChild($i);

    public abstract function show();
}

//composite
class MenuItem extends MenuComponent
{
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function add(MenuComponent $menu){
        return false;
    }
    public function remove(MenuComponent $menu){
        return false;
    }

    public function getChild($i){
        return null;
    }
    public function show(){
        echo " |-".$this->getName()."<br>";
    }
}

class Menu extends MenuComponent
{
    public $menuComponents = array();
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function add(MenuComponent $menu)
    {
        $this->menuComponents[] = $menu;
    }

    public function remove(MenuComponent $menu)
    {
        $key = array_search($menu, $this->menuComponents);
        if($key !== false) unset($this->menuComponents[$key]);
    }

    public function getChild($i)
    {
        if(isset($this->menuComponents[$i])) return $this->menuComponents[$i];
        return null;
    }

    public function show()
    {
        echo ":" . $this->getName() . "<br>";
        foreach($this->menuComponents as $v){
            $v->show();
        }
    }
}

class testDriver
{
    public function run()
    {
        $menu1 = new Menu('文学');
        $menuitem1 = new MenuItem('绘画');
        $menuitem2 = new MenuItem('书法');
        $menuitem3 = new MenuItem('小说');
        $menuitem4 = new MenuItem('雕刻');
        $menu1->add($menuitem1);
        $menu1->add($menuitem2);
        $menu1->add($menuitem3);
        $menu1->add($menuitem4);

        $menu2 = new Menu('理科');
        $menu2_1= new Menu('编程');
        $menu2_1->add(new MenuItem('php'));
        $menuitem2 = new MenuItem('手机');
        $menuitem3 = new MenuItem('数学');
        $menu2->add($menu2_1);
        $menu2->add($menuitem2);
        $menu2->add($menuitem3);

        $menu1->show();
        $menu2->show();
    }
}


$test = new testDriver();
$test->run();
?>