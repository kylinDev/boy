<?php
	class userController extends Controller{
		public function say(){
			$this->registers['request']->get_params();
			$users=array(
			array("name"=>"张三","address"=>"南京"),
			array("name"=>"旺旺","address"=>"上海"),
			array("name"=>"李四","address"=>"北京"),
			array("name"=>"凹凸曼","address"=>"外太空"),
			);
			$this->set_params("users",$users);
			$css=$this->registers['document']->add_css_common(array('bootstrap.css'));
			$js=$this->registers['document']->add_js_common(array('bootstrap.js'));
			$this->set_params("js",$js);
			$this->set_params("css",$css);
			//$this->render();
			$this->render("user");
		}
		public function hello(){
			echo "hello";
			$this->registers['response']->redirect('www.baidu.com');
		}
	}
