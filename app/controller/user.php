<?php
	class userController extends Controller{
		public function say(){
			$this->registers['request']->get_params();
			$this->registers['memcache']->save();
			$this->set_params("user",array("name"=>"ken","age"=>26));
			//$this->render();
			$this->render("user");
		}
		public function hello(){
			echo "hello";
			$this->registers['response']->redirect('www.baidu.com');
		}
		public function before(){
			echo "before";
		}
	}
