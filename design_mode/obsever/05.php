<?php
interface Test {
	public function show();
	public function set(A $msg);
}

class Dog implements Test {
	public $data = 3;
	protected $msg;
	public function show() {
		print_r($this->msg);
	}
	
	public function set(A $msg) {
		$this->msg = $msg;
	}
}

class A {
	public $a = 235;
}
$a = new A();

$dog = new Dog();
$dog->set($a);
$dog->show();





//====================================================
//php 实现观察者模式,模拟用户登陆后的动作(使用SplObservers接口)
class user implements SplSubject{
	public $loginnum;
	public $hobby;
	protected $observers;
	
	public function __construct($hobby) {
		$this->loginnum = rand(1,10);
		$this->hobby = $hobby;
		//使用SplObjectStorage 存储对象，可更好管理内存中的对象
		$this->observers = new SplObjectStorage();
	}
	
	public function login() {
		//记录session...
		echo "登陆成功<br>";
		//通知观察者
		$this->notify();
	}
	
	//添加/注册观察者
	public function attach(SplObserver $observers) {
		return $this->observers->attach($observers);
	}
	
	//添加/注册观察者
	public function detach(SplObserver $observers) {
		return $this->observers->detach($observers);
	}
	
	//通知所有已注册的观察者
	public function notify() {
		$this->observers->rewind();
		while($this->observers->valid()) {
			$observer = $this->observers->current();
			$observer->update($this);
			$this->observers->next();
		}
	}
}

//广告观察者
class ad implements SplObserver{
	public function update(SplSubject $subject) {
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
class security implements SplObserver {
	public function update(SplSubject $subject) {
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