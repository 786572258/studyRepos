<?php
/**
 * 简单工厂模式
 */

class DBFactory {
    static function createDB($dbType) {
        if($dbType == 'mysql') {
            return new dbMysql();
        } elseif($dbType == 'oracle') {
            return new dbOracle();
        } else {
           throw new Exception("db type error");
        }
    }
}

interface DB {
    public function conn();
}

class dbMysql implements DB{



    public function conn() {
        echo '连接上了mysql';
    }    

}


class dbOracle implements DB{
   
    public function conn() {
        echo '连接上了oracle';
    }    

}

$db = DBFactory::createDB('mysql');
$db->conn();

$db = DBFactory::createDB('oracle');
$db->conn();