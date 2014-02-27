<?php
	class loginController extends Controller{
		public function login(){
			$css=$this->registers['document']->add_css_common(array('bootstrap.css'));
                        $js=$this->registers['document']->add_js_common(array('bootstrap.js'));
                        $this->set_params("js",$js);
                        $this->set_params("css",$css);			
			$this->render('login');
		}
	}
