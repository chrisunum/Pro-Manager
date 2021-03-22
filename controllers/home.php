<?php

class Home extends Controller{
	public function index(){

/*
		$User = $this->load_model('User');
		$user_data = $User->check_login();

		if(is_array($user_data)){
			$data['user_data'] = $user_data;
		}*/

		

		$db = Database::getInstance();
		

		$data['page_title'] = "Home";
		$this->view("home", $data);
	}
}

