<?php
// 再进一步！IoC 容器的重要组成 —— 依赖注入！
interface SuperModuleInterface
{
    /**
     * 超能力激活方法
     *
     * 任何一个超能力都得有该方法，并拥有一个参数
     *@param array $target 针对目标，可以是一个或多个，自己或他人
     */
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

// 超能力模组
$superModule = new XPower;
$superModule->activate([12,4]);
// 初始化一个超人，并注入一个超能力模组依赖
$superman_1 = new Superman($superModule);
print_r($superman_1);

