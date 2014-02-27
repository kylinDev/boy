<?php
	 class loader{

		public static function load_resource_config(){
			if(file_exists(APP_PATH."config/resource.php")){
				require_once APP_PATH."config/resource.php";
				if(!empty($resource)){
					return $resource;
				}
			}	
		}	
		
	}
