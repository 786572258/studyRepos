<?php
// 更为先进的工厂 —— IoC 容器！
class Container
{
    protected $binds;

    protected $instances;

    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

	if(!is_array($parameters)){
       	    $parameters = (array)$parameters;
	} 
        array_unshift($parameters, $this);
        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}

interface SuperModuleInterface
{
    public function activate(array $target);
}

/**
 * X-超能量
 */
class XPower implements SuperModuleInterface
{
    public function activate(array $target)
    {
        echo "激活x超能力";
    }
}

/**
 * 终极炸弹 （就这么俗）
 */
class UltraBomb implements SuperModuleInterface
{
    public function activate(array $target)
    {
        // 这只是个例子。。具体自行脑补
        echo "激活终极炸弹";
    }
}

class Superman
{
    protected $module;

    public function __construct(SuperModuleInterface $module)
    {
        $this->module = $module;
    }
}


// 创建一个容器（后面称作超级工厂）
$container = new Container;

// 向该 超级工厂 添加 超人 的生产脚本
$container->bind('superman', function($container, $moduleName) {
	//echo 'hello';    
	//exit;
	return new Superman($container->make($moduleName));
});

// 向该 超级工厂 添加 超能力模组 的生产脚本
$container->bind('xpower', function($container) {
    return new XPower;
});

// 同上
$container->bind('ultrabomb', function($container) {
    return new UltraBomb;
});

// ******************  华丽丽的分割线  **********************
// 开始启动生产
$superman_1 = $container->make('superman', ['xpower', 'ultrabom2b']);// 这样写好像没作用
$superman_2 = $container->make('superman', 'ultrabomb');
$superman_3 = $container->make('superman', 'xpower');
// ...随意添加

print_r($superman_1);

