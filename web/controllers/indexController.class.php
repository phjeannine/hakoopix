<?php

class indexController{
	public function indexAction($args){
		$v = new view("hakoopixIndex");
		$v->assign("mesargs", $args);
	}
}