<?php

class adminPageController{

	public function indexAction($args){
		$v = new view("adminPage");
		$v->assign("mesargs", $args);
	}

}