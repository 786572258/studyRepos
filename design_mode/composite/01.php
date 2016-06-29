<?php
header("Content-type: text/html; charset=utf-8");

abstract class Company {
    protected $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public abstract function add(Company $company);
    public abstract function rm(Company $company);
    public abstract function display($depth = 1);
    //履行职责
    public abstract function lineOfDuty();
}

/**
 * Class ConcreteCompany
 *
 * 具体公司
 */
class ConcreteCompany extends Company {
    private $_children = null;
    public function add(Company $company) {
        $this->_children[] = $company;
    }

    public function rm(Company $company) {
    }

    public function display($depth = 1) {
        //echo '<pre>';
        //print_r( $this->_children);
        //echo "-".$this->name.'33<br>';
        echo str_repeat('-', $depth).$this->name.'<br>';

        foreach($this->_children as $v) {
            $v->display($depth + 1);
        }
    }

    public function lineOfDuty() {
    }
}

/**
 * Class HRDepartment
 *
 * 人力资源部
 */
class HRDepartment extends Company {
    private $_children = null;
    public function add(Company $company) {
        $this->_children[] = $company;
    }
    public function rm(Company $company) {
    }

    public function display($depth = 1) {
        echo str_repeat('-', $depth).$this->name.'<br>';
    }

    public function lineOfDuty() {
    }
}

/**
 * Class FinanceDepartment
 *
 * 财务部
 */
class FinanceDepartment extends Company {
    private $_children = null;
    public function add(Company $company) {
        $this->_children[] = $company;
    }
    public function rm(Company $company) {
    }

    public function display($depth = 1) {
        echo str_repeat('-', $depth).$this->name.'<br>';
    }

    public function lineOfDuty() {
    }
}

class Client {
    public static function main() {
        $root = new ConcreteCompany("北京总公司");
        $root->add(new FinanceDepartment("总公司财务部"));
        $root->add(new HRDepartment("总公司人力资源部"));

        $shhd = new ConcreteCompany("上海华东分公司");

        $shhd->add(new HRDepartment("华东分公司人力部"));
        $root->add($shhd);

        echo "结构图<br>";
        $root->display();

        echo '上海华东结构图<br>';
        $shhd->display();
    }
}
Client::main();
?>