<?php

class addContestController {

	public function indexAction($args){
		$v = new view("addContest");
		$v->assign("mesargs", $args);
	}

}