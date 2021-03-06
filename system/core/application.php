<?php
	final class application{
		private static $instance;
		private $class;
		private $method;
		private $file;
		private $directory;
		private $request;
		private $response;
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
				$path_info=strpos($_SERVER["REQUEST_URI"],"?")==false?$_SERVER["REQUEST_URI"]:array_shift(explode("?",$_SERVER["REQUEST_URI"]));
				
				$uri=explode("/",$path_info);
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
			$register=register::get_instance()->init();
			$this->class=new $this->class($register);
			$rc=new ReflectionClass($this->class);
			if($rc->hasMethod('before')){
				$method=$rc->getMethod('before');
				if($method->isPublic()){
					call_user_func_array(array($this->class,'before'),array());
				}
			}	
			call_user_func_array(array($this->class,$this->method),array());
			if($rc->hasMethod('after')){
				$method=$rc->getMethod('after');
				if($method->isPublic()){
					call_user_func_array(array($this->class,'after'),array());
				}
			}
						
		}
		private function render(){
			
		}
		
		public  function run(){
			$this->dispatch();		
		}
	}
