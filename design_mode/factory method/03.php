<?php
/**
 * 工厂方法
 * 开闭原则：对修改关闭，对扩展开放
 *
 */

interface DBFactory {
    static public function createDB();
}

interface DB {
    public function conn();
}

//mysql工厂
class MysqlFactory implements DBFactory{
    static public function createDB() {
        return new MysqlDB();
    }
}

class MysqlDB implements DB{
    public function conn() {
        echo 'connect mysql database success';
    }
}

//oracle工厂
class OracleFactory implements DBFactory{
    static public function createDB() {
        return new OracleDB();
    }
}

class OracleDB implements DB{
    public function conn() {
        echo 'connect oracle database success';
    }
}


//$fact = new MysqlFactory();
$db = MysqlFactory::createDB();
$db->conn();

$db = OracleFactory::createDB();
$db->conn();
