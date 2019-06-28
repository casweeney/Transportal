<?php
	ob_start();	
	class UserSession {

		private $logged_in = false;
		public $user_id;

		function __construct(){
			session_start();
			$this->check_login();
		}

		public function is_logged_in(){
			return $this->logged_in;
		}

		public function login($user){
			//database should should find based on username and password
			if($user){
				$this->user_id = $_SESSION['user_id'] = $user->id;
				$this->logged_in = true;
			}
		}

		public function logout(){
			unset($_SESSION['user_id']);
			unset($this->user_id);
			$this->logged_in = false;
		}

		private function check_login(){
			if(isset($_SESSION['user_id'])){
				$this->user_id = $_SESSION['user_id'];
				$this->logged_in = true;
			}else{
				unset($this->user_id);
				$this->logged_in = false;
			}
		}

	}

	$user_session = new UserSession();


    class AdminSession {

		private $logged_in = false;
		public $admin_id;

		function __construct(){
			$this->check_login();
		}

		public function is_logged_in(){
			return $this->logged_in;
		}

		public function login($admin){
			//database should should find based on username and password
			if($admin){
				$this->admin_id = $_SESSION['admin_id'] = $admin->id;
				$this->logged_in = true;
			}
		}

		public function logout(){
			unset($_SESSION['admin_id']);
			unset($this->admin_id);
			$this->logged_in = false;
		}

		private function check_login(){
			if(isset($_SESSION['admin_id'])){
				$this->admin_id = $_SESSION['admin_id'];
				$this->logged_in = true;
			}else{
				unset($this->admin_id);
				$this->logged_in = false;
			}
		}

	}

	$admin_session = new AdminSession();

?>