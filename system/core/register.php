<?php
	 class register{
		private static $instance;
		protected $registers=array();
		public static function &get_instance(){
			if(!self::$instance){
				self::$instance=new register();
			}
			return self::$instance;
		}
		private  function load_register_class(){
			require_once SYSTEM_PATH."config/config.php";
			require_once APP_PATH."config/config.php";
			if(!empty($classes)){
				foreach($classes as $key=>$class){
					require_once SYSTEM_PATH."library/".$key.".php";
					$this->registers[$key]=new $class();
				}
			}
			if(file_exists(APP_PATH."extension/extension.php")){
				require_once APP_PATH."extension/extension.php";
				if(!empty($extension_library)){
					foreach($extension_library as $key=>$extension){
					$this->registers[$key]=new $extension();
					}
				}
			}
			return $this->registers;
		}
		public function init(){
			return $this->load_register_class();
		}
	}
