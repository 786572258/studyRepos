<?php
	/*ְ����ģʽ*/
	interface report {
		public   function process($lev);
	}
	
	class board implements report{
		protected $power = 1;
		protected $higher = 'admin';
		public function process($lev) {
			if($this->power >= $lev) {
				echo '����';
			} else {
				$higher = new $this->higher;
				$higher->process($lev);
			}
		}
	}
	
	class admin implements report{
		protected $power = 2;
		protected $higher = 'police';
		public function process($lev) {
			if($this->power >= $lev) {
				echo 'ɾ��';
			} else {
				$higher = new $this->higher;
				$higher->process($lev);
			}
		}
	}
	
	class police implements report{
		protected $power;
		protected $higher = null;
		public function process($lev) {
			echo 'ץ����';
		}
	}
	
	$judge = new board();
	$judge->process($_POST['lev']);
?>