<?php		
	define('APP_NAME','app');
	define('SYSTEM_PATH',getcwd().'/system/');
	define('SYSTEM_LIB',SYSTEM_PATH.'library');
	define('APP_PATH',getcwd()."/".APP_NAME."/");
	define('APP_LIB',APP_PATH.'library');
	require_once SYSTEM_PATH.'functions.php';
	require_once SYSTEM_PATH.'bootstrap.php';
	application::get_instance()->run();
