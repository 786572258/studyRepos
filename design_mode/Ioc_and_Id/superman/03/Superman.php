<?php
//工厂模式，依赖转移！（控制反转）
class SuperModuleFactory
{
    public function makeModule($moduleName, $options)
    {
        switch ($moduleName) {
            case 'Flight':
                return new Flight($options[0], $options[1]);
            case 'Force':
                return new Force($options[0]);
            case 'Shot':
                return new Shot($options[0], $options[1], $options[2]);
        }
    }
}
class Superman
{
        protected $power;
        public function __construct(array $modules)
        {
            // 初始化超人模组工厂
            $factory = new SuperModuleFactory;
            // 通过工厂提供的方法制造需要的模块
            foreach ($modules as $moduleName => $moduleOptions) {
                $this->power[] = $factory->makeModule($moduleName, $moduleOptions);
            }
        }
}

class Power {
    /**
     * 能力值
     */
    protected $ability;

    /**
     * 能力范围或距离
     */
    protected $range;

    public function __construct($ability, $range)
    {   
        $this->ability = $ability;
        $this->range = $range;
    }   
}

class Flight
{
    protected $speed;
    protected $holdtime;
    public function __construct($speed, $holdtime)
    {
        $this->speed = $speed;
        $this->holdtime = $holdtime;
    }   
}

class Force
{
    protected $force;
    public function __construct($force)
    {
        $this->force = $force;
    }
}

class Shot
{
    protected $atk;
    protected $range;
    protected $limit;
    public function __construct($atk, $range, $limit)
    {
        $this->atk = $atk;
        $this->range = $range;
        $this->limit = $limit;
    }
}
// 创建超人
$superman_1 = new Superman([
    'Flight' => [9, 100], 
    'Shot' => [99, 50, 2]
]);
print_r($superman_1);

