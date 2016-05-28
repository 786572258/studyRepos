<?php
//php 实现观察者模式,模拟用户登陆后的动作(不用SplObservers接口)
class user {
	public $loginnum;
	public $hobby;
	public $observers;
	
	public function __construct($hobby) {
		$this->loginnum = rand(1,10);
		$this->hobby = $hobby;
		$this->observers = array();
	}
	
	public function login() {
		//记录session...
		echo "登陆成功<br>";
		//通知观察者
		$this->notify();
	}
	
	//添加/注册观察者
	public function attach($observers) {
		$this->observers[] = $observers;
	}
	public function notify() {
		foreach($this->observers as $k => $v) {
			$v->update($this);
		}
	}
}

//广告观察者
class ad {
	public function update($subject) {
		if($subject->hobby == 'sport') {
			echo '爱运动，爱生活<br>';
		} elseif($subject->hobby == 'study'){
			echo '好好学习，天天向上<br>';
		} else {
			echo '回家和稀泥<br>';
		}
	}	
}

//安全观察者
class security {
	public function update($subject) {
		if($subject->loginnum <= 3) {
			echo '正常登陆<br>';
		} else {
			echo '登陆异常，登陆次数：'.$subject->loginnum.'<br>';
		}
	}	
}

//登陆
$user = new User('study');
//注册广告观察者
$user->attach(new ad());
//注册安全观察者
$user->attach(new security());
$user->login();
?>