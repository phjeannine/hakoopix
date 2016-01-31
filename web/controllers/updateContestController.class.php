<?php


class updateContestController {
	public function idAction($args){
		$v = new view("updateContest");
		$v->assign("id", $args);
	}
}