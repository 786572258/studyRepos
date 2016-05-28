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
//php ʵ�ֹ۲���ģʽ,ģ���û���½��Ķ���(ʹ��SplObservers�ӿ�)
class user implements SplSubject{
	public $loginnum;
	public $hobby;
	protected $observers;
	
	public function __construct($hobby) {
		$this->loginnum = rand(1,10);
		$this->hobby = $hobby;
		//ʹ��SplObjectStorage �洢���󣬿ɸ��ù����ڴ��еĶ���
		$this->observers = new SplObjectStorage();
	}
	
	public function login() {
		//��¼session...
		echo "��½�ɹ�<br>";
		//֪ͨ�۲���
		$this->notify();
	}
	
	//���/ע��۲���
	public function attach(SplObserver $observers) {
		return $this->observers->attach($observers);
	}
	
	//���/ע��۲���
	public function detach(SplObserver $observers) {
		return $this->observers->detach($observers);
	}
	
	//֪ͨ������ע��Ĺ۲���
	public function notify() {
		$this->observers->rewind();
		while($this->observers->valid()) {
			$observer = $this->observers->current();
			$observer->update($this);
			$this->observers->next();
		}
	}
}

//���۲���
class ad implements SplObserver{
	public function update(SplSubject $subject) {
		if($subject->hobby == 'sport') {
			echo '���˶���������<br>';
		} elseif($subject->hobby == 'study'){
			echo '�ú�ѧϰ����������<br>';
		} else {
			echo '�ؼҺ�ϡ��<br>';
		}
	}	
}

//��ȫ�۲���
class security implements SplObserver {
	public function update(SplSubject $subject) {
		if($subject->loginnum <= 3) {
			echo '������½<br>';
		} else {
			echo '��½�쳣����½������'.$subject->loginnum.'<br>';
		}
	}	
}

//��½
$user = new User('study');
//ע����۲���
$user->attach(new ad());
//ע�ᰲȫ�۲���
$user->attach(new security());
$user->login();
?>