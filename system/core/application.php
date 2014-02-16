<?php
	final class application{
		private static $instance;
		private $class;
		private $method;
		public static function  &get_instance(){
			if(! self::$instance){
				self::$instance=new application();
			}
			return self::$instance;
		}
		private  function dispatch(){
			$URI=$_SERVER["REQUEST_URI"]=="/"?"/index/home":$_SERVER["REQUEST_URI"];
			$uri=explode("/",$URI);
			$this->class=$uri[1];
			$this->method=$uri[2];
			if(is_file(APP_PATH."controller/".$uri[1].".php")){
				require_once APP_PATH."controller/".$uri[1].".php";
				if(is_callable(array($uri[1],$uri[2]))){
					
					$this->execute();
				}
			}
		}
		private  function execute(){
				
			call_user_func_array(array($this->class,$this->method),array());
			
		}
		public  function run(){
			$this->dispatch();		
		}
	}
