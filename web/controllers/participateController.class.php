<?php

class participateController{
	public function indexAction($args){
		$v = new view("participate");
		$v->assign("mesargs", $args);
	}
}