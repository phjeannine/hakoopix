<?php

class addPriceController {
	public function indexAction($args){
		$v = new view("addPrice");
		$v->assign("mesargs", $args);
	}
}