<?php		
	define('APP_PATH',getcwd()."/");
	define('SYSTEM_PATH',getcwd().'/system/');
	require_once SYSTEM_PATH.'functions.php';
	require_once SYSTEM_PATH.'bootstrap.php';
	application::get_instance()->run();
