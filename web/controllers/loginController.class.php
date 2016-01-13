<?php

class loginController{
	public function indexAction($args){
		$v = new view("login");
		$v->assign("mesargs", $args);
	}
}