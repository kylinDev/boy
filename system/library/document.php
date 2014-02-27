<?php
	import("core.loader",SYSTEM_PATH);
	class document{
		private $resource;
		public function __construct(){
			$this->resource=loader::load_resource_config();
		}
		public function add_js($jses=array(),$type='text/javascript',$language='javascript'){
			if(!empty($js)){
				foreach($jese as $js){
						
				}
			}
		}
		public function add_css(){
			
		}
		public function add_css_common($css=array(),$type='"text/css"',$rel='"stylesheet"'){
				if(!empty($css)){
					$assets=array();
					foreach($css as $file){
						array_push($assets,"<link rel=".$rel." type=".$type." href="."\"".$this->resource['host'].$this->resource['alias'].$this->resource['common_css'].$file."\"/>");	
					}
					return $assets;
				}
		}
		public function add_js_common($js=array(),$type='"text/javascript"',$language='"javascript"'){
				if(!empty($js)){
					$assets=array();
					foreach($js as $file){
						array_push($assets,"<script language=".$language." type=".$type." src="."\"".$this->resource['host'].$this->resource['alias'].$this->resource['common_js'].$file."\"></script>");
					}
					return $assets;
				}
		}
				
	}
