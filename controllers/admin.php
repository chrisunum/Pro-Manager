<?php

class Admin extends Controller{
	public function index(){
		//aids in setting the active menu 
		$_SESSION['dashboard'] = "active-menu";
		$_SESSION['admin_page'] = "dashboard";
		$data['page_title'] = "Admin";
		$this->view("admin", $data);
	}

	
}

