<?php
	class request{
		private $request;
		private $post;
		private $get;
		private $cookie;
		private $session;
		public function __construct(){
			$this->request=$_REQUEST;
			$this->post=$_POST;
			$this->get=$_GET;
		}
		public function get_params(){
			if(is_array($this->request) && !empty($this->request)){
				$data=array();
				foreach($this->request as $key=>$value){
					$data[$key]=$value;
				}
				return $data;
			}else{
				return null;
			}
		}
		

	}
