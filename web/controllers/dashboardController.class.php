<?php
class dashboardController{

	public function indexAction($args){
		$v = new view("dashboard");
		$v->assign("mesargs", $args);
	}

}