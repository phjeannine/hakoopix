<?php 
class userListController{
	public function indexAction($args){
		$v = new view("userList");
		$v->assign("mesargs", $args);
	}
}