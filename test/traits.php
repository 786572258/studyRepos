<?php
trait A {
    static public $a = 112;
    public function a() {
        echo 'a';
    }
}

class Test {
    use A;
    public static function b() {
        echo 'b';
    }
}

Test::b();
Test::a();
echo Test::$a;
//$b = new B();
//B::b();
//B::b();