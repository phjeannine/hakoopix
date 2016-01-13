<?php

class contestController{

	public function indexAction($args){
		$v = new view("contest");
		$v->assign("mesargs", $args);
	}

}