<?php
	 class pdoFactory extends PDO{
		private  $instance;
		public static function &get_instance(){
			if(!self::$instance){
				self::$instance=new PDO();
			}
			return self::$instance;
		}
	}
