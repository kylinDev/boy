<?php
	class response{
		public function __construct(){
		
		}
		public function redirect($url){
			
			header("location:".$url);
			exit();
		}
	}
