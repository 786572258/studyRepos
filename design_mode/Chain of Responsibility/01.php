<?php
	/*职责链模式*/
	interface report {
		public   function process($lev);
	}
	
	class board implements report{
		protected $power = 1;
		protected $higher = 'admin';
		public function process($lev) {
			if($this->power >= $lev) {
				echo '禁言';
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
				echo '删号';
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
			echo '抓起来';
		}
	}
	
	$judge = new board();
	$judge->process($_POST['lev']);
?>