<?php
	final class register{
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
			if(!empty($classes)){
				foreach($classes as $key=>$class){
					require_once SYSTEM_PATH."library/".$key.".php";
					$this->registers[$key]=new $class();
				}
			}
			return $this->registers;
		}
		public function init(){
			return $this->load_register_class();
		}
	}
