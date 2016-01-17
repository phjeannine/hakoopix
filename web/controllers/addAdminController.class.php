<?php


class addAdminController {
	public function indexAction($args){
		$v = new view("addAdmin");
		$v->assign("mesargs", $args);
	}
}