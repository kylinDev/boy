<?php
	function import($path,$PATH=APP_PATH){
		if($path && is_string($path)){
			$path=strtoupper(substr(PHP_OS,0,3))==='WIN'?str_replace(".","\\",$path):str_replace(".","/",$path);
			if(file_exists($PATH.$path.".php")){
				require_once $PATH.$path.".php";
			}else{
				echo "can not load ".$path.".php";
			}
		}
	}
