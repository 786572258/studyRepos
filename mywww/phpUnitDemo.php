<?php
#require __dir__.'/../vendor/autoload.php';
error_reporting(E_ALL);
require 'vendor/autoload.php';
require_once('Users.php');
class UserTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }
    public function testFindByOpenId()
    {
        echo 234234;
        $userModel = new Users() ;

    }
}

$ut = new UserTest();
$ut->setUp();
?>