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
			
		}
	}
