<?php

class testController{

	public function indexAction($args){
		$v = new view("test");
		$v->assign("mesargs", $args);
	}
}
?>