<?php

class Login extends Controller{
	public function index(){
		if(isset($_SESSION['user_url'])){
			header("Location: " . ROOT);
		}else{
			$data['page_title'] = "Login";
		
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				

				$user = $this->load_model("User");
				$user->login($_POST);
			}
			$this->view("login", $data);
		}
		
	}
}

 