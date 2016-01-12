<?php

class indexController{
	public function indexAction($args){
		$v = new view("index");
		$v->assign("mesargs", $args);
	}
}