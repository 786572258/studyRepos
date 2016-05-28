<meta charset="utf-8">

<?php
/**
 * 桥接模式
 * 场景：站内发紧急短信、普通短信、警告短信
 *       手机可以发紧急短信、普通短信、警告短信
 *       邮箱可以发紧急短信、普通短信、警告短信
 */

abstract class Info {
    public abstract function getInfoLevel();
}

abstract class SendBase {
    protected $infoLevel; //级别
    public abstract function send($to, $content);
    
    public function __construct(Info $infoObj) {
        $this->infoLevel = $infoObj->getInfoLevel();
    }
}

class DangerInfo extends Info{
    public function getInfoLevel() {
        //相关操作……
        return '紧急';
    }

}

class WarningInfo extends Info{
    public function getInfoLevel() {
        //相关操作……
        return '警告';
    }
}


class CommonInfo extends Info{
    public function getInfoLevel() {
        //相关操作……
        return '正常';
    }
}

class Mobile extends SendBase{
    
    public function send($to, $content) {
        echo '手机发送--->给'.$to.'，内容：'.$content.'<br>信息级别：'.$this->infoLevel;
    }

}

class Email extends SendBase{
    
    public function send($to, $content) {
        echo 'email发送--->给'.$to.'，内容：'.$content.'<br>信息级别：'.$this->infoLevel;
    }

}

/**
 * 站内
 */
class Zn extends SendBase{
    
    public function send($to, $content) {
        echo '站内发送--->给'.$to.'，内容：'.$content.'<br>信息级别：'.$this->infoLevel;
    }

}

//$dangerInfo = 
$mobile = new Mobile(new DangerInfo());
$mobile->send('小明','快回来，家里着火了！！！');
echo '<hr>';
$email = new Email(new DangerInfo());
$email->send('小红','快回来，家里着火了！！！');

echo '<hr>';
$email = new Email(new CommonInfo());
$email->send('小花','附件已经发送，请查收');

echo '<hr>';
$email = new Email(new WarningInfo());
$email->send('小欢','请不要乱发消息');
