<?php

class adminController{

	public function indexAction($args){
		$v = new view("admin");
		$v->assign("mesargs", $args);
	}

}