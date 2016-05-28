<meta charset="utf-8">
<?php
error_reporting(E_ALL);
//===================工厂对象========================
/*
interface DBFactory {
    static function create();
}

interface DB {
    function conn();
}

class MysqlDB implements DB {
    public function conn() {
        echo '连接mysql成功';
    }
}
class MysqlFactory implements DBFactory {
    public static function create() {
        return new MysqlDB();
    }
}

class OracleDB implements DB {
    public function conn() {
        echo '连接oracle成功';
    }
}
class OracleFactory implements DBFactory {
    public static function create() {
        return new OracleDB();
    }
}





$db = MysqlFactory::create();
$db->conn();

$db = OracleFactory::create();
$db->conn();

//订单处理工厂
interface OrderHandelFactory {
    public static function create();
}

class CZYFactory implements OrderHandelFactory {
    public static function create() {
        return new CZYHandel();
    }
}

class CZYHandel {
    public function handel() {
        echo '处理彩之云订单';
    }
}

$oh = CZYFactory::create();
$oh->handel();
//$oh = new OrderHandel();
//$oh->handel('admin_id');
*/

//===================以下是工厂方法========================
abstract class OrderHandler{
    //抽象方法不能包含函数体
    abstract public function handle();
}

class CZYHandler extends OrderHandler{
    public function handle() {
        echo '处理彩之云订单';
    }
}
//订单处理工厂
class OrderHandlerFactory {
    /**
     * 创建对象$orderType 对应订单中admin_id字段，5000代表微盟 5001代表彩之云...可查看/data/api_config.php
     * @param $orderType 对应ecs_order_info中的admin_id字段
     * @return bool|CZYHandel|WmHandel
     */
    public static function createObj($orderType) {
        switch($orderType) {
            case '5000':
                return new WmHandler();
                break;
            case '5001':
                return new CZYHandler();
                break;
            default:
                return false;
        }
    }
}

$oh = OrderHandlerFactory::createObj('5001');
$oh->handle();
?>


