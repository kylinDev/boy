<?php
	final class application{
		private static $instance;
		private $class;
		private $method;
		private $file;
		public static function  &get_instance(){
			if(! self::$instance){
				self::$instance=new application();
			}
			return self::$instance;
		}
		private  function dispatch(){
			if($_SERVER["REQUEST_URI"]=="/"){
				$this->method="index";
				$this->file="index";
				$this->class="indexController";
			}else{
			
				$uri=explode("/",$_SERVER["REQUEST_URI"]);
				$this->method=array_pop($uri);
				$this->file=array_pop($uri);
				$this->class=$this->file."Controller";
			}
			
			if(file_exists(APP_PATH."controller/".$this->file.".php")){
				require_once APP_PATH."controller/".$this->file.".php";
				if(is_callable(array($this->class,$this->method))){
					
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
