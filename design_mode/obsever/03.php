<?php
//php ʵ�ֹ۲���ģʽ,ģ���û���½��Ķ���(����SplObservers�ӿ�)
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
		//��¼session...
		echo "��½�ɹ�<br>";
		//֪ͨ�۲���
		$this->notify();
	}
	
	//���/ע��۲���
	public function attach($observers) {
		$this->observers[] = $observers;
	}
	public function notify() {
		foreach($this->observers as $k => $v) {
			$v->update($this);
		}
	}
}

//���۲���
class ad {
	public function update($subject) {
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
class security {
	public function update($subject) {
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