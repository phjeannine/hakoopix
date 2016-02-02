<?php


class updateContestController {

	public function indexAction($args){
		$v = new view("updateContest");
		$v->assign("mesargs", $args);
	}

}