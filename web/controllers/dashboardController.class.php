<?php
class dashboardController extends basesql {

	public function indexAction($args){
		$v = new view("dashboard");
		$v->assign("mesargs", $args);

		if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    		$this->redirect("index", "");
  		}
	}

}