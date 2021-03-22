<?php

class Signup extends Controller{
	public function index(){

		if(isset($_SESSION['user_url'])){
			header("Location: " . ROOT);
		}else{
			$data['page_title'] = "Signup";
		
		
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				

				$user = $this->load_model("User");
				$user->signup($_POST);
			}
			$this->view("signup", $data);
		}

		
	}
}

