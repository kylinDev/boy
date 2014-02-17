<?php
	abstract class Controller{
		protected $params=array();
	protected function  set_params($key,$value){
		$this->params[$key]=$value;
	}
	protected function redirect(){

	}
	protected function render($page=null){
		$page=($page==null)?"index.html":$page.".html";
		extract($this->params);
		ob_start();
		require(APP_PATH."view/".$page);
		$buffer=ob_get_contents();
		ob_clean();
		echo $buffer;		
	}
}
