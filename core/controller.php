<?php

Class Controller{
	public function view($path, $data = []){
		if(file_exists("views/".$path.".php")){
			include "views/".$path.".php";
		}
	}

	

	public function load_model($model){
		if(file_exists("models/".strtolower($model).".class.php")){
			include "models/".strtolower($model).".class.php";
			return $a = new $model();
		}
		return false;
	}
}