<meta charset="utf-8">
<?php
/**
 * 适配器模式
 */

class Weather {
    public static function getInfo() {
        $info = array('wind'=>5, 'sun'=>'sunny');
        $info = serialize($info);
        return $info;
    }
}

//假如java的代码要调用
class AdapterWeather extends Weather {

    public static function getInfo() {
        $info = parent::getInfo();
        $info = unserialize($info);
        return json_encode($info);
    }
}

$weather = new Weather();
$info = $weather->getInfo();
$info = unserialize($info);
echo '风力：'.$info['wind'];
echo '阳光：'.$info['sun'];

echo '<hr>';
$aw = new AdapterWeather();
$info = $aw->getInfo();
$info = json_decode($info);
echo '风力：'.$info->wind;
echo '阳光：'.$info->sun;
