<?php

class privatePolicyController {
	public function indexAction($args){
		$v = new view("privatePolicy");
		$v->assign("mesargs", $args);
	}
}