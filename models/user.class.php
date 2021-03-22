<?php

Class user{
	private $error = "";
	public function signup($POST){
		$data = array();
		$db = Database::getInstance();

		$data['name'] = trim($POST['name']);
		$data['email'] = trim($POST['email']);
		$data['password'] = trim($POST['password']);
		$password2 = trim($POST['password2']);

		if(empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])){
			$this->error .= "Please enter a valid email <br>";
		}

		if(empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])){
			$this->error .= "Please enter a valid name <br>";
		}

		if($data['password'] !== $password2){
			$this->error .= "Passwords do not match <br>";
		}

		if(strlen($data['password']) < 4){
			$this->error .= "Password must be at least 4 characters long <br>";
		}

		//check if email already exist
		$sql = "select * from users where email = :email limit 1";
		$arr['email'] = $data['email'];
		$check = $db->read($sql, $arr);

		if(is_array($check)){
			$this->error .= "That email is already in use <br>";
		}

		$data['url_address'] = $this->get_random_string_max(60);

		//check for url address
		$arr = false;
		$sql = "select * from users where url_address = :url_address limit 1";
		$arr['url_address'] = $data['url_address'];
		$check = $db->read($sql, $arr);

		$data['url_address'] = $this->get_random_string_max(60);

		if(is_array($check)){
			$data['url_address'] = $this->get_random_string_max(60);
		}
		
		if($this->error == ""){

			$sql = "CREATE TABLE IF NOT EXISTS users (
			  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			  url_address VARCHAR(60) NOT NULL,
			  name VARCHAR(100) NOT NULL,
			  email VARCHAR(100) NOT NULL,
			  password VARCHAR(64) NOT NULL,
			  date DATETIME NOT NULL,
			  rank VARCHAR(20) NOT NULL
			  )";

			$result = $db->write($sql);


			//save
			$data['rank'] = "customer";
			
			$data['date'] = date("Y-m-d H:i:s");
			$data['password'] = hash('sha1',$data['password'] );

			$query = "insert into users (url_address,name,email,password,date,rank) values (:url_address,:name,:email,:password,:date,:rank)";
			
			$result2 = $db->write($query, $data);

			if($result2){
				header("Location: " . ROOT . "login");
				die;
			}
		}

		$_SESSION['error'] = $this->error;

	}

	public function login($POST){
		$data = array();
		$db = Database::getInstance();

		$data['email'] = trim($POST['email']);
		$data['password'] = trim($POST['password']);
		

		if(empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])){
			$this->error .= "Please enter a valid email <br>";
		}

		
		if(strlen($data['password']) < 4){
			$this->error .= "Password must be at least 4 characters long <br>";
		}

		
		if($this->error == ""){

			//confirm
			
			$data['password'] = hash('sha1',$data['password'] );
			//check if email already exist
			$sql = "select * from users where email = :email && password = :password limit 1";
			
			$result = $db->read($sql, $data);


			if(is_array($result)){
				
				$_SESSION['user_url'] = $result[0]->url_address;
				$_SESSION['user_name'] = $result[0]->name;
				header("Location: " . ROOT."admin");
				die;
			}

			$this->error .= "Wrong email or password <br>";

		}

		$_SESSION['error'] = $this->error;
	}

	public function get_user($url){
		
	}

	private function get_random_string_max($length){
		$array = array(0,1,2,3,4,5,6,7,8,9,'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

		$text = "";

		$length = rand(4, $length);

		for($i=0; $i<$length; $i++){
			$random = rand(0,61);

			$text .= $array[$random];
		}
		return $text;
	}


	public function check_login(){
		if(isset($_SESSION['user_url'])){
			$arr['url'] = $_SESSION['user_url'];
			$query = "select * from users where url_address = :url limit 1";
			$db = Database::getInstance();

			$result = $db->read($query, $arr);
			if(is_array($result)){
				return $result[0];
			}
		}

		return false;
	}

	public function logout(){
		if(isset($_SESSION['user_url'])){
			unset($_SESSION['user_url']);
		}
		header("Location: " . ROOT . "login");
	}
}

