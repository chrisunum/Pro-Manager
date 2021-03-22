<?php

class App{
	protected $controller = "home";
	protected $method = "index";
	protected $params;

	public function __construct(){
		$url = $this->parseURL();


		if(file_exists("controllers/".str_replace(".php","",strtolower($url[0])).".php")){
			$this->controller = str_replace(".php","",strtolower($url[0]));
			
		}

		require "controllers/". $this->controller.".php";
		$this->controller = new $this->controller;

		if(isset($url[1])){
			$url[1] = strtolower($url[1]);
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}

			if($url[0] == "products"){
				$_SESSION['products']=$url[1];
			}
			if($url[0] == "category"){
				$_SESSION['category']=explode("&", $url[1])[0];	
			}
			if($url[0] == "brand"){
				$_SESSION['brand']=explode("&", $url[1])[0];
				$_SESSION['category']=explode("&", $url[1])[0];
			}
		}
		$this->params = (count($url)>0)? $url:["home"];
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	private function parseURL(){
		$url = isset($_SERVER['QUERY_STRING'])?explode("/",$_SERVER['QUERY_STRING']): "home";
		return array_filter($url)+array(null);
	}
}