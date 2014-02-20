<?php
	abstract class Controller{
		protected $params=array();
		public  $registers=array();
	public  function __construct($register){
		$this->registers=$register;
	}
	protected function  set_params($key,$value){
		$this->params[$key]=$value;
	}
	protected function redirect($url){
		header("location:".$url);
	}
	protected function render($page=null){
		$page=($page==null)?"index.html":$page.".html";
		extract($this->params);
		ob_start();
		require(APP_PATH."view/".$page);
		$buffer=ob_get_contents();
		ob_end_clean();
		echo $buffer;		
	}
}
